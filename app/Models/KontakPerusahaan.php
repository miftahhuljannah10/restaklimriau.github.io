<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KontakPerusahaan extends Model
{
    protected $table = 'kontak_perusahaan';
    protected $fillable = ['key', 'value', 'link'];
    public $timestamps = true;
}
