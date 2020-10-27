<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parcours extends Model
{
    protected $guarded = ["id"];


    /**
     * Permet de récupérer l'utilisateur lié au parcours
     */
    public function user()
    {
      return $this->belongsTo('App\User');
    }


    /**
     * Permet de récupérer le métier lié au parcours
     */
    public function metier()
    {
      return $this->belongsTo('App\Metier');
    }


    /**
     * Permet de récupérer les formations liées au parcours
     */
    public function formations()
    {
      return $this->belongsToMany('App\Formation', 'formation_parcours', 'parcours_id', 'formation_id')
      ->withPivot('formation_id', 'niveau', 'sous_niveau');
    }


    /**
     * Permet de récupérer les id des formations liées au parcours
     */
    public function selectFormationsId()
    {
      $formations = $this->formations()->get();
      $id = $formations->pluck('id')->toArray();
      return $id;
    }


    /**
     * Permet de récupérer les "sous-niveaux" des formations liées au parcours
     * (= les types de formations : btdDut, licence, master,...)
     */
    public function selectFormationsSousNiveaux()
    {
      $formations = $this->formations()->select('sous_niveau')->get();
      $sous_niveaux = $formations->pluck('sous_niveau')->toArray();
      return $sous_niveaux;
    }
}
