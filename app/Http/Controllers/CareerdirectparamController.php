<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\DatabaseNotification;
use App\Careerdirectparam;
use Illuminate\Http\Request;
use App\Notifications\CareerdirectparamNotification;
use App\Orientation;
use App\User;
use DB;

class CareerdirectparamController extends Controller
{
    public function create(){
        return view('orientations.careerdirectsignin');
    }

    public function store(Careerdirectparam $careerdirectparam, Request $request){
        $careerdirectpara = Careerdirectparam::all();
        //--$user = $careerdirectparam->users;
        $user = Auth::user();
        $prenom = $request->input('prenom');
        $nom = $request->input('nom');
        $adresse = $request->input('email');
        $langue = $request->input('language');

        if(($prenom != NULL) && ($nom != NULL) && ($adresse != NULL) && ($langue != NULL)){
          $data = array("user_id"=>$user->id,"prenom"=>$prenom,"nom"=>$nom,"adresse"=>$adresse,"langue"=>$langue);   
          $param = array();  
          foreach($careerdirectpara as $cr){
            array_push($param, $cr->adresse);
          }
          if(!in_array($adresse, $param)){
            DB::table('careerdirectparams')->insert($data);
            request()->user()->notify(new CareerdirectparamNotification($careerdirectparam, auth()->user()));
            return redirect()->route('home')->with('success', 'Vos informations personnelles sont en cours de mise à jour !');
          }
          //echo $prenom;
        }
        //return redirect()->route('home');
    }

    public function showFromNotification(DatabaseNotification $notification){
        $notification->markAsRead();

        return redirect()->route('home');
    }
}
