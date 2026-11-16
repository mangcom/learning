<?php
require_once __DIR__ . '/auth.php';
require_login();

/** Current branch name, falling back to 'main' if detached. */
function current_branch(): string
{
    [$code, $out] = run_git(['rev-parse', '--abbrev-ref', 'HEAD']);
    return ($code === 0 && $out !== '' && $out !== 'HEAD') ? $out : 'main';
}

/** Short hash + date + subject for a given ref, or null if the ref does not exist yet. */
function commit_info(string $ref): ?string
{
    [$code, $out] = run_git(['log', '-1', '--format=%h | %ci | %s', $ref]);
    return $code === 0 && $out !== '' ? $out : null;
}

function with_lock(callable $action): array
{
    $fp = fopen(SYNC_LOCK_FILE, 'c');
    if (!$fp || !flock($fp, LOCK_EX | LOCK_NB)) {
        if ($fp) {
            fclose($fp);
        }
        return [false, 'มีการ sync อีกรายการกำลังทำงานอยู่ กรุณารอสักครู่แล้วลองใหม่'];
    }
    try {
        return $action();
    } finally {
        flock($fp, LOCK_UN);
        fclose($fp);
    }
}

$branch = current_branch();
$message = null;
$messageType = 'info';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrf_check()) {
        $message = 'เซสชันหมดอายุ กรุณาลองใหม่อีกครั้ง';
        $messageType = 'error';
    } else {
        $action = (string) ($_POST['action'] ?? '');

        if ($action === 'check') {
            [$code, , $err] = run_git(['fetch', 'origin', $branch, '--quiet']);
            if ($code === 0) {
                sync_log("ตรวจสอบอัปเดตจาก origin/$branch สำเร็จ");
                $message = 'ตรวจสอบอัปเดตล่าสุดจาก GitHub เรียบร้อยแล้ว';
                $messageType = 'success';
            } else {
                sync_log("ตรวจสอบอัปเดตล้มเหลว: $err");
                $message = 'ตรวจสอบอัปเดตไม่สำเร็จ: ' . $err;
                $messageType = 'error';
            }
        } elseif ($action === 'pull') {
            [$ok, $result] = with_lock(function () use ($branch) {
                [$fetchCode, , $fetchErr] = run_git(['fetch', 'origin', $branch, '--quiet']);
                if ($fetchCode !== 0) {
                    return [false, 'ดึงข้อมูลจาก GitHub ไม่สำเร็จ: ' . $fetchErr];
                }

                $before = commit_info('HEAD');
                [$resetCode, , $resetErr] = run_git(['reset', '--hard', "origin/$branch"]);
                if ($resetCode !== 0) {
                    return [false, 'ปรับโค้ดให้ตรงกับ GitHub ไม่สำเร็จ: ' . $resetErr];
                }
                $after = commit_info('HEAD');

                if (function_exists('opcache_reset')) {
                    opcache_reset();
                }

                sync_log("Pull สำเร็จ: $before -> $after");
                return [true, "ดึงโค้ดล่าสุดสำเร็จ\nก่อน: $before\nหลัง: $after"];
            });
            $message = $result;
            $messageType = $ok ? 'success' : 'error';
        } elseif ($action === 'build') {
            [$ok, $result] = with_lock(function () {
                if (function_exists('opcache_reset')) {
                    opcache_reset();
                }
                sync_log('ล้างแคช (Build) เรียบร้อย');
                return [true, 'ล้างแคชและรีเฟรชแอปพลิเคชันเรียบร้อยแล้ว'];
            });
            $message = $result;
            $messageType = $ok ? 'success' : 'error';
        }
    }
}

// Refresh fetch-independent status for display (does not touch the network)
$localInfo = commit_info('HEAD') ?? 'ไม่พบข้อมูล commit';
$remoteInfo = commit_info("origin/$branch") ?? 'ยังไม่เคยตรวจสอบ กดปุ่ม "ตรวจสอบอัปเดต" ก่อน';

$ahead = $behind = null;
[$countCode, $countOut] = run_git(['rev-list', '--left-right', '--count', "HEAD...origin/$branch"]);
if ($countCode === 0 && $countOut !== '') {
    [$ahead, $behind] = array_pad(preg_split('/\s+/', $countOut), 2, '0');
}

[, $originUrl] = run_git(['remote', 'get-url', 'origin']);
$logLines = array_reverse(sync_log_tail(20));
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แผงควบคุมการ Sync จาก GitHub</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body style="background-color: #f8fafc;">

    <div class="page-header" style="background-color: var(--secondary); color: var(--white); padding: 40px 0;">
        <div class="container">
            <h2 style="margin:0;">🔄 แผงควบคุมการ Sync จาก GitHub</h2>
            <p style="margin: 8px 0 0 0;">Repository: <?php echo htmlspecialchars($originUrl ?: '-', ENT_QUOTES, 'UTF-8'); ?> | Branch: <?php echo htmlspecialchars($branch, ENT_QUOTES, 'UTF-8'); ?></p>
        </div>
    </div>

    <div class="container" style="max-width: 900px; margin: 40px auto;">

        <div style="text-align:right; margin-bottom:15px;">
            <a href="logout.php" style="color:#64748b; font-size:0.9rem; text-decoration:none;">ออกจากระบบ ➔</a>
        </div>

        <?php if ($message !== null): ?>
            <?php if ($messageType === 'success'): ?>
                <div style="background:#f0fdf4; border-left:4px solid #16a34a; color:#166534; padding:15px; border-radius:6px; margin-bottom:20px; white-space:pre-line;">
                    ✅ <?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?>
                </div>
            <?php else: ?>
                <div class="error-alert-box" style="margin-bottom:20px; white-space:pre-line;">
                    <span class="error-title">⚠️ <?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></span>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <div style="background:#fff; border:1px solid #e2e8f0; border-radius:12px; padding:25px; margin-bottom:25px;">
            <h3 style="margin-top:0; color:#0f172a;">📌 สถานะปัจจุบัน</h3>
            <table class="grading-table" style="width:100%;">
                <tr>
                    <td style="width:30%;"><strong>โค้ดในเครื่องนี้ (Local)</strong></td>
                    <td><?php echo htmlspecialchars($localInfo, ENT_QUOTES, 'UTF-8'); ?></td>
                </tr>
                <tr>
                    <td><strong>โค้ดล่าสุดบน GitHub (Remote)</strong></td>
                    <td><?php echo htmlspecialchars($remoteInfo, ENT_QUOTES, 'UTF-8'); ?></td>
                </tr>
                <tr>
                    <td><strong>ความต่าง</strong></td>
                    <td>
                        <?php if ($ahead === null): ?>
                            ยังไม่ทราบ - กดตรวจสอบอัปเดตก่อน
                        <?php elseif ((int) $behind === 0): ?>
                            ✅ ตรงกับ GitHub ล่าสุดแล้ว
                        <?php else: ?>
                            🔻 ตามหลังอยู่ <?php echo (int) $behind; ?> คอมมิต
                        <?php endif; ?>
                        <?php if ($ahead !== null && (int) $ahead > 0): ?>
                            (และมีคอมมิตในเครื่องที่ไม่อยู่บน GitHub อีก <?php echo (int) $ahead; ?> รายการ)
                        <?php endif; ?>
                    </td>
                </tr>
            </table>
        </div>

        <div style="background:#fff; border:1px solid #e2e8f0; border-radius:12px; padding:25px; margin-bottom:25px;">
            <h3 style="margin-top:0; color:#0f172a;">🛠️ การดำเนินการ</h3>
            <div style="display:flex; gap:15px; flex-wrap:wrap;">
                <form method="post">
                    <input type="hidden" name="csrf" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                    <input type="hidden" name="action" value="check">
                    <button type="submit" class="btn-enter-unit" style="border:none; cursor:pointer; background-color:#2563eb;">🔍 ตรวจสอบอัปเดต (Check)</button>
                </form>
                <form method="post" onsubmit="return confirm('ยืนยันดึงโค้ดล่าสุดจาก GitHub? การเปลี่ยนแปลงในเครื่องนี้ที่ยังไม่ได้ push จะถูกเขียนทับ');">
                    <input type="hidden" name="csrf" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                    <input type="hidden" name="action" value="pull">
                    <button type="submit" class="btn-enter-unit" style="border:none; cursor:pointer; background-color:#16a34a;">⬇️ ดึงโค้ดล่าสุด (Pull)</button>
                </form>
                <form method="post">
                    <input type="hidden" name="csrf" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                    <input type="hidden" name="action" value="build">
                    <button type="submit" class="btn-enter-unit" style="border:none; cursor:pointer; background-color:#7c3aed;">⚙️ ล้างแคช / Build</button>
                </form>
            </div>
            <p style="font-size:0.85rem; color:#64748b; margin-top:15px; margin-bottom:0;">
                * เว็บไซต์นี้เป็น PHP ล้วนไม่มีขั้นตอนคอมไพล์ ปุ่ม "Build" จึงทำหน้าที่ล้าง OPcache เพื่อให้มั่นใจว่าไฟล์ที่ถูก Pull มาใหม่ถูกใช้งานทันที
            </p>
        </div>

        <div style="background:#fff; border:1px solid #e2e8f0; border-radius:12px; padding:25px;">
            <h3 style="margin-top:0; color:#0f172a;">📝 ประวัติการทำงานล่าสุด</h3>
            <?php if (empty($logLines)): ?>
                <p style="color:#64748b; font-size:0.9rem;">ยังไม่มีประวัติการทำงาน</p>
            <?php else: ?>
                <div class="code-window">
                    <div class="code-header"><span class="code-lang">sync.log</span></div>
                    <pre><?php echo htmlspecialchars(implode("\n", $logLines), ENT_QUOTES, 'UTF-8'); ?></pre>
                </div>
            <?php endif; ?>
        </div>

    </div>
</body>

</html>
