<!-- Service Content Component Dinamis, tampilan dan warna identik statis -->
<section class="w-full py-6 bg-gray-50" id="service-content">
    <div class="max-w-[1280px] mx-auto px-4 lg:px-8">
        <div id="service-info" class="w-full max-w-[1440px] mx-auto">
            @foreach($services as $service)
            <div id="{{ $service['id'] }}-content" class="hidden bg-white rounded-lg p-6 md:p-8 shadow-sm border border-gray-200">
                <div class="text-justify space-y-4">
                    <h2 class="gradient-text text-xl md:text-2xl font-bold font-montserrat mb-4">
                        {{ $service['title'] }}
                    </h2>
                    <div class="{{ $service['alert_bg'] }} {{ $service['alert_border'] }} rounded-lg p-4">
                        <div class="flex items-start gap-3">
                            <i class="{{ $service['alert_icon'] }} {{ $service['alert_icon_color'] }} mt-1"></i>
                            <div>
                                <h4 class="font-semibold {{ $service['alert_title_color'] }} mb-1">{{ $service['alert_title'] }}</h4>
                                <p class="{{ $service['alert_desc_color'] }} text-sm">
                                    {{ $service['alert_desc'] }}
                                </p>
                            </div>
                        </div>
                    </div>
                    @if(!empty($service['desc']))
                    <p class="text-black text-base md:text-amber font-normal font-montserrat">
                        {!! $service['desc'] !!}
                    </p>
                    @endif
                    @if(!empty($service['jenis_title']) && !empty($service['jenis_items']))
                    <div class="{{ $service['jenis_bg'] }} {{ $service['jenis_border'] }} rounded-lg p-4">
                        <h4 class="{{ $service['jenis_title_color'] }} font-semibold mb-2">{{ $service['jenis_title'] }}</h4>
                        <ul class="{{ $service['jenis_list_color'] }} text-sm space-y-1">
                            @foreach($service['jenis_items'] as $item)
                            <li>• {{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="{{ $service['syarat_bg'] }} {{ $service['syarat_border'] }} rounded-lg p-4">
                        <h4 class="{{ $service['syarat_title_color'] }} font-semibold mb-2">{{ $service['syarat_title'] }}</h4>
                        <ul class="{{ $service['syarat_list_color'] }} text-sm space-y-1">
                            @foreach($service['syarat_items'] as $item)
                            <li>• {{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="{{ $service['survey_bg'] }} {{ $service['survey_border'] }} rounded-lg p-4">
                        <div class="flex items-start gap-3">
                            <i class="{{ $service['survey_icon'] }} {{ $service['survey_icon_color'] }} mt-1"></i>
                            <div>
                                <h4 class="font-semibold {{ $service['survey_title_color'] }} mb-1">{{ $service['survey_title'] }}</h4>
                                <p class="{{ $service['survey_desc_color'] }} text-sm">
                                    {!! $service['survey_desc'] !!}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                        <iframe
                            src="{{ $service['form_url'] }}"
                            width="100%"
                            height="800"
                            frameborder="0"
                            marginheight="0"
                            marginwidth="0"
                            class="w-full"
                            loading="lazy"
                        >
                            Memuat form...
                        </iframe>
                    </div>
                    <div class="mt-4 mb-4 text-center">
                        <p class="text-gray-500 text-sm">
                            <i class="fas fa-info-circle mr-1"></i>
                            {{ $service['note'] }}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Section dummy untuk menghindari error JS jika section-tentang tidak ada -->
<section id="section-tentang" class="hidden"></section>
