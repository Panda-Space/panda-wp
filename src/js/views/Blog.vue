<template>
  <section class="c-section c-section--blog">
    <div class="grid-container padding-vertical-2">
      <h1 class="c-section__title margin-bottom-1">Blog</h1>
      <button @click="getArticles()" class="width-100 c-button c-button--primary margin-bottom-2">Ver articulos</button>
      <transition name="fade" mode="out-in">
        <div v-if="showArticles" key="articles" class="grid-x grid-margin-x grid-margin-y margin-bottom-2">
          <div v-for="article of context.articles" :key="article.id" class="cell medium-6 large-4">
            <Article :body="article"></Article>
          </div>
        </div>
      </transition>
      <Pagination :body="context.pagination"></Pagination>
    </div>
  </section>
</template>

<script>
import Pagination from '../components/Pagination.vue';

export default {
  data() {
    return {
      context: {...panda},

      showArticles: false,
    }
  },
  components: {
    Article: () => import(/* webpackChunkName: "article" */'../components/Article.vue'),
    Pagination,
  },
  methods: {
    getArticles: function() {
      window.setTimeout(() => {
        this.showArticles = true;
      }, 2000)
    },
  },
}
</script>
