<template>
  <footer class="c-footer">
    <div class="grid-container grid-x align-justify">
      <p class="margin-0">Made by <a href="/">Panda WP</a></p>
      <p class="margin-0">© {{ year }} All Rights Reserved</p>
    </div>
  </footer>
</template>

<script>
export default {
  data() {
    return {
      year: new Date().getFullYear(),
    }
  },
}
</script>
