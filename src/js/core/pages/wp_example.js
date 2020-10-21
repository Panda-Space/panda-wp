import Vue from 'vue';
import {baseConfig, baseState} from '../wp_admin'
import {store} from '../store'

const wp_example = new Vue({
  ...baseConfig(store),
  data() {
    return {
      title: 'Admin...'
    }
  },
  computed: {
    ...baseState()
  },
  methods: {
  }
})
