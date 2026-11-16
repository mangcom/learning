<?php
$base_dir = "../"; // ถอยกลับ 1 ชั้นเพื่อไปหาโฟลเดอร์หลัก
$active_nav = "database"; // เปิดสถานะเมนูที่วิชา เทคโนโลยีการจัดการฐานข้อมูล
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน่วยที่ 4: การโปรแกรมฐานข้อมูลด้วย Stored Procedure และ Function</title>
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
            <h2>หน่วยที่ 4: การโปรแกรมฐานข้อมูลด้วย Stored Procedure และ Function</h2>
            <p>สัปดาห์ที่ 5-6 | เวลาเรียน 10 ชั่วโมง (ทฤษฎี 2 ชม. ปฏิบัติ 8 ชม.)</p>
        </div>
    </div>

    <div class="container">
        <div class="single-layout">

            <section class="lesson-section">
                <div class="key-concept-box">
                    <strong>🎯 สารสำคัญ (Key Concepts)</strong>
                    <p>
                        Stored Procedure และ Function คือชุดคำสั่ง SQL ที่ถูกเขียนและคอมไพล์เก็บไว้ในตัวระบบจัดการฐานข้อมูล สามารถเรียกใช้งานซ้ำได้โดยไม่ต้องส่งคำสั่ง SQL ทั้งชุดจากฝั่งแอปพลิเคชันทุกครั้ง ช่วยลดปริมาณข้อมูลที่รับส่งผ่านเครือข่าย เพิ่มความปลอดภัยด้วยการควบคุมสิทธิ์เฉพาะ Routine และรวมตรรกะทางธุรกิจที่ซับซ้อนไว้ในจุดเดียวเพื่อให้ง่ายต่อการดูแลรักษา
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
                        <td>1. อธิบายไวยากรณ์และความแตกต่างระหว่าง Stored Procedure และ Function ได้<br>2. อธิบายรูปแบบการส่งผ่านพารามิเตอร์ (IN, OUT, INOUT) ได้</td>
                    </tr>
                    <tr>
                        <td><strong>ด้านทักษะ (Practice - P)</strong></td>
                        <td>1. สร้างและเรียกใช้ Stored Procedure ได้ถูกต้อง<br>2. สร้างและประยุกต์ใช้ User-Defined Function ในคำสั่ง SELECT ได้</td>
                    </tr>
                    <tr>
                        <td><strong>ด้านเจตคติ (Attitude - A)</strong></td>
                        <td>1. ปฏิบัติงานด้วยความละเอียดรอบคอบในการทดสอบ Routine ก่อนนำไปใช้งานจริง</td>
                    </tr>
                </table>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="lesson-section">
                <h3>📘 3. เนื้อหาทางทฤษฎีเชิงลึก (Theoretical Core)</h3>

                <h4 class="topic-title">เรื่องที่ 4.1: ไวยากรณ์การส่งผ่านพารามิเตอร์และการสร้าง Stored Procedure</h4>
                <p>
                    Stored Procedure สร้างด้วยคำสั่ง <code class="inline-code">CREATE PROCEDURE</code> และสามารถรับพารามิเตอร์ได้ 3 รูปแบบ ได้แก่ <strong>IN</strong> (รับค่าเข้ามาเพื่อประมวลผล), <strong>OUT</strong> (ส่งค่าผลลัพธ์ออกไป) และ <strong>INOUT</strong> (รับค่าเข้ามาและส่งค่าใหม่กลับออกไปในตัวแปรเดียวกัน) Procedure ไม่สามารถใช้ในคำสั่ง SELECT โดยตรงได้ ต้องเรียกใช้ด้วยคำสั่ง <code class="inline-code">CALL</code>
                </p>
                <table class="grading-table" style="margin: 15px 0;">
                    <tr style="background:#f1f5f9;">
                        <th>คุณลักษณะ</th>
                        <th>Stored Procedure</th>
                        <th>Function</th>
                    </tr>
                    <tr>
                        <td><strong>ค่าที่ส่งกลับ</strong></td>
                        <td>ไม่บังคับ (อาจใช้ OUT แทน)</td>
                        <td>บังคับต้อง RETURN ค่าเดียวเสมอ</td>
                    </tr>
                    <tr>
                        <td><strong>การเรียกใช้</strong></td>
                        <td>CALL procedure_name()</td>
                        <td>ใช้ร่วมกับ SELECT, WHERE ได้โดยตรง</td>
                    </tr>
                    <tr>
                        <td><strong>เหมาะกับงาน</strong></td>
                        <td>ประมวลผลหลายขั้นตอน เช่น บันทึกและอัปเดตหลายตารางพร้อมกัน</td>
                        <td>คำนวณค่าและนำผลลัพธ์ไปใช้ต่อในคิวรี เช่น คำนวณราคาหลังหักส่วนลด</td>
                    </tr>
                </table>

                <h4 class="topic-title">เรื่องที่ 4.2: การสร้าง User-Defined Function และการประยุกต์ใช้งานในระบบงาน</h4>
                <p>
                    User-Defined Function (UDF) ช่วยให้ผู้พัฒนาสามารถสร้างตรรกะการคำนวณของตนเองและนำไปใช้ซ้ำในคำสั่ง SQL ได้เหมือนฟังก์ชันมาตรฐานของระบบ เช่น การคำนวณราคาสุทธิหลังหักส่วนลด หรือการแปลงหน่วยข้อมูล ซึ่งช่วยลดความซ้ำซ้อนของตรรกะทางธุรกิจที่กระจายอยู่ในหลายส่วนของโปรแกรม
                </p>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="lesson-section">
                <h3>🛠️ 4. ตัวอย่างการปฏิบัติการทีละขั้นตอน (Step-by-Step Walkthrough)</h3>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 1</div>
                    <div class="step-detail">
                        <strong>สร้าง Stored Procedure สำหรับบันทึกคำสั่งซื้อและตัดสต็อกสินค้า</strong>
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
                            <pre>DELIMITER $$

CREATE PROCEDURE sp_place_order(
    IN p_product_id INT,
    IN p_qty INT,
    OUT p_status VARCHAR(50)
)
BEGIN
    DECLARE v_stock INT;

    SELECT stock INTO v_stock FROM products WHERE product_id = p_product_id;

    IF v_stock >= p_qty THEN
        UPDATE products SET stock = stock - p_qty WHERE product_id = p_product_id;
        SET p_status = 'สั่งซื้อสำเร็จ';
    ELSE
        SET p_status = 'สินค้าไม่เพียงพอ';
    END IF;
END $$

DELIMITER ;</pre>
                        </div>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 2</div>
                    <div class="step-detail">
                        <strong>เรียกใช้งาน Stored Procedure ผ่านคำสั่ง CALL</strong>
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
                            <pre>CALL sp_place_order(1, 3, @result);
SELECT @result AS status;</pre>
                        </div>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 3</div>
                    <div class="step-detail">
                        <strong>สร้างและใช้งาน User-Defined Function คำนวณราคาหลังหักส่วนลด</strong>
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
                            <pre>DELIMITER $$

CREATE FUNCTION fn_net_price(p_price DECIMAL(10,2), p_discount_percent INT)
RETURNS DECIMAL(10,2)
DETERMINISTIC
BEGIN
    RETURN p_price - (p_price * p_discount_percent / 100);
END $$

DELIMITER ;

SELECT name, price, fn_net_price(price, 10) AS net_price
FROM products;</pre>
                        </div>
                    </div>
                </div>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="assignment-box">
                <h3>📝 5. งานที่มอบหมายและเกณฑ์การประเมินผล (Assignment)</h3>
                <p><strong>ใบงานที่ 4: การสร้าง Stored Procedure และ Function</strong></p>
                <br>
                <p><strong>คำสั่ง:</strong></p>
                <ul style="margin-left: 20px;">
                    <li>สร้าง Stored Procedure ที่รับพารามิเตอร์แบบ IN และ OUT อย่างน้อย 1 รายการ เพื่อประมวลผลธุรกรรมในสถานการณ์จำลองของตนเอง</li>
                    <li>สร้าง User-Defined Function อย่างน้อย 1 รายการ และนำไปใช้ร่วมกับคำสั่ง SELECT</li>
                    <li>ทดสอบเรียกใช้ทั้งสอง Routine พร้อมแคปเจอร์หน้าจอผลลัพธ์ส่งในระบบควบคุมห้องเรียน</li>
                </ul>

                <br>
                <p><strong>📊 เกณฑ์การตัดคะแนน (คะแนนเต็ม 5 คะแนน):</strong></p>
                <ul style="margin-left: 20px; font-size: 0.9rem; color: #78350f;">
                    <li>• ความถูกต้องของไวยากรณ์และการส่งผ่านพารามิเตอร์ของ Procedure (2 คะแนน)</li>
                    <li>• ความถูกต้องของ Function และผลลัพธ์การคำนวณ (2 คะแนน)</li>
                    <li>• ความตรงต่อเวลาและความเป็นระเบียบของไฟล์งาน (1 คะแนน)</li>
                </ul>
            </section>

        </div>
    </div>

    <script src="../assets/js/script.js"></script>
</body>

</html>
