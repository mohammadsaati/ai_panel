<?php

namespace App\Models;

use App\Traits\FilterTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory , FilterTrait;
    protected $fillable = [
        'name'              ,   'slug'      ,
        'bg_color'          ,   'bg_image'  ,
        'status'
    ];
    public function posts()
    {
        return $this->belongsToMany(Post::class , 'section_posts' , 'section_id' , 'post_id')->withTimestamps();
    }

}
