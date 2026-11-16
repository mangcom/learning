<?php
$base_dir = "../"; // ถอยกลับ 1 ชั้นเพื่อไปหาโฟลเดอร์หลัก
$active_nav = "database"; // เปิดสถานะเมนูที่วิชา เทคโนโลยีการจัดการฐานข้อมูล
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน่วยที่ 1: ความรู้เบื้องต้นและรูปแบบการจัดเก็บข้อมูลในระบบฐานข้อมูล</title>
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
            <h2>หน่วยที่ 1: ความรู้เบื้องต้นและรูปแบบการจัดเก็บข้อมูลในระบบฐานข้อมูล</h2>
            <p>สัปดาห์ที่ 1-2 | เวลาเรียน 10 ชั่วโมง (ทฤษฎี 2 ชม. ปฏิบัติ 8 ชม.)</p>
        </div>
    </div>

    <div class="container">
        <div class="single-layout">

            <section class="lesson-section">
                <div class="key-concept-box">
                    <strong>🎯 สารสำคัญ (Key Concepts)</strong>
                    <p>
                        ระบบฐานข้อมูล (Database Management System) คือรากฐานของการจัดเก็บข้อมูลในทุกระบบสารสนเทศยุคใหม่ นักพัฒนาระบบและผู้ดูแลฐานข้อมูลจำเป็นต้องเข้าใจความแตกต่างระหว่างฐานข้อมูลเชิงสัมพันธ์ (Relational) ที่เน้นความถูกต้องและโครงสร้างตายตัว กับฐานข้อมูลไม่สัมพันธ์ (Non-Relational / NoSQL) ที่เน้นความยืดหยุ่นและการขยายตัว รวมถึงโมเดลการจัดเก็บข้อมูลแบบ Key-value และ Document เพื่อเลือกใช้เทคโนโลยีให้สอดคล้องกับลักษณะงานจริงในสายอาชีพ
                    </p>
                </div>
            </section>

            <section class="lesson-section">
                <h3>🎯 จุดประสงค์การเรียนรู้ (Learning Objectives)</h3>
                <p>เมื่อผู้เรียนจบหน่วยการเรียนรู้นี้แล้ว จะมีความรู้ความสามารถดังนี้:</p>
                <table class="grading-table" style="margin-top: 15px;">
                    <tr>
                        <th width="25%">โดเมนการเรียนรู้</th>
                        <th>รายละเอียดจุดประสงค์การเรียนรู้</th>
                    </tr>
                    <tr>
                        <td><strong>ด้านความรู้ (Knowledge - K)</strong></td>
                        <td>1. อธิบายและจำแนกความแตกต่างระหว่างฐานข้อมูลแบบ Relational และ Non-Relational ได้ถูกต้อง<br>2. อธิบายโครงสร้างของโมเดล Key-value และ Document ได้</td>
                    </tr>
                    <tr>
                        <td><strong>ด้านทักษะ (Practice - P)</strong></td>
                        <td>1. วิเคราะห์คุณลักษณะของข้อมูลและเลือกใช้รูปแบบการจัดเก็บข้อมูลให้เหมาะสมกับระบบงานได้<br>2. ติดตั้งและทดลองใช้งานฐานข้อมูลแบบ Relational (MySQL) และ Non-Relational (MongoDB) เบื้องต้นได้</td>
                    </tr>
                    <tr>
                        <td><strong>ด้านเจตคติ (Attitude - A)</strong></td>
                        <td>1. ปฏิบัติงานด้วยความละเอียดรอบคอบในการออกแบบโครงสร้างข้อมูล<br>2. มีความรับผิดชอบในการตรวจสอบความถูกต้องของข้อมูลก่อนนำไปใช้งานจริง</td>
                    </tr>
                </table>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="lesson-section">
                <h3>📘 3. เนื้อหาทางทฤษฎีเชิงลึก (Theoretical Core)</h3>

                <h4 class="topic-title">เรื่องที่ 1.1: ฐานข้อมูลแบบ Relational เทียบกับ Non-Relational</h4>
                <p>
                    ฐานข้อมูลเชิงสัมพันธ์ (Relational Database) จัดเก็บข้อมูลในรูปแบบตาราง (Table) ที่มีแถว (Row) และคอลัมน์ (Column) ตายตัว มีการกำหนดความสัมพันธ์ระหว่างตารางด้วยคีย์หลัก (Primary Key) และคีย์นอก (Foreign Key) และยึดหลัก <strong>ACID</strong> (Atomicity, Consistency, Isolation, Durability) เพื่อรับประกันความถูกต้องของธุรกรรม ในขณะที่ฐานข้อมูลไม่สัมพันธ์ (Non-Relational / NoSQL) ไม่บังคับโครงสร้างตายตัว เน้นความยืดหยุ่นในการขยายตัวแบบแนวนอน (Horizontal Scaling) และมักยึดหลัก <strong>BASE</strong> (Basically Available, Soft state, Eventually consistent)
                </p>
                <table class="grading-table" style="margin: 15px 0;">
                    <tr style="background:#f1f5f9;">
                        <th>คุณลักษณะ</th>
                        <th>Relational (เช่น MySQL, PostgreSQL)</th>
                        <th>Non-Relational (เช่น MongoDB, Redis)</th>
                    </tr>
                    <tr>
                        <td><strong>โครงสร้างข้อมูล</strong></td>
                        <td>ตาราง แถว คอลัมน์ ตายตัว (Schema-based)</td>
                        <td>ยืดหยุ่น ไม่บังคับโครงสร้าง (Schema-less)</td>
                    </tr>
                    <tr>
                        <td><strong>หลักการความถูกต้อง</strong></td>
                        <td>ACID (เน้นความถูกต้องสูงสุด)</td>
                        <td>BASE (เน้นความพร้อมใช้งานและความเร็ว)</td>
                    </tr>
                    <tr>
                        <td><strong>การขยายตัว</strong></td>
                        <td>Vertical Scaling เป็นหลัก</td>
                        <td>Horizontal Scaling ได้ง่าย</td>
                    </tr>
                    <tr>
                        <td><strong>เหมาะกับงาน</strong></td>
                        <td>ระบบธุรกรรมทางการเงิน ระบบทะเบียน</td>
                        <td>ระบบแคช ข้อมูลปริมาณมหาศาล เนื้อหาไม่มีโครงสร้างคงที่</td>
                    </tr>
                </table>

                <blockquote>
                    <strong>💡 เจาะลึกทางทฤษฎี:</strong><br>
                    • <strong>Atomicity</strong> รับประกันว่าธุรกรรมจะสำเร็จทั้งหมดหรือไม่สำเร็จเลย<br>
                    • <strong>Consistency</strong> ข้อมูลต้องถูกต้องตามกฎเกณฑ์ (Constraint) เสมอก่อนและหลังธุรกรรม<br>
                    • <strong>Isolation</strong> ธุรกรรมที่ทำงานพร้อมกันต้องไม่รบกวนกัน<br>
                    • <strong>Durability</strong> เมื่อธุรกรรมสำเร็จแล้ว ข้อมูลต้องไม่สูญหายแม้ระบบล่ม
                </blockquote>

                <h4 class="topic-title">เรื่องที่ 1.2: โมเดลการเก็บข้อมูลแบบ Key-value และ Document เบื้องต้น</h4>
                <p>
                    <strong>Key-value Store</strong> (เช่น Redis) จัดเก็บข้อมูลเป็นคู่ของกุญแจและค่า (Key และ Value) คล้ายกับโครงสร้างข้อมูล Hash Map ค้นหาข้อมูลได้รวดเร็วมาก เหมาะกับงานแคชข้อมูลและเซสชันผู้ใช้ ส่วน <strong>Document Store</strong> (เช่น MongoDB) จัดเก็บข้อมูลเป็นเอกสารรูปแบบ JSON/BSON ที่มีโครงสร้างกึ่งยืดหยุ่น (Semi-structured) เหมาะกับข้อมูลที่มีรายละเอียดหลากหลายในแต่ละรายการ เช่น แคตตาล็อกสินค้า
                </p>

                <div class="code-window">
                    <div class="code-header">
                        <span class="code-lang">Key-value (Redis)</span>
                        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                            </svg>
                        </button>
                    </div>
                    <pre>SET user:1001:name "สมชาย ใจดี"
GET user:1001:name
EXPIRE user:1001:name 3600</pre>
                </div>

                <div class="code-window">
                    <div class="code-header">
                        <span class="code-lang">Document (MongoDB)</span>
                        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                            </svg>
                        </button>
                    </div>
                    <pre>db.products.insertOne({
    name: "คีย์บอร์ดเกมมิ่ง",
    price: 1290,
    tags: ["electronics", "gaming"],
    spec: { switch: "blue", backlight: true }
});</pre>
                </div>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="lesson-section">
                <h3>🛠️ 4. ตัวอย่างการปฏิบัติการทีละขั้นตอน (Step-by-Step Walkthrough)</h3>
                <p>ในบทปฏิบัติการนี้ ผู้เรียนจะสร้างฐานข้อมูลเชิงสัมพันธ์ด้วย MySQL และเปรียบเทียบกับการจัดเก็บข้อมูลแบบ Document ด้วย MongoDB</p>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 1</div>
                    <div class="step-detail">
                        <strong>สร้างฐานข้อมูลและตารางแบบ Relational ด้วย MySQL</strong>
                        <p>เปิดโปรแกรม MySQL Workbench แล้วรันคำสั่งสร้างฐานข้อมูลและตารางสินค้า:</p>

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
                            <pre>CREATE DATABASE shop_db;
USE shop_db;

CREATE TABLE products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    stock INT DEFAULT 0
);

INSERT INTO products (name, price, stock)
VALUES ('คีย์บอร์ดเกมมิ่ง', 1290.00, 25);</pre>
                        </div>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 2</div>
                    <div class="step-detail">
                        <strong>ทดลองจัดเก็บข้อมูลชุดเดียวกันแบบ Document ด้วย MongoDB</strong>
                        <p>เปิด MongoDB Compass หรือ mongosh แล้วสร้างคอลเลกชันสินค้าในรูปแบบเอกสาร:</p>

                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">mongosh</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>
                                </button>
                            </div>
                            <pre>use shop_db

db.products.insertOne({
    name: "คีย์บอร์ดเกมมิ่ง",
    price: 1290,
    stock: 25,
    promotion: { discount: 10, until: "2026-12-31" }
});

db.products.find();</pre>
                        </div>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 3</div>
                    <div class="step-detail">
                        <strong>วิเคราะห์เปรียบเทียบและสรุปผล</strong>
                        <p>สังเกตว่าตาราง <code class="inline-code">products</code> ใน MySQL ทุกแถวต้องมีคอลัมน์เหมือนกันตามที่ประกาศไว้ (Fixed Schema) แต่เอกสารใน MongoDB แต่ละรายการสามารถมีฟิลด์ <code class="inline-code">promotion</code> เพิ่มเติมได้โดยไม่กระทบรายการอื่น ซึ่งแสดงให้เห็นความยืดหยุ่นของโมเดล Document ที่เหมาะกับสินค้าที่มีรายละเอียดแตกต่างกันในแต่ละชิ้น</p>
                    </div>
                </div>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="assignment-box">
                <h3>📝 5. งานที่มอบหมายและเกณฑ์การประเมินผล (Assignment)</h3>
                <p><strong>ใบงานที่ 1: วิเคราะห์และเลือกรูปแบบการจัดเก็บข้อมูล</strong></p>
                <br>
                <p><strong>คำสั่ง:</strong></p>
                <ul style="margin-left: 20px;">
                    <li>กำหนดกรณีศึกษาระบบงาน 2 ระบบ (เช่น ระบบทะเบียนประวัตินักเรียน และระบบแคชข้อมูลหน้าเว็บไซต์) ให้ผู้เรียนวิเคราะห์ว่าควรใช้ฐานข้อมูลแบบ Relational, Key-value หรือ Document</li>
                    <li>สร้างตารางหรือคอลเลกชันตัวอย่างอย่างน้อย 1 ชุด พร้อมข้อมูลจำลองไม่น้อยกว่า 3 แถว/เอกสาร ตามรูปแบบที่เลือกไว้</li>
                    <li>เขียนสรุปเหตุผลประกอบการเลือกใช้เทคโนโลยีแต่ละกรณี พร้อมแคปเจอร์หน้าจอผลการรันคำสั่งส่งในระบบควบคุมห้องเรียน</li>
                </ul>

                <br>
                <p><strong>📊 เกณฑ์การตัดคะแนน (คะแนนเต็ม 5 คะแนน):</strong></p>
                <ul style="margin-left: 20px; font-size: 0.9rem; color: #78350f;">
                    <li>• ความถูกต้องในการจำแนกและเลือกใช้รูปแบบการจัดเก็บข้อมูล (2 คะแนน)</li>
                    <li>• ความสำเร็จในการสร้างตาราง/คอลเลกชันโดยไม่มี Error ค้าง (1 คะแนน)</li>
                    <li>• ความสมเหตุสมผลของคำอธิบายเหตุผลประกอบการเลือกใช้ (1 คะแนน)</li>
                    <li>• ความตรงต่อเวลาและความเป็นระเบียบของไฟล์งาน (1 คะแนน)</li>
                </ul>
            </section>

        </div>
    </div>

    <script src="../assets/js/script.js"></script>
</body>

</html>
