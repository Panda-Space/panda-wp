<template>
  <section class="c-section c-section--404">
    <div class="grid-container padding-vertical-3">
      <h1 class="c-section-content-title text-center pri-color w-sbold margin-bottom-1">Error 404</h1>
      <div class="c-section-content c-section-content--normal position-relative margin-bottom-3">
        <p class="margin-0 text-center">Página no encontrada</p>
      </div>     
      <div class="grid-x align-center padding-top-1 margin-bottom-2">
        <!-- Colors:
          1. primary-color     
        -->
        <figure class="c-pic">
          <img :src="`${ context.theme.uri }/static/images/404.png`" alt="">
        </figure>
      </div>
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
