<?php

namespace App\Http\Controllers;

use App\Filters\PublicFilter;
use App\Http\Requests\UserType\CreateRequest;
use App\Models\UserType;
use App\Services\UserTypeService;
use Illuminate\Http\Request;

class UserTypeController extends Controller
{
    private const VIEW_PATH = 'admin.user-type';

    public function __construct(public UserTypeService $service)
    {}

    public function index(PublicFilter $filter)
    {
        $data['title'] = trans('messages.user-type-index');
        $data['userTypes'] = $this->service->showAll($filter);

        return view(self::VIEW_PATH . '.index', compact('data'));
    }

    public function create()
    {
        $data['title'] = trans('messages.user-type-create');

        return view(self::VIEW_PATH . '.create', compact('data'));
    }

    public function store(CreateRequest $request)
    {
        $this->service->create($request->validated());

        return redirect()->route('user-type.index')->with('success', trans('messages.success'));
    }

    public function edit(UserType $userType)
    {
        $data['title'] = trans('messages.user-type-edit');
        $data['userType'] = $userType;

        return view(self::VIEW_PATH . '.edit', compact('data'));
    }

    public function update(CreateRequest $request, UserType $userType)
    {
        $this->service->update($request->validated(), $userType);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => trans('messages.success'),
            ]);
        }

        return redirect()->route('user-type.index')->with('success', trans('messages.success'));
    }

    public function delete(UserType $userType)
    {
        $this->service->delete($userType);

        return response()->json([
            'success' => true,
            'message' => trans('messages.success'),
        ]);
    }
}
