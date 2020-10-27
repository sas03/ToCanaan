<?php
namespace App;

use Illuminate\Notifications\Notifiable;
use App\Events\FollowAddedEvent;
use Illuminate\Foundation\Auth\User as Authenticatable;
use GetStream\StreamLaravel\Eloquent\ActivityTrait;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom', 'prenom', 'email', 'ville', 'code_postal', 'password', 'date_de_naissance', 'telephone', 'niveau_etudes', 'metier',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = [
        'date_de_naissance'
    ];


    /**
     * Permet de récupérer les parcours de l'utilisateur
     */
    public function parcours()
    {
        return $this->hasMany('App\Parcours');
    }


    /**
     * Permet de récupérer le profil "employé" de l'utilisateur si une société
     * l'a ajoutée dans la liste de ses employés
     */
    public function employe()
    {
        return $this->hasOne('App\Employe');
    }


    /**
     * Permet de récupérer tous les éléments du CV de l'utilisateur
     */
    public function resume()
    {
        return $this->hasMany('App\Resume');
    }

    /**
     * Permet de récupérer tous les éléments du Rapporthtml de l'utilisateur
     */
    public function rapportshtmls()
    {
        return $this->hasMany('App\Rapportshtmls');
    }

    /**
     * Permet de récupérer tous les éléments de personnalite de l'utilisateur
     */
    public function aventures()
    {
        return $this->belongsToMany('App\Aventure','personnalite_user','user_id','aventure_id');
    }

    /*
    public function aventureux()
    {
        return $this->belongsToMany('App\Aventureux','personnalite_user','user_id','aventureux_id');
    }

    /*
    public function prudent()
    {
        return $this->belongsToMany('App\Prudent','personnalite_user','user_id','prudent_id');
    }*/

    /**
     * Permet de récupérer tous les savoirs/savoir-faire de l'utilisateur
     */
    public function savoirs()
    {
        return $this->belongsToMany('App\Keyword', 'savoir_user', 'user_id', 'savoir_id')
        ->withPivot('savoir_id');
    }


    /**
     * Permet de récupérer tous les savoir-être de l'utilisateur
     */
    public function savoirEtre()
    {
        return $this->belongsToMany('App\Keyword', 'savoir_etre_user', 'user_id', 'savoir_etre_id')
        ->withPivot('savoir_etre_id');
    }


    /**
     * Permet de récupérer toutes les motivations de l'utilisateur
     */
    public function motivations()
    {
        return $this->belongsToMany('App\Keyword', 'motivation_user', 'user_id', 'motivation_id')
        ->withPivot('motivation_id');
    }


    /**
     * Permet de récupérer les options de visibilités
     */
    public function visibilite()
    {
        return $this->hasOne('App\Visibilite');
    }



    /**
     * Permet de récupérer le statut de la visibilité d'un élément en particulier
     */
    public function getVisibiliteOf($column = '')
    {
        return $this->visibilite()->select($column)->first();
    }


    /**
     * Permet de savoir si un élément est visible ou non
     */
    public function isVisible($column = '')
    {
        $query = $this->visibilite()->select($column)->where($column, '!=', 'prive')->first();

        if ($query) {
          return true;
        }
        else {
          return false;
        }
    }


/******************************* RESEAU SOCIAL *******************************/

    /**
     * Permet de récupérer les utilisateurs que l'utilisateur connecté suit
     */
    public function following()
    {
      return $this->belongsToMany('App\User', 'user_follow', 'user_id', 'follow_id')
      ->withPivot('groupe');
    }


    /**
     * Permet de récupérer les utilisateurs qui suivent l'utilisateur connecté
     */
    public function followers()
    {
      return $this->belongsToMany('App\User', 'user_follow', 'follow_id', 'user_id')
      ->withPivot('groupe');
    }


    /**
     * Permet de récupérer tous les posts de l'utilisateur
     */
    public function posts()
    {
      return $this->hasMany('App\Post');
    }


    /**
     * Permet de récupérer tous les posts de l'utilisateur avec la pagination
     */
    public function postsWithPaginate()
    {
      return $this->hasMany('App\Post')
      ->orderBy('created_at', 'desc')
      ->paginate(5);
    }


    /**
     * Permet de récupérer tous les likes ajoutés sur les posts de l'utilisateur
     */
    public function likes()
    {
        return $this->belongsToMany('App\Post', 'user_posts_like', 'user_id', 'post_id')
        ->withPivot('post_id');
    }


    /**
     * Permet de récupérer tous les likes ajoutés sur les posts de l'utilisateur
     * avec la pagination
     */
    public function likesWithPaginate()
    {
        return $this->belongsToMany('App\Post', 'user_posts_like', 'user_id', 'post_id')
        ->withPivot('post_id')
        ->orderBy('created_at', 'desc')
        ->paginate(5);
    }


    /**
     * Permet de savoir si l'utilisateur a aimé un post
     *
     * @param int $post_id
     * @return boolean
     */
    public function like($post_id)
    {
      $like = $this->likes()->where('post_id', $post_id)->get();

      if (count($like) == 1) {
        return true;
      }
      else {
        return false;
      }
    }


    /**
     * Permet de récupérer tous les messages reçus par l'utilisateur
     */
    public function messagesReceived()
    {
        return $this->belongsToMany('App\User', 'user_messages', 'receiver_id', 'sender_id')
        ->withPivot('receiver_id', 'sender_id', 'message')
        ->withTimestamps();
    }


    /**
     * Permet de récupérer tous les messages envoyés par l'utilisateur
     */
    public function messagesSent()
    {
        return $this->belongsToMany('App\User', 'user_messages', 'sender_id', 'receiver_id')
        ->withPivot('receiver_id', 'sender_id', 'message')
        ->withTimestamps();
    }


    /**
     * Permet de récupérer tous les messages d'une conversation avec un autre
     * utilisateur
     */
    public function getMessages($user_id)
    {
      if ($user_id != $this->id) {
        $messagesReceivedFrom = $this->messagesReceived()->where('receiver_id', $this->id)->where('sender_id', $user_id)->get();
        $messagesSentTo = $this->messagesSent()->where('receiver_id', $user_id)->where('sender_id', $this->id)->get();

        return $messagesReceivedFrom->concat($messagesSentTo);
      }

      return false;
    }

    public function careerdirectparam(){
      return $this->hasOne('App\Careerdirectparam');
    }

}
