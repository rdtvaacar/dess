<?php

namespace Acr\Des\Facades;

use Illuminate\Support\Facades\Facade;

class AcrDestek extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'AcrDes';
    }

}