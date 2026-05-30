<?php
$base_dir = "../"; // ถอยกลับ 1 ชั้นไปที่ Root เพื่อให้เรียกคอมโพเนนต์ได้ถูกต้อง
$active_nav = "devops"; // ไฮไลต์เมนูที่วิชา DevOps
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน่วยที่ 15: Final DevOps Project (Presentation)</title>
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

        .pillar-card {
            background: #fafafa;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 18px;
            margin-bottom: 15px;
            border-left: 4px solid #8b5cf6;
        }

        .pillar-title {
            color: #4c1d95;
            font-weight: 700;
            margin-top: 0;
            margin-bottom: 8px;
            font-size: 1.05rem;
        }

        .rubric-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            font-size: 0.92rem;
        }

        .rubric-table th {
            background: #f1f5f9;
            color: #334155;
            text-align: left;
            padding: 10px;
            border: 1px solid #cbd5e1;
        }

        .rubric-table td {
            padding: 10px;
            border: 1px solid #e2e8f0;
            vertical-align: top;
        }
    </style>
</head>

<body style="background-color: #f8fafc;">

    <?php include '../components/navbar.php'; ?>

    <div class="page-header" style="background: #0f172a; color: #fff; padding: 40px 0 65px 0; border-bottom: 4px solid #8b5cf6;">
        <div class="container">
            <a href="index.php" class="back-link" style="color: #ddd6fe; text-decoration: none; display: inline-block; margin-bottom: 15px;">
                <span class="arrow-icon">⬅</span> <span>กลับสู่หน้าหลักวิชา DevOps</span>
            </a>
            <div>
                <span class="course-code" style="background: #8b5cf6; color: #fff; padding: 4px 12px; border-radius: 4px; font-weight: 600; font-size: 0.9rem;">หน่วยที่ 15 (สัปดาห์ที่ 15)</span>
                <h2 style="margin: 10px 0 5px 0; font-size: 1.8rem; font-weight: 700;">Final DevOps Project (Presentation)</h2>
                <p style="color: #e2e8f0; margin: 0; font-size: 0.95rem;">ปัจฉิมนิเทศและสมรภูมินำเสนอโปรเจกต์: พิสูจน์ความเสถียรของระบบซอฟต์แวร์ผ่านท่อส่งมอบอัตโนมัติแบบครบวงจร</p>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 30px;">
        <main>
            <div class="content-area">

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 30px;">
                    <h3 class="section-title" style="color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">📘 ภาคสรุป: การผสานลูปวงจรซอฟต์แวร์ที่สมบูรณ์</h3>

                    <p>ยินดีต้อนรับนักศึกษาเข้าสู่สัปดาห์สุดท้ายของวิชา DevOps จากวันแรกที่เราเริ่มทำความรู้จักกับคำว่าเซิร์ฟเวอร์ วิ่งผ่านยุคคอนเทนเนอร์ (Docker) เขียนท่ออัตโนมัติ (CI/CD) จนถึงขั้นสแกนความปลอดภัยและตั้งระบบเฝ้าระวังภัย วันนี้คือวันที่ทุกจิ๊กซอว์จะถูกเชื่อมต่อเข้าด้วยกันเป็นภาพเดียว</p>
                    <p>ในโลกการทำงานจริง โปรเจกต์ที่ยอดเยี่ยมไม่ได้วัดกันที่ตัวซอร์สโค้ดฟีเจอร์หรูหราเพียงอย่างเดียว แต่วัดกันที่ <strong>"ความสามารถในการประคองตัว รักษาสภาพ และส่งมอบระบบได้อย่างยั่งยืนและปลอดภัยภายใต้ภาวะวิกฤต"</strong> การนำเสนอในวันนี้จึงเป็นการจำลองบทบาททีมของคุณเพื่อเข้า Pitching ระบบต่อหน้าผู้บริหารและทีมสถาปัตยกรรมระบบ (Enterprise Architect)</p>
                </section>

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 30px;">
                    <h3 class="section-title" style="color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">📋 ภาคตรวจสอบ: 6 เสาหลักที่โปรเจกต์ต้องมี (The Final Checklist)</h3>
                    <p style="margin-bottom: 20px;">ก่อนที่ทีมของนักศึกษาจะก้าวขึ้นสู่เวทีนำเสนอ ตรวจสอบให้แน่ใจว่าระบบของทีมมีส่วนประกอบครบถ้วนตามเกณฑ์สากลทั้ง 6 มิตินี้เรียบร้อยแล้ว:</p>

                    <div class="pillar-card">
                        <div class="pillar-title">1. Development & Architecture</div>
                        <p style="font-size: 0.92rem; color: #475569; margin: 0;">มีตัวแอปพลิเคชันเว็บที่ทำงานได้จริง (ฟังก์ชันหลักสมบูรณ์) และมีระบบการจัดเก็บซอร์สโค้ดที่มีโครงสร้างชัดเจนบน GitHub มีการแบ่ง Git Branch อย่างเป็นระบบ (เช่น main, develop)</p>
                    </div>

                    <div class="pillar-card" style="border-left-color: #06b6d4;">
                        <div class="pillar-title" style="color: #0891b2;">2. Quality & Security Assurance (DevSecOps)</div>
                        <p style="font-size: 0.92rem; color: #475569; margin: 0;">มีการแยกค่า Environment ความลับออกจากซอร์สโค้ดลงไฟล์ <code>.env</code> อย่างถูกต้อง มีชุดทดสอบ <strong>Unit Test</strong> บังคับรันผ่านท่อ และมีระบบสแกนช่องโหว่ความปลอดภัยด้วย <strong>Trivy</strong> ฝังตัวคอยสกัดโค้ดสกปรก</p>
                    </div>

                    <div class="pillar-card" style="border-left-color: #10b981;">
                        <div class="pillar-title" style="color: #059669;">3. Operations & Infrastructure (CI/CD)</div>
                        <p style="font-size: 0.92rem; color: #475569; margin: 0;">แอปพลิเคชันถูกแพ็กเป็น <strong>Docker Image</strong> ผ่าน Dockerfile ที่ได้รับการ Optimize เรียบร้อย และมีท่อ <strong>GitHub Actions</strong> วิ่งตรวจเช็กและกดสั่ง Automated Deploy ลงเซิร์ฟเวอร์ปลายทางทันทีเมื่อมีการ Commit งาน</p>
                    </div>

                    <div class="pillar-card" style="border-left-color: #f59e0b;">
                        <div class="pillar-title" style="color: #d97706;">4. Monitoring & Observability</div>
                        <p style="font-size: 0.92rem; color: #475569; margin: 0;">มีหน้าจอศูนย์บัญชาการ <strong>Grafana Dashboard</strong> เชื่อมต่อ Prometheus คอยพล็อตสถิติ CPU/RAM ของเครื่อง Production และระบบ <strong>Uptime Kuma</strong> คอยเฝ้าจับจังหวะล่มพร้อมตั้งระบบยิงแจ้งเตือน (Line/Discord)</p>
                    </div>

                    <div class="pillar-card" style="border-left-color: #ec4899;">
                        <div class="pillar-title" style="color: #db2777;">5. Documentation (Readiness)</div>
                        <p style="font-size: 0.92rem; color: #475569; margin: 0;">ที่หน้าแรกของคลัง Repository บน GitHub ต้องมีไฟล์ <code>README.md</code> ที่เขียนบอกเล่ารายละเอียดโปรเจกต์ ภาพไดอะแกรมสถาปัตยกรรมระบบ (Architecture Diagram) และอธิบายขั้นตอนวิธีการติดตั้งระบบตั้งแต่ศูนย์จนรันได้ไว้อย่างชัดเจน</p>
                    </div>

                    <div class="pillar-card" style="border-left-color: #3b82f6;">
                        <div class="pillar-title" style="color: #2563eb;">6. Business Metrics Visibility</div>
                        <p style="font-size: 0.92rem; color: #475569; margin: 0;">มีการทำตารางวิเคราะห์ประเมินสถิติ <strong>DORA Metrics</strong> ของทีม และมีการตั้งค่าเป้าหมายข้อตกลงระดับการให้บริการร่วมกัน (SLA/SLO) เพื่อสะท้อนความเข้าใจในแง่มุมของการขับเคลื่อนธุรกิจด้วยไอที</p>
                    </div>
                </section>

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0;">
                    <h3 class="section-title" style="color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">🎯 ภาระงานกลุ่ม: ข้อกำหนดการ Pitching และเกณฑ์การตัดคะแนน</h3>

                    <p>ให้เวลาแต่ละกลุ่มนำเสนอรวม <strong>15 นาที</strong> (Presentation & Live Demo 10 นาที, ตอบคำถามวิกฤตระบบ 5 นาที) ลำดับการลุยเนื้อหาควรสั้น กระชับ ไม่อารัมภบทนาน ให้เปิดตัวด้วยคุณค่าทางธุรกิจแล้วเจาะลึกที่ท่อขุมพลังวิศวกรรมทันที</p>

                    <h4 style="margin-top: 20px; color: #1e293b;">📊 ตารางเกณฑ์การประเมินผลคะแนน (Rubrics):</h4>
                    <table class="rubric-table">
                        <thead>
                            <tr>
                                <th style="width: 25%;">หัวข้อการประเมิน</th>
                                <th style="width: 15%; text-align: center;">คะแนนเต็ม</th>
                                <th style="width: 60%;">แนวทางการพิจารณาให้คะแนน</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>1. System Architecture & CI/CD Pipeline</strong></td>
                                <td style="text-align: center; font-weight: bold; color: #4f46e5;">30</td>
                                <td>โครงสร้างไฟล์คมชัด ท่อ GitHub Actions ทำงานลื่นไหลไม่มีสะดุด สามารถแสดงการกด Push โค้ดสด ๆ แล้วหน้าเว็บปลายทางเปลี่ยนสลับเวอร์ชันได้จริงอย่างไร้รอยต่อ</td>
                            </tr>
                            <tr>
                                <td><strong>2. DevSecOps & Observability Integration</strong></td>
                                <td style="text-align: center; font-weight: bold; color: #4f46e5;">30</td>
                                <td>ระบบความปลอดภัย Trivy ทำงานจริง หน้าจอ Grafana และ Uptime Kuma สามารถดึงค่าพล็อตเส้นกราฟพฤติกรรมระบบให้เห็นได้แบบ Real-time และระบบแจ้งเตือนเข้าแชตกลุ่มทำงานได้จริง</td>
                            </tr>
                            <tr>
                                <td><strong>3. Documentation & Business Value</strong></td>
                                <td style="text-align: center; font-weight: bold; color: #4f46e5;">20</td>
                                <td>ไฟล์ README.md สวยงาม มีรูปแผนผังไดอะแกรมคมชัด อ่านแล้วคนนอกสามารถพิมพ์คำสั่งรันตามได้ทันที มีการเขียนวิเคราะห์ค่าความเร็ว DORA Metrics ได้อย่างสมเหตุสมผล</td>
                            </tr>
                            <tr>
                                <td><strong>4. System Defense & Q&A (Chaos Test)</strong></td>
                                <td style="text-align: center; font-weight: bold; color: #4f46e5;">20</td>
                                <td><strong>ด่านปราบเซียน:</strong> อาจารย์จะทำการยิงคำถามจำลองสถานการณ์วิกฤตระบบพัง (เช่น "ถ้าเครื่องเซิร์ฟเวอร์หลักโดนยิงโหลดถล่มจนล่ม ทีมของคุณจะใช้กลไกที่เรียนมาในการกู้ระบบกลับมาภายในกี่นาที และมีขั้นตอนอย่างไร?") สมาชิกในกลุ่มต้องช่วยกันตอบเพื่อแสดงไหวพริบและการแก้ไขสถานการณ์</td>
                            </tr>
                        </tbody>
                    </table>
                </section>
            </div>

            <aside>
                <div class="sidebar-card" style="background: #fff; padding: 20px; border-radius: 8px; border: 1px solid #e2e8f0; margin-bottom: 20px;">
                    <h4 style="margin-top: 0; margin-bottom: 12px; font-size: 1.1rem; font-weight: 700; color: #1e293b;">📋 ข้อมูลประจำหน่วย</h4>
                    <p style="font-size: 0.9rem; color: #475569; line-height: 1.6; margin: 0;">
                        <strong>สัปดาห์ที่:</strong> 15 (สัปดาห์สุดท้าย)<br>
                        <strong>เวลาเรียน:</strong> 5 ชั่วโมง (ปฏิบัติการนำเสนอเต็มรูปแบบ)<br>
                        <strong>รูปแบบสิ่งส่งมอบ:</strong> ลิงก์สไลด์นำเสนอ + ลิงก์ GitHub คลังกลางของกลุ่มที่สมบูรณ์แบบ
                    </p>
                </div>

                <div class="sidebar-card" style="background: #fff; padding: 20px; border-radius: 8px; border: 1px solid #e2e8f0; border-left: 4px solid #8b5cf6;">
                    <h4 style="margin-top: 0; margin-bottom: 12px; font-size: 1.1rem; font-weight: 700; color: #6d28d9;">💡 "You build it, you run it"</h4>
                    <p style="font-size: 0.85rem; color: #64748b; line-height: 1.5; margin: 0;">
                        นี่คือคำกล่าวอมตะของ Werner Vogels (CTO ของ Amazon) ซึ่งเป็นหัวใจหลักของวิศวกรรม DevOps<br><br>
                        เมื่อกลุ่มของนักศึกษาได้สร้างระบบขึ้นมาแล้ว นักศึกษาก็คือผู้ที่มีสิทธิ์และหน้าที่ในการดูแล รักษาสภาพ และปกป้องมันให้ทำงานได้อย่างเสถียรที่สุด ความรู้จากวิชานี้จะเป็นรากฐานสำคัญที่ติดตัวนักศึกษาไปสู่การเป็นวิศวกรซอฟต์แวร์ระดับมืออาชีพในอนาคต ขอให้ทุกกลุ่มโชคดีกับการนำเสนอโปรเจกต์ในวันนี้ครับ!
                    </p>
                </div>
            </aside>
        </main>
    </div>

    <script src="../assets/js/script.js"></script>
</body>

</html>