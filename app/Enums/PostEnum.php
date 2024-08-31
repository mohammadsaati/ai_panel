<?php

namespace App\Enums;

enum PostEnum : int
{
    case ACTIVE = 1;
    case DEACTIVE = 0;

    public static function types()
    {
        return [
            self::ACTIVE->value => trans('posts.active'),
            self::DEACTIVE->value => trans('posts.de_active'),
        ];
    }

    public static function getType($type) : string
    {
        return match ($type){
            self::ACTIVE->value => trans('posts.active'),
            self::DEACTIVE->value => trans('posts.de_active'),
        };
    }
}
