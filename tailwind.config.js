// module.exports = {
//   content: ["./public/themes/portfolio/**/*.{php,js}"],
//   theme: {
//     extend: {},
//     fontFamily: {
//       inter: ["inter", "sans-serif"],
//     },
//   },
//   plugins: [require("@tailwindcss/typography")],
// };

module.exports = {
  content: ["./public/themes/**/*.php", "./resources/**/**/*.{js,css}"],
  theme: {
    extend: {},
    fontFamily: {
      inter: ["inter", "sans-serif"],
    },
  },
  plugins: [require("@tailwindcss/typography")],
};
