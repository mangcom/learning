<?php
$base_dir = "../"; // ถอยกลับ 1 ชั้นไปที่ Root เพื่อให้เรียกคอมโพเนนต์ได้ถูกต้อง
$active_nav = "server"; // ไฮไลต์เมนูที่วิชา Server
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน่วยที่ 13: บริการโครงสร้างสถาปัตยกรรมยุคใหม่ (Container & IoT Platform)</title>
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
                <span class="course-code" style="background: #10b981; color: #fff;">หน่วยที่ 13 (สัปดาห์ที่ 13)</span>
                <h2 style="margin: 10px 0 5px 0; font-size: 1.8rem; font-weight: 700;">บริการโครงสร้างสถาปัตยกรรมยุคใหม่ (Container & IoT Platform)</h2>
                <p style="color: #94a3b8; margin: 0; font-size: 0.95rem;">เรียนรู้การเปลี่ยนผ่านสถาปัตยกรรมไอทีจากเครื่องจำลองเสมือนสู่เทคโนโลยีตู้คอนเทนเนอร์ Docker ควบคุมระบบ Microservices ด้วย Docker Compose และการประยุกต์จัดวางระบบ IoT Gateway ด้วย Node-RED</p>
            </div>
        </div>
    </div>

    <div class="container">
        <main>
            <div class="content-area">

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 30px;">
                    <h3 class="section-title">📘 ภาคทฤษฎี: สภาพแวดล้อมเสมือนยุคใหม่ และสถาปัตยกรรม IoT Platform</h3>

                    <h4>1. ข้อแตกต่างระหว่าง Hypervisor (Virtual Machine) กับ Container</h4>
                    <p>ในอดีตการแบ่งสรรทรัพยากรเซิร์ฟเวอร์จะพึ่งพาเทคโนโลยี <strong>Hardware-level Virtualization (Hypervisor)</strong> เช่น VMware หรือ Proxmox ซึ่งจำเป็นต้องติดตั้งระบบปฏิบัติการรับเชิญ (Guest OS) ทับลงไปในทุกๆ เครื่องเสมือน ทำให้กินทรัพยากรสูงและบูตระบบช้า แต่ในปัจจุบันสถาปัตยกรรมได้เปลี่ยนผ่านมาสู่ <strong>OS-level Virtualization (Container)</strong> ซึ่งเป็นการจำลองสภาพแวดล้อมแยกขาดออกจากกันโดยแชร์เคอร์เนล (Kernel) ร่วมกับ Host OS โดยตรง ทำให้คอนเทนเนอร์มีขนาดเล็กระดับ Megabyte บูตเสร็จในเวลาไม่กี่วินาที และประหยัดทรัพยากรอย่างมหาศาล</p>

                    <table class="grading-table" style="margin: 20px 0; background: #f8fafc; font-size: 0.9rem;">
                        <thead>
                            <tr style="background: #cbd5e1;">
                                <th style="padding: 10px; text-align: center; width: 20%;">คุณลักษณะ</th>
                                <th style="padding: 10px; width: 40%;">Hypervisor (Virtual Machine)</th>
                                <th style="padding: 10px; width: 40%;">Container (Docker)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align: center; font-weight: 600;"><strong>สถาปัตยกรรม</strong></td>
                                <td>จำลองฮาร์ดแวร์เสมือน (Hardware Isolation) ต้องรัน Guest OS เต็มระบบทุกเครื่อง</td>
                                <td>จำลองพื้นที่ในระดับ OS (Process Isolation) ใช้เคอร์เนลร่วมกันผ่าน Name-spaces</td>
                            </tr>
                            <tr>
                                <td style="text-align: center; font-weight: 600;"><strong>การกินทรัพยากร</strong></td>
                                <td>สูงมาก (จอง RAM และ Disk ล่วงหน้าตามโควตาที่ระบุไว้ชัดเจน)</td>
                                <td>ต่ำมาก (ใช้ทรัพยากรตามจริงที่แอปพลิเคชันเรียกใช้ ณ วินาทีกระบวนการ)</td>
                            </tr>
                            <tr>
                                <td style="text-align: center; font-weight: 600;"><strong>ความเร็วบูตระบบ</strong></td>
                                <td>ช้า (ใช้เวลาเป็นนาทีเพราะต้องโหลดลำดับสตาร์ท OS ใหม่ทั้งหมด)</td>
                                <td>เร็วระดับมิลลิวินาที (รันกระบวนการแอปพลิเคชันขึ้นมาทำงานได้ทันที)</td>
                            </tr>
                        </tbody>
                    </table>

                    <h4>2. โครงสร้างวิศวกรรมของ Docker (Docker Engine Components)</h4>
                    <p>ระบบนิเวศของ Docker ทำงานร่วมกันผ่านองค์ประกอบสถาปัตยกรรมแบบ Client-Server ดังนี้:</p>
                    <ul style="padding-left: 20px; margin-bottom: 20px;">
                        <li><strong>Docker Daemon (dockerd):</strong> บริการหลังบ้านที่รันอยู่บน Host ทำหน้าที่คอยจัดการวัตถุทั้งหมด เช่น ตู้คอนเทนเนอร์, อิมเมจ, เครือข่าย และโวลุ่มจัดเก็บไฟล์</li>
                        <li><strong>Docker Image:</strong> แม่พิมพ์หรือพิมพ์เขียวแบบอ่านอย่างเดียว (Read-only Template) บรรจุซอร์สโค้ด รันไทม์ และซอฟต์แวร์ทั้งหมดที่แอปพลิเคชันจำเป็นต้องใช้</li>
                        <li><strong>Docker Container:</strong> ตัวตนที่ถูกรันขึ้นมาจาก Image (Instance) เปรียบเสมือนกล่องกลไกที่ทำงานอยู่จริงอย่างโดดเดี่ยว ปลอดภัยจากภายนอก</li>
                        <li><strong>Docker Registry:</strong> คลังจัดเก็บและกระจายอิมเมจ เช่น <em>Docker Hub</em> ศูนย์กลางรวบรวมอิมเมจมาตรฐานระดับโลก</li>
                    </ul>

                    <h4>3. โครงสร้างระบบฐานแพลตฟอร์ม IoT (Internet of Things Platform)</h4>
                    <p>ระบบนิเวศ IoT ประกอบด้วยเซ็นเซอร์ปลายทางที่ส่งข้อมูลดิบวิ่งผ่านเครือข่ายมายัง <strong>IoT Gateway/Platform</strong> ซึ่งทำหน้าที่รับฟีดข้อมูล ตรวจสอบคัดกรอง และประมวลผลคำสั่งเชิงตรรกะ ก่อนจะนำข้อมูลไปแสดงผลบน Dashboard หรือสั่งการให้อุปกรณ์สมองกลฝังตัวทำงานตอบสนอง โดยซอฟต์แวร์ <strong>Node-RED</strong> ถือเป็นเครื่องมือประเภท <em>Flow-based Programming</em> ยอดนิยมในวงการอุตสาหกรรม 4.0 ที่ใช้เชื่อมต่อฮาร์ดแวร์เข้ากับ API และ Web Service ได้อย่างรวดเร็ว</p>
                </section>

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 30px;">
                    <h3 class="section-title">💻 ภาคปฏิบัติ 1: รันระบบควบคุมตู้คอนเทนเนอร์ด้วย Docker และ Docker Compose</h3>
                    <p>นักศึกษาจะได้ลงมือติดตั้งเครื่องยนต์ด็อกเกอร์ ฝึกคำสั่งพื้นฐาน และสร้างกลุ่มบริการ Microservices ผ่านไฟล์สคริปต์แบบรวมศูนย์</p>

                    <h4 style="margin-top: 15px;">ขั้นตอนที่ 1: ติดตั้ง Docker Engine บนระบบปฏิบัติการ Linux</h4>
                    <div class="code-window">
                        <div class="code-header"><span class="code-lang">Terminal</span></div>
                        <pre>sudo apt update && sudo apt install docker.io docker-compose -y
sudo systemctl enable --now docker
# ตรวจสอบสถานะความพร้อมการทำงานของเครื่องยนต์
sudo docker info</pre>
                    </div>

                    <h4 style="margin-top: 25px;">ขั้นตอนที่ 2: ฝึกหัดคำสั่งควบคุมฐานรากคอนเทนเนอร์เดี่ยว</h4>
                    <div class="code-window">
                        <div class="code-header"><span class="code-lang">Terminal</span></div>
                        <pre># 1. สั่งดึงและรันหน้าเว็บเสิร์ฟเวอร์ Nginx แบบเบื้องหลัง (Detached) พร้อมสลับพอร์ตออกไปที่พอร์ต 8080
sudo docker run -d -p 8080:80 --name my-webserver nginx

# 2. ตรวจเช็คตู้คอนเทนเนอร์ที่กำลังเปิดทำงานอยู่ ณ ปัจจุบัน
sudo docker ps

# 3. สั่งมุดเข้าไปรันคำสั่งภายในตู้คอนเทนเนอร์เสมือน (Interactive Shell)
sudo docker exec -it my-webserver bash

# 4. สั่งหยุดการทำงาน และลบตู้คอนเทนเนอร์ออกจากระบบหลังทดสอบเสร็จ
sudo docker stop my-webserver
sudo docker rm my-webserver</pre>
                    </div>

                    <h4 style="margin-top: 25px;">ขั้นตอนที่ 3: การรันกลุ่มบริการซับซ้อนด้วย Docker Compose</h4>
                    <p>สร้างสคริปต์สถาปัตยกรรมแบบรวมศูนย์ด้วยไฟล์ผังงาน <code>sudo nano docker-compose.yml</code> เพื่อรัน Web Application พ่วงฐานข้อมูลพร้อมกัน:</p>
                    <div class="code-window">
                        <div class="code-header"><span class="code-lang">docker-compose.yml</span></div>
                        <pre>version: '3.8'

services:
  app-web:
    image: wordpress:latest
    ports:
      - "8000:80"
    environment:
      WORDPRESS_DB_HOST: db-server
      WORDPRESS_DB_PASSWORD: supersecretpass
    depends_on:
      - db-server

  db-server:
    image: mariadb:10.6
    environment:
      MYSQL_ROOT_PASSWORD: supersecretpass
      MYSQL_DATABASE: wordpress
    volumes:
      - db_data:/var/lib/mysql

volumes:
  db_data:</pre>
                    </div>
                    <p style="margin-top: 10px;">สั่งงานให้ทั้งระบบสตาร์ทขึ้นรูปและยกตู้ขึ้นทำงานโดยอัตโนมัติด้วยคำสั่งเดียว:</p>
                    <div class="code-window">
                        <div class="code-header"><span class="code-lang">Terminal</span></div>
                        <pre>sudo docker-compose up -d     # สั่งสร้างและสั่งรันบริการกลุ่มทั้งหมดเบื้องหลัง
sudo docker-compose ps         # ตรวจสอบสถานะกลุ่มระบบงานคอนเทนเนอร์
# เข้าหน้าเว็บทดสอบ WordPress ผ่านพิกัด: http://[IP-Server]:8000</pre>
                    </div>
                </section>

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0;">
                    <h3 class="section-title">🔌 ภาคปฏิบัติ 2: จัดตั้งแพลตฟอร์มและเปิดแผงบอร์ด IoT ด้วย Node-RED Container</h3>
                    <p>ประยุกต์ใช้ความรู้ด็อกเกอร์ในการปล่อยตัวติดตั้งบริการแพลตฟอร์มศูนย์กลางข้อมูล IoT เพื่อรับฟีดข้อมูลและวาดหน้าจอแสดงผล</p>

                    <h4 style="margin-top: 15px;">ขั้นตอนที่ 1: รันตู้คอนเทนเนอร์ Node-RED พร้อมผูกโวลุ่มรักษาข้อมูลดิบ</h4>
                    <div class="code-window">
                        <div class="code-header"><span class="code-lang">Terminal</span></div>
                        <pre># สร้างโฟลเดอร์สำหรับเก็บคอนฟิกกระบวนการทำงานบนโฮสต์
mkdir -p $HOME/nodered_data

# รันตู้ Node-RED ดึงพอร์ตควบคุมมาตรฐาน 1880 ออกมารับสัญญาณภายนอก
sudo docker run -d -p 1880:1880 \
  -v $HOME/nodered_data:/data \
  --name my-iot-nodered \
  --restart always \
  nodered/node-red</pre>
                    </div>

                    <h4 style="margin-top: 25px;">ขั้นตอนที่ 2: เข้าควบคุมกระบวนการและจัดวาง Node ผังทางไหลข้อมูล</h4>
                    <p>เปิดเว็บเบราว์เซอร์ไปที่พิกัด <code>http://[IP-Server]:1880</code> นักศึกษาจะพบกับหน้าต่าง Flow Editor ระดับมืออาชีพ ให้นักศึกษาทำแล็บจำลองการประมวลผลข้อมูลตามขั้นตอนดังนี้:</p>

                    <div class="analogy-box" style="background: #fdfaeb; border-left: 4px solid #b45309; margin-top: 15px;">
                        <strong>🛠️ ใบงานทดสอบการเขียนลอจิกไอโอที (Flow Design Steps):</strong>
                        <ol style="margin-top: 5px; padding-left: 20px; font-size: 0.9rem; line-height: 1.6;">
                            <li><strong>ลาก Node ประเภท "Inject" (ตัวป้อนข้อมูลต้นทาง):</strong> วางลงบนพาเนล ดับเบิ้ลคลิกปรับแต่งประเภท Payload ให้ส่งค่าเป็นตัวเลข (Number) เช่น ค่าจำลองอุณหภูมิห้อง <code>35</code></li>
                            <li><strong>ลาก Node ประเภท "Function" (ตัวคำนวณสิทธิ์ตรรกะ):</strong> นำมาวางเชื่อมต่อสายสัญญาณ จากนั้นเขียนโค้ดภาษา JavaScript สั้นๆ เพื่อตัดเกรดแจ้งเตือนความร้อน:
                                <pre style="background: #fff; padding: 5px; border: 1px solid #e2e8f0; margin-top: 5px; font-family: monospace;">if (msg.payload > 30) {
    msg.payload = "คำเตือน: อุณหภูมิห้องร้อนเกินกำหนด!";
}
return msg;</pre>
                            </li>
                            <li><strong>ลาก Node ประเภท "Debug" (กล่องอ่านสัญญาณประวัติ):</strong> มาวางเชื่อมต่อท้ายสุดเพื่อพิมพ์ผลลัพธ์ออกที่แท็บด้านข้าง</li>
                            <li><strong>กดปุ่มสีฟ้า "Deploy" (ติดตั้งใช้งาน):</strong> ที่มุมขวาบนของหน้าเว็บเพื่อเริ่มรันสคริปต์ระบบ จากนั้นกดปุ่มสี่เหลี่ยมหน้า Node Inject เพื่อดูข้อความตอบกลับความปลอดภัยแจ้งเตือนที่เกิดขึ้นจริง</li>
                        </ol>
                    </div>
                </section>
            </div>

            <aside>
                <div class="sidebar-card">
                    <h4>📋 ข้อมูลประจำหน่วย</h4>
                    <p style="font-size: 0.9rem; color: #475569;">
                        <strong>สัปดาห์ที่:</strong> 13<br>
                        <strong>เวลาเรียน:</strong> 5 ชั่วโมง (ทฤษฎี 1, ปฏิบัติ 4)<br>
                        <strong>เกณฑ์การประเมิน:</strong> ผลสัมฤทธิ์การใช้คำสั่งพื้นฐานตรวจสอบคอนเทนเนอร์ (3 คะแนน) ความถูกต้องของการผูกเขียนโครงสร้างสคริปต์ Docker Compose (4 คะแนน) ใบงานการต่อสายลอจิก IoT บอร์ดและแดชบอร์ดบน Node-RED สำเร็จ (3 คะแนน)
                    </p>
                </div>

                <div class="sidebar-card" style="border-left: 4px solid #10b981;">
                    <h4>💡 ข้อดีทางวิศวกรรม: ความปลอดภัยของการจองโวลุ่ม (Data Volumes)</h4>
                    <p style="font-size: 0.85rem; color: #64748b; line-height: 1.5;">
                        ความเข้าใจผิดยอดฮิตของนักศึกษาคือคิดว่าหากตู้คอนเทนเนอร์หยุดทำงานหรือโดนสั่งลบ ข้อมูลภายในจะยังอยู่ ความจริงคือคอนเทนเนอร์เป็นแบบ <strong>Stateless</strong> ข้อมูลจะพังพินาศหายไปทันทีหากตู้โดนลบ! วิศวกรระบบจึงต้องใช้ฟีเจอร์ <strong>Volume Mounting (`-v`)</strong> เพื่อทำสะพานเชื่อมโยงข้อมูลภายในตู้ ออกมาเซฟเก็บไว้บนดิสก์จริงของเครื่องเครื่องแม่ข่าย (Host) อย่างปลอดภัยถาวรครับ
                    </p>
                </div>
            </aside>
        </main>
    </div>

    <script src="../assets/js/script.js"></script>
</body>

</html>