<template>
  <section class="c-section c-section--[post-type]">
    <CategoryView v-if="!context.category.parent"></CategoryView>
    <SubcategoryView v-else></SubcategoryView>
  </section>
</template>

<script>
import CategoryView from './example/Category.vue';
import SubcategoryView from './example/Subcategory.vue';

export default {
  data() {
    return {
      context: {...panda},
    }
  },
  components: {
    CategoryView,
    SubcategoryView,
  },
}
</script>
