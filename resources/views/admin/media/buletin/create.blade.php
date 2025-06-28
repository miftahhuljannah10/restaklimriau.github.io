@extends('layouts.app')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="md:flex md:items-center md:justify-between mb-6">
            <div class="flex-1 min-w-0">
                <h2 class="text-2xl font-bold text-gray-800 sm:text-3xl">Tambah Buletin Baru</h2>
                <p class="mt-1 text-sm text-gray-500">
                    Tambahkan buletin baru ke sistem informasi Stasiun Klimatologi Riau
                </p>
            </div>
            <div class="mt-4 md:mt-0">
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
        <div class="bg-white overflow-hidden shadow-sm rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
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

                <form action="{{ route('admin.media.buletin.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Left Column - Form Fields -->
                        <div>
                            <div class="mb-5">
                                <label for="judul" class="block text-sm font-medium text-gray-700">Judul <span class="text-red-500">*</span></label>
                                <input type="text" id="judul" name="judul" value="{{ old('judul') }}" required
                                    class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    placeholder="Masukkan judul buletin">
                            </div>
                            
                            <div class="mb-5">
                                <label for="edisi" class="block text-sm font-medium text-gray-700">Edisi</label>
                                <input type="text" id="edisi" name="edisi" value="{{ old('edisi') }}"
                                    class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    placeholder="Contoh: Edisi Januari 2025">
                            </div>
                            
                            <div class="mb-5">
                                <label for="image" class="block text-sm font-medium text-gray-700">URL Gambar (Google Drive) <span class="text-red-500">*</span></label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input type="text" id="image" name="image" value="{{ old('image') }}" required
                                        class="focus:ring-blue-500 focus:border-blue-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
                                        placeholder="https://drive.google.com/uc?id=...">
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
                                    <input type="url" id="link" name="link" value="{{ old('link') }}"
                                        class="focus:ring-blue-500 focus:border-blue-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                        placeholder="https://...">
                                </div>
                                <p class="mt-1 text-sm text-gray-500">
                                    Link untuk mengunduh atau melihat buletin (opsional)
                                </p>
                            </div>
                            
                            <div class="mb-5">
                                <label for="penulis" class="block text-sm font-medium text-gray-700">Penulis</label>
                                <input type="text" id="penulis" name="penulis" value="{{ old('penulis', 'Stasiun Klimatologi Riau') }}"
                                    class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    placeholder="Nama penulis atau institusi">
                            </div>
                            
                            <div class="mb-5">
                                <label for="status" class="block text-sm font-medium text-gray-700">Status <span class="text-red-500">*</span></label>
                                <select id="status" name="status" required
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                                    <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Publikasikan</option>
                                </select>
                                <p class="mt-1 text-sm text-gray-500">
                                    Buletin dengan status "Draft" tidak akan ditampilkan ke publik
                                </p>
                            </div>
                        </div>
                        
                        <!-- Right Column - Preview -->
                        <div>
                            <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                                <h3 class="text-lg font-medium text-gray-900 mb-4">Preview Buletin</h3>
                                <div class="aspect-w-16 aspect-h-9 bg-gray-100 rounded-lg overflow-hidden mb-4">
                                    <img id="preview-image" src="https://via.placeholder.com/800x450?text=Preview+Gambar+Buletin" class="object-cover w-full h-full" alt="Preview Buletin">
                                </div>
                                <div class="mt-4">
                                    <h4 id="preview-judul" class="text-xl font-semibold text-gray-800">Judul Buletin</h4>
                                    <p id="preview-edisi" class="text-sm text-gray-600 mt-1">Edisi: -</p>
                                    <p id="preview-penulis" class="text-sm text-gray-600 mt-1">Penulis: Stasiun Klimatologi Riau</p>
                                    <div class="mt-3 flex items-center">
                                        <div id="preview-status" class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-800">
                                            Draft
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-sm text-gray-500 mt-4">
                                <span class="font-medium">Catatan:</span> Preview bersifat ilustratif dan mungkin sedikit berbeda dengan tampilan sebenarnya.
                            </p>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-8 flex justify-end">
                        <button type="submit" 
                            class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Simpan Buletin
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Live Preview
    const imageInput = document.getElementById('image');
    const judulInput = document.getElementById('judul');
    const edisiInput = document.getElementById('edisi');
    const penulisInput = document.getElementById('penulis');
    const statusInput = document.getElementById('status');
    
    // Preview elements
    const previewImage = document.getElementById('preview-image');
    const previewJudul = document.getElementById('preview-judul');
    const previewEdisi = document.getElementById('preview-edisi');
    const previewPenulis = document.getElementById('preview-penulis');
    const previewStatus = document.getElementById('preview-status');
    
    // Update Preview
    function updatePreview() {
        // Update Image
        if (imageInput.value) {
            previewImage.src = imageInput.value;
        }
        
        // Update Judul
        if (judulInput.value) {
            previewJudul.textContent = judulInput.value;
        } else {
            previewJudul.textContent = 'Judul Buletin';
        }
        
        // Update Edisi
        if (edisiInput.value) {
            previewEdisi.textContent = 'Edisi: ' + edisiInput.value;
        } else {
            previewEdisi.textContent = 'Edisi: -';
        }
        
        // Update Penulis
        if (penulisInput.value) {
            previewPenulis.textContent = 'Penulis: ' + penulisInput.value;
        } else {
            previewPenulis.textContent = 'Penulis: Stasiun Klimatologi Riau';
        }
        
        // Update Status
        if (statusInput.value === 'published') {
            previewStatus.textContent = 'Dipublikasikan';
            previewStatus.classList.remove('bg-yellow-100', 'text-yellow-800');
            previewStatus.classList.add('bg-green-100', 'text-green-800');
        } else {
            previewStatus.textContent = 'Draft';
            previewStatus.classList.remove('bg-green-100', 'text-green-800');
            previewStatus.classList.add('bg-yellow-100', 'text-yellow-800');
        }
    }
    
    // Event Listeners
    imageInput.addEventListener('input', updatePreview);
    judulInput.addEventListener('input', updatePreview);
    edisiInput.addEventListener('input', updatePreview);
    penulisInput.addEventListener('input', updatePreview);
    statusInput.addEventListener('change', updatePreview);
    
    // Handle image load error
    previewImage.addEventListener('error', function() {
        this.src = 'https://via.placeholder.com/800x450?text=Gambar+Tidak+Tersedia';
    });
    
    // Initial preview update
    updatePreview();
</script>
@endpush
@endsection