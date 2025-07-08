<!-- Header Section with Background Dinamis -->
<div class="relative bg-sky-600 to  px-6 py-10">
    <div class="absolute inset-0 bg-black opacity-10"></div>
    <div class="relative z-10">
        <!-- Profile Photo and Info - Centered Layout -->
        <div class="flex flex-col items-center text-center space-y-5">
            <!-- Profile Photo -->
            <div class="relative">
                <div class="w-40 h-52 rounded-xl overflow-hidden shadow-lg border-2 border-white/50 backdrop-blur-sm mx-auto">
                    <img id="profile-image"
                         src="{{ $profile['foto'] ?? '/assets/images/sdm.png' }}"
                         alt="Foto {{ $profile['nama'] ?? '' }}"
                         class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
                </div>
            </div>
            <!-- Basic Info - Centered -->
            <div class="text-white space-y-3 max-w-lg">
                <h2 id="profile-nama" class="text-2xl font-bold mb-1">{{ $profile['nama'] ?? '' }}</h2>
                <p id="profile-jabatan" class="text-xl font-semibold mb-3">{{ $profile['jabatan'] ?? '' }}</p>
            </div>
        </div>
    </div>
</div>

<!-- Detailed Information Dinamis -->
<div class="p-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach(($profile['detail'] ?? []) as $item)
        <div class="bg-gray-50 rounded-xl p-4 hover:bg-gray-100 transition-colors duration-200">
            <div class="flex items-start">
                <div class="w-8 h-8 {{ $item['icon_bg'] ?? 'bg-blue-500' }} rounded-lg flex items-center justify-center mr-3 mt-1">
                    <i class="fas {{ $item['icon'] ?? 'fa-signature' }} text-white text-sm"></i>
                </div>
                <div class="flex-1">
                    <h4 class="font-semibold text-gray-700 mb-1">{{ $item['label'] ?? '' }}</h4>
                    @if(isset($item['is_link']) && $item['is_link'])
                        <a href="{{ $item['value'] }}" class="text-blue-600 font-regular hover:text-blue-800 transition-colors duration-200 break-all">{{ $item['value'] }}</a>
                    @else
                        <p class="text-gray-900 font-regular">{{ $item['value'] ?? '' }}</p>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
