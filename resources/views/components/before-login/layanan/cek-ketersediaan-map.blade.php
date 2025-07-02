<!-- Cek Ketersediaan Data - Modern Map Component (Responsif) -->
<div class="w-full max-w-12xl mx-auto mt-8">
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="p-0 md:p-4">
            <div class="w-full h-[260px] sm:h-[350px] md:h-[500px] rounded-xl overflow-hidden relative">
                <div id="mapid" class="w-full h-full"></div>
            </div>
        </div>
        <div class="bg-gray-50 border-t border-gray-100 px-2 sm:px-4 py-6">
            <div class="card-footer">
                <h4 class="text-lg md:text-xl font-bold text-sky-700 mb-2 tracking-wide text-center"><strong>JENIS ALAT</strong></h4>
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
// Daftar koordinat, jenis alat, dan nomor pos manual (data sesuai yang Anda kirim)
var titikAlat = [
  {nama:'SMPK Bangkinang', jenis:'PHK', nomor_pos:'14010101A', lat:0.333277778, lng:101.0332778},
  {nama:'Kampar', jenis:'PHK', nomor_pos:'14010201A', lat:0.350583333, lng:101.0898056},
  {nama:'Stasiun Klimatologi Kampar', jenis:'PHK', nomor_pos:'14010301A', lat:0.402194444, lng:101.2579722},
  {nama:'Koto Kampar Hulu', jenis:'PHK', nomor_pos:'14010401A', lat:0.3025, lng:100.6069167},
  {nama:'XIII Koto Kampar', jenis:'PHK', nomor_pos:'14010403A', lat:0.330472222, lng:100.8122222},
  {nama:'Kuok', jenis:'PHK', nomor_pos:'14010501A', lat:0.309944444, lng:100.9266944},
  {nama:'Siak Hulu', jenis:'PHK', nomor_pos:'14010601A', lat:0.397194444, lng:101.5280556},
  {nama:'Kampar Kiri', jenis:'PHK', nomor_pos:'14010701A', lat:0.047388889, lng:101.2046389},
  {nama:'Kampar Kiri Hilir', jenis:'PHK', nomor_pos:'14010801A', lat:0.241388889, lng:101.3852778},
  {nama:'Kampar Kiri Hulu', jenis:'PHK', nomor_pos:'14010901A', lat:-0.147888889, lng:101.0766389},
  {nama:'Tapung', jenis:'PHK', nomor_pos:'14011001A', lat:0.610166667, lng:100.9740556},
  {nama:'Tapung Hilir', jenis:'PHK', nomor_pos:'14011101A', lat:0.738055556, lng:101.1852778},
  {nama:'Tapung Hulu', jenis:'PHK', nomor_pos:'14011201A', lat:0.641805556, lng:100.9091667},
  {nama:'Salo', jenis:'PHK', nomor_pos:'14011301A', lat:0.329083333, lng:100.9797222},
  {nama:'Rumbio Jaya', jenis:'PHK', nomor_pos:'14011401A', lat:0.373527778, lng:101.1580556},
  {nama:'Bangkinang', jenis:'PHK', nomor_pos:'14011501A', lat:0.364694444, lng:101.0271667},
  {nama:'Perhentian Raja', jenis:'PHK', nomor_pos:'14011601A', lat:0.282888889, lng:101.4072778},
  {nama:'Kampa', jenis:'PHK', nomor_pos:'14011701A', lat:0.348194444, lng:101.1829444},
  {nama:'Kampar Utara', jenis:'PHK', nomor_pos:'14011801A', lat:0.390555556, lng:101.0905556},
  {nama:'Kampar Kiri Tengah', jenis:'PHK', nomor_pos:'14011901A', lat:0.18575, lng:101.3268056},
  {nama:'Gunung Sahilan', jenis:'PHK', nomor_pos:'14012001A', lat:0.084416667, lng:101.2902778},
  {nama:'Rengat', jenis:'PHK', nomor_pos:'14020101A', lat:-0.38575, lng:102.5425},
  {nama:'Rengat Barat', jenis:'PHK', nomor_pos:'14020202A', lat:-0.394416667, lng:102.4485833},
  {nama:'Kelayang', jenis:'PHK', nomor_pos:'14020301A', lat:-0.461694444, lng:102.1238611},
  {nama:'Pasir Penyu', jenis:'PHK', nomor_pos:'14020403A', lat:-0.372944444, lng:102.2722222},
  {nama:'Peranap', jenis:'PHK', nomor_pos:'14020501A', lat:-0.519416667, lng:101.9496944},
  {nama:'Lubuk Batu Jaya', jenis:'PHK', nomor_pos:'14020601A', lat:-0.341138889, lng:102.1185556},
  {nama:'Siberida', jenis:'PHK', nomor_pos:'14020602A', lat:-0.543583333, lng:102.4366389},
  {nama:'Batang Cenaku', jenis:'PHK', nomor_pos:'14020702A', lat:-0.680916667, lng:102.2683611},
  {nama:'Batang Gansal', jenis:'PHK', nomor_pos:'14020801A', lat:-0.728305556, lng:102.5125},
  {nama:'Lirik', jenis:'PHK', nomor_pos:'14020901A', lat:-0.311388889, lng:102.31},
  {nama:'Stasiun Meteorologi Indragiri Hulu', jenis:'PHK', nomor_pos:'14020902A', lat:-0.35, lng:102.33},
  {nama:'Kuala Cenaku', jenis:'PHK', nomor_pos:'14021001A', lat:-0.153805556, lng:102.66425},
  {nama:'Sungai Lala', jenis:'PHK', nomor_pos:'14021101A', lat:-0.395527778, lng:102.2199722},
  {nama:'Rakit Kulim', jenis:'PHK', nomor_pos:'14021301A', lat:-0.512722222, lng:102.1913889},
  {nama:'Batang Peranap', jenis:'PHK', nomor_pos:'14021401A', lat:-0.547527778, lng:101.9452778},
  {nama:'Selat Baru', jenis:'PHK', nomor_pos:'14030101A', lat:1.532, lng:102.2196944},
  {nama:'Bantan', jenis:'PHK', nomor_pos:'14030202A', lat:1.499, lng:102.1457778},
  {nama:'Bandar Laksamana', jenis:'PHK', nomor_pos:'14030302A', lat:1.533166667, lng:101.9131667},
  {nama:'Bukit Batu', jenis:'PHK', nomor_pos:'14030303A', lat:1.36325, lng:102.1541389},
  {nama:'Mandau', jenis:'PHK', nomor_pos:'14030901A', lat:1.276666667, lng:101.1897222},
  {nama:'Rupat', jenis:'PHK', nomor_pos:'14031001A', lat:1.715416667, lng:101.5251389},
  {nama:'Rupat Utara', jenis:'PHK', nomor_pos:'14031101A', lat:2.103666667, lng:101.6491667},
  {nama:'Siak Kecil', jenis:'PHK', nomor_pos:'14031201A', lat:1.215, lng:102.1368889},
  {nama:'Pinggir', jenis:'PHK', nomor_pos:'14031301A', lat:1.169222222, lng:101.2519167},
  {nama:'Reteh', jenis:'PHK', nomor_pos:'14040101A', lat:-0.694388889, lng:103.2044167},
  {nama:'Enok', jenis:'PHK', nomor_pos:'14040201A', lat:-0.533277778, lng:103.2},
  {nama:'Kuala Indragiri', jenis:'PHK', nomor_pos:'14040301A', lat:-0.27875, lng:103.4319167},
  {nama:'Tembilahan', jenis:'PHK', nomor_pos:'14040402A', lat:-0.31125, lng:103.1801111},
  {nama:'Tempuling', jenis:'PHK', nomor_pos:'14040502A', lat:-0.448, lng:102.866},
  {nama:'Gaung Anak Serka', jenis:'PHK', nomor_pos:'14040601A', lat:-0.196194444, lng:103.0738333},
  {nama:'Mandah', jenis:'PHK', nomor_pos:'14040701A', lat:0.023944444, lng:103.49725},
  {nama:'Kateman', jenis:'PHK', nomor_pos:'14040801A', lat:0.294888889, lng:103.6413333},
  {nama:'Keritang', jenis:'PHK', nomor_pos:'14040901A', lat:-0.692277778, lng:102.6595556},
  {nama:'Tanah Merah', jenis:'PHK', nomor_pos:'14041001A', lat:-0.37, lng:103.29},
  {nama:'Batang Tuaka', jenis:'PHK', nomor_pos:'14041102A', lat:-0.219722222, lng:103.1003889},
  {nama:'Metro', jenis:'PHK', nomor_pos:'14041103A', lat:-0.689805556, lng:103.2133611},
  {nama:'Gaung', jenis:'PHK', nomor_pos:'14041201A', lat:-0.037055556, lng:102.9031944},
  {nama:'Kuala Lahang', jenis:'PHK', nomor_pos:'14041202A', lat:-0.099694444, lng:103.3391944},
  {nama:'Tembilahan Hulu', jenis:'PHK', nomor_pos:'14041301A', lat:-0.373027778, lng:103.0933611},
  {nama:'Kemuning', jenis:'PHK', nomor_pos:'14041401A', lat:-0.912, lng:102.766},
  {nama:'Pelangiran', jenis:'PHK', nomor_pos:'14041501A', lat:0.22, lng:103.4},
  {nama:'Teluk Belengkong', jenis:'PHK', nomor_pos:'14041601A', lat:0.295638889, lng:103.4376389},
  {nama:'Pulau Burung', jenis:'PHK', nomor_pos:'14041701A', lat:0.427944444, lng:103.5718611},
  {nama:'Concong', jenis:'PHK', nomor_pos:'14041801A', lat:-0.24, lng:103.61},
  {nama:'Kempas', jenis:'PHK', nomor_pos:'14041901A', lat:-0.539722222, lng:102.8167222},
  {nama:'Benteng Utara', jenis:'PHK', nomor_pos:'14042001A', lat:-0.617222222, lng:103.2292778},
  {nama:'Sungai Batang', jenis:'PHK', nomor_pos:'14042002A', lat:-0.6385, lng:103.2250556},
  {nama:'Ukui', jenis:'PHK', nomor_pos:'14050101A', lat:-0.226055556, lng:101.9441111},
  {nama:'Pangkalan Kerinci', jenis:'PHK', nomor_pos:'14050201A', lat:0.436, lng:101.8904444},
  {nama:'Uptd Plasma Nutfah', jenis:'PHK', nomor_pos:'14050202A', lat:0.377888889, lng:101.8219722},
  {nama:'Pangkalan Kuras', jenis:'PHK', nomor_pos:'14050301A', lat:0.144805556, lng:102.0647778},
  {nama:'Pangkalan Lesung', jenis:'PHK', nomor_pos:'14050401A', lat:-0.05375, lng:102.1378889},
  {nama:'Langgam', jenis:'PHK', nomor_pos:'14050501A', lat:0.236083333, lng:101.7101667},
  {nama:'Bandara Sultan Syarif Harun Setia Negara', jenis:'PHK', nomor_pos:'14050601A', lat:0.516333333, lng:102.0927222},
  {nama:'Pelalawan', jenis:'PHK', nomor_pos:'14050602A', lat:0.394472222, lng:101.9693056},
  {nama:'Kerumutan', jenis:'PHK', nomor_pos:'14050701A', lat:-0.021861111, lng:102.3966389},
  {nama:'Bunut', jenis:'PHK', nomor_pos:'14050801A', lat:0.208361111, lng:102.1131111},
  {nama:'Teluk Meranti', jenis:'PHK', nomor_pos:'14050901A', lat:0.149305556, lng:102.5603889},
  {nama:'Kuala Kampar', jenis:'PHK', nomor_pos:'14051001A', lat:0.531083333, lng:103.2675},
  {nama:'Bandar Sei Kijang', jenis:'PHK', nomor_pos:'14051101A', lat:0.43875, lng:101.6426389},
  {nama:'Bandar Petalangan', jenis:'PHK', nomor_pos:'14051201A', lat:0.104694444, lng:102.1131944},
  {nama:'Ujung Batu', jenis:'PHK', nomor_pos:'14060101A', lat:0.719666667, lng:100.5421389},
  {nama:'Rokan IV Koto', jenis:'PHK', nomor_pos:'14060202A', lat:0.571166667, lng:100.4270278},
  {nama:'SMPK Pasir Pangaraian', jenis:'PHK', nomor_pos:'14060302A', lat:14.03972222, lng:100.2802222},
  {nama:'Tambusai', jenis:'PHK', nomor_pos:'14060402A', lat:1.056333333, lng:100.303},
  {nama:'Kepenuhan', jenis:'PHK', nomor_pos:'14060501A', lat:1.150722222, lng:100.6421944},
  {nama:'Kunto Darussalam', jenis:'PHK', nomor_pos:'14060601A', lat:0.825666667, lng:100.6465},
  {nama:'Rambah Samo', jenis:'PHK', nomor_pos:'14060701A', lat:0.842138889, lng:100.4166944},
  {nama:'Rambah Hilir', jenis:'PHK', nomor_pos:'14060801A', lat:16.47638889, lng:100.7588889},
  {nama:'Tambusai Utara', jenis:'PHK', nomor_pos:'14060901A', lat:1.323722222, lng:100.3043889},
  {nama:'Bangun Purba', jenis:'PHK', nomor_pos:'14061001A', lat:0.884972222, lng:100.2288611},
  {nama:'Tandun', jenis:'PHK', nomor_pos:'14061101A', lat:0.581555556, lng:100.5979722},
  {nama:'Bonai Darussalam', jenis:'PHK', nomor_pos:'14061301A', lat:1.16925, lng:100.8433889},
  {nama:'Kepenuhan Hulu', jenis:'PHK', nomor_pos:'14061501A', lat:1.030027778, lng:100.4648611},
  {nama:'Kubu', jenis:'PHK', nomor_pos:'14070101A', lat:2.087666667, lng:100.6456944},
  {nama:'Tanjung Medan', jenis:'PHK', nomor_pos:'14070102A', lat:1.506888889, lng:100.5276944},
  {nama:'Dinas Pertanian Kab. Rokan Hilir', jenis:'PHK', nomor_pos:'14070201A', lat:2.150194444, lng:100.8243889},
  {nama:'Bangko', jenis:'PHK', nomor_pos:'14070202A', lat:2.178055556, lng:100.8071944},
  {nama:'Bagan Sinembah Raya', jenis:'PHK', nomor_pos:'14070203A', lat:1.706888889, lng:100.4260833},
  {nama:'Tanah Putih', jenis:'PHK', nomor_pos:'14070302A', lat:1.583388889, lng:100.9830833},
  {nama:'Ujung Tanjung', jenis:'PHK', nomor_pos:'14070303A', lat:1.622305556, lng:101.1510556},
  {nama:'Uptd Rimba Melintang', jenis:'PHK', nomor_pos:'14070401A', lat:1.845527778, lng:100.9788611},
  {nama:'Bbu Rimba Melintang', jenis:'PHK', nomor_pos:'14070402A', lat:1.769583333, lng:101.0206944},
  {nama:'Bagan Sinembah', jenis:'PHK', nomor_pos:'14070501A', lat:1.6795, lng:100.5302778},
  {nama:'Panipahan Darat', jenis:'PHK', nomor_pos:'14070601A', lat:2.454333333, lng:100.3134722},
  {nama:'Pasir Limau Kapas', jenis:'PHK', nomor_pos:'14070602A', lat:2.318, lng:100.359},
  {nama:'Sinaboi', jenis:'PHK', nomor_pos:'14070701A', lat:2.209416667, lng:100.9563889},
  {nama:'Pujud', jenis:'PHK', nomor_pos:'14070801A', lat:1.434694444, lng:100.6468889},
  {nama:'Balai Jaya', jenis:'PHK', nomor_pos:'14070901A', lat:1.712694444, lng:100.6210833},
  {nama:'Tanah Putih Tanjung Melawan', jenis:'PHK', nomor_pos:'14070902A', lat:1.678583333, lng:101.0453889},
  {nama:'Bangko Pusako', jenis:'PHK', nomor_pos:'14071001A', lat:1.770166667, lng:100.9458333},
  {nama:'Simpang Kanan', jenis:'PHK', nomor_pos:'14071101A', lat:1.855083333, lng:100.3608889},
  {nama:'Batu Hampar', jenis:'PHK', nomor_pos:'14071201A', lat:1.927666667, lng:100.9270556},
  {nama:'Rantau Kopar', jenis:'PHK', nomor_pos:'14071301A', lat:1.3725, lng:101.0035833},
  {nama:'Pekaitan', jenis:'PHK', nomor_pos:'14071401A', lat:1.256944444, lng:100.2846111},
  {nama:'Kubu Babusalam', jenis:'PHK', nomor_pos:'14071501A', lat:2.051583333, lng:100.6211111},
  {nama:'Siak Sri Indrapura', jenis:'PHK', nomor_pos:'14080102A', lat:0.824166667, lng:102.0143889},
  {nama:'Sungai Apit', jenis:'PHK', nomor_pos:'14080201A', lat:1.108916667, lng:102.1488056},
  {nama:'Minas', jenis:'PHK', nomor_pos:'14080301A', lat:0.699166667, lng:101.4385},
  {nama:'Tualang', jenis:'PHK', nomor_pos:'14080401A', lat:0.679, lng:101.5900278},
  {nama:'Sungai Mandau', jenis:'PHK', nomor_pos:'14080501A', lat:1.015472222, lng:101.7483889},
  {nama:'Dayun', jenis:'PHK', nomor_pos:'14080601A', lat:0.655305556, lng:102.0139167},
  {nama:'Kerinci Kanan', jenis:'PHK', nomor_pos:'14080701A', lat:0.505, lng:101.7921389},
  {nama:'SMPK Bunga Raya', jenis:'PHK', nomor_pos:'14080801A', lat:0.960777778, lng:102.073},
  {nama:'Kota Gasib', jenis:'PHK', nomor_pos:'14080901A', lat:0.720277778, lng:101.7517778},
  {nama:'Kandis', jenis:'PHK', nomor_pos:'14081001A', lat:0.889666667, lng:101.2369444},
  {nama:'Lubuk Dalam', jenis:'PHK', nomor_pos:'14081101A', lat:0.616666667, lng:101.80775},
  {nama:'Sabak Auh', jenis:'PHK', nomor_pos:'14081201A', lat:1.146277778, lng:102.1295278},
  {nama:'Mempura', jenis:'PHK', nomor_pos:'14081301A', lat:0.783, lng:102.0760556},
  {nama:'Pusako', jenis:'PHK', nomor_pos:'14081401A', lat:1.010416667, lng:102.1151111},
  {nama:'Bpp Kuantan Mudik', jenis:'PHK', nomor_pos:'14090103A', lat:-0.666888889, lng:101.4582778},
  {nama:'Singingi', jenis:'PHK', nomor_pos:'14090301A', lat:-0.383277778, lng:101.3499722},
  {nama:'Kuantan Tengah', jenis:'PHK', nomor_pos:'14090201A', lat:-0.549972222, lng:101.5904444},
  {nama:'Kuantan Hilir', jenis:'PHK', nomor_pos:'14090401A', lat:-0.429833333, lng:101.751},
  {nama:'Cerenti', jenis:'PHK', nomor_pos:'14090501A', lat:-0.50125, lng:101.8573056},
  {nama:'Benai', jenis:'PHK', nomor_pos:'14090601A', lat:-0.480833333, lng:101.6261111},
  {nama:'Gunung Toar', jenis:'PHK', nomor_pos:'14090701A', lat:-0.591861111, lng:101.5011944},
  {nama:'Singingi Hilir', jenis:'PHK', nomor_pos:'14090801A', lat:-0.265333333, lng:101.4188889},
  {nama:'Pangean', jenis:'PHK', nomor_pos:'14090901A', lat:-0.412805556, lng:101.6845833},
  {nama:'Logas Tanah Darat', jenis:'PHK', nomor_pos:'14091001A', lat:-0.262277778, lng:101.59525},
  {nama:'Inuman', jenis:'PHK', nomor_pos:'14091101A', lat:-0.461361111, lng:101.8030278},
  {nama:'Hulu Kuantan', jenis:'PHK', nomor_pos:'14091201A', lat:-0.577472222, lng:101.3533333},
  {nama:'Kuantan Hilir Seberang', jenis:'PHK', nomor_pos:'14091301A', lat:-0.608, lng:101.809},
  {nama:'Sentajo Raya', jenis:'PHK', nomor_pos:'14091401A', lat:-0.489333333, lng:101.6061111},
  {nama:'Tebing Tinggi', jenis:'PHK', nomor_pos:'14100101A', lat:1.007861111, lng:102.7159167},
  {nama:'Rangsang Barat', jenis:'PHK', nomor_pos:'14100201A', lat:1.027888889, lng:102.6514444},
  {nama:'Rangsang', jenis:'PHK', nomor_pos:'14100301A', lat:0.839972222, lng:103.0915833},
  {nama:'Tebing Tinggi Barat', jenis:'PHK', nomor_pos:'14100401A', lat:0.982888889, lng:102.6333333},
  {nama:'Merbau', jenis:'PHK', nomor_pos:'14100501A', lat:1.051694444, lng:102.4352778},
  {nama:'Pulau Merbau', jenis:'PHK', nomor_pos:'14100601A', lat:1.066972222, lng:102.546},
  {nama:'Tebing Tinggi Timur', jenis:'PHK', nomor_pos:'14100701A', lat:0.84475, lng:103.0059444},
  {nama:'Rangsang Pesisir', jenis:'PHK', nomor_pos:'14100901A', lat:1.093583333, lng:102.7518889},
  {nama:'Stasiun Meteorologi Sultan Syarif Kasim II', jenis:'PHK', nomor_pos:'14710902A', lat:0.459166667, lng:101.4373333},
  {nama:'Dumai Barat', jenis:'PHK', nomor_pos:'14720101A', lat:1.698277778, lng:101.3977778},
  {nama:'Dumai Timur', jenis:'PHK', nomor_pos:'14720201A', lat:1.667777778, lng:101.4594167},
  {nama:'Bandara Pinang Kampai', jenis:'PHK', nomor_pos:'14720202A', lat:1.609805556, lng:101.4989722},
  {nama:'Bukit Kapur', jenis:'PHK', nomor_pos:'14720301A', lat:1.595277778, lng:101.4096944},
  {nama:'Sungai Sembilan', jenis:'PHK', nomor_pos:'14720401A', lat:1.832777778, lng:101.3027778},
  {nama:'Medang Kampai', jenis:'PHK', nomor_pos:'14720501A', lat:1.599666667, lng:101.58975},
  {nama:'AAWS Rimba Melintang Rokan Hilir', jenis:'AAWS', nomor_pos:'Sta3203', lat:1.845611111, lng:100.9783056},
  {nama:'AAWS Gunung Toar Kuantan Singingi', jenis:'AAWS', nomor_pos:'AAWS0356', lat:-0.598055556, lng:101.4864722},
  {nama:'AAWS Tambang Kampar', jenis:'AAWS', nomor_pos:'Sta3202', lat:0.085277778, lng:101.1835833},
  {nama:'ARG Bangkinang', jenis:'ARG', nomor_pos:'Sta0201', lat:0.326305556, lng:101.0395556},
  {nama:'ARG Batang Cenaku', jenis:'ARG', nomor_pos:'Sta0208', lat:-0.663583333, lng:102.2787778},
  {nama:'ARG Bantan', jenis:'ARG', nomor_pos:'Sta0151', lat:1.499388889, lng:102.1458889},
  {nama:'ARG Bpp Kampar Kiri', jenis:'ARG', nomor_pos:'Stal042', lat:0.046916667, lng:101.2043889},
  {nama:'ARG Bpp Rumbai Timur', jenis:'ARG', nomor_pos:'Stal041', lat:0.566666667, lng:101.4599722},
  {nama:'ARG SMPK Bunga Raya', jenis:'ARG', nomor_pos:'Sta3259', lat:0.960305556, lng:102.0729444},
  {nama:'ARG Dumai Timur', jenis:'ARG', nomor_pos:'Sta0209', lat:1.667777778, lng:101.4594167},
  {nama:'ARG Tandun', jenis:'ARG', nomor_pos:'150119', lat:0.6115, lng:100.5540278},
  {nama:'ARG Kandis', jenis:'ARG', nomor_pos:'Sta0133', lat:0.889666667, lng:101.2369444},
  {nama:'ARG Kuala Kampar', jenis:'ARG', nomor_pos:'150116', lat:0.531, lng:103.2676944},
  {nama:'ARG Kuantan Tengah', jenis:'ARG', nomor_pos:'Sta0153', lat:-0.505277778, lng:101.5390278},
  {nama:'ARG Minas', jenis:'ARG', nomor_pos:'150117', lat:0.699166667, lng:101.4385},
  {nama:'ARG Pasir Pangaraian', jenis:'ARG', nomor_pos:'Sta0154', lat:0.896083333, lng:100.3038889},
  {nama:'ARG Pusako', jenis:'ARG', nomor_pos:'150118', lat:1.017694444, lng:102.116},
  {nama:'ARG Rokan IV Koto', jenis:'ARG', nomor_pos:'Sta0205', lat:0.571333333, lng:100.4271111},
  {nama:'ARG Tanah Putih', jenis:'ARG', nomor_pos:'Sta0150', lat:1.572555556, lng:101.0005833},
  {nama:'ARG Tebing Tinggi', jenis:'ARG', nomor_pos:'Sta0207', lat:1.007861111, lng:102.7160556},
  {nama:'ARG Siak', jenis:'ARG', nomor_pos:'Sta0152', lat:0.814527778, lng:102.0211944},
  {nama:'ARG Bukit Batu', jenis:'ARG', nomor_pos:'Sta0202', lat:1.364222222, lng:102.1549444},
  {nama:'ARG Tambusai', jenis:'ARG', nomor_pos:'150120', lat:1.056916667, lng:100.2610833},
  {nama:'ARG Teluk Meranti', jenis:'ARG', nomor_pos:'Sta0174', lat:0.149305556, lng:102.5603889},
  {nama:'ARG Tembilahan', jenis:'ARG', nomor_pos:'Sta0206', lat:-0.324361111, lng:103.15775},
  {nama:'ARG XIII Koto Kampar', jenis:'ARG', nomor_pos:'Sta0155', lat:0.317777778, lng:100.7352778},
  {nama:'AWS Pekan Arba Indragiri Hilir', jenis:'AWS', nomor_pos:'Sta2176', lat:-0.297027778, lng:103.1322778},
  {nama:'AWS Bandar Laksamana Bengkalis', jenis:'AWS', nomor_pos:'Stw1054', lat:1.594916667, lng:101.7511111}
];

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
