<?php
$base_dir = "../"; // ถอยกลับ 1 ชั้นไปที่ Root เพื่อให้เรียกคอมโพเนนต์ได้ถูกต้อง
$active_nav = "devops"; // ไฮไลต์เมนูที่วิชา DevOps
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน่วยที่ 9: Container Technology (เทคโนโลยีคอนเทนเนอร์)</title>
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
                <span class="course-code" style="background: #7c3aed; color: #fff; padding: 4px 12px; border-radius: 4px; font-weight: 600; font-size: 0.9rem;">หน่วยที่ 9 (สัปดาห์ที่ 9)</span>
                <h2 style="margin: 10px 0 5px 0; font-size: 1.8rem; font-weight: 700;">Container Technology</h2>
                <p style="color: #e2e8f0; margin: 0; font-size: 0.95rem;">ทลายขีดจำกัด "Works on my machine" ด้วยการจำลองสภาพแวดล้อมที่เบาและเร็วกว่า เรียนรู้สถาปัตยกรรม Docker และการแพ็กเกจแอปพลิเคชัน</p>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 30px;">
        <main>
            <div class="content-area">

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 30px;">
                    <h3 class="section-title" style="color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">📘 ภาคทฤษฎี: จุดจบของ VM สู่ยุคของ Container</h3>

                    <p>เวลาที่เราเขียนโปรแกรมเสร็จแล้วต้องการนำไปรันบนเซิร์ฟเวอร์ ปัญหาคลาสสิกที่เจอกันมาตลอดคือ <em>"โค้ดรันในเครื่องฉันได้ปกติ แต่พอเอาไปลงเซิร์ฟเวอร์ทำไมมันพัง?"</em> ซึ่งมักเกิดจากเวอร์ชันของภาษา (เช่น Node.js, PHP) หรือระบบปฏิบัติการไม่ตรงกัน</p>



                    <h4 style="margin-top: 20px;">เปรียบเทียบ Virtual Machine (VM) กับ Container</h4>
                    <table class="grading-table" style="margin: 15px 0; background: #f8fafc; width: 100%; border-collapse: collapse; font-size: 0.95rem;">
                        <thead>
                            <tr style="background: #e2e8f0;">
                                <th style="padding: 10px; width: 20%; text-align: center;">คุณสมบัติ</th>
                                <th style="padding: 10px; width: 40%; text-align: center; color: #ef4444;">Virtual Machine (VM)</th>
                                <th style="padding: 10px; width: 40%; text-align: center; color: #10b981;">Container (เช่น Docker)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="border-bottom: 1px solid #cbd5e1;">
                                <td style="text-align: center; font-weight: 600; color: #1e293b;">สถาปัตยกรรม</td>
                                <td>จำลองฮาร์ดแวร์ และต้องลงระบบปฏิบัติการ (Guest OS) ทับลงไปใหม่ทุกๆ VM</td>
                                <td>แชร์ระบบปฏิบัติการ (OS Kernel) ร่วมกันกับเครื่องหลัก (Host)</td>
                            </tr>
                            <tr style="border-bottom: 1px solid #cbd5e1;">
                                <td style="text-align: center; font-weight: 600; color: #1e293b;">ขนาด / น้ำหนัก</td>
                                <td>ใหญ่มาก (ระดับ Gigabytes) เพราะต้องแบก OS ทั้งตัว</td>
                                <td>เบามาก (ระดับ Megabytes) เพราะมีแค่ โค้ด + Dependencies</td>
                            </tr>
                            <tr>
                                <td style="text-align: center; font-weight: 600; color: #1e293b;">เวลาเริ่มทำงาน (Boot)</td>
                                <td>ใช้เวลาเป็นนาที (เหมือนเปิดคอมพิวเตอร์ใหม่)</td>
                                <td>ใช้เวลาเป็นวินาที (เร็วพอๆ กับการเปิดโปรแกรมทั่วไป)</td>
                            </tr>
                        </tbody>
                    </table>
                </section>

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 30px;">
                    <h3 class="section-title" style="color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">🏗️ ภาคทฤษฎี: สถาปัตยกรรมของ Docker</h3>



                    <p>ระบบการทำงานของ Docker แบ่งออกเป็น 3 องค์ประกอบหลักที่ทำงานร่วมกัน ได้แก่:</p>
                    <ul style="padding-left: 20px; line-height: 1.6; margin-bottom: 20px;">
                        <li><strong>1. Docker Client:</strong> ตัวรับคำสั่ง (CLI) เช่น เวลาเราพิมพ์ <code>docker run</code> ใน Terminal</li>
                        <li><strong>2. Docker Host (Daemon):</strong> สมองกลที่อยู่เบื้องหลัง ทำหน้าที่สร้าง จัดการ และรันคอนเทนเนอร์</li>
                        <li><strong>3. Docker Registry (Docker Hub):</strong> คลังเก็บ <strong>"Image (อิมเมจ)"</strong> คล้ายๆ GitHub แต่ใช้สำหรับเก็บคอนเทนเนอร์สำเร็จรูปที่คนอื่นทำไว้ให้แล้ว (เช่น อิมเมจของ Ubuntu, Nginx, MySQL)</li>
                    </ul>

                    <div class="analogy-box" style="background: #eff6ff; border-left: 4px solid #3b82f6; padding: 15px; margin-bottom: 20px;">
                        <strong>💡 คำศัพท์ที่ห้ามสับสน: Image vs Container</strong><br>
                        <span style="font-size: 0.95rem; color: #475569;"><strong>Image</strong> คือ "แม่พิมพ์" (อ่านได้อย่างเดียว แก้ไขไม่ได้) ส่วน <strong>Container</strong> คือ "วัตถุ" ที่ถูกปั๊มออกมาจากแม่พิมพ์นั้น (มีชีวิต รันได้ สั่งหยุดได้) อิมเมจ 1 ตัว สามารถสร้างคอนเทนเนอร์ได้เป็นร้อยๆ ตัว</span>
                    </div>
                </section>

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 30px;">
                    <h3 class="section-title" style="color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">💻 ภาคปฏิบัติ: ควบคุม Docker ด้วย Command Line</h3>

                    <p>ให้นักศึกษาเปิดโปรแกรม Docker Desktop ในเครื่องทิ้งไว้ จากนั้นเปิด Terminal เพื่อทดลองรันเว็บเซิร์ฟเวอร์ Nginx สำเร็จรูป:</p>

                    <div class="code-window" style="background: #0f172a; color: #f8fafc; padding: 20px; border-radius: 8px; font-family: monospace; font-size: 0.95rem; margin-top: 10px; overflow-x: auto; line-height: 1.6;">
                        <span style="color: #60a5fa;"># 1. ดาวน์โหลดและรัน Nginx (พอร์ตเครื่อง 8080 ชี้ไปที่พอร์ตคอนเทนเนอร์ 80)</span><br>
                        <span style="color: #a7f3d0;">docker run -d --name my-web -p 8080:80 nginx</span><br>
                        <span style="color: #94a3b8;"># (-d คือรันเป็น Background, --name คือตั้งชื่อ)</span><br><br>

                        <span style="color: #60a5fa;"># 2. ตรวจสอบดูว่าตอนนี้มี Container อะไรทำงานอยู่บ้าง</span><br>
                        <span style="color: #a7f3d0;">docker ps</span><br><br>

                        <span style="color: #60a5fa;"># 3. ดูข้อความ Log ภายใน (ใช้ตรวจสอบเวลาระบบพัง)</span><br>
                        <span style="color: #a7f3d0;">docker logs my-web</span><br><br>

                        <span style="color: #60a5fa;"># 4. หยุดการทำงาน และลบคอนเทนเนอร์ทิ้ง</span><br>
                        <span style="color: #a7f3d0;">docker stop my-web</span><br>
                        <span style="color: #a7f3d0;">docker rm my-web</span>
                    </div>
                    <p style="margin-top: 10px; font-size: 0.9rem; color: #475569;"><em>* หลังจากรันคำสั่งแรกเสร็จ ลองเปิดเบราว์เซอร์แล้วเข้าไปที่ <code>http://localhost:8080</code> จะพบหน้า Welcome to nginx! ทันทีโดยที่เราไม่ต้องกดติดตั้งโปรแกรมเซิร์ฟเวอร์เลย</em></p>
                </section>

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0;">
                    <h3 class="section-title" style="color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">📦 ใบงานปฏิบัติการ: ประดิษฐ์ Dockerfile</h3>

                    <p>การเอาโปรแกรมคนอื่นมารันนั้นง่าย แต่ DevOps ที่แท้จริงต้อง "แพ็กเกจ (Package)" โค้ดของทีมตัวเองให้กลายเป็น Image ได้ โดยการเขียน <strong>Dockerfile</strong> (เปรียบเสมือนสูตรทำอาหารให้ Docker ทำตามทีละบรรทัด)</p>

                    <h4 style="margin-top: 15px;">โจทย์ภารกิจกลุ่ม: สร้าง Application Container</h4>
                    <ol style="padding-left: 20px; line-height: 1.7; margin-bottom: 15px;">
                        <li>สร้างโฟลเดอร์ใหม่ นำโค้ด Node.js จากโปรเจกต์สัปดาห์ที่แล้วมาวาง</li>
                        <li>สร้างไฟล์ใหม่ชื่อ <strong><code>Dockerfile</code></strong> (พิมพ์ตัว D พิมพ์ใหญ่ และไม่มีนามสกุลไฟล์ใดๆ)</li>
                        <li>เขียนสูตรตามตัวอย่างด้านล่างนี้ (ประยุกต์ใช้กับโปรเจกต์ Node.js):</li>
                    </ol>

                    <div class="code-window" style="background: #1e1e1e; color: #d4d4d4; padding: 15px; border-radius: 8px; font-family: monospace; font-size: 0.95rem; margin-bottom: 20px;">
                        <span style="color: #569cd6;">FROM</span> node:18-alpine <span style="color: #6a9955;"># เลือก Base Image ที่มี Node.js ติดตั้งไว้แล้ว (รุ่น alpine มีขนาดเล็กสุด)</span><br><br>

                        <span style="color: #569cd6;">WORKDIR</span> /usr/src/app <span style="color: #6a9955;"># สร้างและย้ายเข้าไปที่โฟลเดอร์ทำงานภายในคอนเทนเนอร์</span><br><br>

                        <span style="color: #569cd6;">COPY</span> package*.json ./ <span style="color: #6a9955;"># ก๊อปปี้ไฟล์รายชื่อไลบรารีเข้าไปก่อน</span><br>
                        <span style="color: #569cd6;">RUN</span> npm install <span style="color: #6a9955;"># สั่งติดตั้งไลบรารี</span><br><br>

                        <span style="color: #569cd6;">COPY</span> . . <span style="color: #6a9955;"># ก๊อปปี้ซอร์สโค้ดที่เหลือทั้งหมดในเครื่องเรา เข้าไปในคอนเทนเนอร์</span><br><br>

                        <span style="color: #569cd6;">EXPOSE</span> 3000 <span style="color: #6a9955;"># เจาะรูพอร์ต 3000 ให้ภายนอกเชื่อมต่อเข้ามาได้</span><br><br>

                        <span style="color: #569cd6;">CMD</span> [<span style="color: #ce9178;">"npm"</span>, <span style="color: #ce9178;">"start"</span>] <span style="color: #6a9955;"># คำสั่งสุดท้ายที่จะให้คอนเทนเนอร์ทำงานเมื่อถูก Start</span>
                    </div>

                    <h4 style="margin-top: 15px;">คำสั่งสร้าง Image และส่งงาน:</h4>
                    <p>เปิด Terminal ที่โฟลเดอร์โปรเจกต์นั้น แล้วรันคำสั่ง:</p>
                    <ul style="padding-left: 20px; line-height: 1.7; margin-bottom: 0;">
                        <li><code>docker build -t [ชื่อกลุ่ม]-app:v1 .</code> (อย่าลืมจุด <code>.</code> ข้างหลัง แปลว่าโฟลเดอร์ปัจจุบัน)</li>
                        <li>เมื่อ Build เสร็จ ให้ลองรันด้วยคำสั่ง <code>docker run -p 3000:3000 [ชื่อกลุ่ม]-app:v1</code></li>
                        <li><strong>แคปภาพหน้าจอ:</strong> หน้า Terminal ตอนคำสั่ง Build ทำงานสำเร็จ และภาพหน้าเว็บ/Postman ที่ทดสอบเข้าใช้งานผ่านพอร์ตที่กำหนด ส่งเข้าระบบ</li>
                    </ul>
                </section>
            </div>

            <aside>
                <div class="sidebar-card" style="background: #fff; padding: 20px; border-radius: 8px; border: 1px solid #e2e8f0; margin-bottom: 20px;">
                    <h4 style="margin-top: 0; margin-bottom: 12px; font-size: 1.1rem; font-weight: 700; color: #1e293b;">📋 ข้อมูลประจำหน่วย</h4>
                    <p style="font-size: 0.9rem; color: #475569; line-height: 1.6; margin: 0;">
                        <strong>สัปดาห์ที่:</strong> 9<br>
                        <strong>เวลาเรียน:</strong> 5 ชั่วโมง (ทฤษฎี 1, ปฏิบัติ 4)<br>
                        <strong>เกณฑ์การประเมิน:</strong> <br>
                        - ความถูกต้องของคำสั่งในการเขียน `Dockerfile` (3 คะแนน)<br>
                        - ภาพหลักฐานการ Build Image สำเร็จ (3 คะแนน)<br>
                        - ภาพหลักฐานการสั่งรัน Container และเข้าใช้งานระบบได้จริง (4 คะแนน)
                    </p>
                </div>

                <div class="sidebar-card" style="background: #fff; padding: 20px; border-radius: 8px; border: 1px solid #e2e8f0; border-left: 4px solid #10b981;">
                    <h4 style="margin-top: 0; margin-bottom: 12px; font-size: 1.1rem; font-weight: 700; color: #059669;">🛡️ เคล็ดลับลดน้ำหนัก Image</h4>
                    <p style="font-size: 0.85rem; color: #64748b; line-height: 1.5; margin: 0;">
                        เพื่อป้องกันไม่ให้ขนาดของ Image ใหญ่จนเกินไป (และประหยัดค่า Cloud) เราควรสร้างไฟล์ <strong><code>.dockerignore</code></strong> วางไว้คู่กับ Dockerfile เสมอ<br><br>
                        และใส่คำว่า <code>node_modules</code> ลงไป เพื่อห้ามไม่ให้ Docker ทำการ COPY โฟลเดอร์ที่หนักและไม่จำเป็นจากเครื่องเรา เข้าไปใน Container (เพราะเราสั่ง <code>RUN npm install</code> ข้างในนั้นไปแล้วนั่นเองครับ)
                    </p>
                </div>
            </aside>
        </main>
    </div>

    <script src="../assets/js/script.js"></script>
</body>

</html>