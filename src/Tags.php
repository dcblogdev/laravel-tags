<?php

namespace Dcblogdev\Tags;


class Tags
{
    public static function get(string $string): string
    {
        //Current year
        $string = str_replace('[year]', date('Y'), $string);

        //Name of website
        $string = str_replace('[appName]', config('app.name'), $string);

        return $string;
    }
}