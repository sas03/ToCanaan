<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Audacieux extends Model
{
  protected $guarded = ["id"];
  /**
   * Permet de récupérer tous les éléments de personnalite de l'utilisateur
   */
  public function aventureux()
  {
      return $this->hasOne('App\Aventureux');
  }
}
