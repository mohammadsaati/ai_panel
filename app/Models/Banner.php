<?php

namespace App\Models;

use App\Traits\FilterTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory,FilterTrait;
    protected $fillable = [
        'image'         ,       'type'          ,
        'product_id'    ,       'category_id'   ,
        'link'          ,       'status'
    ];
}
