import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: [
                'resources/views/**',
                'routes/**',
                'app/Http/Controllers/**',
            ],
        }),
    ],
    server: {
        host: '127.0.0.1',
        watch: {
            usePolling: true,
            ignored: (path) => path.includes('{') || path.includes('}'),
        },
    },
    css: {
        preprocessorOptions: {
            scss: {
                quietDeps: true,
                silenceDeprecations: ['import', 'global-builtin', 'color-functions', 'if-function', 'mixed-decls'],
            },
        },
    },
});

