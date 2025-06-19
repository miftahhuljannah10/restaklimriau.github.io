<!-- resources/views/components/auth/login-card.blade.php -->
<div class="flex min-h-screen items-center justify-center bg-cover bg-center"
    style="background-image: url('/images/stasiun-bg.jpg')">
    <div class="bg-white shadow-xl rounded-3xl w-full max-w-md p-10">
        <h2 class="text-sm text-gray-700 mb-1">Halo!</h2>
        <h1 class="text-blue-600 font-semibold text-md mb-4">Administrator Stasiun Klimatologi Riau</h1>
        <h2 class="text-3xl font-bold text-black mb-6">Masuk</h2>

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf
            <div>
                <label for="email" class="block text-sm mb-1 text-gray-600">Masukkan email anda</label>
                <input type="email" name="email" id="email" required
                    class="w-full px-4 py-3 border border-blue-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="Masukkan email anda">
            </div>

            <div>
                <label for="password" class="block text-sm mb-1 text-gray-600">Masukkan passowrd anda</label>
                <input type="password" name="password" id="password" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="Masukkan passowrd anda">
            </div>

            <button type="submit"
                class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-4 rounded-xl transition duration-300">
                Masuk
            </button>
        </form>
    </div>
</div>
