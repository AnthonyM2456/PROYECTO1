import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/nicepage.css',
                'resources/css/Home.css', 
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/nicepage.js',
                'resources/js/jquery-1.9.1.min.js',
            ],
            refresh: true,
        }),
    ],
});
