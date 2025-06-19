@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 max-w-xl">
        <h1 class="text-2xl font-bold mb-6">Tambah Pegawai</h1>

        <form action="{{ route('users.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700">Nama:</label>
                <input type="text" name="name"
                    class="w-full mt-1 px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
                    required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Email:</label>
                <input type="email" name="email"
                    class="w-full mt-1 px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
                    required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Password:</label>
                <input type="password" name="password"
                    class="w-full mt-1 px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
                    required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Role:</label>
                <select name="role_id"
                    class="w-full mt-1 px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
                    required>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>


            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded shadow">
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection
