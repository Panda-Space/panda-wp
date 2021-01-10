<template>
  <nav class="c-pagination flex-container margin-bottom-2 align-center-middle">
    <a
      v-if="body.prev"
      :href="body.prev.link"
      class="c-pagination__arrow margin-right-1 padding-1 rounded flex-container align-center-middle">
      <span><i class="icon-arrow-left"></i></span>
    </a>
    <ul class="c-pagination__links ul-reset rounded flex-container align-center-middle">
      <li
        v-for="page of body.pages"
        :key="page.id"
        class="c-pagination__link"
        :class="{'c-pagination__link--active' : page.current}">
        <a :href="getPageLink(page)" class="rounded flex-container align-center-middle">
          {{ (page.class == 'dots') ? '...' : page.title }}
        </a>
      </li>
    </ul>
    <a
      v-if="body.next"
      :href="body.next.link"
      class="c-pagination__arrow margin-left-1 padding-1 rounded flex-container align-center-middle">
      <span><i class="icon-arrow-right"></i></span>
    </a>
  </nav>
</template>

<script>
export default {
  props: ['body'],
  methods: {
    getPageLink: function(page) {
      return (page.link) ? page.link : '#';
    },
  },
}
</script>
