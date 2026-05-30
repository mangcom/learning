<?php
$base_dir = "../"; // ถอยกลับ 1 ชั้นไปที่ Root เพื่อให้เรียกคอมโพเนนต์ได้ถูกต้อง
$active_nav = "devops"; // ไฮไลต์เมนูที่วิชา DevOps
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน่วยที่ 12: Infrastructure & DevSecOps</title>
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

        .code-comment {
            color: #6a9955;
            font-style: italic;
        }

        .yaml-key {
            color: #c792ea;
        }

        .yaml-val {
            color: #a7f3d0;
        }

        .yaml-dash {
            color: #89ddff;
        }

        .owasp-item {
            background: #fff5f5;
            border-left: 4px solid #f87171;
            padding: 12px;
            margin-bottom: 10px;
            border-radius: 0 6px 6px 0;
        }
    </style>
</head>

<body style="background-color: #f8fafc;">

    <?php include '../components/navbar.php'; ?>

    <div class="page-header" style="background: #0f172a; color: #fff; padding: 40px 0 65px 0; border-bottom: 4px solid #f43f5e;">
        <div class="container">
            <a href="index.php" class="back-link" style="color: #fda4af; text-decoration: none; display: inline-block; margin-bottom: 15px;">
                <span class="arrow-icon">⬅</span> <span>กลับสู่หน้าหลักวิชา DevOps</span>
            </a>
            <div>
                <span class="course-code" style="background: #f43f5e; color: #fff; padding: 4px 12px; border-radius: 4px; font-weight: 600; font-size: 0.9rem;">หน่วยที่ 12 (สัปดาห์ที่ 12)</span>
                <h2 style="margin: 10px 0 5px 0; font-size: 1.8rem; font-weight: 700;">Infrastructure & DevSecOps</h2>
                <p style="color: #e2e8f0; margin: 0; font-size: 0.95rem;">ยกระดับท่อ CI/CD สู่ความปลอดภัยขั้นสูงสุดด้วยการสแกนช่องโหว่อัตโนมัติ (Trivy) และการจัดเก็บความลับของระบบอย่างถูกวิธี</p>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 30px;">
        <main>
            <div class="content-area">

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 30px;">
                    <h3 class="section-title" style="color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">📘 ภาคทฤษฎี: นิยามความปลอดภัยในโลก DevOps</h3>

                    <p>ในอดีต ฝ่ายความปลอดภัย (Security) มักจะเข้ามาตรวจสอบระบบในขั้นตอนสุดท้ายก่อนเอาขึ้นโปรดักชัน ซึ่งมักจะทำให้เกิดคอขวดและงานล่าช้า แนวคิด <strong>DevSecOps</strong> จึงเกิดขึ้นเพื่อนำมิติความปลอดภัยมาผสมผสานลงไปในทุกขั้นตอนของท่อ CI/CD ตั้งแต่วันแรกที่เริ่มเขียนโค้ด (Shift-Left Security)</p>



                    <h4 style="margin-top: 25px; color: #0f766e;">1. Infrastructure as Code (IaC)</h4>
                    <p>คือกระบวนการจัดการและสร้างโครงสร้างพื้นฐานคอมพิวเตอร์ (เช่น เซิร์ฟเวอร์, เครือข่าย, สตอเรจ) ด้วยการเขียน <strong>"ไฟล์โค้ดพิมพ์เขียว"</strong> แทนที่จะใช้วิธีคลิกตั้งค่าด้วยมือบนหน้าจอแผงควบคุม</p>
                    <p><strong>ประโยชน์ของการทำ IaC:</strong> สามารถระบุเวอร์ชันผ่าน Git ได้ (Version Control) ทำซ้ำได้ 100% ไร้ข้อผิดพลาด และการเขียนไฟล์ <code>docker-compose.yml</code> ที่นักศึกษาได้เรียนไปในสัปดาห์ก่อน ก็ถือเป็นรูปแบบหนึ่งของการทำ Infrastructure as Code ระดับแอปพลิเคชัน</p>

                    <h4 style="margin-top: 25px; color: #dc2626;">2. ความปลอดภัยตามมาตรฐาน OWASP Top 10</h4>
                    <p><strong>OWASP (Open Web Application Security Project)</strong> คือองค์กรไม่แสวงหากำไรระดับโลกที่คอยสรุปสถิติช่องโหว่ทางซอฟต์แวร์ที่อันตรายที่สุด 10 อันดับแรกที่เว็บไซต์มักจะโดนโจมตี ตัวอย่างที่พบบ่อย เช่น:</p>

                    <div class="owasp-item">
                        <strong>A01:2021-Broken Access Control:</strong> การควบคุมสิทธิ์เข้าถึงพัง เช่น การที่ User ทั่วไปสามารถแอบเปลี่ยน URL เพื่อเข้าไปดูหน้า Admin ได้
                    </div>
                    <div class="owasp-item">
                        <strong>A03:2021-Injection:</strong> การฉีดโค้ดอันตรายผ่านช่องกรอกข้อมูล เช่น SQL Injection เพื่อขโมยรหัสผ่าน หรือสั่งลบฐานข้อมูลทั้งหมด
                    </div>
                    <div class="owasp-item">
                        <strong>A05:2021-Security Misconfiguration:</strong> การตั้งค่าระบบไม่ปลอดภัย เช่น การเปิดโหมด Debug ค้างไว้บนหน้าเว็บจริง ทำให้แฮกเกอร์เห็นโครงสร้างโค้ดทั้งหมด หรือการลืมเปลี่ยนรหัสผ่านเริ่มต้น (Default Password) ของระบบฐานข้อมูล
                    </div>

                    <h4 style="margin-top: 25px; color: #b45309;">3. Secret Management (การจัดการความลับ)</h4>
                    <p>สิ่งที่เป็น "หลุมดำ" ที่สุดของนักพัฒนาซอฟต์แวร์คือการเผลอพิมพ์ API Key, รหัสผ่านฐานข้อมูล หรือ Token ต่าง ๆ ลงไปในเนื้อโค้ดตรง ๆ (Hardcoding) แล้วเผลอสั่ง Push ขึ้น GitHub สาธารณะ</p>
                    <p>หลักการของ DevOps กำหนดว่า <strong>"ห้ามบันทึกความลับลงในโค้ดเด็ดขาด"</strong> แต่ให้ดึงค่าความลับจากสภาพแวดล้อมระบบภายนอก (Environment Variables) ผ่านทางไฟล์คอนฟิกเฉพาะกลุ่ม หรือฝังตัวแปรผ่านแพลตฟอร์มผู้ให้บริการ (GitHub Secrets) เท่านั้น</p>
                </section>

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 30px;">
                    <h3 class="section-title" style="color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">💻 ภาคปฏิบัติ: ปิดช่องโหว่ความปลอดภัยด้วย .env และ Trivy</h3>

                    <p>ในปฏิบัติการสัปดาห์นี้ นักศึกษาจะได้ทำความสะอาดโค้ด แยกความลับออกจากระบบ และติดตั้งเครื่องมือตรวจสอบช่องโหว่อัตโนมัติลงในโปรเจกต์</p>

                    <h4 style="margin-top: 20px; color: #2563eb;">Step 1: การแยกค่าคอนฟิกด้วยไฟล์ `.env`</h4>
                    <p>1. ที่โฟลเดอร์โปรเจกต์บนเครื่องของคุณ ให้สร้างไฟล์ชื่อ <strong><code>.env</code></strong> เพื่อเก็บความลับ (ห้ามส่งไฟล์นี้ขึ้น GitHub):</p>
                    <div class="code-window" style="background: #0f172a; color: #f8fafc; padding: 12px; border-radius: 8px; font-family: monospace; font-size: 0.9rem;">
                        DB_HOST=localhost<br>
                        DB_USER=my_admin_user<br>
                        DB_PASSWORD=SuperSecretPass99!<br>
                        API_KEY=live_7cc7120a4b9c1d94e330a
                    </div>

                    <p style="margin-top: 15px;">2. สร้างไฟล์ <strong><code>.gitignore</code></strong> เพื่อสั่งบล็อกไม่ให้กิิตลากไฟล์ความลับนี้ขึ้นไปบนระบบคลังกลาง:</p>
                    <div class="code-window" style="background: #0f172a; color: #f8fafc; padding: 12px; border-radius: 8px; font-family: monospace; font-size: 0.9rem;">
                        .env<br>
                        node_modules/<br>
                        vendor/
                    </div>

                    <h4 style="margin-top: 25px; color: #db2777;">Step 2: รู้จักกับ Trivy Vulnerability Scanner</h4>
                    <p><strong>Trivy</strong> (โดย Aqua Security) คือเครื่องมือสแกนหาช่องโหว่ความปลอดภัย (Vulnerability) ที่มีประสิทธิภาพสูงและนิยมใช้ในสาย DevSecOps มันสามารถตรวจสอบได้ทั้งช่องโหว่ของแพ็กเกจ (Dependencies), ซอร์สโค้ด และโครงสร้างของ Docker Image</p>
                    <p>หากทดสอบสแกนซอร์สโค้ดในเครื่องคอมพิวเตอร์ผ่าน Terminal สามารถใช้คำสั่งนี้:</p>
                    <div class="code-window" style="background: #1e1e1e; color: #d4d4d4; padding: 12px; border-radius: 8px; font-family: monospace;">
                        trivy fs .
                    </div>

                    <h4 style="margin-top: 25px; color: #059669;">Step 3: ปลั๊กอินผูก Trivy Scanner เข้าสู่ท่อ GitHub Actions</h4>
                    <p>ให้นักศึกษานำขั้นตอนการสแกนความปลอดภัยไปใส่ไว้ในไฟล์ <code>.github/workflows/deploy.yml</code> เพื่อบังคับให้ระบบตรวจสอบช่องโหว่ <strong>ก่อน</strong> ที่จะเริ่มทำการ Build หรือส่งโค้ดไปติดตั้งจริงบนเซิร์ฟเวอร์:</p>

                    <div class="code-window" style="background: #0f172a; color: #f8fafc; padding: 15px; border-radius: 8px; font-family: monospace; font-size: 0.9rem; overflow-x: auto; line-height: 1.6;">
                        <span class="yaml-key">name:</span> DevSecOps Secure Pipeline<br><br>
                        <span class="yaml-key">on:</span><br>
                        &nbsp;&nbsp;<span class="yaml-key">push:</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-key">branches:</span> [ <span class="yaml-val">"main"</span> ]<br><br>
                        <span class="yaml-key">jobs:</span><br>
                        &nbsp;&nbsp;<span class="yaml-key">security-audit:</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-key">runs-on:</span> ubuntu-latest<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-key">steps:</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-dash">-</span> <span class="yaml-key">name:</span> Checkout code<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-key">uses:</span> actions/checkout@v3<br><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-dash">-</span> <span class="yaml-key">name:</span> 🛡️ Run Trivy Vulnerability Scanner<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-key">uses:</span> aquasecurity/trivy-action@master<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-key">with:</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-key">scan-type:</span> <span class="yaml-val">'fs'</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-key">scan-ref:</span> <span class="yaml-val">'.'</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-key">format:</span> <span class="yaml-val">'table'</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-key">exit-code:</span> <span class="yaml-val">'1'</span> <span class="code-comment"># หมายเหตุ: ถ้าเจอช่องโหว่ร้ายแรง ให้ท่อส่งงานแตกและหยุดทำงานทันที!</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-key">severity:</span> <span class="yaml-val">'CRITICAL,HIGH'</span>
                    </div>
                </section>

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0;">
                    <h3 class="section-title" style="color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">🎯 ใบงานปฏิบัติการ: เสริมเกราะเหล็กให้โปรเจกต์ของทีม</h3>

                    <div class="analogy-box" style="background: #fffbeb; border-left: 4px solid #d97706; padding: 15px; margin-bottom: 20px;">
                        <strong>🛡️ ภารกิจกลุ่ม: คลีนโค้ดและทดสอบแฮกท่อส่งงานตนเอง</strong><br>
                        <span style="font-size: 0.95rem; color: #475569;">ให้นักศึกษานำซอร์สโค้ดโปรเจกต์ของทีมที่ใช้ส่งงานในวิชาเรียน มาเข้าสู่กระบวนการตรวจล้างคราบสกปรก ค้นหาสิ่งแปลกปลอม และทดสอบว่าระบบความปลอดภัยอัตโนมัติจะสกัดกั้นโค้ดที่ไม่ปลอดภัยได้จริงหรือไม่</span>
                    </div>

                    <h4 style="margin-top: 15px;">ข้อกำหนดและลำดับกิจกรรม:</h4>
                    <ol style="padding-left: 20px; line-height: 1.7; margin-bottom: 0;">
                        <li>ให้ไล่ตรวจสอบไฟล์ซอร์สโค้ดแอปพลิเคชันทั้งหมดของทีม หากพบรหัสผ่าน ลิงก์เชื่อมต่อ หรือ API Key ให้ย้ายมาเก็บไว้ในไฟล์ <code>.env</code> พร้อมแนบไฟล์ <code>.gitignore</code> เพื่อบล็อกไม่ให้ความลับหลุด</li>
                        <li>นำโค้ดใน <strong>Step 3</strong> ไปเขียนเพิ่มไว้บนสุดของไฟล์ Workflow บนคลัง GitHub ของทีม</li>
                        <li>ลองทดสอบแกล้งติดตั้งแพ็กเกจเวอร์ชันเก่ามาก ๆ ที่มีบั๊ก (เช่นสั่ง <code>npm install lodash@4.17.15</code>) หรือเขียนรหัสผ่านฐานข้อมูลคาไว้ในโค้ด แล้วลอง <code>git push</code> ขึ้นระบบ</li>
                        <li>ดูผลลัพธ์ว่าระบบ Trivy Action ตรวจจับเจอช่องโหว่ความเสี่ยงสูง (High/Critical) และสั่งเบรกท่อส่งงานจนกลายเป็นสีแดง (Fail) ได้สำเร็จหรือไม่</li>
                        <li><strong>จัดทำรายงานสิ่งส่งมอบ:</strong> แนบไฟล์ภาพหน้าจอ Log ของกระบวนการรัน Trivy บน GitHub Actions ที่แสดงตารางรายชื่อช่องโหว่ที่ตรวจสอบเจอ พร้อมระบุแนวทางแก้ไขช่องโหว่นั้น ๆ มาอย่างน้อย 1 รายการ</li>
                    </ol>
                </section>
            </div>

            <aside>
                <div class="sidebar-card" style="background: #fff; padding: 20px; border-radius: 8px; border: 1px solid #e2e8f0; margin-bottom: 20px;">
                    <h4 style="margin-top: 0; margin-bottom: 12px; font-size: 1.1rem; font-weight: 700; color: #1e293b;">📋 ข้อมูลประจำหน่วย</h4>
                    <p style="font-size: 0.9rem; color: #475569; line-height: 1.6; margin: 0;">
                        <strong>สัปดาห์ที่:</strong> 12<br>
                        <strong>เวลาเรียน:</strong> 5 ชั่วโมง (ทฤษฎี 1, ปฏิบัติ 4)<br>
                        <strong>เกณฑ์การประเมิน:</strong> <br>
                        - การคัดแยกข้อมูลความลับออกจากโค้ดและตั้งค่า .gitignore สมบูรณ์ (3 คะแนน)<br>
                        - การตั้งค่าเชื่อมโยง GitHub Secrets เพื่อส่งต่อแปรอย่างปลอดภัย (3 คะแนน)<br>
                        - การปลั๊กอิน Trivy สแกนและรายงานผลบนระบบอัตโนมัติถูกต้อง (4 คะแนน)
                    </p>
                </div>

                <div class="sidebar-card" style="background: #fff; padding: 20px; border-radius: 8px; border: 1px solid #e2e8f0; border-left: 4px solid #059669;">
                    <h4 style="margin-top: 0; margin-bottom: 12px; font-size: 1.1rem; font-weight: 700; color: #059669;">💡 Shift-Left Security</h4>
                    <p style="font-size: 0.85rem; color: #64748b; line-height: 1.5; margin: 0;">
                        รู้หรือไม่? การแก้ไขบั๊กด้านความปลอดภัยหลังจากที่ระบบถูกนำไปติดตั้งจริงและมีผู้ใช้งานถล่มทลายแล้ว มีค่าใช้จ่ายและค่าความเสียหาย <strong>สูงกว่าการตรวจพบและแก้ไขตั้งแต่ขั้นตอนเริ่มเขียนโค้ดถึง 60 เท่า!</strong><br><br>
                        นั่นคือเหตุผลที่วิศวกร DevSecOps ยุคใหม่ให้ความสำคัญกับการตั้งระบบสแกนไฟล์ตั้งแต่ทุก ๆ ครั้งที่มีการกดคอมมิตส่งงานนั่นเองครับ
                    </p>
                </div>
            </aside>
        </main>
    </div>

    <script src="../assets/js/script.js"></script>
</body>

</html>