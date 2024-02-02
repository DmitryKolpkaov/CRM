/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            colors: {
                'black': '#000',
                'purple': '#800080',
            }
        }
    },
    variants: {},
    plugins: [],
}

