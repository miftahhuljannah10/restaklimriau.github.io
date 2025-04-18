@extends('layouts.app')

@section('content')
    <h1>Tambah Data Pegawai</h1>

    <form action="{{ route('pegawai.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control mb-2" required>
        </div>
        <div>
            <label>Tempat Lahir:</label>
            <input type="text" name="tempat_lahir" class="form-control mb-2" required>
        </div>
        <div>
            <label>Tanggal Lahir:</label>
            <input type="date" name="tanggal_lahir" class="form-control mb-2" required>
        </div>
        {{-- nip, golongan, jabatan, pendidikan, Kompetensi, email, foto, publikasi --}}
        <div>
            <label>NIP:</label>
            <input type="text" name="nip" class="form-control mb-2" required>
        </div>
        <div>
            <label>Golongan:</label>
            <input type="text" name="golongan" class="form-control mb-2" required>
        </div>
        <div>
            <label>Jabatan:</label>
            <input type="text" name="jabatan" class="form-control mb-2" required>
        </div>
        <div>
            <label>Pendidikan Terakhir:</label>
            <input type="text" name="pendidikan" class="form-control mb-2" required>
        </div>
        <div>
            <label>Kompetensi:</label>
            <input type="text" name="kompetensi" class="form-control mb-2" required>
        </div>
        <div>
            <label>Email:</label>
            <input type="email" name="email" class="form-control mb-2" required>
        </div>
        <div>
            <label>Foto:</label>
            <input type="file" name="photo" class="form-control mb-2" accept="image/*" required>
        </div>
        <div>
            <label>Publikasi:</label>
            <input type="text" name="publikasi" class="form-control mb-2" required>
        </div>
        <div>
            <button class="btn btn-primary" type="submit">Simpan</button>
        </div>
        <div>
            <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
@endsection
