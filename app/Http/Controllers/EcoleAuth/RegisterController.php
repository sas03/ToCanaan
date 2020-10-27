<?php

namespace App\Http\Controllers\EcoleAuth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

//Validator facade used in validator method
use Illuminate\Support\Facades\Validator;

use App\Ecole;

class RegisterController extends Controller
{
    protected $redirectPath = 'ecole_index';

    /**
     * Affichage du formulaire d'inscription
     *
     * @return \Illuminate\View\View
     */
     public function showRegistrationForm()
     {
        return view('ecoles.Auth.register');
     }

    //Get the guard to authenticate Société
    protected function guard()
    {
        return Auth::guard('web_ecole');
    }
}
