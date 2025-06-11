<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference_id',
        'booking_id',
        'user_id',
        'amount',
        'currency_code',
        'response',
        'status_code',
        'status',
    ];
}
