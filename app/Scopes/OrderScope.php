<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class OrderScope implements Scope
{

    public function __construct(public string $field = 'id', public string $orderBy = 'DESC')
    {
    }

    public function apply(Builder $builder, Model $model)
    {
        return $builder->orderBy($this->field, $this->orderBy);
    }
}
