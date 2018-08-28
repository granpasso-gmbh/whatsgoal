function testimonialSlider() {
  var testimonialSliderX = new Swiper('.swiper-container-testimonials', {
    pagination: {
      el: '.swiper-pagination-testimonials',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next-testimonials',
      prevEl: '.swiper-button-prev-testimonials',
    },
    loop: true,
      autoplay: {
          delay: 12000,
      },
    speed: 800,
    slidesPerView: 1,
    spaceBetween: 0,
  });
}

function slideshowSlider() {
    var slideshowSlider = new Swiper('.swiper-container-slideshow', {
        pagination: {
            el: '.swiper-pagination-slideshow',
            clickable: true,
        },
        loop: true,
        autoplay: 6000,
        speed: 800,
        slidesPerView: 1,
        spaceBetween: 0,
    });
}