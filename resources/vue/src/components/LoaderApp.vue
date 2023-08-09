<script setup lang="ts">
defineProps(['status'])
</script>

<template>
  <section class="c-loader-app" :class="{ hidden: !status }">
    <IconUI class="c-loader-app__animation" icon="svg-spinners:ring-resize" />
  </section>
</template>
