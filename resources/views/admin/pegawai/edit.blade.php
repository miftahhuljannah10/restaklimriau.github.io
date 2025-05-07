@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow">
        <h2 class="text-2xl font-bold mb-6">Edit Data Pegawai</h2>

        <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-1 font-medium">Nama</label>
                <input type="text" name="nama" value="{{ $pegawai->nama }}" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4 flex gap-4">
                <div class="w-1/2">
                    <label class="block mb-1 font-medium">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" value="{{ $pegawai->tempat_lahir }}"
                        class="w-full border rounded p-2" required>
                </div>
                <div class="w-1/2">
                    <label class="block mb-1 font-medium">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" value="{{ $pegawai->tanggal_lahir }}"
                        class="w-full border rounded p-2" required>
                </div>
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">NIP</label>
                <input type="text" name="NIP" value="{{ $pegawai->NIP }}" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Golongan</label>
                <input type="text" name="golongan" value="{{ $pegawai->golongan }}" class="w-full border rounded p-2"
                    required>
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Jabatan</label>
                <input type="text" name="jabatan" value="{{ $pegawai->jabatan }}" class="w-full border rounded p-2"
                    required>
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Pendidikan Terakhir</label>
                <input type="text" name="pendidikan" value="{{ $pegawai->pendidikan }}" class="w-full border rounded p-2"
                    required>
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Kompetensi</label>
                <input type="text" name="kompetensi" value="{{ $pegawai->kompetensi }}" class="w-full border rounded p-2"
                    required>
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Email</label>
                <input type="email" name="email" value="{{ $pegawai->email }}" class="w-full border rounded p-2"
                    required>
            </div>

            <div class="mb-4">
                <label for="foto" class="block">Foto</label>
                <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
                @if ($pegawai->foto)
                    <img src="{{ asset($pegawai->foto) }}" alt="{{ $pegawai->nama }}" class="mt-2" width="100">
                @endif
            </div>

            <div class="mb-6">
                <label class="block mb-1 font-medium">Publikasi</label>
                <input type="text" name="publikasi" value="{{ $pegawai->publikasi }}" class="w-full border rounded p-2"
                    required>
            </div>

            <div class="flex justify-between">
                <a href="{{ route('pegawai.index') }}"
                    class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">Kembali</a>
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Perbarui</button>
            </div>
        </form>
    </div>
@endsection
