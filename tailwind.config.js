/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./assets/**/*.js",
    "./templates/**/*.html.twig",
  ],
  theme: {
    extend: {
         colors: {
        'bluePerso': '##B0C4DE',
      },
    },
  },
  plugins: [],
}

