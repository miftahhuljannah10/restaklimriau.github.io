<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
    @foreach($produkList as $produk)
        @include('components.before-login.produk.produk-card', [
            'title' => $produk['title'],
            'image' => $produk['image'],
            'category' => $produk['kategori'],
            'instansi' => $produk['stasiun']
        ])
    @endforeach
</div>
