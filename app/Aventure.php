<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aventure extends Model
{
  protected $guarded = ["id"];
  /**
   * Permet de récupérer tous les éléments de personnalite de l'utilisateur
   */
  public function user()
  {
      return $this->belongsToMany('App\User','personnalite_user','aventure_id','user_id');
  }

  public function aventureux()
  {
      return $this->belongsTo('App\Aventureux');
  }

  public function prudent()
  {
      return $this->belongsTo('App\Prudent');
  }
}
