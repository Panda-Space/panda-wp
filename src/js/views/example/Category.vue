<template>
  <div class="grid-container">
    <h1>Marca: {{ context.category.name }}</h1>
    <div class="grid-x grid-margin-x grid-margin-y">
      <div v-for="serie of context.series" :key="serie.id" class="cell large-6">
        <article class="bg-sec-color white padding-1">
          <h3>{{ serie.title }}</h3>
          <a :href="serie.link" class="c-button c-button--white">Ver serie</a>
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
