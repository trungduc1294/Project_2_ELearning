/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'bg-primary': '#0D131D',

        'primary-blue': '#0D131D',
        'primary-red': '#EC453D',
        'primary-white': '#EC453D',
        'primary-gray': '#4B6273',

        'btn-primary-blue': '#328AF1',

        'pastel-blue': '#2ABDF7',
        'pastel-red': '#F24778',
        'pastel-purple': '#B171C0',
        'pastel-green': '#43C3A7',
        'pastel-yellow': '#FEC238',
        'pastel-gray': '#7991BF',

        'light-blue': '#93D9FC',


        'white': '#ffffff',
        'dark-red': '#8b0000',
        'red-pastel': '#ff6666',
        'blue-pastel-20': '#e6f2ff',
        'light-grey': '#f2f2f2',
        'dark-blue': '#000080',
      },
    },
  },
  variants: {},
  plugins: [],
}

