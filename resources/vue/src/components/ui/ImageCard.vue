<script setup lang="ts">
// @ts-ignore
import VLazyImage from 'v-lazy-image'

defineProps<{
  source: String
}>()
</script>

<template>
  <div class="c-card-image overflow-hidden">
    <v-lazy-image class="w-full h-full of-cover" :src="source" />
  </div>
</template>
