// คลิกรูปประกอบบทเรียน (figure.custom-image-box img) เพื่อดูภาพขยายใน Modal
// และเลื่อนไปรูปก่อนหน้า/ถัดไปตามลำดับในหน้าได้
(function () {
  const images = Array.from(document.querySelectorAll("figure.custom-image-box img"));
  if (images.length === 0) return;

  // สไตล์ฝังมากับสคริปต์ เพื่อให้ Modal แสดงถูกต้องแม้เบราว์เซอร์/เซิร์ฟเวอร์ยังแคช style.css เวอร์ชันเก่า
  const style = document.createElement("style");
  style.textContent = "\n/* ─── IMAGE LIGHTBOX (คลิกรูปประกอบเพื่อขยาย ใช้คู่กับ assets/js/lightbox.js) ─── */\r\nfigure.custom-image-box img {\r\n  cursor: zoom-in;\r\n}\r\n\r\nfigure.custom-image-box img:focus-visible {\r\n  outline: 3px solid var(--primary);\r\n  outline-offset: 3px;\r\n}\r\n\r\nbody.lb-open {\r\n  overflow: hidden;\r\n}\r\n\r\n.img-lightbox {\r\n  position: fixed;\r\n  inset: 0;\r\n  z-index: 3000;\r\n  background: rgba(15, 23, 42, 0.94);\r\n  display: flex;\r\n  align-items: center;\r\n  justify-content: center;\r\n  padding: 60px 80px 24px;\r\n  /* ให้การปัดซ้าย-ขวาเป็นการเลื่อนรูป ไม่ใช่คำสั่งย้อนหน้าของเบราว์เซอร์ */\r\n  touch-action: pan-y pinch-zoom;\r\n  overscroll-behavior: contain;\r\n}\r\n\r\n.img-lightbox[hidden] {\r\n  display: none;\r\n}\r\n\r\n.lb-stage {\r\n  margin: 0;\r\n  display: flex;\r\n  flex-direction: column;\r\n  align-items: center;\r\n}\r\n\r\n.lb-img {\r\n  display: block;\r\n  width: auto;\r\n  height: auto;\r\n  max-width: calc(100vw - 160px);\r\n  max-height: calc(100vh - 160px);\r\n  background: var(--white);\r\n  border-radius: 8px;\r\n  box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5);\r\n}\r\n\r\n.lb-caption {\r\n  margin-top: 14px;\r\n  max-width: 900px;\r\n  color: #e2e8f0;\r\n  font-size: 0.9rem;\r\n  line-height: 1.5;\r\n  text-align: center;\r\n}\r\n\r\n.lb-counter {\r\n  display: inline-block;\r\n  margin-right: 8px;\r\n  padding: 2px 10px;\r\n  border-radius: 999px;\r\n  background: #334155;\r\n  color: var(--white);\r\n  font-size: 0.8rem;\r\n  font-weight: 700;\r\n}\r\n\r\n.lb-close,\r\n.lb-nav {\r\n  position: absolute;\r\n  border: 0;\r\n  border-radius: 50%;\r\n  background: rgba(255, 255, 255, 0.12);\r\n  color: var(--white);\r\n  cursor: pointer;\r\n  line-height: 1;\r\n  transition: background 0.2s ease;\r\n}\r\n\r\n.lb-close:hover,\r\n.lb-nav:hover:not(:disabled) {\r\n  background: rgba(255, 255, 255, 0.28);\r\n}\r\n\r\n.lb-close:focus-visible,\r\n.lb-nav:focus-visible {\r\n  outline: 3px solid #93c5fd;\r\n  outline-offset: 2px;\r\n}\r\n\r\n.lb-close {\r\n  top: 12px;\r\n  right: 16px;\r\n  width: 44px;\r\n  height: 44px;\r\n  font-size: 1.3rem;\r\n}\r\n\r\n.lb-nav {\r\n  top: 50%;\r\n  transform: translateY(-50%);\r\n  width: 54px;\r\n  height: 54px;\r\n  font-size: 2.2rem;\r\n  padding-bottom: 4px;\r\n}\r\n\r\n.lb-prev {\r\n  left: 14px;\r\n}\r\n\r\n.lb-next {\r\n  right: 14px;\r\n}\r\n\r\n.lb-nav:disabled {\r\n  opacity: 0.25;\r\n  cursor: default;\r\n}\r\n\r\n.lb-img.lb-from-right {\r\n  animation: lbFromRight 0.25s ease;\r\n}\r\n\r\n.lb-img.lb-from-left {\r\n  animation: lbFromLeft 0.25s ease;\r\n}\r\n\r\n.lb-img.lb-zoom {\r\n  animation: lbZoom 0.2s ease;\r\n}\r\n\r\n@keyframes lbFromRight {\r\n  from { opacity: 0; transform: translateX(40px); }\r\n  to { opacity: 1; transform: none; }\r\n}\r\n\r\n@keyframes lbFromLeft {\r\n  from { opacity: 0; transform: translateX(-40px); }\r\n  to { opacity: 1; transform: none; }\r\n}\r\n\r\n@keyframes lbZoom {\r\n  from { opacity: 0; transform: scale(0.96); }\r\n  to { opacity: 1; transform: none; }\r\n}\r\n\r\n@media (prefers-reduced-motion: reduce) {\r\n  .lb-img {\r\n    animation: none !important;\r\n  }\r\n}\r\n\r\n@media (max-width: 640px) {\r\n  .img-lightbox {\r\n    padding: 60px 8px 84px;\r\n  }\r\n\r\n  .lb-img {\r\n    max-width: calc(100vw - 16px);\r\n    max-height: calc(100vh - 210px);\r\n  }\r\n\r\n  .lb-nav {\r\n    top: auto;\r\n    bottom: 16px;\r\n    transform: none;\r\n  }\r\n}\n";
  document.head.appendChild(style);

  const modal = document.createElement("div");
  modal.className = "img-lightbox";
  modal.hidden = true;
  modal.setAttribute("role", "dialog");
  modal.setAttribute("aria-modal", "true");
  modal.setAttribute("aria-label", "ภาพขยาย");
  modal.innerHTML =
    '<button type="button" class="lb-close" aria-label="ปิดภาพขยาย">✕</button>' +
    '<button type="button" class="lb-nav lb-prev" aria-label="ภาพก่อนหน้า">‹</button>' +
    '<figure class="lb-stage">' +
    '<img class="lb-img" alt="">' +
    '<figcaption class="lb-caption"><span class="lb-counter"></span><span class="lb-text"></span></figcaption>' +
    "</figure>" +
    '<button type="button" class="lb-nav lb-next" aria-label="ภาพถัดไป">›</button>';
  document.body.appendChild(modal);

  const stage = modal.querySelector(".lb-stage");
  const bigImg = modal.querySelector(".lb-img");
  const counter = modal.querySelector(".lb-counter");
  const captionText = modal.querySelector(".lb-text");
  const closeBtn = modal.querySelector(".lb-close");
  const prevBtn = modal.querySelector(".lb-prev");
  const nextBtn = modal.querySelector(".lb-next");

  let current = 0;

  function captionOf(img) {
    const caption = img.closest("figure").querySelector("figcaption");
    if (!caption) return img.alt;
    const copy = caption.cloneNode(true);
    copy.querySelectorAll(".image-source").forEach((el) => el.remove());
    return copy.textContent.replace(/\s+/g, " ").trim();
  }

  function show(index, direction) {
    current = index;
    const img = images[index];
    bigImg.src = img.currentSrc || img.src;
    bigImg.alt = img.alt;
    counter.textContent = index + 1 + " / " + images.length;
    captionText.textContent = captionOf(img);
    prevBtn.disabled = index === 0;
    nextBtn.disabled = index === images.length - 1;

    bigImg.classList.remove("lb-from-left", "lb-from-right", "lb-zoom");
    void bigImg.offsetWidth; // เริ่มแอนิเมชันใหม่ทุกครั้งที่เปลี่ยนรูป
    bigImg.classList.add(direction === "next" ? "lb-from-right" : direction === "prev" ? "lb-from-left" : "lb-zoom");

    [images[index - 1], images[index + 1]].forEach((neighbor) => {
      if (neighbor) new Image().src = neighbor.currentSrc || neighbor.src;
    });
  }

  function open(index) {
    modal.hidden = false;
    document.body.classList.add("lb-open");
    show(index);
    closeBtn.focus();
  }

  function close() {
    modal.hidden = true;
    document.body.classList.remove("lb-open");
    images[current].focus(); // กลับมาที่รูปล่าสุดที่ดูอยู่ ไม่ใช่รูปแรกที่คลิก
  }

  const goPrev = () => current > 0 && show(current - 1, "prev");
  const goNext = () => current < images.length - 1 && show(current + 1, "next");

  images.forEach((img, index) => {
    img.tabIndex = 0;
    img.title = "คลิกเพื่อดูภาพขยาย";
    img.addEventListener("click", () => open(index));
    img.addEventListener("keydown", (event) => {
      if (event.key === "Enter" || event.key === " ") {
        event.preventDefault();
        open(index);
      }
    });
  });

  closeBtn.addEventListener("click", close);
  prevBtn.addEventListener("click", goPrev);
  nextBtn.addEventListener("click", goNext);

  // คลิกพื้นที่ว่างรอบภาพเพื่อปิด
  modal.addEventListener("click", (event) => {
    if (event.target === modal || event.target === stage) close();
  });

  document.addEventListener("keydown", (event) => {
    if (modal.hidden) return;
    if (event.key === "Escape") close();
    else if (event.key === "ArrowLeft") goPrev();
    else if (event.key === "ArrowRight") goNext();
    else if (event.key === "Tab") {
      // วนโฟกัสเฉพาะปุ่มภายใน Modal
      const buttons = [closeBtn, prevBtn, nextBtn].filter((b) => !b.disabled);
      const position = buttons.indexOf(document.activeElement);
      const nextPosition = event.shiftKey
        ? (position <= 0 ? buttons.length : position) - 1
        : (position + 1) % buttons.length;
      event.preventDefault();
      buttons[nextPosition].focus();
    }
  });

  // ปัดซ้าย/ขวาบนจอสัมผัส
  let touchStartX = null;
  modal.addEventListener("touchstart", (event) => {
    touchStartX = event.touches[0].clientX;
  }, { passive: true });
  modal.addEventListener("touchend", (event) => {
    if (touchStartX === null) return;
    const deltaX = event.changedTouches[0].clientX - touchStartX;
    touchStartX = null;
    if (deltaX > 50) goPrev();
    else if (deltaX < -50) goNext();
  });
})();
