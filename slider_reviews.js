var swiper3 = new Swiper('.mySwiper3', {
  slidesPerView: 3,
  direction: getDirection(),
  navigation: {
    nextEl: '.swiper-button-next_reviews',
    prevEl: '.swiper-button-prev_reviews',
  },
  on: {
    resize: function () {
      swiper3.changeDirection(getDirection());
    },
  },
});

function getDirection() {
  var windowWidth = window.innerWidth;
  var direction = window.innerWidth <= 760 ? 'vertical' : 'horizontal';

  return direction;
}
