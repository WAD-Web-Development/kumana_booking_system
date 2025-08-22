<?php

namespace domain\Services;

use App\Models\WelcomeSlider;
use domain\Services\ImageService;

class WelcomeSliderService
{
    protected $welcomeSlider;
    protected $imageService;

    public function __construct()
    {
        $this->welcomeSlider = new WelcomeSlider();
        $this->imageService = new ImageService();
    }

    /**
     * all
     *
     * @return void
     */
    public function all()
    {
        return $this->welcomeSlider->all();
    }

    public function activeAll()
    {
        return $this->welcomeSlider->where('is_active', 1)->get();
    }

    public function allWithParamAndPaginate($data, $limit = 10)
    {
        if($data && array_key_exists('sr', $data)){
            return $this->welcomeSlider->where('title', 'LIKE', '%'.$data['sr'].'%')->orderBy('title')->paginate($limit);
        } else {
            return $this->welcomeSlider->orderBy('title')->paginate($limit);
        }
    }

    public function first()
    {
        return $this->welcomeSlider->first();
    }

    /**
     * get
     *
     * @param  mixed $product_id
     * @return void
     */
    public function get($id)
    {
        return $this->welcomeSlider->find($id);
    }

    public function store($data)
    {
        $welcomeSlider = $this->welcomeSlider->create([
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

    public function updateWelcomeSliderStatus($data)
    {
        $row = $this->get($data['id']);

        if ($row) {
            $row->is_active = $data['status'];
            $row->save();
        }
    }
}
