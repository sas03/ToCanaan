<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SavoirFaire extends Model
{

    /**
     * Comme le nom de la table ne correspond pas au nom du model,
     * on indique le nom exacte de la table dans la variable $table
     */
    protected $table = 'savoir_faire';
    protected $guarded = ["id"];

    /**
     * Permet de récupérer tous les codes ROME liés au savoir-faire
     */
    public function codes()
    {
        return $this->belongsToMany('App\Code', 'code_savoir_faire', 'savoir_faire_id', 'code_id')
        ->withPivot('type');
    }

    public function employes()
    {
        return $this->morphToMany('App\Employe', 'savoir_faire', 'employe_savoir_faire')
        ->withPivot('savoir_faire_type', 'type', 'niveau');
    }

    public function postes()
    {
        return $this->morphToMany('App\Poste', 'savoir_faire', 'poste_savoir_faire')
        ->withPivot('savoir_faire_type', 'type', 'valide');
    }

    public function societe()
    {
        return $this->morphToMany('App\Societe', 'competence', 'competence_societe')
        ->withPivot('competence_type', 'statut');
    }
}
