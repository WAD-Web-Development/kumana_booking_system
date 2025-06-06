<?php

namespace domain\Facades;

use Illuminate\Support\Facades\Facade;
use domain\Services\CloseDateService;

class CloseDateFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return CloseDateService::class;
    }
}
