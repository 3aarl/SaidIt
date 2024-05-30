import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    "./storage/framework/views/*.php",
    "./resources/views/**/*.blade.php",
    "./resources/js/**/*.vue",
  ],

  theme: {
    extend: {
      colors: {
        text: {
          50: "#111306",
          100: "#22260d",
          200: "#444d19",
          300: "#667326",
          400: "#889933",
          500: "#aabf40",
          600: "#bbcc66",
          700: "#ccd98c",
          800: "#dde6b3",
          900: "#eef2d9",
          950: "#f7f9ec",
        },
        background: {
          50: "#121207",
          100: "#24240f",
          200: "#49491d",
          300: "#6d6d2c",
          400: "#92923a",
          500: "#b6b649",
          600: "#c5c56d",
          700: "#d3d392",
          800: "#e2e2b6",
          900: "#f0f0db",
          950: "#f8f8ed",
        },
        primary: {
          50: "#101306",
          100: "#20270c",
          200: "#404d19",
          300: "#607425",
          400: "#809a32",
          500: "#a0c13e",
          600: "#b3cd65",
          700: "#c6da8b",
          800: "#d9e6b2",
          900: "#ecf3d8",
          950: "#f6f9ec",
        },
        secondary: {
          50: "#06130b",
          100: "#0c2716",
          200: "#194d2c",
          300: "#257442",
          400: "#329a58",
          500: "#3ec16e",
          600: "#65cd8b",
          700: "#8bdaa8",
          800: "#b2e6c5",
          900: "#d8f3e2",
          950: "#ecf9f1",
        },
        accent: {
          50: "#061311",
          100: "#0c2723",
          200: "#194d45",
          300: "#257468",
          400: "#329a8a",
          500: "#3ec1ad",
          600: "#65cdbd",
          700: "#8bdace",
          800: "#b2e6de",
          900: "#d8f3ef",
          950: "#ecf9f7",
        },
      },
      fontSize: {
        sm: "0.750rem",
        base: "1rem",
        xl: "1.333rem",
        "2xl": "1.777rem",
        "3xl": "2.369rem",
        "4xl": "3.158rem",
        "5xl": "4.210rem",
      },
      fontFamily: {
        heading: "Inter",
        body: "Inter",
      },
      fontWeight: {
        normal: "400",
        bold: "700",
      },
    },
  },

  plugins: [forms],
};
