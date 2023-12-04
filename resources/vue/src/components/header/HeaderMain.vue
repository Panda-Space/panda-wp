<script setup lang="ts">
import { useAppStore } from '@/stores/app'

const app = useAppStore()
</script>

<template>
  <header class="c-header w-full">
    <div class="container position-relative">
      <nav class="c-nav w-full">
        <div class="c-nav__left d-flex justify-content-center align-items-center">
          <figure class="c-brand c-brand--normal d-flex justify-content-center align-items-center">
            <RouterLink class="c-brand__link" to="/">
              <img class="c-brand__image" src="@/assets/images/logo.png" alt="Panda WP - Logo" />
            </RouterLink>
          </figure>
        </div>
        <div class="c-nav__right">
          <ul class="c-menu menu ul-reset">
            <li
              v-for="item of app.generalPrimaryMenu"
              :key="item.id"
              class="menu-item"
            >
              <router-link :to="item.url" class="position-relative" replace>
                {{ item.name }}
              </router-link>
            </li>
          </ul>
          <a href="#" class="c-button c-button--primary w-medium f2 fs-18 white d-block">
            <div class="d-flex w-full height-100 justify-content-center align-items-center">Wsp</div>
          </a>
        </div>
      </nav>
    </div>
  </header>
</template>
