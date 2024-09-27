<?php

namespace App\Models;

use App\Filters\PostFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        "title"         ,   "slug"                  ,
        "admin_id"      ,   "status"                ,
        "category_id"   ,   "content_type_id"       ,
        "image"         ,   "description"           ,
        'excerpt'       ,   'read_time'             ,
    ];

    public function category()
    {
        return $this->belongsTo(Category::class , "category_id");
    }

    public function contentType()
    {
        return $this->belongsTo(ContentType::class , "content_type_id");
    }

    public function banners(): HasMany
    {
        return $this->hasMany(Banner::class, 'post_id');
    }

    public function sections(): BelongsToMany
    {
        return $this->belongsToMany(Section::class, 'section_posts', 'post_id', 'section_id');
    }
    /************************************
     * *********** #Scope ***************
     ************** START ***************/

    public function scopeFilter($query , PostFilter $filter)
    {
        return $filter->apply($query);
    }

    /************************************
     * *********** #Scope ***************
     ************** END ***************/

}
