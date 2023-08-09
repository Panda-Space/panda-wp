<template>
  <footer class="c-footer">
    <div class="container flex flex-row justify-content-between">
      <p class="m-0">Made by <a href="/">Panda WP</a></p>
      <p class="m-0">© {{ year }} All Rights Reserved</p>
    </div>
  </footer>
</template>

<script setup lang="ts">
const year = new Date().getFullYear()
</script>
