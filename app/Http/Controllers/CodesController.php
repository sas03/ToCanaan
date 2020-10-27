<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

use App\Metier;

class CodesController extends Controller
{
  /**
   * Fonction pour l'autocomplétion du champs de recherche des codes ROME
   *
   * @param Request $request
   * @return string
   */
  public function autocomplete(Request $request)
  {
      $query = $request->get('term', '');

      $metiers = Metier::where('code_rome', 'like', '%'.$query.'%')->get();

      return json_encode($metiers); // On retourne le résultat en JSON.
  }


}
