var swiperServices = new Swiper(".service-block .swiper", {
  direction: "horizontal",
  loop: true,
  slidesPerView: 4,
  spaceBetween: 30,
  // autoHeight: true,
  pagination: {
    el: ".service-block .swiper-pagination",
  },
  navigation: {
    nextEl: ".swiper-button-service-next",
    prevEl: ".swiper-button-service-prev",
  },
  // autoplay: {
  //   delay: 3000,
  // },
  speed: 1000,
  breakpoints: {
    1: {
      slidesPerView: 1,
    },
    660: {
      slidesPerView: 2,
    },
    1000: {
      slidesPerView: 3,
    },
    1630: {
      slidesPerView: 4,
    }
  }
});