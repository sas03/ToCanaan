<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class HomeController extends Controller
{
    /**
     * Affiche la page d'Accueil du site
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Traite le formulaire de contact et envoie un email à la boite contact@tocanaan.com
     *
     * @param Request $request
     * @return string
     */
    public function contact(Request $request)
    {
        $input = $request->all();

        Mail::to('contact@tocanaan.com')->send(new ContactMail($input));

        return 'Message envoyé !';
    }
}
