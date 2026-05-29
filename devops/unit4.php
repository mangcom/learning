<?php
$base_dir = "../"; // ถอยกลับ 1 ชั้นไปที่ Root เพื่อให้เรียกคอมโพเนนต์ได้ถูกต้อง
$active_nav = "devops"; // ไฮไลต์เมนูที่วิชา DevOps
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน่วยที่ 4: Git และ Version Control</title>
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
                <span class="course-code" style="background: #7c3aed; color: #fff; padding: 4px 12px; border-radius: 4px; font-weight: 600; font-size: 0.9rem;">หน่วยที่ 4 (สัปดาห์ที่ 4)</span>
                <h2 style="margin: 10px 0 5px 0; font-size: 1.8rem; font-weight: 700;">Git และ Version Control</h2>
                <p style="color: #e2e8f0; margin: 0; font-size: 0.95rem;">เรียนรู้การบันทึกประวัติการพัฒนาซอฟต์แวร์อย่างเป็นระบบ ทลายปัญหาโค้ดหาย โค้ดทับกัน และสร้างรากฐานของกระบวนการ CI/CD ด้วย Git</p>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 30px;">
        <main>
            <div class="content-area">

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 30px;">
                    <h3 class="section-title" style="color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">📘 ภาคทฤษฎี: แนวคิดระบบควบคุมเวอร์ชัน (Version Control)</h3>

                    <h4>1. ทำไมต้องใช้ Version Control?</h4>
                    <p>ในอดีต เวลาเราแก้โค้ดเรามักสร้างโฟลเดอร์ซ้ำๆ เช่น <code>project_v1</code>, <code>project_v2_final</code>, <code>project_v2_final_real</code> ซึ่งก่อให้เกิดความสับสน ไฟล์หาย หรือไม่รู้ว่าใครแก้ไขอะไรไปตอนไหน ระบบ **Distributed Version Control (เช่น Git)** จึงเข้ามาแก้ปัญหานี้ โดยมันจะบันทึกทุกการเปลี่ยนแปลงเป็นประวัติย้อนหลังเหมือน "ไทม์แมชชีน"</p>

                    <h4 style="margin-top: 25px;">2. พื้นที่การทำงาน 3 ส่วนของ Git (Git Workflow)</h4>
                    <p>ก่อนที่ไฟล์จะถูกบันทึกประวัติอย่างถาวรใน Git มันจะต้องเดินทางผ่าน 3 สถานะหลักๆ เสมอ:</p>

                    <ul style="padding-left: 20px; margin-bottom: 20px; line-height: 1.6;">
                        <li><strong>Working Directory:</strong> โฟลเดอร์งานปัจจุบันที่เรากำลังเปิดเขียนโค้ด (ไฟล์ที่เพิ่งสร้างหรือแก้ไขใหม่จะอยู่ที่นี่)</li>
                        <li><strong>Staging Area:</strong> พื้นที่เตรียมตัว เปรียบเสมือน "ตะกร้าสินค้า" ที่เราเลือกเฉพาะไฟล์ที่พร้อมจะจ่ายเงินหรือบันทึกประวัติ</li>
                        <li><strong>Local Repository:</strong> คลังเก็บโค้ดในเครื่องของเรา เมื่อบันทึก (Commit) แล้ว โค้ดจะถูกเก็บไว้ที่นี่อย่างถาวรพร้อมรหัสแฮช (SHA-1)</li>
                    </ul>

                    <h4 style="margin-top: 25px;">3. แนวคิดคำศัพท์สำคัญประจำหน่วย</h4>
                    <table class="grading-table" style="margin: 15px 0; background: #f8fafc; width: 100%; border-collapse: collapse; font-size: 0.95rem;">
                        <thead>
                            <tr style="background: #e2e8f0;">
                                <th style="padding: 10px; width: 25%; text-align: center;">คำศัพท์</th>
                                <th style="padding: 10px;">ความหมายในเชิงระบบ DevOps</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="border-bottom: 1px solid #cbd5e1;">
                                <td style="text-align: center; font-weight: 600; color: #7c3aed;">Repository</td>
                                <td>คลังหรือฐานข้อมูลหลักที่ใช้จัดเก็บประวัติ ซอร์สโค้ด และการเปลี่ยนแปลงทั้งหมดของโปรเจกต์</td>
                            </tr>
                            <tr style="border-bottom: 1px solid #cbd5e1;">
                                <td style="text-align: center; font-weight: 600; color: #7c3aed;">Commit</td>
                                <td>การสร้างจุดบันทึกประวัติ (Snapshot) เสมือนการเซฟเกม โดยต้องแนบข้อความอธิบาย (Commit Message) เสมอ</td>
                            </tr>
                            <tr>
                                <td style="text-align: center; font-weight: 600; color: #7c3aed;">Branch</td>
                                <td>การแยกเส้นทางการพัฒนาโค้ดออกจากกันเป็นกิ่งก้าน (เช่น กิ่ง <code>main</code> สำหรับโค้ดที่รันจริง และ <code>feature/login</code> สำหรับทดลองสร้างระบบล็อกอินใหม่) เพื่อไม่ให้กระทบกัน</td>
                            </tr>
                        </tbody>
                    </table>
                </section>

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 30px;">
                    <h3 class="section-title" style="color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">💻 ภาคปฏิบัติ: ควบคุมประวัติซอร์สโค้ดผ่าน Git CLI</h3>

                    <p>ให้นักศึกษาแต่ละกลุ่มเปิดโปรแกรม Terminal/Git Bash ในโฟลเดอร์โปรเจกต์ที่ทำร่วมกัน เพื่อฝึกฝนลูปการทำงานเริ่มต้นส่งโค้ดขึ้น GitHub</p>

                    <h4 style="margin-top: 15px;">6 คำสั่งสากลที่ชาว DevOps ต้องจำขึ้นใจ</h4>

                    <div class="code-window" style="background: #0f172a; color: #f8fafc; padding: 20px; border-radius: 8px; font-family: monospace; font-size: 0.95rem; margin-top: 10px; overflow-x: auto; line-height: 1.6;">
                        <span style="color: #60a5fa;"># 1. ประกาศสร้างคลัง Git ใหม่ในโฟลเดอร์ปัจจุบัน</span><br>
                        <span style="color: #a7f3d0;">git init</span><br><br>

                        <span style="color: #60a5fa;"># 2. ย้ายไฟล์เข้าไปรอที่ Staging Area (เลือกเฉพาะไฟล์ที่พร้อม)</span><br>
                        <span style="color: #a7f3d0;">git add index.php</span> <span style="color: #94a3b8;">// แอดเฉพาะไฟล์เดียว</span><br>
                        <span style="color: #a7f3d0;">git add .</span> <span style="color: #94a3b8;">// แอดไฟล์ทั้งหมดที่มีการเปลี่ยนแปลง</span><br><br>

                        <span style="color: #60a5fa;"># 3. บันทึกประวัติลงเครื่อง พร้อมเขียนข้อความอธิบายแบบกระชับและได้ใจความ</span><br>
                        <span style="color: #a7f3d0;">git commit -m "feat: add user login form interface"</span><br><br>

                        <span style="color: #60a5fa;"># 4. ตรวจสอบสถานะปัจจุบันของไฟล์ในโปรเจกต์</span><br>
                        <span style="color: #a7f3d0;">git status</span><br><br>

                        <span style="color: #60a5fa;"># 5. ส่งประวัติโค้ดจากเครื่อง Local ขึ้นไปยัง GitHub (Cloud Server)</span><br>
                        <span style="color: #a7f3d0;">git push origin main</span><br><br>

                        <span style="color: #60a5fa;"># 6. ดึงโค้ดล่าสุดที่เพื่อนในกลุ่มอัปเดตกลับลงมาที่เครื่องคอมพิวเตอร์ของเรา</span><br>
                        <span style="color: #a7f3d0;">git pull origin main</span>
                    </div>
                </section>

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0;">
                    <h3 class="section-title" style="color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">🏆 ใบงานปฏิบัติการ: Commit Log Challenge</h3>

                    <div class="analogy-box" style="background: #faf5ff; border-left: 4px solid #7c3aed; padding: 15px; margin-bottom: 20px;">
                        <strong>🎯 โจทย์ภารกิจกลุ่มประจำสัปดาห์:</strong><br>
                        <span style="font-size: 0.95rem; color: #475569;">เพื่อจำลองการทำงานเป็นทีมร่วมกันผ่านเครื่องมือ Version Control ให้นักศึกษาทุกคนในกลุ่มร่วมกันสร้างคลังประวัติของโปรเจกต์ให้ถูกต้องตามกฎสากล</span>
                    </div>

                    <h4 style="margin-top: 15px;">ข้อกำหนดและเงื่อนไขการส่งใบงาน:</h4>
                    <ol style="padding-left: 20px; line-height: 1.7; margin-bottom: 0;">
                        <li>ให้นักศึกษาในกลุ่มสลับกันแก้ไฟล์โค้ดของโครงงานตนเอง แล้วทำกระบวนการ <code>add</code> ➔ <code>commit</code> ➔ <code>push</code> ➔ <code>pull</code> ร่วมกัน</li>
                        <li><strong>กฎเหล็กการเขียนข้อความ:</strong> ห้ามส่ง Commit Message ลอยๆ เช่น "edit", "update", "แก้โค้ด" โดยเด็ดขาด! ให้เปลี่ยนมาเขียนตามโครงสร้างแบบ <strong>Conventional Commits</strong> เช่น:<br>
                            - <code>feat: ...</code> สำหรับการเพิ่มฟีเจอร์ใหม่<br>
                            - <code>fix: ...</code> สำหรับการแก้ไขบั๊กหรือข้อผิดพลาด<br>
                            - <code>docs: ...</code> สำหรับการเขียนอธิบายเอกสาร/คอมเมนต์
                        </li>
                        <li>เมื่อทำเสร็จ ท้ายคาบในคลัง GitHub ของกลุ่มจะต้องมีจำนวนประวัติบันทึกการส่งงาน <strong>(Total Commits) ไม่น้อยกว่า 10 ข้อความ</strong> และต้องกระจายยอดส่งงานโดยมีชื่อสมาชิกในกลุ่มทุกคนปรากฏอยู่</li>
                        <li>ส่งลิงก์ URL ของ GitHub Repository กลุ่มเข้าสู่ระบบจัดการเรียนรู้เพื่อรับคะแนน</li>
                    </ol>
                </section>
            </div>

            <aside>
                <div class="sidebar-card" style="background: #fff; padding: 20px; border-radius: 8px; border: 1px solid #e2e8f0; margin-bottom: 20px;">
                    <h4 style="margin-top: 0; margin-bottom: 12px; font-size: 1.1rem; font-weight: 700; color: #1e293b;">📋 ข้อมูลประจำหน่วย</h4>
                    <p style="font-size: 0.9rem; color: #475569; line-height: 1.6; margin: 0;">
                        <strong>สัปดาห์ที่:</strong> 4<br>
                        <strong>เวลาเรียน:</strong> 5 ชั่วโมง (ทฤษฎี 1, ปฏิบัติ 4)<br>
                        <strong>เกณฑ์การประเมิน:</strong> <br>
                        - ความถูกต้องของโครงสร้างไฟล์และไฟล์ <code>.gitignore</code> (2 คะแนน)<br>
                        - ความเรียบร้อยและการใช้รูปแบบ Conventional Commits บนประวัติบอร์ด (4 คะแนน)<br>
                        - จำนวน Commit ครบตามเกณฑ์และมีการแชร์งานร่วมกันจริงในกลุ่ม (4 คะแนน)
                    </p>
                </div>

                <div class="sidebar-card" style="background: #fff; padding: 20px; border-radius: 8px; border: 1px solid #e2e8f0; border-left: 4px solid #f59e0b;">
                    <h4 style="margin-top: 0; margin-bottom: 12px; font-size: 1.1rem; font-weight: 700; color: #d97706;">💡 เคล็ดลับชาว DevOps</h4>
                    <p style="font-size: 0.85rem; color: #64748b; line-height: 1.5; margin: 0;">
                        อย่าลืมสร้างไฟล์ลึกลับที่ชื่อว่า <strong><code>.gitignore</code></strong> ไว้ที่หน้าแรกของโปรเจกต์เสมอ!<br><br>
                        ไฟล์นี้มีหน้าที่คอยบอก Git ว่าห้ามดึงไฟล์ประเภทใดขึ้นคลาวด์ เช่น ไฟล์การตั้งค่ารหัสผ่านส่วนตัว (<code>config.php</code> ที่เก็บรหัสผ่านจริง) หรือโฟลเดอร์ขยะของระบบ เพราะนอกจากจะทำให้โปรเจกต์หนักแล้ว ยังเสี่ยงต่อการทำข้อมูลความลับรั่วไหลสู่สาธารณะอีกด้วยครับ
                    </p>
                </div>
            </aside>
        </main>
    </div>

    <script src="../assets/js/script.js"></script>
</body>

</html>