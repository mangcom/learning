<?php
$base_dir = "../";
$active_nav = "frontend";
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน่วยที่ 8: การทดสอบระบบ การแก้จุดบกพร่อง และการวัดประสิทธิภาพซอฟต์แวร์</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        .score-badge { display:inline-flex; align-items:center; justify-content:center; width:64px; height:64px; border-radius:50%; font-weight:800; font-size:1.3rem; color:#fff; }
        .score-good { background:#16a34a; } .score-mid { background:#f59e0b; } .score-bad { background:#dc2626; }
        .lh-grid { display:flex; gap:16px; flex-wrap:wrap; margin:16px 0; }
    </style>
</head>

<body>

    <?php include '../components/navbar.php'; ?>

    <div class="page-header" style="background-color: var(--secondary); color: var(--white); padding: 40px 0;">
        <div class="container">
            <a href="index.php" class="back-link">
                <span class="arrow-icon">⬅</span>
                <span>กลับสู่หน้าหลักวิชา</span>
            </a>
            <h2>หน่วยที่ 8: การทดสอบระบบ การแก้จุดบกพร่อง และการวัดประสิทธิภาพซอฟต์แวร์</h2>
            <p>สัปดาห์ที่ 12-13 | เวลาเรียนรวม 10 ชั่วโมง (ทฤษฎี 2 ชม. ปฏิบัติ 8 ชม.)</p>
        </div>
    </div>

    <div class="container">
        <div class="single-layout">

            <section class="lesson-section">
                <div class="key-concept-box">
                    <strong>🎯 สารสำคัญ (Key Concepts)</strong>
                    <p>
                        การพัฒนาเว็บแอปพลิเคชันให้เสร็จเพียงอย่างเดียวไม่เพียงพอ ต้องมั่นใจว่าระบบทำงานถูกต้องเมื่อเชื่อมต่อทุกส่วนเข้าด้วยกัน (Integration Test) หาจุดบกพร่องได้รวดเร็วด้วยเครื่องมือ Debug ที่เหมาะสม และวัดประสิทธิภาพของเว็บไซต์ด้วยมาตรฐานสากลอย่าง Lighthouse เพื่อให้ผู้ใช้ได้รับประสบการณ์ที่ดีที่สุด
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
                        <td>1. สามารถอธิบายหลักการทดสอบแบบ Integration Test ของระบบที่เชื่อม Front-End กับ Back-End ได้<br>2. สามารถอธิบายตัวชี้วัดหลักของ Lighthouse (Core Web Vitals) ได้</td>
                    </tr>
                    <tr>
                        <td><strong>ด้านทักษะ (Practice - P)</strong></td>
                        <td>1. สามารถใช้ React/Next.js DevTools และ Console เพื่อหาจุดผิดพลาดได้<br>2. สามารถรัน Lighthouse และปรับปรุงคะแนนประสิทธิภาพของเว็บไซต์ได้</td>
                    </tr>
                    <tr>
                        <td><strong>ด้านเจตคติ (Attitude - A)</strong></td>
                        <td>1. มีความละเอียดรอบคอบในการตรวจสอบทุกจุดเชื่อมต่อของระบบ<br>2. ไม่ละเลยปัญหาด้านประสิทธิภาพแม้ระบบจะทำงานได้ถูกต้อง</td>
                    </tr>
                </table>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="lesson-section">
                <h3>📘 3. เนื้อหาทางทฤษฎีเชิงลึก (Theoretical Core)</h3>

                <h4 class="topic-title">เรื่องที่ 8.1 (ตอนที่ 1): Integration Test สำหรับระบบฟูลสแตก</h4>
                <p>
                    Integration Test คือการทดสอบว่าส่วนประกอบต่าง ๆ ของระบบทำงานร่วมกันได้ถูกต้อง สำหรับโปรเจกต์ในวิชานี้คือการทดสอบว่า Next.js (Front-End) เรียกข้อมูลจาก Express (Back-End) ได้ถูกต้องในทุกสถานการณ์ ทั้งกรณีสำเร็จ (Happy Path) และกรณีผิดพลาด (เช่น เซิร์ฟเวอร์ Back-End ปิดอยู่ หรือส่งข้อมูลผิดรูปแบบ)
                </p>

                <h4 class="topic-title">เรื่องที่ 8.2 (ตอนที่ 1): เครื่องมือ Debug ที่สำคัญ</h4>
                <table class="grading-table" style="margin: 15px 0;">
                    <tr style="background:#f1f5f9;"><th>เครื่องมือ</th><th>ใช้สำหรับ</th></tr>
                    <tr><td><strong>Browser DevTools (Console/Network)</strong></td><td>ดู Error ของ JavaScript และตรวจสอบคำขอ API ที่ส่งไป-กลับ</td></tr>
                    <tr><td><strong>React Developer Tools</strong></td><td>ตรวจสอบ Component Tree, Props และ State ที่กำลังทำงาน</td></tr>
                    <tr><td><strong>console.log() / debugger</strong></td><td>พิมพ์ค่าตัวแปร ณ จุดที่สงสัยเพื่อตรวจสอบการไหลของข้อมูล</td></tr>
                </table>

                <h4 class="topic-title">เรื่องที่ 8.3 (ตอนที่ 2): Lighthouse และ Core Web Vitals</h4>
                <p>
                    Lighthouse เป็นเครื่องมือของ Google ที่ให้คะแนนเว็บไซต์ 4 ด้านหลัก คือ Performance, Accessibility, Best Practices และ SEO โดยมีตัวชี้วัดสำคัญคือ <strong>Core Web Vitals</strong> ได้แก่ LCP (ความเร็วในการแสดงเนื้อหาหลัก), CLS (ความเสถียรของ Layout ไม่กระโดด) และ INP (ความไวในการตอบสนองต่อการคลิก)
                </p>
                <div class="lh-grid">
                    <div style="text-align:center;"><div class="score-badge score-good">90+</div><p style="font-size:0.8rem; margin-top:5px;">ดี</p></div>
                    <div style="text-align:center;"><div class="score-badge score-mid">50-89</div><p style="font-size:0.8rem; margin-top:5px;">ต้องปรับปรุง</p></div>
                    <div style="text-align:center;"><div class="score-badge score-bad">0-49</div><p style="font-size:0.8rem; margin-top:5px;">แย่</p></div>
                </div>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="lesson-section">
                <h3>🛠️ 4. ตัวอย่างการปฏิบัติการทีละขั้นตอน (Step-by-Step Walkthrough)</h3>
                <p>ทดสอบระบบรายการ-รายละเอียดนักเรียนจากหน่วยที่ 7 แล้ววัดและปรับปรุงประสิทธิภาพ</p>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 1</div>
                    <div class="step-detail">
                        <strong>ทดสอบกรณี Back-End ปิดอยู่ (Negative Test)</strong>
                        <p>ปิดเซิร์ฟเวอร์ Back-End (กด Ctrl+C ใน Terminal) แล้วเปิดหน้า <code class="inline-code">/students</code> ของ Next.js สังเกต Error ที่เกิดขึ้น แล้วปรับโค้ดให้จัดการข้อผิดพลาดอย่างสุภาพด้วย try/catch:</p>
                        <div class="code-window">
                            <div class="code-header"><span class="code-lang">TypeScript</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                            </div>
                            <pre>async function getStudents() {
  try {
    const res = await fetch("http://localhost:3001/api/students", { cache: "no-store" });
    if (!res.ok) throw new Error("Back-End ตอบกลับผิดพลาด");
    return await res.json();
  } catch (error) {
    console.error("เชื่อมต่อ Back-End ไม่สำเร็จ:", error);
    return []; // คืนค่าว่างแทนการล่มทั้งหน้า
  }
}</pre>
                        </div>
                        <p>เปิดเซิร์ฟเวอร์ Back-End กลับมาใหม่ แล้วตรวจสอบว่าหน้าเว็บกลับมาแสดงข้อมูลได้ตามปกติ</p>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 2</div>
                    <div class="step-detail">
                        <strong>ตรวจสอบคำขอ API ด้วย Network Tab</strong>
                        <p>เปิด DevTools (กด F12) ไปที่แท็บ <strong>Network</strong> กรองด้วยคำว่า "Fetch/XHR" แล้วรีเฟรชหน้าเว็บ ตรวจสอบ Status Code ของแต่ละคำขอ (ควรเป็น 200) และดูเวลาที่ใช้ในการตอบกลับ (Time) ของแต่ละ Endpoint</p>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 3</div>
                    <div class="step-detail">
                        <strong>รัน Lighthouse และอ่านผลคะแนน</strong>
                        <p>ใน Chrome DevTools ไปที่แท็บ <strong>Lighthouse</strong> เลือกโหมด Navigation และ Device เป็น Mobile แล้วกด Analyze page load บันทึกคะแนนทั้ง 4 ด้านที่ได้</p>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 4</div>
                    <div class="step-detail">
                        <strong>ปรับปรุงประสิทธิภาพตามคำแนะนำของ Lighthouse</strong>
                        <p>ตัวอย่างการปรับปรุงที่พบบ่อย เช่น ใช้ Component <code class="inline-code">&lt;Image&gt;</code> ของ Next.js แทน <code class="inline-code">&lt;img&gt;</code> ธรรมดา เพื่อบีบอัดและปรับขนาดภาพอัตโนมัติ:</p>
                        <div class="code-window">
                            <div class="code-header"><span class="code-lang">TypeScript</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                            </div>
                            <pre>import Image from "next/image";

&lt;Image src="/product.jpg" width={400} height={300} alt="สินค้า" /&gt;</pre>
                        </div>
                        <p>รัน Lighthouse อีกครั้งแล้วเปรียบเทียบคะแนนก่อน-หลังปรับปรุง</p>
                    </div>
                </div>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="assignment-box">
                <h3>📝 5. งานที่มอบหมายและเกณฑ์การประเมินผล (Assignment)</h3>
                <p><strong>ใบงานที่ 8: รายงานการทดสอบและปรับปรุงประสิทธิภาพ</strong></p>
                <br>
                <p><strong>คำสั่ง:</strong></p>
                <ul style="margin-left: 20px;">
                    <li>ทดสอบระบบของตนเองในกรณี Back-End ปิดอยู่ และปรับโค้ดให้จัดการ Error อย่างสุภาพ</li>
                    <li>รัน Lighthouse ก่อนปรับปรุง บันทึกคะแนนทั้ง 4 ด้าน (แคปหน้าจอ)</li>
                    <li>ปรับปรุงอย่างน้อย 2 จุดตามคำแนะนำของ Lighthouse แล้วรันซ้ำอีกครั้ง</li>
                    <li>เขียนรายงานเปรียบเทียบคะแนนก่อน-หลัง พร้อมอธิบายสิ่งที่ปรับปรุง ส่ง Commit ขึ้น GitHub</li>
                </ul>
                <br>
                <p><strong>📊 เกณฑ์การตัดคะแนน (คะแนนเต็ม 10 คะแนน):</strong></p>
                <ul style="margin-left: 20px; font-size: 0.9rem; color: #78350f;">
                    <li>• จัดการ Error กรณี Back-End ล่มได้อย่างเหมาะสม (3 คะแนน)</li>
                    <li>• มีผลคะแนน Lighthouse ก่อน-หลังปรับปรุงครบถ้วน (3 คะแนน)</li>
                    <li>• คะแนนประสิทธิภาพดีขึ้นจริงพร้อมคำอธิบายที่สมเหตุสมผล (3 คะแนน)</li>
                    <li>• Commit และ Push ขึ้น GitHub ครบถ้วน (1 คะแนน)</li>
                </ul>
            </section>

        </div>
    </div>

    <script src="../assets/js/script.js"></script>
</body>

</html>
