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
            colors: {
                'primary': {
                    '50': '#eff8ff',
                    '100': '#def0ff',
                    '200': '#b6e4ff',
                    '300': '#75d0ff',
                    '400': '#2cb8ff',
                    '500': '#0092e3',
                    '600': '#007ed4',
                    '700': '#0064ab',
                    '800': '#00548d',
                    '900': '#064774',
                    '950': '#042d4d',
                },
                overlay: 'rgb(var(--color-overlay) / <alpha-value>)',
                background: 'rgb(var(--color-background) / <alpha-value>)',
            },
            fontFamily: {
                sans: ['Satoshi', ...defaultTheme.fontFamily.serif],
            },
        },
    },

    plugins: [forms],
};
