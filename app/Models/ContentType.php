<?php

namespace App\Models;

use App\Filters\ContentTypeFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentType extends Model
{
    use HasFactory;

    protected $fillable = [
        "name"
    ];

    /************************************
     * *********** #STATIC ***************
     ************** START ***************/

    public static function GetActive()
    {
        return self::query()->where("status" , "=" , 1);
    }

    /************************************
     * *********** #STATIC ***************
     ************** END ***************/


    /************************************
     * *********** #Scope ***************
     ************** START ***************/

    public function scopeFilter($query , ContentTypeFilter $filter)
    {
        return $filter->apply($query);
    }

    /************************************
     * *********** #Scope ***************
     *************** END ****************/
}
