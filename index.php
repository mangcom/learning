<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>31901-2005 การพัฒนาซอฟต์แวร์ด้วยเทคโนโลยี Back-End</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <?php include 'components/navbar.php'; ?>

    <section class="hero">
        <div class="container">
            <h2>Software Development with Back-End Technology</h2>
            <p>หลักสูตรการสร้างระบบบริการข้อมูล (Service-Oriented) ด้วย Node.js & Express สำหรับ ปวส.</p>
        </div>
    </section>

    <div class="container">
        <main>
            <section class="content-area" id="syllabus">
                <h3>🗂️ รายชื่อหน่วยการเรียนรู้ (คลิกเพื่อเข้าสู่บทเรียน)</h3>
                
                <div class="unit-grid">
                    <a href="unit1.php" class="unit-card active-card">
                        <div class="unit-badge">สัปดาห์ที่ 1</div>
                        <h4>หน่วยที่ 1: Introduction to Back-End</h4>
                        <p>ภาพรวมระบบ Back-End, สถาปัตยกรรม Client-Server และการติดตั้ง Node.js</p>
                        <span class="btn-read">เข้าสู่บทเรียน ➔</span>
                    </a>

                    <a href="unit-template.php" class="unit-card">
                        <div class="unit-badge muted">สัปดาห์ที่ 2</div>
                        <h4>หน่วยที่ 2: Node.js & Express.js Fundamentals</h4>
                        <p>การจัดการ Routing, npm package.json และการส่งข้อมูลรูปแบบ JSON Response</p>
                        <span class="btn-read">ยังไม่เปิด ➔</span>
                    </a>

                    <a href="unit-template.php" class="unit-card">
                        <div class="unit-badge muted">สัปดาห์ที่ 3</div>
                        <h4>หน่วยที่ 3: Database Integration & SQL</h4>
                        <p>การออกแบบฐานข้อมูล MySQL เชื้อต่อกับ Node.js ผ่านไลบรารี mysql2</p>
                        <span class="btn-read">ยังไม่เปิด ➔</span>
                    </a>
                    
                    </div>
            </section>

            <aside>
                <div class="sidebar-card" id="grading">
                    <h4>📊 เกณฑ์การประเมินผล</h4>
                    <table class="grading-table">
                        <tr><td>งานปฏิบัติรายสัปดาห์</td><td><strong>30%</strong></td></tr>
                        <tr><td>แบบทดสอบ (Quiz)</td><td><strong>10%</strong></td></tr>
                        <tr><td>โปรเจกต์กลุ่ม (API)</td><td><strong>30%</strong></td></tr>
                        <tr><td>คู่มือ & เอกสารระบบ</td><td><strong>10%</strong></td></tr>
                        <tr><td>การนำเสนอผลงาน</td><td><strong>10%</strong></td></tr>
                        <tr><td>จิตพิสัย/การทำงานทีม</td><td><strong>10%</strong></td></tr>
                    </table>
                </div>
            </aside>
        </main>
    </div>

    <script src="assets/js/script.js"></script>
</body>
</html>