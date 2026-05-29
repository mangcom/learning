<?php
$base_dir = "../"; // ถอยกลับ 1 ชั้นไปที่ Root เพื่อให้เรียกคอมโพเนนต์ได้ถูกต้อง
$active_nav = "devops"; // ไฮไลต์เมนูที่วิชา DevOps
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน่วยที่ 1: DevOps คืออะไร และวัฒนธรรมการทำงาน</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">

    <style>
        @media (min-width: 992px) {
            main {
                display: flex !important;
                gap: 30px !important;
                align-items: flex-start !important;
            }

            .content-area {
                flex: 1 !important;
                min-width: 0 !important;
            }

            aside {
                width: 320px !important;
                flex-shrink: 0 !important;
            }
        }
    </style>
</head>

<body style="background-color: #f8fafc;">

    <?php include '../components/navbar.php'; ?>

    <div class="page-header" style="background: #0f172a; color: #fff; padding: 40px 0 65px 0; border-bottom: 4px solid #7c3aed;">
        <div class="container">
            <a href="index.php" class="back-link" style="color: #c4b5fd; text-decoration: none; display: inline-block; margin-bottom: 15px;">
                <span class="arrow-icon">⬅</span> <span>กลับสู่หน้าหลักวิชา DevOps</span>
            </a>
            <div>
                <span class="course-code" style="background: #7c3aed; color: #fff; padding: 4px 12px; border-radius: 4px; font-weight: 600; font-size: 0.9rem;">หน่วยที่ 1 (สัปดาห์ที่ 1)</span>
                <h2 style="margin: 10px 0 5px 0; font-size: 1.8rem; font-weight: 700;">DevOps คืออะไร และวัฒนธรรมการทำงาน</h2>
                <p style="color: #e2e8f0; margin: 0; font-size: 0.95rem;">ทำความเข้าใจรากเหง้าปัญหาการพัฒนาซอฟต์แวร์ กำแพงแห่งความสับสนระหว่างทีม Dev และ Ops สู่การหลอมรวมวัฒนธรรมการทำงานและวงจรชีวิตแบบ DevOps</p>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 30px;">
        <main>
            <div class="content-area">

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 30px;">
                    <h3 class="section-title" style="color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">📘 ภาคทฤษฎี: วิวัฒนาการของการพัฒนาซอฟต์แวร์</h3>

                    <h4>1. ปัญหาการพัฒนาแบบดั้งเดิม (The Wall of Confusion)</h4>
                    <p>ทำไมโปรแกรมเมอร์ (Developer) กับผู้ดูแลระบบ (Operations) จึงมักมีปัญหากัน? คำตอบคือ <strong>เป้าหมายการทำงานที่ขัดแย้งกันอย่างสิ้นเชิง</strong>:</p>
                    <ul style="padding-left: 20px; margin-bottom: 20px;">
                        <li><strong>ทีม Development (Dev):</strong> ถูกประเมินผลงานจาก "ความรวดเร็วในการออกฟีเจอร์ใหม่" จึงต้องการการเปลี่ยนแปลง (Change) อยู่ตลอดเวลา</li>
                        <li><strong>ทีม Operations (Ops):</strong> ถูกประเมินผลงานจาก "ความเสถียรของระบบ (Uptime)" จึงเกลียดการเปลี่ยนแปลง เพราะทุกครั้งที่มีการอัปเดตโค้ด ระบบมักจะพัง</li>
                    </ul>
                    <p>เมื่อ Dev เขียนโค้ดเสร็จ ก็จะ "โยนข้ามกำแพง (Throw over the wall)" ไปให้ Ops นำไปติดตั้ง โดยไม่สนใจว่าโค้ดนั้นจะรันบนเซิร์ฟเวอร์จริงได้หรือไม่ เกิดเป็น <em>"กำแพงแห่งความสับสน (Wall of Confusion)"</em></p>

                    <h4 style="margin-top: 25px;">2. Waterfall vs Agile vs DevOps</h4>
                    <table class="grading-table" style="margin: 15px 0; background: #f8fafc; width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr style="background: #e2e8f0;">
                                <th style="padding: 10px; width: 20%; text-align: center;">ยุคสมัย</th>
                                <th style="padding: 10px; width: 35%;">ลักษณะการทำงาน</th>
                                <th style="padding: 10px;">จุดอ่อนสำคัญ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="border-bottom: 1px solid #cbd5e1;">
                                <td style="text-align: center; font-weight: 600; color: #475569;">Waterfall</td>
                                <td>ทำทีละขั้นตอน (เก็บ Requirement ➔ Design ➔ Code ➔ Test ➔ Deploy) ต้องรอให้จบเป็นเฟส</td>
                                <td>ช้ามาก หากลูกค้าเปลี่ยนใจกลางทาง จะแก้สถาปัตยกรรมแทบไม่ได้เลย และมักพบความล้มเหลวในตอนจบโปรเจกต์ทีเดียว</td>
                            </tr>
                            <tr style="border-bottom: 1px solid #cbd5e1;">
                                <td style="text-align: center; font-weight: 600; color: #3b82f6;">Agile</td>
                                <td>ซอยงานเป็นชิ้นเล็กๆ (Sprint 1-2 สัปดาห์) เน้นความยืดหยุ่น ปรับเปลี่ยนตามฟีดแบ็คลูกค้าได้ตลอด</td>
                                <td>แก้ปัญหาฝั่ง Dev ได้เร็วขึ้น <strong>แต่ Ops ยังคงทำงานแบบเดิม</strong> ทำให้โค้ดที่เสร็จเร็ว ไปกองคอขวดอยู่ที่รอ Deploy</td>
                            </tr>
                            <tr>
                                <td style="text-align: center; font-weight: 600; color: #7c3aed;">DevOps</td>
                                <td>ทลายกำแพงระหว่าง Dev และ Ops ใช้เครื่องมืออัตโนมัติมาช่วยให้วงจรส่งมอบโค้ดลื่นไหลตั้งแต่ต้นจนจบ</td>
                                <td>ต้องอาศัยการปรับตัวทาง "วัฒนธรรมองค์กร" อย่างหนัก หากเปลี่ยนแต่ Tool แต่คนไม่เปลี่ยน ก็ไม่สำเร็จ</td>
                            </tr>
                        </tbody>
                    </table>
                </section>

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 30px;">
                    <h3 class="section-title" style="color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">🔄 วงจรชีวิตและวัฒนธรรม DevOps</h3>

                    <h4>1. DevOps Lifecycle (วงจรหมายเลข 8 อันเป็นนิรันดร์)</h4>
                    <p>DevOps ไม่ใช่ตำแหน่งงาน แต่เป็น <strong>"แนวปฏิบัติ (Practices)"</strong> ที่ประกอบกันเป็นวงจรต่อเนื่องไม่มีที่สิ้นสุด (Infinite Loop):</p>


                    <div class="step-box" style="margin: 20px 0; background: #faf5ff; padding: 20px; border-radius: 8px; border: 1px solid #e9d5ff;">
                        <ul style="list-style-type: none; padding: 0; margin: 0;">
                            <li style="padding-bottom: 10px; border-bottom: 1px dashed #d8b4fe;"><strong style="color: #7c3aed;">ฝั่ง Development (สร้างสรรค์):</strong> Plan (วางแผน) ➔ Code (เขียนโค้ด) ➔ Build (ประกอบร่าง) ➔ Test (ทดสอบอัตโนมัติ)</li>
                            <li style="padding-top: 10px;"><strong style="color: #0284c7;">ฝั่ง Operations (นำไปใช้):</strong> Release (พร้อมปล่อย) ➔ Deploy (ติดตั้งขึ้นโปรดักชัน) ➔ Operate (ดูแลระบบ) ➔ Monitor (เฝ้าระวังและเก็บสถิติกลับไป Plan ใหม่)</li>
                        </ul>
                    </div>

                    <h4 style="margin-top: 25px;">2. วัฒนธรรมองค์กรแบบ CALMS Framework</h4>
                    <p>หัวใจที่แท้จริงของ DevOps คือวัฒนธรรมองค์กร ไม่ใช่แค่การใช้ Docker หรือ Git โดยวัดจากหลักการ 5 ประการ:</p>
                    <ul style="padding-left: 20px;">
                        <li><strong>C - Culture (วัฒนธรรม):</strong> เปิดใจยอมรับความผิดพลาด ทลายกำแพงแผนก มีความรับผิดชอบร่วมกัน (Shared Responsibility)</li>
                        <li><strong>A - Automation (อัตโนมัติ):</strong> สิ่งไหนที่ต้องทำซ้ำๆ ด้วยมือคน ให้ใช้สคริปต์ทำแทนทั้งหมด (CI/CD, IaC)</li>
                        <li><strong>L - Lean (กระชับ):</strong> ลดขั้นตอนที่สูญเปล่า หั่นงานเป็นชิ้นเล็กๆ เพื่อให้ส่งมอบและแก้ไขได้รวดเร็ว</li>
                        <li><strong>M - Measurement (การวัดผล):</strong> ตัดสินใจด้วย Data เช่น ความเร็วในการ Deploy, จำนวนข้อผิดพลาด (Bugs)</li>
                        <li><strong>S - Sharing (การแบ่งปัน):</strong> มีระบบ Feedback Loop ที่ดี แลกเปลี่ยนความรู้ข้ามแผนกสม่ำเสมอ</li>
                    </ul>
                </section>

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0;">
                    <h3 class="section-title" style="color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">💻 ภาคปฏิบัติ: ตั้งไข่โครงงานวิจัย (Project Charter Formulation)</h3>

                    <div class="analogy-box" style="background: #eff6ff; border-left: 4px solid #3b82f6; padding: 15px; margin-bottom: 20px;">
                        <strong>🎯 กติกาหลักของรายวิชา (Project-Based DevOps Learning):</strong><br>
                        <span style="font-size: 0.95rem; color: #334155;">ตลอด 15 สัปดาห์นี้ นักศึกษาจะไม่ได้แค่จำลองเซิร์ฟเวอร์เล่นๆ แต่จะต้อง <strong>"สร้างแอปพลิเคชันจริง 1 ระบบ"</strong> และใช้กระบวนการ DevOps ห่อหุ้มมันตั้งแต่ต้นจนจบ</span>
                    </div>

                    <h4 style="margin-top: 15px;">ขั้นตอนที่ 1: การแบ่งกลุ่มและรับบทบาท (Team Setup)</h4>
                    <p>ให้นักศึกษาแบ่งกลุ่ม กลุ่มละ <strong>3-5 คน</strong> โดยต้องตกลงกันว่าใครจะรับบทบาทหลักในด้านใด (แม้สุดท้ายทุกคนจะต้องทำเป็นทุกอย่างก็ตาม):</p>
                    <ul>
                        <li><strong>Developer:</strong> เน้นเขียนโค้ด (PHP/Node.js/HTML/CSS) และทำ Unit Test</li>
                        <li><strong>QA / Tester:</strong> เน้นเขียนสคริปต์ทดสอบ และตรวจสอบคุณภาพซอร์สโค้ด (SonarQube)</li>
                        <li><strong>Ops / Cloud Engineer:</strong> เน้นคุมเซิร์ฟเวอร์ Linux, Docker และมอนิเตอร์ระบบ</li>
                    </ul>

                    <h4 style="margin-top: 25px;">ขั้นตอนที่ 2: ร่างข้อเสนอโครงการ (Drafting Project Charter)</h4>
                    <p>ให้แต่ละกลุ่มเลือกพัฒนาระบบซอฟต์แวร์ 1 ระบบ (เช่น <em>ระบบยืม-คืนอุปกรณ์, ระบบแจ้งซ่อม IT, ระบบจองห้องประชุม</em>) และจัดทำเอกสาร Project Proposal ส่งอาจารย์ท้ายคาบ โดยต้องมีหัวข้อดังนี้:</p>

                    <div class="code-window" style="background: #0f172a; color: #38bdf8; padding: 15px; border-radius: 8px; font-family: monospace; font-size: 0.95rem;">
                        <strong>[แบบฟอร์มร่างเอกสาร Project Charter]</strong><br><br>
                        1. ชื่อระบบ (Project Name): ............................................<br>
                        2. วัตถุประสงค์ (Objectives): ระบบนี้สร้างขึ้นมาแก้ปัญหาอะไร?<br>
                        3. กลุ่มผู้ใช้งานเป้าหมาย (Target Users): ใครคือผู้ใช้? (เช่น นักศึกษา, แอดมิน, ภารโรง)<br>
                        4. ขอบเขตการทำงานเบื้องต้น (Scope): ทำอะไรได้บ้าง? (เช่น Login ได้, เพิ่มลบข้อมูลได้, ออกรายงานได้)<br>
                        5. ภาษาและเฟรมเวิร์กที่คาดว่าจะใช้ (Tech Stack): (เช่น HTML, Bootstrap, PHP, MySQL)
                    </div>
                </section>
            </div>

            <aside>
                <div class="sidebar-card" style="background: #fff; padding: 20px; border-radius: 8px; border: 1px solid #e2e8f0; margin-bottom: 20px;">
                    <h4 style="margin-top: 0; margin-bottom: 12px; font-size: 1.1rem; font-weight: 700; color: #1e293b;">📋 ข้อมูลประจำหน่วย</h4>
                    <p style="font-size: 0.9rem; color: #475569; line-height: 1.6; margin: 0;">
                        <strong>สัปดาห์ที่:</strong> 1<br>
                        <strong>เวลาเรียน:</strong> 5 ชั่วโมง (ทฤษฎี 1, ปฏิบัติ 4)<br>
                        <strong>เกณฑ์การประเมิน:</strong> <br>
                        - การมีส่วนร่วมในการอภิปรายปัญหาแบบดั้งเดิม (2 คะแนน)<br>
                        - ความสมบูรณ์ของเอกสาร Project Charter ประจำกลุ่ม (8 คะแนน)
                    </p>
                </div>

                <div class="sidebar-card" style="background: #fff; padding: 20px; border-radius: 8px; border: 1px solid #e2e8f0; border-left: 4px solid #f59e0b;">
                    <h4 style="margin-top: 0; margin-bottom: 12px; font-size: 1.1rem; font-weight: 700; color: #d97706;">💡 ข้อคิดประจำสัปดาห์</h4>
                    <p style="font-size: 0.85rem; color: #64748b; line-height: 1.5; margin: 0;">
                        <em>"DevOps is not a Tool. It's a Culture."</em><br><br>
                        เครื่องมืออย่าง Docker, Jenkins, หรือ Git เป็นเพียงตัวขับเคลื่อน แต่สิ่งที่สำคัญที่สุดคือ "คน" และ "การสื่อสาร" หากซื้อเครื่องมือราคาแพงมาใช้ แต่แผนก Dev และ Ops ยังคงด่าทอกันและโยนความผิดให้กัน องค์กรนั้นก็ไม่มีทางประสบความสำเร็จในการทำ DevOps ได้ครับ
                    </p>
                </div>
            </aside>
        </main>
    </div>

    <script src="../assets/js/script.js"></script>
</body>

</html>