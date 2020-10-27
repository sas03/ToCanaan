<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appellation extends Model
{
    protected $guarded = ["id"];


    /**
     * Permet de récupérer toutes les codes ROME liés à une appellation
     */
    public function code()
    {
      return $this->belongsTo('App\Code');
    }
}
