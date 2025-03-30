<?php

 namespace App\Filters;

 use App\Filters\Filter;

 class PostFilter extends Filter
{
    public function ids($ids)
    {
        return $this->builder->whereIn("id" , $ids);
    }
}
