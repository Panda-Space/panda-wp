<template>
  <section>
    <Header></Header>
    <HeaderMobile :switcher="isActiveMenu"></HeaderMobile>
    <Toggle :switcher.sync="isActiveMenu"></Toggle>

    <router-view></router-view>

    <Footer></Footer>
  </section>
</template>

<script>
import Header from './components/header/Main.vue';
import HeaderMobile from './components/header/Mobile.vue';
import Toggle from './components/header/Toggle.vue';
import Footer from './components/Footer.vue';

export default {
  data() {
    return {
      isActiveMenu: false,
    }
  },
  components: {
    Header,
    HeaderMobile,
    Toggle,
    Footer,
  },
}
</script>
