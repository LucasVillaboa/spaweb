import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

<<<<<<< HEAD
export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],

=======
// https://vitejs.dev/config/
export default defineConfig({
  plugins: [
    laravel({
      input: ['resources/css/app.css', 'resources/js/app.js'],
      refresh: true,
    }),
  ],
  build: {
    outDir: 'public/dist', // Esto configura el directorio de salida
  },
>>>>>>> 58f0530 (Se agrega Panel)
});