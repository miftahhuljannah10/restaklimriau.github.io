<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawai';
    protected $fillable = [
        'nama',
        'ttl',
        'NIP',
        'golongan',
        'jabatan',
        'pendidikan',
        'kompetensi',
        'email',
        'foto',
        'publikasi',
    ];
}
