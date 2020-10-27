<?php
namespace App\Http\Controllers;
//include '../machinelearning/vendor/php-ai/php-ml/classification/metiersproches.php';
use App\Code;
use App\Keyword;
use App\Motivation;
use App\Savoir;
use App\SavoirEtre;
use App\SavoirFaire;
use App\User;
use App\Metier;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Validator;
use Image;
use Illuminate\Support\Facades\Cache;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['autocompleteWithMail', 'autocompleteWithoutMail', 'fiche']]);
    }


    /**
     * Affiche la career d'un utilisateur
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
     public function careerdirect($id){
       $user = User::find($id);
       return view('user.careerdirect', compact('user'));
     }


    /**
     * Affiche la fiche d'un utilisateur
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function fiche($id)
    {
      $user = User::find($id);

      $resume = $user->resume;

      if ($resume) {
        if (Auth::id() == $user->id || $user->isVisible('experiences')) {
          $experiences = $resume->where('type', 'experience professionnelle');
        }
        if (Auth::id() == $user->id || $user->isVisible('formations')) {
          $formations = $resume->where('type', 'formation');
        }
        if (Auth::id() == $user->id || $user->isVisible('centres')) {
          $centresInteret = $resume->where('type', 'centre interet');
        }
      }

      // Partie machinelearning
      /*
      $metier = Metier::all();
      $metierlist = array();
      foreach($metier as $metiers){
        array_push($metierlist,$metiers->nom);
      }
      $utilisateur = User::all();
      $savoirUtil = array();
      $motiver = array();
      $savoirEs = array();
      foreach($utilisateur as $util){
        $sav = $util->savoirs;
        foreach($sav as $savU){
          array_push($savoirUtil,$savU->nom);
        }
        //array_push($s,$u->savoirs);
      }

      foreach($utilisateur as $util){
        $motiv = $util->motivations;
        foreach($motiv as $motif){
          array_push($motiver,$motif->nom);
        }
        //array_push($s,$u->savoirs);
      }

      foreach($utilisateur as $util){
        $savoirEt = $util->savoirEtre;
        foreach($savoirEt as $savT){
          array_push($savoirEs,$savT->nom);
        }
        //array_push($s,$u->savoirs);
      }
      $push = array();//$m, $n
      $i = 0;
      $j = 12;
      foreach($savoirUtil as $mx){
        $i = $i + 1;
        $j = $j + 1;
        $strI = strval($i);
        $strJ = strval($j);
        $mx = $strI;
        $intM = intval($mx);
        foreach($motiver as $nx){
          $nx = $strJ;
          $intN = intval($nx);
        }
        $random = array($intM,$intN);
        //$random = array($mx,$nx);
        array_push($push,$random);
      } */
      /*
                                        $arrayobj = array();
                                        $art = array("bla","blo","clo");
                                        if($util){
                                          foreach($util as $utils){
                                            foreach($utils->savoirs as $samples){
                                              //$sam = $samples->nom;
                                              array_push($arrayobj,$samples->nom);

                                            }
                                          }
                                        }*/

      /*<?php
      $array = [[1, 2], [3, 4], [5, 6]];

      foreach($array as list($odd, $even)){
          echo "$odd is odd; $even is even", PHP_EOL;
      }
      ?>*/

      $savoirs = (Auth::id() == $user->id || $user->isVisible('savoirs')) ? $user->savoirs : NULL ;
      $savoirEtre = (Auth::id() == $user->id || $user->isVisible('savoir_etre')) ? $user->savoirEtre : NULL ;
      $motivations = (Auth::id() == $user->id || $user->isVisible('motivations')) ? $user->motivations : NULL ;

      //return view('user.fiche', compact('user', 'experiences', 'formations', 'centresInteret', 'savoirs', 'savoirEtre', 'motivations','utilisateur','savoirUtil','motiver','savoirEs','push','metier','metierlist'));
      return view('user.fiche', compact('user', 'experiences', 'formations', 'centresInteret', 'savoirs', 'savoirEtre', 'motivations'));
    }





    /**
     * Met à jour les paramètres de l'utilisateur
     *
     * @return \Illuminate\View\View
     */
    public function parametres()
    {
      $user = Auth::user();
      $employe = $user->employe;

      return view('user.parametres', compact('user', 'employe'));
    }





    /**
     * Affiche le profil de l'utilisateur
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        $employe = $user->employe;
        $resume = $user->resume;

        $savoirs = $user->savoirs;
        $savoirEtre = $user->savoirEtre;
        $motivations = $user->motivations;

        // on récupère les formations consultées dans la sessions
        $formationsViewed = session()->get('formations_recently_viewed');

        if ($formationsViewed) {
          $formationsViewed = array_unique($formationsViewed);
          $formationsViewed = app('FormationsRepository')->findByArrayOfId($formationsViewed);
        }

        // on récupère les métiers consultés
        $metiersViewed = session()->get('metiers_recently_viewed');

        if ($metiersViewed) {
          $metiersViewed = array_unique($metiersViewed);
          $metiersViewed = app('MetiersRepository')->findByArrayOfId($metiersViewed);
        }

        // on récupère le (ou les) parcours de l'utilisateur
        $parcoursSaved = $user->parcours;

        /*************************** REQUETE AJAX ***************************/
        if ($request->ajax()) {

          // si un parcours a été enregistré
          if (count($parcoursSaved) > 0) {

            $parcours_id = $request->input('parcours');
            $parcours = app('ParcoursRepository')->findById($parcours_id);

            $formationsInParcours = $parcours->selectFormationsId();
            $sousNiveauxInParcours = $parcours->selectFormationsSousNiveaux();

            $metier = $parcours->metier;

            // on récupère le code rome
            $codeRome = $metier->code;

            // on sélectionne toutes les formations en relations avec le code rome
            $formations = $codeRome->formations;

            // on sélectionne les différents types de formations :

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

            // BTS/DUT --------------------
            $btsDut = $formations->where('niveau_entree', 'bac')->where('niveau_sortie', 'bac + 2');

            // Licences
            $licences = $formations->where('niveau_entree', 'bac')->where('niveau_sortie', 'bac + 3');

            // Licences Pro
            $licencesPro = $formations->where('niveau_entree', 'bac + 2')->where('niveau_sortie', 'bac + 3');

            // --------------------------- BAC + 5 -------------------------------

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
            // ------------------------- Fin BAC + 5 -----------------------------

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
            'autre formation',
            'sans diplôme',
            'non renseigné',
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
            'bac + 9 et plus'
            ];
            // on range le tableau dans l'ordre que l'on a définie dans $order
            $niveauxSortie = array_merge(array_flip($order), $niveauxSortie->toArray());

            $niveauMax = [];
            foreach ($niveauxSortie as $key => $value) {
              if(is_array($value) && $key != "") {
                $niveauMax[] = $key;
              }
            }
            $niveauMax = end($niveauMax);

            // BAC Général ------------------
            if ($niveauMax != 'brevet' && $niveauMax != 'CAP ou équivalent') {
              $bacGeneral = app('FormationsRepository')->findByApproximativeName('bac général');
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

          // coordonnées parcours
            $x = app('ParcoursRepository')->coordonneesAbscisseParcours($niveauMax);
            $y = app('ParcoursRepository')->coordonneesOrdonneeParcours();

            $viewParcours = view('parcours.parcours', compact(
                'parcours',
                'formationsInParcours',
                'sousNiveauxInParcours',
                'metier',
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

              $viewMetier = view('user.ajax.parcours_metier', compact('metier'))->render();

              $formationsSelected = $parcours->formations;
              $viewFormations = view('user.ajax.parcours_formations', compact('formationsSelected'))->render();

          } // Fin du if ($parcours->code_rome)

          else {
            $viewParcours = [];
            $viewMetier = [];
            $viewFormations = [];
          }

          return response()->json(['parcours' => $viewParcours, 'metier' => $viewMetier, 'formations' => $viewFormations]);
        }

        // on récupère les mots-clés temporaires
        $keywords = Cache::get("keywords_selected.{$user->id}");
        $savoirsAdded = session()->get('filtre_savoirs_added');
        $savoirEtreAdded = session()->get('filtre_savoir_etre_added');
        $motivationsAdded = session()->get('filtre_motivations_added');

        // on récupère les mots-clés temporaires cochés
        $keywordsAddedChecked = Cache::get("keywords_added_selected.{$user->id}");
        $savoirsAddedChecked = (isset($keywordsAddedChecked['savoir_added'])) ? $keywordsAddedChecked['savoir_added'] : [];
        $savoirEtreAddedChecked = (isset($keywordsAddedChecked['savoirEtre_added'])) ? $keywordsAddedChecked['savoirEtre_added'] : [];
        $motivationsAddedChecked = (isset($keywordsAddedChecked['motivation_added'])) ? $keywordsAddedChecked['motivation_added'] : [];

        return view('user.index', compact(
          'employe',
          'resume',
          'savoirs',
          'savoirEtre',
          'motivations',
          'formationsViewed',
          'metiersViewed',
          'parcoursSaved',
          'keywords',
          'savoirsAdded',
          'savoirEtreAdded',
          'motivationsAdded',
          'keywordsAddedChecked',
          'savoirsAddedChecked',
          'savoirEtreAddedChecked',
          'motivationsAddedChecked'
        ));
    }





    /**
     * Traite le formulaire d'édition de profil et met à jour les informations de l'utilisateur
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function update(Request $request)
    {
        // on récupère notre objet User
        $user = Auth::user();

        // on valide les données rentrées par l'utilisateur dans le formulaire
        Validator::make($request->all(), [
          'nom' => 'required|string|max:255',
          'prenom' => 'required|string|max:255',
          'email' => ['required', 'string', 'email', 'max:255',       Rule::unique('users')->ignore($user->id),],
          'ville' => 'required|string|max:255',
          'code_postal' => 'required|string|size:5',
          'date_de_naissance' => 'nullable|date_format:d-m-Y',
          'telephone' => 'nullable|string|min:10',
          'niveau_admission' => 'nullable|string|max:255',
          'metiers' => 'nullable|string|max:255',
        ])->validate();

        // On transforme la date de naissance du format FR au format EN
        $newBirthdate = ($request->date_de_naissance != null) ? Carbon::createFromTimestamp(strtotime($request->date_de_naissance))->toDateString() : null ;

        // on met à jour l'utilisateur

        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->email = $request->email;
        $user->ville = $request->ville;
        $user->code_postal = $request->code_postal;
        $user->date_de_naissance = $newBirthdate;
        $user->telephone = $request->telephone;
        $user->niveau_admission = $request->niveau_admission;
        $user->metier = $request->metier;

        $user->save();

        // on retourne sur la page du profil avec un message
        return redirect()->route('user_index')->with('success', 'Vos informations personnelles ont bien été mises à jour !');
    }





    /**
     * Traite le formulaire d'édition de mot de passe
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function updatePassword(Request $request)
    {

        // on sélectionne notre utilisateur
        $user = Auth::user();

        // on valide les informations rentrées par l'utilisateur dans le formulaire
        Validator::make($request->all(), [
          'old_password' => 'required|min:6',
          'new_password' => 'required|min:6|confirmed',
          'new_password_confirmation' => 'required|min:6',
        ])->validate();

        // on vérifie si l'ancien mot de passe est le bon
        if (Hash::check($request->old_password, $user->password)) {

            // on hash le nouveau mot de passe, et on sauvegarde
            $user->password = Hash::make($request->new_password);
            $user->save();

            // on retourne sur la page du profil avec un messagede succès
            return redirect()->route('user_index')->with('success', 'Votre Mot de Passe a bien été mis à jour !');
        } else {

            // si l'ancien mot de passe saisi n'est pas le bon
            return redirect()->route('edit_password')->with('fail', 'L\'ancien Mot de Passe saisi n\'est pas celui que nous connaissons !');
        }
    }





    /**
     * Autocomplétion grâce au nom et/ou prénom et/ou email d'un utilisateur
     *
     * @param Request $request
     * @return json $users
     */
    public function autocompleteWithMail(Request $request)
    {
        $query = $request->get('term', '');

        $users = app('UsersRepository')->findForAutocompleteWithMail($query);

        return json_encode($users); // On retourne le résultat en JSON.
    }





    /**
     * Autocomplétion grâce au nom et/ou prénom d'un utilisateur
     *
     * @param Request $request
     * @return json $users
     */
    public function autocompleteWithoutMail(Request $request)
    {
        $query = $request->get('term', '');

        $users = app('UsersRepository')->findForAutocompleteWithoutMail($query);

        return json_encode($users); // On retourne le résultat en JSON.
    }





    /**
     * Met à jour l'avatar de l'utilisateur
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function updateAvatar(Request $request)
    {
      if ($request->hasFile('avatar')) {
        $user = Auth::user();
        $nomUser = str_replace(' ', '_', $user->nom) . '_' . str_replace(' ', '_', $user->prenom);

        $filename = $nomUser . '.' . $request->file('avatar')->getClientOriginalExtension();

        // $avatar = Image::make($request->file('avatar'))->resize(null, 150, function ($constraint) {
        //     $constraint->aspectRatio();
        // });

        $avatar = Image::make($request->file('avatar'))->fit(150);
        $avatar->save(public_path('img/avatars/' . $filename));

        $user->avatar = $filename;
        $user->save();
      }

      return redirect()->route('user_index');
    }





    /**
     * Met à jour l'image de couverture de l'utilisateur
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function updateCover(Request $request)
    {
      if ($request->hasFile('cover')) {
        $user = Auth::user();
        $nomUser = str_replace(' ', '_', $user->nom) . '_' . str_replace(' ', '_', $user->prenom);

        $filename = $nomUser . '.' . $request->file('cover')->getClientOriginalExtension();

        $cover = Image::make($request->file('cover'))->save(public_path('img/covers/' . $filename));

        $user->cover = $filename;
        $user->save();
      }

      return redirect()->route('user_index');
    }





    /**
     * Affiche le CV (= la FORME) de l'utilisateur
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function resume(Request $request)
    {
      $user = Auth::user();

      $resume = $user->resume;

      $experiences = ($resume) ? $resume->where('type', 'experience professionnelle')->sortByDesc('date_fin') : [];
      $formations = ($resume) ? $resume->where('type', 'formation')->sortByDesc('date_fin') : [];
      $centres = ($resume) ? $resume->where('type', 'centre interet')->sortBy('nom') : [];

      $savoirs = $user->savoirs->sortBy('nom');
      $savoirEtre = $user->savoirEtre->sortBy('nom');
      $motivations = $user->motivations->sortBy('nom');

      /*************************** REQUETE AJAX ***************************/
      /* Lorsque l'utilisateur édite ses compétences, une requête AJAX est
         envoyée afin de récupérer les compétences demandées */
      if ($request->ajax()) {

        $competences = [];

        if ($request->input("competence_type") == 'savoir') {
          $competences = $savoirs;
        }
        if ($request->input("competence_type") == 'savoirEtre') {
          $competences = $savoirEtre;
        }
        if ($request->input("competence_type") == 'motivation') {
          $competences = $motivations;
        }

        $view = view('user.ajax.resume_competences', compact('competences'))->render();

        return response()->json(['view' => $view]);
      }

      return view('user.resume', compact('user', 'experiences', 'formations', 'centres', 'savoirs', 'savoirEtre', 'motivations'));
    }





    /**
     * Met à jour les compétences (savoirs/savoir-faire, savoir-être ou
     * motivations (= battements de coeur)) de l'utilisateur
     *
     * @param Request $request
     * @return array $id
     */
    public function addCompetences(Request $request)
    {
      $user = Auth::user();

      $id = [];

      // Si l'utilisateur a ajouté des compétences
      if ($request->competences) {

        foreach ($request->competences as $competence) {
          $codes = [];
          $codesId = [];
          $metiersBySavoirs = [];
          $metiersIdBySavoirs = [];

          $keyword = Keyword::where('nom', '=', "$competence")->first();

          // si le mot-clé n'existe pas
          if (!$keyword) {
            $keyword = new Keyword;
            $keyword->nom = $competence;
            $keyword->save();

            // on attache le mot-clé aux métiers et aux formations correspondants

            if ($request->type == 'savoir') {

              $savoirs = Savoir::where('nom', 'like', '%'.$keyword->nom.'%')->get();
              $savoirFaire = SavoirFaire::where('nom', 'like', '%'.$keyword->nom.'%')->get();

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

                $metiers = [];
                foreach ($codes as $code) {
                  $metiers[] = $code->metiers()->pluck('id')->toArray();
                }

              }
              // Fin if (count($savoirs) > 0 || count($savoirFaire) > 0)

              else {
                $metiers = [];
                $codes = [];
              }

            }
            // Fin if ($request->type == 'savoir' )


            if ($request->type == 'savoirEtre' || $request->type == 'motivation') {

              if ($request->type == 'savoirEtre') {
                $savoirs = SavoirEtre::where('nom', 'like', '%'.$keyword->nom.'%')->get();
              }


              if ($request->type == 'motivation') {
                $savoirs = Motivation::where('nom', 'like', '%'.$keyword->nom.'%')->get();
              }

              if (count($savoirs) > 0) {

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


                $metiers = [];
                foreach ($savoirs as $savoir) {
                  $metiers[] = $savoir->metiers()->pluck('metier_id')->toArray();
                }

              }
              // Fin if (count($savoirs) > 0)

              else {
                $metiers = [];
                $codes = [];
              }

            }
            // Fin if ($request->type == 'savoirEtre' || $request->type == 'motivation')

            if (!empty($metiers)) {

              $metiersId = [];

              foreach ($metiers as $value) {
                foreach ($value as $metier) {
                  $metiersId[] = $metier;
                }
              }

              $metiersId = array_unique($metiersId);
              $keyword->metiers()->attach($metiersId);

            }
            // Fin if (!empty($metiers))

            if (!empty($codes)) {
              $formations = [];

              foreach ($codes as $code) {
                $formations[] = $code->formations()->pluck('formation_id')->toArray();
              }

              $formationsId = [];

              foreach ($formations as $value) {
                foreach ($value as $formation) {
                  $formationsId[] = $formation;
                }
              }

              $formationsId = array_unique($formationsId);
              $keyword->formations()->attach($formationsId);
            }
            // Fin if (!empty($formations))

          }
          // Fin if (!$keyword)

          $id[] = $keyword->id;
        }
        // Fin if ($request->competences)

        // on met à jour les tables pivots en fonction du type
        if ($request->type == 'savoir') {
          $user->savoirs()->sync($id);
        }
        if ($request->type == 'savoirEtre') {
          $user->savoirEtre()->sync($id);
        }
        if ($request->type == 'motivation') {
          $user->motivations()->sync($id);
        }
      }
      // Fin if ($request->competences)

      /* Si l'utilisateur supprime toutes ses compétences
         on détache de la table pivot correspondante toutes les compétences
         liées à cet utilisateur
         */
      else {
        if ($request->type == 'savoir') {
          $user->savoirs()->detach();
        }
        if ($request->type == 'savoirEtre') {
          $user->savoirEtre()->detach();
        }
        if ($request->type == 'motivation') {
          $user->motivations()->detach();
        }
      }

      return $id;
    }





    /**
     * Met à jour les compétences (savoirs/savoir-faire, savoir-être ou
     * motivations (= battements de coeur)) de l'utilisateur à partir des
     * filtres
     *
     * @param Request $request
     * @return Request $request
     */
    public function addCompetencesFromFiltres(Request $request)
    {
      $user = Auth::user();

      $keyword = Keyword::where('nom', '=', "$request->nom")->first();

      // si le mot-clé n'existe pas
      if (!$keyword) {
        $keyword = new Keyword;
        $keyword->nom = $request->nom;
        $keyword->save();

        // on attache le mot-clé aux métiers et aux formations correspondants
        if ($request->type == 'savoir') {

          $savoirs = Savoir::where('nom', 'like', '%'.$keyword->nom.'%')->get();
          $savoirFaire = SavoirFaire::where('nom', 'like', '%'.$keyword->nom.'%')->get();

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

            $metiers = [];
            foreach ($codes as $code) {
              $metiers[] = $code->metiers()->pluck('id')->toArray();
            }

          }
          // Fin if (count($savoirs) > 0 || count($savoirFaire) > 0)

          else {
            $metiers = [];
            $codes = [];
          }

        }
        // Fin if ($request->type == 'savoir' )



        if ($request->type == 'savoirEtre' || $request->type == 'motivation') {

          if ($request->type == 'savoirEtre') {
            $savoirs = SavoirEtre::where('nom', 'like', '%'.$keyword->nom.'%')->get();
          }


          if ($request->type == 'motivation') {
            $savoirs = Motivation::where('nom', 'like', '%'.$keyword->nom.'%')->get();
          }

          if (count($savoirs) > 0) {

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


            $metiers = [];
            foreach ($savoirs as $savoir) {
              $metiers[] = $savoir->metiers()->pluck('metier_id')->toArray();
            }

          }
          // Fin if (count($savoirs) > 0)

          else {
            $metiers = [];
            $codes = [];
          }

        }
        // Fin if ($request->type == 'savoirEtre' || $request->type == 'motivation')

        if (!empty($metiers)) {

          $metiersId = [];

          foreach ($metiers as $value) {
            foreach ($value as $metier) {
              $metiersId[] = $metier;
            }
          }

          $metiersId = array_unique($metiersId);
          $keyword->metiers()->attach($metiersId);

        }

        if (!empty($codes)) {

          $formations = [];

          foreach ($codes as $code) {
            $formations[] = $code->formations()->pluck('formation_id')->toArray();
          }

          $formationsId = [];

          foreach ($formations as $value) {
            foreach ($value as $formation) {
              $formationsId[] = $formation;
            }
          }

          $formationsId = array_unique($formationsId);
          $keyword->formations()->attach($formationsId);

        }

      }
      // Fin if (!$keyword)

      if ($request->type == 'savoir') {
        $user->savoirs()->attach($keyword->id);
      }
      if ($request->type == 'savoirEtre') {
        $user->savoirEtre()->attach($keyword->id);
      }
      if ($request->type == 'motivation') {
        $user->motivations()->attach($keyword->id);
      }

      return $keyword;
    }





    /**
     * Supprime une compétence du CV de l'utilisateur
     *
     * @param int $id
     * @param string $type
     * @return \Illuminate\View\View
     */
    public function deleteCompetence($id, $type)
    {
      $user = Auth::user();

      if ($type == 'savoir') {
        $user->savoirs()->detach($id);
      }
      if ($type == 'savoir_etre') {
        $user->savoirEtre()->detach($id);
      }
      if ($type == 'motivation') {
        $user->motivations()->detach($id);
      }

      return redirect()->route('user_resume');
    }





    /**
     * Affiche les paramètres de visibilité
     *
     * @return \Illuminate\View\View
     */
    public function showVisibilite()
    {
      $user = Auth::user();

      $visibilite = $user->visibilite->toArray();

      return view('user.visibilite', compact('visibilite'));
    }





    /**
     * Met à jour les paramètres de visibilité
     *
     * @param Request $request
     * @return array
     */
    public function editVisibilite(Request $request)
    {
      $types = [];
      foreach ($request->data as $value) {
        foreach ($value as $key => $v) {
          if ($key == 'selected') {
              $types[] = $v;
          }
        }
      }

      $statuts = [];
      foreach ($request->data as $value) {
        foreach ($value as $key => $v) {
          if ($key == 'visibilite') {
            $statuts[] = $v;
          }
        }
      }

      $array = array_combine($types, $statuts);

      $update = app('VisibiliteRepository')->update($array);

      return $array;
    }

}
