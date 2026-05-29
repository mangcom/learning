<?php
$base_dir = "../"; // ถอยกลับ 1 ชั้นไปที่ Root เพื่อให้เรียกคอมโพเนนต์ได้ถูกต้อง
$active_nav = "devops"; // ไฮไลต์เมนูที่วิชา DevOps
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน่วยที่ 2: Agile และ Project Management</title>
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
                <span class="course-code" style="background: #7c3aed; color: #fff; padding: 4px 12px; border-radius: 4px; font-weight: 600; font-size: 0.9rem;">หน่วยที่ 2 (สัปดาห์ที่ 2)</span>
                <h2 style="margin: 10px 0 5px 0; font-size: 1.8rem; font-weight: 700;">Agile และ Project Management</h2>
                <p style="color: #e2e8f0; margin: 0; font-size: 0.95rem;">ทำความเข้าใจคัมภีร์ Agile ยกระดับการทำงานด้วย Scrum/Kanban และเริ่มบริหาร Backlog ของโปรเจกต์ผ่าน GitHub Projects</p>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 30px;">
        <main>
            <div class="content-area">

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 30px;">
                    <h3 class="section-title" style="color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">📘 ภาคทฤษฎี: Agile Manifesto, Scrum และ Kanban</h3>

                    <h4>1. ค่านิยมหลักของ Agile Manifesto</h4>
                    <p>Agile ไม่ใช่เครื่องมือ แต่เป็น "แนวคิด" ที่เน้นความยืดหยุ่นและการตอบสนองต่อการเปลี่ยนแปลง โดยมีค่านิยมหลัก 4 ประการ (Core Values) ได้แก่:</p>
                    <ul style="padding-left: 20px; margin-bottom: 20px; line-height: 1.6;">
                        <li><strong>คนและการมีปฏิสัมพันธ์ (Individuals and interactions)</strong> สำคัญกว่า เครื่องมือและขั้นตอนการทำงาน</li>
                        <li><strong>ซอฟต์แวร์ที่ใช้งานได้จริง (Working software)</strong> สำคัญกว่า เอกสารที่ครบถ้วนสมบูรณ์</li>
                        <li><strong>การทำงานร่วมกับลูกค้า (Customer collaboration)</strong> สำคัญกว่า การต่อรองตามสัญญา</li>
                        <li><strong>การตอบสนองต่อการเปลี่ยนแปลง (Responding to change)</strong> สำคัญกว่า การทำตามแผนที่วางไว้ตายตัว</li>
                    </ul>

                    <h4 style="margin-top: 25px;">2. กระบวนการ Scrum (สปรินต์และการสกรัม)</h4>
                    <p><strong>Scrum</strong> คือกรอบการทำงาน (Framework) ยอดนิยมภายใต้แนวคิด Agile ซึ่งแบ่งการทำงานออกเป็นรอบสั้นๆ ที่เรียกว่า <strong>Sprint</strong> (มักใช้เวลา 1-2 สัปดาห์) โดยมีผู้เกี่ยวข้องหลักคือ <em>Product Owner (ผู้แทนลูกค้า)</em>, <em>Scrum Master (ผู้คุมกฎ)</em> และ <em>Developers (ทีมพัฒนา)</em></p>


                    <h4 style="margin-top: 25px;">3. กระบวนการ Kanban (สายพานการมองเห็น)</h4>
                    <p><strong>Kanban</strong> คืออีกหนึ่งกรอบการทำงานที่เน้นการทำ "Visual Management" หรือการมองเห็นภาพรวมของงานผ่านกระดาน (Board) โดยกฎเหล็กที่สำคัญที่สุดของ Kanban คือ <strong>Limit WIP (Work in Progress)</strong> จำกัดจำนวนงานที่กำลังทำอยู่ไม่ให้ล้นมือ เพื่อบังคับให้ทีมเคลียร์งานที่ค้างให้เสร็จก่อนดึงงานใหม่เข้ามา</p>

                </section>

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 30px;">
                    <h3 class="section-title" style="color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">📝 ทฤษฎี: การจัดทำ Product Backlog และ User Story</h3>

                    <h4>1. Product Backlog คืออะไร?</h4>
                    <p><strong>Product Backlog</strong> คือ "รายการความต้องการทั้งหมด" ที่จำเป็นต้องมีในซอฟต์แวร์ เปรียบเสมือนรายการสั่งอาหาร (Menu) ที่ Product Owner เป็นคนจัดลำดับความสำคัญ (Prioritization) งานไหนสำคัญสุดจะอยู่บนสุด และจะถูกดึงไปทำใน Sprint ถัดไปก่อน</p>

                    <h4 style="margin-top: 25px;">2. ศิลปะการเขียน User Story</h4>
                    <p>การเขียนความต้องการใน Agile จะไม่เขียนเป็นเอกสาร Requirement หนาๆ แต่จะเขียนในรูปแบบ <strong>User Story</strong> (เรื่องราวของผู้ใช้) เพื่อให้ทีมพัฒนามองเห็น "คุณค่า (Value)" มากกว่าแค่ฟีเจอร์ โดยมีโครงสร้างประโยคบังคับคือ:</p>

                    <div class="code-window" style="background: #0f172a; color: #a7f3d0; padding: 15px; border-radius: 8px; font-family: monospace; font-size: 1.05rem; margin-top: 10px;">
                        As a [persona/บทบาท], <br>
                        I want to [action/สิ่งที่อยากทำ], <br>
                        So that [value/ประโยชน์ที่ได้รับ]
                    </div>

                    <div style="background: #fdfdfd; border: 1px solid #e2e8f0; border-left: 4px solid #10b981; padding: 15px; margin-top: 15px; border-radius: 4px;">
                        <strong>ตัวอย่างการเขียนสำหรับ "ระบบยืม-คืนอุปกรณ์ IT":</strong><br>
                        <ul style="margin-top: 10px; margin-bottom: 0;">
                            <li><strong>As a</strong> student (ในฐานะนักศึกษา)</li>
                            <li><strong>I want to</strong> borrow equipment through the website (ฉันต้องการกดยืมอุปกรณ์ผ่านเว็บไซต์)</li>
                            <li><strong>So that</strong> I can use it for my final project immediately (เพื่อที่ฉันจะได้นำไปใช้ทำโปรเจกต์จบได้ทันที)</li>
                        </ul>
                    </div>
                </section>

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0;">
                    <h3 class="section-title" style="color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">💻 ภาคปฏิบัติ: ตั้งค่าบอร์ดและกระจายงานด้วย GitHub Projects</h3>

                    <p>เพื่อเริ่มโครงการวิจัยประจำกลุ่มอย่างเป็นทางการ ให้นักศึกษาทุกกลุ่มนำ Project Charter จากสัปดาห์ที่ 1 มาแตกเป็นงานย่อย และนำไปใส่บนเครื่องมือระดับองค์กรอย่าง <strong>GitHub Projects</strong> (หรือ Trello)</p>

                    <h4 style="margin-top: 15px;">ขั้นตอนที่ 1: สร้าง Project Board</h4>
                    <ol style="padding-left: 20px; line-height: 1.6;">
                        <li>ให้ตัวแทนกลุ่มเข้าสู่ระบบ GitHub สร้าง Organization หรือ Repository ใหม่สำหรับโปรเจกต์นี้</li>
                        <li>ไปที่แท็บ <strong>Projects</strong> ➔ กดปุ่ม <strong>New Project</strong> ➔ เลือก Template แบบ <strong>Board (Kanban)</strong></li>
                        <li>ตรวจสอบให้แน่ใจว่าบนกระดานมีคอลัมน์พื้นฐานครบ 3 เสาหลัก ได้แก่:
                            <span style="background: #e2e8f0; padding: 2px 6px; border-radius: 4px; font-size: 0.85rem;">To Do</span>
                            <span style="background: #fef08a; padding: 2px 6px; border-radius: 4px; font-size: 0.85rem;">Doing (In Progress)</span>
                            <span style="background: #bbf7d0; padding: 2px 6px; border-radius: 4px; font-size: 0.85rem;">Done</span>
                        </li>
                    </ol>

                    <h4 style="margin-top: 25px;">ขั้นตอนที่ 2: ระดมสมองเขียน Product Backlog (15-20 รายการ)</h4>
                    <p>ให้สมาชิกในกลุ่มช่วยกันพิมพ์เพิ่มการ์ดงาน (Add Item) ลงในคอลัมน์ <strong>To Do</strong> โดยงานทั้งหมดต้องเกี่ยวข้องกับระบบที่เลือกไว้ (เช่น ระบบแจ้งซ่อม) และให้ยึดหลักการเขียนแบบ User Story</p>

                    <div class="analogy-box" style="background: #eff6ff; border-left: 4px solid #3b82f6; padding: 15px; margin-top: 15px; border-radius: 4px;">
                        <strong>🛠️ ข้อกำหนดสำหรับใบงาน (Backlog Rules):</strong>
                        <ul style="margin-top: 5px; padding-left: 20px; font-size: 0.95rem; line-height: 1.6; margin-bottom: 0;">
                            <li>ต้องมีรายการงาน (Items) บนบอร์ดอย่างน้อย <strong>15 - 20 รายการ</strong> ครอบคลุมทั้งโปรเจกต์</li>
                            <li>ต้องมีการแบ่งหมวดหมู่งาน (Labels) เช่น <code>frontend</code>, <code>backend</code>, <code>database</code></li>
                            <li>ต้องกดมอบหมายงาน (Assignees) เพื่อระบุว่าสมาชิกคนไหนในกลุ่มต้องเป็นผู้รับผิดชอบการ์ดใบนั้น</li>
                        </ul>
                    </div>
                </section>
            </div>

            <aside>
                <div class="sidebar-card" style="background: #fff; padding: 20px; border-radius: 8px; border: 1px solid #e2e8f0; margin-bottom: 20px;">
                    <h4 style="margin-top: 0; margin-bottom: 12px; font-size: 1.1rem; font-weight: 700; color: #1e293b;">📋 ข้อมูลประจำหน่วย</h4>
                    <p style="font-size: 0.9rem; color: #475569; line-height: 1.6; margin: 0;">
                        <strong>สัปดาห์ที่:</strong> 2<br>
                        <strong>เวลาเรียน:</strong> 5 ชั่วโมง (ทฤษฎี 1, ปฏิบัติ 4)<br>
                        <strong>เกณฑ์การประเมิน:</strong> <br>
                        - ความถูกต้องของรูปแบบประโยค User Story (3 คะแนน)<br>
                        - การตั้งค่าบอร์ด GitHub Projects สมบูรณ์ (3 คะแนน)<br>
                        - มี Backlog ครบ 15-20 รายการ และมอบหมายงานครบถ้วน (4 คะแนน)
                    </p>
                </div>

                <div class="sidebar-card" style="background: #fff; padding: 20px; border-radius: 8px; border: 1px solid #e2e8f0; border-left: 4px solid #ef4444;">
                    <h4 style="margin-top: 0; margin-bottom: 12px; font-size: 1.1rem; font-weight: 700; color: #ef4444;">🚨 กับดัก: Mini-Waterfall</h4>
                    <p style="font-size: 0.85rem; color: #64748b; line-height: 1.5; margin: 0;">
                        หลายทีมพลาดท่าด้วยการเอา Agile มาบังหน้า แต่เนื้อในยังทำงานแบบ Waterfall เช่น Sprint แรกทำ Database อย่างเดียว Sprint สองทำ Backend ทั้งหมด Sprint สามทำ Frontend นี่คือการทำงานแบบ <strong>Mini-Waterfall</strong>! <br><br>
                        <em>จำไว้ว่า:</em> การ์ด 1 ใบ (1 User Story) เมื่อดึงไปอยู่ช่อง Done แล้ว มันจะต้องเป็นชิ้นงานที่ผู้ใช้สามารถเห็นหรือกดใช้งานได้จริง (Cross-functional) ไม่ใช่เสร็จแค่ฝั่งใดฝั่งหนึ่ง
                    </p>
                </div>
            </aside>
        </main>
    </div>

    <script src="../assets/js/script.js"></script>
</body>

</html>