import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/custom.scss', //Bootstrap
                'resources/css/app.css', // Debe estar vacio para que lo compile SASS
                'resources/css/app.scss',
                'resources/js/app.js',
                'resources/js/validation.js', 
            ],
            refresh: true,
        }),
    ],
});
