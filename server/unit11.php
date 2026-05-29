<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน่วยที่ 11: บริการจัดเก็บและแบ่งปันทรัพยากรข้อมูล (File Sharing Server)</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght=300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body style="background-color: #f8fafc;">

    <!-- เรียกใช้ระบบแถบเมนูส่วนกลาง -->
    <?php include '../components/navbar.php'; ?>

    <div class="page-header" style="background: #0f172a; color: #fff; padding: 40px 0 65px 0;">
        <div class="container">
            <a href="index.php" class="back-link">
                <span class="arrow-icon">⬅</span> <span>กลับสู่หน้าหลักวิชา Linux Server</span>
            </a>
            <div style="margin-top: 15px;">
                <span class="course-code" style="background: #10b981; color: #fff;">หน่วยที่ 11 (สัปดาห์ที่ 11)</span>
                <h2 style="margin: 10px 0 5px 0; font-size: 1.8rem; font-weight: 700;">บริการจัดเก็บและแบ่งปันทรัพยากรข้อมูล (File Sharing Server & NAS System)</h2>
                <p style="color: #94a3b8; margin: 0; font-size: 0.95rem;">เจาะลึกโปรโตคอลการแชร์ไฟล์ภายในสำนักงานด้วย SMB/CIFS โครงสร้าง NAS ระบบความปลอดภัยสิทธิ์ของ Samba Server พร้อมเปิดโลกเทคโนโลยีทางเลือก TrueNAS, CasaOS, Xpenology และ Private Cloud ด้วย ownCloud</p>
            </div>
        </div>
    </div>

    <div class="container">
        <main>
            <!-- ─── ฝั่งซ้าย: เนื้อหาบทเรียนอย่างละเอียด ─── -->
            <div class="content-area">

                <!-- Section 1: ภาคทฤษฎีระบบแชร์ไฟล์และสถาปัตยกรรม NAS -->
                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 30px;">
                    <h3 class="section-title">📘 ภาคทฤษฎี: กลไกคลังข้อมูลสำนักงาน และรูปแบบโปรโตคอลกลาง</h3>

                    <h4>1. กลไกการแชร์ระบบคลังข้อมูลในสำนักงาน (Centralized Storage Principle)</h4>
                    <p>ในสถาปัตยกรรมเครือข่ายขององค์กร การกระจายไฟล์งานไว้ตามเครื่องคอมพิวเตอร์ของพนักงานแต่ละคน (Decentralized) มักก่อให้เกิดปัญหาไฟล์สูญหาย การแก้ไขข้อมูลซ้ำซ้อน และความยากลำบากในการสำรองข้อมูล กลไกการทำ <strong>File Sharing Server</strong> จึงเข้ามาทำหน้าที่เป็น "ถังข้อมูลกลาง" ของบริษัท รองรับการเข้าถึงพร้อมกัน (Concurrent Access) พร้อมระบบ <strong>File Locking Mechanism</strong> เพื่อป้องกันไม่ให้ผู้ใช้สองคนเขียนทับไฟล์เดียวกันในวินาทีเดียวกัน</p>

                    <h4 style="margin-top: 25px;">2. เจาะลึกโปรโตคอลมาตรฐานเครือข่าย: SMB และ CIFS</h4>
                    <p>การสื่อสารระหว่างเครื่องแม่ข่ายจัดเก็บข้อมูลและเครื่องลูกข่าย (โดยเฉพาะ Windows Client) อาศัยโปรโตคอลหลักดังนี้:</p>
                    <ul style="padding-left: 20px; margin-bottom: 20px;">
                        <li><strong>SMB (Server Message Block):</strong> โปรโตคอลระดับ Application Layer (ทำงานบนพอร์ต TCP 445 และ NetBIOS พอร์ต 137, 138, 139) มีประวัติการพัฒนามาอย่างยาวนาน โดยในปัจจุบันใช้งานเวอร์ชัน <strong>SMBv2 และ SMBv3</strong> ซึ่งมีการเข้ารหัสลับข้อมูล (Encryption) ป้องกันการโจรกรรมข้อมูล และเร่งความเร็วในการส่งผ่านไฟล์ข้ามเครือข่ายขนาดใหญ่</li>
                        <li><strong>CIFS (Common Internet File System):</strong> เป็นหนึ่งในไดอะเลกต์ (Dialect) หรือเวอร์ชันย่อยของ SMBv1 ที่ทาง Microsoft พัฒนาขึ้นในอดีต ปัจจุบันถือเป็นโปรโตคอลที่เก่าล้าสมัย (Deprecated) เนื่องจากมีช่องโหว่ความปลอดภัยสูง แต่คำนี้ยังถูกเรียกติดปากในฐานะความหมายของการแชร์ไฟล์ร่วมกัน</li>
                    </ul>

                    <h4>3. หลักการทำงานพื้นฐานโครงสร้างแบบ NAS (Network Attached Storage)</h4>
                    <p>ในการจัดวางระบบสถาปัตยกรรมการจัดเก็บข้อมูล แอดมินต้องแยกความแตกต่างระหว่าง 3 เทคโนโลยีหลักให้ออกอย่างเด็ดขาด:</p>
                    <table class="grading-table" style="margin: 15px 0; background: #f8fafc; font-size: 0.9rem;">
                        <thead>
                            <tr style="background: #cbd5e1;">
                                <th style="padding: 10px; text-align: center; width: 25%;">รูปแบบโครงสร้าง</th>
                                <th style="padding: 10px; text-align: center; width: 25%;">ระดับการเข้าถึงข้อมูล</th>
                                <th style="padding: 10px;">ลักษณะสถาปัตยกรรมการทำงาน</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align: center; font-weight: 600;"><strong>DAS</strong><br>(Direct Attached)</td>
                                <td style="text-align: center; color: #475569;">Block-level</td>
                                <td>เสียบฮาร์ดดิสก์ต่อตรงเข้ากับบอร์ดเซิร์ฟเวอร์ผ่านสาย SATA/SAS/USB เครื่องใครเครื่องมัน แย่งกันใช้ไม่ได้</td>
                            </tr>
                            <tr>
                                <td style="text-align: center; font-weight: 600; color: #2563eb;"><strong>NAS</strong><br>(Network Attached)</td>
                                <td style="text-align: center; color: #2563eb; font-weight: 600;">File-level</td>
                                <td><strong>เป็นกล่องหรือเซิร์ฟเวอร์อิสระที่มี OS ของตัวเอง ต่อเข้าสวิตช์เครือข่าย แชร์ข้อมูลออกมาเป็นโฟลเดอร์ผ่านโปรโตคอล SMB/NFS ให้ทุกเครื่องเข้ามาดึงพร้อมกันได้</strong></td>
                            </tr>
                            <tr>
                                <td style="text-align: center; font-weight: 600;"><strong>SAN</strong><br>(Storage Area Network)</td>
                                <td style="text-align: center; color: #475569;">Block-level</td>
                                <td>เครือข่ายความเร็วสูงความหน่วงต่ำพิเศษ (เช่น Fiber Channel) แยกดิสก์พูลขนาดใหญ่ออกมา มองเห็นเป็นไดรฟ์ดิบเสมือนฝังในเครื่อง เหมาะกับ Database/Virtualization หนักๆ</td>
                            </tr>
                        </tbody>
                    </table>
                </section>

                <!-- Section 2: ภาคปฏิบัติการคอนฟิก Samba Server -->
                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 30px;">
                    <h3 class="section-title">💻 ภาคปฏิบัติ 1: ขับเคลื่อนคลังแชร์และการล็อกสิทธิ์ด้วย Samba Server</h3>
                    <p>นักศึกษาจะได้ลงมือเปลี่ยนเครื่อง Linux Ubuntu Server ให้กลายเป็นระบบบริการแชร์ไฟล์ที่ปลอดภัย เพื่อรับการเชื่อมโยงจากฝั่งเครื่อง Windows Client</p>

                    <h4 style="margin-top: 15px;">ขั้นตอนที่ 1: ติดตั้งแพ็คเกจและจัดเตรียมโฟลเดอร์เป้าหมาย</h4>
                    <div class="code-window">
                        <div class="code-header"><span class="code-lang">Terminal</span></div>
                        <pre>sudo apt update && sudo apt install samba samba-common-bin -y
sudo mkdir -p /srv/samba/marketing_share
sudo chown -R nobody:nogroup /srv/samba/marketing_share
sudo chmod -R 777 /srv/samba/marketing_share</pre>
                    </div>

                    <h4 style="margin-top: 25px;">ขั้นตอนที่ 2: การสร้างบัญชีผู้ใช้งานระบบแบ่งแยกสิทธิ์ (Samba User Isolation)</h4>
                    <p>บัญชีที่จะล็อกอินเข้าแชร์ไฟล์ของ Samba จะต้องลงทะเบียนฐานข้อมูลรหัสผ่านแยกจาก Linux Account ปกติเพื่อความปลอดภัย:</p>
                    <div class="code-window">
                        <div class="code-header"><span class="code-lang">Terminal</span></div>
                        <pre># สร้างยูสเซอร์ระบบแบบไม่ให้สิทธิ์รีโมทหน้าต่าง Shell (No-Login Shell)
sudo useradd -M -s /sbin/nologin mktuser

# ผูกรหัสผ่านเข้าฐานข้อมูลความปลอดภัยของโปรแกรม Samba
sudo smbpasswd -a mktuser</pre>
                    </div>

                    <h4 style="margin-top: 25px;">ขั้นตอนที่ 3: กำหนดกฎระเบียบคลังข้อมูลภายในไฟล์หลัก</h4>
                    <p>เปิดระบบแก้ไขไฟล์คอนฟิก <code>sudo nano /etc/samba/smb.conf</code> แล้วเลื่อนลงไปด้านล่างสุดเพื่อเขียนขอบเขตการแชร์:</p>
                    <div class="code-window">
                        <div class="code-header"><span class="code-lang">smb.conf</span></div>
                        <pre>[Marketing-Data]
   comment = คลังข้อมูลลับเฉพาะทีมการตลาด
   path = /srv/samba/marketing_share
   browsable = yes
   writable = yes
   guest ok = no
   valid users = mktuser
   create mask = 0755
   directory mask = 0755</pre>
                    </div>
                    <div class="code-window" style="margin-top: 10px;">
                        <div class="code-header"><span class="code-lang">Terminal</span></div>
                        <pre>sudo testparm                # สั่งตรวจสอบความถูกต้องของไวยากรณ์ไฟล์ smb.conf
sudo systemctl restart smbd  # สั่งรีสตาร์ทบริการแชร์ไฟล์แซมบ้า</pre>
                    </div>

                    <h4 style="margin-top: 25px;">ขั้นตอนที่ 4: การเข้าถึงรีโมทดึงจากเครื่อง Client Windows</h4>
                    <p>บนเครื่องระบบปฏิบัติการ Windows ที่อยู่ในวงแลนเดียวกัน ให้กดปุ่ม <kbd>Win</kbd> + <kbd>R</kbd> เปิดหน้าต่าง Run พิมพ์พิกัด <code>\[IP-Linux-Server]\Marketing-Data</code> จากนั้นระบบจะแสดงกล่องข้อความความปลอดภัย ให้กรอกชื่อผู้ใช้ <code>mktuser</code> และรหัสผ่านที่ตั้งไว้เพื่อเข้าใช้งานในรูปแบบ Network Drive ทันที</p>
                </section>

                <!-- Section 3: แนะนำทางเลือก Enterprise และเครื่องมือมอบหมายงาน -->
                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0;">
                    <h3 class="section-title">🛠️ ภาคปฏิบัติ 2: ทางเลือกขั้นสูงและการมอบหมายงานระบบจัดเก็บข้อมูลองค์กร</h3>
                    <p>นอกเหนือจากการพิมพ์คำสั่งดิบบนลินุกซ์แล้ว ปัจจุบันวงการวิศวกรรมระบบมีเครื่องมือสำเร็จรูปขั้นสูงที่ช่วยผ่อนแรงและยกระดับประสิทธิภาพคลังข้อมูล ซึ่งนักศึกษาจะต้องเรียนรู้เพื่อนำไปปรับใช้ในโครงงานมอบหมายงาน (Assignments):</p>

                    <div style="margin-top: 20px;">
                        <h4 style="color: #1e293b; border-left: 4px solid #3b82f6; padding-left: 10px;">1. TrueNAS (Core / Scale)</h4>
                        <p style="font-size: 0.95rem; padding-left: 15px;">ระบบปฏิบัติการสำหรับทำ NAS ระดับ Enterprise ขับเคลื่อนด้วยสถาปัตยกรรมไฟล์ระบบ <strong>ZFS (Zettabyte File System)</strong> มีความสามารถเด่นในเรื่องการทำ RAID-Z ป้องกันข้อมูลสูญหายแม้ฮาร์ดดิสก์พังพร้อมกันหลายลูก ระบบตรวจสอบและซ่อมแซมไฟล์เสียอัตโนมัติ (Self-Healing) และระบบ Snapshot ย้อนเวลาข้อมูลป้องกันความเสียหายจากมัลแวร์เรียกค่าไถ่</p>
                    </div>

                    <div style="margin-top: 20px;">
                        <h4 style="color: #1e293b; border-left: 4px solid #10b981; padding-left: 10px;">2. CasaOS</h4>
                        <p style="font-size: 0.95rem; padding-left: 15px;">ระบบบริหารจัดการ Cloud ประจำบ้าน (Home Cloud Dashboard) ยุคใหม่ที่ทำงานอยู่บนพื้นฐานของ <strong>Docker Container</strong> มุ่งเน้นการสร้างหน้าจอแผงควบคุม (GUI) ที่สวยงาม ทันสมัย ใช้งานง่าย แอดมินสามารถสั่งติดตั้งแอปพลิเคชันแชร์ไฟล์ โหลดบิททอร์เรนต์ หรือระบบสตรีมมิ่งหนังในสำนักงานได้ด้วยการคลิกเพียงครั้งเดียว (One-Click Install)</p>
                    </div>

                    <div style="margin-top: 20px;">
                        <h4 style="color: #1e293b; border-left: 4px solid #f59e0b; padding-left: 10px;">3. Xpenology และการติดตั้งด้วย Arc Loader</h4>
                        <p style="font-size: 0.95rem; padding-left: 15px;">การจำลองติดตั้งระบบปฏิบัติการ DSM (DiskStation Manager) อันเลื่องชื่อของตระกูล Synology ลงบนฮาร์ดแวร์คอมพิวเตอร์ทั่วไปที่ไม่มีแบรนด์ โดยอาศัยเครื่องมือช่วยบูตระดับสูงอย่าง <strong>Arc Loader</strong> ทำหน้าที่เป็นตัวกลางในการคอมไพล์แพตช์เคอร์เนลและไดรเวอร์ (Hardware Mapping) ให้เหมาะสมกับสเปกเครื่องคอมพิวเตอร์ทั่วไป ทำให้นักศึกษาสามารถสัมผัสประสบการณ์ซอฟต์แวร์ระดับโลกได้โดยไม่ต้องจัดซื้อเครื่องราคาสูง</p>
                    </div>

                    <div style="margin-top: 20px;">
                        <h4 style="color: #1e293b; border-left: 4px solid #ec4899; padding-left: 10px;">4. การสร้าง Private Web Cloud ด้วย ownCloud</h4>
                        <p style="font-size: 0.95rem; padding-left: 15px;">เปลี่ยนสไตล์การแชร์ไฟล์ในวงแลน ให้กลายเป็นระบบเก็บข้อมูลบนหน้าเว็บอินเทอร์เน็ตส่วนตัว คล้ายกับ Google Drive หรือ Dropbox โดย <strong>ownCloud</strong> จะส่งมอบหน้าจอผู้ใช้งานที่รองรับการลากวางไฟล์ (Drag and Drop) การสร้างลิงก์แชร์ไฟล์ส่งต่อให้บุคคลภายนอกกำหนดวันหมดอายุ และมีแอปพลิเคชันบนสมาร์ทโฟนคอยซิงค์รูปภาพและเอกสารกลับคืนสู่เซิร์ฟเวอร์สำนักงานโดยอัตโนมัติผ่านโปรโตคอล WebDAV</p>
                    </div>

                    <div class="analogy-box" style="background: #eff6ff; border-left: 4px solid #2563eb; margin-top: 25px;">
                        <strong>🎯 โจทย์การมอบหมายงานกลุ่มประจำสัปดาห์ (Group Assignment Choices):</strong><br>
                        <span style="font-size: 0.9rem; color: #334155;">ให้นักศึกษาแบ่งกลุ่ม กลุ่มละ 3 คน เลือกศึกษาและจัดตั้งระบบแชร์ไฟล์ขั้นสูง 1 ระบบจากตัวเลือกด้านบน (TrueNAS / CasaOS / Xpenology via Arc / ownCloud) ดำเนินการติดตั้งจริง ทดสอบจำลองสิทธิ์การเข้าถึง บันทึกคลิปวิดีโอสาธิตการทำงาน และจัดทำรูปเล่มรายงานส่งท้ายสัปดาห์เพื่อประเมินสมรรถนะการเรียนรู้ระดับสูง</span>
                    </div>
                </section>
            </div>

            <!-- ─── ฝั่งซ้ายจบ ─── ฝั่งขวาเริ่ม: แถบข้างข้อมูลเสริม ─── -->
            <aside>
                <div class="sidebar-card">
                    <h4>📋 ข้อมูลประจำหน่วย</h4>
                    <p style="font-size: 0.9rem; color: #475569;">
                        <strong>สัปดาห์ที่:</strong> 11<br>
                        <strong>เวลาเรียน:</strong> 5 ชั่วโมง (ทฤษฎี 1, ปฏิบัติ 4)<br>
                        <strong>เกณฑ์การประเมิน:</strong> คอนฟิกโครงสร้างแซมบ้าผ่านกฎความปลอดภัยข้อความถูกต้อง (3 คะแนน) สิทธิ์การจำกัดยูสเซอร์จากเครื่องวินโดว์สำเร็จ (3 คะแนน) ผลงานและการพรีเซนต์ตัวเลือกเทคโนโลยีมอบหมายงานระดับสูงประจำกลุ่ม (4 คะแนน)
                    </p>
                </div>

                <div class="sidebar-card" style="border-left: 4px solid #ef4444;">
                    <h4>🚨 กับดักอันตราย: ฝันร้ายจากสิทธิ์ 777 และภัย Ransomware</h4>
                    <p style="font-size: 0.85rem; color: #64748b; line-height: 1.5;">
                        ข้อควรระวังอย่างยิ่งในการจัดตั้ง File Server คือห้ามตั้งค่าสิทธิ์ภายในแชร์ไฟล์เป็นสาธารณะโดยไม่มีรหัสผ่านเด็ดขาด และในระดับระบบปฏิบัติการ Linux การสั่ง <code class="inline-code">chmod -R 777</code> บนโฟลเดอร์แชร์ในชีวิตการทำงานจริง ถือเป็นช่องโหว่ร้ายแรงที่เปิดโอกาสให้ไวรัสสายพันธุ์เรียกค่าไถ่ (Ransomware) ที่หลุดเข้ามาในเครื่อง Client เครื่องใดเครื่องหนึ่ง สามารถวิ่งผ่านพอร์ต 445 เข้ามาเข้ารหัสล็อกไฟล์ทั้งหมดในถังกลางขององค์กรพังพินาศได้ในพริบตา! แอดมินจึงต้องคุมสิทธิ์ครอบครอง (Ownership) และหน้ากากกรองสิทธิ์ (Create Mask) ให้รัดกุมที่สุด
                    </p>
                </div>
            </aside>
        </main>
    </div>

    <script src="../assets/js/script.js"></script>
</body>

</html>