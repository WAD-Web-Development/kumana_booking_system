<?php

namespace domain\Facades;

use Illuminate\Support\Facades\Facade;
use domain\Services\ProfileService;

class ProfileFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return ProfileService::class;
    }
}
