<script setup lang="ts">
import { useAppStore } from '@/stores/app'

defineProps({
  value: Boolean
})

const app = useAppStore()
</script>

<template>
  <header
    class="c-header c-header-mobile w-full pb-0"
    :class="{ 'c-header-mobile--visible': value }"
  >
    <div class="container">
      <nav class="c-nav w-full">
        <div class="c-nav__left w-full flex justify-content-center align-items-center">
          <figure class="c-brand c-brand--normal flex justify-content-center align-items-center">
            <router-link class="c-brand__link" to="/">
              <img class="c-brand__image" src="@/assets/images/logo.png" alt="Panda WP - Logo" />
            </router-link>
          </figure>
        </div>
        <div class="c-nav__right">
          <ul class="c-menu flex ul-reset">
            <li
              v-for="item of app.generalPrimaryMenu"
              :key="item.id"
              class="menu-item"
            >
              <router-link
                :to="item.url"
                class="position-relative flex align-middle p-1"
              >
                {{ item.name }}
              </router-link>
              <ul v-if="item.children.length" class="ul-reset margin-top-1">
                <li v-for="child of item.children" :key="child.id">
                  <a class="white" :href="child.url">{{ child.name }}</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </header>
</template>
