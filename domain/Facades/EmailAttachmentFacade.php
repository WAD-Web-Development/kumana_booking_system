<?php

namespace domain\Facades;

use Illuminate\Support\Facades\Facade;
use domain\Services\EmailAttachmentService;

class EmailAttachmentFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return EmailAttachmentService::class;
    }
}
