import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import svgLoader from 'vite-svg-loader'; // Импортируем vite-svg-loader

export default defineConfig({
  plugins: [
    // Плагин для Laravel
    laravel({
      input: [
        'resources/js/app.js', // Основной файл приложения
      ],
      refresh: true, // Автоматическое обновление при изменении файлов
    }),

    // Плагин для Vue
    vue({
      template: {
        transformAssetUrls: {
          base: null,
          includeAbsolute: false,
        },
      },
    }),

    // Плагин для загрузки SVG как компонентов
    svgLoader(),
  ],

  resolve: {
    alias: {
      // Алиас для Vue
      vue: 'vue/dist/vue.esm-bundler.js',

      // Алиасы для удобства импорта (опционально)
      '@': '/resources/js', // Пример: import MyComponent from '@/components/MyComponent.vue'
      '~': '/resources',    // Пример: import styles from '~/css/app.css'
    },
  },

  // Оптимизация сборки (опционально)
  build: {
    manifest: true,
    outDir: 'public/build',
    chunkSizeWarningLimit: 1000, // Увеличиваем лимит для предупреждений о размере чанков
    rollupOptions: {
      output: {
        manualChunks: {
          vue: ['vue', 'vue-router', 'pinia'],
          lodash: ['lodash'],
        },
      },
    },
  },

  // Настройки сервера разработки (опционально)
  server: {
    hmr: {
      host: 'localhost', // Хост для HMR (Hot Module Replacement)
    },
    watch: {
      usePolling: true, // Полезно для Docker или WSL
    },
  },
});