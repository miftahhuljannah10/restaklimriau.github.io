
<div class="w-full max-w-12xl mx-auto mt-8">
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="p-0 md:p-4">
            <div class="w-full h-[260px] sm:h-[350px] md:h-[500px] rounded-xl overflow-hidden relative">
                <div id="mapid" class="w-full h-full"></div>
            </div>
        </div>
        <div class="bg-gray-50 border-t border-gray-100 px-2 sm:px-4 py-6">
            <div class="card-footer">
                <h4 class="text-lg md:text-xl font-bold text-sky-700 mb-2 tracking-wide text-center"><strong>{{ $jenisAlatLabel ?? 'JENIS ALAT' }}</strong></h4>
                <div class="flex flex-wrap justify-center gap-x-8 gap-y-6 mt-4">
                    @foreach($jenisAlat as $alat)
                        <div class="flex flex-col items-center min-w-[80px] max-w-[120px]">
                            <span class="text-base md:text-lg font-semibold text-center">{{ $alat['label'] }}</span>
                            <img src="{{ $imgBaseUrl . $alat['icon'] }}" class="h-14 w-14 md:h-20 md:w-20 object-contain mt-3" alt="{{ $alat['label'] }}">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Tambahkan Leaflet CSS & JS jika belum ada -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<!-- Data alat untuk JS map -->
<script>
window.imgBaseUrl = "{{ $imgBaseUrl }}";
window.titikAlat = @json($titikAlat ?? []);

// Use data from controller instead of hardcoded array
var titikAlat = window.titikAlat;

// Mapping jenis alat ke icon
var iconMap = {
    'PHK': 'ph_1.png',
    'ARG': 'arg_1.png',
    'AWS': 'aws_1.png',
    'AAWS': 'aaws_1.png',
    'ASRS': 'asrs_1.png',
    'IKRO': 'ikro_1.png',
};

document.addEventListener('DOMContentLoaded', function() {
    var map = L.map('mapid').setView([0.5, 101.5], 7);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 18,
        attribution: '© OpenStreetMap'
    }).addTo(map);

    titikAlat.forEach(function(alat) {
        var icon = L.icon({
            iconUrl: window.imgBaseUrl + (iconMap[alat.jenis] || 'ph_1.png'),
            iconSize: [40, 40],
            iconAnchor: [20, 40],
            popupAnchor: [0, -40]
        });
        var popupHtml = '<div style="min-width:180px;max-width:220px;">' +
            '<a href="/masyarakat/detail-alat/' + alat.nomor_pos + '" style="font-size:1.5em;color:#1976d2;font-weight:500;text-decoration:underline;cursor:pointer;">' + alat.nama + '</a>' +
            '<hr style="margin:8px 0 12px 0;">' +
            '<div style="font-size:1em;margin-bottom:8px;">ID Pos : ' + alat.nomor_pos + '</div>' +
            '<div style="font-size:1em;">Koordinat : ' + alat.lat.toFixed(2) + ', ' + alat.lng.toFixed(4) + '</div>' +
            '</div>';
        L.marker([alat.lat, alat.lng], {icon: icon}).addTo(map)
            .bindPopup(popupHtml);
    });
});
</script>
