<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Satisfait extends Model
{
  protected $guarded = ["id"];
  /**
   * Permet de récupérer tous les éléments de personnalite de l'utilisateur
   */
  public function prudent()
  {
      return $this->hasOne('App\Prudent');
  }
}
