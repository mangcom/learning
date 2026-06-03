<?php
$base_dir = "../"; // ถอยกลับ 1 ชั้นไปที่ Root เพื่อให้เรียกคอมโพเนนต์ได้ถูกต้อง
$active_nav = "devops"; // ไฮไลต์เมนูที่วิชา DevOps
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน่วยที่ 11: Continuous Delivery & Deployment (CD)</title>
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

        .yaml-key {
            color: #c792ea;
        }

        .yaml-val {
            color: #a7f3d0;
        }

        .yaml-dash {
            color: #89ddff;
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
                <span class="course-code" style="background: #7c3aed; color: #fff; padding: 4px 12px; border-radius: 4px; font-weight: 600; font-size: 0.9rem;">หน่วยที่ 11 (สัปดาห์ที่ 11)</span>
                <h2 style="margin: 10px 0 5px 0; font-size: 1.8rem; font-weight: 700;">Continuous Delivery & Deployment (CD)</h2>
                <p style="color: #e2e8f0; margin: 0; font-size: 0.95rem;">เชื่อมต่อระบบ CI สู่ปลายทาง สร้างท่อประกอบสมบูรณ์ (End-to-End Pipeline) เพื่อนำระบบขึ้นโปรดักชันอย่างปลอดภัยและไร้รอยต่อ</p>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 30px;">
        <main>
            <div class="content-area">

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 30px;">
                    <h3 class="section-title" style="color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">📘 ภาคทฤษฎี: เส้นทางสู่โปรดักชัน</h3>

                    <p>หลังจากที่เราทำการทดสอบโค้ดอัตโนมัติ (CI) ผ่านแล้ว ขั้นตอนต่อไปคือการ <strong>"นำไปติดตั้ง (Deploy)"</strong> ให้ผู้ใช้งานจริงได้ใช้ ซึ่งคำว่า CD นั้นมีความหมาย 2 ระดับที่คุณต้องแยกให้ออก:</p>



                    <ul style="padding-left: 20px; line-height: 1.6;">
                        <li><strong>Continuous Delivery (การส่งมอบต่อเนื่อง):</strong> โค้ดถูก Build เป็นแพ็กเกจ (เช่น Docker Image) และพร้อมที่จะขึ้นโปรดักชัน 100% แต่การจะกดปุ่ม Deploy ขึ้นเซิร์ฟเวอร์จริง <em>ยังต้องใช้มนุษย์ (Manager/QA) เป็นคนกดอนุมัติ (Manual Trigger)</em></li>
                        <li><strong>Continuous Deployment (การติดตั้งต่อเนื่อง):</strong> ระบบทุกอย่างเป็นอัตโนมัติ 100% ถ้าโค้ดผ่าน CI มันจะถูกนำไปติดตั้งบนโปรดักชันเซิร์ฟเวอร์ทันทีโดยไม่ต้องรอคนกด (เหมาะกับบริษัทเทคโนโลยีที่ระบบ Test แข็งแกร่งมาก)</li>
                    </ul>

                    <h4 style="margin-top: 25px; color: #4f46e5;">Deployment Strategy (กลยุทธ์การอัปเดตระบบ)</h4>
                    <p>การอัปเดตระบบแบบปิดปรับปรุงเว็บ (Downtime) เป็นเรื่องล้าสมัย ในยุค DevOps เรามีกลยุทธ์เพื่อไม่ให้ผู้ใช้รู้สึกสะดุดเลย:</p>
                    <ol style="padding-left: 20px; line-height: 1.6;">
                        <li><strong>Rolling Update:</strong> ทยอยปิดคอนเทนเนอร์เก่าทีละตัว แล้วเปิดตัวใหม่ขึ้นมาแทนที่ สลับกันไปจนครบ 100%</li>
                        <li><strong>Blue-Green Deployment:</strong> สร้างสภาพแวดล้อมใหม่ที่เหมือนของจริงทุกประการ (Green) อัปเดตให้เสร็จ พอพร้อมก็แค่สลับท่อ Network (Load Balancer) จากระบบเก่า (Blue) ไปที่ Green ทันที (หากพังก็สลับท่อกลับได้ภายใน 1 วินาที)</li>
                        <li><strong>Canary Release:</strong> ปล่อยฟีเจอร์ใหม่ให้ผู้ใช้งานแค่ 5% (เช่น นกคีรีบูนในเหมืองถ่านหิน) ถ้า 5% นี้ไม่เจอบั๊ก ค่อยๆ ขยายเป็น 20%, 50% จนเต็ม 100%</li>
                    </ol>

                    <h4 style="margin-top: 25px; color: #ef4444;">การทำ Rollback (การถอยกลับ)</h4>
                    <p>ไม่ว่าระบบ Test จะดีแค่ไหน บั๊กบนโปรดักชันก็เกิดขึ้นได้เสมอ <strong>การ Rollback</strong> คือกระบวนการย้อนกลับไปใช้แอปพลิเคชัน "เวอร์ชันก่อนหน้า" ที่เสถียรที่สุด ซึ่งในยุคของ Docker การทำ Rollback ทำได้ง่ายมาก เพียงแค่สั่งรัน Docker Image ที่ Tag เป็นเลขเวอร์ชันก่อนหน้า (เช่น จาก `v1.2` กลับไป `v1.1`) ระบบก็จะกลับมาทำงานได้ทันที</p>
                </section>

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 30px;">
                    <h3 class="section-title" style="color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">💻 ภาคปฏิบัติ: ประกอบร่าง End-to-End Pipeline</h3>

                    <p>เราจะใช้ GitHub Actions เขียนท่อ CI/CD ที่ทำงาน 3 ขั้นตอน: <strong>1. Test ➔ 2. Build & Push Image ➔ 3. Deploy (SSH เข้าไปอัปเดต Server)</strong></p>

                    <h4 style="margin-top: 20px;">Step 1: ตั้งค่า GitHub Secrets</h4>
                    <p>เพื่อความปลอดภัย ห้ามใส่รหัสผ่านลงในโค้ด ให้ไปที่ Repository ของคุณบน GitHub ➔ <strong>Settings</strong> ➔ <strong>Secrets and variables</strong> ➔ <strong>Actions</strong> และเพิ่มตัวแปรต่อไปนี้:</p>
                    <ul style="padding-left: 20px; line-height: 1.6; font-size: 0.95rem;">
                        <li><code>DOCKER_USER</code>: ชื่อผู้ใช้ Docker Hub</li>
                        <li><code>DOCKER_PASSWORD</code>: รหัสผ่าน หรือ Access Token ของ Docker Hub</li>
                        <li><code>SERVER_HOST</code>: หมายเลข IP ของเซิร์ฟเวอร์จำลอง (VM) ที่อาจารย์เตรียมให้</li>
                        <li><code>SERVER_USER</code>: ชื่อผู้ใช้ (เช่น root หรือ ubuntu)</li>
                        <li><code>SERVER_SSH_KEY</code>: กุญแจ Private Key (PEM) สำหรับเข้าสู่ระบบเซิร์ฟเวอร์</li>
                    </ul>

                    <h4 style="margin-top: 25px;">Step 2: เขียน Workflow ไฟล์ <code>.github/workflows/deploy.yml</code></h4>
                    <div class="code-window" style="background: #0f172a; color: #f8fafc; padding: 15px; border-radius: 8px; font-family: monospace; font-size: 0.9rem; overflow-x: auto;">
                        <span class="yaml-key">name:</span> Production CI/CD Pipeline<br><br>
                        <span class="yaml-key">on:</span><br>
                        &nbsp;&nbsp;<span class="yaml-key">push:</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-key">branches:</span> [ <span class="yaml-val">"main"</span> ] <span class="code-comment"># ทำงานเมื่อ Push ขึ้นกิ่ง main เท่านั้น</span><br><br>

                        <span class="yaml-key">jobs:</span><br>
                        &nbsp;&nbsp;<span class="code-comment"># --- JOB 1: ทดสอบโค้ด (จากสัปดาห์ 8) ---</span><br>
                        &nbsp;&nbsp;<span class="yaml-key">test:</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-key">runs-on:</span> ubuntu-latest<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-key">steps:</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-dash">-</span> <span class="yaml-key">uses:</span> actions/checkout@v3<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-dash">-</span> <span class="yaml-key">run:</span> npm ci<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-dash">-</span> <span class="yaml-key">run:</span> npm run test<br><br>

                        &nbsp;&nbsp;<span class="code-comment"># --- JOB 2: สร้างและส่ง Image ขึ้น Docker Hub (ทำงานเมื่อ test ผ่าน) ---</span><br>
                        &nbsp;&nbsp;<span class="yaml-key">build-and-push:</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-key">needs:</span> test <span class="code-comment"># สำคัญ: บังคับให้รอ Job test เสร็จก่อน</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-key">runs-on:</span> ubuntu-latest<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-key">steps:</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-dash">-</span> <span class="yaml-key">uses:</span> actions/checkout@v3<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-dash">-</span> <span class="yaml-key">name:</span> Login to Docker Hub<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-key">uses:</span> docker/login-action@v2<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-key">with:</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-key">username:</span> ${{ secrets.DOCKER_USER }}<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-key">password:</span> ${{ secrets.DOCKER_PASSWORD }}<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-dash">-</span> <span class="yaml-key">name:</span> Build and Push<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-key">uses:</span> docker/build-push-action@v4<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-key">with:</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-key">context:</span> .<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-key">push:</span> true<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-key">tags:</span> ${{ secrets.DOCKER_USER }}/myapp:latest<br><br>

                        &nbsp;&nbsp;<span class="code-comment"># --- JOB 3: ติดตั้งบน Server จริง (ทำงานเมื่อ push สำเร็จ) ---</span><br>
                        &nbsp;&nbsp;<span class="yaml-key">deploy-to-server:</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-key">needs:</span> build-and-push<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-key">runs-on:</span> ubuntu-latest<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-key">steps:</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-dash">-</span> <span class="yaml-key">name:</span> SSH and Deploy<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-key">uses:</span> appleboy/ssh-action@v0.1.6<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-key">with:</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-key">host:</span> ${{ secrets.SERVER_HOST }}<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-key">username:</span> ${{ secrets.SERVER_USER }}<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-key">key:</span> ${{ secrets.SERVER_SSH_KEY }}<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-key">script:</span> |<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;docker pull ${{ secrets.DOCKER_USER }}/myapp:latest<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;docker stop myapp-container || true<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;docker rm myapp-container || true<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;docker run -d --name myapp-container -p 80:3000 ${{ secrets.DOCKER_USER }}/myapp:latest
                    </div>

                    <p style="margin-top: 15px;">เมื่อนักศึกษา Push โค้ดนี้ขึ้น GitHub ระบบจะเริ่มทำงานตามลำดับตั้งแต่ Test, สร้างอิมเมจไปเก็บที่ Docker Hub และรีโมทเข้าไปสั่งเซิร์ฟเวอร์ให้โหลดอิมเมจใหม่มารันโดยอัตโนมัติ!</p>
                </section>

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0;">
                    <h3 class="section-title" style="color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">🎯 ใบงานปฏิบัติการ: ปล่อยจรวดขึ้นสู่อวกาศ (Deploy to VM)</h3>

                    <div class="analogy-box" style="background: #fdf4ff; border-left: 4px solid #d946ef; padding: 15px; margin-bottom: 20px;">
                        <strong>🚀 ภารกิจกลุ่ม: Zero-Touch Deployment</strong><br>
                        <span style="font-size: 0.95rem; color: #475569;">นี่คือความฝันของ DevOps ทุกคน! ให้นักศึกษานำโปรเจกต์ของกลุ่ม ผูกเข้ากับ GitHub Actions สร้าง Pipeline และให้มันไปปรากฏบน Virtual Machine (VM) ของกลุ่มโดยอัตโนมัติ </span>
                    </div>

                    <h4 style="margin-top: 15px;">ขั้นตอนภารกิจ:</h4>
                    <ol style="padding-left: 20px; line-height: 1.7; margin-bottom: 0;">
                        <li>สมัครบัญชี Docker Hub และสร้าง Repository สำหรับโปรเจกต์ของกลุ่ม</li>
                        <li>ตั้งค่า Secrets ภายใน GitHub Repository ของกลุ่มให้ครบถ้วน (ขอรับข้อมูล IP และ SSH Key ของ VM ประจำกลุ่มได้จากอาจารย์ผู้สอน)</li>
                        <li>เขียนไฟล์ <code>.github/workflows/deploy.yml</code> (สามารถประยุกต์โค้ดจาก Step 2 ด้านบน โดยเปลี่ยนให้รันร่วมกับ <code>docker-compose.yml</code> ใน Job สุดท้ายได้หากใช้ฐานข้อมูลด้วย)</li>
                        <li>ทดลองทำการแก้คำหรือเปลี่ยนสีพื้นหลังเว็บไซต์ในซอร์สโค้ด และสั่ง <code>git push origin main</code></li>
                        <li><strong>แคปภาพหน้าจอ:</strong>
                            <br>1) หน้าต่าง Actions บน GitHub ที่แสดง Job ทั้ง 3 เป็นสีเขียว (Success)
                            <br>2) หน้าเว็บไซต์โปรดักชันจริงบน IP ของเซิร์ฟเวอร์ที่แสดงผลลัพธ์การเปลี่ยนแปลงที่เพิ่ง Push ไป
                        </li>
                    </ol>
                </section>
            </div>

            <aside>
                <div class="sidebar-card" style="background: #fff; padding: 20px; border-radius: 8px; border: 1px solid #e2e8f0; margin-bottom: 20px;">
                    <h4 style="margin-top: 0; margin-bottom: 12px; font-size: 1.1rem; font-weight: 700; color: #1e293b;">📋 ข้อมูลประจำหน่วย</h4>
                    <p style="font-size: 0.9rem; color: #475569; line-height: 1.6; margin: 0;">
                        <strong>สัปดาห์ที่:</strong> 11<br>
                        <strong>เวลาเรียน:</strong> 5 ชั่วโมง (ทฤษฎี 1, ปฏิบัติ 4)<br>
                        <strong>เกณฑ์การประเมิน:</strong> <br>
                        - การตั้งค่า Secret Variables ได้อย่างปลอดภัย (2 คะแนน)<br>
                        - โครงสร้าง YAML CI/CD Pipeline สมบูรณ์ ลำดับ Dependencies (needs) ถูกต้อง (4 คะแนน)<br>
                        - ระบบสามารถ Deploy ลงเครื่อง VM ผ่าน SSH อัตโนมัติและเข้าใช้งานได้จริง (4 คะแนน)
                    </p>
                </div>

                <div class="sidebar-card" style="background: #fff; padding: 20px; border-radius: 8px; border: 1px solid #e2e8f0; border-left: 4px solid #ef4444;">
                    <h4 style="margin-top: 0; margin-bottom: 12px; font-size: 1.1rem; font-weight: 700; color: #dc2626;">🔐 กฎเหล็ก: ห้าม Hardcode รหัสผ่าน</h4>
                    <p style="font-size: 0.85rem; color: #64748b; line-height: 1.5; margin: 0;">
                        บ่อยครั้งที่นักพัฒนาเผลอพิมพ์ Password หรือ SSH Key ลงไปในไฟล์โค้ดโดยตรง (Hardcoding) ซึ่งเมื่อถูก Push ขึ้น GitHub ระบบบอตของแฮกเกอร์จะตรวจจับและดูดข้อมูลเหล่านั้นไปเจาะระบบของคุณได้ภายในไม่ถึง 5 นาที!<br><br>
                        จำไว้เสมอว่าตัวแปรที่เกี่ยวกับความลับ (Credentials, Keys, Tokens) ต้องถูกเก็บผ่านระบบ <strong>Environment Variables</strong> หรือ <strong>GitHub Secrets</strong> เท่านั้น
                    </p>
                </div>
                <div class="supplementary-box" style="background: #f0f9ff; border: 1px solid #bae6fd; border-left: 5px solid #0284c7; padding: 20px; border-radius: 8px; margin-bottom: 25px; margin-top: 15px;">
                    <h4 style="margin: 0 0 8px 0; color: #0369a1; font-size: 1.1rem; font-weight: 700;">🌟 บทเรียนเสริมพิเศษประจำหน่วย</h4>
                    <p style="margin: 0 0 15px 0; font-size: 0.93rem; color: #0c4a6e; line-height: 1.5;">
                        สำหรับกลุ่มที่พัฒนาระบบโดยใช้โครงสร้างสถาปัตยกรรมแบบดั้งเดิม (Ubuntu Server + Apache + PHP แบบไม่ใช้ Docker) สามารถศึกษาไกด์ไลน์กระบวนการตั้งค่าระบบผ่าน Git-Push Pipeline เข้าสู่เซิร์ฟเวอร์ตรงได้ที่นี่
                    </p>
                    <a href="autodeploy.php" style="display: inline-block; background: #0284c7; color: #fff; text-decoration: none; padding: 8px 16px; border-radius: 6px; font-size: 0.9rem; font-weight: 600; transition: background 0.2s;" onmouseover="this.style.background='#0369a1'" onmouseout="this.style.background='#0284c7'">
                        เปิดบทเรียนเสริม: PHP Traditional Auto Deploy ➔
                    </a>
                    <a href="autodeploy_private.php" style="display: inline-block; background: #0284c7; color: #fff; text-decoration: none; padding: 8px 16px; border-radius: 6px; font-size: 0.9rem; font-weight: 600; transition: background 0.2s;" onmouseover="this.style.background='#0369a1'" onmouseout="this.style.background='#0284c7'">
                        เปิดบทเรียนเสริม: PHP Traditional Auto Deploy ➔
                    </a>
                </div>
            </aside>
        </main>
    </div>

    <script src="../assets/js/script.js"></script>
</body>

</html>