<?php

namespace App;

//Class which implements Illuminate\Contracts\Auth\Authenticatable
use Illuminate\Foundation\Auth\User as Authenticatable;

//Trait for sending notifications in laravel
use Illuminate\Notifications\Notifiable;

//Notification for Ecole
use App\Notifications\EcoleResetPasswordNotification;

class Ecole extends Authenticatable
{

  // This trait has notify() method defined
  use Notifiable;

  //Mass assignable attributes
  // protected $fillable = [
  //     'nom', 'telephone', 'email', 'adresse', 'code_postal', 'ville', 'nbr_employes', 'secteur_id', 'password',
  // ];

  //hidden attributes
   protected $hidden = [
       'password', 'remember_token',
   ];

   //Send password reset notification
   public function sendPasswordResetNotification($token)
   {
       $this->notify(new EcoleResetPasswordNotification($token));
   }

}
