import { defineStore } from 'pinia'

interface Loader {
  status: boolean
  route: string
}

interface LoaderMain {
  status: boolean
  cached: string[]
}

interface General {
  data: any
  loading: boolean
}

interface AppStore {
  general: General
  loader: LoaderMain
}

export const useAppStore = defineStore('app', {
  state: (): AppStore => ({
    general: {
      data: {
        information: {},
        primaryMenu: []
      },
      loading: true
    },
    loader: {
      status: true,
      cached: []
    }
  }),
  getters: {
    loaderCached(): string[] {
      return this.loader.cached
    },
    loaderStatus(): boolean {
      return this.loader.status
    },
    generalPrimaryMenu(): any[] {
      return this.general.data.primaryMenu
    },
    api(): string {
      const hostname = window.location.hostname;
      const protocol = window.location.protocol;

      return import.meta.env.VITE_APP_API ?? `${protocol}//${hostname}/wp-json/custom/v1`
    }
  },
  actions: {
    updateLoader(payload: Loader): void {
      this.loader.status = payload.status

      if (!payload.status && !this.loader.cached.includes(payload.route)) {
        this.loader.cached.push(payload.route)
      }
    },
    async getGeneralData(): Promise<void> {
      const response = await fetch(`${this.api}/pages/general/?type=general`)

      if (response.status === 201 || response.status < 300) {
        const { data } = await response.json()

        this.general.data.information = data.information
        this.general.data.primaryMenu = data.primary_menu
        this.general.loading = false
      }
    }
  }
})
