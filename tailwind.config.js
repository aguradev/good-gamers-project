/** @type {import('tailwindcss').Config} */
const colors = require("tailwindcss/colors");

module.exports = {
    content: ["./resources/views/**/*.blade.php"],
    theme: {
        fontFamily: {
            poppins: ["Poppins", "Sans-serif"],
        },

        colors: {
            mainColor: "#080910",
            transparent: "transparent",
            current: "currentColor",
            black: colors.black,
            white: colors.white,
            gray: colors.gray,
            emerald: colors.emerald,
            indigo: colors.indigo,
            yellow: colors.yellow,
            slate: colors.slate,
            blue: colors.blue,
        },

        extend: {},
    },
    plugins: [require("daisyui")],
};
