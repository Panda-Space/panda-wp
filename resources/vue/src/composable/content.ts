import { useAppStore } from '@/stores/app'
import { useRoute } from 'vue-router'
// import { VBToastPlugin } from 'bootstrap-vue-3';

interface PayloadRequest {
  type: string
  slug: string
  typeName?: string
  parent?: string
}

// const showToast = () => {
//   const toastOptions = {
//     title: 'Toast Notification',
//     autoHideDelay: 5000,
//     variant: 'success'
//   };

//   this.$bvToast.toast('This is a toast notification', toastOptions);
// };

const showError = () => {
  // VBToastPlugin.toast('Página no encontrada', {
  //   title: 'Error 404',
  //   variant: 'danger',
  //   toaster: 'b-toaster-bottom-left',
  //   autoHideDelay: 5000,
  // });
}

export async function useGetContent(payload: PayloadRequest): Promise<any> {
  const store = useAppStore()
  const route = useRoute()
  let request: string = `${store.api}/pages/${payload.slug}/?type=${
    payload.type
  }`

  if (payload.typeName) request += `&type-name=${payload.typeName}`
  if (payload.parent) request += `&parent=${payload.parent}`

  const response = await fetch(request)

  if (response.status === 201 || response.status < 300) {
    const { data, status } = await response.json()

    if (status) {
      store.updateLoader({
        route: route.path,
        status: false
      })

      return data
    } else {
      showError()
    }
  } else {
    showError()
  }
}
