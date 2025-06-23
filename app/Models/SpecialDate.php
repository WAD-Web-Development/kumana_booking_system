<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialDate extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_date',
        'end_date',
        'title',
        'description',
        'is_full_day',
        'day_time',
        'image_path',
        'is_closed',
        'is_active',
    ];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        if ($this->image_path) {
            return asset('storage/' . $this->image_path);
        }
    }
}
