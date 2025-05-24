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
        'rouge-orange': '#EF4444',
        'gris-fonce': '#374151',
        'blanc-casse': '#FAFAFA',
        'jaune-soleil': '#FACC15',
        'bleu-turquoise': '#06B6D4',
      },
    },
  },
  plugins: [],
}
