<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Formation;
use App\Metier;

class Formation extends Model
{
    protected $guarded = ["id"];


    /**
     * Permet de récupérer tous les établissements liés à une formation
     */
    public function etablissements()
    {
        return $this->belongsToMany('App\Etablissement');
    }





    /**
     * Permet de récupérer tous les établissements liés à une formation
     */
    public function countEtablissements()
    {
        return $this->etablissements->count();
    }





    /**
     * Permet de récupérer tous les établissements liés à une formation
     *
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public function etablissementsFilter($statut = null, $departements = null)
    {
        // si l'utilisateur n'a pas encore utilisé les filtres
        if ($statut == null && $departements == null) {

          // on retourne tous les établissements liés à la formation
          return $etablissements = $this->belongsToMany('App\Etablissement')
          ->paginate(5);

        }

        else {
          // si l'utilisateur filtre par "statut"
          if ($statut != null) {

            if ($statut != 'public' && $statut != 'privé') {
              $queryStatut = 'statut NOT LIKE "%public%" AND statut NOT LIKE "%privé%"';
            }
            else {
              $queryStatut = 'statut LIKE "%'.$statut.'%"';
            }

          }

          // si l'utilisateur filtre par "localisation"
          if ($departements != null) {
            foreach ($departements as $departement) {
              $arrayDepartements[] = 'departement_num = ' . $departement;
            }
            $queryDepartement = implode(" OR ", $arrayDepartements);
          }

          // si l'utilisateur filtre par "statut" ET par "localisation"
          if ($statut != null && $departements != null) {

            // on concatène les deux requêtes
            $query = $queryStatut . ' AND (' . $queryDepartement . ')';

          }
          else {
            if ($statut != null) {
              $query = $queryStatut;
            }
            if ($departements != null) {
              $query = '(' . $queryDepartement . ')';
            }
          }

          return $this->belongsToMany('App\Etablissement')
          ->whereRaw($query)
          ->paginate(5);
        }
    }





    /**
     * Permet de récupérer tous les établissements liés à une formation
     */
    public function codes()
    {
      return $this->belongsToMany('App\Code');
    }





    /**
     * Permet de récupérer toutes les formations liées aux codes ROME de la
     * formation
     */
    public function formationsCodes()
    {
      $codes = $this->codes;

      $ids = [];
      foreach ($codes as $code) {
        $ids[] = $code->formations->pluck('id')->toArray();
      }

      $formations_ids = [];
      foreach ($ids as $key => $value) {
        foreach ($value as $id) {
          $formations_ids[] = $id;
        }
      }
      $formations_ids = array_unique($formations_ids);
      $formations = Formation::find($formations_ids);


      return $formations;
    }





    /**
     * Permet de récupérer tous les métiers liées aux codes ROME de la
     * formation
     */
    public function metiersCodes()
    {
      $codes = $this->codes;

      $ids = [];
      foreach ($codes as $code) {
        $ids[] = $code->metiers->pluck('id')->toArray();
      }

      $metiers_ids = [];
      foreach ($ids as $key => $value) {
        foreach ($value as $id) {
          $metiers_ids[] = $id;
        }
      }
      $metiers_ids = array_unique($metiers_ids);
      $metiers = Metier::find($metiers_ids);


      return $metiers;
    }

}
