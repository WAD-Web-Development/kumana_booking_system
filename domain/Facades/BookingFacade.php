<?php

namespace domain\Facades;

use Illuminate\Support\Facades\Facade;
use domain\Services\BookingService;

class BookingFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return BookingService::class;
    }
}
