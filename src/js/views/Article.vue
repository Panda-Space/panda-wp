<template>
  <section class="c-section c-section--article">
    <div class="grid-container padding-vertical-2">
      <h1 class="text-center fs-25 w-bold">{{ context.post.title  }}</h1>
      <figure>
        <img :src="context.post.thumbnail.src" class="width-100 of--contain" alt="">
      </figure>
      <section v-html="context.post.content"></section>
    </div>
  </section>
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
