<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Careerdirectparam extends Model
{
    protected $guarded = [];
    protected $fillable = ['user_id'];

    public $timestamps = false;

    public function users(){
        return $this->belongsTo('App\User');
    }
}
