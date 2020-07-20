import Vuex from 'vuex'
import Vue from 'vue'

Vue.use(Vuex)

export const store = new Vuex.Store({
  state: {
    //Site
    API: `${document.getElementById('app').getAttribute('data-site')}/wp-json/custom/v1`,
    SITE_URL: `${document.getElementById('app').getAttribute('data-site')}`,

    //Menu
    isActiveMenu: false,
  },
  mutations: {
    setStatusMenu(state){
      state.isActiveMenu = !state.isActiveMenu
    },
  },
  actions: {
    updateStatusMenu: ({commit})=>{
      commit('setStatusMenu')
    },
  }
})
