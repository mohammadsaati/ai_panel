<?php

namespace App\Http\Controllers;

use App\Filters\ContentTypeFilter;
use App\Http\Requests\ContentType\CreateRequest;
use App\Models\ContentType;
use App\Services\ContentTypeService;
use Illuminate\Http\Request;

class ContentTypeController extends Controller
{
    private $service;
    private $view_category = "admin.contentType";

    public function __construct(ContentTypeService $service)
    {
        $this->service = $service;
    }

    public function index(ContentTypeFilter $filter)
    {
        $data["title"] = trans("panel.content_type_index");

        $data["content_types"] = $this->service->showAll($filter);

        return view($this->view_category.".index" , compact("data"));
    }

    public function create()
    {
        $data["title"] = trans("panel.content_type_create");

        return view($this->view_category.".create" , compact("data"));
    }

    public function show(ContentType $contentType)
    {
        $data["title"] = $contentType->name;
        $data["content_type"] = $contentType;

        return view($this->view_category.".show" , compact("data"));
    }

    public function store(CreateRequest $request)
    {
        $this->service->create($request->toArray());

        return redirect()->route("contentType.index");
    }

    public function update(CreateRequest $request , ContentType $contentType)
    {
        $this->service->updates(data: $request->toArray() , item: $contentType);

        return redirect()->route("contentType.index");
    }


}
