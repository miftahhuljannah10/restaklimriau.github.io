<!DOCTYPE html>
<html lang="id" class="h-full bg-gray-50">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Komponen - Admin Panel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="h-full font-sans antialiased" x-data="{ sidebarOpen: false }">
    <div class="flex h-screen bg-gray-100">
        <x-main.layouts.admin-sidebar />

        <div class="flex-1 flex flex-col overflow-hidden">
            <x-main.layouts.admin-header title="Test Komponen Admin"
                subtitle="Testing semua komponen yang telah dibuat" />

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
                <div class="container mx-auto px-6 py-6">
                    <x-main.layouts.breadcrumb :items="[['title' => 'Test', 'url' => '#'], ['title' => 'Komponen Test']]" />

                    {{-- Flash Messages Test --}}
                    <div class="mb-6">
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4"
                            role="alert">
                            <strong class="font-bold">Success!</strong>
                            <span class="block sm:inline">Komponen berhasil dimuat tanpa error.</span>
                        </div>
                    </div>

                    {{-- Stats Cards Test --}}
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                        <x-main.cards.stats-card title="Total Komponen" value="16" icon="users" color="blue"
                            trend="up" trendValue="100%" />

                        <x-main.cards.stats-card title="Alerts" value="2" icon="inbox" color="green"
                            trend="up" trendValue="5%" />

                        <x-main.cards.stats-card title="Buttons" value="3" icon="outbox" color="yellow"
                            trend="stable" trendValue="0%" />

                        <x-main.cards.stats-card title="Forms" value="5" icon="news" color="purple"
                            trend="up" trendValue="25%" />
                    </div>

                    {{-- Search & Actions Test --}}
                    <x-main.forms.search-input placeholder="Cari data test..." action="#" :showFilters="true">
                        <x-slot name="actions">
                            <x-main.buttons.action-button href="#" variant="primary">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4" />
                                </svg>
                                Test Button
                            </x-main.buttons.action-button>
                        </x-slot>

                        <x-slot name="filters">
                            <div class="grid grid-cols-2 gap-4">
                                <x-main.forms.select label="Kategori" name="category" :options="['komponen' => 'Komponen', 'test' => 'Test']"
                                    placeholder="Pilih kategori..." />

                                <x-main.forms.select label="Status" name="status" :options="['active' => 'Aktif', 'inactive' => 'Tidak Aktif']"
                                    placeholder="Pilih status..." />
                            </div>
                        </x-slot>
                    </x-main.forms.search-input>

                    {{-- Data Table Test --}}
                    <x-main.cards.content-card title="Test DataTable Komponen">
                        <x-main.datatables.basic-table :headers="['No', 'Nama Komponen', 'Kategori', 'Status', 'Aksi']">
                            <tr>
                                <td>1</td>
                                <td>Flash Message</td>
                                <td>Alerts</td>
                                <td><span
                                        class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">Aktif</span>
                                </td>
                                <td>
                                    <x-main.datatables.action-buttons viewUrl="#" editUrl="#" deleteAction="#"
                                        itemId="1" itemName="Flash Message" />
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Action Button</td>
                                <td>Buttons</td>
                                <td><span
                                        class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">Aktif</span>
                                </td>
                                <td>
                                    <x-main.datatables.action-buttons viewUrl="#" editUrl="#" deleteAction="#"
                                        itemId="2" itemName="Action Button" />
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Stats Card</td>
                                <td>Cards</td>
                                <td><span
                                        class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">Aktif</span>
                                </td>
                                <td>
                                    <x-main.datatables.action-buttons viewUrl="#" editUrl="#" deleteAction="#"
                                        itemId="3" itemName="Stats Card" />
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Text Input</td>
                                <td>Forms</td>
                                <td><span
                                        class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">Aktif</span>
                                </td>
                                <td>
                                    <x-main.datatables.action-buttons viewUrl="#" editUrl="#" deleteAction="#"
                                        itemId="4" itemName="Text Input" />
                                </td>
                            </tr>
                        </x-main.datatables.basic-table>

                        {{-- Sample pagination --}}
                        <div class="flex justify-between items-center mt-6 pt-6 border-t border-gray-200">
                            <div class="text-sm text-gray-700">
                                Menampilkan <span class="font-medium">1</span> sampai <span class="font-medium">4</span>
                                dari <span class="font-medium">16</span> hasil
                            </div>
                            <div class="flex gap-2">
                                <span
                                    class="px-3 py-2 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-300 rounded-lg cursor-not-allowed">Previous</span>
                                <span
                                    class="px-3 py-2 text-sm font-medium text-white bg-blue-600 border border-blue-600 rounded-lg">1</span>
                                <a href="#"
                                    class="px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">2</a>
                                <a href="#"
                                    class="px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">3</a>
                                <a href="#"
                                    class="px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">Next</a>
                            </div>
                        </div>
                    </x-main.cards.content-card>

                    {{-- Form Test --}}
                    <x-main.cards.content-card title="Test Form Components" class="mt-6">
                        <form action="#" method="POST" class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <x-main.forms.text-input label="Nama" name="name" placeholder="Masukkan nama"
                                    required="true" />

                                <x-main.forms.text-input label="Email" name="email" type="email"
                                    placeholder="Masukkan email" required="true" />
                            </div>

                            <x-main.forms.select label="Kategori" name="category" :options="['alerts' => 'Alerts', 'buttons' => 'Buttons', 'forms' => 'Forms']"
                                placeholder="Pilih kategori..." required="true" />

                            <x-main.forms.textarea label="Deskripsi" name="description"
                                placeholder="Masukkan deskripsi komponen..." rows="4" />

                            <x-main.forms.file-upload label="Upload File" name="file" accept="image/*" />

                            <div class="flex gap-3">
                                <x-main.buttons.submit-button>
                                    Simpan Data
                                </x-main.buttons.submit-button>

                                <x-main.buttons.action-button href="#" variant="secondary">
                                    Batal
                                </x-main.buttons.action-button>
                            </div>
                        </form>
                    </x-main.cards.content-card>
                </div>
            </main>
        </div>
    </div>
</body>

</html>
