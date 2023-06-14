/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./app/Views/**/*.{html,js,php}"],
  theme: {
    extend: {
      fontFamily: {
        poppins : ['Poppins']
      },
    },
  },
  plugins: [require("daisyui")],
}

