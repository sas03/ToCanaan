<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Code;
use App\Etablissement;
use App\Formation;
use App\Metier;
use App\Motivation;
use App\Savoir;
use App\SavoirEtre;
use App\SavoirFaire;
use App\Secteur;
use App\User;
use App\Careerdirectparam;

class AdminController extends Controller
{
    /**
     * Affiche le dashboard de l'admin
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $codes = Code::count();
        $etablissements = Etablissement::count();
        $formations = Formation::count();
        $metiers = Metier::count();
        $motivations = Motivation::count();
        $savoirs = Savoir::count();
        $savoirFaire = SavoirFaire::count();
        $savoirEtre = SavoirEtre::count();
        $secteurs = Secteur::count();
        $users = User::count();
        $careerdirectparams = Careerdirectparam::count();

        return view('Admin.dashboard', compact(
          'codes',
          'etablissements',
          'formations',
          'metiers',
          'motivations',
          'savoirs',
          'savoirFaire',
          'savoirEtre',
          'secteurs',
          'users',
          'careerdirectparams'
        ));
    }





    //------------------------ UTILISATEURS ----------------------------------

    /**
     * Affiche la liste des utilisateurs enregistrés, ou bien les résultat de la recherche en fonction d'un nom ou d'un id utilisateur
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function showUsers(Request $request)
    {
        $id = $request->id;
        $lastname = $request->nom;

        $users = app('UsersRepository')->findAll();

        if (!empty($id)) {
            $users = app('UsersRepository')->findByIdAsCollection($id);
        }

        if (!empty($lastname)) {
            $users = app('UsersRepository')->findByLastname($lastname);
        }

        $users = (!empty($users)) ? $users : null;

        return view('Admin.section_utilisateurs', compact('users', 'request'));
    }

    /**
     * Affiche la liste des utilisateurs careerdirect enregistrés, ou bien les résultat de la recherche en fonction d'un nom ou d'un id utilisateur
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function showCareerdirectparams(Request $request)
    {
        $id = $request->id;
        $lastname = $request->nom;

        $careerdirectparams = app('CareerdirectparamsRepository')->findAll();

        if (!empty($id)) {
            $careerdirectparams = app('CareerdirectparamsRepository')->findByIdAsCollection($id);
        }

        if (!empty($lastname)) {
            $careerdirectparams = app('CareerdirectparamsRepository')->findByLastname($lastname);
        }

        $careerdirectparams = (!empty($careerdirectparams)) ? $careerdirectparams : null;

        return view('Admin.section_careerdirectparams', compact('careerdirectparams', 'request'));
    }



    /**
     * Met à jour les informations de l'utilisateur, ou en créé un nouveau, par le biais de l'espace admin
     *
     * @param int $id
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function editUser($id = null, Request $request)
    {
        $user = app('UsersRepository')->findByIdOrInstantiate($id);

        if ($request->isMethod('post')) {
            $user = app('UsersRepository')->updateUserFromAdmin($request, $user);

            return redirect()->route('admin_users')->with('success', 'Le statut de ' . $request->prenom . ' ' . $request->nom . ' a bien été mis à jour !');
        }

        return view('Admin.edit_user', compact('user'));
    }

    public function editCareerdirectparam($id = null, Request $request)
    {
        $careerdirectparams = app('CareerdirectparamsRepository')->findByIdOrInstantiate($id);

        if ($request->isMethod('post')) {
            $careerdirectparams = app('CareerdirectparamsRepository')->updateCareerdirectparam($request, $careerdirectparams);

            return redirect()->route('admin_careerdirectparam')->with('success', 'Le statut de ' . $request->prenom . ' ' . $request->nom . ' a bien été mis à jour !');
        }

        return view('Admin.edit_careerdirectparam', compact('careerdirectparams'));
    }



    /**
     * Supprime un utilisateur
     *
     * @param int $id
     * @return \App\User
     */
    public function deleteUser($id)
    {
        $deletion = app('UsersRepository')->deleteById($id);

        return $deletion;
    }

    public function deleteCareerdirectparam($id)
    {
        $deletion = app('CareerdirectparamsRepository')->deleteById($id);

        return $deletion;
    }





    /********************************** METIERS **********************************/

    /**
     * Affiche la liste des métiers enregistrés, avec pagination, ou bien les
     * résultats de la recherche en fonction d'un libellé ou d'un id
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function showMetiers(Request $request)
    {
        $id = $request->id;
        $metier = $request->nom;

        $metiers = app('MetiersRepository')->findAllWithPaginate(50);
        $total = $metiers->toArray()['total'];

        if (!empty($id)) {
            $metiers = app('MetiersRepository')->findByIdAsCollection($id);
        }

        if (!empty($metier)) {
            $metiers = app('MetiersRepository')->findByApproximateLibelle($metier);
        }

        $metiers = (!empty($metiers)) ? $metiers : null;

        return view('Admin.section_metiers', compact('metiers', 'request', 'total'));
    }





    /**
     * Met à jour les informations sur un métier, ou en créé un nouveau, par le biais de l'espace admin
     *
     * @param int $id
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function editMetier($id = null, Request $request)
    {
        $secteurs = app('SecteursRepository')->findAll();

        $metier = app('MetiersRepository')->findByIdOrInstantiate($id);

        if ($request->isMethod('post')) {
            $metier = app('MetiersRepository')->updateMetierFromAdmin($request, $metier);
            return redirect()->route('admin_metiers')->with('success', 'Les informations du métier ' . $request->libelle . ' ont bien été mises à jour !');
        }

        return view('Admin.edit_metier', compact('metier', 'secteurs'));
    }





    /**
     * Supprime un métier
     *
     * @param int $id
     * @return \App\Metier
     */
    public function deleteMetier($id)
    {
        $deletion = app('MetiersRepository')->deleteById($id);

        return $deletion;
    }





    /******************************** SECTEURS ********************************/

    /**
     * Affiche la liste des secteurs
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function showSecteurs(Request $request)
    {
        $id = $request->id;
        $nom = $request->nom;

        if (!empty($id)) {
            $secteurs = app('SecteursRepository')->findByIdAsCollection($id);
        }

        if (!empty($nom)) {
            $secteurs = app('SecteursRepository')->findByName($nom);
        }

        $secteurs = (!empty($secteurs)) ? $secteurs : app('SecteursRepository')->findAll();

        return view('Admin.section_secteurs', compact('secteurs', 'request'));
    }





    /**
     * Met à jour le secteur sélectionné avec l'id ou en créé un nouveau
     *
     * @param nt $id
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function editSecteur($id = null, Request $request)
    {
        $secteur = app('SecteursRepository')->findByIdOrInstantiate($id);

        if ($request->isMethod('post')) {
            $secteur = app('SecteursRepository')->updateFromAdmin($request, $secteur);
            return redirect()->route('admin_secteurs')->with('success', 'Les informations du secteur ' . $request->nom . ' ont bien été mises à jour !');

        }

        return view('Admin.edit_secteur', compact('secteur', 'request'));
    }





    /******************************** FORMATIONS ********************************/

    /**
     * Affiche la liste des formation, avec pagination, ou bien les résultats de la recherche en fonction d'un libellé ou d'un id
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function showFormations(Request $request)
    {
        $id = $request->id;
        $formation = $request->nom;

        $formations = app('FormationsRepository')->findAllWithPaginate(50);

        if (!empty($id)) {
            $formations = app('FormationsRepository')->findByIdAsCollection($id);
        }

        if (!empty($formation)) {
            $formations = app('FormationsRepository')->findByApproximativeName($formation);
        }

        $formations = (!empty($formations)) ? $formations : null;
        $total = $formations->toArray()['total'];

        return view('Admin.section_formations', compact('formations', 'request', 'total'));
    }





    /**
     * Affiche la liste des établissements liées à un formation
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function showFormationEtablissements(Request $request, $id)
    {
        $formation = Formation::find($id);
        $etablissements = $formation->etablissements()->paginate(50);

        return view('Admin.section_formation_etablissements', compact('formation', 'etablissements', 'request'));
    }





    /**
     * Met à jour les informations sur une formation, ou en créé une nouvelle, par le biais de l'espace admin
     *
     * @param int $id
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function editFormation($id = null, Request $request)
    {
        $formation = app('FormationsRepository')->findByIdOrInstantiate($id);
        $codes = app('CodesRepository')->findAll();

        if ($request->isMethod('post')) {
            $formation = app('FormationsRepository')->updateFromAdmin($request, $formation);
            return redirect()->route('admin_formations')->with('success', 'Les informations de la formation ' . $request->nom . ' ont bien été mises à jour !');
        }

        return view('Admin.edit_formation', compact('formation', 'codes'));
    }





    /**
     * supprime une formation
     *
     * @param int $id
     * @return \App\Formation
     */
    public function deleteFormation($id)
    {
        $deletion = app('FormationsRepository')->deleteById($id);

        return $deletion;
    }





    /**
     * Lié un établissement à une formation
     *
     * @param Request $request
     * @return \App\Code
     */
    public function addEtablissementToFormation(Request $request)
    {
      $req = $request->all();

      $formation = Formation::find($req['formation_id']);

      $exists = $formation->etablissements()->where('etablissement_id', $req['etablissement_id'])->exists();

      if ($exists) {
        return redirect()->back()->with('fail', 'Cette formation est déjà liée à cet établissement !');
      }
      else {
        $formation->etablissements()->attach($req['etablissement_id']);

        return redirect()->back()->with('success', 'La formation est liée à l\'établissement !');
      }
    }





/******************************** ETABLISSEMENTS ********************************/

    /**
     * Affiche la liste des établissements enregistrés, avec pagination, ou bien affiche les établissements
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function showEtablissements(Request $request)
    {
        $id = $request->id;
        $etablissement = $request->nom;

        $etablissements = app('EtablissementsRepository')->findAllWithPaginate(50);

        if (!empty($id)) {
            $etablissements = app('EtablissementsRepository')->findByIdAsCollection($id);
        }

        if (!empty($etablissement)) {
            $etablissements = app('EtablissementsRepository')->findByName($etablissement);
        }


        $etablissements = (!empty($etablissements)) ? $etablissements : null;
        $total = $etablissements->toArray()['total'];

        return view('Admin.section_etablissements', compact('etablissements', 'request', 'total'));
    }





    /**
     * Affiche la liste des formations liées à un établissement
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function showEtablissementFormations(Request $request, $id)
    {
        $etablissement = Etablissement::find($id);
        $formations = $etablissement->formations()->paginate(50);

        return view('Admin.section_etablissement_formations', compact('etablissement', 'formations', 'request'));
    }





    /**
     * Met à jour les informations sur un établissement, ou en créé un nouveau, par le biais de l'espace admin
     *
     * @param int $id
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function editEtablissement($id = null, Request $request)
    {
        $etablissement = app('EtablissementsRepository')->findByIdOrInstantiate($id);

        if ($request->isMethod('post')) {
            $etablissement = app('EtablissementsRepository')->updateFromAdmin($request, $etablissement);
            return redirect()->route('admin_etablissements')->with('success', 'Les informations de l\'établissement ' . $request->nom . ' ont bien été mises à jour !');
        }

        return view('Admin.edit_etablissement', compact('etablissement'));
    }





    /**
     * Supprime un établissement
     *
     * @param int $id
     * @return \App\Etablissement
     */
    public function deleteEtablissement($id)
    {
        $deletion = app('EtablissementsRepository')->deleteById($id);

        return $deletion;
    }





    /**
     * Lié une formation à un établissement
     *
     * @param Request $request
     * @return \App\Code
     */
    public function addFormationToEtablissement(Request $request)
    {
      $req = $request->all();

      $etablissement = Etablissement::find($req['etablissement_id']);

      $exists = $etablissement->formations()->where('formation_id', $req['formation_id'])->exists();

      if ($exists) {
        return redirect()->back()->with('fail', 'Cette formation est déjà liée à cet établissement !');
      }
      else {
        $etablissement->formations()->attach($req['formation_id']);

        return redirect()->back()->with('success', 'La formation est liée à l\'établissement !');
      }
    }





    /******************************* CODES ROME *******************************/

    /**
     * Affiche la liste des codes ROME enregistrés, avec pagination, ou bien les résultats de la recherche en fonction d'un code ou d'un id
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function showCodes(Request $request)
    {
        $id = $request->id;
        $codeROME = $request->nom;

        $codes = app('CodesRepository')->findAllWithPaginate(50);

        if (!empty($id)) {
            $codes = app('CodesRepository')->findByIdAsCollection($id);
        }

        if (!empty($codeROME)) {
            $codes = app('CodesRepository')->findByCodeROMEAsCollection($codeROME);
        }

        $codes = (!empty($codes)) ? $codes : null;
        $total = $codes->toArray()['total'];

        return view('Admin.section_codes', compact('codes', 'request', 'total'));
    }





    /**
     * Affiche la liste des formations liées à un code ROME
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function showCodeFormations(Request $request, $id)
    {
        $code = Code::find($id);
        $formations = $code->formations()->paginate(50);

        return view('Admin.section_code_formations', compact('code', 'formations', 'request'));
    }





    /**
     * Affiche la liste des métiers liées à un code ROME
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function showCodeMetiers(Request $request, $id)
    {
        $code = Code::find($id);
        $metiers = $code->metiers()->paginate(50);

        return view('Admin.section_code_metiers', compact('code', 'metiers', 'request'));
    }





    /**
     * Supprime un code ROME
     *
     * @param int $id
     * @return \App\Code
     */
    public function deleteCode($id)
    {
        $deletion = app('CodesRepository')->delete($id);

        return $deletion;
    }





    /**
     * Lié une formation à un code ROME
     *
     * @param Request $request
     * @return \App\Code
     */
    public function addFormationToCode(Request $request)
    {
      $req = $request->all();

      $code = Code::find($req['code_id']);

      $exists = $code->formations()->where('formation_id', $request['formation_id'])->exists();

      if ($exists) {
        return redirect()->back()->with('fail', 'Cette formation est déjà liée à ce code ROME !');
      }
      else {
        return redirect()->back()->with('success', 'La formation est liée au code ROME');
      }
    }





    /**
     * Lié un métier à un code ROME
     *
     * @param Request $request
     * @return \App\Code
     */
    public function addMetierToCode(Request $request)
    {
      $req = $request->all();

      $code = Code::find($req['code_id']);

      $exists = $code->metiers()->where('id', $req['metier_id'])->exists();

      if ($exists) {
        return redirect()->back()->with('fail', 'Ce métier est déjà lié à ce code ROME !');
      }
      else {
        $metier = Metier::find($req['metier_id']);
        $metier->code_id = $req['code_id'];
        $metier->save();

        return redirect()->back()->with('success', 'Le code rome du métier "' . $metier->nom . '" a bien été changé !');
      }
      dd($req);
    }





    /******************************* SAVOIRS *******************************/

    /**
     * Affiche la liste des savoirs enregistrés, avec pagination, ou bien les résultats de la recherche en fonction d'un savoir ou d'un id
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function showSavoirs(Request $request)
    {
        $id = $request->id;
        $req = $request->nom;

        $savoirs = app('SavoirsRepository')->findAllWithPaginate(50);
        $total = $savoirs->toArray()['total'];

        if (!empty($id)) {
            $savoirs = app('SavoirsRepository')->findByIdAsCollection($id);
        }

        if (!empty($req)) {
            $savoirs = app('SavoirsRepository')->findByApproximativeName($req);
        }

        $savoirs = (!empty($savoirs)) ? $savoirs : null;

        return view('Admin.section_savoirs', compact('savoirs', 'request', 'total'));
    }





      /**
       * Affiche la liste des codes ROME liées à un savoir
       *
       * @param Request $request
       * @param int $id
       * @return \Illuminate\View\View
       */
      public function showSavoirCodes(Request $request, $id)
      {
          $savoir = Savoir::find($id);
          $codes = $savoir->codes()->paginate(50);

          return view('Admin.section_savoir_codes', compact('savoir', 'codes', 'request'));
      }





      /**
       * Met à jour les informations sur un savoir, ou en créé un nouveau, par le biais de l'espace admin
       *
       * @param int $id
       * @param Request $request
       * @return \Illuminate\View\View
       */
      public function editSavoir($id = null, Request $request)
      {
          $savoir = app('SavoirsRepository')->findByIdOrInstantiate($id);

          if ($request->isMethod('post')) {
              $savoir = app('SavoirsRepository')->updateFromAdmin($request, $savoir);
              return redirect()->route('admin_savoirs')->with('success', 'Les informations du savoir ' . $request->nom . ' ont bien été mises à jour !');
          }

          return view('Admin.edit_savoir', compact('savoir'));
      }





      /**
       * Supprime un savoir
       *
       * @param int $id
       * @return \App\Savoir
       */
      public function deleteSavoir($id)
      {
          $deletion = app('SavoirsRepository')->delete($id);

          return $deletion;
      }





      /******************************* SAVOIR-FAIRE *******************************/

      /**
       * Affiche la liste des savoir-faire enregistrés, avec pagination, ou bien les résultats de la recherche en fonction d'un savoir ou d'un id
       *
       * @param Request $request
       * @return \Illuminate\View\View
       */
      public function showSavoirFaire(Request $request)
      {
          $id = $request->id;
          $req = $request->nom;

          $savoirFaire = app('SavoirFaireRepository')->findAllWithPaginate(50);
          $total = $savoirFaire->toArray()['total'];

          if (!empty($id)) {
              $savoirFaire = app('SavoirFaireRepository')->findByIdAsCollection($id);
          }

          if (!empty($req)) {
              $savoirFaire = app('SavoirFaireRepository')->findByApproximativeName($req);
          }

          $savoirFaire = (!empty($savoirFaire)) ? $savoirFaire : null;

          return view('Admin.section_savoir_faire', compact('savoirFaire', 'request', 'total'));
      }





      /**
       * Affiche la liste des codes ROME liées à un savoir-faire
       *
       * @param Request $request
       * @param int $id
       * @return \Illuminate\View\View
       */
      public function showSavoirFaireCodes(Request $request, $id)
      {
          $savoirFaire = SavoirFaire::find($id);
          $codes = $savoirFaire->codes()->paginate(50);

          return view('Admin.section_savoir_faire_codes', compact('savoirFaire', 'codes', 'request'));
      }





      /**
       * Met à jour les informations sur un savoir-faire, ou en créé un nouveau, par le biais de l'espace admin
       *
       * @param int $id
       * @param Request $request
       * @return \Illuminate\View\View
       */
      public function editSavoirFaire($id = null, Request $request)
      {
          $savoirFaire = app('SavoirFaireRepository')->findByIdOrInstantiate($id);

          if ($request->isMethod('post')) {
              $savoirFaire = app('SavoirFaireRepository')->updateFromAdmin($request, $savoirFaire);
              return redirect()->route('admin_savoir_faire')->with('success', 'Les informations du savoir-faire ' . $request->nom . ' ont bien été mises à jour !');
          }

          return view('Admin.edit_savoir_faire', compact('savoirFaire'));
      }





      /**
       * Supprime un savoir-faire
       *
       * @param int $id
       * @return \App\SavoirFaire
       */
      public function deleteSavoirFaire($id)
      {
          $deletion = app('SavoirFaireRepository')->delete($id);

          return $deletion;
      }





      /**
       * Lié une formation à un établissement
       *
       * @param Request $request
       * @return \App\Code
       */
      public function addCodeToSavoirFaire(Request $request)
      {
        $req = $request->all();

        $savoirFaire = SavoirFaire::find($req['savoir_faire_id']);

        $exists = $savoirFaire->codes()->where('code_id', $req['code_id'])->exists();

        if ($exists) {
          return redirect()->back()->with('fail', 'Ce code ROME est déjà lié au savoir-faire !');
        }
        else {
          $savoirFaire->codes()->attach($req['code_id']);

          return redirect()->back()->with('success', 'Le code ROME est lié au savoir-faire !');
        }
      }





      /******************************* SAVOIR-ETRE *******************************/

      /**
       * Affiche la liste des savoir-être enregistrés, avec pagination, ou bien les résultats de la recherche en fonction d'un savoir ou d'un id
       *
       * @param Request $request
       * @return \Illuminate\View\View
       */
      public function showSavoirEtre(Request $request)
      {
          $id = $request->id;
          $req = $request->nom;

          $savoirEtre = app('SavoirEtreRepository')->findAllWithPaginate(50);
          $total = $savoirEtre->toArray()['total'];

          if (!empty($id)) {
              $savoirEtre = app('SavoirEtreRepository')->findByIdAsCollection($id);
          }

          if (!empty($req)) {
              $savoirEtre = app('SavoirEtreRepository')->findByApproximativeName($req);
          }

          $savoirEtre = (!empty($savoirEtre)) ? $savoirEtre : null;

          return view('Admin.section_savoir_etre', compact('savoirEtre', 'request', 'total'));
      }





      /**
       * Affiche la liste des métiers liées à un savoir-être
       *
       * @param Request $request
       * @param int $id
       * @return \Illuminate\View\View
       */
      public function showSavoirEtreMetiers(Request $request, $id)
      {
          $savoirEtre = SavoirEtre::find($id);
          $metiers = $savoirEtre->metiers()->paginate(50);

          return view('Admin.section_savoir_etre_metiers', compact('savoirEtre', 'metiers', 'request'));
      }





      /**
       * Met à jour les informations sur un savoir, ou en créé un nouveau, par le biais de l'espace admin
       *
       * @param int $id
       * @param Request $request
       * @return \Illuminate\View\View
       */
      public function editSavoirEtre($id = null, Request $request)
      {
          $savoirEtre = app('SavoirEtreRepository')->findByIdOrInstantiate($id);

          if ($request->isMethod('post')) {
              $savoirEtre = app('SavoirEtreRepository')->updateFromAdmin($request, $savoirEtre);
              return redirect()->route('admin_savoir_etre')->with('success', 'Les informations du savoir-être ' . $request->nom . ' ont bien été mises à jour !');
          }

          return view('Admin.edit_savoir_etre', compact('savoirEtre'));
      }





      /**
       * Supprime un savoir
       *
       * @param int $id
       * @return \App\SavoirEtre
       */
      public function deleteSavoirEtre($id)
      {
          $deletion = app('SavoirEtreRepository')->delete($id);

          return $deletion;
      }





      /******************************* MOTIVATIONS *******************************/

      /**
       * Affiche la liste des motivations enregistrées, avec pagination, ou bien les résultats de la recherche en fonction d'une motivation ou d'un id
       *
       * @param Request $request
       * @return \Illuminate\View\View
       */
      public function showMotivations(Request $request)
      {
          $id = $request->id;
          $req = $request->nom;

          $motivations = app('MotivationsRepository')->findAllWithPaginate(50);
          $total = $motivations->toArray()['total'];

          if (!empty($id)) {
              $motivations = app('MotivationsRepository')->findByIdAsCollection($id);
          }

          if (!empty($req)) {
              $motivations = app('MotivationsRepository')->findByApproximativeName($req);
          }

          $motivations = (!empty($motivations)) ? $motivations : null;

          return view('Admin.section_motivations', compact('motivations', 'request', 'total'));
      }





      /**
       * Affiche la liste des métiers liées à une motivation
       *
       * @param Request $request
       * @param int $id
       * @return \Illuminate\View\View
       */
      public function showMotivationMetiers(Request $request, $id)
      {
          $motivation = Motivation::find($id);
          $metiers = $motivation->metiers()->paginate(50);

          return view('Admin.section_motivation_metiers', compact('motivation', 'metiers', 'request'));
      }





      /**
       * Met à jour les informations sur un savoir, ou en créé un nouveau, par le biais de l'espace admin
       *
       * @param int $id
       * @param Request $request
       * @return \Illuminate\View\View
       */
      public function editMotivation($id = null, Request $request)
      {
          $motivation = app('MotivationsRepository')->findByIdOrInstantiate($id);

          if ($request->isMethod('post')) {
              $motivation = app('MotivationsRepository')->updateFromAdmin($request, $motivation);
              return redirect()->route('admin_motivations')->with('success', 'Les informations du battement de coeur ' . $request->nom . ' ont bien été mises à jour !');
          }

          return view('Admin.edit_motivation', compact('motivation'));
      }





      /**
       * Supprime un savoir
       *
       * @param int $id
       * @return \App\Savoir
       */
      public function deleteMotivation($id)
      {
          $deletion = app('MotivationsRepository')->delete($id);

          return $deletion;
      }
}
