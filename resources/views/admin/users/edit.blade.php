@extends('layouts.app')
@section('content')
    <h1>Edit Pegawai | Admin</h1>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>Nama:</label>
            <input type="text" name="name" class="form-control mb-2" value="{{ $user->name }}" required>
        </div>
        <div>
            <label>Email:</label>
            <input type="email" name="email" class="form-control mb-2" value
        ="{{ $user->email }}" required>
        </div>
        {{-- <div>
            <label>Password:</label>
            <input type="password" name="password" class="form-control mb-2" required="false">
        </div>
        <div>
            <label>Konfirmasi Password:</label>
            <input type="password" name="password_confirmation" class="form-control mb-2" required="false">
        </div> --}}
        <div>
            <label>Role:</label>
            <select name="role" class="form-control mb-2" required>
                <option value="admin" @if ($user->role == 'pemimpin') selected @endif>Pemimpin</option>
                <option value="pegawai" @if ($user->role == 'pegawai') selected @endif>Pegawai</option>
            </select>
        </div>
        <div>
            <button class="btn btn-primary" type="submit">Simpan</button>
        </div>
    </form>
@endsection
