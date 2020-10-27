<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conventionnel extends Model
{
  protected $guarded = ["id"];
  /**
   * Permet de récupérer tous les éléments de personnalite de l'utilisateur
   */
  public function innovations()
  {
      return $this->hasOne('App\Innovation');
  }
  /**
   * Permet de récupérer tous les éléments de personnalite de l'utilisateur
   */
  public function previsible()
  {
      return $this->belongsTo('App\Previsible');
  }

  /**
   * Permet de récupérer tous les éléments de personnalite de l'utilisateur
   */
  public function traditionnel()
  {
      return $this->belongsTo('App\Traditionnel');
  }
}
