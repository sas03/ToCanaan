<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MotivationsController extends Controller
{
    /**
     * Autocomplétion de toutes les motivations (= battements de coeur)
     *
     * @param Request $request
     * @return json
     */
    public function autocomplete(Request $request)
    {
        $query = $request->get('term', '');

        $motivations = app('MotivationsRepository')->findForAutocomplete($query);

        return json_encode($motivations); // On retourne le résultat en JSON.
    }
}
