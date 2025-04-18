@extends('layouts.app')

@section('content')
    <h1>Data Pegawai</h1>
    {{-- <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Tambah Pegawai</a> --}}

    <div class="d-flex">
        <h4>List Akun Kepegawaian</h4>
        <div class="ms-auto">
            <a class="btn btn-success" href="{{ route('users.create') }}" class="btn btn-primary">Tambah Pegawai</a>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>

                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role->name }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Yakin hapus?')">Hapus</button>
                            
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
