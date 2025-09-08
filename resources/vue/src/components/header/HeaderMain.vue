<script setup lang="ts">
import { useIsAtiveMenuItem } from '@/composable/header'
import { ref } from 'vue'

const visible = ref<boolean>(false)
const isAtiveMenuItem = useIsAtiveMenuItem
</script>

<template>
  <header class="c-header">
    <div class="relative container">
      <nav class="c-nav">
        <div class="c-nav__left flex justify-content-center align-items-center">
          <figure class="c-brand c-brand--normal flex justify-content-center align-items-center">
            <router-link to="/" class="c-brand__link">
              <img class="c-brand__image" src="@/assets/images/logo.png" alt="Panda WP - Logo" />
            </router-link>
          </figure>
        </div>
        <div class="c-nav__right flex gap-3 align-items-center">
          <ul class="flex gap-3 align-items-center ul-reset">
            <li>
              <router-link
                class="c-link"
                :class="isAtiveMenuItem('home') ? 'c-link--primary': 'c-link--white'"
                to="/"
              >
                Home
              </router-link>
            </li>
            <li>
              <router-link
                class="c-link"
                :class="isAtiveMenuItem('single') ? 'c-link--primary': 'c-link--white'"
                to="/single/slug_example"
              >
                Single Page
              </router-link>
            </li>
            <li>
              <router-link
                class="c-link"
                :class="isAtiveMenuItem('category') ? 'c-link--primary': 'c-link--white'"
                to="/category/slug_category_example"
              >
                Category Page
              </router-link>
            </li>
          </ul>

          <button class="c-link c-link--white fs-30" @click="visible = !visible">
            <IconUI icon="material-symbols:menu-rounded" />
          </button>
        </div>
      </nav>
    </div>

    <DrawerUI v-model:visible="visible" position="right" class="c-sidebar">
      Menu for mobile
    </DrawerUI>
  </header>
</template>
