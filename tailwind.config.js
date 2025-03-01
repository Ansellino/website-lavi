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
                "grid-pattern": `linear-gradient(to right, rgba(0,0,0,0.1) 1px, transparent 1px),
                                linear-gradient(to bottom, rgba(0,0,0,0.1) 1px, transparent 1px)`,
            },
            backgroundSize: {
                "grid-20": "20px 20px",
            },
            keyframes: {
                float: {
                    "0%, 100%": { transform: "translateY(0)" },
                    "50%": { transform: "translateY(-10px)" },
                },
            },
        },
    },
    plugins: [forms],
};
