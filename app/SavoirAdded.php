<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SavoirAdded extends Model
{

    /**
     * Comme le nom de la table ne correspond pas au nom du model,
     * on indique le nom exacte de la table dans la variable $table
     */
    protected $table = 'savoirs_added';
    protected $guarded = ["id"];


    /**
     * Permet de récupérer tous les employés liés au savoir ajouté
     * par la société
     */
    public function employes()
    {
        return $this->morphToMany('App\Employe', 'savoir', 'employe_savoir')
        ->withPivot('savoir_type', 'type', 'niveau');
    }


    /**
     * Permet de récupérer tous les postes liés au savoir ajouté
     * par la société
     */
    public function postes()
    {
        return $this->morphToMany('App\Poste', 'savoir', 'poste_savoir')
        ->withPivot('savoir_type', 'type', 'valide');
    }


    /**
     * Permet de récupérer toutes les sociétés liés qui ont ajouté le
     * savoir à un de leur poste ou qui est acquis par un de leurs employés
     */
    public function societe()
    {
        return $this->morphToMany('App\Societe', 'competence', 'competence_societe')
        ->withPivot('competence_type', 'statut');
    }
}
