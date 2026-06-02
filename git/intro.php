<?php
$base_dir = "../"; // ถอยกลับ 1 ชั้นเพื่อไปหาโฟลเดอร์หลัก
$active_nav = "git"; // เปิดสถานะเมนูที่วิชา Git & Collaboration
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>บทเรียนเสริม: มาเรียนรู้ Git แบบง่ายๆ กันเถอะ (Adaptation from Akexorcist)</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600;700&family=Fira+Code:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">

    <style>
        :root {
            --bg-main: #0f172a;
            --bg-card: #1e293b;
            --border-color: #334155;
            --git-orange: #f05032;
            --git-light-orange: rgba(240, 80, 50, 0.1);
            --text-main: #f1f5f9;
            --text-muted: #94a3b8;
            --accent-blue: #38bdf8;
            --accent-green: #34d399;
        }

        body {
            background-color: var(--bg-main);
            color: var(--text-main);
            font-family: 'Sarabun', sans-serif;
            line-height: 1.8;
            padding-top: 60px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Hero Header */
        .article-header {
            background: linear-gradient(135deg, #1e1b4b 0%, #1e293b 100%);
            border-bottom: 4px solid var(--git-orange);
            padding: 50px 0;
            margin-bottom: 40px;
            text-align: center;
        }

        .article-title {
            font-size: 2.2rem;
            font-weight: 700;
            color: #fff;
            margin: 15px 0;
            line-height: 1.4;
        }

        .meta-author {
            font-size: 0.95rem;
            color: var(--accent-blue);
            font-weight: 500;
        }

        /* Main Content Styling */
        .article-body {
            font-size: 1.05rem;
        }

        h2 {
            font-size: 1.6rem;
            color: #fff;
            border-left: 5px solid var(--git-orange);
            padding-left: 15px;
            margin-top: 45px;
            margin-bottom: 20px;
            font-weight: 700;
        }

        h3 {
            font-size: 1.25rem;
            color: var(--accent-blue);
            margin-top: 30px;
            margin-bottom: 15px;
            font-weight: 600;
        }

        p {
            margin-bottom: 20px;
            text-align: justify;
        }

        strong {
            color: #fff;
            font-weight: 600;
        }

        /* Analogy & Highlight Boxes */
        .analogy-box {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-left: 4px solid var(--accent-green);
            padding: 22px;
            border-radius: 8px;
            margin: 25px 0;
        }

        .warning-box {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.2);
            border-left: 4px solid #ef4444;
            padding: 20px;
            border-radius: 8px;
            margin: 25px 0;
        }

        /* Code Blocks */
        code {
            font-family: 'Fira Code', 'Courier New', monospace;
            background-color: rgba(255, 255, 255, 0.1);
            padding: 2px 6px;
            border-radius: 4px;
            font-size: 0.9rem;
            color: #f43f5e;
        }

        pre {
            background-color: #0b0f19;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 18px;
            overflow-x: auto;
            margin: 20px 0;
        }

        pre code {
            background-color: transparent;
            padding: 0;
            color: #e2e8f0;
            font-size: 0.92rem;
            line-height: 1.5;
        }

        .code-comment {
            color: #64748b;
            font-style: italic;
        }

        /* Step List */
        .step-list {
            margin: 20px 0;
            padding-left: 20px;
        }

        .step-list li {
            margin-bottom: 12px;
        }

        /* Footer Nav Button */
        .nav-footer {
            border-top: 1px solid var(--border-color);
            padding-top: 30px;
            margin-top: 50px;
            margin-bottom: 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn-action {
            background: var(--git-orange);
            color: #fff !important;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.2s ease;
        }

        .btn-action:hover {
            background: #d43f21;
            box-shadow: 0 4px 12px rgba(240, 80, 50, 0.3);
        }

        .btn-back {
            background: #334155;
            color: #cbd5e1 !important;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.2s;
        }

        .btn-back:hover {
            background: #475569;
        }
    </style>
</head>

<body>

    <?php include '../components/navbar.php'; ?>

    <div class="article-header">
        <div class="container">
            <span style="background: var(--git-light-orange); color: var(--git-orange); font-size: 0.85rem; font-weight: 700; padding: 4px 12px; border-radius: 4px; border: 1px solid var(--git-orange);">บทความถอดบทเรียนแนะนำรายวิชา</span>
            <h1 class="article-title">มาเรียนรู้ Git แบบง่ายๆ กันเถอะ</h1>
            <p class="meta-author">✍️ เรียบเรียงและปรับโครงสร้างจากบทความต้นฉบับโดย: Akexorcist | Medium</p>
        </div>
    </div>

    <div class="container">
        <div class="article-body">

            <p>เนื่องจากทุกวันนี้ผมใช้ Git ในการทำงานอยู่เป็นประจำ และพบว่ายังมีนักพัฒนาซอฟต์แวร์หรือนักศึกษาอีกหลายท่านที่ยังมองว่า Git เป็นเรื่องที่เข้าใจยาก สับสน หรือเข้าถึงได้ยาก บทความนี้จึงตั้งใจเขียนขึ้นเพื่ออธิบายแนวคิดของ Git ให้เข้าใจง่ายที่สุด โดยเปรียบเทียบกับสิ่งที่เราคุ้นเคยกันดี เพื่อให้ทุกคนสามารถเริ่มต้นใช้งานได้อย่างมั่นใจครับ</p>

            <h2>ลองจินตนาการถึง "การเซฟเกม" (The Saving Game Analogy)</h2>
            <p>หากคุณเคยเล่นเกม คุณคงคุ้นเคยกับระบบเซฟเกมเป็นอย่างดี สมมติว่าคุณกำลังเล่นเกมแนวลุยด่านหรือ RPG เกมหนึ่ง แล้วคุณต้องผ่านด่านที่ยากมากๆ หรือกำลังจะเลือกตัดสินใจในเส้นทางสำคัญของเนื้อเรื่อง สิ่งที่คุณจะทำคืออะไรครับ? คำตอบคือ <strong>"การกดเซฟเกม"</strong></p>

            <div class="analogy-box">
                <h4 style="margin: 0 0 10px 0; color: var(--accent-green);">🎮 ระบบเซฟเกมทั่วไป vs ระบบเซฟเกมแบบ Git</h4>
                <p style="margin: 0;">
                    • <strong>การเซฟเกมทั่วไป:</strong> มักจะมีช่องเซฟ (Slot) ให้จำกัด หรือถ้าเรากด Quick Save มันก็จะเซฟทับไฟล์เดิมไปเรื่อยๆ ข้อเสียคือ หากเราเดินไปเจอทางตัน ไฟล์พัง หรือเล่นพลาดจนไอเทมสำคัญหายไป เราจะไม่สามารถย้อนเวลากลับไปยังจุดก่อนหน้านั้นได้เลย เพราะโดนเซฟใหม่ทับไปแล้ว<br><br>
                    • <strong>การเซฟเกมแบบ Git:</strong> ลองจินตนาการว่าคุณมี <strong>"ช่องเซฟที่สร้างได้ไม่จำกัด"</strong> ทุกครั้งที่คุณกดเซฟ Git จะไม่ทำการบันทึกทับของเดิม แต่จะสร้างจุดบันทึกใหม่ขึ้นมาต่อกันเป็นสาย โดยที่ย้อนกลับไปเล่น ณ จุดบันทึกใดๆ ในอดีตเมื่อไรก็ได้ แถมยังบอกด้วยว่า ณ เซฟนั้น คุณมีเลเวลเท่าไร หรือเปลี่ยนไอเทมชิ้นไหนไปบ้าง!
                </p>
            </div>

            <p>ในโลกของการเขียนโปรแกรมก็เช่นเดียวกันครับ หากเราไม่ใช้ระบบควบคุมเวอร์ชัน (Version Control System) เวลาเราแก้ไขโค้ด เรามักจะใช้วิธีก๊อปปี้โฟลเดอร์โปรเจกต์แล้วตั้งชื่อต่อท้ายไปเรื่อยๆ เช่น <code>project_final</code>, <code>project_final_v2</code>, <code>project_final_v3_real</code>, <code>project_final_v4_definitely_final</code> ซึ่งวิธีนี้เป็นวิธีที่อันตรายและสร้างความสับสนอย่างมากเมื่อต้องทำงานร่วมกันเป็นทีม</p>

            <div class="warning-box">
                <h4 style="margin: 0 0 8px 0; color: #ef4444;">⚠️ หายนะที่เกิดขึ้นเมื่อไม่ใช้ Version Control ในการเขียนโค้ด</h4>
                <ul style="margin: 0; padding-left: 20px; font-size: 0.95rem;">
                    <li><strong>ไฟล์ซ้ำซ้อนกระจัดกระจาย:</strong> สิ้นเปลืองพื้นที่จัดเก็บและแยกแยะไม่ออกว่าไฟล์ไหนคือเวอร์ชันล่าสุดที่ทำงานได้จริง</li>
                    <li><strong>ไม่รู้ว่าใครแก้ไขอะไร:</strong> เมื่อโค้ดพัง จะไม่สามารถตรวจสอบประวัติย้อนหลัง (History Log) ได้เลยว่าใครเป็นคนเขียนบรรทัดนี้ หรือแก้ไขเมื่อใด</li>
                    <li><strong>โค้ดชนกันเมื่อทำกลุ่ม:</strong> เมื่อเพื่อนส่งไฟล์โค้ดที่แก้เสร็จแล้วมาให้ เราต้องมานั่งไล่เปิดดูทีละบรรทัดเพื่อเอาโค้ดมารวมกันด้วยมือ (Manual Merge) ซึ่งเสี่ยงต่อการทำโค้ดของเพื่อนหรือของเราสูญหาย</li>
                </ul>
            </div>

            <h2>Git คืออะไร? (What is Git?)</h2>
            <p><strong>Git</strong> คือระบบควบคุมเวอร์ชันประเภทกระจายศูนย์ หรือเรียกว่า <strong>Distributed Version Control System (DVCS)</strong> หน้าที่ของมันคือคอยบันทึกประวัติการเปลี่ยนแปลงของไฟล์ต่างๆ ในโปรเจกต์ของเรา และที่เรียกว่ากระจายศูนย์ (Distributed) เพราะว่านักพัฒนาทุกคนที่ร่วมโปรเจกต์จะมีคลังข้อมูล (Repository) ฉบับสมบูรณ์เก็บไว้ที่เครื่องของตัวเอง ไม่ได้พึ่งพาเพียงแค่เซิร์ฟเวอร์ส่วนกลางอย่างเดียว</p>

            <h2>3 สถานะสำคัญในวงจรการทำงานของ Git</h2>
            <p>ก่อนจะไปเริ่มพิมพ์คำสั่ง เราต้องเข้าใจก่อนว่าใน Git จะแบ่งพื้นที่การทำงานของไฟล์ออกเป็น 3 โซน (Three States) หลักๆ ดังนี้ครับ:</p>

            <div style="background: #111827; padding: 20px; border-radius: 8px; border: 1px solid var(--border-color); margin-bottom: 25px;">
                <ol class="step-list" style="margin: 0;">
                    <li><strong>Working Directory (พื้นที่ทำงาน):</strong> โฟลเดอร์โปรเจกต์บนเครื่องคอมพิวเตอร์ของเราที่เราเปิดแก้ไขไฟล์โค้ดตามปกติ สถานะของไฟล์ที่เพิ่งสร้างหรือแก้ในนี้จะเรียกว่า <em>Modified</em> หรือ <em>Untracked</em></li>
                    <li><strong>Staging Area (พื้นที่เตรียมจัดเก็บ):</strong> เป็นเหมือนกล่องพักของ หรือจุดเตรียมตัว เราจะเลือกเฉพาะไฟล์ที่แก้ไขเสร็จเรียบร้อยและพร้อมจะทำการบันทึกประวัติย้อนหลังเข้ามาไว้ในโซนนี้ก่อน สถานะนี้เรียกว่า <em>Staged</em></li>
                    <li><strong>Local Repository (คลังเก็บข้อมูลในเครื่อง):</strong> เมื่อเรามั่นใจแล้ว เราจะสั่งบันทึกประวัติถาวรลงฐานข้อมูลของ Git ในเครื่อง ไฟล์ที่ถูกบันทึกเรียบร้อยแล้วจะมีสถานะเป็น <em>Committed</em></li>
                </ol>
            </div>

            <h2>ชุดคำสั่งพื้นฐานที่ใช้ในการทำโปรเจกต์จริง</h2>
            <p>เพื่อให้เห็นภาพขั้นตอนการเปลี่ยนผ่านของสถานะไฟล์ตามแนวคิดด้านบน เรามาทำความรู้จักกับชุดคำสั่ง Git พื้นฐานเรียงตามลำดับการใช้งานจริงกันครับ:</p>

            <h3>1. สั่งเปิดระบบให้โฟลเดอร์รู้จัก Git</h3>
            <p>เมื่อเราสร้างโฟลเดอร์โปรเจกต์ใหม่ขึ้นมา มันจะยังเป็นแค่โฟลเดอร์ธรรมดา เราต้องสั่งให้ Git เข้ามาควบคุมดูแลด้วยคำสั่ง:</p>
            <pre><code>git init</code></pre>
            <p class="text-muted" style="font-size: 0.9rem; margin-top: -10px;">*คำสั่งนี้จะสร้างโฟลเดอร์ลับชื่อ <code>.git</code> ขึ้นมาในโปรเจกต์เพื่อใช้เก็บประวัติทั้งหมด</p>

            <h3>2. ตรวจสอบสถานะการเปลี่ยนแปลง</h3>
            <p>ไม่ว่าเราจะเพิ่ม ลบ หรือแก้ไขไฟล์ใดๆ เราสามารถเช็กดูสภาวะปัจจุบันของพื้นที่ทำงานได้ตลอดเวลาด้วยคำสั่ง:</p>
            <pre><code>git status</code></pre>

            <h3>3. ย้ายไฟล์เข้าสู่พื้นที่เตรียมจัดเก็บ (Staging Area)</h3>
            <p>เมื่อแก้ไขไฟล์เสร็จแล้ว และต้องการจะเตรียมเซฟ ให้ระบุชื่อไฟล์ส่งเข้าตระกร้า Staging:</p>
            <pre><code>git add index.php <span class="code-comment"># เลือกเพิ่มเฉพาะไฟล์ index.php</span>
git add .         <span class="code-comment"># หรือพิมพ์จุด (.) เพื่อเพิ่มไฟล์ที่เปลี่ยนแปลงทั้งหมดในคราวเดียว</span></code></pre>

            <h3>4. กดเซฟบันทึกประวัติ (Commit)</h3>
            <p>นี่คือขั้นตอนการกด Save Slot ของจริง โดยเราต้องใส่ข้อความกำกับสั้นๆ ทุกครั้ง เพื่ออธิบายว่าเซฟเวอร์ชันนี้เราแก้หรือเพิ่มฟีเจอร์อะไรลงไปบ้าง:</p>
            <pre><code>git commit -m "เพิ่มหน้าล็อกอินระบบและปุ่มเข้าสู่บทเรียน"</code></pre>

            <h3>5. เปิดดูสมุดบันทึกประวัติย้อนหลัง</h3>
            <p>หากเราต้องการย้อนดูรายการสิ่งที่เราเคยเซฟ (Commit) ไว้ทั้งหมดในอดีต รวมถึงดูว่าใครเป็นคนเซฟและเซฟเมื่อไร ให้ใช้คำสั่ง:</p>
            <pre><code>git log</code></pre>

            <h2>การทำงานร่วมกับคลังข้อมูลระยะไกล (Remote Repository)</h2>
            <p>คำสั่งทั้งหมดก่อนหน้านี้เป็นการทำงานภายในเครื่องคอมพิวเตอร์ของเราคนเดียว (Local) แต่ถ้าเราต้องทำโปรเจกต์กลุ่ม หรือส่งงานให้โฮสต์เซิร์ฟเวอร์ภายนอก เราจำเป็นต้องนำโปรเจกต์ไปฝากไว้บนคลาวด์ เช่น <strong>GitHub, GitLab หรือ Bitbucket</strong> ซึ่งเราเรียกว่า <strong>Remote Repository</strong></p>

            <h3>• การสำเนาโปรเจกต์จากคลาวด์มาลงเครื่อง</h3>
            <p>หากเพื่อนสร้างคลังโค้ดไว้บน GitHub แล้วเราต้องการดึงโค้ดทั้งหมดนั้นมาเริ่มต้นทำงานบนเครื่องตัวเอง ให้ใช้คำสั่งดาวน์โหลดสำเนาข้ามเน็ต:</p>
            <pre><code>git clone &lt;URLของคลังโค้ดบนGitHub&gt;</code></pre>

            <h3>• การส่งเซฟของเราขึ้นคลาวด์ส่วนกลาง (Push)</h3>
            <p>เมื่อเราทำการ <code>git commit</code> ในเครื่องตัวเองเสร็จแล้ว และต้องการอัปโหลดจุดเซฟนั้นส่งต่อไปให้เพื่อนๆ หรือเซิร์ฟเวอร์กลางได้รับรู้ ให้ใช้คำสั่ง:</p>
            <pre><code>git push origin main</code></pre>
            <p class="text-muted" style="font-size: 0.9rem; margin-top: -10px;">*<code>origin</code> หมายถึงที่อยู่ออนไลน์ระยะไกล และ <code>main</code> คือชื่อกิ่งสายงานหลัก</p>

            <h3>• การดึงอัปเดตจากคลาวด์ลงเครื่องตัวเอง (Pull)</h3>
            <p>ในกรณีที่เพื่อนในกลุ่มมีการแก้ไขโค้ดแล้วส่งขึ้น GitHub ไปก่อนหน้าเรา เราต้องสั่งดึงเวอร์ชันล่าสุดเหล่านั้นลงมาผสานรวมในเครื่องเราก่อนจะเริ่มเขียนโค้ดต่อ เพื่อป้องกันไม่ให้โค้ดล้าหลัง:</p>
            <pre><code>git pull origin main</code></pre>

            <h2>แนวคิดเรื่อง "กิ่งสายงาน" (Branching) : มัลติเวิร์สของโค้ด</h2>
            <p>ฟีเจอร์ที่ทรงพลังที่สุดของ Git ที่ทำให้นักพัฒนาทั่วโลกหลงรักคือเรื่อง <strong>Branch (กิ่ง)</strong> ลองจินตนาการว่าโปรเจกต์หลักที่รันใช้งานได้ปกติอยู่คือ "โลกเส้นเวลาหลัก" (Main Timeline) วันหนึ่งหัวหน้าทีมสั่งให้เราลองไปเขียนระบบทดลองจ่ายเงินแบบใหม่ ซึ่งเป็นฟีเจอร์ที่มีความเสี่ยงสูง หากเขียนไปแก้ไปบนเส้นเวลาหลักตรงๆ แล้วเกิดบั๊ก ระบบเดิมของลูกค้าอาจจะพังทันที</p>

            <p>Git แก้ปัญหานี้โดยการอนุญาตให้เรา <strong>"แตกกิ่ง (Branch)"</strong> แยกโลกคู่ขนานออกไปทำงานได้อย่างอิสระ โค้ดที่เราเขียนแก้บนกิ่งทดลองจะไม่ส่งผลกระทบใดๆ กับกิ่งหลักเลยแม้แต่บรรทัดเดียว!</p>

            <pre><code>git branch feature-payment   <span class="code-comment"># สร้างกิ่งใหม่ชื่อ feature-payment</span>
git switch feature-payment   <span class="code-comment"># สลับเข้าไปทำงานในโลกคู่ขนานกิ่งนั้น</span></code></pre>

            <p>เมื่อเราเขียนและทดสอบระบบจ่ายเงินจนมั่นใจ 100% แล้วว่าทำงานได้สมบูรณ์และไม่มีบั๊ก เราจึงค่อยสลับกลับมาที่กิ่งหลัก แล้วสั่ง <strong>"ผสานสายงาน (Merge)"</strong> เพื่อนำฟีเจอร์ใหม่นี้กลับเข้ามาลอมรวมเข้ากับโลกเส้นเวลาหลักอย่างปลอดภัย:</p>

            <pre><code>git switch main              <span class="code-comment"># สลับกลับมาที่กิ่งหลัก</span>
git merge feature-payment    <span class="code-comment"># รวมโค้ดจากกิ่งฟีเจอร์เข้ามาที่กิ่งหลัก</span></code></pre>

            <h2>สรุปภาพรวมบทเรียน (Key Takeaway)</h2>
            <p>การเข้าใจ Git ไม่ใช่เรื่องของการท่องจำชุดคำสั่งยาวๆ แต่เป็นเรื่องของการเข้าใจ <strong>"ภาพการไหลของข้อมูล"</strong> และสถานะของจุดเซฟ (Commit) ของเราครับ เมื่อนักศึกษามีหลักคิดที่ถูกต้องว่าไฟล์กำลังเคลื่อนย้ายจากเครื่องคอมพิวเตอร์เข้าสู่ตะกร้าเตรียมของ (Staging) สลักป้ายลงสมุดฝากเครื่อง (Local Repo) และซิงค์ขึ้นฟ้า (Remote Hosting) การใช้งานคำสั่ง Git ก็จะไม่ใช่เรื่องน่ากลัวอีกต่อไป และนี่คือจุดเริ่มต้นที่จะเปลี่ยนคุณให้ทำงานพัฒนาซอฟต์แวร์ได้อย่างมืออาชีพร่วมกันเป็นทีมครับ!</p>

            <div class="nav-footer">
                <a href="index.php" class="btn-back">⬅️ กลับหน้าโครงสร้างวิชา Git</a>
                <a href="unit01.php" class="btn-action">เข้าสู่บทเรียนหน่วยที่ 1 (DevOps & Collaboration) ➔</a>
            </div>

        </div>
    </div>

    <script src="../assets/js/script.js"></script>
</body>

</html>