<x-layouts.admin title="Kelola Kategori Berita & Artikel"
    subtitle="Manajemen kategori untuk berita dan artikel situs web">

    {{-- Breadcrumb --}}
    <x-main.layouts.breadcrumb :items="[['title' => 'Kategori Management']]" />

    {{-- Main Content --}}
    <x-main.cards.content-card>
        <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-blue-50 to-indigo-50">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Kategori Berita & Artikel</h3>
                    <p class="text-sm text-gray-600">Kelola kategori untuk berita dan artikel situs web</p>
                </div>
                <div class="flex items-center space-x-2">
                    <x-main.buttons.action-button href="{{ route('admin.kategori-berita-artikel.create') }}"
                        variant="primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd" />
                        </svg>
                        Tambah Kategori
                    </x-main.buttons.action-button>
                </div>
            </div>
        </div>

        <div class="p-6">
            {{-- Flash Messages --}}
            @if (session('success'))
                <div class="mb-6 bg-green-50 border border-green-200 rounded-lg p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-400" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            @if (session('error'))
                <div class="mb-6 bg-red-50 border border-red-200 rounded-lg p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-400" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-red-800">{{ session('error') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            {{-- Data Table --}}
            <div class="overflow-hidden">
                <table id="categories-table" class="min-w-full divide-y divide-gray-200 display" style="width:100%">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                data-orderable="true">
                                Nama Kategori
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                data-orderable="true">
                                Slug
                            </th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider"
                                data-orderable="true">
                                Jumlah Berita
                            </th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider"
                                data-orderable="true">
                                Jumlah Artikel
                            </th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider"
                                data-orderable="true">
                                Dibuat
                            </th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider"
                                data-orderable="false">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($categories as $category)
                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-8 w-8">
                                            <div
                                                class="h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-600"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{ $category->nama }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500 font-mono bg-gray-50 px-2 py-1 rounded">
                                        {{ $category->slug }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <span
                                        class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                        {{ $category->berita_count }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <span
                                        class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        {{ $category->artikel_count }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                                    <div class="flex flex-col">
                                        <span class="font-medium">{{ $category->created_at->format('d M Y') }}</span>
                                        <span
                                            class="text-xs text-gray-400">{{ $category->created_at->format('H:i') }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <x-main.datatables.action-buttons :viewUrl="route('admin.kategori-berita-artikel.show', $category)" :editUrl="route('admin.kategori-berita-artikel.edit', $category)"
                                        :deleteAction="route('admin.kategori-berita-artikel.destroy', $category)" :itemId="$category->id" :itemName="$category->nama" />
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 mb-4"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                        </svg>
                                        <h3 class="text-sm font-medium text-gray-900 mb-1">Belum ada kategori</h3>
                                        <p class="text-sm text-gray-500 mb-4">Silahkan tambah kategori baru untuk
                                            berita dan artikel</p>
                                        <a href="{{ route('admin.kategori-berita-artikel.create') }}"
                                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Tambah Kategori Pertama
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </x-main.cards.content-card>

    {{-- Custom Styles --}}
    @push('styles')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.tailwindcss.min.css">
        <style>
            /* Kolom pencarian */
            .dataTables_filter {
                margin-bottom: 1rem;
            }

            .dataTables_filter label {
                display: flex;
                align-items: center;
                gap: 0.5rem;
                font-size: 0.875rem;
                color: #374151;
                font-weight: 500;
            }

            .dataTables_filter input {
                padding: 0.5rem 0.75rem;
                border: 1px solid #d1d5db;
                border-radius: 0.5rem;
                font-size: 0.875rem;
                background-color: #fff;
                transition: border-color 0.2s, box-shadow 0.2s;
            }

            .dataTables_filter input:focus {
                border-color: #3b82f6;
                outline: none;
                box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.2);
            }

            .dataTables_wrapper .dataTables_paginate .paginate_button {
                cursor: pointer !important;
                pointer-events: auto !important;
                z-index: auto !important;
                user-select: auto !important;
            }

            .dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
                opacity: 0.5;
                pointer-events: none !important;
                cursor: default !important;
            }

            .dataTables_wrapper .dataTables_paginate {
                display: flex;
                gap: 0.25rem;
            }

            .dataTables_wrapper .dataTables_paginate .paginate_button {
                padding: 0.5rem 0.75rem;
                border-radius: 0.375rem;
                background-color: #f9fafb;
                border: 1px solid #d1d5db;
                font-size: 0.875rem;
                color: #374151;
                transition: all 0.2s ease-in-out;
            }

            .dataTables_wrapper .dataTables_paginate .paginate_button:hover:not(.disabled) {
                background-color: #3b82f6;
                color: white;
            }

            .dataTables_wrapper .dataTables_paginate .paginate_button.current {
                background-color: #2563eb !important;
                color: white !important;
            }
        </style>
    @endpush

    {{-- Scripts --}}
    @push('scripts')
        {{-- jQuery & DataTables --}}
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/dataTables.tailwindcss.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#categories-table').DataTable({
                    responsive: true,
                    processing: true,
                    language: {
                        search: "Cari:",
                        lengthMenu: "Tampilkan _MENU_ data per halaman",
                        zeroRecords: "Tidak ada data yang ditemukan",
                        info: "Menampilkan halaman _PAGE_ dari _PAGES_",
                        infoEmpty: "Tidak ada data yang tersedia",
                        infoFiltered: "(difilter dari _MAX_ total data)",
                        paginate: {
                            first: "Pertama",
                            last: "Terakhir",
                            next: "Selanjutnya",
                            previous: "Sebelumnya"
                        },
                        processing: "Memproses data..."
                    },
                    pageLength: 10,
                    lengthMenu: [
                        [10, 25, 50, 100, -1],
                        [10, 25, 50, 100, "Semua"]
                    ],
                    order: [
                        [0, 'asc']
                    ],
                    columnDefs: [{
                            targets: [5], // kolom aksi
                            orderable: false
                        },
                        {
                            targets: [2, 3], // kolom jumlah
                            type: 'num'
                        },
                        {
                            targets: [4], // kolom tanggal
                            type: 'date'
                        }
                    ],
                    dom: '<"flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4"lf>rt<"flex flex-col sm:flex-row sm:items-center sm:justify-between mt-4"ip>',
                    initComplete: function() {
                        // Tambah Tailwind styling
                        $('.dataTables_filter input').addClass('form-input border-gray-300 rounded-md');
                        $('.dataTables_length select').addClass('form-select border-gray-300 rounded-md');
                    }
                });
            });
        </script>
    @endpush


</x-layouts.admin>
