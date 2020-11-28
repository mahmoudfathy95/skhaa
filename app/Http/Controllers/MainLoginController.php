<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class MainLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('doLogout');
    }


    public function showLoginPage(){

        return view('CmsBackendAuth.auth.login');
    }

    public function doLogin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        //dd($password);
        $user_data = ['email' => $email, 'password' => $password];
        if (Auth::attempt($user_data)) {
            return Redirect::to('backend');
        }
        else{
            return 'no';
        }
    }

    public function doLogout()
    {
        Auth::logout();
        return Redirect('login');
    }
}
