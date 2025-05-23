import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

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
            istok: ['"Istok Web"', 'sans-serif'],
            pinyon: ['"Pinyon Script"', 'cursive'],
        },
        colors: {
            cream: '#FFFDD0',
            olive: '#8E8A46',
        }
        },
    },
    plugins: [],
};
