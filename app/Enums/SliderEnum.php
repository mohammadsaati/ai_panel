<?php

namespace App\Enums;

enum SliderEnum: string
{
    case CATEGORY = 'category';
    case PRODUCT = 'product';
    case LINK = 'LINK';

    /**
     * Show all types as array
     * @return array
     */
    public static function allType(): array
    {
        return [
            self::LINK->value,
            self::CATEGORY->name,
            self::PRODUCT->name,
        ];
    }
}
