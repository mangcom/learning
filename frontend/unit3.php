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
                        <td>1. สามารถอธิบายไวยากรณ์ ES6+ ที่ใช้บ่อยใน React ได้<br>2. สามารถอธิบายหลักการทำงานแบบ Asynchronous ด้วย Promise และ async/await ได้</td>
                    </tr>
                    <tr>
                        <td><strong>ด้านทักษะ (Practice - P)</strong></td>
                        <td>1. สามารถใช้ Array Methods (map, filter, reduce) แปลงข้อมูลได้<br>2. สามารถเขียนฟังก์ชัน async เพื่อจำลองการดึงข้อมูลแบบหน่วงเวลาได้</td>
                    </tr>
                    <tr>
                        <td><strong>ด้านเจตคติ (Attitude - A)</strong></td>
                        <td>1. ฝึกเขียนโค้ดให้กระชับและอ่านง่ายตามแนวทาง Modern JavaScript<br>2. มีความอดทนในการไล่ตรวจสอบข้อผิดพลาดทีละบรรทัด</td>
                    </tr>
                </table>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="lesson-section">
                <h3>📘 3. เนื้อหาทางทฤษฎีเชิงลึก (Theoretical Core)</h3>

                <h4 class="topic-title">เรื่องที่ 3.1: Arrow Function, Destructuring และ Spread/Rest</h4>
                <div class="code-window">
                    <div class="code-header"><span class="code-lang">JavaScript</span>
                        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                    </div>
                    <pre>// Arrow Function
const add = (a, b) => a + b;

// Destructuring
const student = { name: "สมชาย", score: 85 };
const { name, score } = student;

// Spread
const scores = [80, 90];
const allScores = [...scores, 100]; // [80, 90, 100]</pre>
                </div>

                <h4 class="topic-title">เรื่องที่ 3.2: Array Methods ที่ใช้บ่อยใน React (map, filter, reduce)</h4>
                <p>React ใช้ <code class="inline-code">map()</code> ในการแปลง Array ข้อมูลเป็น Array ของ Component เพื่อแสดงผลเป็นรายการ (List) ซึ่งเป็นรูปแบบที่พบบ่อยที่สุดในการพัฒนาเว็บแอปพลิเคชัน</p>
                <div class="code-window">
                    <div class="code-header"><span class="code-lang">JavaScript</span>
                        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                    </div>
                    <pre>const students = [
  { id: 1, name: "สมชาย", score: 85 },
  { id: 2, name: "สมหญิง", score: 92 },
  { id: 3, name: "สมศักดิ์", score: 70 },
];

const names = students.map((s) => s.name);
const passed = students.filter((s) => s.score &gt;= 80);
const total = students.reduce((sum, s) => sum + s.score, 0);</pre>
                </div>

                <h4 class="topic-title">เรื่องที่ 3.3: Asynchronous JavaScript (Promise และ async/await)</h4>
                <p>
                    การดึงข้อมูลจาก API เป็นการทำงานแบบ Asynchronous (ไม่รอผลลัพธ์ทันที) JavaScript ใช้ <strong>Promise</strong> แทนผลลัพธ์ที่จะเกิดขึ้นในอนาคต และ <strong>async/await</strong> ช่วยให้เขียนโค้ด Asynchronous ให้อ่านง่ายเหมือนโค้ดปกติ ซึ่งจะนำไปใช้จริงในหน่วยที่ 6 เมื่อดึงข้อมูลจาก Backend
                </p>
                <div class="code-window">
                    <div class="code-header"><span class="code-lang">JavaScript</span>
                        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                    </div>
                    <pre>async function getGreeting() {
  const message = await new Promise((resolve) => {
    setTimeout(() => resolve("โหลดข้อมูลสำเร็จ!"), 1000);
  });
  console.log(message);
}

getGreeting();</pre>
                </div>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="lesson-section">
                <h3>🛠️ 4. ตัวอย่างการปฏิบัติการทีละขั้นตอน (Step-by-Step Walkthrough)</h3>
                <p>ฝึกเขียนฟังก์ชัน ES6+ แล้วนำไปแสดงผลในหน้า Next.js</p>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 1</div>
                    <div class="step-detail">
                        <strong>สร้างไฟล์ข้อมูลตัวอย่าง (Mock Data)</strong>
                        <p>สร้างไฟล์ <code class="inline-code">data/students.js</code> ในโปรเจกต์ แล้วใส่ข้อมูลตัวอย่าง:</p>
                        <div class="code-window">
                            <div class="code-header"><span class="code-lang">JavaScript</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                            </div>
                            <pre>export const students = [
  { id: 1, name: "สมชาย ใจดี", score: 85 },
  { id: 2, name: "สมหญิง รักเรียน", score: 92 },
  { id: 3, name: "สมศักดิ์ ตั้งใจ", score: 70 },
];</pre>
                        </div>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 2</div>
                    <div class="step-detail">
                        <strong>แสดงรายชื่อนักเรียนด้วย map() ในหน้า Next.js</strong>
                        <p>แก้ไข <code class="inline-code">app/page.js</code> ให้ import ข้อมูลและแสดงผลเป็นรายการ:</p>
                        <div class="code-window">
                            <div class="code-header"><span class="code-lang">JSX</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                            </div>
                            <pre>import { students } from "../data/students";

export default function Home() {
  const average = (
    students.reduce((sum, s) => sum + s.score, 0) / students.length
  ).toFixed(2);

  return (
    &lt;main className="max-w-xl mx-auto p-6"&gt;
      &lt;h1 className="text-2xl font-bold mb-4"&gt;รายชื่อนักเรียน&lt;/h1&gt;
      &lt;ul className="space-y-2"&gt;
        {students.map((s) => (
          &lt;li key={s.id} className="border p-2 rounded"&gt;
            {s.name} - คะแนน {s.score}
          &lt;/li&gt;
        ))}
      &lt;/ul&gt;
      &lt;p className="mt-4 font-semibold"&gt;คะแนนเฉลี่ย: {average}&lt;/p&gt;
    &lt;/main&gt;
  );
}</pre>
                        </div>
                        <p>บันทึกไฟล์แล้วตรวจสอบผลลัพธ์ที่ <code class="inline-code">http://localhost:3000</code> ว่ามีรายชื่อนักเรียนและคะแนนเฉลี่ยแสดงถูกต้อง</p>
                    </div>
                </div>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="assignment-box">
                <h3>📝 5. งานที่มอบหมายและเกณฑ์การประเมินผล (Assignment)</h3>
                <p><strong>ใบงานที่ 3: แปลงและแสดงผลข้อมูลด้วย ES6+</strong></p>
                <br>
                <p><strong>คำสั่ง:</strong></p>
                <ul style="margin-left: 20px;">
                    <li>เพิ่มข้อมูลนักเรียนอย่างน้อย 6 คน ในไฟล์ <code class="inline-code">data/students.js</code></li>
                    <li>ใช้ <code class="inline-code">filter()</code> แสดงเฉพาะนักเรียนที่คะแนนมากกว่าหรือเท่ากับ 80 แยกเป็นอีกรายการหนึ่ง</li>
                    <li>ใช้ <code class="inline-code">reduce()</code> คำนวณคะแนนรวมและคะแนนเฉลี่ยของทั้งห้อง</li>
                    <li>ส่ง Commit ขึ้น GitHub Repository พร้อมภาพหน้าจอผลลัพธ์</li>
                </ul>
                <br>
                <p><strong>📊 เกณฑ์การตัดคะแนน (คะแนนเต็ม 5 คะแนน):</strong></p>
                <ul style="margin-left: 20px; font-size: 0.9rem; color: #78350f;">
                    <li>• ใช้ map() แสดงรายชื่อนักเรียนได้ถูกต้อง (1 คะแนน)</li>
                    <li>• ใช้ filter() คัดกรองข้อมูลได้ถูกต้อง (2 คะแนน)</li>
                    <li>• ใช้ reduce() คำนวณผลรวม/เฉลี่ยได้ถูกต้อง (1 คะแนน)</li>
                    <li>• Commit และ Push ขึ้น GitHub ครบถ้วน (1 คะแนน)</li>
                </ul>
            </section>

        </div>
    </div>

    <script src="../assets/js/script.js"></script>
</body>

</html>
