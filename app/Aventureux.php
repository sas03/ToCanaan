<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aventureux extends Model
{
  protected $guarded = ["id"];
  /**
   * Permet de récupérer tous les éléments de personnalite de l'utilisateur
   */
  public function aventures()
  {
      return $this->hasOne('App\Aventure');
  }
  /**
   * Permet de récupérer tous les éléments de personnalite de l'utilisateur
   */
  public function audacieux()
  {
      return $this->belongsTo('App\Audacieux');
  }

  /**
   * Permet de récupérer tous les éléments de personnalite de l'utilisateur
   */
  public function ambitieux()
  {
      return $this->belongsTo('App\Ambitieux');
  }
}
