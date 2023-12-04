<script setup lang="ts">
import { onMounted } from 'vue'
import { useAppStore } from '@/stores/app'
import { useRoute } from 'vue-router'

const route = useRoute()
const store = useAppStore()

onMounted(() => {
  store.updateLoader({
    status: false,
    route: route.path
  })
})
</script>

<template>
  <section class="c-section c-section--404">
    <div class="container py-5">
      <h1 class="fs-25 text-center pri-color w-sbold mb-3">Error 404</h1>
      <p class="mb-5 text-center">Página no encontrada</p>
      <div class="flex justify-content-center pt-3 mb-2">
        <figure class="c-pic">
          <img src="@/assets/images/404.png" alt="" />
        </figure>
      </div>
    </div>
  </section>
</template>
