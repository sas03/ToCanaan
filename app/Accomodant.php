<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accomodant extends Model
{
  protected $guarded = ["id"];
  /**
   * Permet de récupérer tous les éléments de personnalite de l'utilisateur
   */
  public function user()
  {
      return $this->belongsToMany('App\User','personnalite_user','accomodant_id','user_id');
  }
}
