<?php
$base_dir = "../"; // ถอยกลับ 1 ชั้นไปที่ Root เพื่อให้เรียกคอมโพเนนต์ได้ถูกต้อง
$active_nav = "server"; // ไฮไลต์เมนูที่วิชา Server
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน่วยที่ 9: บริการเว็บเซิร์ฟเวอร์ (Web Server Infrastructure)</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600;700&display=swap" rel="stylesheet">
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
                <span class="course-code" style="background: #10b981; color: #fff;">หน่วยที่ 9 (สัปดาห์ที่ 9)</span>
                <h2 style="margin: 10px 0 5px 0; font-size: 1.8rem; font-weight: 700;">บริการเว็บเซิร์ฟเวอร์ (Web Server Infrastructure)</h2>
                <p style="color: #94a3b8; margin: 0; font-size: 0.95rem;">ผ่าโครงสร้างสถาปัตยกรรม HTTP/HTTPS เปรียบเทียบเชิงลึกกลไกขุมพลัง Apache และ Nginx เรียนรู้การทำเว็บเสมือน ควบคู่ไปกับการบริหารจัดการผ่านแผงควบคุม HestiaCP</p>
            </div>
        </div>
    </div>

    <div class="container">
        <main>
            <div class="content-area">

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 30px;">
                    <h3 class="section-title">📘 ภาคทฤษฎี: สถาปัตยกรรมเว็บอินเทอร์เน็ต และโปรโตคอลการสื่อสาร</h3>

                    <h4>1. สถาปัตยกรรมเว็บอินเทอร์เน็ต (Web Client-Server Model)</h4>
                    <p>ระบบเว็บเซิร์ฟเวอร์ทำงานอยู่บนโครงสร้างพื้นฐานของ <strong>Request-Response Model</strong> โดยเมื่อผู้ใช้งาน (Client) ร้องขอเข้าหน้าเว็บผ่านเบราว์เซอร์ จะเกิดการส่งแพ็กเก็ตข้อมูลวิ่งผ่านระบบเครือข่ายอินเทอร์เน็ตไปยังปลายทาง ซึ่งมีซอฟต์แวร์บริการเว็บคอยเปิดพอร์ตรับฟังคำสั่งอยู่ตลอดเวลาเพื่อทำการประมวลผลไฟล์เอกสาร (HTML, CSS, JS) หรือส่งผ่านไปให้ Engine ฝั่งหลังบ้าน (เช่น PHP, Node.js) ประมวลผลก่อนจะส่งผลลัพธ์ย้อนกลับคืนไปแสดงผลบนหน้าจอของผู้ใช้</p>

                    <h4 style="margin-top: 25px;">2. ความแตกต่างระหว่างโปรโตคอล HTTP และ HTTPS</h4>
                    <p>พฤติกรรมการแลกเปลี่ยนข้อมูลบนเว็บไซต์แบ่งออกเป็นสองมาตรฐานความปลอดภัยที่สำคัญดังนี้:</p>
                    <ul style="padding-left: 20px; margin-bottom: 20px;">
                        <li><strong>HTTP (Hypertext Transfer Protocol - Port 80):</strong> เป็นการส่งผ่านข้อมูลแบบข้อความธรรมดา (Plain Text) ไม่มีการเข้ารหัสลับ ทำให้เสี่ยงต่อการโดนดักจับกลางทางด้วยวิธีสายลับส่องข้อมูล (Man-in-the-Middle Attack)</li>
                        <li><strong>HTTPS (HTTP Secure - Port 443):</strong> เป็นการครอบโปรโตคอล HTTP ไว้ภายใต้การทำงานของ <strong>SSL/TLS Encryption</strong> ข้อมูลทุกตัวอักษรจะถูกเข้ารหัสสลับซับซ้อนก่อนส่งออกจากเครื่อง โดยอาศัยใบรับรองดิจิทัล (Digital Certificate) มาช่วยยืนยันความปลอดภัยความถูกต้องของตัวตนเซิร์ฟเวอร์</li>
                    </ul>

                    <h4>3. กลไกการให้บริการเว็บเสมือน (Virtual Host / Server Block)</h4>
                    <p>ในโลกความเป็นจริง องค์กรไม่จำเป็นต้องซื้อคอมพิวเตอร์เซิร์ฟเวอร์ 1 เครื่องต่อ 1 เว็บไซต์ เพราะตัวซอฟต์แวร์เว็บระดับโลกถูกออกแบบให้มีคุณสมบัติที่เรียกว่า <strong>Virtual Host</strong> (หรือฝั่ง Nginx เรียกว่า <strong>Server Block</strong>) ช่วยให้เซิร์ฟเวอร์ที่มีเลขไอพีเพียงเบอร์เดียวสามารถแยกเปิดสิทธิ์บริการเว็บไซต์ได้หลายร้อยโดเมนพร้อมๆ กันอย่างอิสระ โดยอาศัยคุณลักษณะ **Name-based** ในการตรวจเช็กว่าข้อความ Request Headers ที่ส่งเข้ามานั้น ระบุชื่อโฮสต์ (Host Header) ไปที่ชื่อเว็บไซต์ใด แล้วระบบจะสลับแมปเส้นทางดึงโฟลเดอร์ Root ของเว็บนั้นออกมาเสิร์ฟให้ถูกต้องแม่นยำ</p>

                    <h4 style="margin-top: 25px;">4. การยกระดับการบริหารจัดสรรด้วยแผงควบคุม HestiaCP</h4>
                    <p><strong>HestiaCP</strong> คือหนึ่งใน Open-source Web Hosting Control Panel ยอดนิยมระดับโลกของสาย Linux แอดมินและวิศวกรระบบนิยมนำมาครอบทับสถาปัตยกรรมระบบดิบ เพื่อเปลี่ยนการผูกตารางคำสั่งบรรทัดข้อความอันซับซ้อน ให้กลายเป็นการบริหารจัดสรรผ่าน <strong>Web GUI Interface</strong> ที่สวยงาม โดย HestiaCP มีโครงสร้างเด่นคือการรัน **Nginx ทำหน้าที่เป็น Reverse Proxy หน้าบ้าน** คอยรับแรงกระแทก Request และเสิร์ฟไฟล์ Static ได้อย่างรวดเร็ว แล้วส่งต่อข้อมูลหนักๆ (Dynamic) ไปให้ **Apache หรือ PHP-FPM ทำงานด้านหลัง** ทำให้ระบบเสถียรและทรงพลังสูงสุด</p>
                </section>

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 30px;">
                    <h3 class="section-title">💻 ภาคปฏิบัติ 1: การติดตั้งและจัดแต่งผังตารางชื่อเว็บเสมือน (Virtual Host)</h3>
                    <p>ในหัวข้อแลบนี้ นักศึกษาจะได้ลงมือติดตั้งซอฟต์แวร์ยักษ์ใหญ่ทั้งสองค่าย และเรียนรู้วิธีการกำหนดผังชี้ทางโฟลเดอร์เก็บเอกสารเว็บ</p>

                    <h4 style="margin-top: 15px;">รูปแบบที่ 1: การตั้งค่า Virtual Host บน Apache2</h4>
                    <p>สร้างไฟล์กำหนดโครงสร้างเว็บที่ <code>sudo nano /etc/apache2/sites-available/alpha.local.conf</code></p>
                    <div class="code-window">
                        <div class="code-header"><span class="code-lang">alpha.local.conf (Apache)</span></div>
                        <pre>&lt;VirtualHost *:80&gt;
    ServerAdmin webmaster@alpha.local
    ServerName alpha.local
    ServerAlias www.alpha.local
    DocumentRoot /var/www/alpha.local/public_html

    ErrorLog ${APACHE_LOG_DIR}/alpha_error.log
    CustomLog ${APACHE_LOG_DIR}/alpha_access.log combined
&lt;/VirtualHost&gt;</pre>
                    </div>
                    <p style="margin-top: 10px;">สั่งเปิดสิทธิ์ใช้งานโครงเว็บไซต์และสั่งรีโหลดบริการ:</p>
                    <div class="code-window">
                        <div class="code-header"><span class="code-lang">Terminal</span></div>
                        <pre>sudo mkdir -p /var/www/alpha.local/public_html
sudo a2ensite alpha.local.conf   # สั่งเปิดใช้งานไซต์บน Apache
sudo systemctl reload apache2</pre>
                    </div>

                    <h4 style="margin-top: 25px;">รูปแบบที่ 2: การตั้งค่า Server Block บน Nginx</h4>
                    <p>สร้างไฟล์กำหนดโครงสร้างสระข้อมูลเว็บที่ <code>sudo nano /etc/nginx/sites-available/beta.local</code></p>
                    <div class="code-window">
                        <div class="code-header"><span class="code-lang">beta.local (Nginx)</span></div>
                        <pre>server {
    listen 80;
    root /var/www/beta.local/public_html;
    index index.html index.htm;

    server_name beta.local www.beta.local;

    location / {
        try_files $uri $uri/ =404;
    }

    access_log /var/log/nginx/beta_access.log;
    error_log /var/log/nginx/beta_error.log;
}</pre>
                    </div>
                    <p style="margin-top: 10px;">สร้างลิงก์เชื่อมโยงสิทธิ์ (Symlink) เพื่อเปิดบริการเปิดสิทธิ์บนสัญญาณ Nginx:</p>
                    <div class="code-window">
                        <div class="code-header"><span class="code-lang">Terminal</span></div>
                        <pre>sudo mkdir -p /var/www/beta.local/public_html
sudo ln -s /etc/nginx/sites-available/beta.local /etc/nginx/sites-enabled/
sudo nginx -t                # สั่งตรวจสอบความถูกต้องไวยากรณ์ไฟล์ Nginx
sudo systemctl restart nginx</pre>
                    </div>
                </section>

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0;">
                    <h3 class="section-title">🔍 ภาคปฏิบัติ 2: การแกะรหัสบันทึก Log และการบริหารด้วย HestiaCP GUI</h3>

                    <h4>1. ศาสตร์แห่งการแกะรอยประวัติผู้ใช้งานผ่าน Access Log</h4>
                    <p>ทุกครั้งที่มีเครื่องคอมพิวเตอร์วิ่งเข้ามาหาเว็บเซิร์ฟเวอร์ ข้อมูลดิบจะถูกบันทึกประวัติลงไปในไฟล์ล็อกทันที แอดมินสามารถเปิดดูพฤติกรรมแบบเรียลไทม์ได้ด้วยคำสั่ง <code>tail -f</code>:</p>
                    <div class="code-window">
                        <div class="code-header"><span class="code-lang">Terminal</span></div>
                        <pre>tail -f /var/log/nginx/beta_access.log</pre>
                    </div>
                    <p style="margin-top: 10px;">ตัวอย่างบรรทัดข้อมูลล็อกที่เกิดขึ้นจริง:</p>
                    <div class="code-window" style="background: #0f172a; color: #38bdf8;">
                        <pre>192.168.10.75 - - [29/May/2026:14:22:05 +0700] "GET /profile.html HTTP/1.1" 404 571 "-" "Mozilla/5.0..."</pre>
                    </div>

                    <p style="margin-top: 10px;"><strong>ถอดรหัสความหมายจากกล่องล็อกด้านบน:</strong></p>
                    <table class="grading-table" style="background: #f8fafc; font-size: 0.9rem;">
                        <thead>
                            <tr style="background: #cbd5e1;">
                                <th style="padding: 8px; text-align: center; width: 25%;">ส่วนข้อมูล</th>
                                <th style="padding: 8px;">ความหมายและสิ่งยึดโยงทางสถิติ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align: center; font-weight: 600;"><code class="inline-code">192.168.10.75</code></td>
                                <td>หมายเลขไอพีแอดเดรสของเครื่อง Client ผู้เข้าชมเว็บไซต์</td>
                            </tr>
                            <tr>
                                <td style="text-align: center; font-weight: 600;"><code class="inline-code">GET /profile.html</code></td>
                                <td>รูปแบบคำขอเรียกใช้งาน (HTTP Method) เพื่อดึงข้อมูลไฟล์หน้าต่างชื่อ profile.html</td>
                            </tr>
                            <tr>
                                <td style="text-align: center; font-weight: 600; color: #ef4444;"><code class="inline-code">404</code></td>
                                <td><strong>HTTP Status Code</strong> ผลลัพธ์ผิดพลาดเนื่องจาก "ไม่พบไฟล์ดังกล่าวบนเซิร์ฟเวอร์" (Not Found)</td>
                            </tr>
                            <tr>
                                <td style="text-align: center; font-weight: 600;"><code class="inline-code">571</code></td>
                                <td>ขนาดปริมาณเนื้อหาข้อมูล (Bytes) ที่เซิร์ฟเวอร์ตอบกลับตีกลับออกไป</td>
                            </tr>
                        </tbody>
                    </table>

                    <h4 style="margin-top: 25px;">2. การติดตั้งและการ Deploy โดเมนอย่างรวดเร็วผ่าน HestiaCP</h4>
                    <p>ในห้องปฏิบัติการระดับสูง เราจะทดลองติดตั้ง HestiaCP บนระบบปฏิบัติการลินุกซ์ที่ยังว่างเปล่า (Clean OS) ผ่านสคริปต์อัตโนมัติ:</p>
                    <div class="code-window">
                        <div class="code-header"><span class="code-lang">HestiaCP Installation</span></div>
                        <pre>wget https://raw.githubusercontent.com/hestiacp/hestiacp/release/install/hst-install.sh
sudo bash hst-install.sh --force  # สั่งดำเนินการดาวน์โหลดตัวติดตั้งและผูกระบบอัตโนมัติ</pre>
                    </div>

                    <div class="analogy-box" style="background: #f0fdf4; border-left: 4px solid #16a34a; margin-top: 15px;">
                        <strong>🛠️ ลำดับขั้นตอนการจัดการผ่านหน้าต่าง HestiaCP Web GUI:</strong>
                        <ol style="margin-top: 5px; padding-left: 20px; font-size: 0.9rem; line-height: 1.6;">
                            <li><strong>การเข้าสู่ระบบ:</strong> เปิดเว็บเบราว์เซอร์ไปที่พอร์ตความปลอดภัยตามที่ระบบแจก (เช่น <code>https://[IP-Server]:8083</code>) กรอกรหัสผ่าน Admin</li>
                            <li><strong>เพิ่มสิทธิ์โดเมนเนม (Add Web Domain):</strong> คลิกเข้าไปที่เมนูแท็บ <strong>Web</strong> ➔ กดปุ่มสีเขียว <strong>Add Web Domain</strong> ➔ พิมพ์ชื่อโดเมนที่เราจดทะเบียนจริงลงไป ระบบจะสร้างผังคอนฟิกสลับ Virtual Host ให้อัตโนมัติในเบื้องหลังทันที</li>
                            <li><strong>การทำระบบความปลอดภัย HTTPS (Let's Encrypt):</strong> ภายในหน้าจัดการชื่อโดเมน แอดมินเพียงแค่นำเมาส์ไปติ๊กถูกที่ช่อง <strong>Enable SSL for this domain</strong> และเลือก <strong>Use Let's Encrypt to obtain SSL certificate</strong> ระบบคุมงานจะวิ่งไปคุยกับสมาคม Let's Encrypt เพื่อขอรับใบรับรองและสั่งรีโหลดติดตั้ง HTTPS ให้ใช้งานได้ฟรีตลอดกาลภายในเวลาไม่ถึง 1 นาที</li>
                        </ol>
                    </div>
                </section>
            </div>

            <aside>
                <div class="sidebar-card">
                    <h4>📋 ข้อมูลประจำหน่วย</h4>
                    <p style="font-size: 0.9rem; color: #475569;">
                        <strong>สัปดาห์ที่:</strong> 9<br>
                        <strong>เวลาเรียน:</strong> 5 ชั่วโมง (ทฤษฎี 1, ปฏิบัติ 4)<br>
                        <strong>เกณฑ์การประเมิน:</strong> คอนฟิกแผนผัง Virtual Host และสลับรันได้ถูกต้อง (4 คะแนน) เอกสารวิเคราะห์สรุปความหมายบรรทัดล็อก (3 คะแนน) แลบการผูกจัดการเว็บโดเมนและ SSL บน HestiaCP สำเร็จ (3 คะแนน)
                    </p>
                </div>

                <div class="sidebar-card" style="border-left: 4px solid #f59e0b;">
                    <h4>⚠️ ข้อควรระวัง: ศึกชิงพอร์ตหมายเลข 80</h4>
                    <p style="font-size: 0.85rem; color: #64748b; line-height: 1.5;">
                        ปัญหายอดฮิตประจำแลบนี้คือนักศึกษาลงมือติดตั้งซอฟต์แวร์ Apache ทิ้งไว้ แล้วไปสั่งติดตั้ง Nginx ซ้ำซ้อน ระบบจะฟ้องข้อความ <strong>"Address already in use" (พอร์ตชนกัน)</strong> เนื่องจากโปรแกรมทั้งสองค่ายแย่งกันเคลมสิทธิ์ผูกขาด <strong>Port 80</strong> แอดมินจึงจำเป็นต้องแมนนวลปิดบริการตัวเก่าก่อน หรือปรับแก้ตารางไฟล์กำหนดพอร์ตสลับให้อยู่คนละหมายเลขกันครับ
                    </p>
                </div>
            </aside>
        </main>
    </div>

    <script src="../assets/js/script.js"></script>
</body>

</html>