<script setup lang="ts">
import { defineAsyncComponent, onMounted } from 'vue'
import { useAppStore } from '@/stores/app'
import { useRoute } from 'vue-router'
import { useToast } from 'primevue/usetoast'

const route = useRoute()
const store = useAppStore()
const toast = useToast()

const FormMain = defineAsyncComponent(() => import('@/components/FormMain.vue'))

onMounted(() => {
  store.updateLoader({
    status: false,
    route: route.path
  })
})

const shows = () => {
  toast.add({ severity: 'info', summary: 'Info', detail: 'Message Content', life: 3000 })
}
</script>

<template>
  <section class="c-section c-section--home">
    <div class="container">
      <section class="py-5 h-100 text-center">
        <h1 data-aos="zoom-in" class="fs-30 w-bold mb-5">
          <IconUI icon="line-md:github" />
          Welcome to Panda WP
          <IconUI icon="line-md:beer-twotone-loop" />
        </h1>

        <router-link to="example" class="inline-block mb-5">Go to example view</router-link>

        <figure data-aos="zoom-in" class="mb-5">
          <img alt="Vue logo" src="@/assets/images/logo.png" />
        </figure>

        <button @click="shows()" class="c-button c-button--primary">Show notification</button>
      </section>

      <section class="p-4">
        <h2 class="fs-21 mb-3 text-center">Basic Panda WP Form</h2>

        <FormMain />
      </section>
    </div>

    <ToastUI position="bottom-left" />
  </section>
</template>
