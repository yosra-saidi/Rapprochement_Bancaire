// vite.config.js
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

// export default defineConfig({
//     plugins: [
//         laravel({
//             input: [
//                 'resources/css/app.css',
//                 'resources/js/app.js',
//                 'node_modules/@fortawesome/fontawesome-free/css/all.css', // Ajoutez cette ligne
//             ],
//             refresh: true,
//         }),
//     ],
    
// });
// vite.config.js
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'node_modules/@fortawesome/fontawesome-free/css/all.css', // Ajoutez cette ligne
            ],
            refresh: true,
        }),
    ],
});

