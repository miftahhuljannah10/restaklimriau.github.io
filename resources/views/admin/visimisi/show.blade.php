<x-layouts.admin title="Detail Visi/Misi/Tugas" subtitle="Menampilkan detail section dan item">
    <x-main.layouts.breadcrumb :items="[['title' => 'Visi Misi', 'url' => route('admin.visimisi.index')], ['title' => 'Detail']]" />

    <x-main.cards.content-card>
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Detail Section</h3>
                    <p class="text-sm text-gray-600">Informasi lengkap section dan item di bawah ini</p>
                </div>
                <div class="flex items-center space-x-2">
                    <x-main.buttons.action-button href="{{ route('admin.visimisi.index') }}" variant="secondary">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Kembali ke Daftar
                    </x-main.buttons.action-button>
                </div>
            </div>
        </div>

        <div class="p-6">
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 mb-6">
                <h4 class="text-lg font-medium text-blue-900 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Informasi Section
                </h4>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <div class="text-sm text-gray-700 font-medium mb-1">Tipe Section</div>
                        <div class="text-base text-gray-900">{{ $section->section_type ? ucfirst($section->section_type) : '-' }}</div>
                    </div>
                    <div>
                        <div class="text-sm text-gray-700 font-medium mb-1">Nama</div>
                        <div class="text-base text-gray-900">{{ $section->nama }}</div>
                    </div>
                    <div>
                        <div class="text-sm text-gray-700 font-medium mb-1">Status</div>
                        <div class="text-base text-gray-900">
                            @if($section->is_active)
                                <span class="text-green-600 font-semibold">Aktif</span>
                            @else
                                <span class="text-red-600 font-semibold">Nonaktif</span>
                            @endif
                        </div>
                    </div>
                </div>
                @if($section->deskripsi)
                    <div class="mt-4">
                        <div class="text-sm text-gray-700 font-medium mb-1">Deskripsi</div>
                        <div class="text-base text-gray-900">{{ $section->deskripsi }}</div>
                    </div>
                @endif
            </div>

            <div class="bg-green-50 border border-green-200 rounded-lg p-6 mb-6">
                <h4 class="text-lg font-medium text-green-900 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                    Daftar Item
                </h4>
                <div class="overflow-x-auto rounded-lg shadow border border-gray-200">
                    <table class="min-w-full divide-y divide-gray-200 bg-white">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">#</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Isi Item</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Urutan</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($items as $i => $item)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4 text-sm text-gray-500">{{ $i+1 }}</td>
                                    <td class="px-6 py-4 text-sm">{{ $item->content }}</td>
                                    <td class="px-6 py-4 text-sm text-center">{{ $item->order_number }}</td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center px-2 py-1 rounded text-xs {{ $item->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                            {{ $item->is_active ? 'Aktif' : 'Nonaktif' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-right whitespace-nowrap">
                                        <x-main.buttons.action-button href="{{ route('admin.visimisi.edit', $section->id) }}" variant="secondary" size="sm">
                                            Edit Section
                                        </x-main.buttons.action-button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-8 text-gray-400">Belum ada item.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </x-main.cards.content-card>
</x-layouts.admin>
