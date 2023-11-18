import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/app.js', 'resources/css/app.css'],
            refresh: true,

        }),
    ],
    build:{
        outDir:"public/assets",
        rollupOptions:{
            output:{
                entryFileNames: "js/app.js",
                chunkFileNames: "js/chunk.js",
                assetFileNames: '[ext]'+'/'+'[name].[ext]',
            },
        }
    },
    resolve: {
        alias: {
            '$': 'jQuery',
        },
    },
});
