<x-layouts.admin title="Kategori Produk" subtitle="Kelola kategori produk">

    {{-- Breadcrumb --}}
    <x-main.layouts.breadcrumb :items="[['title' => 'Produk', 'url' => '#'], ['title' => 'Kategori Produk']]" />

    {{-- Main Content --}}
    <x-main.cards.content-card>
        {{-- Header --}}
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Data Kategori Produk</h3>
                    <p class="text-sm text-gray-600">Kelola kategori produk yang tersedia</p>
                </div>
                <div class="flex items-center space-x-2 text-sm text-gray-500">
                    <span>Total: {{ $categories->total() }} kategori</span>
                </div>
            </div>

            {{-- Quick Actions --}}
            <div
                class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-3 sm:space-y-0 sm:space-x-4">
                <div class="flex-1 max-w-md">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <form method="GET" action="{{ route('kategori-produk.index') }}">
                            <input type="text" name="search" value="{{ request('search') }}"
                                class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Cari nama kategori...">
                        </form>
                    </div>
                </div>

                <div class="flex items-center space-x-3">
                    <x-main.buttons.action-button href="{{ route('kategori-produk.create') }}" variant="primary">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Tambah Kategori
                    </x-main.buttons.action-button>

                    <button type="button" onclick="location.reload()"
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

        {{-- Table --}}
        <div class="overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                No
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nama Kategori
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($categories as $index => $item)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $categories->firstItem() + $index }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $item->nama_kategori }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <x-main.datatables.action-buttons :editUrl="route('kategori-produk.edit', $item->id)" :deleteUrl="route('kategori-produk.destroy', $item->id)"
                                        deleteConfirmText="Yakin ingin menghapus kategori ini?" />
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3"
                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                    <div class="flex flex-col items-center py-8">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 mb-2"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                        </svg>
                                        <p class="text-gray-500">Tidak ada kategori produk ditemukan</p>
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
