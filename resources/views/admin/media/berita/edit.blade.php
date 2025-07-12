<x-layouts.admin title="Edit {{ $type == 'berita' ? 'Berita' : 'Artikel' }}"
    subtitle="Mengubah {{ strtolower($type == 'berita' ? 'berita' : 'artikel') }} dalam sistem">

    @push('styles')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <style>
            .ck-editor__editable_inline {
                min-height: 300px;
                max-height: 500px;
            }

            .select2-container .select2-selection--single {
                height: 42px;
                border-color: #d1d5db;
                border-radius: 0.375rem;
            }

            .select2-container .select2-selection--single .select2-selection__rendered {
                line-height: 42px;
                padding-left: 12px;
            }

            .select2-container .select2-selection--single .select2-selection__arrow {
                height: 42px;
            }

            .tab-active {
                background-color: #3b82f6;
                color: white;
            }

            .tab-inactive {
                background-color: #e5e7eb;
                color: #4b5563;
            }

            .media-method-active {
                background-color: #f3f4f6;
                border-color: #3b82f6;
            }

            .gallery-preview img {
                max-height: 150px;
                width: auto;
            }
        </style>
    @endpush

    {{-- breadcrumb --}}
    <x-main.layouts.breadcrumb :items="[
        ['title' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['title' => 'Media'],
        ['title' => $type == 'berita' ? 'Berita' : 'Artikel', 'url' => route('admin.media.berita.index', $type)],
        ['title' => 'Edit ' . ($type == 'berita' ? 'Berita' : 'Artikel')],
    ]" />

    <div class="container mx-auto px-4 py-6">
        <div class="mb-6">
            <a href="{{ route('admin.media.berita.index', $type) }}"
                class="text-blue-600 hover:underline flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke Daftar {{ $type == 'berita' ? 'Berita' : 'Artikel' }}
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-6 bg-gradient-to-r from-blue-50 to-indigo-50 border-b border-gray-200">
                <h1 class="text-2xl font-bold text-gray-800">
                    Edit {{ $type == 'berita' ? 'Berita' : 'Artikel' }}
                </h1>
                <p class="mt-1 text-sm text-gray-600">
                    {{ $item->judul }}
                </p>
            </div>

            <!-- Tabs for Content Type -->
            <div class="flex border-b border-gray-200">
                <a href="{{ route('admin.media.berita.edit', ['berita', $item->id]) }}"
                    class="px-6 py-3 font-medium text-sm {{ $type == 'berita' ? 'tab-active' : 'tab-inactive' }}
                      hover:bg-blue-500 hover:text-white transition-colors flex-1 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-1" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z"
                            clip-rule="evenodd" />
                        <path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z" />
                    </svg>
                    Berita
                </a>
                <a href="{{ route('admin.media.berita.edit', ['artikel', $item->id]) }}"
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

            <form action="{{ route('admin.media.berita.update', [$type, $item->id]) }}" method="POST"
                enctype="multipart/form-data" class="p-6">
                @csrf
                @method('PUT')
                <input type="hidden" name="jenis" value="{{ $type }}">

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="md:col-span-2">
                        <div class="mb-6">
                            <label for="judul" class="block text-sm font-medium text-gray-700 mb-1">Judul
                                {{ $type == 'berita' ? 'Berita' : 'Artikel' }} <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="judul" id="judul"
                                value="{{ old('judul', $item->judul) }}"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 @error('judul') border-red-500 @enderror"
                                required>
                            @error('judul')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="kategori_id" class="block text-sm font-medium text-gray-700 mb-1">Kategori <span
                                    class="text-red-500">*</span></label>
                            <select name="kategori_id" id="kategori_id"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 @error('kategori_id') border-red-500 @enderror"
                                required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('kategori_id', $item->kategori_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('kategori_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="isi_editor" class="block text-sm font-medium text-gray-700 mb-1">Isi Konten
                                <span class="text-red-500">*</span></label>
                            <textarea name="isi" id="isi_editor"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 @error('isi') border-red-500 @enderror"
                                rows="12" required>{{ old('isi', $item->isi) }}</textarea>
                            @error('isi')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <!-- Thumbnail Section -->
                        <div class="mb-6 border rounded-lg overflow-hidden">
                            <div class="bg-gray-50 px-4 py-3 border-b">
                                <h3 class="font-medium text-gray-700">Thumbnail</h3>
                            </div>

                            <div class="p-4">
                                <!-- Current Thumbnail Preview -->
                                @if ($item->thumbnail)
                                    <div class="mb-4">
                                        <h4 class="text-sm font-medium text-gray-700 mb-2">Thumbnail Saat Ini</h4>
                                        @if (filter_var($item->thumbnail->media_url, FILTER_VALIDATE_URL))
                                            <img src="{{ $item->thumbnail->media_url }}" alt="Current thumbnail"
                                                class="max-h-40 rounded mb-2">
                                        @else
                                            <img src="{{ Storage::url($item->thumbnail->media_url) }}"
                                                alt="Current thumbnail" class="max-h-40 rounded mb-2">
                                        @endif
                                        <p class="text-sm text-gray-600">{{ $item->thumbnail->caption }}</p>
                                    </div>
                                @endif

                                <div class="flex items-center mb-4">
                                    <input id="update_thumbnail" name="update_thumbnail" type="checkbox" value="1"
                                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                    <label for="update_thumbnail" class="ml-2 block text-sm text-gray-700">
                                        Update thumbnail
                                    </label>
                                </div>

                                <div id="thumbnail-update-container" class="">
                                    <!-- Thumbnail Method Selector -->
                                    <div class="mb-4">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Pilih
                                            metode:</label>
                                        <div class="flex space-x-2">
                                            <label class="flex-1 cursor-pointer">
                                                <input type="radio" name="thumbnail_type" value="url"
                                                    class="sr-only thumbnail-method"
                                                    {{ old('thumbnail_type', $item->thumbnail && filter_var($item->thumbnail->media_url, FILTER_VALIDATE_URL) ? 'url' : 'upload') == 'url' ? 'checked' : '' }}>
                                                <div
                                                    class="border rounded-md p-3 text-center thumbnail-method-option
                                                        {{ old('thumbnail_type', $item->thumbnail && filter_var($item->thumbnail->media_url, FILTER_VALIDATE_URL) ? 'url' : 'upload') == 'url' ? 'media-method-active' : '' }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                                                    </svg>
                                                    <div class="mt-2 text-sm font-medium">URL</div>
                                                </div>
                                            </label>
                                            <label class="flex-1 cursor-pointer">
                                                <input type="radio" name="thumbnail_type" value="upload"
                                                    class="sr-only thumbnail-method"
                                                    {{ old('thumbnail_type', $item->thumbnail && !filter_var($item->thumbnail->media_url, FILTER_VALIDATE_URL) ? 'upload' : 'url') == 'upload' ? 'checked' : '' }}>
                                                <div
                                                    class="border rounded-md p-3 text-center thumbnail-method-option
                                                        {{ old('thumbnail_type', $item->thumbnail && !filter_var($item->thumbnail->media_url, FILTER_VALIDATE_URL) ? 'upload' : 'url') == 'upload' ? 'media-method-active' : '' }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0l-4 4m4-4v12" />
                                                    </svg>
                                                    <div class="mt-2 text-sm font-medium">Upload</div>
                                                </div>
                                            </label>
                                        </div>
                                    </div>

                                    <!-- URL Input -->
                                    <div id="thumbnail-url-container"
                                        class="{{ old('thumbnail_type', $item->thumbnail && filter_var($item->thumbnail->media_url, FILTER_VALIDATE_URL) ? 'url' : 'upload') != 'url' ? 'hidden' : '' }}">
                                        <div class="mb-3">
                                            <label for="thumbnail_url"
                                                class="block text-sm font-medium text-gray-700 mb-1">URL Gambar <span
                                                    class="text-red-500">*</span></label>
                                            <input type="url" name="thumbnail_url" id="thumbnail_url"
                                                value="{{ old('thumbnail_url', $item->thumbnail && filter_var($item->thumbnail->media_url, FILTER_VALIDATE_URL) ? $item->thumbnail->media_url : '') }}"
                                                placeholder="https://example.com/image.jpg"
                                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 @error('thumbnail_url') border-red-500 @enderror">
                                            @error('thumbnail_url')
                                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div id="thumbnail-url-preview"
                                            class="mt-2 {{ old('thumbnail_url', $item->thumbnail && filter_var($item->thumbnail->media_url, FILTER_VALIDATE_URL) ? $item->thumbnail->media_url : '') ? '' : 'hidden' }}">
                                            <img id="thumbnail-url-img"
                                                src="{{ old('thumbnail_url', $item->thumbnail && filter_var($item->thumbnail->media_url, FILTER_VALIDATE_URL) ? $item->thumbnail->media_url : '') }}"
                                                alt="Preview" class="max-h-40 max-w-full mx-auto rounded">
                                        </div>
                                        <p class="text-xs text-gray-500 mt-1">Masukkan URL gambar lengkap (termasuk
                                            https://)
                                        </p>
                                    </div>

                                    <!-- File Upload Input -->
                                    <div id="thumbnail-upload-container"
                                        class="{{ old('thumbnail_type', $item->thumbnail && !filter_var($item->thumbnail->media_url, FILTER_VALIDATE_URL) ? 'upload' : 'url') != 'upload' ? 'hidden' : '' }}">
                                        <div
                                            class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                            <div class="space-y-1 text-center">
                                                <div id="thumbnail-preview" class="hidden mb-3 mx-auto">
                                                    <img class="max-h-40 max-w-full rounded" id="thumbnail-img"
                                                        src="#" alt="Thumbnail preview">
                                                </div>
                                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor"
                                                    fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                    <path
                                                        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                        stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                                <div class="flex text-sm text-gray-600">
                                                    <label for="thumbnail"
                                                        class="relative cursor-pointer rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none">
                                                        <span>Upload gambar</span>
                                                        <input id="thumbnail" name="thumbnail" type="file"
                                                            class="sr-only" accept="image/*">
                                                    </label>
                                                    <p class="pl-1">atau drag dan drop</p>
                                                </div>
                                                <p class="text-xs text-gray-500">PNG, JPG, GIF hingga 2MB</p>
                                            </div>
                                        </div>
                                        @error('thumbnail')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-3">
                                        <label for="thumbnail_caption"
                                            class="block text-sm font-medium text-gray-700 mb-1">Caption Gambar</label>
                                        <input type="text" name="thumbnail_caption" id="thumbnail_caption"
                                            value="{{ old('thumbnail_caption', $item->thumbnail ? $item->thumbnail->caption : '') }}"
                                            placeholder="Deskripsi gambar"
                                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Gallery Section -->
                        <div class="mb-6 border rounded-lg overflow-hidden">
                            <div class="bg-gray-50 px-4 py-3 border-b flex justify-between items-center">
                                <h3 class="font-medium text-gray-700">Galeri Gambar</h3>
                                <button type="button" id="add-gallery-btn"
                                    class="text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Tambah Gambar
                                </button>
                            </div>

                            <div class="p-4">
                                <div id="gallery-container">
                                    <!-- Existing Gallery Items -->
                                    @foreach ($item->galeri as $index => $galleryItem)
                                        <div class="gallery-item mb-4 pb-4 border-b border-gray-200 last:border-0">
                                            <input type="hidden" name="existing_gallery_ids[]"
                                                value="{{ $galleryItem->id }}">
                                            <div class="flex justify-between items-center mb-2">
                                                <label class="block text-sm font-medium text-gray-700">Gambar
                                                    #{{ $index + 1 }}</label>
                                                <div>
                                                    <input type="checkbox" id="delete_gallery_{{ $galleryItem->id }}"
                                                        name="delete_gallery_ids[]" value="{{ $galleryItem->id }}"
                                                        class="h-4 w-4 text-red-600 border-gray-300 rounded focus:ring-red-500">
                                                    <label for="delete_gallery_{{ $galleryItem->id }}"
                                                        class="ml-2 text-sm text-red-600">Hapus</label>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                @if (filter_var($galleryItem->media_url, FILTER_VALIDATE_URL))
                                                    <img src="{{ $galleryItem->media_url }}" alt="Gallery image"
                                                        class="max-h-32 rounded">
                                                @else
                                                    <img src="{{ Storage::url($galleryItem->media_url) }}"
                                                        alt="Gallery image" class="max-h-32 rounded">
                                                @endif
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">Caption
                                                    Gambar</label>
                                                <input type="text" name="existing_gallery_captions[]"
                                                    value="{{ old('existing_gallery_captions.' . $index, $galleryItem->caption) }}"
                                                    placeholder="Deskripsi gambar"
                                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                            </div>
                                        </div>
                                    @endforeach

                                    <!-- New Gallery Items -->
                                    @if (old('gallery_urls'))
                                        @foreach (old('gallery_urls') as $index => $url)
                                            <div class="gallery-item mb-4 pb-4 border-b border-gray-200 last:border-0">
                                                <div class="flex justify-between items-center mb-2">
                                                    <label class="block text-sm font-medium text-gray-700">Gambar Baru
                                                        #{{ $index + 1 }}</label>
                                                    <button type="button"
                                                        class="remove-gallery-btn text-red-500 hover:text-red-700">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                            viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd"
                                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    </button>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="block text-sm font-medium text-gray-700 mb-1">URL
                                                        Gambar <span class="text-red-500">*</span></label>
                                                    <input type="url" name="gallery_urls[]"
                                                        value="{{ $url }}"
                                                        placeholder="https://example.com/gallery-image.jpg"
                                                        class="gallery-url-input w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                                </div>
                                                <div class="gallery-preview mb-3 {{ $url ? '' : 'hidden' }}">
                                                    <img src="{{ $url }}" alt="Preview"
                                                        class="max-h-32 rounded">
                                                </div>
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700 mb-1">Caption
                                                        Gambar</label>
                                                    <input type="text" name="gallery_captions[]"
                                                        value="{{ old('gallery_captions')[$index] ?? '' }}"
                                                        placeholder="Deskripsi gambar"
                                                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif

                                    <div id="empty-gallery-message"
                                        class="{{ $item->galeri->count() > 0 || old('gallery_urls') ? 'hidden' : '' }} text-center py-8 text-gray-500">
                                        Belum ada gambar dalam galeri. Klik "Tambah Gambar" untuk menambahkan.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-6">
                            <label for="penulis" class="block text-sm font-medium text-gray-700 mb-1">Penulis <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="penulis" id="penulis"
                                value="{{ old('penulis', $item->penulis) }}"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 @error('penulis') border-red-500 @enderror"
                                required>
                            @error('penulis')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status
                                    Publikasi</label>
                                <select name="status" id="status"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 @error('status') border-red-500 @enderror"
                                    required>
                                    <option value="publish"
                                        {{ old('status', $item->status) == 'publish' ? 'selected' : '' }}>
                                        Publikasikan</option>
                                    <option value="draft"
                                        {{ old('status', $item->status) == 'draft' ? 'selected' : '' }}>Simpan Draft
                                    </option>
                                    <option value="archived"
                                        {{ old('status', $item->status) == 'archived' ? 'selected' : '' }}>Arsip
                                    </option>
                                </select>
                            </div>

                            <div class="flex items-center mt-7">
                                <input id="featured" name="featured" type="checkbox" value="1"
                                    {{ old('featured', $item->featured) ? 'checked' : '' }}
                                    class="h-5 w-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                <label for="featured" class="ml-2 block text-sm text-gray-700">
                                    Tampilkan di Featured
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 border-t border-gray-200 pt-6">
                    <div class="flex justify-end">
                        <a href="{{ route('admin.media.berita.index', $type) }}"
                            class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 mr-2">
                            Batal
                        </a>
                        <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                            Simpan Perubahan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Gallery Item Template (Hidden) -->
    <template id="gallery-item-template">
        <div class="gallery-item mb-4 pb-4 border-b border-gray-200 last:border-0">
            <div class="flex justify-between items-center mb-2">
                <label class="block text-sm font-medium text-gray-700">Gambar #INDEX</label>
                <button type="button" class="remove-gallery-btn text-red-500 hover:text-red-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
            <div class="mb-3">
                <label class="block text-sm font-medium text-gray-700 mb-1">URL Gambar <span
                        class="text-red-500">*</span></label>
                <input type="url" name="gallery_urls[]" placeholder="https://example.com/gallery-image.jpg"
                    class="gallery-url-input w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            </div>
            <div class="gallery-preview mb-3 hidden">
                <img src="" alt="Preview" class="max-h-32 rounded">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Caption Gambar</label>
                <input type="text" name="gallery_captions[]" placeholder="Deskripsi gambar"
                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            </div>
        </div>
    </template>
    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <!-- Froala Editor -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.4/css/froala_editor.pkgd.min.css"
            rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.4/js/froala_editor.pkgd.min.js"></script>

        <script>
            $(document).ready(function() {
                let editorInstance; // Ini akan menampung instance Froala
                let editorType = 'none';

                // Initialize Select2
                $('#kategori_id').select2({
                    placeholder: "-- Pilih Kategori --",
                    width: '100%'
                });

                // Initialize Froala Editor
                if (typeof FroalaEditor !== 'undefined') {
                    editorInstance = new FroalaEditor('#isi_editor', {
                        height: 400,
                        toolbarButtons: {
                            moreText: {
                                buttons: ['bold', 'italic', 'underline', 'strikeThrough', 'subscript',
                                    'superscript', 'fontFamily', 'fontSize', 'textColor', 'backgroundColor',
                                    'inlineClass', 'inlineStyle', 'clearFormatting'
                                ]
                            },
                            moreParagraph: {
                                buttons: ['alignLeft', 'alignCenter', 'alignRight', 'alignJustify', 'formatOL',
                                    'formatUL', 'paragraphFormat', 'paragraphStyle', 'lineHeight',
                                    'outdent', 'indent', 'quote'
                                ]
                            },
                            moreRich: {
                                buttons: ['insertLink', 'insertImage', 'insertVideo', 'insertTable',
                                    'emoticons', 'fontAwesome', 'specialCharacters', 'embedly',
                                    'insertFile', 'insertHR'
                                ]
                            },
                            moreMisc: {
                                buttons: ['undo', 'redo', 'fullscreen', 'print', 'getPDF', 'spellChecker',
                                    'selectAll', 'html', 'help'
                                ]
                            }
                        },
                        // Events
                        events: {
                            initialized: function() {
                                editorType = 'froala';
                                console.log('Froala Editor initialized');
                            },
                            contentChanged: function() {
                                // Konten otomatis disimpan ke textarea oleh Froala
                            }
                        }
                    });
                } else {
                    console.error('Froala Editor not loaded!');
                    editorType = 'textarea';
                    $('#isi_editor').addClass('h-96').attr('placeholder', 'Gunakan HTML markup untuk formatting');
                }

                // Toggle thumbnail update fields
                $('#update_thumbnail').on('change', function() {
                    if (this.checked) {
                        $('#thumbnail-update-container').removeClass('hidden').show();
                    } else {
                        $('#thumbnail-update-container').addClass('hidden').hide();
                    }
                });

                // Show thumbnail update container by default if checkbox is checked
                if ($('#update_thumbnail').is(':checked')) {
                    $('#thumbnail-update-container').removeClass('hidden').show();
                }

                // Thumbnail type selection
                $(document).on('change', '.thumbnail-method', function() {
                    const type = $(this).val();

                    // Update active class
                    $('.thumbnail-method-option').removeClass('media-method-active');
                    $(this).closest('label').find('.thumbnail-method-option').addClass('media-method-active');

                    // Show/hide containers
                    if (type === 'url') {
                        $('#thumbnail-url-container').removeClass('hidden').show();
                        $('#thumbnail-upload-container').addClass('hidden').hide();
                    } else {
                        $('#thumbnail-url-container').addClass('hidden').hide();
                        $('#thumbnail-upload-container').removeClass('hidden').show();
                    }
                });

                // Initialize thumbnail method (default to URL)
                $('.thumbnail-method[value="url"]').prop('checked', true).trigger('change');

                // Thumbnail URL preview
                $(document).on('input', '#thumbnail_url', function() {
                    const url = $(this).val();
                    if (url) {
                        $('#thumbnail-url-img').attr('src', url).on('error', function() {
                            $(this).attr('src',
                                'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSIjZGRkIi8+PHRleHQgeD0iNTAlIiB5PSI1MCUiIGZvbnQtZmFtaWx5PSJBcmlhbCwgc2Fucy1zZXJpZiIgZm9udC1zaXplPSIxNCIgZmlsbD0iIzk5OSIgdGV4dC1hbmNob3I9Im1pZGRsZSIgZHk9Ii4zZW0iPkdhZ2FsIG1lbXVhdCBnYW1iYXI8L3RleHQ+PC9zdmc+'
                            );
                        });
                        $('#thumbnail-url-preview').removeClass('hidden');
                    } else {
                        $('#thumbnail-url-preview').addClass('hidden');
                    }
                });

                // Thumbnail file preview
                $(document).on('change', '#thumbnail', function() {
                    const file = this.files[0];
                    if (file) {
                        // Validasi file size (max 2MB)
                        if (file.size > 2 * 1024 * 1024) {
                            alert('Ukuran file terlalu besar! Maksimal 2MB.');
                            $(this).val('');
                            return;
                        }

                        // Validasi file type
                        if (!file.type.match('image.*')) {
                            alert('File harus berupa gambar!');
                            $(this).val('');
                            return;
                        }

                        let reader = new FileReader();
                        reader.onload = function(event) {
                            $('#thumbnail-preview').removeClass('hidden');
                            $('#thumbnail-img').attr('src', event.target.result);
                        }
                        reader.readAsDataURL(file);
                    } else {
                        $('#thumbnail-preview').addClass('hidden');
                        $('#thumbnail-img').attr('src', '');
                    }
                });

                // Gallery URL preview
                $(document).on('input', '.gallery-url-input', function() {
                    const url = $(this).val();
                    const $item = $(this).closest('.gallery-item');
                    const $preview = $item.find('.gallery-preview');
                    const $img = $preview.find('img');

                    if (url) {
                        $img.attr('src', url).on('error', function() {
                            $(this).attr('src',
                                'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSIjZGRkIi8+PHRleHQgeD0iNTAlIiB5PSI1MCUiIGZvbnQtZmFtaWx5PSJBcmlhbCwgc2Fucy1zZXJpZiIgZm9udC1zaXplPSIxNCIgZmlsbD0iIzk5OSIgdGV4dC1hbmNob3I9Im1pZGRsZSIgZHk9Ii4zZW0iPkdhZ2FsIG1lbXVhdCBnYW1iYXI8L3RleHQ+PC9zdmc+'
                            );
                        });
                        $preview.removeClass('hidden');
                    } else {
                        $preview.addClass('hidden');
                    }
                });

                // Add gallery item
                let galleryCount =
                    {{ $item->galeri->count() + (old('gallery_urls') ? count(old('gallery_urls')) : 0) }};

                $('#add-gallery-btn').on('click', function() {
                    galleryCount++;
                    const template = $('#gallery-item-template').html().replace(/INDEX/g, galleryCount);
                    $('#gallery-container').append(template);
                    $('#empty-gallery-message').addClass('hidden');
                });

                // Remove gallery item
                $(document).on('click', '.remove-gallery-btn', function() {
                    $(this).closest('.gallery-item').remove();

                    if ($('.gallery-item').length === 0) {
                        $('#empty-gallery-message').removeClass('hidden');
                    }

                    // Update the numbering
                    $('.gallery-item').each(function(index) {
                        $(this).find('label:first').text(`Gambar #${index + 1}`);
                    });
                });

                // Form submission handler
                // Form submission handler - YANG DIUBAH
                $('form').on('submit', function(e) {
                    console.log('Form submission started, editor type:', editorType);

                    // Handle content validation based on editor type
                    if (editorType === 'froala' && editorInstance) {
                        try {
                            const editorData = editorInstance.html.get();
                            console.log('Froala Editor data:', editorData);

                            if (!editorData || !editorData.trim() || editorData === '<p><br></p>') {
                                e.preventDefault();
                                alert('Isi konten tidak boleh kosong!');
                                return false;
                            }
                        } catch (error) {
                            console.error('Error getting Froala Editor data:', error);
                        }
                    } else {
                        // Fallback untuk textarea biasa
                        const textareaData = $('#isi_editor').val();
                        console.log('Textarea data:', textareaData);

                        if (!textareaData.trim()) {
                            e.preventDefault();
                            alert('Isi konten tidak boleh kosong!');
                            return false;
                        }
                    }


                    // Validate form data
                    const judul = $('#judul').val();
                    const kategori = $('#kategori_id').val();
                    const penulis = $('#penulis').val();

                    if (!judul.trim()) {
                        e.preventDefault();
                        alert('Judul tidak boleh kosong!');
                        $('#judul').focus();
                        return false;
                    }

                    if (!kategori) {
                        e.preventDefault();
                        alert('Kategori harus dipilih!');
                        $('#kategori_id').focus();
                        return false;
                    }

                    if (!penulis.trim()) {
                        e.preventDefault();
                        alert('Penulis tidak boleh kosong!');
                        $('#penulis').focus();
                        return false;
                    }

                    // Validate thumbnail if updating
                    if ($('#update_thumbnail').is(':checked')) {
                        const thumbnailType = $('input[name="thumbnail_type"]:checked').val();
                        if (thumbnailType === 'url') {
                            const thumbnailUrl = $('#thumbnail_url').val();
                            if (!thumbnailUrl.trim()) {
                                e.preventDefault();
                                alert('URL thumbnail tidak boleh kosong!');
                                $('#thumbnail_url').focus();
                                return false;
                            }
                        } else if (thumbnailType === 'upload') {
                            const thumbnailFile = $('#thumbnail')[0].files.length;
                            if (thumbnailFile === 0) {
                                e.preventDefault();
                                alert('File thumbnail harus dipilih!');
                                return false;
                            }
                        }
                    }

                    // Validate gallery URLs if any
                    let hasInvalidGalleryUrl = false;
                    $('.gallery-url-input').each(function() {
                        const url = $(this).val();
                        if (url && !isValidUrl(url)) {
                            hasInvalidGalleryUrl = true;
                            $(this).focus();
                            return false;
                        }
                    });

                    if (hasInvalidGalleryUrl) {
                        e.preventDefault();
                        alert('URL galeri tidak valid!');
                        return false;
                    }

                    console.log('Form validation passed, submitting...');
                    $(this).find('button[type="submit"]').prop('disabled', true).text('Menyimpan...');
                });


                // Helper function to validate URL
                function isValidUrl(string) {
                    try {
                        new URL(string);
                        return true;
                    } catch (_) {
                        return false;
                    }
                }
            });
        </script>
    @endpush
</x-layouts.admin>
