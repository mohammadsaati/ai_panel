<?php

 namespace App\Services;

 use App\Models\Post;
 use Illuminate\Support\Facades\Auth;
 use Illuminate\Support\Facades\DB;

 class PostService extends Service
{


     public function model()
     {
         $this->model = Post::class;
     }

     public function createPost(array $data) : void
     {
        $data["slug"] = slug_creator(class_name: $this->model , title: $data["title"]);
        $data["user_id"] = 1;
        DB::transaction(function () use ($data){

            $image_name = file_name($data["image"]);
            $data = array_merge($data , ["image" => $image_name]);
            $data['admin_id'] = Auth::guard('admins')->user()->id;
            $data['description'] = preg_replace('/font-family:\s*[^;]+;?/', '', $data['description']);
            $data['description'] = preg_replace('/background-color:\s*[^;]+;?/', '', $data['description']);
            Post::create($data);

            image_creator(path: "posts" , file_name: $image_name);

        });

     }

     public function updatePost(array $data , Post $post) : void
     {
         if (!$this->sameValue(old_value: $data["title"] , new_value: $post->title))
             $data["slug"] = slug_creator(class_name: $this->model , title: $data["title"]);

         if (request()->has("image"))
         {
             DB::transaction(function ()use ($data , $post) {

                 delete_image(path: "posts" , image: $post->image);

                 $image_name = file_name($data["image"]);
                 $data = array_merge($data , ["image" => $image_name]);
                 $data['description'] = preg_replace('/font-family:\s*[^;]+;?/', '', $data['description']);
                 $data['description'] = preg_replace('/background-color:\s*[^;]+;?/', '', $data['description']);

                 $this->updates(data: $data , item: $post);

                 image_creator(path: "posts" , file_name: $image_name);

             });
         } else {

            $this->updates(data:$data , item: $post);


         }

     }




 }
