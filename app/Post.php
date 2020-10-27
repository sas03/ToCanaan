<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    /**
     * Comme le nom de la table ne correspond pas au nom du model,
     * on indique le nom exacte de la table dans la variable $table
     */
    protected $table = 'user_posts';
    protected $guarded = ["id"];


    /**
     * Permet de récupérer l'utilisateur qui a posté le post
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }


    /**
     * Permet de récupérer les commentaires postés sur le post
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }


    /**
     * Permet de récupérer les likes du post
     */
    public function likes()
    {
        return $this->belongsToMany('App\User', 'user_posts_like', 'post_id', 'user_id');
    }

}
