
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Data Curah Hujan Normal (Lengkap)</h1>
        <a href="{{ route('admin.alat-curah-hujan.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-medium py-2 px-4 rounded">Kembali ke Data Singkat</a>
    </div>
    <div class="bg-white rounded-xl shadow overflow-x-auto">
        <table id="curahHujanFullTable" class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">Nomor Pos</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase">Nama Pos</th>
                    @foreach(['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'] as $bulan)
                    <th class="px-4 py-3 text-center text-xs font-bold text-gray-600 uppercase">{{ $bulan }}</th>
                    @endforeach
                    <th class="px-4 py-3 text-center text-xs font-bold text-gray-600 uppercase">Rata-rata</th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-gray-600 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($curahHujanData as $data)
                <tr class="hover:bg-blue-50 transition">
                    <td class="px-6 py-3">{{ $data->nomor_pos }}</td>
                    <td class="px-6 py-3">{{ $data->alat->nama_pos ?? '-' }}</td>
                    <td class="px-4 py-3 text-center">{{ $data->januari ?? '-' }}</td>
                    <td class="px-4 py-3 text-center">{{ $data->februari ?? '-' }}</td>
                    <td class="px-4 py-3 text-center">{{ $data->maret ?? '-' }}</td>
                    <td class="px-4 py-3 text-center">{{ $data->april ?? '-' }}</td>
                    <td class="px-4 py-3 text-center">{{ $data->mei ?? '-' }}</td>
                    <td class="px-4 py-3 text-center">{{ $data->juni ?? '-' }}</td>
                    <td class="px-4 py-3 text-center">{{ $data->juli ?? '-' }}</td>
                    <td class="px-4 py-3 text-center">{{ $data->agustus ?? '-' }}</td>
                    <td class="px-4 py-3 text-center">{{ $data->september ?? '-' }}</td>
                    <td class="px-4 py-3 text-center">{{ $data->oktober ?? '-' }}</td>
                    <td class="px-4 py-3 text-center">{{ $data->november ?? '-' }}</td>
                    <td class="px-4 py-3 text-center">{{ $data->desember ?? '-' }}</td>
                    <td class="px-4 py-3 text-center font-semibold text-blue-700">{{ $data->rata_rata ?? '-' }}</td>
                    <td class="px-6 py-3 text-center">
                        <a href="{{ route('admin.alat-curah-hujan.show', $data->nomor_pos) }}" class="text-blue-600 hover:underline">Detail</a>
                        <a href="{{ route('admin.alat-curah-hujan.edit', $data->nomor_pos) }}" class="text-yellow-600 hover:underline ml-2">Edit</a>
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
        $('#curahHujanFullTable').DataTable({
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
