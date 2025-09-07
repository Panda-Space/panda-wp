import { createApp, defineAsyncComponent } from 'vue'
import { createPinia } from 'pinia'
import { Icon } from '@iconify/vue'

import App from './App.vue'
import router from './router'

import './assets/styles/main.scss'

import PrimeVue from 'primevue/config'
import Aura from '@primeuix/themes/aura'
import Drawer from 'primevue/drawer'
import Dialog from 'primevue/dialog'
import Toast from 'primevue/toast';
import ToastService from 'primevue/toastservice';

const pinia = createPinia()
const app = createApp(App)

app.component('IconUI', Icon)
app.component('DrawerUI', Drawer)
app.component('DialogUI', Dialog)
app.component('ToastUI', Toast)
app.component(
  'HeaderMain',
  defineAsyncComponent(() => import('@/components/header/HeaderMain.vue'))
)

app.component(
  'FooterMain',
  defineAsyncComponent(() => import('@/components/FooterMain.vue'))
)

app.component(
  'LoaderApp',
  defineAsyncComponent(() => import('@/components/LoaderApp.vue'))
)

app.component(
  'FormMain',
  defineAsyncComponent(() => import('@/components/FormMain.vue'))
)

app.use(router)
app.use(pinia)
app.use(PrimeVue, {
  inputVariant: 'filled',
  theme: {
    preset: Aura,
    options: {
      prefix: 'p',
      darkModeSelector: 'light',
      cssLayer: false
    }
  }
})
app.use(ToastService)

app.mount('#app')
