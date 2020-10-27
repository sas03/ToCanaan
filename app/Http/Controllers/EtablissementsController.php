<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Etablissement;

class EtablissementsController extends Controller
{

    /**
     * Affiche les établissements en fonction du type de l'établissement
     *
     * @param Request $request
     * @param string $type
     * @return \Illuminate\View\View
     */
    public function ficheTypeEtablissement(Request $request, $type)
    {
      // on récupère ce que l'utilisateur à taper dans le champ de recherche
      $q = $request->input('q');

      $etablissements = app('EtablissementsRepository')->findByTypeWithPaginate($type, $q, 10);

      /* on transforme le résultats en tableau pour récupérer le nombre total
         d'établissements */
      $paginator = $etablissements->toArray();
      $count = $paginator['total'];

      return view('etablissements.types.fiche', compact('type', 'etablissements', 'count', 'request'));
    }





    /**
     * Affiche la fiche détaillée d'un établissement
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function fiche($id)
    {
        $etablissement = Etablissement::find($id);

        // on va chercher toutes les formations liées à l'établissement sélectionné
        $formations = $etablissement->formations;
        $formationsTri = $formations->groupBy('niveau_sortie');

        $order = [
        '3e',
        'brevet',
        'seconde',
        '1ere',
        'CAP ou équivalent',
        'bac ou équivalent',
        'bac + 1',
        'bac + 2',
        'bac + 3',
        'bac + 4',
        'bac + 5',
        'bac + 6',
        'bac + 7',
        'bac + 8',
        'bac + 9 et plus',
        'autre formation',
        'sans diplôme',
        'non renseigné'
        ];

        // on range le tableau dans l'ordre que l'on a défini dans $order
        $formationsTri = array_merge(array_flip($order), $formationsTri->toArray());

        $etablissements = [];

        foreach ($formations as $formation) {
          // on récupère le nombre d'établissement
          $nbrEtablissements = $formation->countEtablissements();

          if ($nbrEtablissements >= 1) {
            $etablissements[$formation->id] = $nbrEtablissements;
          }
        }

        return view('etablissements.fiche', compact('etablissement', 'formations', 'formationsTri', 'etablissements'));
    }





    /**
     * Autocomplétion du champs de recherche des établissements
     *
     * @param Request $request
     * @return string
     */
    public function autocomplete(Request $request)
    {
        $query = $request->get('term', '');
        $type = $request->get('param', '');

        $etablissements = app('EtablissementsRepository')->findForAutocomplete($query, $type);

        return json_encode($etablissements); // on retourne le résultat en JSON.
    }
}
