<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\Jalalian;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use HasFactory , HasRoles;
    protected $fillable = [
        'name'      ,           'last_name',
        'birth_day'       ,     'email' ,
        'phone_number',         'password',
        'status'    ,           'gender' ,
        'description' ,
    ];

    protected function birthDay() : Attribute
    {
        return Attribute::make(
            get: fn($value) => '' ,
            set: fn($value) => Jalalian::fromFormat('Y/m/d' , $value)->toCarbon()->toDate()
        );
    }
}
