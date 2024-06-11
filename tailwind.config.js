import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.blade.php',
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        "./vendor/wireui/wireui/src/*.php",
        "./vendor/wireui/wireui/ts/**/*.ts",
        "./vendor/wireui/wireui/src/WireUi/**/*.php",
        "./vendor/wireui/wireui/src/Components/**/*.php",
        './vendor/wireui/wireui/src/View/**/*.php',
        './vendor/wireui/wireui/resources/**/*.blade.php',
    ],
    presets: [
        require("./vendor/wireui/wireui/tailwind.config.js"),
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                boldOrange: {
                    50: '#FFF7E6',
                    100: '#FFEFCC',
                    200: '#FFE099',
                    300: '#FFD166',
                    400: '#FFC233',
                    500: '#FFC107',
                    600: '#CC9906',
                    700: '#997304',
                    800: '#664C03',
                    900: '#332601',
                },
                darkGray: {
                    50: '#F2F2F2',
                    100: '#E6E6E6',
                    200: '#CCCCCC',
                    300: '#B3B3B3',
                    400: '#999999',
                    500: '#343A40',
                    600: '#26292B',
                    700: '#1A1C1E',
                    800: '#0D0E0F',
                    900: '#050505',
                },
                lightGreen: '#dbe5a8',  // (219,229,168)
                grayish: '#c9c9b3',     // (201,201,179)
                tealish: '#21b9c5',     // (33,185,197)
                midGray: '#7e7e7e',     // (126,126,126)
                minty: '#46d4b4',       // (70,212,180)
            },
        },
    },

    plugins: [forms],
};
