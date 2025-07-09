<x-layouts.admin title="Kelola Kontak" subtitle="Manajemen data kontak perusahaan">

    {{-- Breadcrumb --}}
    <x-main.layouts.breadcrumb :items="[['title' => 'Kontak Management', 'url' => '#'], ['title' => 'Daftar Kontak']]" />

    <x-main.cards.content-card>
        <div class="overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50 flex items-center justify-between mb-4">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Daftar Kontak</h3>
                    <p class="text-sm text-gray-600">Kelola semua kontak dan jam operasional yang tampil di halaman publik</p>
                </div>
                {{-- <x-main.buttons.action-button href="{{ route('admin.kontak.create') }}" variant="primary">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah Kontak
                </x-main.buttons.action-button> --}}
            </div>

            <div class="table-container">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 up
                                percase tracking-wider">Key</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 u
                                ppercase tracking-wider">Value</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500
                                uppercase tracking-wider">Link</th>

                                                       <th class="px-6 py-3 text-center text-xs font-medium text-gray-500
                                 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($kontaks as $kontak)
                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                <td class="px-6 py-4 whitespace-nowrap font-mono">{{ $kontak->key }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $kontak->value }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-blue-600">
                                     @if($kontak->link)
                                        <a href=
                                        "   {{ $kontak->link }}" target="_blank" class="underline">{{ $kontak->link }}</a>
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <x-main.datatables.action-buttons :editUrl="route('admin.kontak.edit', $kontak->id)" :deleteAction="
                                  route('admin.kontak.destroy', $kontak->id)" :itemId="$kontak->id" :itemName="$kontak->key" size="sm" />
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-16
                                text-center text-gray-500">Belum ada data kontak</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </x-main.cards.content-card>

</x-layouts.admin>
