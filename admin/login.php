<?php
require_once __DIR__ . '/auth.php';

if (is_logged_in()) {
    header('Location: sync.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrf_check()) {
        $error = 'เซสชันหมดอายุ กรุณาลองใหม่อีกครั้ง';
    } else {
        $attempts = $_SESSION['login_attempts'] ?? 0;
        if ($attempts >= 5) {
            usleep(1500000); // slow down brute-force attempts
        }

        $token = (string) ($_POST['token'] ?? '');
        if (DEPLOY_TOKEN !== '' && hash_equals(DEPLOY_TOKEN, $token)) {
            session_regenerate_id(true);
            $_SESSION['sync_authenticated'] = true;
            unset($_SESSION['login_attempts']);
            sync_log('เข้าสู่ระบบสำเร็จจาก ' . ($_SERVER['REMOTE_ADDR'] ?? 'unknown'));
            header('Location: sync.php');
            exit;
        }

        $_SESSION['login_attempts'] = $attempts + 1;
        sync_log('เข้าสู่ระบบล้มเหลวจาก ' . ($_SERVER['REMOTE_ADDR'] ?? 'unknown'));
        $error = 'Token ไม่ถูกต้อง';
    }
}
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ: แผงควบคุมการ Sync</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body style="background-color: #f8fafc;">
    <div class="container" style="max-width: 420px; margin: 100px auto;">
        <div style="background:#fff; border:1px solid #e2e8f0; border-radius:12px; padding:30px; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.05);">
            <h2 style="color:#0f172a; margin-top:0;">🔐 แผงควบคุมการ Sync</h2>
            <p style="color:#475569; font-size:0.9rem;">กรอก Deploy Token เพื่อตรวจสอบ/ดึงโค้ดล่าสุดจาก GitHub</p>

            <?php if ($error): ?>
                <div class="error-alert-box" style="margin: 15px 0;">
                    <span class="error-title">⚠️ <?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></span>
                </div>
            <?php endif; ?>

            <form method="post" style="margin-top: 15px;">
                <input type="hidden" name="csrf" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                <input type="password" name="token" placeholder="Deploy Token" required autofocus
                    style="width:100%; box-sizing:border-box; padding:12px; border:1px solid #cbd5e1; border-radius:6px; font-size:1rem; margin-bottom:15px;">
                <button type="submit" class="btn-enter-unit" style="width:100%; border:none; cursor:pointer;">เข้าสู่ระบบ</button>
            </form>
        </div>
    </div>
</body>

</html>
