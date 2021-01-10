<template>
  <section class="c-section c-section--search">
    <div class="grid-container padding-vertical-2">
      <h1 class="fs-25 w-bold">Resultado de la busqueda!!</h1>
      <ul v-if="context.posts.length">
        <li v-for="post of context.posts" :key="post.id" class="">
          <a :href="post.link">{{ post.title }}</a>
        </li>
      </ul>
      <p v-else>0 posts</p>
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
