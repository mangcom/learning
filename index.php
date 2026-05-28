<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ศูนย์การเรียนรู้เทคโนโลยีคอมพิวเตอร์และซอฟต์แวร์</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-main: #f8fafc;
            --text-dark: #0f172a;
            --text-muted: #475569;
            --primary: #2563eb;
            --success: #10b981;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Sarabun', sans-serif;
        }

        body {
            background-color: var(--bg-main);
            color: var(--text-dark);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .portal-container {
            width: 100%;
            max-width: 1100px;
            text-align: center;
        }

        .portal-header {
            margin-bottom: 50px;
        }

        .portal-header span {
            background-color: #dbeafe;
            color: var(--primary);
            padding: 6px 16px;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .portal-header h1 {
            font-size: 2.2rem;
            margin-top: 15px;
            color: var(--text-dark);
        }

        .portal-header p {
            color: var(--text-muted);
            margin-top: 8px;
            font-size: 1.05rem;
        }

        .grid-courses {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-top: 20px;
        }

        .course-card {
            background: #ffffff;
            border-radius: 12px;
            padding: 30px 20px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
        }

        .course-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .course-icon {
            font-size: 2.5rem;
            margin-bottom: 15px;
        }

        .course-card h3 {
            font-size: 1.25rem;
            color: var(--text-dark);
            margin-bottom: 10px;
        }

        .course-card p {
            font-size: 0.9rem;
            color: var(--text-muted);
            line-height: 1.5;
            margin-bottom: 25px;
            flex-grow: 1;
        }

        .btn-enter {
            display: inline-block;
            background-color: var(--primary);
            color: #ffffff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-size: 0.9rem;
            font-weight: 600;
            transition: background 0.2s;
        }

        .btn-enter:hover {
            background-color: #1d4ed8;
        }

        /* สถานะกำลังพัฒนา (Coming Soon) */
        .card-disabled {
            opacity: 0.75;
            background-color: #f1f5f9;
        }

        .card-disabled:hover {
            transform: none;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }

        .badge-upcoming {
            position: absolute;
            top: 15px;
            right: 15px;
            background-color: #e2e8f0;
            color: #64748b;
            font-size: 0.7rem;
            font-weight: 700;
            padding: 4px 8px;
            border-radius: 4px;
            text-transform: uppercase;
        }

        .btn-disabled {
            background-color: #cbd5e1;
            color: #94a3b8;
            cursor: not-allowed;
        }

        .btn-disabled:hover {
            background-color: #cbd5e1;
        }
    </style>
</head>

<body>

    <div class="portal-container">
        <div class="portal-header">
            <span>💻 Computer Science & Software Learning Portal</span>
            <h1>ยินดีต้อนรับสู่ระบบการเรียนรู้ดิจิทัล</h1>
            <p>เลือกหลักสูตรที่ต้องการเข้าศึกษาเพื่อเริ่มต้นพัฒนาทักษะของคุณ</p>
        </div>

        <div class="grid-courses">
            <div class="course-card">
                <div class="course-icon">⚙️</div>
                <h3>Back-End Technology</h3>
                <p>เรียนรู้การพัฒนาซอฟต์แวร์ฝั่งเซิร์ฟเวอร์ การจัดการฐานข้อมูล สถาปัตยกรรม API และการควบคุมระบบหลังบ้าน</p>
                <a href="backend/index.php" class="btn-enter">เข้าสู่บทเรียน ➔</a>
            </div>

            <div class="course-card card-disabled">
                <span class="badge-upcoming">เร็ว ๆ นี้</span>
                <div class="course-icon">🎨</div>
                <h3>Front-End Technology</h3>
                <p>โครงสร้างการพัฒนาส่วนหน้าเว็บไซต์ การสร้าง User Interface ด้วย HTML, CSS, JavaScript และ Frameworks ทันสมัย</p>
                <a href="#" class="btn-enter btn-disabled">ยังไม่เปิดใช้งาน</a>
            </div>

            <div class="course-card card-disabled">
                <span class="badge-upcoming">เร็ว ๆ นี้</span>
                <div class="course-icon">🚀</div>
                <h3>DevOps & CI/CD</h3>
                <p>กระบวนการทำงานอัตโนมัติ การทดสอบซอฟต์แวร์ การทำบิลด์ระบบ และการส่งมอบซอฟต์แวร์อย่างไร้รอยต่อ</p>
                <a href="#" class="btn-enter btn-disabled">ยังไม่เปิดใช้งาน</a>
            </div>

            <div class="course-card card-disabled">
                <span class="badge-upcoming">เร็ว ๆ นี้</span>
                <div class="course-icon">☁️</div>
                <h3>Server & Cloud Admin</h3>
                <p>การบริหารจัดการระบบปฏิบัติการเซิร์ฟเวอร์ ระบบเครือข่าย และเทคโนโลยีคลาวด์คอมพิวเตอร์ระดับสากล</p>
                <a href="#" class="btn-enter btn-disabled">ยังไม่เปิดใช้งาน</a>
            </div>
        </div>
    </div>

</body>

</html>