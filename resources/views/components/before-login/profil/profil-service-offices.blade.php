<!-- Service Offices Section Dinamis -->
<section>
    <div class="max-w-[1440px] mx-auto px-4 lg:px-10">
        <!-- Tab Navigation Dinamis -->
        <div class="flex justify-center mb-12">
            <div class="tab-container flex gap-3">
                @foreach(($tabs ?? []) as $tab)
                <button
                    id="{{ $tab['id'] }}"
                    class="service-tab {{ $activeTab == $tab['id'] ? 'active bg-sky-500 text-white' : 'bg-sky-50 text-sky-600' }} px-8 py-3 text-sm font-semibold font-montserrat rounded-lg transition-all duration-300 shadow"
                    type="button"
                >
                    {{ $tab['label'] }}
                </button>
                @endforeach
            </div>
        </div>

        <!-- Tab Content Dinamis -->
        <div class="relative">
            @foreach(($offices ?? []) as $office)
            <div id="{{ str_replace('-tab', '', $office['id']) }}-content" class="tab-content {{ $activeTab == $office['id'] ? 'active' : 'hidden' }}">
                <!-- Office Image -->
                <div class="flex justify-center mb-10">
                    <div class="w-full max-w-3xl">
                        <img
                            src="{{ $office['image'] }}"
                            alt="{{ $office['image_alt'] }}"
                            class="w-full h-80 md:h-96 object-cover rounded-2xl shadow-2xl border-4 border-gray-200 hover:border-gray-300 transition-all duration-300"
                        />
                    </div>
                </div>

                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-slate-800 font-montserrat mb-4">{{ $office['title'] }}</h2>
                    <p class="text-slate-600 text-lg font-normal font-montserrat max-w-3xl mx-auto leading-relaxed">
                        {{ $office['description'] }}
                    </p>
                    <div class="mt-8">
                        <h3 class="text-xl font-semibold text-slate-700 font-montserrat mb-2">Jenis-Jenis Layanan</h3>
                        <div class="w-24 h-1 bg-sky-500 mx-auto rounded-full"></div>
                    </div>
                </div>

                <!-- Services Grid Dinamis -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach(($office['services'] ?? []) as $service)
                    <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 text-center border border-gray-100 hover:border-{{ $service['hover'] ?? 'sky' }}-200">
                        <div class="w-full h-40 {{ $service['bg'] ?? '' }} rounded-xl mb-6 flex items-center justify-center relative overflow-hidden">
                            <div class="absolute inset-0 {{ $service['bg_overlay'] ?? '' }}"></div>
                            <div class="{{ $service['icon_color'] ?? 'text-blue-600' }} text-5xl relative z-10">{!! $service['icon'] ?? '' !!}</div>
                        </div>
                        <h4 class="text-xl font-bold text-slate-800 font-montserrat mb-4">{{ $service['title'] }}</h4>
                        <ul class="text-left text-sm text-slate-600 font-montserrat space-y-2">
                            @foreach(($service['items'] ?? []) as $item)
                            <li class="flex items-start">
                                <span class="text-sky-500 mr-2 mt-1">✓</span>
                                <span>{{ $item }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@php
$tabs = $tabs ?? [];
$offices = $offices ?? [];
$activeTab = $activeTab ?? ($tabs[0]['id'] ?? '');
@endphp

<!-- Style dipindahkan ke app.css -->
