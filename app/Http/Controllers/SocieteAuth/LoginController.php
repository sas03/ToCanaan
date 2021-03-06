<?php

namespace App\Http\Controllers\SocieteAuth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

//Class needed for login and Logout logic
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{

    //Where to redirect societe after login.
    protected $redirectTo = ('/');

    //Trait
    use AuthenticatesUsers;

    //Custom guard for seller
    protected function guard()
    {
      return Auth::guard('web_societe');
    }

    //Shows seller login form
     public function showLoginForm()
     {
         return view('societes.Auth.login');
     }
}
