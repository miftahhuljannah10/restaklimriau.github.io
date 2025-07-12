<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisiMisiItem extends Model
{
    protected $table = 'visimisi_items';

    protected $fillable = [
        'section_id',
        'content',
        'order_number',
        'is_active',
    ];

    public function section()
    {
        return $this->belongsTo(VisiMisiSection::class, 'section_id');
    }

    public function getIsActiveAttribute($value)
    {
        return (bool) $value;
    }
}
