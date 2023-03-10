import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.scss',
                'resources/js/app.js',
                'node_modules/bootstrap/dist/js/bootstrap.bundle.js',
                'resources/js/header.js',
                'resources/js/token.js',
                'resources/js/explore.js',
            ],
            refresh: true,
        }),
    ],
});
