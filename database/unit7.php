<?php
$base_dir = "../"; // ถอยกลับ 1 ชั้นเพื่อไปหาโฟลเดอร์หลัก
$active_nav = "database"; // เปิดสถานะเมนูที่วิชา เทคโนโลยีการจัดการฐานข้อมูล
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน่วยที่ 7: การทำสำเนาข้อมูลและการบำรุงรักษาซ่อมแซมฐานข้อมูล</title>
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
            <h2>หน่วยที่ 7: การทำสำเนาข้อมูลและการบำรุงรักษาซ่อมแซมฐานข้อมูล</h2>
            <p>สัปดาห์ที่ 11-12 | เวลาเรียน 10 ชั่วโมง (ทฤษฎี 2 ชม. ปฏิบัติ 8 ชม.)</p>
        </div>
    </div>

    <div class="container">
        <div class="single-layout">

            <section class="lesson-section">
                <div class="key-concept-box">
                    <strong>🎯 สารสำคัญ (Key Concepts)</strong>
                    <p>
                        การทำสำเนาข้อมูล (Replication) ช่วยกระจายข้อมูลจากฐานข้อมูลหลัก (Primary) ไปยังฐานข้อมูลสำรอง (Replica) เพื่อเพิ่มความพร้อมใช้งานและกระจายภาระการอ่านข้อมูล ในขณะที่การสำรองข้อมูล (Backup) และการกู้คืนข้อมูล (Recovery) เป็นกระบวนการจำเป็นเพื่อป้องกันความเสียหายของข้อมูลจากเหตุการณ์ไม่คาดฝัน เช่น ฮาร์ดแวร์ชำรุดหรือข้อผิดพลาดจากการปฏิบัติงาน ผู้ดูแลฐานข้อมูลจึงต้องสามารถวิเคราะห์บันทึกข้อผิดพลาดและซ่อมแซมตารางที่เสียหายได้
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
                        <td>1. อธิบายหลักการทำ Database Replication แบบ Primary-Replica ได้<br>2. อธิบายขั้นตอนการสำรองและกู้คืนข้อมูลได้</td>
                    </tr>
                    <tr>
                        <td><strong>ด้านทักษะ (Practice - P)</strong></td>
                        <td>1. กำหนดค่าและทดสอบการทำงานของ Replication เบื้องต้นได้<br>2. สำรองข้อมูล กู้คืนข้อมูล และซ่อมแซมตารางที่เสียหายได้</td>
                    </tr>
                    <tr>
                        <td><strong>ด้านเจตคติ (Attitude - A)</strong></td>
                        <td>1. ตระหนักถึงความสำคัญของการสำรองข้อมูลอย่างสม่ำเสมอเพื่อป้องกันความเสียหายที่ไม่สามารถย้อนกลับได้</td>
                    </tr>
                </table>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="lesson-section">
                <h3>📘 3. เนื้อหาทางทฤษฎีเชิงลึก (Theoretical Core)</h3>

                <h4 class="topic-title">เรื่องที่ 7.1: หลักการและปฏิบัติการทำ Database Replication แบบ Primary-Replica</h4>
                <p>
                    Replication แบบ Primary-Replica ทำงานโดยฐานข้อมูลหลัก (Primary) บันทึกการเปลี่ยนแปลงข้อมูลทุกรายการลงใน Binary Log จากนั้นฐานข้อมูลสำรอง (Replica) จะอ่าน Binary Log ผ่าน I/O Thread และนำคำสั่งไปประมวลผลซ้ำผ่าน SQL Thread เพื่อให้ข้อมูลตรงกันแบบเกือบทันที (Near Real-time) ระบบนี้ช่วยให้สามารถแยกภาระงานอ่านข้อมูล (Read) ไปยัง Replica ในขณะที่งานเขียนข้อมูล (Write) ยังคงทำที่ Primary เพียงจุดเดียว
                </p>

                <h4 class="topic-title">เรื่องที่ 7.2: การสำรองข้อมูล การกู้คืนข้อมูล และการซ่อมแซมตารางฐานข้อมูลที่เสียหาย</h4>
                <p>
                    การสำรองข้อมูลแบ่งเป็น 2 รูปแบบหลัก ได้แก่ <strong>Logical Backup</strong> (สำรองเป็นคำสั่ง SQL ด้วยเครื่องมือ เช่น mysqldump อ่านง่ายและย้ายข้ามเวอร์ชันได้) และ <strong>Physical Backup</strong> (คัดลอกไฟล์ข้อมูลดิบโดยตรง เร็วกว่าแต่ต้องใช้กับเวอร์ชันเดียวกัน) เมื่อพบตารางเสียหาย สามารถตรวจสอบและซ่อมแซมได้ด้วยคำสั่ง <code class="inline-code">CHECK TABLE</code> และ <code class="inline-code">REPAIR TABLE</code>
                </p>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="lesson-section">
                <h3>🛠️ 4. ตัวอย่างการปฏิบัติการทีละขั้นตอน (Step-by-Step Walkthrough)</h3>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 1</div>
                    <div class="step-detail">
                        <strong>กำหนดค่าฐานข้อมูลหลัก (Primary) ให้เปิดใช้งาน Binary Log</strong>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">my.cnf (Primary)</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>
                                </button>
                            </div>
                            <pre>[mysqld]
server-id = 1
log_bin = mysql-bin
binlog_do_db = shop_db</pre>
                        </div>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">SQL (Primary)</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>
                                </button>
                            </div>
                            <pre>CREATE USER 'repl_user'@'%' IDENTIFIED BY 'ReplPass#2026';
GRANT REPLICATION SLAVE ON *.* TO 'repl_user'@'%';
SHOW MASTER STATUS;</pre>
                        </div>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 2</div>
                    <div class="step-detail">
                        <strong>เชื่อมต่อฐานข้อมูลสำรอง (Replica) เข้ากับ Primary</strong>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">SQL (Replica)</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>
                                </button>
                            </div>
                            <pre>CHANGE MASTER TO
    MASTER_HOST = '192.168.1.10',
    MASTER_USER = 'repl_user',
    MASTER_PASSWORD = 'ReplPass#2026',
    MASTER_LOG_FILE = 'mysql-bin.000001',
    MASTER_LOG_POS = 157;

START SLAVE;
SHOW SLAVE STATUS \G</pre>
                        </div>
                        <p>ตรวจสอบว่าค่า <code class="inline-code">Slave_IO_Running</code> และ <code class="inline-code">Slave_SQL_Running</code> เป็น <code class="inline-code">Yes</code> ทั้งคู่ จึงจะถือว่า Replication ทำงานถูกต้อง</p>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 3</div>
                    <div class="step-detail">
                        <strong>สำรองข้อมูล กู้คืนข้อมูล และซ่อมแซมตารางที่เสียหาย</strong>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">PowerShell / SQL</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>
                                </button>
                            </div>
                            <pre># สำรองข้อมูลแบบ Logical Backup
mysqldump -u root -p shop_db > shop_db_backup.sql

# กู้คืนข้อมูลจากไฟล์สำรอง
mysql -u root -p shop_db < shop_db_backup.sql</pre>
                        </div>
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
                            <pre>CHECK TABLE products;
REPAIR TABLE products;</pre>
                        </div>
                    </div>
                </div>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="assignment-box">
                <h3>📝 5. งานที่มอบหมายและเกณฑ์การประเมินผล (Assignment)</h3>
                <p><strong>ใบงานที่ 7: การทำสำเนาข้อมูลและการบำรุงรักษาฐานข้อมูล</strong></p>
                <br>
                <p><strong>คำสั่ง:</strong></p>
                <ul style="margin-left: 20px;">
                    <li>อธิบายขั้นตอนการตั้งค่า Primary-Replica Replication พร้อมระบุคำสั่งที่ใช้ในแต่ละฝั่งให้ครบถ้วน</li>
                    <li>สำรองข้อมูลฐานข้อมูลของตนเองด้วย mysqldump แล้วทดลองกู้คืนลงในฐานข้อมูลใหม่</li>
                    <li>ทดลองใช้คำสั่ง CHECK TABLE และ REPAIR TABLE กับตารางที่กำหนด พร้อมอธิบายผลลัพธ์</li>
                </ul>

                <br>
                <p><strong>📊 เกณฑ์การตัดคะแนน (คะแนนเต็ม 5 คะแนน):</strong></p>
                <ul style="margin-left: 20px; font-size: 0.9rem; color: #78350f;">
                    <li>• ความถูกต้องของขั้นตอนและคำสั่งตั้งค่า Replication (2 คะแนน)</li>
                    <li>• ความสำเร็จของการสำรองและกู้คืนข้อมูล (2 คะแนน)</li>
                    <li>• ความตรงต่อเวลาและความเป็นระเบียบของไฟล์งาน (1 คะแนน)</li>
                </ul>
            </section>

        </div>
    </div>

    <script src="../assets/js/script.js"></script>
</body>

</html>
