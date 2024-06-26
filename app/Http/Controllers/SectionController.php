<?php

namespace App\Http\Controllers;

use App\Filters\PublicFilter;
use App\Http\Requests\Section\CreateSectionRequest;
use App\Http\Requests\Section\UpdateSectionRequest;
use App\Models\Post;
use App\Models\Section;
use App\Services\SectionService;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    private string $view_folder = "admin.section.";

    public function __construct(public SectionService $service)
    {
    }

    public function index(PublicFilter $filter)
    {
        $data["title"] = "سکشن ها";
        $data["sections"] = $this->service->showAll($filter);

        return view($this->view_folder."index" , compact("data"));
    }

    public function create()
    {
        $data["title"] = "سکشن جدید";
        $data["posts"] = Post::all();

        return view($this->view_folder."create" , compact("data"));
    }

    public function store(CreateSectionRequest $request)
    {
        $this->service->createSection($request->validated());

        return redirect()->route("section.index");
    }

    public function show(Section $section)
    {
        $data["title"] = $section->name;
        $data["section"] = $section;
        $data["section_post_ids"] = $section->posts->pluck("id")->toArray();
        $data["posts"] = Post::query()->whereNotIn("id" , $data["section_post_ids"])->paginate(5)->appends(\request()->query());

        return view($this->view_folder."show" , compact("data"));
    }

    public function update(UpdateSectionRequest $request , Section $section)
    {
       if(\request()->ajax())
       {
           $this->service->updates($request->validated() , $section);

           return response_as_json("success");
       }
        $this->service->updateSection(data: $request->validated() , section: $section);

        return redirect()->route("section.index");
    }

    public function delete(Section $section)
    {
        $this->service->deleteSection($section);

        return response_as_json("success");
    }

}
