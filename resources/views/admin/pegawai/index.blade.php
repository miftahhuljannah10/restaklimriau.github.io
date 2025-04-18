@extends('layouts.app')
@section('content')
    <h4>Data Kepegawaian</h4>
    <div class="d-flex">
        <div class="ms-auto">
            <a class="btn btn-success" href="{{ route('pegawai.create') }}">Tambah Pegawai</a>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Tempat/Tanggal Lahir</th>
                <th>NIP</th>
                <th>Golongan</th>
                <th>Jabatan</th>
                <th>Pendidikan Terakhir</th>
                <th>Kompetensi</th>
                <th>Email</th>
                <th>Photo</th>
                <th>Publikasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pegawais as $pegawai)
                <tr>
                    <td>{{ $pegawai->nama }}</td>
                    <td>{{ $pegawai->tempat_lahir }}, {{ $pegawai->tanggal_lahir }}</td>
                    <td>{{ $pegawai->nip }}</td>
                    <td>{{ $pegawai->golongan }}</td>
                    <td>{{ $pegawai->jabatan }}</td>
                    <td>{{ $pegawai->pendidikan }}</td>
                    <td>{{ $pegawai->kompetensi }}</td>
                    <td>{{ $pegawai->email }}</td>
                    <td><img src="{{ asset('storage/' . $pegawai->photo) }}" alt="{{ $pegawai->nama }}" width="100">
                    </td>
                    <td>{{ $pegawai->publikasi }}</td>
                    <td>
                        <a href="{{ route('pegawai.edit', $pegawai->id) }}">Edit</a>
                        <form action="{{ route('pegawai.destroy', $pegawai->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- {{ $pegawais->links() }} --}}
@endsection
