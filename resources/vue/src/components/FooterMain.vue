<script setup lang="ts">
const year = new Date().getFullYear()
const PANDAWP_LANDING_LINK = ''
</script>
<template>
  <footer class="c-footer">
    <div class="container flex flex-row justify-content-between">
      <p class="m-0">Made by <a class="c-link c-link--primary" :href="PANDAWP_LANDING_LINK">Panda WP</a></p>
      <p class="m-0">© {{ year }} All Rights Reserved</p>
    </div>
  </footer>
</template>
