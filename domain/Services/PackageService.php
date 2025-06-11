<?php

namespace domain\Services;

use App\Models\Package;

class PackageService
{
    protected $package;

    public function __construct()
    {
        $this->package = new Package();
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

    public function updatePackageStatus($data)
    {
        $row = $this->get($data['id']);

        if ($row) {
            $row->is_active = $data['status'];
            $row->save();
        }
    }
}
