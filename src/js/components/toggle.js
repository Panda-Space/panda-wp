import Vue from 'vue'
import Vuex from 'vuex'

Vue.component('toggle',{
  template: /*html*/`
    <label class="c-toggle button-reset button position-fixed" :class="{ 'c-toggle--active' : isActiveMenu }" @click="updateStatusMenu()">
      <div class="c-icons-container position-absolute overflow-hidden">
        <div class="c-icons">
          <div class="c-icon cell grid-y align-center-middle">
            <span class="cell"><i class="icon-menu"></i></span>
          </div>
          <div class="c-icon cell grid-y align-center-middle">
            <span class="cell"><i class="icon-cancel"></i></span>
          </div>
        </div>
      </div>
    </label>
  `,
  computed: {
    ...Vuex.mapState(['isActiveMenu'])
  },
  methods: {
    ...Vuex.mapActions(['updateStatusMenu'])
  },
})
