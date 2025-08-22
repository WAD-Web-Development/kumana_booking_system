<?php

namespace domain\Services;

use App\Models\Included;
use domain\Services\ImageService;

class IncludedService
{
    protected $included;
    protected $imageService;

    public function __construct()
    {
        $this->included = new Included();
        $this->imageService = new ImageService();
    }

    /**
     * all
     *
     * @return void
     */
    public function all()
    {
        return $this->included->all();
    }

    public function allWithParamAndPaginate($data, $limit = 10)
    {
        if($data && array_key_exists('sr', $data)){
            return $this->included->where('title', 'LIKE', '%'.$data['sr'].'%')->orderBy('title')->paginate($limit);
        } else {
            return $this->included->orderBy('title')->paginate($limit);
        }
    }

    public function first()
    {
        return $this->included->first();
    }

    /**
     * get
     *
     * @param  mixed $product_id
     * @return void
     */
    public function get($id)
    {
        return $this->included->find($id);
    }

    public function store($data)
    {
        $included = $this->included->create([
            'title' => $data['title'],
            'description' => $data['description'],
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
}
