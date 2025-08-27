<?php

namespace domain\Services;

use App\Models\RoomType;
use domain\Services\ImageService;

class RoomTypeService
{
    protected $roomType;
    protected $imageService;

    public function __construct()
    {
        $this->roomType = new RoomType();
        $this->imageService = new ImageService();
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

    public function allActive()
    {
        return $this->roomType->where('is_active', 1)->get();
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
            'title' => $data['title'],
            'description' => $data['description'],
            'room_count' => $data['room_count'],
            'max_people_count' => $data['max_people_count'],
            'price' => $data['price'],
            'image_path' => $data['image_path'] ?? null,
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
            $this->imageService->delete($dataRow->image_path);
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
