import { defineStore } from 'pinia'

export const useAppStore = defineStore('app', {
  getters: {
    api(): string {
      const hostname = window.location.hostname
      const protocol = window.location.protocol

      return import.meta.env.VITE_APP_API ?? `${protocol}//${hostname}/wp-json/custom/v1`
    }
  },
  actions: {}
})
