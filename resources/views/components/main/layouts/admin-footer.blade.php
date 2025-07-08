{{--
    Admin Footer Component
    Komponen footer untuk admin panel
--}}

<footer class="bg-white border-t border-gray-200 py-4 px-6 mt-auto">
    <div class="flex flex-col sm:flex-row justify-between items-center text-sm text-gray-600">
        <div class="mb-2 sm:mb-0">
            <p>&copy; {{ date('Y') }} <span class="font-semibold text-blue-600">Stasiun Klimatologi Riau</span> bekerjasama dengan  <span class="font-semibold text-blue-600"> Politeknik Caltex Riau.</p>
        </div>
        <div class="flex items-center space-x-4">
            {{-- <span class="text-gray-500">Admin Panel v1.0</span> --}}
            <span class="text-gray-400">|</span>
            <span class="text-gray-500">{{ Auth::user()->name ?? 'Guest' }}</span>
        </div>
    </div>
</footer>
