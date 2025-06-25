<?php

namespace domain\Services;

use App\Models\SafariBookingPrice;

class SafariBookingPriceService
{
    protected $safariBookingPrice;

    public function __construct()
    {
        $this->safariBookingPrice = new SafariBookingPrice();
    }

    /**
     * all
     *
     * @return void
     */
    public function all()
    {
        return $this->safariBookingPrice->all();
    }

    public function allWithParamAndPaginate($data, $limit = 10)
    {
        $query = $this->safariBookingPrice->orderBy('person_count');

        if ($data && array_key_exists('sr', $data)) {
            $search = $data['sr'];

            $query = $query->where(function ($q) use ($search) {
                $q->where('visa_type', 'LIKE', '%' . $search . '%')
                ->orWhere('group_type', 'LIKE', '%' . $search . '%')
                ->orWhere('person_count', 'LIKE', '%' . $search . '%');
            });
        }

        return $query->paginate($limit);
    }

    public function first()
    {
        return $this->safariBookingPrice->first();
    }

    /**
     * get
     *
     * @param  mixed $product_id
     * @return void
     */
    public function get($id)
    {
        return $this->safariBookingPrice->find($id);
    }

    public function update($id, $data)
    {
        $this->get($id)->update($data);
    }

    public function updateSafariBookingPriceStatus($data)
    {
        $row = $this->get($data['id']);

        if ($row) {
            $row->is_active = $data['status'];
            $row->save();
        }
    }
}
