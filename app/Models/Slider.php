<?php

namespace App\Models;

use App\Scopes\OrderScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'image', 'type', 'priority', 'slideable_id', 'slideable_type'];

    /**
     * Start in whenever model boot
     * @return void
     */
    protected static function boot(): void
    {
        parent::boot();
        static::addGlobalScope(new OrderScope);
    }

    /**
     * Get parent slideable model (category or product)
     * @return MorphTo
     */
    public function slidable(): MorphTo
    {
        return $this->morphTo();
    }
}
