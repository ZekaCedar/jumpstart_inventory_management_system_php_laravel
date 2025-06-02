import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/sass/app.scss", "resources/js/app.js"],
            refresh: true,
        }),
    ],
    build: {
        outDir: "public/build", // Ensure built assets go here
        manifest: true,
        rollupOptions: {
            input: ["resources/sass/app.scss", "resources/js/app.js"],
        },
    },
});
