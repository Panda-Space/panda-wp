<script setup lang="ts">
import { onMounted, ref } from 'vue'
import { useAppStore } from '@/stores/app'
import { useRoute } from 'vue-router'
import { useToast } from 'primevue/usetoast'

const VEE_VALIDATE_LINK =
  'https://vee-validate.logaretm.com/v4/guide/composition-api/typed-schema#yup'
const ICONIFY_LINK = 'https://icon-sets.iconify.design/'
const PRIMEVUE_LINK = 'https://primevue.org/'
const PRIMEFLEX_LINK = 'https://primeflex.org/'
const PANDAWP_LINK = 'https://primeflex.org/'
const route = useRoute()
const store = useAppStore()
const toast = useToast()
const dialogVisible = ref<boolean>(false)

onMounted(() => {
  store.updateLoader({
    status: false,
    route: route.path
  })
})

const show = () => {
  toast.add({ severity: 'info', summary: 'Info', detail: 'Message Content', life: 3000 })
}
</script>

<template>
  <section class="c-section c-section--home">
    <div class="container">
      <div class="grid justify-content-center">
        <div class="col-12 md:col-7">
          <div class="c-welcome py-5 flex flex-column gap-4">
            <div class="py-4 text-center flex flex-column align-items-center justify-content-center">
              <h1 class="fs-30">
                Welcome to <span class="color-success">Panda WP</span>
                <IconUI icon="noto-v1:panda" />
              </h1>
              <p>
                Build web applications with WordPress + Vue — super easy, organized, scalable, and without losing SEO.
              </p>
              <a class="c-link c-link--primary flex align-items-center" :href="PANDAWP_LINK" target="_blank">
                <IconUI class="mr-2" icon="icon-park-twotone:doc-search-two" /> Read the documentation
              </a>
            </div>

            <h2 class="color-gray-300 w-bold text-center">Useful elements</h2>
            <div class="background-black-100 p-4 br-medium">
              <h3 class="color-gray-300 w-bold mb-4">✅ Formularies</h3>
              <p>
                Implemented thanks to
                <a class="c-link c-link--primary" :href="VEE_VALIDATE_LINK" target="_blank">
                  vee-validate + yup
                </a>
              </p>
              <FormMain />
            </div>
            <div class="background-black-100 p-4 br-medium">
              <h3 class="color-gray-300 w-bold mb-4">🐼 Icons</h3>
              <p>
                Icons provided by
                <a class="c-link c-link--primary" :href="ICONIFY_LINK" target="_blank"> Iconify </a>
              </p>
              <div class="flex gap-3 fs-25">
                <IconUI icon="lucide:baby" />
                <IconUI icon="lucide:banana" />
                <IconUI icon="lucide:bell-plus" />
                <IconUI icon="lucide:archive" />
                <IconUI icon="lucide:arrow-big-up-dash" />
                <IconUI icon="lucide:box" />
              </div>
            </div>
            <div class="background-black-100 p-4 br-medium">
              <h3 class="color-gray-300 w-bold mb-4">🚀 Images with lazy loading</h3>
              <router-link class="c-link c-link--primary" to="/example">
                Check example view
              </router-link>
            </div>
            <div class="background-black-100 p-4 br-medium">
              <h3 class="color-gray-300 w-bold mb-4">
                <IconUI icon="simple-icons:primevue" /> Prime Ecosystem
              </h3>
              <h4 class="w-bold">
                PrimeVue Componentes
                <a class="c-link c-link--primary" :href="PRIMEVUE_LINK" target="_blank">
                  / read here
                </a>
              </h4>
              <div class="flex gap-4">
                <button class="c-button c-button--primary" @click="show()">Toast</button>
                <button class="c-button c-button--primary" @click="dialogVisible = true">
                  Dialog/Modal
                </button>
              </div>

              <h4 class="w-bold">
                PrimeFlex (CSS Utilities)
                <a class="c-link c-link--primary" :href="PRIMEFLEX_LINK" target="_blank">
                  / read here
                </a>
              </h4>
              <p>The perfect CSS utility for build websites quickly</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <ToastUI position="top-left" />
    <DialogUI
      v-model:visible="dialogVisible"
      modal
      header="Dialog example"
      :style="{ width: '25rem' }"
    >
      Welcome to this modal!
    </DialogUI>
  </section>
</template>
