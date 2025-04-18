<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Stasiun Klimatologi</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
</head>

<body class="bg-light d-flex align-items-center justify-content-center" style="height: 100vh;">

    <div class="card shadow-sm p-4" style="width: 100%; max-width: 400px;">
        <h4 class="text-center mb-4">Login Stasiun Klimatologi</h4>

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('login.process') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                    placeholder="Masukkan email" required>
                @error('email')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                @error('password')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>

</body>

</html>
