import { nextTick } from 'vue'
import { createRouter, createWebHistory } from 'vue-router'
import { useAppStore } from '@/stores/app'

const routes = [
  {
    path: '/',
    name: 'home',
    component: () => import('@/views/HomeView.vue')
  },
  {
    path: '/example',
    name: 'example',
    component: () => import('@/views/ExampleView.vue'),
    meta: {
      title: 'Example'
    }
  },
  {
    path: '/category/:category_slug',
    name: 'category',
    component: () => import('@/views/example/CategoryView.vue')
  },
  {
    path: '/single/:single_slug',
    name: 'single',
    component: () => import('@/views/example/SingleView.vue')
  },
  {
    path: '/:pathMatch(.*)*',
    name: '404',
    component: () => import('@/views/404View.vue')
  }
]

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes,
  scrollBehavior() {
    return { top: 0 }
  }
})

router.beforeEach((to) => {
  const store = useAppStore()
  const isCachedRoute = store.loaderCached.find((cachedRoute) => cachedRoute === to.path)

  if (!isCachedRoute) {
    store.updateLoader({
      route: to.path,
      status: true
    })
  }
})

router.afterEach((to) => {
  nextTick(() => {
    document.title = to.meta.title
      ? `${to.meta.title} - ${import.meta.env.VITE_APP_TITLE}`
      : `${import.meta.env.VITE_APP_TITLE}`
  })
})

export default router
