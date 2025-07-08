{{--
Contoh pemanggilan dinamis dari view utama:
@include('components.before-login.layanan.jenis-pelayanan', [
    'services' => [
        [
            'title' => 'Form Layanan',
            'desc' => 'Merupakan Layanan Jasa MKKuG',
            'icon' => 'fas fa-tasks',
            'bg' => 'bg-gradient-to-br from-sky-400 to-sky-600',
            'type' => 'button', // atau 'link'
            'onclick' => "handleServiceClick('Form Layanan')",
            'aria' => 'Klik untuk membuka Form Layanan',
        ],
        [
            'title' => 'Survey Kepuasan Masyarakat',
            'desc' => 'Survey online untuk menilai kepuasan masyarakat terhadap layanan BMKG.',
            'icon' => 'fas fa-edit',
            'bg' => 'bg-gradient-to-br from-sky-400 to-sky-600',
            'type' => 'link',
            'href' => 'https://eskm.bmkg.go.id/survey/418106/0/1/2025-05/2025/0',
            'target' => '_blank',
            'aria' => 'Klik untuk membuka Survey Kepuasan Masyarakat',
        ],
        // ...layanan lain
    ]
])
--}}
<!-- Jenis Pelayanan Section Component Dinamis -->
<section class="w-full py-4 md:py-12 bg-gradient-to-br from-slate-50 via-blue-50/30">
    <div class="max-w-[1440px] mx-auto px-4 lg:px-8">
        <!-- Section Title -->
        <div class="text-center mb-8 md:mb-10 lg:mb-12">
            <h2 class="gradient-text text-3xl md:text-3xl font-bold font-montserrat">
                Jenis Pelayanan
            </h2>
        </div>

        <!-- Services Grid Dinamis -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 lg:gap-8 max-w-[1290px] mx-auto">
            @foreach(($services ?? []) as $service)
                @if(($service['type'] ?? 'button') === 'link')
                    <a href="{{ $service['href'] ?? '#' }}" @if(!empty($service['target'])) target="{{ $service['target'] }}" @endif rel="noopener" class="service-card w-full h-80 md:h-84 lg:h-86 px-4 md:px-6 py-8 md:py-10 lg:py-12 bg-white rounded-2xl border border-sky-100 shadow-md flex flex-col items-center hover:shadow-xl hover:-translate-y-1 transition-all duration-300 cursor-pointer group text-inherit no-underline" tabindex="0" role="button" aria-label="{{ $service['aria'] ?? '' }}">
                        <!-- Icon -->
                        <div class="w-20 h-20 mb-5 flex items-center justify-center">
                            <div class="w-20 h-20 {{ $service['bg'] ?? 'bg-sky-500' }} rounded-full flex items-center justify-center shadow-lg group-hover:scale-105 transition-transform duration-200">
                                <i class="{{ $service['icon'] ?? 'fas fa-info-circle' }} text-white text-3xl"></i>
                            </div>
                        </div>
                        <!-- Content -->
                        <div class="flex-1 flex flex-col justify-center text-center">
                            <div class="mb-3">
                                <h3 class="text-sky-700 text-2xl md:text-2xl lg:text-2xl font-semibold font-montserrat">
                                    {{ $service['title'] ?? '' }}
                                </h3>
                            </div>
                            <div>
                                <p class="text-gray-600 text-base md:text-base lg:text-l font-normal font-montserrat leading-relaxed">
                                    {{ $service['desc'] ?? '' }}
                                </p>
                            </div>
                        </div>
                    </a>
                @else
                    <div onclick="{{ $service['onclick'] ?? '' }}" class="service-card w-full h-80 md:h-84 lg:h-86 px-4 md:px-6 py-8 md:py-10 lg:py-12 bg-white rounded-2xl border border-sky-100 shadow-md flex flex-col items-center hover:shadow-xl hover:-translate-y-1 transition-all duration-300 cursor-pointer group" tabindex="0" role="button" aria-label="{{ $service['aria'] ?? '' }}">
                        <!-- Icon -->
                        <div class="w-20 h-20 mb-5 flex items-center justify-center">
                            <div class="w-20 h-20 {{ $service['bg'] ?? 'bg-sky-500' }} rounded-full flex items-center justify-center shadow-lg group-hover:scale-105 transition-transform duration-200">
                                <i class="{{ $service['icon'] ?? 'fas fa-info-circle' }} text-white text-3xl"></i>
                            </div>
                        </div>
                        <!-- Content -->
                        <div class="flex-1 flex flex-col justify-center text-center">
                            <div class="mb-3">
                                <h3 class="text-sky-700 text-2xl md:text-2xl lg:text-2xl font-semibold font-montserrat">
                                    {{ $service['title'] ?? '' }}
                                </h3>
                            </div>
                            <div>
                                <p class="text-gray-600 text-base md:text-base lg:text-l font-normal font-montserrat leading-relaxed">
                                    {{ $service['desc'] ?? '' }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>
