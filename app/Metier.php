<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Metier extends Model
{
    protected $guarded = ["id"];


    /**
     * Permet de récupérer le secteur du métier
     */
    public function secteur()
    {
      return $this->belongsTo('App\Secteur');
    }


    /**
     * Permet de récupérer le code ROME du métier
     */
    public function code()
    {
      return $this->belongsTo('App\Code');
    }


    /**
     * Permet de récupérer tous les savoir-être liés métier
     */
    public function savoirEtre()
    {
        return $this->belongsToMany('App\SavoirEtre', 'metier_savoir_etre', 'metier_id', 'savoir_etre_id');
    }


    /**
     * Permet de récupérer toutes les motivations liées métier
     */
    public function motivations()
    {
        return $this->belongsToMany('App\Motivation');
    }
}
