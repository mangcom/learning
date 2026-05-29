<?php
$base_dir = "../"; // ถอยกลับ 1 ชั้นไปที่ Root เพื่อให้เรียกคอมโพเนนต์ได้ถูกต้อง
$active_nav = "server"; // ไฮไลต์เมนูที่วิชา Server
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน่วยที่ 10: บริการเซิร์ฟเวอร์ระบบฐานข้อมูล (Database Server)</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght=300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body style="background-color: #f8fafc;">

    <?php include '../components/navbar.php'; ?>

    <div class="page-header" style="background: #0f172a; color: #fff; padding: 40px 0 65px 0;">
        <div class="container">
            <a href="index.php" class="back-link">
                <span class="arrow-icon">⬅</span> <span>กลับสู่หน้าหลักวิชา Linux Server</span>
            </a>
            <div style="margin-top: 15px;">
                <span class="course-code" style="background: #10b981; color: #fff;">หน่วยที่ 10 (สัปดาห์ที่ 10)</span>
                <h2 style="margin: 10px 0 5px 0; font-size: 1.8rem; font-weight: 700;">บริการเซิร์ฟเวอร์ระบบฐานข้อมูล (Database Server Infrastructure)</h2>
                <p style="color: #94a3b8; margin: 0; font-size: 0.95rem;">ถอดรหัสทฤษฎี RDBMS คุมเข้มความปลอดภัยทางสถาปัตยกรรมข้อมูล เขียนคำสั่งจัดการสิทธิ์ผู้ใช้ และควบคุมระบบสำรองข้อมูลผ่านฐานสิทธิ์ MariaDB และ PostgreSQL</p>
            </div>
        </div>
    </div>

    <div class="container">
        <main>
            <div class="content-area">

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 30px;">
                    <h3 class="section-title">📘 ภาคทฤษฎี: โครงสร้าง RDBMS และสถาปัตยกรรมการเชื่อมต่อฐานข้อมูล</h3>

                    <h4>1. ระบบบริหารจัดการฐานข้อมูลเชิงสัมพันธ์ (RDBMS) และคุณสมบัติ ACID</h4>
                    <p><strong>Relational Database Management System (RDBMS)</strong> คือระบบจัดการฐานข้อมูลที่จัดเก็บข้อมูลในรูปแบบตาราง (Tables) ที่มีความสัมพันธ์เชื่อมโยงระหว่างกันผ่านคีย์หลัก (Primary Key) และคีย์นอก (Foreign Key) โดยหัวใจสำคัญของ Database Server ระดับองค์กรจะต้องอยู่ภายใต้มาตรฐานกฎเหล็ก <strong>ACID Properties</strong> เพื่อรับประกันความถูกต้องของข้อมูลแม้ระบบจะเกิดไฟดับหรือล่มกลางคัน:</p>

                    <ul style="padding-left: 20px; margin-bottom: 20px;">
                        <li><strong>Atomicity (ความเป็นหนึ่งเดียว):</strong> การทำงานในหนึ่งธุรกรรม (Transaction) ต้องสำเร็จทั้งหมด หรือหากผิดพลาดแม้แต่จุดเดียว ระบบต้องยกเลิกทั้งหมด (Rollback) จะสำเร็จครึ่งๆ กลางๆ ไม่ได้</li>
                        <li><strong>Consistency (ความสอดคล้อง):</strong> ข้อมูลต้องถูกต้องตามกฎเกณฑ์ข้อจำกัด (Constraints) ของฐานข้อมูลทั้งก่อนและหลังทำธุรกรรม</li>
                        <li><strong>Isolation (ความโดดเดี่ยว):</strong> ธุรกรรมที่ทำงานพร้อมๆ กันในเวลาเดียวกัน จะต้องประมวลผลแยกออกจากกันอย่างเด็ดขาด ไม่ส่งผลกระทบหรือสร้างความสับสนให้แก่กัน</li>
                        <li><strong>Durability (ความคงทน):</strong> เมื่อธุรกรรมได้รับการบันทึก (Commit) เสร็จสิ้นแล้ว ข้อมูลจะถูกเขียนลงดิสก์อย่างถาวร ต่อให้เซิร์ฟเวอร์ไฟดับในวินาทีถัดไป ข้อมูลก็จะไม่สูญหาย</li>
                    </ul>

                    <h4>2. สถาปัตยกรรมการติดต่อเซิร์ฟเวอร์ข้อมูล (Database Client-Server Connection)</h4>
                    <p>ซอฟต์แวร์ฐานข้อมูลจะทำงานในฐานะเบื้องหลัง (Daemon Service) คอยเปิดพอร์ตมาตรฐานรับฟังคำขอเชื่อมต่อจากแอปพลิเคชันภายนอก:</p>
                    <table class="grading-table" style="margin: 15px 0; background: #f8fafc;">
                        <thead>
                            <tr style="background: #cbd5e1;">
                                <th style="padding: 10px; width: 25%; text-align: center;">ระบบฐานข้อมูล</th>
                                <th style="padding: 10px; width: 20%; text-align: center;">พอร์ตมาตรฐาน</th>
                                <th style="padding: 10px;">สถาปัตยกรรมการทำงานเบื้องหลัง</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align: center;"><strong>MySQL / MariaDB</strong></td>
                                <td style="text-align: center;"><code class="inline-code">3306</code></td>
                                <td>เน้นสถาปัตยกรรมแบบ <strong>Thread-per-connection</strong> ใช้ทรัพยากรน้อยกว่าเมื่อมีการเชื่อมต่อปริมาณมากเข้ามาพร้อมกัน</td>
                            </tr>
                            <tr>
                                <td style="text-align: center;"><strong>PostgreSQL</strong></td>
                                <td style="text-align: center;"><code class="inline-code">5432</code></td>
                                <td>ใช้สถาปัตยกรรมแบบ <strong>Process-based (Forking)</strong> โดยทุกการเชื่อมต่อใหม่จะสร้าง Process แยกขาดออกจากกัน ปลอดภัยสูงและจัดการคำสั่งซับซ้อนได้ดีเยี่ยม</td>
                            </tr>
                        </tbody>
                    </table>

                    <h4 style="margin-top: 25px;">3. หลักภาษา SQL เบื้องต้น (Structured Query Language)</h4>
                    <p>ภาษา SQL ที่แอดมินระบบจำเป็นต้องเข้าใจในการควบคุมสิทธิ์แบ่งออกเป็นกลุ่มคำสั่งหลัก ได้แก่:</p>
                    <ul>
                        <li><strong>DDL (Data Definition Language):</strong> คำสั่งจัดการโครงสร้าง เช่น <code class="inline-code">CREATE TABLE</code>, <code class="inline-code">DROP DATABASE</code></li>
                        <li><strong>DML (Data Manipulation Language):</strong> คำสั่งจัดการเนื้อข้อมูล เช่น <code class="inline-code">SELECT</code>, <code class="inline-code">INSERT</code>, <code class="inline-code">UPDATE</code>, <code class="inline-code">DELETE</code></li>
                        <li><strong>DCL (Data Control Language):</strong> คำสั่งด้านความปลอดภัยและสิทธิ์ใช้งาน (โฟกัสหลักในฐานะแอดมิน) ได้แก่ <code class="inline-code">GRANT</code> (ให้สิทธิ์) และ <code class="inline-code">REVOKE</code> (ริบคืนสิทธิ์)</li>
                    </ul>
                </section>

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 30px;">
                    <h3 class="section-title">🐬 ภาคปฏิบัติ 1: คุมเข้มความปลอดภัยและจัดการสิทธิ์บน MariaDB / MySQL</h3>
                    <p>เรียนรู้วิธีการยกระดับความปลอดภัยจากโรงงาน การสร้างผู้ใช้แยกขาดตามหน้าที่ และการเขียนสคริปต์สำรองข้อมูลด่วน</p>

                    <h4 style="margin-top: 15px;">ขั้นตอนที่ 1: การรันสคริปต์ล็อกความปลอดภัยระนาบแรก</h4>
                    <div class="code-window">
                        <div class="code-header"><span class="code-lang">Terminal</span></div>
                        <pre>sudo apt install mariadb-server -y
sudo mysql_secure_installation   # สคริปต์ลบยูสเซอร์ผี ลบฐานข้อมูลทดสอบ และล็อกสิทธิ์ Root</pre>
                    </div>

                    <h4 style="margin-top: 25px;">ขั้นตอนที่ 2: การสร้างผู้ใช้และให้สิทธิ์เข้าควบคุมเฉพาะจุด (Privilege Granting)</h4>
                    <p>แอดมินที่ดีจะไม่ใช้สิทธิ์ Root ในการต่อเชื่อมแอปพลิเคชัน แต่จะสร้างยูสเซอร์เฉพาะงานขึ้นมาควบคุมตารางข้อมูล:</p>
                    <div class="code-window">
                        <div class="code-header"><span class="code-lang">MariaDB Monitor</span></div>
                        <pre>sudo mysql -u root

-- สร้างฐานข้อมูลและสร้างผู้ใช้ที่ระบุให้เชื่อมต่อเข้ามาจากวงแลน 192.168.10.x เท่านั้น
CREATE DATABASE accounting_db;
CREATE USER 'acc_admin'@'192.168.10.%' IDENTIFIED BY 'SuperSecurePassword123!';

-- มอบสิทธิ์เฉพาะตารางที่เกี่ยวข้อง (DCL) และอัปเดตตารางสิทธิ์ทันที
GRANT SELECT, INSERT, UPDATE, DELETE ON accounting_db.* TO 'acc_admin'@'192.168.10.%';
FLUSH PRIVILEGES;
EXIT;</pre>
                    </div>

                    <h4 style="margin-top: 25px;">ขั้นตอนที่ 3: ระบบสำรองและกู้คืนข้อมูลด่วน (Backup / Restore)</h4>
                    <p>การแบ็กอัปข้อมูลบน MariaDB ออกมาเป็นไฟล์ข้อความคำสั่ง SQL สคริปต์:</p>
                    <div class="code-window">
                        <div class="code-header"><span class="code-lang">Terminal</span></div>
                        <pre># 1. คำสั่งดึงข้อมูลทั้งหมดออกไปเก็บเป็นไฟล์ดัมพ์ (Backup)
mysqldump -u root -p accounting_db > /backup/accounting_snapshot.sql

# 2. คำสั่งกู้คืนระบบย้อนกลับคืนตาราง (Restore)
mysql -u root -p accounting_db < /backup/accounting_snapshot.sql</pre>
                    </div>

                    <h4 style="margin-top: 25px;">💻 ติดตั้งเครื่องมือบริหารจัดการ phpMyAdmin (Web GUI)</h4>
                    <p>เพื่อความสะดวกในการจัดการ แอดมินสามารถปล่อยแพ็คเกจจัดการหน้าเว็บขึ้นมาบริการทีมพัฒนา:</p>
                    <div class="code-window">
                        <div class="code-header"><span class="code-lang">Terminal</span></div>
                        <pre>sudo apt install phpmyadmin -y  # ในขั้นตอนติดตั้งให้เลือกเชื่อมพ่วงกับ Apache2 อัตโนมัติ
# เข้าใช้งานผ่านเว็บเบราว์เซอร์ที่พิกัด: http://[IP-Server]/phpmyadmin</pre>
                    </div>
                </section>

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 30px;">
                    <h3 class="section-title">🐘 ภาคปฏิบัติ 2: สถาปัตยกรรมความปลอดภัยขั้นสูงบน PostgreSQL</h3>
                    <p>PostgreSQL มีระบบล็อกและตรวจสอบสิทธิ์ผู้ใช้ที่เข้มงวดกว่ามาก โดยควบคุมผ่านไฟล์คอนฟิกสิทธิ์โดยเฉพาะ</p>

                    <h4 style="margin-top: 15px;">ขั้นตอนที่ 1: เปิดการเชื่อมต่อภายนอกและตั้งค่าระเบียบไฟล์ HBA</h4>
                    <p>เปิดไฟล์ <code>sudo nano /etc/postgresql/[version]/main/postgresql.conf</code> แก้ไขให้ฟังพอร์ตจากทุกไอพี:</p>
                    <div class="code-window">
                        <div class="code-header"><span class="code-lang">postgresql.conf</span></div>
                        <pre>listen_addresses = '*'    # เปิดสิทธิ์ให้เซิร์ฟเวอร์รับฟังคำขอจากภายนอกเครื่อง</pre>
                    </div>
                    <p style="margin-top: 10px;">จากนั้นเปิดไฟล์คุมสิทธิ์การล็อกอิน <code>sudo nano /etc/postgresql/[version]/main/pg_hba.conf</code> เพื่ออนุญาตกลุ่มไอพีปลายทาง:</p>
                    <div class="code-window">
                        <div class="code-header"><span class="code-lang">pg_hba.conf</span></div>
                        <pre># TYPE  DATABASE        USER            ADDRESS                 METHOD
host    hr_db           hr_manager      192.168.10.0/24         scram-sha-256</pre>
                    </div>

                    <h4 style="margin-top: 25px;">ขั้นตอนที่ 2: สลับเข้าสู่สิทธิ์ของ Postgres เพื่อสร้างระบบและสิทธิ์ผู้ใช้</h4>
                    <div class="code-window">
                        <div class="code-header"><span class="code-lang">PostgreSQL Console</span></div>
                        <pre>sudo -i -u postgres psql

-- สร้างฐานข้อมูลและบัญชีผู้ใช้งานระบบ
CREATE DATABASE hr_db;
CREATE USER hr_manager WITH PASSWORD 'UltraSecurePass2026!';

-- เชื่อมเข้าหาฐานข้อมูลเพื่อส่งมอบสิทธิ์ครอบครองสกีม่าข้อมูล
\c hr_db
GRANT ALL PRIVILEGES ON SCHEMA public TO hr_manager;
\q</pre>
                    </div>

                    <h4 style="margin-top: 25px;">ขั้นตอนที่ 3: คำสั่งด่วนการ Backup และ Restore ระบบของ Postgres</h4>
                    <div class="code-window">
                        <div class="code-header"><span class="code-lang">Terminal</span></div>
                        <pre># สั่ง Backup ข้อมูลในรูปแบบไฟล์ Custom Format ของ Postgres (มีประสิทธิภาพสูง)
pg_dump -U postgres -F c -b -v -f /backup/hr_db.dump hr_db

# สั่งกู้คืนระบบผ่านโปรแกรม pg_restore
pg_restore -U postgres -d hr_db -v /backup/hr_db.dump</pre>
                    </div>

                    <h4 style="margin-top: 25px;">💻 วิธีด่วนรัน pgAdmin4 ด้วย Docker Container</h4>
                    <p>เนื่องจากการลง pgAdmin4 บน Ubuntu โดยตรงมีความซับซ้อนด้าน Dependency แอดมินยุคใหม่จึงนิยมสั่งยกตู้คอนเทนเนอร์ขึ้นมารันควบคู่เพื่อเปิดหน้าเว็บจัดการได้อย่างปลอดภัย:</p>
                    <div class="code-window">
                        <div class="code-header"><span class="code-lang">Terminal</span></div>
                        <pre>sudo docker run --name pgadmin-web -p 5050:80 \
    -e 'PGADMIN_DEFAULT_EMAIL=admin@company.local' \
    -e 'PGADMIN_DEFAULT_PASSWORD=AdminPassword2026!' \
    -d dpage/pgadmin4
# เข้าใช้งานผ่านเว็บเบราว์เซอร์ที่พิกัด: http://[IP-Server]:5050</pre>
                    </div>
                </section>
            </div>

            <aside>
                <div class="sidebar-card">
                    <h4>📋 ข้อมูลประจำหน่วย</h4>
                    <p style="font-size: 0.9rem; color: #475569;">
                        <strong>สัปดาห์ที่:</strong> 10<br>
                        <strong>เวลาเรียน:</strong> 5 ชั่วโมง (ทฤษฎี 1, ปฏิบัติ 4)<br>
                        <strong>เกณฑ์การประเมิน:</strong> ผลแลบล็อกฐานสิทธิ์ User & Database ค่าย MariaDB (3 คะแนน) ไฟล์การตั้งค่าเปิดสิทธิ์เชื่อมโยงภายนอกบน Postgres (3 คะแนน) ใบงานการทดสอบสั่งดัมพ์ไฟล์และสั่งกู้คืนตารางข้อมูลสำเร็จ (4 คะแนน)
                    </p>
                </div>

                <div class="sidebar-card" style="border-left: 4px solid #ef4444;">
                    <h4>🚨 จุดตายระบบ: สิทธิ์พัสดุเรี่ยราด (Wildcard Privileges)</h4>
                    <p style="font-size: 0.85rem; color: #64748b; line-height: 1.5;">
                        ความเสียหายร้ายแรงที่สุดมักเกิดจากความมักง่ายของแอดมินหรือโปรแกรมเมอร์ที่เขียนคำสั่ง <code class="inline-code">GRANT ALL PRIVILEGES ON *.* TO 'user'@'%'</code> ซึ่งหมายความว่าหากผู้ไม่หวังดีแฮกยูสเซอร์ตัวนี้ได้ จะได้สิทธิ์ควบคุมเซิร์ฟเวอร์ฐานข้อมูลทั้งหมดทันที! และห้ามปล่อยพอร์ต 3306 หรือ 5432 ออกสู่อินเทอร์เน็ตสาธารณะโดยไม่มีไฟร์วอลล์ (UFW) กั้นเด็ดขาดครับ
                    </p>
                </div>
            </aside>
        </main>
    </div>

    <script src="../assets/js/script.js"></script>
</body>

</html>