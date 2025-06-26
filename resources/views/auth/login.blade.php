{{-- resources/views/auth/login.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Administrator Stasiun Klimatologi Riau - Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 font-sans antialiased">

    <div class="flex min-h-screen items-center justify-center bg-cover bg-center" style="background-image: url('/images/stasiun-bg.png')">
        <div class="bg-white shadow-xl rounded-3xl w-full max-w-md p-10">
            <h2 class="text-sm text-gray-700 mb-1">Welcome to</h2>
            <h1 class="text-blue-600 font-semibold text-md mb-4">Administrator Stasiun Klimatologi Riau</h1>
            <h2 class="text-3xl font-bold text-black mb-6">Sign in</h2>

            @if (session('status'))
                <div class="mb-4 text-green-600 text-sm">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-4 text-red-600 text-sm">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login.process') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="block text-sm mb-1 text-gray-600">Enter your email address</label>
                    <input type="email" name="email" id="email" required autofocus
                        class="w-full px-4 py-3 border border-blue-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400"
                        placeholder="Username or email address" />
                </div>

                <div>
                    <label for="password" class="block text-sm mb-1 text-gray-600">Enter your password</label>
                    <input type="password" name="password" id="password" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400"
                        placeholder="Enter your password" />
                </div>

                <button type="submit"
                    class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-4 rounded-xl transition duration-300">
                    Sign in
                </button>
            </form>
        </div>
    </div>

</body>
</html>
