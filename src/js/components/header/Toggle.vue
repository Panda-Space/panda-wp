<template>
  <label class="c-toggle button-reset button position-fixed" :class="{ 'c-toggle--active' : switcher }" @click="updateStatusMenu()">
    <div class="c-icons-container position-absolute overflow-hidden">
      <div class="c-icons">
        <div class="c-icon cell grid-y align-center-middle">
          <span class="cell"><i class="icon-menu"></i></span>
        </div>
        <div class="c-icon cell grid-y align-center-middle">
          <span class="cell"><i class="icon-cancel"></i></span>
        </div>
      </div>
    </div>
  </label>
</template>

<script>
export default {
  props: ['switcher'],
  methods: {
    updateStatusMenu: function() {
      this.$emit('update:switcher', !this.switcher);
    },
  },
}
</script>
