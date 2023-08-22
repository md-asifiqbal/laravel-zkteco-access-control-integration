<?php

namespace Asif160627\ZktecoAccessControl\Facades;

use Illuminate\Support\Facades\Facade;

class AccessControl extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'access-control';
    }
}
