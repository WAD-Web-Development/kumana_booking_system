<?php

namespace domain\Services;

use App\Models\Booking;
use App\Models\TempBooking;
use Illuminate\Support\Facades\Auth;

class BookingService
{
    protected $booking;
    protected $tempBooking;
    protected $authUser;

    public function __construct()
    {
        $this->booking = new Booking();
        $this->tempBooking = new TempBooking();
        $this->authUser = Auth::user();
    }

    /**
     * all
     *
     * @return void
     */
    public function all()
    {
        return $this->booking->all();
    }

    public function allWithParamAndPaginate($data, $limit = 10)
    {
        if($data && array_key_exists('sr', $data)){
            return $this->booking->where('title', 'LIKE', '%'.$data['sr'].'%')->orderBy('title')->paginate($limit);
        } else {
            return $this->booking->orderBy('title')->paginate($limit);
        }
    }

    public function first()
    {
        return $this->booking->first();
    }

    /**
     * get
     *
     * @param  mixed $product_id
     * @return void
     */
    public function get($id)
    {
        return $this->booking->find($id);
    }

    public function getBookingUsingTempId($id)
    {
        return $this->booking->where('temp_booking_id', $id)->first();
    }

    public function getTempBooking($id)
    {
        return $this->tempBooking->find($id);
    }

    public function getUserLastTempBooking()
    {
        return $this->tempBooking->where('user_id', $this->authUser->id)->latest()->first();
    }

    public function tempStore($data)
    {
        $tempBooking = $this->tempBooking->create([
            'package_id' => $data['package_id'],
            'user_id' => $this->authUser->id,
            'location_lat' => $data['location_lat'],
            'location_lng' => $data['location_lng'],
            'safari_date' => $data['safari_date'] ?? null,
            'is_full_day' => $data['is_full_day'] ?? null,
            'safari_time' => $data['safari_time'] ?? null,
            'number_of_customers' => $data['number_of_customers'] ?? null,
            'residence_visa' => $data['residence_visa'] ?? null,
            'travel_visa' => $data['travel_visa'] ?? null,
            'room_type_id' => $data['room_type_id'] ?? null,
            'room_check_in_date' => $data['room_check_in_date'] ?? null,
            'room_check_out_date' => $data['room_check_out_date'] ?? null,
            'number_of_rooms' => $data['number_of_rooms'] ?? null,
            'customer_name' => $data['customer_name'],
            'contact_no' => $data['contact_no'],
            'price' => $data['price'],
        ]);

        return $tempBooking;
    }

    public function store($data)
    {
        $booking = $this->booking->create([
            'package_id' => $data['package_id'],
            'user_id' => $this->authUser->id,
            'temp_booking_id' => $data['id'],
            'location_lat' => $data['location_lat'],
            'location_lng' => $data['location_lng'],
            'safari_date' => $data['safari_date'] ?? null,
            'is_full_day' => $data['is_full_day'] ?? null,
            'safari_time' => $data['safari_time'] ?? null,
            'number_of_customers' => $data['number_of_customers'] ?? null,
            'residence_visa' => $data['residence_visa'] ?? null,
            'travel_visa' => $data['travel_visa'] ?? null,
            'room_type_id' => $data['room_type_id'] ?? null,
            'room_check_in_date' => $data['room_check_in_date'] ?? null,
            'room_check_out_date' => $data['room_check_out_date'] ?? null,
            'number_of_rooms' => $data['number_of_rooms'] ?? null,
            'customer_name' => $data['customer_name'],
            'contact_no' => $data['contact_no'],
            'price' => $data['price'],
            'reference_id' => $data['reference_id'],
            'confirmed_at' => now(),
            'status' => 'Confirmed',
            'note' => $data['note'] ?? null,
        ]);

        return $booking;
    }

    public function update($id, $data)
    {
        $this->get($id)->update($data);
    }
}
