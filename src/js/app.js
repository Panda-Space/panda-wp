import Vue from 'vue'
import Vuex from 'vuex'
import './components/toggle';

Vue.use(Vuex)

function baseConfig(store){
  return {
    el: '#app',
    store: store,
    delimiters: ['${', '}'],
    created () {
      window.addEventListener('scroll', this.handleScroll);
    },
    destroyed () {
      window.removeEventListener('scroll', this.handleScroll);
    }
  }
}

function baseState(){
  return Vuex.mapState([
    'API', 
    'SITE_URL',
    'isActiveMenu',
    'isActiveBrowserToggle'
  ])
}

function baseActions(){
  return {...Vuex.mapActions(['updateStatusBrowserToggle']),
    handleScroll: function(event){}
  }
}

export {baseConfig, baseState, baseActions}
