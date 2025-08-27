<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'is_active',
        'room_count',
        'max_people_count',
        'price',
        'image_path',
    ];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        if ($this->image_path) {
            return asset('storage/' . $this->image_path);
        }
    }

    public function packages()
    {
        return $this->hasMany(Package::class, 'room_type_id');
    }
}
