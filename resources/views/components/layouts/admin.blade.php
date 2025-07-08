<!DOCTYPE html>
<html lang="id" class="h-full bg-gray-50">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Admin Panel' }} - Stasiun Klimatologi Biau</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <!-- CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Additional Styles -->
    @stack('styles')

    <style>
        body {
            font-family: 'Poppins', sans-serif !important;
        }
    </style>
</head>

<body class="h-full font-poppins antialiased" x-data="{ sidebarOpen: false }">
    <div class="flex h-screen bg-gray-100">
        {{-- Sidebar --}}
        <x-main.layouts.admin-sidebar />

        {{-- Main Content Area --}}
        <div class="flex-1 flex flex-col overflow-hidden">
            {{-- Header --}}
            <x-main.layouts.admin-header />

            {{-- Page Content --}}
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
                <div class="container mx-auto px-6 py-6">
                    {{-- Breadcrumb (optional) --}}
                    @if (isset($breadcrumbs))
                        <x-main.layouts.breadcrumb :items="$breadcrumbs" />
                    @endif

                    {{-- Flash Messages --}}
                    <x-main.alerts.flash-message />
                    <x-main.alerts.validation-errors />

                    {{-- Page Content --}}
                    {{ $slot }}
                </div>
            </main>

            {{-- Footer --}}
            <x-main.layouts.admin-footer />
        </div>
    </div>

    {{-- Additional Scripts --}}
    @stack('scripts')

    {{-- Global JavaScript --}}
    <script>
        // Global functions untuk admin panel
        window.confirmDelete = function(message = 'Apakah Anda yakin ingin menghapus data ini?') {
            return confirm(message);
        };

        // Auto hide flash messages
        document.addEventListener('DOMContentLoaded', function() {
            const flashMessages = document.querySelectorAll('[data-flash-message]');
            flashMessages.forEach(function(message) {
                setTimeout(function() {
                    if (message && message.parentNode) {
                        message.style.transition = 'opacity 0.5s';
                        message.style.opacity = '0';
                        setTimeout(function() {
                            message.remove();
                        }, 500);
                    }
                }, 5000);
            });
        });
    </script>
</body>

</html>
