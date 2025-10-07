import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import { viteStaticCopy } from 'vite-plugin-static-copy';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        viteStaticCopy({
            targets: [
                {
                    src: ['resources/images/logo.png', 'resources/images/hamburger.svg', 
                        'resources/images/moon.png', 'resources/images/commander.png',
                        'resources/images/soyuz1.jpg'],
                    dest: 'images'
                }
            ]
        }),
        tailwindcss(),
    ],
});
