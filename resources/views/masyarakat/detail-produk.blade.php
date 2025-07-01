@extends('welcome')

@section('content')
    @include('components.before-login.produk.detail-produk', [
        'judul' => $judul ?? 'Prakiraan Ketersediaan Air Bagi Tanaman',
        'tanggal' => $tanggal ?? '27 Oct 2022',
        'kategori' => $kategori ?? 'Agroklimat',
        'iframe' => $iframe ?? 'https://visklim.bmkg.go.id/views/PrakiraanKetersediaanAirBagiTanaman/DashboardPraATi?:embed=y&:showVizHome=no&:host_url=https%3A%2F%2Fvisklim.bmkg.go.id%2F&:embed_code_version=3&:tabs=no&:toolbar=yes&:animate_transition=yes&:display_static_image=yes&:display_spinner=no&:display_overlay=yes&:display_count=yes&:device=desktop&:language=en-US&Provinsi=RIAU&:loadOrderID=0',
        'deskripsi' => $deskripsi ?? '<p>Perhitungan Tingkat Ketersediaan Air Tanah Bagi Tanaman (ATi) dihitung menggunakan perhitungan neraca air dengan metode <em>Thornthwaite and Mather</em>. ATi dihitung dengan persamaan ((KAT - TLP)/(KL - TLP)) x 100% dengan kriteria sebagai berikut :</p>',
        'kriteria' => $kriteria ?? [
            ['warna' => 'from-red-400 to-red-600', 'teks' => 'Sangat Kurang: 0 - 20%'],
            ['warna' => 'from-orange-400 to-orange-600', 'teks' => 'Kurang: 20 - 40%'],
            ['warna' => 'from-yellow-400 to-yellow-600', 'teks' => 'Sedang: 40 - 60%'],
            ['warna' => 'from-green-400 to-green-600', 'teks' => 'Cukup: 60 - 80%'],
            ['warna' => 'from-blue-400 to-blue-600', 'teks' => 'Sangat Cukup: 80 - 100%'],
        ],
        'keterangan_bawah' => $keterangan_bawah ?? '<p>Grafik prakiraan tingkat ketersediaan air tanah bagi tanaman terkhususnya wilayah provinsi Riau dapat di filter sesuai bulan, provinsi, kabupaten/kota dan kategori kriteria. Grafik ini juga menampilkan tingkat ketersediaan air tanah secara realtime sehingga dapat mendukung kegiatan masyarakat terkhusus di sektor pertanian di wilayah Riau.</p>',
        'topik' => $topik ?? 'Agroklimat',
        'sumber' => $sumber ?? 'BMKG',
    ])
@endsection
