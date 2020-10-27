<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motivation extends Model
{
    protected $guarded = ["id"];


    /**
     * Permet de récupérer tous les métiers liés à la motivation (= battement de coeur)
     */
    public function metiers()
    {
        return $this->belongsToMany('App\Metier');
    }
}
