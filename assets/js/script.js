// script.js
document.addEventListener("DOMContentLoaded", () => {
  const mobileMenuBtn = document.getElementById("mobile-menu-btn");
  const navMenuList = document.getElementById("nav-menu-list");
  const navLinks = document.querySelectorAll(".nav-link");

  // 1. จัดการเปิด/ปิดเมนูบน Mobile
  mobileMenuBtn.addEventListener("click", () => {
    mobileMenuBtn.classList.toggle("active");
    navMenuList.classList.toggle("active");
  });

  // 2. เมื่อกดลิงก์เมนูใน Mobile ให้ทำการปิดแถบเมนูอัตโนมัติ
  navLinks.forEach((link) => {
    link.addEventListener("click", () => {
      if (navMenuList.classList.contains("active")) {
        mobileMenuBtn.classList.remove("active");
        navMenuList.classList.remove("active");
      }
    });
  });

  // 3. Optional: ทำให้เปิด Accordion (<details>) ได้แค่ทีละอันเดียว (ช่วยให้อ่านบนมือถือง่ายขึ้น)
  const detailsElements = document.querySelectorAll("details");
  detailsElements.forEach((targetDetails) => {
    targetDetails.addEventListener("toggle", () => {
      if (targetDetails.open) {
        detailsElements.forEach((localDetails) => {
          if (localDetails !== targetDetails) {
            localDetails.open = false;
          }
        });
      }
    });
  });
});

// script.js
document.addEventListener("DOMContentLoaded", () => {
  const mobileMenuBtn = document.getElementById("mobile-menu-btn");
  const navMenuList = document.getElementById("nav-menu-list");

  if (mobileMenuBtn && navMenuList) {
    mobileMenuBtn.addEventListener("click", () => {
      mobileMenuBtn.classList.toggle("active");
      navMenuList.classList.toggle("active");
    });
  }
});

// ฟังก์ชันสำหรับปุ่ม Copy Code (เวอร์ชันไอคอน)
function copyCode(button) {
  // 1. หากล่อง <pre> ที่อยู่ใน .code-window เดียวกันกับปุ่มที่กด
  const codeWindow = button.closest(".code-window");
  const preElement = codeWindow.querySelector("pre");
  const codeText = preElement.innerText;

  // 2. คัดลอกข้อความลงคลิปบอร์ด
  navigator.clipboard
    .writeText(codeText)
    .then(() => {
      // เช็กก่อนว่ามีข้อความเก่าค้างอยู่ไหม ถ้ามีให้ลบออกก่อนเพื่อเริ่มเล่นแอนิเมชันใหม่
      const oldToast = codeWindow.querySelector(".copy-toast");
      if (oldToast) oldToast.remove();

      // 3. สร้างข้อความ "คัดลอกสำเร็จแล้ว" ขึ้นมาแบบ Dynamic
      const toast = document.createElement("span");
      toast.className = "copy-toast";
      toast.innerText = "คัดลอกสำเร็จแล้ว ✨";

      // 4. แทรกข้อความเข้าไปในแถบหัวเรื่อง (วางไว้ข้างหน้าปุ่ม Copy)
      button.parentNode.insertBefore(toast, button);

      // 5. ตั้งเวลาให้ลบข้อความนี้ทิ้งหลังจากผ่านไป 1 วินาที (1000ms) พอดีกับแอนิเมชันจางหาย
      setTimeout(() => {
        toast.remove();
      }, 1000);
    })
    .catch((err) => {
      console.error("เกิดข้อผิดพลาดในการคัดลอก: ", err);
    });
}
