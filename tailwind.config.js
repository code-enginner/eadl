/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './Modules/Dashboard/Resources/**/*.blade.php',
        './Modules/Dashboard/Resources/**/*.js',
        "./node_modules/tw-elements/dist/js/**/*.js",
    ],
    theme: {
        extend: {
            transitionProperty: {
                'max-height': 'max-height'
            },
            fontFamily: {
                'sans': ['IRANSansX'],
                'yekan': ['IRANYekanX']
            }
        },
    },
    plugins: [
        require("tw-elements/dist/plugin.cjs")
    ],
    darkMode: "class"
}

