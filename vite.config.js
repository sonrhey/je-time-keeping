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
        'resources/css/admin/dashboard.css',
        'resources/js/app.js',
        'resources/js/time-in/index.js',
        'resources/js/authentication/index.js',
        'resources/js/admin/index.js',
        'resources/js/admin/pages/dashboard/index.js',
        'resources/js/admin/pages/users/index.js',
        'resources/js/admin/pages/reports/index.js',
        'resources/js/admin/pages/login/index.js',
        'resources/js/teacher/pages/login/index.js',
        'resources/js/teacher/pages/time-in/index.js',
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
