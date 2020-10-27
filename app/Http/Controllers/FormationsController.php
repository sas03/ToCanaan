<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Parcours;

class FormationsController extends Controller
{

    /**
     * Affiche la page de recherche et d'exploration des formations
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $diplomes = app('FormationsRepository')->selectFormationsNiveauxSortie();
        $types = app('EtablissementsRepository')->selectTypesEtablissements();

        return view('formations.index', compact('diplomes', 'types'));
    }





    /**
     * Affiche la page "search" des formations
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function search(Request $request)
    {
        $q = $request->input('q'); // on récupère les mots clés de recherche

        // si la recherche a été lancée
        if (!is_null($q)) {
            // on trouve les formations grâce au mot clé
            $formations = app('FormationsRepository')->findByNameWithPaginate($q, 10);
            $paginator = $formations->toArray();
            $count = $paginator['total'];
        }

        // on initialise les 2 variables qu'on passe dans la vue
        $formations = (!empty($formations)) ? $formations : null;
        $count = (!empty($formations)) ? $count : null;

        // on retourne la vue
        return view('formations.search', compact('formations', 'count'));
    }





    /**
     * Affiche la page d'information détaillée d'une formation
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function fiche(Request $request, $id)
    {
        $formation = app('FormationsRepository')->findById($id);

        $description = ($formation->description != NULL) ? $formation->description : $formation->description_rncp;
        $description = explode('\n', $description);

        $parcours = new Parcours;
        $formationsInParcours = [];

        /**************************** REQUETE AJAX ****************************/
        /* = affichage du parcours + affichage et filtrage des établissements */
        if ($request->ajax()) {

          // on stocke la formation en session
          if (Auth::user()) {
            session()->push('formations_recently_viewed', $formation->id);
          }

          // FILTRE STATUT :
          $statut = null;

          // on change la valeur de $statut en fonction du choix de l'utilisateur
          if ($request->input('statut') === 'public') {
            $statut = "public";
          }
          if ($request->input('statut') === 'prive') {
            $statut = "privé";
          }
          if ($request->input('statut') === 'autre') {
            $statut = "autre";
          }

          // FILTRE LOCALISATION :

          if (Auth::guard('web_societe')->user()) {
            $departement = substr(Auth::guard('web_societe')->user()->code_postal, 0, 2);
          }
          else {
            $departement = (Auth::user()) ? substr(Auth::user()->code_postal, 0, 2) : "" ;
          }

          $localisation = null;

          // on change la valeur de $localisation en fonction du choix de l'utilisateur
          if ($request->input('localisation') === 'departement') {
            $localisation = [$departement];
          }

          if ($request->input('localisation') === 'region') {
              $regions =
              [
                'Auvergne-Rhône-Alpes' => ['01', '03', '07', '15', '26', '38', '42', '43', '63', '69', '73', '74'],
                'Bourgogne-Franche-Comté' => ['21', '25', '39', '58', '70', '71', '89', '90'],
                'Bretagne' => ['22', '29', '35', '56'],
                'Centre-Val de Loire' => ['18', '28', '36', '37', '41', '45'],
                'Collectivités d\'Outre Mer' => ['98'],
                'Corse' => ['20', '2A', '2B'],
                'Grand-Est' => ['08', '10', '51', '52', '54', '55', '57', '67', '68', '88'],
                'Guadeloupe' => ['97'],
                'Guyane' => ['97'],
                'Hauts-de-France' => ['02', '59', '60', '62', '80'],
                'Ile-de-France' => ['75', '77', '78', '91', '92', '93', '94', '95'],
                'La Réunion' => ['97'],
                'Martinique' => ['97'],
                'Normandie' => ['14', '27', '50', '61', '76'],
                'Nouvelle-Aquitaine' => ['16', '17', '19', '23', '24', '33', '40', '47', '64', '79', '86', '87'],
                'Occitanie' => ['09', '11', '12', '30', '31', '32', '34', '46', '48', '65', '66', '81', '82'],
                'Pays de la Loire' => ['44', '49', '53', '72', '85'],
                'Provence-Alpes-Côte d\'Azur' => ['04', '05', '06', '13', '83', '84']
              ];
              foreach ($regions as $name => $region) {
                  if (in_array($departement, $region)) {
                      $localisation = $regions[$name];
                  }
              }
          }

          // on filtre les établissements en fonction des filtres choisis par l'utilisateur
          $etablissements = $formation->etablissementsFilter($statut, $localisation);

          if (count($etablissements) > 0) {
            $paginator = $etablissements->toArray();
          }
          else {
            $paginator['last_page'] = 0;
            $paginator['total'] = 0;
          }

          $viewEtablissements = view('formations.ajax.liste_etablissements', compact('etablissements'))->render();

          return response()->json(['etablissements' => $viewEtablissements, 'lastPage' => $paginator['last_page'], 'total' => $paginator['total']]);
        }
        /************************** Fin REQUETE AJAX **************************/


        $filtresRythme = [
          'alternance' => false,
          'continue' => false,
          'pro' => false,
        ];

        // filtre alternance
        if (preg_match_all('/alternance|apprentissage|professionnalisation/i', $formation->alternance, $matches, PREG_SET_ORDER, 0)) {
            $filtresRythme['alternance'] = true;
        }
        // filtre formation continue
        if (preg_match_all('/continue|temps plein/i', $formation->alternance, $matches, PREG_SET_ORDER, 0)) {
            $filtresRythme['continue'] = true;
        }
        // filtre pro
        if (preg_match_all("/contrat de professionnalisation/i", $formation->alternance, $matches, PREG_SET_ORDER, 0)) {
            $filtresRythme['pro'] = true;
        }

        // on trouve les métiers associés
        $metiers = $formation->metiersCodes();

        // on sélectionne toutes les formations en relations avec les codes ROME
        $formations = $formation->formationsCodes();

        // BAC Général ------------------
        // si le niveau de sortie est inférieur à 'bac ou équivalent'
        if ($formation->niveau_sortie != 'brevet' && $formation->niveau_sortie != 'seconde' && $formation->niveau_sortie != '1ere' &&  $formation->niveau_sortie != 'CAP ou équivalent' && $formation->niveau_sortie != 'bac ou équivalent' && $formation->niveau_sortie != 'non renseigné' && $formation->niveau_sortie != 'sans diplôme' && $formation->niveau_sortie != 'autre formation' && $formation->niveau_sortie != '3e') {
          $bacGeneral = app('FormationsRepository')->findByApproximativeName('bac général')->unique('nom');
          $bacTechno = $formations->filter(function ($formation, $key) {
              if (preg_match("/^bac techno/i", $formation->nom)) {
                  return $formation;
              }
          });
          $bacGeneral = $bacGeneral->concat($bacTechno);
        } else {
          $bacGeneral = [];
        }

        // CAP ------------------
        $cap = $formations->where('niveau_sortie', 'CAP ou équivalent')->all();

        // BAC Pro ------------------
        $bacPro = $formations->filter(function ($formation, $key) {
            if (preg_match("/^bac pro/i", $formation->nom)) {
                return $formation;
            }
        });

        // Brevet Pro ------------------
        $brevetPro = $formations->filter(function ($formation, $key) {
            if (preg_match("/^BP /i", $formation->nom)) {
                return $formation;
            }
        });

        // Licences
        $licences = $formations->where('niveau_entree', 'bac')->where('niveau_sortie', 'bac + 3');

        // Licences Pro
        $licencesPro = $formations->where('niveau_entree', 'bac + 2')->where('niveau_sortie', 'bac + 3');

        // Tous les Masters
        $mastersAll = $formations->where('niveau_entree', 'bac + 3')->where('niveau_sortie', 'bac + 5');

        // Masters
        $masters = $mastersAll->filter(function ($masters, $key) {
            if (!preg_match("/^master pro/i", $masters->nom)) {
                return $masters;
            }
        });

        // Masters Pro
        $mastersPro = $mastersAll->filter(function ($masters, $key) {
            if (preg_match("/^master pro/i", $masters->nom)) {
                return $masters;
            }
        });

        // Diplômes d'école ----------------------
        $diplomesEcole = $formations->where('niveau_entree', 'bac')->where('niveau_sortie', 'bac + 5')->all();

        // BTS/DUT --------------------
        $btsDut = $formations->where('niveau_entree', 'bac')->where('niveau_sortie', 'bac + 2');

        // Mastères ----------------
        $formations3Cycle = $formations->where('niveau_entree', 'bac + 5')->all();

        // ----------- parcours apres un bac + 4 ----------
        $formationsApresBacPlus4 = $formations->where('niveau_entree', 'bac + 4')->where('niveau_sortie', 'bac + 6')->all();

        // Bac + 6 -------------
        $bacPlus6 = $formations->where('niveau_sortie', 'bac + 6');

        // Bac + 7 -------------
        $bacPlus7 = $formations->where('niveau_sortie', 'bac + 7');

        // Bac + 8 -------------
        $bacPlus8 = $formations->where('niveau_sortie', 'bac + 8');

        // Bac + 9 et plus -------------
        $bacPlus9 = $formations->where('niveau_sortie', 'bac + 9 et plus');


        $niveauMax = $formation->niveau_sortie;

        // coordonnées parcours
        $x = app('ParcoursRepository')->coordonneesAbscisseParcours($niveauMax);
        $y = app('ParcoursRepository')->coordonneesOrdonneeParcours();

        return view('formations.fiche', compact(
          'request',
          'formation',
          'description',
          'metiers',
          'cap',
          'bacPro',
          'brevetPro',
          'bacGeneral',
          'licences',
          'licencesPro',
          'masters',
          'mastersPro',
          'diplomesEcole',
          'btsDut',
          'formations3Cycle',
          'formationsApresBacPlus4',
          'bacPlus6',
          'bacPlus7',
          'bacPlus8',
          'bacPlus9',
          'x',
          'y',
          'parcours',
          'formationsInParcours',
          'filtresRythme'
        ));
    }





    /**
     * Autocomplétion du champs de recherche des formations
     *
     * @param Request $request
     * @return string
     */
    public function autocomplete(Request $request)
    {
        $query = $request->get('term', '');
        $niveau = $request->get('param', '');

        $formations = app('FormationsRepository')->findForAutocomplete($query, $niveau);

        return json_encode($formations); // On retourne le résultat en JSON.
    }





    /**
     * Affiche les formations en fonction du niveau d'études (= niveau de sortie)
     *
     * @param Request $request
     * @param string $niveau
     * @return \Illuminate\View\View
     */
    public function ficheNiveauEtudes(Request $request, $niveau)
    {
        $q = $request->input('q'); // on récupère les mots clés de recherche

        $formations = app('FormationsRepository')->findByNiveauSortieWithPaginate($niveau, $q, 10);
        $paginator = $formations->toArray();
        $count = $paginator['total'];

        return view('formations.niveaux_etudes.fiche', compact('request', 'niveau', 'formations', 'count'));
    }
}
