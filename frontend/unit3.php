<?php
$base_dir = "../";
$active_nav = "frontend";
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน่วยที่ 3: การพัฒนาเว็บแอปพลิเคชันเชิงโต้ตอบด้วย Modern JavaScript (ES6+)</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css?v=<?php echo filemtime(__DIR__ . "/../assets/css/style.css"); ?>">
    <style>
        .run-actions { display: flex; align-items: center; gap: 8px; }
        .run-btn { background: #16a34a; color: #fff; border: 0; border-radius: 6px; padding: 5px 12px; font-size: 0.8rem; font-weight: 700; cursor: pointer; font-family: inherit; }
        .run-btn:hover { background: #15803d; }
        .run-btn:disabled { opacity: 0.6; cursor: wait; }
        .reset-btn { background: transparent; color: #a3a3a3; border: 1px solid #404040; border-radius: 6px; padding: 4px 10px; font-size: 0.75rem; cursor: pointer; font-family: inherit; }
        .reset-btn:hover { color: #fff; border-color: #737373; }
        .code-window[data-run] pre[contenteditable]:focus { outline: 2px solid #22c55e; outline-offset: -2px; }
        .run-output { background: #0b1120; border-top: 2px solid #16a34a; padding: 12px 16px; font-family: Consolas, "Courier New", monospace; font-size: 0.85rem; color: #e2e8f0; white-space: pre-wrap; word-break: break-word; }
        .run-output::before { content: "ผลลัพธ์ (Console)"; display: block; font-family: Sarabun, sans-serif; font-size: 0.75rem; color: #4ade80; font-weight: 700; margin-bottom: 6px; }
        .run-line::before { content: "› "; color: #64748b; }
        .run-line.err { color: #fca5a5; }
        .run-line.warn { color: #fde68a; }
        .run-line.muted { color: #94a3b8; font-style: italic; }
        .w3-ref { font-size: 0.9rem; color: #475569; background: #f0fdf4; border-left: 4px solid #04aa6d; padding: 8px 12px; border-radius: 6px; margin: 12px 0; }
        .w3-ref a { color: #047857; font-weight: 600; }
        .dom-demo { border: 2px dashed #94a3b8; border-radius: 10px; padding: 16px; background: #f8fafc; margin: 15px 0; transition: background 0.3s, color 0.3s; }
        .dom-demo.demo-dark { background: #0f172a; color: #f8fafc; }
        .dom-demo button { background: #2563eb; color: #fff; border: 0; border-radius: 6px; padding: 8px 14px; font-family: inherit; font-weight: 600; cursor: pointer; }
        .dom-demo input { border: 1px solid #cbd5e1; border-radius: 6px; padding: 8px 10px; font-family: inherit; width: 100%; max-width: 320px; }
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
            <h2>หน่วยที่ 3: การพัฒนาเว็บแอปพลิเคชันเชิงโต้ตอบด้วย Modern JavaScript (ES6+)</h2>
            <p>สัปดาห์ที่ 3 | เวลาเรียน 5 ชั่วโมง (ทฤษฎี 1 ชม. ปฏิบัติ 4 ชม.)</p>
        </div>
    </div>

    <div class="container">
        <div class="single-layout">

            <section class="lesson-section">
                <div class="key-concept-box">
                    <strong>🎯 สารสำคัญ (Key Concepts)</strong>
                    <p>
                        React และ Next.js เขียนด้วยไวยากรณ์ JavaScript ยุคใหม่ (ES6 ขึ้นไป) เป็นหลัก การเข้าใจ Arrow Function, Destructuring, Array Methods และการเขียนโปรแกรมแบบ Asynchronous จึงเป็นพื้นฐานสำคัญก่อนเข้าสู่การสร้าง Component และการดึงข้อมูลจาก API ในหน่วยถัดไป
                    </p>
                    <p>
                        หน่วยนี้ปูพื้นฐานคำสั่ง JavaScript ทุกตัวที่จำเป็นต่อการสร้างหน้าเว็บเชิงโต้ตอบ ตั้งแต่ตัวแปร เงื่อนไข ฟังก์ชัน การจัดการข้อมูลด้วย Array Methods การตอบสนองต่อการกระทำของผู้ใช้ (Event) ไปจนถึงการดึงข้อมูลแบบ Asynchronous แล้วนำทุกคำสั่งมาประกอบกันเป็น <strong>"ระบบคะแนนนักศึกษา"</strong> ที่โหลดข้อมูล ค้นหา เรียงลำดับ เพิ่ม และลบข้อมูลได้จริงในโปรเจกต์ Next.js ที่รันด้วย Docker และบันทึกงานด้วย Git
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
                        <td>1. อธิบายไวยากรณ์ ES6+ ที่ใช้บ่อยใน React ได้ ได้แก่ let/const, Template Literal, Arrow Function, Destructuring, Spread/Rest และ Modules<br>2. อธิบายหลักการทำงานของ Event และการทำงานแบบ Asynchronous ด้วย Promise และ async/await ได้</td>
                    </tr>
                    <tr>
                        <td><strong>ด้านทักษะ (Practice - P)</strong></td>
                        <td>1. ใช้ Array Methods (map, filter, find, reduce, sort) แปลงและสรุปข้อมูลได้<br>2. เขียนฟังก์ชัน async ดึงข้อมูลจาก API พร้อมจัดการสถานะกำลังโหลดและข้อผิดพลาดได้<br>3. สร้างหน้าเว็บเชิงโต้ตอบ (ค้นหา เรียงลำดับ เพิ่ม ลบ) ใน Next.js ได้</td>
                    </tr>
                    <tr>
                        <td><strong>ด้านเจตคติ (Attitude - A)</strong></td>
                        <td>1. ฝึกเขียนโค้ดให้กระชับและอ่านง่ายตามแนวทาง Modern JavaScript<br>2. มีความอดทนในการไล่ตรวจสอบข้อผิดพลาดทีละบรรทัดด้วย Console</td>
                    </tr>
                </table>
            </section>

            <div class="key-concept-box">
                <strong>🗺️ สารบัญหน่วยที่ 3</strong>
                <ul style="margin: 10px 0 0 20px; line-height: 1.9;">
                    <li><a href="#topic-3-1">เรื่องที่ 3.1: JavaScript ES6+ กับการพัฒนาเว็บเชิงโต้ตอบ</a></li>
                    <li><a href="#topic-3-2">เรื่องที่ 3.2: ตัวแปร ชนิดข้อมูล และ Template Literal</a></li>
                    <li><a href="#topic-3-3">เรื่องที่ 3.3: ตัวดำเนินการและการตัดสินใจด้วยเงื่อนไข</a></li>
                    <li><a href="#topic-3-4">เรื่องที่ 3.4: ฟังก์ชันและ Arrow Function</a></li>
                    <li><a href="#topic-3-5">เรื่องที่ 3.5: Object, Array, Destructuring และ Spread/Rest</a></li>
                    <li><a href="#topic-3-6">เรื่องที่ 3.6: Array Methods ที่ใช้บ่อยใน React (map, filter, reduce และอื่น ๆ)</a></li>
                    <li><a href="#topic-3-7">เรื่องที่ 3.7: Modules — import และ export</a></li>
                    <li><a href="#topic-3-8">เรื่องที่ 3.8: DOM และ Event — หัวใจของการโต้ตอบกับผู้ใช้</a></li>
                    <li><a href="#topic-3-9">เรื่องที่ 3.9: Asynchronous JavaScript (Promise, async/await และ fetch)</a></li>
                    <li><a href="#workshop">ปฏิบัติการ: JavaScript Playground และระบบคะแนนนักศึกษา (8 ขั้นตอน)</a></li>
                </ul>
            </div>

            <div class="key-concept-box" style="border-left-color:#16a34a;">
                <strong>▶ วิธีใช้บทเรียนนี้: ลองรันโค้ดได้ทันทีในหน้าเว็บ</strong>
                <p>กล่องโค้ดในส่วนทฤษฎีที่มีปุ่ม <strong style="color:#16a34a;">▶ รันโค้ด</strong> สามารถกดรันในเบราว์เซอร์ได้ทันที ผลลัพธ์จาก <code class="inline-code">console.log()</code> จะแสดงใต้กล่องโค้ด และ <strong>คลิกแก้ไขโค้ดในกล่องได้เลย</strong> เช่น ลองเปลี่ยนคะแนนจาก 85 เป็น 40 แล้วกดรันใหม่เพื่อดูว่าผลลัพธ์เปลี่ยนอย่างไร ถ้าแก้จนสับสนให้กด <strong>↺ คืนค่าเดิม</strong> การทดลองแก้และสังเกตผลด้วยตนเองคือวิธีเรียนเขียนโปรแกรมที่ได้ผลที่สุด</p>
            </div>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="lesson-section">
                <h3>📘 3. เนื้อหาทางทฤษฎีเชิงลึก (Theoretical Core)</h3>

                <!-- ===================== 3.1 ===================== -->
                <h4 class="topic-title" id="topic-3-1">เรื่องที่ 3.1: JavaScript ES6+ กับการพัฒนาเว็บเชิงโต้ตอบ</h4>
                <p>
                    <strong>JavaScript</strong> คือภาษาโปรแกรมที่ทำให้หน้าเว็บ "มีชีวิต" ถ้าเปรียบหน้าเว็บเป็นบ้าน HTML คือโครงสร้างบ้าน CSS คือการทาสีตกแต่ง ส่วน JavaScript คือระบบไฟฟ้าที่ทำให้กดสวิตช์แล้วไฟติด ทุกครั้งที่ผู้ใช้คลิกปุ่ม พิมพ์ค้นหา หรือเห็นข้อมูลโหลดขึ้นมาโดยไม่ต้องรีเฟรชหน้า นั่นคือการทำงานของ JavaScript
                </p>
                <p>
                    ภาษา JavaScript มีมาตรฐานกลางชื่อ <strong>ECMAScript (ES)</strong> ในปี 2015 มีการปรับปรุงครั้งใหญ่ที่สุดเรียกว่า <strong>ES6 (ES2015)</strong> ซึ่งเพิ่มไวยากรณ์ที่ทำให้เขียนโค้ดสั้นลงและอ่านง่ายขึ้นมาก เช่น <code class="inline-code">let</code>/<code class="inline-code">const</code>, Arrow Function, Template Literal, Destructuring, Spread, Modules และ Promise หลังจากนั้นมีเวอร์ชันใหม่ออกทุกปี (ES2016, ES2017, ...) เช่น async/await (ES2017) และ Optional Chaining (ES2020) คำว่า <strong>"ES6+"</strong> จึงหมายถึง JavaScript สมัยใหม่ตั้งแต่ ES6 เป็นต้นมา ซึ่ง React และ Next.js ใช้เป็นหลักทั้งหมด
                </p>
                <p>
                    สิ่งสำคัญที่ผู้เริ่มต้นมักสับสนคือ <strong>JavaScript ทำงานได้ 2 ที่</strong> คือในเบราว์เซอร์ และใน Node.js (ซึ่งในรายวิชานี้อยู่ใน Docker Container) และคำสั่ง <code class="inline-code">console.log()</code> ที่ใช้แสดงผลจะไปปรากฏคนละที่ตามรูปที่ 3.1
                </p>
                <div class="image-container">
                    <div>
                        <figure class="custom-image-box" style="max-width: 860px;">
                            <img src="img/unit3-where-js-runs.svg" alt="แผนภาพแสดงว่า JavaScript ทำงานได้ทั้งในเบราว์เซอร์และใน Node.js ใน Docker และ console.log แสดงผลคนละที่" class="responsive-img">
                            <figcaption class="image-caption">
                                <strong>รูปที่ 3.1:</strong> JavaScript ทำงานได้ทั้งในเบราว์เซอร์และใน Node.js — ผลของ <code>console.log()</code> จึงอยู่คนละที่
                                <span class="image-source">🔗 แหล่งอ้างอิงภาพ: ภาพประกอบจัดทำขึ้นสำหรับบทเรียนนี้</span>
                            </figcaption>
                        </figure>
                    </div>
                </div>
                <p>ลองกด <strong>▶ รันโค้ด</strong> ที่กล่องด้านล่าง เพื่อเริ่มต้นใช้งาน JavaScript ครั้งแรก:</p>
                <div class="code-window" data-run>
                    <div class="code-header">
                        <span class="code-lang">JavaScript</span>
                        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
                        </button>
                    </div>
                    <pre>console.log("สวัสดี JavaScript!");
console.log("1 + 2 =", 1 + 2);
console.log("วันนี้คือ", new Date().toLocaleDateString("th-TH"));</pre>
                </div>
                <p class="w3-ref">📚 อ่านเพิ่มเติมที่ W3Schools: <a href="https://www.w3schools.com/js/js_intro.asp" target="_blank" rel="noopener">JS Introduction</a> · <a href="https://www.w3schools.com/js/js_output.asp" target="_blank" rel="noopener">JS Output</a> · <a href="https://www.w3schools.com/js/js_es6.asp" target="_blank" rel="noopener">JS 2015 (ES6)</a></p>

                <!-- ===================== 3.2 ===================== -->
                <h4 class="topic-title" id="topic-3-2">เรื่องที่ 3.2: ตัวแปร ชนิดข้อมูล และ Template Literal</h4>
                <p>
                    <strong>ตัวแปร (Variable)</strong> คือ "กล่องที่มีป้ายชื่อ" สำหรับเก็บข้อมูลไว้ใช้ภายหลัง JavaScript สมัยใหม่ประกาศตัวแปรด้วย 2 คำสั่งหลัก:
                </p>
                <table class="grading-table" style="margin: 15px 0;">
                    <tr style="background:#f1f5f9;">
                        <th width="16%">คำสั่ง</th>
                        <th>ความหมาย</th>
                        <th width="34%">ใช้เมื่อ</th>
                    </tr>
                    <tr><td><code class="inline-code">const</code></td><td>ประกาศแล้ว <strong>กำหนดค่าใหม่ไม่ได้</strong></td><td><strong>ใช้เป็นค่าเริ่มต้นเสมอ</strong> (ส่วนใหญ่ของโค้ด React ใช้ const)</td></tr>
                    <tr><td><code class="inline-code">let</code></td><td>ประกาศแล้วกำหนดค่าใหม่ได้</td><td>ค่าที่ต้องเปลี่ยน เช่น ตัวนับในลูป</td></tr>
                    <tr><td><code class="inline-code">var</code></td><td>แบบเก่าก่อน ES6 มีพฤติกรรมที่ทำให้เกิดข้อผิดพลาดง่าย</td><td><strong>ไม่ควรใช้แล้ว</strong> (พบได้ในโค้ดเก่า)</td></tr>
                </table>
                <table class="grading-table" style="margin: 15px 0;">
                    <tr style="background:#f1f5f9;">
                        <th width="18%">ชนิดข้อมูล</th>
                        <th width="36%">ตัวอย่าง</th>
                        <th>ใช้กับ</th>
                    </tr>
                    <tr><td><strong>string</strong></td><td><code class="inline-code">"สมชาย"</code>, <code class="inline-code">'A'</code>, <code class="inline-code">`ข้อความ`</code></td><td>ข้อความทุกชนิด รวมถึงค่าที่ได้จากช่องกรอกข้อมูล</td></tr>
                    <tr><td><strong>number</strong></td><td><code class="inline-code">85</code>, <code class="inline-code">3.75</code>, <code class="inline-code">-10</code></td><td>ตัวเลขที่ใช้คำนวณ (ไม่มีการแยกจำนวนเต็ม/ทศนิยม)</td></tr>
                    <tr><td><strong>boolean</strong></td><td><code class="inline-code">true</code>, <code class="inline-code">false</code></td><td>ผลของการเปรียบเทียบ สถานะเปิด/ปิด</td></tr>
                    <tr><td><strong>undefined</strong></td><td>ตัวแปรที่ยังไม่ได้กำหนดค่า</td><td>"ยังไม่มีค่า" (มักเกิดจากการพิมพ์ชื่อผิด)</td></tr>
                    <tr><td><strong>null</strong></td><td><code class="inline-code">null</code></td><td>"ตั้งใจให้ว่าง"</td></tr>
                    <tr><td><strong>object / array</strong></td><td><code class="inline-code">{ name: "สมชาย" }</code>, <code class="inline-code">[1, 2, 3]</code></td><td>ข้อมูลหลายค่ารวมกัน (เรื่องที่ 3.5)</td></tr>
                </table>
                <p>
                    <strong>Template Literal</strong> คือข้อความที่ครอบด้วยเครื่องหมาย <strong>Backtick</strong> <code class="inline-code">`</code> (ปุ่มซ้ายของเลข 1 บนแป้นพิมพ์) แทรกค่าตัวแปรได้ด้วย <code class="inline-code">${ }</code> และขึ้นบรรทัดใหม่ได้ ช่วยให้ไม่ต้องต่อข้อความด้วยเครื่องหมาย + ยาว ๆ
                </p>
                <div class="code-window" data-run>
                    <div class="code-header">
                        <span class="code-lang">JavaScript</span>
                        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
                        </button>
                    </div>
                    <pre>const name = "สมชาย";
let score = 72;
score = score + 5;          // let เปลี่ยนค่าได้

console.log(typeof name, typeof score, typeof true);

// แบบเก่า: ต่อข้อความด้วย +
console.log("นักศึกษา " + name + " ได้ " + score + " คะแนน");
// แบบ ES6: Template Literal
console.log(`นักศึกษา ${name} ได้ ${score} คะแนน`);

// ค่าจากช่องกรอกข้อมูลเป็น "ข้อความ" เสมอ ต้องแปลงเป็นตัวเลขก่อนบวก
const input = "45";
console.log(input + 5, Number(input) + 5);

// เมธอดของข้อความและตัวเลขที่ใช้บ่อย
console.log("  สมชาย  ".trim(), "ABC".toLowerCase(), "สมชาย".includes("ชาย"));
console.log((71.6666).toFixed(1), (1290).toLocaleString("th-TH"));

// const กำหนดค่าใหม่ไม่ได้ ลองเอาเครื่องหมาย // หน้าบรรทัดล่างออกแล้วรันใหม่
// name = "สมหญิง";</pre>
                </div>
                <p class="w3-ref">📚 อ่านเพิ่มเติมที่ W3Schools: <a href="https://www.w3schools.com/js/js_varletconst.asp" target="_blank" rel="noopener">JS var/let/const</a> · <a href="https://www.w3schools.com/js/js_datatypes.asp" target="_blank" rel="noopener">JS Data Types</a> · <a href="https://www.w3schools.com/js/js_string_templates.asp" target="_blank" rel="noopener">JS String Templates</a> · <a href="https://www.w3schools.com/js/js_string_methods.asp" target="_blank" rel="noopener">JS String Methods</a></p>

                <!-- ===================== 3.3 ===================== -->
                <h4 class="topic-title" id="topic-3-3">เรื่องที่ 3.3: ตัวดำเนินการและการตัดสินใจด้วยเงื่อนไข</h4>
                <p>หน้าเว็บเชิงโต้ตอบต้อง "ตัดสินใจ" ตลอดเวลา เช่น ถ้ากำลังโหลดให้แสดงคำว่ากำลังโหลด ถ้าคะแนนต่ำกว่า 50 ให้แสดงป้ายสีแดง ตัวดำเนินการที่ใช้บ่อยมีดังนี้:</p>
                <table class="grading-table" style="margin: 15px 0;">
                    <tr style="background:#f1f5f9;">
                        <th width="22%">ตัวดำเนินการ</th>
                        <th>ความหมาย</th>
                        <th width="30%">ตัวอย่าง → ผลลัพธ์</th>
                    </tr>
                    <tr><td><code class="inline-code">===</code> / <code class="inline-code">!==</code></td><td>เท่ากับ / ไม่เท่ากับ (เทียบทั้ง <strong>ค่าและชนิด</strong>) — ควรใช้แบบนี้เสมอ</td><td><code class="inline-code">"5" === 5</code> → false</td></tr>
                    <tr><td><code class="inline-code">==</code></td><td>เท่ากับแบบหลวม (แปลงชนิดให้อัตโนมัติ ทำให้เกิดข้อผิดพลาดที่หายาก)</td><td><code class="inline-code">"5" == 5</code> → true</td></tr>
                    <tr><td><code class="inline-code">&gt;</code> <code class="inline-code">&gt;=</code> <code class="inline-code">&lt;</code> <code class="inline-code">&lt;=</code></td><td>มากกว่า / มากกว่าหรือเท่ากับ / น้อยกว่า / น้อยกว่าหรือเท่ากับ</td><td><code class="inline-code">85 &gt;= 50</code> → true</td></tr>
                    <tr><td><code class="inline-code">&amp;&amp;</code></td><td>และ (จริงทั้งคู่จึงจริง)</td><td><code class="inline-code">score &gt;= 0 &amp;&amp; score &lt;= 100</code></td></tr>
                    <tr><td><code class="inline-code">||</code></td><td>หรือ (จริงข้อใดข้อหนึ่งก็จริง)</td><td><code class="inline-code">name === "" || score === ""</code></td></tr>
                    <tr><td><code class="inline-code">!</code></td><td>กลับค่าจริงเป็นเท็จ</td><td><code class="inline-code">!true</code> → false</td></tr>
                    <tr><td><code class="inline-code">เงื่อนไข ? ก : ข</code></td><td><strong>Ternary</strong>: ถ้าเงื่อนไขจริงได้ ก ไม่จริงได้ ข (if-else ในบรรทัดเดียว)</td><td><code class="inline-code">loading ? "กำลังโหลด..." : "โหลดข้อมูล"</code></td></tr>
                    <tr><td><code class="inline-code">?.</code></td><td><strong>Optional Chaining</strong>: เข้าถึงค่าข้างในโดยไม่ Error ถ้าค่าด้านหน้าไม่มีอยู่</td><td><code class="inline-code">user.address?.city</code> → undefined</td></tr>
                    <tr><td><code class="inline-code">??</code></td><td><strong>Nullish Coalescing</strong>: ใช้ค่าสำรองเมื่อค่าทางซ้ายเป็น null/undefined</td><td><code class="inline-code">nickname ?? "ไม่มีชื่อเล่น"</code></td></tr>
                </table>
                <div class="code-window" data-run>
                    <div class="code-header">
                        <span class="code-lang">JavaScript</span>
                        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
                        </button>
                    </div>
                    <pre>const score = 85;   // ลองเปลี่ยนเป็น 40, 65 หรือ 150 แล้วกดรันใหม่

// if / else if / else: ตรวจจากบนลงล่าง เจอข้อที่จริงข้อแรกแล้วหยุด
if (score &lt; 0 || score &gt; 100) {
  console.log("คะแนนไม่ถูกต้อง");
} else if (score &gt;= 80) {
  console.log("ดีมาก");
} else if (score &gt;= 50) {
  console.log("ผ่าน");
} else {
  console.log("ไม่ผ่าน");
}

// Ternary: เลือกค่า 1 ใน 2 ค่า ใช้บ่อยมากใน JSX
const badge = score &gt;= 50 ? "🟢 ผ่าน" : "🔴 ไม่ผ่าน";
console.log(badge);

// === เทียบทั้งค่าและชนิดข้อมูล
console.log("5" == 5, "5" === 5);

// ?. และ ?? ป้องกัน Error เมื่อข้อมูลบางส่วนไม่มี
const user = { name: "สมชาย" };
console.log(user.address?.city);
console.log(user.nickname ?? "ไม่มีชื่อเล่น");</pre>
                </div>
                <p style="font-size:0.9rem; color:#64748b;">💡 ใน JSX ของ React ใช้คำสั่ง <code class="inline-code">if</code> ภายในแท็กไม่ได้ จึงนิยมใช้ Ternary <code class="inline-code">{loading ? ... : ...}</code> และ <code class="inline-code">{error &amp;&amp; &lt;p&gt;...&lt;/p&gt;}</code> (แสดงเมื่อ error มีค่า) แทน หรือคำนวณด้วย <code class="inline-code">if</code> ไว้ก่อนส่วน <code class="inline-code">return</code> ซึ่งจะได้เห็นทั้งสองแบบในปฏิบัติการ</p>
                <p class="w3-ref">📚 อ่านเพิ่มเติมที่ W3Schools: <a href="https://www.w3schools.com/js/js_comparisons.asp" target="_blank" rel="noopener">JS Comparisons</a> · <a href="https://www.w3schools.com/js/js_logical.asp" target="_blank" rel="noopener">JS Logical</a> · <a href="https://www.w3schools.com/js/js_if_else.asp" target="_blank" rel="noopener">JS If Else</a> · <a href="https://www.w3schools.com/js/js_if_ternary.asp" target="_blank" rel="noopener">JS Ternary</a> · <a href="https://www.w3schools.com/js/js_2020.asp" target="_blank" rel="noopener">JS 2020 (?. และ ??)</a></p>

                <!-- ===================== 3.4 ===================== -->
                <h4 class="topic-title" id="topic-3-4">เรื่องที่ 3.4: ฟังก์ชันและ Arrow Function</h4>
                <p>
                    <strong>ฟังก์ชัน (Function)</strong> คือ "ชุดคำสั่งที่ตั้งชื่อไว้ เรียกใช้ซ้ำได้" เหมือนสูตรอาหารที่รับวัตถุดิบ (พารามิเตอร์) แล้วคืนอาหาร (ค่าที่ return) ES6 เพิ่มรูปแบบที่สั้นกว่าเรียกว่า <strong>Arrow Function</strong> ใช้เครื่องหมาย <code class="inline-code">=&gt;</code>
                </p>
                <table class="grading-table" style="margin: 15px 0;">
                    <tr style="background:#f1f5f9;">
                        <th width="42%">รูปแบบ</th>
                        <th>คำอธิบาย</th>
                    </tr>
                    <tr><td><code class="inline-code">function add(a, b) { return a + b; }</code></td><td>Function Declaration แบบดั้งเดิม (คอมโพเนนต์ของ React นิยมเขียนแบบนี้)</td></tr>
                    <tr><td><code class="inline-code">const add = (a, b) =&gt; { return a + b; };</code></td><td>Arrow Function แบบเต็ม</td></tr>
                    <tr><td><code class="inline-code">const add = (a, b) =&gt; a + b;</code></td><td>ถ้ามีคำสั่งเดียว ละปีกกาและ <code class="inline-code">return</code> ได้ (Implicit Return)</td></tr>
                    <tr><td><code class="inline-code">const double = n =&gt; n * 2;</code></td><td>พารามิเตอร์ตัวเดียว ละวงเล็บได้</td></tr>
                    <tr><td><code class="inline-code">const greet = (name = "ผู้เยี่ยมชม") =&gt; ...</code></td><td>Default Parameter: ค่าเริ่มต้นเมื่อไม่ได้ส่งค่ามา</td></tr>
                </table>
                <p>
                    แนวคิดสำคัญที่สุดสำหรับ React คือ <strong>Callback</strong>: ฟังก์ชันใน JavaScript ส่งไปให้ฟังก์ชันอื่นเรียกใช้ได้เหมือนค่าธรรมดา เช่น <code class="inline-code">students.map((s) =&gt; s.name)</code> คือการส่งฟังก์ชัน <code class="inline-code">(s) =&gt; s.name</code> ให้ map เรียกกับสมาชิกทุกตัว และ <code class="inline-code">onClick={() =&gt; setCount(count + 1)}</code> คือการส่งฟังก์ชันให้ปุ่มเรียกเมื่อถูกคลิก
                </p>
                <div class="code-window" data-run>
                    <div class="code-header">
                        <span class="code-lang">JavaScript</span>
                        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
                        </button>
                    </div>
                    <pre>// แบบดั้งเดิม
function calcAverage(a, b, c) {
  return (a + b + c) / 3;
}

// Arrow Function แบบย่อ (return อัตโนมัติ)
const add = (a, b) =&gt; a + b;
const greet = (name = "ผู้เยี่ยมชม") =&gt; `สวัสดี ${name}`;

console.log(calcAverage(80, 90, 70));
console.log(add(2, 3));
console.log(greet(), "|", greet("สมหญิง"));

// Callback: ส่งฟังก์ชันให้อีกฟังก์ชันเรียกใช้
const repeat = (times, action) =&gt; {
  for (let i = 1; i &lt;= times; i++) {
    action(i);
  }
};
repeat(3, (n) =&gt; console.log(`รอบที่ ${n}`));</pre>
                </div>
                <p class="w3-ref">📚 อ่านเพิ่มเติมที่ W3Schools: <a href="https://www.w3schools.com/js/js_functions.asp" target="_blank" rel="noopener">JS Functions</a> · <a href="https://www.w3schools.com/js/js_arrow_function.asp" target="_blank" rel="noopener">Function Arrow</a> · <a href="https://www.w3schools.com/js/js_function_parameters.asp" target="_blank" rel="noopener">Function Parameters</a> · <a href="https://www.w3schools.com/js/js_callback.asp" target="_blank" rel="noopener">Function Callbacks</a></p>

                <!-- ===================== 3.5 ===================== -->
                <h4 class="topic-title" id="topic-3-5">เรื่องที่ 3.5: Object, Array, Destructuring และ Spread/Rest</h4>
                <p>
                    ข้อมูลในเว็บจริงไม่ได้มีค่าเดียว <strong>Object</strong> ใช้เก็บข้อมูลหลายอย่างของสิ่งเดียวกันเป็นคู่ <code class="inline-code">key: value</code> (เช่น ข้อมูลนักศึกษา 1 คน) ส่วน <strong>Array</strong> ใช้เก็บรายการข้อมูลเรียงลำดับ (เช่น รายชื่อนักศึกษาทั้งห้อง) ซึ่งลำดับแรกเริ่มนับที่ 0 ข้อมูลที่ได้จาก API ส่วนใหญ่มาในรูป "Array ของ Object" และส่งผ่านเครือข่ายในรูปแบบข้อความที่เรียกว่า <strong>JSON</strong>
                </p>
                <div class="image-container">
                    <div>
                        <figure class="custom-image-box" style="max-width: 860px;">
                            <img src="img/unit3-destructuring-spread.svg" alt="แผนภาพ Destructuring ดึงค่าจาก Object เป็นตัวแปร และการใช้ Spread คัดลอก Array แทนการแก้ของเดิม" class="responsive-img">
                            <figcaption class="image-caption">
                                <strong>รูปที่ 3.2:</strong> Destructuring แกะค่าออกมาเป็นตัวแปร และ Spread คัดลอกแล้วต่อเติมโดยไม่แก้ข้อมูลเดิม
                                <span class="image-source">🔗 แหล่งอ้างอิงภาพ: ภาพประกอบจัดทำขึ้นสำหรับบทเรียนนี้</span>
                            </figcaption>
                        </figure>
                    </div>
                </div>
                <ul style="margin-left: 20px;">
                    <li><strong>Destructuring:</strong> แกะค่าออกจาก Object/Array มาเป็นตัวแปรในบรรทัดเดียว เช่น <code class="inline-code">const { name, score } = student;</code> ใช้บ่อยมากกับ props ของ React และค่าที่ได้จาก <code class="inline-code">useState</code> (<code class="inline-code">const [count, setCount] = useState(0)</code> ก็คือ Array Destructuring)</li>
                    <li><strong>Spread <code class="inline-code">...</code>:</strong> "กระจาย" สมาชิกทั้งหมดออกมา ใช้คัดลอกแล้วต่อเติม เช่น <code class="inline-code">[...scores, 70]</code> และ <code class="inline-code">{ ...student, score: 90 }</code> <strong>React ต้องการให้สร้างข้อมูลชุดใหม่ทุกครั้งที่เปลี่ยน State แทนการแก้ของเดิม</strong> เทคนิคนี้จึงสำคัญมาก</li>
                    <li><strong>Rest <code class="inline-code">...</code>:</strong> เครื่องหมายเดียวกันแต่ใช้ "รวบ" ค่าที่เหลือ เช่น <code class="inline-code">const { id, ...rest } = student;</code></li>
                </ul>
                <div class="code-window" data-run>
                    <div class="code-header">
                        <span class="code-lang">JavaScript</span>
                        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
                        </button>
                    </div>
                    <pre>// Object และ Array
const student = { id: 1, name: "สมชาย", score: 85 };
const scores = [80, 90];
console.log(student.name, student["score"], scores[0], scores.length);

// Destructuring
const { name, score } = student;
const [first, second] = scores;
console.log(name, score, first, second);

// Spread: คัดลอกแล้วต่อเติม ของเดิมไม่เปลี่ยน
const allScores = [...scores, 100];
const updated = { ...student, score: 90 };
console.log(scores, allScores);            // [80, 90] [80, 90, 100]
console.log(student.score, updated.score); // 85 90

// Rest: รวบค่าที่เหลือ
const { id, ...rest } = student;
console.log(id, rest);

// JSON: แปลง Object เป็นข้อความเพื่อส่งผ่านเครือข่าย และแปลงกลับ
const json = JSON.stringify(student);
console.log(json);
console.log(JSON.parse(json).name);</pre>
                </div>
                <p class="w3-ref">📚 อ่านเพิ่มเติมที่ W3Schools: <a href="https://www.w3schools.com/js/js_objects.asp" target="_blank" rel="noopener">JS Objects</a> · <a href="https://www.w3schools.com/js/js_arrays.asp" target="_blank" rel="noopener">JS Arrays</a> · <a href="https://www.w3schools.com/js/js_destructuring.asp" target="_blank" rel="noopener">JS Destructuring</a> · <a href="https://www.w3schools.com/js/js_es6.asp" target="_blank" rel="noopener">JS ES6 (Spread)</a> · <a href="https://www.w3schools.com/js/js_json.asp" target="_blank" rel="noopener">JS JSON</a></p>

                <!-- ===================== 3.6 ===================== -->
                <h4 class="topic-title" id="topic-3-6">เรื่องที่ 3.6: Array Methods ที่ใช้บ่อยใน React (map, filter, reduce และอื่น ๆ)</h4>
                <p>
                    React ใช้ <code class="inline-code">map()</code> ในการแปลง Array ข้อมูลเป็น Array ของ Component เพื่อแสดงผลเป็นรายการ (List) ซึ่งเป็นรูปแบบที่พบบ่อยที่สุดในการพัฒนาเว็บแอปพลิเคชัน และใช้เมธอดอื่น ๆ ในการค้นหา คัดกรอง เรียงลำดับ และสรุปข้อมูล ทุกเมธอดรับ <strong>Callback</strong> (เรื่องที่ 3.4) ที่จะถูกเรียกกับสมาชิกทีละตัว สิ่งที่ต้องจำคือ <strong>แต่ละเมธอดคืนค่าอะไรกลับมา</strong> ดังรูปที่ 3.3
                </p>
                <div class="image-container">
                    <div>
                        <figure class="custom-image-box" style="max-width: 860px;">
                            <img src="img/unit3-array-methods.svg" alt="แผนภาพเปรียบเทียบผลลัพธ์ของ map, filter, find, reduce และ sort เมื่อใช้กับ Array คะแนนชุดเดียวกัน" class="responsive-img">
                            <figcaption class="image-caption">
                                <strong>รูปที่ 3.3:</strong> Array คะแนนชุดเดียวกัน ผ่านเมธอดต่างกัน ได้ผลลัพธ์ต่างรูปแบบกัน
                                <span class="image-source">🔗 แหล่งอ้างอิงภาพ: ภาพประกอบจัดทำขึ้นสำหรับบทเรียนนี้</span>
                            </figcaption>
                        </figure>
                    </div>
                </div>
                <table class="grading-table" style="margin: 15px 0;">
                    <tr style="background:#f1f5f9;">
                        <th width="20%">เมธอด</th>
                        <th>คืนค่า</th>
                        <th width="38%">ใช้ใน React/Next.js เมื่อ</th>
                    </tr>
                    <tr><td><code class="inline-code">map()</code></td><td>Array ใหม่ <strong>ขนาดเท่าเดิม</strong> ที่แปลงแล้ว</td><td>แสดงรายการ: แปลงข้อมูลเป็น <code class="inline-code">&lt;li&gt;</code> หรือการ์ด</td></tr>
                    <tr><td><code class="inline-code">filter()</code></td><td>Array ใหม่ เฉพาะตัวที่เงื่อนไขเป็นจริง</td><td>ค้นหา คัดกรอง และลบรายการ (เก็บทุกตัวยกเว้นตัวที่ลบ)</td></tr>
                    <tr><td><code class="inline-code">find()</code></td><td>สมาชิก <strong>ตัวแรก</strong> ที่ตรงเงื่อนไข หรือ <code class="inline-code">undefined</code></td><td>หาข้อมูล 1 รายการจาก id</td></tr>
                    <tr><td><code class="inline-code">some()</code> / <code class="inline-code">every()</code></td><td>true/false: มีบางตัว / ทุกตัว ตรงเงื่อนไขหรือไม่</td><td>ตรวจสอบเงื่อนไข เช่น มีคนไม่ผ่านหรือไม่</td></tr>
                    <tr><td><code class="inline-code">includes()</code></td><td>true/false: มีค่านั้นอยู่หรือไม่ (ใช้กับข้อความได้)</td><td>ค้นหาคำในชื่อ</td></tr>
                    <tr><td><code class="inline-code">reduce()</code></td><td><strong>ค่าเดียว</strong> ที่ยุบรวมจากทุกตัว</td><td>ผลรวม ค่าเฉลี่ย ยอดรวมตะกร้าสินค้า</td></tr>
                    <tr><td><code class="inline-code">sort()</code></td><td>Array เดิมที่ถูกเรียงใหม่ (<strong>แก้ของเดิม</strong> จึงต้องคัดลอกด้วย <code class="inline-code">[...arr]</code> ก่อน)</td><td>เรียงตามคะแนนหรือชื่อ</td></tr>
                    <tr><td><code class="inline-code">forEach()</code></td><td>ไม่คืนค่า (undefined)</td><td>ทำงานกับทุกตัว เช่น พิมพ์ค่า (ใน JSX ใช้ map แทน)</td></tr>
                </table>
                <div class="code-window" data-run>
                    <div class="code-header">
                        <span class="code-lang">JavaScript</span>
                        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
                        </button>
                    </div>
                    <pre>const students = [
  { id: 1, name: "สมชาย", score: 85 },
  { id: 2, name: "สมหญิง", score: 92 },
  { id: 3, name: "สมศักดิ์", score: 70 },
];

const names = students.map((s) =&gt; s.name);
const passed = students.filter((s) =&gt; s.score &gt;= 80);
const total = students.reduce((sum, s) =&gt; sum + s.score, 0);

console.log("map:", names);
console.log("filter:", passed.map((s) =&gt; s.name));
console.log("reduce (รวม):", total, "| เฉลี่ย:", (total / students.length).toFixed(2));
console.log("find:", students.find((s) =&gt; s.id === 3));
console.log("some:", students.some((s) =&gt; s.score &lt; 75));

// sort: คัดลอกก่อนเรียง เพื่อไม่ให้ Array เดิมเปลี่ยน
const ranking = [...students].sort((a, b) =&gt; b.score - a.score);
console.log("sort:", ranking.map((s) =&gt; s.name).join(" &gt; "));

// Chaining: ต่อเมธอดเป็นสายเดียว อ่านจากบนลงล่าง
const report = students
  .filter((s) =&gt; s.score &gt;= 80)
  .map((s) =&gt; `${s.name} (${s.score})`)
  .join(", ");
console.log("chain:", report);</pre>
                </div>
                <p>
                    <strong>reduce ทำงานอย่างไร?</strong> <code class="inline-code">reduce((sum, s) =&gt; sum + s.score, 0)</code> เริ่มจาก <code class="inline-code">sum = 0</code> (ค่าเริ่มต้นตัวที่สอง) แล้วเรียก Callback กับทีละคน: รอบแรก 0 + 85 = 85, รอบสอง 85 + 92 = 177, รอบสาม 177 + 70 = 247 ค่าที่ return ในแต่ละรอบจะกลายเป็น <code class="inline-code">sum</code> ของรอบถัดไป เมื่อครบทุกตัวจึงได้ 247 เป็นผลลัพธ์
                </p>
                <p class="w3-ref">📚 อ่านเพิ่มเติมที่ W3Schools: <a href="https://www.w3schools.com/js/js_array_iteration.asp" target="_blank" rel="noopener">JS Array Iterations (map, filter, reduce)</a> · <a href="https://www.w3schools.com/js/js_array_search.asp" target="_blank" rel="noopener">JS Array Search (find, includes)</a> · <a href="https://www.w3schools.com/js/js_array_sort.asp" target="_blank" rel="noopener">JS Array Sort</a> · <a href="https://www.w3schools.com/js/js_array_methods.asp" target="_blank" rel="noopener">JS Array Methods</a></p>

                <!-- ===================== 3.7 ===================== -->
                <h4 class="topic-title" id="topic-3-7">เรื่องที่ 3.7: Modules — import และ export</h4>
                <p>
                    เมื่อโปรเจกต์ใหญ่ขึ้น การเขียนทุกอย่างในไฟล์เดียวจะอ่านยาก ES6 จึงเพิ่มระบบ <strong>Modules</strong> ให้แยกโค้ดเป็นหลายไฟล์ ไฟล์หนึ่ง <strong>export</strong> (ส่งออก) สิ่งที่ต้องการแบ่งปัน และอีกไฟล์ <strong>import</strong> (นำเข้า) มาใช้ ทุกไฟล์ใน Next.js คือ Module ซึ่งผู้เรียนใช้มาตั้งแต่หน่วยที่ 1 แล้ว เช่น <code class="inline-code">import Link from "next/link"</code>
                </p>
                <table class="grading-table" style="margin: 15px 0;">
                    <tr style="background:#f1f5f9;">
                        <th width="38%">ฝั่งส่งออก (export)</th>
                        <th width="38%">ฝั่งนำเข้า (import)</th>
                        <th>หมายเหตุ</th>
                    </tr>
                    <tr><td><code class="inline-code">export const PASS_SCORE = 50;</code><br><code class="inline-code">export function getGrade(s) {...}</code></td><td><code class="inline-code">import { getGrade, PASS_SCORE } from "@/lib/grades";</code></td><td><strong>Named Export</strong>: มีได้หลายตัวต่อไฟล์ ชื่อต้องตรงกันและอยู่ในปีกกา</td></tr>
                    <tr><td><code class="inline-code">export default function StudentBoard() {...}</code></td><td><code class="inline-code">import StudentBoard from "./StudentBoard";</code></td><td><strong>Default Export</strong>: มีได้ 1 ตัวต่อไฟล์ ไม่ต้องมีปีกกา (คอมโพเนนต์และไฟล์ page.js ใช้แบบนี้)</td></tr>
                    <tr><td colspan="2"><code class="inline-code">import { students } from "@/data/students";</code></td><td><code class="inline-code">@/</code> คือทางลัดไปที่โฟลเดอร์นอกสุดของโปรเจกต์ (ตั้งไว้ใน <code class="inline-code">jsconfig.json</code> ตั้งแต่หน่วยที่ 1) ไม่ต้องนับ <code class="inline-code">../../</code></td></tr>
                </table>
                <p class="w3-ref">📚 อ่านเพิ่มเติมที่ W3Schools: <a href="https://www.w3schools.com/js/js_modules.asp" target="_blank" rel="noopener">JS Modules</a> · <a href="https://www.w3schools.com/js/js_modules_export.asp" target="_blank" rel="noopener">Modules Export</a> · <a href="https://www.w3schools.com/js/js_modules_import.asp" target="_blank" rel="noopener">Modules Import</a></p>

                <!-- ===================== 3.8 ===================== -->
                <h4 class="topic-title" id="topic-3-8">เรื่องที่ 3.8: DOM และ Event — หัวใจของการโต้ตอบกับผู้ใช้</h4>
                <p>
                    <strong>DOM (Document Object Model)</strong> คือการที่เบราว์เซอร์แปลง HTML ทั้งหน้าให้กลายเป็น Object ที่ JavaScript อ่านและแก้ไขได้ ส่วน <strong>Event</strong> คือ "สิ่งที่เกิดขึ้น" บนหน้าเว็บ เช่น ผู้ใช้คลิก พิมพ์ หรือส่งฟอร์ม การทำหน้าเว็บเชิงโต้ตอบคือการ <strong>"ฟัง" Event แล้วตอบสนองด้วยการเปลี่ยนข้อมูลและหน้าจอ</strong>
                </p>
                <table class="grading-table" style="margin: 15px 0;">
                    <tr style="background:#f1f5f9;">
                        <th width="18%">Event</th>
                        <th>เกิดเมื่อ</th>
                        <th width="34%">ใน React เขียนเป็น</th>
                    </tr>
                    <tr><td><code class="inline-code">click</code></td><td>คลิกปุ่มหรือองค์ประกอบ</td><td><code class="inline-code">onClick={...}</code></td></tr>
                    <tr><td><code class="inline-code">input</code></td><td>พิมพ์ในช่องกรอกข้อมูล (ทุกตัวอักษร)</td><td><code class="inline-code">onChange={...}</code></td></tr>
                    <tr><td><code class="inline-code">change</code></td><td>เลือกค่าใน <code class="inline-code">&lt;select&gt;</code> หรือ checkbox</td><td><code class="inline-code">onChange={...}</code></td></tr>
                    <tr><td><code class="inline-code">submit</code></td><td>ส่งฟอร์ม (กดปุ่ม submit หรือกด Enter)</td><td><code class="inline-code">onSubmit={...}</code> + <code class="inline-code">event.preventDefault()</code></td></tr>
                    <tr><td><code class="inline-code">keydown</code></td><td>กดแป้นพิมพ์</td><td><code class="inline-code">onKeyDown={...}</code></td></tr>
                </table>
                <p>เมื่อ Event เกิดขึ้น ฟังก์ชันที่ฟังอยู่จะได้รับ <strong>Event Object</strong> ซึ่งมีข้อมูลสำคัญ เช่น <code class="inline-code">event.target.value</code> (ค่าในช่องที่พิมพ์) และ <code class="inline-code">event.preventDefault()</code> (ยกเลิกพฤติกรรมเริ่มต้น เช่น ไม่ให้ฟอร์มรีเฟรชหน้า)</p>

                <p><strong>🧪 ทดลองด้วยตนเอง:</strong> ลองกดปุ่มและพิมพ์ในกล่องด้านล่าง <strong>ก่อน</strong> รันโค้ด จะไม่มีอะไรเกิดขึ้น เพราะยังไม่มี JavaScript คอยฟัง Event จากนั้นกด ▶ รันโค้ด แล้วลองใหม่อีกครั้ง</p>
                <div class="dom-demo" id="dom-demo">
                    <p style="margin:0 0 12px;"><strong>พื้นที่ทดลอง DOM</strong></p>
                    <button type="button" id="demo-btn">กดฉัน</button>
                    <span id="demo-count" style="margin-left:10px;">ยังไม่ได้กด</span>
                    <div style="margin-top:14px;">
                        <input id="demo-input" placeholder="พิมพ์ชื่อของคุณที่นี่" aria-label="พิมพ์ชื่อ">
                        <p id="demo-greet" style="margin:8px 0 0;">สวัสดี ...</p>
                    </div>
                    <button type="button" id="demo-theme" style="margin-top:12px; background:#475569;">🌙 สลับโหมดมืด</button>
                </div>
                <div class="code-window" data-run>
                    <div class="code-header">
                        <span class="code-lang">JavaScript (DOM)</span>
                        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
                        </button>
                    </div>
                    <pre>// 1) เลือกองค์ประกอบในหน้าเว็บด้วย querySelector (# นำหน้า id)
const button = document.querySelector("#demo-btn");
const countText = document.querySelector("#demo-count");
const nameInput = document.querySelector("#demo-input");
const greetText = document.querySelector("#demo-greet");
const themeButton = document.querySelector("#demo-theme");
const box = document.querySelector("#dom-demo");

let count = 0;

// 2) ฟัง Event "click" แล้วสั่งเปลี่ยนข้อความในหน้าเว็บ
button.addEventListener("click", () =&gt; {
  count = count + 1;
  countText.textContent = `กดไปแล้ว ${count} ครั้ง`;
});

// 3) ฟัง Event "input" ทุกครั้งที่พิมพ์ อ่านค่าจาก event.target.value
nameInput.addEventListener("input", (event) =&gt; {
  const name = event.target.value.trim();
  greetText.textContent = name ? `สวัสดี ${name} 👋` : "สวัสดี ...";
});

// 4) เพิ่ม/ลบคลาส CSS เพื่อเปลี่ยนหน้าตา
themeButton.addEventListener("click", () =&gt; {
  box.classList.toggle("demo-dark");
});

console.log("ติดตั้ง Event Listener แล้ว ลองกดปุ่มและพิมพ์ด้านบนได้เลย");</pre>
                </div>
                <p style="font-size:0.9rem; color:#64748b;">💡 ถ้ากดรันซ้ำ จะมี Listener ซ้อนกันสองชุด กดปุ่มหนึ่งครั้งตัวเลขจะเพิ่มทีละ 2 (ลองดูได้!) ซึ่งเป็นข้อผิดพลาดที่พบบ่อยของการเขียน DOM โดยตรง ให้รีเฟรชหน้าเพื่อเริ่มใหม่</p>

                <p>
                    การเขียนแบบด้านบนเรียกว่า <strong>Imperative</strong> คือต้องสั่งทีละขั้นว่าเมื่อข้อมูลเปลี่ยนต้องไปแก้หน้าจอจุดไหน ซึ่งยุ่งยากมากเมื่อหน้าเว็บมีหลายส่วน React จึงเปลี่ยนเป็นแบบ <strong>Declarative</strong> คือเราเปลี่ยนแค่ "ข้อมูล (State)" แล้ว React จะวาดหน้าจอส่วนที่เกี่ยวข้องใหม่ให้เอง ดังรูปที่ 3.4 ปุ่มนับจำนวนเดียวกันเมื่อเขียนด้วย React (ตัวอย่าง Counter จากหน่วยที่ 1) จะไม่มี <code class="inline-code">querySelector</code> หรือ <code class="inline-code">textContent</code> เลย:
                </p>
                <div class="code-window">
                    <div class="code-header">
                        <span class="code-lang">React (JSX)</span>
                        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
                        </button>
                    </div>
                    <pre>"use client";
import { useState } from "react";

export default function Counter() {
  const [count, setCount] = useState(0);          // ข้อมูล (State)

  return (
    &lt;button onClick={() =&gt; setCount(count + 1)}&gt;   {/* ฟัง Event */}
      กดไปแล้ว {count} ครั้ง                           {/* หน้าจอเปลี่ยนตามเอง */}
    &lt;/button&gt;
  );
}</pre>
                </div>
                <div class="image-container">
                    <div>
                        <figure class="custom-image-box" style="max-width: 860px;">
                            <img src="img/unit3-dom-events.svg" alt="แผนภาพเปรียบเทียบลำดับการทำงานเมื่อคลิกปุ่มระหว่าง JavaScript DOM แบบ Imperative กับ React แบบ Declarative" class="responsive-img">
                            <figcaption class="image-caption">
                                <strong>รูปที่ 3.4:</strong> เมื่อผู้ใช้คลิกปุ่ม: DOM แบบดั้งเดิมต้องสั่งแก้หน้าจอเอง ส่วน React แก้แค่ State แล้วหน้าจอเปลี่ยนตามอัตโนมัติ
                                <span class="image-source">🔗 แหล่งอ้างอิงภาพ: ภาพประกอบจัดทำขึ้นสำหรับบทเรียนนี้</span>
                            </figcaption>
                        </figure>
                    </div>
                </div>
                <p style="font-size:0.9rem; color:#64748b;">💡 <code class="inline-code">useState</code> คือเครื่องมือของ React สำหรับเก็บข้อมูลที่เปลี่ยนแปลงได้ คืนค่ามาเป็น Array 2 ตัว คือ <strong>ค่าปัจจุบัน</strong> และ <strong>ฟังก์ชันสำหรับเปลี่ยนค่า</strong> (จึงใช้ Array Destructuring รับค่า) ในหน่วยนี้ใช้เท่าที่จำเป็นเพื่อให้หน้าเว็บโต้ตอบได้ รายละเอียดเชิงลึกจะเรียนในหน่วยที่ 5</p>
                <p class="w3-ref">📚 อ่านเพิ่มเติมที่ W3Schools: <a href="https://www.w3schools.com/js/js_htmldom.asp" target="_blank" rel="noopener">JS HTML DOM</a> · <a href="https://www.w3schools.com/js/js_htmldom_elements.asp" target="_blank" rel="noopener">Selecting Elements</a> · <a href="https://www.w3schools.com/js/js_htmldom_html.asp" target="_blank" rel="noopener">Changing HTML</a> · <a href="https://www.w3schools.com/js/js_htmldom_eventlistener.asp" target="_blank" rel="noopener">Event Listener</a> · <a href="https://www.w3schools.com/js/js_events.asp" target="_blank" rel="noopener">JS HTML Events</a></p>

                <!-- ===================== 3.9 ===================== -->
                <h4 class="topic-title" id="topic-3-9">เรื่องที่ 3.9: Asynchronous JavaScript (Promise, async/await และ fetch)</h4>
                <p>
                    การดึงข้อมูลจาก API เป็นการทำงานแบบ <strong>Asynchronous</strong> (ไม่รอผลลัพธ์ทันที) เพราะการส่งข้อมูลผ่านเครือข่ายใช้เวลา ถ้า JavaScript หยุดรอจนข้อมูลมาถึง หน้าเว็บจะค้างกดอะไรไม่ได้ JavaScript จึง "สั่งแล้วไปทำอย่างอื่นต่อ" เหมือนการสั่งอาหารแล้วได้ <strong>ใบรับคิว</strong> มาก่อน ระหว่างรอก็ทำอย่างอื่นได้ เมื่ออาหารเสร็จจึงไปรับ ใบรับคิวนี้ใน JavaScript เรียกว่า <strong>Promise</strong> ซึ่งแทนผลลัพธ์ที่จะเกิดขึ้นในอนาคต และ <strong>async/await</strong> ช่วยให้เขียนโค้ด Asynchronous ให้อ่านง่ายเหมือนโค้ดปกติ ซึ่งจะนำไปใช้จริงในหน่วยที่ 6 เมื่อดึงข้อมูลจาก Backend
                </p>
                <div class="image-container">
                    <div>
                        <figure class="custom-image-box" style="max-width: 860px;">
                            <img src="img/unit3-async.svg" alt="แผนภาพเปรียบเทียบการทำงานแบบ Synchronous กับ Asynchronous สถานะของ Promise และโค้ด async await" class="responsive-img">
                            <figcaption class="image-caption">
                                <strong>รูปที่ 3.5:</strong> Synchronous เทียบกับ Asynchronous, สถานะของ Promise และการใช้ async/await ในปฏิบัติการ
                                <span class="image-source">🔗 แหล่งอ้างอิงภาพ: ภาพประกอบจัดทำขึ้นสำหรับบทเรียนนี้</span>
                            </figcaption>
                        </figure>
                    </div>
                </div>
                <p>ทดลองดูลำดับการทำงาน สังเกตว่าข้อความที่ 3 แสดง <strong>หลังสุด</strong> ทั้งที่เขียนไว้ก่อนข้อความที่ 2:</p>
                <div class="code-window" data-run>
                    <div class="code-header">
                        <span class="code-lang">JavaScript</span>
                        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
                        </button>
                    </div>
                    <pre>console.log("1. สั่งอาหาร");
setTimeout(() =&gt; console.log("3. อาหารมาส่ง (หลัง 1 วินาที)"), 1000);
console.log("2. ระหว่างรอ ทำอย่างอื่นไปก่อน");</pre>
                </div>
                <p>ตัวอย่างการสร้าง Promise เอง และรอผลด้วย <code class="inline-code">async/await</code> (ฟังก์ชันที่มี <code class="inline-code">await</code> อยู่ข้างในต้องประกาศเป็น <code class="inline-code">async</code>):</p>
                <div class="code-window" data-run>
                    <div class="code-header">
                        <span class="code-lang">JavaScript</span>
                        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
                        </button>
                    </div>
                    <pre>async function getGreeting() {
  const message = await new Promise((resolve) =&gt; {
    setTimeout(() =&gt; resolve("โหลดข้อมูลสำเร็จ!"), 1000);
  });
  console.log(message);
}

console.log("เริ่มโหลด...");
await getGreeting();
console.log("ทำงานต่อหลังโหลดเสร็จ");</pre>
                </div>
                <p>
                    ในงานจริงการดึงข้อมูลอาจล้มเหลวได้ (เครือข่ายหลุด เซิร์ฟเวอร์ผิดพลาด) จึงต้องครอบด้วย <code class="inline-code">try / catch / finally</code>: โค้ดใน <code class="inline-code">try</code> ถ้าเกิด Error จะกระโดดไปที่ <code class="inline-code">catch</code> ทันที และ <code class="inline-code">finally</code> ทำงานเสมอไม่ว่าสำเร็จหรือล้มเหลว (เหมาะสำหรับปิดสถานะ "กำลังโหลด") ตัวอย่างต่อไปนี้ใช้ <strong><code class="inline-code">fetch()</code> ดึงไฟล์ JSON จริง</strong> จากเว็บไซต์บทเรียนนี้:
                </p>
                <div class="code-window" data-run>
                    <div class="code-header">
                        <span class="code-lang">JavaScript (fetch)</span>
                        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
                        </button>
                    </div>
                    <pre>async function loadStudents(url) {
  console.log("⏳ กำลังโหลด:", url);
  try {
    const response = await fetch(url);
    if (!response.ok) {
      throw new Error(`โหลดไม่สำเร็จ (สถานะ ${response.status})`);
    }
    const students = await response.json();
    console.log(`✅ ได้ข้อมูล ${students.length} คน`);
    students.forEach((s) =&gt; console.log(`- ${s.name}: ${s.score}`));
  } catch (error) {
    console.log("❌ เกิดข้อผิดพลาด:", error.message);
  } finally {
    console.log("จบการโหลด (finally ทำงานเสมอ)");
  }
}

await loadStudents("assets/data/students.json");
// ลองเปลี่ยนชื่อไฟล์ให้ผิด เช่น "assets/data/nofile.json" แล้วรันใหม่</pre>
                </div>
                <p class="w3-ref">📚 อ่านเพิ่มเติมที่ W3Schools: <a href="https://www.w3schools.com/js/js_async.asp" target="_blank" rel="noopener">Async Programming</a> · <a href="https://www.w3schools.com/js/js_async_promises.asp" target="_blank" rel="noopener">Async Promises</a> · <a href="https://www.w3schools.com/js/js_async_await.asp" target="_blank" rel="noopener">Async Await</a> · <a href="https://www.w3schools.com/js/js_api_fetch.asp" target="_blank" rel="noopener">JS Fetch API</a> · <a href="https://www.w3schools.com/js/js_errors.asp" target="_blank" rel="noopener">JS Errors (try...catch)</a></p>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="lesson-section" id="workshop">
                <h3>🛠️ 4. ตัวอย่างการปฏิบัติการทีละขั้นตอน (Step-by-Step Walkthrough)</h3>
                <p>ปฏิบัติการแบ่งเป็น 2 ช่วง <strong>ช่วงที่ 1 (ขั้นตอนที่ 1–5)</strong> ฝึกคำสั่ง JavaScript ทีละกลุ่มในไฟล์ฝึกหัด (Playground) แล้วรันด้วย Node.js ใน Docker เพื่อดูผลใน Terminal <strong>ช่วงที่ 2 (ขั้นตอนที่ 6–8)</strong> นำคำสั่งทั้งหมดมาสร้าง "ระบบคะแนนนักศึกษา" ในโปรเจกต์ <code class="inline-code">first-nextjs-app</code> ต่อจากหน่วยที่ 2 ดังรูปที่ 3.6</p>
                <div class="image-container">
                    <div>
                        <figure class="custom-image-box" style="max-width: 760px;">
                            <img src="img/unit3-app-loaded.png" alt="ภาพหน้าจอระบบคะแนนนักศึกษาที่โหลดข้อมูลแล้ว แสดงสรุปจำนวน คะแนนเฉลี่ย คะแนนสูงสุด จำนวนที่ผ่าน และรายชื่อพร้อมเกรด" class="responsive-img">
                            <figcaption class="image-caption">
                                <strong>รูปที่ 3.6:</strong> เป้าหมายของปฏิบัติการ — ระบบคะแนนนักศึกษาที่หน้า <code>/students</code>
                                <span class="image-source">🔗 แหล่งอ้างอิงภาพ: ภาพหน้าจอจากการรันโค้ดตัวอย่างจริง</span>
                            </figcaption>
                        </figure>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 1</div>
                    <div class="step-detail">
                        <strong>เตรียมสภาพแวดล้อมและสร้างโฟลเดอร์ Playground</strong>
                        <p>เปิด Docker Desktop และเปิดโฟลเดอร์ <code class="inline-code">first-nextjs-app</code> ใน VS Code จากนั้นใน Terminal:</p>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">PowerShell</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                            </div>
                            <pre>docker compose up -d
git switch main
git pull
git switch -c feature/js-playground
mkdir playground</pre>
                        </div>
                        <p>ไฟล์ฝึกหัดจะใช้นามสกุล <code class="inline-code">.mjs</code> ซึ่งบอก Node.js ว่าเป็น JavaScript แบบ Module (รองรับ <code class="inline-code">import</code>/<code class="inline-code">export</code> และ <code class="inline-code">await</code> นอกฟังก์ชันได้) และรันด้วยคำสั่งรูปแบบนี้:</p>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">PowerShell</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                            </div>
                            <pre>docker compose exec app node playground/ชื่อไฟล์.mjs</pre>
                        </div>
                        <p style="font-size:0.9rem; color:#64748b;">💡 <code class="inline-code">docker compose exec app</code> = สั่งคำสั่งภายใน Container ชื่อ app ที่กำลังทำงานอยู่, <code class="inline-code">node</code> = โปรแกรม Node.js ที่อยู่ใน Container (ไม่ต้องติดตั้งบน Windows) ผลลัพธ์จาก <code class="inline-code">console.log()</code> จะแสดงใน Terminal ของ VS Code ทันที</p>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 2</div>
                    <div class="step-detail">
                        <strong>Playground 1: ตัวแปร ชนิดข้อมูล เงื่อนไข ฟังก์ชัน และลูป</strong>
                        <p>สร้างไฟล์ <code class="inline-code">playground/01-basics.mjs</code> (ทบทวนเรื่องที่ 3.2–3.4):</p>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">playground/01-basics.mjs</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                            </div>
                            <pre>// ===== 1) ตัวแปร: const (ค่าคงที่) และ let (เปลี่ยนค่าได้) =====
const studentName = "สมชาย ใจดี";
let score = 72;
score = score + 5;
console.log("ชื่อ:", studentName, "| คะแนน:", score);

// ===== 2) ชนิดข้อมูล (Data Types) ตรวจด้วย typeof =====
console.log(typeof studentName, typeof score, typeof true, typeof undefined);

// ===== 3) Template Literal: แทรกค่าตัวแปรในข้อความด้วย ${} =====
const message = `นักศึกษา ${studentName} ได้คะแนน ${score} คะแนน`;
console.log(message);

// ===== 4) ค่าจากช่องกรอกข้อมูลเป็น "ข้อความ" เสมอ ต้องแปลงก่อนคำนวณ =====
const input = "45";
console.log("ไม่แปลง:", input + 5, "| แปลงแล้ว:", Number(input) + 5);

// ===== 5) เงื่อนไข if / else if / else =====
if (score &gt;= 80) {
  console.log("ผลการเรียน: ดีมาก");
} else if (score &gt;= 50) {
  console.log("ผลการเรียน: ผ่าน");
} else {
  console.log("ผลการเรียน: ไม่ผ่าน");
}

// ===== 6) Ternary: if-else แบบย่อในบรรทัดเดียว =====
const status = score &gt;= 50 ? "ผ่าน ✅" : "ไม่ผ่าน ❌";
console.log("สถานะ:", status);

// ===== 7) == เทียบแค่ค่า แต่ === เทียบทั้งค่าและชนิดข้อมูล (ควรใช้ ===) =====
console.log('"5" == 5 :', "5" == 5, '| "5" === 5 :', "5" === 5);

// ===== 8) Arrow Function และค่าเริ่มต้นของพารามิเตอร์ =====
const add = (a, b) =&gt; a + b;
const greet = (name = "ผู้เยี่ยมชม") =&gt; `สวัสดี ${name}`;
console.log(add(2, 3), "|", greet(), "|", greet("สมหญิง"));

// ===== 9) วนซ้ำด้วย for...of =====
const subjects = ["HTML", "CSS", "JavaScript"];
for (const subject of subjects) {
  console.log("กำลังเรียน:", subject);
}</pre>
                        </div>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">PowerShell</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                            </div>
                            <pre>docker compose exec app node playground/01-basics.mjs</pre>
                        </div>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">ผลลัพธ์ที่คาดว่าจะเห็น</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                            </div>
                            <pre>ชื่อ: สมชาย ใจดี | คะแนน: 77
string number boolean undefined
นักศึกษา สมชาย ใจดี ได้คะแนน 77 คะแนน
ไม่แปลง: 455 | แปลงแล้ว: 50
ผลการเรียน: ผ่าน
สถานะ: ผ่าน ✅
"5" == 5 : true | "5" === 5 : false
5 | สวัสดี ผู้เยี่ยมชม | สวัสดี สมหญิง
กำลังเรียน: HTML
กำลังเรียน: CSS
กำลังเรียน: JavaScript</pre>
                        </div>
                        <p><strong>สังเกตและทดลอง:</strong> (1) <code class="inline-code">"45" + 5</code> ได้ <code class="inline-code">455</code> เพราะข้อความ + ตัวเลข คือการต่อข้อความ นี่คือเหตุผลที่ระบบคะแนนต้องใช้ <code class="inline-code">Number(score)</code> (2) ลองเปลี่ยน <code class="inline-code">let score = 72</code> เป็น <code class="inline-code">80</code> และ <code class="inline-code">30</code> แล้วรันใหม่ ดูว่าผลการเรียนเปลี่ยนตามเงื่อนไขหรือไม่ (3) ลองเปลี่ยน <code class="inline-code">let</code> เป็น <code class="inline-code">const</code> แล้วรัน จะเกิด Error <code class="inline-code">TypeError: Assignment to constant variable.</code> เพราะ const กำหนดค่าใหม่ไม่ได้ (เปลี่ยนกลับก่อนทำขั้นต่อไป)</p>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 3</div>
                    <div class="step-detail">
                        <strong>Playground 2: Object, Array, Destructuring, Spread/Rest และ JSON</strong>
                        <p>สร้างไฟล์ <code class="inline-code">playground/02-objects-arrays.mjs</code> (ทบทวนเรื่องที่ 3.3 และ 3.5):</p>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">playground/02-objects-arrays.mjs</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                            </div>
                            <pre>// ===== 1) Object: เก็บข้อมูลหลายอย่างของสิ่งเดียวกันเป็นคู่ key: value =====
const student = {
  id: 1,
  name: "สมชาย",
  score: 85,
  contact: { email: "somchai@example.com" },
};
console.log(student.name, student["score"], student.contact.email);

// ===== 2) Array: รายการข้อมูลเรียงลำดับ (ลำดับแรกคือ 0) =====
const scores = [85, 92, 47];
console.log("ตัวแรก:", scores[0], "| จำนวน:", scores.length);

// ===== 3) Destructuring: แกะค่าออกจาก Object/Array มาเป็นตัวแปร =====
const { name, score } = student;
const [first, second] = scores;
console.log(name, score, first, second);

// ===== 4) Spread (...): คัดลอกแล้วต่อเติม โดยไม่แก้ของเดิม =====
const moreScores = [...scores, 70];
const updated = { ...student, score: 90 };
console.log("Array เดิม:", scores, "| Array ใหม่:", moreScores);
console.log("คะแนนเดิม:", student.score, "| คะแนนใหม่:", updated.score);

// ===== 5) Rest (...): รวบค่าที่เหลือทั้งหมดไว้ในตัวแปรเดียว =====
const { id, ...withoutId } = student;
console.log("id:", id, "| ส่วนที่เหลือ:", withoutId);
const countItems = (...items) =&gt; items.length;
console.log("จำนวนที่ส่งมา:", countItems("ก", "ข", "ค"));

// ===== 6) Optional Chaining (?.) และ Nullish Coalescing (??) =====
console.log(student.address?.city);
console.log(student.nickname ?? "ไม่มีชื่อเล่น");

// ===== 7) JSON: แปลง Object ↔ ข้อความ ใช้รับส่งข้อมูลกับ API =====
const json = JSON.stringify(student);
console.log(json);
console.log(JSON.parse(json).contact.email);</pre>
                        </div>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">PowerShell</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                            </div>
                            <pre>docker compose exec app node playground/02-objects-arrays.mjs</pre>
                        </div>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">ผลลัพธ์ที่คาดว่าจะเห็น</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                            </div>
                            <pre>สมชาย 85 somchai@example.com
ตัวแรก: 85 | จำนวน: 3
สมชาย 85 85 92
Array เดิม: [ 85, 92, 47 ] | Array ใหม่: [ 85, 92, 47, 70 ]
คะแนนเดิม: 85 | คะแนนใหม่: 90
id: 1 | ส่วนที่เหลือ: { name: 'สมชาย', score: 85, contact: { email: 'somchai@example.com' } }
จำนวนที่ส่งมา: 3
undefined
ไม่มีชื่อเล่น
{"id":1,"name":"สมชาย","score":85,"contact":{"email":"somchai@example.com"}}
somchai@example.com</pre>
                        </div>
                        <p><strong>สังเกต:</strong> Array เดิม <code class="inline-code">[ 85, 92, 47 ]</code> และคะแนนเดิม 85 ไม่เปลี่ยนแปลงหลังใช้ Spread นี่คือหลักการ "สร้างใหม่ ไม่แก้ของเดิม" ที่ระบบคะแนนจะใช้ตอนเพิ่มนักศึกษา และบรรทัด <code class="inline-code">undefined</code> มาจาก <code class="inline-code">student.address?.city</code> ซึ่งไม่ Error แม้ไม่มี <code class="inline-code">address</code> (ลองลบ <code class="inline-code">?</code> ออกแล้วรัน จะเกิด <code class="inline-code">TypeError: Cannot read properties of undefined (reading 'city')</code>)</p>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 4</div>
                    <div class="step-detail">
                        <strong>Playground 3: Array Methods (forEach, map, filter, find, some, every, includes, reduce, sort)</strong>
                        <p>สร้างไฟล์ <code class="inline-code">playground/03-array-methods.mjs</code> (ทบทวนเรื่องที่ 3.6):</p>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">playground/03-array-methods.mjs</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                            </div>
                            <pre>const students = [
  { id: 1, name: "สมชาย", score: 85 },
  { id: 2, name: "สมหญิง", score: 92 },
  { id: 3, name: "สมศักดิ์", score: 47 },
  { id: 4, name: "มานี", score: 68 },
];

// forEach: ทำงานกับสมาชิกทุกตัว (ไม่คืนค่าอะไรกลับมา)
students.forEach((s) =&gt; console.log(`- ${s.name}`));

// map: แปลงสมาชิกทุกตัว ได้ Array ใหม่ที่ขนาดเท่าเดิม
const names = students.map((s) =&gt; s.name);
console.log("map:", names);

// filter: คัดเฉพาะสมาชิกที่เงื่อนไขเป็นจริง
const passed = students.filter((s) =&gt; s.score &gt;= 50);
console.log("filter:", passed.map((s) =&gt; s.name));

// find: หาสมาชิกตัวแรกที่ตรงเงื่อนไข (ได้ 1 ตัว หรือ undefined)
console.log("find:", students.find((s) =&gt; s.id === 2));

// some / every: ถามว่า "มีบางตัว" / "ทุกตัว" ตรงเงื่อนไขหรือไม่
console.log("some:", students.some((s) =&gt; s.score &lt; 50), "| every:", students.every((s) =&gt; s.score &gt;= 50));

// includes: มีค่านี้อยู่ใน Array หรือในข้อความหรือไม่
console.log("includes:", names.includes("มานี"), "สมชาย".includes("ชาย"));

// reduce: ยุบสมาชิกทุกตัวให้เหลือค่าเดียว เช่น ผลรวม
const total = students.reduce((sum, s) =&gt; sum + s.score, 0);
console.log("reduce:", total, "| เฉลี่ย:", (total / students.length).toFixed(2));

// sort: เรียงลำดับ (คัดลอกด้วย [...] ก่อน เพราะ sort แก้ Array เดิม)
const ranking = [...students].sort((a, b) =&gt; b.score - a.score);
console.log("sort:", ranking.map((s) =&gt; `${s.name}(${s.score})`).join(" &gt; "));

// Chaining: ต่อหลายเมธอดเป็นสายเดียว อ่านจากบนลงล่าง
const report = students
  .filter((s) =&gt; s.score &gt;= 50)
  .map((s) =&gt; `${s.name} ผ่าน`)
  .join(", ");
console.log("chain:", report);</pre>
                        </div>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">PowerShell</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                            </div>
                            <pre>docker compose exec app node playground/03-array-methods.mjs</pre>
                        </div>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">ผลลัพธ์ที่คาดว่าจะเห็น</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                            </div>
                            <pre>- สมชาย
- สมหญิง
- สมศักดิ์
- มานี
map: [ 'สมชาย', 'สมหญิง', 'สมศักดิ์', 'มานี' ]
filter: [ 'สมชาย', 'สมหญิง', 'มานี' ]
find: { id: 2, name: 'สมหญิง', score: 92 }
some: true | every: false
includes: true true
reduce: 292 | เฉลี่ย: 73.00
sort: สมหญิง(92) &gt; สมชาย(85) &gt; มานี(68) &gt; สมศักดิ์(47)
chain: สมชาย ผ่าน, สมหญิง ผ่าน, มานี ผ่าน</pre>
                        </div>
                        <p><strong>ทดลองเพิ่มเติม:</strong> เพิ่มนักศึกษาอีก 1 คนใน Array แล้วรันใหม่ ดูว่าผลลัพธ์ทุกบรรทัดเปลี่ยนตามโดยไม่ต้องแก้โค้ดส่วนอื่นเลย นี่คือข้อดีของการเขียนด้วย Array Methods</p>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 5</div>
                    <div class="step-detail">
                        <strong>Playground 4: Asynchronous — setTimeout, Promise, async/await, try/catch และ fetch</strong>
                        <p>สร้างไฟล์ <code class="inline-code">playground/04-async.mjs</code> (ทบทวนเรื่องที่ 3.9) ส่วนสุดท้ายจะ <code class="inline-code">fetch</code> ข้อมูลจาก API <code class="inline-code">/api/hello</code> ที่สร้างไว้ในหน่วยที่ 1 ซึ่งเซิร์ฟเวอร์ Next.js ใน Container เดียวกันให้บริการอยู่ที่พอร์ต 3000:</p>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">playground/04-async.mjs</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                            </div>
                            <pre>const wait = (ms) =&gt; new Promise((resolve) =&gt; setTimeout(resolve, ms));

// ===== 1) ลำดับการทำงาน: โค้ด Asynchronous ไม่หยุดรอ =====
console.log("1. สั่งอาหาร");
setTimeout(() =&gt; console.log("3. อาหารมาส่ง (หลังผ่านไป 1 วินาที)"), 1000);
console.log("2. ระหว่างรอ ทำอย่างอื่นไปก่อน");

await wait(1500);

// ===== 2) Promise: "สัญญา" ว่าจะมีผลลัพธ์ในอนาคต (สำเร็จ หรือ ล้มเหลว) =====
function checkScore(score) {
  return new Promise((resolve, reject) =&gt; {
    setTimeout(() =&gt; {
      if (score &gt;= 0 &amp;&amp; score &lt;= 100) {
        resolve(`คะแนน ${score} ถูกต้อง`);
      } else {
        reject(new Error(`คะแนน ${score} อยู่นอกช่วง 0-100`));
      }
    }, 500);
  });
}

// ===== 3) async/await + try / catch / finally =====
async function main() {
  try {
    console.log(await checkScore(85));
    console.log(await checkScore(150));
    console.log("บรรทัดนี้จะไม่ถูกทำ เพราะบรรทัดก่อนหน้าเกิด Error");
  } catch (error) {
    console.log("จับข้อผิดพลาดได้:", error.message);
  } finally {
    console.log("ตรวจคะแนนเสร็จสิ้น (finally ทำเสมอ)");
  }
}
await main();

// ===== 4) fetch: ดึงข้อมูลจาก API ของโปรเจกต์เราเอง (สร้างไว้ในหน่วยที่ 1) =====
const response = await fetch("http://127.0.0.1:3000/api/hello");
console.log("สถานะ HTTP:", response.status);
const data = await response.json();
console.log("ข้อมูลที่ได้:", data);</pre>
                        </div>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">PowerShell</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                            </div>
                            <pre>docker compose exec app node playground/04-async.mjs</pre>
                        </div>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">ผลลัพธ์ที่คาดว่าจะเห็น (ข้อมูลส่วนท้ายจะตรงกับ /api/hello ของแต่ละคน)</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                            </div>
                            <pre>1. สั่งอาหาร
2. ระหว่างรอ ทำอย่างอื่นไปก่อน
3. อาหารมาส่ง (หลังผ่านไป 1 วินาที)
คะแนน 85 ถูกต้อง
จับข้อผิดพลาดได้: คะแนน 150 อยู่นอกช่วง 0-100
ตรวจคะแนนเสร็จสิ้น (finally ทำเสมอ)
สถานะ HTTP: 200
ข้อมูลที่ได้: {
  message: 'สวัสดีจาก Backend ของ Next.js',
  course: 'Front-End Development',
  students: 35
}</pre>
                        </div>
                        <ul style="margin-left: 20px;">
                            <li>สังเกตว่าข้อความ <strong>3</strong> แสดงหลังข้อความ <strong>2</strong> และทั้งโปรแกรมใช้เวลาประมาณ 2–3 วินาที เพราะ <code class="inline-code">await</code> รอผลทีละขั้น</li>
                            <li>เมื่อ <code class="inline-code">checkScore(150)</code> ถูก <code class="inline-code">reject</code> โปรแกรมกระโดดไปที่ <code class="inline-code">catch</code> ทันที บรรทัด "บรรทัดนี้จะไม่ถูกทำ" จึงไม่แสดง แต่ <code class="inline-code">finally</code> ยังทำงาน</li>
                            <li>ใช้ <code class="inline-code">127.0.0.1</code> แทน <code class="inline-code">localhost</code> เพื่อบังคับใช้ IPv4 (เหตุผลเดียวกับที่เรียนในรายวิชาฐานข้อมูล) ถ้าขึ้น <code class="inline-code">fetch failed ... ECONNREFUSED</code> แสดงว่าเซิร์ฟเวอร์ Next.js ยังไม่ทำงาน ให้ตรวจด้วย <code class="inline-code">docker compose logs -f app</code></li>
                        </ul>
                        <p>บันทึกงานช่วงที่ 1 และรวมเข้า <code class="inline-code">main</code>:</p>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">PowerShell</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                            </div>
                            <pre>git add playground
git commit -m "docs: add JavaScript ES6+ playground exercises"
git switch main
git merge feature/js-playground
git branch -d feature/js-playground</pre>
                        </div>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 6</div>
                    <div class="step-detail">
                        <strong>ระบบคะแนน (1): ข้อมูล ฟังก์ชันคำนวณเกรด และ API</strong>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">PowerShell</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                            </div>
                            <pre>git switch -c feature/student-board</pre>
                        </div>
                        <p>สร้างโฟลเดอร์ <code class="inline-code">data/</code> ที่โฟลเดอร์นอกสุดของโปรเจกต์ (ระดับเดียวกับ <code class="inline-code">app/</code>) แล้วสร้างไฟล์ข้อมูลตัวอย่าง (Mock Data) ที่ <strong>export</strong> Array ของ Object:</p>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">data/students.js</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                            </div>
                            <pre>export const students = [
  { id: 1, name: "สมชาย ใจดี", score: 85 },
  { id: 2, name: "สมหญิง รักเรียน", score: 92 },
  { id: 3, name: "สมศักดิ์ ตั้งใจ", score: 47 },
  { id: 4, name: "มานี มีนา", score: 68 },
  { id: 5, name: "ปิติ ชูใจ", score: 76 },
  { id: 6, name: "วีระ กล้าหาญ", score: 58 },
];</pre>
                        </div>
                        <p>สร้างโฟลเดอร์ <code class="inline-code">lib/</code> (ระดับเดียวกับ <code class="inline-code">app/</code>) สำหรับเก็บฟังก์ชันคำนวณที่ใช้ซ้ำได้ แล้วสร้างไฟล์ <code class="inline-code">lib/grades.js</code>:</p>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">lib/grades.js</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                            </div>
                            <pre>export const PASS_SCORE = 50;

// เกณฑ์ตัดเกรด 8 ระดับ เรียงจากคะแนนมากไปน้อย
const gradeTable = [
  { min: 80, grade: "4" },
  { min: 75, grade: "3.5" },
  { min: 70, grade: "3" },
  { min: 65, grade: "2.5" },
  { min: 60, grade: "2" },
  { min: 55, grade: "1.5" },
  { min: 50, grade: "1" },
  { min: 0, grade: "0" },
];

// find() คืนแถวแรกที่คะแนนถึงเกณฑ์ เช่น 76 ไม่ถึง 80 แต่ถึง 75 จึงได้เกรด 3.5
export const getGrade = (score) =&gt; gradeTable.find((row) =&gt; score &gt;= row.min).grade;

export function summarize(list) {
  const count = list.length;
  if (count === 0) {
    return { count: 0, average: 0, max: 0, passed: 0 };
  }

  const total = list.reduce((sum, s) =&gt; sum + s.score, 0);

  return {
    count,
    average: total / count,
    max: Math.max(...list.map((s) =&gt; s.score)),
    passed: list.filter((s) =&gt; s.score &gt;= PASS_SCORE).length,
  };
}</pre>
                        </div>
                        <table class="grading-table" style="margin: 10px 0;">
                            <tr style="background:#f1f5f9;">
                                <th width="34%">โค้ด</th>
                                <th>คำสั่ง ES6+ ที่ใช้</th>
                            </tr>
                            <tr><td><code class="inline-code">export const</code> / <code class="inline-code">export function</code></td><td>Named Export ให้ไฟล์อื่น import ไปใช้ (เรื่องที่ 3.7)</td></tr>
                            <tr><td><code class="inline-code">gradeTable</code></td><td>Array ของ Object เก็บเกณฑ์ตัดเกรด 8 ระดับ (แทนการเขียน if ยาว 8 ชั้น)</td></tr>
                            <tr><td><code class="inline-code">gradeTable.find((row) =&gt; score &gt;= row.min)</code></td><td><code class="inline-code">find</code> + Arrow Function: หาแถวแรกที่คะแนนถึงเกณฑ์ แล้วอ่าน <code class="inline-code">.grade</code></td></tr>
                            <tr><td><code class="inline-code">if (count === 0) return ...</code></td><td>ป้องกันการหารด้วยศูนย์เมื่อไม่มีข้อมูล</td></tr>
                            <tr><td><code class="inline-code">list.reduce((sum, s) =&gt; sum + s.score, 0)</code></td><td><code class="inline-code">reduce</code> รวมคะแนนทุกคน</td></tr>
                            <tr><td><code class="inline-code">Math.max(...list.map((s) =&gt; s.score))</code></td><td><code class="inline-code">map</code> ดึงเฉพาะคะแนน แล้ว <strong>Spread</strong> ส่งเข้า <code class="inline-code">Math.max</code> ทีละตัว</td></tr>
                            <tr><td><code class="inline-code">list.filter(...).length</code></td><td><code class="inline-code">filter</code> คัดคนที่ผ่าน แล้วนับจำนวน</td></tr>
                        </table>
                        <p>สร้าง API สำหรับส่งข้อมูลนักศึกษา โดยสร้างโฟลเดอร์ <code class="inline-code">app/api/students/</code> และไฟล์ <code class="inline-code">route.js</code> (โครงสร้างเดียวกับ <code class="inline-code">/api/hello</code> ในหน่วยที่ 1):</p>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">app/api/students/route.js</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                            </div>
                            <pre>import { students } from "@/data/students";

export async function GET() {
  return Response.json(students);
}</pre>
                        </div>
                        <p>เปิดเบราว์เซอร์ไปที่ <code class="inline-code">http://localhost:3000/api/students</code> ต้องเห็นข้อมูล JSON ของนักศึกษาทั้ง 6 คน ซึ่ง <code class="inline-code">Response.json()</code> แปลงจาก Array ของ Object ให้อัตโนมัติ (เทียบได้กับ <code class="inline-code">JSON.stringify</code> ในขั้นตอนที่ 3)</p>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">ผลลัพธ์ที่คาดว่าจะเห็น</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                            </div>
                            <pre>[{"id":1,"name":"สมชาย ใจดี","score":85},{"id":2,"name":"สมหญิง รักเรียน","score":92},{"id":3,"name":"สมศักดิ์ ตั้งใจ","score":47},{"id":4,"name":"มานี มีนา","score":68},{"id":5,"name":"ปิติ ชูใจ","score":76},{"id":6,"name":"วีระ กล้าหาญ","score":58}]</pre>
                        </div>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 7</div>
                    <div class="step-detail">
                        <strong>ระบบคะแนน (2): หน้าเว็บเชิงโต้ตอบ — โหลด ค้นหา เรียงลำดับ เพิ่ม และลบ</strong>
                        <p>สร้างไฟล์ <code class="inline-code">app/components/StudentBoard.js</code> เป็น <strong>Client Component</strong> (ต้องโต้ตอบกับผู้ใช้และใช้ <code class="inline-code">useState</code>) ไฟล์นี้รวมคำสั่งเกือบทุกตัวที่เรียนในหน่วยนี้ ให้อ่านคำอธิบายในตารางด้านล่างประกอบ:</p>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">app/components/StudentBoard.js</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                            </div>
                            <pre>"use client";

import { useState } from "react";
import { getGrade, summarize, PASS_SCORE } from "@/lib/grades";

const wait = (ms) =&gt; new Promise((resolve) =&gt; setTimeout(resolve, ms));

export default function StudentBoard() {
  const [students, setStudents] = useState([]);
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState("");
  const [query, setQuery] = useState("");
  const [sortBy, setSortBy] = useState("score");
  const [name, setName] = useState("");
  const [score, setScore] = useState("");

  // ===== โหลดข้อมูลจาก API แบบ Asynchronous =====
  async function loadStudents() {
    setLoading(true);
    setError("");
    try {
      await wait(800); // จำลองว่าเครือข่ายช้า จะได้เห็นสถานะ "กำลังโหลด"
      const response = await fetch("/api/students");
      if (!response.ok) {
        throw new Error(`โหลดข้อมูลไม่สำเร็จ (สถานะ ${response.status})`);
      }
      const data = await response.json();
      setStudents(data);
    } catch (err) {
      setError(err.message);
    } finally {
      setLoading(false);
    }
  }

  // ===== เพิ่มนักศึกษาจากฟอร์ม =====
  function handleAdd(event) {
    event.preventDefault(); // ไม่ให้เบราว์เซอร์โหลดหน้าใหม่เมื่อกดส่งฟอร์ม
    const trimmedName = name.trim();
    const value = Number(score);

    if (trimmedName === "" || score === "" || value &lt; 0 || value &gt; 100) {
      setError("กรุณากรอกชื่อ และคะแนนระหว่าง 0–100");
      return;
    }

    const newStudent = { id: Date.now(), name: trimmedName, score: value };
    setStudents([...students, newStudent]);
    setName("");
    setScore("");
    setError("");
  }

  // ===== ลบนักศึกษาตาม id =====
  function handleDelete(id) {
    setStudents(students.filter((s) =&gt; s.id !== id));
  }

  // ===== คำนวณสิ่งที่จะแสดงจากข้อมูลปัจจุบัน =====
  const keyword = query.trim().toLowerCase();
  const visible = [...students]
    .filter((s) =&gt; s.name.toLowerCase().includes(keyword))
    .sort((a, b) =&gt; (sortBy === "score" ? b.score - a.score : a.name.localeCompare(b.name, "th")));
  const { count, average, max, passed } = summarize(visible);

  // ===== เลือกสิ่งที่จะแสดงในส่วนรายชื่อด้วย if / else if / else =====
  let listContent;
  if (loading &amp;&amp; students.length === 0) {
    listContent = &lt;p className="rounded-xl bg-white p-8 text-center text-slate-500 shadow"&gt;⏳ กำลังโหลดข้อมูล...&lt;/p&gt;;
  } else if (students.length === 0) {
    listContent = (
      &lt;p className="rounded-xl border-2 border-dashed border-slate-300 p-8 text-center text-slate-500"&gt;
        ยังไม่มีข้อมูล กดปุ่ม &amp;quot;โหลดข้อมูลจากเซิร์ฟเวอร์&amp;quot; เพื่อเริ่มต้น
      &lt;/p&gt;
    );
  } else if (visible.length === 0) {
    listContent = &lt;p className="rounded-xl bg-white p-8 text-center text-slate-500 shadow"&gt;ไม่พบชื่อที่ตรงกับ &amp;quot;{query}&amp;quot;&lt;/p&gt;;
  } else {
    listContent = (
      &lt;ul className="divide-y divide-slate-100 rounded-xl bg-white shadow"&gt;
        {visible.map((s) =&gt; {
          const grade = getGrade(s.score);
          const badgeColor = s.score &gt;= PASS_SCORE ? "bg-green-100 text-green-700" : "bg-red-100 text-red-700";
          return (
            &lt;li key={s.id} className="flex items-center justify-between gap-3 p-4"&gt;
              &lt;span className="font-medium"&gt;{s.name}&lt;/span&gt;
              &lt;span className="flex items-center gap-3"&gt;
                &lt;span className="text-slate-600"&gt;{s.score} คะแนน&lt;/span&gt;
                &lt;span className={`rounded-full px-3 py-1 text-sm font-semibold ${badgeColor}`}&gt;เกรด {grade}&lt;/span&gt;
                &lt;button
                  type="button"
                  onClick={() =&gt; handleDelete(s.id)}
                  aria-label={`ลบ ${s.name}`}
                  className="rounded px-2 py-1 text-slate-400 hover:bg-red-50 hover:text-red-600"
                &gt;
                  ✕
                &lt;/button&gt;
              &lt;/span&gt;
            &lt;/li&gt;
          );
        })}
      &lt;/ul&gt;
    );
  }

  return (
    &lt;div className="space-y-6"&gt;
      {/* แถบเครื่องมือ: โหลดข้อมูล ค้นหา เรียงลำดับ */}
      &lt;div className="flex flex-col gap-3 rounded-xl bg-white p-4 shadow sm:flex-row sm:items-center"&gt;
        &lt;button
          type="button"
          onClick={loadStudents}
          disabled={loading}
          className="rounded-lg bg-brand px-4 py-2 font-semibold text-white hover:bg-brand-dark disabled:opacity-60"
        &gt;
          {loading ? "กำลังโหลด..." : "โหลดข้อมูลจากเซิร์ฟเวอร์"}
        &lt;/button&gt;
        &lt;input
          type="search"
          value={query}
          onChange={(e) =&gt; setQuery(e.target.value)}
          placeholder="🔍 ค้นหาชื่อ..."
          aria-label="ค้นหาชื่อนักศึกษา"
          className="flex-1 rounded-lg border border-slate-300 px-3 py-2"
        /&gt;
        &lt;select
          value={sortBy}
          onChange={(e) =&gt; setSortBy(e.target.value)}
          aria-label="เรียงลำดับ"
          className="rounded-lg border border-slate-300 px-3 py-2"
        &gt;
          &lt;option value="score"&gt;เรียงตามคะแนน (มาก → น้อย)&lt;/option&gt;
          &lt;option value="name"&gt;เรียงตามชื่อ (ก → ฮ)&lt;/option&gt;
        &lt;/select&gt;
      &lt;/div&gt;

      {error &amp;&amp; (
        &lt;p role="alert" className="rounded-lg bg-red-50 p-3 text-red-700"&gt;
          ⚠️ {error}
        &lt;/p&gt;
      )}

      {/* สรุปผลด้วย reduce / Math.max / filter */}
      &lt;dl className="grid grid-cols-2 gap-4 md:grid-cols-4"&gt;
        &lt;div className="rounded-xl bg-white p-4 shadow"&gt;
          &lt;dt className="text-sm text-slate-500"&gt;จำนวนที่แสดง&lt;/dt&gt;
          &lt;dd className="text-2xl font-bold"&gt;{count} คน&lt;/dd&gt;
        &lt;/div&gt;
        &lt;div className="rounded-xl bg-white p-4 shadow"&gt;
          &lt;dt className="text-sm text-slate-500"&gt;คะแนนเฉลี่ย&lt;/dt&gt;
          &lt;dd className="text-2xl font-bold"&gt;{average.toFixed(1)}&lt;/dd&gt;
        &lt;/div&gt;
        &lt;div className="rounded-xl bg-white p-4 shadow"&gt;
          &lt;dt className="text-sm text-slate-500"&gt;คะแนนสูงสุด&lt;/dt&gt;
          &lt;dd className="text-2xl font-bold"&gt;{max}&lt;/dd&gt;
        &lt;/div&gt;
        &lt;div className="rounded-xl bg-white p-4 shadow"&gt;
          &lt;dt className="text-sm text-slate-500"&gt;ผ่านเกณฑ์ {PASS_SCORE}&lt;/dt&gt;
          &lt;dd className="text-2xl font-bold text-green-600"&gt;{passed} คน&lt;/dd&gt;
        &lt;/div&gt;
      &lt;/dl&gt;

      {/* รายชื่อ: เนื้อหาที่เลือกไว้ด้วย if / else ด้านบน */}
      {listContent}

      {/* ฟอร์มเพิ่มนักศึกษา */}
      &lt;form onSubmit={handleAdd} className="flex flex-col gap-3 rounded-xl bg-white p-4 shadow sm:flex-row"&gt;
        &lt;input
          value={name}
          onChange={(e) =&gt; setName(e.target.value)}
          placeholder="ชื่อ-นามสกุล"
          aria-label="ชื่อ-นามสกุล"
          className="flex-1 rounded-lg border border-slate-300 px-3 py-2"
        /&gt;
        &lt;input
          type="number"
          value={score}
          onChange={(e) =&gt; setScore(e.target.value)}
          placeholder="คะแนน"
          aria-label="คะแนน"
          className="rounded-lg border border-slate-300 px-3 py-2 sm:w-32"
        /&gt;
        &lt;button type="submit" className="rounded-lg bg-slate-900 px-4 py-2 font-semibold text-white hover:bg-slate-700"&gt;
          + เพิ่มนักศึกษา
        &lt;/button&gt;
      &lt;/form&gt;
    &lt;/div&gt;
  );
}</pre>
                        </div>
                        <p><strong>อธิบายโค้ดตามลำดับ และคำสั่ง JavaScript ที่ใช้</strong></p>
                        <table class="grading-table" style="margin: 10px 0;">
                            <tr style="background:#f1f5f9;">
                                <th width="28%">ส่วนของโค้ด</th>
                                <th>การทำงาน</th>
                                <th width="20%">เรื่องที่เกี่ยวข้อง</th>
                            </tr>
                            <tr><td><code class="inline-code">import { getGrade, summarize, PASS_SCORE } from "@/lib/grades"</code></td><td>นำฟังก์ชันจากขั้นตอนที่ 6 มาใช้</td><td>3.7 Modules</td></tr>
                            <tr><td><code class="inline-code">const wait = (ms) =&gt; new Promise(...)</code></td><td>ฟังก์ชันหน่วงเวลา (คืน Promise ที่ resolve เมื่อครบเวลา) ใช้จำลองเครือข่ายช้า</td><td>3.4, 3.9</td></tr>
                            <tr><td><code class="inline-code">const [students, setStudents] = useState([])</code> และอีก 6 ตัว</td><td>เก็บข้อมูลที่เปลี่ยนได้: รายชื่อ สถานะกำลังโหลด ข้อความ Error คำค้นหา วิธีเรียง และค่าในฟอร์ม</td><td>3.5 Destructuring</td></tr>
                            <tr><td><code class="inline-code">async function loadStudents()</code></td><td>ตั้ง <code class="inline-code">loading</code> เป็น true → <code class="inline-code">await</code> ดึงข้อมูล → ถ้า <code class="inline-code">!response.ok</code> ให้ <code class="inline-code">throw</code> Error → เก็บข้อมูล → <code class="inline-code">finally</code> ปิดสถานะโหลด</td><td>3.9 async/await, try/catch</td></tr>
                            <tr><td><code class="inline-code">handleAdd(event)</code></td><td><code class="inline-code">event.preventDefault()</code> กันหน้ารีเฟรช → <code class="inline-code">trim()</code> ตัดช่องว่าง → <code class="inline-code">Number()</code> แปลงคะแนน → ตรวจด้วย <code class="inline-code">||</code> → สร้าง Array ใหม่ด้วย <code class="inline-code">[...students, newStudent]</code></td><td>3.2, 3.3, 3.5 Spread, 3.8 Event</td></tr>
                            <tr><td><code class="inline-code">handleDelete(id)</code></td><td>"ลบ" คือการสร้าง Array ใหม่ที่ <code class="inline-code">filter</code> เก็บทุกคนยกเว้น id ที่ลบ</td><td>3.6 filter</td></tr>
                            <tr><td><code class="inline-code">const visible = [...students].filter(...).sort(...)</code></td><td>Chaining: คัดลอก → กรองตามคำค้นหา (<code class="inline-code">toLowerCase</code> + <code class="inline-code">includes</code>) → เรียงตามคะแนนหรือชื่อ (<code class="inline-code">localeCompare</code> เรียงภาษาไทย ก–ฮ ได้ถูกต้อง)</td><td>3.6</td></tr>
                            <tr><td><code class="inline-code">const { count, average, max, passed } = summarize(visible)</code></td><td>คำนวณสรุปใหม่ทุกครั้งที่ข้อมูลเปลี่ยน แล้วแกะค่าด้วย Destructuring</td><td>3.5, 3.6</td></tr>
                            <tr><td><code class="inline-code">let listContent; if ... else if ... else</code></td><td>เลือกสิ่งที่จะแสดง: กำลังโหลด / ยังไม่มีข้อมูล / ค้นหาไม่พบ / รายชื่อ</td><td>3.3 if-else</td></tr>
                            <tr><td><code class="inline-code">visible.map((s) =&gt; &lt;li key={s.id}&gt;...)</code></td><td>แปลงข้อมูลแต่ละคนเป็นแถว <code class="inline-code">&lt;li&gt;</code> (ต้องมี <code class="inline-code">key</code> ไม่ซ้ำ)</td><td>3.6 map</td></tr>
                            <tr><td><code class="inline-code">{loading ? "กำลังโหลด..." : "..."}</code>, <code class="inline-code">{error &amp;&amp; (...)}</code></td><td>Ternary เลือกข้อความปุ่ม และ <code class="inline-code">&amp;&amp;</code> แสดงข้อความ Error เมื่อมีค่า</td><td>3.3</td></tr>
                            <tr><td><code class="inline-code">`... ${badgeColor}`</code></td><td>Template Literal ประกอบคลาส Tailwind ตามผลการเรียน (เขียนชื่อคลาสเต็มทุกตัวตามข้อควรระวังในหน่วยที่ 2)</td><td>3.2</td></tr>
                            <tr><td><code class="inline-code">onClick</code>, <code class="inline-code">onChange={(e) =&gt; setQuery(e.target.value)}</code>, <code class="inline-code">onSubmit</code></td><td>ฟัง Event ของปุ่ม ช่องค้นหา ตัวเลือก และฟอร์ม แล้วเปลี่ยน State</td><td>3.8 Event</td></tr>
                        </table>
                        <p>สร้างหน้า <code class="inline-code">/students</code> โดยสร้างโฟลเดอร์ <code class="inline-code">app/students/</code> และไฟล์ <code class="inline-code">page.js</code> (Server Component ที่นำ StudentBoard มาวาง):</p>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">app/students/page.js</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                            </div>
                            <pre>import StudentBoard from "@/app/components/StudentBoard";

export const metadata = {
  title: "ระบบคะแนนนักศึกษา | Somchai.dev",
};

export default function StudentsPage() {
  return (
    &lt;section className="mx-auto max-w-4xl px-4 py-12"&gt;
      &lt;h1 className="mb-2 text-3xl font-bold"&gt;ระบบคะแนนนักศึกษา&lt;/h1&gt;
      &lt;p className="mb-8 text-slate-600"&gt;
        ตัวอย่างการใช้ Modern JavaScript (ES6+) สร้างหน้าเว็บเชิงโต้ตอบ: โหลดข้อมูล ค้นหา เรียงลำดับ เพิ่ม และลบ
      &lt;/p&gt;
      &lt;StudentBoard /&gt;
    &lt;/section&gt;
  );
}</pre>
                        </div>
                        <p>เพิ่มเมนู "ระบบคะแนน" ใน <code class="inline-code">app/components/Navbar.js</code> จากหน่วยที่ 2 <strong>2 จุด</strong> โดยวางต่อจากรายการ "เกี่ยวกับฉัน":</p>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">app/components/Navbar.js (เพิ่ม 2 จุด)</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                            </div>
                            <pre>{/* จุดที่ 1: ในเมนูจอใหญ่ ต่อจาก &lt;li&gt; ของ "เกี่ยวกับฉัน" */}
&lt;li&gt;
  &lt;Link href="/students" className="hover:text-blue-300"&gt;ระบบคะแนน&lt;/Link&gt;
&lt;/li&gt;

{/* จุดที่ 2: ใน Sidebar มือถือ ต่อจาก &lt;li&gt; ของ "เกี่ยวกับฉัน" */}
&lt;li&gt;
  &lt;Link href="/students" onClick={closeMenus} className="block rounded px-3 py-2 hover:bg-slate-800"&gt;ระบบคะแนน&lt;/Link&gt;
&lt;/li&gt;</pre>
                        </div>
                        <p><strong>ทดสอบให้ครบทุกสถานการณ์</strong> ที่ <code class="inline-code">http://localhost:3000/students</code> แล้วเทียบกับภาพต่อไปนี้:</p>
                        <table class="grading-table" style="margin: 10px 0;">
                            <tr style="background:#f1f5f9;">
                                <th width="34%">ทดสอบ</th>
                                <th>สิ่งที่ต้องเกิดขึ้น</th>
                            </tr>
                            <tr><td>1. เปิดหน้าครั้งแรก</td><td>สรุปเป็น 0 ทั้งหมด และมีข้อความ "ยังไม่มีข้อมูล" (รูปที่ 3.7)</td></tr>
                            <tr><td>2. กด "โหลดข้อมูลจากเซิร์ฟเวอร์"</td><td>ปุ่มเปลี่ยนเป็น "กำลังโหลด..." และกดซ้ำไม่ได้ประมาณ 1 วินาที (รูปที่ 3.8) จากนั้นแสดงรายชื่อ 6 คน เรียงคะแนนจากมากไปน้อย สมศักดิ์ได้ป้ายสีแดงเกรด 0 (รูปที่ 3.6)</td></tr>
                            <tr><td>3. พิมพ์ "สม" ในช่องค้นหา และเลือกเรียงตามชื่อ</td><td>เหลือ 3 คน เรียง ก–ฮ และตัวเลขสรุปคำนวณใหม่เฉพาะ 3 คนนี้ (รูปที่ 3.9)</td></tr>
                            <tr><td>4. ค้นหาชื่อที่ไม่มี</td><td>แสดงข้อความ "ไม่พบชื่อที่ตรงกับ ..." (รูปที่ 3.10)</td></tr>
                            <tr><td>5. ล้างช่องค้นหา แล้วกด "+ เพิ่มนักศึกษา" โดยไม่กรอกข้อมูล</td><td>แสดงข้อความเตือนสีแดง (รูปที่ 3.11) ลองกรอกคะแนน 150 ด้วย ต้องเตือนเช่นกัน</td></tr>
                            <tr><td>6. กรอกชื่อ (ลองเว้นวรรคหน้า-หลังชื่อ) และคะแนน 81 แล้วกดเพิ่ม</td><td>มีรายชื่อใหม่ (ช่องว่างหน้า-หลังถูกตัดออก) จำนวนเป็น 7 คน ค่าเฉลี่ยเปลี่ยน และช่องกรอกถูกล้าง (รูปที่ 3.12)</td></tr>
                            <tr><td>7. กด ✕ ที่ท้ายแถว</td><td>รายชื่อนั้นหายไปและตัวเลขสรุปคำนวณใหม่</td></tr>
                            <tr><td>8. ทดสอบบนมือถือ (F12 → Ctrl+Shift+M)</td><td>แถบเครื่องมือและฟอร์มเรียงแนวตั้ง การ์ดสรุปเป็น 2 คอลัมน์ (รูปที่ 3.13)</td></tr>
                        </table>
                        <div style="display:flex; flex-wrap:wrap; gap:16px; justify-content:center; align-items:flex-start;">
                            <figure class="custom-image-box" style="max-width: 420px; margin: 10px 0;">
                                <img src="img/unit3-app-empty.png" alt="ภาพหน้าจอระบบคะแนนตอนเปิดครั้งแรก ยังไม่มีข้อมูล" class="responsive-img">
                                <figcaption class="image-caption"><strong>รูปที่ 3.7:</strong> เปิดครั้งแรก — ยังไม่มีข้อมูล<span class="image-source">🔗 แหล่งอ้างอิงภาพ: ภาพหน้าจอจากการรันโค้ดตัวอย่างจริง</span></figcaption>
                            </figure>
                            <figure class="custom-image-box" style="max-width: 420px; margin: 10px 0;">
                                <img src="img/unit3-app-loading.png" alt="ภาพหน้าจอระหว่างโหลดข้อมูล ปุ่มแสดงคำว่ากำลังโหลด" class="responsive-img">
                                <figcaption class="image-caption"><strong>รูปที่ 3.8:</strong> ระหว่าง <code>await</code> — ปุ่มแสดง "กำลังโหลด..."<span class="image-source">🔗 แหล่งอ้างอิงภาพ: ภาพหน้าจอจากการรันโค้ดตัวอย่างจริง</span></figcaption>
                            </figure>
                            <figure class="custom-image-box" style="max-width: 420px; margin: 10px 0;">
                                <img src="img/unit3-app-search.png" alt="ภาพหน้าจอค้นหาคำว่า สม และเรียงตามชื่อ เหลือ 3 คน" class="responsive-img">
                                <figcaption class="image-caption"><strong>รูปที่ 3.9:</strong> ค้นหา "สม" + เรียงตามชื่อ (filter, includes, sort)<span class="image-source">🔗 แหล่งอ้างอิงภาพ: ภาพหน้าจอจากการรันโค้ดตัวอย่างจริง</span></figcaption>
                            </figure>
                            <figure class="custom-image-box" style="max-width: 420px; margin: 10px 0;">
                                <img src="img/unit3-app-noresult.png" alt="ภาพหน้าจอค้นหาชื่อที่ไม่มี แสดงข้อความไม่พบชื่อ" class="responsive-img">
                                <figcaption class="image-caption"><strong>รูปที่ 3.10:</strong> ค้นหาไม่พบ (if / else if)<span class="image-source">🔗 แหล่งอ้างอิงภาพ: ภาพหน้าจอจากการรันโค้ดตัวอย่างจริง</span></figcaption>
                            </figure>
                            <figure class="custom-image-box" style="max-width: 420px; margin: 10px 0;">
                                <img src="img/unit3-app-validation.png" alt="ภาพหน้าจอข้อความเตือนสีแดงเมื่อกดเพิ่มโดยไม่กรอกข้อมูล" class="responsive-img">
                                <figcaption class="image-caption"><strong>รูปที่ 3.11:</strong> ตรวจข้อมูลก่อนเพิ่ม (|| และ return ออกจากฟังก์ชัน)<span class="image-source">🔗 แหล่งอ้างอิงภาพ: ภาพหน้าจอจากการรันโค้ดตัวอย่างจริง</span></figcaption>
                            </figure>
                            <figure class="custom-image-box" style="max-width: 420px; margin: 10px 0;">
                                <img src="img/unit3-app-added.png" alt="ภาพหน้าจอหลังเพิ่มนักศึกษาใหม่ จำนวนเป็น 7 คน" class="responsive-img">
                                <figcaption class="image-caption"><strong>รูปที่ 3.12:</strong> เพิ่มนักศึกษาใหม่ด้วย Spread แล้วสรุปคำนวณใหม่<span class="image-source">🔗 แหล่งอ้างอิงภาพ: ภาพหน้าจอจากการรันโค้ดตัวอย่างจริง</span></figcaption>
                            </figure>
                            <figure class="custom-image-box" style="max-width: 260px; margin: 10px 0;">
                                <img src="img/unit3-app-mobile.png" alt="ภาพหน้าจอระบบคะแนนบนมือถือ องค์ประกอบเรียงแนวตั้ง" class="responsive-img">
                                <figcaption class="image-caption"><strong>รูปที่ 3.13:</strong> บนมือถือ (390px)<span class="image-source">🔗 แหล่งอ้างอิงภาพ: ภาพหน้าจอจากการรันโค้ดตัวอย่างจริง</span></figcaption>
                            </figure>
                        </div>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 8</div>
                    <div class="step-detail">
                        <strong>ตรวจหาข้อผิดพลาดด้วย Console แล้วส่งงานขึ้น GitHub</strong>
                        <p><strong>8.1 ทดลองใช้ console.log ติดตามการทำงาน:</strong> เพิ่มบรรทัดต่อไปนี้ในฟังก์ชัน <code class="inline-code">loadStudents</code> ของ <code class="inline-code">StudentBoard.js</code> ต่อจากบรรทัด <code class="inline-code">const data = await response.json();</code> แล้วกดโหลดข้อมูล เปิด <kbd>F12</kbd> แท็บ <strong>Console</strong> จะเห็นข้อมูลที่ได้รับ (คลิกที่ลูกศรเพื่อกางดูแต่ละคนได้) — นี่คือวิธีตรวจว่าข้อมูลที่ได้หน้าตาเป็นอย่างไรก่อนนำไปแสดงผล</p>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">app/components/StudentBoard.js (เพิ่มชั่วคราว)</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                            </div>
                            <pre>console.log("ข้อมูลจาก API:", data);</pre>
                        </div>
                        <p>ส่วนโค้ดฝั่งเซิร์ฟเวอร์ (เช่น ถ้าเพิ่ม <code class="inline-code">console.log</code> ใน <code class="inline-code">app/api/students/route.js</code>) จะไม่ปรากฏใน F12 แต่ปรากฏใน Terminal ที่รัน <code class="inline-code">docker compose logs -f app</code> ตามรูปที่ 3.1 เมื่อทดลองเสร็จให้ลบบรรทัด console.log ที่เพิ่มออก</p>
                        <div class="error-alert-box">
                            <span class="error-title">⚠️ ข้อผิดพลาดที่พบบ่อยในหน่วยนี้และวิธีแก้</span>
                            <ul style="margin: 10px 0 0 20px;">
                                <li><strong><code>You're importing a module that depends on `useState` into a React Server Component module.</code></strong> — ลืมเขียน <code>"use client";</code> เป็นบรรทัดแรกของ <code>StudentBoard.js</code></li>
                                <li><strong><code>Module not found: Can't resolve '@/lib/grades'</code></strong> — สร้างโฟลเดอร์ <code>lib</code> หรือ <code>data</code> ผิดที่ (ต้องอยู่ระดับเดียวกับ <code>app/</code> ไม่ใช่ภายใน <code>app/</code>) หรือสะกดชื่อไฟล์ผิด</li>
                                <li><strong><code>Cannot read properties of undefined (reading 'map')</code></strong> — เรียก <code>.map()</code> กับตัวแปรที่ยังไม่มีค่า มักเกิดจากลืมกำหนดค่าเริ่มต้น <code>useState([])</code> หรือพิมพ์ชื่อตัวแปรผิด</li>
                                <li><strong>คำเตือน <code>Each child in a list should have a unique "key" prop</code> ใน Console</strong> — ลืมใส่ <code>key={s.id}</code> ให้ <code>&lt;li&gt;</code> ภายใน <code>map()</code></li>
                                <li><strong>เพิ่มคะแนนแล้วค่าเฉลี่ยเพี้ยน เช่น เป็นตัวเลขยาวมาก</strong> — ลืมแปลงค่าด้วย <code>Number()</code> คะแนนจึงถูกเก็บเป็นข้อความ และ <code>+</code> กลายเป็นการต่อข้อความ (ขั้นตอนที่ 2)</li>
                                <li><strong>กดโหลดแล้วขึ้น <code>โหลดข้อมูลไม่สำเร็จ (สถานะ 404)</code></strong> — ตรวจว่าไฟล์อยู่ที่ <code>app/api/students/route.js</code> และเปิด <code>/api/students</code> ในเบราว์เซอร์ได้</li>
                            </ul>
                        </div>
                        <p><strong>8.2 ตรวจคุณภาพและส่งงาน:</strong></p>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">PowerShell</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                            </div>
                            <pre>docker compose exec app npm run lint
git add .
git commit -m "feat: add interactive student score board"
git switch main
git merge feature/student-board
git branch -d feature/student-board
git push</pre>
                        </div>
                        <p style="font-size:0.9rem; color:#64748b;">💡 ESLint ตรวจทั้งไฟล์ในโฟลเดอร์ <code class="inline-code">playground/</code> และ <code class="inline-code">app/</code> ถ้าไม่มีข้อความแจ้งเตือนแสดงว่าผ่าน และควรทดสอบ Build ด้วยวิธีเดียวกับหน่วยที่ 2 ขั้นตอนที่ 7 ก่อนส่งงาน</p>
                    </div>
                </div>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="assignment-box">
                <h3>📝 5. งานที่มอบหมายและเกณฑ์การประเมินผล (Assignment)</h3>
                <p><strong>ใบงานที่ 3: แปลงและแสดงผลข้อมูลด้วย ES6+ — ต่อยอดระบบคะแนนนักศึกษา</strong></p>
                <br>
                <p><strong>คำสั่ง:</strong> ทำงานบน Branch ใหม่ชื่อ <code class="inline-code">feature/assignment-3</code> แล้ว:</p>
                <ul style="margin-left: 20px;">
                    <li>เพิ่มข้อมูลนักศึกษาในไฟล์ <code class="inline-code">data/students.js</code> ให้มีอย่างน้อย 10 คน และมีคะแนนกระจายครบทั้งผ่านและไม่ผ่าน</li>
                    <li>ใช้ <code class="inline-code">filter()</code> เพิ่มตัวเลือก <code class="inline-code">&lt;select&gt;</code> "แสดง: ทั้งหมด / เฉพาะผู้ที่ได้ 80 คะแนนขึ้นไป / เฉพาะผู้ไม่ผ่าน" ที่ทำงานร่วมกับช่องค้นหาได้</li>
                    <li>ใช้ <code class="inline-code">reduce()</code> เพิ่มการ์ดสรุป <strong>"คะแนนรวม"</strong> และใช้ <code class="inline-code">Math.min</code> กับ Spread เพิ่มการ์ด <strong>"คะแนนต่ำสุด"</strong> ในฟังก์ชัน <code class="inline-code">summarize</code></li>
                    <li>(ท้าทาย) ใช้ <code class="inline-code">reduce()</code> นับจำนวนนักศึกษาแต่ละเกรด เช่น <code class="inline-code">{ "4": 3, "3.5": 1, ... }</code> แล้วแสดงผลเป็นรายการ</li>
                    <li>สร้างไฟล์ <code class="inline-code">playground/05-my-practice.mjs</code> ที่มีตัวอย่างของตนเองอย่างน้อย 5 คำสั่งจากหน่วยนี้ (เช่น Template Literal, Destructuring, map, filter, async/await) พร้อมคอมเมนต์อธิบาย</li>
                    <li>Merge เข้า <code class="inline-code">main</code> และ Push ขึ้น GitHub แล้วส่งลิงก์ Repository พร้อมภาพหน้าจอ: (1) หน้า <code class="inline-code">/students</code> ที่ใช้ตัวเลือกกรองแล้ว (2) ผลการรัน <code class="inline-code">05-my-practice.mjs</code> ใน Terminal</li>
                </ul>
                <br>
                <p><strong>📊 เกณฑ์การตัดคะแนน (คะแนนเต็ม 5 คะแนน):</strong></p>
                <ul style="margin-left: 20px; font-size: 0.9rem; color: #78350f;">
                    <li>• ใช้ map() แสดงรายชื่อนักศึกษาอย่างน้อย 10 คนได้ถูกต้อง (1 คะแนน)</li>
                    <li>• ใช้ filter() ทำตัวเลือกกรองข้อมูลที่ทำงานร่วมกับการค้นหาได้ถูกต้อง (1 คะแนน)</li>
                    <li>• ใช้ reduce() และ Math.min คำนวณคะแนนรวมและคะแนนต่ำสุดได้ถูกต้อง (1 คะแนน)</li>
                    <li>• ไฟล์ 05-my-practice.mjs รันได้ ใช้คำสั่ง ES6+ ครบ 5 คำสั่งพร้อมคำอธิบาย (1 คะแนน)</li>
                    <li>• ทำงานบน Branch, Commit ที่สื่อความหมาย, Merge และ Push ขึ้น GitHub ครบถ้วน (1 คะแนน)</li>
                </ul>
            </section>

        </div>
    </div>

    <script src="../assets/js/script.js?v=<?php echo filemtime(__DIR__ . "/../assets/js/script.js"); ?>"></script>
    <script src="../assets/js/lightbox.js?v=<?php echo filemtime(__DIR__ . "/../assets/js/lightbox.js"); ?>"></script>
    <script>
        // ตัวรันโค้ดในหน้าบทเรียน: ใช้กับกล่องโค้ดที่มีแอตทริบิวต์ data-run
        (function () {
            const AsyncFunction = Object.getPrototypeOf(async function () {}).constructor;

            function format(value) {
                if (typeof value === "string") return value;
                if (value === undefined) return "undefined";
                if (value instanceof Error) return value.name + ": " + value.message;
                if (typeof value === "function") return "ƒ " + (value.name || "anonymous") + "()";
                try {
                    return JSON.stringify(value);
                } catch (e) {
                    return String(value);
                }
            }

            document.querySelectorAll(".code-window[data-run]").forEach(function (win) {
                const pre = win.querySelector("pre");
                const header = win.querySelector(".code-header");
                const copyBtn = header.querySelector(".copy-icon-btn");
                const original = pre.textContent;
                pre.setAttribute("contenteditable", "true");
                pre.setAttribute("spellcheck", "false");

                const actions = document.createElement("div");
                actions.className = "run-actions";
                const resetBtn = document.createElement("button");
                resetBtn.type = "button";
                resetBtn.className = "reset-btn";
                resetBtn.textContent = "↺ คืนค่าเดิม";
                const runBtn = document.createElement("button");
                runBtn.type = "button";
                runBtn.className = "run-btn";
                runBtn.textContent = "▶ รันโค้ด";
                header.appendChild(actions);
                actions.append(resetBtn, runBtn, copyBtn);

                const output = document.createElement("div");
                output.className = "run-output";
                output.hidden = true;
                win.appendChild(output);

                function write(kind, args) {
                    const line = document.createElement("div");
                    line.className = "run-line " + kind;
                    line.textContent = args.map(format).join(" ");
                    output.appendChild(line);
                }

                const fakeConsole = {
                    log: (...args) => write("log", args),
                    info: (...args) => write("log", args),
                    warn: (...args) => write("warn", args),
                    error: (...args) => write("err", args),
                    table: (data) => write("log", [data]),
                };

                runBtn.addEventListener("click", async function () {
                    output.hidden = false;
                    output.textContent = "";
                    runBtn.disabled = true;
                    try {
                        await new AsyncFunction("console", pre.innerText)(fakeConsole);
                    } catch (error) {
                        write("err", ["❌ " + error.name + ": " + error.message]);
                    } finally {
                        runBtn.disabled = false;
                    }
                    if (!output.childElementCount) {
                        write("muted", ["(โค้ดทำงานแล้ว แต่ไม่มีคำสั่ง console.log)"]);
                    }
                });

                resetBtn.addEventListener("click", function () {
                    pre.textContent = original;
                    output.hidden = true;
                    output.textContent = "";
                });
            });
        })();
    </script>
</body>

</html>
