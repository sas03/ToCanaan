<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SavoirEtre extends Model
{

    /**
     * Comme le nom de la table ne correspond pas au nom du model,
     * on indique le nom exacte de la table dans la variable $table
     */
    protected $table = 'savoir_etre';
    protected $guarded = ["id"];


    /**
     * Permet de récupérer tous les métiers liés au savoir-être
     */
    public function metiers()
    {
        return $this->belongsToMany('App\Metier', 'metier_savoir_etre', 'savoir_etre_id', 'metier_id');
    }


    /**
     * Permet de récupérer tous les employés liés au savoir-être
     */
    public function employes()
    {
        return $this->morphToMany('App\Employe', 'savoir_etre', 'employe_savoir_etre')
        ->withPivot('savoir_etre_type', 'niveau');
    }


    /**
     * Permet de récupérer tous les postes liés au savoir-être
     */
    public function postes()
    {
        return $this->morphToMany('App\Poste', 'savoir_etre', 'poste_savoir_etre')
        ->withPivot('savoir_etre_type', 'valide');
    }


    /**
     * Permet de récupérer toutes les sociétés liées au savoir-être
     */
    public function societe()
    {
        return $this->morphToMany('App\Societe', 'competence', 'competence_societe')
        ->withPivot('competence_type', 'statut');
    }
}
