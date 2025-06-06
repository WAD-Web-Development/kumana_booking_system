<?php

namespace domain\Services;

use App\Models\CloseDate;

class CloseDateService
{
    protected $closeDate;

    public function __construct()
    {
        $this->closeDate = new CloseDate();
    }

    /**
     * all
     *
     * @return void
     */
    public function all()
    {
        return $this->closeDate->all();
    }

    public function allWithParamAndPaginate($data, $limit = 10)
    {
        if($data && array_key_exists('sr', $data)){
            return $this->closeDate->where('title', 'LIKE', '%'.$data['sr'].'%')->orderBy('title')->paginate($limit);
        } else {
            return $this->closeDate->orderBy('title')->paginate($limit);
        }
    }

    public function first()
    {
        return $this->closeDate->first();
    }

    /**
     * get
     *
     * @param  mixed $product_id
     * @return void
     */
    public function get($id)
    {
        return $this->closeDate->find($id);
    }

    public function store($data)
    {
        $closeDate = $this->closeDate->create([
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

    public function updateEducationStatus($data)
    {
        $row = $this->get($data['id']);

        if ($row) {
            $row->is_active = $data['status'];
            $row->save();
        }
    }
}
