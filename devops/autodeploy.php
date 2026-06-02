<?php
$base_dir = "../"; // ถอยกลับ 1 ชั้นไปที่ Root เพื่อเรียกคอมโพเนนต์
$active_nav = "devops"; // ไฮไลต์เมนูวิชา DevOps
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>บทเรียนเสริม: Traditional PHP Automated Deployment (No Docker)</title>
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

        .phase-badge {
            background: #3b82f6;
            color: #fff;
            padding: 3px 10px;
            border-radius: 4px;
            font-size: 0.8rem;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 10px;
        }

        .terminal-comment {
            color: #6a9955;
            font-style: italic;
        }

        .terminal-cmd {
            color: #f43f5e;
            font-weight: bold;
        }
    </style>
</head>

<body style="background-color: #f8fafc;">

    <?php include '../components/navbar.php'; ?>

    <div class="page-header" style="background: #0f172a; color: #fff; padding: 40px 0 65px 0; border-bottom: 4px solid #3b82f6;">
        <div class="container">
            <a href="unit11.php" class="back-link" style="color: #93c5fd; text-decoration: none; display: inline-block; margin-bottom: 15px;">
                <span class="arrow-icon">⬅</span> <span>กลับสู่หน่วยที่ 11 (CI/CD)</span>
            </a>
            <div>
                <span class="course-code" style="background: #1e40af; color: #fff; padding: 4px 12px; border-radius: 4px; font-weight: 600; font-size: 0.9rem;">บทเรียนเสริมพิเศษ</span>
                <h2 style="margin: 10px 0 5px 0; font-size: 1.8rem; font-weight: 700;">Traditional PHP Automated Deployment (No Docker)</h2>
                <p style="color: #e2e8f0; margin: 0; font-size: 0.95rem;">ไกด์ไลน์การสร้างท่อส่งมอบซอฟต์แวร์อัตโนมัติสำหรับสถาปัตยกรรมเซิร์ฟเวอร์แบบดั้งเดิม (Ubuntu + Apache + PHP) ยอดนิยมในองค์กร</p>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 30px;">
        <main>
            <div class="content-area">

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 30px;">
                    <h3 class="section-title" style="color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">📐 สถาปัตยกรรมและจุดเด่นของแนวทางนี้</h3>
                    <p>ในกรณีที่ระบบโปรดักชันปลายทางของนักศึกษาหรือองค์กร <strong>ไม่ได้รันบน Docker</strong> แต่ติดตั้งอยู่บน Linux OS (Ubuntu Server) แบบดั้งเดิมที่ใช้ Apache หรือ Nginx การเขียนท่อให้สั่งรันคำสั่งลากโค้ดผ่าน SSH ถือเป็นวิธีการที่เสถียรและนิยมที่สุด</p>

                    <div style="background: #f1f5f9; padding: 15px; border-radius: 8px; font-family: monospace; font-size: 0.9rem; line-height: 1.5; margin: 20px 0;">
                        Developer ➔ <strong>git push</strong> ➔ GitHub Repository ➔ <strong>GitHub Actions</strong> ➔ SSH เข้า Server ➔ <strong>git fetch & reset</strong> ➔ เว็บไซต์อัปเดตทันที
                    </div>



                    <h4 style="margin-top: 20px;">ทำไมวิธีนี้ถึงเป็นที่นิยมสูงสุดสำหรับ PHP App?</h4>
                    <ul style="padding-left: 20px; line-height: 1.6; color: #334155;">
                        <li><strong>Lightweight:</strong> ไม่ต้องติดตั้ง Python, Webhook Receiver หรือบอตใด ๆ บนเซิร์ฟเวอร์ให้หนักเครื่อง</li>
                        <li><strong>Pure Security:</strong> ควบคุมสิทธิ์ทั้งหมดผ่าน SSH Key และ GitHub Secrets ปลอดภัยตามมาตรฐานสากล</li>
                        <li><strong>Enterprise Standards:</strong> เป็นท่ามาตรฐานที่องค์กรส่วนใหญ่ใช้กับโปรเจกต์ PHP ทั่วไป, Laravel, CodeIgniter หรือ Symfony</li>
                    </ul>
                </section>

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0;">
                    <h3 class="section-title" style="color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">🛠️ ขั้นตอนการกำหนดค่าทีละขั้นตอน (12 Phases)</h3>

                    <div style="margin-bottom: 25px;">
                        <span class="phase-badge">PHASE 1</span> <strong>ติดตั้งและอัปเดต Ubuntu Server</strong>
                        <p style="font-size: 0.95rem; margin: 5px 0;">ทำการ SSH เข้าเซิร์ฟเวอร์ปลายทางของคุณ แล้วสั่งอัปเดตดัชนีแพ็กเกจให้เป็นรุ่นล่าสุด:</p>
                        <div class="code-window" style="background: #0f172a; color: #f8fafc; padding: 12px; border-radius: 6px; font-family: monospace; font-size: 0.9rem;">
                            ssh user@SERVER_IP<br>
                            sudo apt update && sudo apt upgrade -y
                        </div>
                    </div>

                    <div style="margin-bottom: 25px;">
                        <span class="phase-badge">PHASE 2</span> <strong>ติดตั้ง Apache Web Server และ PHP 8.3</strong>
                        <p style="font-size: 0.95rem; margin: 5px 0;">ติดตั้งตัวแปรสภาพแวดล้อมสำหรับรันแอปพลิเคชันเว็บ:</p>
                        <div class="code-window" style="background: #0f172a; color: #f8fafc; padding: 12px; border-radius: 6px; font-family: monospace; font-size: 0.9rem;">
                            <span class="terminal-comment"># ติดตั้งและตรวจสอบสถานะของ Apache</span><br>
                            sudo apt install apache2 -y<br>
                            systemctl status apache2 <span class="terminal-comment"># ควรแสดงสถานะ active (running)</span><br><br>
                            <span class="terminal-comment"># ติดตั้ง PHP 8.3 และโมดูลที่จำเป็น</span><br>
                            sudo apt install php php-cli php-mysql php-curl php-xml php-mbstring php-zip -y<br>
                            php -v <span class="terminal-comment"># ตรวจสอบเวอร์ชันโมดูล</span>
                        </div>
                    </div>

                    <div style="margin-bottom: 25px;">
                        <span class="phase-badge">PHASE 3</span> <strong>ติดตั้ง Git Engine</strong>
                        <div class="code-window" style="background: #0f172a; color: #f8fafc; padding: 12px; border-radius: 6px; font-family: monospace; font-size: 0.9rem;">
                            sudo apt install git -y<br>
                            git --version
                        </div>
                    </div>

                    <div style="margin-bottom: 25px;">
                        <span class="phase-badge">PHASE 4</span> <strong>เตรียมพื้นที่โฟลเดอร์สำหรับโปรเจกต์</strong>
                        <p style="font-size: 0.95rem; margin: 5px 0;">เพื่อความปลอดภัยบนระบบ Production ไม่ควรใช้รูทสิทธิ์ตรง `/var/www/html` ควรจัดพื้นที่เฉพาะ:</p>
                        <div class="code-window" style="background: #0f172a; color: #f8fafc; padding: 12px; border-radius: 6px; font-family: monospace; font-size: 0.9rem;">
                            sudo mkdir -p /var/www/project<br>
                            <span class="terminal-comment"># เปลี่ยนเจ้าของสิทธิ์โฟลเดอร์จาก root มาเป็นสิทธิ์ User ของเราเพื่อให้ Git ดึงโค้ดได้</span><br>
                            sudo chown -R $USER:$USER /var/www/project
                        </div>
                    </div>

                    <div style="margin-bottom: 25px;">
                        <span class="phase-badge">PHASE 5</span> <strong>Clone คลัง Repository ลงเซิร์ฟเวอร์ครั้งแรก</strong>
                        <div class="code-window" style="background: #0f172a; color: #f8fafc; padding: 12px; border-radius: 6px; font-family: monospace; font-size: 0.9rem;">
                            cd /var/www<br>
                            <span class="terminal-comment"># สั่งลบโฟลเดอร์โปรเจกต์ว่างเดิมแล้วสั่ง Clone ลงมาตรง ๆ</span><br>
                            sudo rm -rf project<br>
                            git clone https://github.com/yourorg/project.git project
                        </div>
                    </div>

                    <div style="margin-bottom: 25px;">
                        <span class="phase-badge">PHASE 6</span> <strong>ตั้งค่า Apache Virtual Host มัดปลายทาง</strong>
                        <p style="font-size: 0.95rem; margin: 5px 0;">สร้างไฟล์กำหนดค่าระบบชี้ทางโดเมนเนม:</p>
                        <div class="code-window" style="background: #0f172a; color: #f8fafc; padding: 12px; border-radius: 6px; font-family: monospace; font-size: 0.9rem;">
                            sudo nano /etc/apache2/sites-available/project.conf
                        </div>
                        <p style="font-size: 0.95rem; margin: 5px 0;">ใส่ข้อความพิมพ์เขียว VirtualHost ดังนี้:</p>
                        <div class="code-window" style="background: #1e1e1e; color: #d4d4d4; padding: 12px; border-radius: 6px; font-family: monospace; font-size: 0.85rem;">
                            &lt;VirtualHost *:80&gt;<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;ServerName demo.example.com<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;DocumentRoot /var/www/project<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&lt;Directory /var/www/project&gt;<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AllowOverride All<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Require all granted<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&lt;/Directory&gt;<br>
                            &lt;/VirtualHost&gt;
                        </div>
                        <p style="font-size: 0.95rem; margin: 5px 0;">สั่งคอมมิตเปิดใช้งานไซต์และรีสตาร์ตระบบ:</p>
                        <div class="code-window" style="background: #0f172a; color: #f8fafc; padding: 12px; border-radius: 6px; font-family: monospace; font-size: 0.9rem;">
                            sudo a2ensite project.conf<br>
                            sudo a2enmod rewrite<br>
                            sudo systemctl restart apache2
                        </div>
                    </div>

                    <div style="margin-bottom: 25px;">
                        <span class="phase-badge">PHASE 7</span> <strong>สร้างกุญแจคู่ SSH Key สำหรับใช้เชื่อมต่อ</strong>
                        <p style="font-size: 0.95rem; margin: 5px 0;">สร้างกุญแจประจำตัวสำหรับให้ตัวรันนิ่ง GitHub Actions ถือเข้ามาไขหลังบ้าน:</p>
                        <div class="code-window" style="background: #0f172a; color: #f8fafc; padding: 12px; border-radius: 6px; font-family: monospace; font-size: 0.9rem;">
                            ssh-keygen -t ed25519 <span class="terminal-comment"># กด Enter ข้ามไปเรื่อยๆ จนเสร็จ</span><br><br>
                            <span class="terminal-comment"># อนุญาตให้กุญแจดอกนี้ล็อกอินเข้าเครื่องตนเองได้</span><br>
                            cat ~/.ssh/id_ed25519.pub &gt;&gt; ~/.ssh/authorized_keys<br>
                            chmod 700 ~/.ssh<br>
                            chmod 600 ~/.ssh/authorized_keys
                        </div>
                    </div>

                    <div style="margin-bottom: 25px;">
                        <span class="phase-badge">PHASE 8</span> <strong>ผูก Public Key ไว้ที่ Deploy Keys บน GitHub</strong>
                        <p style="font-size: 0.95rem; margin: 5px 0;">เปิดดูรหัสกุญแจสาธารณะบนเซิร์ฟเวอร์:</p>
                        <div class="code-window" style="background: #0f172a; color: #f8fafc; padding: 12px; border-radius: 6px; font-family: monospace; font-size: 0.9rem;">
                            cat ~/.ssh/id_ed25519.pub
                        </div>
                        <p style="font-size: 0.95rem; margin: 5px 0;">คัดลอกข้อความทั้งหมดไปที่คลังของกลุ่มบนเว็บ GitHub ➔ <strong>Settings</strong> ➔ <strong>Deploy Keys</strong> ➔ กด <strong>Add Deploy Key</strong> วางโค้ดลงไป และอย่าลืมติ๊กเลือก <strong style="color: #ef4444;">"Allow write access"</strong></p>
                    </div>

                    <div style="margin-bottom: 25px;">
                        <span class="phase-badge">PHASE 9</span> <strong>เปิดดู Private Key เพื่อนำไปใส่ตัวแปรความลับ</strong>
                        <div class="code-window" style="background: #0f172a; color: #f8fafc; padding: 12px; border-radius: 6px; font-family: monospace; font-size: 0.9rem;">
                            cat ~/.ssh/id_ed25519
                        </div>
                        <p style="font-size: 0.95rem; margin: 5px 0;">คัดลอกข้อความยาว ๆ ทั้งหมดตั้งแต่บรรทัด <code>-----BEGIN OPENSSH PRIVATE KEY-----</code> จนถึงบรรทัดท้ายสุดเก็บไว้</p>
                    </div>

                    <div style="margin-bottom: 25px;">
                        <span class="phase-badge">PHASE 10</span> <strong>นำกุญแจและค่าล็อกอินไปฝังใน GitHub Secrets</strong>
                        <p style="font-size: 0.95rem; margin: 5px 0;">ไปที่หน้าเว็บ Repository ➔ <strong>Settings</strong> ➔ <strong>Secrets and variables</strong> ➔ <strong>Actions</strong> เพิ่มตัวแปรความลับดังต่อไปนี้:</p>
                        <ul style="padding-left: 20px; line-height: 1.6; font-size: 0.95rem;">
                            <li><code>SERVER_HOST</code> = ใส่เลข IP Address ของ Ubuntu Server</li>
                            <li><code>SERVER_PORT</code> = ใส่หมายเลข Port ของ Ubuntu Server เช่น 22
                            <li><code>SERVER_USER</code> = ชื่อบัญชีผู้ใช้งาน (เช่น `ubuntu` หรือ `root`)</li>
                            <li><code>SERVER_SSH_KEY</code> = วางข้อความรหัส Private Key ที่ก๊อปปี้มาจาก Phase 9 ทั้งหมด</li>
                        </ul>
                    </div>

                    <div style="margin-bottom: 25px;">
                        <span class="phase-badge">PHASE 11</span> <strong>เขียนท่อ Workflow สั่งอัปเดตระบบอัตโนมัติ</strong>
                        <p style="font-size: 0.95rem; margin: 5px 0;">สร้างไฟล์ชื่อ <code>.github/workflows/deploy.yml</code> ไว้ในโปรเจกต์คอมพิวเตอร์ของคุณ แล้วใส่สคริปต์นี้ลงไป:</p>

                        <div class="code-window" style="background: #0f172a; color: #f8fafc; padding: 15px; border-radius: 6px; font-family: monospace; font-size: 0.9rem; overflow-x: auto; line-height: 1.6;">
                            <span style="color: #c792ea;">name:</span> PHP Deploy Pipeline<br><br>
                            <span style="color: #c792ea;">on:</span><br>
                            &nbsp;&nbsp;<span style="color: #c792ea;">push:</span><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #c792ea;">branches:</span> [ <span style="color: #a7f3d0;">"main"</span> ]<br><br>
                            <span style="color: #c792ea;">jobs:</span><br>
                            &nbsp;&nbsp;<span style="color: #c792ea;">deploy:</span><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #c792ea;">runs-on:</span> ubuntu-latest<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #c792ea;">steps:</span><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #89ddff;">-</span> <span style="color: #c792ea;">name:</span> 🚀 Remote SSH to Execution Commands<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #c792ea;">uses:</span> appleboy/ssh-action@v1.2.0<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #c792ea;">with:</span><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #c792ea;">host:</span> ${{ secrets.SERVER_HOST }}<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #c792ea;">port:</span> ${{ secrets.SERVER_PORT }}<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #c792ea;">username:</span> ${{ secrets.SERVER_USER }}<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #c792ea;">key:</span> ${{ secrets.SERVER_SSH_KEY }}<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #c792ea;">script:</span> |<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;cd /var/www/project<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;git fetch origin<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;git reset --hard origin/main<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #60a5fa;"># composer install --no-dev --optimize-autoloader (ถ้ามี)</span>
                        </div>
                    </div>

                    <div>
                        <span class="phase-badge">PHASE 12</span> <strong>สั่งม้วน Git Push และทดสอบผลลัพธ์</strong>
                        <p style="font-size: 0.95rem; margin: 5px 0;">ลองแก้โค้ดเปลี่ยนหน้าเว็บในเครื่องตนเอง แล้วกดบันทึกคอมมิตส่งงานขึ้นคลังหลัก:</p>
                        <div class="code-window" style="background: #0f172a; color: #f8fafc; padding: 12px; border-radius: 6px; font-family: monospace; font-size: 0.9rem;">
                            git add .<br>
                            git commit -m "feat: autodeploy test pipeline"<br>
                            git push origin main
                        </div>
                        <p style="font-size: 0.95rem; margin: 10px 0 0 0;">เมื่อระบบ GitHub ดึงงานไปรัน ทุกอย่างจะวิ่งผ่านท่อ SSH เข้าไปเขย่าเซิร์ฟเวอร์หลักให้ลากดึงไฟล์มาแทนที่เวอร์ชันเก่าอย่างไร้รอยต่อ โดยไม่มีปัญหาเรื่อง Downtime เลยครับ!</p>
                    </div>

                </section>
            </div>

            <aside>
                <div class="sidebar-card" style="background: #fff; padding: 20px; border-radius: 8px; border: 1px solid #e2e8f0; margin-bottom: 20px;">
                    <h4 style="margin-top: 0; margin-bottom: 12px; font-size: 1.1rem; font-weight: 700; color: #1e293b;">💡 เคล็ดลับจากผู้เชี่ยวชาญ</h4>
                    <p style="font-size: 0.88rem; color: #475569; line-height: 1.6; margin: 0;">
                        ทำไมในสคริปต์ Workflow ถึงใช้คำสั่ง <code>git reset --hard origin/main</code> แทนที่จะใช้ <code>git pull</code> แบบปกติ?<br><br>
                        <strong>เหตุผลคือ:</strong> ป้องกันปัญหาโค้ดขัดแย้ง (Conflict) บนเซิร์ฟเวอร์ กรณีที่มีใครแอบเข้าไปแก้ไขไฟล์บน Production โดยตรง การใช้คำสั่ง reset --hard จะเป็นการสั่งกวาดล้างไฟล์เครื่องแม่ข่ายให้ตรงตาม Git คลังหลัก 100% เสมอ ป้องกันท่อส่งของแตกกลางทางได้ดีที่สุดครับ
                    </p>
                </div>

                <div class="sidebar-card" style="background: #fff; padding: 20px; border-radius: 8px; border: 1px solid #e2e8f0; border-left: 4px solid #ef4444;">
                    <h4 style="margin-top: 0; margin-bottom: 12px; font-size: 1.1rem; font-weight: 700; color: #b91c1c;">⚠️ ข้อควรระวังเรื่องสิทธิ์</h4>
                    <p style="font-size: 0.85rem; color: #64748b; line-height: 1.5; margin: 0;">
                        หากเกิดอาการท่อรันผ่านฉลุย (ไฟเขียวบน GitHub) แต่หน้าเว็บเบราว์เซอร์ไม่ขยับอัปเดตตาม ให้ตรวจสอบเรื่องสิทธิ์โฟลเดอร์ใน <strong>Phase 4</strong> อีกครั้ง โดยตรวจสอบให้แน่ใจว่าได้เปลี่ยนสิทธิ์ของกลุ่มทางเดินเว็บเป็นสิทธิ์ของ User ที่ใช้ล็อกอินเข้าไปรันคำสั่งเรียบร้อยแล้ว
                    </p>
                </div>
            </aside>
        </main>
    </div>

    <script src="../assets/js/script.js"></script>
</body>

</html>