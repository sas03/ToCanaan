<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SavoirEtreController extends Controller
{
    /**
     * Permet de lier un savoir-être à une société
     *
     * @param int $savoir_id
     * @param string $savoir_model
     * @return boolean|string
     */
    public function addInSociete($savoir_id, $savoir_model)
    {
      $societe = Auth::guard('web_societe')->user();

      switch ($savoir_model) {

        case 'App\SavoirEtre':
          $savoirInSociete = $societe->savoirEtreDefault()->where('competence_id', $savoir_id)->exists();

          if (!$savoirInSociete) {
            $societe->savoirEtreDefault()->attach($savoir_id, ['statut' => 'requise']);
          }

          break;

        case 'App\SavoirEtreAdded':
          $savoirInSociete = $societe->savoirEtreAdded()->where('competence_id', $savoir_id)->exists();

          if (!$savoirInSociete) {
            $societe->savoirEtreAdded()->attach($savoir_id, ['statut' => 'requise']);
          }

          break;

        default:
          $savoirInSociete = "";
          break;
      }
      return $savoirInSociete;
    }





    /**
     * Supprime un savoir-être d'une société
     *
     * @param int $savoir_id
     * @param string $savoir_model
     * @return App\SavoirEtre|string
     */
    public function deleteInSociete($savoir_id, $savoir_model)
    {
      $societe = Auth::guard('web_societe')->user();

      switch ($savoir_model) {

        case 'App\SavoirEtre':
          $savoirInSociete = $societe->savoirsEtreDefault()->where('competence_id', $savoir_id)->first();

          if ($savoirInSociete->pivot->statut == 'requise') {
            $societe->savoirsEtreDefault()->detach($savoir_id);
          }
          break;

        case 'App\SavoirEtreAdded':
          $savoirInSociete = $societe->savoirsEtreAdded()->where('competence_id', $savoir_id)->first();

          if ($savoirInSociete->pivot->statut == 'requise') {
            $societe->savoirsEtreAdded()->detach($savoir_id);
          }

          break;

        default:
          $savoirInSociete = "";
          break;
      }
      return $savoirInSociete;
    }





    /**
     * Ajoute un nouveau savoir-être dans la table "savoir_etre_added"
     *
     * @param Request $request
     * @return App\SavoirEtreAdded
     */
    public function addInAdded($request)
    {
      $savoirEtreAdded = app('SavoirEtreAddedRepository')->add($request);

      return $savoirEtreAdded;
    }





    /**
     * Permet de lier un savoir-être à un poste
     *
     * @param Request $request
     * @return Illuminate\Http\Request
     */
    public function addInPoste(Request $request)
    {
      // on va chercher le savoir-être dans la table 'savoir_etre_societe'
      $savoirEtreAdded = app('SavoirEtreAddedRepository')->findByName($request->nom);

      // si aucun résultat n'a été trouvé
      if (!$savoirEtreAdded) {
        // on crée un nouveau savoir-être dans la table 'savoir_etre_societe'
        $savoirEtreAdded = $this->addInAdded($request);
      }

      $savoirEtreAdded->postes()->attach($request->poste_id, ['valide' => 'oui']);

      $this->addInSociete($savoirEtreAdded->id, $request->model);

      return $request;
    }





    /**
     * Met à jour les savoir-être liés à un poste
     *
     * @param Request $request
     * @return Illuminate\Http\Request
     */
    public function updateInPoste(Request $request)
    {
      $poste = app('PostesRepository')->findById($request->poste_id);

      // si le savoir fait parti de la table "savoir_etre"
      if ($request->savoir_etre_model == 'App\SavoirEtre') {
        $savoirEtre = $poste->savoirEtreDefault()->where('savoir_etre_id', '=', $request->savoir_etre_id)->first();

        if ($savoirEtre->pivot->valide == 'non') {
          $poste->savoirEtreDefault()->updateExistingPivot($request->savoir_etre_id, ['valide' => 'oui']);

          $this->addInSociete($request->savoir_etre_id, $request->savoir_etre_model);
        }
        else {
          $poste->savoirEtreDefault()->updateExistingPivot($request->savoir_etre_id, ['valide' => 'non']);

          // on récupère le nombre de poste qui possèdent ce savoir-faire
          $nbrPostes = $savoirEtre->postes()->where('valide', 'oui')->count();

          // s'il n'y a aucun poste qui possède ce savoir-faire
          if ($nbrPostes == 0) {
            // on retire le savoir-faire de la table pivot des compétences de la société
            $this->deleteInSociete($request->savoir_etre_id, $request->savoir_model);
          }
        }
      }

      // sinon le savoir fait parti de la table "savoir_etre_societe"
      else {
        $savoirEtre = $poste->savoirEtreAdded()->where('savoir_etre_id', '=', $request->savoir_etre_id)->first();

        if ($savoirEtre->pivot->valide == 'non') {
          $poste->savoirEtreAdded()->updateExistingPivot($request->savoir_etre_id, ['valide' => 'oui']);

          $this->addInSociete($request->savoir_etre_id, $request->savoir_etre_model);
        }
        else {
          $poste->savoirEtreAdded()->updateExistingPivot($request->savoir_etre_id, ['valide' => 'non']);

          // on récupère le nombre de poste qui possèdent ce savoir-faire
          $nbrPostes = $savoirEtre->postes()->where('valide', 'oui')->count();

          // s'il n'y a aucun poste qui possède ce savoir-faire
          if ($nbrPostes == 0) {
            // on retire le savoir-faire de la table pivot des compétences de la société
            $this->deleteInSociete($request->savoir_etre_id, $request->savoir_model);
          }
        }
      }

      return $request;
    }





    /**
     * Met à jour l'intitulé d'un savoir-être lié à un poste
     *
     * @param Request $request
     * @return App\SavoirEtre
     */
    public function updateNameInPoste(Request $request)
    {
      $savoirEtre = app('SavoirEtreAddedRepository')->updateName($request);

      return $savoirEtre;
    }





    /**
     * Met à jour l'intitulé d'un savoir-être lié à un poste
     *
     * @param Request $request
     * @return Illuminate\Http\Request
     */
    public function deleteInPoste(Request $request)
    {
      $poste = app('PostesRepository')->findById($request->poste_id);

      // si le savoir fait parti de la table "savoir_etre"
      if ($request->savoir_etre_model == 'App\SavoirEtre') {
        $savoirEtre = $poste->savoirEtreDefault()->where('savoir_etre_id', '=', $request->savoir_etre_id)->first();

        $poste->savoirEtreDefault()->detach($request->savoir_etre_id);
      }

      // sinon le savoir fait parti de la table "savoir_etre_societe"
      else {
        $savoirEtre = $poste->savoirEtreAdded()->where('savoir_etre_id', '=', $request->savoir_etre_id)->first();

        $poste->savoirEtreAdded()->detach($request->savoir_etre_id);
      }

      $nbrPostes = $savoirEtre->postes()->where('valide', 'oui')->count();

      if ($nbrPostes == 0) {
        $this->deleteInSociete($request->savoir_etre_id, $request->savoir_model);
      }

      return $request;
    }





    /**
     * Met à jour les savoir-être d'un employé
     *
     * @param Request $request
     * @return Illuminate\Http\Request
     */
    public function updateInEmploye(Request $request)
    {
      $societe = Auth::guard('web_societe')->user();
      $employe = app('EmployesRepository')->findById($request->employe_id);

      // si le savoir fait parti de la table "savoir_etre"
      if ($request->savoir_model == 'App\SavoirEtre') {
        $savoirEtre = $employe->savoirEtreDefault()
        ->where('savoir_etre_id', '=', $request->savoir_id)
        ->exists();

        if ($savoirEtre) {
          $employe->savoirEtreDefault()->updateExistingPivot($request->savoir_id, ['niveau' => $request->niveau]);
        }
        else {
          $employe->savoirEtreDefault()->attach($request->savoir_id, ['niveau' => $request->niveau]);

          $societe->savoirEtreDefault()->updateExistingPivot($request->savoir_id, ['statut' => 'disponible']);
        }
      }

      // sinon le savoir fait parti de la table "savoir_etre_societe"
      else {
        $savoirEtre = $employe->savoirEtreAdded()->where('savoir_etre_id', '=', $request->savoir_id)->exists();

        if ($savoirEtre) {
          $employe->savoirEtreAdded()->updateExistingPivot($request->savoir_id, ['niveau' => $request->niveau]);
        }
        else {
          $employe->savoirEtreAdded()->attach($request->savoir_id, ['niveau' => $request->niveau]);

          $societe->savoirEtreAdded()->updateExistingPivot($request->savoir_id, ['statut' => 'disponible']);
        }
      }

      return $request;
    }





    /**
     * Autocomplétion de tous les savoir-être de la société connectée
     *
     * @param Request $request
     * @return json
     */
    public function autocomplete(Request $request)
    {
        $query = $request->get('term', '');

        $savoirs = app('SavoirEtreRepository')->findForAutocomplete($query);

        return json_encode($savoirs); // On retourne le résultat en JSON.
    }
}
