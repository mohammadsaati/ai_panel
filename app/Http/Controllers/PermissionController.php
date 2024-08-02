<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use App\Services\PermissionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function __construct(public readonly PermissionService $service)
    {
    }

    private const VIEW_FOLDER = 'admin.permission.';

    public function index(Admin $admin)
    {
        $this->checkPermissions('permission_mange assign');

        $data["title"] = "دسترسی ها";
        $data['admin'] = $admin;
        $data['roles'] = Role::all();
        $data['userRoles'] = $admin->roles->pluck('id')->toArray();
        $data['userPermissions'] = $admin->permissions->pluck('id')->toArray();


        return view(self::VIEW_FOLDER.'index' , compact('data'));
    }

    public function showUsers(Request $request)
    {
        $this->checkPermissions('permission_mange read all');

        $data["title"] = "کاربران";
        $data['admins'] = $this->service->getAllAdmins($request);

        return view(self::VIEW_FOLDER.'all_admins' , compact('data'));
    }

    public function store(Request $request , Admin $admin)
    {
        $this->checkPermissions('permission_mange assign');

        $this->service->assignPermissions(permissions: $request->permissions , admin: $admin);

        return redirect()->back()->with('success' , 'با موفقیت ثبت شد');
    }
}
