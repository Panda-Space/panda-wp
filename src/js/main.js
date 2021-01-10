import Vue from 'vue';
import App from './App.vue';
import router from './router.js';
import store from './store.js';

import AOS from 'aos';

AOS.init();

new Vue({
  router,
  store,
  render: h => h(App),
}).$mount('#app')


