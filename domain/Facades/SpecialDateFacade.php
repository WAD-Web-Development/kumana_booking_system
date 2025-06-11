<?php

namespace domain\Facades;

use Illuminate\Support\Facades\Facade;
use domain\Services\SpecialDateService;

class SpecialDateFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return SpecialDateService::class;
    }
}
