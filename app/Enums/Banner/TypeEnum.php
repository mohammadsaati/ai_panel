<?php

namespace App\Enums\Banner;

enum TypeEnum : int
{

    case POST = 1;
    case CATEGORY = 2;

    case LINK = 3;

    public static function type($type)
    {
        return match ($type)
        {
            self::POST->value => 'پست' ,
            self::CATEGORY->value => 'دسته بندی' ,
            self::LINK->value => 'لینک' ,
            default => ''
        };
    }
}
