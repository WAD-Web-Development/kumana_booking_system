<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'note',
        'is_active',
        'image_path',
        'is_special',
        'start_date',
        'end_date',
        'type',
        'safari_type',
        'safari_max_people_count',
        'room_type_id',
    ];

    protected $appends = ['image_url'];

    public function images()
    {
        return $this->hasMany(PackageImage::class);
    }

    public function getImageUrlAttribute()
    {
        if ($this->image_path) {
            return asset('storage/' . $this->image_path);
        }
    }
}
