import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import { viteStaticCopy } from 'vite-plugin-static-copy'; // ✅ Important

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        viteStaticCopy({
            targets: [
                {
                    src: [
                        'resources/images/logo.png', 
                        'resources/images/hamburger.svg',
                    ],
                    dest: 'images'
                }
            ]
        }),
        tailwindcss(),
    ],
    // resolve: {
    //     // exemple d'alias import Example from '@/components/Example.js';
    //     alias: {
    //         '@': path.resolve(__dirname, 'resources/js'),
    //     },
    // },
    // server: {
    //     host: 'localhost',
    //     port: 5173,
    // },
});
