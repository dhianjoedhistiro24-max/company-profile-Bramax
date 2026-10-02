/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.jsx", 
    "./resources/**/*.css"
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Inter', 'sans-serif'], // <--- Menjadikan Inter sebagai font utama
      },
    },
  },
  plugins: [],
}