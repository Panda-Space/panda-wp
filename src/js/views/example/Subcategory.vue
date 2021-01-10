<template>
  <div class="grid-container">
    <h1>Serie: {{ context.category.name }}</h1>
    <div class="grid-x grid-margin-x grid-margin-y">
      <div v-for="product of context.products" :key="product.id" class="cell large-6">
        <article class="bg-sec-color white padding-1">
          <h3>{{ product.title }}</h3>
          <a :href="product.link" class="c-button c-button--white">Ver product</a>
        </article>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      context: {...panda},
    }
  },
}
</script>
