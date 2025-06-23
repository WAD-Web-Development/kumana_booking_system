<?php

namespace domain\Facades;

use Illuminate\Support\Facades\Facade;
use domain\Services\NationalityService;

class NationalityFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return NationalityService::class;
    }
}
