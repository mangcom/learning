<?php
$base_dir = "../";
$active_nav = "frontend";
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน่วยที่ 2: การออกแบบและตกแต่งเว็บด้วย Modern HTML5, CSS3 และ UI Framework</title>
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
            <h2>หน่วยที่ 2: การออกแบบและตกแต่งเว็บด้วย Modern HTML5, CSS3 และ UI Framework</h2>
            <p>สัปดาห์ที่ 2 | เวลาเรียน 5 ชั่วโมง (ทฤษฎี 1 ชม. ปฏิบัติ 4 ชม.)</p>
        </div>
    </div>

    <div class="container">
        <div class="single-layout">

            <section class="lesson-section">
                <div class="key-concept-box">
                    <strong>🎯 สารสำคัญ (Key Concepts)</strong>
                    <p>
                        โครงสร้างหน้าเว็บที่ดีต้องเริ่มจาก Semantic HTML5 ที่สื่อความหมายชัดเจนและเป็นมิตรกับ SEO และ Accessibility ก่อนจะตกแต่งด้วย CSS3 ในรูปแบบที่จัดการง่ายและไม่ชนกันระหว่างคอมโพเนนต์ Next.js รองรับทั้ง Global CSS และ CSS Modules ในตัว และสามารถติดตั้ง UI Framework อย่าง Tailwind CSS เพื่อเร่งความเร็วในการออกแบบหน้าเว็บได้อย่างมีมาตรฐาน
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
                        <td>1. สามารถอธิบายหลักการใช้ Semantic HTML5 ได้ถูกต้อง<br>2. สามารถอธิบายความแตกต่างระหว่าง Global CSS, CSS Modules และ Tailwind CSS ได้</td>
                    </tr>
                    <tr>
                        <td><strong>ด้านทักษะ (Practice - P)</strong></td>
                        <td>1. สามารถติดตั้งและตั้งค่า Tailwind CSS ในโปรเจกต์ Next.js ได้<br>2. สามารถจัดวางหน้าเว็บแบบ Responsive ด้วย Tailwind Utility Class ได้</td>
                    </tr>
                    <tr>
                        <td><strong>ด้านเจตคติ (Attitude - A)</strong></td>
                        <td>1. ใส่ใจรายละเอียดด้านความสวยงามและการใช้งานของหน้าเว็บ<br>2. มีความคิดสร้างสรรค์ในการออกแบบส่วนติดต่อผู้ใช้</td>
                    </tr>
                </table>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="lesson-section">
                <h3>📘 3. เนื้อหาทางทฤษฎีเชิงลึก (Theoretical Core)</h3>

                <h4 class="topic-title">เรื่องที่ 2.1: Semantic HTML5 ในโครงสร้าง App Router</h4>
                <p>
                    การใช้แท็กที่สื่อความหมาย เช่น <code class="inline-code">&lt;header&gt;</code>, <code class="inline-code">&lt;nav&gt;</code>, <code class="inline-code">&lt;main&gt;</code>, <code class="inline-code">&lt;section&gt;</code>, <code class="inline-code">&lt;footer&gt;</code> แทนการใช้ <code class="inline-code">&lt;div&gt;</code> ทั้งหมด ช่วยให้ Search Engine และโปรแกรมอ่านหน้าจอ (Screen Reader) เข้าใจโครงสร้างหน้าเว็บได้ดีขึ้น ใน Next.js มักวางโครงสร้างหลักไว้ที่ <code class="inline-code">app/layout.js</code> เพื่อให้ทุกหน้าใช้โครงสร้างเดียวกัน
                </p>

                <h4 class="topic-title">เรื่องที่ 2.2: การจัดการ CSS ใน Next.js</h4>
                <table class="grading-table" style="margin: 15px 0;">
                    <tr style="background:#f1f5f9;">
                        <th>รูปแบบ CSS</th>
                        <th>ไฟล์/วิธีใช้งาน</th>
                        <th>เหมาะกับงาน</th>
                    </tr>
                    <tr>
                        <td><strong>Global CSS</strong></td>
                        <td><code class="inline-code">app/globals.css</code> import ใน layout.js</td>
                        <td>สไตล์พื้นฐานทั้งเว็บไซต์ เช่น font, สี</td>
                    </tr>
                    <tr>
                        <td><strong>CSS Modules</strong></td>
                        <td><code class="inline-code">ชื่อไฟล์.module.css</code></td>
                        <td>สไตล์เฉพาะคอมโพเนนต์ ไม่ชนกับไฟล์อื่น</td>
                    </tr>
                    <tr>
                        <td><strong>Tailwind CSS</strong></td>
                        <td>Utility Class ในแอตทริบิวต์ <code class="inline-code">className</code></td>
                        <td>ออกแบบเร็ว ไม่ต้องสลับไฟล์ไปมา</td>
                    </tr>
                </table>

                <h4 class="topic-title">เรื่องที่ 2.3: หลักการออกแบบ Responsive Web Design</h4>
                <p>
                    การออกแบบให้หน้าเว็บแสดงผลได้ดีทั้งบนจอคอมพิวเตอร์ แท็บเล็ต และมือถือ โดยใช้ CSS Flexbox, Grid และ Media Query หรือใน Tailwind CSS จะใช้ Responsive Prefix เช่น <code class="inline-code">md:</code>, <code class="inline-code">lg:</code> นำหน้า Utility Class เพื่อกำหนดสไตล์ตามขนาดหน้าจอ
                </p>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="lesson-section">
                <h3>🛠️ 4. ตัวอย่างการปฏิบัติการทีละขั้นตอน (Step-by-Step Walkthrough)</h3>
                <p>ในบทปฏิบัติการนี้ นักศึกษาจะติดตั้ง Tailwind CSS และออกแบบหน้า Landing Page อย่างง่าย</p>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 1</div>
                    <div class="step-detail">
                        <strong>ติดตั้ง Tailwind CSS ในโปรเจกต์ Next.js</strong>
                        <p>เปิด Terminal ในโฟลเดอร์โปรเจกต์ที่สร้างไว้จากหน่วยที่ 1 แล้วรันคำสั่ง:</p>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">PowerShell</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
                                </button>
                            </div>
                            <pre>npm install tailwindcss @tailwindcss/postcss postcss</pre>
                        </div>
                        <p>จากนั้นเพิ่มบรรทัดต่อไปนี้ไว้บนสุดของไฟล์ <code class="inline-code">app/globals.css</code>:</p>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">CSS</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
                                </button>
                            </div>
                            <pre>@import "tailwindcss";</pre>
                        </div>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 2</div>
                    <div class="step-detail">
                        <strong>สร้างส่วนหัวเว็บไซต์ (Navbar) ด้วย Semantic HTML และ Tailwind</strong>
                        <p>แก้ไขไฟล์ <code class="inline-code">app/layout.js</code> ให้มีโครงสร้างดังนี้:</p>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">JSX</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
                                </button>
                            </div>
                            <pre>export default function RootLayout({ children }) {
  return (
    &lt;html lang="th"&gt;
      &lt;body&gt;
        &lt;header className="bg-slate-900 text-white p-4"&gt;
          &lt;nav className="flex justify-between items-center max-w-5xl mx-auto"&gt;
            &lt;span className="font-bold"&gt;My Shop&lt;/span&gt;
            &lt;ul className="flex gap-4"&gt;
              &lt;li&gt;หน้าแรก&lt;/li&gt;
              &lt;li&gt;สินค้า&lt;/li&gt;
              &lt;li&gt;ติดต่อเรา&lt;/li&gt;
            &lt;/ul&gt;
          &lt;/nav&gt;
        &lt;/header&gt;
        &lt;main&gt;{children}&lt;/main&gt;
        &lt;footer className="bg-slate-100 text-center p-4 mt-10"&gt;© 2569 My Shop&lt;/footer&gt;
      &lt;/body&gt;
    &lt;/html&gt;
  );
}</pre>
                        </div>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 3</div>
                    <div class="step-detail">
                        <strong>ออกแบบ Hero Section แบบ Responsive</strong>
                        <p>แก้ไขไฟล์ <code class="inline-code">app/page.js</code> ให้ใช้ Grid แบบ Responsive ที่เปลี่ยนจาก 1 คอลัมน์บนมือถือ เป็น 2 คอลัมน์บนจอใหญ่:</p>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">JSX</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
                                </button>
                            </div>
                            <pre>export default function Home() {
  return (
    &lt;section className="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-5xl mx-auto p-6"&gt;
      &lt;div&gt;
        &lt;h1 className="text-3xl font-bold mb-2"&gt;ยินดีต้อนรับสู่ร้านค้าออนไลน์&lt;/h1&gt;
        &lt;p className="text-slate-600"&gt;สินค้าคุณภาพดี ราคาย่อมเยา จัดส่งทั่วไทย&lt;/p&gt;
      &lt;/div&gt;
      &lt;div className="bg-slate-200 rounded-xl h-48"&gt;&lt;/div&gt;
    &lt;/section&gt;
  );
}</pre>
                        </div>
                        <p>บันทึกไฟล์แล้วลองย่อ-ขยายหน้าต่างเบราว์เซอร์เพื่อสังเกตการเปลี่ยนแปลงของ Layout</p>
                    </div>
                </div>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="assignment-box">
                <h3>📝 5. งานที่มอบหมายและเกณฑ์การประเมินผล (Assignment)</h3>
                <p><strong>ใบงานที่ 2: ออกแบบหน้า Landing Page ด้วย Tailwind CSS</strong></p>
                <br>
                <p><strong>คำสั่ง:</strong></p>
                <ul style="margin-left: 20px;">
                    <li>ติดตั้ง Tailwind CSS ในโปรเจกต์ Next.js ของตนเอง</li>
                    <li>ออกแบบหน้า Landing Page ที่มี Navbar, Hero Section และ Footer โดยใช้ Semantic HTML</li>
                    <li>ต้องมีการจัดวางแบบ Responsive อย่างน้อย 1 จุด (เปลี่ยน Layout เมื่อจอเล็กลง)</li>
                    <li>ส่ง Commit ขึ้น GitHub Repository เดิมจากหน่วยที่ 1 พร้อมภาพหน้าจอบนจอคอมพิวเตอร์และมือถือ</li>
                </ul>
                <br>
                <p><strong>📊 เกณฑ์การตัดคะแนน (คะแนนเต็ม 5 คะแนน):</strong></p>
                <ul style="margin-left: 20px; font-size: 0.9rem; color: #78350f;">
                    <li>• ติดตั้ง Tailwind CSS สำเร็จและใช้งานได้ถูกต้อง (1 คะแนน)</li>
                    <li>• ใช้ Semantic HTML ถูกต้องตามโครงสร้าง (1 คะแนน)</li>
                    <li>• ออกแบบหน้าเว็บสวยงามและใช้งานง่าย (2 คะแนน)</li>
                    <li>• รองรับการแสดงผลแบบ Responsive ได้จริง (1 คะแนน)</li>
                </ul>
            </section>

        </div>
    </div>

    <script src="../assets/js/script.js"></script>
</body>

</html>
