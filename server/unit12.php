<?php
$base_dir = "../"; // ถอยกลับ 1 ชั้นไปที่ Root เพื่อให้เรียกคอมโพเนนต์ได้ถูกต้อง
$active_nav = "server"; // ไฮไลต์เมนูที่วิชา Server
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน่วยที่ 12: บริการกรองเว็บไซต์และตรวจรับรองตัวตน (Proxy & AAA Server)</title>
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
                <span class="course-code" style="background: #10b981; color: #fff;">หน่วยที่ 12 (สัปดาห์ที่ 12)</span>
                <h2 style="margin: 10px 0 5px 0; font-size: 1.8rem; font-weight: 700;">บริการกรองเว็บไซต์และตรวจรับรองตัวตน (Proxy & AAA Server)</h2>
                <p style="color: #94a3b8; margin: 0; font-size: 0.95rem;">ควบคุมนโยบายการใช้งานอินเทอร์เน็ตในองค์กรผ่านระบบกรองเว็บไซต์ Squid Proxy พร้อมวางระบบศูนย์กลางตรวจสอบและพิสูจน์สิทธิ์เข้าถึงเครือข่ายระดับ Enterprise ด้วยสถาปัตยกรรม AAA และ FreeRADIUS</p>
            </div>
        </div>
    </div>

    <div class="container">
        <main>
            <div class="content-area">

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 30px;">
                    <h3 class="section-title">📘 ภาคทฤษฎี: นิยามเซิร์ฟเวอร์ตัวกลาง และสถาปัตยกรรมความปลอดภัย AAA</h3>

                    <h4>1. นิยามและประเภทของเซิร์ฟเวอร์ตัวกลาง (Proxy Server)</h4>
                    <p><strong>Proxy Server</strong> คือเครื่องคอมพิวเตอร์แม่ข่ายที่ทำหน้าที่เป็น "ตัวกลาง" คอยคั่นกลางระหว่างเครื่องคอมพิวเตอร์ของเครื่องลูกข่าย (Client) และเครือข่ายอินเทอร์เน็ตภายนอก โดยในทางวิศวกรรมระบบเครือข่ายจะแบ่ง Proxy ออกเป็นสองรูปแบบหลักที่มีทิศทางการทำงานตรงกันข้ามกันอย่างเด็ดขาด:</p>

                    <ul style="padding-left: 20px; margin-bottom: 20px;">
                        <li><strong>Forward Proxy (พร็อกซีขาออก):</strong> ทำหน้าที่ตั้งคั่นอยู่หน้าฝั่งเครื่องลูกข่ายภายในองค์กร เมื่อพนักงานจะเปิดเว็บ คำขอจะวิ่งมาที่ Forward Proxy ก่อน จากนั้น Proxy จะทำหน้าที่เดินออกไปดึงข้อมูลจากอินเทอร์เน็ตมาส่งต่อให้ มีประโยชน์หลักในการ **ทำระบบเก็บแคช (Caching) เพื่อประหยัดแบนด์วิดท์** และ **การทำระบบกรองเว็บไซต์ (Web Filtering)** เพื่อบล็อกไม่ให้พนักงานเข้าเว็บไซต์ที่ไม่เหมาะสมในเวลางาน</li>
                        <li><strong>Reverse Proxy (พร็อกซีขาเข้า):</strong> ทำหน้าที่ตั้งคั่นอยู่หน้าฝั่งเครื่องเซิร์ฟเวอร์ที่ให้บริการ (เช่น เว็บเซิร์ฟเวอร์) เมื่อผู้ใช้จากอินเทอร์เน็ตภายนอกจะเข้ามาหาเว็บ คำขอจะวิ่งชน Reverse Proxy ก่อน เพื่อทำหน้าที่กระจายแรงกระแทก (Load Balancing), ซ่อนหมายเลขไอพีจริงหลังบ้าน (Security Isolation) และทำหน้าที่ถอดรหัสความปลอดภัย (SSL Termination)</li>
                    </ul>

                    <h4>2. เจาะลึกแนวคิดสถาปัตยกรรมความปลอดภัย AAA</h4>
                    <p>ในการบริหารจัดการระบบเครือข่ายและเครื่องแม่ข่ายระดับสากล มาตรฐานการควบคุมและรักษาความปลอดภัยจะถูกควบคุมภายใต้สถาปัตยกรรม <strong>AAA (อ่านว่า ทริปเปิล-เอ)</strong> ซึ่งประกอบด้วย 3 เสาหลักที่ทำงานร่วมกันเป็นวงจรต่อเนื่องดังนี้:</p>

                    <div class="step-box" style="margin: 20px 0; background: #fdfdfd; padding: 20px; border-radius: 8px; border: 1px solid #e2e8f0;">
                        <ul style="list-style-type: none; padding: 0; margin: 0;">
                            <li style="padding-bottom: 15px; border-bottom: 1px dashed #f1f5f9;">
                                <strong style="color: #2563eb; font-size: 1.1rem;">1. Authentication (การพิสูจน์ตัวตน - Who are you?):</strong><br>
                                <span style="font-size: 0.95rem; color: #334155;">ขั้นตอนการตรวจสอบว่าบุคคลหรืออุปกรณ์ที่พยายามเชื่อมต่อเข้ามาในระบบนั้นเป็นใครและเป็นตัวจริงหรือไม่ ผ่านการส่งหลักฐาน เช่น บัญชีผู้ใช้และรหัสผ่าน (Username/Password), ใบรับรองดิจิทัล (Digital Certificate) หรือระบบ OTP</span>
                            </li>
                            <li style="padding: 15px 0; border-bottom: 1px dashed #f1f5f9;">
                                <strong style="color: #f59e0b; font-size: 1.1rem;">2. Authorization (การกำหนดสิทธิ์ - What can you do?):</strong><br>
                                <span style="font-size: 0.95rem; color: #334155;">หลังจากผ่านสเต็ปแรกมาได้ ระบบจะทำการตรวจสอบว่าผู้ใช้คนนั้นมีอำนาจสิทธิ์เข้าถึงทรัพยากรส่วนไหนได้บ้าง เช่น พนักงานทั่วไปเข้าได้เฉพาะวงแลนอินเทอร์เน็ตภายนอก แต่แอดมินระบบจะได้รับสิทธิ์เข้าถึงเซิร์ฟเวอร์แกนหลักหรือการจัดสรรหมายเลขสิทธิ์วงแลนพิเศษ (VLAN Assignment)</span>
                            </li>
                            <li style="padding-top: 15px;">
                                <strong style="color: #10b981; font-size: 1.1rem;">3. Accounting (การเก็บบันทึกประวัติ - What did you do?):</strong><br>
                                <span style="font-size: 0.95rem; color: #334155;">กระบวนการติดตามเฝ้าระวังและบันทึกพฤติกรรมการใช้งานทั้งหมดลงในระบบฐานข้อมูลอย่างละเอียด เช่น เวลาที่เริ่มล็อกอิน, ปริมาณข้อมูลที่ดาวน์โหลด/อัปโหลด (Data Usage), เวลาที่ตัดการเชื่อมต่อ และประวัติคำสั่ง เพื่อใช้ในการตรวจสอบย้อนกลับ (Audit) และการคำนวณค่าบริการ</span>
                            </li>
                        </ul>
                    </div>

                    <p style="margin-top: 15px;">โปรโตคอลหลักที่ถูกพัฒนาขึ้นมาเพื่อขับเคลื่อนสถาปัตยกรรม AAA นี้ที่มีชื่อเสียงระดับโลกคือ <strong>RADIUS (Remote Authentication Dial-In User Service - พอร์ต UDP 1812 และ 1813)</strong> ซึ่งใช้ในการควบคุมการล็อกอินของอุปกรณ์เครือข่าย เช่น สวิตช์, เราเตอร์, VPN Gateway และจุดกระจายสัญญาณ Wi-Fi แบบ Enterprise WPA3</p>
                </section>

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 30px;">
                    <h3 class="section-title">💻 ภาคปฏิบัติ 1: การล็อกการเข้าถึงเว็บปลายทางผ่าน Squid Proxy</h3>
                    <p>นักศึกษาจะได้ลงมือตั้งค่า <strong>Squid Proxy</strong> ซึ่งเป็น Forward Proxy ยอดนิยมระดับโลก เพื่อกรองและควบคุมพฤติกรรมการเล่นอินเทอร์เน็ตในวงแลนสำนักงาน</p>

                    <h4 style="margin-top: 15px;">ขั้นตอนที่ 1: ติดตั้งบริการและจัดเตรียมไฟล์ควบคุมนโยบาย</h4>
                    <div class="code-window">
                        <div class="code-header"><span class="code-lang">Terminal</span></div>
                        <pre>sudo apt update && sudo apt install squid -y
# ปล่อยสร้างไฟล์สำหรับกรอกรายชื่อโดเมนเนมที่จะทำการบล็อก
sudo nano /etc/squid/blocked_sites.txt</pre>
                    </div>
                    <p style="margin-top: 10px;">กรอกรายชื่อเว็บไซต์ที่ต้องการสั่งแบนลงในไฟล์ <code>blocked_sites.txt</code> บรรทัดละ 1 เว็บไซต์:</p>
                    <div class="code-window" style="background: #0f172a; color: #f43f5e;">
                        <pre>.facebook.com
.youtube.com
.gambling-website.net</pre>
                    </div>

                    <h4 style="margin-top: 25px;">ขั้นตอนที่ 2: ตั้งค่ากฎ Access Control List (ACL) ในไฟล์หลัก</h4>
                    <p>เปิดไฟล์คอนฟิกหลัก <code>sudo nano /etc/squid/squid.conf</code> ค้นหาช่วงตำแหน่งการกำหนด ACL แล้วเขียนกฎแทรกเข้าไปด้านบน:</p>
                    <div class="code-window">
                        <div class="code-header"><span class="code-lang">squid.conf</span></div>
                        <pre># 1. นิยามวงเครือข่ายภายในห้องแล็บของเรา
acl lab_network src 192.168.10.0/24

# 2. นิยามไฟล์รายชื่อโดเมนที่เราสั่งแบน
acl banned_domains dstdomain "/etc/squid/blocked_sites.txt"

# 3. สั่งการบังคับใช้กฎความปลอดภัย (สำคัญมาก: ลำดับการวางมีผลต่อการบังคับสิทธิ์)
http_access deny banned_domains     # สั่งบล็อกเว็บไซต์ในตารางลิสต์ห้ามเข้าเด็ดขาด
http_access allow lab_network       # อนุญาตให้กลุ่มเครื่องในแล็บเข้าเว็บอื่นที่เหลือได้
http_access deny all                # ปฏิเสธการเชื่อมต่อนอกเหนือจากนี้</pre>
                    </div>
                    <div class="code-window" style="margin-top: 10px;">
                        <div class="code-header"><span class="code-lang">Terminal</span></div>
                        <pre>sudo squid -k reconfigure    # สั่งให้ซอฟต์แวร์อ่านและใช้กฎใหม่ทันทีโดยไม่ต้องรีสตาร์ทบริการ
# พอร์ตมาตรฐานของ Squid Proxy ในการรอรับคำขอจาก Client คือพอร์ต 3128</pre>
                    </div>

                    <h4 style="margin-top: 25px;">ขั้นตอนที่ 3: การทดสอบตั้งค่าและการใช้งานฝั่งเครื่องลูกข่าย</h4>
                    <p>เปิดเครื่องคอมพิวเตอร์ Client เข้าไปที่เมนูการตั้งค่า **Network Proxy** ของระบบปฏิบัติการหรือเว็บเบราว์เซอร์ ติ๊กเลือกใช้ Manual Proxy Configuration กรอกหมายเลขไอพีของเครื่องลินุกซ์เซิร์ฟเวอร์ของเรา และระบุพอร์ต <code>3128</code> จากนั้นทดสอบเปิดหน้าเว็บปกติจะพบว่าทำงานได้ แต่ถ้าเปิดเว็บตามรายชื่อในลิสต์จะถูกเซิร์ฟเวอร์ตีกลับข้อความแจ้งเตือนความปลอดภัยทันที</p>
                </section>

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0;">
                    <h3 class="section-title">🔑 ภาคปฏิบัติ 2: ติดตั้งและทดสอบศูนย์กลางรับรองสิทธิ์ผู้ใช้ด้วย FreeRADIUS</h3>
                    <p>เรียนรู้วิธีการจัดทำเซิร์ฟเวอร์ยืนยันสิทธิ์ตัวตนส่วนกลางเพื่อรองรับการพิสูจน์สิทธิ์เข้าใช้ระบบอินเทอร์เน็ตขององค์กร</p>

                    <h4 style="margin-top: 15px;">ขั้นตอนที่ 1: ติดตั้งแพ็คเกจ FreeRADIUS และเครื่องมือทดสอบ</h4>
                    <div class="code-window">
                        <div class="code-header"><span class="code-lang">Terminal</span></div>
                        <pre>sudo apt install freeradius freeradius-utils -y
sudo systemctl stop freeradius    # ปิดบริการชั่วคราวเพื่อเตรียมเปิดรันในโหมดตรวจสอบ Debug</pre>
                    </div>

                    <h4 style="margin-top: 25px;">ขั้นตอนที่ 2: ประกาศรายชื่ออุปกรณ์เครือข่ายและผู้ใช้ที่มีสิทธิ์เข้าใช้งาน</h4>
                    <p>เปิดไฟล์ลงทะเบียนเครื่องสวิตช์หรืออุปกรณ์กระจายสัญญาณ Wi-Fi (NAS Clients) ที่ <code>sudo nano /etc/freeradius/3.0/clients.conf</code>:</p>
                    <div class="code-window">
                        <div class="code-header"><span class="code-lang">clients.conf</span></div>
                        <pre>client Core-Switch-HQ {
    ipaddr      = 192.168.10.254        # เลขไอพีของอุปกรณ์เน็ตเวิร์กที่วิ่งเข้ามาถามข้อมูล
    secret      = shared_secret_key_123 # รหัสผ่านลับส่วนกลางที่ตรงกันทั้งฝั่งเซิร์ฟเวอร์และสวิตช์
}</pre>
                    </div>

                    <p style="margin-top: 25px;">เปิดไฟล์สร้างบัญชีผู้ใช้งานและรหัสผ่านส่วนบุคคลประจำเครื่องที่ <code>sudo nano /etc/freeradius/3.0/users</code> เลื่อนลงไปเขียนท้ายไฟล์:</p>
                    <div class="code-window">
                        <div class="code-header"><span class="code-lang">users</span></div>
                        <pre># สร้างโปรไฟล์บัญชีนศ.สำหรับล็อกอินเข้าข่ายอินเทอร์เน็ตสำนักงาน
student01  Cleartext-Password := "PasswordSecure2026"
    Reply-Message = "ยินดีต้อนรับเข้าสู่ระบบเครือข่ายสถาบันศึกษา"

staff01    Cleartext-Password := "StaffSecret99"
    Reply-Message = "สิทธิ์การเข้าใช้งานประเภทบุคลากรผ่านการตรวจสอบสำเร็จ"</pre>
                    </div>

                    <h4 style="margin-top: 25px;">ขั้นตอนที่ 3: เปิดเซิร์ฟเวอร์ในโหมด Debug และยิงทดสอบคำสั่งจากส่วนกลาง</h4>
                    <p>เพื่อให้เห็นความเคลื่อนไหวทางสัญญาณสถาปัตยกรรม AAA แอดมินสามารถเปิดรัน FreeRADIUS ในโหมดตรวจสอบข้อผิดพลาด (Debug Mode) ได้ดังนี้:</p>
                    <div class="code-window">
                        <div class="code-header"><span class="code-lang">Terminal (Window 1)</span></div>
                        <pre>sudo freeradius -X   # เปิดระบบรันหน้าจอแสดงสัญญาณ Log การคุยตอบรับแพ็กเก็ตแบบเรียลไทม์</pre>
                    </div>

                    <p style="margin-top: 15px;">เปิดแท็บ Terminal ใหม่ขึ้นมาอีกหน้าต่างหนึ่ง แล้วสั่งยิงจำลองแพ็กเก็ตตรวจสอบด้วยเครื่องมือ <code>radtest</code>:</p>
                    <div class="code-window">
                        <div class="code-header"><span class="code-lang">Terminal (Window 2 - Simulation)</span></div>
                        <pre># รูปแบบ: radtest [Username] [Password] [RADIUS-Server-IP] [Port] [Shared-Secret]
radtest student01 PasswordSecure2026 localhost 0 testing123</pre>
                    </div>

                    <div class="analogy-box" style="background: #f0fdf4; border-left: 4px solid #16a34a; margin-top: 15px;">
                        <strong>📊 การวิเคราะห์ผลลัพธ์จากการทดสอบความปลอดภัย:</strong><br>
                        <ul style="margin: 5px 0 0 20px; font-size: 0.9rem; line-height: 1.6;">
                            <li>หากรหัสผ่านถูกต้อง หน้าจอจะตอบกลับข้อความข้อมูลกลับมาว่า <strong>Received Access-Accept</strong> แสดงว่าระบบอนุมัติปล่อยผ่านสัญญาณ และจะแสดงข้อความต้อนรับในกล่อง Reply-Message</li>
                            <li>หากนักศึกษาแกล้งกรอกรหัสผ่านผิด หน้าจอจะตอบกลับผลลัพธ์เป็น <strong>Received Access-Reject</strong> ซึ่งหมายความว่าสัญญาสิทธิ์ถูกบล็อกและปฏิเสธไม่ให้เปิดทางเข้าใช้งานเครือข่ายอย่างเด็ดขาด</li>
                        </ul>
                    </div>
                </section>
            </div>

            <aside>
                <div class="sidebar-card">
                    <h4>📋 ข้อมูลประจำหน่วย</h4>
                    <p style="font-size: 0.9rem; color: #475569;">
                        <strong>สัปดาห์ที่:</strong> 12<br>
                        <strong>เวลาเรียน:</strong> 5 ชั่วโมง (ทฤษฎี 1, ปฏิบัติ 4)<br>
                        <strong>เกณฑ์การประเมิน:</strong> คอนฟิกจัดโครงสร้าง ACL บน Squid บล็อกโดเมนตามโจทย์สำเร็จ (3 คะแนน) ใบงานการทดสอบสั่งล็อกอินผู้ใช้สิทธิ์ FreeRADIUS ผ่านคำสั่ง radtest ถูกต้อง (4 คะแนน) เอกสารวิเคราะห์การแกะสัญญาณล็อกอินประวัติ AAA (3 คะแนน)
                    </p>
                </div>

                <div class="sidebar-card" style="border-left: 4px solid #ef4444;">
                    <h4>🚨 ความเสี่ยงทางระบบ: วิกฤตการณ์ Proxy Bypass และช่องโหว่รหัสผ่าน</h4>
                    <p style="font-size: 0.85rem; color: #64748b; line-height: 1.5;">
                        ข้อควรระวังอย่างยิ่งในการทำแลบนี้คือ การกรองด้วย Forward Proxy ในรูปแบบทั่วไป (Explicit Proxy) นั้น เครื่องลูกข่ายสามารถแอบหลบเลี่ยงกฎความปลอดภัยได้ง่ายมากเพียงแค่ดาวน์โหลดซอฟต์แวร์ <strong>VPN (Virtual Private Network)</strong> มาเปิดรัน ข้อมูลจะถูกเข้ารหัสอุโมงค์ทะลุผ่านพอร์ต Proxy ออกไปทันที แอดมินยุคใหม่จึงต้องทำควบคู่กับระบบไฟร์วอลล์ (UFW/iptables) บล็อกพอร์ตภายนอกทั้งหมด หรือยกระดับไปใช้แบบ Transparent Proxy ที่ดักสัญญาณกลางอากาศครับ
                    </p>
                </div>
            </aside>
        </main>
    </div>

    <script src="../assets/js/script.js"></script>
</body>

</html>