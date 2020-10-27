<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

use App\Metier;
use App\Formation;
use App\Code;

class CompetencesController extends Controller
{

  /**
   * Autocomplétion de toutes les compétences (savoirs + savoir-faire +
   * savoir-être + motivations)
   *
   * @param Request $request
   * @return json
   */
  public function autocompleteAllCompetences(Request $request)
  {
    $query = $request->get('term', '');

    $savoirs = app('SavoirsRepository')->findForAutocomplete($query);
    $savoirFaire = app('SavoirFaireRepository')->findForAutocomplete($query);
    $savoirEtre = app('SavoirEtreRepository')->findForAutocomplete($query);
    $motivations = app('MotivationsRepository')->findForAutocomplete($query);

    $results = $savoirs->concat($savoirFaire)->concat($savoirEtre)->concat($motivations);

    return json_encode($results);
  }





  /**
   * Traitement du champs de recherche d'une compétence (espace utilisateur)
   *
   * @param Request $request
   * @return json
   */
  public function processForm(Request $request)
  {
    $user = Auth::user();

    $req = $request->input('q');

    $metiers = [];
    $formations = [];

    // on récupère les savoirs et les savoir-faire correspondants à la requête
    $savoirs = app('SavoirsRepository')->findByApproximativeName($req);
    $savoirFaire = app('SavoirFaireRepository')->findByApproximativeName($req);

    // si des résultats sont trouvés
    if (count($savoirs) > 0 || count($savoirFaire) > 0) {

      // on récupère les ids des codes ROME

      if (count($savoirs) > 0) {
        foreach ($savoirs as $savoir) {
          $codes[] = $savoir->codes()->pluck('code_id')->toArray();
        }
      }

      if (count($savoirFaire) > 0) {
        foreach ($savoirFaire as $savoirF) {
          $codes[] = $savoirF->codes()->pluck('code_id')->toArray();
        }
      }

      foreach ($codes as $value) {
        foreach ($value as $code) {
          $codesId[] = $code;
        }
      }

      // on récupère tous les codes ROME
      $codes = Code::find(array_unique($codesId));

      foreach ($codes as $code) {
        // on récupère les ids des métiers liés aux codes ROME
        $metiers[] = $code->metiers()->pluck('id')->toArray();
      }

    }
    // Fin if (count($savoirs) > 0 || count($savoirFaire) > 0)

    // on récupère les savoir-être et les motivations correspondants à la requête
    $savoirEtre = app('SavoirEtreRepository')->findByApproximativeName($req);
    $motivations = app('MotivationsRepository')->findByApproximativeName($req);

    if (count($savoirEtre) > 0 || count($motivations) > 0) {

      if (count($savoirEtre) > 0) {
        foreach ($savoirEtre as $savoir) {
          $metiersBySavoirs[] = $savoir->metiers;
        }
      }

      if (count($motivations) > 0) {
        foreach ($motivations as $motivation) {
          $metiersBySavoirs[] = $motivation->metiers;
        }
      }

      foreach ($metiersBySavoirs as $value) {
        foreach ($value as $v) {
          $codes[] = $v->code()->pluck('id')->toArray();
        }
      }

      foreach ($codes as $value) {
        foreach ($value as $v) {
          $codesId[] = $v;
        }
      }

      $codes = Code::find(array_unique($codesId));

      if (count($savoirEtre) > 0) {
        foreach ($savoirEtre as $savoir) {
         $metiers[] = $savoir->metiers()->pluck('metier_id')->toArray();
        }
      }

      if (count($motivations) > 0) {
        foreach ($motivations as $motivation) {
         $metiers[] = $motivation->metiers()->pluck('metier_id')->toArray();
        }
      }

    }
    // Fin if (count($savoirEtre) > 0 || count($motivations > 0))

    if (!empty($codes)) {
      foreach ($codes as $code) {
        $formations[] = $code->formations()->pluck('formation_id')->toArray();
      }
    }

    /***************************** MÉTIERS *****************************/

    if (count($metiers) > 0) {
      foreach ($metiers as $key => $value) {
        foreach ($value as $key => $v) {
          $metiersId[] = $v;
        }
      }

      $metiers = Metier::find(array_unique($metiersId));
    }

    // si aucun mots-clés n'a été sélectionnés
    else {
      $metiers = [];
    }



    /**************************** FORMATIONS ****************************/

    if (count($formations) > 0) {
      foreach ($formations as $key => $value) {
        foreach ($value as $key => $v) {
          $formationsId[] = $v;
        }
      }

      $formations = Formation::find(array_unique($formationsId));
    }
    else {
      $formations = [];
    }

    // on stocke toutes les infos dans le cache
    Cache::forever("metiers_found.{$user->id}", $metiers);
    Cache::forever("formations_found.{$user->id}", $formations);

    // on vide les cache des mots-clés cochés précédemment par l'utilisateur
    Cache::forever("keywords_selected.{$user->id}", []);
    Cache::forever("keywords_added_selected.{$user->id}", []);

    return redirect()->route('keyword_index');
  }





  /**
   * Affiche la fiche d'une compétence (espace sociétés)
   *
   * @param int $id
   * @return \Illuminate\View\View
   */
  public function fiche($id)
  {
    $societe = Auth::guard('web_societe')->user();
    $competence = $societe->getCompetenceById($id);

    $postes = $competence->postes;
    $employes = $competence->employes;

    return view('societes.competences.fiche', compact('competence', 'postes', 'employes'));
  }





  /**
   * Autocomplétion des compétences disponibles dans une société
   * = compétences acquises par les employés de la société
   *
   * @param Request $request
   * @return json
   */
  public function autocompleteCompetencesDisponibles(Request $request)
  {
      $query = $request->get('term', '');

      $societe = Auth::guard('web_societe')->user();

      $competences = $societe->getCompetences('disponible');
      $competences = $competences->map(function ($competence, $key) use($query) {
          if (preg_match("/$query/i", $competence->nom)) {
              return $competence;
          }
      });

      return json_encode($competences); // On retourne le résultat en JSON.
  }





  /**
   * Autocomplétion des compétences requises dans une société
   * = compétences requises pour accéder aux différents postes de la société
   *
   * @param Request $request
   * @return json
   */
  public function autocompleteCompetencesRequises(Request $request)
  {
      $query = $request->get('term', '');

      $societe = Auth::guard('web_societe')->user();

      $competences = $societe->getCompetences('requise');
      $competences = $competences->map(function ($competence, $key) use($query) {
          if (preg_match("/$query/i", $competence->nom)) {
              return $competence;
          }
      });

      return json_encode($competences); // On retourne le résultat en JSON.
  }
}
