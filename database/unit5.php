<?php
$base_dir = "../"; // ถอยกลับ 1 ชั้นเพื่อไปหาโฟลเดอร์หลัก
$active_nav = "database"; // เปิดสถานะเมนูที่วิชา เทคโนโลยีการจัดการฐานข้อมูล
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน่วยที่ 5: การควบคุมการทำงานอัตโนมัติด้วย Trigger และ Event</title>
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
            <h2>หน่วยที่ 5: การควบคุมการทำงานอัตโนมัติด้วย Trigger และ Event</h2>
            <p>สัปดาห์ที่ 7-8 | เวลาเรียน 10 ชั่วโมง (ทฤษฎี 2 ชม. ปฏิบัติ 8 ชม.)</p>
        </div>
    </div>

    <div class="container">
        <div class="single-layout">

            <section class="lesson-section">
                <div class="key-concept-box">
                    <strong>🎯 สารสำคัญ (Key Concepts)</strong>
                    <p>
                        Trigger คือชุดคำสั่งที่ทำงานโดยอัตโนมัติเมื่อมีเหตุการณ์ INSERT, UPDATE หรือ DELETE เกิดขึ้นกับตารางที่กำหนด ใช้สำหรับตรวจสอบความถูกต้องของข้อมูลหรือบันทึกประวัติการเปลี่ยนแปลง (Audit Log) ส่วน Event คือชุดคำสั่งที่ทำงานตามเวลาที่กำหนดไว้ล่วงหน้าผ่าน Database Event Scheduler เหมาะสำหรับงานที่ต้องประมวลผลอัตโนมัติเป็นประจำ เช่น การสรุปยอดขายรายวัน
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
                        <td>1. อธิบายหลักการทำงานของ Trigger และประเภทของ Trigger (BEFORE/AFTER) ได้<br>2. อธิบายหลักการทำงานของ Event Scheduler ได้</td>
                    </tr>
                    <tr>
                        <td><strong>ด้านทักษะ (Practice - P)</strong></td>
                        <td>1. สร้างและใช้งาน Trigger เพื่อบันทึกประวัติการเปลี่ยนแปลงข้อมูลได้<br>2. ตั้งเวลาประมวลผลงานอัตโนมัติด้วย Event ได้</td>
                    </tr>
                    <tr>
                        <td><strong>ด้านเจตคติ (Attitude - A)</strong></td>
                        <td>1. ปฏิบัติงานด้วยความรอบคอบเนื่องจาก Trigger ทำงานโดยไม่ปรากฏให้เห็นในขั้นตอนปกติ หากผิดพลาดจะกระทบข้อมูลวงกว้าง</td>
                    </tr>
                </table>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="lesson-section">
                <h3>📘 3. เนื้อหาทางทฤษฎีเชิงลึก (Theoretical Core)</h3>

                <h4 class="topic-title">เรื่องที่ 5.1: การกำหนด Trigger เพื่อตรวจสอบและบันทึกประวัติการเปลี่ยนแปลงข้อมูล</h4>
                <p>
                    Trigger แบ่งตามจังหวะการทำงานเป็น <strong>BEFORE</strong> (ทำงานก่อนที่คำสั่งจะมีผลต่อข้อมูลจริง เหมาะกับการตรวจสอบหรือปรับแก้ค่าก่อนบันทึก) และ <strong>AFTER</strong> (ทำงานหลังจากคำสั่งมีผลแล้ว เหมาะกับการบันทึกประวัติหรือแจ้งเตือน) ภายใน Trigger สามารถอ้างอิงค่าข้อมูลเดิมด้วยคำสั่ง <code class="inline-code">OLD</code> และค่าข้อมูลใหม่ด้วยคำสั่ง <code class="inline-code">NEW</code>
                </p>

                <h4 class="topic-title">เรื่องที่ 5.2: การตั้งเวลาประมวลผลงานอัตโนมัติด้วย Database Event Scheduler</h4>
                <p>
                    Event Scheduler เป็นกลไกภายในของระบบจัดการฐานข้อมูลที่ทำงานคล้าย Cron Job โดยสามารถกำหนดให้ Event ทำงานครั้งเดียวในเวลาที่กำหนด หรือทำงานซ้ำตามรอบเวลาที่ตั้งไว้ (เช่น ทุกวัน ทุกชั่วโมง) ซึ่งต้องเปิดใช้งาน Event Scheduler ของเซิร์ฟเวอร์ก่อนจึงจะสามารถใช้งานได้
                </p>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="lesson-section">
                <h3>🛠️ 4. ตัวอย่างการปฏิบัติการทีละขั้นตอน (Step-by-Step Walkthrough)</h3>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 1</div>
                    <div class="step-detail">
                        <strong>สร้างตารางบันทึกประวัติและ Trigger แบบ AFTER UPDATE</strong>
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
                            <pre>CREATE TABLE price_history (
    history_id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    old_price DECIMAL(10,2),
    new_price DECIMAL(10,2),
    changed_at DATETIME
);

DELIMITER $$

CREATE TRIGGER trg_after_price_update
AFTER UPDATE ON products
FOR EACH ROW
BEGIN
    IF OLD.price <> NEW.price THEN
        INSERT INTO price_history (product_id, old_price, new_price, changed_at)
        VALUES (OLD.product_id, OLD.price, NEW.price, NOW());
    END IF;
END $$

DELIMITER ;</pre>
                        </div>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 2</div>
                    <div class="step-detail">
                        <strong>ทดสอบ Trigger โดยการแก้ไขราคาสินค้า</strong>
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
                            <pre>UPDATE products SET price = 1390.00 WHERE product_id = 1;
SELECT * FROM price_history;</pre>
                        </div>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 3</div>
                    <div class="step-detail">
                        <strong>เปิดใช้งาน Event Scheduler และสร้าง Event สรุปยอดสต็อกรายวัน</strong>
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
                            <pre>SET GLOBAL event_scheduler = ON;

CREATE TABLE stock_summary_log (
    log_id INT AUTO_INCREMENT PRIMARY KEY,
    total_products INT,
    total_stock INT,
    logged_at DATETIME
);

DELIMITER $$

CREATE EVENT ev_daily_stock_summary
ON SCHEDULE EVERY 1 DAY
STARTS CURRENT_TIMESTAMP
DO
BEGIN
    INSERT INTO stock_summary_log (total_products, total_stock, logged_at)
    SELECT COUNT(*), SUM(stock), NOW() FROM products;
END $$

DELIMITER ;</pre>
                        </div>
                    </div>
                </div>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="assignment-box">
                <h3>📝 5. งานที่มอบหมายและเกณฑ์การประเมินผล (Assignment)</h3>
                <p><strong>ใบงานที่ 5: การสร้าง Trigger และ Event</strong></p>
                <br>
                <p><strong>คำสั่ง:</strong></p>
                <ul style="margin-left: 20px;">
                    <li>สร้าง Trigger ประเภท BEFORE หรือ AFTER อย่างน้อย 1 รายการ เพื่อตรวจสอบหรือบันทึกประวัติการเปลี่ยนแปลงข้อมูลในสถานการณ์จำลองของตนเอง</li>
                    <li>สร้าง Event อย่างน้อย 1 รายการ ที่ทำงานตามรอบเวลาที่กำหนด พร้อมอธิบายประโยชน์ของการตั้งเวลาอัตโนมัตินี้</li>
                    <li>ทดสอบการทำงานของทั้ง Trigger และ Event พร้อมแคปเจอร์หน้าจอผลลัพธ์ส่งในระบบควบคุมห้องเรียน</li>
                </ul>

                <br>
                <p><strong>📊 เกณฑ์การตัดคะแนน (คะแนนเต็ม 5 คะแนน):</strong></p>
                <ul style="margin-left: 20px; font-size: 0.9rem; color: #78350f;">
                    <li>• ความถูกต้องของไวยากรณ์และการทำงานของ Trigger (2 คะแนน)</li>
                    <li>• ความถูกต้องของไวยากรณ์และการตั้งเวลาของ Event (2 คะแนน)</li>
                    <li>• ความตรงต่อเวลาและความเป็นระเบียบของไฟล์งาน (1 คะแนน)</li>
                </ul>
            </section>

        </div>
    </div>

    <script src="../assets/js/script.js"></script>
</body>

</html>
