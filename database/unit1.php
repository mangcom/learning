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

            <section class="lesson-section">
                <h3>🧪 5. กรณีศึกษา: การติดตั้งและใช้งาน MongoDB ด้วย Docker บน Windows พร้อมกระบวนการ CRUD</h3>
                <p>
                    กรณีศึกษานี้จำลองรูปแบบการทำงานจริงของนักพัฒนาระบบ โดยรัน MongoDB เป็น Container ด้วย <strong>Docker Compose</strong> แทนการติดตั้งตัวเซิร์ฟเวอร์ลงเครื่องโดยตรง ซึ่งเป็นแนวทางที่นิยมใช้เตรียมฐานข้อมูลไว้สำหรับพัฒนาแอปพลิเคชันด้วย TypeScript ในขั้นตอนถัดไป จากนั้นนักศึกษาจะติดตั้ง <strong>mongosh</strong> บนเครื่อง Windows เพื่อ Remote เข้าไปจัดการข้อมูลใน Container และฝึกปฏิบัติกระบวนการ <strong>CRUD</strong> (Create, Read, Update, Delete) ให้ครบวงจร ก่อนปิดท้ายด้วยการเขียนโปรแกรมภาษา TypeScript อย่างง่ายเพื่อเชื่อมต่อและดึงข้อมูลมาแสดงผล
                </p>

                <div class="key-concept-box">
                    <strong>📖 ตารางเทียบศัพท์ สำหรับผู้ที่เคยเรียน MySQL มาก่อน</strong>
                    <p>เนื่องจากนักศึกษาส่วนใหญ่คุ้นเคยกับคำศัพท์ของฐานข้อมูลเชิงสัมพันธ์ (MySQL) มาก่อนแล้ว ตารางต่อไปนี้เทียบคำศัพท์และวิธีคิดที่ตรงกันระหว่าง MySQL กับ MongoDB เพื่อให้ปรับตัวเข้าใจกรณีศึกษานี้ได้ง่ายขึ้น</p>
                    <table class="grading-table" style="margin-top: 15px;">
                        <tr style="background:#f1f5f9;">
                            <th>คำศัพท์/คำสั่งใน MySQL</th>
                            <th>เทียบเท่าใน MongoDB</th>
                            <th>คำอธิบายเพิ่มเติม</th>
                        </tr>
                        <tr>
                            <td><strong>Database</strong></td>
                            <td><strong>Database</strong></td>
                            <td>ยังคงเป็นที่รวมของ Table/Collection ทั้งหมดเหมือนเดิม</td>
                        </tr>
                        <tr>
                            <td><strong>Table</strong> (ตาราง)</td>
                            <td><strong>Collection</strong> (คอลเลกชัน)</td>
                            <td>กลุ่มของข้อมูลที่เก็บร่วมกัน แต่ไม่บังคับให้ทุกรายการมีโครงสร้างคอลัมน์เหมือนกัน</td>
                        </tr>
                        <tr>
                            <td><strong>Row</strong> (แถว)</td>
                            <td><strong>Document</strong> (เอกสาร)</td>
                            <td>หนึ่งระเบียนข้อมูล จัดเก็บในรูปแบบ JSON/BSON แทนแถวของตาราง</td>
                        </tr>
                        <tr>
                            <td><strong>Column</strong> (คอลัมน์)</td>
                            <td><strong>Field</strong> (ฟิลด์)</td>
                            <td>ชื่อคีย์ภายในเอกสาร แต่ละเอกสารในคอลเลกชันเดียวกันมีฟิลด์ต่างกันได้</td>
                        </tr>
                        <tr>
                            <td><strong>Primary Key</strong></td>
                            <td><code class="inline-code">_id</code></td>
                            <td>MongoDB สร้างฟิลด์ <code class="inline-code">_id</code> ให้อัตโนมัติเป็นค่าไม่ซ้ำกัน (ObjectId) ในทุกเอกสาร</td>
                        </tr>
                        <tr>
                            <td><strong>Foreign Key / JOIN</strong></td>
                            <td>Embedding หรือ <code class="inline-code">$lookup</code></td>
                            <td>นิยมฝังข้อมูลที่เกี่ยวข้องไว้ในเอกสารเดียวกัน (Embed) แทนการ JOIN ข้ามตาราง หรือใช้ <code class="inline-code">$lookup</code> เมื่อจำเป็นต้องอ้างอิงข้ามคอลเลกชัน</td>
                        </tr>
                        <tr>
                            <td>Schema ตายตัว (กำหนดคอลัมน์ล่วงหน้า)</td>
                            <td>Schema-less</td>
                            <td>ไม่บังคับโครงสร้าง เพิ่มฟิลด์ใหม่ในบางเอกสารได้โดยไม่กระทบเอกสารอื่น</td>
                        </tr>
                        <tr>
                            <td><code class="inline-code">CREATE TABLE</code></td>
                            <td><code class="inline-code">db.createCollection()</code></td>
                            <td>สร้างคอลเลกชันใหม่ (หรือเกิดขึ้นอัตโนมัติเมื่อ insert ครั้งแรกก็ได้)</td>
                        </tr>
                        <tr>
                            <td><code class="inline-code">INSERT INTO ... VALUES</code></td>
                            <td><code class="inline-code">insertOne()</code> / <code class="inline-code">insertMany()</code></td>
                            <td>เพิ่มข้อมูล 1 รายการ หรือหลายรายการพร้อมกัน</td>
                        </tr>
                        <tr>
                            <td><code class="inline-code">SELECT * FROM table</code></td>
                            <td><code class="inline-code">db.collection.find()</code></td>
                            <td>ดึงข้อมูลทั้งหมดในคอลเลกชัน</td>
                        </tr>
                        <tr>
                            <td><code class="inline-code">SELECT ... WHERE condition</code></td>
                            <td><code class="inline-code">db.collection.find({ condition })</code></td>
                            <td>ดึงข้อมูลแบบมีเงื่อนไข โดยส่งเงื่อนไขเป็นอ็อบเจกต์แทนประโยค WHERE</td>
                        </tr>
                        <tr>
                            <td><code class="inline-code">UPDATE ... SET ... WHERE</code></td>
                            <td><code class="inline-code">updateOne()</code> / <code class="inline-code">updateMany()</code> กับ <code class="inline-code">$set</code></td>
                            <td>แก้ไขค่าของฟิลด์ในเอกสารที่ตรงเงื่อนไข</td>
                        </tr>
                        <tr>
                            <td><code class="inline-code">DELETE FROM ... WHERE</code></td>
                            <td><code class="inline-code">deleteOne()</code> / <code class="inline-code">deleteMany()</code></td>
                            <td>ลบเอกสารที่ตรงเงื่อนไข 1 รายการ หรือหลายรายการ</td>
                        </tr>
                        <tr>
                            <td><code class="inline-code">ALTER TABLE</code> (เพิ่ม/แก้คอลัมน์)</td>
                            <td>ไม่จำเป็น</td>
                            <td>เพิ่มฟิลด์ใหม่ในเอกสารที่ต้องการได้โดยตรง โดยไม่ต้องแก้โครงสร้างคอลเลกชันหรือกระทบเอกสารอื่น</td>
                        </tr>
                        <tr>
                            <td><code class="inline-code">CREATE INDEX</code></td>
                            <td><code class="inline-code">db.collection.createIndex()</code></td>
                            <td>สร้างดัชนีเพื่อเร่งความเร็วการค้นหา ใช้แนวคิดเดียวกับ Index ของ MySQL</td>
                        </tr>
                        <tr>
                            <td><code class="inline-code">START TRANSACTION / COMMIT</code></td>
                            <td>Multi-document Transaction</td>
                            <td>รองรับเช่นกัน แต่ต้องตั้งค่าเซิร์ฟเวอร์เป็น Replica Set ก่อนจึงจะใช้งานได้</td>
                        </tr>
                    </table>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 1</div>
                    <div class="step-detail">
                        <strong>ติดตั้ง Docker Desktop และสร้าง MongoDB ด้วย Docker Compose</strong>
                        <ol style="margin-left: 20px;">
                            <li>ดาวน์โหลดและติดตั้ง <strong>Docker Desktop for Windows</strong> จากเว็บไซต์ทางการ <code class="inline-code">docker.com/products/docker-desktop</code> (ตัวติดตั้งจะแนะนำให้เปิดใช้งาน WSL2 ซึ่งจำเป็นสำหรับ Docker บน Windows)</li>
                            <li>เปิดโปรแกรม Docker Desktop ทิ้งไว้จนสถานะเป็น <strong>Running</strong> แล้วตรวจสอบเวอร์ชันด้วย PowerShell</li>
                        </ol>

                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">PowerShell</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>
                                </button>
                            </div>
                            <pre>docker --version
docker compose version</pre>
                        </div>

                        <p>สร้างโฟลเดอร์โปรเจกต์ เช่น <code class="inline-code">mongo-ts-demo</code> แล้วสร้างไฟล์ชื่อ <code class="inline-code">docker-compose.yml</code> ไว้ในโฟลเดอร์นั้น เพื่อกำหนดให้ Docker ดึง MongoDB มารันเป็น Container ให้อัตโนมัติ:</p>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">docker-compose.yml</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>
                                </button>
                            </div>
                            <pre>services:
  mongodb:
    image: mongo:7
    container_name: school-mongo
    restart: unless-stopped
    ports:
      - "27017:27017"
    volumes:
      - mongo-data:/data/db

volumes:
  mongo-data:</pre>
                        </div>

                        <p>อธิบายแต่ละส่วนของไฟล์:</p>
                        <ul style="margin-left: 20px;">
                            <li><code class="inline-code">image: mongo:7</code> — ดึง Image ของ MongoDB เวอร์ชัน 7 จาก Docker Hub มารันเป็น Container โดยไม่ต้องติดตั้งตัวเซิร์ฟเวอร์ลงเครื่อง Windows โดยตรง</li>
                            <li><code class="inline-code">ports: "27017:27017"</code> — เปิด Port 27017 ของเครื่อง Windows (ตัวเลขด้านซ้าย) ให้เชื่อมต่อทะลุเข้าไปยัง Port 27017 ภายใน Container (ตัวเลขด้านขวา) ซึ่งเป็น Port มาตรฐานที่ MongoDB ใช้รับการเชื่อมต่อ</li>
                            <li><code class="inline-code">volumes: mongo-data:/data/db</code> — เก็บไฟล์ข้อมูลจริงไว้ใน Docker Volume ชื่อ <code class="inline-code">mongo-data</code> เพื่อให้ข้อมูลยังอยู่ครบแม้จะลบหรือสร้าง Container ขึ้นมาใหม่</li>
                        </ul>

                        <p>สั่งให้ Container เริ่มทำงานด้วยคำสั่งต่อไปนี้ภายในโฟลเดอร์ที่มีไฟล์ <code class="inline-code">docker-compose.yml</code>:</p>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">PowerShell</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>
                                </button>
                            </div>
                            <pre>docker compose up -d
docker compose ps</pre>
                        </div>
                        <p>คำสั่ง <code class="inline-code">docker compose ps</code> ใช้ตรวจสอบว่า Container ชื่อ <code class="inline-code">school-mongo</code> มีสถานะ Up และพร้อมรับการเชื่อมต่อแล้ว</p>
                        <p style="font-size:0.9rem; color:#64748b;">💡 หมายเหตุ: ในสถานการณ์ใช้งานจริงควรกำหนดชื่อผู้ใช้และรหัสผ่านให้ MongoDB ผ่านตัวแปรแวดล้อม <code class="inline-code">MONGO_INITDB_ROOT_USERNAME</code> และ <code class="inline-code">MONGO_INITDB_ROOT_PASSWORD</code> ใน docker-compose.yml เพื่อความปลอดภัย แต่กรณีศึกษานี้ละการตั้งรหัสผ่านไว้ก่อน เพื่อให้ขั้นตอนถัดไปไม่ซับซ้อนเกินไป</p>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 2</div>
                    <div class="step-detail">
                        <strong>ติดตั้งและใช้งาน mongosh บน Windows เพื่อ Remote เข้าไปยัง MongoDB ใน Docker</strong>
                        <p>เนื่องจาก MongoDB ในขั้นตอนที่แล้วรันอยู่ <em>ภายใน Container</em> ไม่ได้ติดตั้งลงเครื่อง Windows ตรง ๆ นักศึกษาจึงต้องติดตั้งโปรแกรม <strong>mongosh</strong> (MongoDB Shell) แยกไว้บนเครื่อง Windows เพื่อใช้เป็นเครื่องมือ Remote เข้าไปสั่งงานฐานข้อมูลที่อยู่ใน Container</p>
                        <p>ติดตั้งผ่าน winget (มีมาพร้อม Windows 10/11 รุ่นใหม่):</p>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">PowerShell</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>
                                </button>
                            </div>
                            <pre>winget install MongoDB.Shell</pre>
                        </div>
                        <p>หากไม่สะดวกใช้ winget สามารถดาวน์โหลดตัวติดตั้ง mongosh แบบ .msi ได้จาก <code class="inline-code">mongodb.com/try/download/shell</code> โดยตรง จากนั้นตรวจสอบว่าติดตั้งสำเร็จ:</p>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">PowerShell</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>
                                </button>
                            </div>
                            <pre>mongosh --version</pre>
                        </div>

                        <p>จากนั้น Remote จากเครื่อง Windows เข้าไปยัง MongoDB ที่รันอยู่ใน Container ผ่าน Port 27017 ที่เปิดไว้ในขั้นตอนที่ 1:</p>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">PowerShell</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>
                                </button>
                            </div>
                            <pre>mongosh "mongodb://localhost:27017"</pre>
                        </div>

                        <p>ที่เรียกขั้นตอนนี้ว่า <strong>"Remote"</strong> เพราะโปรแกรม mongosh ทำงานอยู่บนเครื่อง Windows โดยตรง ขณะที่ตัวเซิร์ฟเวอร์ MongoDB ทำงานแยกอยู่อีกสภาพแวดล้อมหนึ่งคือภายใน Container โดยทั้งสองฝั่งสื่อสารกันผ่านเครือข่าย TCP/IP ที่ Port 27017 — เป็นรูปแบบเดียวกับการเชื่อมต่อไปยังเซิร์ฟเวอร์ฐานข้อมูลบน Production จริง เพียงเปลี่ยนจาก <code class="inline-code">localhost</code> เป็นหมายเลข IP หรือชื่อโดเมนของเซิร์ฟเวอร์ปลายทาง เช่น <code class="inline-code">mongosh "mongodb://192.168.1.50:27017"</code></p>

                        <p>เพื่อเทียบความแตกต่าง ลองสังเกตว่ายังสามารถเข้าไปใช้งาน mongosh จาก<strong>ภายใน Container เอง</strong>ได้โดยตรงโดยไม่ผ่านเครือข่าย ด้วยคำสั่ง:</p>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">PowerShell</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>
                                </button>
                            </div>
                            <pre>docker exec -it school-mongo mongosh</pre>
                        </div>
                        <p style="font-size:0.9rem; color:#64748b;">💡 ความต่าง: คำสั่งข้างบนรันคำสั่ง mongosh <em>ที่ติดตั้งอยู่ในตัว Image ของ Container</em> ส่วนคำสั่งก่อนหน้า (<code class="inline-code">mongosh "mongodb://localhost:27017"</code>) รัน mongosh <em>ที่ติดตั้งบนเครื่อง Windows</em> แล้ว Remote ผ่านเครือข่ายเข้าไป ซึ่งเป็นวิธีที่ใกล้เคียงกับการทำงานจริงมากกว่า เพราะเครื่องพัฒนาแอปพลิเคชันมักไม่ใช่เครื่องเดียวกับเซิร์ฟเวอร์ฐานข้อมูล</p>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 3</div>
                    <div class="step-detail">
                        <strong>สร้างฐานข้อมูลและคอลเลกชัน (Create Database &amp; Collection)</strong>
                        <p>ใน MongoDB คำว่า <strong>ตาราง</strong> ของฐานข้อมูลเชิงสัมพันธ์เทียบได้กับ <strong>Collection</strong> คำสั่ง <code class="inline-code">use</code> จะสลับไปยังฐานข้อมูลที่ระบุ และ MongoDB จะสร้างฐานข้อมูลนั้นจริงก็ต่อเมื่อมีการบันทึกข้อมูลอย่างน้อย 1 รายการ</p>
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
                            <pre>use school_db

db.createCollection("students")
show collections</pre>
                        </div>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 4</div>
                    <div class="step-detail">
                        <strong>นำข้อมูลเข้า 1 รายการ และหลายรายการ (Create)</strong>
                        <p>ใช้ <code class="inline-code">insertOne()</code> สำหรับข้อมูล 1 รายการ และ <code class="inline-code">insertMany()</code> สำหรับข้อมูลหลายรายการพร้อมกัน:</p>
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
                            <pre>// เพิ่มข้อมูล 1 รายการ
db.students.insertOne({
    student_id: "6401",
    name: "สมหญิง ขยันเรียน",
    major: "เทคโนโลยีสารสนเทศ",
    gpa: 3.75
});

// เพิ่มข้อมูลหลายรายการพร้อมกัน
db.students.insertMany([
    { student_id: "6402", name: "วรากร ตั้งใจดี", major: "เทคโนโลยีสารสนเทศ", gpa: 3.20 },
    { student_id: "6403", name: "ปิยะดา เรียนเก่ง", major: "คอมพิวเตอร์ธุรกิจ", gpa: 2.95 },
    { student_id: "6404", name: "ธนกร สู้งาน", major: "เทคโนโลยีสารสนเทศ", gpa: 3.50 }
]);</pre>
                        </div>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 5</div>
                    <div class="step-detail">
                        <strong>ค้นหาข้อมูลทั้งหมด และค้นหาแบบมีเงื่อนไข (Read)</strong>
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
                            <pre>// ค้นหาข้อมูลทั้งหมดในคอลเลกชัน
db.students.find();

// ค้นหาแบบมีเงื่อนไข: เฉพาะสาขาเทคโนโลยีสารสนเทศ
db.students.find({ major: "เทคโนโลยีสารสนเทศ" });

// ค้นหาแบบมีเงื่อนไข: เกรดเฉลี่ยตั้งแต่ 3.0 ขึ้นไป
db.students.find({ gpa: { $gte: 3.0 } });</pre>
                        </div>

                        <p><code class="inline-code">$gte</code> คือ <strong>Query Operator</strong> (ตัวดำเนินการสำหรับตั้งเงื่อนไขค้นหา) ย่อมาจาก "greater than or equal" แปลว่า <strong>"มากกว่าหรือเท่ากับ"</strong> คำสั่งข้างบนจึงหมายถึง ค้นหาเฉพาะนักศึกษาที่มี <code class="inline-code">gpa</code> ตั้งแต่ 3.0 ขึ้นไป MongoDB มี Query Operator กลุ่มเปรียบเทียบอยู่หลายตัว เทียบกับเครื่องหมายที่ใช้ใน SQL ได้ดังนี้:</p>
                        <table class="grading-table" style="margin-top: 10px;">
                            <tr style="background:#f1f5f9;">
                                <th>Operator ใน MongoDB</th>
                                <th>ความหมาย</th>
                                <th>เทียบเท่าใน SQL</th>
                            </tr>
                            <tr>
                                <td><code class="inline-code">$eq</code></td>
                                <td>เท่ากับ</td>
                                <td><code class="inline-code">=</code></td>
                            </tr>
                            <tr>
                                <td><code class="inline-code">$ne</code></td>
                                <td>ไม่เท่ากับ</td>
                                <td><code class="inline-code">!=</code></td>
                            </tr>
                            <tr>
                                <td><code class="inline-code">$gt</code></td>
                                <td>มากกว่า</td>
                                <td><code class="inline-code">&gt;</code></td>
                            </tr>
                            <tr>
                                <td><code class="inline-code">$gte</code></td>
                                <td>มากกว่าหรือเท่ากับ</td>
                                <td><code class="inline-code">&gt;=</code></td>
                            </tr>
                            <tr>
                                <td><code class="inline-code">$lt</code></td>
                                <td>น้อยกว่า</td>
                                <td><code class="inline-code">&lt;</code></td>
                            </tr>
                            <tr>
                                <td><code class="inline-code">$lte</code></td>
                                <td>น้อยกว่าหรือเท่ากับ</td>
                                <td><code class="inline-code">&lt;=</code></td>
                            </tr>
                        </table>
                        <p style="font-size:0.9rem; color:#64748b;">💡 สังเกตว่า Operator ของ MongoDB ทุกตัวต้องเขียนเป็นข้อความในเครื่องหมายคำพูดและขึ้นต้นด้วย <code class="inline-code">$</code> เสมอ เพราะในรูปแบบ JSON/BSON ไม่มีสัญลักษณ์ <code class="inline-code">&gt;</code> <code class="inline-code">&lt;</code> ให้ใช้เหมือน SQL จึงต้องใช้ชื่อ Operator แทน</p>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 6</div>
                    <div class="step-detail">
                        <strong>แก้ไขข้อมูล และลบข้อมูล (Update &amp; Delete)</strong>
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
                            <pre>// แก้ไขข้อมูลรายการเดียว
db.students.updateOne(
    { student_id: "6402" },
    { $set: { gpa: 3.40 } }
);

// แก้ไขข้อมูลหลายรายการที่ตรงเงื่อนไข
db.students.updateMany(
    { major: "เทคโนโลยีสารสนเทศ" },
    { $set: { status: "active" } }
);

// ลบข้อมูลรายการเดียว
db.students.deleteOne({ student_id: "6404" });

// ลบข้อมูลหลายรายการที่ตรงเงื่อนไข
db.students.deleteMany({ gpa: { $lt: 2.0 } });</pre>
                        </div>

                        <p><code class="inline-code">$set</code> คือ <strong>Update Operator</strong> (ตัวดำเนินการสำหรับแก้ไขข้อมูล) ใช้บอกว่า "กำหนดค่าใหม่" ให้เฉพาะฟิลด์ที่ระบุไว้เท่านั้น ฟิลด์อื่น ๆ ในเอกสารจะไม่ถูกแก้ไข เช่น <code class="inline-code">{ $set: { gpa: 3.40 } }</code> แก้ไขเฉพาะฟิลด์ <code class="inline-code">gpa</code> ส่วนฟิลด์ <code class="inline-code">name</code>, <code class="inline-code">major</code> ยังคงเดิม <strong style="color:#b45309;">ข้อควรระวัง:</strong> ถ้าไม่ใส่ <code class="inline-code">$set</code> แล้วส่ง <code class="inline-code">{ gpa: 3.40 }</code> เข้าไปตรง ๆ MongoDB จะเข้าใจว่าต้องการ<strong>แทนที่เอกสารทั้งอัน</strong>ด้วยข้อมูลใหม่นี้ ทำให้ฟิลด์อื่นที่ไม่ได้ระบุหายไปทั้งหมด</p>

                        <p>ส่วน <code class="inline-code">$lt</code> ในคำสั่งลบคือ Query Operator ตัวเดียวกับที่อธิบายไว้ในขั้นตอนที่ 5 ("น้อยกว่า" ตรงข้ามกับ <code class="inline-code">$gte</code>) คำสั่ง <code class="inline-code">db.students.deleteMany({ gpa: { $lt: 2.0 } })</code> จึงหมายถึง ลบนักศึกษาทุกคนที่มี <code class="inline-code">gpa</code> ต่ำกว่า 2.0 ทิ้งไปทั้งหมด</p>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 7</div>
                    <div class="step-detail">
                        <strong>แสดงผลข้อมูลด้วยภาษา TypeScript อย่างง่ายเบื้องต้น</strong>
                        <p>ติดตั้งไลบรารีที่จำเป็นสำหรับเชื่อมต่อ MongoDB จาก Node.js ด้วย TypeScript:</p>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">PowerShell</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>
                                </button>
                            </div>
                            <pre>mkdir mongo-ts-demo
cd mongo-ts-demo
npm init -y
npm install mongodb
npm install -D typescript tsx @types/node</pre>
                        </div>

                        <p>สร้างไฟล์ <code class="inline-code">app.ts</code> เพื่อเชื่อมต่อฐานข้อมูลและดึงรายชื่อนักศึกษามาแสดงผล:</p>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">TypeScript</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>
                                </button>
                            </div>
                            <pre>import { MongoClient } from "mongodb";

// กำหนดโครงสร้างข้อมูล (Type) ให้ตรงกับเอกสารใน MongoDB
interface Student {
    student_id: string;
    name: string;
    major: string;
    gpa: number;
}

async function main() {
    const client = new MongoClient("mongodb://localhost:27017");
    await client.connect();

    const db = client.db("school_db");
    const students = db.collection<Student>("students");

    const allStudents = await students.find().toArray();

    console.log("รายชื่อนักศึกษาทั้งหมด:");
    console.table(allStudents);

    await client.close();
}

main().catch(console.error);</pre>
                        </div>

                        <p>สั่งรันโปรแกรมด้วยคำสั่ง:</p>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">PowerShell</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>
                                </button>
                            </div>
                            <pre>npx tsx app.ts</pre>
                        </div>

                        <p><strong>หลังรันคำสั่งนี้ไม่ต้องทำอะไรเพิ่ม</strong> โปรแกรมจะเชื่อมต่อฐานข้อมูล ดึงข้อมูล และแสดงผลลัพธ์กลับมาที่หน้าต่าง Terminal เดิมทันที (ไม่ต้องเปิดเบราว์เซอร์หรือไปเปิดโปรแกรมอื่น) เพียงรอสักครู่จนขึ้นข้อความแล้วอ่านผลที่ปรากฏบนหน้าจอได้เลย สิ่งที่ควรเห็นมีลักษณะประมาณนี้ (จัดรูปแบบจริงอาจต่างกันเล็กน้อยตาม Terminal ของแต่ละเครื่อง):</p>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">ผลลัพธ์ที่คาดว่าจะเห็น</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>
                                </button>
                            </div>
                            <pre>รายชื่อนักศึกษาทั้งหมด:
┌─────────┬────────────┬──────────────────────┬──────┬──────────┐
│ (index) │ student_id │ name                 │ gpa  │ status   │
├─────────┼────────────┼──────────────────────┼──────┼──────────┤
│    0    │   '6401'   │ 'สมหญิง ขยันเรียน'    │ 3.75 │ 'active' │
│    1    │   '6402'   │ 'วรากร ตั้งใจดี'      │ 3.4  │ 'active' │
│    2    │   '6403'   │ 'ปิยะดา เรียนเก่ง'    │ 2.95 │          │
└─────────┴────────────┴──────────────────────┴──────┴──────────┘</pre>
                        </div>
                        <p>วิธีอ่านผล: จะเหลือนักศึกษาเพียง 3 คน (6401, 6402, 6403) เพราะ 6404 ถูกลบไปด้วย <code class="inline-code">deleteOne()</code> ในขั้นตอนที่ 6 ส่วนคอลัมน์ <code class="inline-code">gpa</code> ของ 6402 เปลี่ยนจาก 3.20 เป็น 3.40 ตามที่แก้ไขด้วย <code class="inline-code">updateOne()</code> และมีคอลัมน์ <code class="inline-code">status</code> เป็น <code class="inline-code">'active'</code> เฉพาะแถวที่สาขาเป็นเทคโนโลยีสารสนเทศ (ตรงกับที่ <code class="inline-code">updateMany()</code> เพิ่มฟิลด์นี้ให้) ส่วน 6403 ไม่มีค่าในคอลัมน์นี้เพราะไม่ตรงเงื่อนไข ซึ่งแสดงให้เห็นว่าโปรแกรมภาษาใดก็ตามสามารถเชื่อมต่อและทำงานร่วมกับฐานข้อมูล MongoDB ได้ผ่านไดรเวอร์ (Driver) ของภาษานั้น ๆ</p>

                        <p><strong>tsx กับ ts-node ต่างกันอย่างไร:</strong> ทั้งสองเป็นโปรแกรมที่ใช้รันไฟล์ TypeScript โดยไม่ต้องสั่ง compile เป็น JavaScript ก่อนด้วยมือ แต่ทำงานภายในต่างกัน และส่งผลต่อความเสถียรต่างกันดังนี้:</p>
                        <table class="grading-table" style="margin-top: 10px;">
                            <tr style="background:#f1f5f9;">
                                <th>หัวข้อ</th>
                                <th>ts-node</th>
                                <th>tsx</th>
                            </tr>
                            <tr>
                                <td>หลักการทำงาน</td>
                                <td>เรียกใช้ TypeScript Compiler (<code class="inline-code">tsc</code>) ของจริง ตรวจสอบ Type อย่างเข้มงวดก่อนรัน</td>
                                <td>ใช้ esbuild แปลง (transpile) โค้ดอย่างรวดเร็ว โดยไม่ตรวจ Type อย่างเข้มงวด</td>
                            </tr>
                            <tr>
                                <td>ความเร็ว</td>
                                <td>ช้ากว่า เพราะต้องผ่านขั้นตอนตรวจสอบ Type เต็มรูปแบบ</td>
                                <td>เร็วกว่ามาก เหมาะกับการรันทดสอบบ่อย ๆ</td>
                            </tr>
                            <tr>
                                <td>การตั้งค่า</td>
                                <td>มักต้องมีไฟล์ <code class="inline-code">tsconfig.json</code> และปรับแต่งเพิ่มเติม</td>
                                <td>รันได้ทันทีแม้ไม่มี <code class="inline-code">tsconfig.json</code></td>
                            </tr>
                            <tr>
                                <td>ความเข้ากันได้</td>
                                <td>พบปัญหากับ Node.js/TypeScript บางเวอร์ชันใหม่ ๆ (ดังที่พบ Error ในกรณีศึกษานี้)</td>
                                <td>รองรับ Node.js เวอร์ชันใหม่ได้ดีกว่าและมีปัญหาลักษณะนี้น้อยกว่า</td>
                            </tr>
                            <tr>
                                <td>เหมาะกับ</td>
                                <td>โปรเจกต์ขนาดใหญ่ที่ต้องการให้ตรวจสอบ Type ความถูกต้องอย่างเข้มงวดระหว่างพัฒนา</td>
                                <td>งานทดสอบ/สาธิตที่ต้องการความรวดเร็วและไม่ยุ่งยาก เช่นกรณีศึกษานี้</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="assignment-box">
                <h3>📝 6. งานที่มอบหมายและเกณฑ์การประเมินผล (Assignment)</h3>
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
