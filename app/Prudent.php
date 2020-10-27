<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prudent extends Model
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
  public function conservateur()
  {
      return $this->belongsTo('App\Conservateur');
  }

  /**
   * Permet de récupérer tous les éléments de personnalite de l'utilisateur
   */
  public function satisfait()
  {
      return $this->belongsTo('App\Satisfait');
  }
}
