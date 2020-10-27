<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Metier;
use App\Secteur;
use App\Parcours;

class MetiersController extends Controller
{
    /**
     * Affiche la page de recherche et d'exploration des métiers
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // on sélectionne tous les secteurs et on les tri par nom
        $secteurs = Secteur::all()->sortBy('nom');
        $totalMetiers = app('MetiersRepository')->countBySecteurs();

        return view('metiers.index', compact('secteurs', 'totalMetiers'));
    }





    /**
     * Traite la page de recherche
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function search(Request $request)
    {
        // On récupère ce que l'utilisateur a entré dans l'input.
        $req = $request->input('q');

        // Si le champ n'est pas vide (!= null)
        if (!is_null($req)) {
            $metiers = app('MetiersRepository')->findByKeywordsWithPaginate($req, 10);

            if (count($metiers) == 0) {
              $appellation = app('AppellationsRepository')->findByKeywords($req);

              if ($appellation != null) {
                $metiers = app('MetiersRepository')->findByCodeRomeWithPaginate($appellation->code_rome, 10);
              }
            }

            $paginator = $metiers->toArray();
            $count = $paginator['total'];
        }

        $metiers = (!empty($metiers)) ? $metiers : null;
        $count = (!empty($count)) ? $count : null;

        $secteurs = Secteur::all();

        return view('metiers.search', compact('metiers', 'count', 'request', 'secteurs'));
    }





    /**
     * Affiche tous les metiers en fonction d'un secteur
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function ficheSecteur(Request $request, $id)
    {
        $req = $request->input('q'); // on récupère les mots clés de recherche

        $secteur = Secteur::find($id);

        $metiers = app('MetiersRepository')->findBySecteurIdWithPaginate($id, $req, 10);

        if (count($metiers) == 0) {
          $appellation = app('AppellationsRepository')->findByKeywords($req);

          if ($appellation != null) {
            $metiers = app('MetiersRepository')->findByCodeRomeWithPaginate($appellation->code_rome, 10);
          }
        }

        $paginator = $metiers->toArray();
        $count = $paginator['total'];

        return view('metiers.secteurs.fiche', compact('request', 'secteur', 'metiers', 'count'));
    }





    /**
     * Autocomplétion du champs de recherche des métiers
     *
     * @param Request $request
     * @return string
     */
    public function autocomplete(Request $request)
    {
        $query = $request->get('term', '');
        $secteur = $request->get('param', '');

        $metiers = app('MetiersRepository')->findForAutocomplete($query, $secteur);
        $appellations = app('AppellationsRepository')->findForAutocomplete($query);

        if ($secteur != '') {
          $secteur = Secteur::find($secteur);

          $metiersBySecteur = $secteur->metiers;
          $codes = array_unique($metiersBySecteur->pluck('code_id')->toArray());
          sort($codes);

          $appellations = $appellations->whereIn('code_id', $codes);
        }

        $combine = $metiers->concat($appellations);

        return json_encode($combine); // On retourne le résultat en JSON.
    }





    /**
     * Affiche la fiche détaillée d'un métier
     *
     * @param Request $request
     * @param string $id
     * @return \Illuminate\View\View
     */
    public function fiche(Request $request, $id)
    {
        // on sélectionne le métier grâce à son id
        $metier = app('MetiersRepository')->findById($id);

        // on sélectionne le code ROME du métier
        $code = $metier->code;

        // on récupère l'utilisateur
        $user = (Auth::user()) ? Auth::user() : [];

        /* si l'utilisateur a déjà enregistré un parcours sur ce métier,
           on le récupère, sinon on crée un model de Parcours vide */
        $parcours = ($user) ? $user->parcours->where('metier_id', $metier->id)->first() : new Parcours;

        $parcours = ($parcours) ? $parcours : new Parcours ;
        $formationsInParcours = $parcours->selectFormationsId();
        $sousNiveauxInParcours = $parcours->selectFormationsSousNiveaux();

        // on récupère le secteur grâce à la fonction déclarée dans le Model
        $secteur = $metier->secteur;

        // on récupère les différents métiers avec un code rome proche
        $metiersProches = $code->metiers;

        // on récupère les compétences du métier grâce au code ROME
        $savoirs = $code->savoirs;
        $savoirFaire = $code->savoirFaire;
        $savoirEtre = $metier->savoirEtre;
        $motivations = $metier->motivations;

        /*************************** REQUETE AJAX ***************************/
        if ($request->ajax()) {

          // on stocke la formation en session
          if (Auth::user()) {
            session()->push('metiers_recently_viewed', $metier->id);
          }

          // FILTRE STATUT :
          $statut = "";

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
          if (Auth::user()) {
            $departement = substr(Auth::user()->code_postal, 0, 2);
          }
          elseif ( Auth::guard('web_societe')->user()) {
            $departement = substr(Auth::guard('web_societe')->user()->code_postal, 0, 2);
          }
          else {
            $departement = "";
          }

          $localisation = "";

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

          // FILTRE RYTHME :
          $rythmes = "";

          // on change la valeur de $rythmes en fonction du choix de l'utilisateur
          if ($request->input('rythme') != 'undefined') {
            $rythmes = explode(' ', $request->input('rythme'));
          }

          /* si l'utilisateur filtre par rythmes, on sélectionne les formations
             avec ce nouveau critère */
          $formations = app('FormationsRepository')->findByCodeRomeAndRythme($code->code_rome, $rythmes);

          // ensuite il faut récupérer les établissements liés à ces formations :

          $ids = '';
          // pour chaque formation
          foreach ($formations as $formation) {
            // on récupère tous les ids des établissements
            $ids .= $formation->etablissements_id;
          }
          $ids = explode(' ', $ids);
          sort($ids);
          $ids = array_unique($ids);

          $etablissements_id_formations = "";
          $etablissements_ids = "";

          if (($request->input('localisation') != 'undefined' && $request->input('localisation') != 'france') || ($request->input('statut') != 'undefined' && $request->input('statut') != 'tout')) {
            //$etablissements_id_formations = "";
            $i = 0;

            // on récupère tous les ids des établissements filtrés
            $etablissements_ids = app('EtablissementsRepository')->findIdByArrayId($ids, $statut, $localisation);

            foreach ($etablissements_ids as $etablissement) {
              $etablissements_id_formations .= ' ' . $etablissement->id . ' ';
              $i++;

              if ($i <= count($etablissements_ids) - 1) {
                $etablissements_id_formations .= '|';
              }
            }
            // on tri les formations en fonction des ids des établissements
            $formations = $formations->filter(function ($formation, $key) use($etablissements_id_formations) {
              if (preg_match_all("/$etablissements_id_formations/i", $formation->etablissements_id)) {
                return $formation;
              }
            });
          }

          // on récupère tous les établissements filtrés dans une collection
          $etablissements = app('EtablissementsRepository')->findByArrayId($ids, $statut, $localisation);

          // pour chaque établissement
          foreach ($etablissements as $etablissement) {
            $etablissement_id = ' ' . $etablissement->id . ' ';
            // on associe les formations à leur établissement respectif
            $formationsByEtablissements[$etablissement->id] = $formations->filter(function ($formation, $key) use ($etablissement_id) {
                if (preg_match_all("/$etablissement_id/i", $formation->etablissements_id)) {
                    return $formation;
                }
            });
          }

          if (count($etablissements) > 0) {
            $paginator = $etablissements->toArray();
          }
          else {
            $paginator['last_page'] = 0;
            $paginator['total'] = 0;
          }

          // CAP ------------------
          $cap = $formations->where('niveau_sortie', 'CAP ou équivalent')->all();

          // BAC Pro ------------------
          $bacPro = $formations->filter(function ($formation, $key) {
              if (preg_match("/^bac pro /i", $formation->nom)) {
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

          // Bac + 6 -------------
          $bacPlus6 = $formations->where('niveau_sortie', 'bac + 6');

          foreach ($bacPlus6 as $key => $value) {
              switch ($value->niveau_entree) {
              case 'bac':
                $bacPlus6 = $bacPlus6->where('niveau_entree', 'bac');
                break;
              case 'bac + 2':
                $bacPlus6 = $bacPlus6->where('niveau_entree', 'bac + 2');
                break;
            }
          }
          $formationsApresBacPlus4 = $bacPlus6->where('niveau_entree', 'bac + 4');
          $formations3Cycle = $bacPlus6->where('niveau_entree', 'bac + 5');

          // Bac + 7 -------------
          $bacPlus7 = $formations->where('niveau_sortie', 'bac + 7');

          foreach ($bacPlus7 as $key => $value) {
              switch ($value->niveau_entree) {
              case 'bac + 2':
                $bacPlus7 = $bacPlus7->where('niveau_entree', 'bac + 2');
                break;
              case 'bac + 4':
                $bacPlus7 = $bacPlus7->where('niveau_entree', 'bac + 4');
                break;
              case 'bac + 5':
                $bacPlus7 = $bacPlus7->where('niveau_entree', 'bac + 5');
                break;
              case 'bac + 6':
                $bacPlus7 = $bacPlus7->where('niveau_entree', 'bac + 6');
                break;
            }
          }

          // Bac + 8 -------------
          $bacPlus8 = $formations->where('niveau_sortie', 'bac + 8');

          foreach ($bacPlus8 as $key => $value) {
              switch ($value->niveau_entree) {
              case 'bac + 5':
                $bacPlus8 = $bacPlus8->where('niveau_entree', 'bac + 5');
                break;
              case 'bac + 7':
                $bacPlus8 = $bacPlus8->where('niveau_entree', 'bac + 7');
                break;
            }
          }

          // Bac + 9 et plus -------------
          $bacPlus9 = $formations->where('niveau_sortie', 'bac + 9 et plus');

          foreach ($bacPlus9 as $key => $value) {
              switch ($value->niveau_entree) {
              case 'bac':
                $bacPlus9 = $bacPlus9->where('niveau_entree', 'bac');
                break;
              case 'bac + 5':
                $bacPlus9 = $bacPlus9->where('niveau_entree', 'bac + 5');
                break;
            }
          }

          // on récupère le niveau de sortie max
          $niveauxSortie = $formations->groupBy('niveau_sortie');
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
          // on range le tableau dans l'ordre que l'on a définie dans $order
          $niveauxSortie = array_merge(array_flip($order), $niveauxSortie->toArray());

          $niveauMax = [];
          foreach ($niveauxSortie as $key => $value) {
            if(is_array($value) && $key != "") {
              $niveauMax[] = $key;
            }
          }
          if (!empty($niveauMax)) {
            $niveauMax = end($niveauMax);
          }

          // coordonnées parcours
          $x = app('ParcoursRepository')->coordonneesAbscisseParcours($niveauMax);
          $y = app('ParcoursRepository')->coordonneesOrdonneeParcours();

          // BAC Général ------------------
          if ($niveauMax != 'brevet' && $niveauMax != 'CAP ou équivalent') {
            $bacGeneral = app('FormationsRepository')->findByApproximativeName('bac général')->unique('nom');
            $bacTechno = $formations->filter(function ($formation, $key) {
                if (preg_match("/^bac techno/i", $formation->nom)) {
                    return $formation;
                }
            });
            $bacGeneral = $bacGeneral->concat($bacTechno);
          }
          else {
            $bacGeneral = [];
          }

          if (count($etablissements) > 0) {
            $viewFormations = view('parcours.parcours', compact(
                'metier',
                'parcours',
                'formationsInParcours',
                'sousNiveauxInParcours',
                'formations',
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
                'y'
              ))->render();
          }
          else {
            $viewFormations = '<div class="parcours-vide"><p>Nous n\'avons trouvé aucunes formations correspondant à votre recherche.</p></div>';
          }

          $viewEtablissements = view('metiers.ajax.liste_etablissements', compact(
            'etablissements',
            'formationsByEtablissements',
            'paginator',
            'formations'
          ))->render();

          return response()->json(['test' => $etablissements, 'etablissements' => $viewEtablissements, 'formations' => $viewFormations, 'lastPage' => $paginator['last_page'], 'total' => $paginator['total'], 'localisation' => $localisation]);
        }
        /************************** FIN REQUETE AJAX **************************/


        return view('metiers.fiche', compact(
          'request',
          'metier',
          'parcours',
          'secteur',
          'metiersProches',
          'savoirs',
          'savoirFaire',
          'savoirEtre',
          'motivations'
        ));
    }
}
