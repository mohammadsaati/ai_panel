<?php

namespace App\Services;

use App\Filters\PublicFilter;
use Illuminate\Database\Eloquent\Model;

abstract class Service
{
    public $model;
    protected $pagination = 20;

    protected $query;

    public function __construct()
    {
        $this->model();

    }

    abstract public function model();



    public function showAll($filter)
    {
        return $this->model::query()->filter( $filter )
            ->paginate($this->pagination)
            ->appends($filter->request->query());
    }

    public function updates($data ,$item ) : Model | bool
    {
        $safe_data = $this->protection($data);
        return $item->update($safe_data);
    }


    protected function protection($data)
    {
        $protections = ["_token" , "id"];

        foreach ($data as $key => $value)
        {

            if (in_array($key , $protections))
            {
                unset($data[$key]);
            }

        }
        return $data;
    }

    protected function sameValue($old_value , $new_value) : bool
    {
        if (trim($old_value , " ") != $new_value)
            return false;
        return true;
    }
}
