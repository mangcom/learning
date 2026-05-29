<?php
$base_dir = "../"; // ถอยกลับ 1 ชั้นไปที่ Root เพื่อให้เรียกคอมโพเนนต์ได้ถูกต้อง
$active_nav = "devops"; // ไฮไลต์เมนูที่วิชา DevOps
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน่วยที่ 8: Continuous Integration (CI)</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">

    <style>
        @media (min-width: 992px) {
            main {
                display: flex !important;
                gap: 30px !important;
                align-items: flex-start !important;
            }

            .content-area {
                flex: 1 !important;
                min-width: 0 !important;
            }

            aside {
                width: 320px !important;
                flex-shrink: 0 !important;
            }
        }

        .gh-pass {
            color: #10b981;
            font-weight: bold;
        }

        .gh-fail {
            color: #ef4444;
            font-weight: bold;
        }

        .gh-skip {
            color: #94a3b8;
            font-weight: bold;
        }
    </style>
</head>

<body style="background-color: #f8fafc;">

    <?php include '../components/navbar.php'; ?>

    <div class="page-header" style="background: #0f172a; color: #fff; padding: 40px 0 65px 0; border-bottom: 4px solid #7c3aed;">
        <div class="container">
            <a href="index.php" class="back-link" style="color: #c4b5fd; text-decoration: none; display: inline-block; margin-bottom: 15px;">
                <span class="arrow-icon">⬅</span> <span>กลับสู่หน้าหลักวิชา DevOps</span>
            </a>
            <div>
                <span class="course-code" style="background: #7c3aed; color: #fff; padding: 4px 12px; border-radius: 4px; font-weight: 600; font-size: 0.9rem;">หน่วยที่ 8 (สัปดาห์ที่ 8)</span>
                <h2 style="margin: 10px 0 5px 0; font-size: 1.8rem; font-weight: 700;">Continuous Integration (CI)</h2>
                <p style="color: #e2e8f0; margin: 0; font-size: 0.95rem;">สร้าง "ท่อสายพานอัตโนมัติ" เพื่อตรวจสอบคุณภาพซอร์สโค้ดทุกครั้งที่มีการ Push เรียนรู้กลไก GitHub Actions และปรัชญา Shift Left Testing</p>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 30px;">
        <main>
            <div class="content-area">

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 30px;">
                    <h3 class="section-title" style="color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">📘 ภาคทฤษฎี: แนวคิด CI และท่อประกอบซอฟต์แวร์อัตโนมัติ</h3>

                    <h4>1. Continuous Integration (CI) คืออะไร?</h4>
                    <p>ในอดีต โปรแกรมเมอร์แต่ละคนจะแยกกันเขียนโค้ดในเครื่องตัวเองเป็นเดือนๆ แล้วค่อยนำมา "รวมกัน (Integrate)" ในวันสุดท้าย ซึ่งมักจะเกิดปรากฏการณ์ <em>"Merge Hell (นรกของการรวมโค้ด)"</em> เพราะโค้ดตีกันพังพินาศ</p>
                    <p><strong>CI (Continuous Integration)</strong> จึงเป็นแนวปฏิบัติที่บังคับให้โปรแกรมเมอร์ทุกคน <strong>"ต้องรวมโค้ดเข้ากิ่งหลัก (main/develop) อย่างน้อยวันละ 1 ครั้ง"</strong> โดยทุกครั้งที่รวมโค้ด จะต้องมี "หุ่นยนต์" คอยตรวจสอบอัตโนมัติว่าโค้ดที่เข้ามาใหม่นั้น ทำให้ระบบเดิมพังหรือไม่</p>



                    <h4 style="margin-top: 25px;">2. Build Pipeline (ท่อสายพานอัตโนมัติ)</h4>
                    <p>หุ่นยนต์ที่คอยตรวจสอบโค้ด จะทำงานตามลำดับขั้นตอน (Pipeline) เหมือนสายพานโรงงานผลิตรถยนต์ หากมีขั้นตอนใดพัง (Fail) สายพานจะหยุดทันทีและแจ้งเตือนโปรแกรมเมอร์ โดยมาตรฐานมักประกอบด้วย:</p>
                    <ul style="padding-left: 20px; line-height: 1.6;">
                        <li><strong>1. Checkout:</strong> หุ่นยนต์ทำการดาวน์โหลดโค้ดล่าสุดจาก GitHub ลงมาที่เซิร์ฟเวอร์จำลอง</li>
                        <li><strong>2. Lint:</strong> ใช้เครื่องมือ (เช่น ESLint) ตรวจสอบว่าเขียนโค้ดถูกหลักไวยากรณ์และสวยงามหรือไม่ (Code Smell)</li>
                        <li><strong>3. Test:</strong> รัน Unit Test อัตโนมัติ (ที่เราทำในสัปดาห์ที่ 7) เพื่อเช็คว่าลอจิกคณิตศาสตร์ยังถูกต้องไหม</li>
                        <li><strong>4. Build:</strong> แปลงซอร์สโค้ด (เช่น React/TypeScript) ให้กลายเป็นไฟล์ที่พร้อมใช้งาน (Minified JS/CSS) หรือบีบอัดเป็นไฟล์ Artifact</li>
                    </ul>

                    <h4 style="margin-top: 25px;">3. ปรัชญา Shift Left Testing</h4>
                    <p>ลองจินตนาการเส้นเวลา (Timeline) การทำซอฟต์แวร์จากซ้ายไปขวา: <code>Design ➔ Code ➔ Build ➔ Test ➔ Release</code></p>
                    <p>การปล่อยให้ "Test" อยู่ด้านขวาสุด (รอให้ระบบเสร็จก่อนค่อยเทสต์) จะทำให้ค่าใช้จ่ายในการแก้บั๊กแพงมาก เพราะต้องรื้อสถาปัตยกรรมใหม่ <strong>"Shift Left"</strong> คือปรัชญาการเลื่อนกระบวนการ Testing และ Security ให้มาอยู่ <strong>"ด้านซ้าย (ทำตั้งแต่เนิ่นๆ)"</strong> คือเทสต์มันตั้งแต่ตอนพิมพ์โค้ด หรือตอนที่ Push โค้ดเข้า CI เลยนั่นเอง</p>
                </section>

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 30px;">
                    <h3 class="section-title" style="color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">💻 ภาคปฏิบัติ: สร้าง CI Pipeline ด้วย GitHub Actions</h3>

                    <p>เราจะสร้าง "ท่อสายพาน" บน GitHub โดยใช้ <strong>GitHub Actions</strong> ซึ่งเป็นเครื่องมือ CI/CD ฟรีที่ฝังมากับ GitHub ทุกครั้งที่เรา <code>git push</code> มันจะไปเช่า Server จำลอง (Runner) มารันคำสั่งให้เราโดยอัตโนมัติ</p>

                    <h4 style="margin-top: 20px;">Step 1: เตรียมโปรเจกต์ (Local)</h4>
                    <p>เปิดโฟลเดอร์โปรเจกต์จากสัปดาห์ที่แล้ว (หรือสร้างใหม่) ตรวจสอบให้แน่ใจว่าไฟล์ <code>package.json</code> ของคุณมีคำสั่ง (Scripts) สำหรับรันครบถ้วน ดังนี้:</p>
                    <div class="code-window" style="background: #1e1e1e; color: #d4d4d4; padding: 15px; border-radius: 8px; font-family: monospace; font-size: 0.95rem;">
                        <span style="color: #9cdcfe;">"scripts"</span>: {<br>
                        &nbsp;&nbsp;<span style="color: #9cdcfe;">"lint"</span>: <span style="color: #ce9178;">"echo '✅ Linting code... No code smells found!'"</span>,<br>
                        &nbsp;&nbsp;<span style="color: #9cdcfe;">"test"</span>: <span style="color: #ce9178;">"jest"</span>,<br>
                        &nbsp;&nbsp;<span style="color: #9cdcfe;">"build"</span>: <span style="color: #ce9178;">"echo '📦 Building project artifacts... Success!'"</span><br>
                        }
                    </div>
                    <p style="margin-top: 10px; font-size: 0.9rem; color: #475569;"><em>(เพื่อความรวดเร็วในคลาสเรียน เราจะจำลองคำสั่ง lint และ build ด้วยคำสั่ง echo ให้มันผ่านทันที ส่วน test จะเรียกใช้ jest ของจริง)</em></p>

                    <h4 style="margin-top: 25px;">Step 2: สร้างไฟล์ Workflow (YAML)</h4>
                    <p>GitHub Actions จะทำงานได้ ก็ต่อเมื่อเราสร้างไฟล์ <code>.yml</code> ไว้ในโฟลเดอร์ลับชื่อ <code>.github/workflows/</code> ให้นักศึกษาสร้างโครงสร้างโฟลเดอร์นี้ และสร้างไฟล์ชื่อ <code>ci.yml</code> ใส่โค้ดดังนี้:</p>

                    <div class="code-window" style="background: #0f172a; color: #f8fafc; padding: 15px; border-radius: 8px; font-family: monospace; font-size: 0.95rem; overflow-x: auto;">
                        <span style="color: #c792ea;">name:</span> Node.js CI Pipeline<br><br>
                        <span style="color: #60a5fa;"># 1. Trigger: ควบคุมให้ท่อนี้ทำงานเมื่อไหร่?</span><br>
                        <span style="color: #c792ea;">on:</span><br>
                        &nbsp;&nbsp;<span style="color: #c792ea;">push:</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #c792ea;">branches:</span> [ <span style="color: #a7f3d0;">"main"</span>, <span style="color: #a7f3d0;">"develop"</span> ]<br>
                        &nbsp;&nbsp;<span style="color: #c792ea;">pull_request:</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #c792ea;">branches:</span> [ <span style="color: #a7f3d0;">"main"</span> ]<br><br>

                        <span style="color: #60a5fa;"># 2. Jobs: ขั้นตอนการทำงานบนสายพาน</span><br>
                        <span style="color: #c792ea;">jobs:</span><br>
                        &nbsp;&nbsp;<span style="color: #c792ea;">build-and-test:</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #c792ea;">runs-on:</span> ubuntu-latest <span style="color: #60a5fa;"># เช่าเซิร์ฟเวอร์ Ubuntu ฟรีจาก GitHub</span><br><br>

                        &nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #c792ea;">steps:</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #60a5fa;"># ก๊อปปี้ซอร์สโค้ดลงมาที่เซิร์ฟเวอร์จำลอง</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #89ddff;">-</span> <span style="color: #c792ea;">name:</span> 📥 Checkout Code<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #c792ea;">uses:</span> actions/checkout@v3<br><br>

                        &nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #60a5fa;"># ติดตั้ง Node.js</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #89ddff;">-</span> <span style="color: #c792ea;">name:</span> ⚙️ Setup Node.js<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #c792ea;">uses:</span> actions/setup-node@v3<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #c792ea;">with:</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #c792ea;">node-version:</span> <span style="color: #a7f3d0;">'18.x'</span><br><br>

                        &nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #60a5fa;"># โหลด Dependencies ต่างๆ จาก package.json</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #89ddff;">-</span> <span style="color: #c792ea;">name:</span> 📦 Install Dependencies<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #c792ea;">run:</span> npm ci <span style="color: #60a5fa;"># ใช้ 'npm ci' แทน 'npm install' ในระบบ CI เพื่อความสเถียร</span><br><br>

                        &nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #60a5fa;"># เริ่มรันคำสั่งตรวจสอบตามลำดับ (Lint -> Test -> Build)</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #89ddff;">-</span> <span style="color: #c792ea;">name:</span> 🔍 Run Linting<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #c792ea;">run:</span> npm run lint<br><br>

                        &nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #89ddff;">-</span> <span style="color: #c792ea;">name:</span> 🧪 Run Unit Tests<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #c792ea;">run:</span> npm run test<br><br>

                        &nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #89ddff;">-</span> <span style="color: #c792ea;">name:</span> 🔨 Build Project<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #c792ea;">run:</span> npm run build
                    </div>

                    <h4 style="margin-top: 25px;">Step 3: Push ขึ้น GitHub และชมผลงาน</h4>
                    <p>ทำการ <code>git add .</code> ➔ <code>git commit -m "ci: add github actions pipeline"</code> ➔ <code>git push origin main</code> <br>
                        จากนั้นให้เปิดหน้าเว็บ GitHub ของโปรเจกต์กลุ่ม ไปที่แท็บ <strong>"Actions"</strong> นักศึกษาจะเห็นวงกลมสีเหลืองหมุนๆ หมายถึงเซิร์ฟเวอร์กำลังรัน หากทุกอย่างสำเร็จ จะได้เครื่องหมาย <strong>✅ ติ๊กถูกสีเขียว (Success)</strong></p>
                </section>

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0;">
                    <h3 class="section-title" style="color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">🎯 ใบงานปฏิบัติการ: ทำลายและกู้คืน (Break & Fix Pipeline)</h3>

                    <div class="analogy-box" style="background: #fef2f2; border-left: 4px solid #ef4444; padding: 15px; margin-bottom: 20px;">
                        <strong>💥 ภารกิจกลุ่ม: จำลองสถานการณ์โค้ดพัง!</strong><br>
                        <span style="font-size: 0.95rem; color: #475569;">เพื่อพิสูจน์ว่าหุ่นยนต์ GitHub Actions ของเราปกป้องระบบได้จริง ให้นักศึกษา "แกล้ง" แก้โค้ดให้ผิด เพื่อให้ท่อ CI พัง และแก้ไขกลับมาให้ไฟเขียว</span>
                    </div>

                    <h4 style="margin-top: 15px;">ขั้นตอนภารกิจ:</h4>
                    <ol style="padding-left: 20px; line-height: 1.7; margin-bottom: 0;">
                        <li><strong>แกล้งทำพัง (Break):</strong> เปิดไฟล์ซอร์สโค้ดหลัก (เช่น <code>auth.js</code>) แล้วแก้ลอจิกคณิตศาสตร์ให้ผิด (เช่น แก้ <code>if (age < 18)</code> เป็น <code>if (age < 99)</code>)</li>
                        <li>ทำการ Commit และ Push ขึ้นไปใหม่</li>
                        <li>ไปที่แท็บ Actions บน GitHub รอสักพักจะพบว่าท่อพังและขึ้นสถานะ <span class="gh-fail">❌ Failed</span> ให้นักศึกษาคลิกเข้าไปดูใน Log <strong>(แคปภาพหน้าจอที่ 1: แสดง Log แจ้งเตือน Test พัง)</strong></li>
                        <li><strong>กู้คืน (Fix):</strong> กลับมาที่โค้ด แก้ไขให้ถูกต้องตามเดิม ทำการ Commit (พร้อมเขียนข้อความ <code>fix: correct age logic</code>) และ Push อีกครั้ง</li>
                        <li>กลับไปที่ Actions จะพบว่าท่อกลับมาทำงานสำเร็จ <span class="gh-pass">✅ Success</span> <strong>(แคปภาพหน้าจอที่ 2: แสดง Pipeline วิ่งผ่าน 6 Steps สำเร็จ)</strong></li>
                    </ol>
                </section>
            </div>

            <aside>
                <div class="sidebar-card" style="background: #fff; padding: 20px; border-radius: 8px; border: 1px solid #e2e8f0; margin-bottom: 20px;">
                    <h4 style="margin-top: 0; margin-bottom: 12px; font-size: 1.1rem; font-weight: 700; color: #1e293b;">📋 ข้อมูลประจำหน่วย</h4>
                    <p style="font-size: 0.9rem; color: #475569; line-height: 1.6; margin: 0;">
                        <strong>สัปดาห์ที่:</strong> 8<br>
                        <strong>เวลาเรียน:</strong> 5 ชั่วโมง (ทฤษฎี 1, ปฏิบัติ 4)<br>
                        <strong>เกณฑ์การประเมิน:</strong> <br>
                        - ไฟล์ <code>.github/workflows/ci.yml</code> ถูกสร้างและ Push ขึ้นคลังอย่างถูกต้อง (3 คะแนน)<br>
                        - ภาพแคปหน้าจอการตั้งใจทำให้ CI Failed และวิเคราะห์ Log ได้ถูกต้อง (4 คะแนน)<br>
                        - ภาพแคปหน้าจอการกู้คืน CI กลับมาเป็นสีเขียว (Success) (3 คะแนน)
                    </p>
                </div>

                <div class="sidebar-card" style="background: #fff; padding: 20px; border-radius: 8px; border: 1px solid #e2e8f0; border-left: 4px solid #f59e0b;">
                    <h4 style="margin-top: 0; margin-bottom: 12px; font-size: 1.1rem; font-weight: 700; color: #d97706;">💡 ข้อควรระวัง: node_modules</h4>
                    <p style="font-size: 0.85rem; color: #64748b; line-height: 1.5; margin: 0;">
                        นักศึกษาหลายคนมักพลาดทำการ <code>git add .</code> โดยที่ลืมสร้างไฟล์ <code>.gitignore</code> ทำให้โฟลเดอร์ <strong>node_modules</strong> (ซึ่งมีขนาดหลายร้อยเมกะไบต์) ถูกอัปโหลดขึ้น GitHub ไปด้วย!<br><br>
                        ในระบบ CI หุ่นยนต์จะทำการรันคำสั่ง <code>npm ci</code> เพื่อดาวน์โหลดแพ็กเกจใหม่ทั้งหมดบนเซิร์ฟเวอร์เอง เราจึง <strong>ห้าม Push</strong> โฟลเดอร์ node_modules ขึ้นไปเด็ดขาดครับ
                    </p>
                </div>
            </aside>
        </main>
    </div>

    <script src="../assets/js/script.js"></script>
</body>

</html>