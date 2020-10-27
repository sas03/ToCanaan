<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etablissement extends Model
{
    protected $guarded = ["id"];

    /**
     * Permet de récupérer toutes les formations liées à un établissement
     */
    public function formations()
    {
        return $this->belongsToMany('App\Formation');
    }
}
