<?php

namespace App\Models;

use App\Traits\FilterTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserType extends Model
{
    use HasFactory, FilterTrait;

    protected $fillable = ['type'];

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'type_id');
    }
}
