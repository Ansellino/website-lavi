import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            screens: {
                xs: "475px",
                ...defaultTheme.screens,
            },
            animation: {
                float: "float 3s ease-in-out infinite",
                "fade-in": "fade-in 0.6s ease-out forwards",
            },
            boxShadow: {
                "3xl": "0 35px 60px -15px rgba(0, 0, 0, 0.3)",
            },
            transitionProperty: {
                height: "height",
                spacing: "margin, padding",
            },
            backgroundImage: {
                "gradient-radial": "radial-gradient(var(--tw-gradient-stops))",
            },
            backdropBlur: {
                xs: "2px",
            },
        },
    },
    plugins: [forms, require("@tailwindcss/aspect-ratio")],
};
