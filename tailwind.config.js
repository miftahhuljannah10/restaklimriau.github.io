module.exports = {
    purge: [],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
            colors: {
                primary: {
                    DEFAULT: "#1D4ED8", // Biru institusi
                    light: "#3B82F6",
                    dark: "#1E40AF",
                },
                secondary: {
                    DEFAULT: "#047857", // Hijau klimatologi
                    light: "#059669",
                    dark: "#065F46",
                },
                danger: "#DC2626",
                warning: "#F59E0B",
                success: "#10B981",
            },
            fontFamily: {
                montserrat: ["Montserrat", "sans-serif"],
            },
        },
    },
    variants: {
        extend: {},
    },
    plugins: [],
};
