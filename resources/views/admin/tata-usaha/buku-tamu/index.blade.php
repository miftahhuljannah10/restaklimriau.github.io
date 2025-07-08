<x-layouts.admin title="Buku Tamu" subtitle="Kelola data kunjungan tamu">

    {{-- Breadcrumb --}}
    <x-main.layouts.breadcrumb :items="[['title' => 'Tata Usaha', 'url' => '#'], ['title' => 'Buku Tamu']]" />

    {{-- Modern Data Table --}}
    <x-main.cards.content-card>
        <div class="overflow-hidden">
            {{-- Table Header with Info and Quick Filters --}}
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Daftar Buku Tamu</h3>
                        <p class="text-sm text-gray-600">Kelola data kunjungan tamu dengan mudah</p>
                    </div>
                    <div class="flex items-center space-x-2 text-sm text-gray-500">
                        <span>Menampilkan <span id="visibleCount">{{ $bukuTamu->count() }}</span> dari
                            {{ $bukuTamu->total() }} data</span>
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
                            <form method="GET" action="{{ route('admin.tata-usaha.buku-tamu.index') }}">
                                <input type="text" name="search" value="{{ request('search') }}"
                                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Cari nama, email, atau keperluan...">
                            </form>
                        </div>
                    </div>

                    <div class="flex items-center space-x-3">
                        <x-main.buttons.action-button href="{{ route('admin.tata-usaha.buku-tamu.create') }}"
                            variant="primary">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                            Tambah Tamu
                        </x-main.buttons.action-button>

                        <button type="button" onclick="exportData()"
                            class="inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                            Export
                        </button>
                    </div>
                </div>
            </div>

            {{-- Flash Messages --}}
            @if (session('success') || session('error') || session('warning'))
                <div class="px-6 py-4 border-b border-gray-200">
                    @if (session('success'))
                        <div class="flex items-center p-4 text-green-800 rounded-lg bg-green-50">
                            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div class="ms-3 text-sm font-medium">{{ session('success') }}</div>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="flex items-center p-4 text-red-800 rounded-lg bg-red-50">
                            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div class="ms-3 text-sm font-medium">{{ session('error') }}</div>
                        </div>
                    @endif
                    @if (session('warning'))
                        <div class="flex items-center p-4 text-yellow-800 rounded-lg bg-yellow-50">
                            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div class="ms-3 text-sm font-medium">{{ session('warning') }}</div>
                        </div>
                    @endif
                </div>
            @endif

            {{-- Filter Info --}}
            @if (request('search'))
                <div class="px-6 py-3 bg-blue-50 border-b border-blue-100">
                    <div class="flex items-center text-sm text-blue-800">
                        <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.5 0L4.232 15.5c-.77.833.192 2.5 1.732 2.5z" />
                        </svg>
                        Menampilkan hasil pencarian untuk "<strong>{{ request('search') }}</strong>".
                        <a href="{{ route('admin.tata-usaha.buku-tamu.index') }}"
                            class="ml-2 text-blue-600 hover:text-blue-800 font-medium">Reset pencarian</a>
                    </div>
                </div>
            @endif

            {{-- Datatables Table Container --}}
            <div class="table-container">
                <table class="min-w-full divide-y divide-gray-200">
                    {{-- Table Header --}}
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                No.
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Data Tamu
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Kontak
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Kunjungan
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Keperluan
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($bukuTamu as $index => $tamu)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $bukuTamu->firstItem() + $index }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div>
                                        <div class="text-sm font-medium text-gray-900">{{ $tamu->nama ?? '-' }}</div>
                                        <div class="text-sm text-gray-500">{{ $tamu->asal ?? '-' }}</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">
                                        @if ($tamu->email)
                                            <div class="flex items-center mb-1">
                                                <svg class="h-4 w-4 text-gray-400 mr-1" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                                <span class="truncate max-w-xs">{{ $tamu->email }}</span>
                                            </div>
                                        @endif
                                        @if ($tamu->no_hp)
                                            <div class="flex items-center">
                                                <svg class="h-4 w-4 text-gray-400 mr-1" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                                    </path>
                                                </svg>
                                                <span class="truncate max-w-xs">{{ $tamu->no_hp }}</span>
                                            </div>
                                        @endif
                                        @if (!$tamu->email && !$tamu->no_hp)
                                            <span class="text-gray-400">-</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    @if ($tamu->tanggal_kunjungan)
                                        <div class="flex items-center">
                                            <svg class="h-4 w-4 text-gray-400 mr-1" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                            {{ \Carbon\Carbon::parse($tamu->tanggal_kunjungan)->format('d M Y') }}
                                        </div>
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900">
                                    <div class="max-w-xs">
                                        @if ($tamu->keperluan)
                                            <div class="truncate" title="{{ $tamu->keperluan }}">
                                                {{ $tamu->keperluan }}
                                            </div>
                                        @else
                                            <span class="text-gray-400">-</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if ($tamu->status)
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                            {{ $tamu->status === 'masuk' ? 'bg-green-100 text-green-800' : ($tamu->status === 'keluar' ? 'bg-red-100 text-red-800' : 'bg-gray-100 text-gray-800') }}">
                                            <span
                                                class="w-1.5 h-1.5 mr-1.5 rounded-full
                                                {{ $tamu->status === 'masuk' ? 'bg-green-400' : ($tamu->status === 'keluar' ? 'bg-red-400' : 'bg-gray-400') }}">
                                            </span>
                                            {{ ucfirst($tamu->status) }}
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                            <span class="w-1.5 h-1.5 mr-1.5 bg-gray-400 rounded-full"></span>
                                            -
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <x-main.datatables.action-buttons :show-route="route('admin.tata-usaha.buku-tamu.show', $tamu)" :edit-route="route('admin.tata-usaha.buku-tamu.edit', $tamu)"
                                        :delete-route="route('admin.tata-usaha.buku-tamu.destroy', $tamu)" :item-name="'tamu ' . ($tamu->nama ?? 'tanpa nama')" />
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-12 whitespace-nowrap text-center">
                                    <div class="flex flex-col items-center">
                                        <svg class="h-12 w-12 text-gray-400 mb-4" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                        <h3 class="text-lg font-medium text-gray-900 mb-1">Tidak ada data tamu</h3>
                                        <p class="text-gray-500 mb-4">
                                            @if (request('search'))
                                                Tidak ditemukan tamu dengan pencarian "{{ request('search') }}"
                                            @else
                                                Belum ada data tamu yang tercatat
                                            @endif
                                        </p>
                                        @if (request('search'))
                                            <a href="{{ route('admin.tata-usaha.buku-tamu.index') }}"
                                                class="text-blue-600 hover:text-blue-500 font-medium">
                                                Tampilkan semua data
                                            </a>
                                        @else
                                            <a href="{{ route('admin.tata-usaha.buku-tamu.create') }}"
                                                class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-lg text-sm font-medium text-white hover:bg-blue-700">
                                                <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                                </svg>
                                                Tambah Tamu Pertama
                                            </a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            @if ($bukuTamu->hasPages())
                <x-main.datatables.pagination :paginator="$bukuTamu" />
            @endif
        </div>
    </x-main.cards.content-card>

    @push('scripts')
        <script>
            function exportData() {
                // Show loading state
                const button = event.target;
                const originalText = button.innerHTML;
                button.innerHTML = `
                <svg class="animate-spin h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Mengexport...
            `;
                button.disabled = true;

                // TODO: Implement actual export functionality
                setTimeout(() => {
                    alert('Fitur export akan segera tersedia!');
                    button.innerHTML = originalText;
                    button.disabled = false;
                }, 1000);
            }
        </script>
    @endpush
</x-layouts.admin>
