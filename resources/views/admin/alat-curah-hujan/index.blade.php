{{-- filepath: resources/views/admin/alat-curah-hujan/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
        <div>
            <h1 class="text-3xl font-extrabold text-gray-900 mb-1">Data Curah Hujan Normal</h1>
            <p class="text-gray-500">Rekap data curah hujan per alat/pos. Kelola dan lihat detail data dengan mudah.</p>
        </div>
        <div class="flex gap-2">
            <a href="{{ route('admin.alat-curah-hujan.create') }}"
                class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 transition text-white font-semibold py-2 px-5 rounded-lg shadow">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 4v16m8-8H4" />
                </svg>
                Import Data
            </a>
            <a href="{{ route('admin.alat-curah-hujan.full') }}"
                class="inline-flex items-center gap-2 bg-green-600 hover:bg-green-700 transition text-white font-semibold py-2 px-5 rounded-lg shadow">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                Data Lengkap
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded mb-6 flex items-center gap-2">
            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M5 13l4 4L19 7" />
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <div class="bg-white rounded-xl shadow overflow-x-auto">
        <table id="curahHujanTable" class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50 sticky top-0 z-10">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Nomor Pos</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Nama Pos</th>
                    <th class="px-4 py-3 text-center text-xs font-bold text-gray-600 uppercase">Jan</th>
                    <th class="px-4 py-3 text-center text-xs font-bold text-gray-600 uppercase">Feb</th>
                    <th class="px-4 py-3 text-center text-xs font-bold text-gray-600 uppercase">Mar</th>
                    <th class="px-4 py-3 text-center text-xs font-bold text-gray-600 uppercase">Apr</th>
                    <th class="px-4 py-3 text-center text-xs font-bold text-gray-600 uppercase">Rata-rata</th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-gray-600 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach ($curahHujanData as $data)
                    <tr class="hover:bg-blue-50 transition">
                        <td class="px-6 py-3 whitespace-nowrap font-medium text-gray-900">{{ $data->nomor_pos }}</td>
                        <td class="px-6 py-3 whitespace-nowrap text-gray-700">{{ $data->alat->nama_pos ?? '-' }}</td>
                        <td class="px-4 py-3 text-center">{{ $data->januari ?? '-' }}</td>
                        <td class="px-4 py-3 text-center">{{ $data->februari ?? '-' }}</td>
                        <td class="px-4 py-3 text-center">{{ $data->maret ?? '-' }}</td>
                        <td class="px-4 py-3 text-center">{{ $data->april ?? '-' }}</td>
                        <td class="px-4 py-3 text-center font-semibold text-blue-700">{{ $data->rata_rata ?? '-' }}</td>
                        <td class="px-6 py-3 text-center">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('admin.alat-curah-hujan.show', $data->nomor_pos) }}"
                                    class="inline-flex items-center px-2 py-1 bg-blue-100 hover:bg-blue-200 text-blue-700 rounded transition"
                                    title="Detail">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>
                                <a href="{{ route('admin.alat-curah-hujan.edit', $data->nomor_pos) }}"
                                    class="inline-flex items-center px-2 py-1 bg-yellow-100 hover:bg-yellow-200 text-yellow-700 rounded transition"
                                    title="Edit">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                                <form action="{{ route('admin.alat-curah-hujan.destroy', $data->nomor_pos) }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="inline-flex items-center px-2 py-1 bg-red-100 hover:bg-red-200 text-red-700 rounded transition"
                                        title="Hapus">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@push('scripts')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#curahHujanTable').DataTable({
            responsive: true,
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json',
            },
            "stripeClasses": ['bg-white', 'bg-gray-50'],
            "pagingType": "simple_numbers"
        });
    });
</script>
@endpush
@endsection
