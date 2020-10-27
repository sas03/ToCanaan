<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SecteursController extends Controller
{

    /**
     * Fonction pour l'autocomplétion du champs de recherche des secteurs
     *
     * @param Request $request
     * @return string
     */
    public function autocomplete(Request $request)
    {
        $query = $request->get('term', '');

        $secteurs = app('SecteursRepository')->findForAutocomplete($query);

        return json_encode($secteurs); // On retourne le résultat en JSON.
    }
}
