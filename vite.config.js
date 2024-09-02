import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/App.scss',
                'resources/js/App.js',
            ],
            refresh: true,
        }),
    ],
});
