<?php

namespace App;

//Class which implements Illuminate\Contracts\Auth\Authenticatable
use Illuminate\Foundation\Auth\User as Authenticatable;

//Trait for sending notifications in laravel
use Illuminate\Notifications\Notifiable;

//Notification for Societe
use App\Notifications\SocieteResetPasswordNotification;

class Societe extends Authenticatable
{

  // This trait has notify() method defined
  use Notifiable;

  //Mass assignable attributes
  protected $fillable = [
      'nom', 'telephone', 'email', 'adresse', 'code_postal', 'ville', 'nbr_employes', 'secteur_id', 'password',
  ];

  //hidden attributes
   protected $hidden = [
       'password', 'remember_token',
   ];

   //Send password reset notification
   public function sendPasswordResetNotification($token)
   {
       $this->notify(new SocieteResetPasswordNotification($token));
   }


   /**
    * Permet de récupérer tous les employés de la société
    */
   public function employes()
   {
     return $this->hasMany('App\Employe');
   }


   /**
    * Permet de récupérer tous les postes de la société
    */
   public function postes()
   {
     return $this->hasMany('App\Poste');
   }


   /**
    * Permet de récupérer tous les services de la société
    */
   public function services()
   {
     return $this->hasMany('App\Service');
   }


   /******************************** SAVOIRS ********************************/

   /**
    * Permet de récupérer tous les savoirs (existants dans la bdd) liés à
    * la société
    */
   public function savoirsDefault()
   {
     return $this->morphedByMany('App\Savoir', 'competence', 'competence_societe')
     ->withPivot('competence_type', 'statut');
   }


   /**
    * Permet de récupérer tous les savoirs (ajoutés à un poste) liés à
    * la société
    */
   public function savoirsAdded()
   {
     return $this->morphedByMany('App\SavoirAdded', 'competence', 'competence_societe')
     ->withPivot('competence_type', 'statut');
   }


   /**
    * Permet de récupérer tous les savoirs (savoirsDefault + savoirsAdded)
    * liés à la société
    */
   public function getSavoirs()
   {
     $savoirsDefault = $this->savoirsDefault()->get();
     $savoirsAdded = $this->savoirsAdded()->get();

     $savoirs = $savoirsDefault->concat($savoirsAdded);

     return $savoirs;
   }


   /**
    * Permet de récupérer tous les savoirs 'par défaut' par le statut
    */
   public function savoirsDefaultByStatut($statut)
   {
     return $this->morphedByMany('App\Savoir', 'competence', 'competence_societe')
     ->wherePivot('statut', $statut)
     ->withPivot('competence_type', 'statut');
   }


   /**
    * Permet de récupérer tous les savoirs 'ajoutés' par le statut
    */
   public function savoirsAddedByStatut($statut)
   {
     return $this->morphedByMany('App\SavoirAdded', 'competence', 'competence_societe')
     ->wherePivot('statut', $statut)
     ->withPivot('competence_type', 'statut');
   }



   /****************************** SAVOIR-FAIRE ******************************/

   /**
    * Permet de récupérer tous les savoir-faire (existants dans la bdd) liés à
    * la société
    */
   public function savoirFaireDefault()
   {
     return $this->morphedByMany('App\SavoirFaire', 'competence', 'competence_societe')
     ->withPivot('competence_type', 'statut');
   }


   /**
    * Permet de récupérer tous les savoir-faire (ajoutés à un poste) liés à
    * la société
    */
   public function savoirFaireAdded()
   {
     return $this->morphedByMany('App\SavoirFaireAdded', 'competence', 'competence_societe')
     ->withPivot('competence_type', 'statut');
   }


   /**
    * Permet de récupérer tous les savoir-faire
    * (savoirFaireDefault + savoirFaireAdded) liés à la société
    */
   public function getSavoirFaire()
   {
     $savoirFaireDefault = $this->savoirFaireDefault()->get();
     $savoirFaireAdded = $this->savoirFaireAdded()->get();

     $savoirFaire = $savoirFaireDefault->concat($savoirFaireAdded);

     return $savoirFaire;
   }


   /**
    * Permet de récupérer tous les savoir-faire 'par défaut' par le statut
    */
   public function savoirFaireDefaultByStatut($statut)
   {
     return $this->morphedByMany('App\SavoirFaire', 'competence', 'competence_societe')
     ->wherePivot('statut', $statut)
     ->withPivot('competence_type', 'statut');
   }


   /**
    * Permet de récupérer tous les savoir-faire 'ajoutés' par le statut
    */
   public function savoirFaireAddedByStatut($statut)
   {
     return $this->morphedByMany('App\SavoirFaireAdded', 'competence', 'competence_societe')
     ->wherePivot('statut', $statut)
     ->withPivot('competence_type', 'statut');
   }





/******************************** SAVOIR-ETRE ********************************/

   /**
    * Permet de récupérer tous les savoir-être (existants dans la bdd) liés à
    * la société
    */
   public function savoirEtreDefault()
   {
     return $this->morphedByMany('App\SavoirEtre', 'competence', 'competence_societe')
     ->withPivot('competence_type', 'statut');
   }


   /**
    * Permet de récupérer tous les savoir-être (ajoutés à un poste) liés à
    * la société
    */
   public function savoirEtreAdded()
   {
     return $this->morphedByMany('App\SavoirEtreAdded', 'competence', 'competence_societe')
     ->withPivot('competence_type', 'statut');
   }


   /**
    * Permet de récupérer tous les savoir-être
    * (savoirEtreDefault + savoirEtreAdded) liés à la société
    */
   public function getSavoirEtre()
   {
     $savoirEtreDefault = $this->savoirEtreDefault()->get();
     $savoirEtreAdded = $this->savoirEtreAdded()->get();

     $savoirEtre = $savoirEtreDefault->concat($savoirEtreAdded);

     return $savoirEtre;
   }


   /**
    * Permet de récupérer tous les savoir-être 'par défaut' par le statut
    */
   public function savoirEtreDefaultByStatut($statut)
   {
     return $this->morphedByMany('App\SavoirEtre', 'competence', 'competence_societe')
     ->wherePivot('statut', $statut)
     ->withPivot('competence_type', 'statut');
   }


   /**
    * Permet de récupérer tous les savoir-être 'ajoutés' par le statut
    */
   public function savoirEtreAddedByStatut($statut)
   {
     return $this->morphedByMany('App\SavoirEtreAdded', 'competence', 'competence_societe')
     ->wherePivot('statut', $statut)
     ->withPivot('competence_type', 'statut');
   }





/*************************** TOUTES LES COMPETENCES ***************************/

   /**
    * Permet de récupérer toutes les compétences (= savoirs + savoir-être + savoir-faire)
    * de la société
    * (+ possibilité de les choisir par statut)
    */
   public function getCompetences($statut)
   {
     $savoirsDefault = $this->savoirsDefaultByStatut($statut)->get();
     $savoirsAdded = $this->savoirsAddedByStatut($statut)->get();

     $savoirFaireDefault = $this->savoirFaireDefaultByStatut($statut)->get();
     $savoirFaireAdded = $this->savoirFaireAddedByStatut($statut)->get();

     $savoirEtreDefault = $this->savoirEtreDefaultByStatut($statut)->get();
     $savoirEtreAdded = $this->savoirEtreAddedByStatut($statut)->get();


     $competences = $savoirsDefault
     ->concat($savoirsAdded)
     ->concat($savoirFaireDefault)
     ->concat($savoirFaireAdded)
     ->concat($savoirEtreDefault)
     ->concat($savoirEtreAdded);

     return $competences;
   }


   /**
    * Permet de récupérer une compétence grâce à son ID
    *
    * @param int $id
    */
   public function getCompetenceById($id)
   {
     $savoirsDefault = $this->savoirsDefault()->where('competence_id', $id)->first();
     $savoirsAdded = $this->savoirsAdded()->where('competence_id', $id)->first();

     $savoirFaireDefault = $this->savoirFaireDefault()->where('competence_id', $id)->first();
     $savoirFaireAdded = $this->savoirFaireAdded()->where('competence_id', $id)->first();

     $savoirEtreDefault = $this->savoirEtreDefault()->where('competence_id', $id)->first();
     $savoirEtreAdded = $this->savoirEtreAdded()->where('competence_id', $id)->first();

     if ($savoirsDefault) {
        return $savoirsDefault;
     }
     elseif ($savoirsAdded) {
        return $savoirsAdded;
     }
     elseif ($savoirFaireDefault) {
        return $savoirFaireDefault;
     }
     elseif ($savoirFaireAdded) {
        return $savoirFaireAdded;
     }
     elseif ($savoirEtreDefault) {
        return $savoirEtreDefault;
     }
     elseif ($savoirEtreDefault) {
        return $savoirEtreDefault;
     }
     else {
       return [];
     }
   }

}
