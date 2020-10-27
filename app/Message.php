<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    /**
     * Comme le nom de la table ne correspond pas au nom du model,
     * on indique le nom exacte de la table dans la variable $table
     */
    protected $table = 'user_messages';
    protected $guarded = ["id"];


    /**
     * Permet de récupérer tous les messages privés d'une conversation entre
     * 2 utilisateurs
     */
    public function getMessages($authId = null, $targetId = null)
    {
      if ($authId != $targetId) {
        $messagesSentTo = $this->where('receiver_id', $targetId)->where('sender_id', $authId)->get();
        $messagesReceivedFrom = $this->where('receiver_id', $authId)->where('sender_id', $targetId)->get();

        return $messagesSentTo->concat($messagesReceivedFrom);
      }

      return false;
    }


    /**
     * Permet de récupérer tous les messages de l'expéditeur
     */
    public function sender()
    {
      return $this->belongsTo('App\User', 'sender_id', 'id');
    }


    /**
     * Permet de récupérer tous les messages du destinataire
     */
    public function receiver()
    {
      return $this->belongsTo('App\User', 'receiver_id', 'id');
    }
}
