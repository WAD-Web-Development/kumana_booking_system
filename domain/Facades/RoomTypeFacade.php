<?php

namespace domain\Facades;

use Illuminate\Support\Facades\Facade;
use domain\Services\RoomTypeService;

class RoomTypeFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return RoomTypeService::class;
    }
}
