<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'BMKG Stasiun Klimatologi Riau')</title>
    @yield('meta')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts - Montserrat, Nunito & Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Nunito:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico">
    <!-- Tailwind Config -->
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes float {
            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .gradient-text {
            background: linear-gradient(135deg, #164e87, #0ea5e9);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .card-hover {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card-hover:hover {
            transform: translateY(-12px) scale(1.02);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        }

        .section-reveal {
            opacity: 0;
            transform: translateY(50px);
            transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .section-reveal.revealed {
            opacity: 1;
            transform: translateY(0);
        }

        .nav-dot {
            transition: all 0.3s ease;
        }

        .nav-dot.active {
            background: linear-gradient(135deg, #164e87, #0ea5e9);
            transform: scale(1.2);
        }

        .parallax-bg {
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .timeline-line {
            background: linear-gradient(to bottom, #164e87, #0ea5e9, #06b6d4);
        }

        html {
            scroll-behavior: smooth;
        }

        .sticky-nav {
            position: fixed;
            top: 50%;
            right: 2rem;
            transform: translateY(-50%);
            z-index: 40;
        }

        @media (max-width: 768px) {
            .sticky-nav {
                display: none;
            }
        }

        .content-section {
            opacity: 1;
            transition: opacity 0.3s ease-in-out;
        }

        .content-section.hidden {
            opacity: 0;
            pointer-events: none;
        }

        .content-section.active {
            opacity: 1;
            pointer-events: auto;
        }
    </style>
    @stack('styles')
</head>

<body class="bg-gradient-to-br from-slate-50 to-blue-50 font-montserrat">
    @include('components.before-login.header')

    <main>
        @yield('content')
    </main>

    @include('components.before-login.footer')
    @stack('scripts')
</body>

</html>
