<?php
$base_dir = "../";
$active_nav = "frontend";
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน่วยที่ 7: การพัฒนาเว็บแอปพลิเคชันแบบฟูลสแตกด้วย Next.js</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        .render-compare { display:grid; grid-template-columns: repeat(auto-fit, minmax(200px,1fr)); gap:14px; margin:20px 0; }
        .render-card { background:#fff; border:1px solid #e2e8f0; border-radius:10px; padding:16px; }
        .render-card h5 { margin:0 0 8px 0; color:#0f172a; }
        .render-card p { font-size:0.85rem; color:#475569; margin:0; }
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
            <h2>หน่วยที่ 7: การพัฒนาเว็บแอปพลิเคชันแบบฟูลสแตกด้วย Next.js</h2>
            <p>สัปดาห์ที่ 10-11 | เวลาเรียนรวม 10 ชั่วโมง (ทฤษฎี 2 ชม. ปฏิบัติ 8 ชม.)</p>
        </div>
    </div>

    <div class="container">
        <div class="single-layout">

            <section class="lesson-section">
                <div class="key-concept-box">
                    <strong>🎯 สารสำคัญ (Key Concepts)</strong>
                    <p>
                        หน่วยนี้จะพาผู้เรียนไปลึกกว่าการดึงข้อมูลธรรมดา สู่การสร้างเว็บแอปพลิเคชัน "ฟูลสแตก" ด้วย Next.js อย่างแท้จริง ได้แก่การทำความเข้าใจรูปแบบการ Render ทั้ง SSR, SSG, ISR และ CSR การสร้างเส้นทางแบบไดนามิก (Dynamic Routes) เพื่อแสดงหน้ารายละเอียดสินค้า/บุคคล และการใช้ Next.js API Routes เป็น "ตัวกลาง" (Proxy) เชื่อมต่อกับ Back-End จริง เพื่อหลีกเลี่ยงปัญหา CORS และซ่อนรายละเอียดการเชื่อมต่อจากฝั่งผู้ใช้
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
                        <td>1. สามารถอธิบายความแตกต่างระหว่าง SSR, SSG, ISR และ CSR ได้<br>2. สามารถอธิบายหลักการทำงานของ Dynamic Route และ API Route ได้</td>
                    </tr>
                    <tr>
                        <td><strong>ด้านทักษะ (Practice - P)</strong></td>
                        <td>1. สามารถสร้างหน้ารายละเอียดแบบไดนามิกที่ดึงข้อมูลตาม ID ได้<br>2. สามารถสร้าง API Route ของ Next.js เป็นตัวกลางเชื่อมต่อ Back-End ได้</td>
                    </tr>
                    <tr>
                        <td><strong>ด้านเจตคติ (Attitude - A)</strong></td>
                        <td>1. เลือกใช้รูปแบบการ Render ให้เหมาะสมกับลักษณะข้อมูลจริง<br>2. มีความคิดเป็นระบบในการออกแบบโครงสร้างฟีเจอร์ฟูลสแตก</td>
                    </tr>
                </table>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="lesson-section">
                <h3>📘 3. เนื้อหาทางทฤษฎีเชิงลึก (Theoretical Core)</h3>

                <h4 class="topic-title">เรื่องที่ 7.1 (ตอนที่ 1): SSR, SSG, ISR และ CSR</h4>
                <div class="render-compare">
                    <div class="render-card"><h5>🖥️ SSR</h5><p>Render ที่เซิร์ฟเวอร์ใหม่ทุกครั้งที่มีคำขอ เหมาะกับข้อมูลที่เปลี่ยนบ่อย เช่น หน้า Dashboard ส่วนตัว</p></div>
                    <div class="render-card"><h5>📄 SSG</h5><p>Render เป็นไฟล์ HTML ล่วงหน้าตอน Build เหมาะกับหน้าที่ไม่ค่อยเปลี่ยน เช่น หน้าบทความ</p></div>
                    <div class="render-card"><h5>♻️ ISR</h5><p>ผสมข้อดีของ SSG กับการอัปเดตข้อมูลใหม่เป็นระยะโดยไม่ต้อง Build ใหม่ทั้งเว็บ</p></div>
                    <div class="render-card"><h5>🌐 CSR</h5><p>Render ที่เบราว์เซอร์หลังโหลดหน้าเปล่ามาก่อน เหมาะกับส่วนที่โต้ตอบผู้ใช้สูง เช่น Todo List</p></div>
                </div>

                <h4 class="topic-title">เรื่องที่ 7.2 (ตอนที่ 1): Dynamic Routes</h4>
                <p>
                    Next.js ใช้ชื่อโฟลเดอร์ในวงเล็บเหลี่ยม เช่น <code class="inline-code">app/students/[id]/page.tsx</code> เพื่อสร้างเส้นทางที่รับค่าพารามิเตอร์แบบไดนามิกจาก URL เช่น <code class="inline-code">/students/1</code>, <code class="inline-code">/students/2</code> โดยไม่ต้องสร้างไฟล์แยกสำหรับทุก ID
                </p>

                <h4 class="topic-title">เรื่องที่ 7.3 (ตอนที่ 2): Next.js API Routes เป็น Backend-for-Frontend</h4>
                <p>
                    การสร้างไฟล์ <code class="inline-code">app/api/students/route.js</code> จะทำให้ Next.js เปิด Endpoint ของตัวเองที่ <code class="inline-code">/api/students</code> ซึ่งสามารถใช้เป็น "ตัวกลาง" เรียกไปยังเซิร์ฟเวอร์ Back-End จริงอีกทีหนึ่ง (Server-to-Server ไม่มีปัญหา CORS) ก่อนส่งผลลัพธ์กลับไปให้ฝั่งเบราว์เซอร์ วิธีนี้นิยมใช้ในงานจริงเพื่อซ่อน URL หรือ Secret Key ของ Back-End จากผู้ใช้
                </p>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="lesson-section">
                <h3>🛠️ 4. ตัวอย่างการปฏิบัติการทีละขั้นตอน (Step-by-Step Walkthrough)</h3>
                <p>สร้างฟีเจอร์ "รายชื่อนักเรียน → รายละเอียดนักเรียนรายคน" แบบฟูลสแตก</p>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 1</div>
                    <div class="step-detail">
                        <strong>เพิ่ม Route รายคนในเซิร์ฟเวอร์ Back-End</strong>
                        <p>เพิ่มใน <code class="inline-code">server.js</code> ของวิชา Back-End:</p>
                        <div class="code-window">
                            <div class="code-header"><span class="code-lang">Node.js</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                            </div>
                            <pre>const students = [
  { id: 1, name: "สมชาย ใจดี", score: 85 },
  { id: 2, name: "สมหญิง รักเรียน", score: 92 },
];

app.get('/students', (req, res) => res.json(students));

app.get('/students/:id', (req, res) => {
  const student = students.find(s => s.id === Number(req.params.id));
  if (!student) return res.status(404).json({ message: "ไม่พบข้อมูล" });
  res.json(student);
});</pre>
                        </div>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 2</div>
                    <div class="step-detail">
                        <strong>สร้าง Next.js API Route เป็นตัวกลาง (Backend-for-Frontend)</strong>
                        <p>สร้างไฟล์ <code class="inline-code">app/api/students/route.js</code>:</p>
                        <div class="code-window">
                            <div class="code-header"><span class="code-lang">JavaScript</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                            </div>
                            <pre>export async function GET() {
  const res = await fetch("http://localhost:3000/students");
  const data = await res.json();
  return Response.json(data);
}</pre>
                        </div>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 3</div>
                    <div class="step-detail">
                        <strong>สร้างหน้ารายการและหน้ารายละเอียดแบบ Dynamic Route</strong>
                        <p>สร้างไฟล์ <code class="inline-code">app/students/page.tsx</code> (รายการ):</p>
                        <div class="code-window">
                            <div class="code-header"><span class="code-lang">TypeScript</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                            </div>
                            <pre>import Link from "next/link";

async function getStudents() {
  const res = await fetch("http://localhost:3001/api/students", { cache: "no-store" });
  return res.json();
}

export default async function StudentsPage() {
  const students = await getStudents();
  return (
    &lt;main className="max-w-xl mx-auto p-6"&gt;
      &lt;h1 className="text-2xl font-bold mb-4"&gt;รายชื่อนักเรียน (จาก Back-End จริง)&lt;/h1&gt;
      &lt;ul className="space-y-2"&gt;
        {students.map((s: any) => (
          &lt;li key={s.id}&gt;
            &lt;Link href={`/students/${s.id}`} className="text-blue-600 underline"&gt;
              {s.name}
            &lt;/Link&gt;
          &lt;/li&gt;
        ))}
      &lt;/ul&gt;
    &lt;/main&gt;
  );
}</pre>
                        </div>
                        <p>สร้างไฟล์ <code class="inline-code">app/students/[id]/page.tsx</code> (รายละเอียดรายคน):</p>
                        <div class="code-window">
                            <div class="code-header"><span class="code-lang">TypeScript</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                            </div>
                            <pre>async function getStudent(id: string) {
  const res = await fetch(`http://localhost:3000/students/${id}`, { cache: "no-store" });
  if (!res.ok) return null;
  return res.json();
}

export default async function StudentDetailPage({ params }: { params: { id: string } }) {
  const student = await getStudent(params.id);
  if (!student) return &lt;p className="p-6"&gt;ไม่พบข้อมูลนักเรียน&lt;/p&gt;;

  return (
    &lt;main className="max-w-md mx-auto p-6"&gt;
      &lt;h1 className="text-2xl font-bold"&gt;{student.name}&lt;/h1&gt;
      &lt;p&gt;คะแนน: {student.score}&lt;/p&gt;
    &lt;/main&gt;
  );
}</pre>
                        </div>
                        <p>ทดสอบคลิกจากหน้ารายการไปยังหน้ารายละเอียดของแต่ละคน สังเกตว่า URL เปลี่ยนตาม ID โดยไม่ต้องสร้างไฟล์แยกทีละคน</p>
                    </div>
                </div>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="assignment-box">
                <h3>📝 5. งานที่มอบหมายและเกณฑ์การประเมินผล (Assignment)</h3>
                <p><strong>ใบงานที่ 7: ฟีเจอร์ฟูลสแตก รายการ-รายละเอียด เชื่อม Back-End จริง</strong></p>
                <br>
                <p><strong>คำสั่ง:</strong></p>
                <ul style="margin-left: 20px;">
                    <li>ขยายข้อมูลนักเรียนในเซิร์ฟเวอร์ Back-End เป็นอย่างน้อย 6 คน</li>
                    <li>สร้างหน้ารายการและหน้ารายละเอียดแบบ Dynamic Route ตามตัวอย่าง</li>
                    <li>สร้าง Next.js API Route อย่างน้อย 1 เส้นทางเป็นตัวกลางเชื่อมกับ Back-End</li>
                    <li>อธิบายในเอกสารสั้น ๆ ว่าเลือกใช้ SSR/SSG/CSR แบบใดในแต่ละหน้า เพราะเหตุใด</li>
                    <li>ส่ง Commit ขึ้น GitHub พร้อมคลิปวิดีโอสาธิตการทำงานทั้งระบบ</li>
                </ul>
                <br>
                <p><strong>📊 เกณฑ์การตัดคะแนน (คะแนนเต็ม 10 คะแนน):</strong></p>
                <ul style="margin-left: 20px; font-size: 0.9rem; color: #78350f;">
                    <li>• หน้ารายการและรายละเอียดทำงานถูกต้องตาม ID จริง (4 คะแนน)</li>
                    <li>• สร้าง Next.js API Route เป็นตัวกลางได้สำเร็จ (3 คะแนน)</li>
                    <li>• อธิบายเหตุผลการเลือกรูปแบบ Render ได้สมเหตุสมผล (2 คะแนน)</li>
                    <li>• Commit และ Push ขึ้น GitHub ครบถ้วน (1 คะแนน)</li>
                </ul>
            </section>

        </div>
    </div>

    <script src="../assets/js/script.js"></script>
</body>

</html>
