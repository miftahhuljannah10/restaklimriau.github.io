<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Admin Panel')</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
</head>
<body>
    {{-- <x-after-login.sidebar.admin /> --}}
    <nav>
        <a href="{{ route('users.index') }}">Manajemen Pegawai</a>
        <a href="{{ route('logout') }}">Logout</a>
    </nav>
    <div>
        <div class="mt-3 container">
            @yield('content')
        </div>


    </div>
</body>
</html>
