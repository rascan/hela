import { defineConfig } from 'vite'

export default defineConfig({
  plugins: [
    laravel('resources/js/app.js', 'resources/css/app.css'),
    vuePlugin({
      template: {
        transformAssetUrls: {
          base: null,
          includeAbsolute: false,
        },
      },
    })
  ],
})
