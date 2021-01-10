<template>
  <header class="c-header c-header-mobile width-100 padding-bottom-0" :class="{ 'c-header-mobile--visible' : switcher}">
    <div class="grid-container">
      <nav class="c-nav width-100">
        <div class="c-nav__left width-100 flex-container align-center-middle">
          <figure class="c-brand c-brand--normal flex-container align-center-middle">
            <a class="c-brand__link" :href="context.site.url">
              <img class="c-brand__image" :src="`${ context.theme.uri }/static/images/logo.png`" alt="Panda WP - Logo" />
            </a>
          </figure>       
        </div>
        <div class="c-nav__right">
          <ul class="c-menu dropdown vertical menu accordion-menu flex-container ul-reset" data-accordion-menu data-submenu-toggle="true">
            <li
              v-for="item of context.primary_menu.items"
              :key="item.id"
              :class="['flex-container flex-dir-column align-middle', item.class, {'activate' : item.classes.includes('current-menu-item')}]">
              <a :href="item.url" class="position-relative flex-container align-middle padding-1">{{ item.name }}</a>
              <ul v-if="item.children.length" class="ul-reset menu vertical nested margin-top-1" >
                <li
                  v-for="child of item.children" 
                  :key="child.id">
                  <a class="white" :href="child.url">{{ child.name }}</a>
                </li>
              </ul>
            </li>
          </ul>
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
  props: ['switcher'],
}
</script>
