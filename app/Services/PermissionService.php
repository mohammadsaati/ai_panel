<?php

 namespace App\Services;

 use App\Models\Admin;
 use App\Services\Service;
 use Illuminate\Http\Request;

 class PermissionService extends Service
{

 	public function model()
	{

	}

     public function getAllAdmins(Request $request)
     {
        return Admin::query()
                ->orderBy('id' , 'DESC')
                ->paginate(20)
                ->appends($request->query());
     }

     public function assignPermissions($permissions , Admin $admin)
     {
         $admin->syncPermissions($permissions);
     }

 }
