// คลิกรูปประกอบบทเรียน (figure.custom-image-box img) เพื่อดูภาพขยายใน Modal
// และเลื่อนไปรูปก่อนหน้า/ถัดไปตามลำดับในหน้าได้
(function () {
  const images = Array.from(document.querySelectorAll("figure.custom-image-box img"));
  if (images.length === 0) return;

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
