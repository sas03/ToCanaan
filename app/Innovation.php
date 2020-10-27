<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Innovation extends Model
{
  protected $guarded = ["id"];
  /**
   * Permet de récupérer tous les éléments de personnalite de l'utilisateur
   */
  public function user()
  {
      return $this->belongsToMany('App\User','personnalite_user','innovation_id','user_id');
  }

  public function innovateur()
  {
      return $this->belongsTo('App\Innovateur');
  }

  public function conventionnel()
  {
      return $this->belongsTo('App\Conventionnel');
  }
}
