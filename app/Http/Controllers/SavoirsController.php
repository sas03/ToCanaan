<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SavoirsController extends Controller
{

    /**
     * Permet de lier un savoir à une société
     *
     * @param int $savoir_id
     * @param string $savoir_model
     * @return boolean|string
     */
    public function addInSociete($savoir_id, $savoir_model)
    {
      $societe = Auth::guard('web_societe')->user();

      switch ($savoir_model) {

        case 'App\Savoir':
          $savoirInSociete = $societe->savoirsDefault()->where('competence_id', $savoir_id)->exists();

          if (!$savoirInSociete) {
            $societe->savoirsDefault()->attach($savoir_id, ['statut' => 'requise']);
          }

          break;

        case 'App\SavoirAdded':
          $savoirInSociete = $societe->savoirsAdded()->where('competence_id', $savoir_id)->exists();

          if (!$savoirInSociete) {
            $societe->savoirsAdded()->attach($savoir_id, ['statut' => 'requise']);
          }

          break;

        default:
          $savoirInSociete = "";
          break;
      }
      return $savoirInSociete;
    }





    /**
     * Supprime un savoir d'une société
     *
     * @param int $savoir_id
     * @param string $savoir_model
     * @return App\Savoir|string
     */
    public function deleteInSociete($savoir_id, $savoir_model)
    {
      $societe = Auth::guard('web_societe')->user();

      switch ($savoir_model) {

        case 'App\Savoir':
          $savoirInSociete = $societe->savoirsDefault()->where('competence_id', $savoir_id)->first();

          if ($savoirInSociete->pivot->statut == 'requise') {
            $societe->savoirsDefault()->detach($savoir_id);
          }
          break;

        case 'App\SavoirAdded':
          $savoirInSociete = $societe->savoirsAdded()->where('competence_id', $savoir_id)->first();

          if ($savoirInSociete->pivot->statut == 'requise') {
            $societe->savoirsAdded()->detach($savoir_id);
          }

          break;

        default:
          $savoirInSociete = "";
          break;
      }
      return $savoirInSociete;
    }





    /**
     * Ajoute un nouveau savoir dans la table "savoir_added"
     *
     * @param Request $request
     * @return App\SavoirAdded
     */
    public function addInAdded($request)
    {
      $savoirAdded = app('SavoirsAddedRepository')->add($request);

      return $savoirAdded;
    }





    /**
     * Permet de lier un savoir à un poste
     *
     * @param Request $request
     * @return App\SavoirAdded
     */
    public function addInPoste(Request $request)
    {
      // on va chercher le savoir-être dans la table 'savoir__societe'
      $savoirAdded = app('SavoirsAddedRepository')->findByName($request->nom);

      // si aucun résultat n'a été trouvé
      if (!$savoirAdded) {
        // on crée un nouveau savoir-être dans la table 'savoir__societe'
        $savoirAdded = $this->addInAdded($request);
      }

      $savoirAdded->postes()->attach($request->poste_id, ['valide' => 'oui', 'type' => $request->type]);

      $this->addInSociete($savoirAdded->id, $request->model);

      $request = $request->toArray();
      $request['savoir_id'] = $savoirAdded->id;

      return $request;
    }





    /**
     * Met à jour les savoirs liés à un poste
     *
     * @param Request $request
     * @return Illuminate\Http\Request
     */
    public function updateInPoste(Request $request)
    {
      $poste = app('PostesRepository')->findById($request->poste_id);

      // si le savoir fait parti de la table "savoir"
      if ($request->savoir_model == 'App\Savoir') {
        $savoir = $poste->savoirsDefault()
        ->where('type', $request->type)
        ->where('savoir_id', $request->savoir_id)
        ->first();

        // si le savoir n'est pas validé
        if ($savoir->pivot->valide == 'non') {
          // on met à jour le champs "valide" dans la table pivot
          $poste->savoirsDefault()->updateExistingPivot($request->savoir_id, ['valide' => 'oui']);

          // on ajoute le savoir dans la table pivot des competences de la société
          $this->addInSociete($request->savoir_id, $request->savoir_model);
        }
        // sinon
        else {
          $poste->savoirsDefault()->updateExistingPivot($request->savoir_id, ['valide' => 'non']);

          // on récupère le nombre de poste qui possèdent ce savoir
          $nbrPostes = $savoir->postes()->where('valide', 'oui')->count();

          // s'il n'y a aucun poste qui possède ce savoir
          if ($nbrPostes == 0) {
            // on retire le savoir de la table pivot des compétences de la société
            $this->deleteInSociete($request->savoir_id, $request->savoir_model);
          }
        }
      }

      // sinon le savoir fait parti de la table "savoir_added"
      else {
        $savoir = $poste->savoirsAdded()
        ->where('type', $request->type)
        ->where('savoir_id', $request->savoir_id)
        ->first();

        if ($savoir->pivot->valide == 'non') {
          $poste->savoirsAdded()->updateExistingPivot($request->savoir_id, ['valide' => 'oui']);

          $this->addInSociete($request->savoir_id, $request->savoir_model);
        }
        else {
          $poste->savoirsAdded()->updateExistingPivot($request->savoir_id, ['valide' => 'non']);

          $nbrPostes = $savoir->postes()->where('valide', 'oui')->count();

          if ($nbrPostes == 0) {
            $this->deleteInSociete($request->savoir_id, $request->savoir_model);
          }
        }
      }

      return $request;
    }





    /**
     * Met à jour l'intitulé d'un savoir lié à un poste
     *
     * @param Request $request
     * @return App\Savoir
     */
    public function updateNameInPoste(Request $request)
    {
      $savoir = app('SavoirsAddedRepository')->updateName($request);

      return $savoir;
    }





    /**
     * Met à jour l'intitulé d'un savoir lié à un poste
     *
     * @param Request $request
     * @return int
     */
    public function deleteInPoste(Request $request)
    {
      $poste = app('PostesRepository')->findById($request->poste_id);

      // si le savoir fait parti de la table "savoir_"
      if ($request->savoir_model == 'App\Savoir') {
        $savoir = $poste->savoirsDefault()
        ->where('type', $request->type)
        ->where('savoir_id', $request->savoir_id)
        ->first();

        $poste->savoirsDefault()->detach($request->savoir_id);
      }

      // sinon le savoir fait parti de la table "savoir__societe"
      else {
        $savoir = $poste->savoirsAdded()
        ->where('type', $request->type)
        ->where('savoir_id', $request->savoir_id)
        ->first();

        $poste->savoirsAdded()->detach($request->savoir_id);
      }

      $nbrPostes = $savoir->postes()->where('valide', 'oui')->count();

      if ($nbrPostes == 1) {
        $this->deleteInSociete($request->savoir_id, $request->savoir_model);
      }

      return $nbrPostes;
    }





    /**
     * Met à jour les savoirs d'un employé
     *
     * @param Request $request
     * @return Illuminate\Http\Request
     */
    public function updateInEmploye(Request $request)
    {
      $societe = Auth::guard('web_societe')->user();
      $employe = app('EmployesRepository')->findById($request->employe);

      // si le savoir fait parti de la table "savoir_"
      if ($request->savoir_model == 'App\Savoir') {
        $savoir = $employe->savoirsDefault()
        ->where('type', $request->type)
        ->where('savoir_id', $request->savoir)
        ->exists();

        if ($savoir) {
          $employe->savoirsDefault()->updateExistingPivot($request->savoir, ['niveau' => $request->niveau]);
        }
        else {
          $employe->savoirsDefault()->attach($request->savoir, ['type' => $request->type, 'niveau' => $request->niveau]);

          $societe->savoirsDefault()->updateExistingPivot($request->savoir, ['statut' => 'disponible']);
        }
      }

      // sinon le savoir fait parti de la table "savoir_societe"
      else {
        $savoir = $employe->savoirsAdded()
        ->where('type', $request->type)
        ->where('savoir_id', $request->savoir)
        ->exists();

        if ($savoir) {
          $employe->savoirsAdded()->updateExistingPivot($request->savoir, ['niveau' => $request->niveau]);
        }
        else {
          $employe->savoirsAdded()->attach($request->savoir, ['type' => $request->type, 'niveau' => $request->niveau]);

          $societe->savoirsAdded()->updateExistingPivot($request->savoir, ['statut' => 'disponible']);
        }
      }

      return $request;
    }





    /**
     * Autocomplétion de tous les savoirs de la société connectée
     *
     * @param Request $request
     * @return json
     */
    public function autocomplete(Request $request)
    {
        $query = $request->get('term', '');

        $societe_id = Auth::guard('web_societe')->user()->id;

        $savoirs = app('SavoirsAddedRepository')->findForAutocomplete($query, $societe_id);

        return json_encode($savoirs); // On retourne le résultat en JSON.
    }





    /**
     * Autocomplétion de tous les savoirs d'un employé
     *
     * @param Request $request
     * @return json
     */
    public function autocompleteSavoirsAndSavoirFaire(Request $request)
    {
        $query = $request->get('term', '');

        $savoirs = app('SavoirsRepository')->findForAutocomplete($query);
        $savoirFaire = app('SavoirFaireRepository')->findForAutocomplete($query);

        $combine = $savoirs->concat($savoirFaire);

        return json_encode($combine); // On retourne le résultat en JSON.
    }
}
