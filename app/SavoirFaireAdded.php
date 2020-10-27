<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SavoirFaireAdded extends Model
{

    /**
     * Comme le nom de la table ne correspond pas au nom du model,
     * on indique le nom exacte de la table dans la variable $table
     */
    protected $table = 'savoir_faire_added';
    protected $guarded = ["id"];


    /**
     * Permet de récupérer tous les employés liés au savoir-faire ajouté
     * par la société
     */
    public function employes()
    {
        return $this->morphToMany('App\Employe', 'savoir_faire', 'employe_savoir_faire')
        ->withPivot('savoir_faire_type', 'type', 'niveau');
    }


    /**
     * Permet de récupérer tous les postes liés au savoir-être ajouté
     * par la société
     */
    public function postes()
    {
        return $this->morphToMany('App\Poste', 'savoir_faire', 'poste_savoir_faire')
        ->withPivot('savoir_faire_type', 'type', 'valide');
    }


    /**
     * Permet de récupérer toutes les sociétés liés qui ont ajouté le
     * savoir-faire à un de leur poste ou qui est acquis par un de leurs employés
     */
    public function societe()
    {
        return $this->morphToMany('App\Societe', 'competence', 'competence_societe')
        ->withPivot('competence_type', 'statut');
    }
}
