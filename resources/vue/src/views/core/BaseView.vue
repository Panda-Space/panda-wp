<script setup lang="ts">
import type { Content } from '@/types/content';
import NotFoundView from '@/views/404View.vue'

defineProps<{
  content: Content
}>()
</script>

<template>
  <section>
    <NotFoundView v-if="content.post.error"></NotFoundView>
    <slot v-else-if="content.post.title"></slot>
  </section>
</template>
