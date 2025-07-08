<x-layouts.admin>
    <x-slot name="title">Edit URL {{ ucfirst($type) }}</x-slot>

    <div class="max-w-3xl mx-auto">
        <x-main.cards.content-card>
            <x-slot name="header">
                <h2 class="text-xl font-semibold text-gray-800">Edit URL {{ ucfirst($type) }}</h2>
            </x-slot>

            @if ($errors->any())
                <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('url.update', ['type' => $type, 'id' => $url->id]) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="url" class="block text-sm font-medium text-gray-700 mb-2">URL</label>
                    <input type="url" id="url" name="url" value="{{ old('url', $url->url) }}"
                        class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                        placeholder="https://example.com" required>
                    @error('url')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" rows="4"
                        class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                        placeholder="Masukkan deskripsi URL" required>{{ old('deskripsi', $url->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-between pt-6 border-t border-gray-200">
                    <a href="{{ route('url.index', $type) }}"
                        class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Kembali
                    </a>
                    <button type="submit"
                        class="inline-flex items-center px-6 py-2 border border-transparent rounded-lg text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Perbarui
                    </button>
                </div>
            </form>
        </x-main.cards.content-card>
    </div>
</x-layouts.admin>
