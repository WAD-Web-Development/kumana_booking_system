<?php

namespace domain\Facades;

use Illuminate\Support\Facades\Facade;
use domain\Services\IncludedService;

class IncludedFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return IncludedService::class;
    }
}
