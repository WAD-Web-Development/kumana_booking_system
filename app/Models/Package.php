<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'is_active', 'image_path'];

    protected $appends = ['image_url'];

    public function images()
    {
        return $this->hasMany(PackageImage::class);
    }
}
