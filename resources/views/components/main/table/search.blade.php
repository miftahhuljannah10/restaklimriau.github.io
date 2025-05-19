@props(['route'])

<form action="{{ $route }}" method="GET" class="flex items-center space-x-2">
    <input
        type="text"
        name="search"
        value="{{ request('search') }}"
        placeholder="Cari..."
        class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300"
    >
    {{-- <button
        type="submit"
        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition"
    >
        Cari --}}
    </button>
</form>
