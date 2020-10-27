<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poste extends Model
{
    protected $guarded = ["id"];


    /**
     * Permet de récupérer le service du poste
     */
    public function service()
    {
        return $this->belongsTo('App\Service');
    }


    /**
     * Permet de récupérer l'employé qui occupe le poste
     */
    public function metier()
    {
        return $this->belongsTo('App\Metier');
    }



    /**
     * Permet de récupérer le libellé du métier de l'employé
     */
    public function getLibelleMetier()
    {
      return $this->metier->nom;
    }


    /**
     * Permet de récupérer le secteur du poste
     */
    public function secteur()
    {
        return $this->belongsTo('App\Secteur');
    }


    /**
     * Permet de récupérer tous les employés qui occupent le poste
     */
    public function employes()
    {
        return $this->hasMany('App\Employe');
    }





/********************************** SAVOIRS **********************************/

    /**
     * Permet de récupérer tous les savoirs (existants dans la bdd) du poste
     */
    public function savoirsDefault()
    {
      return $this->morphedByMany('App\Savoir', 'savoir', 'poste_savoir')
      ->withPivot('savoir_type', 'type', 'valide');
    }



    /**
     * Permet de récupérer les savoirs (ajoutés par la société) du poste
     */
    public function savoirsAdded()
    {
      return $this->morphedByMany('App\SavoirAdded', 'savoir', 'poste_savoir')
      ->withPivot('savoir_type', 'type', 'valide');
    }



    /**
     * Permet de récupérer l'ensemble des savoirs (savoirsDefault + savoirsAdded)
     * du poste
     */
    public function getSavoirs($type = null, $valide = null)
    {
      if ($type != null && $valide != null) {
        $savoirsDefault = $this->savoirsDefault()->where('type', $type)->where('valide', $valide)->get();
        $savoirsAdded = $this->savoirsAdded()->where('type', $type)->where('valide', $valide)->get();
      }
      elseif ($type != null) {
        $savoirsDefault = $this->savoirsDefault()->where('type', $type)->get();
        $savoirsAdded = $this->savoirsAdded()->where('type', $type)->get();
      }
      elseif ($valide != null) {
        $savoirsDefault = $this->savoirsDefault()->where('valide', $valide)->get();
        $savoirsAdded = $this->savoirsAdded()->where('valide', $valide)->get();
      }

      else {
        $savoirsDefault = $this->savoirsDefault()->get();
        $savoirsAdded = $this->savoirsAdded()->get();
      }

      $savoirs = $savoirsDefault->concat($savoirsAdded);

      return $savoirs;
    }




/******************************** SAVOIR-FAIRE ********************************/

    /**
     * Permet de récupérer tous les savoir-faire (existants dans la bdd) du poste
     */
    public function savoirFaireDefault()
    {
      return $this->morphedByMany('App\SavoirFaire', 'savoir_faire', 'poste_savoir_faire')
      ->withPivot('valide', 'savoir_faire_type', 'type');
    }


    /**
     * Permet de récupérer les savoir-faire (ajoutés par la société) du poste
     */
    public function savoirFaireAdded()
    {
      return $this->morphedByMany('App\SavoirFaireAdded', 'savoir_faire', 'poste_savoir_faire')
      ->withPivot('valide', 'savoir_faire_type', 'type');
    }


    /**
     * Permet de récupérer l'ensemble des savoir-faire
     * (savoirFaireDefault + savoirFaireAdded) du poste
     */
    public function getSavoirFaire($type = null, $valide = null)
    {
      if ($type != null && $valide != null) {
        $savoirFaireDefault = $this->savoirFaireDefault()->where('type', $type)->where('valide', $valide)->get();
        $savoirFaireAdded = $this->savoirFaireAdded()->where('type', $type)->where('valide', $valide)->get();
      }
      elseif ($type != null) {
        $savoirFaireDefault = $this->savoirFaireDefault()->where('type', $type)->get();
        $savoirFaireAdded = $this->savoirFaireAdded()->where('type', $type)->get();
      }
      elseif ($valide != null) {
        $savoirFaireDefault = $this->savoirFaireDefault()->where('valide', $valide)->get();
        $savoirFaireAdded = $this->savoirFaireAdded()->where('valide', $valide)->get();
      }
      else {
        $savoirFaireDefault = $this->savoirFaireDefault()->get();
        $savoirFaireAdded = $this->savoirFaireAdded()->get();
      }

      $savoirFaire = $savoirFaireDefault->concat($savoirFaireAdded);

      return $savoirFaire;
    }





/******************************** SAVOIR-ETRE ********************************/

    /**
     * Permet de récupérer tous les savoir-être (existants dans la bdd) du poste
     */
    public function savoirEtreDefault()
    {
      return $this->morphedByMany('App\SavoirEtre', 'savoir_etre', 'poste_savoir_etre')
      ->withPivot('valide', 'savoir_etre_type');
    }


    /**
     * Permet de récupérer les savoir-être (ajoutés par la société) du poste
     */
    public function savoirEtreAdded()
    {
      return $this->morphedByMany('App\SavoirEtreAdded', 'savoir_etre', 'poste_savoir_etre')
      ->withPivot('valide', 'savoir_etre_type');
    }


    /**
     * Permet de récupérer l'ensemble des savoir-être
     * (savoirEtreDefault + savoirEtreAdded) du poste
     */
    public function getSavoirEtre($valide = null)
    {
      if ($valide != null) {
        $savoirEtreDefault = $this->savoirEtreDefault()->where('valide', $valide)->get();
        $savoirEtreAdded = $this->savoirEtreAdded()->where('valide', $valide)->get();
      }
      else {
        $savoirEtreDefault = $this->savoirEtreDefault()->get();
        $savoirEtreAdded = $this->savoirEtreAdded()->get();
      }

      $savoirEtre = $savoirEtreDefault->concat($savoirEtreAdded);

      return $savoirEtre;
    }
}
