<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GambarProduk extends Model
{
    protected $table = 'gambar_produk';

    protected $fillable = [
        'produk_id',
        'path',
        'urutan'
    ];

    /**
     * Get the product that owns the image
     */
    public function produk(): BelongsTo
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
    // Optional accessor: jika ingin path diakses sebagai URL
    public function getUrlAttribute()
    {
        return asset('storage/' . $this->path); // atau sesuaikan dengan folder upload-mu
    }
}
