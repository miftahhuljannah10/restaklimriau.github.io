<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'kecamatan';

    protected $fillable = [
        'kabupaten_id',
        'nama_kecamatan',
    ];

    // Relasi ke Kabupaten
    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class);
    }

    // Relasi ke Provinsi melalui Kabupaten
    public function provinsi()
    {
        return $this->kabupaten->provinsi();
    }
}
