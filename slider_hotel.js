var swiperServices = new Swiper(".tours_holder .swiper", {
    direction: "horizontal",
    loop: true,
    slidesPerView: 1,
    spaceBetween: 20,
    // autoHeight: true,
    pagination: {
      el: ".tours_holder .swiper-pagination",
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    // autoplay: {
    //   delay: 3000,
    // },
    speed: 1000,
    // breakpoints: {
    //   1: {
    //     slidesPerView: 1,
    //   },
    //   660: {
    //     slidesPerView: 2,
    //   },
    //   1000: {
    //     slidesPerView: 3,
    //   },
    //   1630: {
    //     slidesPerView: 4,
    //   }
    // }
  });