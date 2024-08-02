<?php

 namespace App\Services;

 use App\Models\ContentType;
 use App\Services\Service;

 class ContentTypeService extends Service
{

 	public function model()
	{
        $this->model = ContentType::class;
	}

     public function create(array $data) : ContentType
     {
         return ContentType::create($data);
     }

 }
