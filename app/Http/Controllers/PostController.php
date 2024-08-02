<?php

namespace App\Http\Controllers;

use App\Filters\PostFilter;
use App\Http\Requests\Post\CreatePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Models\Category;
use App\Models\ContentType;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $service;

    private string $view_folder = "admin.post.";

    public function __construct(PostService $service)
    {
        $this->service = $service;
    }

    public function index(PostFilter $filter)
    {
        $data["title"] = trans("panel.post_index");
        $data["posts"] = $this->service->showAll($filter);

        return view($this->view_folder."index" , compact("data"));
    }

    public function create()
    {

        $data["title"] = trans("panel.post_create");
        $data["categories"] = Category::GetCategoryForPosts()->get();
        $data["content_types"] = ContentType::GetActive()->get();

        return view($this->view_folder."create" , compact("data"));
    }

    public function store(CreatePostRequest $request)
    {
        $this->service->createPost($request->toArray());

        return redirect()->route("post.index");
    }

    public function show(Post $post)
    {
        $data["title"] = $post->title;
        $data["post"] = $post;
        $data["categories"] = Category::GetCategoryForPosts()->get();
        $data["content_types"] = ContentType::GetActive()->get();

       return view($this->view_folder."show" , compact("data"));
    }

    public function update(UpdatePostRequest $request , Post $post)
    {
        if (\request()->ajax())
        {
            $this->service->updates(data: $request->toArray() , item: $post);
            return response_as_json([
                "message" => "success"
            ]);
        }

        $this->service->updatePost(data: $request->toArray() , post: $post);
        return redirect()->route("post.index");

    }

}
