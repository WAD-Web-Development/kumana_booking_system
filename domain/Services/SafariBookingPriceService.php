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
        if($data && array_key_exists('sr', $data)){
            return $this->safariBookingPrice->where('title', 'LIKE', '%'.$data['sr'].'%')->orderBy('title')->paginate($limit);
        } else {
            return $this->safariBookingPrice->orderBy('title')->paginate($limit);
        }
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

    public function store($data)
    {
        $safariBookingPrice = $this->safariBookingPrice->create([
            // 'title' => $data['title'],
        ]);
    }

    public function update($id, $data)
    {
        $this->get($id)->update($data);
    }

    public function destroy($id)
    {

        $dataRow = $this->get($id);
        if ($dataRow) {
            $dataRow->delete();
        }
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
