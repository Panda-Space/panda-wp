<template>
  <article class="padding-1 bg-pri-color white br--small">
    <h3 class="fs-21 w-bold margin-bottom-1">{{ body.title }}</h3>
    <router-link :to="body.link" class="c-button c-button--white">Leer más...</router-link>
  </article>
</template>

<script>
export default {
  props: ['body'],
}
</script>
