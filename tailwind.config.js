import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                "koeuk": '#3490dc',
                secondary: '#ffcc00',
                danger: '#e74c3c',
                success: '#2ecc71',
                warning: '#f1c40f',
                info: '#34495e',
                light: '#f7f9fa',
                dark: '#343a40',
            }
        },
    },
    plugins: [],
};










// import { defineConfig } from "vite";
// import tailwindcss from "@tailwindcss/vite";
// export default defineConfig({
//     plugins: [
//         tailwindcss(),
//         // …
//     ],
// });

