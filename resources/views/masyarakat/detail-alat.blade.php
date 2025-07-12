@extends('welcome')
@section('content')
    @include('components.before-login.layanan.detail-alat', [
        'title' => 'Ketersediaan Alat Observasi - ' . ($alat->nama_pos ?? 'Data Alat'),
        'metadata' => $metadata,
        'gambarAlat' => $alat->foto ? asset('foto_alat/' . $alat->foto) : asset('images/no-image.png'),
        'tabLabels' => $tabLabels,
        'dataGrafik' => $dataGrafik,
        'opsiGrafik' => $opsiGrafik,
        'keteranganGrafik' => $keteranganGrafik,
    ])
@endsection
