<x-layouts.admin title="Data Curah Hujan Normal (Lengkap)">
    <x-main.layouts.breadcrumb :items="[
        ['title' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['title' => 'Alat Curah Hujan', 'url' => route('admin.alat-curah-hujan.index')],
        ['title' => 'Data Lengkap'],
    ]" />

    <x-main.cards.content-card class="!p-0">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between px-6 py-4 border-b bg-white rounded-t-lg">
            <h2 class="text-xl font-bold text-gray-800 flex items-center">
                <i class="fas fa-cloud-rain mr-2 text-blue-500"></i>
                Data Curah Hujan Normal (Lengkap)
            </h2>
            <x-main.buttons.action-button href="{{ route('admin.alat-curah-hujan.index') }}" variant="secondary" size="sm" icon="fas fa-arrow-left">
                Kembali ke Data Singkat
            </x-main.buttons.action-button>
        </div>
        <div class="overflow-x-auto px-6 py-6 bg-gray-50 rounded-b-lg">
            <table id="curahHujanFullTable" class="min-w-full divide-y divide-blue-200">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="px-3 py-2 text-left font-semibold">Nomor Pos</th>
                        <th class="px-3 py-2 text-left font-semibold">Nama Pos</th>
                        @foreach (['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'] as $bulan)
                            <th class="px-2 py-2 text-center font-semibold">{{ $bulan }}</th>
                        @endforeach
                        <th class="px-2 py-2 text-center font-semibold">Rata-rata</th>
                        <th class="px-2 py-2 text-center font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-blue-100">
                    @foreach ($curahHujanData as $data)
                        <tr class="hover:bg-blue-50 transition">
                            <td class="px-3 py-2">{{ $data->nomor_pos }}</td>
                            <td class="px-3 py-2">{{ $data->alat->nama_pos ?? '-' }}</td>
                            <td class="px-2 py-2 text-center">{{ $data->januari ?? '-' }}</td>
                            <td class="px-2 py-2 text-center">{{ $data->februari ?? '-' }}</td>
                            <td class="px-2 py-2 text-center">{{ $data->maret ?? '-' }}</td>
                            <td class="px-2 py-2 text-center">{{ $data->april ?? '-' }}</td>
                            <td class="px-2 py-2 text-center">{{ $data->mei ?? '-' }}</td>
                            <td class="px-2 py-2 text-center">{{ $data->juni ?? '-' }}</td>
                            <td class="px-2 py-2 text-center">{{ $data->juli ?? '-' }}</td>
                            <td class="px-2 py-2 text-center">{{ $data->agustus ?? '-' }}</td>
                            <td class="px-2 py-2 text-center">{{ $data->september ?? '-' }}</td>
                            <td class="px-2 py-2 text-center">{{ $data->oktober ?? '-' }}</td>
                            <td class="px-2 py-2 text-center">{{ $data->november ?? '-' }}</td>
                            <td class="px-2 py-2 text-center">{{ $data->desember ?? '-' }}</td>
                            <td class="px-2 py-2 text-center font-bold text-blue-700">{{ $data->rata_rata ?? '-' }}</td>
                            <td class="px-2 py-2 text-center">
                                <x-main.datatables.action-buttons :showUrl="route('admin.alat-curah-hujan.show', $data->nomor_pos)" :editUrl="route('admin.alat-curah-hujan.edit', $data->nomor_pos)" />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-main.cards.content-card>

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#curahHujanFullTable').DataTable({
                    responsive: true,
                    processing: true,
                    language: {
                        url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json',
                    },
                    pageLength: 25,
                    lengthMenu: [
                        [10, 25, 50, 100, -1],
                        [10, 25, 50, 100, "Semua"]
                    ],
                    columnDefs: [
                        { orderable: false, targets: -1 }
                    ],
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ],
                    paging: true,
                    ordering: true
                });
            });
        </script>
    @endpush
</x-layouts.admin>
