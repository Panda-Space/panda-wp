<script setup lang="ts">
import { onMounted } from 'vue'
import { RouterView } from 'vue-router'
import { useAppStore } from '@/stores/app'

const store = useAppStore()

onMounted(() => {
  store.getGeneralData()
})
</script>

<template>
  <section class="c-app">
    <HeaderMain />
    <section class="c-app__section" :class="{ loaded: !store.loaderStatus }">
      <RouterView v-slot="{ Component }">
        <transition name="fade" mode="out-in">
          <KeepAlive>
            <component :is="Component" />
          </KeepAlive>
        </transition>
      </RouterView>
    </section>

    <FooterMain></FooterMain>
    <LoaderApp :status="store.loaderStatus"></LoaderApp>
  </section>
</template>
