<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * Comme le nom de la table ne correspond pas au nom du model,
     * on indique le nom exacte de la table dans la variable $table
     */
    protected $table = 'user_post_comments';

    protected $guarded = ["id"];


    /**
     * Permet de récupérer l'utilisateur qui a écrit le commentaire
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }





    /**
     * Permet de récupérer le post sur lequel le commentaire a été posté
     */
    public function post()
    {
        return $this->belongsTo('App\Post');
    }

}
