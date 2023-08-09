import { useRoute } from 'vue-router'

export function useIsAtiveMenuItem(routeSlug: string) {
  defineProps(['modelValue'])

  const route = useRoute()

  return route.name ? routeSlug.toLowerCase() === String(route.name).toLowerCase() : false
}
