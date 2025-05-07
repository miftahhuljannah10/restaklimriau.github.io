@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 max-w-3xl">
        <h1 class="text-2xl font-bold mb-6">Edit Pegawai</h1>

        <form action="{{ route('users.update', $user->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            @method('PUT')

            <table class="w-full">
                <tr>
                    <td class="pr-4 text-right"><label for="name" class="text-gray-700">Nama:</label></td>
                    <td><input type="text" id="name" name="name" value="{{ $user->name }}"
                               class="w-full mt-1 px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
                               required></td>
                </tr>

                <tr>
                    <td class="pr-4 text-right"><label for="email" class="text-gray-700">Email:</label></td>
                    <td><input type="email" id="email" name="email" value="{{ $user->email }}"
                               class="w-full mt-1 px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
                               required></td>
                </tr>

                <tr>
                    <td class="pr-4 text-right"><label for="password" class="text-gray-700">Password: <span
                            class="text-sm text-gray-500">(Biarkan kosong jika tidak diubah)</span></label></td>
                    <td><input type="password" id="password" name="password"
                               class="w-full mt-1 px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300"></td>
                </tr>

                <tr>
                    <td class="pr-4 text-right"><label for="role_id" class="text-gray-700">Role:</label></td>
                    <td>
                        <select id="role_id" name="role_id"
                                class="w-full mt-1 px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
                                required>
                            <option value="1" @if ($user->role_id == 1) selected @endif>Pemimpin</option>
                            <option value="2" @if ($user->role_id == 2) selected @endif>Pegawai</option>
                        </select>
                    </td>
                </tr>
            </table>

            <div class="flex justify-end mt-6">
                <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded shadow">
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection
