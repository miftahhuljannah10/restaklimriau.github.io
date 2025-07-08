<x-layouts.admin title="Detail Pegawai" subtitle="Informasi lengkap pegawai">

    {{-- Breadcrumb --}}
    <x-main.layouts.breadcrumb :items="[['title' => 'Pegawai Management', 'url' => route('pegawai.index')], ['title' => 'Detail Pegawai']]" />

    {{-- Main Content --}}
    <x-main.cards.content-card>
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Detail Pegawai</h3>
                    <p class="text-sm text-gray-600">Informasi lengkap tentang pegawai ini</p>
                </div>
                <div class="flex items-center space-x-2">
                    <x-main.buttons.action-button href="{{ route('pegawai.edit', $pegawai->id) }}" variant="warning">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Edit
                    </x-main.buttons.action-button>
                    <x-main.buttons.action-button href="{{ route('pegawai.index') }}" variant="light">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Kembali ke Daftar
                    </x-main.buttons.action-button>
                </div>
            </div>
        </div>

        <div class="p-6">
            {{-- Profile Card --}}
            <div class="bg-gradient-to-r from-blue-50 to-indigo-100 border border-blue-200 rounded-lg p-8 mb-6">
                <div class="flex items-center space-x-6">
                    <div class="w-24 h-24 rounded-full overflow-hidden shadow-lg">
                        @if ($pegawai->foto && filter_var($pegawai->foto, FILTER_VALIDATE_URL))
                            <img src="{{ $pegawai->foto }}" alt="{{ $pegawai->nama }}"
                                class="object-cover w-full h-full">
                        @else
                            <div
                                class="w-24 h-24 bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center">
                                <span
                                    class="text-white text-3xl font-bold">{{ strtoupper(substr($pegawai->nama, 0, 1)) }}</span>
                            </div>
                        @endif
                    </div>
                    <div class="flex-1">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">{{ $pegawai->nama }}</h2>
                        <p class="text-lg text-gray-600 mb-1">{{ $pegawai->email }}</p>
                        <p class="text-sm text-gray-500">{{ $pegawai->tempat_lahir }},
                            {{ \Carbon\Carbon::parse($pegawai->tanggal_lahir)->translatedFormat('d F Y') }}</p>
                        @if ($pegawai->publikasi)
                            <span
                                class="inline-flex items-center mt-2 px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                Memiliki Publikasi
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Pegawai Information --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                {{-- Personal Info --}}
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-6">
                    <h4 class="text-lg font-medium text-blue-900 mb-4">Informasi Personal</h4>
                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between"><span>Nama</span><span
                                class="font-semibold text-gray-800">{{ $pegawai->nama }}</span></div>
                        <div class="flex justify-between"><span>Email</span><span
                                class="text-gray-800">{{ $pegawai->email }}</span></div>
                        <div class="flex justify-between"><span>Tempat, Tanggal
                                Lahir</span><span>{{ $pegawai->tempat_lahir }},
                                {{ \Carbon\Carbon::parse($pegawai->tanggal_lahir)->translatedFormat('d M Y') }}</span>
                        </div>
                    </div>
                </div>

                {{-- Job Info --}}
                <div class="bg-amber-50 border border-amber-200 rounded-lg p-6">
                    <h4 class="text-lg font-medium text-amber-900 mb-4">Data Kepegawaian</h4>
                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between"><span>NIP</span><span
                                class="font-mono">{{ $pegawai->NIP }}</span></div>
                        <div class="flex justify-between"><span>Golongan</span><span>{{ $pegawai->golongan }}</span>
                        </div>
                        <div class="flex justify-between"><span>Jabatan</span><span>{{ $pegawai->jabatan }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Pendidikan</span><span>{{ $pegawai->pendidikan }}</span></div>
                        <div class="flex justify-between"><span>Kompetensi</span><span
                                class="text-right">{{ $pegawai->kompetensi }}</span></div>
                    </div>
                </div>
            </div>

            {{-- Action Buttons --}}
            <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200 mt-6">
                <x-main.buttons.action-button href="{{ route('pegawai.index') }}" variant="light">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                    </svg>
                    Daftar Pegawai
                </x-main.buttons.action-button>
                <x-main.buttons.action-button href="{{ route('pegawai.edit', $pegawai->id) }}" variant="primary">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    Edit Pegawai
                </x-main.buttons.action-button>
            </div>
        </div>
    </x-main.cards.content-card>

</x-layouts.admin>
