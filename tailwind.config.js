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
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'oogvereniging-white': '#FFFFFF',
                'oogvereniging-black': '#000000',
                'oogvereniging-creme': '#F7F4F2',
                'oogvereniging-blue': '#00008B',
                'oogvereniging-blue-alt': '#3498DB',
                'oogvereniging-red': '#B11031',
                'oogvereniging-purple': '#663399'
            },
            width: {
               '4,5/10': '45%'
            },
            minWidth: {
                '1/4': '25%',
                '150': '150px'
            }
        },
    },

    plugins: [forms],
};
