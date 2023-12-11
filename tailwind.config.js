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
        'white': '#ffffff',
        'primary-red': '#ff0000',
        'primary-blue': '#0000ff',
        'dark-red': '#8b0000',
        'red-pastel': '#ff6666',
        'blue-pastel-20': '#e6f2ff',
        'primary-white': '#f2f2f2',
        'light-grey': '#f2f2f2',
        'dark-blue': '#000080',
      },
    },
  },
  variants: {},
  plugins: [],
}

