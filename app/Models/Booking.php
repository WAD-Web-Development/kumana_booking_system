<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_id',
        'user_id',
        'start_date',
        'end_date',
        'is_full_day',
        'day_time',
        'num_of_passengers',
        'num_of_passengers_visa',
        'num_of_passengers_residential',
        'pick_up_address',
        'pickup_latitude',
        'pickup_longitude',
        'room_type_id',
        'number_of_rooms',
        'customer_name',
        'customer_contact_number',
        'note',
        'price',
        'currency_code',
        'status',
    ];

}
