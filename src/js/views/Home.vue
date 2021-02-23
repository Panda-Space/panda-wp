<template>
  <section class="c-section c-section--home">
    <div class="grid-container margin-bottom-2">
      <h1 class="text-center padding-vertical-3" data-aos="fade-up" data-aos-once="true" data-aos-duration="900">
        {{ title }}
        <i class="icon-facebook"></i>
      </h1>
      <div class="margin-bottom-2 bg-light-gray padding-1">
        <form
          class="flex-container"
          role="search"
          method="get"
          action="/search">
          <input type="search" class="input-reset height-100 margin-right-2" placeholder="Buscar" name="s" autocomplete="off">
          <button class="c-button c-button--primary">Search</button>
        </form>
      </div>
      <div class="grid-x grid-margin-x grid-margin-y">
        <div class="cell large-4">
          <a :href="asset('images/example.jpg')" data-fancybox="gallery-main">
            <img :src="asset('images/example.jpg')" loading="lazy" alt="">
          </a>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import $ from 'jquery';
import '@fancyapps/fancybox/';

export default {
  data() {
    return {
      context: {...panda},
      title: 'Home',
    }
  },
  mounted() {
    $('[data-fancybox="gallery"]').fancybox();
  },
}
</script>

