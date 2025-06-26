@extends('welcome')

@section('title', 'Form Layanan - BMKG Stasiun Klimatologi Riau')

@section('meta')
    <meta name="description" content="Form Layanan Stasiun Klimatologi Riau - Umum, Instansi Kerja Sama, dan Mahasiswa">
    <meta name="keywords" content="BMKG, Klimatologi, Riau, Form Layanan, Permintaan Data">
    <meta name="author" content="BMKG Riau">
    <link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico">
@endsection

@section('content')
    @include('components.before-login.layanan.service-selection')
    @include('components.before-login.layanan.service-content')
@endsection

@push('scripts')
<script>
// Tampilkan konten Umum secara default
window.addEventListener('DOMContentLoaded', function() {
    showServiceContent('umum');
    document.getElementById('umum-card').classList.add('border-sky-500');
});

function showServiceContent(type) {
    // Sembunyikan semua konten
    document.getElementById('umum-content').classList.add('hidden');
    document.getElementById('instansi-content').classList.add('hidden');
    document.getElementById('mahasiswa-content').classList.add('hidden');
    document.getElementById('form-embed').classList.add('hidden');
    // Reset border
    document.getElementById('umum-card').classList.remove('border-sky-500');
    document.getElementById('instansi-card').classList.remove('border-sky-500');
    document.getElementById('mahasiswa-card').classList.remove('border-sky-500');
    // Tampilkan konten sesuai pilihan
    if(type === 'umum') {
        document.getElementById('umum-content').classList.remove('hidden');
        document.getElementById('form-embed').classList.remove('hidden');
        document.getElementById('umum-card').classList.add('border-sky-500');
    } else if(type === 'instansi') {
        document.getElementById('instansi-content').classList.remove('hidden');
        document.getElementById('form-embed').classList.remove('hidden');
        document.getElementById('instansi-card').classList.add('border-sky-500');
    } else if(type === 'mahasiswa') {
        document.getElementById('mahasiswa-content').classList.remove('hidden');
        document.getElementById('form-embed').classList.remove('hidden');
        document.getElementById('mahasiswa-card').classList.add('border-sky-500');
    }
}
// Event listener untuk kartu layanan
['umum','instansi','mahasiswa'].forEach(function(type) {
    var card = document.getElementById(type+'-card');
    if(card) {
        card.addEventListener('click', function() {
            showServiceContent(type);
        });
    }
});
</script>
@endpush

