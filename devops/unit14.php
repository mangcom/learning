<?php
$base_dir = "../"; // ถอยกลับ 1 ชั้นไปที่ Root เพื่อให้เรียกคอมโพเนนต์ได้ถูกต้อง
$active_nav = "devops"; // ไฮไลต์เมนูที่วิชา DevOps
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน่วยที่ 14: Business Value และ AIOps</title>
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

        .code-comment {
            color: #6a9955;
            font-style: italic;
        }

        .prompt-title {
            color: #38bdf8;
            font-weight: bold;
        }

        .prompt-text {
            color: #e2e8f0;
        }

        .dora-card {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 12px;
        }

        .dora-badge {
            background: #6366f1;
            color: #fff;
            padding: 2px 8px;
            border-radius: 4px;
            font-size: 0.8rem;
            font-weight: bold;
            display: inline-block;
            margin-bottom: 5px;
        }
    </style>
</head>

<body style="background-color: #f8fafc;">

    <?php include '../components/navbar.php'; ?>

    <div class="page-header" style="background: #0f172a; color: #fff; padding: 40px 0 65px 0; border-bottom: 4px solid #6366f1;">
        <div class="container">
            <a href="index.php" class="back-link" style="color: #c7d2fe; text-decoration: none; display: inline-block; margin-bottom: 15px;">
                <span class="arrow-icon">⬅</span> <span>กลับสู่หน้าหลักวิชา DevOps</span>
            </a>
            <div>
                <span class="course-code" style="background: #6366f1; color: #fff; padding: 4px 12px; border-radius: 4px; font-weight: 600; font-size: 0.9rem;">หน่วยที่ 14 (สัปดาห์ที่ 14)</span>
                <h2 style="margin: 10px 0 5px 0; font-size: 1.8rem; font-weight: 700;">Business Value และ AIOps</h2>
                <p style="color: #e2e8f0; margin: 0; font-size: 0.95rem;">ประเมินความสำเร็จของวิศวกรรม DevOps ด้วย DORA Metrics และก้าวข้ามขีดจำกัดการพัฒนาด้วยพลังขยายของ Generative AI</p>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 30px;">
        <main>
            <div class="content-area">

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 30px;">
                    <h3 class="section-title" style="color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">📘 ภาคทฤษฎี: การวัดมูลค่าทางธุรกิจและความเสถียร</h3>

                    <p>การทำ DevOps ไม่ใช่แค่เรื่องของการติดตั้งเครื่องมือให้ดูทันสมัย แต่เป้าหมายที่แท้จริงคือการตอบสนองความต้องการทางธุรกิจขององค์กรได้อย่างรวดเร็วและปลอดภัย แล้วเราจะรู้ได้อย่างไรว่าทีมเรามีประสิทธิภาพสูงจริง? ในระดับสากลจะใช้ดัชนีชี้วัดที่เรียกว่า <strong>DORA Metrics</strong></p>

                    <h4 style="margin-top: 20px; color: #4f46e5;">DORA Metrics: 4 ตัวชี้วัดประสิทธิภาพทีมพัฒนาซอฟต์แวร์</h4>
                    <p>ทีมวิจัย DevOps Research and Assessment (DORA) ของ Google ได้วิเคราะห์ข้อมูลจากบริษัททั่วโลกและสรุปตัวชี้วัดหลัก 4 ตัวออกเป็น 2 มิติย่อย:</p>



                    <div class="dora-card">
                        <span class="dora-badge">มิติความเร็ว (Speed)</span>
                        <strong>1. Deployment Frequency (ความถี่ในการติดตั้งระบบ):</strong> ทีมของคุณสามารถดันโค้ดฟีเจอร์ใหม่ขึ้นระบบโปรดักชันจริงได้บ่อยแค่ไหน? (ทีมระดับ Elite จะทำได้วันละหลายครั้ง หรือทุกครั้งที่ต้องการ)
                    </div>

                    <div class="dora-card">
                        <span class="dora-badge">มิติความเร็ว (Speed)</span>
                        <strong>2. Lead Time for Changes (ระยะเวลาในการส่งมอบ):</strong> ตั้งแต่จังหวะที่นักพัฒนาเริ่มพิมพ์ Commit โค้ดตัวแรก จนถึงโค้ดตัวนั้นรันสำเร็จบน Production จริง ใช้เวลาเท่าไหร่? (ควรสั้นที่สุดในระดับนาทีหรือชั่วโมง ไม่ใช่เป็นเดือน)
                    </div>

                    <div class="dora-card" style="border-left: 4px solid #ef4444;">
                        <span class="dora-badge" style="background:#ef4444;">มิติความเสถียร (Stability)</span>
                        <strong>3. Change Failure Rate (อัตราความล้มเหลวของการเปลี่ยนแปลง):</strong> การ Deploy ทั้งหมดกี่เปอร์เซ็นต์ที่ทำให้ระบบพัง บั๊กกระจาย หรือต้องตามแก้หน้างานทันที? (เป้าหมายคือให้ต่ำกว่า 15%)
                    </div>

                    <div class="dora-card" style="border-left: 4px solid #ef4444;">
                        <span class="dora-badge" style="background:#ef4444;">มิติความเสถียร (Stability)</span>
                        <strong>4. Mean Time to Restore (MTTR - เวลาเฉลี่ยในการกู้คืนระบบ):</strong> เมื่อเกิดวิกฤตระบบล่มบนโปรดักชัน ทีมของคุณใช้เวลานานเท่าใดในการแก้ปัญหาและกู้ให้ระบบกลับมาใช้งานได้ตามปกติ? (ความเร็วของการทำ Rollback หรือย้อนอิมเมจในหน่วยที่ 11 จะส่งผลโดยตรงต่อตัวเลขนี้)
                    </div>

                    <h4 style="margin-top: 25px; color: #0369a1;">AIOps และบทบาทของ AI ต่อวิศวกรรมซอฟต์แวร์ยุกใหม่</h4>
                    <p><strong>AIOps (Artificial Intelligence for IT Operations)</strong> คือเทรนด์การนำปัญญาประดิษฐ์และ Machine Learning เข้ามาช่วยวิเคราะห์ Log มหาศาล ตรวจจับความผิดปกติของ Network อัตโนมัติ</p>
                    <p>ในมุมของนักพัฒนา (AI-Assisted Development) เครื่องมืออย่าง ChatGPT, GitHub Copilot, และ Cursor ได้เปลี่ยนวิถีการทำงาน จากเดิมที่ต้องนั่งพิมพ์โค้ดพื้นฐาน (Boilerplate) ด้วยตัวเอง มาเป็นการทำหน้าที่เป็น <strong>"ผู้ควบคุมและตรวจสอบ (Orchestrator)"</strong> โดยให้ AI ช่วยร่างโครงสร้าง สรุปหาจุดผิดพลาด และเขียนสคริปต์ทดสอบให้อย่างรวดเร็ว</p>
                </section>

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 30px;">
                    <h3 class="section-title" style="color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">💻 ภาคปฏิบัติ: เร่งความเร็วการทำงานลูป DevOps ด้วย Generative AI</h3>

                    <p>ในพาร์ตปฏิบัติการนี้ นักศึกษาจะได้เรียนรู้วิธีการเขียนคำสั่ง (Prompt Engineering) เพื่อสั่งการให้ AI ช่วยทำงานที่ซับซ้อนและใช้เวลาสูงในกระบวนการสร้างไปป์ไลน์</p>

                    <h4 style="margin-top: 20px; color: #0ea5e9;">Task 1: สั่ง AI เจนเนอเรต Unit Test (ปิดช่องโหว่ความเสี่ยง)</h4>
                    <p>เปิดโปรแกรม AI (เช่น ChatGPT หรือแผงแชตใน Cursor) แล้วทดลองป้อนคำสั่ง Prompt โครงสร้างบริบทแบบกำหนดบทบาท (Role-based Prompting) ดังตัวอย่างนี้:</p>

                    <div class="code-window" style="background: #0f172a; color: #f8fafc; padding: 15px; border-radius: 8px; font-family: monospace; font-size: 0.9rem; line-height: 1.6;">
                        <span class="prompt-title">[Context Prompt]</span><br>
                        <span class="prompt-text">คุณคือ Senior QA Engineer เชี่ยวชาญด้านการเขียนสคริปต์ทดสอบ จงเขียนไฟล์ทดสอบ Unit Test โดยใช้เฟรมเวิร์ก PHPUnit สำหรับฟังก์ชันการทำงานด้านล่างนี้ โดยให้ครอบคลุมกรณีการทดสอบ (Test Cases) ทั้งแบบปกติ (Success), ค่าว่าง (Empty) และกรณีส่งค่าผิดประเภท (Edge Cases):</span><br><br>
                        <span class="code-comment">// โค้ดที่ต้องการให้ตรวจรัน</span><br>
                        function calculateTax($price, $taxRate = 0.07) {<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;if ($price < 0) return 0;<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;return $price * $taxRate;<br>
                            }
                    </div>

                    <h4 style="margin-top: 25px; color: #0ea5e9;">Task 2: การสั่งรีแฟกเตอร์เพิ่มประสิทธิภาพและวิเคราะห์ Dockerfile</h4>
                    <p>บ่อยครั้งที่ Dockerfile ที่เราเขียนเองอาจมีขนาดใหญ่เกินไป หรือใช้คำสั่งที่ไม่ปลอดภัย เราสามารถส่งโค้ด Dockerfile ของกลุ่มไปให้ AI ตรวจสอบและรีวิวเพื่อทำ Multi-stage Build ได้:</p>
                    <div class="code-window" style="background: #0f172a; color: #f8fafc; padding: 15px; border-radius: 8px; font-family: monospace; font-size: 0.9rem; line-height: 1.6;">
                        <span class="prompt-title">[Optimization Prompt]</span><br>
                        <span class="prompt-text">จงตรวจสอบโครงสร้างไฟล์ Dockerfile ต่อไปนี้ หาจุดอ่อนด้านความปลอดภัย และทำการปรับปรุงแก้ไขให้เป็นโครงสร้างแบบ Multi-stage Build เพื่อลดขนาดของอิมเมจปลายทางให้เล็กและโหลดเร็วที่สุดตามหลักการ DevOps Best Practices:</span><br><br>
                        FROM node:20<br>
                        WORKDIR /app<br>
                        COPY . .<br>
                        RUN npm install<br>
                        EXPOSE 3000<br>
                        CMD ["node", "server.js"]
                    </div>

                    <h4 style="margin-top: 25px; color: #0ea5e9;">Task 3: การวิเคราะห์ความหมายของ Log ข้อผิดพลาด</h4>
                    <p>หากท่อส่งงาน CI/CD แตกเป็นสีแดง และพิมพ์ข้อความ Error ยาวเหยียดที่เราไม่คุ้นเคย ให้นักศึกษาใช้วิธีก๊อปปี้ท่อน Log นั้นส่งให้ AI วิเคราะห์ด้วยคำสั่งสั้น ๆ: <code>"จงอธิบายสาเหตุของ Error บรรทัดนี้ และบอกขั้นตอนวิธีแก้ไขทีละสเต็ป"</code> วิธีนี้จะช่วยลดค่าสถิติ <strong>MTTR</strong> ของทีมลงได้อย่างมหาศาล</p>
                </section>

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0;">
                    <h3 class="section-title" style="color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">🎯 ใบงานปฏิบัติการ: ปลดล็อกความเร็วการพัฒนาด้วยคู่หู AI</h3>

                    <div class="analogy-box" style="background: #fbf7ff; border-left: 4px solid #a855f7; padding: 15px; margin-bottom: 20px;">
                        <strong>🤖 ภารกิจกลุ่ม: Supercharged Development with AI</strong><br>
                        <span style="font-size: 0.95rem; color: #475569;">ให้นักศึกษานำโปรเจกต์กลุ่มมาทำการอัปเกรดระบบครั้งใหญ่ โดยบังคับให้สมาชิกในกลุ่มดึงพลังงานของ AI Tools เข้ามาช่วยสร้างโค้ดส่วนขยายและปรับปรุงท่อระบบให้มีเสถียรภาพสูงสุด</span>
                    </div>

                    <h4 style="margin-top: 15px;">ข้อกำหนดกิจกรรมและสิ่งส่งมอบ:</h4>
                    <ol style="padding-left: 20px; line-height: 1.7; margin-bottom: 0;">
                        <li>ให้สมาชิกในกลุ่มร่วมกันใช้เครื่องมือ AI (เช่น ChatGPT / Copilot / Cursor ตัวใดตัวหนึ่ง) ช่วยเขียนสคริปต์ <strong>Unit Test</strong> ให้กับโมดูลหรือฟังก์ชันสำคัญของโปรเจกต์กลุ่มอย่างน้อย 3 Test Cases</li>
                        <li>นำชุดโค้ดที่ AI สร้างขึ้น ไปรันจริงบนคอมพิวเตอร์และผูกลงท่อ CI/CD ของทีมบน GitHub เพื่อพิสูจน์ว่าสามารถรันผ่านไฟเขียวได้จริง</li>
                        <li>ใช้ AI ช่วยรีวิวโครงสร้างไฟล์ <code>Dockerfile</code> หรือไฟล์สคริปต์การ Deploy ของกลุ่ม ให้คำสั่งมีความกระชับ ปลอดภัย และบันทึกประวัติเปรียบเทียบขนาดไฟล์อิมเมจก่อนและหลังให้ AI ช่วยปรับแต่ง</li>
                        <li><strong>ส่งงาน:</strong> จัดทำเล่มรายงานสรุปภาพรวมผลงานของกลุ่มแนบลิงก์ GitHub โดยต้องมีหลักฐานดังนี้:
                            <br>1) ตัวอักษรหรือภาพหน้าจอข้อความ Prompt ที่ใช้สั่งงาน AI
                            <br>2) โค้ด Unit Test ที่ได้มาจากพลังของ AI และผลลัพธ์หน้าจอการรันผ่านบนระบบ GitHub Actions
                            <br>3) ตารางวิเคราะห์ประเมินค่าสถิติ <strong>DORA Metrics</strong> ของกลุ่มตนเอง (ประเมินว่าปัจจุบันกลุ่มเราจัดอยู่ในกลุ่มไหน: Low, Medium, High หรือ Elite)
                        </li>
                    </ol>
                </section>
            </div>

            <aside>
                <div class="sidebar-card" style="background: #fff; padding: 20px; border-radius: 8px; border: 1px solid #e2e8f0; margin-bottom: 20px;">
                    <h4 style="margin-top: 0; margin-bottom: 12px; font-size: 1.1rem; font-weight: 700; color: #1e293b;">📋 ข้อมูลประจำหน่วย</h4>
                    <p style="font-size: 0.9rem; color: #475569; line-height: 1.6; margin: 0;">
                        <strong>สัปดาห์ที่:</strong> 14<br>
                        <strong>เวลาเรียน:</strong> 5 ชั่วโมง (ทฤษฎี 1, ปฏิบัติ 4)<br>
                        <strong>เกณฑ์การประเมิน:</strong> <br>
                        - ความเข้าใจและการเขียนวิเคราะห์ค่า DORA Metrics ประเมินตนเองสมเหตุสมผล (2 คะแนน)<br>
                        - เทคนิคการป้อนข้อความคำสั่งสั่งงาน AI (Prompting) มีประสิทธิภาพสูง (4 คะแนน)<br>
                        - มีการนำผลลัพธ์ของ AI (Unit Test / Optimized Dockerfile) ไปรันผ่านระบบจริงบนคลังกลาง (4 คะแนน)
                    </p>
                </div>

                <div class="sidebar-card" style="background: #fff; padding: 20px; border-radius: 8px; border: 1px solid #e2e8f0; border-left: 4px solid #6366f1;">
                    <h4 style="margin-top: 0; margin-bottom: 12px; font-size: 1.1rem; font-weight: 700; color: #4f46e5;">💡 คำเตือน: AI ไม่ใช่ผู้วิเศษ</h4>
                    <p style="font-size: 0.85rem; color: #64748b; line-height: 1.5; margin: 0;">
                        แม้ว่าความสามารถของโมเดล AI ในปัจจุบันจะฉลาดและสามารถเขียนสคริปต์ที่ซับซ้อนได้อย่างรวดเร็ว แต่มันยังสามารถเกิดอาการ "หลอน/คิดไปเอง (Hallucination)" ได้ในบางกรณี<br><br>
                        ในฐานะวิศวกร DevOps หน้าที่ของคุณไม่ใช่การก๊อปปี้โค้ดมาวางตรง ๆ แต่คุณต้องมีความรู้พื้นฐานแน่นพอที่จะ <strong>อ่านทำความเข้าใจและตรวจสอบความถูกต้อง</strong> ของโค้ดที่ AI สร้างขึ้นมาให้อย่างละเอียดก่อนส่งขึ้นระบบจริงเสมอนะครับ
                    </p>
                </div>
            </aside>
        </main>
    </div>

    <script src="../assets/js/script.js"></script>
</body>

</html>