<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $table = 'provinsi';
    protected $fillable = [
        'nama_provinsi',
    ];

    public function kabupatens()
    {
        return $this->hasMany(Kabupaten::class);
    }
    public function kecamatan()
    {
        return $this->hasManyThrough(Kecamatan::class, Kabupaten::class);
    }
}
