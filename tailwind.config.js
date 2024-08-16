const { addDynamicIconSelectors } = require('@iconify/tailwind');
/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme');
module.exports = {
  content: ["./**/*.{html,js,php}","*.{html,js,php}"],
  theme: {
    extend: {
      fontFamily: {
        168: ['"Montserrat"', ...defaultTheme.fontFamily.sans]
      },
    },
  },
  plugins: [
    addDynamicIconSelectors(),
  ],
}