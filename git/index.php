<?php
$base_dir = "../"; // ถอยกลับ 1 ชั้นเพื่อไปหาโฟลเดอร์หลัก
$active_nav = "git"; // เปิดสถานะเมนูที่วิชา Git & Collaboration
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าหลักวิชา: การพัฒนาระบบร่วมกันด้วยแพลตฟอร์ม (Collaboration Tools)</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">

    <style>
        :root {
            --git-primary: #4f46e5;
            --git-secondary: #312e81;
            --git-accent: #8b5cf6;
            --git-dark: #1e1b4b;
            --git-light: #f5f3ff;
            --git-success: #10b981;
        }

        /* กล่องข้อกำหนดหลักสูตรพรีเมียมตามตัวอย่าง */
        .course-spec-card {
            background: #1e293b;
            border: 1px solid #334155;
            border-top: 4px solid var(--git-accent);
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 30px;
            color: #f1f5f9;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .course-spec-card h3 {
            color: #fff;
            font-size: 1.25rem;
            margin-top: 0;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            border-bottom: 1px solid #334155;
            padding-bottom: 12px;
        }

        .spec-meta-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 15px;
            margin-bottom: 20px;
        }

        .spec-meta-item {
            background: #0f172a;
            padding: 12px 15px;
            border-radius: 8px;
            border-left: 4px solid var(--git-primary);
        }

        .spec-meta-item strong {
            display: block;
            color: #94a3b8;
            font-size: 0.8rem;
            margin-bottom: 4px;
        }

        .spec-meta-item span {
            color: #e2e8f0;
            font-size: 0.95rem;
            font-weight: 600;
        }

        .spec-details-layout {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }

        @media (min-width: 992px) {
            .spec-details-layout {
                grid-template-columns: repeat(2, 1fr);
            }

            .spec-full-width {
                grid-column: span 2;
            }

            .course-layout {
                display: flex !important;
                gap: 30px !important;
                align-items: flex-start !important;
            }

            .units-area {
                flex: 1 !important;
                min-width: 0 !important;
            }

            .sidebar-area {
                width: 340px !important;
                flex-shrink: 0 !important;
            }
        }

        .spec-detail-box {
            background: #0f172a;
            padding: 20px;
            border-radius: 8px;
            border: 1px solid #334155;
        }

        .spec-detail-box h4 {
            color: #8b5cf6;
            margin-top: 0;
            margin-bottom: 12px;
            font-size: 1.05rem;
        }

        .spec-detail-box p,
        .spec-detail-box ol {
            font-size: 0.9rem;
            color: #cbd5e1;
            line-height: 1.6;
            margin: 0;
        }

        .spec-detail-box ol {
            padding-left: 20px;
        }

        /* สไตล์ของชุดการแสดงผลการเรียนรู้รายสัปดาห์ (ตัวเดิม) */
        .unit-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 24px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            position: relative;
        }

        .unit-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(79, 70, 229, 0.1);
            border-color: var(--git-primary);
        }

        .unit-badge {
            background: var(--git-light);
            color: var(--git-primary);
            padding: 4px 12px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 0.85rem;
            display: inline-block;
            margin-bottom: 12px;
        }

        .content-tag {
            display: inline-block;
            font-size: 0.8rem;
            padding: 2px 8px;
            border-radius: 4px;
            margin-right: 5px;
            margin-bottom: 5px;
            font-weight: 600;
        }

        .tag-theory {
            background: #eff6ff;
            color: #2563eb;
            border: 1px solid #bfdbfe;
        }

        .tag-practice {
            background: #f0fdf4;
            color: #16a34a;
            border: 1px solid #bbf7d0;
        }

        .tag-output {
            background: #ffffec;
            color: #b45309;
            border: 1px solid #fef08a;
        }

        .btn-study {
            display: inline-block;
            background: var(--git-primary);
            color: #ffffff !important;
            text-decoration: none;
            padding: 8px 18px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 0.85rem;
            transition: all 0.2s ease;
            border: none;
        }

        .btn-study:hover {
            background: var(--git-secondary);
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.2);
        }

        .career-item {
            background: #fafafa;
            border-left: 4px solid var(--git-accent);
            padding: 10px 15px;
            margin-bottom: 8px;
            border-radius: 0 8px 8px 0;
            font-size: 0.9rem;
            color: #334155;
        }
    </style>
</head>

<body style="background-color: #f8fafc; padding-top: 40px;">

    <?php include '../components/navbar.php'; ?>

    <div class="page-header" style="background: linear-gradient(135deg, var(--git-dark) 0%, var(--git-secondary) 100%); color: #fff; padding: 50px 0 50px 0; border-bottom: 5px solid var(--git-accent);">
        <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 15px;">
            <span class="course-code" style="background: var(--git-primary); color: #fff; padding: 5px 14px; border-radius: 6px; font-weight: 600; font-size: 0.9rem; letter-spacing: 0.5px;">รหัสวิชา: 21901-2012 | หลักสูตร ปวส. สาขาเทคโนโลยีสารสนเทศ</span>
            <h2 style="margin: 15px 0 10px 0; font-size: 2.2rem; font-weight: 700; line-height: 1.3;">การพัฒนาระบบร่วมกันด้วยแพลตฟอร์ม<br><span style="font-size: 1.4rem; color: #c7d2fe; font-weight: 400;">Collaboration Tools for Software Development (1-2-2)</span></h2>
            <p style="color: #e0e7ff; margin: 0; max-width: 900px; font-size: 1rem; line-height: 1.6;">เรียนรู้สถาปัตยกรรมการควบคุมเวอร์ชันซอฟต์แวร์ (Git) การบริหารจัดการกิ่งก้านโค้ด (Branching Workflow) การทำ Code Review ผ่าน Pull Request ตลอดจนการจัดการสภาพแวดล้อมระบบด้วย Docker และ CI/CD Pipeline ตามแนวคิด DevOps เพื่อก้าวสู่การเป็นนักพัฒนาระบบมืออาชีพที่ทำงานร่วมกันเป็นทีมได้อย่างมีประสิทธิภาพ</p>
            <button id="openSpecsBtn" class="btn-course-specs" style="margin-top: 15px; background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.3); color: #fff; padding: 8px 16px; border-radius: 6px; cursor: pointer; transition: 0.3s;">📄 ดูข้อมูลโครงสร้างหลักสูตรและแผนฐานสมรรถนะ</button>
        </div>
    </div>

    <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 15px; margin-top: 40px; margin-bottom: 60px;">

        <div class="course-stats-grid" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-bottom: 30px;">
            <div class="stat-card" style="background: #fff; padding: 20px; border-radius: 8px; text-align: center; border: 1px solid #e2e8f0; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
                <h3 style="margin: 0; font-size: 2rem; color: #7c3aed;">15</h3>
                <p style="margin: 5px 0 0 0; color: #64748b; font-size: 0.9rem;">หน่วยการเรียนรู้</p>
            </div>
            <div class="stat-card" style="background: #fff; padding: 20px; border-radius: 8px; text-align: center; border: 1px solid #e2e8f0; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
                <h3 style="margin: 0; font-size: 2rem; color: #7c3aed;">17+1</h3>
                <p style="margin: 5px 0 0 0; color: #64748b; font-size: 0.9rem;">สัปดาห์เรียน + สอบ</p>
            </div>
            <div class="stat-card" style="background: #fff; padding: 20px; border-radius: 8px; text-align: center; border: 1px solid #e2e8f0; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
                <h3 style="margin: 0; font-size: 2rem; color: #7c3aed;">54</h3>
                <p style="margin: 5px 0 0 0; color: #64748b; font-size: 0.9rem;">ชั่วโมงเรียนรวม (ป) 36 (ท) 18</p>
            </div>
            <div class="stat-card" style="background: #fff; padding: 20px; border-radius: 8px; text-align: center; border: 1px solid #e2e8f0; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
                <h3 style="margin: 0; font-size: 2rem; color: #7c3aed;">3</h3>
                <p style="margin: 5px 0 0 0; color: #64748b; font-size: 0.9rem;">หน่วยกิต (1-2-2)</p>
            </div>
        </div>

        <div class="course-layout">

            <div class="units-area">
                <h3 style="color: var(--git-dark); font-weight: 700; margin-top: 0; margin-bottom: 25px;">📅 โครงสร้างหน่วยการเรียนรู้ย่อยรายสัปดาห์ (15 สัปดาห์)</h3>

                <div class="unit-card">
                    <span class="unit-badge">สัปดาห์ที่ 1</span>
                    <h4 style="margin: 0 0 10px 0; color: var(--git-dark); font-weight: 700;">หน่วยที่ 1: แนวคิดการพัฒนาซอฟต์แวร์แบบ DevOps และการทำงานร่วมกัน</h4>
                    <p style="font-size: 0.95rem; color: #475569; margin-bottom: 15px;"><strong>สมรรถนะ:</strong> อธิบายแนวคิด DevOps และบทบาทของเครื่องมือ Collaboration ในกระบวนการซอฟต์แวร์ได้</p>
                    <div style="margin-bottom: 12px;">
                        <span class="content-tag tag-theory">ทฤษฎี</span> <span style="font-size: 0.9rem; color: #334155;">ปัญหาการพัฒนาซอฟต์แวร์แบบเดิม, SDLC, Agile Methodology, นิยาม DevOps และ DevOps Lifecycle ทั้ง 8 เฟส</span><br>
                        <span class="content-tag tag-practice">ปฏิบัติ</span> <span style="font-size: 0.9rem; color: #334155;">วิเคราะห์ Case Study ขององค์กรระดับโลก, กิจกรรมจำลองบทบาททีมพัฒนา (Dev) และทีมปฏิบัติการ (Ops)</span>
                    </div>
                    <div style="margin-bottom: 15px;"><span class="content-tag tag-output">สิ่งส่งมอบ</span> <strong style="font-size: 0.9rem; color: #b45309;">Mind Map DevOps Ecosystem & Collaboration Framework</strong></div>
                    <div style="text-align: right;">
                        <a href="unit01.php" class="btn-study">เข้าสู่เนื้อหาหน่วยที่ 1 ➔</a>
                    </div>
                </div>

                <div class="unit-card">
                    <span class="unit-badge">สัปดาห์ที่ 2</span>
                    <h4 style="margin: 0 0 10px 0; color: var(--git-dark); font-weight: 700;">หน่วยที่ 2: การติดตั้งและใช้งาน Git เบื้องต้น</h4>
                    <p style="font-size: 0.95rem; color: #475569; margin-bottom: 15px;"><strong>สมรรถนะ:</strong> ติดตั้ง ตั้งค่าคอนฟิก และใช้งาน Git สำหรับบันทึกสถานะไฟล์ในเครื่องโลคอลได้</p>
                    <div style="margin-bottom: 12px;">
                        <span class="content-tag tag-theory">ทฤษฎี</span> <span style="font-size: 0.9rem; color: #334155;">Version Control System (VCS), ข้อดีของ Distributed VCS, สถาปัตยกรรม 3 โซนของ Git (Working Directory, Staging Area, Local Repo)</span><br>
                        <span class="content-tag tag-practice">ปฏิบัติ</span> <span style="font-size: 0.9rem; color: #334155;">ฝึกใช้ชุดคำสั่งพื้นฐาน <code>git init</code>, <code>git status</code>, <code>git add</code>, <code>git commit</code> และการตรวจสอบประวัติด้วย <code>git log</code></span>
                    </div>
                    <div style="margin-bottom: 15px;"><span class="content-tag tag-output">สิ่งส่งมอบ</span> <strong style="font-size: 0.9rem; color: #b45309;">Local Repository คลังเก็บโค้ดจำลองชุดแรกที่มีประวัติการ Commit ถูกต้อง</strong></div>
                    <div style="text-align: right;">
                        <a href="unit02.php" class="btn-study">เข้าสู่เนื้อหาหน่วยที่ 2 ➔</a>
                    </div>
                </div>

                <div class="unit-card">
                    <span class="unit-badge">สัปดาห์ที่ 3</span>
                    <h4 style="margin: 0 0 10px 0; color: var(--git-dark); font-weight: 700;">หน่วยที่ 3: Git Internals และกลไกการจัดเก็บข้อมูลภายใน</h4>
                    <p style="font-size: 0.95rem; color: #475569; margin-bottom: 15px;"><strong>สมรรถนะ:</strong> อธิบายกลไกการทำงานระดับลึกและการเชื่อมโยงข้อมูลภายในของ Git Objects ได้</p>
                    <div style="margin-bottom: 12px;">
                        <span class="content-tag tag-theory">ทฤษฎี</span> <span style="font-size: 0.9rem; color: #334155;">โครงสร้างข้อมูลในโฟลเดอร์ <code>.git</code>, ความเข้าใจเกี่ยวกับประเภทวัตถุ: Blob, Tree, Commit และการเข้ารหัสแบบ SHA-1 Hash</span><br>
                        <span class="content-tag tag-practice">ปฏิบัติ</span> <span style="font-size: 0.9rem; color: #334155;">ผ่าพิสูจน์ฐานข้อมูล Git ในระดับ Low-level ด้วยคำสั่งสายลับ <code>git cat-file</code> และสร้างวัตถุผ่าน <code>git hash-object</code></span>
                    </div>
                    <div style="margin-bottom: 15px;"><span class="content-tag tag-output">สิ่งส่งมอบ</span> <strong style="font-size: 0.9rem; color: #b45309;">รายงานการวิเคราะห์และแผนผังความสัมพันธ์โครงสร้างข้อมูลภายใน Git Internals</strong></div>
                    <div style="text-align: right;">
                        <a href="unit03.php" class="btn-study">เข้าสู่เนื้อหาหน่วยที่ 3 ➔</a>
                    </div>
                </div>

                <div class="unit-card">
                    <span class="unit-badge">สัปดาห์ที่ 4</span>
                    <h4 style="margin: 0 0 10px 0; color: var(--git-dark); font-weight: 700;">หน่วยที่ 4: Git Branching Strategy และการผสานสายงาน</h4>
                    <p style="font-size: 0.95rem; color: #475569; margin-bottom: 15px;"><strong>สมรรถนะ:</strong> บริหารจัดการแยกกิ่งก้าน (Branch) และผสานรวมสายโค้ดบนระบบโลคอลได้</p>
                    <div style="margin-bottom: 12px;">
                        <span class="content-tag tag-theory">ทฤษฎี</span> <span style="font-size: 0.9rem; color: #334155;">แนวคิดเรื่อง Branch ในฐานะพอยเตอร์น้ำหนักเบา, ทฤษฎีการรวมโค้ดแบบ Fast-forward Merge และ Three-way Merge</span><br>
                        <span class="content-tag tag-practice">ปฏิบัติ</span> <span style="font-size: 0.9rem; color: #334155;">แยกสายงานฟีเจอร์ด้วยคำสั่ง <code>git branch</code>, ย้ายกิ่งทำงานผ่าน <code>git switch</code> และรวมงานด้วย <code>git merge</code></span>
                    </div>
                    <div style="margin-bottom: 15px;"><span class="content-tag tag-output">สิ่งส่งมอบ</span> <strong style="font-size: 0.9rem; color: #b45309;">แผนผังกราฟต้นไม้จำลองโครงสร้าง Branch Workflow ที่รวมโค้ดสำเร็จ</strong></div>
                    <div style="text-align: right;">
                        <a href="unit04.php" class="btn-study">เข้าสู่เนื้อหาหน่วยที่ 4 ➔</a>
                    </div>
                </div>

                <div class="unit-card">
                    <span class="unit-badge">สัปดาห์ที่ 5</span>
                    <h4 style="margin: 0 0 10px 0; color: var(--git-dark); font-weight: 700;">หน่วยที่ 5: การจัดการสถานการณ์โค้ดชนกัน (Merge Conflict)</h4>
                    <p style="font-size: 0.95rem; color: #475569; margin-bottom: 15px;"><strong>สมรรถนะ:</strong> ตรวจสอบ วิเคราะห์ และแก้ไขความขัดแย้งในการรวมโค้ดได้อย่างรอบคอบและปลอดภัย</p>
                    <div style="margin-bottom: 12px;">
                        <span class="content-tag tag-theory">ทฤษฎี</span> <span style="font-size: 0.9rem; color: #334155;">สาเหตุการเกิด Conflict เมื่อนักพัฒนาแก้ไขไฟล์เดียวกันในบรรทัดเดียวกัน, การอ่านสัญลักษณ์ Conflict Marker</span><br>
                        <span class="content-tag tag-practice">ปฏิบัติ</span> <span style="font-size: 0.9rem; color: #334155;">จำลองสถานการณ์โค้ดชนกัน ฝึกไล่เช็กบรรทัดปัญหาผ่านเครื่องมือแก้ไขโค้ด และผสานส่งงานเพื่อปิดเคส</span>
                    </div>
                    <div style="margin-bottom: 15px;"><span class="content-tag tag-output">สิ่งส่งมอบ</span> <strong style="font-size: 0.9rem; color: #b45309;">บันทึกกรณีศึกษาและรายงานขั้นตอนการคลี่คลาย Conflict (Conflict Resolution Report)</strong></div>
                    <div style="text-align: right;">
                        <a href="unit05.php" class="btn-study">เข้าสู่เนื้อหาหน่วยที่ 5 ➔</a>
                    </div>
                </div>

                <div class="unit-card">
                    <span class="unit-badge">สัปเกณฑ์ที่ 6</span>
                    <h4 style="margin: 0 0 10px 0; color: var(--git-dark); font-weight: 700;">หน่วยที่ 6: GitHub และการเชื่อมต่อคลังเก็บข้อมูลระยะไกล (Remote Repository)</h4>
                    <p style="font-size: 0.95rem; color: #475569; margin-bottom: 15px;"><strong>สมรรถนะ:</strong> บริหารจัดการพื้นที่เก็บโค้ดส่วนกลางบนคลาวด์แพลตฟอร์มและซิงค์ข้อมูลกับเครื่องโลคอลได้</p>
                    <div style="margin-bottom: 12px;">
                        <span class="content-tag tag-theory">ทฤษฎี</span> <span style="font-size: 0.9rem; color: #334155;">สถาปัตยกรรมระบบคลาวด์คลังโค้ดส่วนกลาง, กลไกความปลอดภัยผ่านโปรโตคอล SSH Key และ Personal Access Token</span><br>
                        <span class="content-tag tag-practice">ปฏิบัติ</span> <span style="font-size: 0.9rem; color: #334155;">ผูกสิทธิ์ SSH Key, ใช้ชุดคำสั่ง <code>git remote add</code>, <code>git push</code>, <code>git pull</code> และสำเนาคลังผ่าน <code>git clone</code></span>
                    </div>
                    <div style="margin-bottom: 15px;"><span class="content-tag tag-output">สิ่งส่งมอบ</span> <strong style="font-size: 0.9rem; color: #b45309;">คลังซอร์สโค้ดออนไลน์ (Online Central Repository) บนคลาวด์ GitHub สาธารณะ</strong></div>
                    <div style="text-align: right;">
                        <a href="unit06.php" class="btn-study">เข้าสู่เนื้อหาหน่วยที่ 6 ➔</a>
                    </div>
                </div>

                <div class="unit-card">
                    <span class="unit-badge">สัปดาห์ที่ 7</span>
                    <h4 style="margin: 0 0 10px 0; color: var(--git-dark); font-weight: 700;">หน่วยที่ 7: กลไก Pull Request และกระบวนการ Code Review</h4>
                    <p style="font-size: 0.95rem; color: #475569; margin-bottom: 15px;"><strong>สมรรถนะ:</strong> สร้างใบคำขอรวมโค้ดและดำเนินการตรวจสอบคุณภาพโค้ดของสมาชิกในทีมได้</p>
                    <div style="margin-bottom: 12px;">
                        <span class="content-tag tag-theory">ทฤษฎี</span> <span style="font-size: 0.9rem; color: #334155;">ความสำคัญของกลไกตรวจสอบคุณภาพ (Gatekeeping), วงจรชีวิตของ Pull Request (PR), จิตวิทยาและมารยาทในการทำ Code Review</span><br>
                        <span class="content-tag tag-practice">ปฏิบัติ</span> <span style="font-size: 0.9rem; color: #334155;">จับคู่บัดดี้ ยื่นคำขอ PR เจตนาคอมเมนต์ทักท้วงจุดผิดพลาด สั่งแก้ไขซ้ำ และกดยอมรับอนุมัติรวมโค้ด</span>
                    </div>
                    <div style="margin-bottom: 15px;"><span class="content-tag tag-output">สิ่งส่งมอบ</span> <strong style="font-size: 0.9rem; color: #b45309;">บันทึกประวัติการยื่นคำขออนุมัติ Pull Request และร่องรอยการพิมพ์รีวิวโค้ดแบบสมบูรณ์</strong></div>
                    <div style="text-align: right;">
                        <a href="unit07.php" class="btn-study">เข้าสู่เนื้อหาหน่วยที่ 7 ➔</a>
                    </div>
                </div>

                <div class="unit-card">
                    <span class="unit-badge">สัปดาห์ที่ 8</span>
                    <h4 style="margin: 0 0 10px 0; color: var(--git-dark); font-weight: 700;">หน่วยที่ 8: ยุทธศาสตร์ Git Flow และมาตรฐานการบริหารทีมพัฒนา</h4>
                    <p style="font-size: 0.95rem; color: #475569; margin-bottom: 15px;"><strong>สมรรถนะ:</strong> ออกแบบและบังคับใช้โมเดลโครงสร้างกิ่งก้านการทำงานที่สอดคล้องกับขนาดของทีมและโปรเจกต์ได้</p>
                    <div style="margin-bottom: 12px;">
                        <span class="content-tag tag-theory">ทฤษฎี</span> <span style="font-size: 0.9rem; color: #334155;">เปรียบเทียบโมเดลความร่วมมือสากล: Git Flow, GitHub Flow และ Trunk-Based Development</span><br>
                        <span class="content-tag tag-practice">ปฏิบัติ</span> <span style="font-size: 0.9rem; color: #334155;">ร่วมกันวางกฎเหล็กกลุ่ม กำหนดโครงสร้างกิ่งถาวร (main/develop) และกิ่งชั่วคราว (feature/*) ในโปรเจกต์</span>
                    </div>
                    <div style="margin-bottom: 15px;"><span class="content-tag tag-output">สิ่งส่งมอบ</span> <strong style="font-size: 0.9rem; color: #b45309;">พิมพ์เขียวเอกสารแนวทางการบริหารจัดการกิ่งก้าน (Team Git Workflow Architecture Design)</strong></div>
                    <div style="text-align: right;">
                        <a href="unit08.php" class="btn-study">เข้าสู่เนื้อหาหน่วยที่ 8 ➔</a>
                    </div>
                </div>

                <div class="unit-card">
                    <span class="unit-badge">สัปดาห์ที่ 9</span>
                    <h4 style="margin: 0 0 10px 0; color: var(--git-dark); font-weight: 700;">หน่วยที่ 9: การจัดการ Issue และการวางแผนโครงการตามแนวคิด Agile</h4>
                    <p style="font-size: 0.95rem; color: #475569; margin-bottom: 15px;"><strong>สมรรถนะ:</strong> ประยุกต์ใช้ระบบติดตามปัญหาและบอร์ดคัมบังในการควบคุมงานและสื่อสารในทีมได้</p>
                    <div style="margin-bottom: 12px;">
                        <span class="content-tag tag-theory">ทฤษฎี</span> <span style="font-size: 0.9rem; color: #334155;">หลักการบริหารจัดการงานแบบ Agile & Scrum, แผนผังบอร์ดจำลองสภาวะงาน (Kanban Board)</span><br>
                        <span class="content-tag tag-practice">ปฏิบัติ</span> <span style="font-size: 0.9rem; color: #334155;">ใช้งาน <strong>GitHub Projects</strong> สร้างบอร์ดคัมบังประจำกลุ่ม แตกบัตร Issue และสั่งปิดบัตรงานอัตโนมัติผ่านคอมมิตคำสั่ง</span>
                    </div>
                    <div style="margin-bottom: 15px;"><span class="content-tag tag-output">สิ่งส่งมอบ</span> <strong style="font-size: 0.9rem; color: #b45309;">กระดานบริหารงานกลุ่มออนไลน์ (Interactive Sprint Kanban Board)</strong></div>
                    <div style="text-align: right;">
                        <a href="unit09.php" class="btn-study">เข้าสู่เนื้อหาหน่วยที่ 9 ➔</a>
                    </div>
                </div>

                <div class="unit-card">
                    <span class="unit-badge">สัปดาห์ที่ 10</span>
                    <h4 style="margin: 0 0 10px 0; color: var(--git-dark); font-weight: 700;">หน่วยที่ 10: เทคโนโลยีคอนเทนเนอร์ (Container) สำหรับนักพัฒนาซอฟต์แวร์</h4>
                    <p style="font-size: 0.95rem; color: #475569; margin-bottom: 15px;"><strong>สมรรถนะ:</strong> รัน จัดการ และสร้างอิมเมจของแอปพลิเคชันพื้นฐานผ่านแพลตฟอร์มคอนเทนเนอร์ได้</p>
                    <div style="margin-bottom: 12px;">
                        <span class="content-tag tag-theory">ทฤษฎี</span> <span style="font-size: 0.9rem; color: #334155;">แนวคิดสถาปัตยกรรม Docker Container, ความแตกต่างระหว่าง Virtual Machine กับ Container, ความเข้าใจ Dockerfile</span><br>
                        <span class="content-tag tag-practice">ปฏิบัติ</span> <span style="font-size: 0.9rem; color: #334155;">ฝึกใช้ชุดคำสั่งควบคุมคอนเทนเนอร์ <code>docker run</code>, เขียนโครงสร้าง <code>Dockerfile</code> และสั่ง <code>docker build</code> แพ็กแอป</span>
                    </div>
                    <div style="margin-bottom: 15px;"><span class="content-tag tag-output">สิ่งส่งมอบ</span> <strong style="font-size: 0.9rem; color: #b45309;">Docker Image แอปพลิเคชันพร้อมรันสำเร็จรูปที่บันทึกโครงสร้างไว้บนเครื่องโลคอล</strong></div>
                    <div style="text-align: right;">
                        <a href="unit10.php" class="btn-study">เข้าสู่เนื้อหาหน่วยที่ 10 ➔</a>
                    </div>
                </div>

                <div class="unit-card">
                    <span class="unit-badge">สัปดาห์ที่ 11</span>
                    <h4 style="margin: 0 0 10px 0; color: var(--git-dark); font-weight: 700;">หน่วยที่ 11: แนวคิดการผสานรวมโค้ดและส่งมอบอัตโนมัติ (CI/CD เบื้องต้น)</h4>
                    <p style="font-size: 0.95rem; color: #475569; margin-bottom: 15px;"><strong>สมรรถนะ:</strong> เขียนสคริปต์สถาปัตยกรรมท่อส่งงานอัตโนมัติ (Automated Pipeline) เพื่อตรวจสอบโค้ดเบื้องต้นได้</p>
                    <div style="margin-bottom: 12px;">
                        <span class="content-tag tag-theory">ทฤษฎี</span> <span style="font-size: 0.9rem; color: #334155;">ปรัชญาของ Continuous Integration (CI/CD), หลักการทำงานของแพลตฟอร์ม <strong>GitHub Actions</strong></span><br>
                        <span class="content-tag tag-practice">ปฏิบัติ</span> <span style="font-size: 0.9rem; color: #334155;">สร้างไฟล์สคริปต์ YAML ใน <code>.github/workflows/</code> เพื่อสั่งสแกนและรันตรวจสอบโค้ดอัตโนมัติเมื่อ Push งาน</span>
                    </div>
                    <div style="margin-bottom: 15px;"><span class="content-tag tag-output">สิ่งส่งมอบ</span> <strong style="font-size: 0.9rem; color: #b45309;">Automated CI Workflow (ไฟล์สคริปต์ท่อส่งงานอัตโนมัติบนระบบคลาวด์)</strong></div>
                    <div style="text-align: right;">
                        <a href="unit11.php" class="btn-study">เข้าสู่เนื้อหาหน่วยที่ 11 ➔</a>
                    </div>
                </div>

                <div class="unit-card">
                    <span class="unit-badge">สัปดาห์ที่ 12</span>
                    <h4 style="margin: 0 0 10px 0; color: var(--git-dark); font-weight: 700;">หน่วยที่ 12: การจัดการสภาพแวดล้อมระบบด้วย Infrastructure as Code เบื้องต้น</h4>
                    <p style="font-size: 0.95rem; color: #475569; margin-bottom: 15px;"><strong>สมรรถนะ:</strong> ใช้ระบบพิมพ์เขียวรหัสในการขึ้นระบบและควบคุมสภาพแวดล้อมการทำงานของระบบสารสนเทศให้เหมือนกันได้</p>
                    <div style="margin-bottom: 12px;">
                        <span class="content-tag tag-theory">ทฤษฎี</span> <span style="font-size: 0.9rem; color: #334155;">แนวคิด Infrastructure as Code (IaC), การควบคุมเวอร์ชันสภาวะแวดล้อมเครื่อง และประโยชน์ด้านการทำซ้ำได้</span><br>
                        <span class="content-tag tag-practice">ปฏิบัติ</span> <span style="font-size: 0.9rem; color: #334155;">เชื่อมต่อเครือข่ายคอนเทนเนอร์ผ่าน <strong>Docker Compose</strong> เขียนสคริปต์ <code>docker-compose.yml</code> สั่งเปิด Stack แอปพร้อมฐานข้อมูล</span>
                    </div>
                    <div style="margin-bottom: 15px;"><span class="content-tag tag-output">สิ่งส่งมอบ</span> <strong style="font-size: 0.9rem; color: #b45309;">สคริปต์จำลองพิมพ์เขียวสภาวะแวดล้อมระบบสารสนเทศ (Multi-Container Environment Stack)</strong></div>
                    <div style="text-align: right;">
                        <a href="unit12.php" class="btn-study">เข้าสู่เนื้อหาหน่วยที่ 12 ➔</a>
                    </div>
                </div>

                <div class="unit-card">
                    <span class="unit-badge">สัปดาห์ที่ 13</span>
                    <h4 style="margin: 0 0 10px 0; color: var(--git-dark); font-weight: 700;">หน่วยที่ 13: มิติด้านความปลอดภัยแบบ DevSecOps และห่วงโซ่อุปทานซอฟต์แวร์</h4>
                    <p style="font-size: 0.95rem; color: #475569; margin-bottom: 15px;"><strong>สมรรถนะ:</strong> ตระหนัก ดำเนินการคัดแยกข้อมูลความลับออกจากโค้ด และใช้เครื่องมือตรวจหาช่องโหว่ความปลอดภัยได้</p>
                    <div style="margin-bottom: 12px;">
                        <span class="content-tag tag-theory">ทฤษฎี</span> <span style="font-size: 0.9rem; color: #334155;">ความสำคัญของ Shift-Left Security, ความเสี่ยงจาก Hardcoded Secrets บนกิต และความปลอดภัยของแพ็กเกจภายนอก</span><br>
                        <span class="content-tag tag-practice">ปฏิบัติ</span> <span style="font-size: 0.9rem; color: #334155;">ทำความสะอาดโค้ดดึงความลับไปฝังไว้ที่ <strong>GitHub Secrets</strong> และเปิดสแกนบัตรรูรั่วความปลอดภัยผ่าน <strong>Dependabot</strong></span>
                    </div>
                    <div style="margin-bottom: 15px;"><span class="content-tag tag-output">สิ่งส่งมอบ</span> <strong style="font-size: 0.9rem; color: #b45309;">รายงานรายการตรวจสอบความมั่นคงปลอดภัยของซอฟต์แวร์กลุ่ม (Security Checklist & Patching Report)</strong></div>
                    <div style="text-align: right;">
                        <a href="unit13.php" class="btn-study">เข้าสู่เนื้อหาหน่วยที่ 13 ➔</a>
                    </div>
                </div>

                <div class="unit-card">
                    <span class="unit-badge">สัปดาห์ที่ 14</span>
                    <h4 style="margin: 0 0 10px 0; color: var(--git-dark); font-weight: 700;">หน่วยที่ 14: โครงงานบูรณาการร่วมกันประจำวิชา (Final Team Project Development)</h4>
                    <p style="font-size: 0.95rem; color: #475569; margin-bottom: 15px;"><strong>สมรรถนะ:</strong> ประยุกต์ใช้องค์ความรู้ เทคนิค Git และกลไก DevOps ทั้งหมดในการพัฒนาระบบร่วมกันเป็นทีมตามโจทย์ที่เลือกได้</p>
                    <div style="margin-bottom: 12px;">
                        <span class="content-tag tag-practice" style="padding: 4px 8px;">ปฏิบัติการกลุ่ม (เต็มรูปแบบ)</span> <span style="font-size: 0.9rem; color: #334155;">ระดมสมองพัฒนาระบบกลุ่ม (โจทย์ความเชี่ยวชาญ) โดยเขียนโค้ดต้องแตกบัตรผ่านคัมบัง แยกสาย Branching ผูกท่อรันผ่าน PR และสวมเข้าคอนเทนเนอร์เท่านั้น</span>
                    </div>
                    <div style="margin-bottom: 15px;"><span class="content-tag tag-output">สิ่งส่งมอบ</span> <strong style="font-size: 0.9rem; color: #b45309;">ซอร์สโค้ดโครงงานฉบับสมบูรณ์ที่พร้อมรันใช้งานจริงบนแพลตฟอร์มคลังกลางประจำกลุ่ม</strong></div>
                    <div style="text-align: right;">
                        <a href="unit14.php" class="btn-study">เข้าสู่เนื้อหาหน่วยที่ 14 ➔</a>
                    </div>
                </div>

                <div class="unit-card">
                    <span class="unit-badge">สัปดาห์ที่ 15</span>
                    <h4 style="margin: 0 0 10px 0; color: var(--git-dark); font-weight: 700;">หน่วยที่ 15: มหกรรมการนำเสนอผลงานวิชาชีพและเสร็จสิ้นแฟ้มสะสมผลงานออนไลน์</h4>
                    <p style="font-size: 0.95rem; color: #475569; margin-bottom: 15px;"><strong>สมรรถนะ:</strong> นำเสนอสาธิตระบบ สื่อสารกระบวนการวิศวกรรม DevOps แฟ้มสะสมผลงาน และสะท้อนคิดจากการเรียนรู้ได้</p>
                    <div style="margin-bottom: 12px;">
                        <span class="content-tag tag-practice" style="padding: 4px 8px;">ปฏิบัติการนำเสนอ</span> <span style="font-size: 0.9rem; color: #334155;">Live System Demo & Pitching Showcase สาธิตการกดยิง Push โค้ดสดๆ เพื่อแสดงประสิทธิภาพท่ออัตโนมัติ และสะท้อนคิดร่วมกัน</span>
                    </div>
                    <div style="margin-bottom: 15px;"><span class="content-tag tag-output">สิ่งส่งมอบ</span> <strong style="font-size: 0.9rem; color: #b45309;">ลิงก์แฟ้มสะสมผลงานระดับมืออาชีพ GitHub Developer Portfolio และเอกสารคู่มือระบบ (README.md)</strong></div>
                    <div style="text-align: right;">
                        <a href="unit15.php" class="btn-study">เข้าสู่เนื้อหาหน่วยที่ 15 ➔</a>
                    </div>
                </div>

            </div>

            <div class="sidebar-area">

                <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; margin-bottom: 25px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);">
                    <h4 style="margin-top: 0; margin-bottom: 15px; color: var(--git-dark); font-weight: 700; border-bottom: 2px solid #f1f5f9; padding-bottom: 8px;">🛠️ สแต็กเครื่องมือและทักษะที่ใช้จริง</h4>
                    <p style="font-size: 0.88rem; color: #64748b; line-height: 1.5; margin-bottom: 15px;">ทักษะในโปรเจกต์รายวิชานี้ ถูกคัดสรรตามความต้องการหลักของตลาดวิศวกรรมซอฟต์แวร์สากล:</p>

                    <div style="margin-bottom: 8px;"><strong style="font-size: 0.88rem; color: #334155;">Version Control:</strong> <span style="font-size: 0.85rem; background:#eaeaea; padding:2px 6px; border-radius:4px;">Git Core</span></div>
                    <div style="margin-bottom: 8px;"><strong style="font-size: 0.88rem; color: #334155;">Team Collaboration:</strong> <span style="font-size: 0.85rem; background:#eaeaea; padding:2px 6px; border-radius:4px;">GitHub</span> <span style="font-size: 0.85rem; background:#eaeaea; padding:2px 6px; border-radius:4px;">GitLab</span></div>
                    <div style="margin-bottom: 8px;"><strong style="font-size: 0.88rem; color: #334155;">Project Tracking:</strong> <span style="font-size: 0.85rem; background:#eaeaea; padding:2px 6px; border-radius:4px;">GitHub Projects</span></div>
                    <div style="margin-bottom: 8px;"><strong style="font-size: 0.88rem; color: #334155;">CI/CD Pipeline:</strong> <span style="font-size: 0.85rem; background:#eaeaea; padding:2px 6px; border-radius:4px;">GitHub Actions</span></div>
                    <div style="margin-bottom: 15px;"><strong style="font-size: 0.88rem; color: #334155;">Container Platform:</strong> <span style="font-size: 0.85rem; background:#eaeaea; padding:2px 6px; border-radius:4px;">Docker</span> <span style="font-size: 0.85rem; background:#eaeaea; padding:2px 6px; border-radius:4px;">Compose</span></div>
                </div>

                <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);">
                    <h4 style="margin-top: 0; margin-bottom: 15px; color: var(--git-dark); font-weight: 700; border-bottom: 2px solid #f1f5f9; padding-bottom: 8px;">🚀 เส้นทางสู่โลกอาชีพจริง</h4>
                    <p style="font-size: 0.88rem; color: #64748b; line-height: 1.5; margin-bottom: 15px;">เมื่อเรียนจบรายวิชานี้นักศึกษาจะมีคลังผลงานเชิงประจักษ์ ยื่นสมัครงานไอทีตำแหน่งเหล่านี้ได้ทันที:</p>

                    <div class="career-item">🧑‍💻 <strong>Software Programmer / Developer</strong></div>
                    <div class="career-item">🔀 <strong>DevOps Engineer (Junior level)</strong></div>
                    <div class="career-item">📦 <strong>Back-end Developer</strong></div>
                    <div class="career-item">🌐 <strong>Full-stack Developer</strong></div>
                </div>

            </div>
        </div>
    </div>

    <div id="specsModal" class="custom-modal" style="display: none; position: fixed; z-index: 9999; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.5);">
        <div class="modal-content" style="background-color: #fefefe; margin: 5% auto; padding: 30px; border: 1px solid #888; width: 80%; max-width: 900px; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.3);">
            <div class="modal-header" style="display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #e2e8f0; padding-bottom: 15px; margin-bottom: 20px;">
                <h4 style="margin: 0; font-size: 1.4rem; color: #ffffff;">📄 เอกสารข้อกำหนดหลักสูตรฐานสมรรถนะรายวิชา</h4>
                <span class="close-modal-btn" style="color: #aaa; font-size: 28px; font-weight: bold; cursor: pointer;">&times;</span>
            </div>
            <div class="modal-body">
                <table class="info-meta-table" style="width: 100%; border-collapse: collapse; margin-bottom: 25px; font-size: 0.95rem;">
                    <tr style="border-bottom: 1px solid #f1f5f9;">
                        <td style="padding: 10px; font-weight: 600; width: 25%;"><strong>รายวิชา:</strong></td>
                        <td style="padding: 10px;">การพัฒนาระบบร่วมกันด้วยแพลตฟอร์ม (Collaboration Tools for Software Development)</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #f1f5f9;">
                        <td style="padding: 10px; font-weight: 600;"><strong>รหัสวิชา:</strong></td>
                        <td style="padding: 10px;">21901-2012 (ทฤษฎี-ปฏิบัติ-หน่วยกิต: 1 - 2 - 2)</td>
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
                    <p style="margin-bottom: 0; color: #475569;">ใช้ระบบควบคุมเวอร์ชันในการสร้างการทำงานร่วมกันเป็นทีม และจัดการสภาพแวดล้อมในการทำงานของระบบสารสนเทศ ด้วยความละเอียดรอบคอบ รับผิดชอบ สื่อสาร คิดเชิงนวัตกรรม และทำงานเป็นทีม</p>
                </div>

                <div class="spec-section-box" style="background: #f8fafc; padding: 20px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #e2e8f0;">
                    <h5 style="margin-top: 0; color: #1e293b; font-size: 1.1rem;">🎯 จุดประสงค์การเรียนรู้ (Objectives)</h5>
                    <ol style="margin-bottom: 0; color: #475569; padding-left: 20px;">
                        <li style="margin-bottom: 5px;">เข้าใจการพัฒนาซอฟต์แวร์ตามแนวคิดแบบเดฟออพส์ (DevOps)</li>
                        <li style="margin-bottom: 5px;">มีทักษะในการใช้ระบบควบคุมเวอร์ชันในการสร้างการทำงานเป็นทีม</li>
                        <li style="margin-bottom: 5px;">มีเจตคติและกิจนิสัยที่ดีในการปฏิบัติงานด้วยความละเอียดรอบคอบ รับผิดชอบ สื่อสาร คิดเชิงนวัตกรรม และทำงานเป็นทีม</li>
                        <li>มีความสามารถประยุกต์ใช้ระบบควบคุมเวอร์ชันในการสร้างการทำงานเป็นทีม</li>
                    </ol>
                </div>

                <div class="spec-section-box" style="background: #f8fafc; padding: 20px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #e2e8f0;">
                    <h5 style="margin-top: 0; color: #1e293b; font-size: 1.1rem;">🎯 สมรรถนะการเรียนรู้ (Performance)</h5>
                    <ol style="margin-bottom: 0; color: #475569; padding-left: 20px;">
                        <li style="margin-bottom: 5px;">แสดงความรู้เกี่ยวกับการพัฒนาซอฟต์แวร์ตามแนวคิดแบบเดฟออพส์ (DevOps) ตามหลักการ</li>
                        <li style="margin-bottom: 5px;">ใช้ระบบควบคุมเวอร์ชันในการสร้างการทำงานเป็นทีม</li>
                        <li>ประยุกต์ใช้ระบบควบคุมเวอร์ชันในการสร้างการทำงานเป็นทีมและจัดการสภาพแวดล้อมในการทำงานของระบบสารสนเทศ</li>
                    </ol>
                </div>

                <div class="spec-section-box" style="background: #f8fafc; padding: 20px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #e2e8f0;">
                    <h5 style="margin-top: 0; color: #1e293b; font-size: 1.1rem;">📖 คำอธิบายรายวิชา (Course Description)</h5>
                    <p style="text-indent: 40px; text-align: justify; line-height: 1.7; margin-bottom: 0; color: #475569;">
                        ศึกษาและปฏิบัติเกี่ยวกับการดำเนินการพัฒนาซอฟต์แวร์แบบเดฟออพส์ (DevOps) การควบคุมเวอร์ชัน สร้างพื้นที่เก็บข้อมูล (Repository) เก็บและการเรียกดูประวัติของแฟ้มข้อมูล หลักการพื้นฐานของกิต (Git) การแยกสาขา (Branch) การรวมสาขา (Merge) การใช้งานคอนเทนเนอร์ การสร้างการทำงานเป็นทีม และจัดการสภาพแวดล้อมในการทำงานของระบบสารสนเทศเบื้องต้น
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/js/script.js"></script>
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
</body>

</html>