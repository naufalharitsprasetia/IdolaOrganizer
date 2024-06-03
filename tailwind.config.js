/**
 * @format
 * @type {import('tailwindcss').Config}
 */

export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        primary: "#AF8F6F",
        secondary: "#D1BB9E",
        third: "#EAD8C0",
        fourth: "#FFF2E1",
        fifth: "#543310",
        sixth: "#74512D",
        hero: "#594c20f5",
      },
      fontFamily: {
        lato: ["Lato"],
      },
    },
  },
  plugins: [require("@tailwindcss/forms")],
};
