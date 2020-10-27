<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visibilite extends Model
{
    protected $table = 'visibilite';
    protected $guarded = ["id"];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
