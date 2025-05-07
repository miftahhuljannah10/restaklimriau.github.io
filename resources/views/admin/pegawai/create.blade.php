@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow">
        <h2 class="text-2xl font-bold mb-6">Tambah Data Pegawai</h2>

        <form action="{{ route('pegawai.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block mb-1 font-medium">Nama</label>
                <input type="text" name="nama" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4 flex gap-4">
                <div class="w-1/2">
                    <label class="block mb-1 font-medium">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="w-full border rounded p-2" required>
                </div>
                {{-- date picker --}}
                <div class="w-1/2">
                    <label class="block mb-1 font-medium">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="w-full border rounded p-2" required>
                </div>
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">NIP</label>
                <input type="text" name="NIP" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Golongan</label>
                <input type="text" name="golongan" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Jabatan</label>
                <input type="text" name="jabatan" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Pendidikan Terakhir</label>
                <input type="text" name="pendidikan" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Kompetensi</label>
                <input type="text" name="kompetensi" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Email</label>
                <input type="email" name="email" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Foto</label>
                <input type="file" name="foto" class="w-full border rounded p-2" accept="image/*">
            </div>

            <div class="mb-6">
                <label class="block mb-1 font-medium">Publikasi</label>
                <input type="text" name="publikasi" class="w-full border rounded p-2" required>
            </div>

            <div class="flex justify-between">
                <a href="{{ route('pegawai.index') }}"
                    class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">Kembali</a>
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Simpan</button>
            </div>
        </form>
    </div>
@endsection
