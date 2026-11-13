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
                        TypeScript คือส่วนขยายของ JavaScript ที่เพิ่มระบบ "ชนิดข้อมูล" (Type) เข้ามา ช่วยให้โปรแกรมเมอร์ตรวจพบข้อผิดพลาดตั้งแต่ตอนเขียนโค้ด (ก่อนรันจริง) ลดบั๊กที่เกิดจากการส่งค่าผิดชนิด และทำให้ทำงานเป็นทีมง่ายขึ้นเพราะมี "สัญญา" (Interface) ที่ชัดเจนระหว่างคอมโพเนนต์ Next.js รองรับ TypeScript ในตัวโดยไม่ต้องตั้งค่าเพิ่มเติมมาก
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
                        <td>1. สามารถอธิบายประโยชน์ของ TypeScript เมื่อเทียบกับ JavaScript ได้<br>2. สามารถอธิบายการประกาศ Type และ Interface พื้นฐานได้</td>
                    </tr>
                    <tr>
                        <td><strong>ด้านทักษะ (Practice - P)</strong></td>
                        <td>1. สามารถเปิดใช้งาน TypeScript ในโปรเจกต์ Next.js ได้<br>2. สามารถกำหนด Type ให้ตัวแปร ฟังก์ชัน และ Props ของ Component ได้</td>
                    </tr>
                    <tr>
                        <td><strong>ด้านเจตคติ (Attitude - A)</strong></td>
                        <td>1. มีความรอบคอบในการกำหนดชนิดข้อมูลให้ตรงกับการใช้งานจริง<br>2. ไม่หลีกเลี่ยงการแก้ไข Error ที่ TypeScript แจ้งเตือน</td>
                    </tr>
                </table>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="lesson-section">
                <h3>📘 3. เนื้อหาทางทฤษฎีเชิงลึก (Theoretical Core)</h3>

                <h4 class="topic-title">เรื่องที่ 4.1: เหตุใดจึงต้องใช้ TypeScript</h4>
                <p>
                    ใน JavaScript ทั่วไป ตัวแปรสามารถเปลี่ยนชนิดข้อมูลได้ตลอดเวลา ทำให้เกิดข้อผิดพลาดที่ตรวจพบยากเมื่อโปรเจกต์มีขนาดใหญ่ขึ้น เช่น การส่งค่าตัวเลขเป็นข้อความเข้าไปในฟังก์ชันที่คาดหวังตัวเลข TypeScript แก้ปัญหานี้โดยตรวจสอบชนิดข้อมูล "ตั้งแต่ตอนเขียนโค้ด" ผ่านตัวแปลภาษา (Compiler) ก่อนที่จะถึงมือผู้ใช้จริง
                </p>

                <h4 class="topic-title">เรื่องที่ 4.2: ชนิดข้อมูลพื้นฐานและ Interface</h4>
                <div class="code-window">
                    <div class="code-header"><span class="code-lang">TypeScript</span>
                        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                    </div>
                    <pre>// ชนิดข้อมูลพื้นฐาน
let studentName: string = "สมชาย";
let score: number = 85;
let isPassed: boolean = true;

// Interface กำหนดโครงสร้างของ Object
interface Student {
  id: number;
  name: string;
  score: number;
}

const student: Student = { id: 1, name: "สมชาย", score: 85 };</pre>
                </div>

                <h4 class="topic-title">เรื่องที่ 4.3: การกำหนด Type ให้ Props ของ Component</h4>
                <p>
                    เมื่อสร้าง Component ที่รับค่าผ่าน Props การประกาศ Interface สำหรับ Props ช่วยให้ VS Code แจ้งเตือนทันทีหากมีการส่งค่าผิดชนิดหรือลืมส่งค่าที่จำเป็น ซึ่งจะใช้บ่อยมากเมื่อสร้าง Component ใน หน่วยที่ 5
                </p>
                <div class="code-window">
                    <div class="code-header"><span class="code-lang">TypeScript</span>
                        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                    </div>
                    <pre>interface StudentCardProps {
  name: string;
  score: number;
}

function StudentCard({ name, score }: StudentCardProps) {
  return (
    &lt;div&gt;
      {name} - {score}
    &lt;/div&gt;
  );
}</pre>
                </div>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="lesson-section">
                <h3>🛠️ 4. ตัวอย่างการปฏิบัติการทีละขั้นตอน (Step-by-Step Walkthrough)</h3>
                <p>แปลงไฟล์โปรเจกต์เดิมให้รองรับ TypeScript แล้วทดลองแก้ Error ที่เกิดขึ้น</p>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 1</div>
                    <div class="step-detail">
                        <strong>เปิดใช้งาน TypeScript ในโปรเจกต์ Next.js</strong>
                        <p>สร้างไฟล์ <code class="inline-code">tsconfig.json</code> เปล่าไว้ที่รากโปรเจกต์ แล้วรันคำสั่งเริ่มเซิร์ฟเวอร์พัฒนาอีกครั้ง Next.js จะตรวจพบและติดตั้งไลบรารีที่จำเป็นให้อัตโนมัติ:</p>
                        <div class="code-window">
                            <div class="code-header"><span class="code-lang">PowerShell</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                            </div>
                            <pre>New-Item -ItemType File -Name "tsconfig.json"
npm run dev</pre>
                        </div>
                        <p>เมื่อเริ่มรันแล้ว ให้เปลี่ยนชื่อไฟล์ <code class="inline-code">app/page.js</code> เป็น <code class="inline-code">app/page.tsx</code></p>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 2</div>
                    <div class="step-detail">
                        <strong>กำหนด Type ให้ข้อมูลนักเรียนจากหน่วยที่ 3</strong>
                        <p>สร้างไฟล์ <code class="inline-code">types/student.ts</code> แล้วประกาศ Interface:</p>
                        <div class="code-window">
                            <div class="code-header"><span class="code-lang">TypeScript</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                            </div>
                            <pre>export interface Student {
  id: number;
  name: string;
  score: number;
}</pre>
                        </div>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 3</div>
                    <div class="step-detail">
                        <strong>แก้ไข data/students.js ให้เป็น TypeScript และใช้ Type ที่ประกาศไว้</strong>
                        <div class="code-window">
                            <div class="code-header"><span class="code-lang">TypeScript</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg></button>
                            </div>
                            <pre>import { Student } from "../types/student";

export const students: Student[] = [
  { id: 1, name: "สมชาย ใจดี", score: 85 },
  { id: 2, name: "สมหญิง รักเรียน", score: 92 },
];</pre>
                        </div>
                        <div class="error-alert-box">
                            <span class="error-title">⚠️ ลองทดสอบ Error ของ TypeScript</span>
                            <p>ให้ลองเปลี่ยนค่า <code class="inline-code">score: 85</code> เป็น <code class="inline-code">score: "85"</code> (ใส่เครื่องหมายคำพูด) แล้วสังเกตว่า VS Code จะขีดเส้นแดงแจ้งเตือนทันที เพราะ Interface กำหนดให้ <code class="inline-code">score</code> ต้องเป็น <code class="inline-code">number</code> เท่านั้น นี่คือจุดเด่นของ TypeScript ที่ช่วยจับบั๊กก่อนรันจริง</p>
                        </div>
                    </div>
                </div>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="assignment-box">
                <h3>📝 5. งานที่มอบหมายและเกณฑ์การประเมินผล (Assignment)</h3>
                <p><strong>ใบงานที่ 4: แปลงโปรเจกต์เดิมให้เป็น TypeScript</strong></p>
                <br>
                <p><strong>คำสั่ง:</strong></p>
                <ul style="margin-left: 20px;">
                    <li>เปิดใช้งาน TypeScript ในโปรเจกต์จากหน่วยที่ 1-3</li>
                    <li>สร้าง Interface <code class="inline-code">Student</code> และนำไปใช้กับไฟล์ข้อมูลนักเรียน</li>
                    <li>แปลงไฟล์ <code class="inline-code">page.js</code> เป็น <code class="inline-code">page.tsx</code> โดยไม่มี Error สีแดงค้างอยู่</li>
                    <li>ส่ง Commit ขึ้น GitHub พร้อมภาพหน้าจอแสดง Error ที่เคยพบและวิธีแก้ไข</li>
                </ul>
                <br>
                <p><strong>📊 เกณฑ์การตัดคะแนน (คะแนนเต็ม 5 คะแนน):</strong></p>
                <ul style="margin-left: 20px; font-size: 0.9rem; color: #78350f;">
                    <li>• เปิดใช้งาน TypeScript ในโปรเจกต์ได้สำเร็จ (1 คะแนน)</li>
                    <li>• สร้างและใช้งาน Interface ได้ถูกต้อง (2 คะแนน)</li>
                    <li>• โปรเจกต์รันได้โดยไม่มี Type Error (1 คะแนน)</li>
                    <li>• Commit และ Push ขึ้น GitHub ครบถ้วน (1 คะแนน)</li>
                </ul>
            </section>

        </div>
    </div>

    <script src="../assets/js/script.js"></script>
</body>

</html>
