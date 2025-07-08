<!-- Sejarah Section Header Dinamis -->
<div class="text-center mb-12">
    <h2 class="text-3xl font-bold font-montserrat gradient-text mb-4 animate-fade-in">
        {{ $title ?? 'Sejarah Stasiun Klimatologi Riau' }}
    </h2>
    <p class="text-gray-700 text-l font-montserrat max-w-2xl mx-auto">
        {{ $description ?? 'Perjalanan panjang pembentukan Stasiun Klimatologi Riau dari tahun ke tahun' }}
    </p>
</div>

<!-- Timeline Dinamis -->
<div class="relative max-w-5xl mx-auto">
    <div class="absolute left-1/2 transform -translate-x-1/2 w-1 h-full bg-blue-500 rounded-full"></div>
    <div class="space-y-12">
        @foreach(($timeline ?? []) as $item)
        <div class="relative flex items-center">
            @if(($loop->iteration % 2) == 1)
                <div class="w-1/2 pr-8 text-right">
                    <div class="bg-white p-6 rounded-lg shadow-md border-l-4 {{ $item['border'] ?? 'border-blue-500' }}">
                        <div class="inline-block {{ $item['bg'] ?? 'bg-blue-500' }} text-white px-4 py-2 rounded-full text-sm font-bold mb-4">{{ $item['tahun'] }}</div>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            {{ $item['teks'] }}
                        </p>
                    </div>
                </div>
                <div class="absolute left-1/2 transform -translate-x-1/2 w-8 h-8 {{ $item['bg'] ?? 'bg-blue-500' }} rounded-full border-4 border-white shadow-md flex items-center justify-center">
                    <i class="fas {{ $item['icon'] ?? 'fa-lightbulb' }} text-white text-sm"></i>
                </div>
                <div class="w-1/2 pl-8"></div>
            @else
                <div class="w-1/2 pr-8"></div>
                <div class="absolute left-1/2 transform -translate-x-1/2 w-8 h-8 {{ $item['bg'] ?? 'bg-blue-500' }} rounded-full border-4 border-white shadow-md flex items-center justify-center">
                    <i class="fas {{ $item['icon'] ?? 'fa-lightbulb' }} text-white text-sm"></i>
                </div>
                <div class="w-1/2 pl-8">
                    <div class="bg-white p-6 rounded-lg shadow-md border-l-4 {{ $item['border'] ?? 'border-blue-500' }}">
                        <div class="inline-block {{ $item['bg'] ?? 'bg-blue-500' }} text-white px-4 py-2 rounded-full text-sm font-bold mb-4">{{ $item['tahun'] }}</div>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            {{ $item['teks'] }}
                        </p>
                    </div>
                </div>
            @endif
        </div>
        @endforeach
    </div>
</div>
