<?php
$base_dir = "../"; // ถอยกลับ 1 ชั้นไปที่ Root เพื่อให้เรียกคอมโพเนนต์ได้ถูกต้อง
$active_nav = "devops"; // ไฮไลต์เมนูที่วิชา DevOps
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน่วยที่ 5: Team Collaboration และ Git Workflow</title>
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
                <span class="course-code" style="background: #7c3aed; color: #fff; padding: 4px 12px; border-radius: 4px; font-weight: 600; font-size: 0.9rem;">หน่วยที่ 5 (สัปดาห์ที่ 5)</span>
                <h2 style="margin: 10px 0 5px 0; font-size: 1.8rem; font-weight: 700;">Team Collaboration และ Git Workflow</h2>
                <p style="color: #e2e8f0; margin: 0; font-size: 0.95rem;">ยกระดับการทำงานเป็นทีมด้วย Git Flow เรียนรู้การบริหาร Branch กลยุทธ์การทำ Pull Request และวิธีการเอาตัวรอดเมื่อเกิด Merge Conflict</p>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 30px;">
        <main>
            <div class="content-area">

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 30px;">
                    <h3 class="section-title" style="color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">📘 ภาคทฤษฎี: กลยุทธ์การแตกกิ่งโค้ด (Branch Strategy)</h3>

                    <h4>1. ทำไมเราต้องแยก Branch?</h4>
                    <p>หากโปรแกรมเมอร์ 5 คนเขียนโค้ดและ Push ขึ้นไปทับกันที่กิ่งหลักตลอดเวลา ระบบจะพังอย่างแน่นอน การแตก Branch เปรียบเสมือนการโคลนโปรเจกต์ออกไปทำในพื้นที่ส่วนตัว (Sandbox) เมื่อทำเสร็จและทดสอบแล้วว่าไม่พัง จึงค่อยนำกลับมารวม (Merge) กับกิ่งหลัก</p>



                    <h4 style="margin-top: 25px;">2. รูปแบบมาตรฐาน (Git Flow)</h4>
                    <p>ในการทำงานระดับองค์กร เรามักจะแบ่งกิ่งการทำงานออกเป็น 3 ระดับหลักๆ ดังนี้:</p>
                    <table class="grading-table" style="margin: 15px 0; background: #f8fafc; width: 100%; border-collapse: collapse; font-size: 0.95rem;">
                        <thead>
                            <tr style="background: #e2e8f0;">
                                <th style="padding: 10px; width: 25%; text-align: center;">ชื่อกิ่ง (Branch)</th>
                                <th style="padding: 10px;">บทบาทและหน้าที่</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="border-bottom: 1px solid #cbd5e1;">
                                <td style="text-align: center; font-weight: 600; color: #ef4444;"><code>main</code> / <code>master</code></td>
                                <td><strong>กิ่งศักดิ์สิทธิ์:</strong> โค้ดที่รันอยู่บน Production ห้ามใคร Push โค้ดขึ้นกิ่งนี้โดยตรงเด็ดขาด! โค้ดที่นี่ต้องไร้บั๊กและพร้อมใช้งาน 100%</td>
                            </tr>
                            <tr style="border-bottom: 1px solid #cbd5e1;">
                                <td style="text-align: center; font-weight: 600; color: #3b82f6;"><code>develop</code></td>
                                <td><strong>กิ่งรวมงาน:</strong> พื้นที่สำหรับรวมโค้ดใหม่ๆ จากทุกคนในทีม เพื่อใช้สำหรับทดสอบ (Testing) ก่อนที่จะนำไปรวมกับ <code>main</code></td>
                            </tr>
                            <tr>
                                <td style="text-align: center; font-weight: 600; color: #10b981;"><code>feature/*</code></td>
                                <td><strong>กิ่งสร้างสรรค์:</strong> กิ่งที่แตกออกมาจาก <code>develop</code> เพื่อทำฟีเจอร์ใดฟีเจอร์หนึ่ง (เช่น <code>feature/login</code>) เมื่อทำเสร็จจะถูกยุบรวมกลับเข้า <code>develop</code></td>
                            </tr>
                        </tbody>
                    </table>
                </section>

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 30px;">
                    <h3 class="section-title" style="color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">🔍 ภาคทฤษฎี: Pull Request (PR) และ Code Review</h3>

                    <h4>1. Pull Request (PR) คืออะไร?</h4>
                    <p>PR ไม่ใช่คำสั่ง Git แต่เป็นฟีเจอร์ของเว็บอย่าง GitHub (หรือ GitLab เรียก Merge Request) มันคือ <strong>"การยื่นคำร้อง"</strong> ขอนำโค้ดจากกิ่ง <code>feature</code> ของเรา ไปรวมกับกิ่ง <code>develop</code> หรือ <code>main</code> แทนที่เราจะแอบกด Merge เอง</p>

                    <h4 style="margin-top: 25px;">2. Code Review (การตรวจสอบโค้ด)</h4>
                    <p>เมื่อเราเปิด PR สิ่งที่ต้องเกิดตามมาคือกระบวนการ Code Review โดยสมาชิกในทีม (อย่างน้อย 1-2 คน) จะเข้ามาอ่านโค้ดที่เราเขียน หากพบจุดบกพร่อง โค้ดซ้ำซ้อน หรือบั๊ก จะทำการคอมเมนต์ให้กลับไปแก้ (Request Changes) หากทุกอย่างสมบูรณ์แบบ จึงจะกดยอมรับ (Approve) และควบรวมโค้ดได้</p>
                </section>

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 30px;">
                    <h3 class="section-title" style="color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">💻 ภาคปฏิบัติ: จำลองการทำงานร่วมกันผ่าน Git CLI</h3>

                    <p>ให้นักศึกษาแต่ละกลุ่มแบ่งหน้าที่กันสร้างฟีเจอร์ โดยใช้คำสั่งเหล่านี้ในการควบคุม Branch:</p>

                    <div class="code-window" style="background: #0f172a; color: #f8fafc; padding: 20px; border-radius: 8px; font-family: monospace; font-size: 0.95rem; margin-top: 10px; overflow-x: auto; line-height: 1.6;">
                        <span style="color: #60a5fa;"># 1. ดูว่าตอนนี้เรามี Branch อะไรบ้าง และเราอยู่บน Branch ไหน (มีเครื่องหมาย *)</span><br>
                        <span style="color: #a7f3d0;">git branch</span><br><br>

                        <span style="color: #60a5fa;"># 2. สร้างกิ่งใหม่และย้ายตัวเองเข้าไปที่กิ่งนั้นทันที (เช่น สร้างกิ่งฟีเจอร์ล็อกอิน)</span><br>
                        <span style="color: #a7f3d0;">git checkout -b feature/login</span><br>
                        <span style="color: #94a3b8;"># (หมายเหตุ: ใน Git รุ่นใหม่ สามารถใช้ `git switch -c feature/login` ได้)</span><br><br>

                        <span style="color: #60a5fa;"># 3. เมื่อเขียนโค้ดเสร็จ ก็ add และ commit ตามปกติ</span><br>
                        <span style="color: #a7f3d0;">git add .</span><br>
                        <span style="color: #a7f3d0;">git commit -m "feat: create login page"</span><br><br>

                        <span style="color: #60a5fa;"># 4. ส่งกิ่งใหม่ของเราขึ้นไปบน GitHub เพื่อไปเปิด Pull Request (PR) บนเว็บ</span><br>
                        <span style="color: #a7f3d0;">git push origin feature/login</span>
                    </div>
                </section>

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0;">
                    <h3 class="section-title" style="color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">🚨 ใบงานปฏิบัติการ: ปะทะ Merge Conflict</h3>

                    <div class="analogy-box" style="background: #fef2f2; border-left: 4px solid #ef4444; padding: 15px; margin-bottom: 20px;">
                        <strong>💥 Merge Conflict คืออะไร?</strong><br>
                        <span style="font-size: 0.95rem; color: #475569;">มันคือเหตุการณ์ที่ "คน 2 คน แก้ไขโค้ดบรรทัดเดียวกัน ในไฟล์เดียวกัน" แล้วส่งขึ้นไปรวมกัน Git จะไม่กล้าตัดสินใจแทนว่าโค้ดของใครถูก มันจึงหยุดการทำงานและโยนกลับมาให้ "มนุษย์" เป็นคนแก้ปัญหา (Resolve)</span>
                    </div>

                    <h4 style="margin-top: 15px;">โจทย์การทดลองสร้างและแก้ปัญหา:</h4>
                    <ol style="padding-left: 20px; line-height: 1.7; margin-bottom: 0;">
                        <li>ให้นักศึกษาจับคู่กัน (นาย A และ นาย B) ดึงโค้ดเวอร์ชันเดียวกันลงมา (<code>git pull</code>)</li>
                        <li>นาย A สร้างกิ่ง <code>feature/a</code> แก้ไขไฟล์ <code>index.php</code> บรรทัดที่ 10 ทำการ Push และเปิด PR ไปที่ main จน Merge สำเร็จ</li>
                        <li>นาย B (ยังไม่ได้อัปเดตโค้ดล่าสุด) สร้างกิ่ง <code>feature/b</code> และไปแก้ไขไฟล์ <code>index.php</code> <strong>ที่บรรทัดที่ 10 เช่นเดียวกันแต่พิมพ์คนละข้อความ</strong> จากนั้นทำการ Push และเปิด PR</li>
                        <li>GitHub จะแจ้งเตือนตัวแดงว่า <strong>"Can’t automatically merge"</strong> (เกิด Conflict)</li>
                        <li>ให้นาย B ทำการดึงโค้ดล่าสุดมาที่เครื่อง จัดการลบเส้นแบ่ง Conflict (เครื่องหมาย <code>
                                <<<<<<<< /code> และ <code>=======</code>) เลือกว่าจะเก็บโค้ดไหนไว้ และทำการ Commit ซ้ำเพื่อส่งผลลัพธ์ที่แก้ไขแล้วขึ้นไปใหม่</li>
                        <li>แคปภาพหน้าจอตอนเกิด Conflict และหน้าจอหลังจากแก้ไขสำเร็จส่งเข้าระบบ</li>
                    </ol>
                </section>
            </div>

            <aside>
                <div class="sidebar-card" style="background: #fff; padding: 20px; border-radius: 8px; border: 1px solid #e2e8f0; margin-bottom: 20px;">
                    <h4 style="margin-top: 0; margin-bottom: 12px; font-size: 1.1rem; font-weight: 700; color: #1e293b;">📋 ข้อมูลประจำหน่วย</h4>
                    <p style="font-size: 0.9rem; color: #475569; line-height: 1.6; margin: 0;">
                        <strong>สัปดาห์ที่:</strong> 5<br>
                        <strong>เวลาเรียน:</strong> 5 ชั่วโมง (ทฤษฎี 1, ปฏิบัติ 4)<br>
                        <strong>เกณฑ์การประเมิน:</strong> <br>
                        - มีการสร้าง Branch <code>develop</code> และกิ่ง <code>feature/*</code> ในคลังโปรเจกต์ของกลุ่ม (3 คะแนน)<br>
                        - ร่องรอยการเปิด Pull Request และการกด Approve ของเพื่อนในทีม (3 คะแนน)<br>
                        - ภาพหลักฐานการจำลองและแก้ปัญหา Merge Conflict สำเร็จ (4 คะแนน)
                    </p>
                </div>

                <div class="sidebar-card" style="background: #fff; padding: 20px; border-radius: 8px; border: 1px solid #e2e8f0; border-left: 4px solid #10b981;">
                    <h4 style="margin-top: 0; margin-bottom: 12px; font-size: 1.1rem; font-weight: 700; color: #059669;">🛡️ เทคนิคปกป้องกิ่งหลัก</h4>
                    <p style="font-size: 0.85rem; color: #64748b; line-height: 1.5; margin: 0;">
                        แอดมินของคลัง GitHub ควรเข้าไปที่ Settings > Branches และเปิดใช้งาน <strong>Branch Protection Rules</strong> กับกิ่ง <code>main</code> <br><br>
                        โดยตั้งค่า <em>"Require a pull request before merging"</em> และ <em>"Require approvals"</em> อย่างน้อย 1 คน เพื่อบังคับว่าห้ามใคร Push โค้ดตรงๆ เข้า <code>main</code> โดยไม่ผ่านการรีวิวเด็ดขาด!
                    </p>
                </div>
            </aside>
        </main>
    </div>

    <script src="../assets/js/script.js"></script>
</body>

</html>