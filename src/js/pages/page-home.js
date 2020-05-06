import Vue from 'vue'
import { Swiper, SwiperSlide, directive } from 'vue-awesome-swiper'
import {baseConfig, baseState, baseActions} from '../app'
import {store} from '../store'

const home = new Vue({
  ...baseConfig(store),
  data() {
    return {
      title: 'Home',

      //Swiper
      swiperOptions: {
        allowTouchMove: false,
        speed: 500,
        preventClicks: false,
        preventClicksPropagation: false,
        slidesPerView: 3,
        spaceBetween: 40,

        navigation:{
          prevEl: '#control-slider-example-prev',
          nextEl: '#control-slider-example-next'
        },

        breakpoints: {
          320: {
            slidesPerView: 1,
            spaceBetween: 20
          },
          480: {
            slidesPerView: 2,
            spaceBetween: 30
          },
          640: {
            slidesPerView: 2,
            spaceBetween: 40
          },
          1024: {
            slidesPerView: 3,
            spaceBetween: 40
          }
        }        
      }      
    }
  },
  computed: {
    ...baseState()
  },
  components: {
    Swiper,
    SwiperSlide
  },
  directives: {
    swiper: directive
  },
  methods: {
    ...baseActions()
  }
})
