<?php
$base_dir = "../"; // ถอยกลับ 1 ชั้นเพื่อไปหาโฟลเดอร์หลัก
$active_nav = "frontend"; // เปิดสถานะเมนูที่วิชา Front-End
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน่วยที่ 1: สถาปัตยกรรม Front-End ยุคใหม่ด้วย Next.js และการควบคุมเวอร์ชันด้วย Git</title>
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
            <h2>หน่วยที่ 1: สถาปัตยกรรม Front-End ยุคใหม่ด้วย Next.js และการควบคุมเวอร์ชันด้วย Git</h2>
            <p>สัปดาห์ที่ 1 | เวลาเรียน 5 ชั่วโมง (ทฤษฎี 1 ชม. ปฏิบัติ 4 ชม.)</p>
            <p style="margin-top:10px;"><a href="assets/slides/unit1-slides.html" target="_blank" style="color:#93c5fd; font-weight:600; text-decoration:underline;">🖥️ เปิดสไลด์ประกอบการสอน หน่วยที่ 1</a></p>
        </div>
    </div>

    <div class="container">
        <div class="single-layout">

            <section class="lesson-section">
                <div class="key-concept-box">
                    <strong>🎯 สารสำคัญ (Key Concepts)</strong>
                    <p>
                        การพัฒนาเว็บไซต์ยุคใหม่ไม่ได้มีแค่การเขียน HTML และ CSS อีกต่อไป นักพัฒนาต้องรู้จักเครื่องมือหลายอย่างที่ทำงานร่วมกัน หน่วยนี้จะพาผู้เรียนรู้จักเครื่องมือหลัก 4 อย่างที่ใช้ตลอดทั้งรายวิชา ได้แก่ <strong>React</strong> (ไลบรารีสำหรับสร้างหน้าจอจากชิ้นส่วนย่อยที่เรียกว่า Component), <strong>Next.js</strong> (เฟรมเวิร์กที่ต่อยอดจาก React ให้สร้างเว็บได้ครบทั้งฝั่ง Frontend และ Backend), <strong>Git</strong> (ระบบบันทึกประวัติการแก้ไขโค้ด) และ <strong>Docker</strong> (เครื่องมือจำลองสภาพแวดล้อมให้ทุกเครื่องรันโปรเจกต์ได้เหมือนกัน) ผู้เรียนจะได้ศึกษาประวัติความเป็นมา เหตุผลที่เลือกใช้ และลงมือสร้างโปรเจกต์ Next.js ตัวแรกที่รันอยู่ใน Docker พร้อมจัดการเวอร์ชันด้วย Git ตั้งแต่การ Commit การแตก Branch การ Merge ไปจนถึงการแก้ Conflict
                    </p>
                </div>
            </section>

            <section class="lesson-section">
                <h3>🎯 จุดประสงค์การเรียนรู้ (Learning Objectives)</h3>
                <p>เมื่อนักศึกษาเรียนจบหน่วยการเรียนรู้นี้แล้ว จะมีความรู้ความสามารถดังนี้:</p>
                <table class="grading-table" style="margin-top: 15px;">
                    <tr>
                        <th width="25%">โดเมนการเรียนรู้</th>
                        <th>รายละเอียดจุดประสงค์การเรียนรู้</th>
                    </tr>
                    <tr>
                        <td><strong>ด้านความรู้ (Knowledge - K)</strong></td>
                        <td>1. อธิบายประวัติความเป็นมาและจุดเด่นของ React และ Next.js รวมถึงการใช้ Next.js ทั้งฝั่ง Frontend และ Backend ได้<br>2. อธิบายประวัติ ประโยชน์ และหลักการทำงานของ Git รวมถึงแนวคิด Branch, Merge และ Conflict ได้<br>3. อธิบายบทบาทของเทคโนโลยี Front-End อื่น ๆ และประโยชน์ของ Docker ในการพัฒนาเว็บได้</td>
                    </tr>
                    <tr>
                        <td><strong>ด้านทักษะ (Practice - P)</strong></td>
                        <td>1. สร้าง รัน และสั่งงานโปรเจกต์ Next.js ภายใน Docker Container ได้ด้วยตนเอง<br>2. ใช้คำสั่ง Git พื้นฐาน แตก Branch, Merge และแก้ไข Merge Conflict ได้ถูกต้อง<br>3. ส่งโปรเจกต์ขึ้นคลังจัดเก็บบน GitHub ได้</td>
                    </tr>
                    <tr>
                        <td><strong>ด้านเจตคติ (Attitude - A)</strong></td>
                        <td>1. ปฏิบัติงานด้วยความละเอียดรอบคอบ อ่านข้อความแจ้งเตือนและแก้ไขข้อผิดพลาดอย่างเป็นระบบ<br>2. มีวินัยในการบันทึก Commit อย่างสม่ำเสมอพร้อมข้อความอธิบายที่สื่อความหมาย</td>
                    </tr>
                </table>
            </section>

            <div class="key-concept-box">
                <strong>🗺️ สารบัญหน่วยที่ 1</strong>
                <ul style="margin: 10px 0 0 20px; line-height: 1.9;">
                    <li><a href="#topic-1-1">เรื่องที่ 1.1: Front-End คืออะไร และวิวัฒนาการของการพัฒนาเว็บ</a></li>
                    <li><a href="#topic-1-2">เรื่องที่ 1.2: เทคโนโลยีอื่น ๆ ที่เกี่ยวข้องกับ Front-End</a></li>
                    <li><a href="#topic-1-3">เรื่องที่ 1.3: React — ประวัติความเป็นมาและข้อดี</a></li>
                    <li><a href="#topic-1-4">เรื่องที่ 1.4: Next.js — ประวัติ ข้อดี และการใช้งานแบบ Frontend/Backend</a></li>
                    <li><a href="#topic-1-5">เรื่องที่ 1.5: ทำไมต้องเลือกใช้ Next.js คู่กับ React</a></li>
                    <li><a href="#topic-1-6">เรื่องที่ 1.6: Git — ระบบควบคุมเวอร์ชัน การแตก Branch การ Merge และ Conflict</a></li>
                    <li><a href="#topic-1-7">เรื่องที่ 1.7: Docker กับงานพัฒนา Front-End</a></li>
                    <li><a href="#topic-1-8">เรื่องที่ 1.8: การใช้ Git ร่วมกับโปรเจกต์ Next.js</a></li>
                    <li><a href="#workshop">ปฏิบัติการ: สร้างโปรเจกต์ Next.js ด้วย Docker และจัดการเวอร์ชันด้วย Git (9 ขั้นตอน)</a></li>
                </ul>
            </div>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="lesson-section">
                <h3>📘 3. เนื้อหาทางทฤษฎีเชิงลึก (Theoretical Core)</h3>

                <!-- ===================== 1.1 ===================== -->
                <h4 class="topic-title" id="topic-1-1">เรื่องที่ 1.1: Front-End คืออะไร และวิวัฒนาการของการพัฒนาเว็บ</h4>
                <p>
                    ระบบเว็บไซต์ทุกระบบแบ่งออกเป็น 2 ฝั่งหลัก เปรียบเทียบได้กับร้านอาหาร คือ <strong>Front-End</strong> (หน้าร้าน) ได้แก่ทุกอย่างที่ผู้ใช้มองเห็นและโต้ตอบได้บนเบราว์เซอร์ เช่น เมนู ปุ่ม ฟอร์ม รูปภาพ และ <strong>Back-End</strong> (ห้องครัว) ได้แก่ส่วนที่ทำงานอยู่บนเซิร์ฟเวอร์ซึ่งผู้ใช้มองไม่เห็น เช่น การตรวจสอบรหัสผ่าน การบันทึกข้อมูลลงฐานข้อมูล การคำนวณราคาสินค้า เมื่อผู้ใช้กดปุ่มสั่งซื้อที่หน้าร้าน (Front-End) คำสั่งจะถูกส่งไปทำงานที่ห้องครัว (Back-End) แล้วส่งผลลัพธ์กลับมาแสดงให้ผู้ใช้เห็น
                </p>
                <p><strong>วิวัฒนาการของการพัฒนา Front-End แบ่งได้เป็นยุคต่าง ๆ ดังนี้:</strong></p>
                <ul style="margin-left: 20px;">
                    <li><strong>ยุคเว็บนิ่ง (Static Web) ประมาณปี 1991–1995:</strong> Tim Berners-Lee คิดค้นภาษา <strong>HTML</strong> เว็บเป็นเพียงเอกสารข้อความที่เชื่อมกันด้วยลิงก์ ทุกคนเห็นเนื้อหาเหมือนกัน แก้ไขเนื้อหาต้องแก้ไฟล์ HTML ด้วยมือ</li>
                    <li><strong>ยุคเว็บมีชีวิต (ปี 1995–2004):</strong> เกิดภาษา <strong>JavaScript</strong> (ปี 1995) ทำให้หน้าเว็บตอบสนองผู้ใช้ได้ และภาษา <strong>CSS</strong> (ปี 1996) ทำให้แยกการตกแต่งออกจากเนื้อหาได้ ส่วนเนื้อหาที่เปลี่ยนแปลงได้ (เช่น เว็บบอร์ด) สร้างที่เซิร์ฟเวอร์ด้วยภาษาอย่าง PHP แล้วส่ง HTML ทั้งหน้ากลับมา</li>
                    <li><strong>ยุค AJAX และ jQuery (ปี 2005–2012):</strong> เทคนิค <strong>AJAX</strong> ทำให้หน้าเว็บดึงข้อมูลใหม่ได้โดยไม่ต้องโหลดหน้าใหม่ทั้งหน้า (เช่น Google Maps ที่เลื่อนแผนที่ได้ลื่นไหล) และไลบรารี <strong>jQuery</strong> (ปี 2006) ช่วยให้เขียน JavaScript ได้ง่ายขึ้นมาก</li>
                    <li><strong>ยุค Single Page Application (ปี 2010–ปัจจุบัน):</strong> เกิดเฟรมเวิร์กอย่าง AngularJS (2010), <strong>React</strong> (2013) และ Vue.js (2014) ให้สร้างเว็บที่ทำงานเหมือนแอปพลิเคชัน โหลดหน้าเว็บครั้งเดียวแล้ว JavaScript จะสร้างและเปลี่ยนหน้าจอเองทั้งหมดในเบราว์เซอร์</li>
                    <li><strong>ยุค Meta-framework (ปี 2016–ปัจจุบัน):</strong> เฟรมเวิร์กอย่าง <strong>Next.js</strong> (2016) นำข้อดีของทั้งสองโลกมารวมกัน คือ เขียนด้วย React แต่สามารถสร้างหน้าเว็บที่ฝั่งเซิร์ฟเวอร์ได้ด้วย ทำให้เว็บโหลดเร็วและค้นหาเจอใน Google ได้ดี พร้อมเขียน Back-End ได้ในโปรเจกต์เดียวกัน</li>
                </ul>

                <div class="image-container">
                    <div>
                        <figure class="custom-image-box" style="max-width: 860px;">
                            <img src="img/frontend-timeline.svg" alt="เส้นเวลาวิวัฒนาการของเทคโนโลยี Front-End ตั้งแต่ HTML ปี 1991 จนถึง Next.js 16 ปี 2025" class="responsive-img">
                            <figcaption class="image-caption">
                                <strong>รูปที่ 1.1:</strong> เส้นเวลาวิวัฒนาการของเทคโนโลยี Front-End และเครื่องมือที่เกี่ยวข้อง
                                <span class="image-source">🔗 แหล่งอ้างอิงภาพ: ภาพประกอบจัดทำขึ้นสำหรับบทเรียนนี้</span>
                            </figcaption>
                        </figure>
                    </div>
                </div>

                <!-- ===================== 1.2 ===================== -->
                <h4 class="topic-title" id="topic-1-2">เรื่องที่ 1.2: เทคโนโลยีอื่น ๆ ที่เกี่ยวข้องกับ Front-End</h4>
                <p>
                    นอกจาก React และ Next.js แล้ว นักพัฒนา Front-End ยังต้องรู้จักเครื่องมืออีกหลายกลุ่ม ผู้เรียนไม่จำเป็นต้องเชี่ยวชาญทุกตัวตั้งแต่วันแรก แต่ควรรู้ว่าแต่ละตัว "ทำหน้าที่อะไร" เพื่อให้เข้าใจภาพรวมเวลาอ่านบทความหรือประกาศรับสมัครงาน
                </p>
                <table class="grading-table" style="margin: 15px 0;">
                    <tr style="background:#f1f5f9;">
                        <th width="22%">กลุ่มเทคโนโลยี</th>
                        <th width="30%">ตัวอย่าง</th>
                        <th>หน้าที่ / เรียนในหน่วยใด</th>
                    </tr>
                    <tr>
                        <td><strong>ภาษาพื้นฐานของเว็บ</strong></td>
                        <td>HTML, CSS, JavaScript</td>
                        <td>โครงสร้าง การตกแต่ง และการโต้ตอบของหน้าเว็บ ทุกเฟรมเวิร์กสุดท้ายจะแปลงเป็น 3 ภาษานี้ (หน่วยที่ 2–3)</td>
                    </tr>
                    <tr>
                        <td><strong>ภาษาเสริมความปลอดภัย</strong></td>
                        <td>TypeScript</td>
                        <td>JavaScript ที่เพิ่มการระบุชนิดข้อมูล ช่วยจับข้อผิดพลาดก่อนรันโปรแกรม (หน่วยที่ 4)</td>
                    </tr>
                    <tr>
                        <td><strong>CSS Framework / UI Kit</strong></td>
                        <td>Tailwind CSS, Bootstrap, shadcn/ui</td>
                        <td>ชุดสไตล์และคอมโพเนนต์สำเร็จรูป ช่วยตกแต่งเว็บได้เร็วและสวยงามสม่ำเสมอ (หน่วยที่ 2)</td>
                    </tr>
                    <tr>
                        <td><strong>UI Library / Framework</strong></td>
                        <td>React, Vue.js, Angular, Svelte</td>
                        <td>เครื่องมือสร้างหน้าจอแบบแบ่งเป็นคอมโพเนนต์ (หน่วยที่ 5 เน้น React)</td>
                    </tr>
                    <tr>
                        <td><strong>Meta-framework</strong></td>
                        <td>Next.js, Nuxt (Vue), SvelteKit, Astro, React Router (เดิมคือ Remix)</td>
                        <td>เฟรมเวิร์กที่ครอบ UI Library อีกชั้น เพิ่มระบบ Routing, การ Render ที่เซิร์ฟเวอร์ และ Backend (หน่วยที่ 1, 7)</td>
                    </tr>
                    <tr>
                        <td><strong>Build Tool / Bundler</strong></td>
                        <td>Vite, Webpack, Turbopack</td>
                        <td>รวมและย่อขนาดไฟล์โค้ดจำนวนมากให้เบราว์เซอร์โหลดได้เร็ว (Next.js จัดการให้อัตโนมัติ)</td>
                    </tr>
                    <tr>
                        <td><strong>Runtime และ Package Manager</strong></td>
                        <td>Node.js, npm, pnpm, Bun</td>
                        <td>Node.js ทำให้รัน JavaScript นอกเบราว์เซอร์ได้ ส่วน npm ใช้ติดตั้งไลบรารี (แพ็กเกจ) ต่าง ๆ</td>
                    </tr>
                    <tr>
                        <td><strong>ตรวจคุณภาพโค้ด</strong></td>
                        <td>ESLint, Prettier, Biome</td>
                        <td>ตรวจหาจุดผิดพลาดและจัดรูปแบบโค้ดให้เป็นมาตรฐานเดียวกันทั้งทีม</td>
                    </tr>
                    <tr>
                        <td><strong>การทดสอบ</strong></td>
                        <td>Jest, Vitest, Playwright</td>
                        <td>เขียนโปรแกรมทดสอบอัตโนมัติว่าเว็บทำงานถูกต้อง (หน่วยที่ 8)</td>
                    </tr>
                    <tr>
                        <td><strong>เครื่องมือการทำงานร่วมกัน</strong></td>
                        <td>Git, GitHub, GitLab, Docker</td>
                        <td>จัดการเวอร์ชันของโค้ด ทำงานเป็นทีม และจำลองสภาพแวดล้อมให้เหมือนกันทุกเครื่อง (หน่วยนี้)</td>
                    </tr>
                    <tr>
                        <td><strong>การนำขึ้นใช้งานจริง (Deploy)</strong></td>
                        <td>Vercel, Netlify, เซิร์ฟเวอร์ของตนเอง + Docker</td>
                        <td>นำเว็บไซต์ขึ้นออนไลน์ให้ผู้ใช้เข้าถึงได้ (หน่วยที่ 9)</td>
                    </tr>
                </table>

                <!-- ===================== 1.3 ===================== -->
                <h4 class="topic-title" id="topic-1-3">เรื่องที่ 1.3: React — ประวัติความเป็นมาและข้อดี</h4>
                <p>
                    <strong>React</strong> คือไลบรารี JavaScript สำหรับสร้างส่วนติดต่อผู้ใช้ (User Interface) พัฒนาโดย <strong>Jordan Walke</strong> วิศวกรของบริษัท Facebook (ปัจจุบันคือ Meta) เกิดจากปัญหาที่หน้า News Feed ของ Facebook มีข้อมูลเปลี่ยนแปลงตลอดเวลา (ยอด Like, ความคิดเห็นใหม่, การแจ้งเตือน) การเขียนโค้ดสั่งแก้หน้าจอทีละจุดแบบเดิมทำให้โค้ดซับซ้อนและเกิดข้อผิดพลาดง่าย React จึงเสนอแนวคิดใหม่คือ <em>"บอกแค่ว่าหน้าจอควรหน้าตาเป็นอย่างไร แล้วให้ React จัดการอัปเดตหน้าจอเอง"</em>
                </p>
                <table class="grading-table" style="margin: 15px 0;">
                    <tr style="background:#f1f5f9;">
                        <th width="20%">ปี</th>
                        <th>เหตุการณ์สำคัญของ React</th>
                    </tr>
                    <tr><td><strong>2011</strong></td><td>เริ่มใช้งานจริงครั้งแรกกับหน้า News Feed ของ Facebook</td></tr>
                    <tr><td><strong>2012</strong></td><td>นำไปใช้กับ Instagram หลัง Facebook เข้าซื้อกิจการ</td></tr>
                    <tr><td><strong>2013</strong></td><td>เปิดเป็นซอฟต์แวร์โอเพนซอร์ส (Open Source) ให้ทุกคนใช้ฟรีในงาน JSConf US</td></tr>
                    <tr><td><strong>2015</strong></td><td>เปิดตัว React Native สำหรับเขียนแอปมือถือ iOS/Android ด้วยแนวคิดเดียวกัน</td></tr>
                    <tr><td><strong>2019</strong></td><td>React 16.8 เปิดตัว <strong>Hooks</strong> (เช่น <code class="inline-code">useState</code>) ทำให้เขียนคอมโพเนนต์ด้วยฟังก์ชันธรรมดาได้ทั้งหมด</td></tr>
                    <tr><td><strong>2022</strong></td><td>React 18 เพิ่มการ Render แบบ Concurrent ทำให้หน้าจอลื่นไหลขึ้น</td></tr>
                    <tr><td><strong>2024</strong></td><td>React 19 รองรับ <strong>Server Components</strong> และ Actions อย่างเป็นทางการ ซึ่ง Next.js นำมาใช้เป็นหัวใจหลัก</td></tr>
                    <tr><td><strong>2025</strong></td><td>เครื่องมือ Create React App ถูกประกาศเลิกพัฒนา ทีม React แนะนำให้เริ่มโปรเจกต์ใหม่ด้วยเฟรมเวิร์กอย่าง Next.js แทน</td></tr>
                </table>

                <p><strong>แนวคิดหลักของ React ที่ผู้เรียนควรรู้จัก:</strong></p>
                <ul style="margin-left: 20px;">
                    <li><strong>Component (คอมโพเนนต์):</strong> แบ่งหน้าเว็บเป็นชิ้นส่วนย่อยที่นำกลับมาใช้ซ้ำได้ เหมือนการต่อตัวต่อเลโก้ เช่น ปุ่ม การ์ดสินค้า แถบเมนู แต่ละชิ้นเขียนเป็นฟังก์ชัน JavaScript 1 ฟังก์ชัน</li>
                    <li><strong>JSX:</strong> รูปแบบการเขียนที่ผสม HTML เข้าไปในโค้ด JavaScript ได้โดยตรง ทำให้อ่านง่ายว่าคอมโพเนนต์จะแสดงผลอะไร</li>
                    <li><strong>Props:</strong> ข้อมูลที่ส่งจากคอมโพเนนต์แม่ไปยังคอมโพเนนต์ลูก เหมือนการส่งค่าพารามิเตอร์ให้ฟังก์ชัน ข้อมูลไหลทางเดียวจากบนลงล่าง (One-way Data Flow) จึงติดตามที่มาของข้อมูลได้ง่าย</li>
                    <li><strong>State:</strong> ข้อมูลภายในคอมโพเนนต์ที่เปลี่ยนแปลงได้ เช่น ตัวเลขในตะกร้าสินค้า เมื่อ State เปลี่ยน React จะวาดหน้าจอส่วนนั้นใหม่ให้อัตโนมัติ</li>
                </ul>

                <div class="image-container">
                    <div>
                        <figure class="custom-image-box" style="max-width: 860px;">
                            <img src="img/react-component-tree.svg" alt="แผนภาพ Component Tree ของ React เทียบกับหน้าเว็บที่ผู้ใช้เห็น" class="responsive-img">
                            <figcaption class="image-caption">
                                <strong>รูปที่ 1.2:</strong> หน้าเว็บหนึ่งหน้าประกอบจากคอมโพเนนต์ย่อย และส่งข้อมูลจากบนลงล่างผ่าน props
                                <span class="image-source">🔗 แหล่งอ้างอิงภาพ: ภาพประกอบจัดทำขึ้นสำหรับบทเรียนนี้</span>
                            </figcaption>
                        </figure>
                    </div>
                </div>

                <p>ตัวอย่างคอมโพเนนต์ <code class="inline-code">ProductCard</code> ในรูปที่ 1.2 เขียนด้วย React ได้ดังนี้ สังเกตว่าเป็นเพียงฟังก์ชันที่รับข้อมูล (props) แล้วคืนค่าเป็น JSX:</p>
                <div class="code-window">
                    <div class="code-header">
                        <span class="code-lang">JavaScript (JSX)</span>
                        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                            </svg>
                        </button>
                    </div>
                    <pre>// คอมโพเนนต์ลูก: รับชื่อและราคาผ่าน props แล้วแสดงผล
function ProductCard({ name, price }) {
  return (
    &lt;div className="card"&gt;
      &lt;h3&gt;{name}&lt;/h3&gt;
      &lt;p&gt;ราคา {price} บาท&lt;/p&gt;
    &lt;/div&gt;
  );
}

// คอมโพเนนต์แม่: นำ ProductCard มาใช้ซ้ำ 3 ครั้ง ด้วยข้อมูลต่างกัน
function ProductList() {
  return (
    &lt;section&gt;
      &lt;ProductCard name="คีย์บอร์ด" price={1290} /&gt;
      &lt;ProductCard name="เมาส์" price={590} /&gt;
      &lt;ProductCard name="หูฟัง" price={890} /&gt;
    &lt;/section&gt;
  );
}</pre>
                </div>

                <p><strong>ข้อดีของ React:</strong></p>
                <ul style="margin-left: 20px;">
                    <li><strong>นำกลับมาใช้ซ้ำได้:</strong> เขียนคอมโพเนนต์ครั้งเดียว ใช้ได้ทุกหน้า แก้ที่เดียวเปลี่ยนทั้งเว็บ</li>
                    <li><strong>เขียนแบบบอกผลลัพธ์ (Declarative):</strong> บอกแค่ว่า "ข้อมูลเป็นแบบนี้ หน้าจอต้องเป็นแบบนี้" ไม่ต้องสั่งแก้หน้าจอทีละขั้นตอนเอง</li>
                    <li><strong>ชุมชนใหญ่ที่สุด:</strong> มีไลบรารีเสริม บทเรียน และตำแหน่งงานจำนวนมาก ติดอันดับเครื่องมือ Front-End ที่นักพัฒนามืออาชีพใช้มากที่สุดต่อเนื่องหลายปี</li>
                    <li><strong>ต่อยอดได้หลายแพลตฟอร์ม:</strong> ความรู้เดียวกันใช้สร้างเว็บ (React/Next.js) และแอปมือถือ (React Native) ได้</li>
                </ul>
                <p>
                    อย่างไรก็ตาม React เป็นเพียง <strong>"ไลบรารีสำหรับสร้างหน้าจอ"</strong> ยังไม่มีระบบเปลี่ยนหน้า (Routing) ระบบสร้างหน้าเว็บที่เซิร์ฟเวอร์ หรือระบบ Backend มาให้ นักพัฒนาต้องหาเครื่องมืออื่นมาประกอบเอง ช่องว่างนี้เองที่ Next.js เข้ามาเติมเต็ม
                </p>
                <blockquote>
                    <strong>📌 หมายเหตุ:</strong> รายละเอียดเชิงลึกของ React ได้แก่ การออกแบบคอมโพเนนต์ การส่ง Props การจัดการ State ด้วย <code class="inline-code">useState</code> และ Hook อื่น ๆ จะศึกษาอย่างละเอียดใน <a href="unit5.php">หน่วยที่ 5: สถาปัตยกรรมคอมโพเนนต์และการจัดการสถานะด้วย React</a>
                </blockquote>

                <!-- ===================== 1.4 ===================== -->
                <h4 class="topic-title" id="topic-1-4">เรื่องที่ 1.4: Next.js — ประวัติ ข้อดี และการใช้งานแบบ Frontend/Backend</h4>
                <p>
                    <strong>Next.js</strong> คือเฟรมเวิร์ก (Framework) ที่สร้างอยู่บน React โดยบริษัท ZEIT ซึ่งก่อตั้งโดย <strong>Guillermo Rauch</strong> (ภายหลังเปลี่ยนชื่อบริษัทเป็น <strong>Vercel</strong>) ความแตกต่างระหว่าง "ไลบรารี" กับ "เฟรมเวิร์ก" เปรียบได้ว่า React คือ "อุปกรณ์สร้างบ้าน" ที่เราต้องออกแบบและประกอบเองทั้งหมด ส่วน Next.js คือ "บ้านสำเร็จรูปที่มีโครงสร้าง ระบบไฟ และระบบประปาวางไว้ให้แล้ว" เราเพียงตกแต่งห้องต่าง ๆ ด้วย React ตามต้องการ
                </p>
                <table class="grading-table" style="margin: 15px 0;">
                    <tr style="background:#f1f5f9;">
                        <th width="20%">ปี (เวอร์ชัน)</th>
                        <th>เหตุการณ์สำคัญของ Next.js</th>
                    </tr>
                    <tr><td><strong>2016</strong> (v1)</td><td>เปิดตัวครั้งแรกเป็นโอเพนซอร์ส จุดเด่นคือสร้างหน้าเว็บ React ที่ฝั่งเซิร์ฟเวอร์ได้ง่าย และสร้างหน้าใหม่แค่เพิ่มไฟล์</td></tr>
                    <tr><td><strong>2019</strong> (v9)</td><td>เพิ่ม API Routes ให้เขียน Backend ในโปรเจกต์เดียวกันได้</td></tr>
                    <tr><td><strong>2020</strong> (v9.3–v10)</td><td>เพิ่มการสร้างหน้าเว็บล่วงหน้า (SSG/ISR) และระบบปรับขนาดรูปภาพอัตโนมัติ บริษัท ZEIT เปลี่ยนชื่อเป็น Vercel</td></tr>
                    <tr><td><strong>2021</strong> (v12)</td><td>เปลี่ยนตัวแปลงโค้ดเป็น SWC ที่เขียนด้วยภาษา Rust ทำให้เร็วขึ้นหลายเท่า</td></tr>
                    <tr><td><strong>2022–2023</strong> (v13–v14)</td><td>เปิดตัว <strong>App Router</strong> (โฟลเดอร์ <code class="inline-code">app/</code>) ที่ใช้ React Server Components และ Server Actions ซึ่งเป็นรูปแบบหลักที่ใช้ในรายวิชานี้</td></tr>
                    <tr><td><strong>2024</strong> (v15)</td><td>รองรับ React 19 อย่างเต็มรูปแบบ</td></tr>
                    <tr><td><strong>2025</strong> (v16)</td><td>ใช้ <strong>Turbopack</strong> (ตัวรวมโค้ดที่เขียนด้วย Rust) เป็นค่าเริ่มต้น ปัจจุบันขณะจัดทำบทเรียนนี้อยู่ที่เวอร์ชัน 16.x</td></tr>
                </table>

                <p><strong>ข้อดีของ Next.js:</strong></p>
                <ul style="margin-left: 20px;">
                    <li><strong>เปลี่ยนหน้าด้วยโฟลเดอร์ (File-based Routing):</strong> สร้างโฟลเดอร์ <code class="inline-code">app/about/</code> ใส่ไฟล์ <code class="inline-code">page.js</code> ก็ได้หน้า <code class="inline-code">/about</code> ทันที ไม่ต้องตั้งค่าเพิ่ม</li>
                    <li><strong>สร้างหน้าเว็บได้หลายรูปแบบ:</strong> เลือกได้ว่าจะสร้างหน้าเว็บที่เซิร์ฟเวอร์ (SSR) สร้างไว้ล่วงหน้า (SSG) หรือสร้างในเบราว์เซอร์ (CSR) ตามความเหมาะสมของแต่ละหน้า</li>
                    <li><strong>SEO ดีและโหลดเร็ว:</strong> ส่ง HTML ที่มีเนื้อหาครบมาให้เบราว์เซอร์และ Search Engine ตั้งแต่แรก</li>
                    <li><strong>มี Backend ในตัว:</strong> เขียน API และเชื่อมต่อฐานข้อมูลได้ในโปรเจกต์เดียวกัน เรียกว่าเป็น <strong>Full-stack Framework</strong></li>
                    <li><strong>ปรับแต่งประสิทธิภาพอัตโนมัติ:</strong> มีระบบย่อขนาดรูปภาพ (<code class="inline-code">next/image</code>) ระบบจัดการฟอนต์ (<code class="inline-code">next/font</code>) และแบ่งไฟล์ JavaScript ให้โหลดเฉพาะที่จำเป็น</li>
                    <li><strong>พร้อมใช้งานจริง:</strong> บริษัทระดับโลกจำนวนมากใช้งาน และนำขึ้นใช้งานได้ทั้งบน Vercel หรือเซิร์ฟเวอร์ของตนเองผ่าน Docker</li>
                </ul>

                <p><strong>รูปแบบการสร้างหน้าเว็บ (Rendering) ที่ควรรู้จัก</strong></p>
                <p>
                    คำว่า <strong>Render</strong> หมายถึงกระบวนการแปลงโค้ด React ให้กลายเป็น HTML ที่แสดงบนหน้าจอ คำถามสำคัญคือ "แปลงที่ไหน และแปลงเมื่อไร" ซึ่งส่งผลต่อความเร็วและ SEO ของเว็บไซต์โดยตรง
                </p>

                <div class="image-container">
                    <div>
                        <figure class="custom-image-box" style="max-width: 860px;">
                            <img src="img/rendering-csr-vs-ssr.svg" alt="แผนภาพเปรียบเทียบลำดับการทำงานของ Client-Side Rendering กับ Server-Side Rendering" class="responsive-img">
                            <figcaption class="image-caption">
                                <strong>รูปที่ 1.3:</strong> ลำดับการทำงานของ CSR (สร้างหน้าเว็บในเบราว์เซอร์) เทียบกับ SSR (สร้างหน้าเว็บที่เซิร์ฟเวอร์)
                                <span class="image-source">🔗 แหล่งอ้างอิงภาพ: ภาพประกอบจัดทำขึ้นสำหรับบทเรียนนี้</span>
                            </figcaption>
                        </figure>
                    </div>
                </div>

                <table class="grading-table" style="margin: 15px 0;">
                    <tr style="background:#f1f5f9;">
                        <th width="25%">รูปแบบ</th>
                        <th>สร้าง HTML ที่ไหน / เมื่อไร</th>
                        <th width="30%">เหมาะกับหน้าแบบใด</th>
                    </tr>
                    <tr>
                        <td><strong>CSR</strong><br>Client-Side Rendering</td>
                        <td>ในเบราว์เซอร์ของผู้ใช้ หลังดาวน์โหลด JavaScript เสร็จ</td>
                        <td>หน้าที่โต้ตอบสูงและไม่ต้องการ SEO เช่น หน้าจัดการหลังล็อกอิน</td>
                    </tr>
                    <tr>
                        <td><strong>SSR</strong><br>Server-Side Rendering</td>
                        <td>ที่เซิร์ฟเวอร์ ทุกครั้งที่มีผู้ใช้ร้องขอ</td>
                        <td>ข้อมูลเปลี่ยนบ่อยหรือเฉพาะบุคคล เช่น หน้าคำสั่งซื้อของฉัน</td>
                    </tr>
                    <tr>
                        <td><strong>SSG</strong><br>Static Site Generation</td>
                        <td>ที่เซิร์ฟเวอร์ ครั้งเดียวตอน Build แล้วนำไฟล์ HTML เดิมไปใช้ซ้ำ</td>
                        <td>เนื้อหานิ่ง เช่น หน้าเกี่ยวกับเรา บทความ (เร็วที่สุด)</td>
                    </tr>
                    <tr>
                        <td><strong>ISR</strong><br>Incremental Static Regeneration</td>
                        <td>แบบ SSG แต่สร้างหน้าใหม่ได้เป็นระยะ โดยไม่ต้อง Build ใหม่ทั้งเว็บ</td>
                        <td>หน้าที่อัปเดตเป็นช่วง ๆ เช่น หน้ารายการสินค้า ข่าว</td>
                    </tr>
                </table>
                <p style="font-size:0.9rem; color:#64748b;">💡 Next.js เลือกรูปแบบที่เหมาะสมให้อัตโนมัติในหลายกรณี เช่น หน้าที่ไม่มีข้อมูลเปลี่ยนแปลงจะถูกสร้างล่วงหน้าแบบ Static ซึ่งผู้เรียนจะเห็นสัญลักษณ์ <code class="inline-code">○ (Static)</code> ตอนสั่ง Build ในขั้นตอนที่ 6 ของปฏิบัติการ ส่วนการผสมหน้า Static กับ Dynamic อย่างละเอียดจะเรียนในหน่วยที่ 7</p>

                <p><strong>การใช้ Next.js ในรูปแบบ Frontend และ Backend</strong></p>
                <p>
                    จุดที่ทำให้ Next.js แตกต่างจาก React ทั่วไปมากที่สุดคือ <strong>โค้ดในโปรเจกต์เดียวกันแบ่งเป็น 2 ฝั่งที่ทำงานคนละที่</strong> นักพัฒนาต้องรู้ว่าไฟล์ไหนทำงานที่เบราว์เซอร์ (Frontend) และไฟล์ไหนทำงานที่เซิร์ฟเวอร์ (Backend) ดังรูปที่ 1.4
                </p>

                <div class="image-container">
                    <div>
                        <figure class="custom-image-box" style="max-width: 860px;">
                            <img src="img/nextjs-fullstack-architecture.svg" alt="สถาปัตยกรรมของ Next.js แสดงส่วน Frontend ในเบราว์เซอร์ ส่วน Backend บน Next.js Server และแหล่งข้อมูล" class="responsive-img">
                            <figcaption class="image-caption">
                                <strong>รูปที่ 1.4:</strong> Next.js ทำงานทั้งฝั่ง Frontend (เบราว์เซอร์) และ Backend (เซิร์ฟเวอร์) ในโปรเจกต์เดียว
                                <span class="image-source">🔗 แหล่งอ้างอิงภาพ: ภาพประกอบจัดทำขึ้นสำหรับบทเรียนนี้</span>
                            </figcaption>
                        </figure>
                    </div>
                </div>

                <table class="grading-table" style="margin: 15px 0;">
                    <tr style="background:#f1f5f9;">
                        <th width="22%">ส่วนประกอบ</th>
                        <th width="12%">ทำงานที่</th>
                        <th>ลักษณะและการใช้งาน</th>
                    </tr>
                    <tr>
                        <td><strong>Server Component</strong><br>(ค่าเริ่มต้นของทุกไฟล์)</td>
                        <td>Backend</td>
                        <td>สร้าง HTML ที่เซิร์ฟเวอร์ ดึงข้อมูลจากฐานข้อมูลได้โดยตรง และโค้ดส่วนนี้ <strong>ไม่ถูกส่งไปที่เบราว์เซอร์</strong> จึงเก็บรหัสลับ (เช่น รหัสผ่านฐานข้อมูล) ได้ปลอดภัย แต่ใช้ปุ่มกดหรือ <code class="inline-code">useState</code> ไม่ได้</td>
                    </tr>
                    <tr>
                        <td><strong>Client Component</strong><br>(บรรทัดแรกเขียน <code class="inline-code">"use client"</code>)</td>
                        <td>Frontend</td>
                        <td>ทำงานในเบราว์เซอร์ ใช้เมื่อต้องโต้ตอบกับผู้ใช้ เช่น ปุ่มกด ช่องกรอกข้อมูล ตัวนับ หรือใช้ Hook อย่าง <code class="inline-code">useState</code></td>
                    </tr>
                    <tr>
                        <td><strong>Route Handler</strong><br>(ไฟล์ <code class="inline-code">route.js</code>)</td>
                        <td>Backend</td>
                        <td>สร้าง API ที่ตอบกลับเป็นข้อมูล (มักเป็น JSON) แทนหน้าเว็บ เช่น <code class="inline-code">/api/hello</code> ให้แอปมือถือหรือระบบอื่นเรียกใช้</td>
                    </tr>
                    <tr>
                        <td><strong>Server Action</strong><br>(ฟังก์ชัน <code class="inline-code">"use server"</code>)</td>
                        <td>Backend</td>
                        <td>ฟังก์ชันที่ทำงานบนเซิร์ฟเวอร์ แต่เรียกจากฟอร์มหรือปุ่มบนหน้าเว็บได้โดยตรง เช่น บันทึกข้อมูลสมัครสมาชิก (เรียนในหน่วยที่ 6–7)</td>
                    </tr>
                </table>

                <p>ตัวอย่างโค้ดของแต่ละฝั่ง (ทั้งหมดนี้ผู้เรียนจะได้สร้างจริงในปฏิบัติการ):</p>
                <div class="code-window">
                    <div class="code-header">
                        <span class="code-lang">app/components/Counter.js — Frontend (Client Component)</span>
                        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                            </svg>
                        </button>
                    </div>
                    <pre>"use client"; // บอก Next.js ว่าคอมโพเนนต์นี้ต้องทำงานในเบราว์เซอร์

import { useState } from "react";

export default function Counter() {
  const [count, setCount] = useState(0); // State เก็บจำนวนครั้งที่กด

  return (
    &lt;button onClick={() =&gt; setCount(count + 1)}&gt;
      กดไปแล้ว {count} ครั้ง
    &lt;/button&gt;
  );
}</pre>
                </div>
                <div class="code-window">
                    <div class="code-header">
                        <span class="code-lang">app/api/hello/route.js — Backend (Route Handler)</span>
                        <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                            </svg>
                        </button>
                    </div>
                    <pre>// ฟังก์ชันชื่อ GET จะทำงานเมื่อมีคนเปิด /api/hello ด้วยเบราว์เซอร์หรือโปรแกรมอื่น
export async function GET() {
  return Response.json({
    message: "สวัสดีจาก Backend ของ Next.js",
  });
}</pre>
                </div>

                <p><strong>โครงสร้างโฟลเดอร์แบบ App Router</strong></p>
                <p>
                    Next.js ตั้งแต่เวอร์ชัน 13 ใช้ระบบ <strong>App Router</strong> ซึ่งใช้โฟลเดอร์ <code class="inline-code">app/</code> เป็นศูนย์กลาง กฎสำคัญคือ <strong>"ชื่อโฟลเดอร์ = ส่วนของ URL"</strong> และ <strong>"ไฟล์ชื่อพิเศษ = หน้าที่พิเศษ"</strong> ดังรูปที่ 1.5
                </p>

                <div class="image-container">
                    <div>
                        <figure class="custom-image-box" style="max-width: 860px;">
                            <img src="img/nextjs-app-router.svg" alt="แผนภาพโครงสร้างโฟลเดอร์ app ของ Next.js และ URL ที่ได้จากแต่ละไฟล์" class="responsive-img">
                            <figcaption class="image-caption">
                                <strong>รูปที่ 1.5:</strong> โครงสร้างโฟลเดอร์ใน <code>app/</code> กำหนด URL ของเว็บไซต์โดยอัตโนมัติ
                                <span class="image-source">🔗 แหล่งอ้างอิงภาพ: ภาพประกอบจัดทำขึ้นสำหรับบทเรียนนี้</span>
                            </figcaption>
                        </figure>
                    </div>
                </div>

                <table class="grading-table" style="margin: 15px 0;">
                    <tr style="background:#f1f5f9;">
                        <th width="25%">ชื่อไฟล์พิเศษ</th>
                        <th>หน้าที่</th>
                    </tr>
                    <tr><td><code class="inline-code">page.js</code></td><td>เนื้อหาของหน้านั้น ๆ ถ้าโฟลเดอร์ไม่มีไฟล์นี้ จะเปิดเป็นหน้าเว็บไม่ได้</td></tr>
                    <tr><td><code class="inline-code">layout.js</code></td><td>โครงร่างที่ใช้ร่วมกัน เช่น เมนูด้านบนและส่วนท้าย ทุกหน้าในโฟลเดอร์เดียวกันจะถูกครอบด้วย layout นี้</td></tr>
                    <tr><td><code class="inline-code">route.js</code></td><td>สร้าง API (Route Handler) ตอบกลับเป็นข้อมูลแทนหน้าเว็บ</td></tr>
                    <tr><td><code class="inline-code">loading.js</code></td><td>หน้าจอ "กำลังโหลด..." ที่แสดงระหว่างรอข้อมูล</td></tr>
                    <tr><td><code class="inline-code">error.js</code></td><td>หน้าจอที่แสดงเมื่อเกิดข้อผิดพลาดในหน้านั้น</td></tr>
                    <tr><td><code class="inline-code">not-found.js</code></td><td>หน้าจอเมื่อไม่พบหน้าที่ร้องขอ (404)</td></tr>
                </table>

                <p><strong>คำสั่งเบื้องต้นในการสร้างและใช้งาน Next.js</strong></p>
                <table class="grading-table" style="margin: 15px 0;">
                    <tr style="background:#f1f5f9;">
                        <th width="30%">คำสั่ง</th>
                        <th>ความหมายและเวลาที่ใช้</th>
                    </tr>
                    <tr>
                        <td><code class="inline-code">npx create-next-app@latest ชื่อโปรเจกต์</code></td>
                        <td>สร้างโปรเจกต์ใหม่จากแม่แบบล่าสุด (ทำครั้งเดียวตอนเริ่มโปรเจกต์)</td>
                    </tr>
                    <tr>
                        <td><code class="inline-code">npm install</code></td>
                        <td>ติดตั้งแพ็กเกจทั้งหมดตามรายชื่อในไฟล์ <code class="inline-code">package.json</code> (ทำเมื่อเพิ่งได้โปรเจกต์มา หรือมีแพ็กเกจใหม่)</td>
                    </tr>
                    <tr>
                        <td><code class="inline-code">npm run dev</code></td>
                        <td>เปิดเซิร์ฟเวอร์โหมดพัฒนา มี <strong>Hot Reload</strong> คือแก้โค้ดแล้วหน้าเว็บอัปเดตเองทันที (ใช้ระหว่างเขียนโปรแกรม)</td>
                    </tr>
                    <tr>
                        <td><code class="inline-code">npm run build</code></td>
                        <td>แปลงและบีบอัดโปรเจกต์ให้พร้อมใช้งานจริง (Production) และตรวจหาข้อผิดพลาดก่อนนำขึ้นระบบ</td>
                    </tr>
                    <tr>
                        <td><code class="inline-code">npm run start</code></td>
                        <td>รันเว็บไซต์จากผลลัพธ์ของ <code class="inline-code">build</code> ซึ่งเร็วกว่าโหมด dev มาก (ใช้บนเซิร์ฟเวอร์จริง)</td>
                    </tr>
                    <tr>
                        <td><code class="inline-code">npm run lint</code></td>
                        <td>ให้ ESLint ตรวจหาจุดที่อาจผิดพลาดหรือเขียนไม่ถูกหลักในโค้ด</td>
                    </tr>
                </table>
                <p style="font-size:0.9rem; color:#64748b;">💡 ในรายวิชานี้ คำสั่งทั้งหมดข้างต้นจะ <strong>รันภายใน Docker Container</strong> แทนการติดตั้ง Node.js ลงเครื่องโดยตรง ดูเหตุผลในเรื่องที่ 1.7 และวิธีสั่งงานจริงในปฏิบัติการ</p>

                <!-- ===================== 1.5 ===================== -->
                <h4 class="topic-title" id="topic-1-5">เรื่องที่ 1.5: ทำไมต้องเลือกใช้ Next.js คู่กับ React</h4>
                <p>
                    React และ Next.js ไม่ใช่คู่แข่งกัน แต่ทำงานร่วมกัน React คือ "ภาษาที่ใช้วาดหน้าจอ" ส่วน Next.js คือ "โครงสร้างของทั้งระบบ" ที่ใช้ React วาดหน้าจอ ตารางต่อไปนี้เปรียบเทียบการใช้ React อย่างเดียว (สร้างโปรเจกต์ด้วยเครื่องมืออย่าง Vite) กับการใช้ React ผ่าน Next.js
                </p>
                <table class="grading-table" style="margin: 15px 0;">
                    <tr style="background:#f1f5f9;">
                        <th width="20%">ความสามารถ</th>
                        <th>React อย่างเดียว (Vite)</th>
                        <th>React + Next.js</th>
                    </tr>
                    <tr>
                        <td><strong>การเปลี่ยนหน้า (Routing)</strong></td>
                        <td>ต้องติดตั้งและตั้งค่าไลบรารีเพิ่ม เช่น React Router</td>
                        <td>มีในตัว สร้างโฟลเดอร์ก็ได้หน้าใหม่</td>
                    </tr>
                    <tr>
                        <td><strong>การสร้างหน้าเว็บ</strong></td>
                        <td>CSR เท่านั้น (สร้างในเบราว์เซอร์)</td>
                        <td>เลือกได้ทั้ง SSR, SSG, ISR และ CSR</td>
                    </tr>
                    <tr>
                        <td><strong>SEO</strong></td>
                        <td>ทำได้ยาก เพราะ HTML แรกว่างเปล่า</td>
                        <td>ทำได้ดี เพราะได้ HTML ที่มีเนื้อหาครบ</td>
                    </tr>
                    <tr>
                        <td><strong>Backend / API</strong></td>
                        <td>ต้องสร้างโปรเจกต์ Backend แยกต่างหาก</td>
                        <td>มี Route Handler และ Server Action ในโปรเจกต์เดียวกัน</td>
                    </tr>
                    <tr>
                        <td><strong>การปรับแต่งประสิทธิภาพ</strong></td>
                        <td>ต้องตั้งค่าเอง</td>
                        <td>ย่อรูป จัดการฟอนต์ แบ่งไฟล์ JavaScript ให้อัตโนมัติ</td>
                    </tr>
                </table>
                <p><strong>เหตุผลที่รายวิชานี้เลือก Next.js คู่กับ React:</strong></p>
                <ol style="margin-left: 20px;">
                    <li><strong>เป็นแนวทางที่ทีม React แนะนำ:</strong> เว็บไซต์ทางการของ React (react.dev) แนะนำให้เริ่มโปรเจกต์ใหม่ด้วยเฟรมเวิร์ก และ Next.js เป็นตัวเลือกแรกที่แนะนำ</li>
                    <li><strong>ตรงกับความต้องการของตลาดงาน:</strong> React เป็นเครื่องมือ Front-End ที่ใช้มากที่สุด และตำแหน่งงาน Front-End/Full-stack จำนวนมากระบุ Next.js เป็นคุณสมบัติ</li>
                    <li><strong>เรียนครั้งเดียวได้ทั้งสองฝั่ง:</strong> ใช้ภาษา JavaScript/TypeScript ภาษาเดียวเขียนได้ทั้ง Frontend และ Backend เหมาะกับผู้เริ่มต้นที่ยังไม่ต้องการเรียนหลายภาษาพร้อมกัน</li>
                    <li><strong>โครงสร้างชัดเจน:</strong> กฎการวางไฟล์ที่เป็นมาตรฐาน ทำให้ทำงานเป็นทีมง่าย และย้ายไปทำโปรเจกต์ของผู้อื่นได้รวดเร็ว</li>
                    <li><strong>นำขึ้นใช้งานจริงได้ง่าย:</strong> ทั้งบนบริการคลาวด์และบนเซิร์ฟเวอร์ของตนเองผ่าน Docker</li>
                </ol>
                <blockquote>
                    <strong>⚖️ มุมมองที่ควรรู้:</strong> Next.js ไม่จำเป็นสำหรับทุกงาน ถ้าเป็นหน้าเว็บนิ่งเพียง 1–2 หน้า HTML/CSS ธรรมดาก็เพียงพอ หรือถ้าเป็นระบบภายในองค์กรที่ต้องล็อกอินก่อนใช้งานและไม่ต้องการ SEO การใช้ React กับ Vite ก็เบากว่า การเลือกเครื่องมือที่ดีคือการเลือกให้ <strong>เหมาะกับโจทย์</strong> ไม่ใช่เลือกตัวที่ได้รับความนิยมที่สุดเสมอไป
                </blockquote>

                <!-- ===================== 1.6 ===================== -->
                <h4 class="topic-title" id="topic-1-6">เรื่องที่ 1.6: Git — ระบบควบคุมเวอร์ชัน การแตก Branch การ Merge และ Conflict</h4>
                <p>
                    <strong>ระบบควบคุมเวอร์ชัน (Version Control System)</strong> คือโปรแกรมที่บันทึกประวัติการแก้ไขไฟล์ทุกครั้งอย่างเป็นระบบ ลองนึกถึงการทำรายงานแล้วบันทึกไฟล์เป็น <code class="inline-code">รายงาน_v1.docx</code>, <code class="inline-code">รายงาน_v2_แก้แล้ว.docx</code>, <code class="inline-code">รายงาน_final_จริงๆ.docx</code> ซึ่งสับสนและเปลืองพื้นที่ ระบบควบคุมเวอร์ชันแก้ปัญหานี้โดยเก็บไฟล์ไว้ชุดเดียว แต่จำได้ทุกการเปลี่ยนแปลงว่า <strong>ใครแก้ แก้อะไร แก้เมื่อไร และแก้เพราะอะไร</strong> พร้อมย้อนกลับไปเวอร์ชันใดก็ได้
                </p>

                <p><strong>ประวัติความเป็นมาของ Git</strong></p>
                <ul style="margin-left: 20px;">
                    <li><strong>ยุคก่อน Git:</strong> มีระบบควบคุมเวอร์ชันอย่าง CVS (ปี 1990) และ Subversion หรือ SVN (ปี 2000) ซึ่งเป็นแบบ <strong>รวมศูนย์ (Centralized)</strong> คือเก็บประวัติไว้บนเซิร์ฟเวอร์กลางเครื่องเดียว</li>
                    <li><strong>จุดเริ่มต้น:</strong> โครงการระบบปฏิบัติการ Linux ซึ่งมีนักพัฒนาหลายพันคนทั่วโลก เคยใช้โปรแกรมเชิงพาณิชย์ชื่อ BitKeeper แบบไม่เสียค่าใช้จ่าย จนในปี 2005 สิทธิ์การใช้งานฟรีถูกยกเลิก</li>
                    <li><strong>เดือนเมษายน 2005:</strong> <strong>Linus Torvalds</strong> ผู้สร้าง Linux จึงลงมือเขียนระบบใหม่ขึ้นเองชื่อ <strong>Git</strong> โดยตั้งเป้าให้เร็ว รองรับการทำงานพร้อมกันของคนจำนวนมาก และป้องกันข้อมูลเสียหาย ใช้เวลาเพียงไม่กี่วันก็ใช้ Git จัดการซอร์สโค้ดของตัวมันเองได้</li>
                    <li><strong>กรกฎาคม 2005:</strong> ส่งต่อการดูแลโครงการให้ <strong>Junio Hamano</strong> ซึ่งยังเป็นผู้ดูแลหลักมาจนถึงปัจจุบัน และออกเวอร์ชัน 1.0 ในเดือนธันวาคมปีเดียวกัน</li>
                    <li><strong>ปี 2008 เป็นต้นมา:</strong> การเกิดขึ้นของ GitHub ทำให้ Git แพร่หลายอย่างรวดเร็ว ปัจจุบันผลสำรวจนักพัฒนาของ Stack Overflow พบว่านักพัฒนามากกว่า 90% ทั่วโลกใช้ Git</li>
                </ul>
                <p style="font-size:0.9rem; color:#64748b;">💡 เกร็ดความรู้: คำว่า "git" ในภาษาอังกฤษแบบอังกฤษเป็นคำแสลงหมายถึง "คนที่น่ารำคาญ" Linus Torvalds เคยพูดติดตลกว่าเขาตั้งชื่อโปรเจกต์ตามตัวเองเสมอ ทั้ง Linux และ Git</p>

                <div class="image-container">
                    <div>
                        <figure class="custom-image-box" style="max-width: 860px;">
                            <img src="img/git-centralized-vs-distributed.svg" alt="แผนภาพเปรียบเทียบระบบควบคุมเวอร์ชันแบบรวมศูนย์กับแบบกระจายของ Git" class="responsive-img">
                            <figcaption class="image-caption">
                                <strong>รูปที่ 1.6:</strong> ระบบแบบรวมศูนย์เก็บประวัติไว้ที่เซิร์ฟเวอร์เดียว ส่วน Git (แบบกระจาย) ทุกเครื่องมีประวัติครบชุด
                                <span class="image-source">🔗 แหล่งอ้างอิงภาพ: ภาพประกอบจัดทำขึ้นสำหรับบทเรียนนี้</span>
                            </figcaption>
                        </figure>
                    </div>
                </div>

                <p><strong>ประโยชน์ของ Git</strong></p>
                <ul style="margin-left: 20px;">
                    <li><strong>ย้อนเวลาได้:</strong> แก้โค้ดจนพังก็ย้อนกลับไปเวอร์ชันที่เคยทำงานได้ทันที</li>
                    <li><strong>รู้ที่มาของทุกการเปลี่ยนแปลง:</strong> ดูได้ว่าบรรทัดนี้ใครเป็นคนแก้ เมื่อไร และเพราะอะไร</li>
                    <li><strong>ทดลองได้อย่างปลอดภัย:</strong> แตก Branch ไปทดลองฟีเจอร์ใหม่โดยไม่กระทบโค้ดหลักที่ใช้งานได้อยู่</li>
                    <li><strong>ทำงานเป็นทีม:</strong> หลายคนแก้โปรเจกต์เดียวกันพร้อมกันได้ แล้วนำงานมารวมกันอย่างเป็นระบบ</li>
                    <li><strong>สำรองข้อมูลในตัว:</strong> ทุกเครื่องที่ clone ไปมีประวัติครบ เครื่องหนึ่งเสียก็กู้คืนจากเครื่องอื่นได้</li>
                    <li><strong>ใช้เป็นแฟ้มสะสมผลงาน (Portfolio):</strong> ผลงานบน GitHub ใช้ประกอบการสมัครงานหรือศึกษาต่อได้</li>
                </ul>

                <p><strong>Git กับ GitHub ไม่ใช่สิ่งเดียวกัน</strong></p>
                <p>
                    <strong>Git</strong> คือโปรแกรมที่ติดตั้งในเครื่องของเรา ทำงานได้แม้ไม่มีอินเทอร์เน็ต ส่วน <strong>GitHub, GitLab, Bitbucket</strong> คือ <strong>บริการรับฝาก Git Repository บนอินเทอร์เน็ต</strong> (Remote Repository) ที่เพิ่มเครื่องมือสำหรับทำงานเป็นทีม เปรียบได้ว่า Git คือ "กล้องถ่ายรูป" ส่วน GitHub คือ "อัลบั้มออนไลน์" ที่นำรูปไปเก็บและแชร์ให้ผู้อื่น
                </p>
                <table class="grading-table" style="margin: 15px 0;">
                    <tr style="background:#f1f5f9;">
                        <th width="16%">แพลตฟอร์ม</th>
                        <th width="24%">ความเป็นมา</th>
                        <th>จุดเด่น</th>
                    </tr>
                    <tr>
                        <td><strong>GitHub</strong></td>
                        <td>เปิดให้บริการปี 2008 บริษัท Microsoft ซื้อกิจการในปี 2018</td>
                        <td>ผู้ใช้มากที่สุดในโลก ศูนย์กลางโครงการโอเพนซอร์ส มีระบบ Pull Request, GitHub Actions (ทำงานอัตโนมัติ/CI/CD), GitHub Pages (ฝากเว็บฟรี) และสิทธิพิเศษสำหรับนักศึกษา (GitHub Student Developer Pack)</td>
                    </tr>
                    <tr>
                        <td><strong>GitLab</strong></td>
                        <td>เริ่มโครงการปี 2011 เป็นทั้งบริการออนไลน์และซอฟต์แวร์โอเพนซอร์ส</td>
                        <td>มีระบบ CI/CD ครบในตัว และ <strong>ติดตั้งบนเซิร์ฟเวอร์ขององค์กรเองได้</strong> (Self-managed) จึงนิยมในหน่วยงานที่ต้องเก็บโค้ดไว้ภายใน เรียกการขอรวมโค้ดว่า Merge Request</td>
                    </tr>
                    <tr>
                        <td><strong>Bitbucket</strong></td>
                        <td>เปิดให้บริการปี 2008 บริษัท Atlassian ซื้อกิจการในปี 2010</td>
                        <td>เชื่อมต่อกับเครื่องมือของ Atlassian อย่าง Jira และ Confluence ได้ดี นิยมในองค์กรที่ใช้เครื่องมือชุดนี้อยู่แล้ว</td>
                    </tr>
                </table>

                <p><strong>พื้นที่ทำงาน 3 ส่วนของ Git และ Remote</strong></p>
                <p>
                    การทำความเข้าใจ "พื้นที่" ที่ไฟล์อยู่ เป็นหัวใจของการใช้ Git ไฟล์ที่เราแก้ไขจะเดินทางผ่านพื้นที่ต่าง ๆ ตามลำดับดังรูปที่ 1.7 เปรียบได้กับการส่งพัสดุ คือ <strong>Working Directory</strong> คือโต๊ะทำงานที่เรากำลังจัดของ, <strong>Staging Area</strong> คือกล่องพัสดุที่เราเลือกของใส่ไว้ (ยังปิดกล่องไม่สนิท), <strong>Commit</strong> คือการปิดกล่องและติดใบเสร็จระบุวันเวลาและรายละเอียด แล้วเก็บเข้าคลังในเครื่อง (Local Repository) ส่วน <strong>Push</strong> คือการส่งกล่องทั้งหมดไปเก็บที่โกดังกลาง (Remote Repository เช่น GitHub)
                </p>

                <div class="image-container">
                    <div>
                        <figure class="custom-image-box" style="max-width: 860px;">
                            <img src="img/git-three-areas.svg" alt="แผนภาพพื้นที่ทำงานของ Git ได้แก่ Working Directory, Staging Area, Local Repository และ Remote Repository พร้อมคำสั่งที่ใช้" class="responsive-img">
                            <figcaption class="image-caption">
                                <strong>รูปที่ 1.7:</strong> การเดินทางของการเปลี่ยนแปลงผ่านพื้นที่ต่าง ๆ ของ Git และคำสั่งที่ใช้ในแต่ละช่วง
                                <span class="image-source">🔗 แหล่งอ้างอิงภาพ: ภาพประกอบจัดทำขึ้นสำหรับบทเรียนนี้</span>
                            </figcaption>
                        </figure>
                    </div>
                </div>

                <p><strong>คำสั่ง Git ที่ใช้บ่อย</strong></p>
                <table class="grading-table" style="margin: 15px 0;">
                    <tr style="background:#f1f5f9;">
                        <th width="36%">คำสั่ง</th>
                        <th>หน้าที่</th>
                    </tr>
                    <tr><td><code class="inline-code">git config --global user.name "ชื่อ"</code></td><td>ตั้งชื่อผู้บันทึกงาน (ทำครั้งเดียวต่อเครื่อง คู่กับ <code class="inline-code">user.email</code>)</td></tr>
                    <tr><td><code class="inline-code">git init</code></td><td>เริ่มต้นให้โฟลเดอร์ปัจจุบันเป็น Git Repository (สร้างโฟลเดอร์ซ่อน <code class="inline-code">.git</code>)</td></tr>
                    <tr><td><code class="inline-code">git clone &lt;URL&gt;</code></td><td>คัดลอก Repository จาก GitHub/GitLab มาไว้ที่เครื่อง พร้อมประวัติทั้งหมด</td></tr>
                    <tr><td><code class="inline-code">git status</code></td><td>ดูสถานะว่าไฟล์ใดถูกแก้ไข ไฟล์ใดอยู่ใน Staging Area (ควรใช้บ่อยที่สุด)</td></tr>
                    <tr><td><code class="inline-code">git add &lt;ไฟล์&gt;</code> หรือ <code class="inline-code">git add .</code></td><td>นำไฟล์ที่ระบุ (หรือทุกไฟล์) เข้า Staging Area</td></tr>
                    <tr><td><code class="inline-code">git commit -m "ข้อความ"</code></td><td>บันทึกสิ่งที่อยู่ใน Staging Area เป็นประวัติ 1 รายการ พร้อมข้อความอธิบาย</td></tr>
                    <tr><td><code class="inline-code">git log --oneline --graph</code></td><td>ดูประวัติ Commit แบบย่อพร้อมเส้นแสดง Branch</td></tr>
                    <tr><td><code class="inline-code">git diff</code></td><td>ดูว่าแก้ไขอะไรไปบ้างที่ยังไม่ได้ <code class="inline-code">add</code></td></tr>
                    <tr><td><code class="inline-code">git restore &lt;ไฟล์&gt;</code></td><td>ยกเลิกการแก้ไขไฟล์ที่ยังไม่ได้ Commit กลับไปเหมือนเดิม</td></tr>
                    <tr><td><code class="inline-code">git branch</code></td><td>แสดงรายชื่อ Branch ทั้งหมด (มีเครื่องหมาย * หน้า Branch ปัจจุบัน)</td></tr>
                    <tr><td><code class="inline-code">git switch -c &lt;ชื่อ&gt;</code></td><td>สร้าง Branch ใหม่และย้ายไปทำงานที่ Branch นั้นทันที</td></tr>
                    <tr><td><code class="inline-code">git switch &lt;ชื่อ&gt;</code></td><td>ย้ายไปยัง Branch ที่มีอยู่แล้ว</td></tr>
                    <tr><td><code class="inline-code">git merge &lt;ชื่อ&gt;</code></td><td>รวมงานจาก Branch ที่ระบุเข้ามายัง Branch ปัจจุบัน</td></tr>
                    <tr><td><code class="inline-code">git branch -d &lt;ชื่อ&gt;</code></td><td>ลบ Branch ที่ Merge เรียบร้อยแล้ว</td></tr>
                    <tr><td><code class="inline-code">git remote add origin &lt;URL&gt;</code></td><td>ผูก Repository ในเครื่องกับ Repository บน GitHub (ตั้งชื่อเล่นว่า origin)</td></tr>
                    <tr><td><code class="inline-code">git push</code></td><td>ส่ง Commit ในเครื่องขึ้นไปยัง Remote</td></tr>
                    <tr><td><code class="inline-code">git pull</code></td><td>ดึง Commit ใหม่จาก Remote มารวมกับงานในเครื่อง (เท่ากับ <code class="inline-code">fetch</code> + <code class="inline-code">merge</code>)</td></tr>
                    <tr><td><code class="inline-code">git fetch</code></td><td>ดาวน์โหลดข้อมูลใหม่จาก Remote มาดูก่อน แต่ยังไม่รวมเข้างานในเครื่อง</td></tr>
                </table>
                <p style="font-size:0.9rem; color:#64748b;">💡 บทความเก่าหลายแห่งใช้คำสั่ง <code class="inline-code">git checkout</code> สำหรับย้าย Branch และยกเลิกการแก้ไขไฟล์ ปัจจุบัน Git แยกหน้าที่นี้ออกเป็นคำสั่ง <code class="inline-code">git switch</code> และ <code class="inline-code">git restore</code> ซึ่งเข้าใจง่ายกว่า (ทั้งสองแบบยังใช้ได้)</p>

                <p><strong>Branch: การแตกสายงาน</strong></p>
                <p>
                    <strong>Branch</strong> คือ "สายงานคู่ขนาน" ที่แยกออกจากสายหลัก ลองนึกถึงการเขียนนิยายที่อยากทดลองตอนจบแบบใหม่ แทนที่จะแก้ต้นฉบับโดยตรง เราถ่ายสำเนาออกมาเขียนต่อ ถ้าตอนจบใหม่ดีก็นำกลับไปรวมกับต้นฉบับ ถ้าไม่ดีก็ทิ้งสำเนานั้นไปได้โดยต้นฉบับไม่เสียหาย ใน Git สายหลักมักชื่อ <code class="inline-code">main</code> และควรเป็นโค้ดที่ <strong>ทำงานได้เสมอ</strong> เมื่อจะเพิ่มฟีเจอร์ใหม่ให้แตก Branch ออกไป เช่น <code class="inline-code">feature/contact-page</code> ทำเสร็จแล้วจึง Merge กลับ
                </p>

                <p><strong>Merge: การรวมสายงาน</strong></p>
                <p>การ Merge มี 2 รูปแบบที่จะพบบ่อย ขึ้นอยู่กับว่าระหว่างที่แยกไปทำงาน สายหลัก <code class="inline-code">main</code> มีการเปลี่ยนแปลงหรือไม่ ดังรูปที่ 1.8</p>
                <ul style="margin-left: 20px;">
                    <li><strong>Fast-forward Merge:</strong> ระหว่างที่แยกไปทำ <code class="inline-code">main</code> ไม่มี Commit ใหม่เลย Git จึงเพียงแค่ "เลื่อนป้ายชื่อ main" ไปชี้ที่ Commit ล่าสุดของ Branch ที่นำมารวม ไม่ต้องสร้าง Commit ใหม่ (Git จะแสดงคำว่า <code class="inline-code">Fast-forward</code>)</li>
                    <li><strong>Merge Commit (3-way Merge):</strong> ทั้ง <code class="inline-code">main</code> และ Branch ต่างมี Commit ใหม่ Git จะเปรียบเทียบ 3 จุด (จุดแยก, ปลายของ main, ปลายของ Branch) แล้วสร้าง Commit พิเศษเพื่อรวมสองสาย เรียกว่า Merge Commit</li>
                </ul>

                <div class="image-container">
                    <div>
                        <figure class="custom-image-box" style="max-width: 860px;">
                            <img src="img/git-branch-merge.svg" alt="แผนภาพการแตก Branch และการ Merge แบบ Fast-forward และแบบ Merge Commit" class="responsive-img">
                            <figcaption class="image-caption">
                                <strong>รูปที่ 1.8:</strong> การแตก Branch และการ Merge แบบ Fast-forward (ซ้าย) และแบบสร้าง Merge Commit (ขวา)
                                <span class="image-source">🔗 แหล่งอ้างอิงภาพ: ภาพประกอบจัดทำขึ้นสำหรับบทเรียนนี้</span>
                            </figcaption>
                        </figure>
                    </div>
                </div>

                <p><strong>Conflict: เมื่อ Git ตัดสินใจเองไม่ได้</strong></p>
                <p>
                    ส่วนใหญ่ Git รวมงานให้อัตโนมัติได้ แม้ทั้งสองฝั่งจะแก้ไฟล์เดียวกัน ตราบใดที่ <strong>แก้คนละบรรทัด</strong> แต่ถ้าทั้งสองฝั่ง <strong>แก้บรรทัดเดียวกันให้ต่างกัน</strong> Git จะไม่เดาเองว่าควรเลือกแบบไหน แต่จะหยุดการ Merge แล้วแจ้งว่าเกิด <strong>Merge Conflict</strong> พร้อมใส่เครื่องหมายพิเศษลงในไฟล์ให้นักพัฒนาเป็นผู้ตัดสินใจ ดังรูปที่ 1.9
                </p>

                <div class="image-container">
                    <div>
                        <figure class="custom-image-box" style="max-width: 860px;">
                            <img src="img/git-merge-conflict.svg" alt="แผนภาพการเกิด Merge Conflict เมื่อสอง Branch แก้บรรทัดเดียวกัน พร้อมเครื่องหมาย Conflict และขั้นตอนการแก้ไข" class="responsive-img">
                            <figcaption class="image-caption">
                                <strong>รูปที่ 1.9:</strong> Merge Conflict เกิดเมื่อสอง Branch แก้บรรทัดเดียวกัน และขั้นตอนการแก้ไข 3 ขั้น
                                <span class="image-source">🔗 แหล่งอ้างอิงภาพ: ภาพประกอบจัดทำขึ้นสำหรับบทเรียนนี้</span>
                            </figcaption>
                        </figure>
                    </div>
                </div>

                <p>ความหมายของเครื่องหมายที่ Git ใส่ลงในไฟล์เมื่อเกิด Conflict:</p>
                <table class="grading-table" style="margin: 15px 0;">
                    <tr style="background:#f1f5f9;">
                        <th width="36%">เครื่องหมาย</th>
                        <th>ความหมาย</th>
                    </tr>
                    <tr><td><code class="inline-code">&lt;&lt;&lt;&lt;&lt;&lt;&lt; HEAD</code></td><td>จุดเริ่มต้นเนื้อหาของ Branch ที่เราอยู่ปัจจุบัน (HEAD = ตำแหน่งปัจจุบัน)</td></tr>
                    <tr><td><code class="inline-code">=======</code></td><td>เส้นแบ่งระหว่างเนื้อหาของสองฝั่ง</td></tr>
                    <tr><td><code class="inline-code">&gt;&gt;&gt;&gt;&gt;&gt;&gt; ชื่อ-branch</code></td><td>จุดสิ้นสุดเนื้อหาจาก Branch ที่กำลังนำมารวม</td></tr>
                </table>
                <p>
                    <strong>วิธีแก้ Conflict</strong> คือเปิดไฟล์ แก้ให้เหลือเฉพาะเนื้อหาที่ถูกต้อง (จะเลือกฝั่งใดฝั่งหนึ่ง หรือผสมทั้งสองฝั่งก็ได้) <strong>ลบเครื่องหมายทั้ง 3 แบบออกให้หมด</strong> จากนั้นสั่ง <code class="inline-code">git add</code> เพื่อบอก Git ว่าแก้เสร็จแล้ว และ <code class="inline-code">git commit</code> เพื่อบันทึกผลการ Merge ถ้าไม่แน่ใจและต้องการยกเลิกการ Merge ทั้งหมดกลับไปสถานะก่อนเริ่ม ใช้คำสั่ง <code class="inline-code">git merge --abort</code> ได้เสมอ
                </p>

                <p><strong>การเขียน Commit Message ที่ดี</strong></p>
                <p>
                    ข้อความ Commit ควรสั้น กระชับ และบอกได้ว่า <strong>"Commit นี้ทำอะไร"</strong> หลีกเลี่ยงข้อความที่ไม่สื่อความหมาย เช่น <code class="inline-code">update</code>, <code class="inline-code">แก้</code>, <code class="inline-code">aaa</code> ทีมพัฒนาจำนวนมากใช้รูปแบบ <strong>Conventional Commits</strong> ที่ขึ้นต้นด้วยประเภทของงาน ดังนี้
                </p>
                <table class="grading-table" style="margin: 15px 0;">
                    <tr style="background:#f1f5f9;">
                        <th width="16%">ประเภท</th>
                        <th width="34%">ใช้เมื่อ</th>
                        <th>ตัวอย่าง</th>
                    </tr>
                    <tr><td><code class="inline-code">feat:</code></td><td>เพิ่มความสามารถใหม่</td><td><code class="inline-code">feat: add contact page</code></td></tr>
                    <tr><td><code class="inline-code">fix:</code></td><td>แก้ไขข้อผิดพลาด</td><td><code class="inline-code">fix: correct broken link on about page</code></td></tr>
                    <tr><td><code class="inline-code">style:</code></td><td>ปรับการตกแต่ง/จัดรูปแบบโค้ด โดยไม่เปลี่ยนการทำงาน</td><td><code class="inline-code">style: change heading color</code></td></tr>
                    <tr><td><code class="inline-code">docs:</code></td><td>แก้ไขเอกสาร เช่น README</td><td><code class="inline-code">docs: add setup steps to README</code></td></tr>
                    <tr><td><code class="inline-code">chore:</code></td><td>งานจัดการทั่วไป เช่น ตั้งค่า เพิ่มแพ็กเกจ</td><td><code class="inline-code">chore: add docker-compose for development</code></td></tr>
                </table>
                <blockquote>
                    <strong>📌 ศึกษาเพิ่มเติม:</strong> การใช้ Git ทำงานเป็นทีมอย่างเต็มรูปแบบ เช่น Pull Request, Code Review และ GitHub Actions ศึกษาได้ในรายวิชา <a href="../git/index.php">การพัฒนาระบบร่วมกันด้วยแพลตฟอร์ม (Collaboration Tools)</a>
                </blockquote>

                <!-- ===================== 1.7 ===================== -->
                <h4 class="topic-title" id="topic-1-7">เรื่องที่ 1.7: Docker กับงานพัฒนา Front-End</h4>
                <p>
                    ปัญหาคลาสสิกของการเรียนเขียนโปรแกรมคือ <em>"เครื่องเพื่อนรันได้ แต่เครื่องเรารันไม่ได้"</em> สาเหตุมักมาจากเวอร์ชันของ Node.js ไม่ตรงกัน ติดตั้งโปรแกรมไม่ครบ หรือระบบปฏิบัติการต่างกัน <strong>Docker</strong> แก้ปัญหานี้โดยบรรจุสภาพแวดล้อมทั้งหมดที่โปรแกรมต้องใช้ (ระบบปฏิบัติการ Linux ขนาดเล็ก + Node.js เวอร์ชันที่กำหนด) ไว้ใน <strong>Container</strong> ทำให้ทุกเครื่องรันโปรเจกต์ในสภาพแวดล้อมเดียวกันทุกประการ
                </p>
                <p><strong>ประโยชน์ของการใช้ Docker ในรายวิชานี้:</strong></p>
                <ul style="margin-left: 20px;">
                    <li><strong>ไม่ต้องติดตั้ง Node.js ลงเครื่อง:</strong> ใช้ Node.js ที่อยู่ใน Container แทน เครื่องสะอาดและไม่มีปัญหาเวอร์ชันชนกันระหว่างโปรเจกต์</li>
                    <li><strong>ทุกคนในห้องใช้เวอร์ชันเดียวกัน:</strong> กำหนดเวอร์ชันไว้ในไฟล์ <code class="inline-code">docker-compose.yml</code> ผู้สอนและผู้เรียนจึงได้ผลลัพธ์เหมือนกัน</li>
                    <li><strong>ใกล้เคียงการทำงานจริง:</strong> เซิร์ฟเวอร์จริงส่วนใหญ่ใช้ Linux และนิยมนำเว็บขึ้นระบบด้วย Docker</li>
                    <li><strong>เริ่มและหยุดได้ด้วยคำสั่งเดียว:</strong> <code class="inline-code">docker compose up</code> เพื่อเริ่ม และ <code class="inline-code">docker compose down</code> เพื่อหยุด</li>
                </ul>
                <table class="grading-table" style="margin: 15px 0;">
                    <tr style="background:#f1f5f9;">
                        <th width="20%">คำศัพท์ Docker</th>
                        <th>ความหมาย (เปรียบเทียบให้เข้าใจง่าย)</th>
                    </tr>
                    <tr><td><strong>Image</strong></td><td>แม่แบบของสภาพแวดล้อม เหมือน "แผ่นติดตั้งโปรแกรม" เช่น <code class="inline-code">node:22-alpine</code> คือ Linux ขนาดเล็ก (Alpine) ที่มี Node.js เวอร์ชัน 22 ติดตั้งไว้แล้ว</td></tr>
                    <tr><td><strong>Container</strong></td><td>สิ่งที่รันจริงซึ่งสร้างจาก Image เหมือน "โปรแกรมที่ติดตั้งเสร็จและเปิดใช้งานอยู่" สร้างได้หลาย Container จาก Image เดียว</td></tr>
                    <tr><td><strong>Bind Mount</strong></td><td>การ "แชร์โฟลเดอร์" บนเครื่องของเราให้ Container มองเห็น แก้ไฟล์ที่เครื่องเรา Container เห็นทันที</td></tr>
                    <tr><td><strong>Volume</strong></td><td>พื้นที่เก็บข้อมูลที่ Docker ดูแลเอง ข้อมูลไม่หายแม้ลบ Container ทิ้ง</td></tr>
                    <tr><td><strong>Port Mapping</strong></td><td>การเชื่อมช่องทางสื่อสาร เช่น <code class="inline-code">3000:3000</code> หมายถึงเปิด <code class="inline-code">localhost:3000</code> ที่เครื่องเรา แล้วส่งต่อเข้าพอร์ต 3000 ใน Container</td></tr>
                    <tr><td><strong>Docker Compose</strong></td><td>ไฟล์ <code class="inline-code">docker-compose.yml</code> ที่เขียนการตั้งค่าทั้งหมดไว้ แล้วสั่งงานด้วยคำสั่งสั้น ๆ ไม่ต้องพิมพ์คำสั่งยาวทุกครั้ง</td></tr>
                </table>

                <div class="image-container">
                    <div>
                        <figure class="custom-image-box" style="max-width: 860px;">
                            <img src="img/docker-nextjs-dev.svg" alt="แผนภาพการทำงานร่วมกันระหว่างเครื่อง Windows กับ Docker Container ขณะพัฒนา Next.js ผ่าน Bind Mount และ Port Mapping" class="responsive-img">
                            <figcaption class="image-caption">
                                <strong>รูปที่ 1.10:</strong> โค้ดและ Git อยู่บนเครื่อง Windows ส่วน Node.js และ Next.js ทำงานใน Container โดยเชื่อมกันผ่าน Bind Mount และ Port Mapping
                                <span class="image-source">🔗 แหล่งอ้างอิงภาพ: ภาพประกอบจัดทำขึ้นสำหรับบทเรียนนี้</span>
                            </figcaption>
                        </figure>
                    </div>
                </div>

                <p>
                    สังเกตในรูปที่ 1.10 ว่า <strong>Git ยังคงติดตั้งและใช้งานบนเครื่อง Windows</strong> ไม่ได้อยู่ใน Container เพราะโค้ดตัวจริงเก็บอยู่บนเครื่องของเรา (Container เพียงมองเห็นผ่าน Bind Mount) และ Git บน Windows เชื่อมต่อกับบัญชี GitHub และ VS Code ได้สะดวกกว่า ส่วน Docker ทำหน้าที่ "รันโปรแกรม" เท่านั้น การแบ่งหน้าที่แบบนี้เป็นรูปแบบที่นักพัฒนามืออาชีพใช้กันทั่วไป
                </p>

                <!-- ===================== 1.8 ===================== -->
                <h4 class="topic-title" id="topic-1-8">เรื่องที่ 1.8: การใช้ Git ร่วมกับโปรเจกต์ Next.js</h4>
                <p>
                    โปรเจกต์ Next.js มีไฟล์บางกลุ่มที่ <strong>ห้ามนำเข้า Git</strong> เพราะสร้างขึ้นใหม่ได้อัตโนมัติ มีขนาดใหญ่มาก หรือมีข้อมูลลับ คำสั่ง <code class="inline-code">create-next-app</code> จึงสร้างไฟล์ <code class="inline-code">.gitignore</code> มาให้ เพื่อบอก Git ว่าไม่ต้องติดตามไฟล์เหล่านี้
                </p>
                <table class="grading-table" style="margin: 15px 0;">
                    <tr style="background:#f1f5f9;">
                        <th width="28%">ไฟล์/โฟลเดอร์ใน .gitignore</th>
                        <th>เหตุผลที่ไม่นำเข้า Git</th>
                    </tr>
                    <tr><td><code class="inline-code">/node_modules</code></td><td>แพ็กเกจที่ติดตั้ง มีไฟล์นับหมื่นไฟล์ สร้างใหม่ได้ด้วย <code class="inline-code">npm install</code> จากรายชื่อใน <code class="inline-code">package.json</code></td></tr>
                    <tr><td><code class="inline-code">/.next/</code>, <code class="inline-code">/out/</code>, <code class="inline-code">/build</code></td><td>ผลลัพธ์จากการรัน dev/build สร้างใหม่ทุกครั้งที่รัน</td></tr>
                    <tr><td><code class="inline-code">.env*</code></td><td>ไฟล์เก็บค่าตั้งค่าและ <strong>ข้อมูลลับ</strong> เช่น รหัสผ่านฐานข้อมูล หรือ API Key ถ้าหลุดขึ้น GitHub สาธารณะ ผู้อื่นจะนำไปใช้ได้</td></tr>
                    <tr><td><code class="inline-code">*.pem</code>, <code class="inline-code">.vercel</code>, ไฟล์ log</td><td>ไฟล์กุญแจ ไฟล์ตั้งค่าเฉพาะเครื่อง และไฟล์บันทึกข้อผิดพลาด</td></tr>
                </table>
                <p>ในทางกลับกัน ไฟล์ที่ <strong>ต้องนำเข้า Git</strong> ได้แก่ โฟลเดอร์ <code class="inline-code">app/</code> และ <code class="inline-code">public/</code>, ไฟล์ <code class="inline-code">package.json</code> และ <strong><code class="inline-code">package-lock.json</code></strong> (ล็อกเวอร์ชันแพ็กเกจให้ทุกคนติดตั้งได้ตรงกัน), ไฟล์ตั้งค่าต่าง ๆ และ <code class="inline-code">docker-compose.yml</code> เพื่อให้ผู้อื่น clone ไปแล้วสั่ง <code class="inline-code">docker compose up</code> ได้ทันที</p>

                <p><strong>ขั้นตอนการทำงานที่แนะนำ (Feature Branch Workflow):</strong></p>
                <ol style="margin-left: 20px;">
                    <li>อยู่ที่ Branch <code class="inline-code">main</code> ซึ่งเว็บไซต์ทำงานได้ปกติ</li>
                    <li>แตก Branch ใหม่สำหรับงานที่จะทำ เช่น <code class="inline-code">git switch -c feature/contact-page</code></li>
                    <li>เขียนโค้ด และดูผลที่ <code class="inline-code">localhost:3000</code> ระหว่างทำ (Docker รันอยู่ตลอด)</li>
                    <li>Commit เป็นระยะ ๆ ทุกครั้งที่ทำงานย่อยเสร็จหนึ่งเรื่อง (Commit เล็กและบ่อย ดีกว่า Commit ใหญ่ครั้งเดียว)</li>
                    <li>เมื่อทำเสร็จ ตรวจสอบด้วย <code class="inline-code">npm run lint</code> และ <code class="inline-code">npm run build</code> ว่าไม่มีข้อผิดพลาด</li>
                    <li>กลับไปที่ <code class="inline-code">main</code> แล้ว <code class="inline-code">git merge</code> งานเข้ามา จากนั้น <code class="inline-code">git push</code> ขึ้น GitHub</li>
                </ol>
                <p style="font-size:0.9rem; color:#64748b;">💡 ปกติถ้าในเครื่องมี Git ติดตั้งอยู่ คำสั่ง <code class="inline-code">create-next-app</code> จะสั่ง <code class="inline-code">git init</code> และสร้าง Commit แรกให้อัตโนมัติ แต่ในปฏิบัติการนี้เราสร้างโปรเจกต์ภายใน Container (ซึ่งไม่มี Git) และระบุ <code class="inline-code">--disable-git</code> ไว้ เพื่อให้ผู้เรียนได้ฝึกเริ่มต้น Repository ด้วยตนเอง</p>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="lesson-section" id="workshop">
                <h3>🛠️ 4. ตัวอย่างการปฏิบัติการทีละขั้นตอน (Step-by-Step Walkthrough)</h3>
                <p>ในปฏิบัติการนี้ นักศึกษาจะสร้างโปรเจกต์ Next.js ที่รันอยู่ใน Docker ทดลองเขียนทั้งฝั่ง Frontend และ Backend แล้วใช้ Git บันทึกงาน แตก Branch, Merge และฝึกแก้ Conflict จนส่งงานขึ้น GitHub ได้สำเร็จ ทุกคำสั่งพิมพ์ใน Terminal ของ VS Code (PowerShell)</p>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 1</div>
                    <div class="step-detail">
                        <strong>เตรียมเครื่องมือ: Docker Desktop, Git และ VS Code</strong>
                        <ol style="margin-left: 20px;">
                            <li>ติดตั้ง <strong>Docker Desktop</strong> จาก <code class="inline-code">docker.com/products/docker-desktop</code> (ตัวติดตั้งจะแนะนำให้เปิดใช้ WSL2 ให้กดยืนยันตามขั้นตอน) แล้วเปิดโปรแกรมทิ้งไว้จนสถานะเป็น <strong>Running</strong></li>
                            <li>ติดตั้ง <strong>Git for Windows</strong> จาก <code class="inline-code">git-scm.com</code> (ใช้ค่าเริ่มต้นได้ทุกหน้าจอ)</li>
                            <li>ติดตั้ง <strong>Visual Studio Code</strong> จาก <code class="inline-code">code.visualstudio.com</code> แล้วเปิด Terminal ด้วยเมนู <strong>Terminal &gt; New Terminal</strong></li>
                        </ol>
                        <p>ตรวจสอบว่าทุกโปรแกรมพร้อมใช้งาน (ทุกคำสั่งต้องแสดงหมายเลขเวอร์ชัน ไม่ใช่ข้อความ Error):</p>
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
                            <pre>docker --version
docker compose version
git --version</pre>
                        </div>
                        <p>ตั้งค่าตัวตนของผู้บันทึกงานใน Git (ทำครั้งเดียวต่อเครื่อง ใช้ชื่อและอีเมลเดียวกับบัญชี GitHub) และตั้งชื่อ Branch เริ่มต้นเป็น <code class="inline-code">main</code>:</p>
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
                            <pre>git config --global user.name "Somchai Jaidee"
git config --global user.email "somchai@example.com"
git config --global init.defaultBranch main</pre>
                        </div>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 2</div>
                    <div class="step-detail">
                        <strong>สร้างโปรเจกต์ Next.js ด้วย Docker (ไม่ต้องติดตั้ง Node.js)</strong>
                        <p>สร้างโฟลเดอร์สำหรับเก็บงาน เช่น <code class="inline-code">D:\projects</code> (แนะนำให้ชื่อโฟลเดอร์เป็นภาษาอังกฤษและไม่มีช่องว่าง) แล้วเข้าไปในโฟลเดอร์นั้น:</p>
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
                            <pre>mkdir D:\projects
cd D:\projects</pre>
                        </div>
                        <p>สั่งให้ Docker สร้าง Container ชั่วคราวจาก Image <code class="inline-code">node:22-alpine</code> เพื่อรันคำสั่ง <code class="inline-code">create-next-app</code> (คำสั่งยาว 1 บรรทัด ให้คัดลอกทั้งหมด):</p>
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
                            <pre>docker run --rm -it -v "${PWD}:/work" -w /work node:22-alpine npx --yes create-next-app@latest first-nextjs-app --js --eslint --app --no-tailwind --no-src-dir --no-react-compiler --import-alias "@/*" --use-npm --skip-install --disable-git --yes</pre>
                        </div>
                        <p style="font-size:0.9rem; color:#64748b;">💡 ถ้าใช้ Command Prompt (CMD) แทน PowerShell ให้เปลี่ยน <code class="inline-code">"${PWD}:/work"</code> เป็น <code class="inline-code">"%cd%:/work"</code> ส่วนที่เหลือเหมือนเดิมทุกตัวอักษร</p>

                        <p>อธิบายแต่ละส่วนของคำสั่ง:</p>
                        <table class="grading-table" style="margin: 10px 0;">
                            <tr style="background:#f1f5f9;">
                                <th width="38%">ส่วนของคำสั่ง</th>
                                <th>ความหมาย</th>
                            </tr>
                            <tr><td><code class="inline-code">docker run --rm -it</code></td><td>สร้างและรัน Container ใหม่ <code class="inline-code">--rm</code> = ลบ Container ทิ้งเมื่อทำงานเสร็จ, <code class="inline-code">-it</code> = แสดงผลและโต้ตอบผ่าน Terminal ได้</td></tr>
                            <tr><td><code class="inline-code">-v "${PWD}:/work"</code></td><td>Bind Mount โฟลเดอร์ปัจจุบันบน Windows (<code class="inline-code">${PWD}</code>) ให้ Container เห็นเป็นโฟลเดอร์ <code class="inline-code">/work</code> ไฟล์ที่สร้างใน Container จึงปรากฏบนเครื่องเรา</td></tr>
                            <tr><td><code class="inline-code">-w /work</code></td><td>ให้คำสั่งทำงานในโฟลเดอร์ <code class="inline-code">/work</code></td></tr>
                            <tr><td><code class="inline-code">node:22-alpine</code></td><td>Image ที่ใช้ คือ Linux Alpine ที่มี Node.js 22 (ครั้งแรกจะดาวน์โหลดประมาณ 1–2 นาที)</td></tr>
                            <tr><td><code class="inline-code">npx --yes create-next-app@latest first-nextjs-app</code></td><td>รันเครื่องมือสร้างโปรเจกต์เวอร์ชันล่าสุด ตั้งชื่อโปรเจกต์ว่า <code class="inline-code">first-nextjs-app</code></td></tr>
                            <tr><td><code class="inline-code">--js --eslint --app</code></td><td>ใช้ภาษา JavaScript (TypeScript จะเรียนในหน่วยที่ 4), เปิดใช้ ESLint และใช้ App Router</td></tr>
                            <tr><td><code class="inline-code">--no-tailwind --no-src-dir --no-react-compiler</code></td><td>ยังไม่ใช้ Tailwind CSS (เรียนในหน่วยที่ 2), ไม่ใช้โฟลเดอร์ <code class="inline-code">src/</code> และไม่เปิด React Compiler เพื่อให้โครงสร้างเรียบง่ายที่สุด</td></tr>
                            <tr><td><code class="inline-code">--import-alias "@/*" --use-npm</code></td><td>ใช้ทางลัด <code class="inline-code">@/</code> สำหรับอ้างอิงไฟล์ และใช้ npm เป็นตัวจัดการแพ็กเกจ</td></tr>
                            <tr><td><code class="inline-code">--skip-install --disable-git --yes</code></td><td>ยังไม่ติดตั้งแพ็กเกจ (ให้ Docker Compose ติดตั้งในขั้นตอนที่ 3), ไม่สร้าง Git ให้ (เราจะทำเองในขั้นตอนที่ 7) และไม่ต้องถามคำถามเพิ่ม</td></tr>
                        </table>
                        <p>เมื่อเสร็จจะเห็นข้อความ <code class="inline-code">Success! Created first-nextjs-app</code> จากนั้นเปิดโฟลเดอร์โปรเจกต์ใน VS Code (เมนู <strong>File &gt; Open Folder</strong> เลือก <code class="inline-code">D:\projects\first-nextjs-app</code>) จะพบโครงสร้างไฟล์ดังนี้:</p>
                        <table class="grading-table" style="margin: 10px 0;">
                            <tr style="background:#f1f5f9;">
                                <th width="30%">ไฟล์/โฟลเดอร์</th>
                                <th>หน้าที่</th>
                            </tr>
                            <tr><td><code class="inline-code">app/</code></td><td>หัวใจของโปรเจกต์ มี <code class="inline-code">layout.js</code>, <code class="inline-code">page.js</code> (หน้าแรก), <code class="inline-code">globals.css</code> และ <code class="inline-code">page.module.css</code></td></tr>
                            <tr><td><code class="inline-code">public/</code></td><td>ไฟล์รูปภาพและไอคอนที่เรียกใช้ได้โดยตรง</td></tr>
                            <tr><td><code class="inline-code">package.json</code></td><td>ชื่อโปรเจกต์ รายชื่อแพ็กเกจ และคำสั่ง <code class="inline-code">dev</code>, <code class="inline-code">build</code>, <code class="inline-code">start</code>, <code class="inline-code">lint</code></td></tr>
                            <tr><td><code class="inline-code">next.config.mjs</code>, <code class="inline-code">eslint.config.mjs</code>, <code class="inline-code">jsconfig.json</code></td><td>ไฟล์ตั้งค่าของ Next.js, ESLint และทางลัดการอ้างอิงไฟล์</td></tr>
                            <tr><td><code class="inline-code">.gitignore</code></td><td>รายชื่อไฟล์ที่ไม่ต้องนำเข้า Git (อธิบายในเรื่องที่ 1.8)</td></tr>
                            <tr><td><code class="inline-code">README.md</code>, <code class="inline-code">AGENTS.md</code></td><td>เอกสารอธิบายโปรเจกต์ และคำแนะนำสำหรับผู้ช่วยเขียนโค้ด AI</td></tr>
                        </table>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 3</div>
                    <div class="step-detail">
                        <strong>สร้างไฟล์ docker-compose.yml และรันเว็บเซิร์ฟเวอร์พัฒนา</strong>
                        <p>สร้างไฟล์ใหม่ชื่อ <code class="inline-code">docker-compose.yml</code> ไว้ที่โฟลเดอร์นอกสุดของโปรเจกต์ (ระดับเดียวกับ <code class="inline-code">package.json</code>):</p>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">docker-compose.yml</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>
                                </button>
                            </div>
                            <pre>services:
  app:
    image: node:22-alpine
    container_name: first-nextjs-app
    working_dir: /app
    command: sh -c "npm install &amp;&amp; npm run dev -- --webpack"
    ports:
      - "3000:3000"
    volumes:
      - .:/app
      - node_modules:/app/node_modules
    environment:
      - WATCHPACK_POLLING=true

volumes:
  node_modules:</pre>
                        </div>
                        <p>อธิบายการตั้งค่าแต่ละบรรทัด:</p>
                        <ul style="margin-left: 20px;">
                            <li><code class="inline-code">services: app:</code> — ประกาศบริการ (Container) ชื่อ <code class="inline-code">app</code> ซึ่งจะใช้อ้างถึงในคำสั่ง เช่น <code class="inline-code">docker compose logs app</code></li>
                            <li><code class="inline-code">image: node:22-alpine</code> — ใช้ Image เดียวกับขั้นตอนที่ 2</li>
                            <li><code class="inline-code">working_dir: /app</code> — ให้คำสั่งทั้งหมดทำงานในโฟลเดอร์ <code class="inline-code">/app</code> ของ Container</li>
                            <li><code class="inline-code">command: sh -c "npm install &amp;&amp; npm run dev -- --webpack"</code> — เมื่อ Container เริ่ม ให้ติดตั้งแพ็กเกจ แล้วเปิดเซิร์ฟเวอร์พัฒนา (เครื่องหมาย <code class="inline-code">&amp;&amp;</code> หมายถึง "ทำคำสั่งแรกสำเร็จแล้วค่อยทำคำสั่งถัดไป")</li>
                            <li><code class="inline-code">ports: "3000:3000"</code> — เชื่อม <code class="inline-code">localhost:3000</code> บนเครื่องเรา เข้ากับพอร์ต 3000 ใน Container</li>
                            <li><code class="inline-code">.:/app</code> — Bind Mount โฟลเดอร์โปรเจกต์ (<code class="inline-code">.</code> คือโฟลเดอร์ปัจจุบัน) เข้าไปเป็น <code class="inline-code">/app</code> แก้ไฟล์ใน VS Code แล้ว Container เห็นทันที</li>
                            <li><code class="inline-code">node_modules:/app/node_modules</code> — เก็บแพ็กเกจไว้ใน Volume แยก เพราะแพ็กเกจบางตัวมีไฟล์เฉพาะสำหรับ Linux และทำให้ทำงานเร็วกว่าเก็บผ่าน Bind Mount (จะเห็นโฟลเดอร์ <code class="inline-code">node_modules</code> ว่าง ๆ บนเครื่อง ซึ่งเป็นเพียงจุดเชื่อมต่อของ Volume เป็นเรื่องปกติ)</li>
                            <li><code class="inline-code">WATCHPACK_POLLING=true</code> และ <code class="inline-code">--webpack</code> — บน Windows ตัว Container มัก "ไม่ได้ยิน" สัญญาณว่าไฟล์ถูกแก้ไขผ่าน Bind Mount จึงตั้งให้ Next.js ใช้ตัวรวมโค้ด webpack ร่วมกับโหมด <strong>polling</strong> (คอยตรวจไฟล์เป็นระยะ) ซึ่งเป็นวิธีที่เชื่อถือได้ที่สุดให้ Hot Reload ทำงาน (ถ้าใช้ macOS/Linux สามารถลบ <code class="inline-code">-- --webpack</code> ออกเพื่อใช้ Turbopack ซึ่งเร็วกว่าได้)</li>
                        </ul>
                        <p>สั่งเริ่มต้น Container ในโหมดเบื้องหลัง (<code class="inline-code">-d</code>) แล้วเปิดดู Log การทำงาน:</p>
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
docker compose logs -f app</pre>
                        </div>
                        <p>ครั้งแรกจะใช้เวลา 1–3 นาทีในการติดตั้งแพ็กเกจ รอจนเห็นข้อความประมาณนี้ (หมายเลขเวอร์ชันอาจต่างกันเล็กน้อย):</p>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">ผลลัพธ์ที่คาดว่าจะเห็น</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>
                                </button>
                            </div>
                            <pre>added 342 packages in 2m
...
▲ Next.js 16.4.6 (webpack)
- Local:         http://localhost:3000
✓ Ready in 1490ms</pre>
                        </div>
                        <p>กด <kbd>Ctrl</kbd>+<kbd>C</kbd> เพื่อออกจากหน้าจอ Log (Container ยังทำงานต่อในเบื้องหลัง) แล้วเปิดเบราว์เซอร์ไปที่ <code class="inline-code">http://localhost:3000</code> จะพบหน้าเริ่มต้นของ Next.js</p>
                        <p><strong>คำสั่ง Docker Compose ที่ใช้บ่อย</strong> (พิมพ์ในโฟลเดอร์โปรเจกต์):</p>
                        <table class="grading-table" style="margin: 10px 0;">
                            <tr style="background:#f1f5f9;">
                                <th width="38%">คำสั่ง</th>
                                <th>ความหมาย</th>
                            </tr>
                            <tr><td><code class="inline-code">docker compose up -d</code></td><td>เริ่มต้น Container ในเบื้องหลัง</td></tr>
                            <tr><td><code class="inline-code">docker compose logs -f app</code></td><td>ดูข้อความการทำงานแบบต่อเนื่อง (กด Ctrl+C เพื่อออก)</td></tr>
                            <tr><td><code class="inline-code">docker compose ps</code></td><td>ดูสถานะว่า Container ทำงานอยู่หรือไม่</td></tr>
                            <tr><td><code class="inline-code">docker compose exec app &lt;คำสั่ง&gt;</code></td><td>สั่งคำสั่งภายใน Container ที่กำลังทำงาน เช่น <code class="inline-code">docker compose exec app npm run lint</code></td></tr>
                            <tr><td><code class="inline-code">docker compose restart</code></td><td>รีสตาร์ต Container (ใช้เมื่อหน้าเว็บค้างหรือไม่อัปเดต)</td></tr>
                            <tr><td><code class="inline-code">docker compose down</code></td><td>หยุดและลบ Container (โค้ดบนเครื่องและ Volume ยังอยู่ครบ)</td></tr>
                        </table>

                        <div class="error-alert-box">
                            <span class="error-title">⚠️ ปัญหาที่พบบ่อยในขั้นตอนนี้</span>
                            <ul style="margin: 10px 0 0 20px;">
                                <li><strong>ขึ้นข้อความ <code>error during connect</code> หรือ <code>dockerDesktopLinuxEngine</code></strong> — ยังไม่ได้เปิด Docker Desktop หรือโปรแกรมยังเริ่มทำงานไม่เสร็จ ให้เปิด Docker Desktop รอจนสถานะเป็น Running แล้วสั่งใหม่</li>
                                <li><strong>ขึ้นข้อความ <code>port is already allocated</code></strong> — พอร์ต 3000 ถูกโปรแกรมอื่นใช้อยู่ ให้แก้บรรทัด <code>"3000:3000"</code> เป็น <code>"3001:3000"</code> แล้วเปิด <code>http://localhost:3001</code> แทน</li>
                                <li><strong>แก้ไฟล์แล้วหน้าเว็บไม่เปลี่ยน</strong> — ตรวจสอบว่าไฟล์ <code>docker-compose.yml</code> มี <code>WATCHPACK_POLLING=true</code> และ <code>--webpack</code> ครบ จากนั้นสั่ง <code>docker compose up -d</code> อีกครั้ง (ถ้าแก้ไฟล์ compose ต้องสั่ง up ใหม่ทุกครั้ง) หรือลอง <code>docker compose restart</code></li>
                                <li><strong>หน้าเว็บขึ้นว่าเชื่อมต่อไม่ได้</strong> — Container อาจยังติดตั้งแพ็กเกจไม่เสร็จ ให้ดู Log ด้วย <code>docker compose logs -f app</code> จนขึ้นคำว่า <code>Ready</code></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 4</div>
                    <div class="step-detail">
                        <strong>Frontend: แก้ไขหน้าแรก เพิ่ม Client Component และสร้างหน้าใหม่</strong>
                        <p>สร้างโฟลเดอร์ <code class="inline-code">app/components/</code> แล้วสร้างไฟล์ <code class="inline-code">Counter.js</code> (ปุ่มนับจำนวนครั้งที่กด ต้องทำงานในเบราว์เซอร์จึงขึ้นต้นด้วย <code class="inline-code">"use client"</code>):</p>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">app/components/Counter.js</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>
                                </button>
                            </div>
                            <pre>"use client";

import { useState } from "react";

export default function Counter() {
  const [count, setCount] = useState(0);

  return (
    &lt;div style={{ margin: "20px 0" }}&gt;
      &lt;p&gt;คุณกดปุ่มไปแล้ว {count} ครั้ง&lt;/p&gt;
      &lt;button onClick={() =&gt; setCount(count + 1)}&gt;กดเพิ่ม +1&lt;/button&gt;
    &lt;/div&gt;
  );
}</pre>
                        </div>
                        <p>เปิดไฟล์ <code class="inline-code">app/page.js</code> ลบโค้ดเดิมทั้งหมด แล้วแทนที่ด้วยโค้ดต่อไปนี้ (เปลี่ยนชื่อเป็นชื่อของนักศึกษาเอง):</p>
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
import Counter from "./components/Counter";

export default function Home() {
  const skills = ["HTML", "CSS", "JavaScript", "Git", "Docker"];

  return (
    &lt;main style={{ padding: "40px", fontFamily: "sans-serif" }}&gt;
      &lt;h1&gt;สวัสดี! ฉันชื่อ สมชาย ใจดี&lt;/h1&gt;
      &lt;p&gt;เว็บไซต์นี้สร้างด้วย Next.js และรันอยู่ภายใน Docker Container&lt;/p&gt;

      &lt;h2&gt;ทักษะที่กำลังเรียน&lt;/h2&gt;
      &lt;ul&gt;
        {skills.map((skill) =&gt; (
          &lt;li key={skill}&gt;{skill}&lt;/li&gt;
        ))}
      &lt;/ul&gt;

      &lt;Counter /&gt;

      &lt;p&gt;
        &lt;Link href="/about"&gt;ไปหน้าเกี่ยวกับฉัน →&lt;/Link&gt;
      &lt;/p&gt;
    &lt;/main&gt;
  );
}</pre>
                        </div>
                        <p>บันทึกไฟล์ (<kbd>Ctrl</kbd>+<kbd>S</kbd>) แล้วสังเกตเบราว์เซอร์ หน้าเว็บจะเปลี่ยนเองภายใน 1–2 วินาทีโดยไม่ต้องรีเฟรช (Hot Reload) ลองกดปุ่ม <strong>กดเพิ่ม +1</strong> ตัวเลขจะเพิ่มขึ้น</p>
                        <p>อธิบายโค้ด:</p>
                        <ul style="margin-left: 20px;">
                            <li><code class="inline-code">Home</code> เป็น <strong>Server Component</strong> (ไม่มี <code class="inline-code">"use client"</code>) ถูกสร้างเป็น HTML ที่เซิร์ฟเวอร์ใน Container แล้วส่งมาที่เบราว์เซอร์</li>
                            <li><code class="inline-code">skills.map(...)</code> วนสร้างแท็ก <code class="inline-code">&lt;li&gt;</code> จาก Array โดยต้องระบุ <code class="inline-code">key</code> ที่ไม่ซ้ำกันให้แต่ละรายการ</li>
                            <li><code class="inline-code">&lt;Counter /&gt;</code> คือ <strong>Client Component</strong> ที่ฝังอยู่ในหน้า Server Component ได้ ส่วนนี้เท่านั้นที่ส่ง JavaScript ไปทำงานในเบราว์เซอร์</li>
                            <li><code class="inline-code">&lt;Link&gt;</code> จาก <code class="inline-code">next/link</code> ใช้สร้างลิงก์ไปหน้าอื่นโดยไม่ต้องโหลดทั้งหน้าใหม่ ทำให้เปลี่ยนหน้าได้รวดเร็ว</li>
                        </ul>
                        <p>สร้างหน้า <code class="inline-code">/about</code> โดยสร้างโฟลเดอร์ <code class="inline-code">app/about/</code> และไฟล์ <code class="inline-code">page.js</code> ข้างใน:</p>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">app/about/page.js</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>
                                </button>
                            </div>
                            <pre>import Link from "next/link";

export default function About() {
  return (
    &lt;main style={{ padding: "40px", fontFamily: "sans-serif" }}&gt;
      &lt;h1&gt;เกี่ยวกับฉัน&lt;/h1&gt;
      &lt;p&gt;นักศึกษาระดับ ปวส. สาขาเทคโนโลยีสารสนเทศ&lt;/p&gt;
      &lt;Link href="/"&gt;← กลับหน้าแรก&lt;/Link&gt;
    &lt;/main&gt;
  );
}</pre>
                        </div>
                        <p>คลิกลิงก์ "ไปหน้าเกี่ยวกับฉัน" จะไปที่ <code class="inline-code">http://localhost:3000/about</code> โดยไม่ต้องตั้งค่า Routing ใด ๆ เพิ่ม นี่คือ File-based Routing ตามรูปที่ 1.5</p>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 5</div>
                    <div class="step-detail">
                        <strong>Backend: สร้าง API ด้วย Route Handler ในโปรเจกต์เดียวกัน</strong>
                        <p>สร้างโฟลเดอร์ <code class="inline-code">app/api/hello/</code> และไฟล์ <code class="inline-code">route.js</code> (สังเกตว่าชื่อไฟล์เป็น <code class="inline-code">route.js</code> ไม่ใช่ <code class="inline-code">page.js</code>):</p>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">app/api/hello/route.js</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>
                                </button>
                            </div>
                            <pre>export async function GET() {
  return Response.json({
    message: "สวัสดีจาก Backend ของ Next.js",
    course: "Front-End Development",
    students: 35,
  });
}</pre>
                        </div>
                        <p>เปิดเบราว์เซอร์ไปที่ <code class="inline-code">http://localhost:3000/api/hello</code> จะได้ผลลัพธ์เป็นข้อมูล JSON แทนหน้าเว็บ:</p>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">ผลลัพธ์ที่คาดว่าจะเห็น</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>
                                </button>
                            </div>
                            <pre>{"message":"สวัสดีจาก Backend ของ Next.js","course":"Front-End Development","students":35}</pre>
                        </div>
                        <p>อธิบาย: ฟังก์ชันชื่อ <code class="inline-code">GET</code> จะทำงานเมื่อมีการร้องขอแบบ HTTP GET (การเปิด URL ในเบราว์เซอร์คือ GET) และ <code class="inline-code">Response.json()</code> แปลง Object ของ JavaScript ให้เป็นข้อมูล JSON ส่งกลับไป โค้ดนี้ <strong>ทำงานที่เซิร์ฟเวอร์ภายใน Container เท่านั้น</strong> ไม่ถูกส่งไปที่เบราว์เซอร์ จึงเป็นที่ที่เหมาะสำหรับเชื่อมต่อฐานข้อมูลในอนาคต (หน่วยที่ 6) ถึงตรงนี้นักศึกษามีทั้ง Frontend และ Backend อยู่ในโปรเจกต์เดียวตามรูปที่ 1.4 แล้ว</p>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 6</div>
                    <div class="step-detail">
                        <strong>สั่งคำสั่ง npm ผ่าน Docker: ตรวจโค้ด (lint) และสร้างเวอร์ชันใช้งานจริง (build/start)</strong>
                        <p>ตรวจหาข้อผิดพลาดในโค้ดด้วย ESLint โดยสั่งเข้าไปใน Container ที่กำลังทำงาน (ถ้าไม่มีข้อความแจ้งเตือนใด ๆ แสดงว่าโค้ดผ่านการตรวจ):</p>
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
                        <p>ทดลองสร้างเวอร์ชันสำหรับใช้งานจริง (Production) ต้องหยุดเซิร์ฟเวอร์โหมดพัฒนาก่อน เพราะทั้งสองโหมดใช้พอร์ต 3000 เหมือนกัน จากนั้นสั่ง Build และ Start ใน Container ชั่วคราว:</p>
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
                        <p>ระหว่าง Build จะเห็นตารางสรุปหน้าเว็บทั้งหมด สัญลักษณ์ <code class="inline-code">○ (Static)</code> หมายถึงหน้านั้นถูกสร้างเป็น HTML ไว้ล่วงหน้า (SSG ตามเรื่องที่ 1.4):</p>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">ผลลัพธ์ที่คาดว่าจะเห็น</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>
                                </button>
                            </div>
                            <pre>✓ Compiled successfully
Route (app)
┌ ○ /
├ ○ /_not-found
├ ○ /about
└ ○ /api/hello

○  (Static)  prerendered as static content
...
▲ Next.js 16.4.6
- Local:         http://localhost:3000
✓ Ready in 514ms</pre>
                        </div>
                        <p>เปิด <code class="inline-code">http://localhost:3000</code> อีกครั้ง หน้าเว็บจะโหลดเร็วกว่าโหมดพัฒนาอย่างเห็นได้ชัด แต่จะไม่มี Hot Reload (แก้โค้ดแล้วต้อง Build ใหม่) เมื่อทดลองเสร็จให้กด <kbd>Ctrl</kbd>+<kbd>C</kbd> เพื่อหยุด แล้วกลับมาใช้โหมดพัฒนาตามเดิม:</p>
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
                            <pre>docker compose up -d</pre>
                        </div>
                        <p style="font-size:0.9rem; color:#64748b;">💡 <code class="inline-code">docker compose run --rm --service-ports</code> คือสร้าง Container ชั่วคราวจากการตั้งค่าของ <code class="inline-code">app</code> แต่ใช้คำสั่งที่เราระบุแทน <code class="inline-code">command</code> เดิม (<code class="inline-code">--service-ports</code> = เปิดพอร์ตตามที่ตั้งไว้ด้วย, <code class="inline-code">--rm</code> = ลบทิ้งเมื่อหยุด) ส่วนแพ็กเกจยังอยู่ครบเพราะเก็บใน Volume ชื่อ <code class="inline-code">node_modules</code></p>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 7</div>
                    <div class="step-detail">
                        <strong>Git: เริ่มต้น Repository, Commit แรก และส่งขึ้น GitHub</strong>
                        <p>คำสั่ง Git ทั้งหมดพิมพ์ใน Terminal ของ VS Code <strong>บนเครื่อง Windows</strong> ในโฟลเดอร์โปรเจกต์ (ไม่ต้องเข้าไปใน Container) เริ่มต้น Repository และดูสถานะ:</p>
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
                            <pre>git init
git status</pre>
                        </div>
                        <p>สังเกตผลของ <code class="inline-code">git status</code> จะเห็นไฟล์ <code class="inline-code">app/</code>, <code class="inline-code">docker-compose.yml</code>, <code class="inline-code">package.json</code>, <code class="inline-code">package-lock.json</code> เป็นต้น ในหัวข้อ <strong>Untracked files</strong> แต่ <strong>จะไม่เห็น</strong> <code class="inline-code">node_modules/</code> และ <code class="inline-code">.next/</code> เพราะถูกยกเว้นไว้ในไฟล์ <code class="inline-code">.gitignore</code> แล้ว นำไฟล์ทั้งหมดเข้า Staging Area และบันทึก Commit แรก:</p>
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
git commit -m "feat: create Next.js project running in Docker"
git log --oneline</pre>
                        </div>
                        <p>ส่งงานขึ้น GitHub:</p>
                        <ol style="margin-left: 20px;">
                            <li>เข้าสู่ระบบ <code class="inline-code">github.com</code> กดปุ่ม <strong>New repository</strong> ตั้งชื่อ <code class="inline-code">first-nextjs-app</code> เลือก <strong>Public</strong> และ <strong>ไม่ต้องติ๊ก</strong> "Add a README file" (เพราะเรามีไฟล์ในเครื่องแล้ว ถ้าติ๊กจะทำให้ประวัติสองฝั่งไม่ตรงกัน)</li>
                            <li>คัดลอก URL ของ Repository แล้วสั่งคำสั่งต่อไปนี้ (เปลี่ยน <code class="inline-code">ชื่อผู้ใช้</code> เป็นชื่อบัญชี GitHub ของตนเอง)</li>
                        </ol>
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
                            <pre>git remote add origin https://github.com/ชื่อผู้ใช้/first-nextjs-app.git
git branch -M main
git push -u origin main</pre>
                        </div>
                        <p>ครั้งแรกที่ Push ระบบจะเปิดหน้าต่างให้ล็อกอิน GitHub ผ่านเบราว์เซอร์ (Git Credential Manager) ให้ล็อกอินและกดอนุญาต เมื่อเสร็จให้รีเฟรชหน้า Repository บน GitHub จะเห็นไฟล์ทั้งหมดของโปรเจกต์ ส่วน <code class="inline-code">-u origin main</code> คือการจำว่า Branch <code class="inline-code">main</code> ในเครื่องคู่กับ <code class="inline-code">main</code> บน GitHub ครั้งต่อไปพิมพ์เพียง <code class="inline-code">git push</code> ก็พอ</p>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 8</div>
                    <div class="step-detail">
                        <strong>Git: แตก Branch เพื่อเพิ่มหน้าติดต่อ แล้ว Merge กลับ (Fast-forward)</strong>
                        <p>สร้าง Branch ใหม่สำหรับฟีเจอร์ "หน้าติดต่อ" และย้ายไปทำงานที่ Branch นั้น:</p>
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
                            <pre>git switch -c feature/contact-page
git branch</pre>
                        </div>
                        <p>คำสั่ง <code class="inline-code">git branch</code> จะแสดงเครื่องหมาย <code class="inline-code">*</code> หน้า <code class="inline-code">feature/contact-page</code> ซึ่งเป็น Branch ปัจจุบัน สร้างไฟล์ <code class="inline-code">app/contact/page.js</code>:</p>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">app/contact/page.js</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>
                                </button>
                            </div>
                            <pre>export default function Contact() {
  return (
    &lt;main style={{ padding: "40px", fontFamily: "sans-serif" }}&gt;
      &lt;h1&gt;ติดต่อฉัน&lt;/h1&gt;
      &lt;p&gt;อีเมล: student@example.com&lt;/p&gt;
    &lt;/main&gt;
  );
}</pre>
                        </div>
                        <p>เปิด <code class="inline-code">http://localhost:3000/contact</code> ตรวจสอบว่าแสดงผลถูกต้อง แล้วบันทึก Commit:</p>
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
                            <pre>git add app/contact/page.js
git commit -m "feat: add contact page"</pre>
                        </div>
                        <p><strong>ทดลองสังเกต:</strong> สั่งกลับไปที่ <code class="inline-code">main</code> ด้วย <code class="inline-code">git switch main</code> แล้วรีเฟรช <code class="inline-code">localhost:3000/contact</code> จะพบหน้า <strong>404</strong> และไฟล์ <code class="inline-code">app/contact/</code> หายไปจาก VS Code เพราะบน Branch <code class="inline-code">main</code> ยังไม่มีไฟล์นี้ (งานไม่ได้หายไปไหน ยังเก็บอยู่ใน Branch <code class="inline-code">feature/contact-page</code>) จากนั้นรวมงานเข้ามา:</p>
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
                            <pre>git switch main
git merge feature/contact-page</pre>
                        </div>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">ผลลัพธ์ที่คาดว่าจะเห็น</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>
                                </button>
                            </div>
                            <pre>Updating fbf37b5..f77c49e
Fast-forward
 app/contact/page.js | 8 ++++++++
 1 file changed, 8 insertions(+)
 create mode 100644 app/contact/page.js</pre>
                        </div>
                        <p>คำว่า <code class="inline-code">Fast-forward</code> แสดงว่าเป็นการ Merge แบบเลื่อนตัวชี้ (รูปที่ 1.8 ซ้าย) เพราะระหว่างนั้น <code class="inline-code">main</code> ไม่มี Commit ใหม่ หน้า <code class="inline-code">/contact</code> กลับมาแสดงผลได้ เมื่อรวมเสร็จแล้วลบ Branch ที่ไม่ใช้ และส่งขึ้น GitHub:</p>
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
                            <pre>git branch -d feature/contact-page
git push</pre>
                        </div>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 9</div>
                    <div class="step-detail">
                        <strong>Git: จำลองการเกิด Merge Conflict และแก้ไข</strong>
                        <p>จำลองสถานการณ์ที่สมาชิกสองคนแก้หัวข้อหน้าแรก (บรรทัด <code class="inline-code">&lt;h1&gt;</code> ใน <code class="inline-code">app/page.js</code>) ไม่ตรงกัน <strong>ฝั่งที่ 1:</strong> แตก Branch ใหม่ แล้วแก้บรรทัด <code class="inline-code">&lt;h1&gt;</code> เป็น <code class="inline-code">&lt;h1&gt;ยินดีต้อนรับสู่เว็บไซต์ของ สมชาย&lt;/h1&gt;</code> บันทึกไฟล์ แล้ว Commit:</p>
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
                            <pre>git switch -c feature/new-title
# (แก้บรรทัด &lt;h1&gt; ใน app/page.js แล้วบันทึกไฟล์)
git commit -am "feat: change title to Thai welcome"</pre>
                        </div>
                        <p><strong>ฝั่งที่ 2:</strong> กลับไปที่ <code class="inline-code">main</code> (หัวข้อจะกลับเป็นข้อความเดิม) แล้วแก้บรรทัด <code class="inline-code">&lt;h1&gt;</code> บรรทัดเดียวกันเป็น <code class="inline-code">&lt;h1&gt;Hello! I am Somchai&lt;/h1&gt;</code> บันทึกไฟล์ แล้ว Commit:</p>
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
                            <pre>git switch main
# (แก้บรรทัด &lt;h1&gt; ใน app/page.js แล้วบันทึกไฟล์)
git commit -am "feat: change title to English"</pre>
                        </div>
                        <p style="font-size:0.9rem; color:#64748b;">💡 <code class="inline-code">git commit -am</code> คือการรวม <code class="inline-code">git add</code> (เฉพาะไฟล์ที่ Git ติดตามอยู่แล้วและถูกแก้ไข) กับ <code class="inline-code">git commit -m</code> ไว้ในคำสั่งเดียว ใช้ไม่ได้กับไฟล์ที่สร้างใหม่</p>
                        <p>ตอนนี้ทั้งสอง Branch แก้บรรทัดเดียวกันให้ต่างกัน ลอง Merge:</p>
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
                            <pre>git merge feature/new-title</pre>
                        </div>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">ผลลัพธ์ที่คาดว่าจะเห็น</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>
                                </button>
                            </div>
                            <pre>Auto-merging app/page.js
CONFLICT (content): Merge conflict in app/page.js
Automatic merge failed; fix conflicts and then commit the result.</pre>
                        </div>
                        <p>เปิดไฟล์ <code class="inline-code">app/page.js</code> ใน VS Code จะพบเครื่องหมาย Conflict ตามรูปที่ 1.9:</p>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">app/page.js (ขณะเกิด Conflict)</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>
                                </button>
                            </div>
                            <pre>&lt;&lt;&lt;&lt;&lt;&lt;&lt; HEAD
      &lt;h1&gt;Hello! I am Somchai&lt;/h1&gt;
=======
      &lt;h1&gt;ยินดีต้อนรับสู่เว็บไซต์ของ สมชาย&lt;/h1&gt;
&gt;&gt;&gt;&gt;&gt;&gt;&gt; feature/new-title</pre>
                        </div>
                        <p>
                            ระหว่างนี้หน้าเว็บที่ <code class="inline-code">localhost:3000</code> จะแสดง Error เพราะเครื่องหมาย <code class="inline-code">&lt;&lt;&lt;&lt;&lt;&lt;&lt;</code> ไม่ใช่โค้ด JavaScript ที่ถูกต้อง ถือเป็นเรื่องปกติและจะหายไปเมื่อแก้เสร็จ VS Code จะแสดงปุ่มเหนือเครื่องหมายให้เลือก ได้แก่ <strong>Accept Current Change</strong> (เลือกฝั่ง main), <strong>Accept Incoming Change</strong> (เลือกฝั่ง feature) และ <strong>Accept Both Changes</strong> (เก็บทั้งสองฝั่ง) หรือจะแก้เองก็ได้ ในตัวอย่างนี้ให้รวมทั้งสองภาษาเป็นบรรทัดเดียว และ <strong>ลบเครื่องหมายทั้งหมดออก</strong>:
                        </p>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">app/page.js (หลังแก้ไข)</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>
                                </button>
                            </div>
                            <pre>      &lt;h1&gt;ยินดีต้อนรับสู่เว็บไซต์ของ สมชาย (Hello! I am Somchai)&lt;/h1&gt;</pre>
                        </div>
                        <p>บันทึกไฟล์ (หน้าเว็บจะกลับมาแสดงผลปกติ) แล้วแจ้ง Git ว่าแก้ Conflict เสร็จ บันทึกผลการ Merge และดูประวัติแบบกราฟ:</p>
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
                            <pre>git add app/page.js
git commit -m "Merge feature/new-title and resolve title conflict"
git log --oneline --graph</pre>
                        </div>
                        <div class="code-window">
                            <div class="code-header">
                                <span class="code-lang">ผลลัพธ์ที่คาดว่าจะเห็น</span>
                                <button class="copy-icon-btn" onclick="copyCode(this)" title="คัดลอกโค้ด">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>
                                </button>
                            </div>
                            <pre>*   a9ed376 Merge feature/new-title and resolve title conflict
|\
| * ebaf9c0 feat: change title to Thai welcome
* | db365d0 feat: change title to English
|/
* f77c49e feat: add contact page
* fbf37b5 feat: create Next.js project running in Docker</pre>
                        </div>
                        <p>เส้นกราฟแสดงการแยกออกเป็นสองสายและมาบรรจบกันที่ Merge Commit ตรงกับรูปที่ 1.8 ด้านขวา (รหัส Commit ของแต่ละคนจะไม่เหมือนกัน) สุดท้ายลบ Branch และส่งงานขึ้น GitHub:</p>
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
                            <pre>git branch -d feature/new-title
git push</pre>
                        </div>
                        <p style="font-size:0.9rem; color:#64748b;">💡 ถ้าระหว่างแก้ Conflict เกิดสับสนและต้องการเริ่มใหม่ ให้สั่ง <code class="inline-code">git merge --abort</code> ทุกอย่างจะกลับไปเป็นสถานะก่อนสั่ง Merge</p>
                    </div>
                </div>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="assignment-box">
                <h3>📝 5. งานที่มอบหมายและเกณฑ์การประเมินผล (Assignment)</h3>
                <p><strong>ใบงานที่ 1: เว็บไซต์ Next.js ส่วนตัวบน Docker พร้อมประวัติการพัฒนาด้วย Git</strong></p>
                <br>
                <p><strong>คำสั่ง:</strong></p>
                <ul style="margin-left: 20px;">
                    <li>สร้างโปรเจกต์ Next.js และรันผ่าน Docker Compose ตามขั้นตอนที่ 1–3</li>
                    <li>หน้าแรกแสดงชื่อ-นามสกุล รายการทักษะ และปุ่ม Counter มีหน้า <code class="inline-code">/about</code> และ <code class="inline-code">/contact</code> ที่เป็นข้อมูลของนักศึกษาเอง</li>
                    <li>แก้ไข <code class="inline-code">/api/hello</code> ให้ส่งข้อมูล JSON เกี่ยวกับตนเอง (ชื่อ ชั้นปี สาขา) อย่างน้อย 3 รายการ</li>
                    <li>มีประวัติ Commit อย่างน้อย 5 Commit ที่เขียนข้อความตามรูปแบบ Conventional Commits มีการแตก Branch และ Merge อย่างน้อย 1 ครั้ง และมี Merge Commit ที่ผ่านการแก้ Conflict อย่างน้อย 1 ครั้ง</li>
                    <li>ส่งลิงก์ GitHub Repository พร้อมภาพหน้าจอ (1) หน้าเว็บ <code class="inline-code">localhost:3000</code> (2) ผลลัพธ์ <code class="inline-code">/api/hello</code> (3) ผลลัพธ์คำสั่ง <code class="inline-code">git log --oneline --graph</code> ในระบบควบคุมห้องเรียน</li>
                </ul>

                <br>
                <p><strong>📊 เกณฑ์การตัดคะแนน (คะแนนเต็ม 5 คะแนน):</strong></p>
                <ul style="margin-left: 20px; font-size: 0.9rem; color: #78350f;">
                    <li>• สร้างโปรเจกต์และรันผ่าน Docker Compose ได้สำเร็จ มีไฟล์ <code>docker-compose.yml</code> ใน Repository (1 คะแนน)</li>
                    <li>• หน้าเว็บ (Frontend) และ API (Backend) ทำงานถูกต้องครบตามคำสั่ง (1 คะแนน)</li>
                    <li>• Commit อย่างน้อย 5 ครั้งพร้อมข้อความที่สื่อความหมาย และไม่มี <code>node_modules</code> หรือ <code>.next</code> ใน Repository (1 คะแนน)</li>
                    <li>• มีการแตก Branch, Merge และแก้ Conflict ปรากฏในกราฟประวัติ (1 คะแนน)</li>
                    <li>• Push ขึ้น GitHub ได้สำเร็จ พร้อมหลักฐานภาพหน้าจอครบ 3 ภาพ (1 คะแนน)</li>
                </ul>
            </section>

        </div>
    </div>

    <script src="../assets/js/script.js"></script>
</body>

</html>
