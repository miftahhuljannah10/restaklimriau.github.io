@extends('layouts.app')

@section('content')
<div class="px-6 py-6 mx-auto max-w-7xl">
    <div class="bg-white shadow-md rounded-lg p-6">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-2xl font-bold text-gray-800">Daftar Pegawai</h1>
            <div class="flex items-center gap-4">
                <x-main.table.search :route="route('pegawai.index')" />
                <a href="{{ route('pegawai.create') }}">
                    <button class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg shadow">
                        + Tambah Pegawai
                    </button>
                </a>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead class="bg-gray-100 text-gray-700 text-sm uppercase">
                    <tr>
                        <th class="text-left px-6 py-3">Nama</th>
                        <th class="text-left px-6 py-3">TTL</th>
                        <th class="text-left px-6 py-3">NIP</th>
                        <th class="text-left px-6 py-3">Golongan</th>
                        <th class="text-left px-6 py-3">Jabatan</th>
                        <th class="text-left px-6 py-3">Pendidikan</th>
                        <th class="text-left px-6 py-3">Kompetensi</th>
                        <th class="text-left px-6 py-3">Email</th>
                        <th class="text-left px-6 py-3">Foto</th>
                        <th class="text-left px-6 py-3">Publikasi</th>
                        <th class="text-center px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-sm divide-y divide-gray-200">
                    @forelse ($pegawais as $pegawai)
                        <tr class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }}">
                            <td class="px-6 py-4">{{ $pegawai->nama }}</td>
                            <td class="px-6 py-4">{{ $pegawai->tempat_lahir }}, {{ \Carbon\Carbon::parse($pegawai->tanggal_lahir)->translatedFormat('d M Y') }}</td>
                            <td class="px-6 py-4">{{ $pegawai->NIP }}</td>
                            <td class="px-6 py-4">{{ $pegawai->golongan }}</td>
                            <td class="px-6 py-4">{{ $pegawai->jabatan }}</td>
                            <td class="px-6 py-4">{{ $pegawai->pendidikan }}</td>
                            <td class="px-6 py-4">{{ $pegawai->kompetensi }}</td>
                            <td class="px-6 py-4">{{ $pegawai->email }}</td>
                            <td class="px-6 py-4">
                                <img src="{{ asset($pegawai->foto) }}" alt="{{ $pegawai->nama }}" class="w-14 h-14 object-cover rounded">
                            </td>
                            <td class="px-6 py-4">{{ $pegawai->publikasi }}</td>
                            <td class="px-6 py-4 text-center space-x-2">
                                <a href="{{ route('pegawai.edit', $pegawai->id) }}" class="inline-block bg-yellow-500 hover:bg-yellow-600 text-white text-xs px-3 py-1 rounded">
                                    Edit
                                </a>
                                <form action="{{ route('pegawai.destroy', $pegawai->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin hapus?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white text-xs px-3 py-1 rounded">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="11" class="text-center text-gray-500 px-6 py-4">Data tidak ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- <div class="mt-4">
            {{ $pegawais->links('vendor.pagination.tailwind') }}
        </div> --}}
    </div>
</div>
@endsection
