<?php

namespace Dcblogdev\Tags\Facades;

use Illuminate\Support\Facades\Facade;

class Tags extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'tags';
    }
}
