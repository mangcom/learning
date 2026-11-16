<?php
$base_dir = "../"; // ถอยกลับ 1 ชั้นเพื่อไปหาโฟลเดอร์หลัก
$active_nav = "database"; // เปิดสถานะเมนูที่วิชา เทคโนโลยีการจัดการฐานข้อมูล
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน่วยที่ 6: การจัดการทรานแซกชันและการควบคุมความถูกต้องของข้อมูล</title>
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
            <h2>หน่วยที่ 6: การจัดการทรานแซกชันและการควบคุมความถูกต้องของข้อมูล</h2>
            <p>สัปดาห์ที่ 9-10 | เวลาเรียน 10 ชั่วโมง (ทฤษฎี 2 ชม. ปฏิบัติ 8 ชม.)</p>
        </div>
    </div>

    <div class="container">
        <div class="single-layout">

            <section class="lesson-section">
                <div class="key-concept-box">
                    <strong>🎯 สารสำคัญ (Key Concepts)</strong>
                    <p>
                        ทรานแซกชัน (Transaction) คือกลุ่มของคำสั่ง SQL ที่ต้องทำงานสำเร็จร่วมกันทั้งหมดหรือยกเลิกทั้งหมด เพื่อรักษาความถูกต้องของข้อมูลตามคุณสมบัติ ACID เมื่อมีผู้ใช้งานหลายคนเข้าถึงข้อมูลพร้อมกัน จำเป็นต้องกำหนดระดับการแยกตัว (Isolation Level) ที่เหมาะสม เพื่อป้องกันปัญหาข้อมูลไม่สอดคล้องกัน เช่น Dirty Read หรือ Phantom Read รวมถึงปัญหา Deadlock ที่เกิดจากธุรกรรมสองรายการรอคอยการปลดล็อกข้อมูลของกันและกัน
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
                        <td>1. อธิบายคุณสมบัติ ACID และคำสั่งควบคุมทรานแซกชันได้<br>2. อธิบายระดับ Isolation Level และปัญหา Concurrency ที่เกี่ยวข้องได้</td>
                    </tr>
                    <tr>
                        <td><strong>ด้านทักษะ (Practice - P)</strong></td>
                        <td>1. เขียนคำสั่งควบคุมทรานแซกชันด้วย COMMIT, ROLLBACK และ SAVEPOINT ได้<br>2. กำหนดระดับ Isolation Level เพื่อป้องกันปัญหา Deadlock ได้</td>
                    </tr>
                    <tr>
                        <td><strong>ด้านเจตคติ (Attitude - A)</strong></td>
                        <td>1. ตระหนักถึงความสำคัญของการควบคุมทรานแซกชันในระบบที่มีผู้ใช้งานพร้อมกันจำนวนมาก</td>
                    </tr>
                </table>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="lesson-section">
                <h3>📘 3. เนื้อหาทางทฤษฎีเชิงลึก (Theoretical Core)</h3>

                <h4 class="topic-title">เรื่องที่ 6.1: คุณสมบัติ ACID และการใช้คำสั่ง Commit และ Rollback</h4>
                <p>
                    การเริ่มต้นทรานแซกชันทำได้ด้วยคำสั่ง <code class="inline-code">START TRANSACTION</code> เมื่อคำสั่งทั้งหมดในทรานแซกชันทำงานสำเร็จ ให้ใช้คำสั่ง <code class="inline-code">COMMIT</code> เพื่อบันทึกผลถาวร แต่หากพบข้อผิดพลาดระหว่างทาง สามารถใช้คำสั่ง <code class="inline-code">ROLLBACK</code> เพื่อยกเลิกการเปลี่ยนแปลงทั้งหมดและคืนสถานะข้อมูลกลับไปก่อนเริ่มทรานแซกชัน นอกจากนี้ยังสามารถกำหนดจุดย่อยด้วย <code class="inline-code">SAVEPOINT</code> เพื่อยกเลิกเพียงบางส่วนของทรานแซกชันได้
                </p>

                <h4 class="topic-title">เรื่องที่ 6.2: การจัดการระดับ Isolation Level และการป้องกันปัญหา Concurrency Control</h4>
                <table class="grading-table" style="margin: 15px 0;">
                    <tr style="background:#f1f5f9;">
                        <th>Isolation Level</th>
                        <th>ลักษณะการทำงาน</th>
                        <th>ปัญหาที่อาจป้องกันได้</th>
                    </tr>
                    <tr>
                        <td><strong>READ UNCOMMITTED</strong></td>
                        <td>อ่านข้อมูลที่ยังไม่ถูก Commit ได้</td>
                        <td>ไม่ป้องกัน Dirty Read</td>
                    </tr>
                    <tr>
                        <td><strong>READ COMMITTED</strong></td>
                        <td>อ่านได้เฉพาะข้อมูลที่ถูก Commit แล้ว</td>
                        <td>ป้องกัน Dirty Read</td>
                    </tr>
                    <tr>
                        <td><strong>REPEATABLE READ</strong></td>
                        <td>ข้อมูลที่อ่านซ้ำในทรานแซกชันเดียวกันต้องเหมือนเดิมเสมอ (ค่าเริ่มต้นของ InnoDB)</td>
                        <td>ป้องกัน Dirty Read และ Non-repeatable Read</td>
                    </tr>
                    <tr>
                        <td><strong>SERIALIZABLE</strong></td>
                        <td>ทรานแซกชันทำงานเรียงลำดับราวกับทำทีละรายการ</td>
                        <td>ป้องกันปัญหา Concurrency ได้ทั้งหมด แต่ประสิทธิภาพต่ำสุด</td>
                    </tr>
                </table>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="lesson-section">
                <h3>🛠️ 4. ตัวอย่างการปฏิบัติการทีละขั้นตอน (Step-by-Step Walkthrough)</h3>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 1</div>
                    <div class="step-detail">
                        <strong>จำลองทรานแซกชันการโอนสินค้าระหว่างคลัง</strong>
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
                            <pre>START TRANSACTION;

UPDATE products SET stock = stock - 5 WHERE product_id = 1;
SAVEPOINT after_deduct;

UPDATE products SET stock = stock + 5 WHERE product_id = 2;

-- หากพบว่าสินค้าปลายทางไม่มีอยู่จริง ให้ย้อนกลับไปจุด Savepoint
-- ROLLBACK TO after_deduct;

COMMIT;</pre>
                        </div>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 2</div>
                    <div class="step-detail">
                        <strong>ทดสอบการ Rollback เมื่อเกิดข้อผิดพลาด</strong>
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
                            <pre>START TRANSACTION;

UPDATE products SET stock = stock - 1000 WHERE product_id = 1;
-- พบว่าค่าสต็อกติดลบ ไม่ถูกต้องตามกฎธุรกิจ

ROLLBACK;

SELECT stock FROM products WHERE product_id = 1; -- ค่ากลับคืนเหมือนก่อนทำธุรกรรม</pre>
                        </div>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 3</div>
                    <div class="step-detail">
                        <strong>กำหนดระดับ Isolation Level ของเซสชัน</strong>
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
                            <pre>SET SESSION TRANSACTION ISOLATION LEVEL READ COMMITTED;
SHOW VARIABLES LIKE 'transaction_isolation';

-- ตรวจสอบธุรกรรมที่กำลังค้างและอาจก่อ Deadlock
SHOW ENGINE INNODB STATUS;</pre>
                        </div>
                        <p>เมื่อเกิด Deadlock ระหว่างสองทรานแซกชันที่ล็อกข้อมูลสลับลำดับกัน MySQL จะเลือกยกเลิกทรานแซกชันที่ใช้ทรัพยากรน้อยกว่าโดยอัตโนมัติ ผู้พัฒนาจึงควรออกแบบลำดับการเข้าถึงตารางให้สอดคล้องกันในทุกทรานแซกชันเพื่อลดโอกาสเกิดปัญหานี้</p>
                    </div>
                </div>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="assignment-box">
                <h3>📝 5. งานที่มอบหมายและเกณฑ์การประเมินผล (Assignment)</h3>
                <p><strong>ใบงานที่ 6: การควบคุมทรานแซกชันและ Isolation Level</strong></p>
                <br>
                <p><strong>คำสั่ง:</strong></p>
                <ul style="margin-left: 20px;">
                    <li>จำลองสถานการณ์ทรานแซกชันที่ต้องแก้ไขข้อมูลมากกว่า 1 ตารางพร้อมกัน แล้วเขียนคำสั่งควบคุมด้วย START TRANSACTION, SAVEPOINT, COMMIT และ ROLLBACK</li>
                    <li>ทดสอบกรณีที่ต้อง ROLLBACK เมื่อข้อมูลไม่ผ่านเงื่อนไขทางธุรกิจ พร้อมอธิบายผลลัพธ์</li>
                    <li>อธิบายการเลือกใช้ Isolation Level ให้เหมาะสมกับสถานการณ์จำลองของตนเอง พร้อมเหตุผลประกอบ</li>
                </ul>

                <br>
                <p><strong>📊 เกณฑ์การตัดคะแนน (คะแนนเต็ม 5 คะแนน):</strong></p>
                <ul style="margin-left: 20px; font-size: 0.9rem; color: #78350f;">
                    <li>• ความถูกต้องของคำสั่งควบคุมทรานแซกชัน (2 คะแนน)</li>
                    <li>• ความถูกต้องและความสมเหตุสมผลของการเลือก Isolation Level (2 คะแนน)</li>
                    <li>• ความตรงต่อเวลาและความเป็นระเบียบของไฟล์งาน (1 คะแนน)</li>
                </ul>
            </section>

        </div>
    </div>

    <script src="../assets/js/script.js"></script>
</body>

</html>
