<script setup lang="ts">
import { onMounted } from 'vue'
import { useRoute } from 'vue-router'
import { useAppStore } from '@/stores/app'

const route = useRoute()
const store = useAppStore()

onMounted(async () => {
  store.updateLoader({
    status: false,
    route: route.path
  })
})
</script>

<template>
  <section>
    <div class="container py-5">
      <h1 class="w-bold">Example Custom Page</h1>
      <p>Example for a custom page (not created by WordPress from /pages)</p>
      <p>This page is useful for web applications which needs only the route path (/courses, /panel, /history, etc.)</p>
    </div>
  </section>
</template>
