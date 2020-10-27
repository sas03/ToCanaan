<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Secteur extends Model
{
    protected $guarded = ["id"];

    /**
     * Permet de récupérer tous les métiers liés au secteur
     */
    public function metiers()
    {
      return $this->hasMany('App\Metier');
    }
}
