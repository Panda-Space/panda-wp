import { useRoute } from 'vue-router'

export function useIsAtiveMenuItem(routeName: string) {
  const route = useRoute()

  return route.name ? routeName.toLowerCase() === String(route.name).toLowerCase() : false
}
