<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Admin;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Morilog\Jalali\Jalalian;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        addJavascriptFile('assets/js/custom/authentication/sign-up/general.js');
        addVendors(['date-picker']);

        return view('pages.auth.register');
    }

    public function store(RegisterRequest $request)
    {

       $admin = Admin::create([
           'name'   =>  $request->name ,
           'last_name'  =>  $request->last_name ,
           'birth_day'  =>  $request->birth_day ,
           'email'  =>  $request->email ,
           'password' => Hash::make($request->password) ,
           'gender' => $request->gender ,
           'phone_number' => $request->phone_number ,
       ]);


       Auth::guard('admins')->login($admin);

        return redirect(RouteServiceProvider::HOME);
    }
}
