import { createApp, defineAsyncComponent } from 'vue'
import { createPinia } from 'pinia'
import { Icon } from '@iconify/vue'

import App from './App.vue'
import router from './router'

import './assets/styles/main.scss'

import PrimeVue from 'primevue/config'
import ToastService from 'primevue/toastservice'
import Button from 'primevue/button' /* Remove later if isn't useful */
import Toast from 'primevue/toast' /* Remove later if isn't useful */

const pinia = createPinia()
const app = createApp(App)

app.component('IconUI', Icon)
app.component('ButtonUI', Button) /* Remove later if isn't useful */
app.component('ToastUI', Toast) /* Remove later if isn't useful */

app.component(
  'HeaderMain',
  defineAsyncComponent(() => import('@/components/header/HeaderMain.vue'))
)

app.component(
  'HeaderMobile',
  defineAsyncComponent(() => import('@/components/header/HeaderMobile.vue'))
)

app.component(
  'HeaderToggle',
  defineAsyncComponent(() => import('@/components/header/HeaderToggle.vue'))
)

app.component(
  'FooterMain',
  defineAsyncComponent(() => import('@/components/FooterMain.vue'))
)

app.component(
  'LoaderApp',
  defineAsyncComponent(() => import('@/components/LoaderApp.vue'))
)

app.use(router)
app.use(pinia)
app.use(PrimeVue, { inputStyle: 'filled' })
app.use(ToastService)

app.mount('#app')
