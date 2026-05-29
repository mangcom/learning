<?php
$base_dir = "../"; // ถอยกลับ 1 ชั้นไปที่ Root เพื่อให้เรียกคอมโพเนนต์ได้ถูกต้อง
$active_nav = "devops"; // ไฮไลต์เมนูที่วิชา DevOps
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน่วยที่ 3: Linux และ DevOps Environment</title>
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
                <span class="course-code" style="background: #7c3aed; color: #fff; padding: 4px 12px; border-radius: 4px; font-weight: 600; font-size: 0.9rem;">หน่วยที่ 3 (สัปดาห์ที่ 3)</span>
                <h2 style="margin: 10px 0 5px 0; font-size: 1.8rem; font-weight: 700;">Linux และ DevOps Environment</h2>
                <p style="color: #e2e8f0; margin: 0; font-size: 0.95rem;">ทำความเข้าใจสถาปัตยกรรมลินุกซ์ โครงสร้างไฟล์ และการปรับแต่งสภาพแวดล้อม (Environment) เพื่อรองรับการทำงานของเครื่องมือ DevOps อย่างมืออาชีพ</p>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 30px;">
        <main>
            <div class="content-area">

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 30px;">
                    <h3 class="section-title" style="color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">📘 ภาคทฤษฎี: สถาปัตยกรรมระบบ และโครงสร้างสภาพแวดล้อม</h3>

                    <h4>1. สถาปัตยกรรมลินุกซ์ (Linux Architecture)</h4>
                    <p>ระบบปฏิบัติการลินุกซ์เป็นรากฐานของเซิร์ฟเวอร์บนระบบคลาวด์และตู้คอนเทนเนอร์ (Docker) ทั่วโลก การเข้าใจโครงสร้างจะทำให้เราสามารถแก้ไขปัญหาและกำหนดค่าสภาพแวดล้อม DevOps ได้อย่างถูกต้อง โดยสถาปัตยกรรมแบ่งออกเป็น 4 ชั้นหลัก:</p>



                    <ul style="padding-left: 20px; margin-bottom: 20px; line-height: 1.6;">
                        <li><strong>Hardware:</strong> อุปกรณ์กายภาพ เช่น CPU, RAM, Disk, Network Interface</li>
                        <li><strong>Kernel:</strong> แกนกลางของระบบปฏิบัติการ ทำหน้าที่พูดคุยและจัดสรรทรัพยากรฮาร์ดแวร์โดยตรง</li>
                        <li><strong>Shell:</strong> หน้าต่างเชื่อมต่อระหว่างผู้ใช้และเคอร์เนล ทำหน้าที่รับคำสั่ง (Commands) ที่เราพิมพ์ไปแปลให้เคอร์เนลทำงาน (เช่น Bash, Zsh)</li>
                        <li><strong>Applications / Utilities:</strong> โปรแกรมและเครื่องมือต่างๆ ที่ทำงานอยู่ชั้นบนสุด เช่น Git, Docker, Apache</li>
                    </ul>

                    <h4 style="margin-top: 25px;">2. โครงสร้างระบบไฟล์ (Linux File System Hierarchy)</h4>
                    <p>แตกต่างจาก Windows ที่แบ่งเป็นไดรฟ์ (C:, D:) ลินุกซ์จะเริ่มต้นทุกอย่างจากจุดสูงสุดที่เรียกว่า <strong>Root Directory ( / )</strong> โดยมีโฟลเดอร์สำคัญที่ชาว DevOps ต้องรู้ ได้แก่:</p>
                    <table class="grading-table" style="margin: 15px 0; background: #f8fafc; width: 100%; border-collapse: collapse; font-size: 0.95rem;">
                        <thead>
                            <tr style="background: #e2e8f0;">
                                <th style="padding: 10px; width: 25%; text-align: center;">เส้นทาง (Path)</th>
                                <th style="padding: 10px;">หน้าที่หลักและการใช้งานในระบบ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="border-bottom: 1px solid #cbd5e1;">
                                <td style="text-align: center; font-weight: 600; color: #3b82f6;"><code>/etc</code></td>
                                <td>เก็บไฟล์การตั้งค่า (Configuration files) ของระบบและซอฟต์แวร์แทบทั้งหมด</td>
                            </tr>
                            <tr style="border-bottom: 1px solid #cbd5e1;">
                                <td style="text-align: center; font-weight: 600; color: #3b82f6;"><code>/var</code></td>
                                <td>เก็บไฟล์ที่มีการเปลี่ยนแปลงบ่อย เช่น ไฟล์ Log (<code>/var/log</code>) หรือฐานข้อมูล</td>
                            </tr>
                            <tr style="border-bottom: 1px solid #cbd5e1;">
                                <td style="text-align: center; font-weight: 600; color: #3b82f6;"><code>/home</code></td>
                                <td>โฟลเดอร์ส่วนตัวของผู้ใช้งานแต่ละคน (เทียบได้กับ Users ใน Windows)</td>
                            </tr>
                            <tr>
                                <td style="text-align: center; font-weight: 600; color: #3b82f6;"><code>/bin</code> และ <code>/sbin</code></td>
                                <td>แหล่งเก็บไฟล์รันโปรแกรม (Executable binaries) หรือคำสั่งพื้นฐานที่เราพิมพ์ใช้งาน</td>
                            </tr>
                        </tbody>
                    </table>

                    <h4 style="margin-top: 25px;">3. โปรโตคอล SSH (Secure Shell)</h4>
                    <p><strong>SSH (Port 22)</strong> คือเครื่องมือหลักในการรีโมทเข้าควบคุมเซิร์ฟเวอร์ระยะไกลผ่านข้อความ (CLI) ด้วยการเข้ารหัสลับ (Encryption) ในสาย DevOps เรามักใช้การยืนยันตัวตนด้วย <strong>SSH Keys (Public/Private Key)</strong> แทนการพิมพ์รหัสผ่าน เพื่อความปลอดภัยสูงสุดและรองรับการทำ CI/CD อัตโนมัติ</p>

                    <h4 style="margin-top: 25px;">4. ตัวแปรสภาพแวดล้อม (Environment Variables)</h4>
                    <p>ตัวแปรที่ถูกตั้งค่าไว้ในระดับระบบปฏิบัติการ ซึ่งซอฟต์แวร์ต่างๆ (เช่น Node.js, Python, Docker) สามารถดึงไปใช้งานได้ทันที ช่วยลดการเขียนรหัสผ่านหรือพาธแบบ Hard-code ตัวแปรที่พบบ่อยเช่น:</p>
                    <ul style="padding-left: 20px;">
                        <li><code>$PATH</code>: ระบุโฟลเดอร์ที่ OS ต้องไปค้นหาคำสั่งเมื่อเราพิมพ์ชื่อโปรแกรม</li>
                        <li><code>$HOME</code>: ระบุพาธบ้านของ User ปัจจุบัน</li>
                        <li><code>$DB_PASSWORD</code>: การส่งรหัสผ่านให้แอปพลิเคชันอ่านตอนรันระบบ โดยไม่ต้องฝังใน Source Code</li>
                    </ul>
                </section>

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 30px;">
                    <h3 class="section-title" style="color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">💻 ภาคปฏิบัติ: ติดตั้งและควบคุมสภาพแวดล้อมด้วย CLI</h3>

                    <h4 style="margin-top: 15px;">ขั้นตอนที่ 1: การเตรียม DevOps Environment</h4>
                    <p>ให้นักศึกษาทำการติดตั้งระบบปฏิบัติการ <strong>Ubuntu Server</strong> (ผ่าน VirtualBox, VMware หรือ Cloud VPS) เพื่อใช้เป็นเครื่องแม่ข่ายในการทำโปรเจกต์ DevOps ตลอดทั้งภาคเรียน</p>

                    <h4 style="margin-top: 25px;">ขั้นตอนที่ 2: ทบทวนคำสั่งควบคุมระบบขั้นพื้นฐาน (Essential CLI)</h4>
                    <p>ในการทำงานสาย DevOps การใช้เมาส์แทบจะไม่มีความจำเป็น นักศึกษาต้องคุ้นชินกับการสั่งงานผ่านหน้าต่างดำ (Terminal) ด้วย 10 คำสั่งทรงพลังต่อไปนี้:</p>

                    <div class="code-window" style="background: #0f172a; color: #f8fafc; padding: 20px; border-radius: 8px; font-family: monospace; font-size: 0.95rem; margin-top: 10px; overflow-x: auto;">
                        <span style="color: #60a5fa;"># 1. การนำทาง (Navigation)</span><br>
                        <span style="color: #a7f3d0;">pwd</span> <span style="color: #94a3b8;">// Print Working Directory: บอกว่าตอนนี้เราอยู่โฟลเดอร์ไหน</span><br>
                        <span style="color: #a7f3d0;">ls -la</span> <span style="color: #94a3b8;">// List: แสดงรายชื่อไฟล์และโฟลเดอร์ทั้งหมด (รวมไฟล์ซ่อน)</span><br>
                        <span style="color: #a7f3d0;">cd</span> <span style="color: #94a3b8;">// Change Directory: ย้ายเข้าไปในโฟลเดอร์ เช่น `cd /var/www`</span><br><br>

                        <span style="color: #60a5fa;"># 2. การจัดการไฟล์และโฟลเดอร์ (File Operations)</span><br>
                        <span style="color: #a7f3d0;">mkdir</span> <span style="color: #94a3b8;">// Make Directory: สร้างโฟลเดอร์ใหม่ เช่น `mkdir my_project`</span><br>
                        <span style="color: #a7f3d0;">cp</span> <span style="color: #94a3b8;">// Copy: คัดลอกไฟล์ เช่น `cp file1.txt backup.txt`</span><br>
                        <span style="color: #a7f3d0;">mv</span> <span style="color: #94a3b8;">// Move/Rename: ย้ายหรือเปลี่ยนชื่อไฟล์ เช่น `mv old.txt new.txt`</span><br>
                        <span style="color: #a7f3d0;">rm</span> <span style="color: #94a3b8;">// Remove: ลบไฟล์หรือโฟลเดอร์ (ลบโฟลเดอร์ใช้ `rm -r`)</span><br><br>

                        <span style="color: #60a5fa;"># 3. การจัดการข้อความและสิทธิ์ (Editing & Permissions)</span><br>
                        <span style="color: #a7f3d0;">cat</span> <span style="color: #94a3b8;">// Concatenate: ปริ้นท์เนื้อหาในไฟล์ออกมาดูบนจอ เช่น `cat /etc/os-release`</span><br>
                        <span style="color: #a7f3d0;">nano</span> <span style="color: #94a3b8;">// Text Editor: เปิดโปรแกรมแก้ไขข้อความใน Terminal</span><br>
                        <span style="color: #a7f3d0;">chmod</span> <span style="color: #94a3b8;">// Change Mode: เปลี่ยนสิทธิ์ไฟล์ เช่น `chmod +x script.sh` ให้รันได้</span>
                    </div>
                </section>

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0;">
                    <h3 class="section-title" style="color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">📝 ใบงานมอบหมาย: Linux Command Worksheet</h3>

                    <p>เพื่อตรวจสอบความเข้าใจ ให้นักศึกษาจัดทำเอกสาร <strong>Linux Command Worksheet</strong> ส่งเข้าระบบ โดยต้องมีเนื้อหาดังนี้:</p>

                    <div class="step-box" style="margin-top: 15px; background: #fdfdfd; padding: 20px; border-radius: 8px; border: 1px solid #e2e8f0;">
                        <ul style="list-style-type: none; padding: 0; margin: 0; line-height: 1.7;">
                            <li style="padding-bottom: 10px; border-bottom: 1px dashed #e2e8f0;">
                                <strong>1. การทดสอบการตั้งค่า Environment:</strong> เขียนอธิบายขั้นตอนการประกาศ Environment Variable ชื่อ <code>$PROJECT_NAME</code> ให้มีค่าเท่ากับชื่อโปรเจกต์ของกลุ่มตนเอง และพิมพ์คำสั่งเรียกดูตัวแปรนั้นให้สำเร็จ (เช่น ใช้คำสั่ง <code>export</code> และ <code>echo</code>) พร้อมแคปเจอร์ภาพหน้าจอ
                            </li>
                            <li style="padding: 10px 0; border-bottom: 1px dashed #e2e8f0;">
                                <strong>2. การเขียนสคริปต์พื้นฐาน:</strong> ใช้คำสั่ง <code>nano</code> สร้างไฟล์สคริปต์ชื่อ <code>setup_env.sh</code> ที่ภายในมีการสั่งสร้างโฟลเดอร์ 3 โฟลเดอร์รวด ได้แก่ <code>src</code>, <code>tests</code>, และ <code>config</code>
                            </li>
                            <li style="padding-top: 10px;">
                                <strong>3. การจัดการสิทธิ์:</strong> แคปหน้าจอการใช้คำสั่ง <code>chmod</code> เพื่อมอบสิทธิ์ Execute ให้กับไฟล์สคริปต์ที่สร้างในข้อ 2 และสั่งรันให้ดูผลลัพธ์ว่าโฟลเดอร์ถูกสร้างขึ้นจริง
                            </li>
                        </ul>
                    </div>
                </section>
            </div>

            <aside>
                <div class="sidebar-card" style="background: #fff; padding: 20px; border-radius: 8px; border: 1px solid #e2e8f0; margin-bottom: 20px;">
                    <h4 style="margin-top: 0; margin-bottom: 12px; font-size: 1.1rem; font-weight: 700; color: #1e293b;">📋 ข้อมูลประจำหน่วย</h4>
                    <p style="font-size: 0.9rem; color: #475569; line-height: 1.6; margin: 0;">
                        <strong>สัปดาห์ที่:</strong> 3<br>
                        <strong>เวลาเรียน:</strong> 5 ชั่วโมง (ทฤษฎี 1, ปฏิบัติ 4)<br>
                        <strong>เกณฑ์การประเมิน:</strong> <br>
                        - ติดตั้ง Ubuntu Server (Environment) และเชื่อมต่อผ่าน SSH ได้สำเร็จ (4 คะแนน)<br>
                        - ความถูกต้องครบถ้วนของใบงาน Linux Command Worksheet (6 คะแนน)
                    </p>
                </div>

                <div class="sidebar-card" style="background: #fff; padding: 20px; border-radius: 8px; border: 1px solid #e2e8f0; border-left: 4px solid #ef4444;">
                    <h4 style="margin-top: 0; margin-bottom: 12px; font-size: 1.1rem; font-weight: 700; color: #ef4444;">🚨 คำเตือน: หายนะแห่ง CLI</h4>
                    <p style="font-size: 0.85rem; color: #64748b; line-height: 1.5; margin: 0;">
                        คำสั่งในลินุกซ์ <strong>"ไม่มี Undo"</strong> หรือถังขยะแบบ Windows หากคุณเผลอพิมพ์คำสั่งลบโฟลเดอร์แบบบังคับ เช่น <code>rm -rf /</code> (การลบโครงสร้างรากทั้งหมด) เซิร์ฟเวอร์ของคุณจะพังทลายลงในพริบตา<br><br>
                        ดังนั้น ก่อนกด <em>Enter</em> ทุกครั้งที่ใช้คำสั่ง <code>rm</code> ให้ตรวจสอบพาธ (Path) ปลายทางให้ถี่ถ้วนเสมอ!
                    </p>
                </div>
            </aside>
        </main>
    </div>

    <script src="../assets/js/script.js"></script>
</body>

</html>