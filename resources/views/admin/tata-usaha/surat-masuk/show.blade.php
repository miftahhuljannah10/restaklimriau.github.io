<x-layouts.admin title="Detail Surat Masuk">
    <x-main.layouts.breadcrumb :items="[
        ['title' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['title' => 'Tata Usaha'],
        ['title' => 'Surat Masuk', 'url' => route('admin.tata-usaha.surat-masuk.index')],
        ['title' => 'Detail'],
    ]" />

    <x-main.cards.content-card title="Detail Surat Masuk">
        <x-slot:header>
            <div class="flex space-x-2">
                <x-main.buttons.action-button variant="warning" icon="pencil"
                    href="{{ route('admin.tata-usaha.surat-masuk.edit', $suratMasuk) }}">
                    Edit
                </x-main.buttons.action-button>
                <x-main.buttons.action-button variant="secondary" icon="arrow-left"
                    href="{{ route('admin.tata-usaha.surat-masuk.index') }}">
                    Kembali
                </x-main.buttons.action-button>
            </div>
        </x-slot:header>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Nomor Surat</label>
                    <p class="mt-1 text-sm text-gray-900 bg-gray-50 rounded-md px-3 py-2">{{ $suratMasuk->no_surat }}
                    </p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Tanggal Surat</label>
                    <p class="mt-1 text-sm text-gray-900 bg-gray-50 rounded-md px-3 py-2">
                        {{ \Carbon\Carbon::parse($suratMasuk->tanggal_surat)->format('d F Y') }}
                    </p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Dari</label>
                    <p class="mt-1 text-sm text-gray-900 bg-gray-50 rounded-md px-3 py-2">{{ $suratMasuk->dari }}</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Jenis</label>
                    <p class="mt-1 text-sm text-gray-900 bg-gray-50 rounded-md px-3 py-2">
                        <span
                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                            @if ($suratMasuk->jenis == 'Segera') bg-yellow-100 text-yellow-800
                            @elseif($suratMasuk->jenis == 'Penting') bg-red-100 text-red-800
                            @elseif($suratMasuk->jenis == 'Rahasia') bg-purple-100 text-purple-800
                            @else bg-blue-100 text-blue-800 @endif">
                            {{ $suratMasuk->jenis }}
                        </span>
                    </p>
                </div>
            </div>

            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Perihal</label>
                    <p class="mt-1 text-sm text-gray-900 bg-gray-50 rounded-md px-3 py-2">{{ $suratMasuk->perihal }}</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">File Scanning</label>
                    <div class="mt-1 bg-gray-50 rounded-md px-3 py-2">
                        @if ($suratMasuk->scanning)
                            <a href="{{ route('admin.tata-usaha.surat-masuk.download', $suratMasuk) }}"
                                class="inline-flex items-center text-blue-600 hover:text-blue-900">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                Download File
                            </a>
                        @else
                            <span class="text-gray-400">Tidak ada file</span>
                        @endif
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Tanggal Input</label>
                    <p class="mt-1 text-sm text-gray-900 bg-gray-50 rounded-md px-3 py-2">
                        {{ $suratMasuk->created_at->format('d F Y H:i:s') }}
                    </p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Terakhir Diupdate</label>
                    <p class="mt-1 text-sm text-gray-900 bg-gray-50 rounded-md px-3 py-2">
                        {{ $suratMasuk->updated_at->format('d F Y H:i:s') }}
                    </p>
                </div>
            </div>

            @if ($suratMasuk->catatan)
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Catatan</label>
                    <p class="mt-1 text-sm text-gray-900 bg-gray-50 rounded-md px-3 py-2">{{ $suratMasuk->catatan }}
                    </p>
                </div>
            @endif
        </div>

        <x-slot:footer>
            <div class="flex justify-between items-center">
                <div class="flex space-x-3">
                    <form action="{{ route('admin.tata-usaha.surat-masuk.destroy', $suratMasuk) }}" method="POST"
                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus surat masuk ini?');" class="inline">
                        @csrf
                        @method('DELETE')
                        <x-main.buttons.action-button variant="danger" icon="trash" type="submit">
                            Hapus
                        </x-main.buttons.action-button>
                    </form>
                </div>

                <div class="text-sm text-gray-500">
                    <span class="inline-flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        ID: {{ $suratMasuk->id }}
                    </span>
                </div>
            </div>
        </x-slot:footer>
    </x-main.cards.content-card>
</x-layouts.admin>
