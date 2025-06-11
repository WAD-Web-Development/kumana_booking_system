<?php

namespace domain\Services;

use App\Models\RoomType;

class RoomTypeService
{
    protected $roomType;

    public function __construct()
    {
        $this->roomType = new RoomType();
    }

    /**
     * all
     *
     * @return void
     */
    public function all()
    {
        return $this->roomType->all();
    }

    public function allWithParamAndPaginate($data, $limit = 10)
    {
        if($data && array_key_exists('sr', $data)){
            return $this->roomType->where('title', 'LIKE', '%'.$data['sr'].'%')->orderBy('title')->paginate($limit);
        } else {
            return $this->roomType->orderBy('title')->paginate($limit);
        }
    }

    public function first()
    {
        return $this->roomType->first();
    }

    /**
     * get
     *
     * @param  mixed $product_id
     * @return void
     */
    public function get($id)
    {
        return $this->roomType->find($id);
    }

    public function store($data)
    {
        $roomType = $this->roomType->create([
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

    public function updateRoomTypeStatus($data)
    {
        $row = $this->get($data['id']);

        if ($row) {
            $row->is_active = $data['status'];
            $row->save();
        }
    }
}
