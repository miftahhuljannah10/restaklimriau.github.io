@extends('layouts.app')

@section('title', 'Tambah Surat Keluar')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            Tambah Surat Keluar
                        </h2>
                        <a href="{{ route('admin.tata-usaha.surat-keluar.index') }}"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Kembali
                        </a>
                    </div>

                    <!-- Errors -->
                    @if ($errors->any())
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
                            <p class="font-bold">Terjadi kesalahan:</p>
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Form -->
                    <form action="{{ route('admin.tata-usaha.surat-keluar.store') }}" method="POST"
                        enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Nomor Surat -->
                            <div>
                                <label for="no_surat" class="block text-sm font-medium text-gray-700">Nomor Surat <span
                                        class="text-red-500">*</span></label>
                                <input type="text" name="no_surat" id="no_surat" value="{{ old('no_surat') }}"
                                    class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <!-- Tanggal Surat -->
                            <div>
                                <label for="tanggal_surat" class="block text-sm font-medium text-gray-700">Tanggal Surat
                                    <span class="text-red-500">*</span></label>
                                <input type="date" name="tanggal_surat" id="tanggal_surat"
                                    value="{{ old('tanggal_surat', date('Y-m-d')) }}"
                                    class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <!-- Klasifikasi Surat -->
                            <div>
                                <label for="klasifikasi_id" class="block text-sm font-medium text-gray-700">Klasifikasi
                                    <span class="text-red-500">*</span></label>
                                <div class="flex">
                                    <select name="klasifikasi_id" id="klasifikasi_id"
                                        class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md rounded-r-none">
                                        <option value="">-- Pilih Klasifikasi --</option>
                                        @foreach ($klasifikasi as $k)
                                            <option value="{{ $k->id }}"
                                                {{ old('klasifikasi_id') == $k->id ? 'selected' : '' }}>
                                                {{ $k->kode }} - {{ $k->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button type="button" id="btnAddKlasifikasi"
                                        class="mt-1 inline-flex items-center px-4 py-2 border border-transparent rounded-r-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <!-- Tujuan -->
                            <div>
                                <label for="tujuan" class="block text-sm font-medium text-gray-700">Tujuan <span
                                        class="text-red-500">*</span></label>
                                <input type="text" name="tujuan" id="tujuan" value="{{ old('tujuan') }}"
                                    class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <!-- Perihal -->
                            <div class="md:col-span-2">
                                <label for="perihal" class="block text-sm font-medium text-gray-700">Perihal <span
                                        class="text-red-500">*</span></label>
                                <input type="text" name="perihal" id="perihal" value="{{ old('perihal') }}"
                                    class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <!-- Sifat -->
                            <div>
                                <label for="sifat" class="block text-sm font-medium text-gray-700">Sifat <span
                                        class="text-red-500">*</span></label>
                                <select name="sifat" id="sifat"
                                    class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    <option value="">-- Pilih Sifat --</option>
                                    <option value="Biasa" {{ old('sifat') == 'Biasa' ? 'selected' : '' }}>Biasa</option>
                                    <option value="Penting" {{ old('sifat') == 'Penting' ? 'selected' : '' }}>Penting
                                    </option>
                                    <option value="Segera" {{ old('sifat') == 'Segera' ? 'selected' : '' }}>Segera</option>
                                    <option value="Rahasia" {{ old('sifat') == 'Rahasia' ? 'selected' : '' }}>Rahasia
                                    </option>
                                </select>
                            </div>

                            <!-- File Scanning -->
                            <div>
                                <label for="scanning" class="block text-sm font-medium text-gray-700">File Scanning</label>
                                <input type="file" name="scanning" id="scanning"
                                    class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                <p class="mt-1 text-xs text-gray-500">Format yang didukung: PDF, JPG, JPEG, PNG (Maks. 2MB)
                                </p>
                            </div>

                            <!-- Catatan -->
                            <div class="md:col-span-2">
                                <label for="catatan" class="block text-sm font-medium text-gray-700">Catatan</label>
                                <textarea name="catatan" id="catatan" rows="3"
                                    class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('catatan') }}</textarea>
                            </div>
                        </div>

                        <div class="flex items-center justify-end">
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                                </svg>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk Tambah Klasifikasi -->
    <div id="modalAddKlasifikasi" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title"
        role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                Tambah Klasifikasi Surat
                            </h3>
                            <div class="mt-4">
                                <div class="mb-4">
                                    <label for="kode" class="block text-sm font-medium text-gray-700">Kode <span
                                            class="text-red-500">*</span></label>
                                    <input type="text" name="kode" id="kode"
                                        class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                                <div>
                                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama <span
                                            class="text-red-500">*</span></label>
                                    <input type="text" name="nama" id="nama"
                                        class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" id="saveKlasifikasi"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Simpan
                    </button>
                    <button type="button" id="closeModal"
                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Modal controls
            const btnAddKlasifikasi = document.getElementById('btnAddKlasifikasi');
            const modalAddKlasifikasi = document.getElementById('modalAddKlasifikasi');
            const closeModal = document.getElementById('closeModal');
            const saveKlasifikasi = document.getElementById('saveKlasifikasi');

            btnAddKlasifikasi.addEventListener('click', function() {
                modalAddKlasifikasi.classList.remove('hidden');
            });

            closeModal.addEventListener('click', function() {
                modalAddKlasifikasi.classList.add('hidden');
            });

            saveKlasifikasi.addEventListener('click', function() {
                const kode = document.getElementById('kode').value;
                const nama = document.getElementById('nama').value;

                if (!kode || !nama) {
                    alert('Kode dan Nama harus diisi!');
                    return;
                }

                // AJAX request to save new klasifikasi
                fetch('{{ route('admin.tata-usaha.klasifikasi-surat.ajax') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            kode,
                            nama
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Add new option to select
                            const select = document.getElementById('klasifikasi_id');
                            const option = document.createElement('option');
                            option.value = data.klasifikasi.id;
                            option.text = `${data.klasifikasi.kode} - ${data.klasifikasi.nama}`;
                            option.selected = true;
                            select.add(option);

                            // Close modal and reset form
                            modalAddKlasifikasi.classList.add('hidden');
                            document.getElementById('kode').value = '';
                            document.getElementById('nama').value = '';
                        } else {
                            alert(data.message || 'Terjadi kesalahan saat menyimpan data');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Terjadi kesalahan saat menyimpan data');
                    });
            });
        });
    </script>
@endsection
