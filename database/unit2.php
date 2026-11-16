<?php
$base_dir = "../"; // ถอยกลับ 1 ชั้นเพื่อไปหาโฟลเดอร์หลัก
$active_nav = "database"; // เปิดสถานะเมนูที่วิชา เทคโนโลยีการจัดการฐานข้อมูล
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน่วยที่ 2: กลไกการจัดเก็บข้อมูลและสถาปัตยกรรม Storage Engine</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

    <?php include '../components/navbar.php'; ?>

    <div class="page-header" style="background-color: var(--secondary); color: var(--white); padding: 40px 0;">
        <div class="container">
            <a href="index.php" class="back-link">
                <span class="arrow-icon">⬅</span>
                <span>กลับสู่หน้าหลักวิชา</span>
            </a>
            <h2>หน่วยที่ 2: กลไกการจัดเก็บข้อมูลและสถาปัตยกรรม Storage Engine</h2>
            <p>สัปดาห์ที่ 3 | เวลาเรียน 5 ชั่วโมง (ทฤษฎี 1 ชม. ปฏิบัติ 4 ชม.)</p>
        </div>
    </div>

    <div class="container">
        <div class="single-layout">

            <section class="lesson-section">
                <div class="key-concept-box">
                    <strong>🎯 สารสำคัญ (Key Concepts)</strong>
                    <p>
                        Storage Engine คือองค์ประกอบภายในของระบบจัดการฐานข้อมูลที่ทำหน้าที่จัดเก็บ อ่าน และเขียนข้อมูลลงดิสก์จริง การเลือกใช้ Storage Engine ที่เหมาะสมส่งผลโดยตรงต่อประสิทธิภาพ ความปลอดภัยของธุรกรรม และความสามารถในการรองรับผู้ใช้งานพร้อมกันจำนวนมาก ผู้พัฒนาระบบฐานข้อมูลจึงต้องเข้าใจโครงสร้างและคุณสมบัติของแต่ละ Storage Engine เพื่อเลือกใช้ให้ตรงกับลักษณะงาน
                    </p>
                </div>
            </section>

            <section class="lesson-section">
                <h3>🎯 จุดประสงค์การเรียนรู้ (Learning Objectives)</h3>
                <table class="grading-table" style="margin-top: 15px;">
                    <tr>
                        <th width="25%">โดเมนการเรียนรู้</th>
                        <th>รายละเอียดจุดประสงค์การเรียนรู้</th>
                    </tr>
                    <tr>
                        <td><strong>ด้านความรู้ (Knowledge - K)</strong></td>
                        <td>1. อธิบายโครงสร้างและคุณสมบัติของ Storage Engine แต่ละประเภทได้<br>2. เปรียบเทียบความแตกต่างระหว่าง InnoDB และ MyISAM ได้</td>
                    </tr>
                    <tr>
                        <td><strong>ด้านทักษะ (Practice - P)</strong></td>
                        <td>1. กำหนดค่า Storage Engine ให้เหมาะสมกับประเภทของตารางได้<br>2. ตรวจสอบและเปลี่ยน Storage Engine ของตารางที่มีอยู่แล้วได้</td>
                    </tr>
                    <tr>
                        <td><strong>ด้านเจตคติ (Attitude - A)</strong></td>
                        <td>1. ปฏิบัติงานด้วยความรอบคอบในการเลือกใช้เทคโนโลยีให้เหมาะกับประสิทธิภาพของระบบงาน</td>
                    </tr>
                </table>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="lesson-section">
                <h3>📘 3. เนื้อหาทางทฤษฎีเชิงลึก (Theoretical Core)</h3>

                <h4 class="topic-title">เรื่องที่ 2.1: โครงสร้างและคุณลักษณะของ Storage Engine</h4>
                <p>
                    Storage Engine ทำหน้าที่เป็นชั้นล่างสุดที่แปลงคำสั่ง SQL ให้กลายเป็นการอ่าน-เขียนข้อมูลจริงบนดิสก์ แต่ละ Storage Engine มีจุดเด่นด้านความเร็ว ความปลอดภัยของธุรกรรม และการล็อกข้อมูล (Locking) ที่แตกต่างกัน
                </p>
                <table class="grading-table" style="margin: 15px 0;">
                    <tr style="background:#f1f5f9;">
                        <th>คุณลักษณะ</th>
                        <th>InnoDB</th>
                        <th>MyISAM</th>
                    </tr>
                    <tr>
                        <td><strong>รองรับ Transaction</strong></td>
                        <td>รองรับ (ACID)</td>
                        <td>ไม่รองรับ</td>
                    </tr>
                    <tr>
                        <td><strong>ระดับการล็อกข้อมูล</strong></td>
                        <td>Row-level Locking</td>
                        <td>Table-level Locking</td>
                    </tr>
                    <tr>
                        <td><strong>Foreign Key</strong></td>
                        <td>รองรับ</td>
                        <td>ไม่รองรับ</td>
                    </tr>
                    <tr>
                        <td><strong>เหมาะกับงาน</strong></td>
                        <td>ระบบที่มีการแก้ไขข้อมูลพร้อมกันบ่อย เช่น ระบบธุรกรรม</td>
                        <td>ระบบที่อ่านข้อมูลเป็นหลัก (Read-heavy) และต้องการความเร็วในการค้นหา</td>
                    </tr>
                </table>

                <h4 class="topic-title">เรื่องที่ 2.2: การเลือกใช้และการจัดการ Storage Engine</h4>
                <p>
                    ตั้งแต่ MySQL 5.5 เป็นต้นมา <strong>InnoDB</strong> ถูกกำหนดเป็นค่าเริ่มต้น (Default Engine) เนื่องจากรองรับ Transaction และความปลอดภัยของข้อมูลที่ดีกว่า ผู้ดูแลฐานข้อมูลสามารถตรวจสอบและเปลี่ยน Storage Engine ของตารางได้ตามความเหมาะสมของระบบงาน โดยพิจารณาจากความถี่ในการเขียนข้อมูลพร้อมกันเป็นหลัก
                </p>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="lesson-section">
                <h3>🛠️ 4. ตัวอย่างการปฏิบัติการทีละขั้นตอน (Step-by-Step Walkthrough)</h3>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 1</div>
                    <div class="step-detail">
                        <strong>ตรวจสอบ Storage Engine ที่ติดตั้งอยู่ในระบบ</strong>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">SQL</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>
                                </button>
                            </div>
                            <pre>SHOW ENGINES;
SHOW TABLE STATUS FROM shop_db LIKE 'products';</pre>
                        </div>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 2</div>
                    <div class="step-detail">
                        <strong>สร้างตารางโดยระบุ Storage Engine อย่างชัดเจน</strong>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">SQL</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>
                                </button>
                            </div>
                            <pre>CREATE TABLE order_logs (
    log_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    log_detail VARCHAR(255)
) ENGINE = InnoDB;

CREATE TABLE report_archive (
    report_id INT AUTO_INCREMENT PRIMARY KEY,
    report_text TEXT
) ENGINE = MyISAM;</pre>
                        </div>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 3</div>
                    <div class="step-detail">
                        <strong>เปลี่ยน Storage Engine ของตารางที่มีอยู่แล้ว</strong>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">SQL</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>
                                </button>
                            </div>
                            <pre>ALTER TABLE report_archive ENGINE = InnoDB;</pre>
                        </div>
                        <p>คำสั่งนี้ใช้เมื่อพบว่าตารางที่เคยอ่านอย่างเดียวเริ่มมีการแก้ไขข้อมูลพร้อมกันบ่อยขึ้น จึงจำเป็นต้องเปลี่ยนมาใช้ InnoDB เพื่อรองรับ Transaction และลดปัญหาการล็อกทั้งตาราง</p>
                    </div>
                </div>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="assignment-box">
                <h3>📝 5. งานที่มอบหมายและเกณฑ์การประเมินผล (Assignment)</h3>
                <p><strong>ใบงานที่ 2: การเลือกและจัดการ Storage Engine</strong></p>
                <br>
                <p><strong>คำสั่ง:</strong></p>
                <ul style="margin-left: 20px;">
                    <li>สร้างตารางอย่างน้อย 2 ตาราง โดยเลือกใช้ InnoDB และ MyISAM ตามความเหมาะสมของลักษณะข้อมูล พร้อมระบุเหตุผล</li>
                    <li>ทดลองใช้คำสั่ง <code class="inline-code">SHOW TABLE STATUS</code> เพื่อตรวจสอบ Engine ของแต่ละตาราง</li>
                    <li>ทดลองเปลี่ยน Storage Engine ของตารางหนึ่งตารางด้วยคำสั่ง <code class="inline-code">ALTER TABLE</code> แล้วบันทึกผลก่อน-หลัง</li>
                </ul>

                <br>
                <p><strong>📊 เกณฑ์การตัดคะแนน (คะแนนเต็ม 5 คะแนน):</strong></p>
                <ul style="margin-left: 20px; font-size: 0.9rem; color: #78350f;">
                    <li>• ความถูกต้องในการเลือกใช้ Storage Engine ตามเหตุผลที่สมเหตุสมผล (2 คะแนน)</li>
                    <li>• ความสำเร็จในการสร้างและปรับเปลี่ยน Engine โดยไม่มี Error ค้าง (2 คะแนน)</li>
                    <li>• ความตรงต่อเวลาและความเป็นระเบียบของไฟล์งาน (1 คะแนน)</li>
                </ul>
            </section>

        </div>
    </div>

    <script src="../assets/js/script.js"></script>
</body>

</html>
