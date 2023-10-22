import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./node_modules/flowbite/**/*.js"
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            keyframes: {
                progress: {
                  '0%': { transform: 'translateX(-100%)' },
                  '100%': { transform: 'translateX(0)' },
                },
                wiggle: {
                  '0%, 100%': { transform: 'translateX(0)' },
                  '25%': { transform: 'translateX(5%)' },
                  '75%': { transform: 'translateX(-5%)' },
                }
              },
              animation:{
                progress: 'progress 3500ms 1',
                wiggle: 'wiggle 500ms ease-in-out infinite',
              }
        },
    },

    plugins: [
        forms,
        require('flowbite/plugin')
    ],
};
