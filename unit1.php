<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน่วยที่ 1: Introduction to Back-End Development</title>
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
            <h2>หน่วยที่ 1: Introduction to Back-End Development</h2>
            <p>สัปดาห์ที่ 1 | เวลาเรียน 5 ชั่วโมง (ทฤษฎี 1 ชม. ปฏิบัติ 4 ชม.)</p>
        </div>
    </div>

    <div class="container">
        <div class="single-layout">

            <section class="lesson-section">
                <div class="key-concept-box">
                    <strong>🎯 สารสำคัญ (Key Concepts)</strong>
                    <p>
                        การพัฒนาซอฟต์แวร์ฝั่งเซิร์ฟเวอร์ (Back-End Development) คือหัวใจหลักในการควบคุมสถาปัตยกรรมข้อมูล ความปลอดภัย และตรรกะทางธุรกิจ (Business Logic) การเข้าใจสถาปัตยกรรมแบบ Client-Server กลไกการรับส่งข้อมูลผ่านโปรโตคอล HTTP และบทบาทของ API จะช่วยให้นักศึกษาสามารถออกแบบระบบบริการข้อมูลที่มีประสิทธิภาพ มั่นคงปลอดภัย และรองรับการขยายตัวในอนาคตได้ตามมาตรฐานอุตสาหกรรม
                    </p>
                </div>
            </section>

            <section class="lesson-section">
                <h3>🎯 จุดประสงค์การเรียนรู้ (Learning Objectives)</h3>
                <p>เมื่อนักศึกษาเรียนจบหน่วยการเรียนรู้นี้แล้ว จะมีความรู้ความสามารถดังนี้:</p>
                <table class="grading-table" style="margin-top: 15px;">
                    <tr>
                        <th width="25%">โดเมนการเรียนรู้</th>
                        <th>รายละเอียดจุดประสงค์การเรียนรู้</th>
                    </tr>
                    <tr>
                        <td><strong>ด้านความรู้ (Knowledge - K)</strong></td>
                        <td>1. สามารถอธิบายความแตกต่างระหว่าง Front-End และ Back-End ได้ถูกต้อง<br>2. สามารถอธิบายหลักการทำงานของ Client-Server Architecture และ HTTP Protocol ได้</td>
                    </tr>
                    <tr>
                        <td><strong>ด้านทักษะ (Practice - P)</strong></td>
                        <td>1. สามารถติดตั้งสภาพแวดล้อมสำหรับการพัฒนา Node.js ได้อย่างถูกต้อง<br>2. สามารถเขียนโค้ดเพื่อสร้าง Web Server เบื้องต้นและทดสอบผ่าน Postman ได้</td>
                    </tr>
                    <tr>
                        <td><strong>ด้านเจตคติ (Attitude - A)</strong></td>
                        <td>1. ปฏิบัติงานด้วยความละเอียดรอบคอบในการตั้งค่าระบบและตรวจสอบข้อผิดพลาด<br>2. มีความรับผิดชอบในการส่งมอบงานตรงต่อเวลา</td>
                    </tr>
                </table>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="lesson-section">
                <h3>📘 3. เนื้อหาทางทฤษฎีเชิงลึก (Theoretical Core)</h3>

                <h4 class="topic-title">เรื่องที่ 1.1: ความแตกต่างระหว่าง Front-End และ Back-End</h4>
                <p>
                    ในระบบเว็บแอปพลิเคชันยุคปัจจุบัน การทำงานจะถูกแยกออกเป็นสองส่วนเพื่อความเป็นอิสระในการพัฒนาและการสเกลระบบ (Decoupled Architecture)
                </p>
                <table class="grading-table" style="margin: 15px 0;">
                    <tr style="background:#f1f5f9;">
                        <th>คุณลักษณะ</th>
                        <th>Front-End (Client-Side)</th>
                        <th>Back-End (Server-Side)</th>
                    </tr>
                    <tr>
                        <td><strong>หน้าที่หลัก</strong></td>
                        <td>จัดการส่วนแสดงผล (UI) และประสบการณ์ผู้ใช้ (UX)</td>
                        <td>จัดการตรรกะระบบ (Logic), ฐานข้อมูล (Database) และความปลอดภัย</td>
                    </tr>
                    <tr>
                        <td><strong>เทคโนโลยีที่ใช้</strong></td>
                        <td>HTML5, CSS3, JavaScript (React, Vue, Angular)</td>
                        <td>Node.js, Express, Python, Java, PHP, MySQL, MongoDB</td>
                    </tr>
                </table>

                <h4 class="topic-title">เรื่องที่ 1.2: สถาปัตยกรรม Client-Server และกลไก Request-Response</h4>
                <p>
                    ระบบอินเทอร์เน็ตทำงานอยู่บนสถาปัตยกรรมแบบ <strong>Client-Server</strong> ซึ่งประกอบด้วยคอมพิวเตอร์สองฝั่งที่คุยกันผ่านข้อตกลงร่วมที่เรียกว่า โปรโตคอล (Protocol)
                </p>

                <div class="image-container">
                    <div>
                        <figure class="custom-image-box">
                            <img src="assets/images/client-server-diagram.png" alt="แผนภาพแสดงสถาปัตยกรรม Client-Server" class="responsive-img">
                            <figcaption class="image-caption">
                                <strong>รูปที่ 1.1:</strong> แผนภาพแสดงสถาปัตยกรรม Client-Server และวงจรการสื่อสารผ่านเครือข่ายด้วยโปรโตคอล HTTP
                                <span class="image-source">🔗 แหล่งอ้างอิงภาพ: ดัดแปลงตามมาตรฐานสากลจาก <a href="https://developer.mozilla.org/en-US/docs/Web/HTTP/Overview" target="_blank">MDN Web Docs</a></span>
                            </figcaption>
                        </figure>
                    </div>
                </div>

                <blockquote>
                    <strong>💡 เจาะลึกทางทฤษฎี:</strong><br>
                    • <strong>HTTP Request</strong> ประกอบด้วย 3 ส่วนสำคัญคือ Request Line (Method, URL), Headers (ข้อมูล Metadata เช่น Content-Type) และ Blank Line ตามด้วย Body (ข้อมูลที่ส่งไป เช่น JSON Object)<br>
                    • <strong>HTTP Response</strong> ประกอบด้วย Status Line (เช่น 200 OK, 404 Not Found), Headers และ Response Body (ข้อมูลผลลัพธ์ที่ส่งกลับมาให้ผู้ใช้เห็น)
                </blockquote>

                <h4 class="topic-title">เรื่องที่ 1.3: ความหมายของ API และ RESTful API</h4>
                <p>
                    <strong>API (Application Programming Interface)</strong> คือประตูเชื่อมต่อที่จะเปิดให้โปรแกรมภายนอกเข้ามารับบริการข้อมูลตามสิทธิ์ที่กำหนด ส่วน <strong>REST (Representational State Transfer)</strong> คือสไตล์สถาปัตยกรรมเว็บที่ใช้ข้อกำหนดของ HTTP Methods (GET, POST, PUT, DELETE) ในการจัดการสถานะของทรัพยากร (Resources)
                </p>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="lesson-section">
                <h3>🛠️ 4. ตัวอย่างการปฏิบัติการทีละขั้นตอน (Step-by-Step Walkthrough)</h3>
                <p>ในบทปฏิบัติการนี้ นักศึกษาจะสร้าง Web Server ตัวแรกด้วย Node.js และ Express.js</p>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 1</div>
                    <div class="step-detail">
                        <strong>ตรวจสอบการติดตั้ง Node.js และ npm ภายในเครื่อง</strong>
                        <p>เปิด Terminal (PowerShell) ในโปรแกรม VS Code แล้วพิมพ์คำสั่งเช็กเวอร์ชัน:</p>
                        <div class="code-window">
                            <button class="copy-btn" onclick="copyCode(this)">📋 Copy</button>
                            <pre>node -v
npm -v</pre>
                        </div>

                        <div class="error-alert-box">
                            <span class="error-title">⚠️ เจอเออเรอร์ "File ... npm.ps1 cannot be loaded" หรือไม่?</span>
                            <p>ถ้านักศึกษาพิมพ์ <code>npm -v</code> หรือ <code>npm init</code> แล้วระบบขึ้นตัวหนังสือสีแดงเตือนเรื่อง <em>PSSecurityException / UnauthorizedAccess</em> แสดงว่าระบบความปลอดภัยของ Windows Script กำลังบล็อกการทำงานอยู่</p>

                            <div class="image-container">
                                <div>
                                    <figure class="custom-image-box">
                                        <img src="assets/images/PSSecurityExceptionError.png" alt="หน้าจอแสดงข้อผิดพลาดการทำงานของสคริปต์" class="responsive-img">
                                        <figcaption class="image-caption">
                                            <strong>รูปที่ 1.2:</strong> หน้าจอแสดงข้อผิดพลาดสิทธิ์การรันสคริปต์บน Windows PowerShell
                                            <span class="image-source">🔗 แหล่งอ้างอิงภาพ: ถ่ายจากหน้าจอการทำงานจริง</span>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>

                            <strong>🛠️ วิธีแก้ไข (ทำเพียงครั้งเดียว):</strong>
                            <ol style="margin-left: 20px; margin-top: 5px;">
                                <li>ให้คัดลอก (Copy) คำสั่งด้านล่างนี้ไปวางใน Terminal แล้วกด Enter:</li>
                                <pre style="background-color: #7f1d1d; color: #fecaca;">Set-ExecutionPolicy -ExecutionPolicy RemoteSigned -Scope CurrentUser</pre>
                                <li>ระบบจะถามเพื่อยืนยัน ให้พิมพ์ <kbd>Y</kbd> แล้วกด Enter</li>
                                <li>ลองพิมพ์คำสั่ง <code>npm -v</code> อีกครั้ง จะสามารถใช้งานได้ตามปกติครับ!</li>
                            </ol>

                            <div class="image-container">
                                <div>
                                    <figure class="custom-image-box">
                                        <img src="assets/images/node-npm-v.png" alt="การเช็คเวอร์ชัน Node.js และ npm" class="responsive-img">
                                        <figcaption class="image-caption">
                                            <strong>รูปที่ 1.3:</strong> หน้าจอแสดงการตรวจสอบเวอร์ชันของ Node.js และ npm หลังแก้ไขสิทธิ์สำเร็จ
                                            <span class="image-source">🔗 แหล่งอ้างอิงภาพ: ถ่ายจากหน้าจอการทำงานจริง</span>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 2</div>
                    <div class="step-detail">
                        <strong>การเริ่มสร้างโปรเจกต์และติดตั้ง Express Framework</strong>
                        <p>เมื่อแก้ระบบสิทธิ์การรันสคริปต์เรียบร้อยแล้ว ให้เริ่มสร้างโฟลเดอร์งานและขึ้นระบบด้วยคำสั่ง:</p>
                        <div class="code-window">
                            <button class="copy-btn" onclick="copyCode(this)">📋 Copy</button>
                            <pre>
mkdir backend-unit1
cd backend-unit1
npm init -y
npm install express</pre>
                        </div>


                        <div class="image-container">
                            <div>
                                <figure class="custom-image-box">
                                    <img src="assets/images/npm-init-i-express.png" alt="การติดตั้งแพ็กเกจด้วย npm" class="responsive-img">
                                    <figcaption class="image-caption">
                                        <strong>รูปที่ 1.4:</strong> หน้าจอแสดงการใช้คำสั่งเริ่มต้นโปรเจกต์และติดตั้งไลบรารี Express
                                        <span class="image-source">🔗 แหล่งอ้างอิงภาพ: ถ่ายจากหน้าจอการทำงานจริง</span>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 3</div>
                    <div class="step-detail">
                        <strong>การเขียนโค้ดสร้างเซิร์ฟเวอร์หลัก</strong>
                        <p>สร้างไฟล์ชื่อ <code>server.js</code> ด้วยโปรแกรม VS Code แล้วเขียนโค้ดโปรแกรมดังต่อไปนี้:</p>
                        <div class="code-window">
                            <button class="copy-btn" onclick="copyCode(this)">📋 Copy</button>
                            <pre>
// นำเข้าโมดูล Express
const express = require('express');
const app = express();
const PORT = 3000;

// สร้าง Route หน้าแรก (Root Route)
app.get('/', (req, res) => {
    res.send('เซิร์ฟเวอร์ย่อยหน่วยที่ 1 ทำงานได้สมบูรณ์แล้ว!');
});

// สั่งลูปเปิด Port รอรับข้อมูล
app.listen(PORT, () => {
    console.log(`เซิร์ฟเวอร์วิ่งเรียบร้อยบนระบบ http://localhost:${PORT}`);
});</pre>
                        </div>


                        <div class="image-container">
                            <div>
                                <figure class="custom-image-box">
                                    <img src="assets/images/u1-node-server.png" alt="ตัวอย่างการเขียนโค้ด server.js" class="responsive-img">
                                    <figcaption class="image-caption">
                                        <strong>รูปที่ 1.5:</strong> หน้าจอแสดงตัวอย่างการเขียนโค้ดเปิดใช้งานเซิร์ฟเวอร์ในไฟล์ server.js
                                        <span class="image-source">🔗 แหล่งอ้างอิงภาพ: ถ่ายจากหน้าจอการทำงานจริง</span>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="step-box">
                    <div class="step-num">ขั้นตอนที่ 4</div>
                    <div class="step-detail">
                        <strong>การรันและการทดสอบระบบด้วย Postman</strong>
                        <p>1. พิมพ์คำสั่งรันใน Terminal: <code>node server.js</code></p>
                        <p>2. เปิดแอปพลิเคชัน <strong>Postman</strong> เลือก Method <code>GET</code> กรอก URL <code>http://localhost:3000</code> แล้วกดปุ่ม <strong>Send</strong></p>
                    </div>
                </div>

                <div class="image-container">
                    <div>
                        <figure class="custom-image-box">
                            <img src="assets/images/localhost-3000.png" alt="ทดสอบเปิดระบบผ่านเบราว์เซอร์" class="responsive-img">
                            <figcaption class="image-caption">
                                <strong>รูปที่ 1.6:</strong> หน้าจอแสดงการเข้าสู่เว็บไซต์ผ่านเบราว์เซอร์ที่ http://localhost:3000
                                <span class="image-source">🔗 แหล่งอ้างอิงภาพ: ถ่ายจากหน้าจอการทำงานจริง</span>
                            </figcaption>
                        </figure>
                    </div>
                </div>

                <div class="image-container">
                    <div>
                        <figure class="custom-image-box">
                            <img src="assets/images/postman-localhost-3000.png" alt="ทดสอบยิง Request ผ่านโปรแกรม Postman" class="responsive-img">
                            <figcaption class="image-caption">
                                <strong>รูปที่ 1.7:</strong> หน้าจอแสดงผลลัพธ์การทดสอบยิง Request และรับค่า HTTP Status 200 OK ผ่านโปรแกรม Postman
                                <span class="image-source">🔗 แหล่งอ้างอิงภาพ: ถ่ายจากหน้าจอการทำงานจริง</span>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </section>

            <hr style="margin: 40px 0; border: 0; border-top: 1px dashed #cbd5e1;">

            <section class="assignment-box">
                <h3>📝 5. งานที่มอบหมายและเกณฑ์การประเมินผล (Assignment)</h3>
                <p><strong>ใบงานที่ 1: การประยุกต์และเพิ่ม Route ส่วนบุคคล</strong></p>
                <br>
                <p><strong>คำสั่ง:</strong></p>
                <ul style="margin-left: 20px;">
                    <li>ให้นักศึกษาเพิ่มเส้นทาง Route ใหม่ในไฟล์เดิมชื่อ <code class="inline-code">/profile</code></li>
                    <li>ภายใน Route นั้น ให้เขียนโปรแกรมส่งค่ากลับไปเป็นรูปแบบข้อความที่ระบุ <strong>ชื่อ-นามสกุล, รหัสประจำตัว, และระดับชั้น</strong> ของนักศึกษาเอง</li>
                    <li>ให้ทดสอบระบบผ่าน Postman และแคปเจอร์หน้าจอผลการรันเก็บเป็นไฟล์ภาพเพื่ออัปโหลดส่งในระบบควบคุมห้องเรียน</li>
                </ul>

                <br>
                <p><strong>📊 เกณฑ์การตัดคะแนน (คะแนนเต็ม 5 คะแนน):</strong></p>
                <ul style="margin-left: 20px; font-size: 0.9rem; color: #78350f;">
                    <li>• ความถูกต้องในการตั้งชื่อและโครงสร้าง Code Route (2 คะแนน)</li>
                    <li>• ความสำเร็จในการรันเซิร์ฟเวอร์โดยไม่มี Error ค้าง (1 คะแนน)</li>
                    <li>• หลักฐานภาพแคปเจอร์หน้าจอ Postman แสดงผลได้ถูกต้องตามโจทย์ (1 คะแนน)</li>
                    <li>• ความตรงต่อเวลาและความเป็นระเบียบของไฟล์งาน (1 คะแนน)</li>
                </ul>
            </section>

        </div>
    </div>

    <script src="assets/js/script.js"></script>
</body>

</html>