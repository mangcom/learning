<?php
$base_dir = "../"; // ถอยกลับ 1 ชั้นเพื่อไปหาโฟลเดอร์หลัก
$active_nav = "frontend"; // เปิดสถานะเมนูที่วิชา Front-End
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน่วยที่ 1: สถาปัตยกรรม Front-End ยุคใหม่ด้วย Next.js และการควบคุมเวอร์ชันด้วย Git</title>
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
            <h2>หน่วยที่ 1: สถาปัตยกรรม Front-End ยุคใหม่ด้วย Next.js และการควบคุมเวอร์ชันด้วย Git</h2>
            <p>สัปดาห์ที่ 1 | เวลาเรียน 5 ชั่วโมง (ทฤษฎี 1 ชม. ปฏิบัติ 4 ชม.)</p>
            <p style="margin-top:10px;"><a href="assets/slides/unit1-slides.html" target="_blank" style="color:#93c5fd; font-weight:600; text-decoration:underline;">🖥️ เปิดสไลด์ประกอบการสอน หน่วยที่ 1</a></p>
        </div>
    </div>

    <div class="container">
        <div class="single-layout">

            <section class="lesson-section">
                <div class="key-concept-box">
                    <strong>🎯 สารสำคัญ (Key Concepts)</strong>
                    <p>
                        Next.js คือเฟรมเวิร์ก (Framework) ที่พัฒนาต่อยอดจาก React เพื่อให้นักพัฒนาสร้างเว็บแอปพลิเคชันระดับโปรดักชันได้ง่ายและรวดเร็ว ด้วยความสามารถพิเศษอย่าง Server-Side Rendering, File-based Routing และ API Routes ในตัว หน่วยนี้จะปูพื้นฐานให้ผู้เรียนเข้าใจภาพรวมสถาปัตยกรรม Front-End ยุคใหม่ ติดตั้งเครื่องมือพัฒนา สร้างโปรเจกต์ Next.js โปรเจกต์แรกของตนเอง และเริ่มต้นใช้ระบบควบคุมเวอร์ชัน Git ตั้งแต่วันแรกของการเรียน เพื่อให้ผู้เรียนคุ้นชินกับกระบวนการทำงานแบบมืออาชีพไปพร้อมกับการลงมือปฏิบัติจริง
                    </p>
                </div>
            </section>

            <section class="lesson-section">
                <h3>🎯 จุดประสงค์การเรียนรู้ (Learning Objectives)</h3>
                <p>เมื่อนักศึกษาเรียนจบหน่วยการเรียนรู้นี้แล้ว จะมีความรู้ความสามารถดังนี้:</p>
                <table class="grading-table" style="margin-top: 15px;">
                    <tr>
                        <th width="25%">โดเมนการเรียนรู้</th>
                        <th>รายละเอียดจุดประสงค์การเรียนรู้</th>
                    </tr>
                    <tr>
                        <td><strong>ด้านความรู้ (Knowledge - K)</strong></td>
                        <td>1. สามารถอธิบายสถาปัตยกรรม Front-End ยุคใหม่และจุดเด่นของ Next.js เมื่อเทียบกับ React ทั่วไปได้<br>2. สามารถอธิบายโครงสร้างโฟลเดอร์ App Router และหลักการทำงานของระบบควบคุมเวอร์ชัน Git ได้</td>
                    </tr>
                    <tr>
                        <td><strong>ด้านทักษะ (Practice - P)</strong></td>
                        <td>1. สามารถติดตั้ง Node.js และสร้างโปรเจกต์ Next.js ด้วยคำสั่ง create-next-app ได้ด้วยตนเอง<br>2. สามารถเริ่มต้นและจัดการคลังจัดเก็บซอร์สโค้ดด้วย Git ทั้งแบบ Local และ Remote (GitHub) ได้</td>
                    </tr>
                    <tr>
                        <td><strong>ด้านเจตคติ (Attitude - A)</strong></td>
                        <td>1. ปฏิบัติงานด้วยความละเอียดรอบคอบในการติดตั้งเครื่องมือและตรวจสอบข้อผิดพลาด<br>2. มีวินัยในการเขียนข้อความอธิบายการเปลี่ยนแปลง (Commit Message) อย่างสม่ำเสมอ</td>
                    </tr>
                </table>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="lesson-section">
                <h3>📘 3. เนื้อหาทางทฤษฎีเชิงลึก (Theoretical Core)</h3>

                <h4 class="topic-title">เรื่องที่ 1.1: วิวัฒนาการของ Front-End และเหตุผลที่ต้องมี Next.js</h4>
                <p>
                    การพัฒนาเว็บฝั่งผู้ใช้ (Front-End) พัฒนาจากหน้าเว็บ HTML/CSS/JavaScript แบบดั้งเดิม มาสู่ Single Page Application (SPA) ด้วยไลบรารีอย่าง React แต่ React เพียงอย่างเดียวยังขาดความสามารถสำคัญสำหรับงานระดับโปรดักชัน เช่น การทำ SEO ที่ดี การตั้งค่า Routing ที่ซับซ้อน และการเชื่อมต่อ Backend ของตัวเอง Next.js จึงถูกพัฒนาขึ้นมาเติมเต็มช่องว่างเหล่านี้
                </p>
                <table class="grading-table" style="margin: 15px 0;">
                    <tr style="background:#f1f5f9;">
                        <th>คุณสมบัติ</th>
                        <th>React (CRA/Vite)</th>
                        <th>Next.js</th>
                    </tr>
                    <tr>
                        <td><strong>Routing</strong></td>
                        <td>ต้องติดตั้งไลบรารีเพิ่ม (react-router-dom)</td>
                        <td>File-based Routing ในตัว ไม่ต้องตั้งค่าเพิ่ม</td>
                    </tr>
                    <tr>
                        <td><strong>Rendering</strong></td>
                        <td>Client-Side Rendering (CSR) เท่านั้น</td>
                        <td>รองรับ SSR, SSG, ISR และ CSR ในตัวเดียว</td>
                    </tr>
                    <tr>
                        <td><strong>Backend</strong></td>
                        <td>ต้องแยกโปรเจกต์ Backend ต่างหาก</td>
                        <td>มี API Routes ให้เขียน Backend เบื้องต้นในโปรเจกต์เดียวกัน</td>
                    </tr>
                    <tr>
                        <td><strong>SEO</strong></td>
                        <td>ทำได้ยาก เพราะ HTML เริ่มต้นว่างเปล่า</td>
                        <td>ทำได้ดี เพราะมี HTML ที่ Render มาจากฝั่งเซิร์ฟเวอร์</td>
                    </tr>
                </table>

                <h4 class="topic-title">เรื่องที่ 1.2: สถาปัตยกรรม App Router ของ Next.js</h4>
                <p>
                    ตั้งแต่ Next.js เวอร์ชัน 13 เป็นต้นมา ได้แนะนำระบบ <strong>App Router</strong> ซึ่งใช้โฟลเดอร์ <code class="inline-code">app/</code> เป็นศูนย์กลางของโครงสร้างโปรเจกต์ โดยมีไฟล์สำคัญ ได้แก่ <code class="inline-code">app/layout.js</code> (โครงสร้างหลักที่ใช้ร่วมกันทุกหน้า) <code class="inline-code">app/page.js</code> (เนื้อหาของแต่ละเส้นทาง) และ <code class="inline-code">app/globals.css</code> (สไตล์ส่วนกลาง) นอกจากนี้ Next.js ยังแบ่งคอมโพเนนต์ออกเป็น 2 ประเภท คือ <strong>Server Component</strong> (ค่าเริ่มต้น ประมวลผลที่ฝั่งเซิร์ฟเวอร์) และ <strong>Client Component</strong> (ต้องประกาศ <code class="inline-code">"use client"</code> ไว้บรรทัดแรกของไฟล์ ใช้เมื่อต้องโต้ตอบกับผู้ใช้)
                </p>

                <blockquote>
                    <strong>💡 เจาะลึกทางทฤษฎี:</strong><br>
                    • <strong>Server Component</strong> เหมาะกับการดึงข้อมูลจากฐานข้อมูลหรือ API โดยตรง ลดขนาด JavaScript ที่ส่งไปยังเบราว์เซอร์<br>
                    • <strong>Client Component</strong> จำเป็นเมื่อต้องใช้ React Hook เช่น <code class="inline-code">useState</code>, <code class="inline-code">useEffect</code> หรือรับ Event จากผู้ใช้ เช่น การคลิกปุ่ม
                </blockquote>

                <h4 class="topic-title">เรื่องที่ 1.3: พื้นฐานระบบควบคุมเวอร์ชันด้วย Git</h4>
                <p>
                    Git แบ่งพื้นที่ทำงานออกเป็น 3 ส่วนหลัก คือ <strong>Working Directory</strong> (พื้นที่แก้ไขไฟล์), <strong>Staging Area</strong> (พื้นที่เตรียมไฟล์ก่อนบันทึก) และ <strong>Repository</strong> (คลังจัดเก็บประวัติการเปลี่ยนแปลง) การเขียน Commit Message ที่ดีควรสั้น กระชับ และบอกให้ทราบว่าการเปลี่ยนแปลงนั้นทำอะไร
                </p>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="lesson-section">
                <h3>🛠️ 4. ตัวอย่างการปฏิบัติการทีละขั้นตอน (Step-by-Step Walkthrough)</h3>
                <p>ในบทปฏิบัติการนี้ นักศึกษาจะสร้างโปรเจกต์ Next.js ตัวแรก และเริ่มต้นใช้งาน Git</p>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 1</div>
                    <div class="step-detail">
                        <strong>ตรวจสอบ/ติดตั้ง Node.js เวอร์ชัน LTS</strong>
                        <p>เปิด Terminal (PowerShell) ในโปรแกรม VS Code แล้วพิมพ์คำสั่งเช็กเวอร์ชัน:</p>

                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">PowerShell</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>
                                </button>
                            </div>
                            <pre>node -v
npm -v</pre>
                        </div>
                        <p>หากยังไม่มี ให้ดาวน์โหลดเวอร์ชัน LTS จาก <a href="https://nodejs.org" target="_blank">https://nodejs.org</a> แล้วติดตั้งตามค่าเริ่มต้น</p>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 2</div>
                    <div class="step-detail">
                        <strong>สร้างโปรเจกต์ Next.js ด้วย create-next-app</strong>
                        <p>พิมพ์คำสั่งต่อไปนี้เพื่อสร้างโปรเจกต์ใหม่ชื่อ <code class="inline-code">first-nextjs-app</code>:</p>

                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">PowerShell</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>
                                </button>
                            </div>
                            <pre>npx create-next-app@latest first-nextjs-app</pre>
                        </div>
                        <p>ระหว่างการติดตั้งระบบจะถามตัวเลือก ให้เลือกดังนี้: <strong>TypeScript: No</strong>, <strong>ESLint: Yes</strong>, <strong>Tailwind CSS: No</strong>, <strong>App Router: Yes</strong> (หน่วยที่ 4 จะกลับมาเพิ่ม TypeScript และหน่วยที่ 2 จะเพิ่ม Tailwind CSS ภายหลัง)</p>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 3</div>
                    <div class="step-detail">
                        <strong>รันเว็บเซิร์ฟเวอร์พัฒนาและแก้ไขหน้าแรก</strong>
                        <p>เข้าไปในโฟลเดอร์โปรเจกต์แล้วรันเว็บเซิร์ฟเวอร์พัฒนา:</p>

                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">PowerShell</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>
                                </button>
                            </div>
                            <pre>cd first-nextjs-app
npm run dev</pre>
                        </div>
                        <p>เปิดเบราว์เซอร์ไปที่ <code class="inline-code">http://localhost:3000</code> จากนั้นเปิดไฟล์ <code class="inline-code">app/page.js</code> ด้วย VS Code แล้วแก้ไขข้อความให้แสดงชื่อ-นามสกุลของตนเอง สังเกตว่าหน้าเว็บอัปเดตทันทีด้วยคุณสมบัติ Hot Reload โดยไม่ต้องรันคำสั่งใหม่</p>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 4</div>
                    <div class="step-detail">
                        <strong>เริ่มต้นและจัดการ Git Repository</strong>
                        <p>เริ่มต้น Repository และบันทึกการเปลี่ยนแปลงครั้งแรก:</p>

                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">PowerShell</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>
                                </button>
                            </div>
                            <pre>git init
git add .
git commit -m "Initial commit: create first Next.js project"</pre>
                        </div>
                        <p>สร้าง Repository ใหม่บน GitHub ชื่อ <code class="inline-code">first-nextjs-app</code> แล้วเชื่อมต่อและส่งโค้ดขึ้นไป:</p>

                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">PowerShell</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>
                                </button>
                            </div>
                            <pre>git remote add origin https://github.com/ชื่อผู้ใช้/first-nextjs-app.git
git branch -M main
git push -u origin main</pre>
                        </div>
                    </div>
                </div>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="assignment-box">
                <h3>📝 5. งานที่มอบหมายและเกณฑ์การประเมินผล (Assignment)</h3>
                <p><strong>ใบงานที่ 1: โปรเจกต์ Next.js แรกของฉันบน GitHub</strong></p>
                <br>
                <p><strong>คำสั่ง:</strong></p>
                <ul style="margin-left: 20px;">
                    <li>สร้างโปรเจกต์ Next.js ของตนเองตามขั้นตอนที่ 1-3 ข้างต้น</li>
                    <li>แก้ไขหน้าแรกให้แสดงข้อความ <strong>"สวัสดี ชื่อ-นามสกุลของนักศึกษา"</strong></li>
                    <li>เริ่มต้น Git Repository บันทึก Commit และ Push ขึ้นสู่ GitHub ของตนเอง</li>
                    <li>ส่งลิงก์ GitHub Repository พร้อมภาพหน้าจอผลลัพธ์บน <code class="inline-code">localhost:3000</code> ในระบบควบคุมห้องเรียน</li>
                </ul>

                <br>
                <p><strong>📊 เกณฑ์การตัดคะแนน (คะแนนเต็ม 5 คะแนน):</strong></p>
                <ul style="margin-left: 20px; font-size: 0.9rem; color: #78350f;">
                    <li>• ติดตั้ง Node.js และสร้างโปรเจกต์ Next.js ได้สำเร็จ (1 คะแนน)</li>
                    <li>• แก้ไขหน้าเว็บและรันเว็บเซิร์ฟเวอร์พัฒนาแสดงผลได้ถูกต้อง (1 คะแนน)</li>
                    <li>• เริ่มต้น Repository และบันทึก Commit ได้ถูกต้องตามมาตรฐาน (2 คะแนน)</li>
                    <li>• เชื่อมต่อและ Push โค้ดขึ้น GitHub ได้สำเร็จพร้อมหลักฐานภาพหน้าจอ (1 คะแนน)</li>
                </ul>
            </section>

        </div>
    </div>

    <script src="../assets/js/script.js"></script>
</body>

</html>
