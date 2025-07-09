<x-layouts.admin title="Tambah Kontak" subtitle="Menambahkan data kontak baru ke sistem">

    <x-main.layouts.breadcrumb :items="[['title' => 'Kontak Management', 'url' => route('admin.kontak.index')], ['title' => 'Tambah Kontak']]" />

    <x-main.cards.content-card>
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Tambah Kontak Baru</h3>
                    <p class="text-sm text-gray-600">Isi form di bawah untuk menambahkan data kontak ke sistem</p>
                </div>
                <div class="flex items-center space-x-2">
                    <x-main.buttons.action-button href="{{ route('admin.kontak.index') }}" variant="secondary">
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
            <form action="{{ route('admin.kontak.store') }}" method="POST" class="space-y-6">
                @csrf

                <div class="bg-blue-50 border border-blue-200 rounded-lg p-6">
                    <h4 class="text-lg font-medium text-blue-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Informasi Kontak
                    </h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Key Field --}}
                        <div>
                            <label for="key" class="block text-sm font-medium text-gray-700 mb-2">
                                Key <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="key" name="key" value="{{ old('key') }}"
                                class="block w-full px-3 py-2 border rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-2 transition-colors duration-200 @error('key') border-red-500 focus:ring-red-500 focus:border-red-500 @else border-gray-300 focus:ring-blue-500 focus:border-blue-500 @enderror"
                                placeholder="Contoh: alamat, email, whatsapp, operasional_senin_kamis" required>
                            @error('key')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        {{-- Value Field --}}
                        <div>
                            <label for="value" class="block text-sm font-medium text-gray-700 mb-2">
                                Value <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="value" name="value" value="{{ old('value') }}"
                                class="block w-full px-3 py-2 border rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-2 transition-colors duration-200 @error('value') border-red-500 focus:ring-red-500 focus:border-red-500 @else border-gray-300 focus:ring-blue-500 focus:border-blue-500 @enderror"
                                placeholder="Isi kontak atau jam operasional" required>
                            @error('value')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        {{-- Link Field --}}
                        <div class="md:col-span-2">
                            <label for="link" class="block text-sm font-medium text-gray-700 mb-2">
                                Link <span class="text-xs text-gray-500">(opsional)</span>
                            </label>
                            <input type="text" id="link" name="link" value="{{ old('link') }}"
                                class="block w-full px-3 py-2 border rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-2 transition-colors duration-200 @error('link') border-red-500 focus:ring-red-500 focus:border-red-500 @else border-gray-300 focus:ring-blue-500 focus:border-blue-500 @enderror"
                                placeholder="Contoh: https://wa.me/xxxx, mailto:xxx, tel:xxx, atau kosongkan">
                            @error('link')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                    <x-main.buttons.action-button href="{{ route('admin.kontak.index') }}" variant="light">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Batal
                    </x-main.buttons.action-button>
                    <button type="submit"
                        class="inline-flex items-center px-6 py-3 border border-transparent shadow-sm text-sm leading-4 font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200 hover:shadow-md transform hover:-translate-y-0.5">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                        </svg>
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </x-main.cards.content-card>

</x-layouts.admin>
