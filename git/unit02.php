<?php
// ==========================================
// CONFIGURATION & METADATA (ข้อมูลประจำหน่วยเรียน)
// ==========================================
$base_dir = "../";             // ระยะถอยกลับไปยังโฟลเดอร์หลักที่มี components/navbar.php
$active_nav = "git";           // เมนูที่กำลังเปิดใช้งานใน Navbar

$unit_id = "2";                // เลขหน่วยการเรียนรู้
$unit_tag = "UNIT 2 | การปรับแต่งสภาพแวดล้อมและความปลอดภัย";
$unit_title = "การตั้งค่าระบบ Git และกลไกการยืนยันตัวตนขั้นสูง (Git Configuration & Authentication)";

// เวลาเรียนประจำหน่วย
$time_total = "6";
$time_theory = "2";
$time_practice = "4";

// เข็มทิศจากผู้สอน
$insight_title = "💡 เข็มทิศประจำหน่วยจากครูผู้สอน";
$insight_content = "หัวใจของการเริ่มต้นใช้งาน Git บนคอมพิวเตอร์เครื่องใหม่ ไม่ใช่แค่การจำคำสั่งให้พิมพ์ผ่าน แต่คือการเข้าใจ 'กลไกสิทธิ์ความปลอดภัย' และ 'ร่องรอยตัวตน' ที่คุณจะฝากไว้ในประวัติการพัฒนาซอฟต์แวร์ จำไว้เสมอว่านับตั้งแต่ปี 2021 เป็นต้นมา GitHub ไม่悦ยอมรับ Account Password ปกติผ่าน Terminal อีกต่อไป การเลือกใช้เครื่องมืออย่าง Credential Manager, Token หรือ SSH Key จึงเป็นทักษะภาคบังคับของนักพัฒนามืออาชีพครับ";

// ผลลัพธ์การเรียนรู้ประจำหน่วย (Course Learning Outcomes)
$learning_outcomes = [
  "อธิบายสถาปัตยกรรม ลำดับขั้น และขอบเขตการทำงานของ Git Config ทั้ง 3 ระดับได้อย่างถูกต้อง",
  "ปฏิบัติการตั้งค่าตัวตน ปรับแต่งสภาพแวดล้อม และ Text Editor เริ่มต้นผ่านสายคำสั่งได้",
  "วิเคราะห์และจำแนกความแตกต่างของกลไกความปลอดภัยระหว่าง Public และ Private Repositories",
  "ติดตั้งและเปิดใช้งานสิทธิ์เข้าถึงผ่าน Personal Access Token (PAT) และคูรหัสกุญแจ SSH Key บนเครื่องคอมพิวเตอร์ใหม่ได้สำเร็จ"
];

// สัดส่วนคะแนนประจำหน่วย (คำนวณยอดรวม 50 คะแนนอัตโนมัติในตาราง)
$grading_items = [
  ["item" => "✏️ แบบทดสอบทฤษฎีสถาปัตยกรรม Git Configuration Layers", "score" => "10 คะแนน"],
  ["item" => "🧪 ปฏิบัติการแล็บที่ 1: การยืนยันสิทธิ์ผ่าน HTTPS & Personal Access Token", "score" => "15 คะแนน"],
  ["item" => "🧪 ปฏิบัติการแล็บที่ 2: การเปิดใช้งานสิทธิ์ผ่านคู่รหัสกุญแจความปลอดภัย SSH Key", "score" => "15 คะแนน"],
  ["item" => "📋 ใบงานการทำข้อสรุปความคุ้มกันและความปลอดภัยพอร์ตซอฟต์แวร์ (Reflection)", "score" => "10 คะแนน"]
];
$total_unit_score = "50 คะแนน";

// ข้อความสรุปปิดท้ายบทเรียน
$footer_summary_title = "🎓 ประตูสู่ระบบความปลอดภัยและความเป็นมืออาชีพในการควบคุมเวอร์ชัน";
$footer_summary_content = "เมื่อนักศึกษาผ่านการศึกษาและผ่านการปฏิบัติการแล็บในหน่วยเรียนนี้เรียบร้อยแล้ว ทุกคนจะสามารถจัดเตรียมสภาพแวดล้อมบนคอมพิวเตอร์เครื่องใหม่ตัวใดก็ได้ในโลกวิชาชีพ ไม่ว่าจะต้องทำงานร่วมกับโปรเจกต์สาธารณะ (Public) หรือโค้ดลับขององค์กร (Private) พร้อมทั้งสร้างประวัติการแก้ไขซอฟต์แวร์ที่มีตัวตนโปร่งใสและตรวจสอบได้อย่างเป็นระบบ";
?>
<!DOCTYPE html>
<html lang="th">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>หน่วยที่ <?php echo $unit_id; ?>: <?php echo $unit_title; ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="<?php echo $base_dir; ?>assets/css/style.css" />

  <style>
    :root {
      --devops-bg: #0f172a;
      --devops-card: #1e293b;
      --devops-border: #334155;
      --devops-primary: #6366f1;
      --devops-accent: #8b5cf6;
      --text-main: #f1f5f9;
      --text-muted: #94a3b8;

      --tag-theory: #2563eb;
      --tag-practice: #16a34a;
      --tag-activity: #ea580c;
      --tag-output: #d97706;
    }

    body {
      background-color: var(--devops-bg);
      color: var(--text-main);
      font-family: "Sarabun", sans-serif;
      line-height: 1.6;
      padding-top: 60px;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px;
    }

    /* Hero Banner */
    .unit-hero {
      background: linear-gradient(135deg, #1e1b4b 0%, #1e293b 100%);
      border-bottom: 4px solid var(--devops-accent);
      padding: 40px 0;
      margin-bottom: 40px;
    }

    /* Card Styles */
    .dashboard-card {
      background: var(--devops-card);
      border: 1px solid var(--devops-border);
      border-radius: 12px;
      padding: 25px;
      margin-bottom: 30px;
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.2);
    }

    .card-title {
      font-size: 1.25rem;
      font-weight: 700;
      color: #fff;
      margin-top: 0;
      margin-bottom: 20px;
      display: flex;
      align-items: center;
      gap: 10px;
      border-bottom: 1px solid var(--devops-border);
      padding-bottom: 12px;
    }

    /* Teacher Insight Banner */
    .insight-banner {
      background: rgba(99, 102, 241, 0.1);
      border-left: 4px solid var(--devops-primary);
      padding: 20px;
      border-radius: 0 8px 8px 0;
      margin-bottom: 30px;
    }

    /* Badge Pills */
    .meta-pill {
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid var(--devops-border);
      padding: 6px 14px;
      border-radius: 20px;
      font-size: 0.88rem;
      font-weight: 500;
      color: var(--text-main);
    }

    .type-badge {
      display: inline-block;
      font-size: 0.78rem;
      font-weight: 700;
      padding: 3px 10px;
      border-radius: 4px;
      color: #fff;
      margin-right: 8px;
      text-transform: uppercase;
    }

    /* Layout Grid */
    .content-grid {
      display: grid;
      grid-template-columns: 1fr;
      gap: 30px;
    }

    @media (min-width: 992px) {
      .content-grid {
        grid-template-columns: 2.5fr 1.5fr;
      }
    }

    /* Topic Block */
    .topic-block {
      background: #111827;
      border: 1px solid var(--devops-border);
      border-radius: 8px;
      padding: 20px;
      margin-bottom: 20px;
    }

    .topic-header {
      color: var(--devops-accent);
      font-size: 1.1rem;
      margin-top: 0;
      margin-bottom: 15px;
      font-weight: 700;
    }

    /* Inner sections inside topics */
    .sub-section {
      background: rgba(255, 255, 255, 0.02);
      border: 1px solid rgba(255, 255, 255, 0.05);
      border-radius: 6px;
      padding: 12px 16px;
      margin-top: 10px;
      font-size: 0.92rem;
    }

    /* Custom Visual Flowcharts */
    .flow-container {
      display: flex;
      align-items: center;
      justify-content: space-around;
      background: #0f172a;
      padding: 15px;
      border-radius: 6px;
      margin: 15px 0;
      text-align: center;
      font-weight: 600;
      font-size: 0.85rem;
    }

    .flow-node {
      background: var(--devops-card);
      border: 1px solid var(--devops-border);
      padding: 8px 12px;
      border-radius: 4px;
      color: #fff;
    }

    .lifecycle-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 10px;
      margin: 15px 0;
      text-align: center;
    }

    .lifecycle-node {
      background: #1e1b4b;
      border: 1px solid var(--devops-primary);
      padding: 8px;
      border-radius: 6px;
      font-size: 0.85rem;
      color: #fff;
    }

    .lifecycle-node span {
      display: block;
      font-size: 0.75rem;
      color: var(--text-muted);
    }

    /* Table Design */
    .custom-table {
      width: 100%;
      border-collapse: collapse;
      font-size: 0.9rem;
      margin: 15px 0;
    }

    .custom-table th,
    .custom-table td {
      padding: 12px;
      text-align: left;
      border-bottom: 1px solid var(--devops-border);
    }

    .custom-table th {
      background: #0f172a;
      color: #fff;
    }

    ul,
    ol {
      margin: 5px 0;
      padding-left: 20px;
    }

    li {
      margin-bottom: 6px;
    }

    /* Code block design */
    pre {
      background: #0f172a;
      border-left: 3px solid #10b981;
      padding: 12px;
      border-radius: 4px;
      overflow-x: auto;
      margin: 10px 0;
    }

    code {
      font-family: 'Courier New', Courier, monospace;
      font-size: 0.9rem;
      color: #e2e8f0;
    }
  </style>
</head>

<body>
  <?php include $base_dir . 'components/navbar.php'; ?>

  <div class="unit-hero">
    <div class="container">
      <span style="background: var(--devops-primary); font-size: 0.8rem; font-weight: 700; padding: 4px 10px; border-radius: 4px"><?php echo $unit_tag; ?></span>
      <h1 style="font-size: 2rem; margin: 15px 0 10px 0; font-weight: 700; color: #fff">หน่วยที่ <?php echo $unit_id; ?>: <?php echo $unit_title; ?></h1>

      <div style="display: flex; gap: 12px; flex-wrap: wrap; margin-top: 15px">
        <span class="meta-pill">⏱️ รวมเวลาเรียน: <?php echo $time_total; ?> ชั่วโมง</span>
        <span class="meta-pill">📘 ทฤษฎี: <?php echo $time_theory; ?> ชั่วโมง</span>
        <span class="meta-pill">💻 ปฏิบัติ: <?php echo $time_practice; ?> ชั่วโมง</span>
      </div>
    </div>
  </div>

  <div class="container">

    <div class="insight-banner">
      <h4 style="margin: 0 0 8px 0; color: #fff; font-size: 1.05rem"><?php echo $insight_title; ?></h4>
      <p style="margin: 0; font-size: 0.92rem; color: var(--text-muted)">
        <?php echo $insight_content; ?>
      </p>
    </div>

    <div class="dashboard-card" style="border-top: 4px solid #10b981">
      <div class="card-title">🎯 ผลลัพธ์การเรียนรู้ประจำหน่วย (Course Learning Outcomes)</div>
      <p style="font-size: 0.9rem; color: var(--text-muted); margin-top: -10px; margin-bottom: 15px">เมื่อเรียนจบหน่วยนี้สำเร็จ นักศึกษาจะมีความรู้ความสามารถดังต่อไปนี้:</p>
      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 12px; font-size: 0.92rem">
        <?php foreach ($learning_outcomes as $outcome): ?>
          <div style="background: rgba(16, 185, 129, 0.05); padding: 10px; border-radius: 6px; border-left: 3px solid #10b981">✔️ <?php echo $outcome; ?></div>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="content-grid">

      <div class="main-lessons">
        <h3 style="color: #fff; margin-top: 0; margin-bottom: 20px">📖 เจาะลึกเนื้อหาสาระการเรียนรู้ย่อย</h3>

        <div class="topic-block">
          <div class="topic-header">เรื่องที่ 1: สถาปัตยกรรมระดับสิทธิ์ของ Git Config (Configuration Levels)</div>
          <div style="font-size: 0.92rem; color: var(--text-muted)">
            ระบบ Git มีกลไกการจัดเก็บการตั้งค่าแบบลำดับขั้น (Hierarchy Levels) โดยแบ่งออกเป็น 3 ระดับหลัก เพื่อเปิดโอกาสให้นักพัฒนาสามารถสลับพฤติกรรมการทำงานระหว่างบัญชีส่วนตัวและบัญชีองค์กรได้อย่างอิสระ:
          </div>

          <table class="custom-table" style="font-size: 0.85rem;">
            <thead>
              <tr>
                <th>ระดับ (Level)</th>
                <th>Flag ในคำสั่ง</th>
                <th>ขอบเขต (Scope)</th>
                <th>ไฟล์ที่เก็บข้อมูล</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><strong>Local</strong></td>
                <td><code>--local</code></td>
                <td>เฉพาะ Repository ปัจจุบัน <em>(Default)</em></td>
                <td><code>.git/config</code> (ในโฟลเดอร์งาน)</td>
              </tr>
              <tr>
                <td><strong>Global</strong></td>
                <td><code>--global</code></td>
                <td>ทุกโปรเจกต์ของ User เครื่องนี้</td>
                <td><code>~/.gitconfig</code></td>
              </tr>
              <tr>
                <td><strong>System</strong></td>
                <td><code>--system</code></td>
                <td>ทุกบัญชีผู้ใช้และทุกโปรเจกต์ในคอมพิวเตอร์</td>
                <td><code>/etc/gitconfig</code></td>
              </tr>
            </tbody>
          </table>

          <div class="lifecycle-grid">
            <div class="lifecycle-node">1. Local<span>ลำดับสิทธิ์แคบ/สูงสุด</span></div>
            <div class="lifecycle-node">2. Global<span>มีผลกว้างระดับบัญชี</span></div>
            <div class="lifecycle-node">3. System<span>มีผลกว้างสุดระบบคอม</span></div>
          </div>

          <div class="sub-section" style="border-left: 4px solid var(--devops-accent); background: rgba(139, 92, 246, 0.05);">
            <strong style="color: var(--devops-accent); display:block; margin-bottom:4px;">⚠️ กฎเหล็กการทับซ้อน (Hierarchy Override Matrix):</strong>
            <span style="color: var(--text-muted)">หากมีการตั้งค่าตัวแปรซ้ำกัน ตัวแปรในระดับที่ **แคบที่สุด** จะทำงานทับระดับที่กว้างกว่าเสมอ (Local &gt; Global &gt; System)</span>
          </div>
        </div>

        <div class="topic-block">
          <div class="topic-header">เรื่องที่ 2: ชุดคำสั่งควบคุมตัวตนและสภาพแวดล้อมที่จำเป็น (Essential Config Commands)</div>
          <p style="font-size: 0.92rem; margin: 0 0 10px 0">ชุดคำสั่งสำหรับการลงทะเบียนระบุร่องรอยตัวตนผู้ทำ Commit และคำสั่งอำนวยความสะดวกในระดับสากล:</p>

          <strong style="font-size: 0.88rem; color: #fff;">1. ชุดคำสั่งบันทึกตัวตน (Identity Setup)</strong>
          <pre><code># ตั้งชื่อ-สกุล สำหรับติดไปกับ Commit
git config --global user.name "Your Name"

# ตั้งอีเมลบัญชีสำหรับเชื่อมโยงประวัติ
git config --global user.email "your.email@example.com"</code></pre>

          <strong style="font-size: 0.88rem; color: #fff; display:block; margin-top:10px;">2. ชุดคำสั่งสำหรับตรวจสอบและยกเลิกค่า (Inspection & Unset)</strong>
          <pre><code># ตรวจดูรายการตั้งค่าทั้งหมดที่ทำงานอยู่
git config --list

# ตรวจดูค่าตัวแปรพร้อมแหล่งที่มาของไฟล์
git config --list --show-origin

# ยกเลิกการตั้งค่าตัวแปรที่เจาะจง
git config --global --unset user.email</code></pre>

          <strong style="font-size: 0.88rem; color: #fff; display:block; margin-top:10px;">3. ทริคการปรับแต่งขั้นสูง (Advanced Environment Tweak)</strong>
          <pre><code># เปลี่ยนชื่อ Branch เริ่มต้นตอน init เป็น main
git config --global init.defaultBranch main

# ผูกเบื้องหลัง Text Editor ให้เปิดผ่าน VS Code อัตโนมัติ
git config --global core.editor "code --wait"

# เปิดระบบช่วยเดาและแก้ไขคำสั่งพิมพ์ผิด (แก้ไขภายใน 2 วินาที)
git config --global help.autocorrect 20</code></pre>
        </div>

        <div class="topic-block">
          <div class="topic-header">เรื่องที่ 3: กลไกความปลอดภัยและการยืนยันตัวตนกับ GitHub เครื่องใหม่</div>
          <div style="font-size: 0.92rem; color: var(--text-muted); margin-bottom: 12px;">
            เมื่อเริ่มต้นดึงงานหรือส่งงานร่วมกับรีโมทเซิร์ฟเวอร์ (GitHub) ระบบรักษาความปลอดภัยจะแบ่งพฤติกรรมตามประเภทความลับของโปรเจกต์ดังนี้:
          </div>

          <ul>
            <li><strong>Public Repository:</strong> อนุญาตให้ผู้ใช้ทั่วไปสั่ง <code>git clone</code> หรือ <code>pull</code> ได้เสรีโดยไม่ต้องกรอกรหัสผ่าน แต่จะร้องขอสิทธิ์ความปลอดภัยในจังหวะที่สั่ง <code>git push</code> โค้ดกลับขึ้นไปเท่านั้น</li>
            <li><strong>Private Repository:</strong> ระบบจะบล็อกและร้องขอการตรวจสอบสิทธิ์ (Authentication) ทันทีตั้งแต่คำสั่งแรก (Clone/Pull/Push) หากยืนยันตัวตนไม่ผ่าน จะมองไม่เห็นตัวโปรเจกต์เสมือนไม่มีอยู่จริง</li>
          </ul>

          <div class="flow-container" style="margin-top: 15px;">
            <div class="flow-node">GCM Pop-up<br><small>(ล็อกอินผ่านเบราว์เซอร์)</small></div>
            <div>OR</div>
            <div class="flow-node">Personal Access Token<br><small>(กรอก Token แทนพาสเวิร์ด)</small></div>
            <div>OR</div>
            <div class="flow-node">SSH Key Cryptography<br><small>(ผูกคู่กุญแจความปลอดภัย)</small></div>
          </div>

          <div class="sub-section">
            <span class="type-badge" style="background: var(--tag-activity)">สัญญาระบบความปลอดภัย</span>
            <strong>รหัสผ่านบัญชีหน้าเว็บ (Account Password) ไม่สามารถนำมาพิมพ์ใส่ใน Terminal ได้อีกต่อไป</strong> ระบบความปลอดภัยของสายงาน Git บังคับให้ใช้กลไกใดกลไกหนึ่งใน 3 รูปแบบด้านบนเพื่อรักษาสิทธิ์ความปลอดภัยสูงสุดของซอร์สโค้ด
          </div>
        </div>

      </div>

      <div class="side-panel">

        <div class="dashboard-card" style="border-top: 4px solid var(--devops-primary)">
          <div class="card-title">🧪 ใบงานภาคปฏิบัติการประจำหน่วย (Labs)</div>

          <div style="background: #0f172a; padding: 15px; border-radius: 8px; margin-bottom: 15px; border: 1px solid var(--devops-border)">
            <span class="type-badge" style="background: var(--tag-practice)">LAB 1</span>
            <strong style="color: #fff; display: block; margin: 5px 0">การยืนยันสิทธิ์ HTTPS & Personal Access Token</strong>
            <p style="font-size: 0.85rem; color: var(--text-muted); margin: 5px 0 10px 0">
              ฝึกฝนการเข้าหน้าเว็บ GitHub เพื่อสกัดรหัสสิทธิ์จำลองผ่านเมนู Developer Settings > Tokens (classic) พร้อมทดลองใช้งานจริงผ่าน Terminal
            </p>
            <span style="font-size: 0.85rem; color: #f59e0b; font-weight: 600">📝 สิ่งที่นักศึกษาต้องส่ง:</span>
            <ul style="font-size: 0.85rem; padding-left: 18px">
              <li>ภาพถ่ายหน้าจอแสดงผลการทดสอบโคลน Private Repository ผ่าน Token</li>
            </ul>
          </div>

          <div style="background: #0f172a; padding: 15px; border-radius: 8px; border: 1px solid var(--devops-border)">
            <span class="type-badge" style="background: var(--tag-practice)">LAB 2</span>
            <strong style="color: #fff; display: block; margin: 5px 0">การวางรากฐานคู่กุญแจเข้ารหัส SSH Key</strong>
            <p style="font-size: 0.85rem; color: var(--text-muted); margin: 5px 0 10px 0">
              ปฏิบัติการสั่งใช้คำสั่ง <code>ssh-keygen -t ed25519</code> บนคอมพิวเตอร์เครื่องใหม่ นำ Public Key ไปผูกบนคลาวด์โปรไฟล์เพื่อตัดความเสี่ยงเรื่องรหัสผ่านหมดอายุ
            </p>
          </div>
        </div>

        <div class="dashboard-card" style="border-top: 4px solid var(--tag-output)">
          <div class="card-title">💼 ภาระชิ้นงานส่งประเมินผล (Assignments)</div>
          <div style="font-size: 0.9rem">
            <div style="margin-bottom: 15px">
              <span class="type-badge" style="background: var(--tag-theory)">งานเดี่ยว</span>
              <strong style="color: #fff">Configuration Layer Mapping</strong>
              <p style="font-size: 0.82rem; color: var(--text-muted); margin: 4px 0 0 0">
                จงเขียนแผนผังความสัมพันธ์ (Matrix Diagram) จำลองสถานการณ์เมื่อมีตัวแปรจาก 3 ระดับชนกัน พร้อมระบุแนวทางแก้ไขปัญหาคำสั่งพังลงในเอกสารรายงาน
              </p>
            </div>
            <div>
              <span class="type-badge" style="background: var(--tag-activity)">งานกลุ่ม</span>
              <strong style="color: #fff">Git Setup Sandbox SOP</strong>
              <p style="font-size: 0.82rem; color: var(--text-muted); margin: 4px 0 0 0">จัดทำคู่มือมาตรฐานการเตรียมสภาพแวดล้อม (Standard Operating Procedure) สำหรับแจกจ่ายให้นักพัฒนาเข้าใหม่ในทีมจำลอง</p>
            </div>
          </div>
        </div>

        <div class="dashboard-card" style="border-top: 4px solid var(--devops-accent)">
          <div class="card-title">📊 สัดส่วนเกณฑ์การตัดคะแนนประจำหน่วย</div>
          <table class="custom-table" style="font-size: 0.85rem; margin: 0">
            <thead>
              <tr style="background: #1e1b4b">
                <th>ชิ้นงาน / รายการวัดผล</th>
                <th style="text-align: right">คะแนน</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($grading_items as $grade): ?>
                <tr>
                  <td><?php echo $grade["item"]; ?></td>
                  <td style="text-align: right; font-weight: 700; color: var(--devops-primary)"><?php echo $grade["score"]; ?></td>
                </tr>
              <?php endforeach; ?>
              <tr style="background: #0f172a; font-weight: 700; color: #fff">
                <td>💯 รวมคะแนนประจำหน่วยที่ <?php echo $unit_id; ?></td>
                <td style="text-align: right; color: #10b981"><?php echo $total_unit_score; ?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="dashboard-card" style="background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 100%); border: 1px solid var(--devops-primary); text-align: center; margin-top: 10px">
      <h4 style="color: #fff; margin: 0 0 10px 0; font-size: 1.1rem"><?php echo $footer_summary_title; ?></h4>
      <p style="margin: 0 auto; max-width: 900px; font-size: 0.9rem; color: var(--text-muted)">
        <?php echo $footer_summary_content; ?>
      </p>
    </div>
  </div>

  <script src="<?php echo $base_dir; ?>assets/js/script.js"></script>
</body>

</html>