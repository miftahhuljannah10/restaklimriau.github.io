<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KategoriProduk extends Model
{
    protected $table = 'kategori_produk';

    protected $fillable = [
        'nama_kategori',
        'slug'
    ];

    /**
     * Get all products in this category
     */
    public function produk()
    {
        return $this->belongsToMany(Produk::class, 'kategori_produk_produk', 'kategori_id', 'produk_id');
    }
}
