<?php

namespace domain\Services;

use App\Models\SpecialDate;

class SpecialDateService
{
    protected $specialDate;

    public function __construct()
    {
        $this->specialDate = new SpecialDate();
    }

    /**
     * all
     *
     * @return void
     */
    public function all()
    {
        return $this->specialDate->all();
    }

    public function allWithParamAndPaginate($data, $limit = 10)
    {
        if($data && array_key_exists('sr', $data)){
            return $this->specialDate->where('title', 'LIKE', '%'.$data['sr'].'%')->orderBy('title')->paginate($limit);
        } else {
            return $this->specialDate->orderBy('title')->paginate($limit);
        }
    }

    public function first()
    {
        return $this->specialDate->first();
    }

    /**
     * get
     *
     * @param  mixed $product_id
     * @return void
     */
    public function get($id)
    {
        return $this->specialDate->find($id);
    }

    public function store($data)
    {
        $specialDate = $this->specialDate->create([
            'title' => $data['title'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
            'description' => $data['description'],
            'is_full_day' => $data['is_full_day'],
            'image_path' => $data['image_path'] ?? null,
            'is_closed' => $data['is_closed'],
            'day_time' => $data['day_time'],
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

    public function updateSpecialDateStatus($data)
    {
        $row = $this->get($data['id']);

        if ($row) {
            $row->is_active = $data['status'];
            $row->save();
        }
    }
}
