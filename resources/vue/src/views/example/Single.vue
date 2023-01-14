<template>
  <section class="c-section">
    <div class="container py-5">
      <h1 class="text-center fs-30 w-bold">{{ context.post ? context.post.title : '' }}</h1>
      <figure class="mb-4">
        <img
          :src="context.post && context.post.thumbnail ? context.post.thumbnail.src : ''"
          class="w-100 of--contain"
          alt="" />
      </figure>
      <section v-html="context.post ? context.post.content : ''"></section>
    </div>
  </section>
</template>

<script>
export default {
  data() {
    return {
      context: {},
      contextLoading: true,
    };
  },
  watch: {
    contextLoading(value) {
      if (!value) {
        document.title = `${this.context.post.title} - ${process.env.VUE_APP_TITLE}`;
      }
    },
  },
  created() {
    this.getFullContext({ type: 'post-type', typeName: 'single', slug: this.$route.params.single_slug });
  },
};
</script>
