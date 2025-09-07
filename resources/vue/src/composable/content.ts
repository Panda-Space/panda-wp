import { useAppStore } from '@/stores/app'
import { useRoute } from 'vue-router'

interface PayloadRequest {
  type: string
  slug: string
  typeName?: string
  parent?: string
}

const renderErrorPage = (store: any, route: any) => {
  store.updateLoader({
    route: route.path,
    status: true,
    error: true
  })
}

export async function useGetContent(payload: PayloadRequest): Promise<any> {
  const store = useAppStore()
  const route = useRoute()
  let request: string = `${store.api}/pages/${payload.slug}/?type=${payload.type}`

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
      renderErrorPage(store, route)
      return { post: { error: true } }
    }
  } else {
    renderErrorPage(store, route)
    return { post: { error: true } }
  }
}
