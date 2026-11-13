<?php
$base_dir = "../";
$active_nav = "frontend";
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน่วยที่ 6: การเชื่อมต่อ RESTful API, การยืนยันตัวตน (Authentication) และฐานข้อมูล</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        .link-course-box { background:#eff6ff; border:1px solid #bfdbfe; border-left:4px solid #2563eb; padding:16px 20px; border-radius:0 8px 8px 0; margin:20px 0; }
        .link-course-box a { color:#1d4ed8; font-weight:700; text-decoration:underline; }
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
            <h2>หน่วยที่ 6: การเชื่อมต่อ RESTful API, การยืนยันตัวตน (Authentication) และฐานข้อมูล</h2>
            <p>สัปดาห์ที่ 7-8 | เวลาเรียนรวม 10 ชั่วโมง (ทฤษฎี 2 ชม. ปฏิบัติ 8 ชม.)</p>
        </div>
    </div>

    <div class="container">
        <div class="single-layout">

            <section class="lesson-section">
                <div class="key-concept-box">
                    <strong>🎯 สารสำคัญ (Key Concepts)</strong>
                    <p>
                        หน่วยนี้คือจุดที่ Front-End และ Back-End มาบรรจบกันจริง ๆ นักศึกษาจะนำเซิร์ฟเวอร์ Express.js ที่สร้างไว้ในวิชา <strong>การพัฒนาซอฟต์แวร์ด้วยเทคโนโลยี Back-End (31901-2005)</strong> มาเชื่อมต่อกับหน้าเว็บ Next.js ของตนเองด้วยฟังก์ชัน <code class="inline-code">fetch()</code> ผ่านหลักการ RESTful API พร้อมทั้งสร้างระบบเข้าสู่ระบบ (Login) ด้วย JSON Web Token (JWT) ที่สอดคล้องกับระบบ Authentication ที่เรียนในวิชา Back-End
                    </p>
                </div>
            </section>

            <div class="link-course-box">
                🔗 <strong>เชื่อมโยงกับวิชา Back-End:</strong> หน่วยนี้ใช้เซิร์ฟเวอร์ Express.js จาก
                <a href="<?php echo $base_dir; ?>backend/unit1.php">หน่วยที่ 1: Introduction to Back-End Development</a> และระบบ JWT จาก
                <a href="<?php echo $base_dir; ?>backend/unit8.php">หน่วยที่ 8: User Authentication &amp; Security (JWT)</a>
                กรุณาเปิดเซิร์ฟเวอร์ Back-End ของตนเองทิ้งไว้ที่ <code class="inline-code">http://localhost:3000</code> ก่อนเริ่มปฏิบัติ
            </div>

            <section class="lesson-section">
                <h3>🎯 จุดประสงค์การเรียนรู้ (Learning Objectives)</h3>
                <table class="grading-table" style="margin-top: 15px;">
                    <tr>
                        <th width="25%">โดเมนการเรียนรู้</th>
                        <th>รายละเอียดจุดประสงค์การเรียนรู้</th>
                    </tr>
                    <tr>
                        <td><strong>ด้านความรู้ (Knowledge - K)</strong></td>
                        <td>1. สามารถอธิบายหลักการทำงานของ fetch() และ CORS ได้<br>2. สามารถอธิบายขั้นตอนการยืนยันตัวตนด้วย JWT ฝั่ง Front-End ได้</td>
                    </tr>
                    <tr>
                        <td><strong>ด้านทักษะ (Practice - P)</strong></td>
                        <td>1. สามารถดึงข้อมูลจริงจากเซิร์ฟเวอร์ Back-End มาแสดงผลใน Next.js ได้<br>2. สามารถสร้างฟอร์ม Login ที่ส่งค่าไปยัง API และจัดเก็บ Token ได้</td>
                    </tr>
                    <tr>
                        <td><strong>ด้านเจตคติ (Attitude - A)</strong></td>
                        <td>1. ตระหนักถึงความปลอดภัยในการจัดเก็บ Token<br>2. มีความรอบคอบในการตรวจสอบ Error จากการเชื่อมต่อ API</td>
                    </tr>
                </table>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="lesson-section">
                <h3>📘 3. เนื้อหาทางทฤษฎีเชิงลึก (Theoretical Core)</h3>

                <h4 class="topic-title">เรื่องที่ 6.1 (ตอนที่ 1): การดึงข้อมูลด้วย fetch() ใน Next.js</h4>
                <p>
                    Next.js รองรับการเรียก <code class="inline-code">fetch()</code> ได้ทั้งใน Server Component (ดึงข้อมูลตอน Render ที่เซิร์ฟเวอร์ ก่อนส่ง HTML ไปให้ผู้ใช้) และใน Client Component ร่วมกับ <code class="inline-code">useEffect</code> (ดึงข้อมูลหลังหน้าเว็บโหลดเสร็จแล้วในเบราว์เซอร์) การเลือกใช้ขึ้นอยู่กับว่าข้อมูลนั้นต้องอัปเดตตามการโต้ตอบของผู้ใช้หรือไม่
                </p>
                <table class="grading-table" style="margin: 15px 0;">
                    <tr style="background:#f1f5f9;"><th>วิธีดึงข้อมูล</th><th>ใช้เมื่อ</th></tr>
                    <tr><td><strong>fetch() ใน Server Component</strong></td><td>ข้อมูลที่แสดงเหมือนกันทุกคนตอนโหลดหน้าแรก เช่น รายการสินค้า</td></tr>
                    <tr><td><strong>fetch() ใน useEffect (Client)</strong></td><td>ข้อมูลที่ต้องดึงใหม่ตามการกระทำของผู้ใช้ เช่น หลัง Login</td></tr>
                </table>

                <h4 class="topic-title">เรื่องที่ 6.2 (ตอนที่ 1): CORS คืออะไร</h4>
                <p>
                    เนื่องจาก Next.js รันที่ <code class="inline-code">localhost:3001</code> (หรือพอร์ตอื่น) และ Express รันที่ <code class="inline-code">localhost:3000</code> จึงถือเป็นคนละ Origin กัน เบราว์เซอร์จะปิดกั้นการเรียกข้าม Origin โดยอัตโนมัติตามนโยบาย <strong>CORS (Cross-Origin Resource Sharing)</strong> เว้นแต่ฝั่งเซิร์ฟเวอร์ Express จะอนุญาตผ่านไลบรารี <code class="inline-code">cors</code>
                </p>

                <h4 class="topic-title">เรื่องที่ 6.3 (ตอนที่ 2): ขั้นตอนการยืนยันตัวตนด้วย JWT ฝั่ง Front-End</h4>
                <p>เมื่อผู้ใช้กรอกฟอร์ม Login ฝั่ง Front-End จะส่งข้อมูลไปยัง API <code class="inline-code">/login</code> หากถูกต้อง เซิร์ฟเวอร์จะตอบกลับ Token ที่ต้องเก็บไว้ (เช่นใน <code class="inline-code">localStorage</code>) แล้วแนบไปกับทุกคำขอที่ต้องยืนยันตัวตนในรูปแบบ Header <code class="inline-code">Authorization: Bearer &lt;token&gt;</code></p>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="lesson-section">
                <h3>🛠️ 4. ตัวอย่างการปฏิบัติการทีละขั้นตอน (Step-by-Step Walkthrough)</h3>
                <p>เชื่อมต่อ Next.js เข้ากับเซิร์ฟเวอร์ Express จริงที่สร้างในวิชา Back-End</p>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 1</div>
                    <div class="step-detail">
                        <strong>เปิดเซิร์ฟเวอร์ Back-End และอนุญาต CORS</strong>
                        <p>ในโปรเจกต์ Back-End (จากหน่วยที่ 1 ของวิชา Back-End) ติดตั้งและเปิดใช้งาน CORS ในไฟล์ <code class="inline-code">server.js</code>:</p>
                        <div class="code-window">
                            <div class="code-header"><span class="code-lang">PowerShell</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                            </div>
                            <pre>npm install cors</pre>
                        </div>
                        <div class="code-window">
                            <div class="code-header"><span class="code-lang">Node.js</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                            </div>
                            <pre>const express = require('express');
const cors = require('cors');
const app = express();

app.use(cors());
app.use(express.json());

app.get('/profile', (req, res) => {
  res.json({ name: "สมชาย ใจดี", studentId: "6501001", level: "ปวส.1" });
});

app.listen(3000, () => console.log('Back-End API พร้อมใช้งานที่ http://localhost:3000'));</pre>
                        </div>
                        <p>รันด้วยคำสั่ง <code class="inline-code">node server.js</code> แล้วเปิดทิ้งไว้ตลอดการปฏิบัติงาน</p>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 2</div>
                    <div class="step-detail">
                        <strong>ดึงข้อมูลจริงจาก Back-End มาแสดงในหน้า Next.js (Server Component)</strong>
                        <p>สร้างหน้าใหม่ <code class="inline-code">app/profile/page.tsx</code>:</p>
                        <div class="code-window">
                            <div class="code-header"><span class="code-lang">TypeScript</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                            </div>
                            <pre>async function getProfile() {
  const res = await fetch("http://localhost:3000/profile", { cache: "no-store" });
  if (!res.ok) throw new Error("ดึงข้อมูลไม่สำเร็จ");
  return res.json();
}

export default async function ProfilePage() {
  const profile = await getProfile();
  return (
    &lt;main className="max-w-md mx-auto p-6"&gt;
      &lt;h1 className="text-2xl font-bold"&gt;ข้อมูลโปรไฟล์ (จาก Back-End จริง)&lt;/h1&gt;
      &lt;p&gt;ชื่อ: {profile.name}&lt;/p&gt;
      &lt;p&gt;รหัสนักศึกษา: {profile.studentId}&lt;/p&gt;
      &lt;p&gt;ระดับชั้น: {profile.level}&lt;/p&gt;
    &lt;/main&gt;
  );
}</pre>
                        </div>
                        <p>เปิด <code class="inline-code">http://localhost:3001/profile</code> (หรือพอร์ตที่ Next.js ใช้) แล้วตรวจสอบว่าข้อมูลที่แสดงมาจากเซิร์ฟเวอร์ Express จริง ไม่ใช่ข้อมูลจำลองอีกต่อไป</p>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 3</div>
                    <div class="step-detail">
                        <strong>สร้างฟอร์ม Login (Client Component) เชื่อมกับ JWT ของ Back-End</strong>
                        <p>สร้างไฟล์ <code class="inline-code">app/login/page.tsx</code>:</p>
                        <div class="code-window">
                            <div class="code-header"><span class="code-lang">TypeScript</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                            </div>
                            <pre>"use client";
import { useState } from "react";

export default function LoginPage() {
  const [username, setUsername] = useState("");
  const [password, setPassword] = useState("");
  const [message, setMessage] = useState("");

  async function handleLogin() {
    const res = await fetch("http://localhost:3000/login", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ username, password }),
    });

    if (!res.ok) {
      setMessage("เข้าสู่ระบบไม่สำเร็จ ตรวจสอบ Username/Password");
      return;
    }

    const data = await res.json();
    localStorage.setItem("token", data.token); // เก็บ JWT ที่ได้จาก Back-End
    setMessage("เข้าสู่ระบบสำเร็จ!");
  }

  return (
    &lt;main className="max-w-sm mx-auto p-6 space-y-3"&gt;
      &lt;h1 className="text-2xl font-bold"&gt;เข้าสู่ระบบ&lt;/h1&gt;
      &lt;input className="border p-2 w-full" placeholder="Username"
        value={username} onChange={(e) => setUsername(e.target.value)} /&gt;
      &lt;input className="border p-2 w-full" type="password" placeholder="Password"
        value={password} onChange={(e) => setPassword(e.target.value)} /&gt;
      &lt;button className="bg-blue-600 text-white w-full py-2 rounded" onClick={handleLogin}&gt;
        เข้าสู่ระบบ
      &lt;/button&gt;
      {message &amp;&amp; &lt;p className="text-sm text-slate-600"&gt;{message}&lt;/p&gt;}
    &lt;/main&gt;
  );
}</pre>
                        </div>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 4</div>
                    <div class="step-detail">
                        <strong>แนบ JWT Token ไปกับคำขอที่ต้องยืนยันตัวตน</strong>
                        <div class="code-window">
                            <div class="code-header"><span class="code-lang">TypeScript</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                            </div>
                            <pre>const token = localStorage.getItem("token");

const res = await fetch("http://localhost:3000/dashboard", {
  headers: {
    Authorization: `Bearer ${token}`,
  },
});</pre>
                        </div>
                        <p>หากเซิร์ฟเวอร์ Back-End ตรวจสอบ Token แล้วถูกต้อง จะส่งข้อมูลที่จำกัดสิทธิ์กลับมา เช่น ข้อมูล Dashboard ส่วนตัวของผู้ใช้</p>
                    </div>
                </div>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="assignment-box">
                <h3>📝 5. งานที่มอบหมายและเกณฑ์การประเมินผล (Assignment)</h3>
                <p><strong>ใบงานที่ 6: เชื่อมต่อ Next.js เข้ากับ Back-End จริงของตนเอง</strong></p>
                <br>
                <p><strong>คำสั่ง:</strong></p>
                <ul style="margin-left: 20px;">
                    <li>เปิดเซิร์ฟเวอร์ Express จากวิชา Back-End ของตนเอง (ต้องมี Route <code class="inline-code">/profile</code> และระบบ JWT อย่างน้อยพื้นฐาน)</li>
                    <li>สร้างหน้า <code class="inline-code">/profile</code> ใน Next.js ที่ดึงข้อมูลจริงจากเซิร์ฟเวอร์ด้วย fetch()</li>
                    <li>สร้างหน้า <code class="inline-code">/login</code> ที่ส่ง Username/Password ไปตรวจสอบและรับ JWT Token กลับมา</li>
                    <li>บันทึกวิดีโอสาธิตการทำงานทั้งระบบ (เปิดเซิร์ฟเวอร์ → Login → เห็นข้อมูลจริง) และส่ง Commit ขึ้น GitHub</li>
                </ul>
                <br>
                <p><strong>📊 เกณฑ์การตัดคะแนน (คะแนนเต็ม 10 คะแนน):</strong></p>
                <ul style="margin-left: 20px; font-size: 0.9rem; color: #78350f;">
                    <li>• ดึงข้อมูลจริงจาก Back-End มาแสดงผลได้สำเร็จ (3 คะแนน)</li>
                    <li>• ฟอร์ม Login ทำงานได้จริงและได้รับ JWT Token (4 คะแนน)</li>
                    <li>• แนบ Token ไปกับคำขอที่ต้องยืนยันตัวตนได้ถูกต้อง (2 คะแนน)</li>
                    <li>• Commit และ Push ขึ้น GitHub ครบถ้วน (1 คะแนน)</li>
                </ul>
            </section>

        </div>
    </div>

    <script src="../assets/js/script.js"></script>
</body>

</html>
