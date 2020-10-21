import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

function baseConfig(store){
  return {
    el: '#app',
    store: store,
  }
}

function baseState(){
  return Vuex.mapState([
    'nonce',
    'API',
    'SITE_URL',
  ])
}

export {baseConfig, baseState}
