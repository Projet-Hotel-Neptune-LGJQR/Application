/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./app/*.php",
        "./app/**/*.php",
        "./app/**/**/*.php",
        "./app/**/**/**/*.php",
        "./app/**/**/**/**/*.php"
    ],
    theme: {
        extend: {},
    },
    plugins: [],
}
