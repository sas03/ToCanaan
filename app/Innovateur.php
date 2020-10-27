<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Innovateur extends Model
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
  public function imaginatif()
  {
      return $this->belongsTo('App\Imaginatif');
  }

  /**
   * Permet de récupérer tous les éléments de personnalite de l'utilisateur
   */
  public function vif()
  {
      return $this->belongsTo('App\Vif');
  }
}
