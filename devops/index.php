<?php
$base_dir = "../"; // ถอยกลับ 1 ชั้นเพื่อไปหาโฟลเดอร์หลัก
$active_nav = "devops"; // เปิดสถานะเมนูที่วิชา DevOps
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าหลักวิชา: การพัฒนาซอฟต์แวร์รูปแบบเดฟออฟส์ (DevOps Style Software Development)</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body style="background-color: #f8fafc;">

    <?php include '../components/navbar.php'; ?>

    <div class="page-header" style="background-color: #0f172a; color: var(--white); padding: 40px 0; border-bottom: 4px solid #7c3aed;">
        <div class="container">
            <span class="course-code" style="background: #7c3aed; color: #fff; padding: 4px 12px; border-radius: 4px; font-weight: 600; font-size: 0.85rem;">💻 รหัสวิชา: 31901-2008 | หลักสูตร ปวส. กลุ่มสมรรถนะวิชาชีพเฉพาะ</span>
            <h2 style="margin-top: 15px;">การพัฒนาซอฟต์แวร์รูปแบบเดฟออฟส์</h2>
            <p style="color: #c4b5fd;">(DevOps Style Software Development) | เรียนรู้ผ่านกลไก Project-Based DevOps</p>

            <button id="openSpecsBtn" class="btn-course-specs" style="margin-top: 15px; background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.3); color: #fff; padding: 8px 16px; border-radius: 6px; cursor: pointer; transition: 0.3s;">📄 ดูข้อมูลโครงสร้างหลักสูตรและแผนฐานสมรรถนะ</button>
        </div>
    </div>

    <div class="container" style="margin-top: 30px;">
        <div class="course-stats-grid" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-bottom: 30px;">
            <div class="stat-card" style="background: #fff; padding: 20px; border-radius: 8px; text-align: center; border: 1px solid #e2e8f0; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
                <h3 style="margin: 0; font-size: 2rem; color: #7c3aed;">15</h3>
                <p style="margin: 5px 0 0 0; color: #64748b; font-size: 0.9rem;">หน่วยการเรียนรู้</p>
            </div>
            <div class="stat-card" style="background: #fff; padding: 20px; border-radius: 8px; text-align: center; border: 1px solid #e2e8f0; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
                <h3 style="margin: 0; font-size: 2rem; color: #7c3aed;">15+1</h3>
                <p style="margin: 5px 0 0 0; color: #64748b; font-size: 0.9rem;">สัปดาห์เรียน + สอบ</p>
            </div>
            <div class="stat-card" style="background: #fff; padding: 20px; border-radius: 8px; text-align: center; border: 1px solid #e2e8f0; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
                <h3 style="margin: 0; font-size: 2rem; color: #7c3aed;">75</h3>
                <p style="margin: 5px 0 0 0; color: #64748b; font-size: 0.9rem;">ชั่วโมงเรียนรวม (ป) 60 (ท) 15</p>
            </div>
            <div class="stat-card" style="background: #fff; padding: 20px; border-radius: 8px; text-align: center; border: 1px solid #e2e8f0; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
                <h3 style="margin: 0; font-size: 2rem; color: #7c3aed;">3</h3>
                <p style="margin: 5px 0 0 0; color: #64748b; font-size: 0.9rem;">หน่วยกิต (1-4-3)</p>
            </div>
        </div>

        <div class="main-content-layout" style="display: grid; grid-template-columns: 2fr 1fr; gap: 30px; margin-bottom: 40px;">

            <div class="units-column">
                <h3 class="section-title" style="border-bottom: 2px solid #cbd5e1; padding-bottom: 10px; margin-bottom: 20px; color: #0f172a;">📂 แผนการจัดการเรียนรู้ภาคปฏิบัติการรายสัปดาห์ (สัปดาห์ที่ 1 - 15)</h3>
                <div class="unit-grid-layout" style="display: flex; flex-direction: column; gap: 15px;">

                    <div class="unit-card-horizontal" style="background:#fff; border:1px solid #e2e8f0; padding:20px; border-radius:10px; display:flex; justify-content:space-between; align-items:center;">
                        <div>
                            <span class="unit-badge" style="background:#f3e8ff; color: #6b21a8; padding:3px 10px; border-radius:15px; font-size:0.8rem; font-weight:700;">สัปดาห์ที่ 1</span>
                            <h4 style="margin:8px 0 5px 0; color:#0f172a;">DevOps คืออะไร และวัฒนธรรมการทำงาน</h4>
                            <p style="font-size:0.85rem; color:#475569; margin:0;"><strong>ทฤษฎี:</strong> ปัญหาการพัฒนาแบบเดิม, Waterfall vs Agile, DevOps Lifecycle, วัฒนธรรมองค์กร<br><strong>ปฏิบัติ:</strong> แบ่งกลุ่ม เลือกโครงงาน (Project Charter) ร่างวัตถุประสงค์และผลงาน</p>
                        </div>
                        <a href="unit1.php" target="_blank" class="btn-enter-unit" style="width:auto; white-space:nowrap; margin-left:20px; background: #7c3aed; color: #fff; padding: 8px 16px; border-radius: 6px; text-decoration: none; font-size: 0.9rem; font-weight: 600;">ดูบทเรียน ➔</a>
                    </div>

                    <div class="unit-card-horizontal" style="background:#fff; border:1px solid #e2e8f0; padding:20px; border-radius:10px; display:flex; justify-content:space-between; align-items:center;">
                        <div>
                            <span class="unit-badge" style="background:#f3e8ff; color: #6b21a8; padding:3px 10px; border-radius:15px; font-size:0.8rem; font-weight:700;">สัปดาห์ที่ 2</span>
                            <h4 style="margin:8px 0 5px 0; color:#0f172a;">Agile และ Project Management</h4>
                            <p style="font-size:0.85rem; color:#475569; margin:0;"><strong>ทฤษฎี:</strong> Agile Manifesto, Scrum, Kanban, User Story, Product Backlog<br><strong>ปฏิบัติ:</strong> ใช้ GitHub Projects สร้าง Agile Board (To Do, Doing, Done) และเขียน Backlog 15-20 รายการ</p>
                        </div>
                        <a href="unit2.php" target="_blank" class="btn-enter-unit" style="width:auto; white-space:nowrap; margin-left:20px; background: #7c3aed; color: #fff; padding: 8px 16px; border-radius: 6px; text-decoration: none; font-size: 0.9rem; font-weight: 600;">ดูบทเรียน ➔</a>
                    </div>

                    <div class="unit-card-horizontal" style="background:#fff; border:1px solid #e2e8f0; padding:20px; border-radius:10px; display:flex; justify-content:space-between; align-items:center;">
                        <div>
                            <span class="unit-badge" style="background:#f3e8ff; color: #6b21a8; padding:3px 10px; border-radius:15px; font-size:0.8rem; font-weight:700;">สัปดาห์ที่ 3</span>
                            <h4 style="margin:8px 0 5px 0; color:#0f172a;">Linux และ DevOps Environment</h4>
                            <p style="font-size:0.85rem; color:#475569; margin:0;"><strong>ทฤษฎี:</strong> Linux Architecture, File System, SSH, Environment Variables<br><strong>ปฏิบัติ:</strong> ติดตั้ง Ubuntu Server ควบคุมระบบผ่าน CLI พื้นฐาน และจัดทำ Linux Command Worksheet</p>
                        </div>
                        <a href="unit3.php" target="_blank" class="btn-enter-unit" style="width:auto; white-space:nowrap; margin-left:20px; background: #7c3aed; color: #fff; padding: 8px 16px; border-radius: 6px; text-decoration: none; font-size: 0.9rem; font-weight: 600;">ดูบทเรียน ➔</a>
                    </div>

                    <div class="unit-card-horizontal" style="background:#fff; border:1px solid #e2e8f0; padding:20px; border-radius:10px; display:flex; justify-content:space-between; align-items:center;">
                        <div>
                            <span class="unit-badge" style="background:#f3e8ff; color: #6b21a8; padding:3px 10px; border-radius:15px; font-size:0.8rem; font-weight:700;">สัปดาห์ที่ 4</span>
                            <h4 style="margin:8px 0 5px 0; color:#0f172a;">Git และ Version Control</h4>
                            <p style="font-size:0.85rem; color:#475569; margin:0;"><strong>ทฤษฎี:</strong> แนวคิด Version Control, Repository, Commit, Branch<br><strong>ปฏิบัติ:</strong> วางระบบ Project Repository ด้วยคำสั่ง git init, add, commit, push, pull และทำ Commit Log Challenge</p>
                        </div>
                        <a href="unit4.php" target="_blank" class="btn-enter-unit" style="width:auto; white-space:nowrap; margin-left:20px; background: #7c3aed; color: #fff; padding: 8px 16px; border-radius: 6px; text-decoration: none; font-size: 0.9rem; font-weight: 600;">ดูบทเรียน ➔</a>
                    </div>

                    <div class="unit-card-horizontal" style="background:#fff; border:1px solid #e2e8f0; padding:20px; border-radius:10px; display:flex; justify-content:space-between; align-items:center;">
                        <div>
                            <span class="unit-badge" style="background:#f3e8ff; color: #6b21a8; padding:3px 10px; border-radius:15px; font-size:0.8rem; font-weight:700;">สัปดาห์ที่ 5</span>
                            <h4 style="margin:8px 0 5px 0; color:#0f172a;">Team Collaboration และ Git Workflow</h4>
                            <p style="font-size:0.85rem; color:#475569; margin:0;"><strong>ทฤษฎี:</strong> Git Workflow, Branch Strategy, Pull Request, Code Review<br><strong>ปฏิบัติ:</strong> สร้างกิ่งโค้ด (main, develop, feature), บริหาร Merge Conflict, ทำ Pull Request ร่วมกับทีม</p>
                        </div>
                        <a href="unit5.php" target="_blank" class="btn-enter-unit" style="width:auto; white-space:nowrap; margin-left:20px; background: #7c3aed; color: #fff; padding: 8px 16px; border-radius: 6px; text-decoration: none; font-size: 0.9rem; font-weight: 600;">ดูบทเรียน ➔</a>
                    </div>

                    <div class="unit-card-horizontal" style="background:#fff; border:1px solid #e2e8f0; padding:20px; border-radius:10px; display:flex; justify-content:space-between; align-items:center;">
                        <div>
                            <span class="unit-badge" style="background:#f3e8ff; color: #6b21a8; padding:3px 10px; border-radius:15px; font-size:0.8rem; font-weight:700;">สัปดาห์ที่ 6</span>
                            <h4 style="margin:8px 0 5px 0; color:#0f172a;">Software Quality Engineering (QA)</h4>
                            <p style="font-size:0.85rem; color:#475569; margin:0;"><strong>ทฤษฎี:</strong> Software Quality, Bug, Defect, Technical Debt, Test Pyramid<br><strong>ปฏิบัติ:</strong> ติดตั้ง SonarQube หรือ SonarLint เพื่อวิเคราะห์ Code Smell และออกรายงาน Quality Report</p>
                        </div>
                        <a href="unit6.php" target="_blank" class="btn-enter-unit" style="width:auto; white-space:nowrap; margin-left:20px; background: #7c3aed; color: #fff; padding: 8px 16px; border-radius: 6px; text-decoration: none; font-size: 0.9rem; font-weight: 600;">ดูบทเรียน ➔</a>
                    </div>

                    <div class="unit-card-horizontal" style="background:#fff; border:1px solid #e2e8f0; padding:20px; border-radius:10px; display:flex; justify-content:space-between; align-items:center;">
                        <div>
                            <span class="unit-badge" style="background:#f3e8ff; color: #6b21a8; padding:3px 10px; border-radius:15px; font-size:0.8rem; font-weight:700;">สัปดาห์ที่ 7</span>
                            <h4 style="margin:8px 0 5px 0; color:#0f172a;">Automated Testing</h4>
                            <p style="font-size:0.85rem; color:#475569; margin:0;"><strong>ทฤษฎี:</strong> หลักการ Unit Test, Integration Test, Test Coverage<br><strong>ปฏิบัติ:</strong> ลงมือเขียน Unit Test Suite ทดสอบโมดูลระบบ (เช่น Login Test, Register Test, CRUD Test)</p>
                        </div>
                        <a href="unit7.php" target="_blank" class="btn-enter-unit" style="width:auto; white-space:nowrap; margin-left:20px; background: #7c3aed; color: #fff; padding: 8px 16px; border-radius: 6px; text-decoration: none; font-size: 0.9rem; font-weight: 600;">ดูบทเรียน ➔</a>
                    </div>

                    <div class="unit-card-horizontal" style="background:#fff; border:1px solid #e2e8f0; padding:20px; border-radius:10px; display:flex; justify-content:space-between; align-items:center;">
                        <div>
                            <span class="unit-badge" style="background:#f3e8ff; color: #6b21a8; padding:3px 10px; border-radius:15px; font-size:0.8rem; font-weight:700;">สัปดาห์ที่ 8</span>
                            <h4 style="margin:8px 0 5px 0; color:#0f172a;">Continuous Integration (CI)</h4>
                            <p style="font-size:0.85rem; color:#475569; margin:0;"><strong>ทฤษฎี:</strong> CI Concept, Build Pipeline, Shift Left Testing<br><strong>ปฏิบัติ:</strong> ใช้ GitHub Actions สร้างท่อ CI Pipeline ลำดับกระบวนการ (Push ➔ Lint ➔ Test ➔ Build)</p>
                        </div>
                        <a href="unit8.php" target="_blank" class="btn-enter-unit" style="width:auto; white-space:nowrap; margin-left:20px; background: #7c3aed; color: #fff; padding: 8px 16px; border-radius: 6px; text-decoration: none; font-size: 0.9rem; font-weight: 600;">ดูบทเรียน ➔</a>
                    </div>

                    <div class="unit-card-horizontal" style="background:#fff; border:1px solid #e2e8f0; padding:20px; border-radius:10px; display:flex; justify-content:space-between; align-items:center;">
                        <div>
                            <span class="unit-badge" style="background:#f3e8ff; color: #6b21a8; padding:3px 10px; border-radius:15px; font-size:0.8rem; font-weight:700;">สัปดาห์ที่ 9</span>
                            <h4 style="margin:8px 0 5px 0; color:#0f172a;">Container Technology</h4>
                            <p style="font-size:0.85rem; color:#475569; margin:0;"><strong>ทฤษฎี:</strong> ข้อแตกต่าง VM และ Container, Docker Architecture<br><strong>ปฏิบัติ:</strong> ศึกษาคำสั่ง docker run/ps/logs และประดิษฐ์ Dockerfile สำหรับรัน Application Container</p>
                        </div>
                        <a href="unit9.php" target="_blank" class="btn-enter-unit" style="width:auto; white-space:nowrap; margin-left:20px; background: #7c3aed; color: #fff; padding: 8px 16px; border-radius: 6px; text-decoration: none; font-size: 0.9rem; font-weight: 600;">ดูบทเรียน ➔</a>
                    </div>

                    <div class="unit-card-horizontal" style="background:#fff; border:1px solid #e2e8f0; padding:20px; border-radius:10px; display:flex; justify-content:space-between; align-items:center;">
                        <div>
                            <span class="unit-badge" style="background:#f3e8ff; color: #6b21a8; padding:3px 10px; border-radius:15px; font-size:0.8rem; font-weight:700;">สัปดาห์ที่ 10</span>
                            <h4 style="margin:8px 0 5px 0; color:#0f172a;">Multi-Service Application & Compose</h4>
                            <p style="font-size:0.85rem; color:#475569; margin:0;"><strong>ทฤษฎี:</strong> Docker Network, Volume, สถาปัตยกรรม Microservices เบื้องต้น<br><strong>ปฏิบัติ:</strong> เขียนไฟล์ docker-compose.yml บูรณาการระบบส่วนหน้า (Web) และฐานข้อมูล (DB) ให้ทำงานร่วมกัน</p>
                        </div>
                        <a href="unit10.php" target="_blank" class="btn-enter-unit" style="width:auto; white-space:nowrap; margin-left:20px; background: #7c3aed; color: #fff; padding: 8px 16px; border-radius: 6px; text-decoration: none; font-size: 0.9rem; font-weight: 600;">ดูบทเรียน ➔</a>
                    </div>

                    <div class="unit-card-horizontal" style="background:#fff; border:1px solid #e2e8f0; padding:20px; border-radius:10px; display:flex; justify-content:space-between; align-items:center;">
                        <div>
                            <span class="unit-badge" style="background:#f3e8ff; color: #6b21a8; padding:3px 10px; border-radius:15px; font-size:0.8rem; font-weight:700;">สัปดาห์ที่ 11</span>
                            <h4 style="margin:8px 0 5px 0; color:#0f172a;">Continuous Delivery & Deployment (CD)</h4>
                            <p style="font-size:0.85rem; color:#475569; margin:0;"><strong>ทฤษฎี:</strong> การส่งมอบต่อเนื่อง (CD), Deployment Strategy, การทำ Rollback<br><strong>ปฏิบัติ:</strong> เขียนท่อประกอบสมบูรณ์ (Build ➔ Test ➔ Docker Build ➔ Deploy) นำระบบขึ้นโปรดักชันจริง</p>
                        </div>
                        <a href="unit11.php" target="_blank" class="btn-enter-unit" style="width:auto; white-space:nowrap; margin-left:20px; background: #7c3aed; color: #fff; padding: 8px 16px; border-radius: 6px; text-decoration: none; font-size: 0.9rem; font-weight: 600;">ดูบทเรียน ➔</a>
                    </div>

                    <div class="unit-card-horizontal" style="background:#fff; border:1px solid #e2e8f0; padding:20px; border-radius:10px; display:flex; justify-content:space-between; align-items:center;">
                        <div>
                            <span class="unit-badge" style="background:#f3e8ff; color: #6b21a8; padding:3px 10px; border-radius:15px; font-size:0.8rem; font-weight:700;">สัปดาห์ที่ 12</span>
                            <h4 style="margin:8px 0 5px 0; color:#0f172a;">Infrastructure & DevSecOps</h4>
                            <p style="font-size:0.85rem; color:#475569; margin:0;"><strong>ทฤษฎี:</strong> Infrastructure as Code, ความปลอดภัย OWASP Top 10, Secret Management<br><strong>ปฏิบัติ:</strong> จัดการค่าคอนฟิกด้วย .env, GitHub Secrets และใช้ Trivy สแกนช่องโหว่ความปลอดภัย</p>
                        </div>
                        <a href="unit12.php" target="_blank" class="btn-enter-unit" style="width:auto; white-space:nowrap; margin-left:20px; background: #7c3aed; color: #fff; padding: 8px 16px; border-radius: 6px; text-decoration: none; font-size: 0.9rem; font-weight: 600;">ดูบทเรียน ➔</a>
                    </div>

                    <div class="unit-card-horizontal" style="background:#fff; border:1px solid #e2e8f0; padding:20px; border-radius:10px; display:flex; justify-content:space-between; align-items:center;">
                        <div>
                            <span class="unit-badge" style="background:#f3e8ff; color: #6b21a8; padding:3px 10px; border-radius:15px; font-size:0.8rem; font-weight:700;">สัปดาห์ที่ 13</span>
                            <h4 style="margin:8px 0 5px 0; color:#0f172a;">Monitoring และ Observability</h4>
                            <p style="font-size:0.85rem; color:#475569; margin:0;"><strong>ทฤษฎี:</strong> Monitoring, Logging, Metrics, SLI/SLO/SLA<br><strong>ปฏิบัติ:</strong> ติดตั้งและผูก Dashboard เฝ้าระวังเซิร์ฟเวอร์ด้วย Grafana, Prometheus และ Uptime Kuma</p>
                        </div>
                        <a href="unit13.php" target="_blank" class="btn-enter-unit" style="width:auto; white-space:nowrap; margin-left:20px; background: #7c3aed; color: #fff; padding: 8px 16px; border-radius: 6px; text-decoration: none; font-size: 0.9rem; font-weight: 600;">ดูบทเรียน ➔</a>
                    </div>

                    <div class="unit-card-horizontal" style="background:#fff; border:1px solid #e2e8f0; padding:20px; border-radius:10px; display:flex; justify-content:space-between; align-items:center;">
                        <div>
                            <span class="unit-badge" style="background:#f3e8ff; color: #6b21a8; padding:3px 10px; border-radius:15px; font-size:0.8rem; font-weight:700;">สัปดาห์ที่ 14</span>
                            <h4 style="margin:8px 0 5px 0; color:#0f172a;">Business Value และ AIOps</h4>
                            <p style="font-size:0.85rem; color:#475569; margin:0;"><strong>ทฤษฎี:</strong> การวัดความสำเร็จ (DORA Metrics, MTTR), บทบาทของ AI ต่อการพัฒนาซอฟต์แวร์<br><strong>ปฏิบัติ:</strong> ใช้ AI (ChatGPT, Copilot, Cursor) ช่วยสร้าง Unit Test, Dockerfile และวิเคราะห์ผลลัพธ์</p>
                        </div>
                        <a href="unit14.php" target="_blank" class="btn-enter-unit" style="width:auto; white-space:nowrap; margin-left:20px; background: #7c3aed; color: #fff; padding: 8px 16px; border-radius: 6px; text-decoration: none; font-size: 0.9rem; font-weight: 600;">ดูบทเรียน ➔</a>
                    </div>

                    <div class="unit-card-horizontal" style="background:#fff; border:1px solid #e2e8f0; padding:20px; border-radius:10px; display:flex; justify-content:space-between; align-items:center;">
                        <div>
                            <span class="unit-badge" style="background:#0f172a; color:#fff; padding:3px 10px; border-radius:15px; font-size:0.8rem; font-weight:700;">สัปดาห์ที่ 15</span>
                            <h4 style="margin:8px 0 5px 0; color:#0f172a;">Final DevOps Project (Presentation)</h4>
                            <p style="font-size:0.85rem; color:#475569; margin:0;"><strong>ภาคปิดท้ายการเรียน:</strong> นำเสนอระบบโปรเจกต์จริงที่ผูกกลไกครบสมบูรณ์ (Development, Quality, Operations, Monitoring, Documentation, Business Metrics)</p>
                        </div>
                        <a href="final-project.php" target="_blank" class="btn-enter-unit" style="width:auto; white-space:nowrap; margin-left:20px; background-color:#10b981; color: #fff; padding: 8px 16px; border-radius: 6px; text-decoration: none; font-size: 0.9rem; font-weight: 600;">ส่งโครงงาน ➔</a>
                    </div>

                </div>
            </div>

            <div class="sidebar-column">
                <div class="course-sidebar">

                    <div class="right-sidebar-box pre-requisite" style="background: #fff; padding: 20px; border-radius: 8px; border: 1px solid #e2e8f0; border-left: 4px solid #7c3aed; margin-bottom: 20px;">
                        <h3 style="margin-top: 0;">🛠️ เครื่องมือที่แนะนำ (Tools Stack)</h3>
                        <ul style="list-style: none; padding-left: 0; font-size: 0.9rem; line-height: 1.6; color: #475569;">
                            <li style="margin-bottom:6px;"><strong>Source Control:</strong> Git, GitHub</li>
                            <li style="margin-bottom:6px;"><strong>Project Mgmt:</strong> GitHub Projects, Trello</li>
                            <li style="margin-bottom:6px;"><strong>Testing:</strong> Jest, PyTest, PHPUnit</li>
                            <li style="margin-bottom:6px;"><strong>Quality & CI/CD:</strong> SonarQube, GitHub Actions</li>
                            <li style="margin-bottom:6px;"><strong>Containers:</strong> Docker, Docker Compose</li>
                            <li style="margin-bottom:6px;"><strong>Monitoring:</strong> Grafana, Prometheus</li>
                            <li><strong>AI Assist:</strong> ChatGPT, GitHub Copilot</li>
                        </ul>
                    </div>

                    <div class="right-sidebar-box" style="background: #fff; padding: 20px; border-radius: 8px; border: 1px solid #e2e8f0;">
                        <h3 class="section-title" style="margin-top: 0; font-size: 1.1rem; border-bottom: 1px solid #e2e8f0; padding-bottom: 10px;">📊 สัดส่วนการวัดผลสัมฤทธิ์รายวิชา</h3>
                        <p style="font-size:0.9rem; color:#475569; margin-bottom:15px;">การประเมินเพื่อวัดสมรรถนะผู้เรียนตามมาตรฐาน แบ่งสัดส่วนออกเป็นดังนี้:</p>

                        <table class="grading-table" style="width:100%; border-collapse:collapse; font-size:0.9rem;">
                            <tr style="background:#f8fafc; border-bottom:2px solid #e2e8f0;">
                                <th style="padding:10px; text-align:left; color:#0f172a;">ส่วนประกอบการวัดผล</th>
                                <th style="padding:10px; text-align:right; color:#0f172a;">ร้อยละ</th>
                            </tr>
                            <tr style="border-bottom:1px solid #f1f5f9;">
                                <td style="padding:10px; color:#475569;">🛠️ 1. งานปฏิบัติการและ Pipeline (Lab)</td>
                                <td style="padding:10px; text-align:right; font-weight:bold; color:#7c3aed;">40%</td>
                            </tr>
                            <tr style="border-bottom:1px solid #f1f5f9;">
                                <td style="padding:10px; color:#475569;">📝 2. ใบงานวิเคราะห์เอกสารและ AI</td>
                                <td style="padding:10px; text-align:right; font-weight:bold; color:#7c3aed;">10%</td>
                            </tr>
                            <tr style="border-bottom:1px solid #f1f5f9;">
                                <td style="padding:10px; color:#475569;">✍️ 3. การทดสอบย่อยภาคทฤษฎี (Quiz)</td>
                                <td style="padding:10px; text-align:right; font-weight:bold; color:#7c3aed;">10%</td>
                            </tr>
                            <tr style="border-bottom:1px solid #f1f5f9;">
                                <td style="padding:10px; color:#475569;">💻 4. ประเมินความก้าวหน้า (Midterm)</td>
                                <td style="padding:10px; text-align:right; font-weight:bold; color:#7c3aed;">15%</td>
                            </tr>
                            <tr style="border-bottom:1px solid #f1f5f9;">
                                <td style="padding:10px; color:#475569;">🚀 5. นำเสนอระบบ DevOps (Final)</td>
                                <td style="padding:10px; text-align:right; font-weight:bold; color:#7c3aed;">25%</td>
                            </tr>
                            <tr style="background:#f1f5f9;">
                                <td style="padding:10px; font-weight:bold; color:#0f172a;">คะแนนประเมินรวมทั้งสิ้น</td>
                                <td style="padding:10px; text-align:right; font-weight:bold; color:#0f172a;">100%</td>
                            </tr>
                        </table>

                        <div style="margin-top:20px; background:#f0fdf4; border-left:4px solid #16a34a; padding:12px; border-radius:4px; font-size:0.85rem; color:#14532d;">
                            💡 <strong>เป้าหมายรายวิชา:</strong> มุ่งเน้นให้นักศึกษาสามารถส่งมอบซอฟต์แวร์ได้อย่างรวดเร็ว ปลอดภัย และมีคุณภาพ ครอบคลุมเครื่องมือยอดนิยมของโลกไอทียุค 2026
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div id="specsModal" class="custom-modal" style="display: none; position: fixed; z-index: 9999; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.5);">
            <div class="modal-content" style="background-color: #fefefe; margin: 5% auto; padding: 30px; border: 1px solid #888; width: 80%; max-width: 900px; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.3);">
                <div class="modal-header" style="display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #e2e8f0; padding-bottom: 15px; margin-bottom: 20px;">
                    <h4 style="margin: 0; font-size: 1.4rem; color: #0f172a;">📄 เอกสารข้อกำหนดหลักสูตรฐานสมรรถนะรายวิชา</h4>
                    <span class="close-modal-btn" style="color: #aaa; font-size: 28px; font-weight: bold; cursor: pointer;">&times;</span>
                </div>
                <div class="modal-body">
                    <table class="info-meta-table" style="width: 100%; border-collapse: collapse; margin-bottom: 25px; font-size: 0.95rem;">
                        <tr style="border-bottom: 1px solid #f1f5f9;">
                            <td style="padding: 10px; font-weight: 600; width: 25%;"><strong>รายวิชา:</strong></td>
                            <td style="padding: 10px;">การพัฒนาซอฟต์แวร์รูปแบบเดฟออฟส์ (DevOps Style Software Development)</td>
                        </tr>
                        <tr style="border-bottom: 1px solid #f1f5f9;">
                            <td style="padding: 10px; font-weight: 600;"><strong>รหัสวิชา:</strong></td>
                            <td style="padding: 10px;">31901-2008 (ทฤษฎี-ปฏิบัติ-หน่วยกิต: 1 - 4 - 3)</td>
                        </tr>
                        <tr style="border-bottom: 1px solid #f1f5f9;">
                            <td style="padding: 10px; font-weight: 600;"><strong>กลุ่มสมรรถนะ:</strong></td>
                            <td style="padding: 10px;">วิชาชีพเฉพาะ | <strong>หมวดวิชา:</strong> วิชาชีพ</td>
                        </tr>
                        <tr style="border-bottom: 1px solid #f1f5f9;">
                            <td style="padding: 10px; font-weight: 600;"><strong>สาขาวิชา:</strong></td>
                            <td style="padding: 10px;">เทคโนโลยีสารสนเทศ | <strong>กลุ่มอาชีพ:</strong> ซอฟต์แวร์และการประยุกต์</td>
                        </tr>
                        <tr style="border-bottom: 1px solid #f1f5f9;">
                            <td style="padding: 10px; font-weight: 600;"><strong>ประเภทวิชา:</strong></td>
                            <td style="padding: 10px;">อุตสาหกรรมดิจิทัลและเทคโนโลยีสารสนเทศ</td>
                        </tr>
                    </table>

                    <div class="spec-section-box" style="background: #f8fafc; padding: 20px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #e2e8f0;">
                        <h5 style="margin-top: 0; color: #1e293b; font-size: 1.1rem;">🎯 ผลลัพธ์การเรียนรู้ระดับรายวิชา (Course Learning Outcome)</h5>
                        <p style="margin-bottom: 0; color: #475569;">พัฒนาซอฟต์แวร์ตามกระบวนการเดฟออฟส์ (DevOps) ด้วยความละเอียดรอบคอบ รับผิดชอบ การสื่อสาร การคิดเชิงนวัตกรรมและการทำงานเป็นทีม</p>
                    </div>

                    <div class="spec-section-box" style="background: #f8fafc; padding: 20px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #e2e8f0;">
                        <h5 style="margin-top: 0; color: #1e293b; font-size: 1.1rem;">🎯 จุดประสงค์การเรียนรู้ (Objectives)</h5>
                        <ol style="margin-bottom: 0; color: #475569; padding-left: 20px;">
                            <li style="margin-bottom: 5px;">เข้าใจเกี่ยวกับการพัฒนาซอฟต์แวร์ตามกระบวนการเดฟออฟส์ (DevOps)</li>
                            <li style="margin-bottom: 5px;">มีทักษะในการพัฒนาซอฟต์แวร์ตามกระบวนการเดฟออฟส์ (DevOps)</li>
                            <li style="margin-bottom: 5px;">มีเจตคติและกิจนิสัยที่ดีในการปฏิบัติงานด้วยความละเอียดรอบคอบ รับผิดชอบ การสื่อสาร การคิดเชิงนวัตกรรมและการทำงานเป็นทีม</li>
                            <li>มีความสามารถประยุกต์ใช้เครื่องมือในการพัฒนาซอฟต์แวร์ตามกระบวนการเดฟออฟส์ (DevOps)</li>
                        </ol>
                    </div>

                    <div class="spec-section-box" style="background: #f8fafc; padding: 20px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #e2e8f0;">
                        <h5 style="margin-top: 0; color: #1e293b; font-size: 1.1rem;">🎯 สมรรถนะการเรียนรู้ (Performance)</h5>
                        <ol style="margin-bottom: 0; color: #475569; padding-left: 20px;">
                            <li style="margin-bottom: 5px;">ประมวลความรู้เกี่ยวกับการพัฒนาซอฟต์แวร์ตามกระบวนการเดฟออฟส์ (DevOps)</li>
                            <li style="margin-bottom: 5px;">พัฒนาซอฟต์แวร์ตามกระบวนการเดฟออฟส์ (DevOps)</li>
                            <li>ประยุกต์ใช้เครื่องมือในการพัฒนาซอฟต์แวร์ตามกระบวนการเดฟออฟส์ (DevOps)</li>
                        </ol>
                    </div>

                    <div class="spec-section-box" style="background: #f8fafc; padding: 20px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #e2e8f0;">
                        <h5 style="margin-top: 0; color: #1e293b; font-size: 1.1rem;">📖 คำอธิบายรายวิชา (Course Description)</h5>
                        <p style="text-indent: 40px; text-align: justify; line-height: 1.7; margin-bottom: 0; color: #475569;">
                            ศึกษาและปฏิบัติเกี่ยวกับ วิธีการการพัฒนาและวิธีการดำเนินงาน ตามกระบวนการเดฟออฟส์ (DevOps) การปรับปรุงคุณลักษณะ ความถูกต้องของซอฟต์แวร์และเสถียรภาพของระบบ พัฒนาและดำเนินงานใช้เครื่องมือและเทคนิคต่าง ๆ สหวิทยาการของการพัฒนาซอฟต์แวร์ ดำเนินงานด้านเทคโนโลยีสารสนเทศและการประกันคุณภาพ ลดอุปสรรคในการดำเนินโครงการ ปรับปรุงผลลัพธ์ทางธุรกิจ พร้อมส่งมอบให้กับผู้ใช้
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const modal = document.getElementById("specsModal");
                const btn = document.getElementById("openSpecsBtn");
                const span = document.getElementsByClassName("close-modal-btn")[0];

                btn.onclick = function() {
                    modal.style.display = "block";
                    document.body.style.overflow = "hidden";
                }
                span.onclick = function() {
                    modal.style.display = "none";
                    document.body.style.overflow = "auto";
                }
                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                        document.body.style.overflow = "auto";
                    }
                }
            });
        </script>

        <script src="../assets/js/script.js"></script>
</body>

</html>