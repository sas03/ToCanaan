<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Orientation;
use App\Careerdirectparam;
use App\User;
use DB;

// Nice
class OrientationController extends Controller
{
    /**
     * Affiche la page d'Orientation du site
     *
     * @return \Illuminate\View\View
     */
     public function index()
     {
         //return redirect()->back();
           $orientation = Orientation::all();
           $careerdirectparam = Careerdirectparam::all();
           //$try = app('OrientationRepository')->findAll();
           /*foreach($orientation as $orientations){
             echo $orientations->video;
           }*/
           
           if ((Auth::id() != NULL ) && (!(is_null(DB::table('careerdirectparams')->where('user_id', '=', Auth::user()->id)->first())))) {
            $careerdirectuserid = DB::table('careerdirectparams')
            ->where('user_id', '=', Auth::user()->id)
            ->first();
            return view('orientations.index', ['orientation' => $orientation, 'careerdirectuserid' => $careerdirectuserid]);
           }
           else if((Auth::id() != NULL && (is_null(DB::table('careerdirectparams')->where('user_id', '=', Auth::user()->id)->first())))){
            $careerdirectuserid = DB::table('careerdirectparams')
            ->where('user_id', '=', Auth::user()->id)
            ->first();
            return view('orientations.index', ['orientation' => $orientation, 'careerdirectuserid' => $careerdirectuserid]);             
           }
           return view('orientations.index', ['orientation' => $orientation]);
     }
     /**
      * Affiche la page de test d'Orientation du site
      *
      * @return \Illuminate\View\View
      */
     public function test()
     {
         //return redirect()->back();
           return view('orientations.test');
     }

          /** De UserController
      * Affiche la page d'inscription careerdirect ' du site
      *
      * @return \Illuminate\View\View
      */
      public function careerdirectsignin(Request $request)
      {
            //return view('orientations.careerdirectsignin');
            //--$user = Auth::user();
            //--$careerdirectparam = $user->careerdirectparam;
            ////$careerdirectparam = $user->careerdirectparam;
            $careerdirectparam = Careerdirectparam::all();
            //--$user = $careerdirectparam->users;
            $user = Auth::user();
            $prenom = $request->input('prenom');
            $nom = $request->input('nom');
            $adresse = $request->input('email');
            $langue = $request->input('language');

            if(($prenom != NULL) && ($nom != NULL) && ($adresse != NULL) && ($langue != NULL)){
              $data = array("user_id"=>$user->id,"prenom"=>$prenom,"nom"=>$nom,"adresse"=>$adresse,"langue"=>$langue);   
              $param = array();  
              foreach($careerdirectparam as $cr){
                array_push($param, $cr->adresse);
              }
              if(!in_array($adresse, $param)){
                DB::table('careerdirectparams')->insert($data);
                return redirect()->route('home')->with('success', 'Vos informations personnelles sont en cours de mise à jour !');
              }
              //echo $prenom;
            }
      
            return view('orientations.careerdirectsignin', compact('user', 'careerdirectparam','adresse','param'));
      }

      /**
      * Affiche la page de connexion careerdirect du site
      *
      * @return \Illuminate\View\View
      */
      public function careerdirectzone()
      {
            return view('orientations.careerdirectzone');
      }

     /**
      * Affiche la page de test de Motivation du site
      *
      * @return \Illuminate\View\View
      */
     public function testMotivation()
     {
         //return redirect()->back();
           return view('orientations.test_motivation');
     }

     /**
      * Affiche la page de test d'Interetpro du site
      *
      * @return \Illuminate\View\View
      */
     public function testInteretpro()
     {
         //return redirect()->back();
           return view('orientations.test_interetpro');
     }


     /**
      * Affiche la page de test de personalite du site
      *
      * @return \Illuminate\View\View
      */
     public function testPersonalite()
     {
         //return redirect()->back();
           return view('orientations.test_personalite');
     }

     /**
      * Affiche la page checkformulaire du site
      *
      * @return \Illuminate\View\View
      */
     public function checkformulaire()
     {
           $nom = count($_POST['plus']);
           $nom1 = count($_POST['moins']);
           if(empty($nom) && empty($nom1)){
             echo "Data does not exist";
           }
           elseif(empty($nom)){
             echo "Data does not exist";
           }
           elseif(empty($nom) || empty($nom1)){
             echo "Data does not exist";
           }
           elseif(empty($nom1)){
             echo "Data does not exist";
           }
         //return redirect()->back();
           //return view('orientations.checkformulaire').$_POST['nom'];works same as below
           //return view('orientations.checkformulaire').count($_POST['nom'])." count ".count($_POST['nom1']);
           //return view('orientations.checkformulaire').request('nom');
           return view('orientations.checkformulaire', compact(
             'nom',
             'nom1'
           ));
     }

     private function isUserAuth($id)
     {
       if (Auth::id() == $id) {
         return true;
       }
       else {
         return false;
       }
     }

}
