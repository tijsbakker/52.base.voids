import { defineConfig, loadEnv } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import { resolve, relative, isAbsolute } from 'node:path';

const toRelative = (base, target) =>
    isAbsolute(target) ? relative(base, target) : target;

export default defineConfig(({ mode }) => {
    const env = loadEnv(mode, process.cwd(), '');
    const cwd = process.cwd();

    const publicDirectory = env.MODULE_PUBLIC_PATH
        ? toRelative(cwd, env.MODULE_PUBLIC_PATH)
        : '../../public';

    const publicAbs = resolve(cwd, publicDirectory);

    const buildDirectory = env.MODULE_BUILD_PATH
        ? toRelative(publicAbs, env.MODULE_BUILD_PATH)
        : 'build/voids';

    const rawHotFile = env.MODULE_HOT_FILE ?? '../../public/hot-voids';
    const hotFile = isAbsolute(rawHotFile)
        ? relative(cwd, rawHotFile)
        : rawHotFile;

    return {
        build: {
            emptyOutDir: true,
        },
        plugins: [
            laravel({
                publicDirectory,
                buildDirectory,
                hotFile,
                input: [
                    'resources/assets/css/app.css',
                    'resources/assets/js/app.js',
                ],
                refresh: true,
            }),
            tailwindcss(),
        ],
    };
});