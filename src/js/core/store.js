import Vuex from 'vuex'
import Vue from 'vue'

Vue.use(Vuex)

export const store = new Vuex.Store({
  state: {
    nonce: (typeof mabschool !== 'undefined') ? mabschool.nonce : null,
    API: `${document.getElementById('app').getAttribute('data-site')}/wp-json/custom/v1`,
    SITE_URL: `${document.getElementById('app').getAttribute('data-site')}`,
  },
  mutations: {
  },
  actions: {
  }
})
