<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class VisiMisiSection extends Model
{
    protected $table = 'visimisi_sections';

    protected $fillable = [
        'section_type',
        'nama',
        'deskripsi',
        'is_active',
    ];

    public function items()
    {
        return $this->hasMany(VisiMisiItem::class, 'section_id');
    }

    public function getActiveItemsAttribute()
    {
        return $this->items()->where('is_active', true)->orderBy('order_number')->get();
    }
}
