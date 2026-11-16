<?php
$base_dir = "../"; // ถอยกลับ 1 ชั้นเพื่อไปหาโฟลเดอร์หลัก
$active_nav = "database"; // เปิดสถานะเมนูที่วิชา เทคโนโลยีการจัดการฐานข้อมูล
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน่วยที่ 8: เทคโนโลยีฐานข้อมูลสมัยใหม่และการจัดเก็บข้อมูลแบบผสมผสาน</title>
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
            <h2>หน่วยที่ 8: เทคโนโลยีฐานข้อมูลสมัยใหม่และการจัดเก็บข้อมูลแบบผสมผสาน</h2>
            <p>สัปดาห์ที่ 13-15 | เวลาเรียน 15 ชั่วโมง (ทฤษฎี 3 ชม. ปฏิบัติ 12 ชม.)</p>
        </div>
    </div>

    <div class="container">
        <div class="single-layout">

            <section class="lesson-section">
                <div class="key-concept-box">
                    <strong>🎯 สารสำคัญ (Key Concepts)</strong>
                    <p>
                        ระบบสารสนเทศสมัยใหม่มักไม่พึ่งพาฐานข้อมูลเพียงประเภทเดียว แต่เลือกใช้เทคโนโลยีฐานข้อมูลที่หลากหลายร่วมกันตามจุดแข็งของแต่ละประเภท เช่น ฐานข้อมูลในหน่วยความจำ (In-memory Database) สำหรับงานที่ต้องการความเร็วสูงสุด และฐานข้อมูล NoSQL สำหรับข้อมูลที่มีโครงสร้างยืดหยุ่น แนวคิดการผสมผสานเทคโนโลยีฐานข้อมูลหลายประเภทในระบบเดียวกันนี้เรียกว่า Polyglot Persistence ซึ่งช่วยให้แต่ละส่วนของระบบทำงานได้อย่างมีประสิทธิภาพสูงสุดตามลักษณะงานของตน
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
                        <td>1. อธิบายหลักการทำงานของ In-memory Database และฐานข้อมูล NoSQL ได้<br>2. อธิบายแนวคิดสถาปัตยกรรม Polyglot Persistence ได้</td>
                    </tr>
                    <tr>
                        <td><strong>ด้านทักษะ (Practice - P)</strong></td>
                        <td>1. ติดตั้งและจัดการฐานข้อมูลแบบ In-memory ได้<br>2. ประยุกต์ใช้ฐานข้อมูล NoSQL เชิงลึกและเชื่อมต่อผ่านแอปพลิเคชันได้<br>3. ออกแบบระบบที่ใช้ฐานข้อมูลหลายประเภทร่วมกันได้อย่างเหมาะสม</td>
                    </tr>
                    <tr>
                        <td><strong>ด้านเจตคติ (Attitude - A)</strong></td>
                        <td>1. มีความคิดเชิงนวัตกรรมในการเลือกและผสมผสานเทคโนโลยีฐานข้อมูลให้เหมาะสมกับระบบงานจริง</td>
                    </tr>
                </table>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="lesson-section">
                <h3>📘 3. เนื้อหาทางทฤษฎีเชิงลึก (Theoretical Core)</h3>

                <h4 class="topic-title">เรื่องที่ 8.1: การติดตั้งและจัดการฐานข้อมูลแบบ In-memory Database</h4>
                <p>
                    In-memory Database จัดเก็บข้อมูลหลักไว้ในหน่วยความจำ (RAM) แทนที่จะอ่าน-เขียนจากดิสก์โดยตรง ทำให้มีความเร็วในการตอบสนองสูงกว่าฐานข้อมูลทั่วไปหลายเท่า แต่ต้องบริหารจัดการเรื่องความคงทนของข้อมูล (Persistence) ด้วยกลไกเสริม เช่น Redis มีการบันทึกข้อมูลลงดิสก์เป็นระยะด้วย RDB Snapshot หรือบันทึกทุกคำสั่งด้วย AOF (Append Only File) เพื่อป้องกันข้อมูลสูญหายเมื่อเซิร์ฟเวอร์รีสตาร์ท
                </p>

                <h4 class="topic-title">เรื่องที่ 8.2: การประยุกต์ใช้ฐานข้อมูลประเภท NoSQL เชิงลึกและการเชื่อมต่อผ่านแอปพลิเคชัน</h4>
                <p>
                    การเชื่อมต่อฐานข้อมูล NoSQL จากฝั่งแอปพลิเคชันมักใช้ไดรเวอร์หรือไลบรารีเฉพาะของแต่ละภาษา เช่น การเชื่อมต่อ MongoDB ผ่าน Node.js ด้วยไลบรารี Mongoose หรือการเชื่อมต่อ Redis ผ่านไลบรารี ioredis ผู้พัฒนาต้องออกแบบโครงสร้างคอลเลกชันและคีย์ให้สอดคล้องกับรูปแบบการค้นหาข้อมูลที่แอปพลิเคชันต้องใช้งานบ่อยที่สุด เพื่อให้ได้ประสิทธิภาพสูงสุด
                </p>

                <h4 class="topic-title">เรื่องที่ 8.3: การออกแบบและประยุกต์ใช้สถาปัตยกรรม Polyglot Persistence สำหรับระบบสารสนเทศสมัยใหม่</h4>
                <p>
                    สถาปัตยกรรม Polyglot Persistence เลือกใช้ฐานข้อมูลที่เหมาะสมที่สุดสำหรับแต่ละส่วนของระบบ เช่น ระบบอีคอมเมิร์ซอาจใช้ MySQL (Relational) สำหรับข้อมูลคำสั่งซื้อและการเงินที่ต้องการความถูกต้องสูง ใช้ Redis (In-memory) สำหรับแคชตะกร้าสินค้าและเซสชันผู้ใช้ และใช้ MongoDB (Document) สำหรับแคตตาล็อกสินค้าที่มีรายละเอียดหลากหลาย การออกแบบลักษณะนี้ช่วยเพิ่มประสิทธิภาพโดยรวมของระบบ แต่ก็เพิ่มความซับซ้อนในการดูแลรักษาและการประสานข้อมูลระหว่างฐานข้อมูลหลายประเภท
                </p>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="lesson-section">
                <h3>🛠️ 4. ตัวอย่างการปฏิบัติการทีละขั้นตอน (Step-by-Step Walkthrough)</h3>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 1</div>
                    <div class="step-detail">
                        <strong>ติดตั้งและทดสอบ Redis เป็นฐานข้อมูลแคช (In-memory)</strong>
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
                            <pre>docker run -d --name redis-cache -p 6379:6379 redis:7

docker exec -it redis-cache redis-cli
SET cart:1001 "[{\"product_id\":1,\"qty\":2}]"
EXPIRE cart:1001 1800
GET cart:1001</pre>
                        </div>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 2</div>
                    <div class="step-detail">
                        <strong>เชื่อมต่อ MongoDB จากแอปพลิเคชัน Node.js ด้วย Mongoose</strong>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">Node.js</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>
                                </button>
                            </div>
                            <pre>const mongoose = require('mongoose');

mongoose.connect('mongodb://localhost:27017/shop_db');

const productSchema = new mongoose.Schema({
    name: String,
    price: Number,
    spec: Object
});

const Product = mongoose.model('Product', productSchema);

async function findCheapProducts() {
    const items = await Product.find({ price: { $lt: 1000 } });
    console.log(items);
}</pre>
                        </div>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 3</div>
                    <div class="step-detail">
                        <strong>ออกแบบสถาปัตยกรรม Polyglot Persistence สำหรับระบบร้านค้าออนไลน์จำลอง</strong>
                        <p>กำหนดบทบาทของฐานข้อมูลแต่ละประเภทให้ชัดเจนตามลักษณะงาน:</p>
                        <table class="grading-table" style="margin: 15px 0;">
                            <tr style="background:#f1f5f9;">
                                <th>ส่วนของระบบ</th>
                                <th>ฐานข้อมูลที่เลือกใช้</th>
                                <th>เหตุผล</th>
                            </tr>
                            <tr>
                                <td>คำสั่งซื้อและการชำระเงิน</td>
                                <td>MySQL (Relational)</td>
                                <td>ต้องการความถูกต้องสูงตามหลัก ACID</td>
                            </tr>
                            <tr>
                                <td>ตะกร้าสินค้าและเซสชันผู้ใช้</td>
                                <td>Redis (In-memory)</td>
                                <td>ต้องการความเร็วในการอ่าน-เขียนสูงสุด</td>
                            </tr>
                            <tr>
                                <td>แคตตาล็อกสินค้า</td>
                                <td>MongoDB (Document)</td>
                                <td>โครงสร้างข้อมูลสินค้าแต่ละชิ้นแตกต่างกัน</td>
                            </tr>
                        </table>
                        <p>เมื่อออกแบบเสร็จแล้ว ผู้เรียนจะต้องพิจารณาว่าข้อมูลใดต้องซิงค์ข้ามฐานข้อมูล (เช่น ราคาสินค้าที่ต้องตรงกันทั้งใน MySQL และ MongoDB) และวางแผนกระบวนการประสานข้อมูลให้สอดคล้องกัน</p>
                    </div>
                </div>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="assignment-box">
                <h3>📝 5. งานที่มอบหมายและเกณฑ์การประเมินผล (Assignment)</h3>
                <p><strong>ใบงานที่ 8: การออกแบบระบบฐานข้อมูลแบบผสมผสาน (Polyglot Persistence)</strong></p>
                <br>
                <p><strong>คำสั่ง:</strong></p>
                <ul style="margin-left: 20px;">
                    <li>ติดตั้งและทดสอบฐานข้อมูลแบบ In-memory (Redis) เพื่อจัดเก็บข้อมูลชั่วคราวอย่างน้อย 1 กรณีใช้งาน</li>
                    <li>ออกแบบโครงสร้างระบบงานจำลองของตนเองที่ต้องใช้ฐานข้อมูลอย่างน้อย 3 ประเภทร่วมกัน (Relational, Document, In-memory) พร้อมระบุเหตุผลในการเลือกแต่ละประเภท</li>
                    <li>นำเสนอแผนภาพสถาปัตยกรรม Polyglot Persistence ของระบบที่ออกแบบ พร้อมอธิบายวิธีประสานข้อมูลระหว่างฐานข้อมูลแต่ละประเภท</li>
                </ul>

                <br>
                <p><strong>📊 เกณฑ์การตัดคะแนน (คะแนนเต็ม 5 คะแนน):</strong></p>
                <ul style="margin-left: 20px; font-size: 0.9rem; color: #78350f;">
                    <li>• ความสำเร็จในการติดตั้งและทดสอบ In-memory Database (1 คะแนน)</li>
                    <li>• ความสมเหตุสมผลในการออกแบบและเลือกใช้ฐานข้อมูลแต่ละประเภท (2 คะแนน)</li>
                    <li>• ความชัดเจนของแผนภาพสถาปัตยกรรมและคำอธิบายการประสานข้อมูล (1 คะแนน)</li>
                    <li>• ความตรงต่อเวลาและความเป็นระเบียบของไฟล์งาน (1 คะแนน)</li>
                </ul>
            </section>

        </div>
    </div>

    <script src="../assets/js/script.js"></script>
</body>

</html>
