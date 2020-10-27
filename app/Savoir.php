<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Savoir extends Model
{
    protected $guarded = ["id"];


    /**
     * Permet de récupérer tous les codes ROME liés au savoir
     */
    public function codes()
    {
        return $this->belongsToMany('App\Code')
        ->withPivot('type');
    }


    /**
     * Permet de récupérer tous les employés liés au savoir
     */
    public function employes()
    {
        return $this->morphToMany('App\Employe', 'savoir', 'employe_savoir')
        ->withPivot('savoir_type', 'type', 'niveau');
    }


    /**
     * Permet de récupérer tous les postes liés au savoir
     */
    public function postes()
    {
        return $this->morphToMany('App\Poste', 'savoir', 'poste_savoir')
        ->withPivot('savoir_type', 'type', 'valide');
    }


    /**
     * Permet de récupérer toutes les sociétés liées au savoir
     */
    public function societe()
    {
        return $this->morphToMany('App\Societe', 'competence', 'competence_societe')
        ->withPivot('competence_type', 'statut');
    }
}
