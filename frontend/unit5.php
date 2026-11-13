<?php
$base_dir = "../";
$active_nav = "frontend";
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน่วยที่ 5: สถาปัตยกรรมคอมโพเนนต์และการจัดการสถานะด้วย React</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        .tree-diagram { font-family: monospace; background: #0f172a; color: #e2e8f0; padding: 20px; border-radius: 8px; line-height: 1.8; font-size: 0.95rem; overflow-x: auto; }
        .tree-diagram .lvl2 { margin-left: 24px; color: #93c5fd; }
        .tree-diagram .lvl3 { margin-left: 48px; color: #86efac; }
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
            <h2>หน่วยที่ 5: สถาปัตยกรรมคอมโพเนนต์และการจัดการสถานะด้วย React</h2>
            <p>สัปดาห์ที่ 5-6 | เวลาเรียนรวม 10 ชั่วโมง (ทฤษฎี 2 ชม. ปฏิบัติ 8 ชม.)</p>
        </div>
    </div>

    <div class="container">
        <div class="single-layout">

            <section class="lesson-section">
                <div class="key-concept-box">
                    <strong>🎯 สารสำคัญ (Key Concepts)</strong>
                    <p>
                        React สร้างเว็บแอปพลิเคชันจาก "คอมโพเนนต์" (Component) ชิ้นเล็ก ๆ ที่นำมาประกอบกันเป็นหน้าเว็บทั้งหมด แต่ละคอมโพเนนต์รับข้อมูลผ่าน Props และสามารถมี "สถานะ" (State) ภายในตัวเองที่เปลี่ยนแปลงได้ด้วย <code class="inline-code">useState</code> หน่วยนี้แบ่งเป็น 2 ตอน: ตอนที่ 1 ปูพื้นฐานโครงสร้างคอมโพเนนต์และ Component Life Cycle ตอนที่ 2 เจาะลึกการจัดการ State และการเชื่อมโยง UI เข้าด้วยกัน พร้อมแยกแยะ Server Component กับ Client Component ของ Next.js อย่างชัดเจน
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
                        <td>1. สามารถอธิบายแนวคิด Component-Based Architecture และ Props ได้<br>2. สามารถอธิบายหลักการทำงานของ useState และ useEffect ได้</td>
                    </tr>
                    <tr>
                        <td><strong>ด้านทักษะ (Practice - P)</strong></td>
                        <td>1. สามารถสร้างและประกอบ Component ย่อยหลายชิ้นเข้าด้วยกันได้<br>2. สามารถสร้างฟีเจอร์เชิงโต้ตอบ (เช่น Todo List) ด้วย useState ได้</td>
                    </tr>
                    <tr>
                        <td><strong>ด้านเจตคติ (Attitude - A)</strong></td>
                        <td>1. ออกแบบคอมโพเนนต์ให้มีหน้าที่ชัดเจน แบ่งงานเป็นส่วนย่อยอย่างเป็นระบบ<br>2. มีความอดทนในการไล่ทำความเข้าใจการไหลของข้อมูล (Data Flow)</td>
                    </tr>
                </table>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="lesson-section">
                <h3>📘 3. เนื้อหาทางทฤษฎีเชิงลึก (Theoretical Core)</h3>

                <h4 class="topic-title">เรื่องที่ 5.1 (ตอนที่ 1): โครงสร้างคอมโพเนนต์และ Props</h4>
                <p>หน้าเว็บหนึ่งหน้าสามารถแตกออกเป็นคอมโพเนนต์ย่อยที่นำมาประกอบกันเป็นลำดับชั้น (Component Tree) เช่น หน้าโปรไฟล์นักเรียนประกอบด้วย:</p>
                <div class="tree-diagram">
                    &lt;ProfilePage&gt;<br>
                    <span class="lvl2">├─ &lt;Navbar /&gt;</span><br>
                    <span class="lvl2">├─ &lt;StudentCard name=".." score=".." /&gt;</span><br>
                    <span class="lvl3">└─ &lt;ScoreBadge /&gt;</span><br>
                    <span class="lvl2">└─ &lt;Footer /&gt;</span>
                </div>
                <p>ข้อมูลจะไหลจาก Component แม่ไปยัง Component ลูกผ่าน <strong>Props</strong> เท่านั้น (Top-down Data Flow) ทำให้ติดตามที่มาของข้อมูลได้ง่าย</p>

                <h4 class="topic-title">เรื่องที่ 5.2 (ตอนที่ 1): Component Life Cycle และ Server/Client Component</h4>
                <p>ใน Next.js App Router ทุกคอมโพเนนต์เป็น <strong>Server Component</strong> โดยค่าเริ่มต้น (Render ที่ฝั่งเซิร์ฟเวอร์ ไม่มี Life Cycle แบบโต้ตอบ) หากต้องการให้คอมโพเนนต์มีสถานะหรือตอบสนองผู้ใช้ ต้องประกาศ <code class="inline-code">"use client"</code> ไว้บรรทัดแรกของไฟล์ เพื่อเปลี่ยนเป็น <strong>Client Component</strong> ที่ทำงานในเบราว์เซอร์และมี Life Cycle แบบ Mount → Update → Unmount ควบคุมผ่าน <code class="inline-code">useEffect</code></p>

                <h4 class="topic-title">เรื่องที่ 5.3 (ตอนที่ 2): useState และการจัดการ State</h4>
                <div class="code-window">
                    <div class="code-header"><span class="code-lang">JSX</span>
                        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                    </div>
                    <pre>"use client";
import { useState } from "react";

export default function Counter() {
  const [count, setCount] = useState(0);
  return (
    &lt;button onClick={() => setCount(count + 1)}&gt;
      นับแล้ว {count} ครั้ง
    &lt;/button&gt;
  );
}</pre>
                </div>
                <blockquote>
                    <strong>💡 เจาะลึกทางทฤษฎี:</strong><br>
                    • <code class="inline-code">useState</code> คืนค่าเป็น Array 2 ตัวเสมอ: ค่าปัจจุบัน และฟังก์ชันสำหรับอัปเดตค่า<br>
                    • เมื่อเรียก <code class="inline-code">setCount</code> React จะสั่ง Re-render คอมโพเนนต์นั้นใหม่โดยอัตโนมัติ<br>
                    • <code class="inline-code">useEffect</code> ใช้ทำงานที่เป็นผลข้างเคียง (Side Effect) เช่น การดึงข้อมูลเมื่อคอมโพเนนต์ถูกโหลดครั้งแรก
                </blockquote>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="lesson-section">
                <h3>🛠️ 4. ตัวอย่างการปฏิบัติการทีละขั้นตอน (Step-by-Step Walkthrough)</h3>
                <p>สร้างฟีเจอร์ Todo List แบบโต้ตอบได้จริงด้วย useState</p>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 1</div>
                    <div class="step-detail">
                        <strong>แยกคอมโพเนนต์ StudentCard ออกจากหน้าเดิม</strong>
                        <p>สร้างไฟล์ <code class="inline-code">components/StudentCard.tsx</code>:</p>
                        <div class="code-window">
                            <div class="code-header"><span class="code-lang">TypeScript</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                            </div>
                            <pre>interface StudentCardProps {
  name: string;
  score: number;
}

export default function StudentCard({ name, score }: StudentCardProps) {
  return (
    &lt;div className="border rounded p-3"&gt;
      &lt;p className="font-semibold"&gt;{name}&lt;/p&gt;
      &lt;p className="text-sm text-slate-500"&gt;คะแนน: {score}&lt;/p&gt;
    &lt;/div&gt;
  );
}</pre>
                        </div>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 2</div>
                    <div class="step-detail">
                        <strong>สร้าง Client Component สำหรับ Todo List</strong>
                        <p>สร้างไฟล์ <code class="inline-code">components/TodoList.tsx</code>:</p>
                        <div class="code-window">
                            <div class="code-header"><span class="code-lang">TypeScript</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                            </div>
                            <pre>"use client";
import { useState } from "react";

export default function TodoList() {
  const [task, setTask] = useState("");
  const [todos, setTodos] = useState&lt;string[]&gt;([]);

  function addTodo() {
    if (task.trim() === "") return;
    setTodos([...todos, task]);
    setTask("");
  }

  return (
    &lt;div className="max-w-md"&gt;
      &lt;input
        className="border p-2 mr-2"
        value={task}
        onChange={(e) => setTask(e.target.value)}
        placeholder="เพิ่มรายการงาน..."
      /&gt;
      &lt;button className="bg-blue-600 text-white px-4 py-2 rounded" onClick={addTodo}&gt;
        เพิ่ม
      &lt;/button&gt;
      &lt;ul className="mt-4 space-y-1"&gt;
        {todos.map((t, i) => (
          &lt;li key={i} className="border-b py-1"&gt;{t}&lt;/li&gt;
        ))}
      &lt;/ul&gt;
    &lt;/div&gt;
  );
}</pre>
                        </div>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 3</div>
                    <div class="step-detail">
                        <strong>ประกอบคอมโพเนนต์ทั้งหมดไว้ในหน้าหลัก</strong>
                        <div class="code-window">
                            <div class="code-header"><span class="code-lang">TypeScript</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                            </div>
                            <pre>import StudentCard from "../components/StudentCard";
import TodoList from "../components/TodoList";
import { students } from "../data/students";

export default function Home() {
  return (
    &lt;main className="max-w-xl mx-auto p-6 space-y-6"&gt;
      {students.map((s) => (
        &lt;StudentCard key={s.id} name={s.name} score={s.score} /&gt;
      ))}
      &lt;TodoList /&gt;
    &lt;/main&gt;
  );
}</pre>
                        </div>
                        <p>สังเกตว่า <code class="inline-code">StudentCard</code> เป็น Server Component (ไม่มี "use client") ในขณะที่ <code class="inline-code">TodoList</code> เป็น Client Component ที่โต้ตอบกับผู้ใช้ได้จริง</p>
                    </div>
                </div>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="assignment-box">
                <h3>📝 5. งานที่มอบหมายและเกณฑ์การประเมินผล (Assignment)</h3>
                <p><strong>ใบงานที่ 5: สร้างฟีเจอร์เชิงโต้ตอบด้วย Component และ State</strong></p>
                <br>
                <p><strong>คำสั่ง:</strong></p>
                <ul style="margin-left: 20px;">
                    <li>สร้าง Component อย่างน้อย 3 ชิ้นที่แยกหน้าที่กันชัดเจน (เช่น Navbar, Card, Form)</li>
                    <li>เพิ่มปุ่มลบรายการ (Delete) ให้กับ TodoList ที่สร้างในขั้นตอนที่ 2 โดยใช้ <code class="inline-code">filter()</code> ร่วมกับ <code class="inline-code">setTodos</code></li>
                    <li>ระบุให้ชัดเจนว่าไฟล์ใดเป็น Server Component และไฟล์ใดเป็น Client Component พร้อมเหตุผล</li>
                    <li>ส่ง Commit ขึ้น GitHub พร้อมคลิปวิดีโอสั้นสาธิตการทำงาน</li>
                </ul>
                <br>
                <p><strong>📊 เกณฑ์การตัดคะแนน (คะแนนเต็ม 10 คะแนน):</strong></p>
                <ul style="margin-left: 20px; font-size: 0.9rem; color: #78350f;">
                    <li>• แยก Component ได้เหมาะสมและใช้ Props ถูกต้อง (3 คะแนน)</li>
                    <li>• ฟีเจอร์เพิ่ม/ลบรายการทำงานได้จริง (4 คะแนน)</li>
                    <li>• ระบุ Server/Client Component ได้ถูกต้องพร้อมเหตุผล (2 คะแนน)</li>
                    <li>• Commit และ Push ขึ้น GitHub ครบถ้วน (1 คะแนน)</li>
                </ul>
            </section>

        </div>
    </div>

    <script src="../assets/js/script.js"></script>
</body>

</html>
