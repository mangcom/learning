<?php
$base_dir = "../"; // ถอยกลับ 1 ชั้นไปที่ Root เพื่อให้เรียกคอมโพเนนต์ได้ถูกต้อง
$active_nav = "devops"; // ไฮไลต์เมนูที่วิชา DevOps
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน่วยที่ 13: Monitoring และ Observability</title>
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

        .metric-box {
            background: #f0fdf4;
            border-left: 4px solid #16a34a;
            padding: 12px;
            margin-bottom: 10px;
            border-radius: 0 6px 6px 0;
        }
    </style>
</head>

<body style="background-color: #f8fafc;">

    <?php include '../components/navbar.php'; ?>

    <div class="page-header" style="background: #0f172a; color: #fff; padding: 40px 0 65px 0; border-bottom: 4px solid #06b6d4;">
        <div class="container">
            <a href="index.php" class="back-link" style="color: #67e8f9; text-decoration: none; display: inline-block; margin-bottom: 15px;">
                <span class="arrow-icon">⬅</span> <span>กลับสู่หน้าหลักวิชา DevOps</span>
            </a>
            <div>
                <span class="course-code" style="background: #06b6d4; color: #0f172a; padding: 4px 12px; border-radius: 4px; font-weight: 600; font-size: 0.9rem;">หน่วยที่ 13 (สัปดาห์ที่ 13)</span>
                <h2 style="margin: 10px 0 5px 0; font-size: 1.8rem; font-weight: 700;">Monitoring และ Observability</h2>
                <p style="color: #e2e8f0; margin: 0; font-size: 0.95rem;">สร้างห้องควบคุมสภาวะการบิน (Cockpit) เพื่อตรวจจับ ค้นหา และวิเคราะห์สุขภาพระบบเซิร์ฟเวอร์แบบ Real-time ก่อนวิกฤตจะเกิด</p>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 30px;">
        <main>
            <div class="content-area">

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 30px;">
                    <h3 class="section-title" style="color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">📘 ภาคทฤษฎี: การมองเห็นและการวัดผลระบบ</h3>

                    <p>เมื่อนำระบบขึ้นสู่โปรดักชันแล้ว ความท้าทายที่แท้จริงคือ <strong>"เราจะรู้ได้อย่างไรว่าระบบยังทำงานได้ดีอยู่?"</strong> บ่อยครั้งที่เรามักจะรู้ว่าเว็บพังก็ต่อเมื่อลูกค้าโทรมาด่า ซึ่งนั่นเป็นวิธีที่แย่ที่สุดในสายงาน DevOps</p>

                    <h4 style="margin-top: 20px; color: #0891b2;">Monitoring กับ Observability แตกต่างกันอย่างไร?</h4>
                    <ul style="padding-left: 20px; line-height: 1.6;">
                        <li><strong>Monitoring (การเฝ้าระวัง):</strong> คือการคอยดูว่า <em>"ระบบพังหรือยัง"</em> โดยดูจากตัวชี้วัดที่เรารู้จักอยู่แล้ว เช่น CPU เกิน 90% หรือไม่? หน้าเว็บตอบกลับเป็น HTTP 500 หรือเปล่า? (เป็นการตอบสนองต่อปัญหาที่เกิดขึ้นตามกฎที่ตั้งไว้)</li>
                        <li><strong>Observability (ความสามารถในการสังเกตการณ์):</strong> คือขั้นกว่าของการทำ Monitoring มันบอกเราว่า <em>"ทำไมระบบถึงพัง"</em> โดยอาศัยการสืบค้นความเชื่อมโยงของข้อมูลภายในเพื่อหาสาเหตุของปัญหาแปลกๆ ที่ไม่เคยพบมาก่อน</li>
                    </ul>

                    <h4 style="margin-top: 25px; color: #16a34a;">The Pillars of Observability (เสาหลักข้อมูล 2 ด้านหลักในแล็บนี้)</h4>
                    <div class="metric-box">
                        <strong>1. Logging (ปูมบันทึกเหตุการณ์):</strong> ข้อมูลแบบ Time-stamped text บอกเล่าสิ่งที่เกิดขึ้น ณ เวลานั้น ๆ เช่น บันทึกจังหวะที่ User ล็อกอินล้มเหลว หรือคิวรีฐานข้อมูลผิดพลาด (ละเอียด แต่กินพื้นที่เก็บข้อมูลสูง)
                    </div>
                    <div class="metric-box">
                        <strong>2. Metrics (ตัวเลขชี้วัดสถิติ):</strong> ข้อมูลเชิงตัวเลขที่ถูกรวมรวบตามช่วงเวลา (Time-series data) มีขนาดเล็กมากและประมวลผลเร็ว เช่น ปริมาณการใช้งาน Memory, อัตราจำนวน Request ต่อวินาที (RPS)
                    </div>

                    <h4 style="margin-top: 25px; color: #ea580c;">ความเข้าใจเกี่ยวกับข้อตกลงระดับบริการ: SLI / SLO / SLA</h4>
                    <p>การวัดความเสถียรของระบบในระดับองค์กร จะใช้ตัววัด 3 ระดับนี้ในการสื่อสาร:</p>
                    <ol style="padding-left: 20px; line-height: 1.7;">
                        <li><strong>SLI (Service Level Indicator):</strong> ตัวชี้วัดที่วัดได้จริง ณ ปัจจุบัน เช่น <em>"อัตราความสำเร็จของ HTTP Request ของเว็บเราอยู่ที่ 99.95%"</em></li>
                        <li><strong>SLO (Service Level Objective):</strong> เป้าหมายภายในที่ทีมตั้งไว้ร่วมกันเพื่อไม่ให้ระบบพัง เช่น <em>"เว็บเราต้องมีอัตราความสำเร็จ (SLI) ไม่ต่ำกว่า 99.9% ในรอบ 30 วัน"</em></li>
                        <li><strong>SLA (Service Level Agreement):</strong> ข้อตกลงทางกฎหมาย/ธุรกิจที่ทำไว้กับลูกค้า <em>"ถ้าเว็บเราล่มเกิน 99.5% ในหนึ่งเดือน เรายินดีคืนเงินค่าบริการให้ 20%"</em> (ค่าของ SLA จะต่ำกว่า SLO เสมอเพื่อเป็นแนวกันชนให้ทีมเทคนิคทำงานทัน)</li>
                    </ol>
                </section>

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 30px;">
                    <h3 class="section-title" style="color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">💻 ภาคปฏิบัติ: ประกอบศูนย์เฝ้าระวังภัยระบบ (Monitoring Stack)</h3>

                    <p>เราจะติดตั้งชุดเครื่องมือ 3 ตัวเพื่อทำงานร่วมกัน: <strong>Prometheus</strong> (ตัวดึงและเก็บ Metrics) + <strong>Grafana</strong> (ตัววาดกราฟและทำ Dashboard) + <strong>Uptime Kuma</strong> (ตัวยิงทดสอบตรวจสอบสถานะเว็บและแจ้งเตือนเข้า Line/Discord)</p>

                    <h4 style="margin-top: 20px; color: #2563eb;">Step 1: เขียนพิมพ์เขียวระบบโครงสร้างพื้นฐาน <code>docker-compose.yml</code></h4>
                    <p>สร้างโฟลเดอร์ใหม่ชื่อ <code>monitoring</code> และสร้างไฟล์รันคอนเทนเนอร์รวมมิตรดังนี้:</p>

                    <div class="code-window" style="background: #0f172a; color: #f8fafc; padding: 15px; border-radius: 8px; font-family: monospace; font-size: 0.9rem; overflow-x: auto; line-height: 1.5;">
                        <span class="yaml-key">version:</span> <span class="yaml-val">'3.8'</span><br><br>
                        <span class="yaml-key">services:</span><br>
                        &nbsp;&nbsp;<span class="code-comment"># 1. Prometheus Server</span><br>
                        &nbsp;&nbsp;<span class="yaml-key">prometheus:</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-key">image:</span> prom/prometheus:latest<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-key">container_name:</span> prometheus<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-key">volumes:</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-dash">-</span> ./prometheus.yml:/etc/prometheus/prometheus.yml<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-key">ports:</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-dash">-</span> <span class="yaml-val">"9090:9090"</span><br><br>
                        &nbsp;&nbsp;<span class="code-comment"># 2. Node Exporter (ตัวดูดพลังเครื่องจำลอง เช่น CPU, RAM ของ Linux Host)</span><br>
                        &nbsp;&nbsp;<span class="yaml-key">node-exporter:</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-key">image:</span> prom/node-exporter:latest<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-key">container_name:</span> node-exporter<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-key">ports:</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-dash">-</span> <span class="yaml-val">"9100:9100"</span><br><br>
                        &nbsp;&nbsp;<span class="code-comment"># 3. Grafana Dashboard ตัววาดการ์ดจอแสดงผล</span><br>
                        &nbsp;&nbsp;<span class="yaml-key">grafana:</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-key">image:</span> grafana/grafana:latest<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-key">container_name:</span> grafana<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-key">ports:</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-dash">-</span> <span class="yaml-val">"3000:3000"</span><br><br>
                        &nbsp;&nbsp;<span class="code-comment"># 4. Uptime Kuma ระบบแจ้งเตือนเว็บล่ม</span><br>
                        &nbsp;&nbsp;<span class="yaml-key">uptime-kuma:</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-key">image:</span> louislam/uptime-kuma:1<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-key">container_name:</span> uptime-kuma<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-key">ports:</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-dash">-</span> <span class="yaml-val">"3001:3001"</span>
                    </div>

                    <h4 style="margin-top: 25px; color: #2563eb;">Step 2: เขียนสคริปต์ระบุเป้าหมายการสแกน <code>prometheus.yml</code></h4>
                    <p>สร้างไฟล์คอนฟิกขนาบข้างในโฟลเดอร์เดียวกัน เพื่อสั่งให้ Prometheus คอยไปดูดข้อมูลจากเครื่อง Node Exporter ทุก ๆ 5 วินาที:</p>
                    <div class="code-window" style="background: #0f172a; color: #f8fafc; padding: 15px; border-radius: 8px; font-family: monospace; font-size: 0.9rem; line-height: 1.5;">
                        <span class="yaml-key">global:</span><br>
                        &nbsp;&nbsp;<span class="yaml-key">scrape_interval:</span> 5s <span class="code-comment"># ไปดึงข้อมูลถี่ทุกๆ 5 วินาที</span><br><br>
                        <span class="yaml-key">scrape_configs:</span><br>
                        &nbsp;&nbsp;<span class="yaml-dash">-</span> <span class="yaml-key">job_name:</span> <span class="yaml-val">'linux-server'</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-key">static_configs:</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="yaml-dash">-</span> <span class="yaml-key">targets:</span> [<span class="yaml-val">'node-exporter:9100'</span>]
                    </div>
                    <p style="margin-top: 10px;">สั่งรันระบบทั้งหมดด้วยคำสั่ง: <code>docker compose up -d</code></p>

                    <h4 style="margin-top: 25px; color: #2563eb;">Step 3: การผูกสายสตรีมข้อมูลเข้าหากัน</h4>
                    <ol style="padding-left: 20px; line-height: 1.7; font-size: 0.95rem;">
                        <li><strong>เข้าสู่ Grafana:</strong> เปิดบราวเซอร์ไปที่ <code>http://localhost:3000</code> (ล็อกอินครั้งแรกด้วย admin / admin)</li>
                        <li><strong>ผูก Data Source:</strong> ไปที่เมนู Connections ➔ Data Sources ➔ กด Add data source เลือก <strong>Prometheus</strong> จากนั้นในช่อง URL ให้ใส่ค่า <code>http://prometheus:9090</code> แล้วกด Save & Test</li>
                        <li><strong>นำเข้าแดชบอร์ดสำเร็จรูป:</strong> แทนที่จะสร้างกราฟทีละแท่ง ให้ไปที่เมนู Dashboards ➔ กด New ➔ <strong>Import</strong> และกรอก ID แดชบอร์ดยอดนิยมของโลกคือ <code>1860</code> (Node Exporter Full) ระบบจะดึงหน้าจอแสดงกราฟการใช้ CPU, RAM, Network สวยงามระดับโลกมาแสดงให้เห็นทันที!</li>
                    </ol>
                </section>

                <section class="lesson-section class-card" style="background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0;">
                    <h3 class="section-title" style="color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">🎯 ใบงานปฏิบัติการ: ตั้งป้อมควบคุมสภาวะระบบ (Uptime & Metrics Dashboard)</h3>

                    <div class="analogy-box" style="background: #ecfeff; border-left: 4px solid #0891b2; padding: 15px; margin-bottom: 20px;">
                        <strong>🚀 ภารกิจกลุ่ม: ผู้พิทักษ์ความเสถียรของระบบ</strong><br>
                        <span style="font-size: 0.95rem; color: #475569;">ให้นักศึกษานำโปรเจกต์กลุ่มของตนเองที่รันอยู่บนเซิร์ฟเวอร์ มาผูกเข้ากับชุดอุปกรณ์ตรวจสอบนี้ เพื่อสร้าง Dashboard ติดตามสุขภาพ และทดสอบยิงถล่มเซิร์ฟเวอร์เพื่อดูพฤติกรรมความเปลี่ยนแปลง</span>
                    </div>

                    <h4 style="margin-top: 15px;">ข้อกำหนดกิจกรรมและสิ่งส่งมอบ:</h4>
                    <ol style="padding-left: 20px; line-height: 1.7; margin-bottom: 0;">
                        <li>เปิดใช้งานระบบ <strong>Uptime Kuma</strong> ผ่านพอร์ต <code>3001</code> ตั้งค่าตรวจสอบ (Monitor) หน้าเว็บหลักโปรเจกต์กลุ่ม โดยสั่งให้ยิงตรวจสอบทุก ๆ 20 วินาที</li>
                        <li>ทำการผูกระบบแจ้งเตือน (Notification) บน Uptime Kuma เข้าสู่ห้องแชตกลุ่ม <strong>Line Notify</strong> หรือ <strong>Discord Webhook</strong> ของสมาชิกในกลุ่ม</li>
                        <li>ทดลองทำการแกล้งสั่งปิดระบบเว็บโปรเจกต์ของทีม (เช่นสั่ง <code>docker stop</code> ตัวแอปหลัก) เพื่อพิสูจน์ว่ามีข้อความวิ่งแจ้งเตือนเข้ามือถือ/ดิสคอร์ดของสมาชิกในกลุ่มทันทีเมื่อระบบล่มจริงหรือไม่</li>
                        <li>เปิดหน้าจอ Dashboard บน Grafana ค้างไว้ จากนั้นเปิดโปรแกรมจำลองการยิงโหลด (เช่น ApacheBench หรือสั่งรีเฟรชหน้าเว็บรัว ๆ) เพื่อดูการขยับพุ่งสูงขึ้นของกราฟ CPU และ Network บนหน้าจอ</li>
                        <li><strong>ส่งงาน:</strong> ถ่ายภาพหน้าจอ 1) หน้าจอ Dashboard สรุปสถิติ Uptime สีเขียวจาก Uptime Kuma 2) หน้าต่างกราฟวัดค่าประสิทธิภาพเครื่องจาก Grafana ขณะทดสอบระบบ 3) ภาพหลักฐานข้อความแจ้งเตือนป๊อปอัปเว็บล่มที่วิ่งเข้าในห้องแชตกลุ่ม</li>
                    </ol>
                </section>
            </div>

            <aside>
                <div class="sidebar-card" style="background: #fff; padding: 20px; border-radius: 8px; border: 1px solid #e2e8f0; margin-bottom: 20px;">
                    <h4 style="margin-top: 0; margin-bottom: 12px; font-size: 1.1rem; font-weight: 700; color: #1e293b;">📋 ข้อมูลประจำหน่วย</h4>
                    <p style="font-size: 0.9rem; color: #475569; line-height: 1.6; margin: 0;">
                        <strong>สัปดาห์ที่:</strong> 13<br>
                        <strong>เวลาเรียน:</strong> 5 ชั่วโมง (ทฤษฎี 1, ปฏิบัติ 4)<br>
                        <strong>เกณฑ์การประเมิน:</strong> <br>
                        - การติดตั้งระบบผ่าน Docker Compose ไร้ข้อผิดพลาด (2 คะแนน)<br>
                        - การตั้งค่าสายสตรีมข้อมูลข้ามคอนเทนเนอร์และ Import ID สำเร็จรูปถูกต้อง (4 คะแนน)<br>
                        - การสร้างตัววัดผลบน Uptime Kuma พร้อมระบบยิงแจ้งเตือนแชตกลุ่มสำเร็จ (4 คะแนน)
                    </p>
                </div>

                <div class="sidebar-card" style="background: #fff; padding: 20px; border-radius: 8px; border: 1px solid #e2e8f0; border-left: 4px solid #06b6d4;">
                    <h4 style="margin-top: 0; margin-bottom: 12px; font-size: 1.1rem; font-weight: 700; color: #0891b2;">✈️ ปรัชญา Cockpit</h4>
                    <p style="font-size: 0.85rem; color: #64748b; line-height: 1.5; margin: 0;">
                        วิศวกรระบบเปรียบเสมือนกัปตันขับเครื่องบินขนาดใหญ่ การที่เราไม่ติดตั้งระบบ Monitoring เลย ก็เท่ากับเรากำลัง <strong>"ปิดตาขับเครื่องบินฝ่าพายุ"</strong> โดยที่เราไม่มีทางรู้เลยว่าน้ำมันหมดตอนไหน หรือเครื่องยนต์กำลังไฟไหม้หรือไม่<br><br>
                        การทำระบบสังเกตการณ์ที่ดี ช่วยให้เราเห็นปัญหาและแก้ไขมันได้ก่อนที่เครื่องบิน (หรือธุรกิจขององค์กร) จะร่วงดิ่งลงพื้นโลกนั่นเองครับ
                    </p>
                </div>
            </aside>
        </main>
    </div>

    <script src="../assets/js/script.js"></script>
</body>

</html>