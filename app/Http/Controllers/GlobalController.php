<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

use App\Metier;
use App\Secteur;

class GlobalController extends Controller
{

  /**
   * Cherche dans toutes les tables, les correspondances à un mot clé
   *
   * @param Request $request
   * @return json $results
   */
  public function autocomplete(Request $request)
  {
    $query = $request->get('term', '');

    $metiers = app('MetiersRepository')->findForAutocomplete($query, '');
    $appellations = app('AppellationsRepository')->findForAutocomplete($query);

    $metiers = $metiers->concat($appellations);

    $formations = app('FormationsRepository')->findForAutocomplete($query, '');

    $savoirs = app('SavoirsRepository')->findForAutocomplete($query);
    $savoirFaire = app('SavoirFaireRepository')->findForAutocomplete($query);
    $savoirEtre = app('SavoirEtreRepository')->findForAutocomplete($query);
    $motivations = app('MotivationsRepository')->findForAutocomplete($query);

    $competences = $savoirs->concat($savoirFaire)->concat($savoirEtre)->concat($motivations);

    $results = $metiers->concat($formations)->concat($competences);

    return json_encode($results);
  }




  public function search(Request $request)
  {

    $user = Auth::user();

    // on récupère les informations stockées dans le cache
    $metiers = Cache::get("metiers_found.{$user->id}");

    if (count($metiers) > 0) {
      foreach ($metiers as $metier) {
        $secteurs[] = $metier->secteur_id;
      }

      $nbrOfMetiersBySecteurs = array_count_values($secteurs);

      $secteurs = Secteur::find(array_unique($secteurs));
    }

    $formations = Cache::get("formations_found.{$user->id}");

    if (count($formations) > 0) {
      foreach ($formations as $formation) {
        $niveaux[] = $formation->niveau_sortie;
      }

      $nbrOfFormationsByNiveaux = array_count_values($niveaux);

      sort($niveaux);
      $niveaux = array_unique($niveaux);
      foreach ($niveaux as $key => $value) {
        if (empty($value)) {
          unset($niveaux[$key]);
        }
      }
    }

    $keywords = Cache::get("keywords_selected.{$user->id}");

    if ($request->ajax()) {

      if ($request->get('category', '')) {
        switch ($request->get('category', '')) {
          case 'metiers':
            $view = view('user.keywords.liste_metiers', compact('metiers', 'secteurs'))->render();
            break;

          case 'formations':
            $view = view('user.keywords.liste_formations', compact('formations'))->render();
            break;

          case 'secteurs':
            $view = view('user.keywords.liste_secteurs', compact('metiers', 'secteurs', 'nbrOfMetiersBySecteurs'))->render();
            break;

          case 'niveaux':
            $view = view('user.keywords.liste_niveaux', compact('formations', 'niveaux', 'nbrOfFormationsByNiveaux'))->render();
            break;

          default:
            $view = '<div>Aucuns résultats trouvés.</div>';
            break;
        }
      }

      if ($request->get('liste', '')) {

        $niveau = $request->get('category', '');

        switch ($request->get('liste', '')) {

          case 'metiers':
            $metiers = $metiers->where('secteur_id', $niveau);

            $view = view('user.keywords.liste_metiers', compact('metiers', 'secteurs'))->render();
            break;

          case 'formations':

            switch ($niveau) {
              case 'bac   1':
                $niveau = 'bac + 1';
                break;
              case 'bac   2':
                $niveau = 'bac + 2';
                break;
              case 'bac   3':
                $niveau = 'bac + 3';
                break;
              case 'bac   4':
                $niveau = 'bac + 4';
                break;
              case 'bac   5':
                $niveau = 'bac + 5';
                break;
              case 'bac   6':
                $niveau = 'bac + 6';
                break;
              case 'bac   7':
                $niveau = 'bac + 7';
                break;
              case 'bac   8':
                $niveau = 'bac + 8';
                break;
              case 'bac   9 et plus':
                $niveau = 'bac + 9 et plus';
                break;

              default:
                $niveau = $niveau;
                break;
            }

            $formations = $formations->where('niveau_sortie', $niveau);

            $view = view('user.keywords.liste_formations', compact('formations'))->render();
            break;

          default:
            $view = '<div>Aucuns résultats trouvés.</div>';
            break;
        }
      }


      return response()->json(['view' => $view, 'request' => $formations]);
    }


    return view('search', compact('metiers', 'formations', 'secteurs', 'niveaux'));
  }

  public function processForm(Request $request)
  {
    $user = Auth::user();

    $req = $request->input('q');

    $metiers = [];
    $formations = [];

    // Si le champ n'est pas vide (!= null)
    if (!is_null($req)) {

      $metiers = app('MetiersRepository')->findByKeywords($req);

      if (count($metiers) == 0) {
        $appellation = app('AppellationsRepository')->findByKeywords($req);

        if ($appellation != null) {
          $metiers = app('MetiersRepository')->findByCodeRome($appellation->code_rome);
        }
      }

      $formations = app('FormationsRepository')->findByKeyWords($req);

    }
    // Fin if(!is_null($req))


    // on stocke toutes les infos dans le cache
    Cache::forever("metiers_found.{$user->id}", $metiers);
    Cache::forever("formations_found.{$user->id}", $formations);

    return redirect()->route('search_global');
  }

}
