<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imaginatif extends Model
{
  protected $guarded = ["id"];
  /**
   * Permet de récupérer tous les éléments de personnalite de l'utilisateur
   */
  public function innovateur()
  {
      return $this->hasOne('App\Innovateur');
  }
}
