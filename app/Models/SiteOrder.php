<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteOrder extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'features', 'budget', 'deadline', 'type'];
}
