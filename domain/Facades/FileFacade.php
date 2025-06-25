<?php

namespace domain\Facades;

use Illuminate\Support\Facades\Facade;
use domain\Services\FileService;

class FileFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return FileService::class;
    }
}
