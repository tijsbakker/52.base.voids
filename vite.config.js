import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    build: {
        // Allow Vite to clean the outDir outside this module's root.
        emptyOutDir: true,
    },
    plugins: [
        laravel({
            publicDirectory: '../../public',
            buildDirectory: 'build/voids',
            hotFile: '../../public/hot-voids',
            input: [
                'resources/assets/css/app.css',
                'resources/assets/js/app.js',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
