<x-layouts.admin title="Kelola Klasifikasi Surat" subtitle="Manajemen klasifikasi dan kategorisasi surat">

    {{-- Custom CSS for table --}}
    @push('styles')
        <style>
            .sortable:hover {
                background-color: #f9fafb;
            }

            .sortable .sort-icon {
                transition: transform 0.2s ease;
            }

            .sortable:hover .sort-icon {
                transform: scale(1.1);
            }

            .table-container {
                overflow-x: auto;
            }

            @media (max-width: 768px) {
                .table-container {
                    overflow-x: scroll;
                }
            }
        </style>
    @endpush

    {{-- Breadcrumb --}}
    <x-main.layouts.breadcrumb :items="[['title' => 'Tata Usaha', 'url' => '#'], ['title' => 'Klasifikasi Surat']]" />

    {{-- Modern Data Table --}}
    <x-main.cards.content-card>
        <div class="overflow-hidden">
            {{-- Table Header with Info and Quick Filters --}}
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Daftar Klasifikasi Surat</h3>
                        <p class="text-sm text-gray-600">Kelola klasifikasi dan kategorisasi untuk sistem persuratan</p>
                    </div>
                    <div class="flex items-center space-x-2 text-sm text-gray-500">
                        <span>Menampilkan <span id="visibleCount">{{ $klasifikasi->count() }}</span> dari
                            {{ $klasifikasi->total() }} data</span>
                    </div>
                </div>

                {{-- Quick Search and Actions --}}
                <div
                    class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-3 sm:space-y-0 sm:space-x-4">
                    <div class="flex-1 max-w-md">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input type="text" id="quickSearch"
                                class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Cari klasifikasi surat...">
                        </div>
                    </div>

                    <div class="flex items-center space-x-3">
                        <x-main.buttons.action-button href="{{ route('admin.tata-usaha.klasifikasi-surat.create') }}"
                            variant="primary">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                            Tambah Klasifikasi
                        </x-main.buttons.action-button>

                        <button type="button" id="refreshBtn"
                            class="inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                </path>
                            </svg>
                            Refresh
                        </button>
                    </div>
                </div>
            </div>

            {{-- Flash Message --}}
            <x-main.alerts.flash-message />

            {{-- Datatables Table Container --}}
            <div class="table-container">
                <table class="min-w-full divide-y divide-gray-200">
                    {{-- Table Header --}}
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider sortable cursor-pointer hover:bg-gray-100 transition-colors duration-200"
                                data-sort="kode">
                                <div class="flex items-center space-x-1">
                                    <span>Kode Klasifikasi</span>
                                    <svg class="w-4 h-4 text-gray-400 sort-icon" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                    </svg>
                                </div>
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider sortable cursor-pointer hover:bg-gray-100 transition-colors duration-200"
                                data-sort="nama">
                                <div class="flex items-center space-x-1">
                                    <span>Nama Klasifikasi</span>
                                    <svg class="w-4 h-4 text-gray-400 sort-icon" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                    </svg>
                                </div>
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status & Info
                            </th>
                            <th
                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    {{-- Table Body --}}
                    <tbody class="bg-white divide-y divide-gray-200" id="klasifikasiTableBody">
                        @forelse ($klasifikasi as $item)
                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-shrink-0">
                                            <div
                                                class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full flex items-center justify-center shadow-lg">
                                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-semibold text-gray-900 truncate">
                                                {{ $item->kode }}
                                            </p>
                                            <p class="text-xs text-gray-500">ID: {{ $item->id }}</p>
                                            <div class="flex items-center mt-1">
                                                <span
                                                    class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-indigo-100 text-indigo-800">
                                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                    Kode Klasifikasi
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="space-y-2">
                                        <div class="flex items-center text-sm text-gray-900">
                                            <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                                </path>
                                            </svg>
                                            <span class="truncate font-semibold">{{ $item->nama }}</span>
                                        </div>
                                        <div class="flex items-center text-xs text-gray-500">
                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            Dibuat: {{ $item->created_at->diffForHumans() }}
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="space-y-2">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium ring-1 ring-inset bg-green-100 text-green-800 ring-green-200">
                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            Aktif
                                        </span>
                                        <div class="text-xs text-gray-500">
                                            Kategori persuratan
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <div class="flex items-center justify-center space-x-2">
                                        <x-main.datatables.action-buttons :viewUrl="route('admin.tata-usaha.klasifikasi-surat.show', $item->id)" :editUrl="route('admin.tata-usaha.klasifikasi-surat.edit', $item->id)"
                                            :deleteAction="route('admin.tata-usaha.klasifikasi-surat.destroy', $item->id)" :itemId="$item->id" :itemName="$item->nama" size="sm" />
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-16 text-center">
                                    <div class="flex flex-col items-center space-y-4">
                                        <div
                                            class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center">
                                            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                                </path>
                                            </svg>
                                        </div>
                                        <div class="text-center max-w-md">
                                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Belum ada klasifikasi
                                                surat
                                            </h3>
                                            <p class="text-sm text-gray-500 mb-6">
                                                Sistem belum memiliki data klasifikasi surat. Mulai dengan menambahkan
                                                klasifikasi
                                                pertama untuk mengorganisir sistem persuratan.
                                            </p>
                                            <a href="{{ route('admin.tata-usaha.klasifikasi-surat.create') }}"
                                                class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200 shadow-sm">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                                </svg>
                                                Tambah Klasifikasi Pertama
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Pagination menggunakan komponen yang sudah ada --}}
        <x-main.datatables.pagination :paginator="$klasifikasi" :showInfo="true" />

        {{-- Per Page Selector --}}
        <div class="flex items-center justify-between mt-4 pt-4 border-t border-gray-200">
            <div class="flex items-center space-x-2">
                <label for="perPage" class="text-sm text-gray-700">Tampilkan:</label>
                <select id="perPage" onchange="changePerPage(this.value)"
                    class="block w-20 pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-lg shadow-sm">
                    <option value="10" {{ request('per_page') == 10 || !request('per_page') ? 'selected' : '' }}>
                        10</option>
                    <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                    <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                    <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
                </select>
                <span class="text-sm text-gray-700">per halaman</span>
            </div>

            {{-- Jump to Page Feature --}}
            @if ($klasifikasi->hasPages())
                <div class="flex items-center space-x-2">
                    <span class="text-sm text-gray-600">Lompat ke halaman:</span>
                    <input type="number" id="jumpToPage" min="1" max="{{ $klasifikasi->lastPage() }}"
                        placeholder="{{ $klasifikasi->currentPage() }}"
                        class="w-16 px-2 py-1 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <button onclick="jumpToPage()"
                        class="px-3 py-1 text-sm bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors duration-200">
                        Go
                    </button>
                </div>
            @endif
        </div>
    </x-main.cards.content-card>

    @push('scripts')
        {{-- jQuery untuk functionality --}}
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

        {{-- Set global variables for pagination --}}
        <script>
            window.klasifikasiTableMaxPage = {{ $klasifikasi->lastPage() }};
        </script>

        {{-- Klasifikasi Surat Table Management --}}
        <script>
            $(document).ready(function() {
                // Quick search functionality
                $('#quickSearch').on('input', function() {
                    const searchTerm = $(this).val().toLowerCase();
                    $('#klasifikasiTableBody tr').each(function() {
                        const text = $(this).text().toLowerCase();
                        $(this).toggle(text.indexOf(searchTerm) > -1);
                    });
                    updateVisibleCount();
                });

                // Refresh button
                $('#refreshBtn').on('click', function() {
                    const btn = $(this);
                    const originalHtml = btn.html();
                    btn.html(
                        '<svg class="animate-spin h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>Memuat...'
                    );
                    btn.prop('disabled', true);
                    setTimeout(() => window.location.reload(), 500);
                });

                // Update visible count
                function updateVisibleCount() {
                    const visibleRows = $('#klasifikasiTableBody tr:visible').length;
                    $('#visibleCount').text(visibleRows);
                }

                // Global functions for pagination
                window.changePerPage = function(perPage) {
                    const url = new URL(window.location);
                    url.searchParams.set('per_page', perPage);
                    url.searchParams.set('page', 1);
                    window.location.href = url.toString();
                };

                window.goToPage = function(page) {
                    const url = new URL(window.location);
                    url.searchParams.set('page', page);
                    window.location.href = url.toString();
                };

                window.jumpToPage = function() {
                    const pageInput = $('#jumpToPage');
                    const page = parseInt(pageInput.val());
                    const maxPage = window.klasifikasiTableMaxPage || 1;
                    if (page && page >= 1 && page <= maxPage) {
                        window.goToPage(page);
                    } else {
                        alert('Masukkan nomor halaman yang valid (1-' + maxPage + ')');
                        pageInput.focus();
                    }
                };
            });
        </script>
    @endpush

</x-layouts.admin>
