<?php
$base_dir = "../";
$active_nav = "frontend";
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน่วยที่ 9: การจัดทำเอกสารคู่มือ การส่งมอบงาน และการประยุกต์ใช้ในงานอาชีพ</title>
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
            <h2>หน่วยที่ 9: การจัดทำเอกสารคู่มือ การส่งมอบงาน และการประยุกต์ใช้ในงานอาชีพ</h2>
            <p>สัปดาห์ที่ 14-15 | เวลาเรียนรวม 10 ชั่วโมง (ทฤษฎี 2 ชม. ปฏิบัติ 8 ชม.)</p>
        </div>
    </div>

    <div class="container">
        <div class="single-layout">

            <section class="lesson-section">
                <div class="key-concept-box">
                    <strong>🎯 สารสำคัญ (Key Concepts)</strong>
                    <p>
                        ซอฟต์แวร์ที่ดีไม่ได้จบแค่ "เขียนเสร็จ" แต่ต้องส่งมอบได้จริงในงานอาชีพ หน่วยสุดท้ายนี้จะพาผู้เรียนเขียนเอกสาร Specification/README ที่มืออาชีพใช้งานจริง เตรียมโปรเจกต์ Next.js ให้พร้อมใช้งานด้วยคำสั่ง Build การส่งมอบซอฟต์แวร์ และนำเสนอโครงงานฟูลสแตกฉบับสมบูรณ์ที่เชื่อมต่อกับ Back-End จริงที่สร้างมาตลอดทั้งภาคเรียน
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
                        <td>1. สามารถอธิบายองค์ประกอบของเอกสาร README/คู่มือการใช้งานที่ดีได้<br>2. สามารถอธิบายขั้นตอนการ Build โปรเจกต์ Next.js เพื่อใช้งานจริงได้</td>
                    </tr>
                    <tr>
                        <td><strong>ด้านทักษะ (Practice - P)</strong></td>
                        <td>1. สามารถเขียนเอกสาร README.md ที่ครบถ้วนตามมาตรฐานได้<br>2. สามารถ Build และรันโปรเจกต์ Next.js ในโหมด Production ได้</td>
                    </tr>
                    <tr>
                        <td><strong>ด้านเจตคติ (Attitude - A)</strong></td>
                        <td>1. มีความรับผิดชอบในการส่งมอบงานให้ครบถ้วนตรงเวลา<br>2. สื่อสารผลงานของตนเองได้อย่างมั่นใจและเป็นระบบ</td>
                    </tr>
                </table>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="lesson-section">
                <h3>📘 3. เนื้อหาทางทฤษฎีเชิงลึก (Theoretical Core)</h3>

                <h4 class="topic-title">เรื่องที่ 9.1 (ตอนที่ 1): องค์ประกอบของเอกสาร Specification และ README</h4>
                <p>เอกสารที่ดีช่วยให้ผู้อื่น (หรือตัวเราเองในอนาคต) เข้าใจและใช้งานโปรเจกต์ได้โดยไม่ต้องถามผู้พัฒนา องค์ประกอบหลักของไฟล์ <code class="inline-code">README.md</code> ที่ดี ได้แก่:</p>
                <ul style="margin-left:20px;">
                    <li><strong>ชื่อโปรเจกต์และคำอธิบายสั้น ๆ</strong> ว่าทำอะไรได้บ้าง</li>
                    <li><strong>เทคโนโลยีที่ใช้ (Tech Stack)</strong> เช่น Next.js, TypeScript, Tailwind CSS, Express.js</li>
                    <li><strong>วิธีติดตั้งและรันโปรเจกต์ (Installation/Getting Started)</strong> เป็นขั้นตอนที่ทำตามได้จริง</li>
                    <li><strong>โครงสร้างโฟลเดอร์ (Project Structure)</strong> อธิบายว่าไฟล์สำคัญอยู่ที่ไหน</li>
                    <li><strong>รายการ API ที่ใช้ (Endpoints)</strong> พร้อมตัวอย่างข้อมูลที่ส่ง-รับ</li>
                </ul>

                <h4 class="topic-title">เรื่องที่ 9.2 (ตอนที่ 2): การเตรียมโปรเจกต์ Next.js สำหรับใช้งานจริง (Production Build)</h4>
                <p>
                    เมื่อพัฒนาเสร็จแล้ว ต้องแปลงโค้ดจากโหมดพัฒนา (Development) เป็นโหมดใช้งานจริง (Production) ด้วยคำสั่ง <code class="inline-code">next build</code> ซึ่งจะบีบอัดโค้ด ตัดส่วนที่ไม่ได้ใช้ออก (Tree Shaking) และสร้างไฟล์ที่พร้อมนำไปติดตั้งบนเซิร์ฟเวอร์จริงหรือบริการ Hosting เช่น Vercel
                </p>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="lesson-section">
                <h3>🛠️ 4. ตัวอย่างการปฏิบัติการทีละขั้นตอน (Step-by-Step Walkthrough)</h3>
                <p>เขียนเอกสาร README และเตรียมโปรเจกต์ฟูลสแตกให้พร้อมส่งมอบ</p>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 1</div>
                    <div class="step-detail">
                        <strong>เขียนไฟล์ README.md สำหรับโปรเจกต์ Next.js</strong>
                        <div class="code-window">
                            <div class="code-header"><span class="code-lang">Markdown</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                            </div>
                            <pre># ระบบจัดการข้อมูลนักเรียน (Student Management System)

ระบบฟูลสแตกสำหรับแสดงและจัดการข้อมูลนักเรียน พัฒนาด้วย Next.js เชื่อมต่อกับ
Back-End API ที่พัฒนาด้วย Express.js

## เทคโนโลยีที่ใช้
- Next.js 15 (App Router) + TypeScript
- Tailwind CSS
- Express.js (Back-End API)

## วิธีติดตั้งและรัน
1. ติดตั้งไลบรารี: `npm install`
2. เปิดเซิร์ฟเวอร์ Back-End ที่ `http://localhost:3000` ก่อน
3. รันเว็บเซิร์ฟเวอร์พัฒนา: `npm run dev`
4. เปิดเบราว์เซอร์ที่ `http://localhost:3001`

## โครงสร้างโฟลเดอร์หลัก
- `app/students` หน้ารายการและรายละเอียดนักเรียน
- `app/login` หน้าเข้าสู่ระบบด้วย JWT
- `app/api` Next.js API Routes เชื่อมต่อ Back-End

## รายการ API ที่ใช้
- `GET /students` รายชื่อนักเรียนทั้งหมด
- `GET /students/:id` ข้อมูลนักเรียนรายคน
- `POST /login` เข้าสู่ระบบ รับ JWT Token</pre>
                        </div>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 2</div>
                    <div class="step-detail">
                        <strong>Build โปรเจกต์ให้พร้อมใช้งานจริง</strong>
                        <div class="code-window">
                            <div class="code-header"><span class="code-lang">PowerShell</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                            </div>
                            <pre>npm run build
npm run start</pre>
                        </div>
                        <p>หากคำสั่ง <code class="inline-code">npm run build</code> ไม่มี Error แสดงว่าโค้ดพร้อมสำหรับนำไปใช้งานจริง (เช่น Deploy ขึ้น Vercel) โดยไม่ต้องรันโหมดพัฒนาอีกต่อไป</p>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 3</div>
                    <div class="step-detail">
                        <strong>เตรียมการนำเสนอโครงงานฟูลสแตก (Final Presentation)</strong>
                        <p>จัดทำสไลด์นำเสนอ 5-8 หน้า ครอบคลุม: ที่มาของปัญหา → ฟีเจอร์หลักของระบบ → สถาปัตยกรรม Front-End + Back-End → สาธิตการทำงานสด (Live Demo) → ปัญหาที่พบและวิธีแก้ไข → สิ่งที่ได้เรียนรู้</p>
                    </div>
                </div>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="assignment-box">
                <h3>📝 5. งานที่มอบหมายและเกณฑ์การประเมินผล (Final Project)</h3>
                <p><strong>โครงงานปิดภาค: ระบบเว็บแอปพลิเคชันฟูลสแตกด้วย Next.js + Express</strong></p>
                <br>
                <p><strong>คำสั่ง:</strong></p>
                <ul style="margin-left: 20px;">
                    <li>รวบรวมฟีเจอร์ทั้งหมดจากหน่วยที่ 1-8 ให้เป็นระบบเดียวที่สมบูรณ์ (อย่างน้อย: หน้ารายการ, หน้ารายละเอียด, ระบบ Login)</li>
                    <li>เขียนไฟล์ README.md ที่ครบองค์ประกอบตามตัวอย่าง</li>
                    <li>Build โปรเจกต์ในโหมด Production สำเร็จโดยไม่มี Error</li>
                    <li>นำเสนอโครงงานหน้าชั้นเรียน พร้อมสาธิตการทำงานสดเชื่อมต่อ Back-End จริง</li>
                    <li>ส่ง Commit สุดท้ายขึ้น GitHub พร้อม Tag <code class="inline-code">v1.0.0</code></li>
                </ul>
                <br>
                <p><strong>📊 เกณฑ์การตัดคะแนน (คะแนนเต็ม 20 คะแนน):</strong></p>
                <ul style="margin-left: 20px; font-size: 0.9rem; color: #78350f;">
                    <li>• ความสมบูรณ์และถูกต้องของฟีเจอร์ที่เชื่อมต่อ Back-End จริง (8 คะแนน)</li>
                    <li>• คุณภาพของเอกสาร README และความครบถ้วน (4 คะแนน)</li>
                    <li>• Build โปรเจกต์สำเร็จ ไม่มี Error (3 คะแนน)</li>
                    <li>• คุณภาพการนำเสนอและตอบคำถาม (3 คะแนน)</li>
                    <li>• ความเรียบร้อยของ Git Repository และ Commit History (2 คะแนน)</li>
                </ul>
            </section>

        </div>
    </div>

    <script src="../assets/js/script.js"></script>
</body>

</html>
