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
        outDir: 'public/build',        // ⬅️ Ensure output goes to public/build
        manifest: true,                // ⬅️ Generate manifest.json
        rollupOptions: {
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
        },
        emptyOutDir: true              // Optional: clears old build files
    }
});
