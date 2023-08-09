<script setup lang="ts">
const props = defineProps({
  value: Boolean,
})
const emit = defineEmits(['input'])

const updateStatusMenu = () => {
  emit('input', !props.value)
}
</script>

<template>
  <label
    class="c-toggle button-reset button fixed"
    :class="{ 'c-toggle--active': value }"
    @click="updateStatusMenu()"
  >
    <div class="c-icons-container absolute overflow-hidden">
      <div class="c-icons">
        <div class="c-icon flex justify-content-center align-items-center">
          <span>
            <IconUI class="fs-30" icon="dashicons:menu" />
          </span>
        </div>
        <div class="c-icon flex justify-content-center align-items-center">
          <span>
            <IconUI class="fs-30" icon="eva:close-fill" />
          </span>
        </div>
      </div>
    </div>
  </label>
</template>
