<?php
$base_dir = "../"; // ถอยกลับ 1 ชั้นไปที่ Root เพื่อให้เรียกคอมโพเนนต์ได้ถูกต้อง
$active_nav = "devops"; // ไฮไลต์เมนูที่วิชา DevOps
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน่วยที่ 6: Software Quality Engineering (QA)</title>
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
                <span class="course-code" style="background: #7c3aed; color: #fff; padding: 4px 12px; border-radius: 4px; font-weight: 600; font-size: 0.9rem;">หน่วยที่ 6 (สัปดาห์ที่ 6)</span>
                <h2 style="margin: 10px 0 5px 0; font-size: 1.8rem; font-weight: 700;">Software Quality Engineering (QA)</h2>
                <p style="color: #e2e8f0; margin: 0; font-size: 0.95rem;">ทำความเข้าใจมิติของคุณภาพซอฟต์แวร์ หนี้สินทางเทคนิค (Technical Debt) กลยุทธ์ Test Pyramid และการสแกนหา Code Smell ด้วย SonarQube</p>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 30px;">
        <main>
            <div class="content-area">

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 30px;">
                    <h3 class="section-title" style="color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">📘 ภาคทฤษฎี: คุณภาพซอฟต์แวร์ และหนี้สินทางเทคนิค</h3>

                    <h4>1. คุณภาพซอฟต์แวร์ (Software Quality) คืออะไร?</h4>
                    <p>ซอฟต์แวร์ที่มีคุณภาพ ไม่ใช่แค่ "รันได้และไม่พัง" แต่มันต้องตอบโจทย์ผู้ใช้ ทำงานได้รวดเร็ว ปลอดภัย และที่สำคัญคือ <strong>ต้องแก้ไขหรือต่อยอดในอนาคตได้ง่าย (Maintainability)</strong></p>

                    <h4 style="margin-top: 25px;">2. Bug vs Defect ความเหมือนที่แตกต่าง</h4>
                    <ul style="padding-left: 20px; line-height: 1.6; margin-bottom: 20px;">
                        <li><strong>Bug (แมลงรบกวน):</strong> ความผิดพลาดในระดับ "ซอร์สโค้ด" ที่เกิดจากโปรแกรมเมอร์ (เช่น เขียนสูตรคำนวณผิด พิมพ์ชื่อตัวแปรผิด) มักจะถูกเจอในขั้นตอนการทดสอบ (Testing)</li>
                        <li><strong>Defect (ความบกพร่อง):</strong> ความผิดพลาดที่หลุดรอดไปถึงมือลูกค้า หรือระบบทำงานไม่ตรงตามความต้องการ (Requirement) ของผู้ใช้ (เช่น ระบบล็อกอินทำงานได้ปกติ แต่ลูกค้าต้องการให้ล็อกอินด้วย Google ได้ด้วย ซึ่งเราไม่ได้ทำ)</li>
                    </ul>

                    <h4 style="margin-top: 25px;">3. หนี้สินทางเทคนิค (Technical Debt)</h4>
                    <p><em>"เดี๋ยวเขียนโค้ดลวกๆ ไปก่อน ให้งานมันเสร็จทันส่งก็พอ ค่อยกลับมาแก้ทีหลัง..."</em></p>
                    <p>นี่คือจุดเริ่มต้นของหนี้สินทางเทคนิค! การเขียนโค้ดที่ไม่มีโครงสร้าง ไม่อธิบายคอมเมนต์ หรือการก๊อปปี้โค้ดมาวางซ้ำๆ เปรียบเสมือนการ "กู้เงิน" มาเพื่อให้ซอฟต์แวร์ออกตลาดได้เร็ว แต่คุณจะต้องจ่าย "ดอกเบี้ย" ในรูปแบบของการแก้ไขบั๊กที่ยากขึ้นเรื่อยๆ จนวันหนึ่งระบบอาจล่มสลายและต้องเขียนใหม่ทั้งหมด (Rewrite)</p>
                </section>

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 30px;">
                    <h3 class="section-title" style="color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">📐 ภาคทฤษฎี: พีระมิดการทดสอบ (Test Pyramid)</h3>

                    <p>การจะทดสอบซอฟต์แวร์ทั้งระบบด้วยการ "คลิกหน้าจอ (Manual Test)" ทุกครั้งที่แก้โค้ด เป็นเรื่องที่เสียเวลาและมีโอกาสพลาดสูงมาก วงการ QA จึงใช้แนวคิด <strong>Test Pyramid</strong> เพื่อวางกลยุทธ์การเขียนสคริปต์ทดสอบอัตโนมัติ (Automated Testing)</p>



                    <table class="grading-table" style="margin: 20px 0 15px 0; background: #f8fafc; width: 100%; border-collapse: collapse; font-size: 0.95rem;">
                        <thead>
                            <tr style="background: #e2e8f0;">
                                <th style="padding: 10px; width: 25%; text-align: center;">ระดับ (Level)</th>
                                <th style="padding: 10px; width: 15%; text-align: center;">ความเร็ว</th>
                                <th style="padding: 10px;">ลักษณะการทดสอบ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="border-bottom: 1px solid #cbd5e1;">
                                <td style="text-align: center; font-weight: 600; color: #3b82f6;">UI / End-to-End<br>(ยอดพีระมิด)</td>
                                <td style="text-align: center; color: #ef4444;">ช้าที่สุด</td>
                                <td>จำลองพฤติกรรมผู้ใช้จริง (เช่น ให้บอทเปิดเบราว์เซอร์ กรอกรหัส แล้วกดปุ่ม) พังง่ายเมื่อหน้าเว็บเปลี่ยน ควรมีจำนวนน้อยที่สุด</td>
                            </tr>
                            <tr style="border-bottom: 1px solid #cbd5e1;">
                                <td style="text-align: center; font-weight: 600; color: #10b981;">Integration<br>(กลางพีระมิด)</td>
                                <td style="text-align: center; color: #f59e0b;">ปานกลาง</td>
                                <td>ทดสอบการเชื่อมต่อระหว่างระบบ เช่น โค้ดของเราเชื่อมต่อและดึงข้อมูลจาก Database หรือ API ภายนอกได้ถูกต้องหรือไม่</td>
                            </tr>
                            <tr>
                                <td style="text-align: center; font-weight: 600; color: #7c3aed;">Unit Test<br>(ฐานพีระมิด)</td>
                                <td style="text-align: center; color: #10b981;">เร็วที่สุด</td>
                                <td>ทดสอบโค้ดชิ้นเล็กๆ (ฟังก์ชันย่อย) ว่าทำงานถูกต้องหรือไม่โดยไม่ต้องต่อฐานข้อมูล ควรมีจำนวนมากที่สุดเพื่อความครอบคลุม (Coverage)</td>
                            </tr>
                        </tbody>
                    </table>
                </section>

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 30px;">
                    <h3 class="section-title" style="color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">💻 ภาคปฏิบัติ: วิเคราะห์โค้ดด้วย SonarLint / SonarQube</h3>

                    <p><strong>Code Smell (โค้ดมีกลิ่นตุๆ)</strong> คือลักษณะการเขียนโค้ดที่ไม่ได้ทำให้โปรแกรมพัง (ทำงานได้ปกติ) แต่อ่านยาก ซ้ำซ้อน และเสี่ยงที่จะกลายเป็น Bug ในอนาคต เราจะใช้เครื่องมือตรวจสอบอัตโนมัติ (Static Code Analysis) มาช่วยดมกลิ่นเหล่านี้</p>

                    <h4 style="margin-top: 15px;">ขั้นตอนการตรวจสอบคุณภาพโค้ดบน VS Code:</h4>
                    <ol style="padding-left: 20px; line-height: 1.7;">
                        <li>เปิดโปรเจกต์ของกลุ่มในโปรแกรม <strong>VS Code (Visual Studio Code)</strong></li>
                        <li>ไปที่แถบ Extensions ค้นหาและติดตั้ง <strong>SonarLint</strong></li>
                        <li>เมื่อเปิดไฟล์โค้ด (เช่น <code>.php</code>, <code>.js</code>) SonarLint จะสแกนไฟล์โดยอัตโนมัติ และขีดเส้นใต้สีเหลือง/แดง ตรงจุดที่มีปัญหา</li>
                        <li>กดเอาเมาส์ไปชี้ตรงเส้นใต้ (หรือเปิดพาเนล Problems) เครื่องมือจะอธิบายว่า <em>ทำไมโค้ดนี้ถึงไม่ดี?</em> และ <em>วิธีแก้ที่ถูกต้องคืออะไร?</em></li>
                    </ol>

                    <div class="code-window" style="background: #0f172a; color: #f8fafc; padding: 15px; border-radius: 8px; font-family: monospace; font-size: 0.95rem; margin-top: 15px; border-left: 4px solid #ef4444;">
                        <span style="color: #94a3b8;">// ตัวอย่าง Code Smell (ตัวแปรที่ประกาศแล้วไม่ได้ใช้งาน)</span><br>
                        <span style="color: #c792ea;">function</span> <span style="color: #82aaff;">calculateTax</span>(<span style="color: #f78c6c;">$price</span>) {<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #f78c6c;">$taxRate</span> = <span style="color: #f78c6c;">0.07</span>; <span style="color: #ef4444;">// ❌ SonarLint จะเตือน: Remove this unused "$taxRate" local variable.</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #c792ea;">return</span> <span style="color: #f78c6c;">$price</span> * <span style="color: #f78c6c;">1.07</span>;<br>
                        }
                    </div>
                </section>

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0;">
                    <h3 class="section-title" style="color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">📝 ใบงานปฏิบัติการ: Code Quality Audit Report</h3>

                    <div class="analogy-box" style="background: #eff6ff; border-left: 4px solid #3b82f6; padding: 15px; margin-bottom: 20px;">
                        <strong>🎯 ภารกิจกลุ่ม: ผู้พิทักษ์คุณภาพซอร์สโค้ด</strong><br>
                        <span style="font-size: 0.95rem; color: #475569;">ให้นักศึกษานำซอร์สโค้ดโปรเจกต์ของตนเองมาสแกนด้วย SonarLint หรือ SonarQube เพื่อหาจุดบกพร่อง และทำการ Refactor (ปรับปรุงโค้ด) ให้สะอาดสะอ้านยิ่งขึ้น</span>
                    </div>

                    <h4 style="margin-top: 15px;">ข้อกำหนดของใบงาน (Quality Report):</h4>
                    <p style="margin-bottom: 10px;">จัดทำรายงานตรวจสอบคุณภาพซอฟต์แวร์ ส่งเป็นเอกสาร PDF โดยมีองค์ประกอบดังนี้:</p>
                    <ul style="padding-left: 20px; line-height: 1.7; margin-bottom: 0;">
                        <li>แคปภาพหน้าจอโค้ด <strong>"ก่อนแก้ (Before)"</strong> ที่มีเส้นใต้แจ้งเตือน Code Smell / Bug จำนวนอย่างน้อย <strong>5 จุด</strong> (มาจากคนละไฟล์ได้)</li>
                        <li>อธิบายสั้นๆ ว่าแต่ละจุดมีปัญหาอะไร (ดูคำอธิบายจาก SonarLint)</li>
                        <li>แคปภาพหน้าจอโค้ด <strong>"หลังแก้ (After)"</strong> ที่ทำการคลีนโค้ดเรียบร้อยแล้ว และเส้นใต้การแจ้งเตือนหายไป</li>
                        <li>ให้สมาชิกในกลุ่มทำการ Commit และ Push โค้ดที่คลีนแล้วขึ้นไปบน GitHub Branch <code>develop</code> เพื่อเป็นหลักฐาน</li>
                    </ul>
                </section>
            </div>

            <aside>
                <div class="sidebar-card" style="background: #fff; padding: 20px; border-radius: 8px; border: 1px solid #e2e8f0; margin-bottom: 20px;">
                    <h4 style="margin-top: 0; margin-bottom: 12px; font-size: 1.1rem; font-weight: 700; color: #1e293b;">📋 ข้อมูลประจำหน่วย</h4>
                    <p style="font-size: 0.9rem; color: #475569; line-height: 1.6; margin: 0;">
                        <strong>สัปดาห์ที่:</strong> 6<br>
                        <strong>เวลาเรียน:</strong> 5 ชั่วโมง (ทฤษฎี 1, ปฏิบัติ 4)<br>
                        <strong>เกณฑ์การประเมิน:</strong> <br>
                        - การติดตั้งและใช้งาน SonarLint ในเครื่องคอมพิวเตอร์สำเร็จ (2 คะแนน)<br>
                        - ความสมบูรณ์ของเอกสาร Code Quality Audit Report (หาและแก้ไข Code Smell ได้ครบ 5 จุด) (6 คะแนน)<br>
                        - มีประวัติการอัปเดตโค้ด (Refactor) ขึ้นบน GitHub (2 คะแนน)
                    </p>
                </div>

                <div class="sidebar-card" style="background: #fff; padding: 20px; border-radius: 8px; border: 1px solid #e2e8f0; border-left: 4px solid #8b5cf6;">
                    <h4 style="margin-top: 0; margin-bottom: 12px; font-size: 1.1rem; font-weight: 700; color: #7c3aed;">💡 รู้หรือไม่?</h4>
                    <p style="font-size: 0.85rem; color: #64748b; line-height: 1.5; margin: 0;">
                        <strong>SonarQube</strong> เป็นเครื่องมือตัวใหญ่ระดับ Enterprise ที่จะรันบนเซิร์ฟเวอร์เพื่อสแกนโค้ดของทั้งโปรเจกต์และให้คะแนนความปลอดภัย (Security Rating) และประเมินเวลา (ชั่วโมง/วัน) ที่ต้องใช้เพื่อล้างหนี้สินทางเทคนิค (Technical Debt Ratio) <br><br>
                        ส่วน <strong>SonarLint</strong> เป็นส่วนขยายเล็กๆ ที่ทำงานบน IDE ของนักพัฒนา เพื่อช่วยดักจับปัญหาระหว่างพิมพ์โค้ด (เสมือนระบบตรวจคำผิดของ MS Word) ครับ
                    </p>
                </div>
            </aside>
        </main>
    </div>

    <script src="../assets/js/script.js"></script>
</body>

</html>