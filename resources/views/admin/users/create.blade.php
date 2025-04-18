@extends('layouts.app')

@section('content')
<h1>Tambah Pegawai</h1>

<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <div>
        <label>Nama:</label>
        <input type="text" name="name" class="form-control mb-2" required>
    </div>
    <div>
        <label>Email:</label>
        <input type="email" name="email"  class="form-control mb-2" required>
    </div>
    <div>
        <label>Password:</label>
        <input type="password" name="password"  class="form-control mb-2" required>
    </div>
    <div>
        <label>Role:</label>
        <select name="role_id"  class="form-control mb-2" required>
            <option value="2">Pegawai</option>
        </select>
    </div>
    <button class="btn btn-primary" type="submit">Simpan</button>
</form>
@endsection
