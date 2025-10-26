import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import daisyui from 'daisyui';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                salmao: {
                    dark: '#E2725B', // salmão escuro
                },
                gelo: '#F8FAFC',   // branco gelo
                verde: {
                    DEFAULT: '#2E7D32', // verde principal
                    claro: '#4CAF50',   // verde claro
                },
            },
        },
    },
    plugins: [
        forms,
        daisyui
    ],
    daisyui: {
        themes: ["light"], // só o tema claro
    },
};
