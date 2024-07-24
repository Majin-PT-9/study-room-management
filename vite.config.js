import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    build: {
        outDir: 'public/build',
    },
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    server: {
        proxy: {
            // Proxie todas as requisições que começam com /api para o backend do Laravel
            '/api': {
                target: 'http://localhost:8000', // Altere para corresponder à URL do seu backend Laravel
                changeOrigin: true,
                secure: true,
                // Configuração adicional aqui se necessário
            },
            // Se precisar de proxy para outras rotas, não só as que começam com /api, ajuste conforme necessário
        },
    },
    resolve: {
        alias: {
            vue: 'vue/dist/vue.esm-bundler.js',
        },
    },
});
