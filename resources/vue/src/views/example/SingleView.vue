<script setup lang="ts">
import BaseView from '@/views/core/BaseView.vue'
import type { Content } from '@/types/content'
import { onMounted, ref, type Ref } from 'vue'
import { useGetContent } from '@/composable/content'

const content: Ref<Content> = ref({
  post: {}
})

onMounted(async () => {
  content.value = await useGetContent({
    type: 'post-type',
    typeName: 'product', /* Post Type Name (product, course, etc.) */
    slug: 'sample-page'
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
