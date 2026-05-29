<?php
$base_dir = "../"; // ถอยกลับ 1 ชั้นไปที่ Root เพื่อให้เรียกคอมโพเนนต์ได้ถูกต้อง
$active_nav = "devops"; // ไฮไลต์เมนูที่วิชา DevOps
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน่วยที่ 10: Multi-Service Application & Compose</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">

    <style>
        @media (min-width: 992px) {
            main {
                display: flex !important;
                gap: 30px !important;
                align-items: flex-start !important;
            }

            .content-area {
                flex: 1 !important;
                min-width: 0 !important;
            }

            aside {
                width: 320px !important;
                flex-shrink: 0 !important;
            }
        }
    </style>
</head>

<body style="background-color: #f8fafc;">

    <?php include '../components/navbar.php'; ?>

    <div class="page-header" style="background: #0f172a; color: #fff; padding: 40px 0 65px 0; border-bottom: 4px solid #7c3aed;">
        <div class="container">
            <a href="index.php" class="back-link" style="color: #c4b5fd; text-decoration: none; display: inline-block; margin-bottom: 15px;">
                <span class="arrow-icon">⬅</span> <span>กลับสู่หน้าหลักวิชา DevOps</span>
            </a>
            <div>
                <span class="course-code" style="background: #7c3aed; color: #fff; padding: 4px 12px; border-radius: 4px; font-weight: 600; font-size: 0.9rem;">หน่วยที่ 10 (สัปดาห์ที่ 10)</span>
                <h2 style="margin: 10px 0 5px 0; font-size: 1.8rem; font-weight: 700;">Multi-Service Application & Compose</h2>
                <p style="color: #e2e8f0; margin: 0; font-size: 0.95rem;">เรียนรู้การเชื่อมต่อระบบเครือข่ายคอนเทนเนอร์ (Network) การรักษาข้อมูลฐานข้อมูล (Volume) และรวบรวมทุกบริการไว้ในไฟล์เดียวด้วย Docker Compose</p>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 30px;">
        <main>
            <div class="content-area">

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 30px;">
                    <h3 class="section-title" style="color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">📘 ภาคทฤษฎี: กลไกขั้นสูงและการทำงานหลายคอนเทนเนอร์</h3>

                    <p>ในการทำแอปพลิเคชันจริง เรามักไม่รันทุกอย่างไว้ในคอนเทนเนอร์เดียวกัน (เช่น ไม่เอาโค้ดเว็บและฐานข้อมูลมายัดรวมกัน) แต่เราจะแยกออกเป็นก้อน ๆ ตามหลักการของ <strong>Microservices Architecture</strong> เพื่อให้ง่ายต่อการขยายระบบและการดูแลรักษา</p>

                    <h4 style="margin-top: 25px; color: #3b82f6;">1. Docker Network (ระบบเครือข่ายของคอนเทนเนอร์)</h4>
                    <p>โดยปกติแล้ว คอนเทนเนอร์ที่ถูกรันขึ้นมาจะแยกออกจากกันโดยเด็ดขาดเพื่อความปลอดภัย หากเราต้องการให้เว็บแอปพลิเคชันส่งข้อมูลไปบันทึกในฐานข้อมูลได้ เราต้องสร้าง <strong>Virtual Network (Bridge Network)</strong> ขึ้นมาครอบเพื่อให้พวกมันมองเห็นกัน และข้อดีที่สุดคือ คอนเทนเนอร์ในเครือข่ายเดียวกันสามารถเชื่อมต่อหากันได้โดยใช้ <strong>"ชื่อคอนเทนเนอร์ (Container Name)"</strong> แทนการระบุเลข IP Address ได้เลย</p>

                    <h4 style="margin-top: 25px; color: #ec4899;">2. Docker Volume (การรักษาข้อมูลไม่ให้สูญหาย)</h4>
                    <p>ธรรมชาติของคอนเทนเนอร์มีพฤติกรรมเป็นแบบ <em>Stateless (ไร้สถานะ)</em> หมายความว่า ข้อมูลทุกอย่างที่เกิดขึ้นข้างในคอนเทนเนอร์จะ <strong>"หายวับไปกับตา"</strong> ทันทีที่คอนเทนเนอร์นั้นถูกลบหรืออัปเดตเวอร์ชัน</p>
                    <p>เพื่อแก้ไขปัญหานี้ เราจึงต้องใช้ <strong>Docker Volume</strong> ซึ่งเป็นการเจาะท่อเชื่อมโยงโฟลเดอร์ภายในคอนเทนเนอร์ (เช่น โฟลเดอร์เก็บข้อมูลของ MySQL) ออกมาผูกไว้กับพื้นที่เก็บข้อมูลบนเครื่อง Host หลัก ทำให้มั่นใจได้ว่าแม้คอนเทนเนอร์จะพังหรือถูกลบ ข้อมูลในฐานข้อมูลก็ยังอยู่ปลอดภัย 100%</p>


                </section>

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 30px;">
                    <h3 class="section-title" style="color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">🐙 ทำไมต้องใช้ Docker Compose?</h3>
                    <p>ลองจินตนาการว่าหากระบบของเรามี 5 บริการ (Frontend, Backend, MySQL, Redis, Nginx) เวลาจะย้ายไปรันบนเซิร์ฟเวอร์เครื่องใหม่ เราต้องมานั่งพิมพ์คำสั่ง <code>docker run</code> ยาวเหยียดทีละเครื่องพร้อมตั้งค่า Network และ Volume ด้วยตัวเองทุกลำดับ ซึ่งเสี่ยงต่อการพิมพ์ผิดพลาดอย่างมาก</p>
                    <p><strong>Docker Compose</strong> เข้ามาแก้ปัญหานี้โดยการให้นักพัฒนาเขียนอธิบายโครงสร้างระบบทั้งหมดลงในไฟล์พิมพ์เขียวภาษา YAML ที่ชื่อว่า <strong><code>docker-compose.yml</code></strong> และเมื่อต้องการเปิดใช้งาน ทั้งระบบสามารถสั่งเปิดได้พร้อมกันผ่านคำสั่งสั้น ๆ เพียงคำสั่งเดียว!</p>
                </section>

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 30px;">
                    <h3 class="section-title" style="color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">💻 ภาคปฏิบัติ: ประกอบร่าง Web + Database เข้าด้วยกัน</h3>

                    <p>ในแล็บนี้เราจะทดลองสร้างระบบเว็บโปรแกรมสำเร็จรูป (WordPress) ร่วมกับระบบฐานข้อมูล (MySQL) ให้ทำงานร่วมกันอย่างเป็นระบบ</p>

                    <h4 style="margin-top: 20px;">Step 1: สร้างโฟลเดอร์และไฟล์พิมพ์เขียว</h4>
                    <p>สร้างโฟลเดอร์ใหม่ชื่อ <code>my-compose-lab</code> และสร้างไฟล์ข้างในชื่อว่า <strong><code>docker-compose.yml</code></strong> จากนั้นกรอกโค้ดโครงสร้างดังนี้:</p>

                    <div class="code-window" style="background: #0f172a; color: #f8fafc; padding: 15px; border-radius: 8px; font-family: monospace; font-size: 0.95rem; overflow-x: auto; line-height: 1.6;">
                        <span style="color: #c792ea;">version:</span> <span style="color: #a7f3d0;">'3.8'</span><br><br>

                        <span style="color: #c792ea;">services:</span><br>
                        &nbsp;&nbsp;<span style="color: #60a5fa;"># บริการที่ 1: ระบบฐานข้อมูล (Database)</span><br>
                        &nbsp;&nbsp;<span style="color: #c792ea;">db_server:</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #c792ea;">image:</span> mysql:8.0<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #c792ea;">environment:</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #c792ea;">MYSQL_ROOT_PASSWORD:</span> rootpass123<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #c792ea;">MYSQL_DATABASE:</span> demo_db<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #c792ea;">volumes:</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #89ddff;">-</span> db_data:/var/lib/mysql <span style="color: #60a5fa;"># ผูกพื้นที่เก็บข้อมูลไว้ข้างนอก</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #c792ea;">networks:</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #89ddff;">-</span> app_network<br><br>

                        &nbsp;&nbsp;<span style="color: #60a5fa;"># บริการที่ 2: ระบบส่วนหน้าเว็บ (Web Application)</span><br>
                        &nbsp;&nbsp;<span style="color: #c792ea;">web_server:</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #c792ea;">image:</span> wordpress:latest<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #c792ea;">ports:</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #89ddff;">-</span> <span style="color: #a7f3d0;">"8080:80"</span> <span style="color: #60a5fa;"># เปิดหน้าเว็บที่พอร์ต 8080 ของเครื่องคอมพิวเตอร์</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #c792ea;">depends_on:</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #89ddff;">-</span> db_server <span style="color: #60a5fa;"># บังคับให้ฐานข้อมูลเปิดเสร็จก่อน ค่อยเปิดเว็บตาม</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #c792ea;">environment:</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #c792ea;">WORDPRESS_DB_HOST:</span> db_server <span style="color: #60a5fa;"># เรียกหาฐานข้อมูลผ่านชื่อบริการได้เลย!</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #c792ea;">WORDPRESS_DB_USER:</span> root<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #c792ea;">WORDPRESS_DB_PASSWORD:</span> rootpass123<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #c792ea;">WORDPRESS_DB_NAME:</span> demo_db<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #c792ea;">networks:</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #89ddff;">-</span> app_network<br><br>

                        <span style="color: #60a5fa;"># ประกาศสร้างทรัพยากรส่วนกลางของระบบ</span><br>
                        <span style="color: #c792ea;">volumes:</span><br>
                        &nbsp;&nbsp;<span style="color: #c792ea;">db_data:</span><br><br>
                        <span style="color: #c792ea;">networks:</span><br>
                        &nbsp;&nbsp;<span style="color: #c792ea;">app_network:</span>
                    </div>

                    <h4 style="margin-top: 25px;">Step 2: สั่งรันระบบทั้งแผง</h4>
                    <p>เปิด Terminal ในโฟลเดอร์ที่มีไฟล์นี้อยู่ แล้วสั่งพิมพ์คำสั่งปฏิวัติวงการ:</p>
                    <div class="code-window" style="background: #1e1e1e; color: #d4d4d4; padding: 12px; border-radius: 8px; font-family: monospace;">
                        docker compose up -d
                    </div>
                    <p style="margin-top: 10px; font-size: 0.9rem; color: #475569;"><em>* คำสั่งนี้จะไปดาวน์โหลดอิมเมจ สร้างเน็ตเวิร์ก วอลลุ่ม และรันคอนเทนเนอร์ทั้งหมดขึ้นมาพร้อมกันในโหมด Background (-d)</em></p>

                    <h4 style="margin-top: 25px;">Step 3: ตรวจสอบสถานะการทำงาน</h4>
                    <div class="code-window" style="background: #1e1e1e; color: #d4d4d4; padding: 12px; border-radius: 8px; font-family: monospace; margin-bottom: 15px;">
                        docker compose ps
                    </div>
                    <p>ระบบจะลิสต์รายชื่อบริการทั้งหมดภายใต้ Compose นี้ออกมาให้ดูว่ารันผ่านพอร์ตอะไรบ้าง ลองเปิดเบราว์เซอร์แล้วไปที่ <code>http://localhost:8080</code> จะพบหน้าการตั้งค่าเริ่มต้นของระบบเว็บไซต์ทันที</p>
                </section>

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0;">
                    <h3 class="section-title" style="color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">🎯 ใบงานปฏิบัติการ: บูรณาการ Docker Compose ของทีม</h3>

                    <div class="analogy-box" style="background: #f6fee7; border-left: 4px solid #84cc16; padding: 15px; margin-bottom: 20px;">
                        <strong>🛠️ ภารกิจกลุ่ม: รวบรวมแอปพลิเคชันของกลุ่มลงกล่องคู่</strong><br>
                        <span style="font-size: 0.95rem; color: #475569;">ให้นักศึกษานำความรู้จากสัปดาห์ที่ 9 (Dockerfile ของทีมตนเอง) มาร้อยเรียงเข้ากับฐานข้อมูลภายในไฟล์ <code>docker-compose.yml</code> เพื่อให้ระบบงานของกลุ่มพร้อมส่งและรันได้ทุกที่</span>
                    </div>

                    <h4 style="margin-top: 15px;">ข้อกำหนดในใบงาน:</h4>
                    <ol style="padding-left: 20px; line-height: 1.7; margin-bottom: 0;">
                        <li>ให้ปรับเปลี่ยนบริการฝั่งเว็บในไฟล์ <code>docker-compose.yml</code> จากการใช้ Image สำเร็จรูปในเน็ต ให้มาเป็นการดึงซอร์สโค้ดในเครื่องขึ้นมา Build สด ๆ โดยใช้คำสั่ง <code>build: .</code> แทนคำสั่ง <code>image: ...</code></li>
                        <li>เชื่อมต่อกับฐานข้อมูลที่กลุ่มตนเองเลือกใช้งานจริง (เช่น MySQL, PostgreSQL หรือ MongoDB) พร้อมตั้งค่า Environment Variable ให้ถูกต้องตามโค้ดของแอปพลิเคชัน</li>
                        <li>สั่งรันด้วยคำสั่ง <code>docker compose up --build -d</code></li>
                        <li><strong>จัดทำรายงานสิ่งส่งมอบ:</strong> แนบไฟล์โค้ด <code>docker-compose.yml</code> ที่สมบูรณ์ พร้อมแคปภาพหน้าจอผลลัพธ์คำสั่ง <code>docker compose ps</code> และหน้าเว็บแอปพลิเคชันที่สามารถทำงานและเชื่อมต่อดึงข้อมูลจากฐานข้อมูลได้จริงสำเร็จ</li>
                    </ol>
                </section>
            </div>

            <aside>
                <div class="sidebar-card" style="background: #fff; padding: 20px; border-radius: 8px; border: 1px solid #e2e8f0; margin-bottom: 20px;">
                    <h4 style="margin-top: 0; margin-bottom: 12px; font-size: 1.1rem; font-weight: 700; color: #1e293b;">📋 ข้อมูลประจำหน่วย</h4>
                    <p style="font-size: 0.9rem; color: #475569; line-height: 1.6; margin: 0;">
                        <strong>สัปดาห์ที่:</strong> 10<br>
                        <strong>เวลาเรียน:</strong> 5 ชั่วโมง (ทฤษฎี 1, ปฏิบัติ 4)<br>
                        <strong>เกณฑ์การประเมิน:</strong> <br>
                        - ความเข้าใจในการใช้ YAML Syntax ตกแต่งโครงสร้างคอนเทนเนอร์ (3 คะแนน)<br>
                        - การตั้งค่า Network, Volume เพื่อแชร์ทรัพยากรหากันได้สำเร็จ (3 คะแนน)<br>
                        - ผลงานการพอร์ตระบบของทีมตนเองเข้าสู่ Docker Compose ทำงานได้ไร้รอยต่อ (4 คะแนน)
                    </p>
                </div>

                <div class="sidebar-card" style="background: #fff; padding: 20px; border-radius: 8px; border: 1px solid #e2e8f0; border-left: 4px solid #eab308;">
                    <h4 style="margin-top: 0; margin-bottom: 12px; font-size: 1.1rem; font-weight: 700; color: #ca8a04;">💡 วิธีการสั่งเก็บกวาดขยะ</h4>
                    <p style="font-size: 0.85rem; color: #64748b; line-height: 1.5; margin: 0;">
                        ข้อดีอีกอย่างของ Docker Compose คือเวลาเลิกใช้งานหรือต้องการสั่งปิดระบบเพื่อปรับปรุงโครงสร้าง เราไม่จำเป็นต้องไล่ลบคอนเทนเนอร์ทีละก้อน<br><br>
                        เพียงแค่พิมพ์คำสั่ง <code>docker compose down</code> ตัวจัดการจะทำการปิดคอนเทนเนอร์ เคลียร์ระบบเน็ตเวิร์กที่สร้างไว้ให้อัตโนมัติอย่างหมดจด ทวงคืนแรมและทรัพยากรให้คอมพิวเตอร์ของเราทันทีครับ
                    </p>
                </div>
            </aside>
        </main>
    </div>

    <script src="../assets/js/script.js"></script>
</body>

</html>