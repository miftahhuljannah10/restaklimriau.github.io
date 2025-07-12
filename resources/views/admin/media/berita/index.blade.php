<x-layouts.admin
    title="{{ ucfirst($type) }} {{ isset($kategoriBeritaArtikel) ? '- ' . $kategoriBeritaArtikel->nama : '' }}"
    subtitle="Kelola {{ $type }} website Stasiun Klimatologi Riau">

    {{-- Breadcrumb --}}
    @if (isset($kategoriBeritaArtikel))
        <x-main.layouts.breadcrumb :items="[
            ['title' => 'Kategori Management', 'url' => route('admin.kategori-berita-artikel.index')],
            [
                'title' => $kategoriBeritaArtikel->nama,
                'url' => route('admin.kategori-berita-artikel.show', $kategoriBeritaArtikel),
            ],
            ['title' => ucfirst($type)],
        ]" />
    @else
        <x-main.layouts.breadcrumb :items="[['title' => 'Media', 'url' => '#'], ['title' => ucfirst($type)]]" />
    @endif

    {{-- Custom CSS --}}
    <style>
        .tab-active {
            background-color: #3b82f6;
            color: white;
        }

        .tab-inactive {
            background-color: #e5e7eb;
            color: #4b5563;
        }

        .badge {
            @apply px-2 py-0.5 text-xs font-semibold rounded-full;
        }

        .badge-success {
            @apply bg-green-100 text-green-800;
        }

        .badge-warning {
            @apply bg-yellow-100 text-yellow-800;
        }

        .badge-danger {
            @apply bg-red-100 text-red-800;
        }
    </style>

    {{-- Main Content --}}
    <x-main.cards.content-card>
        {{-- Content Type Tabs --}}
        <div class="flex border-b border-gray-200">
            <a href="{{ route('admin.media.berita.index', 'berita') }}"
                class="px-6 py-3 font-medium text-sm {{ $type == 'berita' ? 'tab-active' : 'tab-inactive' }}
                  hover:bg-blue-500 hover:text-white transition-colors flex-1 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z"
                        clip-rule="evenodd" />
                    <path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z" />
                </svg>
                Berita
            </a>
            <a href="{{ route('admin.media.berita.index', 'artikel') }}"
                class="px-6 py-3 font-medium text-sm {{ $type == 'artikel' ? 'tab-active' : 'tab-inactive' }}
                  hover:bg-blue-500 hover:text-white transition-colors flex-1 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-1" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                        clip-rule="evenodd" />
                </svg>
                Artikel
            </a>
        </div>

        {{-- Header --}}
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            @if (isset($kategoriBeritaArtikel))
                {{-- Category Filter Header --}}
                <div class="mb-4 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600 mr-2"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                            <div>
                                <h4 class="text-sm font-semibold text-blue-900">Filter Kategori Aktif</h4>
                                <p class="text-sm text-blue-700">Menampilkan {{ $type }} dalam kategori: <span
                                        class="font-medium">{{ $kategoriBeritaArtikel->nama }}</span></p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <a href="{{ route('admin.kategori-berita-artikel.show', $kategoriBeritaArtikel) }}"
                                class="inline-flex items-center px-3 py-2 border border-blue-300 shadow-sm text-sm font-medium rounded-md text-blue-700 bg-white hover:bg-blue-50">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                                Kembali ke Detail Kategori
                            </a>
                            <a href="{{ route('admin.media.berita.index', $type) }}"
                                class="inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Hapus Filter
                            </a>
                        </div>
                    </div>
                </div>
            @endif

            <div class="flex items-center justify-between mb-4">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Data {{ ucfirst($type) }}
                        @if (isset($kategoriBeritaArtikel))
                            <span class="text-blue-600">- {{ $kategoriBeritaArtikel->nama }}</span>
                        @endif
                    </h3>
                    <p class="text-sm text-gray-600">
                        @if (isset($kategoriBeritaArtikel))
                            Menampilkan {{ $type }} dalam kategori {{ $kategoriBeritaArtikel->nama }}
                        @else
                            Kelola {{ $type }} website Stasiun Klimatologi Riau
                        @endif
                    </p>
                </div>
                <div class="flex items-center space-x-2 text-sm text-gray-500">
                    <span>Total: {{ method_exists($items, 'total') ? $items->total() : $items->count() }}
                        {{ $type }}</span>
                </div>
            </div>

            {{-- Quick Actions --}}
            <div
                class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-3 sm:space-y-0 sm:space-x-4">
                <div class="flex-1 max-w-2xl">
                    <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-2">
                        {{-- Search Input --}}
                        <div class="relative flex-1">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <form method="GET" id="filterForm"
                                action="{{ isset($kategoriBeritaArtikel) ? route('admin.kategori-berita-artikel.' . $type, $kategoriBeritaArtikel) : route('admin.media.berita.index', $type) }}">
                                <input type="text" name="search" value="{{ request('search') }}"
                                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Cari judul, penulis, atau kategori...">
                                {{-- Hidden inputs untuk filter lain --}}
                                <input type="hidden" name="kategori_id" value="{{ request('kategori_id') }}">
                                <input type="hidden" name="status" value="{{ request('status') }}">
                                <input type="hidden" name="featured" value="{{ request('featured') }}">
                                <input type="hidden" name="per_page" value="{{ request('per_page', 10) }}">
                            </form>
                        </div>

                        {{-- Filter Dropdowns --}}
                        @if (!isset($kategoriBeritaArtikel))
                            <div class="flex space-x-2">
                                {{-- Category Filter --}}
                                <select name="kategori_filter" id="kategoriFilter"
                                    onchange="applyFilter('kategori_id', this.value)"
                                    class="block w-40 px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-sm {{ request('kategori_id') ? 'bg-blue-50 border-blue-300' : '' }}">
                                    <option value="">Semua Kategori</option>
                                    @if (isset($categories))
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ request('kategori_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->nama }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>

                                {{-- Status Filter --}}
                                <select name="status_filter" id="statusFilter"
                                    onchange="applyFilter('status', this.value)"
                                    class="block w-32 px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-sm {{ request('status') ? 'bg-green-50 border-green-300' : '' }}">
                                    <option value="">Semua Status</option>
                                    <option value="publish" {{ request('status') == 'publish' ? 'selected' : '' }}>
                                        Dipublikasi</option>
                                    <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft
                                    </option>
                                    <option value="archived" {{ request('status') == 'archived' ? 'selected' : '' }}>
                                        Diarsipkan</option>
                                </select>

                                {{-- Featured Filter --}}
                                <select name="featured_filter" id="featuredFilter"
                                    onchange="applyFilter('featured', this.value)"
                                    class="block w-32 px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-sm {{ request('featured') !== null && request('featured') !== '' ? 'bg-yellow-50 border-yellow-300' : '' }}">
                                    <option value="">Semua</option>
                                    <option value="1" {{ request('featured') == '1' ? 'selected' : '' }}>Featured
                                    </option>
                                    <option value="0" {{ request('featured') == '0' ? 'selected' : '' }}>
                                        Non-Featured</option>
                                </select>

                                {{-- Clear Filter Button --}}
                                @if (request()->hasAny(['kategori_id', 'status', 'featured']))
                                    <button type="button" onclick="clearAllFilters()"
                                        class="inline-flex items-center px-3 py-2 border border-red-300 shadow-sm text-sm font-medium rounded-lg text-red-700 bg-red-50 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-red-500 transition-colors duration-200"
                                        title="Hapus semua filter">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                @endif
                            </div>
                        @endif
                    </div>

                    {{-- Active Filters Display --}}
                    @if (request()->hasAny(['search', 'kategori_id', 'status', 'featured']) && !isset($kategoriBeritaArtikel))
                        <div class="flex flex-wrap items-center gap-2 mt-3">
                            <span class="text-sm text-gray-600">Filter aktif:</span>

                            @if (request('search'))
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    Pencarian: "{{ request('search') }}"
                                    <button type="button" onclick="removeFilter('search')"
                                        class="ml-1.5 inline-flex items-center justify-center w-4 h-4 rounded-full text-blue-400 hover:bg-blue-200 hover:text-blue-600">
                                        <svg class="w-2 h-2" stroke="currentColor" fill="none" viewBox="0 0 8 8">
                                            <path stroke-linecap="round" stroke-width="1.5" d="m1 1 6 6m0-6-6 6" />
                                        </svg>
                                    </button>
                                </span>
                            @endif

                            @if (request('kategori_id') && isset($categories))
                                @php
                                    $selectedCategory = $categories->firstWhere('id', request('kategori_id'));
                                @endphp
                                @if ($selectedCategory)
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                                        Kategori: {{ $selectedCategory->nama }}
                                        <button type="button" onclick="removeFilter('kategori_id')"
                                            class="ml-1.5 inline-flex items-center justify-center w-4 h-4 rounded-full text-indigo-400 hover:bg-indigo-200 hover:text-indigo-600">
                                            <svg class="w-2 h-2" stroke="currentColor" fill="none"
                                                viewBox="0 0 8 8">
                                                <path stroke-linecap="round" stroke-width="1.5"
                                                    d="m1 1 6 6m0-6-6 6" />
                                            </svg>
                                        </button>
                                    </span>
                                @endif
                            @endif

                            @if (request('status'))
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    Status: {{ ucfirst(request('status')) }}
                                    <button type="button" onclick="removeFilter('status')"
                                        class="ml-1.5 inline-flex items-center justify-center w-4 h-4 rounded-full text-green-400 hover:bg-green-200 hover:text-green-600">
                                        <svg class="w-2 h-2" stroke="currentColor" fill="none" viewBox="0 0 8 8">
                                            <path stroke-linecap="round" stroke-width="1.5" d="m1 1 6 6m0-6-6 6" />
                                        </svg>
                                    </button>
                                </span>
                            @endif

                            @if (request('featured'))
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                    {{ request('featured') == '1' ? 'Featured' : 'Non-Featured' }}
                                    <button type="button" onclick="removeFilter('featured')"
                                        class="ml-1.5 inline-flex items-center justify-center w-4 h-4 rounded-full text-yellow-400 hover:bg-yellow-200 hover:text-yellow-600">
                                        <svg class="w-2 h-2" stroke="currentColor" fill="none" viewBox="0 0 8 8">
                                            <path stroke-linecap="round" stroke-width="1.5" d="m1 1 6 6m0-6-6 6" />
                                        </svg>
                                    </button>
                                </span>
                            @endif

                            <button type="button" onclick="clearAllFilters()"
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 hover:bg-gray-200">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Hapus Semua
                            </button>
                        </div>
                    @endif
                </div>

                <div class="flex items-center space-x-3">
                    <x-main.buttons.action-button href="{{ route('admin.media.berita.create', $type) }}"
                        variant="primary">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4v16m8-8H4" />
                        </svg>
                        Tambah {{ ucfirst($type) }}
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

        {{-- Flash Messages --}}
        @if (session('success'))
            <div class="mx-6 mt-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-md flex items-center"
                role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd" />
                </svg>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        @if (session('error'))
            <div class="mx-6 mt-4 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-md flex items-center"
                role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                        clip-rule="evenodd" />
                </svg>
                <p>{{ session('error') }}</p>
            </div>
        @endif

        {{-- Table --}}
        <div class="overflow-hidden">
            <div class="p-6">
                <table id="content-table" class="min-w-full divide-y divide-gray-200 stripe hover">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Thumbnail
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Judul
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Kategori
                            </th>
                            <th
                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th
                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Featured
                            </th>
                            <th
                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tanggal
                            </th>
                            <th
                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($items as $item)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex-shrink-0 h-14 w-20">
                                        @if ($item->thumbnail)
                                            <img class="h-14 w-20 object-cover rounded-sm"
                                                src="{{ $item->thumbnail->media_url }}" alt="{{ $item->judul }}">
                                        @else
                                            <div
                                                class="h-14 w-20 bg-gray-200 flex items-center justify-center rounded-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-medium text-gray-900 line-clamp-2">{{ $item->judul }}
                                    </div>
                                    <div class="text-xs text-gray-500">Penulis: {{ $item->penulis }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-indigo-100 text-indigo-800">
                                        {{ $item->kategori->nama }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    @if ($item->status == 'publish')
                                        <span class="badge badge-success">Dipublikasi</span>
                                    @elseif($item->status == 'draft')
                                        <span class="badge badge-warning">Draft</span>
                                    @else
                                        <span class="badge badge-danger">Diarsipkan</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    @if ($item->featured)
                                        <span class="text-green-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        </span>
                                    @else
                                        <span class="text-gray-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                            </svg>
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm">
                                    {{ $item->created_at->format('d/m/Y') }}
                                    <div class="text-xs text-gray-500">{{ $item->created_at->diffForHumans() }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm">
                                    <div class="flex justify-center space-x-1">
                                        <a href="{{ route('admin.media.berita.show', ['type' => $type, 'id' => $item->id]) }}"
                                            class="text-indigo-600 hover:text-indigo-900 p-1 rounded-full hover:bg-indigo-100"
                                            title="Lihat">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>

                                        <a href="{{ route('admin.media.berita.edit', ['type' => $type, 'id' => $item->id]) }}"
                                            class="text-blue-600 hover:text-blue-900 p-1 rounded-full hover:bg-blue-100"
                                            title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>

                                        <form
                                            action="{{ route('admin.media.berita.destroy', ['type' => $type, 'id' => $item->id]) }}"
                                            method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-600 hover:text-red-900 p-1 rounded-full hover:bg-red-100"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus {{ $item->judul }}?')">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-10 text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                        </svg>
                                        <span class="block mt-2 text-gray-500 font-medium">Belum ada
                                            {{ $type == 'berita' ? 'berita' : 'artikel' }}</span>
                                        <p class="text-sm text-gray-500 mt-1">Silahkan tambahkan
                                            {{ $type == 'berita' ? 'berita' : 'artikel' }} baru</p>
                                        <a href="{{ route('admin.media.berita.create', $type) }}"
                                            class="mt-3 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                                            Tambah {{ $type == 'berita' ? 'Berita' : 'Artikel' }} Baru
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Pagination menggunakan komponen yang sudah ada --}}
        @if (method_exists($items, 'hasPages') && $items->hasPages())
            <x-main.datatables.pagination :paginator="$items" :showInfo="true" />

            {{-- Per Page Selector --}}
            <div class="flex items-center justify-between mt-4 pt-4 border-t border-gray-200">
                <div class="flex items-center space-x-2">
                    <label for="perPage" class="text-sm text-gray-700">Tampilkan:</label>
                    <select id="perPage" onchange="changePerPage(this.value)"
                        class="block w-20 pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-lg shadow-sm">
                        <option value="10"
                            {{ request('per_page') == 10 || !request('per_page') ? 'selected' : '' }}>10</option>
                        <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                        <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
                    </select>
                    <span class="text-sm text-gray-700">per halaman</span>
                </div>

                {{-- Jump to Page Feature --}}
                @if ($items->hasPages())
                    <div class="flex items-center space-x-2">
                        <span class="text-sm text-gray-600">Lompat ke halaman:</span>
                        <input type="number" id="jumpToPage" min="1" max="{{ $items->lastPage() }}"
                            placeholder="{{ $items->currentPage() }}"
                            class="w-16 px-2 py-1 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <button onclick="jumpToPage()"
                            class="px-3 py-1 text-sm bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors duration-200">
                            Go
                        </button>
                    </div>
                @endif
            </div>
        @endif
    </x-main.cards.content-card>

    @push('scripts')
        {{-- jQuery untuk functionality --}}
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

        {{-- Set global variables for pagination --}}
        <script>
            window.beritaTableMaxPage = {{ method_exists($items, 'lastPage') ? $items->lastPage() : 1 }};
        </script>

        {{-- Berita Table Management --}}
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

                // Keyboard navigation
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
                    const maxPage = window.beritaTableMaxPage || 1;
                    if (page && page >= 1 && page <= maxPage) {
                        window.goToPage(page);
                    } else {
                        alert('Masukkan nomor halaman yang valid (1-' + maxPage + ')');
                        pageInput.focus();
                    }
                };

                // Filter functions
                window.applyFilter = function(filterName, filterValue) {
                    const url = new URL(window.location);
                    if (filterValue === '' || filterValue === null) {
                        url.searchParams.delete(filterName);
                    } else {
                        url.searchParams.set(filterName, filterValue);
                    }
                    url.searchParams.set('page', 1); // Reset to first page
                    window.location.href = url.toString();
                };

                window.removeFilter = function(filterName) {
                    const url = new URL(window.location);
                    url.searchParams.delete(filterName);
                    url.searchParams.set('page', 1); // Reset to first page
                    window.location.href = url.toString();
                };

                window.clearAllFilters = function() {
                    const url = new URL(window.location);
                    // Keep only the type parameter and essential navigation params
                    const newUrl = new URL(url.origin + url.pathname);
                    if (url.searchParams.get('per_page')) {
                        newUrl.searchParams.set('per_page', url.searchParams.get('per_page'));
                    }
                    window.location.href = newUrl.toString();
                };
            });
        </script>
    @endpush

</x-layouts.admin>
