/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
        './resources/css/**/*.css',
    ],
    theme: {
        extend: {
            fontFamily: {
                'poppins': ['Poppins', 'sans-serif'],
                'montserrat': ['Montserrat', 'sans-serif'],
            },
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
                'bmkg-blue': '#164E87',
                'bmkg-light-blue': '#0ea5e9',
                'bmkg-cyan': '#06b6d4',
            },
            gradientColorStops: theme => ({
                ...theme('colors'),
                'bmkg-blue': '#164E87',
                'bmkg-light-blue': '#0ea5e9',
                'bmkg-cyan': '#06b6d4',
            }),
            keyframes: {
                fadeIn: {
                    '0%': { opacity: '0' },
                    '100%': { opacity: '1' },
                },
                float: {
                    '0%, 100%': { transform: 'translateY(0)' },
                    '50%': { transform: 'translateY(-20px)' },
                },
                slideUp: {
                    '0%': { transform: 'translateY(40px)', opacity: '0' },
                    '100%': { transform: 'translateY(0)', opacity: '1' },
                },
                slideInLeft: {
                    '0%': { transform: 'translateX(-40px)', opacity: '0' },
                    '100%': { transform: 'translateX(0)', opacity: '1' },
                },
                slideInRight: {
                    '0%': { transform: 'translateX(40px)', opacity: '0' },
                    '100%': { transform: 'translateX(0)', opacity: '1' },
                },
            },
            animation: {
                'fade-in': 'fadeIn 0.8s ease-out',
                'slide-up': 'slideUp 0.8s ease-out',
                'slide-in-left': 'slideInLeft 0.8s ease-out',
                'slide-in-right': 'slideInRight 0.8s ease-out',
                'float': 'float 3s ease-in-out infinite',
                'pulse-slow': 'pulse 3s ease-in-out infinite',
            }
        }
    },
    plugins: [],
    safelist: [
        'from-bmkg-blue', 'via-bmkg-light-blue', 'to-bmkg-cyan',
        'bg-bmkg-blue', 'bg-bmkg-light-blue', 'bg-bmkg-cyan',
        'text-bmkg-blue', 'text-bmkg-light-blue', 'text-bmkg-cyan',
        'border-bmkg-blue', 'border-bmkg-light-blue', 'border-bmkg-cyan',
    ],
};
