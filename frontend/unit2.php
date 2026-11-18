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
    <link rel="stylesheet" href="../assets/css/style.css?v=<?php echo filemtime(__DIR__ . "/../assets/css/style.css"); ?>">
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
                    <p>
                        ในหน่วยนี้ผู้เรียนจะต่อยอดโปรเจกต์ <code class="inline-code">first-nextjs-app</code> จากหน่วยที่ 1 ให้กลายเป็นเว็บไซต์แฟ้มสะสมผลงาน (Portfolio) ที่มีแถบเมนูพร้อมเมนูย่อย (Dropdown) และเมนูเลื่อนด้านข้าง (Sidebar) สำหรับมือถือ ส่วน Hero Section และส่วนแสดงจุดเด่นที่ปรับรูปแบบตามขนาดหน้าจอ โดยทำงานผ่าน <strong>VS Code</strong> รันด้วย <strong>Docker</strong> และบันทึกทุกขั้นด้วย <strong>Git</strong> ไปพร้อมกัน
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
                        <td>1. อธิบายหลักการใช้ Semantic HTML5 และประโยชน์ด้าน SEO และ Accessibility ได้<br>2. อธิบายความแตกต่างระหว่าง Global CSS, CSS Modules และ Tailwind CSS ได้<br>3. อธิบายหลักการ Responsive Web Design และแนวคิด Mobile-First ได้</td>
                    </tr>
                    <tr>
                        <td><strong>ด้านทักษะ (Practice - P)</strong></td>
                        <td>1. ติดตั้งและตั้งค่า Tailwind CSS ในโปรเจกต์ Next.js ที่รันใน Docker ได้<br>2. สร้าง Navbar ที่มี Dropdown และ Sidebar สำหรับมือถือด้วย Semantic HTML และ Tailwind ได้<br>3. ออกแบบ Hero Section และหน้าเว็บที่แสดงผลเหมาะสมทั้งบนมือถือและคอมพิวเตอร์ได้<br>4. ใช้ Git แยก Branch ตามงานและรวมงานเข้าสู่ Branch หลักได้</td>
                    </tr>
                    <tr>
                        <td><strong>ด้านเจตคติ (Attitude - A)</strong></td>
                        <td>1. ใส่ใจผู้ใช้ทุกกลุ่ม ทั้งผู้ใช้มือถือและผู้ใช้โปรแกรมอ่านหน้าจอ<br>2. ทดสอบผลงานบนหลายขนาดหน้าจออย่างละเอียดรอบคอบก่อนส่งงาน</td>
                    </tr>
                </table>
            </section>

            <div class="key-concept-box">
                <strong>🗺️ สารบัญหน่วยที่ 2</strong>
                <ul style="margin: 10px 0 0 20px; line-height: 1.9;">
                    <li><a href="#topic-2-1">เรื่องที่ 2.1: Semantic HTML5 ในโครงสร้าง App Router</a></li>
                    <li><a href="#topic-2-2">เรื่องที่ 2.2: CSS3 และการจัดการ CSS ใน Next.js</a></li>
                    <li><a href="#topic-2-3">เรื่องที่ 2.3: หลักการออกแบบ Responsive Web Design</a></li>
                    <li><a href="#topic-2-4">เรื่องที่ 2.4: Tailwind CSS — UI Framework แบบ Utility-First</a></li>
                    <li><a href="#topic-2-5">เรื่องที่ 2.5: การออกแบบสำหรับหน้าจอ Mobile และ Desktop</a></li>
                    <li><a href="#topic-2-6">เรื่องที่ 2.6: ทำงานด้วย VS Code + Docker + Git ไปพร้อมกัน</a></li>
                    <li><a href="#workshop">ปฏิบัติการ: สร้างเว็บไซต์ Portfolio แบบ Responsive ด้วย Tailwind CSS (7 ขั้นตอน)</a></li>
                </ul>
            </div>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="lesson-section">
                <h3>📘 3. เนื้อหาทางทฤษฎีเชิงลึก (Theoretical Core)</h3>

                <!-- ===================== 2.1 ===================== -->
                <h4 class="topic-title" id="topic-2-1">เรื่องที่ 2.1: Semantic HTML5 ในโครงสร้าง App Router</h4>
                <p>
                    <strong>Semantic HTML</strong> (HTML เชิงความหมาย) คือการเลือกใช้แท็กที่ <strong>บอกว่าเนื้อหาส่วนนั้นคืออะไร</strong> ไม่ใช่แค่บอกว่าแสดงผลอย่างไร เช่น <code class="inline-code">&lt;nav&gt;</code> บอกว่านี่คือ "เมนูนำทาง" และ <code class="inline-code">&lt;article&gt;</code> บอกว่านี่คือ "เนื้อหาที่สมบูรณ์ในตัวเอง" ตรงข้ามกับ <code class="inline-code">&lt;div&gt;</code> ซึ่งเป็นกล่องเปล่าที่ไม่มีความหมายใด ๆ เปรียบเหมือนการจัดของเข้าตู้ที่ติดป้ายชื่อไว้ทุกลิ้นชัก ใครเปิดดูก็รู้ทันทีว่าลิ้นชักไหนเก็บอะไร แทนที่จะเป็นกล่องสีน้ำตาลเหมือนกันหมดที่ต้องเปิดดูทีละกล่อง
                </p>
                <p>
                    HTML5 ได้รับการรับรองเป็นมาตรฐานโดย W3C ในปี 2014 และปัจจุบันพัฒนาต่อเนื่องในชื่อ <strong>HTML Living Standard</strong> โดยองค์กร WHATWG จุดเปลี่ยนสำคัญคือการเพิ่มแท็กเชิงความหมายอย่าง <code class="inline-code">&lt;header&gt;</code>, <code class="inline-code">&lt;nav&gt;</code>, <code class="inline-code">&lt;main&gt;</code>, <code class="inline-code">&lt;section&gt;</code>, <code class="inline-code">&lt;article&gt;</code>, <code class="inline-code">&lt;aside&gt;</code> และ <code class="inline-code">&lt;footer&gt;</code> แทนการใช้ <code class="inline-code">&lt;div class="header"&gt;</code> แบบเดิม
                </p>

                <div class="image-container">
                    <div>
                        <figure class="custom-image-box" style="max-width: 860px;">
                            <img src="img/unit2-div-vs-semantic.svg" alt="เปรียบเทียบโครงสร้างหน้าเว็บที่ใช้ div ทั้งหมด กับโครงสร้างที่ใช้แท็ก Semantic HTML5" class="responsive-img">
                            <figcaption class="image-caption">
                                <strong>รูปที่ 2.1:</strong> โครงสร้างแบบ "Div Soup" เทียบกับ Semantic HTML5 ที่แต่ละแท็กบอกความหมายของตัวเอง
                                <span class="image-source">🔗 แหล่งอ้างอิงภาพ: ภาพประกอบจัดทำขึ้นสำหรับบทเรียนนี้</span>
                            </figcaption>
                        </figure>
                    </div>
                </div>

                <p><strong>แท็ก Semantic ที่ใช้บ่อยและตำแหน่งที่ใช้ในโปรเจกต์ของหน่วยนี้</strong></p>
                <table class="grading-table" style="margin: 15px 0;">
                    <tr style="background:#f1f5f9;">
                        <th width="18%">แท็ก</th>
                        <th width="40%">ความหมาย / ใช้เมื่อ</th>
                        <th>ตัวอย่างในโปรเจกต์</th>
                    </tr>
                    <tr><td><code class="inline-code">&lt;header&gt;</code></td><td>ส่วนหัวของหน้า หรือส่วนหัวของเนื้อหาย่อย มักมีโลโก้และเมนู</td><td>แถบด้านบนที่มีโลโก้ Somchai.dev</td></tr>
                    <tr><td><code class="inline-code">&lt;nav&gt;</code></td><td>กลุ่มลิงก์นำทางหลักของเว็บไซต์ (ไม่จำเป็นต้องใช้กับทุกกลุ่มลิงก์)</td><td>เมนูหลักบนจอใหญ่ และ Sidebar บนมือถือ</td></tr>
                    <tr><td><code class="inline-code">&lt;main&gt;</code></td><td>เนื้อหาหลักของหน้า <strong>มีได้เพียง 1 ครั้งต่อหน้า</strong></td><td>ครอบเนื้อหาของทุกหน้าใน <code class="inline-code">layout.js</code></td></tr>
                    <tr><td><code class="inline-code">&lt;section&gt;</code></td><td>กลุ่มเนื้อหาตามหัวข้อ ควรมีหัวเรื่อง (h2, h3) อยู่ภายใน</td><td>Hero Section และส่วน "สิ่งที่ผมกำลังเรียนรู้"</td></tr>
                    <tr><td><code class="inline-code">&lt;article&gt;</code></td><td>เนื้อหาที่สมบูรณ์ในตัวเอง แยกไปแสดงที่อื่นได้ เช่น บทความ การ์ดสินค้า ความคิดเห็น</td><td>การ์ดแต่ละใบ และบริการแต่ละรายการ</td></tr>
                    <tr><td><code class="inline-code">&lt;aside&gt;</code></td><td>เนื้อหาเสริมที่เกี่ยวข้องแต่ไม่ใช่เนื้อหาหลัก เช่น แถบข้าง กล่องข่าวที่เกี่ยวข้อง</td><td>(ใช้ในงานที่มอบหมายได้ เช่น กล่องแนะนำ)</td></tr>
                    <tr><td><code class="inline-code">&lt;footer&gt;</code></td><td>ส่วนท้ายของหน้า เช่น ลิขสิทธิ์ ข้อมูลติดต่อ</td><td>ส่วนท้ายที่มีชื่อและอีเมล</td></tr>
                    <tr><td><code class="inline-code">&lt;address&gt;</code></td><td>ข้อมูลติดต่อของเจ้าของหน้าหรือผู้เขียน</td><td>อีเมลใน Footer</td></tr>
                    <tr><td><code class="inline-code">&lt;figure&gt;</code>, <code class="inline-code">&lt;figcaption&gt;</code></td><td>รูปภาพ แผนภาพ หรือโค้ดตัวอย่าง พร้อมคำบรรยาย</td><td>(ภาพประกอบในบทเรียนนี้ใช้แท็กนี้)</td></tr>
                    <tr><td><code class="inline-code">&lt;h1&gt;</code>–<code class="inline-code">&lt;h6&gt;</code></td><td>หัวเรื่องตามลำดับความสำคัญ <strong>h1 ควรมีหน้าละ 1 ครั้ง</strong> และไม่ควรข้ามระดับ (h2 แล้วกระโดดไป h4)</td><td>h1 = ชื่อเจ้าของเว็บ, h2 = หัวข้อส่วน, h3 = ชื่อการ์ด</td></tr>
                </table>

                <p><strong>ทำไม Semantic HTML จึงสำคัญ</strong></p>
                <ul style="margin-left: 20px;">
                    <li><strong>SEO (Search Engine Optimization):</strong> Google อ่านโครงสร้างหน้าเว็บจากแท็กเหล่านี้ รู้ว่าข้อความไหนคือหัวเรื่องสำคัญ (h1) และส่วนไหนคือเนื้อหาหลัก (main) จึงจัดอันดับการค้นหาได้แม่นยำขึ้น</li>
                    <li><strong>Accessibility (การเข้าถึงได้):</strong> ผู้พิการทางสายตาใช้ <strong>Screen Reader</strong> (โปรแกรมอ่านหน้าจอ) ซึ่งใช้แท็กเหล่านี้เป็น "จุดสังเกต" (Landmark) ทำให้กดข้ามไปยังเมนูหรือเนื้อหาหลักได้ทันที แทนที่จะต้องฟังทุกบรรทัดตั้งแต่ต้น</li>
                    <li><strong>อ่านและดูแลโค้ดง่าย:</strong> นักพัฒนาคนอื่นเปิดโค้ดแล้วเข้าใจโครงสร้างได้ทันที ลดการตั้งชื่อ class ที่ไม่สื่อความหมาย</li>
                    <li><strong>ได้ความสามารถฟรีจากเบราว์เซอร์:</strong> เช่น <code class="inline-code">&lt;button&gt;</code> กดด้วยแป้น Enter/Space และเลื่อนโฟกัสด้วย Tab ได้เอง ขณะที่ <code class="inline-code">&lt;div onClick&gt;</code> ทำไม่ได้</li>
                </ul>

                <p><strong>กฎสำคัญในการเลือกแท็กสำหรับสิ่งที่ผู้ใช้กดได้</strong></p>
                <table class="grading-table" style="margin: 15px 0;">
                    <tr style="background:#f1f5f9;">
                        <th width="28%">สถานการณ์</th>
                        <th width="30%">แท็กที่ถูกต้อง</th>
                        <th>เหตุผล</th>
                    </tr>
                    <tr><td>ไปยังหน้าอื่นภายในเว็บ</td><td><code class="inline-code">&lt;Link href="/about"&gt;</code> ของ Next.js</td><td>เปลี่ยนหน้าแบบไม่ต้องโหลดใหม่ทั้งหมด และ Next.js โหลดหน้าปลายทางล่วงหน้าให้</td></tr>
                    <tr><td>ไปยังเว็บไซต์ภายนอก หรือลิงก์อีเมล</td><td><code class="inline-code">&lt;a href="..."&gt;</code></td><td>เป็นลิงก์ปกติของ HTML</td></tr>
                    <tr><td>สั่งให้เกิดการกระทำบนหน้าเดิม เช่น เปิดเมนู ส่งฟอร์ม</td><td><code class="inline-code">&lt;button type="button"&gt;</code></td><td>ไม่ได้พาไปหน้าอื่น ใช้แป้นพิมพ์ได้ และ Screen Reader ประกาศว่าเป็น "ปุ่ม"</td></tr>
                </table>

                <p><strong>คุณสมบัติ (Attribute) ด้าน Accessibility ที่ใช้ในหน่วยนี้</strong></p>
                <ul style="margin-left: 20px;">
                    <li><code class="inline-code">&lt;html lang="th"&gt;</code> — บอกภาษาของหน้าเว็บ ให้ Screen Reader อ่านออกเสียงภาษาไทยได้ถูกต้อง (โปรเจกต์ที่สร้างใหม่จะเป็น <code class="inline-code">lang="en"</code> ต้องแก้เอง)</li>
                    <li><code class="inline-code">aria-label="เปิดเมนู"</code> — ตั้งชื่อให้ปุ่มที่มีแต่ไอคอน (☰) เพื่อให้ Screen Reader อ่านได้ว่าปุ่มนี้ทำอะไร</li>
                    <li><code class="inline-code">aria-expanded={true/false}</code> — บอกว่าเมนูย่อยกำลังเปิดหรือปิดอยู่</li>
                    <li><code class="inline-code">aria-controls="id"</code> — บอกว่าปุ่มนี้ควบคุมส่วนใดของหน้า</li>
                    <li><code class="inline-code">inert</code> — ทำให้ส่วนที่ซ่อนอยู่ (เช่น Sidebar ที่เลื่อนออกนอกจอ) กดหรือเลื่อนโฟกัสไปถึงไม่ได้ ป้องกันผู้ใช้แป้นพิมพ์หลงเข้าไปในเมนูที่มองไม่เห็น</li>
                    <li><code class="inline-code">alt="คำอธิบายภาพ"</code> — ข้อความแทนรูปภาพ สำหรับผู้ที่มองไม่เห็นภาพหรือเมื่อรูปโหลดไม่ขึ้น</li>
                </ul>

                <p><strong>Semantic HTML กับโครงสร้าง App Router</strong></p>
                <p>
                    ใน Next.js App Router โครงสร้างหน้าเว็บถูกแบ่งเป็นไฟล์ตามหน้าที่ ส่วนที่ <strong>ทุกหน้าใช้ร่วมกัน</strong> (<code class="inline-code">&lt;html&gt;</code>, <code class="inline-code">&lt;header&gt;</code>, <code class="inline-code">&lt;main&gt;</code>, <code class="inline-code">&lt;footer&gt;</code>) วางไว้ใน <code class="inline-code">app/layout.js</code> เพียงครั้งเดียว ส่วนเนื้อหา <strong>เฉพาะของแต่ละหน้า</strong> อยู่ใน <code class="inline-code">page.js</code> ของแต่ละโฟลเดอร์ ซึ่ง Next.js จะนำมาใส่แทนตำแหน่ง <code class="inline-code">{children}</code> ภายใน <code class="inline-code">&lt;main&gt;</code> ให้อัตโนมัติ ทำให้ทุกหน้ามีโครงสร้าง Semantic ที่ถูกต้องสม่ำเสมอ ดังรูปที่ 2.2
                </p>

                <div class="image-container">
                    <div>
                        <figure class="custom-image-box" style="max-width: 860px;">
                            <img src="img/unit2-semantic-app-router.svg" alt="แผนภาพแสดงว่าไฟล์ layout.js, Navbar.js, page.js และ Footer.js สร้างส่วนใดของหน้าเว็บ" class="responsive-img">
                            <figcaption class="image-caption">
                                <strong>รูปที่ 2.2:</strong> การแบ่งโครงสร้าง Semantic HTML5 ตามไฟล์ใน App Router
                                <span class="image-source">🔗 แหล่งอ้างอิงภาพ: ภาพประกอบจัดทำขึ้นสำหรับบทเรียนนี้</span>
                            </figcaption>
                        </figure>
                    </div>
                </div>

                <p>
                    นอกจากนี้ App Router ยังมี <strong>Metadata API</strong> สำหรับ SEO โดยเพียง <code class="inline-code">export const metadata = { title, description }</code> ในไฟล์ <code class="inline-code">layout.js</code> หรือ <code class="inline-code">page.js</code> Next.js จะสร้างแท็ก <code class="inline-code">&lt;title&gt;</code> และ <code class="inline-code">&lt;meta name="description"&gt;</code> ใน <code class="inline-code">&lt;head&gt;</code> ให้เอง รวมถึงเพิ่มแท็ก <code class="inline-code">&lt;meta name="viewport"&gt;</code> (จำเป็นสำหรับ Responsive) และ <code class="inline-code">&lt;meta charset&gt;</code> ให้อัตโนมัติ ผู้เรียนจึงไม่ต้องเขียน <code class="inline-code">&lt;head&gt;</code> เองเหมือน HTML ทั่วไป
                </p>

                <p><strong>ข้อแตกต่างของการเขียน HTML ใน JSX ที่ต้องระวัง</strong></p>
                <table class="grading-table" style="margin: 15px 0;">
                    <tr style="background:#f1f5f9;">
                        <th width="34%">HTML ปกติ</th>
                        <th width="34%">JSX ใน Next.js/React</th>
                        <th>เหตุผล</th>
                    </tr>
                    <tr><td><code class="inline-code">class="title"</code></td><td><code class="inline-code">className="title"</code></td><td><code class="inline-code">class</code> เป็นคำสงวนของ JavaScript</td></tr>
                    <tr><td><code class="inline-code">&lt;label for="email"&gt;</code></td><td><code class="inline-code">&lt;label htmlFor="email"&gt;</code></td><td><code class="inline-code">for</code> เป็นคำสงวนของ JavaScript</td></tr>
                    <tr><td><code class="inline-code">&lt;br&gt;</code>, <code class="inline-code">&lt;img ...&gt;</code></td><td><code class="inline-code">&lt;br /&gt;</code>, <code class="inline-code">&lt;img ... /&gt;</code></td><td>JSX บังคับให้ปิดแท็กทุกตัว</td></tr>
                    <tr><td><code class="inline-code">style="color: red"</code></td><td><code class="inline-code">style={{ color: "red" }}</code></td><td>style ต้องเป็น Object ของ JavaScript</td></tr>
                    <tr><td><code class="inline-code">&lt;!-- comment --&gt;</code></td><td><code class="inline-code">{/* comment */}</code></td><td>คอมเมนต์ภายใน JSX ต้องอยู่ในปีกกา</td></tr>
                </table>

                <!-- ===================== 2.2 ===================== -->
                <h4 class="topic-title" id="topic-2-2">เรื่องที่ 2.2: CSS3 และการจัดการ CSS ใน Next.js</h4>
                <p>
                    <strong>CSS3</strong> คือ CSS รุ่นใหม่ที่แบ่งการพัฒนาออกเป็นโมดูลย่อย (เช่น โมดูลสี โมดูล Layout โมดูลแอนิเมชัน) ทำให้แต่ละความสามารถพัฒนาไปได้อย่างอิสระ ความสามารถสมัยใหม่ที่ผู้เรียนจะได้ใช้ในหน่วยนี้ ได้แก่:
                </p>
                <table class="grading-table" style="margin: 15px 0;">
                    <tr style="background:#f1f5f9;">
                        <th width="26%">ความสามารถ CSS3</th>
                        <th>ใช้ทำอะไร</th>
                        <th width="28%">เทียบกับคลาส Tailwind</th>
                    </tr>
                    <tr><td><strong>Flexbox</strong></td><td>จัดเรียงของในแนวเดียว (แถวหรือคอลัมน์) เช่น แถบเมนู</td><td><code class="inline-code">flex</code>, <code class="inline-code">justify-between</code></td></tr>
                    <tr><td><strong>Grid</strong></td><td>จัดวางเป็นตาราง 2 มิติ เช่น การ์ดหลายใบ</td><td><code class="inline-code">grid</code>, <code class="inline-code">grid-cols-3</code></td></tr>
                    <tr><td><strong>Media Query</strong></td><td>เปลี่ยนสไตล์ตามขนาดหน้าจอ</td><td><code class="inline-code">md:</code>, <code class="inline-code">lg:</code></td></tr>
                    <tr><td><strong>Custom Properties</strong> (ตัวแปร CSS)</td><td>เก็บค่าที่ใช้ซ้ำ เช่น สีประจำเว็บ <code class="inline-code">--color-brand</code></td><td><code class="inline-code">@theme</code> → <code class="inline-code">bg-brand</code></td></tr>
                    <tr><td><strong>Transition / Transform</strong></td><td>ทำให้การเปลี่ยนแปลงนุ่มนวล เลื่อน/หมุนองค์ประกอบ</td><td><code class="inline-code">transition</code>, <code class="inline-code">-translate-x-full</code>, <code class="inline-code">rotate-180</code></td></tr>
                    <tr><td><strong>Gradient</strong></td><td>พื้นหลังไล่เฉดสี</td><td><code class="inline-code">bg-linear-to-b from-blue-50</code></td></tr>
                </table>

                <p><strong>3 วิธีหลักในการจัดการ CSS ใน Next.js</strong></p>
                <p>
                    ปัญหาใหญ่ของ CSS ในโปรเจกต์ที่มีหลายคอมโพเนนต์คือ <strong>ชื่อคลาสชนกัน</strong> เพราะโดยปกติทุกคลาสใน CSS ใช้ได้ทั้งเว็บไซต์ ถ้าคอมโพเนนต์ A และ B ต่างตั้งชื่อคลาส <code class="inline-code">.title</code> เหมือนกัน สไตล์ที่โหลดทีหลังจะไปทับของอีกฝั่ง Next.js จึงรองรับการจัดการ CSS หลายรูปแบบเพื่อแก้ปัญหานี้ดังรูปที่ 2.3
                </p>

                <div class="image-container">
                    <div>
                        <figure class="custom-image-box" style="max-width: 860px;">
                            <img src="img/unit2-css-scope.svg" alt="เปรียบเทียบปัญหาชื่อคลาสชนกันใน Global CSS กับการแก้ไขด้วย CSS Modules และ Tailwind CSS" class="responsive-img">
                            <figcaption class="image-caption">
                                <strong>รูปที่ 2.3:</strong> Global CSS เสี่ยงต่อชื่อคลาสชนกัน ส่วน CSS Modules และ Tailwind CSS ป้องกันปัญหานี้ด้วยวิธีที่ต่างกัน
                                <span class="image-source">🔗 แหล่งอ้างอิงภาพ: ภาพประกอบจัดทำขึ้นสำหรับบทเรียนนี้</span>
                            </figcaption>
                        </figure>
                    </div>
                </div>

                <table class="grading-table" style="margin: 15px 0;">
                    <tr style="background:#f1f5f9;">
                        <th width="16%">รูปแบบ</th>
                        <th width="30%">ไฟล์/วิธีใช้งาน</th>
                        <th>ลักษณะ</th>
                        <th width="22%">เหมาะกับงาน</th>
                    </tr>
                    <tr>
                        <td><strong>Global CSS</strong></td>
                        <td><code class="inline-code">app/globals.css</code> แล้ว import ใน <code class="inline-code">app/layout.js</code></td>
                        <td>มีผลกับทุกหน้าทั้งเว็บไซต์</td>
                        <td>สไตล์พื้นฐานจริง ๆ เช่น การนำเข้า Tailwind ตัวแปรสี</td>
                    </tr>
                    <tr>
                        <td><strong>CSS Modules</strong></td>
                        <td>ไฟล์ <code class="inline-code">ชื่อ.module.css</code> แล้ว <code class="inline-code">import styles from "./ชื่อ.module.css"</code></td>
                        <td>Next.js เปลี่ยนชื่อคลาสให้ไม่ซ้ำโดยอัตโนมัติ ใช้ได้เฉพาะไฟล์ที่ import</td>
                        <td>สไตล์เฉพาะคอมโพเนนต์ที่ต้องการเขียน CSS เอง</td>
                    </tr>
                    <tr>
                        <td><strong>Tailwind CSS</strong></td>
                        <td>ใส่คลาสสำเร็จรูปใน <code class="inline-code">className</code> ได้โดยตรง</td>
                        <td>แต่ละคลาสทำหน้าที่เดียว ไม่ต้องตั้งชื่อคลาสเอง</td>
                        <td>การจัดหน้าและตกแต่งคอมโพเนนต์ส่วนใหญ่</td>
                    </tr>
                </table>
                <p>ตัวอย่าง CSS Modules ที่ผู้เรียนจะสร้างในปฏิบัติการ (ขั้นตอนที่ 3):</p>
                <div class="code-window">
                    <div class="code-header">
                        <span class="code-lang">app/components/Footer.module.css (บางส่วน)</span>
                        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                            </svg>
                        </button>
                    </div>
                    <pre>.title {
  color: #ffffff;
  font-weight: 700;
}</pre>
                </div>
                <div class="code-window">
                    <div class="code-header">
                        <span class="code-lang">app/components/Footer.js (บางส่วน)</span>
                        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                            </svg>
                        </button>
                    </div>
                    <pre>import styles from "./Footer.module.css";

// styles.title ไม่ใช่คำว่า "title" ตรง ๆ แต่เป็นชื่อที่ Next.js สร้างให้ไม่ซ้ำ
&lt;p className={styles.title}&gt;สมชาย ใจดี&lt;/p&gt;</pre>
                </div>
                <p>
                    เมื่อเปิด DevTools ดูในเบราว์เซอร์ จะพบว่าคลาสจริงกลายเป็นชื่อลักษณะ <code class="inline-code">Footer_title__qtfT0</code> (รูปแบบ <em>ชื่อไฟล์_ชื่อคลาส__รหัสสุ่ม</em>) ในโหมดพัฒนา และจะสั้นลงอีกในเวอร์ชัน Production ทำให้ <code class="inline-code">.title</code> ของไฟล์อื่นไม่มีทางชนกัน
                </p>
                <blockquote>
                    <strong>💡 ข้อแนะนำจากเอกสารของ Next.js:</strong> ใช้ Global CSS เฉพาะสไตล์ที่เป็นของทั้งเว็บจริง ๆ (เช่น การนำเข้า Tailwind), ใช้ Tailwind CSS สำหรับตกแต่งคอมโพเนนต์ และใช้ CSS Modules เมื่อจำเป็นต้องเขียน CSS เฉพาะส่วน นอกจากนี้ลำดับของ CSS ขึ้นกับลำดับการ import ในโค้ด และอาจต่างกันเล็กน้อยระหว่างโหมดพัฒนากับ Production จึงควรตรวจผลด้วย <code class="inline-code">npm run build</code> ก่อนส่งงานเสมอ
                </blockquote>

                <!-- ===================== 2.3 ===================== -->
                <h4 class="topic-title" id="topic-2-3">เรื่องที่ 2.3: หลักการออกแบบ Responsive Web Design</h4>
                <p>
                    <strong>Responsive Web Design (RWD)</strong> คือการออกแบบเว็บไซต์ <strong>เพียงชุดเดียว</strong> ที่ปรับการจัดวางให้เหมาะกับทุกขนาดหน้าจอ ตั้งแต่มือถือ แท็บเล็ต ไปจนถึงจอคอมพิวเตอร์ แทนการสร้างเว็บแยกสำหรับมือถือ ปัจจุบันผู้เข้าชมเว็บไซต์ส่วนใหญ่ใช้มือถือ และ Google ใช้หน้าเว็บเวอร์ชันมือถือเป็นหลักในการจัดอันดับการค้นหา (Mobile-First Indexing) RWD จึงเป็นทักษะพื้นฐานที่ขาดไม่ได้
                </p>
                <p><strong>องค์ประกอบหลักของ Responsive Web Design</strong></p>
                <ol style="margin-left: 20px;">
                    <li><strong>Viewport Meta Tag:</strong> <code class="inline-code">&lt;meta name="viewport" content="width=device-width, initial-scale=1"&gt;</code> บอกให้มือถือแสดงผลตามความกว้างจริงของจอ ถ้าไม่มี มือถือจะย่อหน้าเว็บขนาดคอมพิวเตอร์ทั้งหน้าให้เล็กจนอ่านไม่ออก (Next.js ใส่ให้อัตโนมัติ)</li>
                    <li><strong>Fluid Layout (การจัดวางแบบยืดหยุ่น):</strong> ใช้หน่วยแบบสัมพัทธ์ เช่น <code class="inline-code">%</code>, <code class="inline-code">rem</code>, <code class="inline-code">vw</code> และ Flexbox/Grid แทนการกำหนดความกว้างตายตัวเป็น px</li>
                    <li><strong>Flexible Media:</strong> รูปภาพและวิดีโอต้องไม่กว้างเกินกรอบ เช่น <code class="inline-code">max-width: 100%</code></li>
                    <li><strong>Media Query และ Breakpoint:</strong> กำหนดจุดเปลี่ยน (Breakpoint) ที่ความกว้างต่าง ๆ เพื่อเปลี่ยนการจัดวาง เช่น จาก 1 คอลัมน์เป็น 3 คอลัมน์</li>
                </ol>

                <table class="grading-table" style="margin: 15px 0;">
                    <tr style="background:#f1f5f9;">
                        <th width="16%">หน่วยวัด</th>
                        <th>ความหมาย</th>
                        <th width="32%">เหมาะกับ</th>
                    </tr>
                    <tr><td><code class="inline-code">px</code></td><td>พิกเซล ขนาดตายตัว</td><td>เส้นขอบ เงา ขนาดเล็ก ๆ ที่ไม่ต้องปรับ</td></tr>
                    <tr><td><code class="inline-code">rem</code></td><td>เท่าของขนาดตัวอักษรพื้นฐาน (ปกติ 1rem = 16px) ปรับตามการตั้งค่าขนาดตัวอักษรของผู้ใช้</td><td>ขนาดตัวอักษรและระยะห่าง (Tailwind ใช้หน่วยนี้)</td></tr>
                    <tr><td><code class="inline-code">%</code></td><td>เปอร์เซ็นต์ของกล่องที่ครอบอยู่</td><td>ความกว้างของคอลัมน์</td></tr>
                    <tr><td><code class="inline-code">vw</code> / <code class="inline-code">vh</code></td><td>เปอร์เซ็นต์ของความกว้าง/สูงของหน้าจอ (100vw = เต็มจอ)</td><td>ส่วนที่ต้องเต็มจอ เช่น Hero Section</td></tr>
                </table>

                <p><strong>Flexbox และ Grid: เครื่องมือหลักของการจัด Layout</strong></p>
                <div class="image-container">
                    <div>
                        <figure class="custom-image-box" style="max-width: 860px;">
                            <img src="img/unit2-flex-grid.svg" alt="เปรียบเทียบการจัดวางแบบ Flexbox ในแนวเดียว กับ Grid แบบแถวและคอลัมน์" class="responsive-img">
                            <figcaption class="image-caption">
                                <strong>รูปที่ 2.4:</strong> Flexbox เหมาะกับการจัดเรียงแนวเดียว เช่น แถบเมนู ส่วน Grid เหมาะกับการจัดเป็นตาราง เช่น การ์ดหลายใบ
                                <span class="image-source">🔗 แหล่งอ้างอิงภาพ: ภาพประกอบจัดทำขึ้นสำหรับบทเรียนนี้</span>
                            </figcaption>
                        </figure>
                    </div>
                </div>

                <p><strong>Mobile-First: เริ่มออกแบบจากจอเล็กก่อน</strong></p>
                <p>
                    หลักการ <strong>Mobile-First</strong> คือเขียนสไตล์สำหรับมือถือเป็นค่าเริ่มต้น แล้ว "เพิ่ม" การจัดวางสำหรับจอที่กว้างขึ้นทีละขั้นด้วย Media Query แบบ <code class="inline-code">min-width</code> เหตุผลคือการเริ่มจากจอเล็กบังคับให้คิดว่าอะไรสำคัญที่สุด และการขยายจากเรียบง่ายไปซับซ้อนทำได้ง่ายกว่าการบีบของที่ซับซ้อนให้เล็กลง ตัวอย่างการทำการ์ดให้เป็น 1, 2 และ 3 คอลัมน์ตามขนาดจอ เขียนด้วย CSS ปกติได้ดังนี้:
                </p>
                <div class="code-window">
                    <div class="code-header">
                        <span class="code-lang">CSS (Media Query แบบ Mobile-First)</span>
                        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                            </svg>
                        </button>
                    </div>
                    <pre>/* ค่าเริ่มต้น = มือถือ: 1 คอลัมน์ */
.cards {
  display: grid;
  gap: 24px;
}

/* ตั้งแต่ 640px ขึ้นไป: 2 คอลัมน์ */
@media (min-width: 640px) {
  .cards { grid-template-columns: repeat(2, 1fr); }
}

/* ตั้งแต่ 1024px ขึ้นไป: 3 คอลัมน์ */
@media (min-width: 1024px) {
  .cards { grid-template-columns: repeat(3, 1fr); }
}</pre>
                </div>
                <p>ใน Tailwind CSS ผลลัพธ์เดียวกันนี้เขียนได้ในบรรทัดเดียว โดยใช้ <strong>Responsive Prefix</strong> นำหน้าคลาส:</p>
                <div class="code-window">
                    <div class="code-header">
                        <span class="code-lang">JSX + Tailwind CSS</span>
                        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                            </svg>
                        </button>
                    </div>
                    <pre>&lt;div className="grid gap-6 sm:grid-cols-2 lg:grid-cols-3"&gt;...&lt;/div&gt;</pre>
                </div>

                <div class="image-container">
                    <div>
                        <figure class="custom-image-box" style="max-width: 860px;">
                            <img src="img/unit2-breakpoints.svg" alt="ไม้บรรทัดแสดง Breakpoint ของ Tailwind CSS ได้แก่ sm 640px, md 768px, lg 1024px, xl 1280px และ 2xl 1536px" class="responsive-img">
                            <figcaption class="image-caption">
                                <strong>รูปที่ 2.5:</strong> Breakpoint มาตรฐานของ Tailwind CSS และผลของคลาส <code>sm:grid-cols-2 lg:grid-cols-3</code> ที่ความกว้างจอต่าง ๆ
                                <span class="image-source">🔗 แหล่งอ้างอิงภาพ: ภาพประกอบจัดทำขึ้นสำหรับบทเรียนนี้</span>
                            </figcaption>
                        </figure>
                    </div>
                </div>

                <table class="grading-table" style="margin: 15px 0;">
                    <tr style="background:#f1f5f9;">
                        <th width="16%">Prefix</th>
                        <th width="22%">ความกว้างจอขั้นต่ำ</th>
                        <th>อุปกรณ์โดยประมาณ</th>
                    </tr>
                    <tr><td>(ไม่มี)</td><td>0px ขึ้นไป</td><td>ทุกขนาด — <strong>สไตล์สำหรับมือถือ</strong> (เขียนก่อนเสมอ)</td></tr>
                    <tr><td><code class="inline-code">sm:</code></td><td>640px</td><td>มือถือแนวนอน / มือถือจอใหญ่</td></tr>
                    <tr><td><code class="inline-code">md:</code></td><td>768px</td><td>แท็บเล็ตแนวตั้ง</td></tr>
                    <tr><td><code class="inline-code">lg:</code></td><td>1024px</td><td>แท็บเล็ตแนวนอน / โน้ตบุ๊ก</td></tr>
                    <tr><td><code class="inline-code">xl:</code></td><td>1280px</td><td>คอมพิวเตอร์ตั้งโต๊ะ</td></tr>
                    <tr><td><code class="inline-code">2xl:</code></td><td>1536px</td><td>จอขนาดใหญ่</td></tr>
                </table>
                <p style="font-size:0.9rem; color:#64748b;">💡 ข้อควรจำ: <code class="inline-code">md:flex</code> ไม่ได้แปลว่า "เฉพาะแท็บเล็ต" แต่แปลว่า "ตั้งแต่ 768px <strong>ขึ้นไป</strong>" ถ้าต้องการให้มีผลเฉพาะมือถือ ให้เขียนเป็นค่าเริ่มต้น (ไม่มี prefix) แล้วยกเลิกที่ breakpoint ใหญ่ขึ้น เช่น ปุ่มแฮมเบอร์เกอร์ใช้ <code class="inline-code">md:hidden</code> คือ "แสดงปกติ แต่ซ่อนตั้งแต่ md ขึ้นไป"</p>

                <!-- ===================== 2.4 ===================== -->
                <h4 class="topic-title" id="topic-2-4">เรื่องที่ 2.4: Tailwind CSS — UI Framework แบบ Utility-First</h4>
                <p>
                    <strong>Tailwind CSS</strong> สร้างโดย <strong>Adam Wathan</strong> เปิดตัวครั้งแรกในปี 2017 และได้รับความนิยมอย่างรวดเร็วจนเป็นหนึ่งใน CSS Framework ที่ใช้มากที่สุด เวอร์ชัน 4 (ปี 2025) ปรับปรุงครั้งใหญ่ให้ทำงานเร็วขึ้นหลายเท่า และ <strong>ตั้งค่าผ่านไฟล์ CSS ได้โดยตรง</strong> ไม่ต้องมีไฟล์ <code class="inline-code">tailwind.config.js</code> เหมือนเวอร์ชันก่อน (บทความเก่าบนอินเทอร์เน็ตจำนวนมากยังสอนแบบเวอร์ชัน 3 จึงควรระวัง)
                </p>
                <p>
                    แนวคิดหลักของ Tailwind คือ <strong>Utility-First</strong> หมายถึงมีคลาสเล็ก ๆ จำนวนมากที่แต่ละคลาส <strong>ทำหน้าที่เดียว</strong> แล้วนำมาประกอบกันใน <code class="inline-code">className</code> ต่างจาก Bootstrap ที่มีคอมโพเนนต์สำเร็จรูป (เช่น <code class="inline-code">.btn</code>, <code class="inline-code">.card</code>) ซึ่งเว็บที่ใช้ Bootstrap มักหน้าตาคล้ายกัน ส่วน Tailwind ให้อิสระในการออกแบบมากกว่า แต่ยังอยู่ในระบบสีและระยะห่างที่เป็นมาตรฐานเดียวกัน
                </p>
                <p><strong>วิธีอ่านชื่อคลาสของ Tailwind</strong></p>
                <table class="grading-table" style="margin: 15px 0;">
                    <tr style="background:#f1f5f9;">
                        <th width="28%">คลาส</th>
                        <th>CSS ที่ได้ / ความหมาย</th>
                    </tr>
                    <tr><td><code class="inline-code">p-4</code>, <code class="inline-code">px-4</code>, <code class="inline-code">py-2</code></td><td>padding ทุกด้าน 1rem (16px) / ซ้าย-ขวา 16px / บน-ล่าง 8px — <strong>ตัวเลข 1 หน่วย = 0.25rem = 4px</strong></td></tr>
                    <tr><td><code class="inline-code">m-4</code>, <code class="inline-code">mb-3</code>, <code class="inline-code">mx-auto</code></td><td>margin ทุกด้าน / ด้านล่าง 12px / ซ้าย-ขวาอัตโนมัติ (จัดกึ่งกลาง)</td></tr>
                    <tr><td><code class="inline-code">text-lg</code>, <code class="inline-code">text-4xl</code>, <code class="inline-code">font-bold</code></td><td>ขนาดตัวอักษร และความหนา</td></tr>
                    <tr><td><code class="inline-code">text-slate-600</code>, <code class="inline-code">bg-blue-50</code></td><td>สีตัวอักษร / สีพื้นหลัง — ตัวเลข 50 (อ่อนสุด) ถึง 950 (เข้มสุด)</td></tr>
                    <tr><td><code class="inline-code">rounded-lg</code>, <code class="inline-code">shadow</code>, <code class="inline-code">border</code></td><td>มุมโค้ง / เงา / เส้นขอบ</td></tr>
                    <tr><td><code class="inline-code">w-72</code>, <code class="inline-code">h-16</code>, <code class="inline-code">max-w-6xl</code></td><td>ความกว้าง 18rem / ความสูง 4rem / ความกว้างสูงสุด 72rem</td></tr>
                    <tr><td><code class="inline-code">flex</code>, <code class="inline-code">grid</code>, <code class="inline-code">hidden</code></td><td><code class="inline-code">display: flex</code> / <code class="inline-code">display: grid</code> / <code class="inline-code">display: none</code></td></tr>
                    <tr><td><code class="inline-code">hover:bg-slate-100</code></td><td><strong>State Prefix</strong>: มีผลเมื่อเลื่อนเมาส์ไปชี้ (มี <code class="inline-code">focus:</code>, <code class="inline-code">active:</code> ด้วย)</td></tr>
                    <tr><td><code class="inline-code">md:grid-cols-2</code></td><td><strong>Responsive Prefix</strong>: มีผลตั้งแต่จอกว้าง 768px ขึ้นไป</td></tr>
                    <tr><td><code class="inline-code">w-[350px]</code></td><td><strong>Arbitrary Value</strong>: กำหนดค่าเองเมื่อไม่มีในระบบ (ควรใช้เท่าที่จำเป็น)</td></tr>
                </table>

                <table class="grading-table" style="margin: 15px 0;">
                    <tr style="background:#f1f5f9;">
                        <th>ข้อดีของ Tailwind CSS</th>
                        <th>ข้อควรระวัง</th>
                    </tr>
                    <tr>
                        <td>ออกแบบได้เร็ว ไม่ต้องสลับไปมาระหว่างไฟล์ JSX และ CSS</td>
                        <td>ช่วงแรกต้องจำชื่อคลาส (ลดปัญหาได้ด้วยส่วนขยาย Tailwind CSS IntelliSense ใน VS Code)</td>
                    </tr>
                    <tr>
                        <td>ไม่ต้องคิดชื่อคลาสเอง และไม่มีปัญหาชื่อคลาสชนกัน</td>
                        <td>คลาสยาวทำให้ JSX อ่านยากขึ้น ควรแยกเป็นคอมโพเนนต์เมื่อใช้ซ้ำ</td>
                    </tr>
                    <tr>
                        <td>ระบบสีและระยะห่างมาตรฐาน ทำให้ทั้งเว็บสม่ำเสมอ</td>
                        <td>ยังต้องเข้าใจ CSS พื้นฐาน (Flexbox, Grid, Box Model) จึงจะใช้ได้ดี</td>
                    </tr>
                    <tr>
                        <td>ไฟล์ CSS ที่ได้มีขนาดเล็ก เพราะสร้างเฉพาะคลาสที่ใช้จริงในโค้ด</td>
                        <td>ชื่อคลาสต้องเขียนเต็มในโค้ด ห้ามประกอบชื่อจากตัวแปร เช่น <code class="inline-code">`bg-${color}-500`</code> เพราะ Tailwind จะหาไม่เจอ</td>
                    </tr>
                </table>

                <!-- ===================== 2.5 ===================== -->
                <h4 class="topic-title" id="topic-2-5">เรื่องที่ 2.5: การออกแบบสำหรับหน้าจอ Mobile และ Desktop</h4>
                <p>
                    การทำ Responsive ไม่ได้มีแค่ "ย่อให้เล็กลง" แต่ต้อง <strong>ปรับวิธีใช้งาน</strong> ให้เหมาะกับอุปกรณ์ ผู้ใช้มือถือใช้นิ้วกด ถือเครื่องด้วยมือเดียว และเห็นพื้นที่น้อย ส่วนผู้ใช้คอมพิวเตอร์ใช้เมาส์และมีพื้นที่แนวนอนมาก รูปที่ 2.6 และ 2.7 คือผลงานที่ผู้เรียนจะสร้างในปฏิบัติการนี้ ซึ่งเป็นเว็บไซต์เดียวกันที่จัดวางต่างกันตามขนาดหน้าจอ
                </p>

                <div style="display:flex; flex-wrap:wrap; gap:20px; justify-content:center; align-items:flex-start;">
                    <figure class="custom-image-box" style="max-width: 640px; margin: 10px 0;">
                        <img src="img/unit2-result-desktop.png" alt="ภาพหน้าจอเว็บไซต์ Portfolio บนคอมพิวเตอร์ เมนูเรียงแนวนอน Hero Section แบ่งเป็น 2 คอลัมน์ และการ์ด 3 คอลัมน์" class="responsive-img">
                        <figcaption class="image-caption">
                            <strong>รูปที่ 2.6:</strong> บน Desktop (กว้าง 1280px) — เมนูเรียงแนวนอน, Hero 2 คอลัมน์, การ์ด 3 คอลัมน์
                            <span class="image-source">🔗 แหล่งอ้างอิงภาพ: ภาพหน้าจอจากการรันโค้ดตัวอย่างจริง</span>
                        </figcaption>
                    </figure>
                    <figure class="custom-image-box" style="max-width: 260px; margin: 10px 0;">
                        <img src="img/unit2-result-mobile.png" alt="ภาพหน้าจอเว็บไซต์ Portfolio บนมือถือ มีปุ่มแฮมเบอร์เกอร์ เนื้อหาเรียงเป็นคอลัมน์เดียว ปุ่มกว้างเต็มจอ" class="responsive-img">
                        <figcaption class="image-caption">
                            <strong>รูปที่ 2.7:</strong> หน้าจอแรกบน Mobile (กว้าง 390px) — ปุ่ม ☰, เรียงคอลัมน์เดียว, ปุ่มกว้างเต็มจอ
                            <span class="image-source">🔗 แหล่งอ้างอิงภาพ: ภาพหน้าจอจากการรันโค้ดตัวอย่างจริง</span>
                        </figcaption>
                    </figure>
                </div>

                <table class="grading-table" style="margin: 15px 0;">
                    <tr style="background:#f1f5f9;">
                        <th width="20%">องค์ประกอบ</th>
                        <th>บน Mobile</th>
                        <th>บน Desktop</th>
                        <th width="28%">คลาส Tailwind ที่ใช้</th>
                    </tr>
                    <tr><td><strong>เมนูหลัก</strong></td><td>ซ่อนไว้ เปิดผ่านปุ่ม ☰ เป็น Sidebar เลื่อนจากด้านข้าง</td><td>แสดงเป็นแถวแนวนอนตลอดเวลา</td><td><code class="inline-code">hidden md:flex</code> / <code class="inline-code">md:hidden</code></td></tr>
                    <tr><td><strong>เมนูย่อย (Dropdown)</strong></td><td>ขยายลงด้านล่างภายใน Sidebar</td><td>ลอยอยู่ใต้ปุ่มเมนู</td><td><code class="inline-code">absolute</code> (Desktop)</td></tr>
                    <tr><td><strong>Hero Section</strong></td><td>เรียงบนลงล่าง จัดกึ่งกลาง</td><td>แบ่งซ้าย-ขวา 2 คอลัมน์ ชิดซ้าย</td><td><code class="inline-code">md:grid-cols-2</code>, <code class="inline-code">text-center md:text-left</code></td></tr>
                    <tr><td><strong>ขนาดหัวเรื่อง</strong></td><td>เล็กลงให้พอดีจอ</td><td>ใหญ่ขึ้นเพื่อดึงดูดสายตา</td><td><code class="inline-code">text-4xl md:text-5xl</code></td></tr>
                    <tr><td><strong>ปุ่ม</strong></td><td>กว้างเต็มจอ เรียงซ้อนกัน กดง่ายด้วยนิ้ว</td><td>เรียงข้างกันตามความยาวข้อความ</td><td><code class="inline-code">flex-col sm:flex-row</code></td></tr>
                    <tr><td><strong>การ์ด</strong></td><td>1 คอลัมน์</td><td>3 คอลัมน์ (แท็บเล็ต 2 คอลัมน์)</td><td><code class="inline-code">sm:grid-cols-2 lg:grid-cols-3</code></td></tr>
                </table>
                <p><strong>หลักการออกแบบสำหรับมือถือที่ควรจำ</strong></p>
                <ul style="margin-left: 20px;">
                    <li><strong>พื้นที่กดต้องใหญ่พอสำหรับนิ้ว:</strong> ปุ่มและลิงก์ควรมีขนาดอย่างน้อยประมาณ 44×44 พิกเซล และมีระยะห่างกันพอสมควร (เช่น ใช้ <code class="inline-code">px-3 py-2</code> กับลิงก์ใน Sidebar)</li>
                    <li><strong>ตัวอักษรอ่านง่าย:</strong> เนื้อหาไม่ควรเล็กกว่า 16px และบรรทัดไม่ยาวเกินไปบนจอใหญ่ (ใช้ <code class="inline-code">max-w-6xl mx-auto</code> จำกัดความกว้าง)</li>
                    <li><strong>ไม่มี Hover บนมือถือ:</strong> สิ่งที่สำคัญต้องไม่ซ่อนไว้ให้เห็นเฉพาะตอนเมาส์ชี้ เมนูย่อยของเราจึงเปิดด้วยการ <strong>คลิก</strong> ไม่ใช่การชี้</li>
                    <li><strong>ห้ามมีแถบเลื่อนแนวนอน:</strong> ทุกอย่างต้องอยู่ในความกว้างของจอ ตรวจได้ด้วยการเลื่อนหน้าจอซ้าย-ขวาบนมือถือ</li>
                    <li><strong>ทดสอบบนอุปกรณ์จริงด้วย:</strong> โหมดจำลองของเบราว์เซอร์ช่วยได้มาก แต่ความรู้สึกเวลาใช้นิ้วกดจริงต่างกัน</li>
                </ul>

                <!-- ===================== 2.6 ===================== -->
                <h4 class="topic-title" id="topic-2-6">เรื่องที่ 2.6: ทำงานด้วย VS Code + Docker + Git ไปพร้อมกัน</h4>
                <p>
                    ในหน่วยนี้ทุกงานย่อยจะทำตาม "วงจรการทำงาน" เดียวกันดังรูปที่ 2.8 คือ แตก Branch → เขียนโค้ดใน VS Code → Docker สร้างหน้าเว็บใหม่ให้ทันที → ตรวจผลในเบราว์เซอร์ทั้งแบบมือถือและจอใหญ่ → Commit → Merge กลับ <code class="inline-code">main</code> แล้ว Push เมื่อทำซ้ำจนเป็นนิสัย ประวัติ Git ของผู้เรียนจะเล่าเรื่องการพัฒนาได้ชัดเจนเหมือนทีมพัฒนามืออาชีพ
                </p>

                <div class="image-container">
                    <div>
                        <figure class="custom-image-box" style="max-width: 860px;">
                            <img src="img/unit2-workflow.svg" alt="วงจรการทำงาน 6 ขั้น ได้แก่ แตก Branch, เขียนโค้ดใน VS Code, Docker Hot Reload, ทดสอบในเบราว์เซอร์, Commit และ Merge/Push" class="responsive-img">
                            <figcaption class="image-caption">
                                <strong>รูปที่ 2.8:</strong> วงจรการทำงานที่ใช้ซ้ำในทุกขั้นตอนของปฏิบัติการหน่วยนี้
                                <span class="image-source">🔗 แหล่งอ้างอิงภาพ: ภาพประกอบจัดทำขึ้นสำหรับบทเรียนนี้</span>
                            </figcaption>
                        </figure>
                    </div>
                </div>

                <table class="grading-table" style="margin: 15px 0;">
                    <tr style="background:#f1f5f9;">
                        <th width="28%">เครื่องมือ</th>
                        <th>สิ่งที่ใช้ในหน่วยนี้</th>
                    </tr>
                    <tr><td><strong>VS Code</strong></td><td>ติดตั้งส่วนขยาย <strong>Tailwind CSS IntelliSense</strong> (ผู้พัฒนา: Tailwind Labs) ช่วยแนะนำชื่อคลาสขณะพิมพ์ และแสดงค่า CSS จริงเมื่อเลื่อนเมาส์ไปชี้ที่ชื่อคลาส / ใช้ Terminal ใน VS Code สั่ง Docker และ Git / ใช้แถบ Source Control (Ctrl+Shift+G) ดูไฟล์ที่เปลี่ยนแปลง</td></tr>
                    <tr><td><strong>Docker</strong></td><td>ติดตั้งแพ็กเกจด้วย <code class="inline-code">docker compose exec app npm install ...</code> (ติดตั้งใน Container ไม่ใช่บน Windows) / รีสตาร์ตด้วย <code class="inline-code">docker compose restart</code> เมื่อแก้ไฟล์ตั้งค่า / ดูข้อผิดพลาดด้วย <code class="inline-code">docker compose logs -f app</code></td></tr>
                    <tr><td><strong>Git</strong></td><td>ตั้งชื่อ Branch ตามงาน: <code class="inline-code">feature/tailwind-setup</code>, <code class="inline-code">feature/layout</code>, <code class="inline-code">feature/navbar</code>, <code class="inline-code">feature/hero</code> / Commit ตามรูปแบบ Conventional Commits ที่เรียนในหน่วยที่ 1</td></tr>
                    <tr><td><strong>เบราว์เซอร์ (DevTools)</strong></td><td>กด <kbd>F12</kbd> แล้ว <kbd>Ctrl</kbd>+<kbd>Shift</kbd>+<kbd>M</kbd> เพื่อเปิดโหมดจำลองอุปกรณ์ (Device Toolbar) / ใช้แท็บ Elements ดูคลาสและ CSS ที่เกิดขึ้นจริง</td></tr>
                </table>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="lesson-section" id="workshop">
                <h3>🛠️ 4. ตัวอย่างการปฏิบัติการทีละขั้นตอน (Step-by-Step Walkthrough)</h3>
                <p>ในปฏิบัติการนี้ นักศึกษาจะต่อยอดโปรเจกต์ <code class="inline-code">first-nextjs-app</code> จากหน่วยที่ 1 ให้เป็นเว็บไซต์ Portfolio แบบ Responsive ตามรูปที่ 2.6 และ 2.7 ทุกคำสั่งพิมพ์ใน Terminal ของ VS Code ที่เปิดโฟลเดอร์โปรเจกต์ไว้ (คำสั่ง Docker ทำงานใน Container ส่วนคำสั่ง Git ทำงานบน Windows)</p>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 1</div>
                    <div class="step-detail">
                        <strong>เตรียมสภาพแวดล้อม: เปิดโปรเจกต์ใน VS Code, เริ่ม Docker และตรวจสถานะ Git</strong>
                        <ol style="margin-left: 20px;">
                            <li>เปิด Docker Desktop ให้สถานะเป็น Running</li>
                            <li>เปิด VS Code เลือกเมนู <strong>File &gt; Open Folder</strong> แล้วเลือกโฟลเดอร์ <code class="inline-code">first-nextjs-app</code></li>
                            <li>ติดตั้งส่วนขยาย: กด <kbd>Ctrl</kbd>+<kbd>Shift</kbd>+<kbd>X</kbd> ค้นหา <strong>Tailwind CSS IntelliSense</strong> (ของ Tailwind Labs) แล้วกด Install</li>
                        </ol>
                        <p>เปิด Terminal ใน VS Code แล้วเริ่ม Container และตรวจว่า Git อยู่ที่ <code class="inline-code">main</code> และไม่มีงานค้าง:</p>
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
                            <pre>docker compose up -d
git switch main
git status
git pull</pre>
                        </div>
                        <p><code class="inline-code">git status</code> ควรแสดงข้อความ <code class="inline-code">nothing to commit, working tree clean</code> ถ้ายังมีไฟล์ค้างจากหน่วยที่ 1 ให้ Commit ให้เรียบร้อยก่อน ส่วน <code class="inline-code">git pull</code> ดึงงานล่าสุดจาก GitHub (เผื่อแก้จากเครื่องอื่นไว้) จากนั้นแตก Branch สำหรับงานแรก:</p>
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
                            <pre>git switch -c feature/tailwind-setup</pre>
                        </div>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 2</div>
                    <div class="step-detail">
                        <strong>ติดตั้ง Tailwind CSS ในโปรเจกต์ Next.js ผ่าน Docker</strong>
                        <p>ติดตั้งแพ็กเกจ <strong>ภายใน Container</strong> ด้วย <code class="inline-code">docker compose exec</code> (ไม่ต้องติดตั้ง Node.js บน Windows):</p>
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
                            <pre>docker compose exec app npm install -D tailwindcss @tailwindcss/postcss</pre>
                        </div>
                        <ul style="margin-left: 20px;">
                            <li><code class="inline-code">tailwindcss</code> คือตัว Tailwind CSS ส่วน <code class="inline-code">@tailwindcss/postcss</code> คือปลั๊กอินที่เชื่อม Tailwind เข้ากับ <strong>PostCSS</strong> (เครื่องมือแปลงไฟล์ CSS ที่ Next.js ใช้อยู่แล้ว)</li>
                            <li><code class="inline-code">-D</code> ย่อมาจาก <code class="inline-code">--save-dev</code> หมายถึงเป็นเครื่องมือที่ใช้ตอนพัฒนา จะถูกบันทึกในหมวด <code class="inline-code">devDependencies</code> ของ <code class="inline-code">package.json</code></li>
                            <li>สังเกตใน VS Code ว่าไฟล์ <code class="inline-code">package.json</code> และ <code class="inline-code">package-lock.json</code> บน Windows ถูกแก้ไขด้วย เพราะเชื่อมกันผ่าน Bind Mount ส่วนตัวแพ็กเกจถูกเก็บใน Volume <code class="inline-code">node_modules</code></li>
                        </ul>
                        <p>สร้างไฟล์ใหม่ชื่อ <code class="inline-code">postcss.config.mjs</code> ไว้ที่โฟลเดอร์นอกสุดของโปรเจกต์ (ระดับเดียวกับ <code class="inline-code">package.json</code>):</p>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">postcss.config.mjs</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>
                                </button>
                            </div>
                            <pre>const config = {
  plugins: {
    "@tailwindcss/postcss": {},
  },
};

export default config;</pre>
                        </div>
                        <p>เปิดไฟล์ <code class="inline-code">app/globals.css</code> <strong>ลบเนื้อหาเดิมทั้งหมด</strong> แล้วแทนที่ด้วย:</p>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">app/globals.css</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>
                                </button>
                            </div>
                            <pre>@import "tailwindcss";

/* กำหนดสีประจำเว็บไซต์ แล้วเรียกใช้เป็นคลาส Tailwind ได้ เช่น bg-brand, text-brand */
@theme {
  --color-brand: #2563eb;
  --color-brand-dark: #1d4ed8;
}

html {
  scroll-behavior: smooth;
}</pre>
                        </div>
                        <ul style="margin-left: 20px;">
                            <li><code class="inline-code">@import "tailwindcss";</code> นำเข้า Tailwind ทั้งหมด รวมถึง <strong>Preflight</strong> (ชุดล้างสไตล์เริ่มต้นของเบราว์เซอร์) ซึ่งทำให้ h1, ul และ margin ต่าง ๆ ถูกรีเซ็ตเป็นค่าเปล่า ไฟล์เดิมที่มีโค้ดรีเซ็ตของตัวเองจึงไม่จำเป็นแล้ว</li>
                            <li><code class="inline-code">@theme { ... }</code> คือการตั้งค่า Tailwind เวอร์ชัน 4 ด้วย <strong>ตัวแปร CSS</strong> โดยตรง ตัวแปรที่ขึ้นต้นด้วย <code class="inline-code">--color-</code> จะกลายเป็นคลาสสีใหม่ เช่น <code class="inline-code">--color-brand</code> → <code class="inline-code">bg-brand</code>, <code class="inline-code">text-brand</code>, <code class="inline-code">border-brand</code> เปลี่ยนสีทั้งเว็บได้จากจุดเดียว</li>
                            <li><code class="inline-code">scroll-behavior: smooth</code> คือ CSS ปกติ ทำให้การกดลิงก์ไปยังส่วนต่าง ๆ ของหน้าเลื่อนอย่างนุ่มนวล</li>
                        </ul>
                        <p>Next.js อ่านไฟล์ตั้งค่า PostCSS ตอนเริ่มทำงาน จึงต้องรีสตาร์ต Container แล้วรอจนขึ้น <code class="inline-code">Ready</code>:</p>
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
                            <pre>docker compose restart
docker compose logs -f app</pre>
                        </div>
                        <p>เปิด <code class="inline-code">localhost:3000</code> จะเห็นว่าหน้าเว็บจากหน่วยที่ 1 ดู "เรียบ" ลง (หัวข้อตัวเล็กลง จุดหน้ารายการหายไป) นั่นคือหลักฐานว่า Preflight ของ Tailwind ทำงานแล้ว ทดลองตรวจว่าคลาสใช้งานได้ โดยเพิ่ม <code class="inline-code">className</code> ให้แท็ก <code class="inline-code">&lt;h1&gt;</code> ใน <code class="inline-code">app/page.js</code> ชั่วคราว:</p>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">app/page.js (ทดสอบชั่วคราว)</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>
                                </button>
                            </div>
                            <pre>&lt;h1 className="text-4xl font-bold text-brand"&gt;...&lt;/h1&gt;</pre>
                        </div>
                        <p>ถ้าหัวข้อกลายเป็นตัวใหญ่สีน้ำเงิน แสดงว่าติดตั้งสำเร็จ (ไฟล์นี้จะถูกเขียนใหม่ทั้งหมดในขั้นตอนที่ 5) บันทึกงานและรวมเข้า <code class="inline-code">main</code>:</p>
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
                            <pre>git add .
git commit -m "chore: install and configure Tailwind CSS"
git switch main
git merge feature/tailwind-setup
git branch -d feature/tailwind-setup</pre>
                        </div>

                        <div class="error-alert-box">
                            <span class="error-title">⚠️ คลาส Tailwind ไม่ทำงาน หรือขึ้น Error ตอนติดตั้ง?</span>
                            <ul style="margin: 10px 0 0 20px;">
                                <li><strong>หน้าเว็บไม่เปลี่ยนเลย</strong> — ตรวจว่าไฟล์ชื่อ <code>postcss.config.mjs</code> สะกดถูกต้องและอยู่โฟลเดอร์นอกสุด (ไม่ใช่ใน <code>app/</code>), บรรทัดแรกของ <code>globals.css</code> คือ <code>@import "tailwindcss";</code> และได้สั่ง <code>docker compose restart</code> แล้ว</li>
                                <li><strong>ขึ้น <code>Can't resolve '@tailwindcss/postcss'</code></strong> — มักเกิดจากการพิมพ์ <code>npm install</code> บน Windows โดยตรงแทนที่จะสั่งผ่าน <code>docker compose exec app</code> ทำให้แพ็กเกจไม่ได้ถูกติดตั้งใน Container ให้สั่งคำสั่งติดตั้งผ่าน Docker อีกครั้ง</li>
                                <li><strong>ทำตามบทความบนอินเทอร์เน็ตแล้วไม่ได้ผล</strong> — บทความที่ให้สร้าง <code>tailwind.config.js</code> หรือใช้ <code>@tailwind base;</code> เป็นวิธีของ Tailwind เวอร์ชัน 3 ซึ่งต่างจากเวอร์ชัน 4 ที่ใช้ในบทเรียนนี้</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 3</div>
                    <div class="step-detail">
                        <strong>วางโครงสร้าง Semantic ใน layout.js และสร้าง Footer ด้วย CSS Modules</strong>
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
                            <pre>git switch -c feature/layout</pre>
                        </div>
                        <p>สร้างไฟล์ <code class="inline-code">app/components/Footer.module.css</code> (สไตล์เฉพาะของ Footer เขียนด้วย CSS ปกติ):</p>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">app/components/Footer.module.css</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>
                                </button>
                            </div>
                            <pre>.footer {
  background-color: #0f172a;
  color: #cbd5e1;
  padding: 32px 16px;
  text-align: center;
}

.title {
  color: #ffffff;
  font-weight: 700;
  margin-bottom: 8px;
}

.info {
  font-style: normal;
  font-size: 0.9rem;
  line-height: 1.8;
}</pre>
                        </div>
                        <p>สร้างไฟล์ <code class="inline-code">app/components/Footer.js</code>:</p>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">app/components/Footer.js</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>
                                </button>
                            </div>
                            <pre>import styles from "./Footer.module.css";

export default function Footer() {
  return (
    &lt;footer className={styles.footer}&gt;
      &lt;p className={styles.title}&gt;สมชาย ใจดี&lt;/p&gt;
      &lt;address className={styles.info}&gt;
        นักศึกษา ปวส. สาขาเทคโนโลยีสารสนเทศ
        &lt;br /&gt;
        อีเมล: &lt;a href="mailto:student@example.com"&gt;student@example.com&lt;/a&gt;
      &lt;/address&gt;
      &lt;p className={styles.info}&gt;© 2569 สงวนลิขสิทธิ์&lt;/p&gt;
    &lt;/footer&gt;
  );
}</pre>
                        </div>
                        <p>เปิดไฟล์ <code class="inline-code">app/layout.js</code> ลบโค้ดเดิมทั้งหมด แล้วแทนที่ด้วยโครงสร้าง Semantic ต่อไปนี้:</p>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">app/layout.js</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>
                                </button>
                            </div>
                            <pre>import { Noto_Sans_Thai } from "next/font/google";
import Footer from "./components/Footer";
import "./globals.css";

const notoSansThai = Noto_Sans_Thai({ subsets: ["thai", "latin"] });

export const metadata = {
  title: "สมชาย ใจดี | Front-End Developer",
  description: "เว็บไซต์แฟ้มสะสมผลงานของนักศึกษา ปวส. สาขาเทคโนโลยีสารสนเทศ",
};

export default function RootLayout({ children }) {
  return (
    &lt;html lang="th"&gt;
      &lt;body className={`${notoSansThai.className} flex min-h-screen flex-col bg-slate-50 text-slate-800`}&gt;
        &lt;main className="flex-1"&gt;{children}&lt;/main&gt;
        &lt;Footer /&gt;
      &lt;/body&gt;
    &lt;/html&gt;
  );
}</pre>
                        </div>
                        <p>อธิบายโค้ด:</p>
                        <ul style="margin-left: 20px;">
                            <li><code class="inline-code">Noto_Sans_Thai</code> จาก <code class="inline-code">next/font/google</code> ดาวน์โหลดฟอนต์ภาษาไทยมาเก็บในโปรเจกต์ตอน Build ทำให้ไม่ต้องโหลดจาก Google ทุกครั้งที่เปิดเว็บ (เร็วขึ้นและไม่ส่งข้อมูลผู้ใช้ให้ Google) ส่วน <code class="inline-code">notoSansThai.className</code> คือคลาสที่ใช้ฟอนต์นี้</li>
                            <li><code class="inline-code">lang="th"</code> แก้จากค่าเดิม <code class="inline-code">"en"</code> เพื่อให้ Screen Reader อ่านภาษาไทยได้ถูกต้อง</li>
                            <li><code class="inline-code">metadata</code> สร้างแท็ก <code class="inline-code">&lt;title&gt;</code> และคำอธิบายสำหรับ Google (สังเกตชื่อบนแท็บเบราว์เซอร์เปลี่ยนไป)</li>
                            <li><code class="inline-code">flex min-h-screen flex-col</code> บน body และ <code class="inline-code">flex-1</code> บน main คือเทคนิค <strong>Sticky Footer</strong> ทำให้ <code class="inline-code">&lt;main&gt;</code> ยืดเต็มพื้นที่ที่เหลือ Footer จึงอยู่ล่างสุดของจอเสมอแม้หน้านั้นมีเนื้อหาน้อย</li>
                            <li>เครื่องหมาย <code class="inline-code">`...${...}`</code> คือ Template String ของ JavaScript ใช้รวมคลาสของฟอนต์เข้ากับคลาส Tailwind</li>
                        </ul>
                        <p><strong>ทดลองดูชื่อคลาสของ CSS Modules:</strong> เปิด <code class="inline-code">localhost:3000</code> กด <kbd>F12</kbd> เลือกแท็บ <strong>Elements</strong> แล้วคลิกที่ <code class="inline-code">&lt;footer&gt;</code> จะเห็นคลาสจริงเป็น <code class="inline-code">Footer_footer__0IXn3</code> (ตัวอักษรท้ายของแต่ละคนจะต่างกัน) ไม่ใช่ <code class="inline-code">footer</code> เฉย ๆ ซึ่งยืนยันว่าชื่อคลาสถูกแยกเป็นของ Footer โดยเฉพาะ จากนั้นบันทึกงาน:</p>
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
                            <pre>git add .
git commit -m "feat: add semantic root layout and footer with CSS Modules"
git switch main
git merge feature/layout
git branch -d feature/layout</pre>
                        </div>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 4</div>
                    <div class="step-detail">
                        <strong>สร้างส่วนหัวเว็บไซต์ (Navbar) พร้อม Menu Dropdown และ Sidebar สำหรับมือถือ</strong>
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
                            <pre>git switch -c feature/navbar</pre>
                        </div>
                        <p>เมนูย่อย "บริการ" จะลิงก์ไปยังหน้า <code class="inline-code">/services</code> จึงสร้างหน้านี้ก่อน โดยสร้างโฟลเดอร์ <code class="inline-code">app/services/</code> และไฟล์ <code class="inline-code">page.js</code>:</p>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">app/services/page.js</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>
                                </button>
                            </div>
                            <pre>export const metadata = {
  title: "บริการ | Somchai.dev",
};

const services = [
  { id: "web", icon: "🌐", title: "พัฒนาเว็บไซต์", detail: "สร้างเว็บไซต์ด้วย Next.js ที่รองรับทุกขนาดหน้าจอ" },
  { id: "mobile", icon: "📱", title: "พัฒนาแอปมือถือ", detail: "ออกแบบหน้าจอที่ใช้งานง่ายบนมือถือเป็นอันดับแรก" },
  { id: "design", icon: "✏️", title: "ออกแบบ UI/UX", detail: "จัดวางหน้าจอให้สวยงาม อ่านง่าย และเข้าถึงได้ทุกคน" },
];

export default function Services() {
  return (
    &lt;section className="mx-auto max-w-6xl px-4 py-12"&gt;
      &lt;h1 className="mb-8 text-3xl font-bold"&gt;บริการของฉัน&lt;/h1&gt;
      &lt;div className="grid gap-6 md:grid-cols-3"&gt;
        {services.map((item) =&gt; (
          &lt;article key={item.id} id={item.id} className="scroll-mt-20 rounded-xl bg-white p-6 shadow"&gt;
            &lt;h2 className="mb-2 text-xl font-semibold"&gt;
              {item.icon} {item.title}
            &lt;/h2&gt;
            &lt;p className="text-slate-600"&gt;{item.detail}&lt;/p&gt;
          &lt;/article&gt;
        ))}
      &lt;/div&gt;
    &lt;/section&gt;
  );
}</pre>
                        </div>
                        <p style="font-size:0.9rem; color:#64748b;">💡 <code class="inline-code">id={item.id}</code> ทำให้ลิงก์ <code class="inline-code">/services#web</code> เลื่อนมาที่การ์ดนั้นได้ตรง ส่วน <code class="inline-code">scroll-mt-20</code> เว้นระยะด้านบนไว้ เพื่อไม่ให้การ์ดถูก Navbar ที่ติดอยู่ด้านบนบังเมื่อเลื่อนมาถึง</p>

                        <p>สร้างไฟล์ <code class="inline-code">app/components/Navbar.js</code> เป็น <strong>Client Component</strong> เพราะต้องจำสถานะว่าเมนูเปิดหรือปิดอยู่ด้วย <code class="inline-code">useState</code>:</p>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">app/components/Navbar.js</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>
                                </button>
                            </div>
                            <pre>"use client";

import { useState } from "react";
import Link from "next/link";

const services = [
  { href: "/services#web", label: "พัฒนาเว็บไซต์" },
  { href: "/services#mobile", label: "พัฒนาแอปมือถือ" },
  { href: "/services#design", label: "ออกแบบ UI/UX" },
];

export default function Navbar() {
  const [sidebarOpen, setSidebarOpen] = useState(false);
  const [dropdownOpen, setDropdownOpen] = useState(false);

  const closeMenus = () =&gt; {
    setSidebarOpen(false);
    setDropdownOpen(false);
  };

  return (
    &lt;header className="sticky top-0 z-40 bg-slate-900 text-white shadow"&gt;
      &lt;nav aria-label="เมนูหลัก" className="mx-auto flex h-16 max-w-6xl items-center justify-between px-4"&gt;
        &lt;Link href="/" onClick={closeMenus} className="text-lg font-bold"&gt;
          Somchai&lt;span className="text-blue-400"&gt;.dev&lt;/span&gt;
        &lt;/Link&gt;

        {/* เมนูจอใหญ่: ซ่อนบนมือถือ (hidden) และแสดงตั้งแต่ md ขึ้นไป (md:flex) */}
        &lt;ul className="hidden items-center gap-6 md:flex"&gt;
          &lt;li&gt;
            &lt;Link href="/" className="hover:text-blue-300"&gt;หน้าแรก&lt;/Link&gt;
          &lt;/li&gt;
          &lt;li&gt;
            &lt;Link href="/about" className="hover:text-blue-300"&gt;เกี่ยวกับฉัน&lt;/Link&gt;
          &lt;/li&gt;
          &lt;li className="relative"&gt;
            &lt;button
              type="button"
              onClick={() =&gt; setDropdownOpen(!dropdownOpen)}
              aria-expanded={dropdownOpen}
              aria-controls="services-menu"
              className="flex items-center gap-1 hover:text-blue-300"
            &gt;
              บริการ
              &lt;span className={`transition-transform ${dropdownOpen ? "rotate-180" : ""}`}&gt;▾&lt;/span&gt;
            &lt;/button&gt;
            {dropdownOpen &amp;&amp; (
              &lt;ul id="services-menu" className="absolute right-0 mt-3 w-48 rounded-lg bg-white py-2 text-slate-800 shadow-lg"&gt;
                {services.map((item) =&gt; (
                  &lt;li key={item.href}&gt;
                    &lt;Link href={item.href} onClick={closeMenus} className="block px-4 py-2 hover:bg-slate-100"&gt;
                      {item.label}
                    &lt;/Link&gt;
                  &lt;/li&gt;
                ))}
              &lt;/ul&gt;
            )}
          &lt;/li&gt;
          &lt;li&gt;
            &lt;Link href="/contact" className="rounded-lg bg-brand px-4 py-2 font-semibold hover:bg-brand-dark"&gt;
              ติดต่อฉัน
            &lt;/Link&gt;
          &lt;/li&gt;
        &lt;/ul&gt;

        {/* ปุ่มแฮมเบอร์เกอร์: แสดงเฉพาะจอเล็ก (md:hidden) */}
        &lt;button
          type="button"
          onClick={() =&gt; setSidebarOpen(true)}
          aria-label="เปิดเมนู"
          aria-expanded={sidebarOpen}
          aria-controls="mobile-sidebar"
          className="rounded p-2 text-2xl md:hidden"
        &gt;
          ☰
        &lt;/button&gt;
      &lt;/nav&gt;

      {/* ฉากหลังสีดำโปร่งแสง: คลิกเพื่อปิด Sidebar */}
      {sidebarOpen &amp;&amp; (
        &lt;div onClick={closeMenus} aria-hidden="true" className="fixed inset-0 z-40 bg-black/50 md:hidden" /&gt;
      )}

      {/* Sidebar มือถือ: เลื่อนเข้ามาจากซ้ายเมื่อ sidebarOpen เป็น true */}
      &lt;nav
        id="mobile-sidebar"
        aria-label="เมนูสำหรับมือถือ"
        inert={!sidebarOpen}
        className={`fixed inset-y-0 left-0 z-50 w-72 bg-slate-900 p-6 transition-transform duration-300 md:hidden ${
          sidebarOpen ? "translate-x-0" : "-translate-x-full"
        }`}
      &gt;
        &lt;div className="mb-8 flex items-center justify-between"&gt;
          &lt;span className="text-lg font-bold"&gt;เมนู&lt;/span&gt;
          &lt;button type="button" onClick={closeMenus} aria-label="ปิดเมนู" className="text-2xl"&gt;
            ✕
          &lt;/button&gt;
        &lt;/div&gt;
        &lt;ul className="space-y-2"&gt;
          &lt;li&gt;
            &lt;Link href="/" onClick={closeMenus} className="block rounded px-3 py-2 hover:bg-slate-800"&gt;หน้าแรก&lt;/Link&gt;
          &lt;/li&gt;
          &lt;li&gt;
            &lt;Link href="/about" onClick={closeMenus} className="block rounded px-3 py-2 hover:bg-slate-800"&gt;เกี่ยวกับฉัน&lt;/Link&gt;
          &lt;/li&gt;
          &lt;li&gt;
            &lt;button
              type="button"
              onClick={() =&gt; setDropdownOpen(!dropdownOpen)}
              aria-expanded={dropdownOpen}
              className="flex w-full items-center justify-between rounded px-3 py-2 hover:bg-slate-800"
            &gt;
              บริการ
              &lt;span className={`transition-transform ${dropdownOpen ? "rotate-180" : ""}`}&gt;▾&lt;/span&gt;
            &lt;/button&gt;
            {dropdownOpen &amp;&amp; (
              &lt;ul className="ml-4 mt-1 space-y-1 border-l border-slate-700 pl-3"&gt;
                {services.map((item) =&gt; (
                  &lt;li key={item.href}&gt;
                    &lt;Link href={item.href} onClick={closeMenus} className="block rounded px-3 py-2 text-slate-300 hover:bg-slate-800"&gt;
                      {item.label}
                    &lt;/Link&gt;
                  &lt;/li&gt;
                ))}
              &lt;/ul&gt;
            )}
          &lt;/li&gt;
          &lt;li&gt;
            &lt;Link href="/contact" onClick={closeMenus} className="block rounded px-3 py-2 hover:bg-slate-800"&gt;ติดต่อฉัน&lt;/Link&gt;
          &lt;/li&gt;
        &lt;/ul&gt;
      &lt;/nav&gt;
    &lt;/header&gt;
  );
}</pre>
                        </div>
                        <p><strong>อธิบายโค้ดทีละส่วน</strong></p>
                        <table class="grading-table" style="margin: 10px 0;">
                            <tr style="background:#f1f5f9;">
                                <th width="30%">ส่วนของโค้ด</th>
                                <th>การทำงาน</th>
                            </tr>
                            <tr><td><code class="inline-code">useState(false)</code> สองตัว</td><td><code class="inline-code">sidebarOpen</code> จำว่า Sidebar เปิดอยู่หรือไม่ และ <code class="inline-code">dropdownOpen</code> จำว่าเมนูย่อยเปิดอยู่หรือไม่ เมื่อค่าเปลี่ยน React จะวาดส่วนที่เกี่ยวข้องใหม่เอง (State จะเรียนละเอียดในหน่วยที่ 5)</td></tr>
                            <tr><td><code class="inline-code">closeMenus</code></td><td>ฟังก์ชันปิดทุกเมนู เรียกใช้เมื่อคลิกลิงก์หรือฉากหลัง เพื่อไม่ให้เมนูค้างเปิดอยู่หลังเปลี่ยนหน้า</td></tr>
                            <tr><td><code class="inline-code">sticky top-0 z-40</code></td><td>Navbar ติดอยู่ด้านบนเมื่อเลื่อนหน้า และ <code class="inline-code">z-40</code> ทำให้อยู่ชั้นบนเนื้อหาอื่น</td></tr>
                            <tr><td><code class="inline-code">flex ... justify-between</code></td><td>ใช้ Flexbox ดันโลโก้ไปชิดซ้ายและเมนูไปชิดขวา</td></tr>
                            <tr><td><code class="inline-code">hidden md:flex</code> และ <code class="inline-code">md:hidden</code></td><td>หัวใจของ Responsive Navbar: เมนูแนวนอนซ่อนบนมือถือแต่แสดงตั้งแต่ 768px ขณะที่ปุ่ม ☰ แสดงบนมือถือแต่ซ่อนตั้งแต่ 768px</td></tr>
                            <tr><td><code class="inline-code">{dropdownOpen &amp;&amp; (...)}</code></td><td><strong>Conditional Rendering</strong>: แสดงรายการเมนูย่อยเฉพาะเมื่อ <code class="inline-code">dropdownOpen</code> เป็น <code class="inline-code">true</code> (ถ้าเป็น false จะไม่สร้างแท็กนั้นเลย)</td></tr>
                            <tr><td><code class="inline-code">relative</code> + <code class="inline-code">absolute right-0 mt-3</code></td><td>ทำให้เมนูย่อย "ลอย" อยู่ใต้ปุ่มบริการ โดยไม่ดันเนื้อหาอื่นให้เลื่อนลง</td></tr>
                            <tr><td><code class="inline-code">fixed inset-0 bg-black/50</code></td><td>ฉากหลังสีดำโปร่งแสง 50% ปิดทับทั้งจอ ช่วยให้ผู้ใช้โฟกัสที่ Sidebar และแตะเพื่อปิดได้</td></tr>
                            <tr><td><code class="inline-code">-translate-x-full</code> ↔ <code class="inline-code">translate-x-0</code></td><td>Sidebar อยู่ตลอดเวลา แต่ถูก "เลื่อนออกไปทางซ้ายเท่ากับความกว้างของตัวเอง" จนพ้นจอ เมื่อเปิดจะเลื่อนกลับมาที่ตำแหน่ง 0 โดย <code class="inline-code">transition-transform duration-300</code> ทำให้การเลื่อนนุ่มนวลใน 0.3 วินาที</td></tr>
                            <tr><td><code class="inline-code">inert={!sidebarOpen}</code></td><td>ขณะ Sidebar ซ่อนอยู่ ป้องกันไม่ให้ผู้ใช้แป้นพิมพ์กด Tab เข้าไปที่ลิงก์ซึ่งมองไม่เห็น</td></tr>
                            <tr><td><code class="inline-code">aria-label</code>, <code class="inline-code">aria-expanded</code>, <code class="inline-code">aria-controls</code></td><td>บอก Screen Reader ว่าปุ่มทำอะไร และเมนูกำลังเปิดหรือปิด (เรื่องที่ 2.1)</td></tr>
                        </table>
                        <p>สุดท้ายนำ Navbar ไปใส่ใน <code class="inline-code">app/layout.js</code> โดย <strong>เพิ่ม 2 บรรทัด</strong> คือบรรทัด import และบรรทัด <code class="inline-code">&lt;Navbar /&gt;</code> ไว้ก่อน <code class="inline-code">&lt;main&gt;</code>:</p>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">app/layout.js (เฉพาะส่วนที่เพิ่ม)</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>
                                </button>
                            </div>
                            <pre>import Navbar from "./components/Navbar";   // ← เพิ่มบรรทัดนี้ใต้ import อื่น ๆ

// ...

      &lt;body className={...}&gt;
        &lt;Navbar /&gt;                              {/* ← เพิ่มบรรทัดนี้ */}
        &lt;main className="flex-1"&gt;{children}&lt;/main&gt;
        &lt;Footer /&gt;
      &lt;/body&gt;</pre>
                        </div>
                        <p>ทดสอบบนจอใหญ่: คลิก "บริการ" จะมีเมนูย่อยลอยลงมาดังรูปที่ 2.9 และเมื่อคลิกรายการใดจะไปยังการ์ดนั้นในหน้า <code class="inline-code">/services</code></p>
                        <div class="image-container">
                            <div>
                                <figure class="custom-image-box" style="max-width: 860px;">
                                    <img src="img/unit2-desktop-dropdown.png" alt="ภาพหน้าจอ Navbar บนคอมพิวเตอร์ขณะเปิดเมนูย่อยบริการ แสดงรายการพัฒนาเว็บไซต์ พัฒนาแอปมือถือ และออกแบบ UI/UX" class="responsive-img">
                                    <figcaption class="image-caption">
                                        <strong>รูปที่ 2.9:</strong> Menu Dropdown บน Desktop เมื่อคลิกปุ่ม "บริการ"
                                        <span class="image-source">🔗 แหล่งอ้างอิงภาพ: ภาพหน้าจอจากการรันโค้ดตัวอย่างจริง</span>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                        <p>ทดสอบบนมือถือ: กด <kbd>F12</kbd> แล้ว <kbd>Ctrl</kbd>+<kbd>Shift</kbd>+<kbd>M</kbd> เลือกอุปกรณ์ เช่น iPhone 12 Pro เมนูแนวนอนจะหายไปและมีปุ่ม ☰ แทน กดปุ่มแล้ว Sidebar จะเลื่อนเข้ามาจากด้านซ้ายดังรูปที่ 2.10 ลองกด "บริการ" ใน Sidebar เพื่อเปิดเมนูย่อย และแตะที่ฉากหลังสีดำเพื่อปิด</p>
                        <div class="image-container">
                            <div>
                                <figure class="custom-image-box" style="max-width: 300px;">
                                    <img src="img/unit2-mobile-sidebar.png" alt="ภาพหน้าจอมือถือขณะเปิด Sidebar ด้านซ้าย มีเมนูหน้าแรก เกี่ยวกับฉัน บริการพร้อมเมนูย่อย และติดต่อฉัน" class="responsive-img">
                                    <figcaption class="image-caption">
                                        <strong>รูปที่ 2.10:</strong> Sidebar บนมือถือขณะเปิดเมนูย่อย "บริการ"
                                        <span class="image-source">🔗 แหล่งอ้างอิงภาพ: ภาพหน้าจอจากการรันโค้ดตัวอย่างจริง</span>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
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
                            <pre>git add .
git commit -m "feat: add responsive navbar with dropdown and mobile sidebar"
git switch main
git merge feature/navbar
git branch -d feature/navbar</pre>
                        </div>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 5</div>
                    <div class="step-detail">
                        <strong>ออกแบบ Hero Section และส่วนแสดงจุดเด่นแบบ Responsive</strong>
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
                            <pre>git switch -c feature/hero</pre>
                        </div>
                        <p><strong>Hero Section</strong> คือส่วนแรกที่ผู้ใช้เห็นเมื่อเข้าเว็บไซต์ ประกอบด้วยหัวเรื่องหลัก (h1) คำอธิบายสั้น ๆ และปุ่มชวนให้ทำต่อ (Call to Action) เปิดไฟล์ <code class="inline-code">app/page.js</code> ลบโค้ดเดิมทั้งหมด (ไฟล์ <code class="inline-code">Counter.js</code> จากหน่วยที่ 1 เก็บไว้ได้ แม้ไม่ได้ใช้แล้ว) แล้วแทนที่ด้วย:</p>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">app/page.js</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>
                                </button>
                            </div>
                            <pre>import Link from "next/link";

const features = [
  { icon: "🎨", title: "ออกแบบ Responsive", detail: "หน้าเว็บแสดงผลสวยงามทั้งบนมือถือ แท็บเล็ต และคอมพิวเตอร์" },
  { icon: "⚡", title: "รวดเร็วด้วย Next.js", detail: "สร้างหน้าเว็บที่เซิร์ฟเวอร์ โหลดเร็ว และค้นหาเจอบน Google" },
  { icon: "🐳", title: "พัฒนาด้วย Docker", detail: "สภาพแวดล้อมเหมือนกันทุกเครื่อง พร้อมจัดการเวอร์ชันด้วย Git" },
];

export default function Home() {
  return (
    &lt;&gt;
      {/* Hero Section: 1 คอลัมน์บนมือถือ → 2 คอลัมน์ตั้งแต่ md */}
      &lt;section className="bg-linear-to-b from-blue-50 to-slate-50"&gt;
        &lt;div className="mx-auto grid max-w-6xl items-center gap-10 px-4 py-16 md:grid-cols-2 md:py-24"&gt;
          &lt;div className="text-center md:text-left"&gt;
            &lt;p className="mb-3 font-semibold text-brand"&gt;สวัสดีครับ 👋 ผมชื่อ&lt;/p&gt;
            &lt;h1 className="mb-4 text-4xl font-bold leading-tight text-slate-900 md:text-5xl"&gt;
              สมชาย ใจดี
              &lt;br /&gt;
              &lt;span className="text-brand"&gt;Front-End Developer&lt;/span&gt;
            &lt;/h1&gt;
            &lt;p className="mb-8 text-lg text-slate-600"&gt;
              นักศึกษา ปวส. สาขาเทคโนโลยีสารสนเทศ ที่หลงใหลการสร้างเว็บไซต์ที่สวยงามและใช้งานง่าย
            &lt;/p&gt;
            &lt;div className="flex flex-col gap-3 sm:flex-row sm:justify-center md:justify-start"&gt;
              &lt;Link href="/services" className="rounded-lg bg-brand px-6 py-3 font-semibold text-white hover:bg-brand-dark"&gt;
                ดูบริการของฉัน
              &lt;/Link&gt;
              &lt;Link href="/contact" className="rounded-lg border border-slate-300 px-6 py-3 font-semibold hover:bg-white"&gt;
                ติดต่อฉัน
              &lt;/Link&gt;
            &lt;/div&gt;
          &lt;/div&gt;

          {/* ภาพจำลองหน้าจอเว็บไซต์ สร้างจาก div + Tailwind ล้วน ไม่ต้องใช้ไฟล์รูป */}
          &lt;div aria-hidden="true" className="mx-auto w-full max-w-md rounded-2xl bg-white p-5 shadow-xl"&gt;
            &lt;div className="mb-4 flex gap-2"&gt;
              &lt;span className="h-3 w-3 rounded-full bg-red-400" /&gt;
              &lt;span className="h-3 w-3 rounded-full bg-yellow-400" /&gt;
              &lt;span className="h-3 w-3 rounded-full bg-green-400" /&gt;
            &lt;/div&gt;
            &lt;div className="mb-3 h-6 w-2/3 rounded bg-blue-200" /&gt;
            &lt;div className="mb-2 h-3 rounded bg-slate-200" /&gt;
            &lt;div className="mb-6 h-3 w-5/6 rounded bg-slate-200" /&gt;
            &lt;div className="grid grid-cols-3 gap-3"&gt;
              &lt;div className="h-16 rounded-lg bg-blue-100" /&gt;
              &lt;div className="h-16 rounded-lg bg-green-100" /&gt;
              &lt;div className="h-16 rounded-lg bg-yellow-100" /&gt;
            &lt;/div&gt;
          &lt;/div&gt;
        &lt;/div&gt;
      &lt;/section&gt;

      {/* Features: 1 คอลัมน์บนมือถือ → 2 ตั้งแต่ sm → 3 ตั้งแต่ lg */}
      &lt;section aria-labelledby="features-title" className="mx-auto max-w-6xl px-4 py-16"&gt;
        &lt;h2 id="features-title" className="mb-10 text-center text-3xl font-bold"&gt;
          สิ่งที่ผมกำลังเรียนรู้
        &lt;/h2&gt;
        &lt;div className="grid gap-6 sm:grid-cols-2 lg:grid-cols-3"&gt;
          {features.map((item) =&gt; (
            &lt;article key={item.title} className="rounded-xl bg-white p-6 shadow transition hover:-translate-y-1 hover:shadow-lg"&gt;
              &lt;div className="mb-3 text-3xl"&gt;{item.icon}&lt;/div&gt;
              &lt;h3 className="mb-2 text-xl font-semibold"&gt;{item.title}&lt;/h3&gt;
              &lt;p className="text-slate-600"&gt;{item.detail}&lt;/p&gt;
            &lt;/article&gt;
          ))}
        &lt;/div&gt;
      &lt;/section&gt;
    &lt;/&gt;
  );
}</pre>
                        </div>
                        <p><strong>อธิบายคลาสที่ทำให้เป็น Responsive</strong> (อ่านแบบ Mobile-First คือ "ค่าเริ่มต้นเป็นแบบมือถือ แล้วเปลี่ยนเมื่อจอกว้างขึ้น"):</p>
                        <table class="grading-table" style="margin: 10px 0;">
                            <tr style="background:#f1f5f9;">
                                <th width="34%">คลาส</th>
                                <th>บนมือถือ</th>
                                <th>เมื่อจอกว้างขึ้น</th>
                            </tr>
                            <tr><td><code class="inline-code">grid md:grid-cols-2</code></td><td>ข้อความและภาพจำลองเรียงบนลงล่าง</td><td>ตั้งแต่ 768px แบ่งเป็นซ้าย-ขวา</td></tr>
                            <tr><td><code class="inline-code">text-center md:text-left</code></td><td>ข้อความกึ่งกลาง (ดูสมดุลบนจอแคบ)</td><td>ตั้งแต่ 768px ชิดซ้าย</td></tr>
                            <tr><td><code class="inline-code">text-4xl md:text-5xl</code></td><td>หัวเรื่อง 2.25rem</td><td>ตั้งแต่ 768px ใหญ่ขึ้นเป็น 3rem</td></tr>
                            <tr><td><code class="inline-code">py-16 md:py-24</code></td><td>ระยะห่างบน-ล่าง 4rem</td><td>ตั้งแต่ 768px เพิ่มเป็น 6rem ให้ดูโปร่ง</td></tr>
                            <tr><td><code class="inline-code">flex flex-col sm:flex-row</code></td><td>ปุ่มเรียงซ้อนและกว้างเต็มจอ กดง่าย</td><td>ตั้งแต่ 640px ปุ่มเรียงข้างกัน</td></tr>
                            <tr><td><code class="inline-code">sm:justify-center md:justify-start</code></td><td>—</td><td>640–767px ปุ่มอยู่กึ่งกลาง และตั้งแต่ 768px ชิดซ้ายตามข้อความ</td></tr>
                            <tr><td><code class="inline-code">grid sm:grid-cols-2 lg:grid-cols-3</code></td><td>การ์ด 1 คอลัมน์</td><td>2 คอลัมน์ตั้งแต่ 640px และ 3 คอลัมน์ตั้งแต่ 1024px</td></tr>
                            <tr><td><code class="inline-code">mx-auto max-w-6xl px-4</code></td><td>เว้นขอบซ้าย-ขวา 1rem ไม่ให้ชิดขอบจอ</td><td>จำกัดความกว้างสูงสุด 72rem และจัดกึ่งกลาง ไม่ให้บรรทัดยาวเกินบนจอใหญ่</td></tr>
                        </table>
                        <ul style="margin-left: 20px;">
                            <li><code class="inline-code">&lt;&gt;...&lt;/&gt;</code> เรียกว่า <strong>Fragment</strong> ใช้ครอบหลายแท็กโดยไม่สร้างแท็กเกินในหน้าเว็บ (คอมโพเนนต์ต้องคืนค่าเป็นแท็กเดียว)</li>
                            <li><code class="inline-code">aria-labelledby="features-title"</code> บอก Screen Reader ว่าชื่อของ section นี้คือข้อความใน h2 ที่มี <code class="inline-code">id="features-title"</code></li>
                            <li><code class="inline-code">aria-hidden="true"</code> ที่ภาพจำลอง บอก Screen Reader ให้ข้ามไป เพราะเป็นเพียงภาพตกแต่งที่ไม่มีข้อมูล</li>
                            <li><code class="inline-code">hover:-translate-y-1 hover:shadow-lg</code> ทำให้การ์ดลอยขึ้นเล็กน้อยเมื่อเมาส์ชี้ (มีผลเฉพาะอุปกรณ์ที่มีเมาส์ จึงเป็นเพียงลูกเล่นเสริม)</li>
                        </ul>
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
                            <pre>git add .
git commit -m "feat: add responsive hero and features section"
git switch main
git merge feature/hero
git branch -d feature/hero</pre>
                        </div>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 6</div>
                    <div class="step-detail">
                        <strong>ทดสอบการแสดงผลบนหน้าจอ Mobile และ Desktop (DevTools และมือถือจริง)</strong>
                        <p><strong>6.1 ทดสอบด้วย DevTools:</strong> กด <kbd>F12</kbd> แล้ว <kbd>Ctrl</kbd>+<kbd>Shift</kbd>+<kbd>M</kbd> ด้านบนจะมีแถบเลือกอุปกรณ์และช่องกำหนดความกว้าง ให้ทดสอบตามตารางต่อไปนี้ (ลากขอบหน้าจอจำลองเพื่อดูจังหวะที่ Layout เปลี่ยนได้ด้วย):</p>
                        <table class="grading-table" style="margin: 10px 0;">
                            <tr style="background:#f1f5f9;">
                                <th width="22%">ความกว้าง</th>
                                <th>สิ่งที่ต้องเห็น</th>
                            </tr>
                            <tr><td><strong>375px</strong> (มือถือ)</td><td>มีปุ่ม ☰ ไม่มีเมนูแนวนอน, Hero เรียงบนลงล่างจัดกึ่งกลาง, ปุ่มกว้างเต็มจอ, การ์ด 1 คอลัมน์, <strong>ไม่มีแถบเลื่อนแนวนอน</strong>, Sidebar เปิด-ปิดได้</td></tr>
                            <tr><td><strong>640px</strong></td><td>ปุ่มใน Hero เปลี่ยนเป็นเรียงข้างกัน, การ์ด 2 คอลัมน์</td></tr>
                            <tr><td><strong>768px</strong> (แท็บเล็ต)</td><td>ปุ่ม ☰ หายไป เมนูแนวนอนปรากฏ, Hero แบ่ง 2 คอลัมน์ ดังรูปที่ 2.11</td></tr>
                            <tr><td><strong>1280px</strong> (คอมพิวเตอร์)</td><td>การ์ด 3 คอลัมน์, เนื้อหาอยู่กึ่งกลางไม่กว้างเกิน, Dropdown ทำงาน ดังรูปที่ 2.6</td></tr>
                        </table>
                        <div class="image-container">
                            <div>
                                <figure class="custom-image-box" style="max-width: 420px;">
                                    <img src="img/unit2-result-tablet.png" alt="ภาพหน้าจอเว็บไซต์ที่ความกว้าง 768 พิกเซล เมนูแนวนอนแสดงแล้ว Hero แบ่ง 2 คอลัมน์ และการ์ด 2 คอลัมน์" class="responsive-img">
                                    <figcaption class="image-caption">
                                        <strong>รูปที่ 2.11:</strong> ที่ความกว้าง 768px (md) — เมนูแนวนอนปรากฏ Hero 2 คอลัมน์ และการ์ด 2 คอลัมน์
                                        <span class="image-source">🔗 แหล่งอ้างอิงภาพ: ภาพหน้าจอจากการรันโค้ดตัวอย่างจริง</span>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                        <p><strong>6.2 ทดสอบบนมือถือจริงผ่าน Wi-Fi:</strong> ให้คอมพิวเตอร์และมือถือเชื่อมต่อ Wi-Fi เดียวกัน แล้วหาหมายเลข IP ของคอมพิวเตอร์ด้วยคำสั่งต่อไปนี้ ดูบรรทัด <strong>IPv4 Address</strong> ของการ์ด Wi-Fi (เช่น <code class="inline-code">192.168.1.45</code>):</p>
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
                            <pre>ipconfig</pre>
                        </div>
                        <p>Next.js ในโหมดพัฒนาจะ <strong>บล็อกไฟล์ JavaScript</strong> ที่ถูกเรียกผ่านชื่อเครื่องอื่นที่ไม่ใช่ <code class="inline-code">localhost</code> เพื่อความปลอดภัย ถ้าเปิดจากมือถือทันที หน้าเว็บจะแสดงผลได้แต่ <strong>ปุ่ม ☰ และ Dropdown จะกดไม่ติด</strong> และใน Log จะขึ้นข้อความ <code class="inline-code">Blocked cross-origin request to Next.js dev resource</code> จึงต้องเพิ่ม IP ของคอมพิวเตอร์ลงในไฟล์ <code class="inline-code">next.config.mjs</code> (เพิ่มเฉพาะบรรทัด <code class="inline-code">allowedDevOrigins</code> โดยใช้ IP ของเครื่องตนเอง บรรทัดอื่นให้คงไว้ตามเดิม):</p>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">next.config.mjs</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>
                                </button>
                            </div>
                            <pre>/** @type {import('next').NextConfig} */
const nextConfig = {
  /* config options here */
  cacheComponents: true,
  partialPrefetching: true,
  allowedDevOrigins: ["192.168.1.45"],
};

export default nextConfig;</pre>
                        </div>
                        <p>รีสตาร์ต Container (ไฟล์ตั้งค่าถูกอ่านตอนเริ่มทำงานเท่านั้น) แล้วเปิดเบราว์เซอร์บนมือถือไปที่ <code class="inline-code">http://192.168.1.45:3000</code> (ใช้ IP ของเครื่องตนเอง):</p>
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
                            <pre>docker compose restart</pre>
                        </div>
                        <p>ลองใช้นิ้วเปิด-ปิด Sidebar และกดปุ่มต่าง ๆ บนมือถือจริง แล้วสังเกตว่าแตะง่ายหรือไม่ ตัวอักษรอ่านสบายหรือไม่ จากนั้นบันทึกงาน:</p>
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
                            <pre>git add next.config.mjs
git commit -m "chore: allow testing dev server from phone on local network"</pre>
                        </div>

                        <div class="error-alert-box">
                            <span class="error-title">⚠️ ปัญหาที่พบบ่อยระหว่างทดสอบ</span>
                            <ul style="margin: 10px 0 0 20px;">
                                <li><strong>มือถือเปิดเว็บไม่ได้เลย</strong> — ตรวจว่าใช้ Wi-Fi เดียวกัน และพิมพ์ <code>http://</code> (ไม่ใช่ https) พร้อม <code>:3000</code> ถ้ายังไม่ได้ Windows Firewall อาจบล็อกการเชื่อมต่อ ให้อนุญาต Docker Desktop บนเครือข่ายแบบ Private (Wi-Fi ของวิทยาลัยบางแห่งกั้นไม่ให้อุปกรณ์มองเห็นกัน ให้ใช้ Hotspot จากมือถือแทน)</li>
                                <li><strong>เปิดได้ แต่ปุ่ม ☰ และ Dropdown กดไม่ติด</strong> — ยังไม่ได้เพิ่ม <code>allowedDevOrigins</code> หรือยังไม่ได้ <code>docker compose restart</code> ตรวจด้วย <code>docker compose logs -f app</code> ว่ายังมีข้อความ <code>Blocked cross-origin request</code> หรือไม่</li>
                                <li><strong>มุมจอมีป้ายสีแดง "1 Issue" และเป็นเรื่อง Hydration mismatch ที่มีคุณสมบัติแปลก ๆ เช่น <code>cz-shortcut-listen</code> หรือ <code>data-gr-ext-installed</code></strong> — เกิดจากส่วนขยายของเบราว์เซอร์ (เช่น ColorZilla, Grammarly) ไปแก้ HTML ก่อน React ทำงาน ไม่ใช่ความผิดของโค้ด ให้ทดสอบในหน้าต่าง InPrivate/Incognito ที่ปิดส่วนขยายไว้</li>
                                <li><strong>มีแถบเลื่อนแนวนอนบนมือถือ</strong> — มีบางองค์ประกอบกว้างเกินจอ มักมาจากการกำหนดความกว้างตายตัว เช่น <code>w-[500px]</code> ให้เปลี่ยนเป็น <code>w-full max-w-md</code></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 7</div>
                    <div class="step-detail">
                        <strong>ตรวจคุณภาพโค้ด ตรวจประวัติ Git และส่งงานขึ้น GitHub</strong>
                        <p>ตรวจโค้ดด้วย ESLint ภายใน Container (ถ้าไม่มีข้อความแจ้งเตือนแสดงว่าผ่าน):</p>
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
                            <pre>docker compose exec app npm run lint</pre>
                        </div>
                        <p>ตรวจว่าเว็บไซต์ Build สำหรับใช้งานจริงได้ (วิธีเดียวกับหน่วยที่ 1 ขั้นตอนที่ 6) เพราะลำดับของ CSS ในโหมด Production อาจต่างจากโหมดพัฒนา:</p>
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
                            <pre>docker compose down
docker compose run --rm --service-ports app sh -c "npm install &amp;&amp; npm run build &amp;&amp; npm run start"</pre>
                        </div>
                        <p>ผลการ Build ต้องแสดงหน้า <code class="inline-code">/services</code> เพิ่มขึ้นมาในตาราง Route เปิด <code class="inline-code">localhost:3000</code> ตรวจความเรียบร้อยอีกครั้ง แล้วกด <kbd>Ctrl</kbd>+<kbd>C</kbd> และกลับสู่โหมดพัฒนาด้วย <code class="inline-code">docker compose up -d</code></p>
                        <p>ดูประวัติ Git และส่งงานขึ้น GitHub:</p>
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
                            <pre>git log --oneline
git push</pre>
                        </div>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">ผลลัพธ์ที่คาดว่าจะเห็น (รหัส Commit ของแต่ละคนต่างกัน)</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>
                                </button>
                            </div>
                            <pre>c41e8a2 chore: allow testing dev server from phone on local network
9b07d13 feat: add responsive hero and features section
5e2fa60 feat: add responsive navbar with dropdown and mobile sidebar
18cd4b7 feat: add semantic root layout and footer with CSS Modules
a7f3c91 chore: install and configure Tailwind CSS
a9ed376 Merge feature/new-title and resolve title conflict
...</pre>
                        </div>
                        <p style="font-size:0.9rem; color:#64748b;">💡 สังเกตว่าการ Merge ในหน่วยนี้เป็นแบบ <strong>Fast-forward</strong> ทั้งหมด (ไม่มี Merge Commit เกิดขึ้น) เพราะระหว่างที่แยกไปทำแต่ละ Branch ไม่มีใครเพิ่ม Commit ใหม่บน <code class="inline-code">main</code> ตามที่เรียนในหน่วยที่ 1 ประวัติจึงเรียงเป็นเส้นตรงและอ่านง่าย</p>
                    </div>
                </div>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="assignment-box">
                <h3>📝 5. งานที่มอบหมายและเกณฑ์การประเมินผล (Assignment)</h3>
                <p><strong>ใบงานที่ 2: เว็บไซต์ Portfolio ส่วนตัวแบบ Responsive ด้วย Semantic HTML5 และ Tailwind CSS</strong></p>
                <br>
                <p><strong>คำสั่ง:</strong></p>
                <ul style="margin-left: 20px;">
                    <li>ทำตามปฏิบัติการขั้นตอนที่ 1–7 ในโปรเจกต์และ Repository เดิมจากหน่วยที่ 1 แล้วเปลี่ยนข้อมูลทั้งหมดเป็นของนักศึกษาเอง (ชื่อ คำแนะนำตัว บริการ/ความสนใจ)</li>
                    <li>เปลี่ยนสีประจำเว็บไซต์ใน <code class="inline-code">@theme</code> ให้เป็นสีที่ตนเองเลือก และเพิ่มจุดเด่นในส่วน Features ให้มีอย่างน้อย 4 การ์ด</li>
                    <li>ตกแต่งหน้า <code class="inline-code">/about</code> และ <code class="inline-code">/contact</code> จากหน่วยที่ 1 ใหม่ด้วย Tailwind CSS (ลบ <code class="inline-code">style={{...}}</code> เดิมออก) โดยใช้แท็ก Semantic ที่เหมาะสม เช่น <code class="inline-code">&lt;section&gt;</code>, <code class="inline-code">&lt;article&gt;</code>, <code class="inline-code">&lt;address&gt;</code> และมี <code class="inline-code">export const metadata</code> ของแต่ละหน้า</li>
                    <li>ทุกงานต้องทำบน Branch แยกและ Merge กลับ <code class="inline-code">main</code> (อย่างน้อย 5 Branch ในหน่วยนี้) แล้ว Push ขึ้น GitHub</li>
                    <li>ส่งลิงก์ GitHub Repository พร้อมภาพหน้าจอ 4 ภาพ: (1) Desktop 1280px (2) Mobile 375px (3) Sidebar บนมือถือที่เปิดอยู่ (4) ผลลัพธ์คำสั่ง <code class="inline-code">git log --oneline</code></li>
                </ul>

                <br>
                <p><strong>📊 เกณฑ์การตัดคะแนน (คะแนนเต็ม 5 คะแนน):</strong></p>
                <ul style="margin-left: 20px; font-size: 0.9rem; color: #78350f;">
                    <li>• ติดตั้งและตั้งค่า Tailwind CSS ผ่าน Docker ได้ถูกต้อง และปรับสีประจำเว็บด้วย <code>@theme</code> (1 คะแนน)</li>
                    <li>• ใช้ Semantic HTML5 ถูกต้องตามความหมาย (h1 หน้าละ 1 ครั้ง, main 1 ครั้ง, ปุ่มกับลิงก์ใช้แท็กถูกต้อง, มี lang="th" และ aria-label ที่ปุ่มไอคอน) (1 คะแนน)</li>
                    <li>• Navbar มี Dropdown บน Desktop และ Sidebar บน Mobile ที่เปิด-ปิดได้จริง (1 คะแนน)</li>
                    <li>• หน้าเว็บแสดงผลเหมาะสมทั้ง Mobile และ Desktop ไม่มีแถบเลื่อนแนวนอน และหน้า about/contact ตกแต่งด้วย Tailwind (1 คะแนน)</li>
                    <li>• ใช้ Git แยก Branch ตามงาน มี Commit ที่สื่อความหมาย และ Push ขึ้น GitHub พร้อมภาพหน้าจอครบ (1 คะแนน)</li>
                </ul>
            </section>

        </div>
    </div>

    <script src="../assets/js/script.js?v=<?php echo filemtime(__DIR__ . "/../assets/js/script.js"); ?>"></script>
    <script src="../assets/js/lightbox.js?v=<?php echo filemtime(__DIR__ . "/../assets/js/lightbox.js"); ?>"></script>
</body>

</html>
