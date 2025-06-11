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
            'date' => $data['date'],
            'description' => $data['description'],
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
