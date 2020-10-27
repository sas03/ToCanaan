<?php

namespace App\Http\Controllers\SocieteAuth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

//Validator facade used in validator method
use Illuminate\Support\Facades\Validator;

use App\Societe;

class RegisterController extends Controller
{
    protected $redirectPath = 'societe/index';

    /**
     * Affichage du formulaire d'inscription
     *
     * @return \Illuminate\View\View
     */
     public function showRegistrationForm()
     {
        $secteurs = app('SecteursRepository')->findAll();
        $secteurs = $secteurs->sortBy('nom');

        return view('societes.Auth.register', compact('secteurs'));
     }

   /**
    * Gestion du formulaire d'inscription
    *
    * @param Request $request
    * @return \Illuminate\View\View
    */
    public function register(Request $request)
    {
       //Validates data
        $this->validator($request->all())->validate();

       //Create société
        $societe = $this->create($request->all());

        //Authenticates société
        $this->guard()->login($societe);

       //Redirects sociétés
        return redirect($this->redirectPath);
    }

    //Validates user's Input
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nom' => 'required|max:255',
            'siret' => 'required|max:14',
            'telephone' => 'required|max:10',
            'email' => 'required|email|max:255|unique:societes',
            'secteur_id' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    //Create a new seller instance after a validation.
    protected function create(array $data)
    {
        return Societe::create([
            'nom' => $data['nom'],
            'siret' => $data['siret'],
            'telephone' => $data['telephone'],
            'email' => $data['email'],
            'adresse' => $data['adresse'],
            'code_postal' => $data['code_postal'],
            'ville' => $data['ville'],
            'nbr_employes' => $data['nbr_employes'],
            'secteur_id' => $data['secteur_id'],
            'password' => bcrypt($data['password']),
        ]);
    }

    //Get the guard to authenticate Société
    protected function guard()
    {
        return Auth::guard('web_societe');
    }
}
