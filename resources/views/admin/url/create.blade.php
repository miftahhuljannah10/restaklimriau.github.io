@extends('layouts.app')

@section('content')
{{-- form tambah url  --}}
<div class="p-6">
    <div class="max-w-7xl mx-auto bg-white shadow-md rounded-lg p-6">
        <h2 class="text-lg font-semibold mb-4">Tambah URL</h2>
        <form action="{{ route('url.store', $type) }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="url" class="block text-sm font-medium text-gray-700">URL</label>
                <input type="text" name="url" id="url" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Masukkan URL">
            </div>
            <div class="mb-4">
                <label for="short_url" class="block text-sm font-medium text-gray-700">Short URL</label>
                <input type="text" name="short_url" id="short_url" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Masukkan Short URL">
            </div>
            <div class="mb-4">
                <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="3"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Masukkan Deskripsi"></textarea>
            </div>
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm">Simpan</button>
        </form>
    </div>
</div>

@endsection
