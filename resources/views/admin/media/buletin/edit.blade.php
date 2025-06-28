@extends('layouts.app')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="md:flex md:items-center md:justify-between mb-6">
            <div class="flex-1 min-w-0">
                <h2 class="text-2xl font-bold text-gray-800 sm:text-3xl">Edit Buletin</h2>
                <p class="mt-1 text-sm text-gray-500">
                    Perbarui informasi buletin {{ $buletin->judul }}
                </p>
            </div>
            <div class="mt-4 flex md:mt-0">
                <a href="{{ route('admin.media.buletin.show', $buletin) }}" 
                   class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 mr-2">
                    <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    Lihat Detail
                </a>
                <a href="{{ route('admin.media.buletin.index') }}" 
                   class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali
                </a>
            </div>
        </div>

        <!-- Form Card -->
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="p-6">
                @if($errors->any())
                    <div class="rounded-md bg-red-50 p-4 mb-6">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-red-800">
                                    Terdapat {{ $errors->count() }} kesalahan pada form
                                </h3>
                                <div class="mt-2 text-sm text-red-700">
                                    <ul class="list-disc pl-5 space-y-1">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <form action="{{ route('admin.media.buletin.update', $buletin) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Left Column - Form Fields -->
                        <div>
                            <div class="mb-5">
                                <label for="judul" class="block text-sm font-medium text-gray-700">Judul <span class="text-red-500">*</span></label>
                                <input type="text" id="judul" name="judul" value="{{ old('judul', $buletin->judul) }}" required
                                    class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            
                            <div class="mb-5">
                                <label for="edisi" class="block text-sm font-medium text-gray-700">Edisi</label>
                                <input type="text" id="edisi" name="edisi" value="{{ old('edisi', $buletin->edisi) }}"
                                    class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            
                            <div class="mb-5">
                                <label for="image" class="block text-sm font-medium text-gray-700">URL Gambar (Google Drive) <span class="text-red-500">*</span></label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input type="text" id="image" name="image" value="{{ old('image', $buletin->image) }}" required
                                        class="focus:ring-blue-500 focus:border-blue-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300">
                                </div>
                                <p class="mt-1 text-sm text-gray-500">
                                    Masukkan URL gambar dari Google Drive
                                </p>
                            </div>
                            
                            <div class="mb-5">
                                <label for="link" class="block text-sm font-medium text-gray-700">Link Buletin</label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
                                        URL
                                    </span>
                                    <input type="url" id="link" name="link" value="{{ old('link', $buletin->link) }}"
                                        class="focus:ring-blue-500 focus:border-blue-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                                </div>
                            </div>
                            
                            <div class="mb-5">
                                <label for="penulis" class="block text-sm font-medium text-gray-700">Penulis</label>
                                <input type="text" id="penulis" name="penulis" value="{{ old('penulis', $buletin->penulis) }}"
                                    class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            
                            <div class="mb-5">
                                <label for="status" class="block text-sm font-medium text-gray-700">Status <span class="text-red-500">*</span></label>
                                <select id="status" name="status" required
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    <option value="draft" {{ old('status', $buletin->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                                    <option value="published" {{ old('status', $buletin->status) == 'published' ? 'selected' : '' }}>Publikasikan</option>
                                </select>
                            </div>

                            <!-- Metadata Info -->
                            <div class="mt-8 pt-6 border-t border-gray-200">
                                <h3 class="text-sm font-medium text-gray-500">Informasi Tambahan</h3>
                                <div class="mt-3 grid grid-cols-1 gap-y-2 text-sm">
                                    <div class="flex justify-between">
                                        <span class="text-gray-500">ID:</span>
                                        <span class="text-gray-900">{{ $buletin->id }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-500">Dibuat pada:</span>
                                        <span class="text-gray-900">{{ $buletin->created_at->format('d M Y H:i') }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-500">Diperbarui pada:</span>
                                        <span class="text-gray-900">{{ $buletin->updated_at->format('d M Y H:i') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Right Column - Image Preview -->
                        <div>
                            <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                                <h3 class="text-lg font-medium text-gray-900 mb-4">Preview Gambar</h3>
                                <div class="bg-white border border-gray-300 rounded-lg overflow-hidden shadow-sm">
                                    <img id="preview-image" src="{{ $buletin->image }}" class="w-full object-cover h-96" alt="{{ $buletin->judul }}">
                                </div>
                                
                                <div class="mt-4">
                                    <div class="flex items-center justify-between text-sm">
                                        <span class="font-medium text-gray-500">Preview URL Gambar</span>
                                        <span id="status-badge" class="px-2 py-1 rounded-full {{ $buletin->status == 'published' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                            {{ $buletin->status == 'published' ? 'Dipublikasikan' : 'Draft' }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mt-6 bg-blue-50 p-4 rounded-md">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2h-1V9z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <h3 class="text-sm font-medium text-blue-800">Tips untuk URL Google Drive</h3>
                                        <div class="mt-2 text-sm text-blue-700">
                                            <p>Gunakan format URL ini untuk memastikan gambar dapat ditampilkan dengan benar:</p>
                                            <code class="mt-1 block bg-blue-100 p-2 rounded text-xs overflow-auto">https://drive.google.com/uc?id=YOUR_FILE_ID</code>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-8 flex justify-between items-center pt-6 border-t border-gray-200">
                        <a href="{{ route('admin.media.buletin.index') }}" class="text-sm font-medium text-gray-700">
                            Batal dan kembali
                        </a>
                        <button type="submit" 
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Image Preview
    const imageInput = document.getElementById('image');
    const previewImage = document.getElementById('preview-image');
    const statusSelect = document.getElementById('status');
    const statusBadge = document.getElementById('status-badge');
    
    // Image preview update
    imageInput.addEventListener('input', function() {
        if (this.value) {
            previewImage.src = this.value;
        }
    });
    
    // Status badge update
    statusSelect.addEventListener('change', function() {
        if (this.value === 'published') {
            statusBadge.textContent = 'Dipublikasikan';
            statusBadge.classList.remove('bg-yellow-100', 'text-yellow-800');
            statusBadge.classList.add('bg-green-100', 'text-green-800');
        } else {
            statusBadge.textContent = 'Draft';
            statusBadge.classList.remove('bg-green-100', 'text-green-800');
            statusBadge.classList.add('bg-yellow-100', 'text-yellow-800');
        }
    });
    
    // Handle image load error
    previewImage.addEventListener('error', function() {
        this.src = 'https://via.placeholder.com/800x450?text=Gambar+Tidak+Tersedia';
    });
</script>
@endpush
@endsection