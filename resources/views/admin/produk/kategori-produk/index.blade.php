<x-layouts.admin title="Kategori Produk" subtitle="Kelola kategori produk">

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
    <x-main.layouts.breadcrumb :items="[['title' => 'Produk', 'url' => '#'], ['title' => 'Kategori Produk']]" />

    {{-- Modern Data Table --}}
    <x-main.cards.content-card>
        <div class="overflow-hidden">
            {{-- Table Header with Info and Quick Filters --}}
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Data Kategori Produk</h3>
                        <p class="text-sm text-gray-600">Kelola kategori produk yang tersedia</p>
                    </div>
                    <div class="flex items-center space-x-2 text-sm text-gray-500">
                        <span>Menampilkan <span id="visibleCount">{{ $categories->count() }}</span> dari
                            {{ $categories->total() }} data</span>
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
                                placeholder="Cari kategori...">
                        </div>
                    </div>

                    <div class="flex items-center space-x-3">
                        <x-main.buttons.action-button href="{{ route('kategori-produk.create') }}" variant="primary">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                            Tambah Kategori
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

            {{-- Datatables Table Container --}}
            <div class="table-container">
                <table class="min-w-full divide-y divide-gray-200">
                    {{-- Table Header --}}
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider sortable cursor-pointer hover:bg-gray-100 transition-colors duration-200"
                                data-sort="id">
                                <div class="flex items-center space-x-1">
                                    <span>No</span>
                                    <svg class="w-4 h-4 text-gray-400 sort-icon" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                    </svg>
                                </div>
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider sortable cursor-pointer hover:bg-gray-100 transition-colors duration-200"
                                data-sort="nama_kategori">
                                <div class="flex items-center space-x-1">
                                    <span>Nama Kategori</span>
                                    <svg class="w-4 h-4 text-gray-400 sort-icon" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                    </svg>
                                </div>
                            </th>
                            <th
                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    {{-- Table Body --}}
                    <tbody class="bg-white divide-y divide-gray-200" id="categoryTableBody">
                        @forelse ($categories as $index => $item)
                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $categories->firstItem() + $index }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-shrink-0">
                                            <div
                                                class="w-10 h-10 bg-gradient-to-br from-green-500 to-blue-600 rounded-full flex items-center justify-center shadow-lg">
                                                <span class="text-white text-sm font-bold">
                                                    {{ strtoupper(substr($item->nama_kategori, 0, 1)) }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-semibold text-gray-900 truncate">
                                                {{ $item->nama_kategori }}
                                            </p>
                                            <p class="text-xs text-gray-500">ID: {{ $item->id }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <div class="flex items-center justify-center space-x-2">
                                        <x-main.datatables.action-buttons :deleteAction="route('kategori-produk.destroy', $item->id)" :itemId="$item->id"
                                            :itemName="$item->nama_kategori" size="sm" />
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-16 text-center">
                                    <div class="flex flex-col items-center space-y-4">
                                        <div
                                            class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center">
                                            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                            </svg>
                                        </div>
                                        <div class="text-center max-w-md">
                                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Belum ada kategori
                                                produk
                                            </h3>
                                            <p class="text-sm text-gray-500 mb-6">
                                                Sistem belum memiliki kategori produk. Mulai dengan menambahkan
                                                kategori pertama untuk mengorganisir produk Anda.
                                            </p>
                                            <a href="{{ route('kategori-produk.create') }}"
                                                class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200 shadow-sm">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                                </svg>
                                                Tambah Kategori Pertama
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
        <x-main.datatables.pagination :paginator="$categories" :showInfo="true" />

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
            @if ($categories->hasPages())
                <div class="flex items-center space-x-2">
                    <span class="text-sm text-gray-600">Lompat ke halaman:</span>
                    <input type="number" id="jumpToPage" min="1" max="{{ $categories->lastPage() }}"
                        placeholder="{{ $categories->currentPage() }}"
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
            window.categoryTableMaxPage = {{ $categories->lastPage() }};
        </script>

        {{-- Category Table Management - Simple without DataTables --}}
        <script>
            $(document).ready(function() {
                // Quick search functionality
                $('input[name="search"]').on('input', function() {
                    if (this.value.length >= 3 || this.value.length === 0) {
                        $(this).closest('form').submit();
                    }
                });

                // Handle Enter key for search
                $('input[name="search"]').on('keypress', function(e) {
                    if (e.which === 13) {
                        $(this).closest('form').submit();
                    }
                });

                // Keyboard navigation for pagination
                $(document).on('keydown', function(e) {
                    if (e.altKey || e.ctrlKey || e.metaKey) return;
                    if ($(e.target).is('input, textarea, select')) return;

                    if (e.target.tagName !== 'BODY') return;

                    if (e.key === 'n' || e.key === 'N') {
                        e.preventDefault();
                        const addButton = $('a[href*="create"]').first();
                        if (addButton.length) {
                            window.location.href = addButton.attr('href');
                        }
                    }

                    if (e.key === 'r' || e.key === 'R') {
                        e.preventDefault();
                        location.reload();
                    }

                    if (e.key === 'f' || e.key === 'F') {
                        e.preventDefault();
                        $('input[name="search"]').focus();
                    }

                    if (e.key === '/' || e.key === '?') {
                        e.preventDefault();
                        $('input[name="search"]').focus();
                    }

                    // Pagination navigation with arrow keys
                    if ($('.pagination').length > 0) {
                        switch (e.key) {
                            case 'ArrowLeft':
                                e.preventDefault();
                                const prevLink = $(
                                    'a[aria-label="Previous"], .pagination .page-link[rel="prev"]');
                                if (prevLink.length) prevLink.get(0).click();
                                break;
                            case 'ArrowRight':
                                e.preventDefault();
                                const nextLink = $('a[aria-label="Next"], .pagination .page-link[rel="next"]');
                                if (nextLink.length) nextLink.get(0).click();
                                break;
                        }
                    }
                });

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
                    const maxPage = window.categoryTableMaxPage || 1;
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
