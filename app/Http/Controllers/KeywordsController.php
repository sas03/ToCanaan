<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

use App\Code;
use App\Formation;
use App\Keyword;
use App\Metier;
use App\Motivation;
use App\Savoir;
use App\SavoirEtre;
use App\SavoirFaire;
use App\Secteur;

class KeywordsController extends Controller
{

    /**
     * Affiche la fiche détaillée d'un établissement
     *
     * @param string $id
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        // on récupère les compétences de l'utilisateur
        $savoirs = $user->savoirs;
        $savoirEtre = $user->savoirEtre;
        $motivations = $user->motivations;

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

        if ($request->ajax()) {

          if ($request->get('category', '')) {
            switch ($request->get('category', '')) {
              case 'metiers':
                $view = view('user.keywords.ajax.liste_metiers', compact('metiers', 'secteurs'))->render();
                break;

              case 'formations':
                $view = view('user.keywords.ajax.liste_formations', compact('formations'))->render();
                break;

              case 'secteurs':
                $view = view('user.keywords.ajax.liste_secteurs', compact('metiers', 'secteurs', 'nbrOfMetiersBySecteurs'))->render();
                break;

              case 'niveaux':
                $view = view('user.keywords.ajax.liste_niveaux', compact('formations', 'niveaux', 'nbrOfFormationsByNiveaux'))->render();
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

                $view = view('user.keywords.ajax.liste_metiers', compact('metiers', 'secteurs'))->render();
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

                $view = view('user.keywords.ajax.liste_formations', compact('formations'))->render();
                break;

              default:
                $view = '<div>Aucuns résultats trouvés.</div>';
                break;
            }
          }


          return response()->json(['view' => $view, 'request' => $formations]);
        }

        $keywords = Cache::get("keywords_selected.{$user->id}");

        $keywordsAddedChecked = Cache::get("keywords_added_selected.{$user->id}");
        $savoirsAddedChecked = (isset($keywordsAddedChecked['savoir_added'])) ? $keywordsAddedChecked['savoir_added'] : [];
        $savoirEtreAddedChecked = (isset($keywordsAddedChecked['savoirEtre_added'])) ? $keywordsAddedChecked['savoirEtre_added'] : [];
        $motivationsAddedChecked = (isset($keywordsAddedChecked['motivation_added'])) ? $keywordsAddedChecked['motivation_added'] : [];

        // on récupère les mots-clés temporaires
        $savoirsAdded = session()->get('filtre_savoirs_added');
        $savoirEtreAdded = session()->get('filtre_savoir_etre_added');
        $motivationsAdded = session()->get('filtre_motivations_added');

        return view('user.keywords.index', compact(
          'metiers',
          'secteurs',
          'formations',
          'keywords',
          'savoirsAddedChecked',
          'savoirEtreAddedChecked',
          'motivationsAddedChecked',
          'savoirsAdded',
          'savoirEtreAdded',
          'motivationsAdded',
          'savoirs',
          'savoirEtre',
          'motivations'
        ));
    }





    /**
     * Traite le formulaire de filtrage des mots-clés
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function processKeywords(Request $request)
    {
        $user = Auth::user();

        $keywords = $request->all();

        $metiers = [];
        $formations = [];
        $keywordsId = [];
        $keywordsAdded = [];
        $metiersSavoirsAddedGrouped = [];
        $formationsSavoirsAddedGrouped = [];
        $i = 0;

        foreach ($keywords as $type => $array) {

          // Mots-clés enregistrés dans la base
          if ($type == 'savoir' || $type == 'savoirEtre' || $type == 'motivation') {

            foreach ($array as $keyword) {
              $keywordsId[] = $keyword;

              $keyword = Keyword::find($keyword);

              // on récupère les métiers et les formations associés au mot-clé
              $metiers[] = $keyword->metiers()->pluck('metier_id')->toArray();
              $formations[] = $keyword->formations()->pluck('formation_id')->toArray();
            }

          }


          // Mots-clés ajoutés temporairement
          if ($type == 'savoir_added' || $type == 'savoirEtre_added' || $type == 'motivation_added') {

            foreach ($array as $key => $keyword) {

              if ($type == 'savoir_added') {
                $savoirs = Savoir::where('nom', 'like', '%'.$keyword.'%')->get();
                $savoirFaire = SavoirFaire::where('nom', 'like', '%'.$keyword.'%')->get();


                if (count($savoirs) > 0 || count($savoirFaire) > 0) {

                  foreach ($savoirs as $savoir) {
                    $codes[] = $savoir->codes()->pluck('code_id')->toArray();
                  }
                  foreach ($savoirFaire as $savoirF) {
                    $codes[] = $savoirF->codes()->pluck('code_id')->toArray();
                  }

                  foreach ($codes as $value) {
                    foreach ($value as $code) {
                      $codesId[] = $code;
                    }
                  }

                  $codes = Code::find(array_unique($codesId));

                  foreach ($codes as $code) {
                    $metiersSavoirsAdded[] = $code->metiers()->pluck('id')->toArray();
                  }

                }
                // Fin if (count($savoirs) > 0 || count($savoirFaire) > 0)

                else {
                  $metiersSavoirsAdded = [];
                  $codes = [];
                }
              }
              // Fin if ($type == 'savoir_added')


              if ($type == 'savoirEtre_added' || $type == 'motivation_added') {

                if ($type == 'savoirEtre_added') {
                  $savoirs = SavoirEtre::where('nom', 'like', '%'.$keyword.'%')->get();
                }


                if ($type == 'motivation_added') {
                  $savoirs = Motivation::where('nom', 'like', '%'.$keyword.'%')->get();
                }

                if (count($savoirs) >0) {

                  foreach ($savoirs as $savoir) {
                    $metiersBySavoirs[] = $savoir->metiers;
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

                  foreach ($savoirs as $savoir) {
                   $metiersSavoirsAdded[] = $savoir->metiers()->pluck('metier_id')->toArray();
                  }

                }
                // Fin if (count($savoirs) >0)

                else {
                  $metiersSavoirsAdded = [];
                  $codes = [];
                }

              }
              // Fin if ($type == 'savoirEtre_added' || $type == 'motivation_added')

              if (!empty($codes)) {
                foreach ($codes as $code) {
                  $formationsSavoirsAdded[] = $code->formations()->pluck('formation_id')->toArray();
                }
              }

              // on stocke les mots-clés temporaires pour les passer dans le cache
              $keywordsAdded[$type][] = $keyword;

              /* on réorganise le tableau multidimensionnel de cette façon :
                niveau 1 =
                  premier mot-clé => tous les métiers correspondants au 1er mot-clé
                niveau 2 =
                  deuxième mot-clé => tous les métiers correspondants au 2ème mot-clé
                ...
                */
              foreach ($metiersSavoirsAdded as $value) {
                foreach ($value as $v) {
                  $metiersSavoirsAddedGrouped[$i][] = $v;
                }
              }

              /* Même principe que pour la boucle précédente mais pour les
                formations cette fois-ci */
              foreach ($formationsSavoirsAdded as $value) {
                foreach ($value as $v) {
                  $formationsSavoirsAddedGrouped[$i][] = $v;
                }
              }

              // on incrémente $i pour chaque mot-clé
              $i++;

            }
            // Fin foreach ($array as $key => $keyword)
          }
          // Fin if ($type == 'savoir_added' || $type == 'savoirEtre_added' || $type == 'motivation_added')

        }
        // Fin foreach ($keywords as $type => $array)



        /***************************** MÉTIERS *****************************/

        // S'il y a des métiers trouvés pour les mots-clés temporaire
        if (isset($metiersSavoirsAddedGrouped) && !empty($metiersSavoirsAddedGrouped)) {

          if (count($metiersSavoirsAddedGrouped) > 1) {
            // on récupère seulement les métiers en commun (= les doublons)
            $metiersSavoirsAddedId[] = call_user_func_array('array_intersect', $metiersSavoirsAddedGrouped);
          }
          else {
            $metiersSavoirsAddedId = $metiersSavoirsAddedGrouped;
          }

          // // on merge les métiers tableaux
          $metiers = array_merge($metiers, $metiersSavoirsAddedId);
          //$metiers = array_merge($metiers, $metiersSavoirsAddedGrouped);
        }

        // si un seul mots-clés a été sélectionné
        if (count($metiers) == 1) {
          $metiers = Metier::find($metiers[0]);
        }

        // si plusieurs métiers ont été sélectionnés
        elseif (count($metiers) > 1) {
          // on récupère seulement les métiers en commun (= les doublons)
          $metiersId = call_user_func_array('array_intersect', $metiers);
          $metiers = Metier::find($metiersId);
        }

        // si aucun mots-clés n'a été sélectionnés
        else {
          $metiers = [];
        }


        /**************************** FORMATIONS ****************************/

        // S'il y a des métiers trouvés pour les mots-clés temporaire
        if (isset($formationsSavoirsAddedGrouped) && !empty($formationsSavoirsAddedGrouped)) {

          if (count($formationsSavoirsAddedGrouped) > 1) {
            // on récupère seulement les métiers en commun (= les doublons)
            $formationsSavoirsAddedId[] = call_user_func_array('array_intersect', $formationsSavoirsAddedGrouped);
          }
          else {
            $formationsSavoirsAddedId = $formationsSavoirsAddedGrouped;
          }

          // on merge les métiers tableaux
          $formations = array_merge($formations, $formationsSavoirsAddedId);
        }


        // si un seul mots-clés a été sélectionné
        if (count($formations) == 1) {

          // on récupère le premier niveau du tableau associatif
          $formations = Formation::find($formations[0]);
        }

        // si plusieurs métiers ont été sélectionnés
        elseif (count($formations) > 1) {

          // on récupère seulement les formations en commun (= les doublons)
          $formations_id = call_user_func_array('array_intersect', $formations);
          $formations = Formation::find($formations_id);
        }

        // si aucun mots-clés n'a été sélectionnés
        else {
          $formations = [];
        }

        // on stocke toutes les infos dans le cache
        Cache::forever("metiers_found.{$user->id}", $metiers);
        Cache::forever("formations_found.{$user->id}", $formations);
        Cache::forever("keywords_selected.{$user->id}", $keywordsId);
        Cache::forever("keywords_added_selected.{$user->id}", $keywordsAdded);

        return redirect()->route('keyword_index');
        // return $formations;

    }





    /**
     * Mettre un filtre temporaire dans la session de l'utilisateur
     *
     * @param Request $request
     * @return Request $request
     */
    public function putInSession(Request $request)
    {
      if ($request->input('type') == 'savoir') {
        session()->push('filtre_savoirs_added', $request->input('value'));
      }
      if ($request->input('type') == 'savoirEtre') {
        session()->push('filtre_savoir_etre_added', $request->input('value'));
      }
      if ($request->input('type') == 'motivation') {
        session()->push('filtre_motivations_added', $request->input('value'));
      }

      return $request;
    }





    /**
     * Supprimer un filtre temporaire de la session de l'utilisateur
     *
     * @param Request $request
     * @return Request $request
     */
    public function deleteFromSession(Request $request)
    {
      if ($request->input('type') == 'savoir') {
        $keywords = session()->get('filtre_savoirs_added');

        foreach ($keywords as $key => $value) {
          if ($value == $request->input('value')) {
            session()->forget('filtre_savoirs_added.'.$key);
          }
        }
      }
      if ($request->input('type') == 'savoirEtre') {
        $keywords = session()->get('filtre_savoir_etre_added');

        foreach ($keywords as $key => $value) {
          if ($value == $request->input('value')) {
            session()->forget('filtre_savoir_etre_added.'.$key);
          }
        }
      }
      if ($request->input('type') == 'motivation') {
        $keywords = session()->get('filtre_motivations_added');

        foreach ($keywords as $key => $value) {
          if ($value == $request->input('value')) {
            session()->forget('filtre_motivations_added.'.$key);
          }
        }
      }

      return $request;
    }
}
