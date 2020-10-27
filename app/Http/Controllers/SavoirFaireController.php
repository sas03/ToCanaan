<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SavoirFaireController extends Controller
{
    /**
     * Permet de lier un savoir-faire à une société
     *
     * @param int $savoir_id
     * @param string $savoir_model
     * @return boolean|string
     */
    public function addInSociete($savoir_id, $savoir_model)
    {
      $societe = Auth::guard('web_societe')->user();

      switch ($savoir_model) {

        case 'App\SavoirFaire':
          $savoirInSociete = $societe->savoirFaireDefault()->where('competence_id', $savoir_id)->exists();

          if (!$savoirInSociete) {
            $societe->savoirFaireDefault()->attach($savoir_id, ['statut' => 'requise']);
          }

          break;

        case 'App\SavoirFaireAdded':
          $savoirInSociete = $societe->savoirFaireAdded()->where('competence_id', $savoir_id)->exists();

          if (!$savoirInSociete) {
            $societe->savoirFaireAdded()->attach($savoir_id, ['statut' => 'requise']);
          }

          break;

        default:
          $savoirInSociete = "";
          break;
      }
      return $savoirInSociete;
    }





    /**
     * Supprime un savoir-faire d'une société
     *
     * @param int $savoir_id
     * @param string $savoir_model
     * @return App\SavoirFaire|string
     */
    public function deleteInSociete($savoir_id, $savoir_model)
    {
      $societe = Auth::guard('web_societe')->user();

      switch ($savoir_model) {

        case 'App\SavoirFaire':
          $savoirInSociete = $societe->savoirsFaireDefault()->where('competence_id', $savoir_id)->first();

          if ($savoirInSociete->pivot->statut == 'requise') {
            $societe->savoirsFaireDefault()->detach($savoir_id);
          }
          break;

        case 'App\SavoirFaireAdded':
          $savoirInSociete = $societe->savoirsFaireAdded()->where('competence_id', $savoir_id)->first();

          if ($savoirInSociete->pivot->statut == 'requise') {
            $societe->savoirsFaireAdded()->detach($savoir_id);
          }

          break;

        default:
          $savoirInSociete = "";
          break;
      }
      return $savoirInSociete;
    }





    /**
     * Ajoute un nouveau savoir-faire dans la table "savoir_faire_added"
     *
     * @param Request $request
     * @return App\SavoirFaireAdded
     */
    public function addInAdded($request)
    {
      $savoirFaireAdded = app('SavoirFaireAddedRepository')->add($request);

      return $savoirFaireAdded;
    }





    /**
     * Permet de lier un savoir-faire à un poste
     *
     * @param Request $request
     * @return Illuminate\Http\Request
     */
    public function addInPoste(Request $request)
    {
      // on va chercher le savoir-être dans la table 'savoir_faire_societe'
      $savoirFaireAdded = app('SavoirFaireAddedRepository')->findByName($request->nom);

      // si aucun résultat n'a été trouvé
      if (!$savoirFaireAdded) {
        // on crée un nouveau savoir-être dans la table 'savoir_faire_societe'
        $savoirFaireAdded = $this->addInAdded($request);
      }

      $savoirFaireAdded->postes()->attach($request->poste_id, ['valide' => 'oui', 'type' => $request->type]);

      $this->addInSociete($savoirFaireAdded->id, $request->model);

      $request = $request->toArray();
      $request['savoir_id'] = $savoirFaireAdded->id;

      return $request;
    }





    /**
     * Met à jour les savoir-faire liés à un poste
     *
     * @param Request $request
     * @return App\Poste
     */
    public function updateInPoste(Request $request)
    {
      $poste = app('PostesRepository')->findById($request->poste_id);

      // si le savoir fait parti de la table "savoir_faire"
      if ($request->savoir_faire_model == 'App\SavoirFaire') {
        $savoirFaire = $poste->savoirFaireDefault()
        ->where('type', $request->type)
        ->where('savoir_faire_id', '=', $request->savoir_faire_id)
        ->first();

        if ($savoirFaire->pivot->valide == 'non') {
          $poste->savoirFaireDefault()->updateExistingPivot($request->savoir_faire_id, ['valide' => 'oui']);

          $this->addInSociete($request->savoir_faire_id, $request->savoir_faire_model);
        }
        else {
          $poste->savoirFaireDefault()->updateExistingPivot($request->savoir_faire_id, ['valide' => 'non']);

          // on récupère le nombre de poste qui possèdent ce savoir-faire
          $nbrPostes = $savoirFaire->postes()->where('valide', 'oui')->count();

          // s'il n'y a aucun poste qui possède ce savoir-faire
          if ($nbrPostes == 0) {
            // on retire le savoir-faire de la table pivot des compétences de la société
            $this->deleteInSociete($request->savoir_faire_id, $request->savoir_model);
          }
        }
      }

      // sinon le savoir fait parti de la table "savoir_faire_societe"
      else {
        $savoirFaire = $poste->savoirFaireAdded()
        ->where('type', $request->type)
        ->where('savoir_faire_id', '=', $request->savoir_faire_id)
        ->first();

        if ($savoirFaire->pivot->valide == 'non') {
          $poste->savoirFaireAdded()->updateExistingPivot($request->savoir_faire_id, ['valide' => 'oui']);

          $this->addInSociete($request->savoir_faire_id, $request->savoir_faire_model);
        }
        else {
          $poste->savoirFaireAdded()->updateExistingPivot($request->savoir_faire_id, ['valide' => 'non']);

          $nbrPostes = $savoirFaire->postes()->where('valide', 'oui')->count();

          if ($nbrPostes == 0) {
            $this->deleteInSociete($request->savoir_faire_id, $request->savoir_model);
          }
        }
      }

      return $poste;
    }





    /**
     * Met à jour l'intitulé d'un savoir-faire lié à un poste
     *
     * @param Request $request
     * @return App\SavoirFaire
     */
    public function updateNameInPoste(Request $request)
    {
      $savoirFaire = app('SavoirFaireAddedRepository')->updateName($request);

      return $savoirFaire;
    }





    /**
     * Met à jour l'intitulé d'un savoir-faire lié à un poste
     *
     * @param Request $request
     * @return Illuminate\Http\Request
     */
    public function deleteInPoste(Request $request)
    {
      $poste = app('PostesRepository')->findById($request->poste_id);

      // si le savoir fait parti de la table "savoir_faire"
      if ($request->savoir_faire_model == 'App\SavoirFaire') {
        $savoirFaire = $poste->savoirFaireDefault()
        ->where('type', $request->type)
        ->where('savoir_faire_id', '=', $request->savoir_faire_id)
        ->first();

        $poste->savoirFaireDefault()->detach($request->savoir_faire_id);
      }

      // sinon le savoir fait parti de la table "savoir_faire_societe"
      else {
        $savoirFaire = $poste->savoirFaireAdded()
        ->where('type', $request->type)
        ->where('savoir_faire_id', '=', $request->savoir_faire_id)
        ->first();

        $poste->savoirFaireAdded()->detach($request->savoir_faire_id);
      }

      $nbrPostes = $savoirFaire->postes()->where('valide', 'oui')->count();

      if ($nbrPostes == 1) {
        $this->deleteInSociete($request->savoir_faire_id, $request->savoir_model);
      }

      return $request;
    }





    /**
     * Met à jour les savoir-faire d'un employé
     *
     * @param Request $request
     * @return App\Employe
     */
    public function updateInEmploye(Request $request)
    {
      $societe = Auth::guard('web_societe')->user();
      $employe = app('EmployesRepository')->findById($request->employe);

      // si le savoir fait parti de la table "savoir_"
      if ($request->savoir_model == 'App\SavoirFaire') {
        $savoirFaire = $employe->savoirFaireDefault()
        ->where('type', $request->type)
        ->where('savoir_faire_id', $request->savoir)
        ->exists();

        if ($savoirFaire) {
          $employe->savoirFaireDefault()->updateExistingPivot($request->savoir, ['niveau' => $request->niveau]);
        }
        else {
          $employe->savoirFaireDefault()->attach($request->savoir, ['type' => $request->type, 'niveau' => $request->niveau]);

          $societe->savoirFaireDefault()->updateExistingPivot($request->savoir, ['statut' => 'disponible']);
        }
      }

      // sinon le savoir fait parti de la table "savoir_societe"
      else {
        $savoirFaire = $employe->savoirFaireAdded()
        ->where('type', $request->type)
        ->where('savoir_faire_id', $request->savoir)
        ->exists();

        if ($savoirFaire) {
          $employe->savoirFaireAdded()->updateExistingPivot($request->savoir, ['niveau' => $request->niveau]);
        }
        else {
          $employe->savoirFaireAdded()->attach($request->savoir, ['type' => $request->type, 'niveau' => $request->niveau]);

          $societe->savoirFaireAdded()->updateExistingPivot($request->savoir, ['statut' => 'disponible']);
        }
      }

      return $employe;
    }
}
