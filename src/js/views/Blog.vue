<template>
  <section class="c-section c-section--blog">
    <div class="grid-container padding-vertical-2">
      <h1 class="c-section__title margin-bottom-1">Blog</h1>
      <div class="grid-x grid-margin-x grid-margin-y margin-bottom-2">
        <div v-for="article of context.articles" :key="article.id" class="cell medium-6 large-4">
          <Article :body="article"></Article>
        </div>
      </div>
      <Pagination :body="context.pagination"></Pagination>
    </div>
  </section>
</template>

<script>
import Article from '../components/Article.vue';
import Pagination from '../components/Pagination.vue';

export default {
  data() {
    return {
      context: {...panda},
    }
  },
  components: {
    Article,
    Pagination,
  },
}
</script>
