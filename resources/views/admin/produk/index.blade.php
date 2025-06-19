@extends('layouts.app')

@section('content')
<div class="p-6">
        <div class="max-w-7xl mx-auto bg-white shadow-md rounded-lg p-6">
    <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-4">
        <div class="text-lg font-semibold text-gray-800 capitalize">{{ str_replace('_', ' ', $type) }} - Daftar Produk</div>
        <div class="flex items-center gap-2 mt-2 md:mt-0">
            <a href="{{ route('produk.create', $type) }}">
                <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded text-sm">
                    + Tambah Produk
                </button>
            </a>
        </div>
    </div>
    @if(session('success'))
        <div class="mb-4 px-4 py-2 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm text-left text-gray-700 border" id="produkTable">
            <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                <tr>
                    <th class="px-3 py-2 border">Judul</th>
                    <th class="px-3 py-2 border">Kategori</th>
                    <th class="px-3 py-2 border">Penulis</th>
                    <th class="px-3 py-2 border">Deskripsi</th>
                    <th class="px-3 py-2 border">Status</th>
                    <th class="px-3 py-2 border text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($produks as $produk)
                    <tr class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }}">
                        <td class="px-3 py-2 border">{{ $produk->judul }}</td>
                        <td class="px-3 py-2 border">
                            @foreach($produk->kategori as $kategori)
                                <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded mr-1">
                                    {{ $kategori->nama_kategori }}
                                </span>
                            @endforeach
                        </td>
                        <td class="px-3 py-2 border">{{ $produk->penulis ?? '-' }}</td>
                        <td class="px-3 py-2 border">
                            <div class="line-clamp-3">{{ $produk->isi }}</div>
                        </td>
                        <td class="px-3 py-2 border">
                            @php
                                $statusColor = match($produk->status) {
                                    'published' => 'bg-green-200 text-green-800',
                                    'draft' => 'bg-yellow-200 text-yellow-800',
                                    'archived' => 'bg-red-200 text-red-800',
                                    default => 'bg-gray-200 text-gray-800',
                                };
                            @endphp
                            <span class="inline-block px-2 py-1 rounded text-xs font-medium {{ $statusColor }}">
                                {{ ucfirst($produk->status) }}
                            </span>
                        </td>
                        <td class="px-3 py  -2 border text-center">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('produk.edit', [$type, $produk->id]) }}"
                                   class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm">
                                    Edit
                                </a>
                                <form action="{{ route('produk.destroy', [$type, $produk->id]) }}" method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center px-3 py-2 border text-gray-500">Tidak ada produk ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $produks->links() }}
    </div>
</div>
<!-- datatable -->
<script>
    $(document).ready(function() {
        $('#produkTable').DataTable({
            "pageLength": 10,
            "lengthMenu": [10, 25, 50, 100],
            "language": {
                "search": "Cari:",
                "lengthMenu": "Tampilkan _MENU_ data per halaman",
                "info": "Menampilkan _START_ hingga _END_ dari _TOTAL_ data",
                "paginate": {
                    "next": "Selanjutnya",
                    "previous": "Sebelumnya"
                }
            }
        });
    });
</script>
@endsection
