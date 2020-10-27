<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Parcours;

class ParcoursController extends Controller
{
    /**
     * Ajoute un parcours à l'utilisateur connecté
     *
     * @param Request $request
     * @return App\Parcours
     */
    public function add(Request $request)
    {
      $user = Auth::user();

      $savedButNotSelected = [];
      $selectedToAdd = [];
      $niveauxSaved = [];

      // si l'utilisateur à bien sélectionné une ou plusieurs formations
      if (is_array($request->array)) {

        $formationsSelected = array_unique($request->array);

        foreach ($formationsSelected as $key => $value) {
          if ($value == null) {
            unset($formationsSelected[$key]);
          }
        }

        $parcours = $user->parcours->where('metier_id', $request->metier_id)->first();

        if ($parcours) {
          // on sélectionne les formations déjà enregistrées
          $formationsInParcours = $parcours->formations;
          $formationsInParcoursId = $formationsInParcours->pluck('id')->toArray();

          // on parcourt les formations enregistrées
          foreach ($formationsInParcours as $formationInParcours) {

            if (!in_array($formationInParcours->id, $formationsSelected)) {
              /*
                on stocke dans un tableau les id des formations qui ont été
                enregistrées précédemnent mais qui ne sont plus dans les formations
                sélectionnées, ce qui veut dire qu'elles ont été déselectionnées
              */
              $savedButNotSelected[] = $formationInParcours->id;
            }

            // on stocke les niveaux qui sont en base
            $niveauxSaved[] = $formationInParcours->pivot->niveau;

          }
          // Fin foreach ($formationsInParcours as $formationInParcours)

          // on parcourt les formations sélectionnées
          foreach ($formationsSelected as $sousNiveau => $id) {

            // on récupère le niveau en retirant le dernier chiffre du sous-niveau
            $niveau = substr($sousNiveau, 0, -1);

            // si le niveau de la formation sélectionnée est déjà dans la base
            if (in_array($niveau, $niveauxSaved)) {
              foreach ($formationsInParcours as $formationInParcours) {

                if ($id != $formationInParcours->id && $niveau == $formationInParcours->pivot->niveau) {
                  // on met à jour l'id de la formation en fonction du niveau
                  $parcours->formations()->updateExistingPivot($formationInParcours->id, ['formation_id' => $id, 'sous_niveau' => $sousNiveau]);
                }

              }
            }

            // sinon, aucune formation de ce niveau n'est enregistrée en base
            else {
              // on 'attache' la formation
              $parcours->formations()->attach($id, ['niveau' => $niveau + 1, 'sous_niveau' => $sousNiveau]);
            }

          }
          // Fin foreach ($formationsSelected as $sousNiveau => $id)

          // on 'détache' les formations non sélectionnées
          $parcours->formations()->detach($savedButNotSelected);

        }
        // Fin if($parcours)

        else {
          // on crée un nouveau parcours
          $parcours = new Parcours;
          $parcours->metier_id = $request->metier_id;
          $parcours->user_id = $user->id;
          $parcours->save();

          // on "attache" les formations sélectionnées au parcours
          foreach ($formationsSelected as $sousNiveau => $id) {
            $niveau = substr($sousNiveau, 0, -1);

            $parcours->formations()->attach($id, ['niveau' => $niveau + 1, 'sous_niveau' => $sousNiveau]);
          }
        }

      }
      // fin if (is_array($request->array))

      // sinon, aucunes formations n'a été sélectionnées
      else {
        $parcours = $user->parcours->where('metier_id', $request->metier_id)->first();

        if ($parcours) {
          // on supprime le parcours
          $parcours->delete();
        }
      }


      return $parcours;
    }





    /**
     * Supprime un parcours
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function delete($id)
    {
        $parcours = Parcours::find($id);

        $parcours->delete();

        return redirect()->route('user_index');
    }
}
