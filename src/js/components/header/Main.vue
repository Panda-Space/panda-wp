<template>
  <header class="c-header width-100 padding-bottom-0">
    <div class="grid-container position-relative">
      <nav class="c-nav width-100">
        <div class="c-nav__left flex-container align-center-middle">
          <figure class="c-brand c-brand--normal flex-container align-center-middle">
            <router-link class="c-brand__link" to="/">
              <img class="c-brand__image" :src="asset('images/logo.png')" alt="Panda WP - Logo" />
            </router-link>
          </figure>    
        </div>
        <div class="c-nav__right">
          <ul class="c-menu menu ul-reset">
            <li
              v-for="item of context.primary_menu.items"
              :key="item.id"
              :class="[item.class, {'activate' : isAtiveMenuItem(item)}]">
              <router-link :to="item.url" class="position-relative" replace>{{ item.name }}</router-link>
            </li>
          </ul>
          <a href="item.link" class="c-button c-button--primary bg-success w-medium font-sec fs-18 white display-block">
            <div class="flex-container width-100 height-100 align-center-middle">
              Wsp
            </div>
          </a>
        </div>      
      </nav>     
    </div>
  </header>
</template>

<script>
export default {
  data() {
    return {
      context: {...panda},
    }
  },
  methods: {
    isAtiveMenuItem: function(item) {
      return (item.slug == this.$route.name) ? true : false;
    },
  }
}
</script>
