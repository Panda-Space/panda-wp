import { fileURLToPath, URL } from 'node:url'
import { defineConfig, loadEnv } from 'vite'
import vue from '@vitejs/plugin-vue'
import stylelint from 'vite-plugin-stylelint'
import checker from 'vite-plugin-checker'

// https://vitejs.dev/config/
export default ({ mode }) => {
  process.env = { ...process.env, ...loadEnv(mode, process.cwd()) }

  const appMode: string = process.env.VITE_APP_MODE ? process.env.VITE_APP_MODE : ''

  return defineConfig({
    base: ['production', 'staging'].includes(appMode)
      ? `/wp-content/themes/${process.env.VITE_APP_THEME}/app/static/public/${appMode === 'staging' ? 'temp/' : ''}`
      : '/',
    plugins: [
      vue({
        template: {
          compilerOptions: {
            compatConfig: {
              MODE: 3
            }
          }
        }
      }),
      stylelint({
        lintInWorker: true,
        cache: false
      }),
      checker({
        stylelint: {
          lintCommand: 'stylelint ./src/**/*.{css,scss}'
        },
        eslint: {
          lintCommand: 'eslint "./src/**/*.{ts,tsx,vue}"'
        }
      })
    ],
    resolve: {
      alias: {
        '@': fileURLToPath(new URL('./src', import.meta.url)),
        vue: '@vue/compat'
      }
    },
    build: {
      emptyOutDir: true,
      manifest: true,
      outDir:
        process.env.VITE_APP_MODE === 'staging'
          ? '../../app/static/public/temp'
          : '../../app/static/public'
    },
    server: {
      host: process.env.VITE_APP_HOST,
      port: 3000
    }
  })
}
