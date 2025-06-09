<?php

namespace App\Http\Controllers;

use App\Filters\UserFilter;
use App\Http\Requests\User\CreateRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private const VIEW_PATH = 'admin.user';

    public function __construct(public UserService $service)
    {}

    public function index(UserFilter $filter)
    {
        $data['title'] = trans('messages.user-index');
        $data['users'] = $this->service->showAll($filter);

        return view(self::VIEW_PATH . '.index', compact('data'));
    }

    public function create()
    {
        $data['title'] = trans('messages.user-create');

        return view(self::VIEW_PATH . '.create', compact('data'));
    }

    public function store(CreateRequest $request)
    {
        $this->service->create(data: $request->validated());

        return redirect()->route('user.index')->with('success', trans('messages.success'));
    }

    
}
