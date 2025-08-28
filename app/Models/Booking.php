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
        'temp_booking_id',
        'location_lat',
        'location_lng',
        'address',
        'safari_date',
        'is_full_day',
        'safari_time',
        'number_of_customers',
        'residence_visa',
        'travel_visa',
        'room_type_id',
        'room_check_in_date',
        'room_check_out_date',
        'number_of_rooms',
        'customer_name',
        'contact_no',
        'price',
        'currency',
        'note',
        'status',
        'is_paid',
        'reference_id',
        'confirmed_at',
        'cancelled_at',
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
