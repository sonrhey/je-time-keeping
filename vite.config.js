import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path'

export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/css/app.css',
        'resources/css/time-in/index.css',
        'resources/css/authentication/index.css',
        'resources/js/app.js',
        'resources/js/time-in/index.js',
      ],
      refresh: true,
    }),
  ],
  resolve: {
    alias: {
      '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
    }
  }
});
