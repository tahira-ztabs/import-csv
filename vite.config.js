import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';
import InertiaVitePlugin from 'inertia-vite-plugin';

// https://vitejs.dev/config/
export default defineConfig({
    plugins: [
        vue(),
        InertiaVitePlugin({
        shouldIntercept() {
            return true;
        },
        }),
    ],
    });
