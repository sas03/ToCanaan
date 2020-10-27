<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use App\Events\FollowAddedEvent;
use Illuminate\Database\Eloquent\Model;
use GetStream\StreamLaravel\Eloquent\ActivityTrait;

class Follow extends Model
{
    /**
     * Active les notifications
     */
    use Notifiable;

    /**
     * Comme le nom de la table ne correspond pas au nom du model,
     * on indique le nom exacte de la table dans la variable $table
     */
    protected $table = 'user_follow';
    protected $guarded = ["id"];





    /**
     * Permet de récupérer l'utilisateur
     */
    public function user()
    {
      return $this->belongsTo('App\User', 'user_id', 'id');
    }





    /**
     * Permet de récupérer l'utilisateur qui est suivi
     */
    public function target()
    {
      return $this->belongsTo('App\User', 'follow_id', 'id');
    }





    /**
     * Permet de récupérer tous les utilisateurs suivi par un utilisateur
     */
    public function followOf($user_id)
    {
      return $this->where('user_id', $user_id)->get();
    }
}
