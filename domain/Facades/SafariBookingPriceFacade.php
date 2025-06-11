<?php

namespace domain\Facades;

use Illuminate\Support\Facades\Facade;
use domain\Services\SafariBookingPriceService;

class SafariBookingPriceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return SafariBookingPriceService::class;
    }
}
