<x-layouts.admin title="Kelola User" subtitle="Manajemen data pengguna sistem">

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
    <x-main.layouts.breadcrumb :items="[['title' => 'User Management', 'url' => '#'], ['title' => 'Daftar User']]" />

    {{-- Modern Data Table --}}
    <x-main.cards.content-card>
        <div class="overflow-hidden">
            {{-- Table Header with Info and Quick Filters --}}
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Daftar Pengguna</h3>
                        <p class="text-sm text-gray-600">Kelola semua pengguna yang terdaftar di sistem</p>
                    </div>
                    <div class="flex items-center space-x-2 text-sm text-gray-500">
                        <span>Menampilkan <span id="visibleCount">{{ $users->count() }}</span> dari
                            {{ $users->total() }} data</span>
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
                                placeholder="Cari pengguna...">
                        </div>
                    </div>

                    <div class="flex items-center space-x-3">
                        <x-main.buttons.action-button href="{{ route('users.create') }}" variant="primary">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                            Tambah User
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
                                data-sort="name">
                                <div class="flex items-center space-x-1">
                                    <span>Profil</span>
                                    <svg class="w-4 h-4 text-gray-400 sort-icon" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                    </svg>
                                </div>
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider sortable cursor-pointer hover:bg-gray-100 transition-colors duration-200"
                                data-sort="email">
                                <div class="flex items-center space-x-1">
                                    <span>Informasi Kontak</span>
                                    <svg class="w-4 h-4 text-gray-400 sort-icon" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                    </svg>
                                </div>
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider sortable cursor-pointer hover:bg-gray-100 transition-colors duration-200"
                                data-sort="role">
                                <div class="flex items-center space-x-1">
                                    <span>Role & Status</span>
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
                    <tbody class="bg-white divide-y divide-gray-200" id="userTableBody">
                        @forelse ($users as $user)
                            <tr class="hover:bg-gray-50 transition-colors duration-150"
                                data-role="{{ $user->role->name }}">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-shrink-0">
                                            <div
                                                class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center shadow-lg">
                                                <span class="text-white text-lg font-bold">
                                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-semibold text-gray-900 truncate">{{ $user->name }}
                                            </p>
                                            <p class="text-xs text-gray-500">ID: {{ $user->id }}</p>
                                            <div class="flex items-center mt-1">
                                                <span
                                                    class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800">
                                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                    Aktif
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="space-y-2">
                                        <div class="flex items-center text-sm text-gray-900">
                                            <svg class="w-4 h-4 mr-2 text-gray-400" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207">
                                                </path>
                                            </svg>
                                            <span class="truncate">{{ $user->email }}</span>
                                        </div>
                                        <div class="flex items-center text-xs text-gray-500">
                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            Bergabung {{ $user->created_at->diffForHumans() }}
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="space-y-2">
                                        @php
                                            $roleStyles = [
                                                'admin' => 'bg-red-100 text-red-800 ring-red-200',
                                                'pemimpin' => 'bg-purple-100 text-purple-800 ring-purple-200',
                                                'pegawai' => 'bg-green-100 text-green-800 ring-green-200',
                                                'user' => 'bg-blue-100 text-blue-800 ring-blue-200',
                                            ];
                                            $roleIcons = [
                                                'admin' =>
                                                    '<path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>',
                                                'pemimpin' =>
                                                    '<path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"/>',
                                                'pegawai' =>
                                                    '<path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"/>',
                                                'user' =>
                                                    '<path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>',
                                            ];
                                            $roleClass =
                                                $roleStyles[$user->role->name] ??
                                                'bg-gray-100 text-gray-800 ring-gray-200';
                                            $roleIcon = $roleIcons[$user->role->name] ?? $roleIcons['user'];
                                        @endphp
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium ring-1 ring-inset {{ $roleClass }}">
                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                {!! $roleIcon !!}
                                            </svg>
                                            {{ ucfirst($user->role->name) }}
                                        </span>
                                        <div class="text-xs text-gray-500">
                                            Hak akses: {{ $user->role->description ?? 'Standar' }}
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <div class="flex items-center justify-center space-x-2">
                                        <x-main.datatables.action-buttons :viewUrl="route('users.show', $user->id)" :editUrl="route('users.edit', $user->id)"
                                            :deleteAction="route('users.destroy', $user->id)" :itemId="$user->id" :itemName="$user->name" size="sm" />
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
                                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                                </path>
                                            </svg>
                                        </div>
                                        <div class="text-center max-w-md">
                                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Belum ada pengguna
                                            </h3>
                                            <p class="text-sm text-gray-500 mb-6">
                                                Sistem belum memiliki pengguna terdaftar. Mulai dengan menambahkan
                                                pengguna
                                                pertama untuk memulai mengelola sistem.
                                            </p>
                                            <a href="{{ route('users.create') }}"
                                                class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200 shadow-sm">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                                </svg>
                                                Tambah Pengguna Pertama
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
        <x-main.datatables.pagination :paginator="$users" :showInfo="true" />

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
            @if ($users->hasPages())
                <div class="flex items-center space-x-2">
                    <span class="text-sm text-gray-600">Lompat ke halaman:</span>
                    <input type="number" id="jumpToPage" min="1" max="{{ $users->lastPage() }}"
                        placeholder="{{ $users->currentPage() }}"
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
            window.userTableMaxPage = {{ $users->lastPage() }};
        </script>

        {{-- User Table Management - Simple without DataTables --}}
        <script>
            $(document).ready(function() {
                // Quick search functionality
                $('#quickSearch').on('input', function() {
                    const searchTerm = $(this).val().toLowerCase();
                    $('#userTableBody tr').each(function() {
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

                // Jump to page functionality
                $('#jumpToPage').on('keypress', function(e) {
                    if (e.key === 'Enter') {
                        jumpToPage();
                    }
                });

                // Keyboard shortcuts
                $(document).on('keydown', function(e) {
                    if (e.ctrlKey || e.metaKey) {
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

                // Update visible count
                function updateVisibleCount() {
                    const visibleRows = $('#userTableBody tr:visible').length;
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
                    const maxPage = window.userTableMaxPage || 1;
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
