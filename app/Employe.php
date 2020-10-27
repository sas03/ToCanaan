<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    protected $guarded = ["id"];


    /**
     * Permet de récupérer la société de l'employé
     */
    public function societe()
    {
      return $this->belongsTo('App\Societe');
    }





    /**
     * Permet de récupérer le service de l'employé
     */
    public function service()
    {
      return $this->belongsTo('App\Service');
    }





    /**
     * Permet de récupérer le poste de l'employé
     */
    public function poste()
    {
      return $this->belongsTo('App\Poste');
    }





    /**
     * Permet de récupérer les informations "user" si l'employé est inscrit
     * sur le site
     */
    public function user()
    {
      return $this->belongsTo('App\User');
    }



/********************************** SAVOIRS **********************************/


    /**
     * Permet de récupérer tous les savoirs (existants dans la bdd) de l'employé
     */
    public function savoirsDefault()
    {
      return $this->morphedByMany('App\Savoir', 'savoir', 'employe_savoir')
      ->withPivot('savoir_type', 'type', 'niveau');
    }





    /**
     * Permet de récupérer les savoirs (ajoutés pour le poste par la société)
     * de l'employé
     */
    public function savoirsAdded()
    {
      return $this->morphedByMany('App\SavoirAdded', 'savoir', 'employe_savoir')
      ->withPivot('savoir_type', 'type', 'niveau');
    }





    /**
     * Permet de récupérer l'ensemble des savoirs (savoirsDefault + savoirsAdded)
     * de l'employé
     */
    public function getSavoirs($type = null)
    {
      if ($type != null) {
        $savoirsDefault = $this->savoirsDefault()->where('type', $type)->get();
        $savoirsAdded = $this->savoirsAdded()->where('type', $type)->get();
      }
      else {
        $savoirsDefault = $this->savoirsDefault()->get();
        $savoirsAdded = $this->savoirsAdded()->get();
      }

      $savoirs = $savoirsDefault->concat($savoirsAdded);

      return $savoirs;
    }


    /****************************** SAVOIR-FAIRE ******************************/

    /**
     * Permet de récupérer tous les savoir-faire (existants dans la bdd) de
     * l'employé
     */
    public function savoirFaireDefault()
    {
      return $this->morphedByMany('App\SavoirFaire', 'savoir_faire', 'employe_savoir_faire')
      ->withPivot('savoir_faire_type', 'type', 'niveau');
    }





    /**
     * Permet de récupérer les savoir-faire (ajoutés pour le poste par la société)
     * de l'employé
     */
    public function savoirFaireAdded()
    {
      return $this->morphedByMany('App\SavoirFaireAdded', 'savoir_faire', 'employe_savoir_faire')
      ->withPivot('savoir_faire_type', 'type', 'niveau');
    }





    /**
     * Permet de récupérer l'ensemble des savoir-faire
     * (savoirFaireDefault + savoirFaireAdded) de l'employé
     */
    public function getSavoirFaire($type = null)
    {
      if ($type != null) {
        $savoirFaireDefault = $this->savoirFaireDefault()->where('type', $type)->get();
        $savoirFaireAdded = $this->savoirFaireAdded()->where('type', $type)->get();
      }
      else {
        $savoirFaireDefault = $this->savoirFaireDefault()->get();
        $savoirFaireAdded = $this->savoirFaireAdded()->get();
      }

      $savoirFaire = $savoirFaireDefault->concat($savoirFaireAdded);

      return $savoirFaire;
    }





    /****************************** SAVOIR-ETRE ******************************/

    /**
     * Permet de récupérer tous les savoir-être (existants dans la bdd) de
     * l'employé
     */
    public function savoirEtreDefault()
    {
      return $this->morphedByMany('App\SavoirEtre', 'savoir_etre', 'employe_savoir_etre')
      ->withPivot('savoir_etre_type', 'niveau');
    }





    /**
     * Permet de récupérer les savoir-être (ajoutés pour le poste par la société)
     * de l'employé
     */
    public function savoirEtreAdded()
    {
      return $this->morphedByMany('App\SavoirEtreAdded', 'savoir_etre', 'employe_savoir_etre')
      ->withPivot('savoir_etre_type', 'niveau');
    }





    /**
     * Permet de récupérer l'ensemble des savoir-être
     * (savoirEtreDefault + savoirEtreAdded) de l'employé
     */
    public function getSavoirEtre()
    {
      $savoirEtreDefault = $this->savoirEtreDefault()->get();
      $savoirEtreAdded = $this->savoirEtreAdded()->get();

      $savoirEtre = $savoirEtreDefault->concat($savoirEtreAdded);

      return $savoirEtre;
    }

}
