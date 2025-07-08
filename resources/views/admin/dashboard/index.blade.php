<!DOCTYPE html>
<html lang="id" class="h-full bg-gray-50">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Admin Panel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="h-full font-sans antialiased" x-data="{ sidebarOpen: false }">
    <div class="flex h-screen bg-gray-100">
        <x-main.layouts.admin-sidebar />

        <div class="flex-1 flex flex-col overflow-hidden">
            <x-main.layouts.admin-header title="Dashboard" subtitle="Selamat datang di admin panel" />

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
                <div class="container mx-auto px-6 py-6">
                    {{-- Flash Messages --}}
                    <x-main.alerts.flash-message />
                    <x-main.alerts.validation-errors />

                    {{-- Stats Cards --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                        <x-main.cards.stats-card title="Total User" value="150" icon="users" color="blue"
                            trend="up" trendValue="12%" />

                        <x-main.cards.stats-card title="Surat Masuk" value="45" icon="inbox" color="green"
                            trend="up" trendValue="5%" />

                        <x-main.cards.stats-card title="Surat Keluar" value="32" icon="outbox" color="yellow"
                            trend="down" trendValue="2%" />

                        <x-main.cards.stats-card title="Total Berita" value="89" icon="news" color="purple"
                            trend="up" trendValue="8%" />
                    </div>

                    {{-- Content Cards --}}
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <x-main.cards.content-card title="Aktivitas Terbaru">
                            <div class="space-y-4">
                                <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                                    <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-.025C15.5 9.225 12 13 12 13s-3.5-3.775-3.5-8.5a8.5 8.5 0 1117 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">User baru mendaftar</p>
                                        <p class="text-xs text-gray-500">2 menit yang lalu</p>
                                    </div>
                                </div>

                                <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                                    <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">Surat masuk diproses</p>
                                        <p class="text-xs text-gray-500">1 jam yang lalu</p>
                                    </div>
                                </div>
                            </div>
                        </x-main.cards.content-card>

                        <x-main.cards.content-card title="Quick Actions">
                            <div class="grid grid-cols-2 gap-4">
                                <x-main.buttons.action-button href="#" variant="primary" size="lg"
                                    class="justify-center">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4" />
                                    </svg>
                                    Tambah User
                                </x-main.buttons.action-button>

                                <x-main.buttons.action-button href="#" variant="secondary" size="lg"
                                    class="justify-center">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4" />
                                    </svg>
                                    Pengaturan
                                </x-main.buttons.action-button>
                            </div>
                        </x-main.cards.content-card>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>
