<x-layouts.admin title="Kelola Pegawai" subtitle="Manajemen data pegawai institusi">

    {{-- Breadcrumb --}}
    <x-main.layouts.breadcrumb :items="[['title' => 'Pegawai Management', 'url' => '#'], ['title' => 'Daftar Pegawai']]" />

    {{-- Modern Data Table --}}
    <x-main.cards.content-card>
        <div class="overflow-hidden">
            {{-- Table Header with Info and Quick Filters --}}
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Daftar Pegawai</h3>
                        <p class="text-sm text-gray-600">Kelola semua pegawai yang terdaftar di institusi</p>
                    </div>
                    <div class="flex items-center space-x-2 text-sm text-gray-500">
                        <span>Menampilkan {{ $pegawais->count() }} dari {{ $pegawais->total() }} data</span>
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
                            <form method="GET" action="{{ route('pegawai.index') }}">
                                <input type="text" name="search" value="{{ request('search') }}"
                                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Cari pegawai...">
                            </form>
                        </div>
                    </div>

                    <div class="flex items-center space-x-3">
                        <x-main.buttons.action-button href="{{ route('pegawai.create') }}" variant="primary">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                            Tambah Pegawai
                        </x-main.buttons.action-button>
                    </div>
                </div>
            </div>

            {{-- Table Container --}}
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    {{-- Table Header --}}
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Profil Pegawai
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Data Kepegawaian
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Jabatan & Kompetensi
                            </th>
                            <th
                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    {{-- Table Body --}}
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($pegawais as $pegawai)
                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                {{-- Profil Pegawai --}}
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-shrink-0">
                                            @if ($pegawai->foto && filter_var($pegawai->foto, FILTER_VALIDATE_URL))
                                                <img src="{{ $pegawai->foto }}" alt="{{ $pegawai->nama }}"
                                                    class="w-12 h-12 rounded-full object-cover shadow-lg">
                                            @else
                                                <div
                                                    class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center shadow-lg">
                                                    <span class="text-white text-lg font-bold">
                                                        {{ strtoupper(substr($pegawai->nama, 0, 1)) }}
                                                    </span>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-semibold text-gray-900 truncate">{{ $pegawai->nama }}
                                            </p>
                                            <p class="text-xs text-gray-500">{{ $pegawai->email }}</p>
                                            <p class="text-xs text-gray-500">
                                                {{ $pegawai->tempat_lahir }},
                                                {{ \Carbon\Carbon::parse($pegawai->tanggal_lahir)->translatedFormat('d M Y') }}
                                            </p>
                                        </div>
                                    </div>
                                </td>

                                {{-- Data Kepegawaian --}}
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="space-y-1">
                                        <p class="text-sm font-medium text-gray-900">NIP: {{ $pegawai->NIP }}</p>
                                        <p class="text-xs text-gray-500">Golongan: {{ $pegawai->golongan }}</p>
                                        <p class="text-xs text-gray-500">Pendidikan: {{ $pegawai->pendidikan }}</p>
                                    </div>
                                </td>

                                {{-- Jabatan & Kompetensi --}}
                                <td class="px-6 py-4">
                                    <div class="space-y-2">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            {{ $pegawai->jabatan }}
                                        </span>
                                        <p class="text-xs text-gray-600">{{ Str::limit($pegawai->kompetensi, 50) }}</p>
                                        @if ($pegawai->publikasi)
                                            <div class="flex items-center mt-1">
                                                <svg class="w-3 h-3 mr-1 text-green-500" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <span class="text-xs text-green-600">Memiliki Publikasi</span>
                                            </div>
                                        @endif
                                    </div>
                                </td>

                                {{-- Actions --}}
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <div class="flex items-center justify-center space-x-2">
                                        <x-main.datatables.action-buttons
                                        :showView="true" :viewUrl="route('pegawai.show', $pegawai->id)"
                                        :editUrl="route('pegawai.edit', $pegawai->id)" :deleteAction="route('pegawai.destroy', $pegawai->id)"
                                            :itemId="$pegawai->id" :itemName="$pegawai->nama" size="sm" />
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
                                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Belum ada pegawai</h3>
                                            <p class="text-sm text-gray-500 mb-6">
                                                Sistem belum memiliki data pegawai. Mulai dengan menambahkan pegawai
                                                pertama.
                                            </p>
                                            <a href="{{ route('pegawai.create') }}"
                                                class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200 shadow-sm">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                                </svg>
                                                Tambah Pegawai Pertama
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

        {{-- Pagination --}}
        @if ($pegawais->hasPages())
            <x-main.datatables.pagination :paginator="$pegawais" :showInfo="true" />
        @endif
    </x-main.cards.content-card>

</x-layouts.admin>
