<x-layouts.admin title="Kelola URL {{ ucfirst($type) }}" subtitle="Manajemen URL {{ ucfirst($type) }} sistem">

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
    <x-main.layouts.breadcrumb :items="[
        ['title' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['title' => 'URL', 'url'. ucfirst($type) => route('url.index', $type)],
    ]" />

    {{-- Modern Data Table --}}
    <x-main.cards.content-card>
        <div class="overflow-hidden">
            {{-- Table Header with Info and Quick Filters --}}
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Daftar URL {{ ucfirst($type) }}</h3>
                        <p class="text-sm text-gray-600">Kelola semua URL {{ $type }} yang terdaftar di sistem</p>
                    </div>
                    <div class="flex items-center space-x-2 text-sm text-gray-500">
                        <span>Menampilkan <span id="visibleCount">{{ $urls->count() }}</span> dari
                            {{ $urls->total() }} data</span>
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
                                placeholder="Cari URL...">
                        </div>
                    </div>

                    <div class="flex items-center space-x-3">
                        {{-- <x-main.buttons.action-button href="{{ route('url.create', $type) }}" variant="primary">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                            Tambah URL
                        </x-main.buttons.action-button> --}}

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
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                No
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider sortable cursor-pointer hover:bg-gray-100 transition-colors duration-200"
                                data-sort="url">
                                <div class="flex items-center space-x-1">
                                    <span>URL</span>
                                    <svg class="w-4 h-4 text-gray-400 sort-icon" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                    </svg>
                                </div>
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider sortable cursor-pointer hover:bg-gray-100 transition-colors duration-200"
                                data-sort="deskripsi">
                                <div class="flex items-center space-x-1">
                                    <span>Deskripsi</span>
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
                    <tbody class="bg-white divide-y divide-gray-200" id="urlTableBody">
                        @forelse ($urls as $index => $url)
                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $urls->firstItem() + $index }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900">
                                    <div class="flex items-center space-x-3">
                                        <div class="flex-shrink-0">
                                            <div class="w-8 h-8 bg-gradient-to-br from-green-500 to-blue-600 rounded-lg flex items-center justify-center shadow-sm">
                                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <a href="{{ $url->url }}" target="_blank"
                                                class="text-blue-600 hover:text-blue-800 font-medium break-all group">
                                                {{ Str::limit($url->url, 60) }}
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 inline ml-1 opacity-60 group-hover:opacity-100"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                                </svg>
                                            </a>
                                            @if(strlen($url->url) > 60)
                                                <p class="text-xs text-gray-500 mt-1" title="{{ $url->url }}">{{ $url->url }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    <div class="max-w-xs">
                                        @if($url->deskripsi)
                                            <p class="truncate" title="{{ $url->deskripsi }}">{{ $url->deskripsi }}</p>
                                        @else
                                            <span class="text-gray-400 italic">Tidak ada deskripsi</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <x-main.datatables.action-buttons
                                        :editUrl="route('url.edit', ['type' => $type, 'id' => $url->id])"
                                        {{-- :deleteAction="route('url.destroy', ['type' => $type, 'id' => $url->id])" --}}
                                        :itemId="$url->id"
                                        :itemName="$url->url" />
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center justify-center space-y-4">
                                        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center">
                                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                                            </svg>
                                        </div>
                                        <div class="text-center">
                                            <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada URL</h3>
                                            <p class="text-gray-500 mb-4">Mulai dengan menambahkan URL {{ $type }} pertama Anda.</p>
                                            {{-- <x-main.buttons.action-button href="{{ route('url.create', $type) }}" variant="primary">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                                </svg>
                                                Tambah URL Pertama
                                            </x-main.buttons.action-button> --}}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            @if ($urls->hasPages())
                <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
                    <x-main.datatables.pagination :paginator="$urls" />
                </div>
            @endif
        </div>
    </x-main.cards.content-card>

    {{-- Quick Search JavaScript --}}
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const quickSearch = document.getElementById('quickSearch');
                const tableBody = document.getElementById('urlTableBody');
                const visibleCount = document.getElementById('visibleCount');
                const refreshBtn = document.getElementById('refreshBtn');

                // Quick search functionality
                if (quickSearch && tableBody) {
                    quickSearch.addEventListener('input', function() {
                        const searchTerm = this.value.toLowerCase();
                        const rows = tableBody.getElementsByTagName('tr');
                        let visibleRows = 0;

                        Array.from(rows).forEach(row => {
                            if (row.querySelector('td')) { // Skip empty state row
                                const url = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                                const description = row.querySelector('td:nth-child(3)').textContent.toLowerCase();

                                if (url.includes(searchTerm) || description.includes(searchTerm)) {
                                    row.style.display = '';
                                    visibleRows++;
                                } else {
                                    row.style.display = 'none';
                                }
                            }
                        });

                        if (visibleCount) {
                            visibleCount.textContent = visibleRows;
                        }
                    });
                }

                // Refresh button
                if (refreshBtn) {
                    refreshBtn.addEventListener('click', function() {
                        window.location.reload();
                    });
                }

                // Sort functionality
                const sortableHeaders = document.querySelectorAll('.sortable');
                sortableHeaders.forEach(header => {
                    header.addEventListener('click', function() {
                        const sortBy = this.dataset.sort;
                        // Add your sort logic here if needed
                        console.log('Sort by:', sortBy);
                    });
                });
            });
        </script>
    @endpush
</x-layouts.admin>
