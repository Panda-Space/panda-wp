import { createApp, defineAsyncComponent } from 'vue'
import { Icon } from '@iconify/vue'

import App from '../views/ExampleView.vue'

import '../assets/styles/main.scss'

import PrimeVue from 'primevue/config'
import Aura from '@primeuix/themes/aura'
import DataTable from 'primevue/datatable'
import Column from 'primevue/column'

const app = createApp(App)

app.component('IconUI', Icon)
app.component('DataTableUI', DataTable)
app.component('ColumnUI', Column)

app.component(
  'ExampleUI',
  defineAsyncComponent(() => import('@/components/ui/ExampleUI.vue'))
)

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

app.mount('#app')

/*
TODO:
- Remove deprecated {{}}
- General review {{}}
- Update documentation basic README
- Finish
*/
