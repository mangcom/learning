<?php
$base_dir = "../"; // ถอยกลับ 1 ชั้นเพื่อไปหาโฟลเดอร์หลัก
$active_nav = "database"; // เปิดสถานะเมนูที่วิชา เทคโนโลยีการจัดการฐานข้อมูล
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน่วยที่ 3: การจัดการมุมมองข้อมูลด้วย View</title>
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
            <h2>หน่วยที่ 3: การจัดการมุมมองข้อมูลด้วย View</h2>
            <p>สัปดาห์ที่ 4 | เวลาเรียน 5 ชั่วโมง (ทฤษฎี 1 ชม. ปฏิบัติ 4 ชม.)</p>
        </div>
    </div>

    <div class="container">
        <div class="single-layout">

            <section class="lesson-section">
                <div class="key-concept-box">
                    <strong>🎯 สารสำคัญ (Key Concepts)</strong>
                    <p>
                        View คือตารางเสมือนที่สร้างขึ้นจากคำสั่ง SELECT โดยไม่ได้จัดเก็บข้อมูลซ้ำซ้อนจริงบนดิสก์ ช่วยให้ผู้ใช้งานเข้าถึงข้อมูลที่ผ่านการประมวลผลหรือกรองไว้ล่วงหน้าได้สะดวก อีกทั้งยังเป็นเครื่องมือสำคัญในการควบคุมความปลอดภัยของข้อมูล โดยสามารถจำกัดให้ผู้ใช้เห็นเฉพาะคอลัมน์หรือแถวที่ได้รับอนุญาตเท่านั้น โดยไม่ต้องให้สิทธิ์เข้าถึงตารางต้นฉบับโดยตรง
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
                        <td>1. อธิบายหลักการและประโยชน์ของการใช้งาน View ได้<br>2. อธิบายข้อจำกัดของ View ที่สามารถปรับปรุงข้อมูล (Updatable View) ได้</td>
                    </tr>
                    <tr>
                        <td><strong>ด้านทักษะ (Practice - P)</strong></td>
                        <td>1. สร้าง แก้ไข และลบ View ได้ถูกต้อง<br>2. ประยุกต์ใช้ View เพื่อจำกัดสิทธิ์การเข้าถึงข้อมูลได้</td>
                    </tr>
                    <tr>
                        <td><strong>ด้านเจตคติ (Attitude - A)</strong></td>
                        <td>1. ตระหนักถึงความสำคัญของการรักษาความปลอดภัยของข้อมูลผ่านการจำกัดสิทธิ์การเข้าถึง</td>
                    </tr>
                </table>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="lesson-section">
                <h3>📘 3. เนื้อหาทางทฤษฎีเชิงลึก (Theoretical Core)</h3>

                <h4 class="topic-title">เรื่องที่ 3.1: ไวยากรณ์และประโยชน์ของการใช้งาน View</h4>
                <p>
                    View ถูกสร้างด้วยคำสั่ง <code class="inline-code">CREATE VIEW</code> ตามด้วยคำสั่ง SELECT ที่ต้องการ เมื่อมีการเรียกใช้ View ระบบจะประมวลผลคำสั่ง SELECT ที่ซ่อนอยู่เบื้องหลังใหม่ทุกครั้ง ทำให้ข้อมูลที่ได้เป็นข้อมูลล่าสุดเสมอ View จึงเหมาะกับการสร้างรายงานที่ต้องเรียกใช้ซ้ำบ่อย ๆ และการซ่อนความซับซ้อนของคำสั่ง JOIN หลายตารางไว้เบื้องหลัง
                </p>
                <blockquote>
                    <strong>💡 เจาะลึกทางทฤษฎี:</strong><br>
                    • <strong>Updatable View</strong> คือ View ที่สามารถ INSERT/UPDATE/DELETE ย้อนกลับไปยังตารางต้นฉบับได้ โดยทั่วไปต้องสร้างจากตารางเดียวและไม่มีการใช้ฟังก์ชันรวม (Aggregate Function) หรือ GROUP BY<br>
                    • View ที่สร้างจากการ JOIN หลายตาราง หรือใช้ฟังก์ชันรวม มักจะเป็น <strong>Read-only View</strong>
                </blockquote>

                <h4 class="topic-title">เรื่องที่ 3.2: การสร้าง การแก้ไข และการประยุกต์ใช้ View เพื่อความมั่นคงปลอดภัย</h4>
                <p>
                    ในงานจริง ผู้ดูแลฐานข้อมูลมักสร้าง View เพื่อให้พนักงานแผนกต่าง ๆ มองเห็นเฉพาะข้อมูลที่เกี่ยวข้องกับหน้าที่ของตน เช่น View สำหรับฝ่ายขายที่ซ่อนข้อมูลต้นทุนสินค้า หรือ View ที่กรองเฉพาะข้อมูลสินค้าที่ยังมีสต็อกคงเหลือ ซึ่งช่วยลดความเสี่ยงจากการเข้าถึงข้อมูลอ่อนไหวโดยไม่จำเป็น
                </p>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="lesson-section">
                <h3>🛠️ 4. ตัวอย่างการปฏิบัติการทีละขั้นตอน (Step-by-Step Walkthrough)</h3>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 1</div>
                    <div class="step-detail">
                        <strong>สร้าง View แสดงสินค้าที่มีสต็อกคงเหลือ โดยไม่แสดงต้นทุน</strong>
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
                            <pre>CREATE VIEW v_available_products AS
SELECT product_id, name, price, stock
FROM products
WHERE stock > 0;

SELECT * FROM v_available_products;</pre>
                        </div>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 2</div>
                    <div class="step-detail">
                        <strong>ทดลองปรับปรุงข้อมูลผ่าน Updatable View</strong>
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
                            <pre>UPDATE v_available_products
SET price = 1190.00
WHERE product_id = 1;

-- ตรวจสอบว่าตารางต้นฉบับถูกอัปเดตจริงหรือไม่
SELECT * FROM products WHERE product_id = 1;</pre>
                        </div>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 3</div>
                    <div class="step-detail">
                        <strong>แก้ไขและลบ View</strong>
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
                            <pre>CREATE OR REPLACE VIEW v_available_products AS
SELECT product_id, name, price
FROM products
WHERE stock > 0;

DROP VIEW IF EXISTS v_available_products;</pre>
                        </div>
                    </div>
                </div>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="assignment-box">
                <h3>📝 5. งานที่มอบหมายและเกณฑ์การประเมินผล (Assignment)</h3>
                <p><strong>ใบงานที่ 3: การสร้างและจัดการมุมมองข้อมูล</strong></p>
                <br>
                <p><strong>คำสั่ง:</strong></p>
                <ul style="margin-left: 20px;">
                    <li>สร้าง View อย่างน้อย 1 รายการ เพื่อจำกัดให้แสดงเฉพาะคอลัมน์หรือแถวที่กำหนด โดยซ่อนข้อมูลที่เป็นความลับ</li>
                    <li>ทดสอบว่า View ที่สร้างสามารถ UPDATE ย้อนกลับไปยังตารางต้นฉบับได้หรือไม่ พร้อมอธิบายเหตุผล</li>
                    <li>แก้ไขโครงสร้างของ View ด้วย <code class="inline-code">CREATE OR REPLACE VIEW</code> อย่างน้อย 1 ครั้ง</li>
                </ul>

                <br>
                <p><strong>📊 เกณฑ์การตัดคะแนน (คะแนนเต็ม 5 คะแนน):</strong></p>
                <ul style="margin-left: 20px; font-size: 0.9rem; color: #78350f;">
                    <li>• ความถูกต้องของคำสั่งสร้าง View ตามโจทย์ที่กำหนด (2 คะแนน)</li>
                    <li>• ความถูกต้องในการทดสอบและอธิบายคุณสมบัติ Updatable View (2 คะแนน)</li>
                    <li>• ความตรงต่อเวลาและความเป็นระเบียบของไฟล์งาน (1 คะแนน)</li>
                </ul>
            </section>

        </div>
    </div>

    <script src="../assets/js/script.js"></script>
</body>

</html>
