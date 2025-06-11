<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SafariBookingPrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'visa_type',
        'group_type',
        'person_count',
        'half_day_price',
        'full_day_price',
    ];
}
