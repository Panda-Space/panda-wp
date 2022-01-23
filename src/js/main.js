import Vue from 'vue';
import App from './App.vue';
import router from './router.js';
import store from './store.js';
import '../scss/main.scss';

import AOS from 'aos';

AOS.init();

Vue.mixin({
  methods: {
    asset: (file) => `${ panda.assets }/${ file }?key=${ panda.vertion }`,
    getFullContext: function(type, typeName, view) {
      if (this.context.params.view != view) {
        const request = `${ this.context.api }/pages/?type=${ type }&type-name=${ typeName }&slug=${ view }&_wpnonce=${ panda.nonce }`;

        fetch(request)
        .then(res => {
          if (res.status == 201 || res.status < 300) {
            return res.json();
          } else {
            throw res;
          }
        })
        .then(response => {
          if (response.status) {
            this.context = {
              ...this.context,
              ...response.data
            };
          }
        })
        .catch(err => {
          throw err;
        })
      }
    },
  }
})

new Vue({
  router,
  store,
  render: h => h(App),
}).$mount('#app')


