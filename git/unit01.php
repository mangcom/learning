<?php
$base_dir = "../"; // ระยะถอยกลับไปยังโฟลเดอร์หลักที่มี components/navbar.php
$active_nav = "git"; // แท็กสถานะเมนูที่กำลังเปิดใช้งาน
?>
<!DOCTYPE html>
<html lang="th">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>หน่วยที่ 1: แนวคิดการพัฒนาซอฟต์แวร์แบบ DevOps และการทำงานร่วมกัน</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/style.css" />

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
      }

      .lifecycle-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
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
        margin-bottom: 4px;
      }
    </style>
  </head>

  <body>
    <?php include '../components/navbar.php'; ?>

    <div class="unit-hero">
      <div class="container">
        <span style="background: var(--devops-primary); font-size: 0.8rem; font-weight: 700; padding: 4px 10px; border-radius: 4px">UNIT 1 | บทเรียนหลักความรู้พื้นฐาน</span>
        <h1 style="font-size: 2rem; margin: 15px 0 10px 0; font-weight: 700; color: #fff">หน่วยที่ 1: แนวคิดการพัฒนาซอฟต์แวร์แบบ DevOps และการทำงานร่วมกัน</h1>

        <div style="display: flex; gap: 12px; flex-wrap: wrap; margin-top: 15px">
          <span class="meta-pill">⏱️ รวมเวลาเรียน: 9 ชั่วโมง</span>
          <span class="meta-pill">📘 ทฤษฎี: 3 ชั่วโมง</span>
          <span class="meta-pill">💻 ปฏิบัติ: 6 ชั่วโมง</span>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="insight-banner">
        <h4 style="margin: 0 0 8px 0; color: #fff; font-size: 1.05rem">💡 เข็มทิศประจำหน่วยจากครูผู้สอน</h4>
        <p style="margin: 0; font-size: 0.92rem; color: var(--text-muted)">
          หน่วยที่ 1 เป็นฐานรากที่สำคัญที่สุดของทั้งรายวิชา นักศึกษามักเข้าใจผิดว่า <span style="color: #fff; font-weight: 600">DevOps = Git + Docker</span> แต่ในโลกการทำงานจริง
          <strong style="color: #f59e0b">DevOps คือ วัฒนธรรม (Culture) + กระบวนการทำงาน (Process) + เครื่องมือ (Tools)</strong> เราจึงยังไม่เริ่มเขียน Git ทันที แต่จะสร้างความเข้าใจเชิงลึกว่า
          ทำไมต้องมีกิต? ทำไมองค์กรใหญ่จึงขาด DevOps ไม่ได้? และหากไม่มี Version Control จะพังอย่างไร
        </p>
      </div>

      <div class="dashboard-card" style="border-top: 4px solid #10b981">
        <div class="card-title">🎯 ผลลัพธ์การเรียนรู้ประจำหน่วย (Course Learning Outcomes)</div>
        <p style="font-size: 0.9rem; color: var(--text-muted); margin-top: -10px; margin-bottom: 15px">เมื่อเรียนจบหน่วยนี้สำเร็จ นักศึกษาจะมีความรู้ความสามารถดังต่อไปนี้:</p>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 12px; font-size: 0.92rem">
          <div style="background: rgba(16, 185, 129, 0.05); padding: 10px; border-radius: 6px; border-left: 3px solid #10b981">✔️ อธิบายแนวคิด DevOps ได้อย่างถูกต้องตามหลักการ</div>
          <div style="background: rgba(16, 185, 129, 0.05); padding: 10px; border-radius: 6px; border-left: 3px solid #10b981">✔️ อธิบายความแตกต่างระหว่าง Traditional, Agile และ DevOps ได้</div>
          <div style="background: rgba(16, 185, 129, 0.05); padding: 10px; border-radius: 6px; border-left: 3px solid #10b981">✔️ วิเคราะห์และชี้จุดปัญหาการทำงานร่วมกันของทีมพัฒนาซอฟต์แวร์ได้</div>
          <div style="background: rgba(16, 185, 129, 0.05); padding: 10px; border-radius: 6px; border-left: 3px solid #10b981">✔️ อธิบายขั้นตอนในวงจร DevOps Lifecycle ทั้งหมดได้</div>
          <div style="background: rgba(16, 185, 129, 0.05); padding: 10px; border-radius: 6px; border-left: 3px solid #10b981">✔️ ตระหนักและเห็นความสำคัญของ Version Control & Collaboration Tools</div>
        </div>
      </div>

      <div class="content-grid">
        <div class="main-lessons">
          <h3 style="color: #fff; margin-top: 0; margin-bottom: 20px">📖 เจาะลึกเนื้อหาสาระการเรียนรู้ย่อย</h3>

          <div class="topic-block">
            <div class="topic-header">เรื่องที่ 1: การพัฒนาซอฟต์แวร์ในอดีต และโครงสร้าง SDLC</div>
            <div style="font-size: 0.92rem; color: var(--text-muted)">
              <strong>1.1 Software Development Life Cycle (SDLC):</strong> คือกระบวนการมาตรฐานในการพัฒนาซอฟต์แวร์ตั้งแต่เริ่มต้นจนถึงสิ้นสุดการส่งมอบ ประกอบด้วย 7 เฟสหลัก:
              <div style="margin: 8px 0; color: #fff; display: flex; flex-wrap: wrap; gap: 6px; font-size: 0.8rem">
                <span style="background: #334155; padding: 2px 8px; border-radius: 4px">1. Requirement</span> ➔
                <span style="background: #334155; padding: 2px 8px; border-radius: 4px">2. Analysis</span> ➔ <span style="background: #334155; padding: 2px 8px; border-radius: 4px">3. Design</span> ➔
                <span style="background: #334155; padding: 2px 8px; border-radius: 4px">4. Development</span> ➔
                <span style="background: #334155; padding: 2px 8px; border-radius: 4px">5. Testing</span> ➔
                <span style="background: #334155; padding: 2px 8px; border-radius: 4px">6. Deployment</span> ➔
                <span style="background: #334155; padding: 2px 8px; border-radius: 4px">7. Maintenance</span>
              </div>
            </div>
            <div class="sub-section">
              <span class="type-badge" style="background: var(--tag-activity)">กิจกรรมกลุ่ม</span>
              <strong>ระดมสมอง:</strong> ให้นักศึกษาคิดว่า <em>"ถ้าวิทยาลัยมอบหมายให้เราสร้างระบบยืมคืนอุปกรณ์ของสาขาไอที จะต้องเริ่มต้นจากอะไรบ้าง?"</em> จงเขียนแยกเป็นลำดับขั้นตอนการทำงาน
              <div style="margin-top: 6px; color: #f59e0b; font-size: 0.85rem">
                🎯 <strong>ผลลัพธ์ที่คาดหวัง:</strong> นักศึกษาจะตระหนักได้เองว่า การสร้างซอฟต์แวร์ไม่ใช่การเปิดคอมพิวเตอร์เขียนโค้ดทันที
              </div>
            </div>
          </div>

          <div class="topic-block">
            <div class="topic-header">เรื่องที่ 2: ปัญหาของการพัฒนาซอฟต์แวร์แบบดั้งเดิม (Traditional Development)</div>
            <p style="font-size: 0.92rem; margin: 0 0 10px 0"><strong>ผังกระบวนการแบบดั้งเดิม (Silo Work):</strong> ต่างฝ่ายต่างทำงานของตนเองและโยนไฟล์ข้ามแผนก</p>

            <div class="flow-container">
              <div class="flow-node">💻 Developer (เขียนโค้ด)</div>
              <div>👉 ส่งไฟล์ 👉</div>
              <div class="flow-node">🧪 Tester (ทดสอบ)</div>
              <div>👉 ส่งไฟล์ 👉</div>
              <div class="flow-node">🚀 System Admin (ติดตั้งระบบ)</div>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 10px; margin-top: 15px">
              <div style="background: rgba(239, 68, 68, 0.1); border: 1px solid rgba(239, 68, 68, 0.2); padding: 10px; border-radius: 6px">
                <strong style="color: #ef4444; font-size: 0.85rem; display: block">❌ ปัญหาที่ 1: ไฟล์ซ้ำซ้อนสับสน</strong>
                <span style="font-family: monospace; font-size: 0.8rem; color: #94a3b8">project_final.zip<br />project_final_v2.zip<br />project_final_v3_real.zip</span>
              </div>
              <div style="background: rgba(239, 68, 68, 0.1); border: 1px solid rgba(239, 68, 68, 0.2); padding: 10px; border-radius: 6px">
                <strong style="color: #ef4444; font-size: 0.85rem; display: block">❌ ปัญหาที่ 2: ไม่รู้ประวัติผู้แก้ไข</strong>
                <span style="font-size: 0.82rem">ตามสืบไม่ได้ว่าใครแอบแก้โค้ดบรรทัดไหนจนระบบพัง</span>
              </div>
              <div style="background: rgba(239, 68, 68, 0.1); border: 1px solid rgba(239, 68, 68, 0.2); padding: 10px; border-radius: 6px">
                <strong style="color: #ef4444; font-size: 0.85rem; display: block">❌ ปัญหาที่ 3: Deploy ช้ามาก</strong>
                <span style="font-size: 0.82rem">ใช้เวลาเซ็ตเครื่องและติดตั้งระบบเป็นสัปดาห์หรือเป็นเดือน</span>
              </div>
            </div>

            <div class="sub-section" style="margin-top: 15px">
              <span class="type-badge" style="background: var(--tag-activity)">กิจกรรมจำลอง</span>
              <strong>ปฏิบัติการกลุ่ม (4 คน):</strong> ให้ทุกคนเปิดและแก้ไขไฟล์เอกสาร Microsoft Word แผ่นเดียวกัน "พร้อมกันในเวลาเดียวกันบนเครื่องของตน" จากนั้นให้นำมาประกอบรวมไฟล์ด้วยกันด้วยมือ
              <div style="margin-top: 5px; color: #cbd5e1">💬 <strong>คำถามสะท้อนคิดหลังกิจกรรม:</strong> เกิดอุปสรรค ข้อมูลหาย หรือความขัดแย้ง (Conflict) อะไรขึ้นบ้างในกลุ่ม?</div>
            </div>
          </div>

          <div class="topic-block">
            <div class="topic-header">เรื่องที่ 3: แนวคิดตัวเร่งสปีดแบบ Agile และกระบวนการ Scrum</div>
            <p style="font-size: 0.92rem; margin: 0">
              <strong>Agile:</strong> เกิดขึ้นเพื่อทลายปัญหากระบวนการที่ช้าและการเปลี่ยนใจบ่อยของลูกค้า โดยเน้นหลักการสำคัญใน <em>Agile Manifesto</em> คือ
              <strong>"เน้นการปฏิสัมพันธ์ระหว่างบุคคลและทีม มากกว่าเครื่องมือและขั้นตอนกระบวนการ"</strong>
            </p>

            <div style="margin-top: 12px; font-size: 0.9rem; background: #0f172a; padding: 15px; border-radius: 6px">
              <strong style="color: var(--devops-primary); display: block; margin-bottom: 8px">👥 บทบาทหลักในระบบวิถี Scrum Framework:</strong>
              • <strong>Product Owner (PO):</strong> ผู้เป็นเจ้าของระบบ คัดเลือกฟีเจอร์และจัดลำดับความสำคัญของงานตามความต้องการลูกค้า<br />
              • <strong>Scrum Master (SM):</strong> ผู้คอยดูแลกระบวนการ ขจัดอุปสรรคออกจากทีม ขับเคลื่อนงานให้ราบรื่น<br />
              • <strong>Development Team:</strong> ทีมพัฒนาร่วมใจ (โปรแกรมเมอร์, ดีไซเนอร์, เทสเตอร์) ที่ร่วมกันสร้างซอฟต์แวร์
            </div>

            <div class="sub-section">
              <span class="type-badge" style="background: var(--tag-activity)">Scrum Simulation</span>
              <strong>โจทย์ "ระบบจองห้องประชุมวิทยาลัย":</strong> แบ่งบทบาทนักศึกษาในกลุ่มเป็น PO, SM, Dev แล้วลองร่วมกันเขียนการ์ดงานและวางผัง <strong>Scrum Board</strong> บนกระดาษแผ่นใหญ่ (To Do,
              Doing, Done)
            </div>
          </div>

          <div class="topic-block">
            <div class="topic-header">เรื่องที่ 4: นิยามนิเวศน์ DevOps (Development + Operations)</div>
            <p style="font-size: 0.92rem; margin: 0 0 10px 0"><strong>เป้าหมายสูงสุด:</strong> พัฒนาซอฟต์แวร์ได้รวดเร็วขึ้น ส่งมอบได้ถี่ขึ้น และระบบมีเสถียรภาพคุณภาพสูงสุด</p>

            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; text-align: center; font-size: 0.8rem; margin: 15px 0">
              <div style="background: #1e293b; padding: 10px; border-radius: 6px; border: 1px solid #334155">
                <strong style="color: #ef4444; display: block; margin-bottom: 5px">Traditional Model</strong>
                Dev ➔ Test ➔ Ops<br /><span style="color: var(--text-muted); font-size: 0.75rem">(ต่างคนต่างทำ แยกขาดกันชัดเจน)</span>
              </div>
              <div style="background: #1e293b; padding: 10px; border-radius: 6px; border: 1px solid #334155">
                <strong style="color: #f59e0b; display: block; margin-bottom: 5px">Agile Model</strong>
                Dev ⟷ Customer<br /><span style="color: var(--text-muted); font-size: 0.75rem">(เน้นคุยปรับโค้ดตามใจลูกค้าเร็วขึ้น)</span>
              </div>
              <div style="background: #1e1b4b; padding: 10px; border-radius: 6px; border: 2px solid var(--devops-primary)">
                <strong style="color: #10b981; display: block; margin-bottom: 5px">DevOps Model</strong>
                Dev ⟷ Test ⟷ Ops<br /><span style="color: #10b981; font-size: 0.75rem; font-weight: 600">(ทุกฝ่ายร่วมใจ หลอมรวมไร้รอยต่อ)</span>
              </div>
            </div>

            <div class="sub-section">
              <span class="type-badge" style="background: var(--tag-activity)">อภิปรายท้าทาย</span>
              <strong>คำถามตั้งโต๊ะ:</strong>
              <em>"หาก Developer (คนชอบเปลี่ยนโค้ดบ่อยๆ) กับ System Admin (คนเกลียดการเปลี่ยนเพราะกลัวเซิร์ฟเวอร์พัง) ไม่พูดคุยสื่อสารกันเลย องค์กรธุรกิจจะเสียหายอย่างไร?"</em>
            </div>
          </div>

          <div class="topic-block">
            <div class="topic-header">เรื่องที่ 5: หลักการ CALMS – เสาหลักหัวใจหลักของ DevOps</div>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(130px, 1fr)); gap: 10px; margin: 15px 0; font-size: 0.85rem; text-align: center">
              <div style="background: #0f172a; padding: 10px; border-radius: 6px; border-top: 3px solid #6366f1">
                <strong style="color: #6366f1; font-size: 1.1rem; display: block">C</strong><strong>Culture</strong><br /><span style="color: var(--text-muted); font-size: 0.75rem"
                  >วัฒนธรรมการร่วมมือ</span
                >
              </div>
              <div style="background: #0f172a; padding: 10px; border-radius: 6px; border-top: 3px solid #10b981">
                <strong style="color: #10b981; font-size: 1.1rem; display: block">A</strong><strong>Automation</strong><br /><span style="color: var(--text-muted); font-size: 0.75rem"
                  >ระบบทำงานอัตโนมัติ</span
                >
              </div>
              <div style="background: #0f172a; padding: 10px; border-radius: 6px; border-top: 3px solid #3b82f6">
                <strong style="color: #3b82f6; font-size: 1.1rem; display: block">L</strong><strong>Lean</strong><br /><span style="color: var(--text-muted); font-size: 0.75rem">ลดความสูญเปล่า</span>
              </div>
              <div style="background: #0f172a; padding: 10px; border-radius: 6px; border-top: 3px solid #f59e0b">
                <strong style="color: #f59e0b; font-size: 1.1rem; display: block">M</strong><strong>Measurement</strong><br /><span style="color: var(--text-muted); font-size: 0.75rem"
                  >มีตัวชี้วัดตรวจสอบได้</span
                >
              </div>
              <div style="background: #0f172a; padding: 10px; border-radius: 6px; border-top: 3px solid #ec4899">
                <strong style="color: #ec4899; font-size: 1.1rem; display: block">S</strong><strong>Sharing</strong><br /><span style="color: var(--text-muted); font-size: 0.75rem"
                  >แบ่งปันแบ่งเบาความรู้</span
                >
              </div>
            </div>

            <div class="sub-section">
              <span class="type-badge" style="background: var(--tag-activity)">Idea Workshop</span>
              <strong>โจทย์ประยุกต์ชีวิตประจำวัน:</strong> ยกตัวอย่างกิจกรรมในชีวิตประจำวันของนักศึกษาที่สามารถเปลี่ยนมาทำเป็นระบบ <strong>Automation</strong> ได้ เช่น
              ระบบเปิด-ปิดไฟห้องเรียนอัตโนมัติตามเซนเซอร์, ระบบสคริปต์ส่งอีเมลเตือนการบ้าน, หรือระบบสำรองไฟล์รายงานขึ้นคลาวด์อัตโนมัติเมื่อเซฟงาน
            </div>
          </div>

          <div class="topic-block">
            <div class="topic-header">เรื่องที่ 6: วงรอบต่อเนื่องแบบไร้สิ้นสุด DevOps Lifecycle</div>
            <p style="font-size: 0.92rem; margin: 0">ขั้นตอนการทำงานในลูปอนันต์ (Infinity Loop) ของการส่งมอบบริการดิจิทัล:</p>

            <div class="lifecycle-grid">
              <div class="lifecycle-node">📋 Plan<span>วางแผนฟีเจอร์</span></div>
              <div class="lifecycle-node">💻 Code<span>เขียนโปรแกรม</span></div>
              <div class="lifecycle-node">🛠️ Build<span>ประกอบแพ็กเกจ</span></div>
              <div class="lifecycle-node">🧪 Test<span>ทดสอบความเสถียร</span></div>
              <div class="lifecycle-node">📦 Release<span>เตรียมไฟล์ปล่อยตัว</span></div>
              <div class="lifecycle-node">🚀 Deploy<span>อัปโหลดขึ้นเซิร์ฟเวอร์</span></div>
              <div class="lifecycle-node">⚙️ Operate<span>ดูแลระบบทำงาน</span></div>
              <div class="lifecycle-node">📊 Monitor<span>ติดตามสถิติและบั๊ก</span></div>
            </div>

            <div class="sub-section">
              <span class="type-badge" style="background: var(--tag-activity)">วิเคราะห์แอปพลิเคชันใหญ่</span>
              ให้นักศึกษาแบ่งกลุ่มวิเคราะห์แพลตฟอร์มระดับโลก เช่น <strong>Facebook, LINE หรือ YouTube</strong> ว่าในแต่ละวัน แพลตฟอร์มเหล่านี้กำลังทำขั้นตอนใดอยู่ใน Lifecycle นี้บ้าง?
            </div>
          </div>

          <div class="topic-block">
            <div class="topic-header">เรื่องที่ 7: ระบบนิเวศน์ซอฟต์แวร์ Collaboration Tools ในองค์กรไอทีชั้นนำ</div>
            <p style="font-size: 0.92rem; margin: 0">ตารางความเข้าใจบทบาทหน้าที่ของกลุ่มซอฟต์แวร์เครื่องมือจริงในสายงานอุตสาหกรรม:</p>

            <table class="custom-table">
              <thead>
                <tr>
                  <th>ประเภทกลุ่มเครื่องมือ</th>
                  <th>เครื่องมือมาตรฐานสากล (Industry Standard)</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><strong>Version Control System</strong></td>
                  <td><span style="color: #ef4444; font-weight: 600">Git</span> (ระบบควบคุมเวอร์ชันแกนหลัก)</td>
                </tr>
                <tr>
                  <td><strong>Source Code Cloud Hosting</strong></td>
                  <td><span style="color: #fff; font-weight: 600">GitHub</span> / GitLab</td>
                </tr>
                <tr>
                  <td><strong>Project & Agile Management</strong></td>
                  <td>Jira / GitHub Projects บอร์ดคัมบัน</td>
                </tr>
                <tr>
                  <td><strong>Knowledge Documentation</strong></td>
                  <td>Confluence / Notion / Wiki</td>
                </tr>
                <tr>
                  <td><strong>Container Platform</strong></td>
                  <td><span style="color: #38bdf8; font-weight: 600">Docker</span> / Docker Compose</td>
                </tr>
                <tr>
                  <td><strong>Automated CI/CD Pipeline</strong></td>
                  <td><span style="color: #22c55e; font-weight: 600">GitHub Actions</span> / Jenkins</td>
                </tr>
                <tr>
                  <td><strong>System Monitoring & Metrics</strong></td>
                  <td>Prometheus / Grafana Dashboard</td>
                </tr>
              </tbody>
            </table>

            <div class="sub-section">
              <span class="type-badge" style="background: var(--tag-activity)">ค้นคว้าด่วน (Micro-Research)</span>
              เลือกกลุ่มเครื่องมือมากลุ่มละ 1 ตัว ค้นข้อมูลจริงจากอินเทอร์เน็ต ส่งตัวแทนออกมาพรีเซนต์สั้นหน้าห้องเรียนคนละ 5 นาที
            </div>
          </div>
        </div>

        <div class="side-panel">
          <div class="dashboard-card" style="border-top: 4px solid var(--devops-primary)">
            <div class="card-title">🧪 ใบงานภาคปฏิบัติการประจำหน่วย (Labs)</div>

            <div style="background: #0f172a; padding: 15px; border-radius: 8px; margin-bottom: 15px; border: 1px solid var(--devops-border)">
              <span class="type-badge" style="background: var(--tag-practice)">LAB 1</span>
              <strong style="color: #fff; display: block; margin: 5px 0">การวิเคราะห์ความล้มเหลวของการทำงานทีม</strong>
              <p style="font-size: 0.85rem; color: var(--text-muted); margin: 5px 0 10px 0">
                <strong>สถานการณ์จำลอง:</strong> บริษัท ABC มีโปรแกรมเมอร์ 5 คน ทำงานร่วมกันโดยแชร์ไฟล์โปรเจกต์ส่งหากันผ่าน แฟลชไดร์ฟ USB, Google Drive ส่วนตัว และพิมพ์แนบไฟล์คุยกันทาง LINE Group
              </p>
              <span style="font-size: 0.85rem; color: #f59e0b; font-weight: 600">📝 สิ่งที่นักศึกษาต้องเขียนวิเคราะห์ลงใบงาน:</span>
              <ul style="font-size: 0.85rem; padding-left: 18px">
                <li>รายการปัญหาที่เกิดขึ้นแน่ๆ (ขั้นต่ำ 3 ข้อ)</li>
                <li>ผลกระทบเชิงธุรกิจและเวลา</li>
                <li>แนวทางแก้ไขเชิงระบบและเครื่องมือที่จะนำมาแก้ไข</li>
              </ul>
            </div>

            <div style="background: #0f172a; padding: 15px; border-radius: 8px; border: 1px solid var(--devops-border)">
              <span class="type-badge" style="background: var(--tag-practice)">LAB 2</span>
              <strong style="color: #fff; display: block; margin: 5px 0">การพังทลายของไฟล์เอกสารกลุ่มไร้เครื่องมือควบคุม</strong>
              <p style="font-size: 0.85rem; color: var(--text-muted); margin: 5px 0 10px 0">
                ให้นักศึกษาฟอร์มทีมกลุ่มละ 4 คน ร่วมกันเปิดแก้ไขพิมพ์หัวข้อเนื้อหา "ระบบยืมคืนอุปกรณ์" พร้อมๆ กัน โดยห้ามใช้โปรแกรม Cloud Sync แก้ไขสดๆ แล้วให้บันทึกคำตอบคำถามท้ายตาราง:
              </p>
              <ol style="font-size: 0.82rem; padding-left: 18px; color: #cbd5e1">
                <li>พบเจอปัญหาการเซฟทับหรือไม่?</li>
                <li>ใครเป็นคนแก้ไขส่วนใดบ้าง ทราบแน่ชัดไหม?</li>
                <li>มีข้อมูลที่เพื่อนเขียนหายไปหรือไม่?</li>
                <li>หากเปลี่ยนมาใช้ Git สถาบันนี้จะช่วยอะไร?</li>
              </ol>
            </div>
          </div>

          <div class="dashboard-card" style="border-top: 4px solid var(--tag-output)">
            <div class="card-title">💼 ภาระชิ้นงานส่งประเมินผล (Assignments)</div>
            <div style="font-size: 0.9rem">
              <div style="margin-bottom: 15px">
                <span class="type-badge" style="background: var(--tag-theory)">งานเดี่ยว</span>
                <strong style="color: #fff">DevOps Reflection Report</strong>
                <p style="font-size: 0.82rem; color: var(--text-muted); margin: 4px 0 0 0">
                  เขียนรายงานสรุปสะท้อนคิดความเข้าใจส่วนตัว ความยาว 2-3 หน้ากระดาษ (หัวข้อ: ความหมายของ DevOps, ความต่างกับ Agile, ความสำคัญของเครื่องมือเวอร์ชันคอนโทรล และผลกระทบหากไร้ Git)
                </p>
              </div>
              <div>
                <span class="type-badge" style="background: var(--tag-activity)">งานกลุ่ม</span>
                <strong style="color: #fff">DevOps Problem Analysis Presentation</strong>
                <p style="font-size: 0.82rem; color: var(--text-muted); margin: 4px 0 0 0">จัดทำสไลด์และรายงานโครงสร้างสรุปจากการวิเคราะห์กรณีศึกษา พร้อมนำเสนอหน้าชั้นเรียน กลุ่มละ 10 นาที</p>
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
                <tr>
                  <td>✏️ แบบทดสอบความรู้ก่อนเรียน</td>
                  <td style="text-align: right; font-weight: 700; color: var(--devops-primary)">5 คะแนน</td>
                </tr>
                <tr>
                  <td>💬 กิจกรรมการมีส่วนร่วมและอภิปรายในห้อง</td>
                  <td style="text-align: right; font-weight: 700; color: var(--devops-primary)">10 คะแนน</td>
                </tr>
                <tr>
                  <td>📋 ใบงานวิเคราะห์ผลการทดลอง Lab 1</td>
                  <td style="text-align: right; font-weight: 700; color: var(--devops-primary)">10 คะแนน</td>
                </tr>
                <tr>
                  <td>🧪 รายงานการตอบคำถามจำลองระบบ Lab 2</td>
                  <td style="text-align: right; font-weight: 700; color: var(--devops-primary)">10 คะแนน</td>
                </tr>
                <tr>
                  <td>📝 รายงานสรุปความรู้เดี่ยว (Reflection Report)</td>
                  <td style="text-align: right; font-weight: 700; color: var(--devops-primary)">10 คะแนน</td>
                </tr>
                <tr>
                  <td>🗣️ คะแนนทักษะการนำเสนอผลงานกลุ่ม</td>
                  <td style="text-align: right; font-weight: 700; color: var(--devops-primary)">5 คะแนน</td>
                </tr>
                <tr style="background: #0f172a; font-weight: 700; color: #fff">
                  <td>💯 รวมคะแนนประจำหน่วยที่ 1</td>
                  <td style="text-align: right; color: #10b981">50 คะแนน</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="dashboard-card" style="background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 100%); border: 1px solid var(--devops-primary); text-align: center; margin-top: 10px">
        <h4 style="color: #fff; margin: 0 0 10px 0; font-size: 1.1rem">🎓 ประตูบานแรกสู่โลกวิชาชีพ DevOps ได้เปิดขึ้นแล้ว</h4>
        <p style="margin: 0 auto; max-width: 900px; font-size: 0.9rem; color: var(--text-muted)">
          เมื่อนักศึกษาผ่านการศึกษาเรียนรู้และทำกิจกรรมในหน่วยที่ 1 ทั้งหมดนี้เรียบร้อยแล้ว ทุกคนจะต้องตอบคำถามหัวใจหลักข้อสำคัญเหล่านี้ได้ด้วยความมั่นใจ: <br />
          <span style="color: var(--devops-accent); font-weight: 600"
            >"ทำไมองค์กรต้องใช้ Git? ทำไมต้องเน้นทำงานร่วมกันเป็นทีม? DevOps ต่างจาก Agile อย่างไร? และเครื่องมือ Git, GitHub, Docker หรือ CI/CD
            จะเข้ามาพลิกโฉมแก้ไขความพังทลายของระบบซอฟต์แวร์ได้อย่างไร?"</span
          >
          เพื่อพร้อมก้าวเข้าสู่กระบวนการเขียนคำสั่ง Git ในหน่วยเรียนถัดไปได้อย่างมีเป้าหมาย
        </p>
      </div>
    </div>

    <script src="../assets/js/script.js"></script>
  </body>
</html>
