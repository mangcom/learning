<?php
$base_dir = "../"; // ถอยกลับ 1 ชั้นไปที่ Root เพื่อเรียกคอมโพเนนต์
$active_nav = "devops"; // ไฮไลต์เมนูวิชา DevOps
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>บทเรียนเสริม: Private PHP Automated Deployment (SSH Deploy Keys)</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght=300;400;600;700&family=Fira+Code:wght@400;500&display=swap" rel="stylesheet">
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

        .phase-badge {
            background: #10b981;
            /* ใช้สีเขียวบ่งบอกระดับความปลอดภัยความเป็น Private Secure */
            color: #fff;
            padding: 3px 10px;
            border-radius: 4px;
            font-size: 0.8rem;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 10px;
        }

        .terminal-comment {
            color: #6a9955;
            font-style: italic;
        }

        .terminal-cmd {
            color: #f43f5e;
            font-weight: bold;
        }
    </style>
</head>

<body style="background-color: #f8fafc;">

    <?php include '../components/navbar.php'; ?>

    <div class="page-header" style="background: #0f172a; color: #fff; padding: 40px 0 65px 0; border-bottom: 4px solid #10b981;">
        <div class="container">
            <a href="unit11.php" class="back-link" style="color: #a7f3d0; text-decoration: none; display: inline-block; margin-bottom: 15px;">
                <span class="arrow-icon">⬅</span> <span>กลับสู่หน่วยที่ 11 (CI/CD)</span>
            </a>
            <div>
                <span class="course-code" style="background: #065f46; color: #fff; padding: 4px 12px; border-radius: 4px; font-weight: 600; font-size: 0.9rem;">บทเรียนเสริมพิเศษ (การกำหนดสิทธิ์และความปลอดภัย)</span>
                <h2 style="margin: 10px 0 5px 0; font-size: 1.8rem; font-weight: 700;">Private PHP Automated Deployment (SSH Deploy Keys)</h2>
                <p style="color: #e2e8f0; margin: 0; font-size: 0.95rem;">ไกด์ไลน์การสร้างท่อจัดส่งซอฟต์แวร์อัตโนมัติสำหรับคลังข้อมูลส่วนตัว (Private Repository) บนสถาปัตยกรรม Ubuntu Server อย่างปลอดภัย</p>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 30px;">
        <main>
            <div class="content-area">

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 30px;">
                    <h3 class="section-title" style="color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">📐 สถาปัตยกรรมและจุดเด่นเมื่อเปลี่ยนเป็น Private Repository</h3>
                    <p>ถ้า Repository บน GitHub ของนักศึกษาเป็น <strong>Private Repository</strong> จะมีจุดสำคัญมากหนึ่งจุดที่ต้องปรับเพิ่มจากคลังสาธารณะ (Public Repository) คือ <strong>"เซิร์ฟเวอร์ปลายทางจะต้องได้รับสิทธิ์ในการอ่านคลังข้อมูลนั้นอย่างถูกต้อง"</strong> เนื่องจากคำสั่งควบคุมพื้นฐานของ Git เช่น:</p>

                    <ul style="padding-left: 20px; color: #475569; margin-bottom: 20px; line-height: 1.8;">
                        <li><code>git clone ...</code></li>
                        <li><code>git fetch origin</code></li>
                        <li><code>git pull origin main</code></li>
                    </ul>

                    <p>เมื่อรันอยู่บนระบบปฏิบัติการ Ubuntu Server คำสั่งเหลี่ยมนี้จำเป็นต้องผ่านกระบวนการยืนยันตัวตน (Authentication) กับ GitHub ก่อนทุกครั้ง สำหรับการทำงานบนระบบ Production วิธีการที่แนะนำ มีความมั่นคง ปลอดภัย และเป็นมาตรฐานสากลมากที่สุดคือ <strong>"การใช้ SSH Key (Deploy Keys)"</strong> ซึ่งปลอดภัยกว่าระบบ Personal Access Token ที่มีโอกาสหมดอายุหรือรั่วไหลได้ง่ายกว่า</p>

                    <h4 style="margin-top: 25px; color: #1e293b; font-weight: 700;">สรุปภาพรวมโครงสร้างสถาปัตยกรรม (Architecture Summary)</h4>
                    <div style="background: #f1f5f9; padding: 18px; border-radius: 8px; font-family: monospace; font-size: 0.9rem; line-height: 1.6; margin: 15px 0; color: #334155; border: 1px solid #e2e8f0;">
                        Developer<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;│<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;│ git push<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;▼<br>
                        Private GitHub Repository<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;│<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;▼<br>
                        GitHub Actions<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;│<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;│ SSH เข้าทำงานทางไกล<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;▼<br>
                        Ubuntu Server<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;├── SSH Key (ตัวยืนยันสิทธิ์ตัวจริงกับคลังส่วนตัว)<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;├── git fetch<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;├── git reset --hard origin/main<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;└── Deploy ประสบความสำเร็จ
                    </div>
                </section>

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0;">
                    <h3 class="section-title" style="color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">🛠️ ขั้นตอนการกำหนดค่าเพื่อรองรับคลังส่วนตัว (6 Steps Guide)</h3>

                    <div style="background: #fffdf5; border-left: 4px solid #d97706; padding: 18px; border-radius: 8px; margin-bottom: 30px; border: 1px solid #fef3c7; border-left-width: 4px;">
                        <h5 style="margin: 0 0 8px 0; color: #b45309; font-size: 1rem; font-weight: 700;">🔍 ขั้นตอนสำคัญ: ตรวจสอบที่อยู่คลังเดิมบน Server</h5>
                        <p style="margin: 0; font-size: 0.92rem; color: #451a03; line-height: 1.6;">ให้ทำการเชื่อมต่อเข้าไปยังเครื่อง Ubuntu Server แล้วย้ายเข้าไปที่ตำแหน่งของโฟลเดอร์โปรเจกต์ของคุณเพื่อเรียกดูที่อยู่เดิมของ Git:</p>
                        <div class="code-window" style="background: #0f172a; color: #f8fafc; padding: 12px; border-radius: 6px; font-family: monospace; font-size: 0.85rem; margin-top: 10px;">
                            cd /var/www/html/myapps/myproject<br>
                            git remote -v
                        </div>
                        <p style="margin: 10px 0 0 0; font-size: 0.92rem; color: #451a03; line-height: 1.6;">หากผลลัพธ์แสดงเป็นรูปแบบโปรโตคอล HTTPS เช่น <code>origin https://github.com/username/myproject.git</code> <strong>คุณจำเป็นต้องทำการแก้ไขให้เป็นรูปแบบ SSH</strong> คือ <code>origin git@github.com:username/myproject.git</code> ตามขั้นตอนคู่มือต่อไปนี้</p>
                    </div>

                    <div style="margin-bottom: 30px;">
                        <span class="phase-badge">ขั้นตอนที่ 1</span> <strong>สร้าง SSH Key สำหรับ Repository บน Ubuntu Server</strong>
                        <p style="font-size: 0.95rem; margin: 5px 0; color: #475569;">รันคำสั่งสลักรหัสผ่านบน Server เพื่อสร้างคู่กุญแจความปลอดภัย:</p>
                        <div class="code-window" style="background: #0f172a; color: #f8fafc; padding: 12px; border-radius: 6px; font-family: 'Fira Code', monospace; font-size: 0.9rem;">
                            ssh-keygen -t ed25519 -C "deploy-server"
                        </div>
                        <p style="font-size: 0.9rem; color: #64748b; margin: 8px 0 0 0; line-height: 1.6;">*ในระหว่างรันระบบจะถามตำแหน่งเก็บและรหัสผ่านเพิ่มเติม ให้ทำการกด <strong>Enter</strong> ข้ามไปทุกครั้งจนเสร็จสิ้น คุณจะได้รับไฟล์จำนวน 2 ไฟล์ในเครื่องคอมพิวเตอร์แม่ข่ายคือ:<br>
                            • <code>~/.ssh/id_ed25519</code> (ไฟล์กุญแจส่วนบุคคล ห้ามเผยแพร่เด็ดขาด)<br>
                            • <code>~/.ssh/id_ed25519.pub</code> (ไฟล์กุญแจสาธารณะสำหรับนำไปใช้ยืนยันตัวตน)</p>
                    </div>

                    <div style="margin-bottom: 30px;">
                        <span class="phase-badge">ขั้นตอนที่ 2</span> <strong>เปิดดูรหัส Public Key เพื่อคัดลอก</strong>
                        <p style="font-size: 0.95rem; margin: 5px 0; color: #475569;">พิมพ์คำสั่งเปิดข้อความในไฟล์สาธารณะออกมาทางหน้าจอคอนโซล:</p>
                        <div class="code-window" style="background: #0f172a; color: #f8fafc; padding: 12px; border-radius: 6px; font-family: 'Fira Code', monospace; font-size: 0.9rem;">
                            cat ~/.ssh/id_ed25519.pub
                        </div>
                        <p style="font-size: 0.95rem; margin: 8px 0 5px 0; color: #475569;">ให้ทำทำการ <strong>Copy ข้อความผลลัพธ์ทั้งหมดทั้งบรรดาทุกตัวอักษร</strong> (ตัวอย่างเช่น):</p>
                        <div class="code-window" style="background: #1e293b; color: #cbd5e1; padding: 12px; border-radius: 6px; font-family: monospace; font-size: 0.85rem;">
                            ssh-ed25519 AAAAC3NzaC1lZDI1NTE5AAAAI.... deploy-server
                        </div>
                    </div>

                    <div style="margin-bottom: 30px;">
                        <span class="phase-badge">ขั้นตอนที่ 3</span> <strong>นำ Public Key ไปเปิดสิทธิ์ Deploy Key บน GitHub Repository</strong>
                        <p style="font-size: 0.95rem; margin: 5px 0; color: #475569;">ล็อกอินบราวเซอร์และเปิดไปยังหน้าคลังโปรเจกต์ที่เป็น Private ของคุณบน GitHub จากนั้นดำเนินตามเส้นทางดังนี้:</p>
                        <div style="background: #f8fafc; border: 1px solid #e2e8f0; padding: 15px; border-radius: 6px; font-size: 0.95rem; color: #334155; line-height: 1.7; margin-top: 10px;">
                            <strong>Settings</strong> ➔ แถบเมนูด้านซ้ายเลือก <strong>Deploy keys</strong> ➔ กดปุ่ม <strong>Add deploy key</strong>
                        </div>
                        <p style="font-size: 0.95rem; margin: 10px 0 5px 0; color: #475569;">จากนั้นให้ระบุค่าดังต่อไปนี้ลงในฟอร์ม:</p>
                        <ul style="padding-left: 20px; font-size: 0.95rem; color: #475569; line-height: 1.7;">
                            <li><strong>Title:</strong>ระบุชื่อสำหรับจดจำสิทธิ์ เช่น <code>Ubuntu Production Server</code></li>
                            <li><strong>Key:</strong> วางรหัสรหัสสาธารณะทั้งหมดที่ทำการคัดลอกมาจากขั้นตอนที่ 2 (ขึ้นต้นด้วย <code>ssh-ed25519...</code>)</li>
                            <li>ทำการเลือกติ๊กถูกที่ปุ่ม <strong style="color: #10b981;">✓ Allow write access</strong> (ถึงแม้ในแง่ของระบบ CI/CD เราจะเน้นคำสั่งดึงงานหรือ Pull อย่างเดียวเป็นหลัก แต่ส่วนตัวผมมักแนะนำให้เปิดรับสิทธิ์นี้ไว้เพื่อรองรับการทำงานของคำสั่งขั้นสูงบางตัวในอนาคตครับ)</li>
                        </ul>
                        <p style="font-size: 0.95rem; margin: 5px 0; color: #475569;">ตรวจสอบความถูกต้องเรียบร้อยแล้วให้กดคลิกปุ่ม <strong>Add key</strong> เพื่อบันทึกสิทธิ์ลงระบบ</p>
                    </div>

                    <div style="margin-bottom: 30px;">
                        <span class="phase-badge">ขั้นตอนที่ 4</span> <strong>ทดสอบการยืนยันตัวตนผ่านโปรโตคอล SSH</strong>
                        <p style="font-size: 0.95rem; margin: 5px 0; color: #475569;">กลับมาที่หน้าต่าง Terminal บนตัว Ubuntu Server รันคำสั่งยิงทดสอบสายตรงไปยังเซิร์ฟเวอร์หลักของ GitHub:</p>
                        <div class="code-window" style="background: #0f172a; color: #f8fafc; padding: 12px; border-radius: 6px; font-family: 'Fira Code', monospace; font-size: 0.9rem;">
                            ssh -T git@github.com
                        </div>
                        <p style="font-size: 0.95rem; margin: 8px 0 5px 0; color: #475569;">สำหรับการรันเพื่อทดสอบเชื่อมต่อในครั้งแรก ระบบจะแสดงผลตอบรับแจ้งเตือนความปลอดภัยเพื่อขอคำยืนยัน:</p>
                        <div class="code-window" style="background: #1e293b; color: #cbd5e1; padding: 10px; border-radius: 6px; font-family: monospace; font-size: 0.85rem;">
                            Are you sure you want to continue connecting (yes/no)?
                        </div>
                        <p style="font-size: 0.95rem; margin: 8px 0 5px 0; color: #475569;">ให้พิมพ์ตอบลงไปว่า <strong style="color: #10b981;">yes</strong> แล้วกดปุ่ม Enter หากไม่มีสิ่งใดผิดพลาด ระบบจะตอบรับว่าผ่านการตรวจสอบสิทธิ์สำเร็จแล้ว:</p>
                        <div class="code-window" style="background: #0f172a; color: #34d399; padding: 12px; border-radius: 6px; font-family: monospace; font-size: 0.85rem;">
                            Hi username! You've successfully authenticated, but GitHub does not provide shell access.
                        </div>
                    </div>

                    <div style="margin-bottom: 30px;">
                        <span class="phase-badge">ขั้นตอนที่ 5</span> <strong>ปรับเปลี่ยนค่าเส้นทางของ Remote จากรูปแบบเดิม HTTPS ไปเป็น SSH</strong>
                        <p style="font-size: 0.95rem; margin: 5px 0; color: #475569;">หากจากการตรวจสอบก่อนหน้านี้พบว่า URL คลังปลายทางของคุณยังเป็นแบบ HTTPS ให้รันสวิตช์ค่า URL ใหม่ให้ผูกโยงเข้าสู่ช่องทางสิทธิ์ SSH แทน:</p>
                        <div class="code-window" style="background: #0f172a; color: #f8fafc; padding: 12px; border-radius: 6px; font-family: 'Fira Code', monospace; font-size: 0.9rem;">
                            <span class="terminal-comment"># สั่งเปลี่ยนที่อยู่ของคลังข้อมูลหลัก (origin)</span><br>
                            git remote set-url origin git@github.com:username/myproject.git<br><br>
                            <span class="terminal-comment"># ตรวจสอบเพื่อรีเช็กความถูกต้องอีกครั้ง</span><br>
                            git remote -v
                        </div>
                        <p style="font-size: 0.95rem; margin: 8px 0 5px 0; color: #475569;">ผลลัพธ์ปลายทางในชุดตัวแปรของเครื่องจะต้องอัปเดตเป็นรูปแบบ SSH ทั้งหมดเรียบร้อยแล้วดังนี้:</p>
                        <div class="code-window" style="background: #1e293b; color: #cbd5e1; padding: 10px; border-radius: 6px; font-family: monospace; font-size: 0.85rem;">
                            origin git@github.com:username/myproject.git (fetch)<br>
                            origin git@github.com:username/myproject.git (push)
                        </div>
                    </div>

                    <div style="margin-bottom: 20px;">
                        <span class="phase-badge">ขั้นตอนที่ 6</span> <strong>รันคำสั่งทดสอบการ Pull ดึงซอร์สโค้ดในสภาวะจำลองจริง</strong>
                        <p style="font-size: 0.95rem; margin: 5px 0; color: #475569;">ทดลองสั่งอัปเดตประวัติของคลังเพื่อตรวจสอบว่าท่อเปิดรับสิทธิ์ทำงานได้เต็มรูปแบบโดยไม่มีการติดขัดขัดข้อง:</p>
                        <div class="code-window" style="background: #0f172a; color: #f8fafc; padding: 12px; border-radius: 6px; font-family: 'Fira Code', monospace; font-size: 0.9rem;">
                            git fetch origin
                        </div>
                        <p style="font-size: 0.95rem; margin: 5px 0; color: #475569;">หรือรันทดสอบดึงประวัติสายหลักลงมาอัปเดตลงโฟลเดอร์:</p>
                        <div class="code-window" style="background: #0f172a; color: #f8fafc; padding: 12px; border-radius: 6px; font-family: 'Fira Code', monospace; font-size: 0.9rem;">
                            git pull origin main
                        </div>
                        <p style="font-size: 0.95rem; margin: 8px 0 0 0; color: #334155; line-height: 1.6;">หากกระบวนการทั้งหมดทำงานผ่านฉลุยและ <strong>ไม่มีหน้าต่างหรือ Error แจ้งเตือนเรื่องปัญหาการปฏิเสธการเข้าถึงสิทธิ์ (Permission Denied)</strong> แสดงว่าตอนนี้ Ubuntu Server ปลายทางได้รับพลังเข้าถึง Private Repository ของคุณอย่างสมบูรณ์แล้ว</p>
                    </div>

                    <div style="border-top: 2px solid #e2e8f0; padding-top: 25px; margin-top: 30px;">
                        <h4 style="color: #1e293b; margin-top: 0; font-weight: 700;">❓ คำถามชวนคิด: ในเมื่อเปลี่ยนเป็น Private Repo ฝั่งท่อ GitHub Actions ต้องแก้ไขโค้ดอะไรไหม?</h4>
                        <p style="font-size: 0.95rem; color: #475569; line-height: 1.7; margin-bottom: 0;">คำตอบสั้นๆ คือ <strong>"ฝั่งสคริปต์ขั้นตอนจัดส่งงาน (Workflow .yml) ไม่ต้องแก้ไขโค้ดใดๆ เลยครับ"</strong> ปลั๊กอินหรือ Actions ยอดนิยมที่เรานำมาใช้งานตัวเดิมอย่าง:</p>
                        <div class="code-window" style="background: #0f172a; color: #f8fafc; padding: 12px; border-radius: 6px; font-family: 'Fira Code', monospace; font-size: 0.85rem; margin: 12px 0;">
                            uses: appleboy/ssh-action@v1.2.0
                        </div>
                        <p style="font-size: 0.95rem; color: #475569; line-height: 1.7; margin-bottom: 0;">ยังทำงานได้ปกติเหมือนตอนใช้คลัง Public ทุกประการ เหตุผลเพราะระบบของ GitHub Actions ทำหน้าที่เพียงแค่สลักคำสั่งรีโมทผ่านระบบ SSH เข้ามารันสะกิดสคริปต์คอมมานด์ไลน์ภายในตัวเครื่อง Ubuntu Server เท่านั้น ส่วนหน้าที่ในการดึงไฟล์หรืออัปเดตไฟล์ซอร์สโค้ดจาก Private GitHub Repository ข้ามเครือข่ายอินเทอร์เน็ต จะเกิดขึ้นโดยใช้สิทธิ์ของตัว <strong>Ubuntu Server</strong> ที่คุยกับ GitHub ผ่านกุญแจความปลอดภัย SSH Deploy Key ที่เราผูกไว้ในกระบวนการนี้ ดังนั้นจึงไม่ส่งผลกระทบต่อชุดโครงสร้างบน GitHub Actions แต่อย่างใดครับ</p>
                    </div>

                </section>
            </div>

            <aside>
                <div class="sidebar-card" style="background: #fff; padding: 22px; border-radius: 10px; border: 1px solid #e2e8f0; margin-bottom: 25px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
                    <h4 style="margin-top: 0; margin-bottom: 12px; font-size: 1.05rem; font-weight: 700; color: #1e293b;">💡 คำแนะนำชุดคำสั่งบนสภาพแวดล้อมจริง (Production Setup)</h4>
                    <p style="font-size: 0.88rem; color: #475569; line-height: 1.6; margin: 0;">
                        สคริปต์ฝั่งคำสั่งที่รันภายใต้ไดเรกทอรีงานบนเครื่องเซิร์ฟเวอร์ที่คุณควรเขียนลงในท่อ Actions:
                    </p>
                    <div style="background: #0f172a; color: #f8fafc; padding: 12px; border-radius: 6px; font-family: 'Fira Code', monospace; font-size: 0.8rem; margin: 12px 0; line-height: 1.5;">
                        script: |<br>
                        &nbsp;&nbsp;cd /var/www/html/myapps/myproject<br>
                        &nbsp;&nbsp;git remote set-url origin git@github.com:username/myproject.git<br>
                        &nbsp;&nbsp;git fetch origin<br>
                        &nbsp;&nbsp;git reset --hard origin/main
                    </div>
                    <p style="font-size: 0.88rem; color: #b45309; line-height: 1.6; margin: 0; font-weight: 500;">
                        🚨 ข้อควรระวัง: ห้ามนำคำสั่ง git pull มาใช้งานบนสภาพแวดล้อม Production เด็ดขาด! เพราะเสี่ยงต่อการเกิดภัยพิบัติ Merge Conflict หากมีใครเผลอไปแก้ไขหรือเพิ่มไฟล์บนเซิร์ฟเวอร์ตรงๆ การรันด้วยแนวทาง reset --hard จะช่วยล้างและรักษาไฟล์ให้ตรงกับคลังหลัก 100% เสมอ
                    </p>
                </div>

                <div class="sidebar-card" style="background: #fff; padding: 22px; border-radius: 10px; border: 1px solid #e2e8f0; border-left: 4px solid #3b82f6; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
                    <h4 style="margin-top: 0; margin-bottom: 12px; font-size: 1.05rem; font-weight: 700; color: #1d4ed8;">🛡️ เทคนิคระดับองค์กร: การแยกกุญแจ Deploy (Decoupled SSH Keys)</h4>
                    <p style="font-size: 0.85rem; color: #64748b; line-height: 1.6; margin: 0;">
                        หนึ่งเทคนิคสำคัญระดับ Enterprise ที่นิยมนำมาสอนนักศึกษาในการจัดการโปรเจกต์กลุ่มขนาดใหญ่ คือ <strong>"การสร้างและแยกคู่ไฟล์กุญแจ SSH Key สำหรับกิจกรรมจัดส่งงานโดยเฉพาะ"</strong> โดยระบุการบันทึกแยกไฟล์แยกสิทธิ์ชัดเจน เช่น:<br><br>
                        • <code>~/.ssh/github_deploy</code><br>
                        • <code>~/.ssh/github_deploy.pub</code><br><br>
                        แนวทางนี้จะช่วยแยกบทบาทเด็ดขาดระหว่างสิทธิ์ของผู้ดูแลระบบ (Admin) ในการรีโมทล็อกอินเข้าควบคุมเครื่อง กับสิทธิ์บัญชีอัตโนมัติในการดึงงาน CI/CD ออกจากกันอย่างปลอดภัย บริหารจัดการได้ง่ายในระยะยาว และเป็นแนวทางปฏิบัติสากลที่เหมาะสมที่สุดในการเรียนรู้สายงาน DevOps ครับ
                    </p>
                </div>
            </aside>
        </main>
    </div>

    <script src="../assets/js/script.js"></script>
</body>

</html>