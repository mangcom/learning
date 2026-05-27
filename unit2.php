<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน่วยที่ 2: Node.js และ Express.js Fundamentals</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <?php include 'components/navbar.php'; ?>

    <div class="page-header">
        <div class="container">
            <a href="index.php" class="back-link">⬅ กลับสู่หน้าหลักวิชา</a>
            <h2>หน่วยที่ 2: Node.js และ Express.js Fundamentals</h2>
            <p>สัปดาห์ที่ 2 | เวลาเรียน 5 ชั่วโมง (ทฤษฎี 1 ชม. ปฏิบัติ 4 ชม.)</p>
        </div>
    </div>

    <div class="container">
        <div class="single-layout">
            
            <section class="lesson-section">
                <div class="key-concept-box">
                    <strong>🎯 สารสำคัญ (Key Concepts)</strong>
                    <p>
                        การสร้าง Web API ที่มีประสิทธิภาพในสภาพแวดล้อมของ Node.js จำเป็นต้องพึ่งพาการบริหารจัดการแพ็กเกจผ่าน Node Package Manager (npm) เพื่อนำโมดูลภายนอกมาประยุกต์ใช้ นอกจากนี้ นักศึกษาต้องเข้าใจกลไกของ Express Routing ในการคัดแยกประเภทคำขอ (HTTP Methods) และการดึงข้อมูลจาก URL Parameters เพื่อส่งมอบข้อมูลกลับไปในรูปแบบมาตรฐาน JSON Response ซึ่งเป็นภาษากลางในการสื่อสารของซอฟต์แวร์ยุคปัจจุบัน
                    </p>
                </div>
            </section>

            <section class="lesson-section">
                <h3>🎯 จุดประสงค์การเรียนรู้ (Learning Objectives)</h3>
                <table class="grading-table" style="margin-top: 15px;">
                    <tr>
                        <th width="25%">โดเมนการเรียนรู้</th>
                        <th>รายละเอียดจุดประสงค์การเรียนรู้</th>
                    </tr>
                    <tr>
                        <td><strong>ด้านความรู้ (K)</strong></td>
                        <td>1. อธิบายโครงสร้างและหน้าที่ของไฟล์ <code>package.json</code> ได้ถูกต้อง<br>2. อธิบายหลักการทํางานของ Routing และรูปแบบของข้อมูล JSON ได้</td>
                    </tr>
                    <tr>
                        <td><strong>ด้านทักษะ (P)</strong></td>
                        <td>1. ใช้คําสั่ง npm ในการติดตั้งและจัดการไลบรารีได้<br>2. เขียนโค้ดแบ่งเส้นทางด้วย HTTP GET/POST และส่งค่ากลับเป็น JSON ได้</td>
                    </tr>
                    <tr>
                        <td><strong>ด้านเจตคติ (A)</strong></td>
                        <td>1. จัดระเบียบโครงสร้างโค้ด (Clean Code) ตามมาตรฐานการเขียนโปรแกรม<br>2. แสดงความกระตือรือร้นในการแก้ปัญหาโค้ด (Debugging)</td>
                    </tr>
                </table>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="lesson-section">
                <h3>📘 3. เนื้อหาทางทฤษฎีเชิงลึก (Theoretical Core)</h3>
                
                <h4 class="topic-title">เรื่องที่ 2.1: การจัดการแพ็กเกจด้วย npm และไฟล์ package.json</h4>
                <p>
                    <strong>npm (Node Package Manager)</strong> เป็นคลังเก็บซอฟต์แวร์โอเพนซอร์สที่ใหญ่ที่สุดในโลก เมื่อเราสร้างโปรเจกต์ คำสั่ง <code>npm init</code> จะสร้างไฟล์พิมพ์เขียวที่ชื่อว่า <code>package.json</code> เพื่อทำหน้าที่เป็นสมุดบันทึกว่าโปรเจกต์นี้ชื่ออะไร เวอร์ชันไหน และเรียกใช้ไลบรารีภายนอก (Dependencies) ตัวใดบ้าง ช่วยให้เราสามารถย้ายโปรเจกต์ไปรันที่เครื่องอื่นได้ง่ายโดยไม่ต้องก๊อปปี้โฟลเดอร์ <code>node_modules</code> ที่มีขนาดใหญ่ไปด้วย
                </p>

                <div class="img-wrapper">
                    <img src="assets/images/unit2-npm-flow.png" alt="npm Architecture Workflow" class="responsive-img">
                </div>
                
                <div class="analogy-box" style="border-left-color: #6366f1; background-color: #f5f3ff;">
                    <strong>💡 คู่มือการสร้างภาพ unit2-npm-flow.png</strong><br>
                    • 📁 <strong>ชื่อไฟล์ที่ต้องบันทึก:</strong> <code class="inline-code">assets/images/unit2-npm-flow.png</code><br>
                    • 🤖 <strong>AI Prompt (สำหรับ Midjourney / DALL-E 3):</strong> <br>
                    <small><i>"A flat 2D vector infographic diagram illustrating Node Package Manager (npm) workflow. On the left side: a cloud icon labeled 'npm Registry (Cloud Container)'. An arrow labeled 'npm install' points down to the right side: a local computer with a folder icon labeled 'node_modules' and a file icon labeled 'package.json'. Modern minimalist style, clean design, indigo and slate blue color palette, pure white background, isolated."</i></small><br>
                    • 📝 <strong>คำอธิบายภาษาไทยที่ครูควรนำไปเติมในภาพ:</strong> ฝั่งคลาวด์เขียนว่า "คลังเก็บแพ็กเกจส่วนกลาง", หัวลูกศรเขียนว่า "ดาวน์โหลดโมดูล", ฝั่งเครื่องคอมพิวเตอร์เขียนว่า "โฟลเดอร์โปรเจกต์ในเครื่องโลคอล"
                </div>

                <h4 class="topic-title">เรื่องที่ 2.2: กลไกของ Express Routing และ HTTP Methods</h4>
                <p>
                    <strong>Routing</strong> คือกระบวนการกำหนดทิศทางปลายทางของแอปพลิเคชันว่าจะให้ทำงานอย่างไรเมื่อได้รับคำขอ (Request) ตาม URL และ HTTP Method ที่กำหนด โดยสัปดาห์นี้จะเน้นย้ำ 2 ตัวหลัก:
                </p>
                <ul style="margin-left: 20px; padding: 10px 0;">
                    <li><strong>GET:</strong> ใช้สำหรับขอเรียกดูข้อมูลจาก Server (ห้ามแนบข้อมูลมาใน Body)</li>
                    <li><strong>POST:</strong> ใช้สำหรับส่งข้อมูลใหม่ไปบันทึกบน Server (นิยมแนบข้อมูลมาในรูปแบบ JSON Body)</li>
                </ul>

                <div class="img-wrapper">
                    <img src="assets/images/unit2-express-routing.png" alt="Express Routing Map" class="responsive-img">
                </div>

                <div class="analogy-box" style="border-left-color: #6366f1; background-color: #f5f3ff;">
                    <strong>💡 คู่มือการสร้างภาพ unit2-express-routing.png</strong><br>
                    • 📁 <strong>ชื่อไฟล์ที่ต้องบันทึก:</strong> <code class="inline-code">assets/images/unit2-express-routing.png</code><br>
                    • 🤖 <strong>AI Prompt:</strong> <br>
                    <small><i>"A clean minimalist 2D flowchart diagram showing Web API Routing concept. A main block representing 'Incoming HTTP Request' splits into three separate track arrows leading to three different endpoints: '/api/students' (GET method, green color theme), '/api/students' (POST method, blue color theme), and '/api/students/:id' (GET with parameter, orange color theme). Sharp vector art, professional tech style, white background."</i></small><br>
                    • 📝 <strong>คำอธิบายภาษาไทยที่ครูควรนำไปเติมในภาพ:</strong> ตรงจุดแยกเขียนว่า "ตัวคัดแยกเส้นทาง (Express Router)", ตรงจุดผลลัพธ์เขียนว่า "ฟังก์ชันประมวลผลตามเงื่อนไข"
                </div>

                <h4 class="topic-title">เรื่องที่ 2.3: โครงสร้างข้อมูลแบบ JSON Response สำหรับ Web API</h4>
                <p>
                    <strong>JSON (JavaScript Object Notation)</strong> คือรูปแบบการจัดเก็บและแลกเปลี่ยนข้อมูลที่มีน้ำหนักเบา อ่านเข้าใจง่ายทั้งมนุษย์และคอมพิวเตอร์ โครงสร้างประกอบด้วยคู่ของ <code class="inline-code">"Key": "Value"</code> การส่งข้อมูลกลับจากเซิร์ฟเวอร์ด้วยคำสั่ง <code>res.json()</code> ของ Express จะทำการแปลงออบเจกต์จาวาสคริปต์ให้กลายเป็นข้อความ JSON และตั้งค่า Header <code>Content-Type: application/json</code> ให้ระบบโดยอัตโนมัติ
                </p>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="lesson-section">
                <h3>🛠️ 4. ตัวอย่างการปฏิบัติการทีละขั้นตอน (Step-by-Step Walkthrough)</h3>
                <p>บทปฏิบัติการนี้จะพาเขียนระบบจำลอง API รายวิชาเรียนที่สามารถส่งข้อมูลคืนค่าเป็น JSON และรับค่า URL Parameter</p>
                
                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 1</div>
                    <div class="step-detail">
                        <strong>เตรียมไฟล์โค้ดดั้งเดิม</strong>
                        <p>สร้างไฟล์ชื่อ <code>app.js</code> ภายในโฟลเดอร์งาน และเรียกใช้โครงสร้าง Express พื้นฐาน:</p>
                        <pre>
const express = require('express');
const app = express();
const PORT = 5000;

// อนุญาตให้ระบบอ่านข้อมูลแบบ JSON ได้
app.use(express.json());</pre>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 2</div>
                    <div class="step-detail">
                        <strong>การเขียน Route เพื่อส่งข้อมูลคืนค่าเป็น JSON Array</strong>
                        <p>เขียนฟังก์ชันจำลองข้อมูลรายวิชาในรูปแบบ Array Object แล้วส่งกลับด้วย <code>res.json()</code>:</p>
                        <pre>
const courses = [
    { id: 1, title: 'Back-End Dev', code: '31901-2005' },
    { id: 2, title: 'Front-End Dev', code: '31901-2004' }
];

app.get('/api/courses', (req, res) => {
    res.json({
        success: true,
        data: courses
    });
});</pre>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 3</div>
                    <div class="step-detail">
                        <strong>การเขียน Route รับค่า Parameter (ดึงข้อมูลเฉพาะรายการ)</strong>
                        <p>ใช้ตัวแปรแบบ Dynamic Dynamic Parameter <code class="inline-code">:id</code> มาช่วยในการค้นหาข้อมูลข้อมูล:</p>
                        <pre>
app.get('/api/courses/:id', (req, res) => {
    const courseId = parseInt(req.params.id);
    const course = courses.find(c => c.id === courseId);

    if (!course) {
        return res.status(404).json({ success: false, message: 'ไม่พบข้อมูลวิชานี้' });
    }
    res.json({ success: true, data: course });
});

app.listen(PORT, () => console.log(`รันระบบที่พอร์ต ${PORT}`));</pre>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 4</div>
                    <div class="step-detail">
                        <strong>ทดสอบระบบผ่าน Postman</strong>
                        <p>เปิดโปรแกรม Postman ยิงทดสอบแบบ <code>GET</code> ไปที่ลิงก์ <code>http://localhost:5000/api/courses/1</code></p>
                    </div>
                </div>

                <div class="img-wrapper">
                    <img src="assets/images/unit2-postman-result.png" alt="Postman JSON Response Testing" class="responsive-img">
                </div>

                <div class="analogy-box" style="border-left-color: #6366f1; background-color: #f5f3ff;">
                    <strong>💡 คู่มือการสร้างภาพ unit2-postman-result.png</strong><br>
                    • 📁 <strong>ชื่อไฟล์ที่ต้องบันทึก:</strong> <code class="inline-code">assets/images/unit2-postman-result.png</code><br>
                    • 🤖 <strong>วิธีสร้างภาพ:</strong> ภาพนี้แนะนำให้คุณครูเปิดโปรแกรม Postman จริงหลังจากเขียนโค้ดตามขั้นตอนเสร็จแล้ว ทำการยิงคำขอและก๊อปปี้หรือแคปเจอร์ภาพส่วนที่เป็นผลลัพธ์สีเขียว (200 OK) และโครงสร้าง JSON สีสันสดใสในจอด้านล่างมาตัดครอปให้สวยงามได้เลยครับ จะได้รูปภาพที่ตรงกับความจริง 100% ครับ
                </div>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="assignment-box">
                <h3>📝 5. งานที่มอบหมายและเกณฑ์การประเมินผล (Assignment)</h3>
                <p><strong>ใบงานที่ 2: การออกแบบและสร้างระบบให้บริการ JSON ข้อมูลนักศึกษา</strong></p>
                <br>
                <p><strong>โจทย์งานปฏิบัติ:</strong></p>
                <ul style="margin-left: 20px;">
                    <li>ให้นักศึกษาจำลองข้อมูล Array ของนักศึกษาขึ้นมาอย่างน้อย 3 คน (ประกอบด้วย id, name, gpa)</li>
                    <li>สร้างเส้นทาง <code>GET /api/students</code> สำหรับขอดูข้อมูลนักศึกษาทั้งหมด</li>
                    <li>สร้างเส้นทาง <code>GET /api/students/:id</code> สำหรับค้นหาและดึงข้อมูลเฉพาะนักศึกษาคนนั้นๆ ออกมาแสดงผล หากไม่พบให้ส่ง Status 404 และ JSON แจ้งเตือนข้อผิดพลาด</li>
                </ul>
                
                <br>
                <p><strong>📊 เกณฑ์การประเมินผล (คะแนนเต็ม 5 คะแนน):</strong></p>
                <table class="grading-table" style="background: rgba(255,255,255,0.5);">
                    <tr><td>การใช้คำสั่ง <code>res.json()</code> และจัดรูปแบบ JSON โครงสร้างถูกต้อง</td><td><strong>2 คะแนน</strong></td></tr>
                    <tr><td>การจัดการ Dynamic Routing และ Parameter (<code>req.params</code>)</td><td><strong>1.5 คะแนน</strong></td></tr>
                    <tr><td>การคืนค่า HTTP Status Code ที่เหมาะสม (200 และ 404)</td><td><strong>1.5 คะแนน</strong></td></tr>
                </table>
            </section>

        </div>
    </div>

    <script src="assets/js/script.js"></script>
</body>
</html>