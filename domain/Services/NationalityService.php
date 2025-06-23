<?php

namespace domain\Services;

use App\Models\Nationality;

class NationalityService
{
    protected $nationality;

    public function __construct()
    {
        $this->nationality = new Nationality();
    }

    /**
     * all
     *
     * @return void
     */
    public function all()
    {
        return $this->nationality->all();
    }

    public function first()
    {
        return $this->nationality->first();
    }

    /**
     * get
     *
     * @param  mixed $product_id
     * @return void
     */
    public function get($id)
    {
        return $this->nationality->find($id);
    }
}
