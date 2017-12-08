<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class CryptVestMcFacade extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'CryptVestMc';
    }
}