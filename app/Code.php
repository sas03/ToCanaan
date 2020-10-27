<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    protected $guarded = ["id"];

    /**
     * Permet de récupérer toutes les formations liées à un code
     */
    public function formations()
    {
        return $this->belongsToMany('App\Formation');
    }





    /**
     * Permet de récupérer toutes les formations liées à un code
     */
    public function metiers()
    {
        return $this->hasMany('App\Metier');
    }





    /**
     * Permet de récupérer toutes les compétences liées à un code
     */
    public function savoirs()
    {
        return $this->belongsToMany('App\Savoir')
        ->withPivot('type');
    }





    /**
     * Permet de récupérer toutes les appellations liées à un code
     */
    public function appellations()
    {
        return $this->hasMany('App\Appellation');
    }





    /**
     * Permet de récupérer tous les savoir-faire liés à un code
     */
    public function savoirFaire()
    {
        return $this->belongsToMany('App\SavoirFaire', 'code_savoir_faire', 'code_id', 'savoir_faire_id')
        ->withPivot('type');
    }





    /**
     * Permet de récupérer tous les codes proches (ou envisageables) liés à un code
     */
    public function codes()
    {
        return $this->belongsToMany('App\Code', 'code_code_proche', 'code_id', 'code_proche_id')
        ->withPivot('type');
    }
}
