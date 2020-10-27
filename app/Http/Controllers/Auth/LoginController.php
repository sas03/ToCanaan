<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
    * override function showLoginForm from AuthenticatesUsers.php
    * It will set the "url.intended" session variable,
    * that is the one that laravel uses to look for the page which you want to be redirected after the login, with the previous url.
    *
    * It also checks if the variable has been set, in order to avoid the variable to be set with the login url if the user submit the form with an error.
    */
    public function showLoginForm()
    {
        //if there is an intended url while off-session
        if(!session()->has('url.intended'))
        {
            //store the intended url in the session as a key and reverting the user back to the url(as the value) after login
            session(['url.intended' => url()->previous()]);
        }
        return view('auth.login');
    }
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //$this->redirectTo = url()->previous();
        $this->middleware('guest')->except('logout');
    }
}
