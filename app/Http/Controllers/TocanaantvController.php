<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TocanaantvController extends Controller
{
    /**
     * Affiche la career d'un utilisateur
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function index(){
        return view('tocanaantv');
    }
}
