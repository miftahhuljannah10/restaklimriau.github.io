@extends('layouts.app')

@section('title', $item->judul . ' - Stasiun Klimatologi Riau')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="max-w-6xl mx-auto">
        <div class="mb-6">
            <a href="{{ route('admin.media.berita.index', $type) }}" class="text-blue-600 hover:underline flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke Daftar {{ $type == 'berita' ? 'Berita' : 'Artikel' }}
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-6 bg-gradient-to-r from-blue-50 to-indigo-50 border-b border-gray-200">
                <div class="flex justify-between items-start">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">
                            Detail {{ $type == 'berita' ? 'Berita' : 'Artikel' }}
                        </h1>
                        <p class="mt-1 text-sm text-gray-600">
                            {{ $item->judul }}
                        </p>
                    </div>
                    <div class="flex space-x-2">
                        <a href="{{ route('admin.media.berita.edit', [$type, $item->id]) }}" 
                           class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                            </svg>
                            Edit
                        </a>
                        @if($item->status == 'publish')
                        <a href="#" target="_blank" 
                           class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                            </svg>
                            Lihat
                        </a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="p-6">
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
                                @if($item->thumbnail)
                                    @if(filter_var($item->thumbnail->media_url, FILTER_VALIDATE_URL))
                                        <img src="{{ $item->thumbnail->media_url }}" alt="Thumbnail" class="w-full h-auto rounded">
                                    @else
                                        <img src="{{ Storage::url($item->thumbnail->media_url) }}" alt="Thumbnail" class="w-full h-auto rounded">
                                    @endif
                                @else
                                <div class="bg-gray-100 h-40 flex items-center justify-center text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                @endif
                                @if($item->thumbnail && $item->thumbnail->caption)
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
                                        @if($item->status == 'publish')
                                        <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">
                                            Dipublikasikan
                                        </span>
                                        @elseif($item->status == 'draft')
                                        <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs font-medium">
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
                                        @if($item->featured)
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
                        @if($item->galeri->count() > 0)
                        <div class="mb-6 border rounded-lg overflow-hidden">
                            <div class="bg-gray-50 px-4 py-3 border-b">
                                <h3 class="font-medium text-gray-700">Galeri ({{ $item->galeri->count() }})</h3>
                            </div>
                            <div class="p-4">
                                <div class="grid grid-cols-2 gap-2">
                                    @foreach($item->galeri as $galleryItem)
                                    <div class="relative group">
                                        @if(filter_var($galleryItem->media_url, FILTER_VALIDATE_URL))
                                        <img src="{{ $galleryItem->media_url }}" alt="Gallery image" class="w-full h-24 object-cover rounded">
                                        @else
                                        <img src="{{ Storage::url($galleryItem->media_url) }}" alt="Gallery image" class="w-full h-24 object-cover rounded">
                                        @endif
                                        @if($galleryItem->caption)
                                        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity rounded">
                                            <p class="text-white text-xs text-center px-2">{{ $galleryItem->caption }}</p>
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
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
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
@endsection