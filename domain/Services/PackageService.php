<?php

namespace domain\Services;

use App\Models\Package;
use App\Models\PackageImage;
use domain\Services\ImageService;

class PackageService
{
    protected $package;
    protected $packageImage;
    protected $imageService;

    public function __construct()
    {
        $this->package = new Package();
        $this->packageImage = new PackageImage();
        $this->imageService = new ImageService();
    }

    /**
     * all
     *
     * @return void
     */
    public function all()
    {
        return $this->package->all();
    }

    public function allWithParamAndPaginate($data, $limit = 10)
    {
        if($data && array_key_exists('sr', $data)){
            return $this->package->where('title', 'LIKE', '%'.$data['sr'].'%')->orderBy('title')->paginate($limit);
        } else {
            return $this->package->orderBy('title')->paginate($limit);
        }
    }

    public function activeAll()
    {
        return $this->package->where('is_active', 1)->get();
    }

    public function first()
    {
        return $this->package->first();
    }

    /**
     * get
     *
     * @param  mixed $product_id
     * @return void
     */
    public function get($id)
    {
        return $this->package->find($id);
    }

    public function store($data)
    {
        $package = $this->package->create([
            'title' => $data['title'],
            'description' => $data['description'],
            'note' => $data['note'],
            'type' => $data['type'],
            'is_special' => $data['is_special'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
            'safari_type' => $data['safari_type'],
            'safari_max_people_count' => $data['safari_max_people_count'],
            'room_type_id' => $data['room_type_id'],
            'image_path' => $data['image_path'] ?? null,
        ]);

        if (isset($data['image_paths']) && is_array($data['image_paths'])) {
            foreach ($data['image_paths'] as $image_path) {
                $imageRow = $this->packageImage->create([
                    'package_id' => $package->id,
                    'image_path' => $image_path ?? null,
                ]);
            }
        }
    }

    public function update($id, $data)
    {
        if (isset($data['available_images']) && is_array($data['available_images'])) {
            $this->deleteRemovedImages($id, $data['available_images']);
        } else {
            $this->deleteRemovedImages($id);
        }

        $this->get($id)->update($data);

        if (isset($data['image_paths']) && is_array($data['image_paths'])) {
            foreach ($data['image_paths'] as $image_path) {
                $imageRow = $this->packageImage->create([
                    'package_id' => $id,
                    'image_path' => $image_path ?? null,
                ]);
            }
        }
    }

    public function destroy($id)
    {

        $this->deleteRemovedImages($id);

        $dataRow = $this->get($id);
        if ($dataRow) {
            $this->imageService->delete($dataRow->image_path);
            $dataRow->delete();
        }
    }

    public function updatePackageStatus($data)
    {
        $row = $this->get($data['id']);

        if ($row) {
            $row->is_active = $data['status'];
            $row->save();
        }
    }

    public function deleteRemovedImages($id, $availableImages = null)
    {
        $dataRow = $this->get($id);
        $selectedImages = $availableImages ?? [];

        $allImages = $dataRow->images;

        $imagesToRemove = $allImages->reject(function ($image) use ($selectedImages) {
            return in_array($image->id, $selectedImages);
        });

        foreach ($imagesToRemove as $image) {
            $image->delete();
            $this->imageService->delete($image->image_path);
        }
    }
}
