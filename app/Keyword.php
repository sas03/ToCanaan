<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    protected $guarded = ["id"];


    /**
     * Permet de récupérer tous les utilisateurs liés à ce mot-clé
     * (avec les champs 'keyword_id' et 'type' de la table pivot)
     */
    public function users()
    {
      return $this->belongsToMany('App\User')
      ->withPivot('keyword_id', 'type');
    }


    /**
     * Permet de récupérer tous les métiers liés à ce mot-clé
     */
    public function metiers()
    {
      return $this->belongsToMany('App\Metier');
    }


    /**
     * Permet de récupérer toutes les formations liées à ce mot-clé
     */
    public function formations()
    {
      return $this->belongsToMany('App\Formation');
    }
}
