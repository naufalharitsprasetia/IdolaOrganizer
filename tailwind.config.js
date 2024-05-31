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
                primary: "#A79277",
                secondary: "#D1BB9E",
                third: "#EAD8C0",
                fourth: "#FFF2E1",
            },
            fontFamily: {
                lato: ["Lato"],
            },
        },
    },
    plugins: [require("@tailwindcss/forms")],
};
