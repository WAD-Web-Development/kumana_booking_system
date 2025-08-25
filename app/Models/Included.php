<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Included extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
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
        return $this->belongsToMany(Package::class, 'package_includeds');
    }
}
