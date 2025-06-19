<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TarifPNBP extends Model
{
    protected $table = 'tarifpnbp';
    protected $fillable = [
        'nama_tarif',
        'satuan',
        'jenis_tarif',
        'tarif',
        'waktu',

    ];
}
