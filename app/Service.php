<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $guarded = ["id"];


    /**
     * Permet de récupérer la société liée au service
     */
    public function societe()
    {
      return $this->belongsTo('App\Societe');
    }


    /**
     * Permet de récupérer le secteur du service
     */
    public function secteur()
    {
      return $this->belongsTo('App\Secteur');
    }


    /**
     * Permet de récupérer tous les postes qui font partis du service
     */
    public function postes()
    {
      return $this->hasMany('App\Poste');
    }


    /**
     * Permet de récupérer tous les employés qui font partis du service
     */
    public function employes()
    {
      return $this->hasMany('App\Employe');
    }
}
