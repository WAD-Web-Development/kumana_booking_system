<?php

namespace domain\Facades;

use Illuminate\Support\Facades\Facade;
use domain\Services\PackageService;

class PackageFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return PackageService::class;
    }
}
