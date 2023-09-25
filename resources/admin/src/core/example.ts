import { createApp, defineAsyncComponent } from 'vue'
// FIXME: Clean later import { createPinia } from 'pinia'
import { Icon } from '@iconify/vue'

import App from '../views/ExampleView.vue'

import '../assets/styles/main.scss'

import PrimeVue from 'primevue/config'
import ToastService from 'primevue/toastservice'
import Button from 'primevue/button'
import Toast from 'primevue/toast'
import DataTable from 'primevue/datatable'
import Column from 'primevue/column'

// FIXME: Clean later const pinia = createPinia()
const app = createApp(App)

app.component('IconUI', Icon)
app.component('ButtonUI', Button)
app.component('ToastUI', Toast)
app.component('DataTableUI', DataTable)
app.component('ColumnUI', Column)

app.component(
  'ExampleUI',
  defineAsyncComponent(() => import('@/components/ui/ExampleUI.vue'))
)

// FIXME: Clean later  app.use(pinia)
app.use(PrimeVue, { inputStyle: 'filled' })
app.use(ToastService)

app.mount('#app')
