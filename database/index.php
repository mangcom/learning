<?php
$base_dir = "../"; // ถอยกลับ 1 ชั้นเพื่อไปหาโฟลเดอร์หลัก
$active_nav = "database"; // เปิดสถานะเมนูที่วิชา เทคโนโลยีการจัดการฐานข้อมูล
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าหลักวิชา: เทคโนโลยีการจัดการฐานข้อมูล</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

    <?php include '../components/navbar.php'; ?>

    <div class="page-header" style="background-color: var(--secondary); color: var(--white); padding: 40px 0;">
        <div class="container">
            <span class="course-code">🗄️ รหัสวิชา: 31901-2007 | หลักสูตร ปวส. 2567</span>
            <h2>เทคโนโลยีการจัดการฐานข้อมูล</h2>
            <p>(Database Management Technology) | โครงสร้าง 1–4–3 (3 หน่วยกิต)</p>

            <button id="openSpecsBtn" class="btn-course-specs" style="margin-top: 15px;">📄 ดูข้อมูลโครงสร้างหลักสูตรและแผนฐานสมรรถนะ</button>
        </div>
    </div>

    <div class="container">
        <div class="course-stats-grid">
            <div class="stat-card">
                <h3>8</h3>
                <p>หน่วยการเรียนรู้</p>
            </div>
            <div class="stat-card">
                <h3>15+3</h3>
                <p>สัปดาห์เรียน + สอบ</p>
            </div>
            <div class="stat-card">
                <h3>75</h3>
                <p>ชั่วโมงเรียนรวม (ท) 15 (ป) 60</p>
            </div>
            <div class="stat-card">
                <h3>3</h3>
                <p>หน่วยกิต (1-4-3)</p>
            </div>
        </div>

        <div class="main-content-layout" style="display: grid; grid-template-columns: 2fr 1fr; gap: 30px; margin-bottom: 40px;">

            <div class="units-column">
                <h3 class="section-title">📂 รายชื่อหน่วยการเรียนรู้ (สัปดาห์ที่ 1 - 15)</h3>
                <div class="unit-grid-layout" style="display: flex; flex-direction: column; gap: 20px;">

                    <div class="unit-card-horizontal" style="background:#fff; border:1px solid #e2e8f0; padding:20px; border-radius:10px; display:flex; justify-content:space-between; align-items:center;">
                        <div>
                            <span class="unit-badge" style="background:#f1f5f9; padding:3px 10px; border-radius:15px; font-size:0.8rem; font-weight:700;">หน่วยที่ 1</span>
                            <span style="font-size:0.8rem; color:#64748b; margin-left:10px; font-weight:600;">สัปดาห์ที่ 1-2 (10 ชม.)</span>
                            <h4 style="margin:8px 0 5px 0; color:#0f172a;">ความรู้เบื้องต้นและรูปแบบการจัดเก็บข้อมูลในระบบฐานข้อมูล</h4>
                            <p style="font-size:0.85rem; color:#475569; margin:0;">สถาปัตยกรรมฐานข้อมูล การจำแนก Relational เทียบกับ Non-Relational และโมเดลการเก็บข้อมูลแบบ Key-value และ Document เบื้องต้น</p>
                        </div>
                        <a href="unit1.php" class="btn-enter-unit" style="width:auto; white-space:nowrap; margin-left:20px;">ดูเนื้อหา ➔</a>
                    </div>

                    <div class="unit-card-horizontal" style="background:#fff; border:1px solid #e2e8f0; padding:20px; border-radius:10px; display:flex; justify-content:space-between; align-items:center;">
                        <div>
                            <span class="unit-badge" style="background:#f1f5f9; padding:3px 10px; border-radius:15px; font-size:0.8rem; font-weight:700;">หน่วยที่ 2</span>
                            <span style="font-size:0.8rem; color:#64748b; margin-left:10px; font-weight:600;">สัปดาห์ที่ 3 (5 ชม.)</span>
                            <h4 style="margin:8px 0 5px 0; color:#0f172a;">กลไกการจัดเก็บข้อมูลและสถาปัตยกรรม Storage Engine</h4>
                            <p style="font-size:0.85rem; color:#475569; margin:0;">โครงสร้าง คุณลักษณะ และการเลือกใช้ Storage Engine (InnoDB, MyISAM) ให้เหมาะสมกับลักษณะงาน</p>
                        </div>
                        <a href="unit2.php" class="btn-enter-unit" style="width:auto; white-space:nowrap; margin-left:20px;">ดูเนื้อหา ➔</a>
                    </div>

                    <div class="unit-card-horizontal" style="background:#fff; border:1px solid #e2e8f0; padding:20px; border-radius:10px; display:flex; justify-content:space-between; align-items:center;">
                        <div>
                            <span class="unit-badge" style="background:#f1f5f9; padding:3px 10px; border-radius:15px; font-size:0.8rem; font-weight:700;">หน่วยที่ 3</span>
                            <span style="font-size:0.8rem; color:#64748b; margin-left:10px; font-weight:600;">สัปดาห์ที่ 4 (5 ชม.)</span>
                            <h4 style="margin:8px 0 5px 0; color:#0f172a;">การจัดการมุมมองข้อมูลด้วย View</h4>
                            <p style="font-size:0.85rem; color:#475569; margin:0;">การสร้าง การแก้ไข และการประยุกต์ใช้ View เพื่อความมั่นคงปลอดภัยและความสะดวกในการเข้าถึงข้อมูล</p>
                        </div>
                        <a href="unit3.php" class="btn-enter-unit" style="width:auto; white-space:nowrap; margin-left:20px;">ดูเนื้อหา ➔</a>
                    </div>

                    <div class="unit-card-horizontal" style="background:#fff; border:1px solid #e2e8f0; padding:20px; border-radius:10px; display:flex; justify-content:space-between; align-items:center;">
                        <div>
                            <span class="unit-badge" style="background:#f1f5f9; padding:3px 10px; border-radius:15px; font-size:0.8rem; font-weight:700;">หน่วยที่ 4</span>
                            <span style="font-size:0.8rem; color:#64748b; margin-left:10px; font-weight:600;">สัปดาห์ที่ 5-6 (10 ชม.)</span>
                            <h4 style="margin:8px 0 5px 0; color:#0f172a;">การโปรแกรมฐานข้อมูลด้วย Stored Procedure และ Function</h4>
                            <p style="font-size:0.85rem; color:#475569; margin:0;">ไวยากรณ์การส่งผ่านพารามิเตอร์ การสร้าง Stored Procedure และ User-Defined Function เพื่อใช้งานในระบบงานจริง</p>
                        </div>
                        <a href="unit4.php" class="btn-enter-unit" style="width:auto; white-space:nowrap; margin-left:20px;">ดูเนื้อหา ➔</a>
                    </div>

                    <div class="unit-card-horizontal" style="background:#fff; border:1px solid #e2e8f0; padding:20px; border-radius:10px; display:flex; justify-content:space-between; align-items:center;">
                        <div>
                            <span class="unit-badge" style="background:#f1f5f9; padding:3px 10px; border-radius:15px; font-size:0.8rem; font-weight:700;">หน่วยที่ 5</span>
                            <span style="font-size:0.8rem; color:#64748b; margin-left:10px; font-weight:600;">สัปดาห์ที่ 7-8 (10 ชม.)</span>
                            <h4 style="margin:8px 0 5px 0; color:#0f172a;">การควบคุมการทำงานอัตโนมัติด้วย Trigger และ Event</h4>
                            <p style="font-size:0.85rem; color:#475569; margin:0;">การกำหนด Trigger เพื่อตรวจสอบและบันทึกประวัติการเปลี่ยนแปลงข้อมูล และการตั้งเวลาด้วย Database Event Scheduler</p>
                        </div>
                        <a href="unit5.php" class="btn-enter-unit" style="width:auto; white-space:nowrap; margin-left:20px;">ดูเนื้อหา ➔</a>
                    </div>

                    <div class="unit-card-horizontal" style="background:#fff; border:1px solid #e2e8f0; padding:20px; border-radius:10px; display:flex; justify-content:space-between; align-items:center;">
                        <div>
                            <span class="unit-badge" style="background:#f1f5f9; padding:3px 10px; border-radius:15px; font-size:0.8rem; font-weight:700;">หน่วยที่ 6</span>
                            <span style="font-size:0.8rem; color:#64748b; margin-left:10px; font-weight:600;">สัปดาห์ที่ 9-10 (10 ชม.)</span>
                            <h4 style="margin:8px 0 5px 0; color:#0f172a;">การจัดการทรานแซกชันและการควบคุมความถูกต้องของข้อมูล</h4>
                            <p style="font-size:0.85rem; color:#475569; margin:0;">คุณสมบัติ ACID คำสั่ง Commit/Rollback ระดับ Isolation Level และการป้องกันปัญหา Concurrency Control</p>
                        </div>
                        <a href="unit6.php" class="btn-enter-unit" style="width:auto; white-space:nowrap; margin-left:20px;">ดูเนื้อหา ➔</a>
                    </div>

                    <div class="unit-card-horizontal" style="background:#fff; border:1px solid #e2e8f0; padding:20px; border-radius:10px; display:flex; justify-content:space-between; align-items:center;">
                        <div>
                            <span class="unit-badge" style="background:#f1f5f9; padding:3px 10px; border-radius:15px; font-size:0.8rem; font-weight:700;">หน่วยที่ 7</span>
                            <span style="font-size:0.8rem; color:#64748b; margin-left:10px; font-weight:600;">สัปดาห์ที่ 11-12 (10 ชม.)</span>
                            <h4 style="margin:8px 0 5px 0; color:#0f172a;">การทำสำเนาข้อมูลและการบำรุงรักษาซ่อมแซมฐานข้อมูล</h4>
                            <p style="font-size:0.85rem; color:#475569; margin:0;">หลักการทำ Database Replication แบบ Primary-Replica การสำรองข้อมูล การกู้คืนข้อมูล และการซ่อมแซมตารางที่เสียหาย</p>
                        </div>
                        <a href="unit7.php" class="btn-enter-unit" style="width:auto; white-space:nowrap; margin-left:20px;">ดูเนื้อหา ➔</a>
                    </div>

                    <div class="unit-card-horizontal" style="background:#fff; border:1px solid #e2e8f0; padding:20px; border-radius:10px; display:flex; justify-content:space-between; align-items:center;">
                        <div>
                            <span class="unit-badge" style="background:#f1f5f9; padding:3px 10px; border-radius:15px; font-size:0.8rem; font-weight:700;">หน่วยที่ 8</span>
                            <span style="font-size:0.8rem; color:#64748b; margin-left:10px; font-weight:600;">สัปดาห์ที่ 13-15 (15 ชม.)</span>
                            <h4 style="margin:8px 0 5px 0; color:#0f172a;">เทคโนโลยีฐานข้อมูลสมัยใหม่และการจัดเก็บข้อมูลแบบผสมผสาน</h4>
                            <p style="font-size:0.85rem; color:#475569; margin:0;">การติดตั้ง In-memory Database การประยุกต์ใช้ฐานข้อมูล NoSQL เชิงลึก และสถาปัตยกรรม Polyglot Persistence</p>
                        </div>
                        <a href="unit8.php" class="btn-enter-unit" style="width:auto; white-space:nowrap; margin-left:20px;">ดูเนื้อหา ➔</a>
                    </div>

                </div>
            </div>

            <div class="sidebar-column">
                <div class="course-sidebar">

                    <div class="right-sidebar-box pre-requisite">
                        <h3>💡 ความรู้เบื้องต้นก่อนเริ่มเรียน</h3>
                        <ul>
                            <li>📌 มีความเข้าใจพื้นฐานเกี่ยวกับโครงสร้างฐานข้อมูลเชิงสัมพันธ์และภาษา SQL เบื้องต้น</li>
                            <li>📌 สามารถใช้งานคำสั่ง SELECT, INSERT, UPDATE, DELETE ได้</li>
                            <li>📌 สามารถติดตั้งและใช้งานโปรแกรม MySQL Workbench และ Terminal ขั้นต้นได้</li>
                            <li>📌 มีความเข้าใจเรื่องตาราง คีย์หลัก และความสัมพันธ์ระหว่างตารางแบบย่อ</li>
                        </ul>
                    </div>
                    <div class="right-sidebar-box">
                        <h3 class="section-title">📊 เกณฑ์การประเมินผลรายวิชา</h3>
                        <p style="font-size:0.9rem; color:#475569; margin-bottom:15px;">การวัดผลสัมฤทธิ์ทางการเรียนวิชาเทคโนโลยีการจัดการฐานข้อมูล แบ่งสัดส่วนคะแนนออกเป็น 4 ส่วนหลักดังนี้:</p>

                        <table class="grading-table" style="width:100%; border-collapse:collapse; font-size:0.9rem;">
                            <tr style="background:#f8fafc; border-bottom:2px solid #e2e8f0;">
                                <th style="padding:10px; text-align:left; color:#0f172a;">ส่วนการประเมิน</th>
                                <th style="padding:10px; text-align:right; color:#0f172a;">สัดส่วน</th>
                            </tr>
                            <tr style="border-bottom:1px solid #f1f5f9;">
                                <td style="padding:10px; color:#475569;">📝 1. คุณธรรม จริยธรรม (จิตพิสัย)</td>
                                <td style="padding:10px; text-align:right; font-weight:bold; color:#2563eb;">20%</td>
                            </tr>
                            <tr style="border-bottom:1px solid #f1f5f9;">
                                <td style="padding:10px; color:#475569;">✍️ 2. ใบงานปฏิบัติการรายหน่วย</td>
                                <td style="padding:10px; text-align:right; font-weight:bold; color:#2563eb;">40%</td>
                            </tr>
                            <tr style="border-bottom:1px solid #f1f5f9;">
                                <td style="padding:10px; color:#475569;">🔥 3. โครงงานวิจัยประยุกต์/ชิ้นงาน</td>
                                <td style="padding:10px; text-align:right; font-weight:bold; color:#2563eb;">20%</td>
                            </tr>
                            <tr style="border-bottom:1px solid #f1f5f9;">
                                <td style="padding:10px; color:#475569;">🚀 4. สอบวัดผลสัมฤทธิ์ปลายภาค</td>
                                <td style="padding:10px; text-align:right; font-weight:bold; color:#2563eb;">20%</td>
                            </tr>
                            <tr style="background:#f1f5f9;">
                                <td style="padding:10px; font-weight:bold; color:#0f172a;">คะแนนรวมทั้งสิ้น</td>
                                <td style="padding:10px; text-align:right; font-weight:bold; color:#0f172a;">100%</td>
                            </tr>
                        </table>

                        <div style="margin-top:20px; background:#fef3c7; border-left:4px solid #d97706; padding:12px; border-radius:4px; font-size:0.85rem; color:#78350f;">
                            📝 <strong>สัปดาห์ที่ 16 (สอบปลายภาค):</strong> ทำการประเมินสรุปผลรวม (Summative Assessment) ทดสอบทักษะการออกแบบและบริหารฐานข้อมูลภาคปฏิบัติจริง
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--  Modal shwo Course -->
        <div id="specsModal" class="custom-modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>📄 เอกสารข้อกำหนดหลักสูตรฐานสมรรถนะรายวิชา</h4>
                    <span class="close-modal-btn">&times;</span>
                </div>
                <div class="modal-body">
                    <table class="info-meta-table">
                        <tr>
                            <td><strong>รายวิชา:</strong></td>
                            <td>เทคโนโลยีการจัดการฐานข้อมูล <br> (Database Management Technology)</td>
                        </tr>
                        <tr>
                            <td><strong>รหัสวิชา:</strong></td>
                            <td>31901-2007 (โครงสร้างเวลาเรียน 1 - 4 - 3)</td>
                        </tr>
                        <tr>
                            <td><strong>กลุ่มสมรรถนะ:</strong></td>
                            <td>วิชาชีพเฉพาะ (กลุ่มสมรรถนะวิชาชีพพื้นฐาน) | <strong>หมวดวิชา:</strong> วิชาชีพ</td>
                        </tr>
                        <tr>
                            <td><strong>สาขาวิชา:</strong></td>
                            <td>เทคโนโลยีสารสนเทศ | <strong>กลุ่มอาชีพ:</strong> ซอฟต์แวร์และการประยุกต์</td>
                        </tr>
                        <tr>
                            <td><strong>ประเภทวิชา:</strong></td>
                            <td>อุตสาหกรรมดิจิทัลและเทคโนโลยีสารสนเทศ</td>
                        </tr>
                        <tr>
                            <td><strong>หลักสูตร:</strong></td>
                            <td>ประกาศนียบัตรวิชาชีพชั้นสูง (ปวส.) พุทธศักราช 2567</td>
                        </tr>
                        <tr>
                            <td><strong>ผู้สอนวิเคราะห์:</strong></td>
                            <td>นายพรชัย ตุ่นแก้ว วิทยฐานะ ชำนาญการ ประจำแผนกวิชา เทคโนโลยีสารสนเทศ</td>
                        </tr>
                        <tr>
                            <td><strong>กลุ่มเป้าหมาย:</strong></td>
                            <td>ผู้เรียนชั้น ปวส. 1 แผนกวิชา เทคโนโลยีสารสนเทศ (ภาคเรียนที่ 2 ปีการศึกษา 2569)</td>
                        </tr>
                        <tr>
                            <td><strong>สถานศึกษา:</strong></td>
                            <td>วิทยาลัยพณิชยการบางนา สถาบันการอาชีวศึกษากรุงเทพมหานคร สำนักงานคณะกรรมการการอาชีวศึกษา กระทรวงศึกษาธิการ</td>
                        </tr>
                        <tr>
                            <td><strong>อ้างอิงมาตรฐานวิชาชีพ:</strong></td>
                            <td>มาตรฐานอาชีพ สถาบันคุณวุฒิวิชาชีพ อาชีพ นักพัฒนาระบบ ระดับ 5</td>
                        </tr>
                    </table>

                    <div class="spec-section-box">
                        <h5>🎯 ฐานสมรรถนะประจำรายวิชา (Competency Base)</h5>
                        <p>ออกแบบและบริหารฐานข้อมูลตามหลักการ ด้วยความละเอียดรอบคอบ รับผิดชอบ การสื่อสาร การคิดเชิงนวัตกรรมและการทำงานเป็นทีม</p>
                    </div>

                    <div class="spec-section-box">
                        <h5>🎯 ผลลัพธ์การเรียนรู้ระดับรายวิชา (Course Learning Outcomes)</h5>
                        <p>ออกแบบและบริหารฐานข้อมูลตามหลักการ ด้วยความละเอียดรอบคอบ รับผิดชอบ การสื่อสาร การคิดเชิงนวัตกรรมและการทำงานเป็นทีม</p>
                    </div>

                    <div class="spec-section-box">
                        <h5>🎯 จุดประสงค์รายวิชา (Course Objectives)</h5>
                        <div><strong>เพื่อให้:</strong> </div>
                        <ol>
                            <li>มีความเข้าใจในการเลือกใช้เทคโนโลยีในการจัดการฐานข้อมูล</li>
                            <li>มีทักษะในการใช้เทคโนโลยีในการจัดการฐานข้อมูล</li>
                            <li>มีเจตคติและกิจนิสัยที่ดีในการปฏิบัติงานด้วยความละเอียดรอบคอบ รับผิดชอบ การสื่อสาร
                                การคิดเชิงนวัตกรรมและการทำงานเป็นทีม
                            </li>
                            <li>มีความสามารถประยุกต์ใช้เทคโนโลยีในการจัดการฐานข้อมูลให้เหมาะสมกับระบบงาน</li>
                        </ol>
                    </div>

                    <div class="spec-section-box">
                        <h5>🎯 สมรรถนะรายวิชา (Course Competencies)</h5>
                        <ol>
                            <li>ประมวลความรู้เกี่ยวกับเทคโนโลยีการจัดการฐานข้อมูลตามหลักการ</li>
                            <li>ใช้เทคโนโลยีในการจัดการฐานข้อมูลตามหลักการ</li>
                            <li>ประยุกต์ใช้เทคโนโลยีในการจัดการฐานข้อมูลให้เหมาะสมกับระบบงาน</li>
                        </ol>
                    </div>

                    <div class="spec-section-box">
                        <h5>📖 คำอธิบายรายวิชา (Course Description)</h5>
                        <p style="text-indent: 40px; text-align: justify; line-height: 1.7;">
                            ศึกษาและปฏิบัติเกี่ยวกับการเลือกใช้เทคโนโลยีที่ใช้ในการจัดการฐานข้อมูล รูปแบบการเก็บข้อมูล (Relational, Non-Relational, Key-value, Document, In-memory, Polyglot Persistence) ลักษณะของ Storage Engine การใช้ View การใช้ Routine (Stored Procedure, Function, Event, Trigger) การใช้ Transaction การทำ Replication การซ่อมแซม การใช้ฐานข้อมูลสมัยใหม่
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const modal = document.getElementById("specsModal");
                const btn = document.getElementById("openSpecsBtn");
                const span = document.getElementsByClassName("close-modal-btn")[0];

                btn.onclick = function() {
                    modal.style.display = "block";
                    document.body.style.overflow = "hidden";
                }
                span.onclick = function() {
                    modal.style.display = "none";
                    document.body.style.overflow = "auto";
                }
                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                        document.body.style.overflow = "auto";
                    }
                }
            });
        </script>
        <script src="../assets/js/script.js"></script>
</body>

</html>
