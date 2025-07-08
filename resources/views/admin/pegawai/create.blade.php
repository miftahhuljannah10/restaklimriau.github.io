<x-layouts.admin title="Tambah Pegawai" subtitle="Menambahkan data pegawai baru ke sistem">

    {{-- Breadcrumb --}}
    <x-main.layouts.breadcrumb :items="[['title' => 'Pegawai Management', 'url' => route('pegawai.index')], ['title' => 'Tambah Pegawai']]" />

    {{-- Main Content --}}
    <x-main.cards.content-card>
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Tambah Data Pegawai Baru</h3>
                    <p class="text-sm text-gray-600">Isi form di bawah untuk menambahkan data pegawai baru ke sistem</p>
                </div>
                <div class="flex items-center space-x-2">
                    <x-main.buttons.action-button href="{{ route('pegawai.index') }}" variant="secondary">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Kembali ke Daftar
                    </x-main.buttons.action-button>
                </div>
            </div>
        </div>

        <div class="p-6">
            {{-- Flash Messages --}}
            @if ($errors->any())
                <div class="mb-6 bg-red-50 border border-red-200 rounded-lg p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-red-800">Terdapat beberapa kesalahan:</h3>
                            <div class="mt-2 text-sm text-red-700">
                                <ul class="list-disc list-inside space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if (session('error'))
                <div class="mb-6 bg-red-50 border border-red-200 rounded-lg p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-red-800">Error:</h3>
                            <div class="mt-2 text-sm text-red-700">
                                {{ session('error') }}
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if (session('success'))
                <div class="mb-6 bg-green-50 border border-green-200 rounded-lg p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-green-800">Berhasil!</h3>
                            <div class="mt-2 text-sm text-green-700">
                                {{ session('success') }}
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <form action="{{ route('pegawai.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6" onsubmit="console.log('Form submitted'); return true;">
                @csrf

                {{-- Personal Information Section --}}
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-6">
                    <h4 class="text-lg font-medium text-blue-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Informasi Personal
                    </h4>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Nama Field --}}
                        <div>
                            <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Lengkap <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <input type="text" id="nama" name="nama" value="{{ old('nama') }}"
                                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                                    placeholder="Masukkan nama lengkap" required>
                            </div>
                            @error('nama')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- NIP Field --}}
                        <div>
                            <label for="NIP" class="block text-sm font-medium text-gray-700 mb-2">
                                NIP <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                                <input type="text" id="NIP" name="NIP" value="{{ old('NIP') }}"
                                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                                    placeholder="Masukkan NIP" required>
                            </div>
                            @error('NIP')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                        {{-- Tempat Lahir Field --}}
                        <div>
                            <label for="tempat_lahir" class="block text-sm font-medium text-gray-700 mb-2">
                                Tempat Lahir <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <input type="text" id="tempat_lahir" name="tempat_lahir"
                                    value="{{ old('tempat_lahir') }}"
                                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                                    placeholder="Masukkan tempat lahir" required>
                            </div>
                            @error('tempat_lahir')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Tanggal Lahir Field --}}
                        <div>
                            <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700 mb-2">
                                Tanggal Lahir <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                                    value="{{ old('tanggal_lahir') }}"
                                    max="{{ date('Y-m-d') }}"
                                    min="1940-01-01"
                                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                                    required
                                    style="color-scheme: light;">
                            </div>
                            <p class="mt-1 text-xs text-gray-500">Klik pada input untuk membuka kalender</p>
                            @error('tanggal_lahir')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Job Information Section --}}
                <div class="bg-green-50 border border-green-200 rounded-lg p-6">
                    <h4 class="text-lg font-medium text-green-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H8a2 2 0 01-2-2V8a2 2 0 012-2V6" />
                        </svg>
                        Informasi Kepegawaian
                    </h4>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Golongan Field --}}
                        <div>
                            <label for="golongan" class="block text-sm font-medium text-gray-700 mb-2">
                                Golongan <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="golongan" name="golongan" value="{{ old('golongan') }}"
                                class="block w-full px-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                                placeholder="Masukkan golongan" required>
                            @error('golongan')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Jabatan Field --}}
                        <div>
                            <label for="jabatan" class="block text-sm font-medium text-gray-700 mb-2">
                                Jabatan <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="jabatan" name="jabatan" value="{{ old('jabatan') }}"
                                class="block w-full px-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                                placeholder="Masukkan jabatan" required>
                            @error('jabatan')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                        {{-- Pendidikan Field --}}
                        <div>
                            <label for="pendidikan" class="block text-sm font-medium text-gray-700 mb-2">
                                Pendidikan Terakhir <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="pendidikan" name="pendidikan" value="{{ old('pendidikan') }}"
                                class="block w-full px-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                                placeholder="Masukkan pendidikan terakhir" required>
                            @error('pendidikan')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Kompetensi Field --}}
                        <div>
                            <label for="kompetensi" class="block text-sm font-medium text-gray-700 mb-2">
                                Kompetensi <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="kompetensi" name="kompetensi" value="{{ old('kompetensi') }}"
                                class="block w-full px-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                                placeholder="Masukkan kompetensi" required>
                            @error('kompetensi')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Contact Information Section --}}
                <div class="bg-purple-50 border border-purple-200 rounded-lg p-6">
                    <h4 class="text-lg font-medium text-purple-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        Informasi Kontak & Publikasi
                    </h4>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Email Field --}}
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                Email <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <input type="email" id="email" name="email" value="{{ old('email') }}"
                                    class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                                    placeholder="masukkan@email.com" required>
                            </div>
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Publikasi Field --}}
                        <div>
                            <label for="publikasi" class="block text-sm font-medium text-gray-700 mb-2">
                                Publikasi <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="publikasi" name="publikasi" value="{{ old('publikasi') }}"
                                class="block w-full px-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                                placeholder="Masukkan publikasi" required>
                            @error('publikasi')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Photo Upload Section --}}
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-6">
                    <h4 class="text-lg font-medium text-gray-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-gray-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Foto Pegawai
                    </h4>

                    <div>
                        <label for="foto" class="block text-sm font-medium text-gray-700 mb-2">
                            URL Foto Pegawai (Opsional)
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                                </svg>
                            </div>
                            <input type="url" id="foto" name="foto" value="{{ old('foto') }}"
                                class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                                placeholder="https://example.com/foto-pegawai.jpg atau https://drive.google.com/...">
                        </div>
                        <p class="mt-1 text-xs text-gray-500">
                            Masukkan URL langsung ke gambar foto pegawai. Bisa menggunakan Google Drive, Dropbox, atau hosting lainnya.
                        </p>
                        @error('foto')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Form Actions --}}
                <div class="flex justify-end space-x-3 pt-6 border-t border-gray-200">
                    <a href="{{ route('pegawai.index') }}"
                       class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Batal
                    </a>
                    <button type="submit"
                            class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 13l4 4L19 7" />
                        </svg>
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </x-main.cards.content-card>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Date picker enhancement
            const dateInput = document.getElementById('tanggal_lahir');

            if (dateInput) {
                // Set maksimum tanggal ke hari ini (tidak bisa memilih tanggal masa depan)
                dateInput.max = new Date().toISOString().split('T')[0];

                // Set minimum tanggal ke 80 tahun yang lalu
                const minDate = new Date();
                minDate.setFullYear(minDate.getFullYear() - 80);
                dateInput.min = minDate.toISOString().split('T')[0];

                // Force date picker to show
                dateInput.addEventListener('click', function() {
                    this.showPicker && this.showPicker();
                });

                // Handle focus event
                dateInput.addEventListener('focus', function() {
                    this.showPicker && this.showPicker();
                });

                // Tambahkan event listener untuk validasi
                dateInput.addEventListener('change', function() {
                    const selectedDate = new Date(this.value);
                    const today = new Date();
                    const minAge = new Date();
                    minAge.setFullYear(minAge.getFullYear() - 17); // Minimal umur 17 tahun

                    if (selectedDate > today) {
                        alert('Tanggal lahir tidak boleh lebih dari hari ini!');
                        this.value = '';
                        return;
                    }

                    if (selectedDate > minAge) {
                        alert('Umur minimal adalah 17 tahun!');
                        this.value = '';
                        return;
                    }

                    // Hitung umur dan tampilkan
                    const age = Math.floor((today - selectedDate) / (365.25 * 24 * 60 * 60 * 1000));
                    console.log('Umur:', age, 'tahun');

                    // Show age in help text
                    const helpText = this.parentElement.parentElement.querySelector('.text-xs');
                    if (helpText && age >= 17 && age <= 80) {
                        helpText.textContent = `Umur: ${age} tahun`;
                        helpText.className = 'mt-1 text-xs text-green-600';
                    }
                });

                // Tambahkan tooltip saat hover
                dateInput.addEventListener('mouseover', function() {
                    this.title = 'Klik untuk membuka kalender dan pilih tanggal lahir Anda';
                });

                // Reset help text on focus
                dateInput.addEventListener('focus', function() {
                    const helpText = this.parentElement.parentElement.querySelector('.text-xs');
                    if (helpText) {
                        helpText.textContent = 'Klik pada input untuk membuka kalender';
                        helpText.className = 'mt-1 text-xs text-gray-500';
                    }
                });

                // Check if browser supports date input
                const testInput = document.createElement('input');
                testInput.type = 'date';

                if (testInput.type !== 'date') {
                    // Fallback for browsers that don't support date input
                    console.log('Browser tidak mendukung date picker, menggunakan fallback');
                    dateInput.placeholder = 'YYYY-MM-DD';
                    dateInput.pattern = '[0-9]{4}-[0-9]{2}-[0-9]{2}';
                }
            }

            // Form validation enhancement
            const form = document.querySelector('form');
            if (form) {
                form.addEventListener('submit', function(e) {
                    const tanggalLahir = document.getElementById('tanggal_lahir').value;

                    if (!tanggalLahir) {
                        alert('Mohon pilih tanggal lahir!');
                        e.preventDefault();
                        return false;
                    }

                    // Validasi umur
                    const selectedDate = new Date(tanggalLahir);
                    const today = new Date();
                    const age = Math.floor((today - selectedDate) / (365.25 * 24 * 60 * 60 * 1000));

                    if (age < 17 || age > 80) {
                        alert('Umur harus antara 17-80 tahun!');
                        e.preventDefault();
                        return false;
                    }

                    console.log('Form validation passed, submitting...');
                });
            }
        });
    </script>

</x-layouts.admin>
