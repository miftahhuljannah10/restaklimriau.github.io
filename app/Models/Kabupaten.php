<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    protected $table = 'kabupaten';
    protected $fillable = [
        'nama_kabupaten',
    ];
    public function kecamatans()
    {
        return $this->hasMany(Kecamatan::class);
    }
    // alats
    public function alats()
    {
        return $this->hasMany(Alat::class);
    }
}
