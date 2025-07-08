<x-layouts.admin title="{{ $item->judul }}">
    <x-main.layouts.breadcrumb :items="[
        ['title' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['title' => 'Media'],
        ['title' => ucfirst($type), 'url' => route('admin.media.berita.index', $type)],
        ['title' => 'Detail'],
    ]" />

    <x-main.cards.content-card title="Detail {{ $type == 'berita' ? 'Berita' : 'Artikel' }}">
        <x-slot:header>
            <div class="flex space-x-2">
                <x-main.buttons.action-button variant="primary" icon="pencil"
                    href="{{ route('admin.media.berita.edit', [$type, $item->id]) }}">
                    Edit
                </x-main.buttons.action-button>
                @if ($item->status == 'publish')
                    <x-main.buttons.action-button variant="success" icon="eye" href="#" target="_blank">
                        Lihat
                    </x-main.buttons.action-button>
                @endif
                <x-main.buttons.action-button variant="secondary" icon="arrow-left"
                    href="{{ route('admin.media.berita.index', $type) }}">
                    Kembali
                </x-main.buttons.action-button>
            </div>
        </x-slot:header>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="md:col-span-2">
                <div class="mb-6">
                    <h3 class="text-sm font-medium text-gray-500">Judul</h3>
                    <p class="mt-1 text-xl font-semibold">{{ $item->judul }}</p>
                </div>

                <div class="mb-6">
                    <h3 class="text-sm font-medium text-gray-500">Kategori</h3>
                    <p class="mt-1 text-lg">
                        <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">
                            {{ $item->kategori->nama }}
                        </span>
                    </p>
                </div>

                <div class="mb-6">
                    <h3 class="text-sm font-medium text-gray-500">Isi Konten</h3>
                    <div class="mt-3 prose max-w-none">
                        {!! $item->isi !!}
                    </div>
                </div>
            </div>

            <div>
                <!-- Thumbnail Section -->
                <div class="mb-6 border rounded-lg overflow-hidden">
                    <div class="bg-gray-50 px-4 py-3 border-b">
                        <h3 class="font-medium text-gray-700">Thumbnail</h3>
                    </div>
                    <div class="p-4">
                        @if ($item->thumbnail)
                            @if (filter_var($item->thumbnail->media_url, FILTER_VALIDATE_URL))
                                <img src="{{ $item->thumbnail->media_url }}" alt="Thumbnail"
                                    class="w-full h-auto rounded">
                            @else
                                <img src="{{ Storage::url($item->thumbnail->media_url) }}" alt="Thumbnail"
                                    class="w-full h-auto rounded">
                            @endif
                        @else
                            <div class="bg-gray-100 h-40 flex items-center justify-center text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        @endif
                        @if ($item->thumbnail && $item->thumbnail->caption)
                            <p class="mt-2 text-sm text-gray-600 text-center">
                                {{ $item->thumbnail->caption }}
                            </p>
                        @endif
                    </div>
                </div>

                <!-- Metadata Section -->
                <div class="mb-6 border rounded-lg overflow-hidden">
                    <div class="bg-gray-50 px-4 py-3 border-b">
                        <h3 class="font-medium text-gray-700">Informasi</h3>
                    </div>
                    <div class="p-4 space-y-4">
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Penulis</h3>
                            <p class="mt-1 text-base">{{ $item->penulis }}</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Status</h3>
                            <p class="mt-1">
                                @if ($item->status == 'publish')
                                    <span
                                        class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">
                                        Dipublikasikan
                                    </span>
                                @elseif($item->status == 'draft')
                                    <span
                                        class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs font-medium">
                                        Draft
                                    </span>
                                @else
                                    <span class="px-2 py-1 bg-gray-100 text-gray-800 rounded-full text-xs font-medium">
                                        Diarsipkan
                                    </span>
                                @endif
                            </p>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Featured</h3>
                            <p class="mt-1">
                                @if ($item->featured)
                                    <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-medium">
                                        Ya
                                    </span>
                                @else
                                    <span class="px-2 py-1 bg-gray-100 text-gray-800 rounded-full text-xs font-medium">
                                        Tidak
                                    </span>
                                @endif
                            </p>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Dibuat Pada</h3>
                            <p class="mt-1 text-base">{{ $item->created_at->format('d M Y, H:i') }}</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Diperbarui Pada</h3>
                            <p class="mt-1 text-base">{{ $item->updated_at->format('d M Y, H:i') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Gallery Section -->
                @if ($item->galeri->count() > 0)
                    <div class="mb-6 border rounded-lg overflow-hidden">
                        <div class="bg-gray-50 px-4 py-3 border-b">
                            <h3 class="font-medium text-gray-700">Galeri ({{ $item->galeri->count() }})</h3>
                        </div>
                        <div class="p-4">
                            <div class="grid grid-cols-2 gap-2">
                                @foreach ($item->galeri as $galleryItem)
                                    <div class="relative group">
                                        @if (filter_var($galleryItem->media_url, FILTER_VALIDATE_URL))
                                            <img src="{{ $galleryItem->media_url }}" alt="Gallery image"
                                                class="w-full h-24 object-cover rounded">
                                        @else
                                            <img src="{{ Storage::url($galleryItem->media_url) }}" alt="Gallery image"
                                                class="w-full h-24 object-cover rounded">
                                        @endif
                                        @if ($galleryItem->caption)
                                            <div
                                                class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity rounded">
                                                <p class="text-white text-xs text-center px-2">
                                                    {{ $galleryItem->caption }}</p>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </x-main.cards.content-card>
</x-layouts.admin>

@push('styles')
    <style>
        .prose {
            color: #374151;
            max-width: 65ch;
            font-size: 1rem;
            line-height: 1.75;
        }

        .prose p {
            margin-top: 1.25em;
            margin-bottom: 1.25em;
        }

        .prose img {
            max-width: 100%;
            height: auto;
            border-radius: 0.375rem;
        }

        .prose h2 {
            color: #111827;
            font-weight: 600;
            font-size: 1.5em;
            margin-top: 2em;
            margin-bottom: 1em;
            line-height: 1.3;
        }

        .prose h3 {
            color: #111827;
            font-weight: 600;
            font-size: 1.25em;
            margin-top: 1.6em;
            margin-bottom: 0.6em;
            line-height: 1.6;
        }

        .prose ul {
            list-style-type: disc;
            padding-left: 1.5em;
            margin-top: 1.25em;
            margin-bottom: 1.25em;
        }

        .prose ol {
            list-style-type: decimal;
            padding-left: 1.5em;
            margin-top: 1.25em;
            margin-bottom: 1.25em;
        }

        .prose a {
            color: #3b82f6;
            text-decoration: underline;
            font-weight: 500;
        }

        .prose table {
            width: 100%;
            table-layout: auto;
            text-align: left;
            margin-top: 2em;
            margin-bottom: 2em;
            font-size: 0.875em;
            line-height: 1.7142857;
        }

        .prose thead {
            border-bottom-width: 1px;
            border-bottom-color: #e5e7eb;
        }

        .prose thead th {
            color: #111827;
            font-weight: 600;
            vertical-align: bottom;
            padding-right: 0.5714286em;
            padding-bottom: 0.5714286em;
            padding-left: 0.5714286em;
        }

        .prose tbody tr {
            border-bottom-width: 1px;
            border-bottom-color: #e5e7eb;
        }

        .prose tbody tr:last-child {
            border-bottom-width: 0;
        }

        .prose tbody td {
            vertical-align: top;
            padding-top: 0.5714286em;
            padding-right: 0.5714286em;
            padding-bottom: 0.5714286em;
            padding-left: 0.5714286em;
        }
    </style>
@endpush
