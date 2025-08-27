<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageItinerary extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_id',
        'title',
        'start_time',
        'end_time',
        'index',
    ];
}
