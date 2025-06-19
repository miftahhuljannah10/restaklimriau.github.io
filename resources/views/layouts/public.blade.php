<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Feedback') - Stasiun Klimatologi Riau</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        @include('components.before-login.header')

        <main class="flex-grow">
            @yield('content')
        </main>

        @include('components.before-login.footer')
    </div>
</body>

</html>
