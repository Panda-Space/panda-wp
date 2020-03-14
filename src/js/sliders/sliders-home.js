import $ from 'jquery'
import Swiper from 'swiper';

const sliderConf = {
  speed: 5000,
  spaceBetween: 0,
  loop: true,
  autoplay: {
    delay: 0.5
  },
  freeMode: true,
  allowTouchMove: false,
  slidesPerView: 1,
    
  breakpoints: {
    320: {
      slidesPerView: 1,
      spaceBetween: 20
    },
    480: {
      slidesPerView: 3,
      spaceBetween: 30
    },
    640: {
      slidesPerView: 3,
      spaceBetween: 40
    },
    1024: {
      slidesPerView: 4,
      spaceBetween: 40,
      direction: 'vertical'
    }
  }  
}

const slidersBanner = {
  uno: new Swiper('#slider-banner-1', {
    ...sliderConf   
  })
}
