<?php
// ตรวจสอบระยะโฟลเดอร์เริ่มต้น (หากหน้าหลักไม่ได้ประกาศไว้ ให้เป็นโฟลเดอร์รูท)
if (!isset($base_dir)) {
    $base_dir = "./";
}
if (!isset($active_nav)) {
    $active_nav = "";
}
?>
<style>
    .main-navbar a:hover {
        color: #3b82f6 !important;
    }

    /* โครงสร้างหลักของเมนู Dropdown รายวิชา */
    .dropdown-menu-item {
        position: relative;
        display: inline-block;
    }

    /* สไตล์กล่องรายการวิชาที่จะคลี่ลงมา (ซ่อนไว้เริ่มต้น) */
    .dropdown-course-list {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        background-color: #0f172a;
        min-width: 320px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.3);
        border: 1px solid #1e293b;
        border-top: 3px solid #2563eb;
        border-radius: 0 0 8px 8px;
        padding: 8px 0;
        margin: 0;
        list-style: none;
        z-index: 2000;
    }

    /* รายการย่อยแต่ละตัวใน List */
    .dropdown-course-list li a {
        display: block;
        padding: 10px 20px !important;
        color: #94a3b8 !important;
        font-size: 0.9rem !important;
        font-weight: 500 !important;
        text-decoration: none;
        transition: all 0.2s ease;
    }

    /* เมื่อเมาส์ชี้ที่เมนูย่อยให้เปลี่ยนไฮไลต์พื้นหลังและข้อความ */
    .dropdown-course-list li a:hover {
        background-color: #1e293b;
        color: #fff !important;
        padding-left: 25px !important;
        /* ดันตัวหนังสือไปขวาเล็กน้อยเพิ่มมิติ */
    }

    /* สั่งให้คลี่กล่องเมนูออกมาเมื่อมีการ Hover ที่ปุ่มเมนูหลัก */
    .dropdown-menu-item:hover .dropdown-course-list {
        display: block;
    }

    /* ตกแต่งสัญลักษณ์หัวลูกศรชี้ลง */
    .arrow-down {
        display: inline-block;
        font-size: 0.75rem;
        margin-left: 3px;
        transition: transform 0.2s;
    }

    .dropdown-menu-item:hover .arrow-down {
        transform: rotate(180deg);
        /* หมุนหัวลูกศรกลับขึ้นเมื่อคลี่เมนู */
    }
</style>

<nav class="navbar main-navbar" style="background: #0f172a; padding: 15px 0; border-bottom: 3px solid #2563eb; font-family: 'Sarabun', sans-serif; position: fixed; top: 0; left: 0; width: 100%; z-index: 1000;">
    <div class="container" style="display: flex; justify-content: space-between; align-items: center; max-width: 1200px; margin: 0 auto; padding: 0 15px;">

        <a href="<?php echo $base_dir; ?>index.php" style="color: #fff; text-decoration: none; font-weight: 700; font-size: 1.2rem; display: flex; align-items: center; gap: 8px;">
            🎓ระบบจัดการแผนการเรียนรู้ <span style="font-size: 0.85rem; background: #2563eb; padding: 2px 8px; border-radius: 4px; font-weight: 400;">ปวส. IT</span>
        </a>

        <ul style="list-style: none; display: flex; gap: 25px; margin: 0; padding: 0; align-items: center;">

            <li>
                <a href="<?php echo $base_dir; ?>index.php"
                    style="color: <?php echo ($active_nav == 'home') ? '#3b82f6' : '#94a3b8'; ?>; text-decoration: none; font-size: 0.95rem; font-weight: 600; transition: color 0.2s;">
                    🏠 รายวิชาทั้งหมด
                </a>
            </li>

            <li class="dropdown-menu-item">
                <a href="#" style="color: <?php echo ($active_nav != 'home' && $active_nav != '') ? '#3b82f6' : '#94a3b8'; ?>; text-decoration: none; font-size: 0.95rem; font-weight: 600; padding: 5px 0; display: flex; align-items: center;">
                    📚 รายชื่อวิชาในระบบ <span class="arrow-down">▼</span>
                </a>

                <ul class="dropdown-course-list">
                    <li>
                        <a href="<?php echo $base_dir; ?>server/index.php" style="<?php echo ($active_nav == 'server') ? 'color: #fff !important; font-weight: bold;' : ''; ?>">
                            🖥️ ระบบปฏิบัติการเครื่องแม่ข่าย
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $base_dir; ?>frontend/index.php" style="<?php echo ($active_nav == 'frontend') ? 'color: #fff !important; font-weight: bold;' : ''; ?>">
                            🎨 การพัฒนาซอฟต์แวร์ด้วยเทคโนโลยี Front-End
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $base_dir; ?>backend/index.php" style="<?php echo ($active_nav == 'backend') ? 'color: #fff !important; font-weight: bold;' : ''; ?>">
                            💻 การพัฒนาซอฟต์แวร์ด้วยเทคโนโลยี Back-End
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $base_dir; ?>network/index.php" style="<?php echo ($active_nav == 'network') ? 'color: #fff !important; font-weight: bold;' : ''; ?>">
                            🌐 การบริหารจัดการเครือข่าย
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo $base_dir; ?>devops/index.php" style="<?php echo ($active_nav == 'devops') ? 'color: #fff !important; font-weight: bold;' : ''; ?>">
                            ♾️ การพัฒนาซอฟต์แวร์รูปแบบเดฟออฟส์
                        </a>
                    </li>
                </ul>
            </li>

        </ul>

    </div>
</nav>