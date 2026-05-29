<?php
$base_dir = "../"; // ถอยกลับ 1 ชั้นไปที่ Root เพื่อให้เรียกคอมโพเนนต์ได้ถูกต้อง
$active_nav = "server"; // ไฮไลต์เมนูที่วิชา Server
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน่วยที่ 15: โครงงานจำลองสถาปัตยกรรมองค์กรจริงและการนำเสนอ (Final Presentation)</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght=300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body style="background-color: #f8fafc;">

    <?php include '../components/navbar.php'; ?>

    <div class="page-header" style="background: #0f172a; color: #fff; padding: 40px 0 65px 0;">
        <div class="container">
            <a href="index.php" class="back-link">
                <span class="arrow-icon">⬅</span> <span>กลับสู่หน้าหลักวิชา Linux Server</span>
            </a>
            <div style="margin-top: 15px;">
                <span class="course-code" style="background: #e11d48; color: #fff;">หน่วยที่ 15 (สัปดาห์ที่ 15)</span>
                <h2 style="margin: 10px 0 5px 0; font-size: 1.8rem; font-weight: 700;">โครงงานจำลองสถาปัตยกรรมองค์กรจริงและการนำเสนอ (Final Capstone & Defense)</h2>
                <p style="color: #94a3b8; margin: 0; font-size: 0.95rem;">ด่านทดสอบสุดท้ายสู่การเป็นวิศวกรระบบเต็มตัว: ส่งมอบสถาปัตยกรรมคลังเซิร์ฟเวอร์แบบบูรณาการ เปิดรันทุกบริการประสานงานร่วมกัน และฝ่าวิกฤตการตอบคำถามแก้ปัญหาหน้างานจริง</p>
            </div>
        </div>
    </div>

    <div class="container">
        <main>
            <div class="content-area">

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 30px;">
                    <h3 class="section-title">🎓 ภาคทฤษฎี: สรุปพิมพ์เขียวการบูรณาการระบบไอทีองค์กร (Enterprise Blueprint Integration)</h3>

                    <h4>1. ปรัชญาการออกแบบโครงสร้างพื้นฐานที่มีความคงทนและสอดประสานกัน</h4>
                    <p>ตลอด 14 สัปดาห์ที่ผ่านมา นักศึกษาได้เรียนรู้การตั้งค่าบริการเซิร์ฟเวอร์แยกเป็นเอกเทศในแต่ละวิชา แต่ในโลกการทำงานจริง <strong>(Production Environment)</strong> บริการทุกตัวจะต้องทำงานร่วมกันเป็นระบบนิเวศน์เดี่ยว (Single Ecosystem) โดยมีการพึ่งพากันอย่างมีระบบ เช่น เว็บเซิร์ฟเวอร์ต้องคุยกับฐานข้อมูลผ่านเครือข่ายภายใน, คอนเทนเนอร์ต้องได้รับการปกป้องหลัง Reverse Proxy, และสคริปต์อัตโนมัติจะต้องคอยเก็บกวาดข้อมูลตลอดเวลาอย่างไม่มีวันหยุดพัก</p>

                    <h4 style="margin-top: 25px;">2. รายงานตรวจสอบความพร้อมสถาปัตยกรรมก่อนส่งมอบ (Production-Ready Checklist)</h4>
                    <p>ก่อนที่วิศวกรระบบจะส่งมอบงานให้แก่ลูกค้าหรือผู้ประเมิน โครงสร้างระบบจะต้องผ่านเกณฑ์การทดสอบความเสถียรใน 4 มิติหลักดังนี้:</p>
                    <ul style="padding-left: 20px; margin-bottom: 20px;">
                        <li><strong>High Availability & Isolation:</strong> บริการ Microservices ต้องแยกขาดจากโฮสต์หลักผ่าน Docker และมีการผูก Data Volume ป้องกันข้อมูลสูญหาย</li>
                        <li><strong>End-to-End Encryption:</strong> ทุกหน้าต่างหน้าเว็บที่เปิดให้บริการสู่ภายนอก ต้องวิ่งผ่านใบรับรองความปลอดภัย HTTPS (Caddy / NPM / OpenSSL) 100%</li>
                        <li><strong>Least Privilege Access:</strong> ยูสเซอร์ฐานข้อมูล ยูสเซอร์แชร์ไฟล์ และไฟร์วอลล์ (UFW) ต้องเปิดสิทธิ์เฉพาะเท่าที่จำเป็นเท่านั้น ไม่มีสิทธิ์เปิดทิ้งเรี่ยราด</li>
                        <li><strong>Business Continuity Plan (BCP):</strong> มีระบบตั้งเวลาสำรองข้อมูลอัตโนมัติ (Cron Job + Bash) ที่ทำงานได้จริงเมื่อมีการตรวจสอบ Log ย้อนหลัง</li>
                    </ul>
                </section>

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 30px;">
                    <h3 class="section-title">🛠️ ข้อกำหนดทางเทคนิค: สถาปัตยกรรมคลังเซิร์ฟเวอร์องค์กรขนาดเล็ก (Small Biz Server Infrastructure)</h3>
                    <p>โครงงานจำลองของกลุ่มนักศึกษาจะต้องแสดงให้เห็นถึงการรันบริการหลักทั้งหมดบนระบบปฏิบัติการ Ubuntu Server ให้อยู่ในสถานะ <span style="color: #16a34a; font-weight: bold;">Active (Running)</span> พร้อมกันผ่านพอร์ตมาตรฐานดังต่อไปนี้:</p>

                    <table class="grading-table" style="margin: 20px 0; background: #f8fafc; font-size: 0.9rem;">
                        <thead>
                            <tr style="background: #cbd5e1;">
                                <th style="padding: 10px; text-align: center; width: 25%;">กลุ่มงานบริการ</th>
                                <th style="padding: 10px; text-align: center; width: 20%;">เทคโนโลยีที่เลือกใช้</th>
                                <th style="padding: 10px; text-align: center; width: 15%;">พอร์ตเชื่อมต่อ</th>
                                <th style="padding: 10px;">เป้าหมายและเกณฑ์การทดสอบ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align: center; font-weight: 600;"><strong>Gateway & SSL Front</strong></td>
                                <td style="text-align: center;">Caddy / Nginx Proxy Manager</td>
                                <td style="text-align: center;"><code class="inline-code">80, 443, 81</code></td>
                                <td>เป็นประตูหน้าดักสัญญาณ เข้ารหัส SSL และส่งต่อไปยังเว็บแอปพลิเคชันหลังบ้าน</td>
                            </tr>
                            <tr>
                                <td style="text-align: center; font-weight: 600;"><strong>Database Core</strong></td>
                                <td style="text-align: center;">MariaDB / PostgreSQL</td>
                                <td style="text-align: center;"><code class="inline-code">3306 / 5432</code></td>
                                <td>จัดเก็บข้อมูล แยกสิทธิ์ Account เชื่อมต่อจากวงแอปพลิเคชัน ไม่ใช้สิทธิ์ Root รันระบบ</td>
                            </tr>
                            <tr>
                                <td style="text-align: center; font-weight: 600;"><strong>File Sharing Office</strong></td>
                                <td style="text-align: center;">Samba / ownCloud / NAS</td>
                                <td style="text-align: center;"><code class="inline-code">445 / 8080</code></td>
                                <td>จำลองไดรฟ์กลางแชร์ข้อมูลในบริษัท ล็อกอินด้วย Username แยกแผนกได้จริง</td>
                            </tr>
                            <tr>
                                <td style="text-align: center; font-weight: 600;"><strong>Modern App & IoT</strong></td>
                                <td style="text-align: center;">Docker + Node-RED</td>
                                <td style="text-align: center;"><code class="inline-code">1880</code></td>
                                <td>รันเว็บแอปและตัวประมวลผลสัญญาณสมองกลฝังตัวในลักษณะ Microservices</td>
                            </tr>
                            <tr>
                                <td style="text-align: center; font-weight: 600;"><strong>Automation & Security</strong></td>
                                <td style="text-align: center;">Cron Job + Squid Proxy</td>
                                <td style="text-align: center;"><code class="inline-code">3128</code></td>
                                <td>บีบอัดไฟล์เก็บสำรองลงดิสก์ทุกเที่ยงคืน และบล็อกเว็บไม่พึงประสงค์ตามนโยบาย</td>
                            </tr>
                        </tbody>
                    </table>
                </section>

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0;">
                    <h3 class="section-title">🚀 ภาคปฏิบัติหน้างาน: การตรวจสอบสถานะระบบ (Uptime Verification & Live Defense)</h3>
                    <p>เมื่อถึงลำดับการนำเสนอ คณะกรรมการหรืออาจารย์ผู้คุมสอบจะทำการสุ่มเปิดหน้าต่าง Terminal บนเครื่องโปรดักชันจริงของนักศึกษา เพื่อยิงคำสั่งตรวจสอบสุขภาพระบบ (System Health Check) ดังต่อไปนี้ นักศึกษาควรซักซ้อมความพร้อมภายในกลุ่มให้ดี:</p>

                    <h4 style="margin-top: 25px;">1. สคริปต์ด่วนตรวจแถวบริการในระบบ (All-in-One Service Check)</h4>
                    <p>คำสั่งสแกนดูว่าพอร์ตบริการสำคัญตื่นขึ้นมาทำงานครบถ้วนตามพิมพ์เขียวหรือไม่:</p>
                    <div class="code-window">
                        <div class="code-header"><span class="code-lang">Terminal</span></div>
                        <pre># 1. ตรวจพอร์ตที่กำลังเปิดรับฟังคำขอภายนอกทั้งหมด ณ ปัจจุบัน
sudo ss -tunlp | grep -E '443|3306|5432|445|1880|3128'

# 2. ตรวจสอบตู้คอนเทนเนอร์ของ Docker ว่ามีตู้ไหนขึ้นสถานะติดขัด (Exit Error) หรือไม่
sudo docker ps --format "table {{.Names}}\t{{.Status}}\t{{.Ports}}"</pre>
                    </div>

                    <h4 style="margin-top: 25px;">2. ด่านทดสอบเหตุการณ์จำลองฉุกเฉินหน้างาน (Random Disaster Recovery Drill)</h4>
                    <div class="analogy-box" style="background: #fff5f5; border-left: 4px solid #ef4444; margin-top: 15px;">
                        <strong>🚨 รูปแบบการโดนเจาะลึกคำถามและสั่งลองแก้ปัญหาจากอาจารย์ (Live Defense Challenges):</strong><br>
                        <span style="font-size: 0.95rem; color: #334155; line-height: 1.6;">
                            ระหว่างการพรีเซนต์ อาจารย์ผู้ประเมินจะทำการ <strong>"สุ่มสั่งปิดบริการ 1 ตัว"</strong> หรือ <strong>"แกล้งลบไฟล์ข้อมูลในหน้าเว็บ"</strong> เพื่อทดสอบไหวพริบของนักศึกษาหน้างาน ตัวอย่างเช่น:<br>
                            * <em>"ถ้าครูสั่งแกล้งลบตู้คอนเทนเนอร์แอปทิ้งในวินาทีนี้ ข้อมูลระบบของเธอจะหายไหม? จงสั่งดึงข้อมูลกลับคืนมาจากโวลุ่มหรือไฟล์ Backup ที่ทำไว้ให้ดูเดี๋ยวนี้"</em><br>
                            * <em>"ลองล็อกอินเข้า Samba ผ่าน User ของแผนกอื่นให้ดูหน่อยซิ ระบบต้องบล็อกไม่ให้ฉันเข้านะ"</em><br>
                            * <em>"จงเปิดไฟล์ประวัติ Log ของคริปต์ Cron Job เพื่อพิสูจน์ว่าระบบแอบรันสำรองข้อมูลอัตโนมัติจริงเมื่อคืนนี้"</em>
                        </span>
                    </div>

                    <p style="margin-top: 20px; font-size: 0.95rem;">หากนักศึกษาสามารถอธิบายโครงสร้างสถาปัตยกรรม สั่งกู้คืนระบบ และตอบคำถามทางวิศวกรรมเครือข่ายได้อย่างถูกต้องตามหลักการ จะถือว่าผ่านเกณฑ์การประเมินสมรรถนะปลายภาควิชา Linux Server Infrastructure อย่างเป็นทางการครับ</p>
                </section>
            </div>

            <aside>
                <div class="sidebar-card" style="background: #fff1f2; border: 1px solid #fecdd3;">
                    <h4 style="color: #be123c;">📊 เกณฑ์การตัดเกรดโครงงาน</h4>
                    <p style="font-size: 0.85rem; color: #4c0519; line-height: 1.6;">
                        <strong>คะแนนรวมสัปดาห์สุดท้าย:</strong> 10 คะแนนเต็ม<br><br>
                        * <strong>ความสมบูรณ์ของระบบ (3 คะแนน):</strong> บริการทุกตัว (Proxy, Web, DB, Shared File, Container, Automation) เปิดรันประสานงานกันได้ครบถ้วนไม่มีล่มกลางคัน<br>
                        * <strong>รูปเล่มผังพิมพ์เขียว (3 คะแนน):</strong> เอกสารแสดง Network Topology และขั้นตอนคอนฟิกอย่างละเอียดและเป็นวิชาชีพ<br>
                        * <strong>การแก้ปัญหาหน้างาน (4 คะแนน):</strong> ไหวพริบและการตอบคำถามเชิงวิศวกรรมระบบเมื่อโดนจำลองสถานการณ์ระบบล่ม
                    </p>
                </div>

                <div class="sidebar-card" style="border-left: 4px solid #ef4444;">
                    <h4>🚨 คําเตือนนาทีสุดท้าย: วิกฤตการณ์ IP เปลี่ยนแปลง (The IP Address Trap)</h4>
                    <p style="font-size: 0.85rem; color: #64748b; line-height: 1.5;">
                        ข้อผิดพลาดร้ายแรงที่สุดที่ทำให้กลุ่มนักศึกษาตกม้าตายในวันนำเสนอคือ <strong>"การยกเครื่องเซิร์ฟเวอร์ย้ายห้องเรียน"</strong> แล้วหมายเลขไอพีของบอร์ดหรือตัวเซิร์ฟเวอร์เปลี่ยนไปตามเราเตอร์ตัวใหม่ ส่งผลให้ไฟล์คอนฟิกต่างๆ เช่น `smb.conf`, `Caddyfile` หรือไฟล์ระเบียบของ PostgreSQL ที่เคยล็อกค่า IP เดิมไว้ พังเสียหายและเปิดบริการไม่ขึ้น! แอดมินที่ดีจึงต้องเข้ามาตรวจสอบหมายเลขไอพีใหม่ผ่านคำสั่ง <code class="inline-code">ip a</code> และเตรียมสคริปต์แก้ไขเปลี่ยนค่าไอพีในไฟล์คอนฟิกให้พร้อมรับสถานการณ์ล่วงหน้าเสมอครับ
                    </p>
                </div>
            </aside>
        </main>
    </div>

    <script src="../assets/js/script.js"></script>
</body>

</html>