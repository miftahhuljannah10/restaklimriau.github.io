<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $table = 'provinsi';
    protected $fillable = [
        'nama_provinsi',
    ];

    public function kecamatan()
    {
        return $this->hasManyThrough(Kecamatan::class, Kabupaten::class);
    }
    public function alats()
    {
        return $this->hasManyThrough(Alat::class, Kabupaten::class);
    }

    public function kabupatens()
    {
        // Menggunakan kecamatan sebagai perantara
        return Kabupaten::whereIn('id', function ($query) {
            $query->select('kabupaten_id')
                ->from('kecamatan')
                ->whereIn('provinsi_id', [$this->id]);
        })->get();
    }
}
