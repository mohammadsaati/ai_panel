<?php

 namespace App\Services;

 use App\Models\Section;
 use App\Services\Service;
 use Illuminate\Support\Arr;
 use Illuminate\Support\Facades\DB;

 class SectionService extends Service
{

 	public function model()
	{
        $this->model = Section::class;
	}

     public function createSection(array $data) : void
     {

        DB::transaction(function () use ($data) {
            $section = new Section();

            $created_section = $this->createWithSlugImage(
                data: $data,
                image_folder_name: "sections" ,
                image_field_name: "bg_image"
            );

            $created_section->posts()->sync($data["posts"]);
        });

     }

     public function updateSection(array $data , Section $section) : void
     {
         $data = array_merge($data , [
             "posts"     => $data["posts"] ?? []
         ]);

         DB::transaction(function () use ($data , $section) {
             $this->updateWithSlugImage(
                 data: $data,
                 item: $section ,
                 image_folder_name: "sections" ,
                 image_field_name: "bg_image"
             );

             $section->posts()->sync($data["posts"]);
         });
     }

     public function deleteSection(Section $section) : void
     {
         delete_image(path: "sections" , image: $section->bg_image);
         $section->delete();
     }

 }
