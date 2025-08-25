<?php

namespace domain\Facades;

use Illuminate\Support\Facades\Facade;
use domain\Services\SightingService;

class SightingFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return SightingService::class;
    }
}
