<script setup lang="ts">
import BaseView from '@/views/core/BaseView.vue'
import type { Content } from '@/types/content'
import { onMounted, ref, type Ref } from 'vue'
import { useGetContent } from '@/composable/content'
import { useRoute } from 'vue-router'

const route = useRoute()
const content: Ref<Content> = ref({
  post: {}
})

onMounted(async () => {
  const slug = String(route.params.category_slug)

  content.value = await useGetContent({
    type: 'term',
    typeName: 'category-product', /* Taxonomy Name (category, brand, etc.) */
    slug: slug
    /* parent: 'caregory_example' Category Parent Slug (/categories/caregory_example/subcategory_example)*/
  })
})
</script>

<template>
  <BaseView :content="content">
    <section>
      <div class="container py-5">
        <p>Example for single page (Post Types as course/product/etc.)</p>
        <h1>{{ content.post.title }}</h1>
      </div>
    </section>
  </BaseView>
</template>
