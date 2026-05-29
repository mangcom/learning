<?php
$base_dir = "../"; // ถอยกลับ 1 ชั้นไปที่ Root เพื่อให้เรียกคอมโพเนนต์ได้ถูกต้อง
$active_nav = "server"; // ไฮไลต์เมนูที่วิชา Server
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน่วยที่ 14: งานระบบอัตโนมัติและความปลอดภัยกุญแจเข้ารหัส (Automation & SSL)</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght=300;400;600;700&display=swap" rel="stylesheet">
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
                /* ป้องกันเนื้อหาดันจน Flex เสียรูป */
            }

            aside {
                width: 320px !important;
                /* ล็อกความกว้างแถบข้างให้คงที่และ scannable */
                flex-shrink: 0 !important;
                /* บังคับห้ามหดตัวเด็ดขาด */
            }
        }
    </style>
</head>

<body style="background-color: #f8fafc;">

    <?php include '../components/navbar.php'; ?>

    <div class="page-header" style="background: #0f172a; color: #fff; padding: 40px 0 65px 0;">
        <div class="container">
            <a href="index.php" class="back-link">
                <span class="arrow-icon">⬅</span> <span>กลับสู่หน้าหลักวิชา Linux Server</span>
            </a>
            <div style="margin-top: 15px;">
                <span class="course-code" style="background: #10b981; color: #fff;">หน่วยที่ 14 (สัปดาห์ที่ 14)</span>
                <h2 style="margin: 10px 0 5px 0; font-size: 1.8rem; font-weight: 700;">งานระบบอัตโนมัติและความปลอดภัยกุญแจเข้ารหัส (Automation & SSL Infrastructure)</h2>
                <p style="color: #94a3b8; margin: 0; font-size: 0.95rem;">ยกระดับประสิทธิภาพเซิร์ฟเวอร์ด้วย Bash Shell Automation และตัวตั้งเวลา Cron Job พร้อมเจาะลึกระบบความปลอดภัยกุญแจเข้ารหัส PKI และเครื่องมือจัดการเว็บอัจฉริยะ Caddy และ Nginx Proxy Manager</p>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 30px;">
        <main>
            <div class="content-area">

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 30px;">
                    <h3 class="section-title">📘 ภาคทฤษฎี: สคริปต์อัตโนมัติ ตารางเวลา และโครงสร้างพื้นฐานกุญแจสาธารณะ</h3>

                    <h4>1. ระบบตั้งโปรแกรมคำสั่งอัตโนมัติ (Bash Automation) และระบบ Cron Job</h4>
                    <p>ในการดูแลเซิร์ฟเวอร์ หน้าที่ซ้ำๆ เช่น การสำรองข้อมูล การล้างไฟล์ขยะ หรือการตรวจสอบสถานะระบบ หากให้มนุษย์มานั่งพิมพ์คำสั่งเองทุกวันมักเสี่ยงต่อความผิดพลาด (Human Error) วิศวกรระบบจึงใช้ <strong>Bash Scripting</strong> ในการรวบรวมคำสั่งลินุกซ์มาประมวลผลตามเงื่อนไขตรรกะ และใช้ตารางเวลา <strong>Cron Job</strong> ของเคอร์เนลคอยสั่งรันสคริปต์นั้นตามเวลาที่กำหนดอย่างแม่นยำ</p>

                    <p style="margin-top: 10px;">ไวยากรณ์หลักในการตั้งเวลาของ Cron Job ประกอบด้วย 5 ช่องสัญลักษณ์หลัก:</p>
                    <div class="code-window" style="background: #0f172a; color: #38bdf8; padding: 15px; font-family: monospace; font-size: 1.1rem; text-align: center;">
                        * &nbsp; * &nbsp; * &nbsp; * &nbsp; * &nbsp; [คำสั่งที่ต้องการให้รัน]<br>
                        <span style="color: #94a3b8; font-size: 0.8rem;">(นาที 0-59) | (ชั่วโมง 0-23) | (วันที่ 1-31) | (เดือน 1-12) | (วันของสัปดาห์ 0-6 โดย 0=วันอาทิตย์)</span>
                    </div>

                    <h4 style="margin-top: 25px;">2. กลไกของใบรับรอง SSL/TLS และโครงสร้างพื้นฐาน PKI Basic</h4>
                    <p>การรับส่งข้อมูลผ่านโปรโตคอล HTTP แบบธรรมดา ข้อมูลจะถูกส่งเป็นข้อความดิบ (Plaintext) ซึ่งเสี่ยงต่อการโดนดักฟังกลางทาง (Man-in-the-Middle Attack) โปรโตคอล <strong>HTTPS (พอร์ต 443)</strong> จึงนำระบบเข้ารหัส <strong>SSL/TLS</strong> เข้ามาครอบคลุมการสื่อสาร โดยทำงานร่วมกับโครงสร้าง <strong>PKI (Public Key Infrastructure)</strong> ซึ่งใช้หลักการเข้ารหัสแบบอสมมาตร (Asymmetric Encryption) ที่มีกุญแจคู่แฝดคู่หนึ่ง:</p>
                    <ul style="padding-left: 20px; margin-bottom: 15px;">
                        <li><strong>Private Key (กุญแจส่วนตัว):</strong> เก็บรักษาไว้บนเครื่องเซิร์ฟเวอร์อย่างปลอดภัยที่สุด ห้ามเปิดเผยให้ผู้อื่นทราบเด็ดขาด ทำหน้าที่ใช้ถอดรหัสข้อมูล</li>
                        <li><strong>Public Key (กุญแจสาธารณะ):</strong> แนบไปพร้อมกับใบรับรองดิจิทัล (Digital Certificate) แจกจ่ายให้เบราว์เซอร์ทั่วโลกใช้เข้ารหัสข้อมูลก่อนส่งมาหาเซิร์ฟเวอร์</li>
                    </ul>
                    <p>เพื่อให้เบราว์เซอร์เชื่อถือใบรับรองนั้น ใบรับรองจะต้องได้รับการรับรองและปั๊มตราประทับจากองค์กรกลางที่เป็นที่ยอมรับระดับโลกที่เรียกว่า <strong>CA (Certificate Authority)</strong> เช่น Let's Encrypt แต่หากเป็นการใช้งานภายในห้องแล็บทดสอบ แอดมินสามารถสวมบทบาทเป็นองค์กร CA เสียเองเพื่อปั๊มตราประทับออกมาใช้งานได้ เรียกว่า <strong>Self-Signed Certificate</strong> (ซึ่งเบราว์เซอร์จะขึ้นเตือนสีแดงว่าไม่รู้จักตัวตนผู้ประทับตรา แต่ข้อมูลสายสัญญาณจะได้รับการเข้ารหัสลับปลอดภัยตามมาตรฐานสากล)</p>
                </section>

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 30px;">
                    <h3 class="section-title">🤖 ภาคปฏิบัติ 1: ขับเคลื่อนสคริปต์บีบอัดไฟล์และตั้งเวลาอัตโนมัติ</h3>
                    <p>นักศึกษาจะได้ลงมือเขียนสคริปต์ระบุตัวแปรเพื่อสั่งรวบรวมไฟล์เว็บและฐานข้อมูลบีบอัดเก็บลงโฟลเดอร์สำรองข้อมูลอย่างเป็นระบบ</p>

                    <h4 style="margin-top: 15px;">ขั้นตอนที่ 1: เขียนสคริปต์สำรองข้อมูลอัจฉริยะ (Backup Automation Script)</h4>
                    <p>สร้างไฟล์สคริปต์ชื่อ <code>sudo nano /usr/local/bin/backup_system.sh</code> แล้วเขียนคำสั่งดังนี้:</p>
                    <div class="code-window">
                        <div class="code-header"><span class="code-lang">backup_system.sh</span></div>
                        <pre>#!/bin/bash

# 1. กำหนดตัวแปรสภาพแวดล้อม (Variables)
SRC_DIR="/var/www/html"
BACKUP_DIR="/var/backups/web_archive"
CURRENT_DATE=$(date +"%Y-%m-%d_%H%M%S")
FILE_NAME="web_backup_${CURRENT_DATE}.tar.gz"

# 2. ตรวจสอบและสร้างโฟลเดอร์ปลายทางหากยังไม่มีในระบบ
if [ ! -d "$BACKUP_DIR" ]; then
    mkdir -p "$BACKUP_DIR"
fi

# 3. สั่งรันกระบวนการบีบอัดข้อมูลแบบความปลอดภัยสูงด้วย tar cGz
echo "กำลังเริ่มต้นกระบวนการสำรองข้อมูลจาก $SRC_DIR..."
tar -czf "${BACKUP_DIR}/${FILE_NAME}" "$SRC_DIR"

# 4. แสดงผลลัพธ์และบันทึกประวัติการทำงานลงไฟล์ Log
echo "กระบวนการสำรองข้อมูลเสร็จสิ้นสำเร็จ ไฟล์ถูกเก็บไว้ที่: ${BACKUP_DIR}/${FILE_NAME}"
echo "[${CURRENT_DATE}] Backup Successful: ${FILE_NAME}" >> /var/log/backup_history.log</pre>
                    </div>
                    <div class="code-window" style="margin-top: 10px;">
                        <div class="code-header"><span class="code-lang">Terminal</span></div>
                        <pre>sudo chmod +x /usr/local/bin/backup_system.sh   # มอบสิทธิ์การสั่งรันให้กับสคริปต์ (Execute Permission)
sudo /usr/local/bin/backup_system.sh             # ทดสอบสั่งรันสคริปต์ด้วยตนเองครั้งแรก</pre>
                    </div>

                    <h4 style="margin-top: 25px;">ขั้นตอนที่ 2: ผูกตารางเวลาให้ระบบทำงานเองอัตโนมัติด้วย Cron Job</h4>
                    <p>เปิดหน้าต่างจัดการเวลาด้วยคำสั่ง <code>sudo crontab -e</code> (เลือกโปรแกรมแก้ไขข้อความตัวเลือกที่เป็น nano) จากนั้นเลื่อนลงไปบรรทัดล่างสุดเพื่อตั้งเวลาให้ระบบแอบรันสคริปต์นี้ **ทุกคืนเวลาเที่ยงคืนตรง**:</p>
                    <div class="code-window">
                        <div class="code-header"><span class="code-lang">Crontab Editor</span></div>
                        <pre>0 0 * * * /usr/local/bin/backup_system.sh > /dev/null 2>&1</pre>
                    </div>
                    <p style="margin-top: 10px; font-size: 0.9rem; color: #475569;">*หมายเหตุ: ส่วนท้ายคำสั่ง `> /dev/null 2>&1` ใส่ไว้เพื่อระงับการส่งอีเมลรายงานแจ้งเตือนของระบบลินุกซ์ ช่วยประหยัดพื้นที่เก็บข้อมูลขยะหลังบ้าน*</p>
                </section>

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0;">
                    <h3 class="section-title">🔒 ภาคปฏิบัติ 2: ออกใบรับรอง Self-Signed และการควบคุมผ่านเครื่องมือยุคใหม่</h3>
                    <p>ฝึกฝนการใช้โปรแกรมชุดคำสั่งโอเพ่นซอร์สในการจัดการใบรับรองและการตั้งค่าตัวแทนรับสัญญาณส่วนหน้า (Reverse Proxy)</p>

                    <h4 style="margin-top: 15px;">ขั้นตอนที่ 1: การปั๊มตราประทับออกใบรับรองประเภท SSL Self-Signed</h4>
                    <p>ใช้เครื่องมือสร้างรหัส OpenSSL ในการเจนเนอเรท Private Key และตัวใบรับรองขึ้นมาใช้ทดสอบภายในห้องแล็บ:</p>
                    <div class="code-window">
                        <div class="code-header"><span class="code-lang">Terminal</span></div>
                        <pre>sudo mkdir -p /etc/ssl/private_certs
sudo openssl req -x509 -nodes -days 365 -newkey rsa:2048 \
  -keyout /etc/ssl/private_certs/server.key \
  -out /etc/ssl/private_certs/server.crt</pre>
                    </div>
                    <p style="margin-top: 10px; font-size: 0.9rem; color: #475569;">*ในขั้นตอนการสร้าง ระบบจะซักถามข้อมูลรหัสประเทศ แอดมินสามารถกรอกค่าจำลองได้ เช่น `TH` ในช่อง Country Name และชื่อไอพีในช่อง Common Name*</p>

                    <h4 style="margin-top: 25px;">ขั้นตอนที่ 2: การใช้ Caddy Server มารองรับเว็บไซต์และการเปิดสิทธิ์ SSL ทันที</h4>
                    <p><strong>Caddy</strong> เป็นเว็บเซิร์ฟเวอร์ยุคใหม่ที่โดดเด่นในเรื่องการเปิดใช้งาน HTTPS อัตโนมัติและมีรูปแบบไฟล์คอนฟิกที่สั้นกระชับมาก:</p>
                    <div class="code-window">
                        <div class="code-header"><span class="code-lang">Terminal</span></div>
                        <pre>sudo apt install -y debian-keyring debian-archive-keyring apt-transport-https
curl -1sLf 'https://dl.cloudsmith.io/public/caddy/stable/gpg.key' | sudo gpg --dearmor -o /usr/share/keyrings/caddy-stable-archive-keyring.gpg
curl -1sLf 'https://dl.cloudsmith.io/public/caddy/stable/debian.deb.txt' | sudo tee /etc/apt/sources.list.p/caddy-stable.list
sudo apt update && sudo apt install caddy -y</pre>
                    </div>
                    <p style="margin-top: 10px;">เปิดไฟล์ปรับแต่ง <code>sudo nano /etc/caddy/Caddyfile</code> แก้ไขผังให้เรียกใช้ใบรับรองกุญแจที่เราทำไว้:</p>
                    <div class="code-window">
                        <div class="code-header"><span class="code-lang">Caddyfile</span></div>
                        <pre>:443 {
    root * /var/www/html
    file_server
    tls /etc/ssl/private_certs/server.crt /etc/ssl/private_certs/server.key
}</pre>
                    </div>
                    <div class="code-window" style="margin-top: 10px;">
                        <div class="code-header"><span class="code-lang">Terminal</span></div>
                        <pre>sudo systemctl restart caddy    # สั่งรีสตาร์ทบริการเพื่อให้เว็บเปลี่ยนมารับสัญญาณผ่าน HTTPS พอร์ต 443</pre>
                    </div>

                    <h4 style="margin-top: 25px;">ขั้นตอนที่ 3: การยกตู้ระบบจัดการ GUI ด้วย Nginx Proxy Manager (NPM)</h4>
                    <p>สำหรับองค์กรที่มีเว็บไซต์จำนวนมาก แอดมินนิยมใช้ระบบเว็บหน้าจอบริหารจัดการแบบคลิกเลือกผ่าน <strong>Nginx Proxy Manager</strong> โดยสั่งรันผ่านสคริปต์ Docker Compose ดังนี้:</p>
                    <div class="code-window">
                        <div class="code-header"><span class="code-lang">Terminal</span></div>
                        <pre>mkdir -p $HOME/npm && cd $HOME/npm
nano docker-compose.yml</pre>
                    </div>
                    <div class="code-window" style="margin-top: 10px;">
                        <div class="code-header"><span class="code-lang">docker-compose.yml</span></div>
                        <pre>version: '3.8'
services:
  app:
    image: 'jc21/nginx-proxy-manager:latest'
    restart: always
    ports:
      - '80:80'
      - '81:81'
      - '443:443'
    volumes:
      - ./data:/data
      - ./letsencrypt:/etc/letsencrypt</pre>
                    </div>
                    <div class="code-window" style="margin-top: 10px;">
                        <div class="code-header"><span class="code-lang">Terminal</span></div>
                        <pre>sudo docker-compose up -d     # สั่งยกตู้ระบบควบคุมหน้าเว็บส่วนหน้า
# เข้าใช้งานแผงควบคุมหน้าจอ GUI ผ่านเว็บเบราว์เซอร์พิกัด: http://[IP-Server]:81
# รหัสผ่านเริ่มต้นจากโรงงานผู้ผลิต: Email: admin@example.com | Password: changeme</pre>
                    </div>
                    <p style="margin-top: 15px;">เมื่อล็อกอินเข้าไปในระบบ NPM แล้ว แอดมินสามารถเข้าไปที่เมนู **Proxy Hosts** เพื่อสั่งชี้โดเมนเนมกระจายแรงกระแทกไปหาตู้คอนเทนเนอร์หลังบ้าน และกดคลิกปุ่มขอใบรับรองความปลอดภัย **Let's Encrypt** ของจริงอย่างเป็นทางการมาประทับตราใช้งานได้ทันทีโดยไม่ต้องพิมพ์คำสั่งดิบแม้แต่บรรทัดเดียวครับ</p>
                </section>
            </div>

            <aside>
                <div class="sidebar-card" style="background: #fff; padding: 20px; border-radius: 8px; border: 1px solid #e2e8f0; margin-bottom: 20px;">
                    <h4 style="margin-top: 0; margin-bottom: 12px; font-size: 1.1rem; font-weight: 700;">📋 ข้อมูลประจำหน่วย</h4>
                    <p style="font-size: 0.9rem; color: #475569; line-height: 1.6; margin: 0;">
                        <strong>สัปดาห์ที่:</strong> 14<br>
                        <strong>เวลาเรียน:</strong> 5 ชั่วโมง (ทฤษฎี 1, ปฏิบัติ 4)<br>
                        <strong>เกณฑ์การประเมิน:</strong> ผลสัมฤทธิ์การเขียน Bash Script บีบอัดตรวจสอบเงื่อนไข (3 คะแนน) ความถูกต้องของการตั้งเวลาสั่งรันอัตโนมัติบน Cron ตาราง (3 คะแนน) ความสมบูรณ์ของใบงานจำลองออกใบรับรองและการพ่วงผ่านหน้าเว็บคอนโทรล NPM (4 คะแนน)
                    </p>
                </div>

                <div class="sidebar-card" style="background: #fff; padding: 20px; border-radius: 8px; border: 1px solid #e2e8f0; border-left: 4px solid #ef4444;">
                    <h4 style="margin-top: 0; margin-bottom: 12px; font-size: 1.1rem; font-weight: 700; color: #ef4444;">🚨 จุดอันตรายระบบ</h4>
                    <p style="font-size: 0.85rem; color: #64748b; line-height: 1.5; margin: 0;">
                        ความสูญเสียด้านความปลอดภัยที่พบบ่อยที่สุดประการแรกคือ การเผลอปล่อยให้ไฟล์ <strong>Private Key (.key)</strong> หลุดรอดไปในพื้นที่สาธารณะหรืออัปโหลดขึ้น GitHub ซึ่งทำให้ผู้ไม่หวังดีสามารถดักสกัดถอดรหัสลับข้อมูลทั้งหมดขององค์กรได้ทันที! และประการที่สองคือการดาวน์โหลด Bash Script แปลกปลอมจากอินเทอร์เน็ตมารันด้วยสิทธิ์ `sudo` โดยไม่ได้ตรวจสอบคำสั่งด้านในล่วงหน้า ซึ่งอาจเป็นสคริปต์ฝังมัลแวร์ขโมยข้อมูลพาสเวิร์ดระบบได้ครับ
                    </p>
                </div>
            </aside>
        </main>
    </div>

    <script src="../assets/js/script.js"></script>
</body>

</html>