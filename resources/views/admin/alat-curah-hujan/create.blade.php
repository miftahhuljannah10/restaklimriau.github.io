{{-- filepath: resources/views/admin/alat-curah-hujan/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Import Data Curah Hujan</h1>
        <a href="{{ route('admin.alat-curah-hujan.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-medium py-2 px-4 rounded">Kembali</a>
    </div>
    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <form action="{{ route('admin.alat-curah-hujan.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf
            <div class="mb-4">
                <label for="file" class="block text-sm font-medium text-gray-700 mb-2">File Excel/CSV</label>
                <input type="file" name="file" id="file" required class="block w-full border border-gray-300 rounded px-3 py-2">
            </div>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded">Import</button>
        </form>
    </div>
</div>
@endsection
