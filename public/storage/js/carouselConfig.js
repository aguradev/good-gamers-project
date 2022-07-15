const swiper = new Swiper(".slider-game", {
  loop: true,
  centeredSlides: true,
  slidesPerView: 2,
  spaceBetween: 30,

  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
  },
});

const slides2 = new Swiper(".banner-card", {
  loop: true,
  centeredSlides: true,
  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    dynamicBullets: true,
  },
});
