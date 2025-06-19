<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Produk extends Model
{
    protected $table = 'produk';

    protected $fillable = [
        'jenis_produk',
        'judul',
        'isi',
        'script',
        'penulis',
        'status'
    ];
    public $timestamps = true;
    // get jenis_produk
    public function getJenisProdukAttribute($value)
    {
        return ucfirst(str_replace('_', ' ', $value));
    }

    /**
     * Get the categories associated with the product.
     */
    public function kategori()
    {
        return $this->belongsToMany(KategoriProduk::class, 'kategori_produk_produk', 'produk_id', 'kategori_id');
    }
    /**
     * Get the images associated with this product.
     */
    public function gambar(): HasMany
    {
        return $this->hasMany(GambarProduk::class, 'produk_id');
    }
}
