import tailwindcss from "@tailwindcss/vite";
import React from "@vitejs/plugin-react";
import laravel from "laravel-vite-plugin";
import { defineConfig } from "vite";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.jsx"],
            refresh: true,
        }),
        React(),
        tailwindcss(),
    ],
    server: {
        watch: {
            ignored: ["**/storage/framework/views/**"],
        },
    },
});
