<?php
$base_dir = "../"; // ถอยกลับ 1 ชั้นไปที่ Root เพื่อให้เรียกคอมโพเนนต์ได้ถูกต้อง
$active_nav = "devops"; // ไฮไลต์เมนูที่วิชา DevOps
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน่วยที่ 7: Automated Testing (การทดสอบอัตโนมัติ)</title>
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

        .test-pass {
            color: #10b981;
            font-weight: bold;
        }

        .test-fail {
            color: #ef4444;
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
                <span class="course-code" style="background: #7c3aed; color: #fff; padding: 4px 12px; border-radius: 4px; font-weight: 600; font-size: 0.9rem;">หน่วยที่ 7 (สัปดาห์ที่ 7)</span>
                <h2 style="margin: 10px 0 5px 0; font-size: 1.8rem; font-weight: 700;">Automated Testing (การทดสอบอัตโนมัติ)</h2>
                <p style="color: #e2e8f0; margin: 0; font-size: 0.95rem;">เปลี่ยนการนั่งคลิกทดสอบระบบด้วยมือ (Manual) สู่การเขียนสคริปต์ตรวจสอบลอจิกอัตโนมัติ สร้างความมั่นใจก่อนส่งโค้ดเข้าสู่ท่อ CI Pipeline</p>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 30px;">
        <main>
            <div class="content-area">

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 30px;">
                    <h3 class="section-title" style="color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">📘 ภาคทฤษฎีเจาะลึก: ระดับของการทดสอบซอฟต์แวร์</h3>

                    <p>ในโลกของ DevOps <strong>"ถ้าโค้ดไม่มี Test เท่ากับโค้ดนั้นใช้ไม่ได้"</strong> การทดสอบอัตโนมัติ (Automated Testing) คือการเขียน "โค้ดอีกชุดหนึ่ง" มาเพื่อตรวจสอบ "โค้ดแอปพลิเคชันของเรา" ว่ายังทำงานถูกต้องหรือไม่ โดยแบ่งระดับความละเอียดออกเป็นดังนี้:</p>

                    <h4 style="margin-top: 25px; color: #4f46e5;">1. Unit Test (ทดสอบระดับหน่วยย่อยที่สุด)</h4>
                    <p>Unit Test คือการแยกฟังก์ชันหรือเมธอด (Method) เล็กๆ ออกมาทดสอบแบบ <strong>โดดเดี่ยว (Isolation)</strong></p>
                    <ul style="padding-left: 20px; line-height: 1.6;">
                        <li><strong>จุดประสงค์:</strong> ตรวจสอบว่าลอจิกคณิตศาสตร์ เงื่อนไข If-Else ในฟังก์ชันนั้นทำงานถูกไหม</li>
                        <li><strong>ข้อควรระวัง:</strong> การทำ Unit Test <strong>ห้ามเชื่อมต่อกับ Database, ห้ามต่อ API ภายนอก หรืออ่านไฟล์ในเครื่องเด็ดขาด!</strong> (หากฟังก์ชันนั้นมีการดึงข้อมูล เราจะต้องทำสิ่งที่เรียกว่า "Mock" หรือจำลองข้อมูลปลอมขึ้นมาแทน)</li>
                        <li><strong>ความเร็ว:</strong> รันเป็นพันๆ เคสได้เสร็จภายในเวลาไม่ถึง 1 วินาที</li>
                    </ul>

                    <h4 style="margin-top: 25px; color: #059669;">2. Integration Test (ทดสอบการทำงานร่วมกัน)</h4>
                    <p>เมื่อ Unit Test ผ่านหมด แปลว่าอะไหล่แต่ละชิ้นทำงานได้ดี แต่ไม่ได้แปลว่าเมื่อนำมาประกอบกันแล้วรถจะวิ่งได้ <strong>Integration Test</strong> จึงเข้ามาทดสอบรอยต่อเหล่านี้</p>
                    <ul style="padding-left: 20px; line-height: 1.6;">
                        <li><strong>จุดประสงค์:</strong> ตรวจสอบว่าเมื่อฟังก์ชัน <code>A</code> เรียกใช้ฟังก์ชัน <code>B</code> หรือแอปพลิเคชันส่ง Query ไปที่ <code>Database</code> จริงๆ ข้อมูลจะบันทึกสำเร็จหรือไม่</li>
                        <li><strong>ความยาก:</strong> ต้องมีการตั้งค่า Test Database แยกต่างหาก เพื่อไม่ให้ข้อมูลทดสอบไปปนกับข้อมูลจริง</li>
                        <li><strong>ความเร็ว:</strong> ช้ากว่า Unit Test เพราะมีการอ่าน/เขียนระบบไฟล์หรือเครือข่าย</li>
                    </ul>

                    <h4 style="margin-top: 25px; color: #ea580c;">3. Test Coverage (ความครอบคลุมของการทดสอบ)</h4>

                    <p><strong>Test Coverage</strong> คือตัวชี้วัด (เป็นเปอร์เซ็นต์ %) ว่าสคริปต์ทดสอบของเรา วิ่งผ่านซอร์สโค้ดในโปรเจกต์ครอบคลุมกี่บรรทัด โดยประเมินจาก:</p>
                    <ul style="padding-left: 20px; line-height: 1.6;">
                        <li><strong>Line Coverage:</strong> โค้ดทุกบรรทัดถูกรันผ่านการทดสอบหรือยัง?</li>
                        <li><strong>Branch Coverage:</strong> เงื่อนไข <code>if / else / switch</code> ถูกทดสอบครบทุกเส้นทาง (True และ False) หรือยัง?</li>
                    </ul>
                    <p style="background: #fef2f2; padding: 10px; border-left: 3px solid #ef4444; font-size: 0.9rem;"><em>คำแนะนำจากโปร:</em> ไม่จำเป็นต้องทำ Test Coverage ให้ได้ 100% เสมอไป (เพราะมันกินเวลามาก) ระดับมาตรฐานอุตสาหกรรมมักตั้งเกณฑ์ขั้นต่ำไว้ที่ <strong>70% - 80%</strong> สำหรับโค้ดส่วนที่สำคัญ (Core Business Logic) ครับ</p>
                </section>

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 30px;">
                    <h3 class="section-title" style="color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">💻 ภาคปฏิบัติ: ลงมือเขียน Unit Test ด้วย Jest</h3>

                    <p>เราจะจำลองการทำงานด้วยโปรเจกต์ Node.js อย่างง่าย และใช้ <strong>Jest</strong> ซึ่งเป็นเฟรมเวิร์กทดสอบยอดนิยม ให้นักศึกษาเปิด Terminal และทำตามทีละขั้นตอน:</p>

                    <h4 style="margin-top: 20px;">Step 1: ตั้งค่าโปรเจกต์และติดตั้งเครื่องมือทดสอบ</h4>
                    <div class="code-window" style="background: #0f172a; color: #f8fafc; padding: 15px; border-radius: 8px; font-family: monospace; font-size: 0.95rem; margin-top: 10px;">
                        <span style="color: #60a5fa;"># สร้างโฟลเดอร์โปรเจกต์และเข้าไปที่โฟลเดอร์นั้น</span><br>
                        <span style="color: #a7f3d0;">mkdir auth-testing && cd auth-testing</span><br><br>
                        <span style="color: #60a5fa;"># ประกาศตัวเป็นโปรเจกต์ Node.js</span><br>
                        <span style="color: #a7f3d0;">npm init -y</span><br><br>
                        <span style="color: #60a5fa;"># ติดตั้ง Jest แบบ Developer Dependency (ใช้เฉพาะตอนพัฒนา)</span><br>
                        <span style="color: #a7f3d0;">npm install --save-dev jest</span>
                    </div>

                    <h4 style="margin-top: 25px;">Step 2: เขียนซอร์สโค้ดระบบหลัก (Target Code)</h4>
                    <p>สร้างไฟล์ชื่อ <code>auth.js</code> ซึ่งเปรียบเสมือนระบบ Login และระบบจัดการข้อมูล (CRUD พื้นฐาน) ของเรา:</p>
                    <div class="code-window" style="background: #1e1e1e; color: #d4d4d4; padding: 15px; border-radius: 8px; font-family: monospace; font-size: 0.95rem;">
                        <span style="color: #6a9955;">// auth.js</span><br>
                        <span style="color: #569cd6;">function</span> <span style="color: #dcdcaa;">login</span>(username, password) {<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #569cd6;">if</span> (!username || !password) <span style="color: #569cd6;">return</span> <span style="color: #569cd6;">false</span>;<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #569cd6;">if</span> (username === <span style="color: #ce9178;">"admin"</span> && password === <span style="color: #ce9178;">"secret123"</span>) <span style="color: #569cd6;">return</span> <span style="color: #569cd6;">true</span>;<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #569cd6;">return</span> <span style="color: #569cd6;">false</span>;<br>
                        }<br><br>

                        <span style="color: #569cd6;">function</span> <span style="color: #dcdcaa;">registerUser</span>(username, age) {<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #569cd6;">if</span> (age < <span style="color: #b5cea8;">18</span>) <span style="color: #569cd6;">return</span> <span style="color: #ce9178;">"Too young"</span>;<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #569cd6;">return</span> <span style="color: #ce9178;">"Success: "</span> + username;<br>
                            }<br><br>

                            <span style="color: #4ec9b0;">module</span>.exports = { login, registerUser };
                    </div>

                    <h4 style="margin-top: 25px;">Step 3: เขียน Unit Test Suite ตรวจสอบ</h4>
                    <p>สร้างไฟล์ชื่อ <code>auth.test.js</code> <em>(Jest จะหาไฟล์ที่ลงท้ายด้วย .test.js อัตโนมัติ)</em> การเขียน Test จะแบ่งเป็น <code>describe</code> (จัดหมวดหมู่) และ <code>it</code> (เคสทดสอบแต่ละเคส):</p>
                    <div class="code-window" style="background: #1e1e1e; color: #d4d4d4; padding: 15px; border-radius: 8px; font-family: monospace; font-size: 0.95rem;">
                        <span style="color: #6a9955;">// auth.test.js</span><br>
                        <span style="color: #569cd6;">const</span> { login, registerUser } = <span style="color: #dcdcaa;">require</span>(<span style="color: #ce9178;">'./auth'</span>);<br><br>

                        <span style="color: #dcdcaa;">describe</span>(<span style="color: #ce9178;">'Login Module Testing'</span>, () <span style="color: #569cd6;">=></span> {<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #dcdcaa;">it</span>(<span style="color: #ce9178;">'should return true for valid credentials'</span>, () <span style="color: #569cd6;">=></span> {<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #dcdcaa;">expect</span>(<span style="color: #dcdcaa;">login</span>(<span style="color: #ce9178;">"admin"</span>, <span style="color: #ce9178;">"secret123"</span>)).<span style="color: #dcdcaa;">toBe</span>(<span style="color: #569cd6;">true</span>);<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;});<br><br>

                        &nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #dcdcaa;">it</span>(<span style="color: #ce9178;">'should return false for wrong password'</span>, () <span style="color: #569cd6;">=></span> {<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #dcdcaa;">expect</span>(<span style="color: #dcdcaa;">login</span>(<span style="color: #ce9178;">"admin"</span>, <span style="color: #ce9178;">"wrong_pass"</span>)).<span style="color: #dcdcaa;">toBe</span>(<span style="color: #569cd6;">false</span>);<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;});<br>
                        });<br><br>

                        <span style="color: #dcdcaa;">describe</span>(<span style="color: #ce9178;">'Registration Module Testing'</span>, () <span style="color: #569cd6;">=></span> {<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #dcdcaa;">it</span>(<span style="color: #ce9178;">'should reject users under 18'</span>, () <span style="color: #569cd6;">=></span> {<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #dcdcaa;">expect</span>(<span style="color: #dcdcaa;">registerUser</span>(<span style="color: #ce9178;">"john"</span>, <span style="color: #b5cea8;">15</span>)).<span style="color: #dcdcaa;">toBe</span>(<span style="color: #ce9178;">"Too young"</span>);<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;});<br>
                        });
                    </div>

                    <h4 style="margin-top: 25px;">Step 4: สั่งรันการทดสอบและดู Test Coverage</h4>
                    <p>กลับมาที่ Terminal แล้วรันคำสั่ง: <code>npx jest --coverage</code> จะได้ผลลัพธ์ที่สวยงามแบบนี้:</p>
                    <div class="code-window" style="background: #0f172a; color: #f8fafc; padding: 15px; border-radius: 8px; font-family: monospace; font-size: 0.95rem;">
                        <span class="test-pass">PASS</span> ./auth.test.js<br>
                        &nbsp;&nbsp;Login Module Testing<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="test-pass">✓</span> should return true for valid credentials (2 ms)<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="test-pass">✓</span> should return false for wrong password (1 ms)<br>
                        &nbsp;&nbsp;Registration Module Testing<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="test-pass">✓</span> should reject users under 18 (1 ms)<br><br>

                        <span style="color: #94a3b8;">-----------------|---------|----------|---------|---------|-------------------</span><br>
                        <span style="color: #cbd5e1;">File | % Stmts | % Branch | % Funcs | % Lines | Uncovered Line #s </span><br>
                        <span style="color: #94a3b8;">-----------------|---------|----------|---------|---------|-------------------</span><br>
                        <span style="color: #f8fafc;">All files | 83.33 | 75 | 100 | 83.33 | </span><br>
                        <span style="color: #f8fafc;"> auth.js | 83.33 | 75 | 100 | 83.33 | 7 </span><br>
                        <span style="color: #94a3b8;">-----------------|---------|----------|---------|---------|-------------------</span><br>
                        <br>
                        <span class="test-pass">Test Suites: 1 passed, 1 total</span><br>
                        <span class="test-pass">Tests: 3 passed, 3 total</span>
                    </div>
                    <p style="margin-top: 10px; font-size: 0.9rem; color: #475569;"><em>(สังเกตว่า Branch Coverage เราได้ 75% และ Line 7 ไม่ถูกทดสอบ เพราะในโค้ดทดสอบ เรายังไม่ได้เขียนเคสที่ส่งค่า <code>username</code> หรือ <code>password</code> เป็นค่าว่าง (null) เข้าไปทดสอบนั่นเอง)</em></p>
                </section>

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0;">
                    <h3 class="section-title" style="color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">🎯 ใบงานปฏิบัติการ: ขยายผลชุดทดสอบ (Test Suite Expansion)</h3>

                    <div class="analogy-box" style="background: #faf5ff; border-left: 4px solid #7c3aed; padding: 15px; margin-bottom: 20px;">
                        <strong>🛠️ ภารกิจกลุ่ม: 100% Coverage Challenge</strong><br>
                        <span style="font-size: 0.95rem; color: #475569;">จากโค้ดตัวอย่างด้านบน (Step 2 และ 3) ให้นักศึกษานำไปเขียนลงในเครื่องของตนเอง และทำภารกิจเพิ่มเติมให้ Test Coverage กลายเป็น 100% เต็ม!</span>
                    </div>

                    <h4 style="margin-top: 15px;">ข้อกำหนดของใบงาน:</h4>
                    <ol style="padding-left: 20px; line-height: 1.7; margin-bottom: 0;">
                        <li>ให้นักศึกษาเขียน Test Case เพิ่มลงในไฟล์ <code>auth.test.js</code> เพื่อทดสอบเงื่อนไขการส่งข้อมูลว่าง (Empty string / Null) ในฟังก์ชัน Login </li>
                        <li>ให้นักศึกษาเขียน Test Case เพิ่มในหมวด <em>Registration</em> เพื่อทดสอบเงื่อนไขว่า ถ้าอายุ 18 ปีขึ้นไป (เช่น ส่งเลข 20) จะต้องได้รับข้อความ <code>"Success: [ชื่อ]"</code> กลับมา</li>
                        <li>รันคำสั่ง <code>npx jest --coverage</code> อีกครั้ง</li>
                        <li>แคปภาพหน้าจอผลลัพธ์ Terminal ที่แสดงว่า <strong>Tests Passed ทั้งหมด</strong> และตารางรายงานผลได้ <strong>% Stmts, Branch, Funcs, Lines เป็น 100 ทุกช่อง</strong> ส่งเข้าสู่ระบบเพื่อรับคะแนน</li>
                    </ol>
                </section>
            </div>

            <aside>
                <div class="sidebar-card" style="background: #fff; padding: 20px; border-radius: 8px; border: 1px solid #e2e8f0; margin-bottom: 20px;">
                    <h4 style="margin-top: 0; margin-bottom: 12px; font-size: 1.1rem; font-weight: 700; color: #1e293b;">📋 ข้อมูลประจำหน่วย</h4>
                    <p style="font-size: 0.9rem; color: #475569; line-height: 1.6; margin: 0;">
                        <strong>สัปดาห์ที่:</strong> 7<br>
                        <strong>เวลาเรียน:</strong> 5 ชั่วโมง (ทฤษฎี 1, ปฏิบัติ 4)<br>
                        <strong>เกณฑ์การประเมิน:</strong> <br>
                        - ติดตั้ง Jest และรัน Test Case โค้ดตัวอย่างได้สำเร็จ (3 คะแนน)<br>
                        - สามารถประยุกต์เขียน Test Case เพิ่มเติม (Login ว่าง, อายุผ่านเกณฑ์) ได้อย่างมีตรรกะถูกต้อง (4 คะแนน)<br>
                        - ผลลัพธ์ Test Coverage แตะระดับ 100% สมบูรณ์ (3 คะแนน)
                    </p>
                </div>

                <div class="sidebar-card" style="background: #fff; padding: 20px; border-radius: 8px; border: 1px solid #e2e8f0; border-left: 4px solid #ef4444;">
                    <h4 style="margin-top: 0; margin-bottom: 12px; font-size: 1.1rem; font-weight: 700; color: #ef4444;">🚨 คำเตือน: Flaky Tests</h4>
                    <p style="font-size: 0.85rem; color: #64748b; line-height: 1.5; margin: 0;">
                        ข้อควรระวังขั้นสุดของการเขียนเทสต์คืออาการ <strong>"Flaky Test (เทสต์ผีหลอก)"</strong> คือการที่สคริปต์ทดสอบของเรา บางครั้งรันผ่าน บางครั้งรันตก ทั้งๆ ที่ไม่ได้แก้โค้ดเลย!<br><br>
                        สาเหตุหลักมักมาจากการเชื่อมต่อ Date/Time ในเครื่อง, การอ้างอิง Network, หรือลำดับการสุ่ม ดังนั้น Unit Test ที่ดีจะต้อง <strong>"ให้ผลลัพธ์เหมือนเดิมเสมอ 100% ไม่ว่าจะรันกี่หมื่นครั้งก็ตาม"</strong> (Deterministic) ครับ
                    </p>
                </div>
            </aside>
        </main>
    </div>

    <script src="../assets/js/script.js"></script>
</body>

</html>