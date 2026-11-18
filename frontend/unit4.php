<?php
$base_dir = "../";
$active_nav = "frontend";
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน่วยที่ 4: การพัฒนาโปรแกรมแบบพิมพ์ปลอดภัยด้วย TypeScript</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css?v=<?php echo filemtime(__DIR__ . "/../assets/css/style.css"); ?>">
    <style>
        .w3-ref { font-size: 0.9rem; color: #475569; background: #f0fdf4; border-left: 4px solid #04aa6d; padding: 8px 12px; border-radius: 6px; margin: 12px 0; }
        .w3-ref a { color: #047857; font-weight: 600; }
        .try-hint { font-size: 0.9rem; color: #1e3a8a; background: #eff6ff; border-left: 4px solid #2563eb; padding: 8px 12px; border-radius: 6px; margin: 12px 0; }
        .tool-badge { display: inline-block; border-radius: 999px; padding: 1px 10px; font-size: 0.8rem; font-weight: 700; color: #fff; }
        .tb-tsc { background: #2563eb; } .tb-tsx { background: #7c3aed; } .tb-tsnode { background: #b45309; } .tb-node { background: #15803d; }
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
            <h2>หน่วยที่ 4: การพัฒนาโปรแกรมแบบพิมพ์ปลอดภัยด้วย TypeScript</h2>
            <p>สัปดาห์ที่ 4 | เวลาเรียน 5 ชั่วโมง (ทฤษฎี 1 ชม. ปฏิบัติ 4 ชม.)</p>
        </div>
    </div>

    <div class="container">
        <div class="single-layout">

            <section class="lesson-section">
                <div class="key-concept-box">
                    <strong>🎯 สารสำคัญ (Key Concepts)</strong>
                    <p>
                        <strong>TypeScript</strong> คือ JavaScript ที่เพิ่ม "ชนิดข้อมูล (Type)" เข้าไป ทำให้ตรวจพบข้อผิดพลาดได้ตั้งแต่ตอนเขียนโค้ด ก่อนที่ผู้ใช้จะเจอปัญหาจริง เช่น การนำข้อความ <code class="inline-code">"85"</code> ไปบวกกับตัวเลขแล้วได้ <code class="inline-code">855</code> ซึ่งเป็นปัญหาที่พบในหน่วยที่ 3 TypeScript จึงกลายเป็นมาตรฐานของโปรเจกต์ React และ Next.js ในปัจจุบัน
                    </p>
                    <p>
                        หน่วยนี้เรียนไวยากรณ์ TypeScript ตามลำดับหัวข้อของ W3Schools โดยทุกตัวอย่าง <strong>กดรันและตรวจ Type ได้ในหน้าเว็บทันที</strong> เรียนความแตกต่างของเครื่องมือ <code class="inline-code">tsc</code>, <code class="inline-code">tsx</code>, <code class="inline-code">ts-node</code> และ <code class="inline-code">node</code> จากนั้นแปลงโปรเจกต์ <code class="inline-code">first-nextjs-app</code> ที่พัฒนามาตั้งแต่หน่วยที่ 1 ให้เป็น TypeScript ทั้งโปรเจกต์ และสร้างหน้า <strong>"ความก้าวหน้าการเรียน" (/progress)</strong> ที่สรุปผลงานตั้งแต่หน่วยที่ 1 จนถึงปัจจุบัน
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
                        <td>1. อธิบายหลักการทำงานของ TypeScript (ตรวจ Type ก่อนรัน และตัด Type ทิ้งตอนรันจริง) ได้<br>2. อธิบายความแตกต่างของเครื่องมือ tsc, tsx, ts-node และ node รวมถึงรูปแบบการเริ่มโปรเจกต์ TypeScript ได้</td>
                    </tr>
                    <tr>
                        <td><strong>ด้านทักษะ (Practice - P)</strong></td>
                        <td>1. กำหนดชนิดข้อมูลด้วย Type Annotation, Interface, Type Alias, Union/Literal Type, Generics และ Utility Types ได้<br>2. แปลงโปรเจกต์ Next.js จาก JavaScript เป็น TypeScript และแก้ Type Error จนตรวจผ่านได้<br>3. กำหนด Type ให้ Props, State และ Event ของคอมโพเนนต์ React ได้</td>
                    </tr>
                    <tr>
                        <td><strong>ด้านเจตคติ (Attitude - A)</strong></td>
                        <td>1. เห็นคุณค่าของการตรวจสอบโค้ดก่อนส่งมอบ ลดข้อผิดพลาดที่ผู้ใช้จะพบ<br>2. อ่านข้อความแจ้งข้อผิดพลาดอย่างเป็นระบบ และแก้ไขทีละจุดอย่างอดทน</td>
                    </tr>
                </table>
            </section>

            <div class="key-concept-box">
                <strong>🗺️ สารบัญหน่วยที่ 4</strong>
                <ul style="margin: 10px 0 0 20px; line-height: 1.9;">
                    <li><a href="#topic-4-1">เรื่องที่ 4.1: TypeScript คืออะไร และทำไมต้องใช้</a></li>
                    <li><a href="#topic-4-2">เรื่องที่ 4.2: Simple Types — Type Annotation และ Type Inference</a></li>
                    <li><a href="#topic-4-3">เรื่องที่ 4.3: Special Types — any, unknown, void และ never</a></li>
                    <li><a href="#topic-4-4">เรื่องที่ 4.4: null, undefined และ Optional Chaining</a></li>
                    <li><a href="#topic-4-5">เรื่องที่ 4.5: Arrays, Tuples และ Object Types</a></li>
                    <li><a href="#topic-4-6">เรื่องที่ 4.6: Type Alias, Interface และ Class</a></li>
                    <li><a href="#topic-4-7">เรื่องที่ 4.7: Union Type, Literal Type และ Narrowing</a></li>
                    <li><a href="#topic-4-8">เรื่องที่ 4.8: Functions และ Casting</a></li>
                    <li><a href="#topic-4-9">เรื่องที่ 4.9: Enums</a></li>
                    <li><a href="#topic-4-10">เรื่องที่ 4.10: Generics, Utility Types และ keyof</a></li>
                    <li><a href="#topic-4-11">เรื่องที่ 4.11: TypeScript กับ React และ Next.js</a></li>
                    <li><a href="#topic-4-12">เรื่องที่ 4.12: เครื่องมือ tsc, tsx, ts-node, node และการเริ่มโปรเจกต์ TypeScript</a></li>
                    <li><a href="#workshop">ปฏิบัติการ: แปลงโปรเจกต์เป็น TypeScript และสร้างหน้าความก้าวหน้าการเรียน (9 ขั้นตอน)</a></li>
                </ul>
            </div>

            <div class="key-concept-box" style="border-left-color:#2563eb;">
                <strong>▶ วิธีใช้บทเรียนนี้: รันและตรวจ Type ได้ทันทีในหน้าเว็บ</strong>
                <p>กล่องโค้ด TypeScript ในส่วนทฤษฎีมีปุ่ม 2 แบบ ซึ่งจำลองการทำงานของเครื่องมือจริงที่จะใช้ในปฏิบัติการ:</p>
                <ul style="margin: 8px 0 8px 20px; line-height: 1.8;">
                    <li><strong style="color:#2563eb;">▶ ตรวจ Type แล้วรัน</strong> — ใช้ TypeScript Compiler ตัวจริงตรวจโค้ดก่อน (เหมือน <code class="inline-code">tsc</code> และ <code class="inline-code">next build</code>) ถ้าพบ Type Error จะแสดงบรรทัดที่ผิดและ <strong>ไม่รันโค้ด</strong></li>
                    <li><strong style="color:#7c3aed;">⚡ รันแบบ tsx</strong> — ตัด Type ทิ้งแล้วรันทันทีโดยไม่ตรวจ (เหมือน <code class="inline-code">tsx</code> และ <code class="inline-code">node ไฟล์.ts</code>) โค้ดที่ผิดชนิดก็ยังรันได้ ใช้เปรียบเทียบให้เห็นว่าถ้าไม่ตรวจ Type จะเกิดอะไรขึ้น</li>
                </ul>
                <p><strong>คลิกแก้ไขโค้ดในกล่องได้เลย</strong> หลายตัวอย่างมีบรรทัดที่ขึ้นต้นด้วย <code class="inline-code">// ❌</code> ให้ลองลบเครื่องหมาย <code class="inline-code">//</code> ออกแล้วกดตรวจ Type เพื่อดูข้อความแจ้งเตือนจริง ถ้าแก้จนสับสนให้กด <strong>↺ คืนค่าเดิม</strong> (การกดครั้งแรกจะโหลดตัวตรวจ TypeScript ประมาณ 2 MB จึงอาจรอสักครู่)</p>
            </div>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="lesson-section">
                <h3>📘 3. เนื้อหาทางทฤษฎีเชิงลึก (Theoretical Core)</h3>

                <!-- ===================== 4.1 ===================== -->
                <h4 class="topic-title" id="topic-4-1">เรื่องที่ 4.1: TypeScript คืออะไร และทำไมต้องใช้</h4>
                <p>
                    <strong>TypeScript</strong> เป็นภาษาที่บริษัท Microsoft พัฒนาขึ้นในปี 2012 โดยนำ JavaScript มาเพิ่มความสามารถในการ <strong>ระบุชนิดข้อมูล (Static Typing)</strong> โค้ด JavaScript ทุกบรรทัดจึงเป็นโค้ด TypeScript ที่ถูกต้องด้วย (TypeScript เป็น <em>Superset</em> ของ JavaScript) ผู้เรียนจึงใช้ความรู้จากหน่วยที่ 3 ได้ทั้งหมด เพียงแค่เพิ่มการบอกชนิดข้อมูล เช่น <code class="inline-code">score: number</code> เข้าไป
                </p>
                <p>
                    JavaScript เป็นภาษาแบบ <strong>Dynamic Typing</strong> คือรู้ชนิดของข้อมูลตอนโปรแกรมทำงานแล้วเท่านั้น ข้อผิดพลาดจึงถูกพบเมื่อผู้ใช้เปิดหน้าเว็บไปแล้ว ส่วน TypeScript ตรวจชนิดข้อมูล <strong>ก่อน</strong> โปรแกรมทำงาน และ VS Code จะขีดเส้นใต้สีแดงบอกตำแหน่งที่ผิดทันทีระหว่างพิมพ์ ข้อดีที่สำคัญมีดังนี้
                </p>
                <table class="grading-table" style="margin: 15px 0;">
                    <tr><th width="28%">ข้อดี</th><th>ความหมายในการทำงานจริง</th></tr>
                    <tr><td>พบข้อผิดพลาดเร็วขึ้น</td><td>ส่งข้อมูลผิดชนิด สะกดชื่อ Property ผิด หรือลืมจัดการกรณีที่ไม่มีข้อมูล จะถูกแจ้งตั้งแต่ตอนเขียน ไม่ใช่ตอนผู้ใช้กดปุ่ม</td></tr>
                    <tr><td>VS Code ช่วยเขียนได้ฉลาดขึ้น</td><td>พิมพ์ <code class="inline-code">student.</code> แล้วจะมีรายการ <code class="inline-code">id</code>, <code class="inline-code">name</code>, <code class="inline-code">score</code> ให้เลือก (IntelliSense) เพราะรู้รูปร่างของข้อมูล</td></tr>
                    <tr><td>โค้ดเป็นเอกสารในตัว</td><td>อ่าน <code class="inline-code">function summarize(list: Student[]): ScoreSummary</code> แล้วรู้ทันทีว่ารับอะไรและคืนอะไร โดยไม่ต้องเปิดอ่านโค้ดข้างใน</td></tr>
                    <tr><td>แก้ไขโค้ดได้อย่างมั่นใจ</td><td>เปลี่ยนชื่อ Property หรือโครงสร้างข้อมูลแล้ว TypeScript จะชี้ทุกจุดที่ต้องแก้ตาม เหมาะกับโปรเจกต์ที่ใหญ่ขึ้นเรื่อย ๆ และทำงานเป็นทีม</td></tr>
                </table>
                <p>
                    สิ่งสำคัญที่สุดที่ต้องเข้าใจคือ <strong>เบราว์เซอร์และ Node.js ไม่ได้รัน TypeScript</strong> Type มีไว้ใช้ตอนเขียนและตอนตรวจเท่านั้น ก่อนรันจริงจะถูกตัดทิ้งจนเหลือเพียง JavaScript (เรียกว่า <em>Type Erasure</em>) ดังรูปที่ 4.1 ดังนั้นถ้าข้ามขั้นตอนการตรวจ Type โค้ดที่ผิดชนิดก็ยังรันได้ตามปกติ
                </p>
                <div class="image-container">
                    <div>
                        <figure class="custom-image-box" style="max-width: 860px;">
                            <img src="img/unit4-ts-flow.svg" alt="แผนภาพการทำงานของ TypeScript: ไฟล์ .ts ถูกตรวจ Type ถ้าพบ Error แจ้งให้แก้ ถ้าผ่านจะถูกตัด Type ทิ้งเหลือ JavaScript แล้วรันในเบราว์เซอร์หรือ Node.js" class="responsive-img">
                            <figcaption class="image-caption">
                                <strong>รูปที่ 4.1:</strong> TypeScript ตรวจ Type ก่อน จากนั้นตัด Type ทิ้งเหลือ JavaScript ไปรันจริง
                                <span class="image-source">🔗 แหล่งอ้างอิงภาพ: ภาพประกอบจัดทำขึ้นสำหรับบทเรียนนี้</span>
                            </figcaption>
                        </figure>
                    </div>
                </div>
                <p>ทดลองด้วยปัญหาเดียวกับหน่วยที่ 3: กด <strong style="color:#7c3aed;">⚡ รันแบบ tsx</strong> ก่อน แล้วกด <strong style="color:#2563eb;">▶ ตรวจ Type แล้วรัน</strong> เปรียบเทียบผล จากนั้นแก้โค้ดตามคอมเมนต์บรรทัดสุดท้ายแล้วตรวจใหม่</p>
<div class="code-window" data-run-ts>
    <div class="code-header">
        <span class="code-lang">TypeScript</span>
        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
    </div>
    <pre>// โค้ด JavaScript เดิม เพิ่มเพียง ": number" เพื่อบอกชนิดข้อมูล
function addBonus(score: number, bonus: number): number {
  return score + bonus;
}

const fromForm = "85"; // ค่าจากช่องกรอกข้อมูลเป็น "ข้อความ" เสมอ (หน่วยที่ 3)
console.log("คะแนนรวมโบนัส =", addBonus(fromForm, 5));

// วิธีแก้: เปลี่ยนเป็น addBonus(Number(fromForm), 5)</pre>
</div>
                <div class="try-hint">🔍 <strong>สังเกต:</strong> แบบ tsx ได้ผล <code class="inline-code">855</code> ซึ่งผิดแต่ไม่มีใครเตือน ส่วนการตรวจ Type แจ้งว่า <code class="inline-code">Argument of type 'string' is not assignable to parameter of type 'number'</code> ที่บรรทัด 7 พร้อมรหัส <code class="inline-code">TS2345</code> ซึ่งนำไปค้นหาวิธีแก้ต่อได้</div>
                <blockquote>
                    <strong>📌 TypeScript ในปี 2569:</strong> TypeScript 7 เขียนตัวคอมไพเลอร์ใหม่ทั้งหมดด้วยภาษา Go ทำให้ตรวจ Type ได้เร็วขึ้นราว 10 เท่า แต่ไม่มี JavaScript API ให้เครื่องมืออื่นเรียกใช้แล้ว ส่วน TypeScript 6 เป็นเวอร์ชันสุดท้ายที่เขียนด้วย JavaScript ซึ่งเครื่องมือหลายตัวยังต้องพึ่งอยู่ (รายละเอียดในเรื่องที่ 4.12) กฎการตรวจ Type ของทั้งสองเวอร์ชันเหมือนกัน ตัวตรวจในหน้าเว็บนี้ใช้ TypeScript 6.0.3 เพราะต้องทำงานในเบราว์เซอร์ได้
                </blockquote>
                <p class="w3-ref">📚 อ่านเพิ่มเติมที่ W3Schools: <a href="https://www.w3schools.com/typescript/index.php" target="_blank" rel="noopener">TypeScript Tutorial</a> · <a href="https://www.w3schools.com/typescript/typescript_intro.php" target="_blank" rel="noopener">TS Introduction</a> · <a href="https://www.w3schools.com/typescript/typescript_getstarted.php" target="_blank" rel="noopener">TS Get Started</a></p>

                <!-- ===================== 4.2 ===================== -->
                <h4 class="topic-title" id="topic-4-2">เรื่องที่ 4.2: Simple Types — Type Annotation และ Type Inference</h4>
                <p>
                    ชนิดข้อมูลพื้นฐาน (Primitive Types) ที่ใช้บ่อยมี 3 ชนิด คือ <code class="inline-code">string</code> (ข้อความ), <code class="inline-code">number</code> (ตัวเลขทั้งจำนวนเต็มและทศนิยม) และ <code class="inline-code">boolean</code> (จริง/เท็จ) การกำหนดชนิดทำได้ 2 วิธี
                </p>
                <table class="grading-table" style="margin: 15px 0;">
                    <tr><th width="28%">วิธี</th><th>ตัวอย่างและคำอธิบาย</th></tr>
                    <tr><td><strong>Type Annotation</strong><br>(ระบุชนิดเอง)</td><td><code class="inline-code">let score: number = 85;</code> — เขียน <code class="inline-code">: ชนิด</code> ต่อท้ายชื่อตัวแปร พารามิเตอร์ของฟังก์ชันควรระบุเสมอ</td></tr>
                    <tr><td><strong>Type Inference</strong><br>(ให้ TypeScript อนุมาน)</td><td><code class="inline-code">let score = 85;</code> — TypeScript เห็นค่าเริ่มต้นเป็นตัวเลข จึงรู้เองว่าเป็น <code class="inline-code">number</code> นิยมใช้กับตัวแปรที่มีค่าเริ่มต้นชัดเจน เพื่อให้โค้ดสั้นลง</td></tr>
                </table>
                <p>ไม่ว่าจะใช้วิธีใด เมื่อกำหนดชนิดแล้วจะ <strong>เปลี่ยนไปเก็บค่าชนิดอื่นไม่ได้</strong> ลองลบ <code class="inline-code">//</code> หน้าบรรทัดที่มี ❌ ทีละบรรทัดแล้วตรวจ Type:</p>
<div class="code-window" data-run-ts>
    <div class="code-header">
        <span class="code-lang">TypeScript</span>
        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
    </div>
    <pre>// 1) Type Annotation: ระบุชนิดเองหลังชื่อตัวแปร
let studentName: string = "สมชาย ใจดี";
let score: number = 85;
let isPassed: boolean = score &gt;= 50;

// 2) Type Inference: ไม่ระบุก็ได้ TypeScript อนุมานจากค่าเริ่มต้น
let room = "ปวส.1/1"; // อนุมานเป็น string
const maxScore = 100; // const อนุมานเป็นค่า 100 พอดี (เพราะเปลี่ยนค่าไม่ได้)

score = score + 5; // ✔ number + number ได้ number
console.log(studentName, score, isPassed, room, maxScore);
console.log(typeof studentName, typeof score, typeof isPassed);

// score = "เก้าสิบ"; // ❌ ลองลบ // แล้วตรวจ Type
// room = 101;        // ❌ ลองลบ // แล้วตรวจ Type</pre>
</div>
                <p class="w3-ref">📚 อ่านเพิ่มเติมที่ W3Schools: <a href="https://www.w3schools.com/typescript/typescript_simple_types.php" target="_blank" rel="noopener">TS Simple Types</a> · <a href="https://www.w3schools.com/typescript/typescript_explicit_inference.php" target="_blank" rel="noopener">TS Explicit &amp; Inference</a></p>

                <!-- ===================== 4.3 ===================== -->
                <h4 class="topic-title" id="topic-4-3">เรื่องที่ 4.3: Special Types — any, unknown, void และ never</h4>
                <table class="grading-table" style="margin: 15px 0;">
                    <tr><th width="18%">Type</th><th>ความหมาย</th><th width="30%">ควรใช้เมื่อ</th></tr>
                    <tr><td><code class="inline-code">any</code></td><td>ปิดการตรวจ Type ของตัวแปรนั้นทั้งหมด ทำอะไรกับมันก็ได้ ทำให้ TypeScript ไร้ประโยชน์</td><td>หลีกเลี่ยง ใช้เฉพาะช่วงย้ายโค้ดเก่าชั่วคราว</td></tr>
                    <tr><td><code class="inline-code">unknown</code></td><td>ไม่รู้ชนิด (ปลอดภัยกว่า any) ต้องตรวจสอบชนิดก่อนจึงจะใช้งานได้</td><td>ข้อมูลจากภายนอก เช่น ผลจาก API หรือ Error ใน catch</td></tr>
                    <tr><td><code class="inline-code">void</code></td><td>ฟังก์ชันที่ไม่คืนค่า</td><td>ฟังก์ชันที่ทำงานอย่างเดียว เช่น แสดงผล บันทึกข้อมูล</td></tr>
                    <tr><td><code class="inline-code">never</code></td><td>ค่าที่ไม่มีวันเกิดขึ้น เช่น ฟังก์ชันที่ throw Error ทุกครั้ง หรือ Array ว่างที่ TypeScript ไม่รู้ชนิดของสมาชิก</td><td>พบบ่อยในข้อความ Error (จะเจอในปฏิบัติการขั้นตอนที่ 5)</td></tr>
                </table>
<div class="code-window" data-run-ts>
    <div class="code-header">
        <span class="code-lang">TypeScript</span>
        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
    </div>
    <pre>// ===== any: ปิดการตรวจ Type ทั้งหมด (ควรหลีกเลี่ยง) =====
let data: any = "สวัสดี";
data = 42;
try {
  console.log(data.toUpperCase()); // TypeScript ไม่เตือนเลย แต่ตัวเลขไม่มีเมธอดนี้
} catch (error) {
  console.log("any ทำให้พังตอนรัน:", error instanceof Error ? error.message : error);
}

// ===== unknown: ต้องตรวจชนิดก่อนใช้ (เรียกว่า Narrowing) =====
function describe(value: unknown): string {
  // return value.toUpperCase(); // ❌ ลองลบ //: ใช้ unknown ตรง ๆ ไม่ได้
  if (typeof value === "string") return "ข้อความ: " + value.toUpperCase();
  if (typeof value === "number") return "ตัวเลข: " + value.toFixed(2);
  return "ชนิดอื่น";
}
console.log(describe("hello"), "|", describe(3.14159), "|", describe(true));

// ===== void และ never =====
function logScore(score: number): void {
  console.log("บันทึกคะแนน", score);
}
function fail(message: string): never {
  throw new Error(message);
}
logScore(85);
try {
  fail("ข้อมูลไม่ถูกต้อง");
} catch (error) {
  console.log("never →", error instanceof Error ? error.message : error);
}</pre>
</div>
                <p class="w3-ref">📚 อ่านเพิ่มเติมที่ W3Schools: <a href="https://www.w3schools.com/typescript/typescript_special_types.php" target="_blank" rel="noopener">TS Special Types</a></p>

                <!-- ===================== 4.4 ===================== -->
                <h4 class="topic-title" id="topic-4-4">เรื่องที่ 4.4: null, undefined และ Optional Chaining</h4>
                <p>
                    ข้อผิดพลาดที่พบบ่อยที่สุดของ JavaScript คือ <code class="inline-code">Cannot read properties of undefined</code> เกิดจากการใช้ค่าที่ "อาจไม่มีอยู่" เช่น ผลของ <code class="inline-code">find()</code> ที่หาไม่เจอ เมื่อเปิดโหมด <code class="inline-code">strict</code> (ตัวเลือก <code class="inline-code">strictNullChecks</code>) TypeScript จะ <strong>บังคับให้จัดการกรณีไม่มีค่าเสมอ</strong> ด้วยเครื่องมือที่เรียนในหน่วยที่ 3 ได้แก่
                </p>
                <ul style="margin: 10px 0 15px 20px; line-height: 1.8;">
                    <li><code class="inline-code">?.</code> (Optional Chaining) — ถ้าค่าทางซ้ายเป็น null/undefined ให้หยุดและได้ undefined แทนการพัง</li>
                    <li><code class="inline-code">??</code> (Nullish Coalescing) — ถ้าค่าทางซ้ายเป็น null/undefined ให้ใช้ค่าสำรองทางขวา</li>
                    <li><code class="inline-code">if (ค่า)</code> — ตรวจก่อน ภายในบล็อก if TypeScript จะรู้ว่ามีค่าแน่นอนแล้ว</li>
                </ul>
<div class="code-window" data-run-ts>
    <div class="code-header">
        <span class="code-lang">TypeScript</span>
        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
    </div>
    <pre>interface Student {
  name: string;
  score: number;
  nickname?: string; // ? = Optional มีหรือไม่มีก็ได้ (ชนิดจริงคือ string | undefined)
}

const students: Student[] = [
  { name: "สมชาย", score: 85, nickname: "ชาย" },
  { name: "สมหญิง", score: 92 },
];

// find() อาจหาไม่เจอ ชนิดของผลลัพธ์จึงเป็น Student | undefined
const found = students.find((s) =&gt; s.name === "มานี");
// console.log(found.score); // ❌ ลองลบ //: 'found' is possibly 'undefined'
console.log("คะแนนมานี:", found?.score ?? "ไม่พบข้อมูล");

for (const s of students) {
  console.log(s.name, "| ชื่อเล่น:", s.nickname ?? "-", "| ความยาว:", s.nickname?.length ?? 0);
}

// Narrowing ด้วย if: ภายในบล็อกนี้ TypeScript รู้แล้วว่า top ไม่ใช่ undefined
const top = students.find((s) =&gt; s.score &gt; 90);
if (top) {
  console.log("คนแรกที่ได้เกิน 90 คะแนน:", top.name);
}</pre>
</div>
                <p class="w3-ref">📚 อ่านเพิ่มเติมที่ W3Schools: <a href="https://www.w3schools.com/typescript/typescript_null.php" target="_blank" rel="noopener">TS Null &amp; Undefined</a></p>

                <!-- ===================== 4.5 ===================== -->
                <h4 class="topic-title" id="topic-4-5">เรื่องที่ 4.5: Arrays, Tuples และ Object Types</h4>
                <table class="grading-table" style="margin: 15px 0;">
                    <tr><th width="25%">รูปแบบ</th><th>ตัวอย่าง</th><th>ความหมาย</th></tr>
                    <tr><td>Array</td><td><code class="inline-code">number[]</code> หรือ <code class="inline-code">Array&lt;number&gt;</code></td><td>Array ที่สมาชิกทุกตัวเป็น number</td></tr>
                    <tr><td>Readonly Array</td><td><code class="inline-code">readonly string[]</code></td><td>อ่านได้อย่างเดียว ห้ามเพิ่ม/ลบ/แก้</td></tr>
                    <tr><td>Tuple</td><td><code class="inline-code">[number, string, number]</code></td><td>Array ที่จำนวนและชนิดแต่ละตำแหน่งตายตัว</td></tr>
                    <tr><td>Object Type</td><td><code class="inline-code">{ code: string; credit: number }</code></td><td>กำหนดชื่อและชนิดของแต่ละ Property</td></tr>
                </table>
<div class="code-window" data-run-ts>
    <div class="code-header">
        <span class="code-lang">TypeScript</span>
        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
    </div>
    <pre>// Array: เขียนได้ 2 แบบ ความหมายเหมือนกัน
const scores: number[] = [85, 92, 47];
const names: Array&lt;string&gt; = ["สมชาย", "สมหญิง"];
scores.push(68);
// scores.push("100"); // ❌ ลองลบ //

// readonly: อ่านได้อย่างเดียว
const grades: readonly string[] = ["4", "3.5", "3"];
// grades.push("0"); // ❌ ลองลบ //

// Tuple: ตำแหน่งที่ 0 = รหัส, 1 = ชื่อ, 2 = คะแนน
const row: [number, string, number] = [1, "สมชาย", 85];
const [id, name, score] = row; // Destructuring ได้ชนิดถูกต้องทุกตัว

// Object Type: กำหนดรูปร่างของ Object
const course: { code: string; title: string; credit: number; online?: boolean } = {
  code: "FE-101",
  title: "การพัฒนาเว็บ Front-End",
  credit: 3,
};
// course.credit = "สาม"; // ❌ ลองลบ //

console.log(scores, names, grades);
console.log(id, name, score + 5);
console.log(course.title, course.credit, "หน่วยกิต | ออนไลน์:", course.online ?? false);</pre>
</div>
                <p class="w3-ref">📚 อ่านเพิ่มเติมที่ W3Schools: <a href="https://www.w3schools.com/typescript/typescript_arrays.php" target="_blank" rel="noopener">TS Arrays</a> · <a href="https://www.w3schools.com/typescript/typescript_tuples.php" target="_blank" rel="noopener">TS Tuples</a> · <a href="https://www.w3schools.com/typescript/typescript_object_types.php" target="_blank" rel="noopener">TS Object Types</a></p>

                <!-- ===================== 4.6 ===================== -->
                <h4 class="topic-title" id="topic-4-6">เรื่องที่ 4.6: Type Alias, Interface และ Class</h4>
                <p>
                    เมื่อใช้รูปร่างข้อมูลเดิมหลายที่ ควร <strong>ตั้งชื่อ</strong> ให้ Type นั้นแล้วนำกลับมาใช้ซ้ำ ทำได้ 2 แบบ คือ <code class="inline-code">type</code> (Type Alias) และ <code class="inline-code">interface</code> ซึ่งใช้แทนกันได้เกือบทุกกรณี
                </p>
                <table class="grading-table" style="margin: 15px 0;">
                    <tr><th width="20%"></th><th><code class="inline-code">type</code> (Type Alias)</th><th><code class="inline-code">interface</code></th></tr>
                    <tr><td>ใช้กับ</td><td>ทุกอย่าง: Object, Union, Tuple, ฟังก์ชัน, ชนิดพื้นฐาน</td><td>รูปร่างของ Object เท่านั้น</td></tr>
                    <tr><td>การต่อยอด</td><td>ใช้ <code class="inline-code">&amp;</code> (Intersection)</td><td>ใช้ <code class="inline-code">extends</code></td></tr>
                    <tr><td>แนวทางในรายวิชานี้</td><td>Union/Literal Type เช่น <code class="inline-code">type Grade = "4" | "3.5"</code></td><td>ข้อมูลและ Props เช่น <code class="inline-code">interface Student</code></td></tr>
                </table>
<div class="code-window" data-run-ts>
    <div class="code-header">
        <span class="code-lang">TypeScript</span>
        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
    </div>
    <pre>// Type Alias: ตั้งชื่อให้ Type ใดก็ได้
type StudentId = number;

// Interface: กำหนดรูปร่างของ Object
interface Person {
  name: string;
  email?: string;
}

// extends: สร้าง Interface ใหม่ต่อยอดจากของเดิม (ได้ name, email มาด้วย)
interface Student extends Person {
  readonly id: StudentId; // readonly = กำหนดครั้งแรกแล้วแก้ไม่ได้
  score: number;
}

const s1: Student = { id: 1, name: "สมชาย ใจดี", score: 85 };
s1.score = 90; // ✔ แก้ได้
// s1.id = 99; // ❌ ลองลบ //
// const s2: Student = { id: 2, name: "สมหญิง" }; // ❌ ลองลบ //: ขาด score
// const s3: Student = { id: 3, name: "มานี", score: 70, age: 18 }; // ❌ ลองลบ //: ไม่มี age ใน Interface

// Intersection (&amp;): รวมสอง Type เข้าด้วยกัน
type WithTimestamp = { createdAt: string };
type StudentRecord = Student &amp; WithTimestamp;
const record: StudentRecord = { ...s1, createdAt: "2569-11-18" };

console.log(s1);
console.log(record);</pre>
</div>
                <p><strong>Class</strong> ใน TypeScript คือ Class ของ JavaScript ที่เพิ่มการกำหนดชนิดของ Property และตัวกำหนดการเข้าถึง (Access Modifier) เช่น <code class="inline-code">private</code> (ใช้ได้เฉพาะภายในคลาส) และ <code class="inline-code">readonly</code> รวมถึงใช้ <code class="inline-code">implements</code> บังคับให้คลาสมีครบตาม Interface ในโปรเจกต์ React สมัยใหม่จะใช้ Class น้อย แต่พบบ่อยในไลบรารีและฝั่ง Back-End</p>
<div class="code-window" data-run-ts>
    <div class="code-header">
        <span class="code-lang">TypeScript</span>
        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
    </div>
    <pre>interface Student {
  id: number;
  name: string;
  score: number;
}

interface Summary {
  count(): number;
}

// implements Summary = คลาสนี้ต้องมีเมธอด count() ตาม Interface
class Classroom implements Summary {
  private students: Student[] = []; // private: ภายนอกเข้าถึงโดยตรงไม่ได้

  constructor(public readonly room: string) {} // สร้าง Property room ให้อัตโนมัติ

  add(student: Student): void {
    this.students.push(student);
  }

  count(): number {
    return this.students.length;
  }

  average(): number {
    return this.students.reduce((sum, s) =&gt; sum + s.score, 0) / this.count();
  }
}

const room = new Classroom("ปวส.1/1");
room.add({ id: 1, name: "สมชาย", score: 85 });
room.add({ id: 2, name: "สมหญิง", score: 92 });
// room.students = []; // ❌ ลองลบ //: Property 'students' is private
console.log(room.room, "มีนักศึกษา", room.count(), "คน เฉลี่ย", room.average());</pre>
</div>
                <p class="w3-ref">📚 อ่านเพิ่มเติมที่ W3Schools: <a href="https://www.w3schools.com/typescript/typescript_aliases_and_interfaces.php" target="_blank" rel="noopener">TS Aliases &amp; Interfaces</a> · <a href="https://www.w3schools.com/typescript/typescript_classes.php" target="_blank" rel="noopener">TS Classes</a></p>

                <!-- ===================== 4.7 ===================== -->
                <h4 class="topic-title" id="topic-4-7">เรื่องที่ 4.7: Union Type, Literal Type และ Narrowing</h4>
                <p>
                    <strong>Union Type</strong> (ใช้เครื่องหมาย <code class="inline-code">|</code> อ่านว่า "หรือ") ให้ค่าเป็นได้หลายชนิด เช่น <code class="inline-code">string | number</code> ส่วน <strong>Literal Type</strong> ระบุ "ค่า" ที่อนุญาตไว้ล่วงหน้า เช่น <code class="inline-code">"score" | "name"</code> เหมือนตัวเลือกใน <code class="inline-code">&lt;select&gt;</code> ที่เลือกได้เฉพาะค่าที่มีให้ ถ้าพิมพ์ผิดแม้แต่ตัวเดียว TypeScript จะเตือนทันที ระบบคะแนนจากหน่วยที่ 3 จะใช้ทั้งสองแบบนี้ในปฏิบัติการ
                </p>
                <p>
                    เมื่อค่าเป็นได้หลายชนิด ต้อง <strong>ตรวจชนิดก่อนใช้งาน (Narrowing)</strong> ด้วย <code class="inline-code">typeof</code>, <code class="inline-code">instanceof</code>, <code class="inline-code">in</code> หรือการเทียบค่า แล้ว TypeScript จะรู้ชนิดที่แน่นอนในแต่ละกิ่งของเงื่อนไข
                </p>
<div class="code-window" data-run-ts>
    <div class="code-header">
        <span class="code-lang">TypeScript</span>
        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
    </div>
    <pre>// Union Type: เป็นได้ทั้ง string หรือ number
let studentCode: string | number = "67001";
studentCode = 67001;

// Literal Type: อนุญาตเฉพาะค่าที่กำหนด
type SortBy = "score" | "name";
let sortBy: SortBy = "score";
sortBy = "name";
// sortBy = "age"; // ❌ ลองลบ //

// Narrowing ด้วย typeof
function formatCode(code: string | number): string {
  if (typeof code === "number") {
    return "รหัส " + code.toString().padStart(8, "0"); // ในกิ่งนี้ code เป็น number
  }
  return "รหัส " + code.trim(); // ในกิ่งนี้ code เป็น string
}
console.log(formatCode(studentCode), "|", formatCode("  67002  "), "|", sortBy);

// Discriminated Union: ใช้ Property ร่วม (status) แยกรูปร่างข้อมูล
type LoadState =
  | { status: "loading" }
  | { status: "success"; count: number }
  | { status: "error"; message: string };

function showState(state: LoadState): string {
  switch (state.status) {
    case "loading":
      return "⏳ กำลังโหลด...";
    case "success":
      return `✔ โหลดแล้ว ${state.count} คน`; // มี count เฉพาะสถานะ success
    case "error":
      return `❌ ${state.message}`;
  }
}
console.log(showState({ status: "loading" }));
console.log(showState({ status: "success", count: 6 }));
console.log(showState({ status: "error", message: "โหลดข้อมูลไม่สำเร็จ (สถานะ 404)" }));</pre>
</div>
                <div class="try-hint">🔍 <strong>ลองทำ:</strong> ในฟังก์ชัน <code class="inline-code">showState</code> เปลี่ยน <code class="inline-code">state.message</code> เป็น <code class="inline-code">state.count</code> แล้วตรวจ Type จะพบว่า TypeScript รู้ว่าสถานะ <code class="inline-code">"error"</code> ไม่มี <code class="inline-code">count</code> นี่คือเหตุผลที่ Discriminated Union นิยมใช้กับสถานะการโหลดข้อมูลแบบ Asynchronous</div>
                <p class="w3-ref">📚 อ่านเพิ่มเติมที่ W3Schools: <a href="https://www.w3schools.com/typescript/typescript_union_types.php" target="_blank" rel="noopener">TS Union Types</a></p>

                <!-- ===================== 4.8 ===================== -->
                <h4 class="topic-title" id="topic-4-8">เรื่องที่ 4.8: Functions และ Casting</h4>
                <p>
                    ฟังก์ชันใน TypeScript ระบุชนิดได้ 2 จุด คือ <strong>พารามิเตอร์</strong> (ควรระบุเสมอ) และ <strong>ค่าที่คืน (Return Type)</strong> เขียนหลังวงเล็บ ถ้าไม่ระบุ Return Type TypeScript จะอนุมานให้ นอกจากนี้ยังรองรับพารามิเตอร์แบบ Optional (<code class="inline-code">?</code>), Default, Rest และการกำหนด <strong>Function Type</strong> สำหรับ Callback ที่ใช้กับ Array Methods
                </p>
                <p>
                    <strong>Casting</strong> ด้วยคำสั่ง <code class="inline-code">as</code> คือการบอก TypeScript ว่า "ฉันรู้ชนิดของค่านี้ดีกว่า" ซึ่ง <strong>ไม่ได้แปลงค่าจริง</strong> เป็นเพียงการเปลี่ยนมุมมองตอนตรวจ Type เท่านั้น ใช้เมื่อมั่นใจจริง ๆ เช่น ค่าจาก <code class="inline-code">&lt;select&gt;</code> ที่มีตัวเลือกตรงกับ Literal Type (จะใช้ในปฏิบัติการ) ถ้าต้องการเปลี่ยนชนิดจริงต้องใช้ <code class="inline-code">Number()</code> หรือ <code class="inline-code">String()</code>
                </p>
<div class="code-window" data-run-ts>
    <div class="code-header">
        <span class="code-lang">TypeScript</span>
        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
    </div>
    <pre>// ระบุชนิดพารามิเตอร์และค่าที่คืน
function average(scores: number[]): number {
  return scores.reduce((sum, s) =&gt; sum + s, 0) / scores.length;
}

// Optional (?) และ Default Parameter
function greet(name: string, title?: string, suffix = "ครับ"): string {
  return `สวัสดี ${title ?? ""}${name} ${suffix}`;
}

// Rest Parameter รับกี่ค่าก็ได้ รวมเป็น Array
const maxOf = (...values: number[]): number =&gt; Math.max(...values);

// Function Type: กำหนดรูปแบบของฟังก์ชันที่ส่งเป็นพารามิเตอร์ (Callback)
type Rule = (score: number) =&gt; boolean;
const countIf = (scores: number[], rule: Rule): number =&gt; scores.filter(rule).length;

const scores = [85, 92, 47, 68];
console.log("เฉลี่ย", average(scores).toFixed(2));
console.log(greet("สมชาย"), "|", greet("สมหญิง", "คุณ", "ค่ะ"));
console.log("สูงสุด", maxOf(...scores), "| ผ่าน", countIf(scores, (s) =&gt; s &gt;= 50), "คน");
// greet(); // ❌ ลองลบ //: ขาดพารามิเตอร์ name

// Casting (as) ไม่ได้แปลงค่าจริง!
const raw: unknown = "85";
const asText = raw as string;
console.log("ความยาว", asText.length, "| typeof ยังเป็น", typeof (raw as number));
console.log("แปลงจริงด้วย Number():", Number(raw) + 5);</pre>
</div>
                <p class="w3-ref">📚 อ่านเพิ่มเติมที่ W3Schools: <a href="https://www.w3schools.com/typescript/typescript_functions.php" target="_blank" rel="noopener">TS Functions</a> · <a href="https://www.w3schools.com/typescript/typescript_casting.php" target="_blank" rel="noopener">TS Casting</a></p>

                <!-- ===================== 4.9 ===================== -->
                <h4 class="topic-title" id="topic-4-9">เรื่องที่ 4.9: Enums</h4>
                <p>
                    <strong>Enum</strong> คือกลุ่มค่าคงที่ที่มีชื่อ เป็นหนึ่งในไม่กี่ความสามารถของ TypeScript ที่ <strong>สร้างโค้ด JavaScript เพิ่มขึ้นจริง</strong> (ไม่ได้ถูกตัดทิ้งเหมือน Type อื่น) จึงมีข้อจำกัดกับเครื่องมือบางตัว เช่น การรัน <code class="inline-code">node ไฟล์.ts</code> โดยตรงจะไม่รองรับ Enum (เรื่องที่ 4.12) ในโปรเจกต์ React/Next.js ปัจจุบันจึงนิยมใช้ <strong>Literal Union</strong> ร่วมกับ <code class="inline-code">as const</code> แทน ซึ่งได้ความปลอดภัยเท่ากันโดยไม่สร้างโค้ดเพิ่ม
                </p>
<div class="code-window" data-run-ts>
    <div class="code-header">
        <span class="code-lang">TypeScript</span>
        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
    </div>
    <pre>// Enum แบบข้อความ (String Enum)
enum Level {
  Certificate = "ปวช.",
  Diploma = "ปวส.",
  Bachelor = "ปริญญาตรี",
}
// Enum แบบตัวเลข: ค่าถัดไปเพิ่มอัตโนมัติ Tue = 2, Wed = 3
enum Day {
  Mon = 1,
  Tue,
  Wed,
}

const myLevel: Level = Level.Diploma;
console.log(myLevel, "|", Day.Tue, "|", Day[3]);

// ทางเลือกที่นิยมกว่า: Literal Union + as const
const LEVELS = ["ปวช.", "ปวส.", "ปริญญาตรี"] as const;
type LevelName = (typeof LEVELS)[number]; // ได้ "ปวช." | "ปวส." | "ปริญญาตรี"
const goal: LevelName = "ปริญญาตรี";
// const wrong: LevelName = "ปวท."; // ❌ ลองลบ //
console.log(LEVELS.join(" → "), "| เป้าหมาย:", goal);</pre>
</div>
                <p class="w3-ref">📚 อ่านเพิ่มเติมที่ W3Schools: <a href="https://www.w3schools.com/typescript/typescript_enums.php" target="_blank" rel="noopener">TS Enums</a></p>

                <!-- ===================== 4.10 ===================== -->
                <h4 class="topic-title" id="topic-4-10">เรื่องที่ 4.10: Generics, Utility Types และ keyof</h4>
                <p>
                    <strong>Generics</strong> คือการเขียนฟังก์ชันหรือ Type ที่มี "ช่องว่างของชนิด" (นิยมตั้งชื่อว่า <code class="inline-code">&lt;T&gt;</code>) ซึ่งจะถูกเติมเมื่อเรียกใช้ ทำให้ฟังก์ชันเดียวใช้ได้กับข้อมูลหลายชนิดโดยไม่เสียความปลอดภัยเหมือนการใช้ <code class="inline-code">any</code> ผู้เรียนได้ใช้ Generics มาแล้วโดยไม่รู้ตัว เช่น <code class="inline-code">Array&lt;string&gt;</code> และจะได้ใช้ <code class="inline-code">useState&lt;Student[]&gt;</code> ในปฏิบัติการ
                </p>
                <p><strong>Utility Types</strong> คือ Generic Type สำเร็จรูปที่สร้าง Type ใหม่จาก Type เดิม โดยไม่ต้องเขียนซ้ำ:</p>
                <table class="grading-table" style="margin: 15px 0;">
                    <tr><th width="30%">Utility Type</th><th>ผลลัพธ์</th></tr>
                    <tr><td><code class="inline-code">Partial&lt;Student&gt;</code></td><td>ทุก Property เป็น Optional (ใช้กับข้อมูลที่จะแก้ไขบางส่วน)</td></tr>
                    <tr><td><code class="inline-code">Required&lt;Student&gt;</code></td><td>ทุก Property ต้องมี (ตรงข้ามกับ Partial)</td></tr>
                    <tr><td><code class="inline-code">Pick&lt;Student, "name" | "score"&gt;</code></td><td>เลือกเฉพาะบาง Property</td></tr>
                    <tr><td><code class="inline-code">Omit&lt;Student, "id"&gt;</code></td><td>ตัดบาง Property ออก (เช่น ข้อมูลจากฟอร์มที่ยังไม่มี id)</td></tr>
                    <tr><td><code class="inline-code">Record&lt;Key, Value&gt;</code></td><td>Object ที่กำหนดชนิดของ Key และ Value</td></tr>
                    <tr><td><code class="inline-code">Readonly&lt;Student&gt;</code></td><td>ทุก Property แก้ไขไม่ได้</td></tr>
                </table>
<div class="code-window" data-run-ts>
    <div class="code-header">
        <span class="code-lang">TypeScript</span>
        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
    </div>
    <pre>// Generic Function: T ถูกเติมตามข้อมูลที่ส่งเข้ามา
function firstItem&lt;T&gt;(items: T[]): T | undefined {
  return items[0];
}
const n = firstItem([10, 20, 30]); // T = number
const s = firstItem(["ก", "ข"]); // T = string
console.log(n, s, firstItem&lt;boolean&gt;([]));

// Generic Interface: รูปแบบผลลัพธ์จาก API ที่ใช้ได้กับข้อมูลทุกชนิด
interface ApiResponse&lt;T&gt; {
  ok: boolean;
  data: T;
}
interface Student {
  id: number;
  name: string;
  score: number;
  email: string;
}
const res: ApiResponse&lt;Student[]&gt; = {
  ok: true,
  data: [{ id: 1, name: "สมชาย", score: 85, email: "somchai@example.com" }],
};

// Utility Types
type StudentPreview = Pick&lt;Student, "name" | "score"&gt;;
type NewStudent = Omit&lt;Student, "id"&gt;;
type StudentUpdate = Partial&lt;Student&gt;;
type ScoreBoard = Record&lt;string, number&gt;;

const preview: StudentPreview = { name: "มานี", score: 68 };
const form: NewStudent = { name: "ปิติ", score: 76, email: "piti@example.com" };
const patch: StudentUpdate = { score: 90 };
const board: ScoreBoard = { "สมชาย": 85, "สมหญิง": 92 };
const locked: Readonly&lt;Student&gt; = { id: 9, ...form };
// locked.score = 100; // ❌ ลองลบ //

console.log(preview, form.name, board, locked.id);
console.log({ ...res.data[0], ...patch });

// keyof: ได้ Union ของชื่อ Property ทั้งหมด "id" | "name" | "score" | "email"
function getField&lt;K extends keyof Student&gt;(student: Student, key: K): Student[K] {
  return student[key];
}
console.log(getField(res.data[0], "score") + 1, getField(res.data[0], "name"));
// getField(res.data[0], "age"); // ❌ ลองลบ //</pre>
</div>
                <p class="w3-ref">📚 อ่านเพิ่มเติมที่ W3Schools: <a href="https://www.w3schools.com/typescript/typescript_basic_generics.php" target="_blank" rel="noopener">TS Basic Generics</a> · <a href="https://www.w3schools.com/typescript/typescript_utility_types.php" target="_blank" rel="noopener">TS Utility Types</a> · <a href="https://www.w3schools.com/typescript/typescript_keyof.php" target="_blank" rel="noopener">TS Keyof</a></p>

                <!-- ===================== 4.11 ===================== -->
                <h4 class="topic-title" id="topic-4-11">เรื่องที่ 4.11: TypeScript กับ React และ Next.js</h4>
                <p>
                    ในโปรเจกต์ Next.js ไฟล์ที่มี JSX ใช้นามสกุล <code class="inline-code">.tsx</code> ส่วนไฟล์ที่ไม่มี JSX (เช่น ข้อมูล ฟังก์ชันคำนวณ API Route) ใช้ <code class="inline-code">.ts</code> จุดที่ต้องกำหนด Type บ่อยที่สุดมี 4 จุด ซึ่งจะได้ใช้ครบในปฏิบัติการ
                </p>
                <table class="grading-table" style="margin: 15px 0;">
                    <tr><th width="20%">จุดที่ใช้</th><th>ตัวอย่างโค้ด</th><th width="32%">คำอธิบาย</th></tr>
                    <tr><td>Props ของคอมโพเนนต์</td><td><code class="inline-code">function StatCard({ label, value }: StatCardProps)</code></td><td>ใช้ Interface กำหนดว่าคอมโพเนนต์รับอะไร ส่งผิดชนิดหรือลืมส่งจะเตือนทันที</td></tr>
                    <tr><td>children</td><td><code class="inline-code">{ children: ReactNode }</code></td><td><code class="inline-code">ReactNode</code> = อะไรก็ได้ที่ React แสดงผลได้</td></tr>
                    <tr><td>State</td><td><code class="inline-code">useState&lt;Student[]&gt;([])</code></td><td>Array ว่างไม่บอกชนิดสมาชิก จึงต้องระบุผ่าน Generic มิฉะนั้นจะเป็น <code class="inline-code">never[]</code></td></tr>
                    <tr><td>Event</td><td><code class="inline-code">(event: FormEvent&lt;HTMLFormElement&gt;)</code></td><td>Type ของ Event จาก React เช่น <code class="inline-code">FormEvent</code>, <code class="inline-code">ChangeEvent</code>, <code class="inline-code">MouseEvent</code></td></tr>
                </table>
<div class="code-window">
    <div class="code-header">
        <span class="code-lang">TSX (ตัวอย่างรูปแบบ)</span>
        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
    </div>
    <pre>import { useState, type FormEvent, type ReactNode } from "react";

interface CardProps {
  title: string;
  children: ReactNode; // ข้อความหรือ JSX ที่อยู่ระหว่าง &lt;Card&gt;...&lt;/Card&gt;
  highlight?: boolean; // ไม่ส่งมาก็ได้
}

function Card({ title, children, highlight = false }: CardProps) {
  return (
    &lt;section className={highlight ? "border-green-500" : ""}&gt;
      &lt;h2&gt;{title}&lt;/h2&gt;
      {children}
    &lt;/section&gt;
  );
}

export default function Example() {
  const [names, setNames] = useState&lt;string[]&gt;([]); // ระบุชนิดของสมาชิกใน Array

  function handleSubmit(event: FormEvent&lt;HTMLFormElement&gt;) {
    event.preventDefault();
    setNames([...names, "สมชาย"]);
  }

  return (
    &lt;Card title="รายชื่อ" highlight&gt;
      &lt;form onSubmit={handleSubmit}&gt;
        &lt;button type="submit"&gt;เพิ่ม&lt;/button&gt;
      &lt;/form&gt;
      &lt;p&gt;มีทั้งหมด {names.length} คน&lt;/p&gt;
    &lt;/Card&gt;
  );
}</pre>
</div>
                <p>
                    ตัวอย่างนี้ไม่มีปุ่มรัน เพราะต้องทำงานภายใน React ส่วนการติดตั้ง Type ของไลบรารี เช่น React และ Node.js ใช้แพ็กเกจ <code class="inline-code">@types/react</code>, <code class="inline-code">@types/node</code> ซึ่งมาจากโครงการ <strong>DefinitelyTyped</strong> ที่รวบรวมไฟล์นิยาม Type (<code class="inline-code">.d.ts</code>) ให้ไลบรารีที่เขียนด้วย JavaScript ส่วนไลบรารีที่เขียนด้วย TypeScript อยู่แล้ว (เช่น Next.js) มี Type มาในตัว ไม่ต้องติดตั้งเพิ่ม
                </p>
                <p class="w3-ref">📚 อ่านเพิ่มเติมที่ W3Schools: <a href="https://www.w3schools.com/typescript/typescript_definitely_typed.php" target="_blank" rel="noopener">TS Definitely Typed</a> · <a href="https://www.w3schools.com/react/react_typescript.asp" target="_blank" rel="noopener">React TypeScript</a> และเอกสาร Next.js: <a href="https://nextjs.org/docs/app/api-reference/config/typescript" target="_blank" rel="noopener">TypeScript</a></p>

                <!-- ===================== 4.12 ===================== -->
                <h4 class="topic-title" id="topic-4-12">เรื่องที่ 4.12: เครื่องมือ tsc, tsx, ts-node, node และการเริ่มโปรเจกต์ TypeScript</h4>
                <p>
                    เนื่องจากเบราว์เซอร์และ Node.js รันได้เฉพาะ JavaScript จึงต้องมีเครื่องมือมาจัดการไฟล์ <code class="inline-code">.ts</code> ซึ่งแต่ละตัวทำงานต่างกันที่ <strong>"ตรวจ Type หรือไม่"</strong> และ <strong>"รันโค้ดหรือไม่"</strong> ผลในรูปที่ 4.2 มาจากการทดสอบจริงด้วยไฟล์เดียวกัน (ไฟล์ที่ตั้งใจใส่ <code class="inline-code">score: "85"</code> ผิดชนิดในปฏิบัติการขั้นตอนที่ 3)
                </p>
                <div class="image-container">
                    <div>
                        <figure class="custom-image-box" style="max-width: 860px;">
                            <img src="img/unit4-ts-tools.svg" alt="ตารางเปรียบเทียบ tsc, tsx, ts-node และ node: การตรวจ Type การรันโค้ด ผลเมื่อโค้ดผิดชนิด การใช้กับ TypeScript 7 การตั้งค่า และความเร็ว" class="responsive-img">
                            <figcaption class="image-caption">
                                <strong>รูปที่ 4.2:</strong> เปรียบเทียบเครื่องมือรันและตรวจ TypeScript ทั้ง 4 แบบ
                                <span class="image-source">🔗 แหล่งอ้างอิงภาพ: ภาพประกอบจัดทำขึ้นสำหรับบทเรียนนี้ จากผลการทดสอบจริง</span>
                            </figcaption>
                        </figure>
                    </div>
                </div>
                <table class="grading-table" style="margin: 15px 0;">
                    <tr><th width="16%">เครื่องมือ</th><th>หลักการทำงาน</th><th width="30%">ใช้เมื่อ</th></tr>
                    <tr><td><span class="tool-badge tb-tsc">tsc</span></td><td>TypeScript Compiler ตัวจริง ตรวจ Type ทั้งโปรเจกต์ตาม <code class="inline-code">tsconfig.json</code> และแปลงเป็นไฟล์ <code class="inline-code">.js</code> ได้ ถ้าใช้ <code class="inline-code">--noEmit</code> จะตรวจอย่างเดียวไม่สร้างไฟล์</td><td>ตรวจโค้ดก่อน Commit / Build (Next.js ก็เรียก tsc ตอน <code class="inline-code">next build</code>)</td></tr>
                    <tr><td><span class="tool-badge tb-tsx">tsx</span></td><td>ใช้ esbuild ตัด Type ทิ้งแล้วรันทันที <strong>ไม่ตรวจ Type</strong> ไม่ต้องตั้งค่า รองรับทั้ง ES Module, CommonJS และ Enum ไม่ต้องพึ่ง TypeScript เลย</td><td>รันสคริปต์ .ts ระหว่างพัฒนา เช่น Playground, สคริปต์เชื่อมฐานข้อมูล</td></tr>
                    <tr><td><span class="tool-badge tb-tsnode">ts-node</span></td><td>เรียก JavaScript API ของ TypeScript มาตรวจ Type แล้วแปลงโค้ดก่อนรัน ปลอดภัยแต่ช้า ต้องตั้งค่า tsconfig ให้ตรงกับรูปแบบ Module และ <strong>ใช้กับ TypeScript 7 ไม่ได้</strong> (ไม่มีการอัปเดตตั้งแต่เวอร์ชัน 10.9.2 ปี 2566)</td><td>โปรเจกต์เก่าที่ใช้อยู่แล้ว (ต้องใช้คู่กับ TypeScript 6 ลงไป)</td></tr>
                    <tr><td><span class="tool-badge tb-node">node</span></td><td>Node.js 22.18 ขึ้นไปรันไฟล์ <code class="inline-code">.ts</code> ได้เองโดยตัด Type ทิ้ง (Type Stripping) <strong>ไม่ตรวจ Type</strong> และไม่รองรับไวยากรณ์ที่สร้างโค้ดเพิ่ม เช่น Enum</td><td>สคริปต์เล็ก ๆ ที่ไม่ใช้ Enum และไม่อยากติดตั้งอะไรเพิ่ม</td></tr>
                </table>
                <div class="key-concept-box" style="border-left-color:#7c3aed;">
                    <strong>⚖️ ts-node กับ tsx ต่างกันอย่างไร (สรุปสำหรับนำไปใช้)</strong>
                    <ul style="margin: 10px 0 0 20px; line-height: 1.8;">
                        <li><strong>การตรวจ Type:</strong> ts-node ตรวจก่อนรัน ถ้าผิดจะหยุดพร้อมแจ้ง <code class="inline-code">TSError: ⨯ Unable to compile TypeScript</code> ส่วน tsx ไม่ตรวจเลย โค้ดผิดชนิดก็รันต่อและอาจได้ผลผิด (เช่น 855)</li>
                        <li><strong>ความเร็ว:</strong> tsx เร็วกว่ามาก เพราะ esbuild แค่ตัด Type ทิ้ง ไม่ต้องวิเคราะห์ทั้งโปรเจกต์</li>
                        <li><strong>การตั้งค่า:</strong> tsx ใช้ได้ทันที ส่วน ts-node ต้องตั้ง <code class="inline-code">"module": "commonjs"</code> ใน tsconfig.json (มิฉะนั้นอาจรันแล้วไม่แสดงผลอะไรเลย) หรือใช้โหมด ESM เพิ่มเติม</li>
                        <li><strong>ความเข้ากันได้:</strong> ts-node พึ่ง JavaScript API ของ TypeScript ซึ่ง TypeScript 7 ไม่มีแล้ว จึงเกิด <code class="inline-code">TypeError: Cannot read properties of undefined (reading 'fileExists')</code> ทันที (ข้อผิดพลาดเดียวกับที่พบในรายวิชาฐานข้อมูล) ส่วน tsx ไม่พึ่ง TypeScript จึงไม่มีปัญหานี้</li>
                        <li><strong>แนวทางที่แนะนำ:</strong> <strong>รันด้วย tsx และตรวจด้วย <code class="inline-code">tsc --noEmit</code></strong> ได้ทั้งความเร็วและความปลอดภัย ซึ่งเป็นแนวทางเดียวกับ Next.js (แปลงโค้ดเร็ว ๆ ด้วย SWC ระหว่างพัฒนา แล้วตรวจด้วย tsc ตอน Build)</li>
                    </ul>
                </div>

                <h5 style="margin: 25px 0 10px; font-size: 1.05rem;">รูปแบบการเริ่มโปรเจกต์ TypeScript</h5>
                <p><strong>แบบที่ 1: โปรเจกต์ Next.js ใหม่</strong> — <code class="inline-code">create-next-app</code> เลือก TypeScript เป็นค่าเริ่มต้นอยู่แล้ว (ตอบ Yes ที่คำถาม TypeScript) จะได้ <code class="inline-code">tsconfig.json</code> และไฟล์ <code class="inline-code">.tsx</code> พร้อมใช้ทันที:</p>
<div class="code-window">
    <div class="code-header">
        <span class="code-lang">PowerShell</span>
        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
    </div>
    <pre>docker run --rm -it -v "${PWD}:/app" -w /app node:22-alpine npx create-next-app@latest my-ts-app</pre>
</div>
                <p><strong>แบบที่ 2: แปลงโปรเจกต์ Next.js เดิมที่เป็น JavaScript</strong> — ติดตั้งแพ็กเกจ แล้วเปลี่ยนนามสกุลไฟล์เป็น <code class="inline-code">.ts</code>/<code class="inline-code">.tsx</code> เมื่อรัน <code class="inline-code">next dev</code> ครั้งถัดไป Next.js จะสร้าง <code class="inline-code">tsconfig.json</code> และ <code class="inline-code">next-env.d.ts</code> ให้อัตโนมัติ (ทำจริงในปฏิบัติการขั้นตอนที่ 4)</p>
                <p><strong>แบบที่ 3: โปรเจกต์ Node.js สำหรับสคริปต์ทั่วไป</strong> (เช่น สคริปต์เชื่อมต่อ MongoDB) ทำใน Container ชั่วคราวได้ดังนี้:</p>
<div class="code-window">
    <div class="code-header">
        <span class="code-lang">PowerShell / sh ใน Container</span>
        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
    </div>
    <pre>mkdir ts-lab
cd ts-lab
docker run --rm -it -v "${PWD}:/app" -w /app node:22-alpine sh

# คำสั่งต่อไปนี้พิมพ์ภายใน Container (หลังเครื่องหมาย /app #)
npm init -y
npm install -D typescript tsx @types/node
npx tsc --init        # สร้าง tsconfig.json พร้อมคำอธิบายแต่ละตัวเลือก</pre>
</div>
                <p>สร้างไฟล์ <code class="inline-code">hello.ts</code> แล้วลองทุกเครื่องมือ:</p>
<div class="code-window">
    <div class="code-header">
        <span class="code-lang">sh ใน Container</span>
        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
    </div>
    <pre>npx tsx hello.ts      # รันทันที (ไม่ตรวจ Type)
npx tsc --noEmit      # ตรวจ Type อย่างเดียว ไม่มีข้อความ = ผ่าน
node hello.ts         # Node.js 22.18+ รันได้เอง (ไม่ตรวจ Type, ไม่รองรับ Enum)
npx tsc               # แปลงเป็นไฟล์ .js (ตามตัวเลือก outDir ใน tsconfig.json)</pre>
</div>
                <p>ถ้าจำเป็นต้องใช้ ts-node (เช่น โปรเจกต์เดิมที่ใช้อยู่) ต้องติดตั้ง TypeScript เวอร์ชัน 6 คู่กันและตั้งค่า Module เป็น CommonJS:</p>
<div class="code-window">
    <div class="code-header">
        <span class="code-lang">sh ใน Container</span>
        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
    </div>
    <pre>npm install -D ts-node typescript@6
# แก้ tsconfig.json ให้มี "module": "commonjs" ใน compilerOptions แล้วจึงรัน
npx ts-node hello.ts</pre>
</div>
                <div class="error-alert-box">
                    <span class="error-title">⚠️ ถ้าใช้ ts-node กับ TypeScript 7 จะพบข้อผิดพลาดนี้</span>
<div class="code-window">
    <div class="code-header">
        <span class="code-lang">Output</span>
        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
    </div>
    <pre>TypeError: Cannot read properties of undefined (reading 'fileExists')</pre>
</div>
                    <p style="margin-top:8px;">สาเหตุ: <code>npm install typescript</code> จะได้เวอร์ชันล่าสุด (7.x) ซึ่งไม่มี JavaScript API ที่ ts-node เรียกใช้ วิธีแก้: เปลี่ยนไปใช้ <code>npx tsx</code> (แนะนำ) หรือติดตั้ง <code>typescript@6</code> แทน</p>
                </div>
                <p>ตัวเลือกใน <code class="inline-code">tsconfig.json</code> ที่ควรรู้จัก:</p>
                <table class="grading-table" style="margin: 15px 0;">
                    <tr><th width="30%">ตัวเลือก</th><th>ความหมาย</th></tr>
                    <tr><td><code class="inline-code">"strict": true</code></td><td>เปิดการตรวจแบบเข้มงวดทั้งชุด เช่น ห้าม any แบบไม่ตั้งใจ (noImplicitAny) และบังคับจัดการ null/undefined (strictNullChecks) <strong>ควรเปิดเสมอ</strong></td></tr>
                    <tr><td><code class="inline-code">"target"</code></td><td>เวอร์ชัน JavaScript ของผลลัพธ์ เช่น ES2017</td></tr>
                    <tr><td><code class="inline-code">"module"</code> / <code class="inline-code">"moduleResolution"</code></td><td>รูปแบบ Module (ESM หรือ CommonJS) และวิธีค้นหาไฟล์ที่ import</td></tr>
                    <tr><td><code class="inline-code">"noEmit": true</code></td><td>ตรวจอย่างเดียว ไม่สร้างไฟล์ .js (Next.js ใช้ค่านี้เพราะแปลงโค้ดเอง)</td></tr>
                    <tr><td><code class="inline-code">"paths"</code></td><td>ตั้งชื่อย่อของ Path เช่น <code class="inline-code">"@/*": ["./*"]</code> ให้ <code class="inline-code">import ... from "@/lib/grades"</code> ได้</td></tr>
                </table>
                <p class="w3-ref">📚 อ่านเพิ่มเติมที่ W3Schools: <a href="https://www.w3schools.com/typescript/typescript_getstarted.php" target="_blank" rel="noopener">TS Get Started</a> · <a href="https://www.w3schools.com/typescript/typescript_5_updates.php" target="_blank" rel="noopener">TS 5 Updates</a> และเอกสารทางการ: <a href="https://tsx.is/" target="_blank" rel="noopener">tsx</a> · <a href="https://nodejs.org/api/typescript.html" target="_blank" rel="noopener">Node.js — Modules: TypeScript</a> · <a href="https://www.typescriptlang.org/tsconfig/" target="_blank" rel="noopener">TSConfig Reference</a></p>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="lesson-section" id="workshop">
                <h3>🛠️ 4. ตัวอย่างการปฏิบัติการทีละขั้นตอน (Step-by-Step Walkthrough)</h3>
                <p>ปฏิบัติการแบ่งเป็น 3 ช่วง <strong>ช่วงที่ 1 (ขั้นตอนที่ 1–3)</strong> ติดตั้ง TypeScript และฝึกเครื่องมือ tsx, node, tsc ด้วยไฟล์ Playground <strong>ช่วงที่ 2 (ขั้นตอนที่ 4–7)</strong> แปลงโปรเจกต์ <code class="inline-code">first-nextjs-app</code> ทั้งโปรเจกต์เป็น TypeScript และแก้ Type Error ทุกจุด <strong>ช่วงที่ 3 (ขั้นตอนที่ 8–9)</strong> สร้างหน้า <code class="inline-code">/progress</code> แสดงความก้าวหน้าการเรียนตั้งแต่หน่วยที่ 1 ดังรูปที่ 4.3 แล้วส่งงานขึ้น GitHub</p>
                <div class="image-container">
                    <div>
                        <figure class="custom-image-box" style="max-width: 760px;">
                            <img src="img/unit4-progress-desktop.png" alt="ภาพหน้าจอหน้าความก้าวหน้าการเรียน แสดงแถบความคืบหน้า 60 เปอร์เซ็นต์ และไทม์ไลน์หน่วยที่ 1 ถึง 5 พร้อมสถานะและลิงก์ผลงาน" class="responsive-img">
                            <figcaption class="image-caption">
                                <strong>รูปที่ 4.3:</strong> เป้าหมายของปฏิบัติการ — หน้า <code>/progress</code> สรุปผลงานตั้งแต่หน่วยที่ 1 เขียนด้วย TypeScript ทั้งหมด
                                <span class="image-source">🔗 แหล่งอ้างอิงภาพ: ภาพหน้าจอจากการรันโค้ดตัวอย่างจริง</span>
                            </figcaption>
                        </figure>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 1</div>
                    <div class="step-detail">
                        <strong>เตรียม Branch และติดตั้งแพ็กเกจ TypeScript</strong>
                        <p>เปิด Docker Desktop และเปิดโฟลเดอร์ <code class="inline-code">first-nextjs-app</code> ใน VS Code จากนั้นใน Terminal:</p>
<div class="code-window">
    <div class="code-header">
        <span class="code-lang">PowerShell</span>
        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
    </div>
    <pre>docker compose up -d
git switch main
git pull
git switch -c feature/typescript
docker compose exec app npm install -D typescript tsx @types/react @types/react-dom @types/node</pre>
</div>
                        <table class="grading-table" style="margin: 15px 0;">
                            <tr><th width="30%">แพ็กเกจ</th><th>หน้าที่</th></tr>
                            <tr><td><code class="inline-code">typescript</code></td><td>ตัวตรวจ Type (คำสั่ง tsc) ที่ Next.js ใช้ตอน Build</td></tr>
                            <tr><td><code class="inline-code">tsx</code></td><td>รันไฟล์ .ts ใน Playground</td></tr>
                            <tr><td><code class="inline-code">@types/react</code>, <code class="inline-code">@types/react-dom</code>, <code class="inline-code">@types/node</code></td><td>ไฟล์นิยาม Type ของ React และ Node.js (จาก DefinitelyTyped)</td></tr>
                        </table>
                        <p>ตรวจเวอร์ชันที่ได้:</p>
<div class="code-window">
    <div class="code-header">
        <span class="code-lang">PowerShell</span>
        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
    </div>
    <pre>docker compose exec app npx tsc --version</pre>
</div>
<div class="code-window">
    <div class="code-header">
        <span class="code-lang">Output</span>
        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
    </div>
    <pre>Version 6.0.3</pre>
</div>
                        <p style="font-size:0.9rem; color:#64748b;">💡 ทำไมได้ TypeScript 6 ไม่ใช่ 7? เพราะ <code class="inline-code">eslint-config-next</code> ที่ติดตั้งมาตั้งแต่หน่วยที่ 1 ใช้ปลั๊กอิน <code class="inline-code">@typescript-eslint</code> ซึ่งรองรับ TypeScript ต่ำกว่า 6.1 npm จึงเลือกเวอร์ชันล่าสุดที่เข้ากันได้ให้อัตโนมัติ กฎการตรวจ Type เหมือน TypeScript 7 ทุกประการ <strong>ไม่ต้องบังคับติดตั้งเวอร์ชัน 7</strong> (จะทำให้ <code class="inline-code">npm install</code> แจ้งข้อผิดพลาดเรื่อง peer dependency)</p>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 2</div>
                    <div class="step-detail">
                        <strong>Playground 5: ทบทวนไวยากรณ์ TypeScript แล้วรันด้วย tsx และ node</strong>
                        <p>สร้างไฟล์ <code class="inline-code">playground/05-typescript.ts</code> ในโฟลเดอร์ Playground เดิมจากหน่วยที่ 3 (ทบทวนเรื่องที่ 4.2–4.10):</p>
<div class="code-window">
    <div class="code-header">
        <span class="code-lang">playground/05-typescript.ts</span>
        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
    </div>
    <pre>// ===== 1) Type Annotation และ Type Inference =====
const studentName: string = "สมชาย"; // ระบุชนิดเอง
const score = 85; // TypeScript อนุมานเองว่าเป็น number
console.log(studentName, score, typeof score);

// ===== 2) Interface และ Optional Property (?) =====
interface Student {
  id: number;
  name: string;
  score: number;
  nickname?: string;
}

const students: Student[] = [
  { id: 1, name: "สมชาย", score: 85, nickname: "ชาย" },
  { id: 2, name: "สมหญิง", score: 92 },
  { id: 3, name: "สมศักดิ์", score: 47 },
];

// ===== 3) Union Type + Literal Type: มีได้แค่ค่าที่กำหนด =====
type Status = "ผ่าน" | "ไม่ผ่าน";
const getStatus = (s: Student): Status =&gt; (s.score &gt;= 50 ? "ผ่าน" : "ไม่ผ่าน");

// ===== 4) ฟังก์ชันที่ระบุชนิดของพารามิเตอร์และค่าที่คืน =====
function average(list: Student[]): number {
  return list.reduce((sum, s) =&gt; sum + s.score, 0) / list.length;
}

for (const s of students) {
  console.log(`${s.name} (${s.nickname ?? "-"}) ${s.score} คะแนน → ${getStatus(s)}`);
}
console.log("ค่าเฉลี่ย:", average(students).toFixed(2));

// ===== 5) Generics: ฟังก์ชันเดียวใช้ได้กับข้อมูลหลายชนิด =====
function firstItem&lt;T&gt;(items: T[]): T | undefined {
  return items[0];
}
console.log(firstItem(students)?.name, firstItem([10, 20, 30]), firstItem&lt;string&gt;([]));

// ===== 6) Utility Types: Pick และ Partial =====
type StudentPreview = Pick&lt;Student, "name" | "score"&gt;;
const preview: StudentPreview = { name: "มานี", score: 68 };
const update: Partial&lt;Student&gt; = { score: 90 };
console.log(preview, { ...students[1], ...update });

// ทำให้ไฟล์นี้เป็น Module: ชื่อตัวแปรและ Type ภายในไฟล์จะไม่ชนกับไฟล์อื่น
export {};</pre>
</div>
                        <p>รันด้วย tsx:</p>
<div class="code-window">
    <div class="code-header">
        <span class="code-lang">PowerShell</span>
        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
    </div>
    <pre>docker compose exec app npx tsx playground/05-typescript.ts</pre>
</div>
<div class="code-window">
    <div class="code-header">
        <span class="code-lang">Output</span>
        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
    </div>
    <pre>สมชาย 85 number
สมชาย (ชาย) 85 คะแนน → ผ่าน
สมหญิง (-) 92 คะแนน → ผ่าน
สมศักดิ์ (-) 47 คะแนน → ไม่ผ่าน
ค่าเฉลี่ย: 74.67
สมชาย 10 undefined
{ name: 'มานี', score: 68 } { id: 2, name: 'สมหญิง', score: 90 }</pre>
</div>
                        <p>ลองรันด้วย Node.js โดยตรง (Container ใช้ Node.js 22 ซึ่งรองรับไฟล์ .ts แล้ว):</p>
<div class="code-window">
    <div class="code-header">
        <span class="code-lang">PowerShell</span>
        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
    </div>
    <pre>docker compose exec app node playground/05-typescript.ts</pre>
</div>
                        <p>ผลลัพธ์เหมือนกันทุกบรรทัด แต่จะมีคำเตือน <code class="inline-code">[MODULE_TYPELESS_PACKAGE_JSON]</code> เพิ่มขึ้นมา เพราะ Node.js ต้องเดาว่าไฟล์ที่มี <code class="inline-code">export</code> เป็น ES Module (คำเตือนนี้ไม่มีผลต่อการทำงาน และ tsx ไม่แสดงคำเตือนนี้)</p>
                        <p style="font-size:0.9rem; color:#64748b;">💡 บรรทัด <code class="inline-code">export {};</code> ท้ายไฟล์ทำให้ไฟล์เป็น Module ชื่อ <code class="inline-code">Student</code> และตัวแปรในไฟล์นี้จึงไม่ชนกับไฟล์อื่น ถ้าไม่ใส่ TypeScript จะมองว่าทุกไฟล์ที่ไม่มี import/export อยู่ในขอบเขตเดียวกัน และ <code class="inline-code">interface Student</code> ของสองไฟล์จะถูกรวมกันจนเกิด Error ในขั้นตอนถัดไป</p>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 3</div>
                    <div class="step-detail">
                        <strong>Playground 6: เปรียบเทียบ tsx, node และ tsc เมื่อโค้ดผิดชนิด</strong>
                        <p>สร้างไฟล์ <code class="inline-code">playground/06-type-error.ts</code> ที่ตั้งใจใส่คะแนนเป็นข้อความ:</p>
<div class="code-window">
    <div class="code-header">
        <span class="code-lang">playground/06-type-error.ts</span>
        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
    </div>
    <pre>interface Student {
  name: string;
  score: number;
}

// ❌ ตั้งใจใส่คะแนนเป็นข้อความ "85" เพื่อดูว่าเครื่องมือแต่ละตัวทำอย่างไร
const student: Student = { name: "สมชาย", score: "85" };

console.log("คะแนนบวกโบนัส 5 คะแนน =", student.score + 5);

// ทำให้ไฟล์นี้เป็น Module: ชื่อตัวแปรและ Type ภายในไฟล์จะไม่ชนกับไฟล์อื่น
export {};</pre>
</div>
                        <p><strong>3.1 รันด้วย tsx และ node</strong> (ไม่ตรวจ Type):</p>
<div class="code-window">
    <div class="code-header">
        <span class="code-lang">PowerShell</span>
        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
    </div>
    <pre>docker compose exec app npx tsx playground/06-type-error.ts
docker compose exec app node playground/06-type-error.ts</pre>
</div>
<div class="code-window">
    <div class="code-header">
        <span class="code-lang">Output (ทั้งสองคำสั่ง)</span>
        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
    </div>
    <pre>คะแนนบวกโบนัส 5 คะแนน = 855</pre>
</div>
                        <p>ทั้งสองคำสั่งรันได้โดยไม่มีคำเตือนใด ๆ แต่ <strong>ผลลัพธ์ผิด</strong> เพราะ <code class="inline-code">"85" + 5</code> กลายเป็นการต่อข้อความ (ปัญหาเดียวกับหน่วยที่ 3)</p>
                        <p><strong>3.2 ตรวจด้วย tsc</strong> (ตรวจทั้งโปรเจกต์ ในขั้นตอนนี้โปรเจกต์ยังไม่มี tsconfig.json จึงระบุไฟล์โดยตรง):</p>
<div class="code-window">
    <div class="code-header">
        <span class="code-lang">PowerShell</span>
        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
    </div>
    <pre>docker compose exec app npx tsc --noEmit --strict playground/06-type-error.ts</pre>
</div>
<div class="code-window">
    <div class="code-header">
        <span class="code-lang">Output</span>
        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
    </div>
    <pre>playground/06-type-error.ts(7,43): error TS2322: Type 'string' is not assignable to type 'number'.</pre>
</div>
                        <p>อ่านข้อความได้ว่า <strong>ไฟล์</strong> <code class="inline-code">06-type-error.ts</code> <strong>บรรทัดที่ 7 ตัวอักษรที่ 43</strong> พบ Error รหัส TS2322 คือ "ใส่ข้อความในที่ที่ต้องเป็นตัวเลข" แก้ไขบรรทัดที่ 7 ให้เป็น <code class="inline-code">score: 85</code> (ไม่มีเครื่องหมายคำพูด) แล้วตรวจใหม่ จะไม่มีข้อความใด ๆ (= ผ่าน) และเมื่อรันด้วย tsx จะได้ <code class="inline-code">คะแนนบวกโบนัส 5 คะแนน = 90</code> ที่ถูกต้อง</p>
                        <p style="font-size:0.9rem; color:#64748b;">💡 ทดลองแบบเดียวกันได้ทันทีในกล่องโค้ดเรื่องที่ 4.1 ด้วยปุ่ม ⚡ (เหมือน tsx) และ ▶ (เหมือน tsc) ส่วน ts-node จะหยุดพร้อม <code class="inline-code">TSError: ⨯ Unable to compile TypeScript</code> แต่ไม่ได้ติดตั้งในโปรเจกต์นี้เพราะต้องตั้งค่า Module เป็น CommonJS ซึ่งไม่เข้ากับ Next.js (เรื่องที่ 4.12)</p>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 4</div>
                    <div class="step-detail">
                        <strong>แปลงโปรเจกต์: เปลี่ยนนามสกุลไฟล์และสร้าง tsconfig.json</strong>
                        <p>ใช้ <code class="inline-code">git mv</code> เปลี่ยนชื่อไฟล์ (Git จะจำได้ว่าเป็นไฟล์เดิมที่เปลี่ยนชื่อ ประวัติการแก้ไขไม่หาย) หลักการคือ <strong>ไฟล์ที่มี JSX ใช้ .tsx</strong> ไฟล์อื่นใช้ <strong>.ts</strong> ส่วนไฟล์ <code class="inline-code">.mjs</code> ใน Playground และไฟล์ตั้งค่า เช่น <code class="inline-code">next.config.mjs</code> ไม่ต้องเปลี่ยน:</p>
<div class="code-window">
    <div class="code-header">
        <span class="code-lang">PowerShell</span>
        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
    </div>
    <pre>git mv app/layout.js app/layout.tsx
git mv app/page.js app/page.tsx
git mv app/about/page.js app/about/page.tsx
git mv app/contact/page.js app/contact/page.tsx
git mv app/services/page.js app/services/page.tsx
git mv app/students/page.js app/students/page.tsx
git mv app/components/Navbar.js app/components/Navbar.tsx
git mv app/components/Footer.js app/components/Footer.tsx
git mv app/components/Counter.js app/components/Counter.tsx
git mv app/components/StudentBoard.js app/components/StudentBoard.tsx
git mv app/api/hello/route.js app/api/hello/route.ts
git mv app/api/students/route.js app/api/students/route.ts
git mv data/students.js data/students.ts
git mv lib/grades.js lib/grades.ts</pre>
</div>
                        <p style="font-size:0.9rem; color:#64748b;">💡 ถ้าโปรเจกต์ของผู้เรียนมีไฟล์อื่นเพิ่มเติม (จากใบงาน) ให้เปลี่ยนตามหลักเดียวกัน ตรวจว่าไม่เหลือไฟล์ .js ในโฟลเดอร์ <code class="inline-code">app</code>, <code class="inline-code">data</code>, <code class="inline-code">lib</code> ได้ด้วย <code class="inline-code">git status</code></p>
                        <p>รีสตาร์ต Container ให้ Next.js ตรวจพบไฟล์ TypeScript แล้วดู Log:</p>
<div class="code-window">
    <div class="code-header">
        <span class="code-lang">PowerShell</span>
        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
    </div>
    <pre>docker compose restart app
docker compose logs -f app</pre>
</div>
                        <p>เมื่อ Next.js เริ่มทำงาน จะสร้างไฟล์ <code class="inline-code">tsconfig.json</code> และ <code class="inline-code">next-env.d.ts</code> ให้อัตโนมัติ (กด <kbd>Ctrl</kbd>+<kbd>C</kbd> เพื่อออกจาก Log) จากนั้นแก้ <code class="inline-code">tsconfig.json</code> 2 จุด:</p>
                        <ul style="margin: 10px 0 10px 20px; line-height: 1.8;">
                            <li>เปลี่ยน <code class="inline-code">"strict": false</code> เป็น <code class="inline-code">"strict": true</code> — Next.js ตั้งเป็น false ไว้เพื่อให้โปรเจกต์เดิมย้ายมาง่าย แต่จะพลาดการตรวจที่สำคัญที่สุด</li>
                            <li>เพิ่ม <code class="inline-code">"paths"</code> ไว้ท้าย <code class="inline-code">compilerOptions</code> โดยคัดลอกจาก <code class="inline-code">jsconfig.json</code> เดิม (เพื่อให้ <code class="inline-code">@/</code> ยังใช้ได้)</li>
                        </ul>
                        <p>ผลลัพธ์ที่ถูกต้อง:</p>
<div class="code-window">
    <div class="code-header">
        <span class="code-lang">tsconfig.json</span>
        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
    </div>
    <pre>{
  "compilerOptions": {
    "target": "ES2017",
    "lib": [
      "dom",
      "dom.iterable",
      "esnext"
    ],
    "allowJs": true,
    "skipLibCheck": true,
    "strict": true,
    "noEmit": true,
    "incremental": true,
    "module": "esnext",
    "esModuleInterop": true,
    "moduleResolution": "bundler",
    "resolveJsonModule": true,
    "isolatedModules": true,
    "jsx": "react-jsx",
    "plugins": [
      {
        "name": "next"
      }
    ],
    "paths": {
      "@/*": [
        "./*"
      ]
    }
  },
  "include": [
    "next-env.d.ts",
    ".next/types/**/*.ts",
    ".next/dev/types/**/*.ts",
    "**/*.mts",
    "**/*.ts",
    "**/*.tsx"
  ],
  "exclude": [
    "node_modules"
  ]
}</pre>
</div>
                        <p>เมื่อมี <code class="inline-code">tsconfig.json</code> แล้ว Next.js จะไม่อ่าน <code class="inline-code">jsconfig.json</code> อีก จึงลบทิ้งด้วย Git:</p>
<div class="code-window">
    <div class="code-header">
        <span class="code-lang">PowerShell</span>
        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
    </div>
    <pre>git rm jsconfig.json
docker compose restart app</pre>
</div>
                        <p style="font-size:0.9rem; color:#64748b;">💡 ไฟล์ <code class="inline-code">next-env.d.ts</code> และ <code class="inline-code">*.tsbuildinfo</code> ถูกระบุใน <code class="inline-code">.gitignore</code> ของ create-next-app อยู่แล้ว จึงไม่ถูก Commit (Next.js สร้างใหม่ทุกครั้ง) เปิด <code class="inline-code">localhost:3000</code> จะพบว่าทุกหน้ายังทำงานได้ตามปกติ เพราะระหว่างพัฒนา Next.js แค่ตัด Type ทิ้งแล้วรัน <strong>ยังไม่ได้ตรวจ Type</strong> (เหมือน tsx)</p>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 5</div>
                    <div class="step-detail">
                        <strong>ตรวจ Type ทั้งโปรเจกต์ด้วย tsc และอ่านข้อผิดพลาด</strong>
<div class="code-window">
    <div class="code-header">
        <span class="code-lang">PowerShell</span>
        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
    </div>
    <pre>docker compose exec app npx tsc --noEmit</pre>
</div>
<div class="code-window">
    <div class="code-header">
        <span class="code-lang">Output (27 errors)</span>
        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
    </div>
    <pre>app/components/StudentBoard.tsx(6,15): error TS7006: Parameter 'ms' implicitly has an 'any' type.
app/components/StudentBoard.tsx(30,16): error TS18046: 'err' is of type 'unknown'.
app/components/StudentBoard.tsx(37,22): error TS7006: Parameter 'event' implicitly has an 'any' type.
app/components/StudentBoard.tsx(48,18): error TS2322: Type '{ id: number; name: string; score: number; }' is not assignable to type 'never'.
app/components/StudentBoard.tsx(48,31): error TS2322: Type '{ id: number; name: string; score: number; }' is not assignable to type 'never'.
app/components/StudentBoard.tsx(55,25): error TS7006: Parameter 'id' implicitly has an 'any' type.
app/components/StudentBoard.tsx(56,42): error TS2339: Property 'id' does not exist on type 'never'.
app/components/StudentBoard.tsx(62,22): error TS2339: Property 'name' does not exist on type 'never'.
app/components/StudentBoard.tsx(63,45): error TS2339: Property 'score' does not exist on type 'never'.
app/components/StudentBoard.tsx(63,55): error TS2339: Property 'score' does not exist on type 'never'.
app/components/StudentBoard.tsx(63,65): error TS2339: Property 'name' does not exist on type 'never'.
app/components/StudentBoard.tsx(63,86): error TS2339: Property 'name' does not exist on type 'never'.
app/components/StudentBoard.tsx(82,36): error TS2339: Property 'score' does not exist on type 'never'.
app/components/StudentBoard.tsx(83,32): error TS2339: Property 'score' does not exist on type 'never'.
app/components/StudentBoard.tsx(85,24): error TS2339: Property 'id' does not exist on type 'never'.
app/components/StudentBoard.tsx(86,48): error TS2339: Property 'name' does not exist on type 'never'.
app/components/StudentBoard.tsx(88,53): error TS2339: Property 'score' does not exist on type 'never'.
app/components/StudentBoard.tsx(92,49): error TS2339: Property 'id' does not exist on type 'never'.
app/components/StudentBoard.tsx(93,39): error TS2339: Property 'name' does not exist on type 'never'.
app/layout.tsx(13,38): error TS7031: Binding element 'children' implicitly has an 'any' type.
lib/grades.ts(16,26): error TS7006: Parameter 'score' implicitly has an 'any' type.
lib/grades.ts(16,36): error TS2532: Object is possibly 'undefined'.
lib/grades.ts(18,27): error TS7006: Parameter 'list' implicitly has an 'any' type.
lib/grades.ts(24,30): error TS7006: Parameter 'sum' implicitly has an 'any' type.
lib/grades.ts(24,35): error TS7006: Parameter 's' implicitly has an 'any' type.
lib/grades.ts(29,32): error TS7006: Parameter 's' implicitly has an 'any' type.
lib/grades.ts(30,26): error TS7006: Parameter 's' implicitly has an 'any' type.</pre>
</div>
                        <p>อย่าตกใจกับจำนวน Error! ทั้งหมดมาจาก 3 ไฟล์ และแบ่งได้เพียง 5 กลุ่ม ซึ่งจะแก้ในขั้นตอนที่ 6–7:</p>
                        <table class="grading-table" style="margin: 15px 0;">
                            <tr><th width="16%">รหัส</th><th>ความหมาย</th><th width="34%">วิธีแก้</th></tr>
                            <tr><td>TS7006, TS7031</td><td>พารามิเตอร์ไม่มี Type จึงเป็น any โดยไม่ตั้งใจ (ถูกห้ามเพราะเปิด strict)</td><td>ระบุ Type ให้พารามิเตอร์ เช่น <code class="inline-code">(score: number)</code></td></tr>
                            <tr><td>TS2322, TS2339 (never)</td><td><code class="inline-code">useState([])</code> ไม่รู้ว่า Array จะเก็บอะไร จึงเป็น <code class="inline-code">never[]</code> ใส่อะไรไม่ได้และอ่าน Property ใดไม่ได้</td><td>ระบุ Generic <code class="inline-code">useState&lt;Student[]&gt;([])</code> แก้ได้ 15 จุดในบรรทัดเดียว</td></tr>
                            <tr><td>TS18046</td><td><code class="inline-code">err</code> ใน catch เป็น unknown เพราะสิ่งที่ถูก throw อาจไม่ใช่ Error</td><td>ตรวจด้วย <code class="inline-code">err instanceof Error</code> ก่อนใช้ <code class="inline-code">.message</code></td></tr>
                            <tr><td><strong>TS2532</strong></td><td><code class="inline-code">find()</code> อาจคืน undefined แล้วนำไปอ่าน <code class="inline-code">.grade</code> ต่อทันที</td><td>ใช้ <code class="inline-code">?.</code> และ <code class="inline-code">??</code> (เรื่องที่ 4.4)</td></tr>
                        </table>
                        <div class="try-hint">🐞 <strong>TypeScript พบบั๊กจริงที่ซ่อนอยู่ตั้งแต่หน่วยที่ 3!</strong> Error <code class="inline-code">lib/grades.ts(16,36): Object is possibly 'undefined'</code> หมายความว่าถ้าคะแนนติดลบ (เช่น ผู้ใช้พิมพ์ -5 ในฟอร์ม) <code class="inline-code">find()</code> จะหาเกณฑ์ไม่เจอ และหน้าเว็บจะพังด้วย <code class="inline-code">Cannot read properties of undefined (reading 'grade')</code> ซึ่ง JavaScript ไม่เคยเตือนเลย</div>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 6</div>
                    <div class="step-detail">
                        <strong>สร้าง Type กลาง และเพิ่ม Type ให้ข้อมูลและฟังก์ชันคำนวณ</strong>
                        <p><strong>6.1</strong> สร้างโฟลเดอร์ <code class="inline-code">types</code> (ระดับเดียวกับ <code class="inline-code">app</code>, <code class="inline-code">data</code>, <code class="inline-code">lib</code>) และไฟล์ <code class="inline-code">types/student.ts</code> เก็บ Type ที่ใช้ร่วมกันทั้งโปรเจกต์ไว้ที่เดียว:</p>
<div class="code-window">
    <div class="code-header">
        <span class="code-lang">types/student.ts</span>
        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
    </div>
    <pre>// Type กลางของข้อมูลนักศึกษา ใช้ร่วมกันทั้ง data, lib, API และหน้าเว็บ
export interface Student {
  id: number;
  name: string;
  score: number;
}

// Literal Union Type: เกรดมีได้เฉพาะ 8 ค่านี้เท่านั้น
export type Grade = "4" | "3.5" | "3" | "2.5" | "2" | "1.5" | "1" | "0";

export type SortBy = "score" | "name";

export interface ScoreSummary {
  count: number;
  average: number;
  max: number;
  passed: number;
}</pre>
</div>
                        <p><strong>6.2</strong> แก้ <code class="inline-code">data/students.ts</code> เพิ่ม 1 บรรทัด import และระบุ Type ให้ Array:</p>
<div class="code-window">
    <div class="code-header">
        <span class="code-lang">data/students.ts</span>
        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
    </div>
    <pre>import type { Student } from "@/types/student";

export const students: Student[] = [
  { id: 1, name: "สมชาย ใจดี", score: 85 },
  { id: 2, name: "สมหญิง รักเรียน", score: 92 },
  { id: 3, name: "สมศักดิ์ ตั้งใจ", score: 47 },
  { id: 4, name: "มานี มีนา", score: 68 },
  { id: 5, name: "ปิติ ชูใจ", score: 76 },
  { id: 6, name: "วีระ กล้าหาญ", score: 58 },
];</pre>
</div>
                        <p style="font-size:0.9rem; color:#64748b;">💡 <code class="inline-code">import type</code> นำเข้าเฉพาะ Type ซึ่งจะถูกตัดทิ้งทั้งบรรทัดตอนรันจริง ไม่ทำให้ขนาดไฟล์ใหญ่ขึ้น</p>
                        <p><strong>6.3</strong> แก้ <code class="inline-code">lib/grades.ts</code> ทั้งไฟล์ (ระบุ Type ให้พารามิเตอร์และค่าที่คืน และแก้บั๊กคะแนนติดลบ):</p>
<div class="code-window">
    <div class="code-header">
        <span class="code-lang">lib/grades.ts</span>
        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
    </div>
    <pre>import type { Grade, ScoreSummary, Student } from "@/types/student";

export const PASS_SCORE = 50;

// เกณฑ์ตัดเกรด 8 ระดับ เรียงจากคะแนนมากไปน้อย (readonly = ห้ามแก้ไขตารางนี้)
const gradeTable: readonly { min: number; grade: Grade }[] = [
  { min: 80, grade: "4" },
  { min: 75, grade: "3.5" },
  { min: 70, grade: "3" },
  { min: 65, grade: "2.5" },
  { min: 60, grade: "2" },
  { min: 55, grade: "1.5" },
  { min: 50, grade: "1" },
  { min: 0, grade: "0" },
];

// find() คืนค่า undefined ได้ถ้าไม่พบแถวที่ตรง (เช่น คะแนนติดลบ)
// TypeScript จึงบังคับให้จัดการกรณีนี้ด้วย ?. และ ?? (เดิมในหน่วยที่ 3 โปรแกรมจะพังตรงนี้)
export const getGrade = (score: number): Grade =&gt;
  gradeTable.find((row) =&gt; score &gt;= row.min)?.grade ?? "0";

export function summarize(list: Student[]): ScoreSummary {
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
                        <table class="grading-table" style="margin: 15px 0;">
                            <tr><th width="38%">โค้ด</th><th>ความหมาย</th></tr>
                            <tr><td><code class="inline-code">readonly { min: number; grade: Grade }[]</code></td><td>Array ของ Object ที่อ่านได้อย่างเดียว และ grade ต้องเป็น 1 ใน 8 ค่าของ <code class="inline-code">Grade</code> เท่านั้น พิมพ์ <code class="inline-code">"3.0"</code> ผิดจะถูกเตือนทันที</td></tr>
                            <tr><td><code class="inline-code">(score: number): Grade =&gt;</code></td><td>รับตัวเลข คืนค่าเกรด (Return Type ของ Arrow Function อยู่หลังวงเล็บ)</td></tr>
                            <tr><td><code class="inline-code">?.grade ?? "0"</code></td><td>ถ้าหาเกณฑ์ไม่เจอ ให้ได้เกรด "0" แทนการพัง</td></tr>
                            <tr><td><code class="inline-code">summarize(list: Student[]): ScoreSummary</code></td><td>รับ Array ของ Student คืน Object สรุปผลที่มีครบ 4 ค่า ถ้าลืมคืนค่าใดค่าหนึ่ง TypeScript จะเตือน</td></tr>
                        </table>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 7</div>
                    <div class="step-detail">
                        <strong>เพิ่ม Type ให้คอมโพเนนต์: StatCard, StudentBoard และ Layout</strong>
                        <p><strong>7.1</strong> สร้างคอมโพเนนต์ใหม่ <code class="inline-code">app/components/StatCard.tsx</code> แทนการ์ดสรุปผล 4 ใบที่เขียนซ้ำกันในหน่วยที่ 3 (ฝึกกำหนด Type ให้ Props):</p>
<div class="code-window">
    <div class="code-header">
        <span class="code-lang">app/components/StatCard.tsx</span>
        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
    </div>
    <pre>// Interface กำหนด Props ที่คอมโพเนนต์นี้รับ: ส่งผิดชนิดหรือลืมส่ง TypeScript จะเตือนทันที
interface StatCardProps {
  label: string;
  value: string | number;
  highlight?: boolean; // ? = ไม่ส่งมาก็ได้
}

export default function StatCard({ label, value, highlight = false }: StatCardProps) {
  return (
    &lt;div className="rounded-xl bg-white p-4 shadow"&gt;
      &lt;dt className="text-sm text-slate-500"&gt;{label}&lt;/dt&gt;
      &lt;dd className={`text-2xl font-bold ${highlight ? "text-green-600" : ""}`}&gt;{value}&lt;/dd&gt;
    &lt;/div&gt;
  );
}</pre>
</div>
                        <p><strong>7.2</strong> แก้ <code class="inline-code">app/components/StudentBoard.tsx</code> ทั้งไฟล์ (ส่วนที่เปลี่ยนจากหน่วยที่ 3 สรุปไว้ในตารางใต้โค้ด):</p>
<div class="code-window">
    <div class="code-header">
        <span class="code-lang">app/components/StudentBoard.tsx</span>
        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
    </div>
    <pre>"use client";

import { useState, type FormEvent, type ReactNode } from "react";
import { getGrade, summarize, PASS_SCORE } from "@/lib/grades";
import type { SortBy, Student } from "@/types/student";
import StatCard from "./StatCard";

const wait = (ms: number) =&gt; new Promise&lt;void&gt;((resolve) =&gt; setTimeout(resolve, ms));

export default function StudentBoard() {
  const [students, setStudents] = useState&lt;Student[]&gt;([]);
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState("");
  const [query, setQuery] = useState("");
  const [sortBy, setSortBy] = useState&lt;SortBy&gt;("score");
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
      const data: Student[] = await response.json();
      setStudents(data);
    } catch (err) {
      // สิ่งที่ถูก throw อาจไม่ใช่ Error เสมอ (ชนิด unknown) จึงต้องตรวจก่อนใช้ .message
      setError(err instanceof Error ? err.message : "เกิดข้อผิดพลาดที่ไม่ทราบสาเหตุ");
    } finally {
      setLoading(false);
    }
  }

  // ===== เพิ่มนักศึกษาจากฟอร์ม =====
  function handleAdd(event: FormEvent&lt;HTMLFormElement&gt;) {
    event.preventDefault(); // ไม่ให้เบราว์เซอร์โหลดหน้าใหม่เมื่อกดส่งฟอร์ม
    const trimmedName = name.trim();
    const value = Number(score);

    if (trimmedName === "" || score === "" || value &lt; 0 || value &gt; 100) {
      setError("กรุณากรอกชื่อ และคะแนนระหว่าง 0–100");
      return;
    }

    const newStudent: Student = { id: Date.now(), name: trimmedName, score: value };
    setStudents([...students, newStudent]);
    setName("");
    setScore("");
    setError("");
  }

  // ===== ลบนักศึกษาตาม id =====
  function handleDelete(id: number) {
    setStudents(students.filter((s) =&gt; s.id !== id));
  }

  // ===== คำนวณสิ่งที่จะแสดงจากข้อมูลปัจจุบัน =====
  const keyword = query.trim().toLowerCase();
  const visible = [...students]
    .filter((s) =&gt; s.name.toLowerCase().includes(keyword))
    .sort((a, b) =&gt; (sortBy === "score" ? b.score - a.score : a.name.localeCompare(b.name, "th")));
  const { count, average, max, passed } = summarize(visible);

  // ===== เลือกสิ่งที่จะแสดงในส่วนรายชื่อด้วย if / else if / else =====
  let listContent: ReactNode;
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
          onChange={(e) =&gt; setSortBy(e.target.value as SortBy)}
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

      {/* สรุปผลด้วย reduce / Math.max / filter แสดงผ่านคอมโพเนนต์ StatCard ที่มี Props แบบมี Type */}
      &lt;dl className="grid grid-cols-2 gap-4 md:grid-cols-4"&gt;
        &lt;StatCard label="จำนวนที่แสดง" value={`${count} คน`} /&gt;
        &lt;StatCard label="คะแนนเฉลี่ย" value={average.toFixed(1)} /&gt;
        &lt;StatCard label="คะแนนสูงสุด" value={max} /&gt;
        &lt;StatCard label={`ผ่านเกณฑ์ ${PASS_SCORE}`} value={`${passed} คน`} highlight /&gt;
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
                        <table class="grading-table" style="margin: 15px 0;">
                            <tr><th width="42%">จุดที่เปลี่ยน</th><th>เหตุผล</th></tr>
                            <tr><td><code class="inline-code">import { useState, type FormEvent, type ReactNode }</code></td><td>นำเข้า Type ของ Event และสิ่งที่ React แสดงผลได้</td></tr>
                            <tr><td><code class="inline-code">new Promise&lt;void&gt;(...)</code></td><td>Promise ที่ไม่คืนค่า (แค่รอเวลา)</td></tr>
                            <tr><td><code class="inline-code">useState&lt;Student[]&gt;([])</code>, <code class="inline-code">useState&lt;SortBy&gt;("score")</code></td><td>บอกชนิดของ State (แก้ Error กลุ่ม never ทั้ง 15 จุด)</td></tr>
                            <tr><td><code class="inline-code">const data: Student[] = await response.json();</code></td><td><code class="inline-code">response.json()</code> คืน any จึงระบุว่าข้อมูลจาก API ต้องเป็น Student[]</td></tr>
                            <tr><td><code class="inline-code">err instanceof Error ? err.message : "..."</code></td><td>Narrowing ค่า unknown ก่อนใช้</td></tr>
                            <tr><td><code class="inline-code">handleAdd(event: FormEvent&lt;HTMLFormElement&gt;)</code>, <code class="inline-code">handleDelete(id: number)</code></td><td>ระบุ Type ให้พารามิเตอร์ของ Event Handler</td></tr>
                            <tr><td><code class="inline-code">e.target.value as SortBy</code></td><td>ค่าจาก <code class="inline-code">&lt;select&gt;</code> เป็น string เสมอ แต่ตัวเลือกมีแค่ "score" และ "name" จึง Cast ได้อย่างมั่นใจ</td></tr>
                            <tr><td><code class="inline-code">&lt;StatCard label=... value=... /&gt;</code></td><td>ใช้คอมโพเนนต์ที่มี Type แทนการเขียน HTML ซ้ำ 4 ครั้ง</td></tr>
                        </table>
                        <p><strong>7.3</strong> แก้ <code class="inline-code">app/layout.tsx</code> เพิ่ม Type ให้ <code class="inline-code">metadata</code> และ <code class="inline-code">children</code> (เพิ่ม 2 บรรทัด import และแก้ 2 จุด):</p>
<div class="code-window">
    <div class="code-header">
        <span class="code-lang">app/layout.tsx</span>
        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
    </div>
    <pre>import type { Metadata } from "next";
import type { ReactNode } from "react";
import { Noto_Sans_Thai } from "next/font/google";
import Navbar from "./components/Navbar";
import Footer from "./components/Footer";
import "./globals.css";

const notoSansThai = Noto_Sans_Thai({ subsets: ["thai", "latin"] });

export const metadata: Metadata = {
  title: "สมชาย ใจดี | Front-End Developer",
  description: "เว็บไซต์แฟ้มสะสมผลงานของนักศึกษา ปวส. สาขาเทคโนโลยีสารสนเทศ",
};

export default function RootLayout({ children }: Readonly&lt;{ children: ReactNode }&gt;) {
  return (
    &lt;html lang="th"&gt;
      &lt;body className={`${notoSansThai.className} flex min-h-screen flex-col bg-slate-50 text-slate-800`}&gt;
        &lt;Navbar /&gt;
        &lt;main className="flex-1"&gt;{children}&lt;/main&gt;
        &lt;Footer /&gt;
      &lt;/body&gt;
    &lt;/html&gt;
  );
}</pre>
</div>
                        <p><strong>7.4</strong> ตรวจ Type อีกครั้ง:</p>
<div class="code-window">
    <div class="code-header">
        <span class="code-lang">PowerShell</span>
        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
    </div>
    <pre>docker compose exec app npx tsc --noEmit</pre>
</div>
                        <p>ถ้า <strong>ไม่มีข้อความใดแสดง</strong> แสดงว่าผ่านทั้งโปรเจกต์ (0 errors) เปิด <code class="inline-code">localhost:3000/students</code> ทดสอบโหลดข้อมูล ค้นหา เรียงลำดับ เพิ่ม และลบ ต้องทำงานได้เหมือนเดิมทุกอย่าง ลองพิมพ์ <code class="inline-code">student.</code> ในไฟล์ใดก็ได้ใน VS Code จะเห็นรายการ Property ให้เลือก จากนั้นบันทึกงาน:</p>
<div class="code-window">
    <div class="code-header">
        <span class="code-lang">PowerShell</span>
        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
    </div>
    <pre>git add .
git commit -m "refactor: migrate project to TypeScript with strict mode"</pre>
</div>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 8</div>
                    <div class="step-detail">
                        <strong>สร้างหน้า "ความก้าวหน้าการเรียน" (/progress) สรุปผลงานตั้งแต่หน่วยที่ 1</strong>
                        <p>หน้านี้คือ <strong>ชิ้นงานแสดงความก้าวหน้า</strong> ที่จะเพิ่มข้อมูลทุกครั้งที่เรียนจบหน่วย โดยใช้ Union Type, Interface, Optional Property, Record และ Generics ร่วมกัน</p>
                        <p><strong>8.1</strong> สร้าง <code class="inline-code">types/progress.ts</code>:</p>
<div class="code-window">
    <div class="code-header">
        <span class="code-lang">types/progress.ts</span>
        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
    </div>
    <pre>// สถานะของแต่ละหน่วยการเรียน มีได้เพียง 3 ค่านี้
export type Status = "done" | "in-progress" | "planned";

export interface Milestone {
  unit: number;
  title: string;
  skills: string[];
  status: Status;
  link?: { href: string; label: string }; // ? = บางหน่วยยังไม่มีหน้าให้ลิงก์ไป
}</pre>
</div>
                        <p><strong>8.2</strong> สร้าง <code class="inline-code">data/milestones.ts</code> เก็บข้อมูลแต่ละหน่วย (ลิงก์ไปยังหน้าที่สร้างในหน่วยนั้น ๆ):</p>
<div class="code-window">
    <div class="code-header">
        <span class="code-lang">data/milestones.ts</span>
        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
    </div>
    <pre>import type { Milestone } from "@/types/progress";

export const milestones: Milestone[] = [
  {
    unit: 1,
    title: "เริ่มต้น Next.js + Docker + Git",
    skills: ["Next.js App Router", "Docker Compose", "Git Branch / Merge"],
    status: "done",
    link: { href: "/about", label: "หน้าเกี่ยวกับฉัน" },
  },
  {
    unit: 2,
    title: "ออกแบบ Responsive ด้วย Tailwind CSS",
    skills: ["Semantic HTML5", "Tailwind CSS", "Navbar + Sidebar"],
    status: "done",
    link: { href: "/services", label: "หน้าบริการ" },
  },
  {
    unit: 3,
    title: "เว็บเชิงโต้ตอบด้วย JavaScript ES6+",
    skills: ["Array Methods", "Event", "async/await + fetch"],
    status: "done",
    link: { href: "/students", label: "ระบบคะแนน" },
  },
  {
    unit: 4,
    title: "เพิ่มความปลอดภัยของโค้ดด้วย TypeScript",
    skills: ["Interface / Type", "Union Type", "Generics"],
    status: "in-progress",
  },
  {
    unit: 5,
    title: "คอมโพเนนต์และ State ด้วย React",
    skills: ["Props", "useState", "useEffect"],
    status: "planned",
  },
];</pre>
</div>
                        <p><strong>8.3</strong> สร้าง <code class="inline-code">lib/progress.ts</code> ฟังก์ชัน Generic สำหรับนับจำนวนตามสถานะ (ต่อยอดจาก <code class="inline-code">reduce()</code> ในหน่วยที่ 3):</p>
<div class="code-window">
    <div class="code-header">
        <span class="code-lang">lib/progress.ts</span>
        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
    </div>
    <pre>// Generic Function: นับจำนวนสมาชิกแยกตามค่าที่ getKey คืนมา ใช้ได้กับข้อมูลทุกชนิด (T)
// คืนค่าเป็น Partial&lt;Record&lt;...&gt;&gt; เพราะบางค่าอาจไม่มีสมาชิกเลย (ได้ undefined)
export function countBy&lt;T, K extends string&gt;(items: T[], getKey: (item: T) =&gt; K): Partial&lt;Record&lt;K, number&gt;&gt; {
  return items.reduce&lt;Partial&lt;Record&lt;K, number&gt;&gt;&gt;((counts, item) =&gt; {
    const key = getKey(item);
    counts[key] = (counts[key] ?? 0) + 1;
    return counts;
  }, {});
}</pre>
</div>
                        <table class="grading-table" style="margin: 15px 0;">
                            <tr><th width="40%">โค้ด</th><th>ความหมาย</th></tr>
                            <tr><td><code class="inline-code">&lt;T, K extends string&gt;</code></td><td>T = ชนิดของสมาชิกใน Array (เช่น Milestone), K = ชนิดของ Key ที่ต้องเป็นข้อความ (เช่น Status)</td></tr>
                            <tr><td><code class="inline-code">getKey: (item: T) =&gt; K</code></td><td>Function Type: ฟังก์ชันที่รับสมาชิกหนึ่งตัวแล้วคืน Key</td></tr>
                            <tr><td><code class="inline-code">Partial&lt;Record&lt;K, number&gt;&gt;</code></td><td>Object ที่มี Key เป็น K และค่าเป็นจำนวน แต่บาง Key อาจไม่มี (Partial) เช่น <code class="inline-code">{ done: 3, "in-progress": 1, planned: 1 }</code></td></tr>
                        </table>
                        <p><strong>8.4</strong> สร้างหน้า <code class="inline-code">app/progress/page.tsx</code>:</p>
<div class="code-window">
    <div class="code-header">
        <span class="code-lang">app/progress/page.tsx</span>
        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
    </div>
    <pre>import type { Metadata } from "next";
import Link from "next/link";
import { milestones } from "@/data/milestones";
import { countBy } from "@/lib/progress";
import type { Milestone, Status } from "@/types/progress";

export const metadata: Metadata = {
  title: "ความก้าวหน้าการเรียน | Somchai.dev",
};

// Record&lt;Status, ...&gt; บังคับให้มีสไตล์ครบทุกสถานะ ถ้าเพิ่มสถานะใหม่แล้วลืมใส่ TypeScript จะเตือน
const statusStyle: Record&lt;Status, { label: string; badge: string; dot: string }&gt; = {
  done: { label: "เสร็จแล้ว", badge: "bg-green-100 text-green-700", dot: "bg-green-500" },
  "in-progress": { label: "กำลังเรียน", badge: "bg-amber-100 text-amber-700", dot: "bg-amber-500" },
  planned: { label: "เร็ว ๆ นี้", badge: "bg-slate-100 text-slate-500", dot: "bg-slate-300" },
};

interface MilestoneCardProps {
  milestone: Milestone;
}

function MilestoneCard({ milestone }: MilestoneCardProps) {
  const { unit, title, skills, status, link } = milestone;
  const style = statusStyle[status];

  return (
    &lt;li className="relative pl-8"&gt;
      &lt;span className={`absolute -left-[9px] top-6 h-4 w-4 rounded-full ring-4 ring-slate-50 ${style.dot}`} /&gt;
      &lt;article className="rounded-xl bg-white p-5 shadow"&gt;
        &lt;div className="mb-2 flex flex-wrap items-center gap-2"&gt;
          &lt;span className="text-sm font-semibold text-slate-500"&gt;หน่วยที่ {unit}&lt;/span&gt;
          &lt;span className={`rounded-full px-3 py-0.5 text-xs font-semibold ${style.badge}`}&gt;{style.label}&lt;/span&gt;
        &lt;/div&gt;
        &lt;h2 className="mb-3 text-lg font-bold"&gt;{title}&lt;/h2&gt;
        &lt;ul className="mb-3 flex flex-wrap gap-2"&gt;
          {skills.map((skill) =&gt; (
            &lt;li key={skill} className="rounded bg-slate-100 px-2 py-1 text-sm text-slate-700"&gt;
              {skill}
            &lt;/li&gt;
          ))}
        &lt;/ul&gt;
        {link &amp;&amp; (
          &lt;Link href={link.href} className="text-sm font-semibold text-brand hover:underline"&gt;
            ดูผลงาน: {link.label} →
          &lt;/Link&gt;
        )}
      &lt;/article&gt;
    &lt;/li&gt;
  );
}

export default function ProgressPage() {
  const counts = countBy(milestones, (m) =&gt; m.status);
  const done = counts.done ?? 0;
  const percent = Math.round((done / milestones.length) * 100);

  return (
    &lt;section className="mx-auto max-w-3xl px-4 py-12"&gt;
      &lt;h1 className="mb-2 text-3xl font-bold"&gt;เส้นทางการเรียนรู้ของฉัน&lt;/h1&gt;
      &lt;p className="mb-6 text-slate-600"&gt;ผลงานที่พัฒนาต่อเนื่องในโปรเจกต์เดียว ตั้งแต่หน่วยที่ 1 จนถึงปัจจุบัน&lt;/p&gt;

      &lt;div className="mb-10 rounded-xl bg-white p-5 shadow"&gt;
        &lt;div className="mb-2 flex justify-between text-sm font-semibold"&gt;
          &lt;span&gt;เรียนจบแล้ว {done} จาก {milestones.length} หน่วย&lt;/span&gt;
          &lt;span className="text-brand"&gt;{percent}%&lt;/span&gt;
        &lt;/div&gt;
        &lt;div className="h-3 rounded-full bg-slate-200"&gt;
          &lt;div className="h-3 rounded-full bg-brand" style={{ width: `${percent}%` }} /&gt;
        &lt;/div&gt;
        &lt;p className="mt-3 text-sm text-slate-500"&gt;
          กำลังเรียน {counts["in-progress"] ?? 0} หน่วย · รอเรียน {counts.planned ?? 0} หน่วย
        &lt;/p&gt;
      &lt;/div&gt;

      &lt;ol className="ml-2 space-y-6 border-l-2 border-slate-200"&gt;
        {milestones.map((m) =&gt; (
          &lt;MilestoneCard key={m.unit} milestone={m} /&gt;
        ))}
      &lt;/ol&gt;
    &lt;/section&gt;
  );
}</pre>
</div>
                        <p style="font-size:0.9rem; color:#64748b;">💡 <code class="inline-code">Record&lt;Status, ...&gt;</code> บังคับให้ <code class="inline-code">statusStyle</code> มีครบทุกสถานะ ลองลบบรรทัด <code class="inline-code">planned: {...}</code> แล้วรัน tsc จะพบ Error ทันที และ <code class="inline-code">countBy(milestones, (m) =&gt; m.status)</code> TypeScript อนุมาน T = Milestone และ K = Status ให้เองโดยไม่ต้องระบุ</p>
                        <p><strong>8.5</strong> เพิ่มเมนูใน <code class="inline-code">app/components/Navbar.tsx</code> 2 จุด ต่อจากเมนู "ระบบคะแนน" ทั้งเมนูหลัก (Desktop) และ Sidebar (Mobile):</p>
<div class="code-window">
    <div class="code-header">
        <span class="code-lang">app/components/Navbar.tsx (เมนูหลัก ต่อจากระบบคะแนน)</span>
        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
    </div>
    <pre>          &lt;li&gt;
            &lt;Link href="/progress" className="hover:text-blue-300"&gt;ความก้าวหน้า&lt;/Link&gt;
          &lt;/li&gt;</pre>
</div>
<div class="code-window">
    <div class="code-header">
        <span class="code-lang">app/components/Navbar.tsx (Sidebar ต่อจากระบบคะแนน)</span>
        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
    </div>
    <pre>          &lt;li&gt;
            &lt;Link href="/progress" onClick={closeMenus} className="block rounded px-3 py-2 hover:bg-slate-800"&gt;ความก้าวหน้า&lt;/Link&gt;
          &lt;/li&gt;</pre>
</div>
                        <p>เปิด <code class="inline-code">localhost:3000/progress</code> จะได้ผลตามรูปที่ 4.3 และเมื่อย่อหน้าจอเป็นมือถือ (<kbd>F12</kbd> → Toggle Device Toolbar) จะได้ตามรูปที่ 4.4 ทดลองคลิกลิงก์ "ดูผลงาน" ของแต่ละหน่วย</p>
                        <div class="image-container">
                            <div>
                                <figure class="custom-image-box" style="max-width: 320px;">
                                    <img src="img/unit4-progress-mobile.png" alt="ภาพหน้าจอหน้าความก้าวหน้าการเรียนบนมือถือ ไทม์ไลน์เรียงเป็นแนวตั้ง" class="responsive-img">
                                    <figcaption class="image-caption">
                                        <strong>รูปที่ 4.4:</strong> หน้า <code>/progress</code> บนหน้าจอมือถือ
                                        <span class="image-source">🔗 แหล่งอ้างอิงภาพ: ภาพหน้าจอจากการรันโค้ดตัวอย่างจริง</span>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 9</div>
                    <div class="step-detail">
                        <strong>ทดสอบว่า TypeScript ป้องกันการ Build ได้จริง แล้วส่งงานขึ้น GitHub</strong>
                        <p><strong>9.1 ทดลองทำผิดโดยตั้งใจ:</strong> แก้ <code class="inline-code">data/students.ts</code> บรรทัดที่ 4 ให้คะแนนเป็นข้อความ <code class="inline-code">score: "85"</code> แล้วตรวจ:</p>
<div class="code-window">
    <div class="code-header">
        <span class="code-lang">PowerShell</span>
        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
    </div>
    <pre>docker compose exec app npx tsc --noEmit</pre>
</div>
<div class="code-window">
    <div class="code-header">
        <span class="code-lang">Output</span>
        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
    </div>
    <pre>data/students.ts(4,32): error TS2322: Type 'string' is not assignable to type 'number'.</pre>
</div>
                        <p>ในโหมดพัฒนาหน้าเว็บยังเปิดได้ (เพราะไม่ตรวจ Type) แต่ถ้าสั่ง Build เพื่อนำขึ้นใช้งานจริง:</p>
<div class="code-window">
    <div class="code-header">
        <span class="code-lang">PowerShell</span>
        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
    </div>
    <pre>docker compose down
docker compose run --rm app sh -c "npm install &amp;&amp; npm run build"</pre>
</div>
                        <p>ขั้นตอน <strong>Running TypeScript</strong> จะแจ้ง Error ที่บรรทัดเดียวกัน แล้วจบด้วย <code class="inline-code">Failed to type check.</code> <strong>การ Build ล้มเหลว</strong> โค้ดที่ผิดจึงไม่มีทางถูกนำขึ้นใช้งานจริง นี่คือ "ด่านตรวจ" ที่ JavaScript ไม่มี</p>
                        <p><strong>9.2 แก้กลับ</strong> เป็น <code class="inline-code">score: 85</code> แล้ว Build ใหม่จนผ่าน ตารางผล Build ต้องมีหน้า <code class="inline-code">/progress</code> เพิ่มขึ้นมา:</p>
<div class="code-window">
    <div class="code-header">
        <span class="code-lang">PowerShell</span>
        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
    </div>
    <pre>docker compose run --rm --service-ports app sh -c "npm install &amp;&amp; npm run build &amp;&amp; npm run start"</pre>
</div>
                        <p>เปิด <code class="inline-code">localhost:3000</code> ตรวจทุกหน้า แล้วกด <kbd>Ctrl</kbd>+<kbd>C</kbd> และกลับสู่โหมดพัฒนา</p>
                        <div class="error-alert-box">
                            <span class="error-title">⚠️ ข้อผิดพลาดที่พบบ่อยในหน่วยนี้และวิธีแก้</span>
                            <ul style="margin: 10px 0 0 20px; overflow-wrap: anywhere;">
                                <li><strong><code>Module not found: Can't resolve '@/lib/grades'</code></strong> — ลบ <code>jsconfig.json</code> แล้วแต่ลืมเพิ่ม <code>"paths"</code> ใน <code>tsconfig.json</code> (ขั้นตอนที่ 4)</li>
                                <li><strong>VS Code ขีดเส้นแดง <code>Cannot find module 'react' or its corresponding type declarations</code> แต่ tsc ใน Docker ผ่าน</strong> — แพ็กเกจติดตั้งอยู่ใน Volume ของ Container โฟลเดอร์ <code>node_modules</code> บน Windows จึงว่าง VS Code มองไม่เห็น ให้ยึดผลของ <code>docker compose exec app npx tsc --noEmit</code> เป็นหลัก (ถ้าติดตั้ง Node.js บน Windows ไว้ สั่ง <code>npm install</code> บนเครื่องเพิ่มได้ เพื่อให้ VS Code ช่วยตรวจระหว่างพิมพ์)</li>
                                <li><strong><code>Property 'id' does not exist on type 'never'</code></strong> — ลืมระบุ Generic ให้ <code>useState&lt;Student[]&gt;([])</code></li>
                                <li><strong><code>Type '"3.0"' is not assignable to type 'Grade'</code></strong> — พิมพ์ค่าที่ไม่อยู่ใน Literal Union ตรวจการสะกดให้ตรงกับ <code>types/student.ts</code></li>
                                <li><strong><code>SyntaxError [ERR_UNSUPPORTED_TYPESCRIPT_SYNTAX]: TypeScript enum is not supported in strip-only mode</code></strong> — รันไฟล์ที่มี Enum ด้วย <code>node</code> โดยตรง ให้ใช้ <code>npx tsx</code> แทน</li>
                                <li><strong><code>TypeError: Cannot read properties of undefined (reading 'fileExists')</code></strong> — ใช้ ts-node กับ TypeScript 7 ให้ใช้ tsx แทน (เรื่องที่ 4.12)</li>
                                <li><strong>Build ขึ้น <code>Failed to type check.</code></strong> — รัน <code>npx tsc --noEmit</code> เพื่อดูรายการ Error ทั้งหมด แก้ทีละไฟล์จากบนลงล่าง</li>
                            </ul>
                        </div>
                        <p><strong>9.3 ตรวจคุณภาพและส่งงาน:</strong></p>
<div class="code-window">
    <div class="code-header">
        <span class="code-lang">PowerShell</span>
        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
    </div>
    <pre>docker compose up -d
docker compose exec app npx tsc --noEmit
docker compose exec app npm run lint
git add .
git commit -m "feat: add typed learning progress page"
git switch main
git merge feature/typescript
git branch -d feature/typescript
git push</pre>
</div>
                        <p style="font-size:0.9rem; color:#64748b;">💡 ทำให้เป็นนิสัย: <strong>ก่อน Commit ทุกครั้งให้รัน tsc และ lint</strong> ถ้าทั้งสองคำสั่งไม่แสดงข้อความใด แสดงว่าโค้ดพร้อมส่ง ดูประวัติการเปลี่ยนชื่อไฟล์ได้ด้วย <code class="inline-code">git log --follow --oneline app/components/StudentBoard.tsx</code> จะเห็น Commit ตั้งแต่หน่วยที่ 3</p>
                    </div>
                </div>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="assignment-box">
                <h3>📝 5. งานที่มอบหมายและเกณฑ์การประเมินผล (Assignment)</h3>
                <p><strong>ใบงานที่ 4: ปรับหน้าความก้าวหน้าการเรียนให้เป็นของตนเอง ด้วย TypeScript</strong></p>
                <br>
                <p><strong>คำสั่ง:</strong> ทำงานบน Branch ใหม่ชื่อ <code class="inline-code">feature/assignment-4</code> แล้ว:</p>
                <ul style="margin-left: 20px;">
                    <li>แก้ข้อมูลใน <code class="inline-code">data/milestones.ts</code> ให้ตรงกับผลงานจริงของตนเอง (ชื่อหัวข้อ ทักษะ และลิงก์) รวมถึงหน้าที่สร้างจากใบงานหน่วยที่ 1–3</li>
                    <li>เพิ่ม Property แบบ Optional <code class="inline-code">finishedAt?: string</code> (วันที่เรียนจบ) ใน Interface <code class="inline-code">Milestone</code> แล้วแสดงในการ์ดเฉพาะหน่วยที่มีค่านี้</li>
                    <li>เพิ่มสถานะใหม่ <code class="inline-code">"review"</code> (ทบทวน) ใน Type <code class="inline-code">Status</code> แล้วสังเกตว่า tsc แจ้ง Error ที่ใด แก้ให้ผ่านโดยเพิ่มสไตล์ใน <code class="inline-code">statusStyle</code></li>
                    <li>(ท้าทาย) ใช้ <code class="inline-code">countBy</code> นับจำนวนนักศึกษาแต่ละเกรดในหน้า <code class="inline-code">/students</code> เช่น <code class="inline-code">countBy(students, (s) =&gt; getGrade(s.score))</code> แล้วแสดงผลเป็นรายการ</li>
                    <li>สร้างไฟล์ <code class="inline-code">playground/07-my-types.ts</code> ที่มีตัวอย่างของตนเองอย่างน้อย 5 เรื่องจากหน่วยนี้ (เช่น Interface, Union Type, Generics, Utility Types, Narrowing) พร้อมคอมเมนต์อธิบาย และรันด้วย tsx ได้</li>
                    <li>Merge เข้า <code class="inline-code">main</code> และ Push ขึ้น GitHub แล้วส่งลิงก์ Repository พร้อมภาพหน้าจอ: (1) หน้า <code class="inline-code">/progress</code> ที่ปรับแล้ว (2) ผลของ <code class="inline-code">npx tsc --noEmit</code> ที่ไม่มี Error (3) ผลการรัน <code class="inline-code">07-my-types.ts</code></li>
                </ul>
                <br>
                <p><strong>📊 เกณฑ์การตัดคะแนน (คะแนนเต็ม 5 คะแนน):</strong></p>
                <ul style="margin-left: 20px; font-size: 0.9rem; color: #78350f;">
                    <li>• โปรเจกต์เป็น TypeScript ทั้งหมด เปิด strict และ tsc ตรวจผ่านโดยไม่มี Error และไม่ใช้ any (1 คะแนน)</li>
                    <li>• หน้า /progress แสดงข้อมูลจริงของตนเอง พร้อม finishedAt แบบ Optional ได้ถูกต้อง (1 คะแนน)</li>
                    <li>• เพิ่มสถานะ "review" และแก้ Type Error ที่เกิดขึ้นได้ครบถ้วน (1 คะแนน)</li>
                    <li>• ไฟล์ 07-my-types.ts รันด้วย tsx ได้ ใช้ TypeScript ครบ 5 เรื่องพร้อมคำอธิบาย (1 คะแนน)</li>
                    <li>• ทำงานบน Branch, Commit ที่สื่อความหมาย, Merge และ Push ขึ้น GitHub ครบถ้วน (1 คะแนน)</li>
                </ul>
            </section>

        </div>
    </div>

    <script src="../assets/js/script.js?v=<?php echo filemtime(__DIR__ . "/../assets/js/script.js"); ?>"></script>
    <script src="../assets/js/lightbox.js?v=<?php echo filemtime(__DIR__ . "/../assets/js/lightbox.js"); ?>"></script>
    <script src="../assets/js/ts-runner.js?v=<?php echo filemtime(__DIR__ . "/../assets/js/ts-runner.js"); ?>"></script>
</body>

</html>
