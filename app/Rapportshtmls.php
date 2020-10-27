<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rapportshtmls extends Model
{
    //protected $guarded = ["id"];


    /**
     * Permet de récupérer tous les métiers liés à la motivation (= battement de coeur)
     */
    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
