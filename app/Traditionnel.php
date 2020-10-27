<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Traditionnel extends Model
{
  protected $guarded = ["id"];
  /**
   * Permet de récupérer tous les éléments de personnalite de l'utilisateur
   */
  public function conventionnel()
  {
      return $this->hasOne('App\Conventionnel');
  }
}
