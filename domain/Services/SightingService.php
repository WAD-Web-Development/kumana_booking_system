<?php

namespace domain\Services;

use App\Models\Sighting;

class SightingService
{
    protected $sighting;

    public function __construct()
    {
        $this->sighting = new Sighting();
    }

    /**
     * all
     *
     * @return void
     */
    public function all()
    {
        return $this->sighting->all();
    }

    /**
     * get
     *
     * @param  mixed $product_id
     * @return void
     */
    public function get($id)
    {
        return $this->sighting->find($id);
    }

    public function sightingExists($sighting)
    {
        return $this->sighting->where('name', $sighting)->exists();
    }

    public function store($sighting)
    {
        $sightingRow = $this->sighting->create([
            'name' => $sighting,
        ]);
    }

}
