<?php

namespace domain\Services;

use App\Models\Booking;

class BookingService
{
    protected $booking;

    public function __construct()
    {
        $this->booking = new Booking();
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

    public function store($data)
    {
        $booking = $this->booking->create([
            // 'title' => $data['title'],
        ]);
    }

    public function update($id, $data)
    {
        $this->get($id)->update($data);
    }
}
