@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Data Kepegawaian</h1>
        <a href="{{ route('pegawai.create') }}" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded">
            Tambah Pegawai
        </a>
    </div>

    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full text-sm text-left">
            <thead class="bg-gray-100 text-gray-700 uppercase">
                <tr>
                    <th class="px-4 py-3">Nama</th>
                    <th class="px-4 py-3">TTL</th>
                    <th class="px-4 py-3">NIP</th>
                    <th class="px-4 py-3">Golongan</th>
                    <th class="px-4 py-3">Jabatan</th>
                    <th class="px-4 py-3">Pendidikan</th>
                    <th class="px-4 py-3">Kompetensi</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Foto</th>
                    <th class="px-4 py-3">Publikasi</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($pegawais as $pegawai)
                    <tr>
                        <td class="px-4 py-2">{{ $pegawai->nama }}</td>
                        <td class="px-4 py-2">{{ $pegawai->tempat_lahir }}, {{ $pegawai->tanggal_lahir }}</td>
                        <td class="px-4 py-2">{{ $pegawai->NIP }}</td>
                        <td class="px-4 py-2">{{ $pegawai->golongan }}</td>
                        <td class="px-4 py-2">{{ $pegawai->jabatan }}</td>
                        <td class="px-4 py-2">{{ $pegawai->pendidikan }}</td>
                        <td class="px-4 py-2">{{ $pegawai->kompetensi }}</td>
                        <td class="px-4 py-2">{{ $pegawai->email }}</td>
                        <td class="px-4 py-2">
                            <img src="{{ asset($pegawai->foto) }}" alt="{{ $pegawai->nama }}" class="w-20 h-auto rounded">
                        </td>
                        <td class="px-4 py-2">{{ $pegawai->publikasi }}</td>
                        <td class="px-4 py-2 space-y-2">
                            <a href="{{ route('pegawai.edit', $pegawai->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</a>
                            <form action="{{ route('pegawai.destroy', $pegawai->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?');">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
