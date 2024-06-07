import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/js/editor.js', 'resources/css/meeting/lobby.css', 'resources/css/meeting/main.css', 'resources/css/meeting/room.css'],
            refresh: true,
        }),
    ],
});
