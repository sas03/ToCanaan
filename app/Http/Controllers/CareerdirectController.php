<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Aventureux;
use App\Aventure;
use App\Prudent;
use App\Innovateur;
use App\Conventionnel;
use App\Compassion;
use App\Detache;
use App\Extraverti;
use App\Introverti;
use App\Meneur;
use App\Accomodant;
use App\Consciencieux;
use App\Nonstructure;
use App\Religieux;
use App;
use DB;

class CareerdirectController extends Controller
{
  //------------ SECTION CAREERDIRECT ---------------------------------------------

  /**
   * Affiche la career d'un utilisateur
   *
   * @param int $id
   * @return \Illuminate\View\View
   */
   public function careerdirect($id){
       $user = User::find($id);
       // create curl resource
          $ch = curl_init();

          // set url
          curl_setopt($ch, CURLOPT_URL, route('career_direct_fiche', ['id' => Auth::id()]));

          //return the transfer as a string
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

          // $output contains the output string
          $output = curl_exec($ch);
          //$output = utf8_decode(curl_exec($ch));

          // close curl resource to free up system resources
          curl_close($ch);
       //print_r($output);

       $doc = new \DOMDocument();
       @$doc->loadHTML($output); // @ if for suppressing warnings
       libxml_use_internal_errors(true);
       //-------------$doc->loadHTMLFile(route('career_direct_fiche', ['id' => Auth::id()]));// loads html file
       //$doc->loadHTMLFile('http://localhost:8080/ToCanaan-alpha/rapportshtml/careerdirect-emmanuel.html');
       //$doc->loadHTMLFile('../../rapportshtml/careerdirect-emmanuel.html');
       $documents = $doc->getElementsByTagName('p');
       $documents_span = $doc->getElementsByTagName('span');
       $xpath = new \DOMXpath($doc);
       $bath = $xpath->query('//h4[contains(@class, "cdreport-header")]');
       libxml_clear_errors();

       return view('careerdirect.careerdirect', compact('user','doc','documents','documents_span','xpath','bath'));

   }

  /**
   * Affiche la fiche career d'un utilisateur
   *
   * @param int $id
   * @return \Illuminate\View\View
   */
   public function careerdirect_fiche($id){
     $user = User::find($id);
     $castid = (string) $user->id;
     //return view('careerdirect.careerdirectfiche');
     return view('rapportshtml.careerdirect-emmanuel'.$castid, compact('user'));
   }

   public function index(){
       $personnalite = User::find(1)->personnalite;
       $user = Aventureux::find(1)->users;
       return $user;
     }
   //------------ SECTION PERSONNALITE ---------------------------------------------

   /**
    * Affiche la personnalite d'un utilisateur
    *
    * @param int $id
    * @return \Illuminate\View\View
    */
    public function personnalite(Request $request, $id){
      $user = User::find($id);
      stream_context_set_default([
          'ssl' => [
              'verify_peer' => false,
              'verify_peer_name' => false,
          ]
      ]);

      //$username = 'Demonstration2017';
      //$password = '$1$wr1tX60p$UmWSY4PHV/WjFcGo38FIR0';

      $doc = new \DOMDocument();
      //@$doc->loadHTML($output); // @ if for suppressing warnings
      libxml_use_internal_errors(true);
      $doc->loadHTMLFile(route('career_direct_fiche', ['id' => Auth::id()]));
      $documents = $doc->getElementsByTagName('p');
      $documents_span = $doc->getElementsByTagName('span');
      $xpath = new \DOMXpath($doc);
      $bath = $xpath->query('//h4[contains(@class, "cdreport-header")]');
      libxml_clear_errors();

      //----------------
      $switch = array($bath[2]->nodeValue,$bath[3]->nodeValue,$bath[4]->nodeValue,$bath[5]->nodeValue,$bath[6]->nodeValue,$bath[7]->nodeValue,"");
      foreach ($switch as $key => $value) {
        switch ($key) {
            case '1. Aventureux(se)' :
              $req_perso1 = DB::table('audacieuxes')->where('nom', '=', $documents_span[105]->nodeValue)->first();
              $req_perso1a = DB::table('ambitieuxes')->where('nom', '=', $documents_span[108]->nodeValue)->first();
              if ((is_null($req_perso1)) && (is_null($req_perso1a))) {
                $data = array('score'=>$documents_span[106]->nodeValue,'nom'=>$documents_span[105]->nodeValue);
                DB::table('audacieuxes')->insert($data);
                $data = array('score'=>$documents_span[109]->nodeValue,'nom'=>$documents_span[108]->nodeValue);
                DB::table('ambitieuxes')->insert($data);

                $req_perso2 = DB::table('audacieuxes')->where('nom', '=', $documents_span[105]->nodeValue)->first();
                $req_perso2a = DB::table('ambitieuxes')->where('nom', '=', $documents_span[108]->nodeValue)->first();
                //$user->aventureux()->attach($req_perso2->id);
                $data1 = array('audacieux_id'=>$req_perso2->id,'ambitieux_id'=>$req_perso2a->id,'score'=>$documents_span[103]->nodeValue,'nom'=>$documents_span[102]->nodeValue);
                DB::table('aventureuxes')->insert($data1);

                $req_perso3 = DB::table('aventureuxes')->where('audacieux_id', '=', $req_perso2->id)->first();
                $data2 = array('contenu'=>$documents[21]->nodeValue,'aventureux_id'=>$req_perso3->id,'nom'=>$bath[2]->nodeValue);
                DB::table('aventures')->insert($data2);

                $req_perso4 = DB::table('aventures')->where('aventureux_id', '=', $req_perso3->id)->first();

                //var_dump($user->aventureux->audacieux[0]);
                //echo $user->aventureux->last()->audacieux->nom;
                //echo $user->aventures->last()->aventureux->audacieux->nom;
                echo "Success";
              }
              else{
                echo "Impossible to insert data";
              }
              break;
            case '1. Prudent(e)' :
              $req_perso1 = DB::table('conservateurs')->where('nom', '=', $documents_span[97]->nodeValue)->first();
              $req_perso1a = DB::table('satisfaits')->where('nom', '=', $documents_span[99]->nodeValue)->first();
              if ((is_null($req_perso1)) && (is_null($req_perso1a))) {
                $data = array('score'=>$documents_span[98]->nodeValue,'nom'=>$documents_span[97]->nodeValue);
                DB::table('conservateurs')->insert($data);
                $data = array('score'=>$documents_span[100]->nodeValue,'nom'=>$documents_span[99]->nodeValue);
                DB::table('satisfaits')->insert($data);

                $req_perso2 = DB::table('conservateurs')->where('nom', '=', $documents_span[97]->nodeValue)->first();
                $req_perso2a = DB::table('satisfaits')->where('nom', '=', $documents_span[99]->nodeValue)->first();
                //$user->aventureux()->attach($req_perso2->id);
                $data1 = array('conservateur_id'=>$req_perso2->id,'satisfait_id'=>$req_perso2a->id,'score'=>$documents_span[95]->nodeValue,'nom'=>$documents_span[94]->nodeValue);
                DB::table('prudents')->insert($data1);

                $req_perso3 = DB::table('prudents')->where('conservateur_id', '=', $req_perso2->id)->first();
                $data2 = array('contenu'=>$documents[21]->nodeValue,'prudent_id'=>$req_perso3->id,'nom'=>$bath[2]->nodeValue);
                DB::table('aventures')->insert($data2);

                $req_perso4 = DB::table('aventures')->where('aventureux_id', '=', $req_perso3->id)->first();

                //var_dump($user->aventureux->audacieux[0]);
                //echo $user->aventureux->last()->audacieux->nom;
                //echo $user->aventures->last()->aventureux->audacieux->nom;
                echo "Success";
              }
              else{
                echo "Impossible to insert data";
              }
              break;
            case '1. Prudent(e) / Aventureux(se)':
              $req_perso1 = DB::table('audacieuxes')->where('nom', '=', $documents_span[105]->nodeValue)->first();
              $req_perso1a = DB::table('ambitieuxes')->where('nom', '=', $documents_span[108]->nodeValue)->first();
              $req_perso1b = DB::table('conservateurs')->where('nom', '=', $documents_span[97]->nodeValue)->first();
              $req_perso1c = DB::table('satisfaits')->where('nom', '=', $documents_span[99]->nodeValue)->first();
              if ((is_null($req_perso1)) && (is_null($req_perso1a)) && (is_null($req_perso1b)) && (is_null($req_perso1c))) {
                $data = array('score'=>$documents_span[106]->nodeValue,'nom'=>$documents_span[105]->nodeValue);
                DB::table('audacieuxes')->insert($data);
                $data = array('score'=>$documents_span[109]->nodeValue,'nom'=>$documents_span[108]->nodeValue);
                DB::table('ambitieuxes')->insert($data);
                $data = array('score'=>$documents_span[98]->nodeValue,'nom'=>$documents_span[97]->nodeValue);
                DB::table('conservateurs')->insert($data);
                $data = array('score'=>$documents_span[100]->nodeValue,'nom'=>$documents_span[99]->nodeValue);
                DB::table('satisfaits')->insert($data);

                $req_perso2 = DB::table('audacieuxes')->where('nom', '=', $documents_span[105]->nodeValue)->first();
                $req_perso2a = DB::table('ambitieuxes')->where('nom', '=', $documents_span[108]->nodeValue)->first();
                $req_perso2b = DB::table('conservateurs')->where('nom', '=', $documents_span[97]->nodeValue)->first();
                $req_perso2c = DB::table('satisfaits')->where('nom', '=', $documents_span[99]->nodeValue)->first();
                //$user->aventureux()->attach($req_perso2->id);
                $data1 = array('audacieux_id'=>$req_perso2->id,'ambitieux_id'=>$req_perso2a->id,'score'=>$documents_span[103]->nodeValue,'nom'=>$documents_span[102]->nodeValue);
                DB::table('aventureuxes')->insert($data1);
                $data1 = array('conservateur_id'=>$req_perso2b->id,'satisfait_id'=>$req_perso2c->id,'score'=>$documents_span[95]->nodeValue,'nom'=>$documents_span[94]->nodeValue);
                DB::table('prudents')->insert($data1);

                $req_perso3 = DB::table('aventureuxes')->where('audacieux_id', '=', $req_perso2->id)->first();
                $req_perso3a = DB::table('prudents')->where('conservateur_id', '=', $req_perso2b->id)->first();
                $data2 = array('contenu'=>$documents[21]->nodeValue,'aventureux_id'=>$req_perso3->id,'prudent_id'=>$req_perso3a,'nom'=>$bath[2]->nodeValue);
                DB::table('aventures')->insert($data2);

                $req_perso4 = DB::table('aventures')->where('aventureux_id', '=', $req_perso3->id)->first();

                //var_dump($user->aventureux->audacieux[0]);
                //echo $user->aventureux->last()->audacieux->nom;
                //echo $user->aventures->last()->aventureux->audacieux->nom;
                echo "Success";
              }
              else{
                echo "Impossible to insert data";
              }
              break;
            case '2. Innovateur(trice)' :
              $req_perso5 = DB::table('imaginatifs')->where('nom', '=', $documents_span[138]->nodeValue)->first();
              $req_perso5a = DB::table('vifs')->where('nom', '=', $documents_span[141]->nodeValue)->first();
              if ((is_null($req_perso5)) && (is_null($req_perso5a))) {
                $data = array('score'=>$documents_span[139]->nodeValue,'nom'=>$documents_span[138]->nodeValue);
                DB::table('imaginatifs')->insert($data);
                $data = array('score'=>$documents_span[142]->nodeValue,'nom'=>$documents_span[141]->nodeValue);
                DB::table('vifs')->insert($data);

                $req_perso6 = DB::table('imaginatifs')->where('nom', '=', $documents_span[138]->nodeValue)->first();
                $req_perso6a = DB::table('vifs')->where('nom', '=', $documents_span[141]->nodeValue)->first();
                //$user->aventureux()->attach($req_perso2->id);
                $data1 = array('imaginatif_id'=>$req_perso6->id,'vif_id'=>$req_perso6a->id,'score'=>$documents_span[135]->nodeValue,'nom'=>$documents_span[134]->nodeValue);
                DB::table('innovateurs')->insert($data1);

                $req_perso7 = DB::table('innovateurs')->where('imaginatif_id', '=', $req_perso6->id)->first();
                $data2 = array('contenu'=>$documents[21]->nodeValue,'innovateur_id'=>$req_perso7->id,'nom'=>$bath[3]->nodeValue);
                DB::table('innovations')->insert($data2);

                $req_perso8 = DB::table('innovations')->where('innovateur_id', '=', $req_perso7->id)->first();



                //var_dump($user->aventureux->audacieux[0]);
                //echo $user->aventureux->last()->audacieux->nom;
                //echo $user->aventures->last()->aventureux->audacieux->nom;
                echo "Success";
              }
              else{
                echo "Impossible to insert data";
              }
              break ;
            case '2. Conventionnel(le)' :
              $req_perso5 = DB::table('previsibles')->where('nom', '=', $documents_span[129]->nodeValue)->first();
              $req_perso5a = DB::table('traditionnels')->where('nom', '=', $documents_span[131]->nodeValue)->first();
              if ((is_null($req_perso5)) && (is_null($req_perso5a))) {
                $data = array('score'=>$documents_span[130]->nodeValue,'nom'=>$documents_span[129]->nodeValue);
                DB::table('previsibles')->insert($data);
                $data = array('score'=>$documents_span[132]->nodeValue,'nom'=>$documents_span[131]->nodeValue);
                DB::table('traditionnels')->insert($data);

                $req_perso6 = DB::table('previsibles')->where('nom', '=', $documents_span[129]->nodeValue)->first();
                $req_perso6a = DB::table('traditionnels')->where('nom', '=', $documents_span[131]->nodeValue)->first();
                //$user->aventureux()->attach($req_perso2->id);
                $data1 = array('previsible_id'=>$req_perso6->id,'traditionnel_id'=>$req_perso6a->id,'score'=>$documents_span[128]->nodeValue,'nom'=>$documents_span[127]->nodeValue);
                DB::table('conventionnels')->insert($data1);

                $req_perso7 = DB::table('conventionnels')->where('previsible_id', '=', $req_perso6->id)->first();
                $data2 = array('contenu'=>$documents[21]->nodeValue,'conventionnel_id'=>$req_perso7->id,'nom'=>$bath[3]->nodeValue);
                DB::table('innovations')->insert($data2);

                $req_perso8 = DB::table('innovations')->where('conventionnel_id', '=', $req_perso7->id)->first();



                //var_dump($user->aventureux->audacieux[0]);
                //echo $user->aventureux->last()->audacieux->nom;
                //echo $user->aventures->last()->aventureux->audacieux->nom;
                echo "Success";
              }
              else{
                echo "Impossible to insert data";
              }
              break;
            case '2. Conventionnel(le) / Innovateur(trice)' :
              $req_perso5 = DB::table('previsibles')->where('nom', '=', $documents_span[129]->nodeValue)->first();
              $req_perso5a = DB::table('traditionnels')->where('nom', '=', $documents_span[131]->nodeValue)->first();
              $req_perso5b = DB::table('imaginatifs')->where('nom', '=', $documents_span[138]->nodeValue)->first();
              $req_perso5c = DB::table('vifs')->where('nom', '=', $documents_span[141]->nodeValue)->first();
              if ((is_null($req_perso5)) && (is_null($req_perso5a)) && (is_null($req_perso5b)) && (is_null($req_perso5c))) {
                $data = array('score'=>$documents_span[130]->nodeValue,'nom'=>$documents_span[129]->nodeValue);
                DB::table('previsibles')->insert($data);
                $data = array('score'=>$documents_span[132]->nodeValue,'nom'=>$documents_span[131]->nodeValue);
                DB::table('traditionnels')->insert($data);
                $data = array('score'=>$documents_span[139]->nodeValue,'nom'=>$documents_span[138]->nodeValue);
                DB::table('imaginatifs')->insert($data);
                $data = array('score'=>$documents_span[142]->nodeValue,'nom'=>$documents_span[141]->nodeValue);
                DB::table('vifs')->insert($data);

                $req_perso6 = DB::table('previsibles')->where('nom', '=', $documents_span[129]->nodeValue)->first();
                $req_perso6a = DB::table('traditionnels')->where('nom', '=', $documents_span[131]->nodeValue)->first();
                $req_perso6b = DB::table('imaginatifs')->where('nom', '=', $documents_span[138]->nodeValue)->first();
                $req_perso6c = DB::table('vifs')->where('nom', '=', $documents_span[141]->nodeValue)->first();
                //$user->aventureux()->attach($req_perso2->id);
                $data1 = array('previsible_id'=>$req_perso6->id,'traditionnel_id'=>$req_perso6a->id,'score'=>$documents_span[128]->nodeValue,'nom'=>$documents_span[127]->nodeValue);
                DB::table('conventionnels')->insert($data1);
                $data1 = array('imaginatif_id'=>$req_perso6b->id,'vif_id'=>$req_perso6c->id,'score'=>$documents_span[135]->nodeValue,'nom'=>$documents_span[134]->nodeValue);
                DB::table('innovateurs')->insert($data1);

                $req_perso7 = DB::table('conventionnels')->where('previsible_id', '=', $req_perso6->id)->first();
                $req_perso7a = DB::table('innovateurs')->where('imaginatif_id', '=', $req_perso6b->id)->first();
                $data2 = array('contenu'=>$documents[21]->nodeValue,'conventionnel_id'=>$req_perso7->id,'innovateur_id'=>$req_perso7a->id,'nom'=>$bath[3]->nodeValue);
                DB::table('innovations')->insert($data2);

                $req_perso8 = DB::table('innovations')->where('conventionnel_id', '=', $req_perso7->id)->first();



                //var_dump($user->aventureux->audacieux[0]);
                //echo $user->aventureux->last()->audacieux->nom;
                //echo $user->aventures->last()->aventureux->audacieux->nom;
                echo "Success";
              }
              else{
                echo "Impossible to insert data";
              }
              break;
            case '3. Plein(e) de compassion' :
              $req_perso9 = DB::table('comprehensifs')->where('nom', '=', $documents_span[173]->nodeValue)->first();
              $req_perso9a = DB::table('soutients')->where('nom', '=', $documents_span[176]->nodeValue)->first();
              $req_perso9b = DB::table('tolerants')->where('nom', '=', $documents_span[179]->nodeValue)->first();
              if ((is_null($req_perso9)) && (is_null($req_perso9a)) && (is_null($req_perso9b))) {
                $data = array('score'=>$documents_span[174]->nodeValue,'nom'=>$documents_span[173]->nodeValue);
                DB::table('comprehensifs')->insert($data);
                $data = array('score'=>$documents_span[177]->nodeValue,'nom'=>$documents_span[176]->nodeValue);
                DB::table('soutients')->insert($data);
                $data = array('score'=>$documents_span[180]->nodeValue,'nom'=>$documents_span[179]->nodeValue);
                DB::table('tolerants')->insert($data);

                $req_perso10 = DB::table('comprehensifs')->where('nom', '=', $documents_span[173]->nodeValue)->first();
                $req_perso10a = DB::table('soutients')->where('nom', '=', $documents_span[176]->nodeValue)->first();
                $req_perso10b = DB::table('tolerants')->where('nom', '=', $documents_span[179]->nodeValue)->first();
                //$user->aventureux()->attach($req_perso2->id);
                $data1 = array('comprehensif_id'=>$req_perso10->id,'soutient_id'=>$req_perso10a->id,'tolerant_id'=>$req_perso10b->id,'score'=>$documents_span[170]->nodeValue,'nom'=>$documents_span[169]->nodeValue);
                DB::table('compassions')->insert($data1);

                $req_perso11 = DB::table('compassions')->where('comprehensif_id', '=', $req_perso10->id)->first();
                $data2 = array('contenu'=>$documents[21]->nodeValue,'compassion_id'=>$req_perso11->id,'nom'=>$bath[4]->nodeValue);
                DB::table('dimension_compassions')->insert($data2);

                $req_perso12 = DB::table('dimension_compassions')->where('compassion_id', '=', $req_perso11->id)->first();
                echo "Success";
              }
              else{
                echo "Impossible to insert data";
              }
              break;
            case '3. Détaché(e)' :
              $req_perso9 = DB::table('neutres')->where('nom', '=', $documents_span[162]->nodeValue)->first();
              $req_perso9a = DB::table('objectifs')->where('nom', '=', $documents_span[164]->nodeValue)->first();
              $req_perso9b = DB::table('interrogateurs')->where('nom', '=', $documents_span[166]->nodeValue)->first();
              if ((is_null($req_perso9)) && (is_null($req_perso9a)) && (is_null($req_perso9b))) {
                $data = array('score'=>$documents_span[163]->nodeValue,'nom'=>$documents_span[162]->nodeValue);
                DB::table('neutres')->insert($data);
                $data = array('score'=>$documents_span[165]->nodeValue,'nom'=>$documents_span[164]->nodeValue);
                DB::table('objectifs')->insert($data);
                $data = array('score'=>$documents_span[167]->nodeValue,'nom'=>$documents_span[166]->nodeValue);
                DB::table('interrogateurs')->insert($data);

                $req_perso10 = DB::table('neutres')->where('nom', '=', $documents_span[162]->nodeValue)->first();
                $req_perso10a = DB::table('objectifs')->where('nom', '=', $documents_span[164]->nodeValue)->first();
                $req_perso10b = DB::table('interrogateurs')->where('nom', '=', $documents_span[166]->nodeValue)->first();
                //$user->aventureux()->attach($req_perso2->id);
                $data1 = array('neutre_id'=>$req_perso10->id,'objectif_id'=>$req_perso10a->id,'interrogateur_id'=>$req_perso10b->id,'score'=>$documents_span[160]->nodeValue,'nom'=>$documents_span[159]->nodeValue);
                DB::table('detaches')->insert($data1);

                $req_perso11 = DB::table('detaches')->where('neutre_id', '=', $req_perso10->id)->first();
                $data2 = array('contenu'=>$documents[21]->nodeValue,'detache_id'=>$req_perso11->id,'nom'=>$bath[4]->nodeValue);
                DB::table('dimension_compassions')->insert($data2);

                $req_perso12 = DB::table('dimension_compassions')->where('detache_id', '=', $req_perso11->id)->first();
                echo "Success";
              }
              else{
                echo "Impossible to insert data";
              }
              break;
            case '3. Détaché(e) / Plein(e) de compassion' :
              $req_perso9 = DB::table('neutres')->where('nom', '=', $documents_span[162]->nodeValue)->first();
              $req_perso9a = DB::table('objectifs')->where('nom', '=', $documents_span[164]->nodeValue)->first();
              $req_perso9b = DB::table('interrogateurs')->where('nom', '=', $documents_span[166]->nodeValue)->first();
              $req_perso9c = DB::table('comprehensifs')->where('nom', '=', $documents_span[173]->nodeValue)->first();
              $req_perso9d = DB::table('soutients')->where('nom', '=', $documents_span[176]->nodeValue)->first();
              $req_perso9e = DB::table('tolerants')->where('nom', '=', $documents_span[179]->nodeValue)->first();
              if ((is_null($req_perso9)) && (is_null($req_perso9a)) && (is_null($req_perso9b)) && (is_null($req_perso9c)) && (is_null($req_perso9d)) && (is_null($req_perso9e))) {
                $data = array('score'=>$documents_span[163]->nodeValue,'nom'=>$documents_span[162]->nodeValue);
                DB::table('neutres')->insert($data);
                $data = array('score'=>$documents_span[165]->nodeValue,'nom'=>$documents_span[164]->nodeValue);
                DB::table('objectifs')->insert($data);
                $data = array('score'=>$documents_span[167]->nodeValue,'nom'=>$documents_span[166]->nodeValue);
                DB::table('interrogateurs')->insert($data);
                $data = array('score'=>$documents_span[174]->nodeValue,'nom'=>$documents_span[173]->nodeValue);
                DB::table('comprehensifs')->insert($data);
                $data = array('score'=>$documents_span[177]->nodeValue,'nom'=>$documents_span[176]->nodeValue);
                DB::table('soutients')->insert($data);
                $data = array('score'=>$documents_span[180]->nodeValue,'nom'=>$documents_span[179]->nodeValue);
                DB::table('tolerants')->insert($data);

                $req_perso10 = DB::table('neutres')->where('nom', '=', $documents_span[162]->nodeValue)->first();
                $req_perso10a = DB::table('objectifs')->where('nom', '=', $documents_span[164]->nodeValue)->first();
                $req_perso10b = DB::table('interrogateurs')->where('nom', '=', $documents_span[166]->nodeValue)->first();
                $req_perso10c = DB::table('comprehensifs')->where('nom', '=', $documents_span[173]->nodeValue)->first();
                $req_perso10d = DB::table('soutients')->where('nom', '=', $documents_span[176]->nodeValue)->first();
                $req_perso10e = DB::table('tolerants')->where('nom', '=', $documents_span[179]->nodeValue)->first();
                //$user->aventureux()->attach($req_perso2->id);
                $data1 = array('neutre_id'=>$req_perso10->id,'objectif_id'=>$req_perso10a->id,'interrogateur_id'=>$req_perso10b->id,'score'=>$documents_span[160]->nodeValue,'nom'=>$documents_span[159]->nodeValue);
                DB::table('detaches')->insert($data1);
                $data1 = array('comprehensif_id'=>$req_perso10c->id,'soutient_id'=>$req_perso10d->id,'tolerant_id'=>$req_perso10e->id,'score'=>$documents_span[170]->nodeValue,'nom'=>$documents_span[169]->nodeValue);
                DB::table('compassions')->insert($data1);

                $req_perso11 = DB::table('detaches')->where('neutre_id', '=', $req_perso10->id)->first();
                $req_perso11a = DB::table('compassions')->where('comprehensif_id', '=', $req_perso10c->id)->first();
                $data2 = array('contenu'=>$documents[21]->nodeValue,'detache_id'=>$req_perso11->id,'compassion_id'=>$req_perso11a->id,'nom'=>$bath[4]->nodeValue);
                DB::table('dimension_compassions')->insert($data2);

                $req_perso12 = DB::table('dimension_compassions')->where('detache_id', '=', $req_perso11->id)->first();
                echo "Success";
              }
              else{
                echo "Impossible to insert data";
              }
              break;
            case '4. Extraverti(e)' :
              $req_perso13 = DB::table('enthousiastes')->where('nom', '=', $documents_span[211]->nodeValue)->first();
              $req_perso13a = DB::table('socials')->where('nom', '=', $documents_span[214]->nodeValue)->first();
              $req_perso13b = DB::table('verbals')->where('nom', '=', $documents_span[217]->nodeValue)->first();
              if ((is_null($req_perso13)) && (is_null($req_perso13a)) && (is_null($req_perso13b))) {
                $data = array('score'=>$documents_span[212]->nodeValue,'nom'=>$documents_span[211]->nodeValue);
                DB::table('enthousiastes')->insert($data);
                $data = array('score'=>$documents_span[215]->nodeValue,'nom'=>$documents_span[214]->nodeValue);
                DB::table('socials')->insert($data);
                $data = array('score'=>$documents_span[218]->nodeValue,'nom'=>$documents_span[217]->nodeValue);
                DB::table('verbals')->insert($data);

                $req_perso14 = DB::table('enthousiastes')->where('nom', '=', $documents_span[211]->nodeValue)->first();
                $req_perso14a = DB::table('socials')->where('nom', '=', $documents_span[214]->nodeValue)->first();
                $req_perso14b = DB::table('verbals')->where('nom', '=', $documents_span[217]->nodeValue)->first();
                //$user->aventureux()->attach($req_perso2->id);
                $data1 = array('enthousiaste_id'=>$req_perso14->id,'social_id'=>$req_perso14a->id,'verbal_id'=>$req_perso14b->id,'score'=>$documents_span[208]->nodeValue,'nom'=>$documents_span[207]->nodeValue);
                DB::table('extravertis')->insert($data1);

                $req_perso15 = DB::table('extravertis')->where('enthousiaste_id', '=', $req_perso14->id)->first();
                $data2 = array('contenu'=>$documents[21]->nodeValue,'extraverti_id'=>$req_perso15->id,'nom'=>$bath[5]->nodeValue);
                DB::table('extraversions')->insert($data2);

                $req_perso16 = DB::table('extraversions')->where('extraverti_id', '=', $req_perso15->id)->first();
                echo "Success";
              }
              else{
                echo "Impossible to insert data";
              }
              break;
            case '4. Introverti(e)' :
              $req_perso13 = DB::table('distants')->where('nom', '=', $documents_span[200]->nodeValue)->first();
              $req_perso13a = DB::table('reserves')->where('nom', '=', $documents_span[202]->nodeValue)->first();
              $req_perso13b = DB::table('poses')->where('nom', '=', $documents_span[204]->nodeValue)->first();
              if ((is_null($req_perso13)) && (is_null($req_perso13a)) && (is_null($req_perso13b))) {
                $data = array('score'=>$documents_span[201]->nodeValue,'nom'=>$documents_span[200]->nodeValue);
                DB::table('distants')->insert($data);
                $data = array('score'=>$documents_span[203]->nodeValue,'nom'=>$documents_span[202]->nodeValue);
                DB::table('reserves')->insert($data);
                $data = array('score'=>$documents_span[205]->nodeValue,'nom'=>$documents_span[204]->nodeValue);
                DB::table('poses')->insert($data);

                $req_perso14 = DB::table('distants')->where('nom', '=', $documents_span[105]->nodeValue)->first();
                $req_perso14a = DB::table('reserves')->where('nom', '=', $documents_span[108]->nodeValue)->first();
                $req_perso14b = DB::table('poses')->where('nom', '=', $documents_span[113]->nodeValue)->first();
                //$user->aventureux()->attach($req_perso2->id);
                $data1 = array('distant_id'=>$req_perso14->id,'reserve_id'=>$req_perso14a->id,'pose_id'=>$req_perso14b->id,'score'=>$documents_span[198]->nodeValue,'nom'=>$documents_span[197]->nodeValue);
                DB::table('introvertis')->insert($data1);

                $req_perso15 = DB::table('introvertis')->where('distant_id', '=', $req_perso14->id)->first();
                $data2 = array('contenu'=>$documents[21]->nodeValue,'introverti_id'=>$req_perso15->id,'nom'=>$bath[5]->nodeValue);
                DB::table('extraversions')->insert($data2);

                $req_perso16 = DB::table('extraversions')->where('introverti_id', '=', $req_perso15->id)->first();
                echo "Success";
              }
              else{
                echo "Impossible to insert data";
              }
              break;
            case '4. Introverti(e) / Extraverti(e)' :
              $req_perso13 = DB::table('distants')->where('nom', '=', $documents_span[200]->nodeValue)->first();
              $req_perso13a = DB::table('reserves')->where('nom', '=', $documents_span[202]->nodeValue)->first();
              $req_perso13b = DB::table('poses')->where('nom', '=', $documents_span[204]->nodeValue)->first();
              $req_perso13c = DB::table('enthousiastes')->where('nom', '=', $documents_span[211]->nodeValue)->first();
              $req_perso13d = DB::table('socials')->where('nom', '=', $documents_span[214]->nodeValue)->first();
              $req_perso13e = DB::table('verbals')->where('nom', '=', $documents_span[217]->nodeValue)->first();
              if ((is_null($req_perso13)) && (is_null($req_perso13a)) && (is_null($req_perso13b)) && (is_null($req_perso13c)) && (is_null($req_perso13d)) && (is_null($req_perso13e))) {
                $data = array('score'=>$documents_span[201]->nodeValue,'nom'=>$documents_span[200]->nodeValue);
                DB::table('distants')->insert($data);
                $data = array('score'=>$documents_span[203]->nodeValue,'nom'=>$documents_span[202]->nodeValue);
                DB::table('reserves')->insert($data);
                $data = array('score'=>$documents_span[205]->nodeValue,'nom'=>$documents_span[204]->nodeValue);
                DB::table('poses')->insert($data);
                $data = array('score'=>$documents_span[212]->nodeValue,'nom'=>$documents_span[211]->nodeValue);
                DB::table('enthousiastes')->insert($data);
                $data = array('score'=>$documents_span[215]->nodeValue,'nom'=>$documents_span[214]->nodeValue);
                DB::table('socials')->insert($data);
                $data = array('score'=>$documents_span[218]->nodeValue,'nom'=>$documents_span[217]->nodeValue);
                DB::table('verbals')->insert($data);

                $req_perso14 = DB::table('distants')->where('nom', '=', $documents_span[200]->nodeValue)->first();
                $req_perso14a = DB::table('reserves')->where('nom', '=', $documents_span[202]->nodeValue)->first();
                $req_perso14b = DB::table('poses')->where('nom', '=', $documents_span[204]->nodeValue)->first();
                $req_perso14c = DB::table('enthousiastes')->where('nom', '=', $documents_span[211]->nodeValue)->first();
                $req_perso14d = DB::table('socials')->where('nom', '=', $documents_span[214]->nodeValue)->first();
                $req_perso14e = DB::table('verbals')->where('nom', '=', $documents_span[217]->nodeValue)->first();
                //$user->aventureux()->attach($req_perso2->id);
                $data1 = array('distant_id'=>$req_perso14->id,'reserve_id'=>$req_perso14a->id,'pose_id'=>$req_perso14b->id,'score'=>$documents_span[198]->nodeValue,'nom'=>$documents_span[197]->nodeValue);
                DB::table('introvertis')->insert($data1);
                $data1 = array('enthousiaste_id'=>$req_perso14c->id,'social_id'=>$req_perso14d->id,'verbal_id'=>$req_perso14e->id,'score'=>$documents_span[208]->nodeValue,'nom'=>$documents_span[207]->nodeValue);
                DB::table('extravertis')->insert($data1);

                $req_perso15 = DB::table('introvertis')->where('distant_id', '=', $req_perso14->id)->first();
                $req_perso15a = DB::table('extravertis')->where('enthousiaste_id', '=', $req_perso14->id)->first();
                $data2 = array('contenu'=>$documents[21]->nodeValue,'introverti_id'=>$req_perso15->id,'extraverti_id'=>$req_perso15a->id,'nom'=>$bath[5]->nodeValue);
                DB::table('extraversions')->insert($data2);

                $req_perso16 = DB::table('extraversions')->where('introverti_id', '=', $req_perso15->id)->first();
                echo "Success";
              }
              else{
                echo "Impossible to insert data";
              }
              break;
            case '5. Meneur(se)' :
              $req_perso17 = DB::table('defends')->where('nom', '=', $documents_span[250]->nodeValue)->first();
              $req_perso17a = DB::table('independants')->where('nom', '=', $documents_span[253]->nodeValue)->first();
              $req_perso17b = DB::table('directs')->where('nom', '=', $documents_span[256]->nodeValue)->first();
              if ((is_null($req_perso17)) && (is_null($req_perso17a)) && (is_null($req_perso17b))) {
                $data = array('score'=>$documents_span[251]->nodeValue,'nom'=>$documents_span[250]->nodeValue);
                DB::table('defends')->insert($data);
                $data = array('score'=>$documents_span[253]->nodeValue,'nom'=>$documents_span[252]->nodeValue);
                DB::table('independants')->insert($data);
                $data = array('score'=>$documents_span[257]->nodeValue,'nom'=>$documents_span[256]->nodeValue);
                DB::table('directs')->insert($data);

                $req_perso18 = DB::table('defends')->where('nom', '=', $documents_span[250]->nodeValue)->first();
                $req_perso18a = DB::table('independants')->where('nom', '=', $documents_span[252]->nodeValue)->first();
                $req_perso18b = DB::table('directs')->where('nom', '=', $documents_span[256]->nodeValue)->first();
                //$user->aventureux()->attach($req_perso2->id);
                $data1 = array('defend_id'=>$req_perso18->id,'independant_id'=>$req_perso18a->id,'direct_id'=>$req_perso18b->id,'score'=>$documents_span[247]->nodeValue,'nom'=>$documents_span[246]->nodeValue);
                DB::table('meneurs')->insert($data1);

                $req_perso19 = DB::table('meneurs')->where('defend_id', '=', $req_perso18->id)->first();
                $data2 = array('contenu'=>$documents[21]->nodeValue,'meneur_id'=>$req_perso19->id,'nom'=>$bath[6]->nodeValue);
                DB::table('dominations')->insert($data2);

                $req_perso20 = DB::table('dominations')->where('meneur_id', '=', $req_perso19->id)->first();
                echo "Success";
              }
              else{
                echo "Impossible to insert data";
              }
              break;
            case '5. Accomodant(e)' :
              $req_perso17 = DB::table('accomodantes')->where('nom', '=', $documents_span[237]->nodeValue)->first();
              $req_perso17a = DB::table('conformistes')->where('nom', '=', $documents_span[241]->nodeValue)->first();
              $req_perso17b = DB::table('tacts')->where('nom', '=', $documents_span[243]->nodeValue)->first();
              if ((is_null($req_perso17)) && (is_null($req_perso17a)) && (is_null($req_perso17b))) {
                $data = array('score'=>$documents_span[238]->nodeValue,'nom'=>$documents_span[237]->nodeValue);
                DB::table('accomodantes')->insert($data);
                $data = array('score'=>$documents_span[240]->nodeValue,'nom'=>$documents_span[241]->nodeValue);
                DB::table('conformistes')->insert($data);
                $data = array('score'=>$documents_span[244]->nodeValue,'nom'=>$documents_span[243]->nodeValue);
                DB::table('tacts')->insert($data);

                $req_perso18 = DB::table('accomodantes')->where('nom', '=', $documents_span[237]->nodeValue)->first();
                $req_perso18a = DB::table('conformistes')->where('nom', '=', $documents_span[241]->nodeValue)->first();
                $req_perso18b = DB::table('tacts')->where('nom', '=', $documents_span[243]->nodeValue)->first();
                //$user->aventureux()->attach($req_perso2->id);
                $data1 = array('accomodante_id'=>$req_perso18->id,'conformiste_id'=>$req_perso18a->id,'tact_id'=>$req_perso18b->id,'score'=>$documents_span[236]->nodeValue,'nom'=>$documents_span[235]->nodeValue);
                DB::table('accomodants')->insert($data1);

                $req_perso19 = DB::table('accomodants')->where('accomodante_id', '=', $req_perso18->id)->first();
                $data2 = array('contenu'=>$documents[21]->nodeValue,'accomodant_id'=>$req_perso19->id,'nom'=>$bath[6]->nodeValue);
                DB::table('dominations')->insert($data2);

                $req_perso20 = DB::table('dominations')->where('accomodant_id', '=', $req_perso19->id)->first();
                echo "Success";
              }
              else{
                echo "Impossible to insert data";
              }
              break;
            case '5. Accomodant(e) / Meneur(se)' :
              $req_perso17 = DB::table('accomodantes')->where('nom', '=', $documents_span[237]->nodeValue)->first();
              $req_perso17a = DB::table('conformistes')->where('nom', '=', $documents_span[241]->nodeValue)->first();
              $req_perso17b = DB::table('tacts')->where('nom', '=', $documents_span[243]->nodeValue)->first();
              $req_perso17c = DB::table('defends')->where('nom', '=', $documents_span[250]->nodeValue)->first();
              $req_perso17d = DB::table('independants')->where('nom', '=', $documents_span[253]->nodeValue)->first();
              $req_perso17e = DB::table('directs')->where('nom', '=', $documents_span[255]->nodeValue)->first();
              if ((is_null($req_perso17)) && (is_null($req_perso17a)) && (is_null($req_perso17b)) && (is_null($req_perso17c)) && (is_null($req_perso17d)) && (is_null($req_perso17e))) {
                $data = array('score'=>$documents_span[238]->nodeValue,'nom'=>$documents_span[237]->nodeValue);
                DB::table('accomodantes')->insert($data);
                $data = array('score'=>$documents_span[240]->nodeValue,'nom'=>$documents_span[241]->nodeValue);
                DB::table('conformistes')->insert($data);
                $data = array('score'=>$documents_span[244]->nodeValue,'nom'=>$documents_span[243]->nodeValue);
                DB::table('tacts')->insert($data);
                $data = array('score'=>$documents_span[251]->nodeValue,'nom'=>$documents_span[250]->nodeValue);
                DB::table('defends')->insert($data);
                $data = array('score'=>$documents_span[254]->nodeValue,'nom'=>$documents_span[253]->nodeValue);
                DB::table('independants')->insert($data);
                $data = array('score'=>$documents_span[256]->nodeValue,'nom'=>$documents_span[255]->nodeValue);
                DB::table('directs')->insert($data);

                $req_perso18 = DB::table('accomodantes')->where('nom', '=', $documents_span[237]->nodeValue)->first();
                $req_perso18a = DB::table('conformistes')->where('nom', '=', $documents_span[241]->nodeValue)->first();
                $req_perso18b = DB::table('tacts')->where('nom', '=', $documents_span[243]->nodeValue)->first();
                $req_perso18c = DB::table('defends')->where('nom', '=', $documents_span[250]->nodeValue)->first();
                $req_perso18d = DB::table('independants')->where('nom', '=', $documents_span[253]->nodeValue)->first();
                $req_perso18e = DB::table('directs')->where('nom', '=', $documents_span[255]->nodeValue)->first();
                //$user->aventureux()->attach($req_perso2->id);
                $data1 = array('accomodante_id'=>$req_perso18->id,'conformiste_id'=>$req_perso18a->id,'tact_id'=>$req_perso18b->id,'score'=>$documents_span[236]->nodeValue,'nom'=>$documents_span[235]->nodeValue);
                DB::table('accomodants')->insert($data1);
                $data1 = array('defend_id'=>$req_perso18c->id,'independant_id'=>$req_perso18d->id,'direct_id'=>$req_perso18e->id,'score'=>$documents_span[247]->nodeValue,'nom'=>$documents_span[246]->nodeValue);
                DB::table('meneurs')->insert($data1);

                $req_perso19 = DB::table('accomodants')->where('accomodante_id', '=', $req_perso18->id)->first();
                $req_perso19a = DB::table('meneurs')->where('defend_id', '=', $req_perso18c->id)->first();
                $data2 = array('contenu'=>$documents[21]->nodeValue,'accomodant_id'=>$req_perso19->id,'meneur_id'=>$req_perso19a->id,'nom'=>$bath[6]->nodeValue);
                DB::table('dominations')->insert($data2);

                $req_perso20 = DB::table('dominations')->where('accomodant_id', '=', $req_perso19->id)->first();
                echo "Success";
              }
              else{
                echo "Impossible to insert data";
              }
              break;
            case '6. Non-structuré(e)' :
              $req_perso21 = DB::table('improvisateurs')->where('nom', '=', $documents_span[279]->nodeValue)->first();
              $req_perso21a = DB::table('spontanes')->where('nom', '=', $documents_span[282]->nodeValue)->first();
              $req_perso21b = DB::table('nonchalants')->where('nom', '=', $documents_span[285]->nodeValue)->first();
              if ((is_null($req_perso21)) && (is_null($req_perso21a)) && (is_null($req_perso21b))) {
                $data = array('score'=>$documents_span[278]->nodeValue,'nom'=>$documents_span[279]->nodeValue);
                DB::table('improvisateurs')->insert($data);
                $data = array('score'=>$documents_span[281]->nodeValue,'nom'=>$documents_span[282]->nodeValue);
                DB::table('spontanes')->insert($data);
                $data = array('score'=>$documents_span[284]->nodeValue,'nom'=>$documents_span[285]->nodeValue);
                DB::table('nonchalants')->insert($data);

                $req_perso22 = DB::table('improvisateurs')->where('nom', '=', $documents_span[279]->nodeValue)->first();
                $req_perso22a = DB::table('spontanes')->where('nom', '=', $documents_span[282]->nodeValue)->first();
                $req_perso22b = DB::table('nonchalants')->where('nom', '=', $documents_span[285]->nodeValue)->first();
                //$user->aventureux()->attach($req_perso2->id);
                $data1 = array('improvisateur_id'=>$req_perso22->id,'spontane_id'=>$req_perso22a->id,'nonchalant_id'=>$req_perso22b->id,'score'=>$documents_span[274]->nodeValue,'nom'=>$documents_span[275]->nodeValue);
                DB::table('nonstructures')->insert($data1);

                $req_perso23 = DB::table('nonstructures')->where('improvisateur_id', '=', $req_perso22->id)->first();
                $data2 = array('contenu'=>$documents[21]->nodeValue,'nonstructure_id'=>$req_perso23->id,'nom'=>$bath[7]->nodeValue);
                DB::table('conscience_pros')->insert($data2);

                $req_perso24 = DB::table('conscience_pros')->where('nonstructure_id', '=', $req_perso23->id)->first();
                //$req_persoX = DB::table('personnalite_user')->where('aventure_id', '=', $req_perso4->id)->first();

                $data3 = array('user_id'=>$user->id,'aventure_id'=>$req_perso4->id,'innovation_id'=>$req_perso8->id,'dimension_compassion_id'=>$req_perso12->id,'extraversion_id'=>$req_perso16->id,'domination_id'=>$req_perso20->id,'conscience_pro_id'=>$req_perso24->id);
                DB::table('personnalite_user')->insert($data3);
                echo "added";
              }
              else{
                echo "Impossible to insert data";
              }
              break;
            case '6. Consciencieux(se)' :
              $req_perso21 = DB::table('precis')->where('nom', '=', $documents_span[288]->nodeValue)->first();
              $req_perso21a = DB::table('organises')->where('nom', '=', $documents_span[290]->nodeValue)->first();
              $req_perso21b = DB::table('performants')->where('nom', '=', $documents_span[292]->nodeValue)->first();
              if ((is_null($req_perso21)) && (is_null($req_perso21a)) && (is_null($req_perso21b))) {
                $data = array('score'=>$documents_span[289]->nodeValue,'nom'=>$documents_span[288]->nodeValue);
                DB::table('precis')->insert($data);
                $data = array('score'=>$documents_span[291]->nodeValue,'nom'=>$documents_span[290]->nodeValue);
                DB::table('organises')->insert($data);
                $data = array('score'=>$documents_span[293]->nodeValue,'nom'=>$documents_span[292]->nodeValue);
                DB::table('performants')->insert($data);

                $req_perso22 = DB::table('precis')->where('nom', '=', $documents_span[288]->nodeValue)->first();
                $req_perso22a = DB::table('organises')->where('nom', '=', $documents_span[290]->nodeValue)->first();
                $req_perso22b = DB::table('performants')->where('nom', '=', $documents_span[292]->nodeValue)->first();
                //$user->aventureux()->attach($req_perso2->id);
                $data1 = array('precis_id'=>$req_perso22->id,'organise_id'=>$req_perso22a->id,'performant_id'=>$req_perso22b->id,'score'=>$documents_span[287]->nodeValue,'nom'=>$documents_span[286]->nodeValue);
                DB::table('consciencieux')->insert($data1);

                $req_perso23 = DB::table('consciencieux')->where('precis_id', '=', $req_perso22->id)->first();
                $data2 = array('contenu'=>$documents[21]->nodeValue,'consciencieux_id'=>$req_perso23->id,'nom'=>$bath[7]->nodeValue);
                DB::table('conscience_pros')->insert($data2);

                $req_perso24 = DB::table('conscience_pros')->where('consciencieux_id', '=', $req_perso23->id)->first();

                $data3 = array('user_id'=>$user->id,'aventure_id'=>$req_perso4->id,'innovation_id'=>$req_perso8->id,'dimension_compassion_id'=>$req_perso12->id,'extraversion_id'=>$req_perso16->id,'domination_id'=>$req_perso20->id,'conscience_pro_id'=>$req_perso24->id);
                DB::table('personnalite_user')->insert($data3);
                echo "added";
              }
              else{
                echo "Impossible to insert data";
              }
              break;
            case '6. Non-structuré(e) / Consciencieux(se)' :
              $req_perso21 = DB::table('improvisateurs')->where('nom', '=', $documents_span[279]->nodeValue)->first();
              $req_perso21a = DB::table('spontanes')->where('nom', '=', $documents_span[282]->nodeValue)->first();
              $req_perso21b = DB::table('nonchalants')->where('nom', '=', $documents_span[285]->nodeValue)->first();
              $req_perso21c = DB::table('precis')->where('nom', '=', $documents_span[288]->nodeValue)->first();
              $req_perso21d = DB::table('organises')->where('nom', '=', $documents_span[290]->nodeValue)->first();
              $req_perso21e = DB::table('performants')->where('nom', '=', $documents_span[292]->nodeValue)->first();
              if ((is_null($req_perso21)) && (is_null($req_perso21a)) && (is_null($req_perso21b)) && (is_null($req_perso21c)) && (is_null($req_perso21d)) && (is_null($req_perso21e))) {
                $data = array('score'=>$documents_span[278]->nodeValue,'nom'=>$documents_span[279]->nodeValue);
                DB::table('improvisateurs')->insert($data);
                $data = array('score'=>$documents_span[281]->nodeValue,'nom'=>$documents_span[282]->nodeValue);
                DB::table('spontanes')->insert($data);
                $data = array('score'=>$documents_span[284]->nodeValue,'nom'=>$documents_span[285]->nodeValue);
                DB::table('nonchalants')->insert($data);
                $data = array('score'=>$documents_span[289]->nodeValue,'nom'=>$documents_span[288]->nodeValue);
                DB::table('precis')->insert($data);
                $data = array('score'=>$documents_span[291]->nodeValue,'nom'=>$documents_span[290]->nodeValue);
                DB::table('organises')->insert($data);
                $data = array('score'=>$documents_span[293]->nodeValue,'nom'=>$documents_span[292]->nodeValue);
                DB::table('performants')->insert($data);

                $req_perso22 = DB::table('improvisateurs')->where('nom', '=', $documents_span[279]->nodeValue)->first();
                $req_perso22a = DB::table('spontanes')->where('nom', '=', $documents_span[282]->nodeValue)->first();
                $req_perso22b = DB::table('nonchalants')->where('nom', '=', $documents_span[285]->nodeValue)->first();
                $req_perso22c = DB::table('precis')->where('nom', '=', $documents_span[288]->nodeValue)->first();
                $req_perso22d = DB::table('organises')->where('nom', '=', $documents_span[290]->nodeValue)->first();
                $req_perso22e = DB::table('performants')->where('nom', '=', $documents_span[292]->nodeValue)->first();
                //$user->aventureux()->attach($req_perso2->id);
                $data1 = array('improvisateur_id'=>$req_perso22->id,'spontane_id'=>$req_perso22a->id,'nonchalant_id'=>$req_perso22b->id,'score'=>$documents_span[274]->nodeValue,'nom'=>$documents_span[275]->nodeValue);
                DB::table('nonstructures')->insert($data1);
                $data1 = array('precis_id'=>$req_perso22c->id,'organise_id'=>$req_perso22d->id,'performant_id'=>$req_perso22e->id,'score'=>$documents_span[287]->nodeValue,'nom'=>$documents_span[286]->nodeValue);
                DB::table('consciencieux')->insert($data1);

                $req_perso23 = DB::table('nonstructures')->where('improvisateur_id', '=', $req_perso22->id)->first();
                $req_perso23a = DB::table('consciencieux')->where('precis_id', '=', $req_perso22c->id)->first();
                $data2 = array('contenu'=>$documents[21]->nodeValue,'nonstructure_id'=>$req_perso23->id,'consciencieux_id'=>$req_perso23a->id,'nom'=>$bath[7]->nodeValue);
                DB::table('conscience_pros')->insert($data2);

                $req_perso24 = DB::table('conscience_pros')->where('nonstructure_id', '=', $req_perso23->id)->first();

                $data3 = array('user_id'=>$user->id,'aventure_id'=>$req_perso4->id,'innovation_id'=>$req_perso8->id,'dimension_compassion_id'=>$req_perso12->id,'extraversion_id'=>$req_perso16->id,'domination_id'=>$req_perso20->id,'conscience_pro_id'=>$req_perso24->id);
                DB::table('personnalite_user')->insert($data3);
                echo "added";
              }
              else{
                echo "Impossible to insert data";
              }



        }
      }
      /*if($bath[2]->nodeValue == "1. Aventureux(se)"){
        if($bath[3]->nodeValue == "2. Innovateur(trice)"){
          if($bath[4]->nodeValue == "3. Plein(e) de compassion"){
            if($bath[5]->nodeValue == "4. Extraverti(e)"){
              if($bath[6]->nodeValue == "5. Meneur(se)"){
                if($bath[7]->nodeValue == "6. Non-structuré(e)"){
                  $req_perso1 = DB::table('aventureux')->where('nom', '=', $bath[2]->nodeValue)->first();
                  $req_perso2 = DB::table('innovateurs')->where('nom', '=', $bath[3]->nodeValue)->first();
                  $req_perso3 = DB::table('compassions')->where('nom', '=', $bath[4]->nodeValue)->first();
                  $req_perso4 = DB::table('extravertis')->where('nom', '=', $bath[5]->nodeValue)->first();
                  $req_perso5 = DB::table('meneurs')->where('nom', '=', $bath[6]->nodeValue)->first();
                  $req_perso6 = DB::table('nonstructures')->where('nom', '=', $bath[7]->nodeValue)->first();
                  if ((is_null($req_perso1)) && (is_null($req_perso2)) && (is_null($req_perso3)) && (is_null($req_perso4)) && (is_null($req_perso5)) && (is_null($req_perso6))) {
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[2]->nodeValue);
                    DB::table('aventureux')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[3]->nodeValue);
                    DB::table('innovateurs')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[4]->nodeValue);
                    DB::table('compassions')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[5]->nodeValue);
                    DB::table('extravertis')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[6]->nodeValue);
                    DB::table('meneurs')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[7]->nodeValue);
                    DB::table('nonstructures')->insert($data);

                    $req_perso7 = DB::table('aventureux')->where('nom', '=', $bath[2]->nodeValue)->first();
                    $req_perso8 = DB::table('innovateurs')->where('nom', '=', $bath[3]->nodeValue)->first();
                    $req_perso9 = DB::table('compassions')->where('nom', '=', $bath[4]->nodeValue)->first();
                    $req_perso10 = DB::table('extravertis')->where('nom', '=', $bath[5]->nodeValue)->first();
                    $req_perso11 = DB::table('meneurs')->where('nom', '=', $bath[6]->nodeValue)->first();
                    $req_perso12 = DB::table('nonstructures')->where('nom', '=', $bath[7]->nodeValue)->first();
                    //$user->personnalite()->attach($req_perso2->id);
                    $data1 = array('user_id'=>$user->id,'aventureux_id'=>$req_perso7->id,'innovateur_id'=>$req_perso8->id,'compassion_id'=>$req_perso9->id,'extraverti_id'=>$req_perso10->id,'meneur_id'=>$req_perso11->id,'nonstructure_id'=>$req_perso12->id);
                    DB::table('personnalite_user')->insert($data1);

                    echo "Success";
                  }
                  else{
                    echo "Impossible to insert data";
                  }
                }
              }
            }
          }
        }
      }
      if($bath[2]->nodeValue == "1. Aventureux(se)"){
        if($bath[3]->nodeValue == "2. Conventionnel(le)"){
          if($bath[4]->nodeValue == "3. Plein(e) de compassion"){
            if($bath[5]->nodeValue == "4. Extraverti(e)"){
              if($bath[6]->nodeValue == "5. Meneur(se)"){
                if($bath[7]->nodeValue == "6. Non-structuré(e)"){
                  $req_perso1 = DB::table('aventureux')->where('nom', '=', $bath[2]->nodeValue)->first();
                  $req_perso2 = DB::table('conventionnels')->where('nom', '=', $bath[3]->nodeValue)->first();
                  $req_perso3 = DB::table('compassions')->where('nom', '=', $bath[4]->nodeValue)->first();
                  $req_perso4 = DB::table('extravertis')->where('nom', '=', $bath[5]->nodeValue)->first();
                  $req_perso5 = DB::table('meneurs')->where('nom', '=', $bath[6]->nodeValue)->first();
                  $req_perso6 = DB::table('nonstructures')->where('nom', '=', $bath[7]->nodeValue)->first();
                  if ((is_null($req_perso1)) && (is_null($req_perso2)) && (is_null($req_perso3)) && (is_null($req_perso4)) && (is_null($req_perso5)) && (is_null($req_perso6))) {
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[2]->nodeValue);
                    DB::table('aventureux')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[3]->nodeValue);
                    DB::table('conventionnels')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[4]->nodeValue);
                    DB::table('compassions')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[5]->nodeValue);
                    DB::table('extravertis')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[6]->nodeValue);
                    DB::table('meneurs')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[7]->nodeValue);
                    DB::table('nonstructures')->insert($data);

                    $req_perso7 = DB::table('aventureux')->where('nom', '=', $bath[2]->nodeValue)->first();
                    $req_perso8 = DB::table('conventionnels')->where('nom', '=', $bath[3]->nodeValue)->first();
                    $req_perso9 = DB::table('compassions')->where('nom', '=', $bath[4]->nodeValue)->first();
                    $req_perso10 = DB::table('extravertis')->where('nom', '=', $bath[5]->nodeValue)->first();
                    $req_perso11 = DB::table('meneurs')->where('nom', '=', $bath[6]->nodeValue)->first();
                    $req_perso12 = DB::table('nonstructures')->where('nom', '=', $bath[7]->nodeValue)->first();
                    //$user->personnalite()->attach($req_perso2->id);
                    $data1 = array('user_id'=>$user->id,'aventureux_id'=>$req_perso7->id,'conventionnel_id'=>$req_perso8->id,'compassion_id'=>$req_perso9->id,'extraverti_id'=>$req_perso10->id,'meneur_id'=>$req_perso11->id,'nonstructure_id'=>$req_perso12->id);
                    DB::table('personnalite_user')->insert($data1);

                    echo "Success";
                  }
                  else{
                    echo "Impossible to insert data";
                  }
                }
              }
            }
          }
        }
      }
      if($bath[2]->nodeValue == "1. Aventureux(se)"){
        if($bath[3]->nodeValue == "2. Conventionnel(le)"){
          if($bath[4]->nodeValue == "3. Détaché(e)"){
            if($bath[5]->nodeValue == "4. Extraverti(e)"){
              if($bath[6]->nodeValue == "5. Meneur(se)"){
                if($bath[7]->nodeValue == "6. Non-structuré(e)"){
                  $req_perso1 = DB::table('aventureux')->where('nom', '=', $bath[2]->nodeValue)->first();
                  $req_perso2 = DB::table('conventionnels')->where('nom', '=', $bath[3]->nodeValue)->first();
                  $req_perso3 = DB::table('detaches')->where('nom', '=', $bath[4]->nodeValue)->first();
                  $req_perso4 = DB::table('extravertis')->where('nom', '=', $bath[5]->nodeValue)->first();
                  $req_perso5 = DB::table('meneurs')->where('nom', '=', $bath[6]->nodeValue)->first();
                  $req_perso6 = DB::table('nonstructures')->where('nom', '=', $bath[7]->nodeValue)->first();
                  if ((is_null($req_perso1)) && (is_null($req_perso2)) && (is_null($req_perso3)) && (is_null($req_perso4)) && (is_null($req_perso5)) && (is_null($req_perso6))) {
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[2]->nodeValue);
                    DB::table('aventureux')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[3]->nodeValue);
                    DB::table('conventionnels')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[4]->nodeValue);
                    DB::table('detaches')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[5]->nodeValue);
                    DB::table('extravertis')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[6]->nodeValue);
                    DB::table('meneurs')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[7]->nodeValue);
                    DB::table('nonstructures')->insert($data);

                    $req_perso7 = DB::table('aventureux')->where('nom', '=', $bath[2]->nodeValue)->first();
                    $req_perso8 = DB::table('conventionnels')->where('nom', '=', $bath[3]->nodeValue)->first();
                    $req_perso9 = DB::table('detaches')->where('nom', '=', $bath[4]->nodeValue)->first();
                    $req_perso10 = DB::table('extravertis')->where('nom', '=', $bath[5]->nodeValue)->first();
                    $req_perso11 = DB::table('meneurs')->where('nom', '=', $bath[6]->nodeValue)->first();
                    $req_perso12 = DB::table('nonstructures')->where('nom', '=', $bath[7]->nodeValue)->first();
                    //$user->personnalite()->attach($req_perso2->id);
                    $data1 = array('user_id'=>$user->id,'aventureux_id'=>$req_perso7->id,'conventionnel_id'=>$req_perso8->id,'detache_id'=>$req_perso9->id,'extraverti_id'=>$req_perso10->id,'meneur_id'=>$req_perso11->id,'nonstructure_id'=>$req_perso12->id);
                    DB::table('personnalite_user')->insert($data1);

                    echo "Success";
                  }
                  else{
                    echo "Impossible to insert data";
                  }
                }
              }
            }
          }
        }
      }
      if($bath[2]->nodeValue == "1. Aventureux(se)"){
        if($bath[3]->nodeValue == "2. Conventionnel(le)"){
          if($bath[4]->nodeValue == "3. Détaché(e)"){
            if($bath[5]->nodeValue == "4. Introverti(e)"){
              if($bath[6]->nodeValue == "5. Meneur(se)"){
                if($bath[7]->nodeValue == "6. Non-structuré(e)"){
                  $req_perso1 = DB::table('aventureux')->where('nom', '=', $bath[2]->nodeValue)->first();
                  $req_perso2 = DB::table('conventionnels')->where('nom', '=', $bath[3]->nodeValue)->first();
                  $req_perso3 = DB::table('detaches')->where('nom', '=', $bath[4]->nodeValue)->first();
                  $req_perso4 = DB::table('introvertis')->where('nom', '=', $bath[5]->nodeValue)->first();
                  $req_perso5 = DB::table('meneurs')->where('nom', '=', $bath[6]->nodeValue)->first();
                  $req_perso6 = DB::table('nonstructures')->where('nom', '=', $bath[7]->nodeValue)->first();
                  if ((is_null($req_perso1)) && (is_null($req_perso2)) && (is_null($req_perso3)) && (is_null($req_perso4)) && (is_null($req_perso5)) && (is_null($req_perso6))) {
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[2]->nodeValue);
                    DB::table('aventureux')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[3]->nodeValue);
                    DB::table('conventionnels')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[4]->nodeValue);
                    DB::table('detaches')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[5]->nodeValue);
                    DB::table('introvertis')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[6]->nodeValue);
                    DB::table('meneurs')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[7]->nodeValue);
                    DB::table('nonstructures')->insert($data);

                    $req_perso7 = DB::table('aventureux')->where('nom', '=', $bath[2]->nodeValue)->first();
                    $req_perso8 = DB::table('conventionnels')->where('nom', '=', $bath[3]->nodeValue)->first();
                    $req_perso9 = DB::table('detaches')->where('nom', '=', $bath[4]->nodeValue)->first();
                    $req_perso10 = DB::table('introvertis')->where('nom', '=', $bath[5]->nodeValue)->first();
                    $req_perso11 = DB::table('meneurs')->where('nom', '=', $bath[6]->nodeValue)->first();
                    $req_perso12 = DB::table('nonstructures')->where('nom', '=', $bath[7]->nodeValue)->first();
                    //$user->personnalite()->attach($req_perso2->id);
                    $data1 = array('user_id'=>$user->id,'aventureux_id'=>$req_perso7->id,'conventionnel_id'=>$req_perso8->id,'detache_id'=>$req_perso9->id,'introverti_id'=>$req_perso10->id,'meneur_id'=>$req_perso11->id,'nonstructure_id'=>$req_perso12->id);
                    DB::table('personnalite_user')->insert($data1);

                    echo "Success";
                  }
                  else{
                    echo "Impossible to insert data";
                  }
                }
              }
            }
          }
        }
      }
      if($bath[2]->nodeValue == "1. Aventureux(se)"){
        if($bath[3]->nodeValue == "2. Conventionnel(le)"){
          if($bath[4]->nodeValue == "3. Détaché(e)"){
            if($bath[5]->nodeValue == "4. Introverti(e)"){
              if($bath[6]->nodeValue == "5. Accomodant(e)"){
                if($bath[7]->nodeValue == "6. Non-structuré(e)"){
                  $req_perso1 = DB::table('aventureux')->where('nom', '=', $bath[2]->nodeValue)->first();
                  $req_perso2 = DB::table('conventionnels')->where('nom', '=', $bath[3]->nodeValue)->first();
                  $req_perso3 = DB::table('detaches')->where('nom', '=', $bath[4]->nodeValue)->first();
                  $req_perso4 = DB::table('introvertis')->where('nom', '=', $bath[5]->nodeValue)->first();
                  $req_perso5 = DB::table('accomodants')->where('nom', '=', $bath[6]->nodeValue)->first();
                  $req_perso6 = DB::table('nonstructures')->where('nom', '=', $bath[7]->nodeValue)->first();
                  if ((is_null($req_perso1)) && (is_null($req_perso2)) && (is_null($req_perso3)) && (is_null($req_perso4)) && (is_null($req_perso5)) && (is_null($req_perso6))) {
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[2]->nodeValue);
                    DB::table('aventureux')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[3]->nodeValue);
                    DB::table('conventionnels')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[4]->nodeValue);
                    DB::table('detaches')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[5]->nodeValue);
                    DB::table('introvertis')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[6]->nodeValue);
                    DB::table('accomodants')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[7]->nodeValue);
                    DB::table('nonstructures')->insert($data);

                    $req_perso7 = DB::table('aventureux')->where('nom', '=', $bath[2]->nodeValue)->first();
                    $req_perso8 = DB::table('conventionnels')->where('nom', '=', $bath[3]->nodeValue)->first();
                    $req_perso9 = DB::table('detaches')->where('nom', '=', $bath[4]->nodeValue)->first();
                    $req_perso10 = DB::table('introvertis')->where('nom', '=', $bath[5]->nodeValue)->first();
                    $req_perso11 = DB::table('accomodants')->where('nom', '=', $bath[6]->nodeValue)->first();
                    $req_perso12 = DB::table('nonstructures')->where('nom', '=', $bath[7]->nodeValue)->first();
                    //$user->personnalite()->attach($req_perso2->id);
                    $data1 = array('user_id'=>$user->id,'aventureux_id'=>$req_perso7->id,'conventionnel_id'=>$req_perso8->id,'detache_id'=>$req_perso9->id,'introverti_id'=>$req_perso10->id,'accomodant_id'=>$req_perso11->id,'nonstructure_id'=>$req_perso12->id);
                    DB::table('personnalite_user')->insert($data1);

                    echo "Success";
                  }
                  else{
                    echo "Impossible to insert data";
                  }
                }
              }
            }
          }
        }
      }
      if($bath[2]->nodeValue == "1. Aventureux(se)"){
        if($bath[3]->nodeValue == "2. Conventionnel(le)"){
          if($bath[4]->nodeValue == "3. Détaché(e)"){
            if($bath[5]->nodeValue == "4. Introverti(e)"){
              if($bath[6]->nodeValue == "5. Meneur(se)"){
                if($bath[7]->nodeValue == "6. Consciencieux(se)"){
                  $req_perso1 = DB::table('aventureux')->where('nom', '=', $bath[2]->nodeValue)->first();
                  $req_perso2 = DB::table('conventionnels')->where('nom', '=', $bath[3]->nodeValue)->first();
                  $req_perso3 = DB::table('detaches')->where('nom', '=', $bath[4]->nodeValue)->first();
                  $req_perso4 = DB::table('introvertis')->where('nom', '=', $bath[5]->nodeValue)->first();
                  $req_perso5 = DB::table('meneurs')->where('nom', '=', $bath[6]->nodeValue)->first();
                  $req_perso6 = DB::table('consciencieux')->where('nom', '=', $bath[7]->nodeValue)->first();
                  if ((is_null($req_perso1)) && (is_null($req_perso2)) && (is_null($req_perso3)) && (is_null($req_perso4)) && (is_null($req_perso5)) && (is_null($req_perso6))) {
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[2]->nodeValue);
                    DB::table('aventureux')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[3]->nodeValue);
                    DB::table('conventionnels')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[4]->nodeValue);
                    DB::table('detaches')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[5]->nodeValue);
                    DB::table('introvertis')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[6]->nodeValue);
                    DB::table('meneurs')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[7]->nodeValue);
                    DB::table('consciencieux')->insert($data);

                    $req_perso7 = DB::table('aventureux')->where('nom', '=', $bath[2]->nodeValue)->first();
                    $req_perso8 = DB::table('conventionnels')->where('nom', '=', $bath[3]->nodeValue)->first();
                    $req_perso9 = DB::table('detaches')->where('nom', '=', $bath[4]->nodeValue)->first();
                    $req_perso10 = DB::table('introvertis')->where('nom', '=', $bath[5]->nodeValue)->first();
                    $req_perso11 = DB::table('meneurs')->where('nom', '=', $bath[6]->nodeValue)->first();
                    $req_perso12 = DB::table('consciencieux')->where('nom', '=', $bath[7]->nodeValue)->first();
                    //$user->personnalite()->attach($req_perso2->id);
                    $data1 = array('user_id'=>$user->id,'aventureux_id'=>$req_perso7->id,'conventionnel_id'=>$req_perso8->id,'detache_id'=>$req_perso9->id,'introverti_id'=>$req_perso10->id,'meneur_id'=>$req_perso11->id,'consciencieux_id'=>$req_perso12->id);
                    DB::table('personnalite_user')->insert($data1);

                    echo "Success";
                  }
                  else{
                    echo "Impossible to insert data";
                  }
                }
              }
            }
          }
        }
      }
      if($bath[2]->nodeValue == "1. Aventureux(se)"){
        if($bath[3]->nodeValue == "2. Conventionnel(le)"){
          if($bath[4]->nodeValue == "3. Détaché(e)"){
            if($bath[5]->nodeValue == "4. Introverti(e)"){
              if($bath[6]->nodeValue == "5. Accomodant(e)"){
                if($bath[7]->nodeValue == "6. Consciencieux(se)"){
                  $req_perso1 = DB::table('aventureux')->where('nom', '=', $bath[2]->nodeValue)->first();
                  $req_perso2 = DB::table('conventionnels')->where('nom', '=', $bath[3]->nodeValue)->first();
                  $req_perso3 = DB::table('detaches')->where('nom', '=', $bath[4]->nodeValue)->first();
                  $req_perso4 = DB::table('introvertis')->where('nom', '=', $bath[5]->nodeValue)->first();
                  $req_perso5 = DB::table('accomodants')->where('nom', '=', $bath[6]->nodeValue)->first();
                  $req_perso6 = DB::table('consciencieux')->where('nom', '=', $bath[7]->nodeValue)->first();
                  if ((is_null($req_perso1)) && (is_null($req_perso2)) && (is_null($req_perso3)) && (is_null($req_perso4)) && (is_null($req_perso5)) && (is_null($req_perso6))) {
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[2]->nodeValue);
                    DB::table('aventureux')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[3]->nodeValue);
                    DB::table('conventionnels')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[4]->nodeValue);
                    DB::table('detaches')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[5]->nodeValue);
                    DB::table('introvertis')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[6]->nodeValue);
                    DB::table('accomodants')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[7]->nodeValue);
                    DB::table('consciencieux')->insert($data);

                    $req_perso7 = DB::table('aventureux')->where('nom', '=', $bath[2]->nodeValue)->first();
                    $req_perso8 = DB::table('conventionnels')->where('nom', '=', $bath[3]->nodeValue)->first();
                    $req_perso9 = DB::table('detaches')->where('nom', '=', $bath[4]->nodeValue)->first();
                    $req_perso10 = DB::table('introvertis')->where('nom', '=', $bath[5]->nodeValue)->first();
                    $req_perso11 = DB::table('meneurs')->where('nom', '=', $bath[6]->nodeValue)->first();
                    $req_perso12 = DB::table('consciencieux')->where('nom', '=', $bath[7]->nodeValue)->first();
                    //$user->personnalite()->attach($req_perso2->id);
                    $data1 = array('user_id'=>$user->id,'aventureux_id'=>$req_perso7->id,'conventionnel_id'=>$req_perso8->id,'detache_id'=>$req_perso9->id,'introverti_id'=>$req_perso10->id,'accomodant_id'=>$req_perso11->id,'consciencieux_id'=>$req_perso12->id);
                    DB::table('personnalite_user')->insert($data1);

                    echo "Success";
                  }
                  else{
                    echo "Impossible to insert data";
                  }
                }
              }
            }
          }
        }
      }
      if($bath[2]->nodeValue == "1. Aventureux(se)"){
        if($bath[3]->nodeValue == "2. Conventionnel(le)"){
          if($bath[4]->nodeValue == "3. Détaché(e)"){
            if($bath[5]->nodeValue == "4. Extraverti(e)"){
              if($bath[6]->nodeValue == "5. Accomodant(e)"){
                if($bath[7]->nodeValue == "6. Non-structuré(e)"){
                  $req_perso1 = DB::table('aventureux')->where('nom', '=', $bath[2]->nodeValue)->first();
                  $req_perso2 = DB::table('conventionnels')->where('nom', '=', $bath[3]->nodeValue)->first();
                  $req_perso3 = DB::table('detaches')->where('nom', '=', $bath[4]->nodeValue)->first();
                  $req_perso4 = DB::table('extravertis')->where('nom', '=', $bath[5]->nodeValue)->first();
                  $req_perso5 = DB::table('accomodants')->where('nom', '=', $bath[6]->nodeValue)->first();
                  $req_perso6 = DB::table('nonstructures')->where('nom', '=', $bath[7]->nodeValue)->first();
                  if ((is_null($req_perso1)) && (is_null($req_perso2)) && (is_null($req_perso3)) && (is_null($req_perso4)) && (is_null($req_perso5)) && (is_null($req_perso6))) {
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[2]->nodeValue);
                    DB::table('aventureux')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[3]->nodeValue);
                    DB::table('conventionnels')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[4]->nodeValue);
                    DB::table('detaches')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[5]->nodeValue);
                    DB::table('extravertis')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[6]->nodeValue);
                    DB::table('accomodants')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[7]->nodeValue);
                    DB::table('nonstructures')->insert($data);

                    $req_perso7 = DB::table('aventureux')->where('nom', '=', $bath[2]->nodeValue)->first();
                    $req_perso8 = DB::table('conventionnels')->where('nom', '=', $bath[3]->nodeValue)->first();
                    $req_perso9 = DB::table('detaches')->where('nom', '=', $bath[4]->nodeValue)->first();
                    $req_perso10 = DB::table('introvertis')->where('nom', '=', $bath[5]->nodeValue)->first();
                    $req_perso11 = DB::table('meneurs')->where('nom', '=', $bath[6]->nodeValue)->first();
                    $req_perso12 = DB::table('nonstructures')->where('nom', '=', $bath[7]->nodeValue)->first();
                    //$user->personnalite()->attach($req_perso2->id);
                    $data1 = array('user_id'=>$user->id,'aventureux_id'=>$req_perso7->id,'conventionnel_id'=>$req_perso8->id,'detache_id'=>$req_perso9->id,'introverti_id'=>$req_perso10->id,'accomodant_id'=>$req_perso11->id,'nonstructure_id'=>$req_perso12->id);
                    DB::table('personnalite_user')->insert($data1);

                    echo "Success";
                  }
                  else{
                    echo "Impossible to insert data";
                  }
                }
              }
            }
          }
        }
      }
      if($bath[2]->nodeValue == "1. Aventureux(se)"){
        if($bath[3]->nodeValue == "2. Conventionnel(le)"){
          if($bath[4]->nodeValue == "3. Détaché(e)"){
            if($bath[5]->nodeValue == "4. Extraverti(e)"){
              if($bath[6]->nodeValue == "5. Accomodant(e)"){
                if($bath[7]->nodeValue == "6. Consciencieux(se)"){
                  $req_perso1 = DB::table('aventureux')->where('nom', '=', $bath[2]->nodeValue)->first();
                  $req_perso2 = DB::table('conventionnels')->where('nom', '=', $bath[3]->nodeValue)->first();
                  $req_perso3 = DB::table('detaches')->where('nom', '=', $bath[4]->nodeValue)->first();
                  $req_perso4 = DB::table('introvertis')->where('nom', '=', $bath[5]->nodeValue)->first();
                  $req_perso5 = DB::table('meneurs')->where('nom', '=', $bath[6]->nodeValue)->first();
                  $req_perso6 = DB::table('consciencieux')->where('nom', '=', $bath[7]->nodeValue)->first();
                  if ((is_null($req_perso1)) && (is_null($req_perso2)) && (is_null($req_perso3)) && (is_null($req_perso4)) && (is_null($req_perso5)) && (is_null($req_perso6))) {
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[2]->nodeValue);
                    DB::table('aventureux')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[3]->nodeValue);
                    DB::table('conventionnels')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[4]->nodeValue);
                    DB::table('detaches')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[5]->nodeValue);
                    DB::table('introvertis')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[6]->nodeValue);
                    DB::table('meneurs')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[7]->nodeValue);
                    DB::table('consciencieux')->insert($data);

                    $req_perso7 = DB::table('aventureux')->where('nom', '=', $bath[2]->nodeValue)->first();
                    $req_perso8 = DB::table('conventionnels')->where('nom', '=', $bath[3]->nodeValue)->first();
                    $req_perso9 = DB::table('detaches')->where('nom', '=', $bath[4]->nodeValue)->first();
                    $req_perso10 = DB::table('introvertis')->where('nom', '=', $bath[5]->nodeValue)->first();
                    $req_perso11 = DB::table('meneurs')->where('nom', '=', $bath[6]->nodeValue)->first();
                    $req_perso12 = DB::table('consciencieux')->where('nom', '=', $bath[7]->nodeValue)->first();
                    //$user->personnalite()->attach($req_perso2->id);
                    $data1 = array('user_id'=>$user->id,'aventureux_id'=>$req_perso7->id,'conventionnel_id'=>$req_perso8->id,'detache_id'=>$req_perso9->id,'introverti_id'=>$req_perso10->id,'meneur_id'=>$req_perso11->id,'consciencieux_id'=>$req_perso12->id);
                    DB::table('personnalite_user')->insert($data1);

                    echo "Success";
                  }
                  else{
                    echo "Impossible to insert data";
                  }
                }
              }
            }
          }
        }
      }
      if($bath[2]->nodeValue == "1. Aventureux(se)"){
        if($bath[3]->nodeValue == "2. Conventionnel(le)"){
          if($bath[4]->nodeValue == "3. Plein(e) de compassion"){
            if($bath[5]->nodeValue == "4. Introverti(e)"){
              if($bath[6]->nodeValue == "5. Meneur(se)"){
                if($bath[7]->nodeValue == "6. Non-structuré(e)"){
                  $req_perso1 = DB::table('aventureux')->where('nom', '=', $bath[2]->nodeValue)->first();
                  $req_perso2 = DB::table('conventionnels')->where('nom', '=', $bath[3]->nodeValue)->first();
                  $req_perso3 = DB::table('compassions')->where('nom', '=', $bath[4]->nodeValue)->first();
                  $req_perso4 = DB::table('introvertis')->where('nom', '=', $bath[5]->nodeValue)->first();
                  $req_perso5 = DB::table('meneurs')->where('nom', '=', $bath[6]->nodeValue)->first();
                  $req_perso6 = DB::table('nonstructures')->where('nom', '=', $bath[7]->nodeValue)->first();
                  if ((is_null($req_perso1)) && (is_null($req_perso2)) && (is_null($req_perso3)) && (is_null($req_perso4)) && (is_null($req_perso5)) && (is_null($req_perso6))) {
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[2]->nodeValue);
                    DB::table('aventureux')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[3]->nodeValue);
                    DB::table('conventionnels')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[4]->nodeValue);
                    DB::table('compassions')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[5]->nodeValue);
                    DB::table('introvertis')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[6]->nodeValue);
                    DB::table('meneurs')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[7]->nodeValue);
                    DB::table('nonstructures')->insert($data);

                    $req_perso7 = DB::table('aventureux')->where('nom', '=', $bath[2]->nodeValue)->first();
                    $req_perso8 = DB::table('conventionnels')->where('nom', '=', $bath[3]->nodeValue)->first();
                    $req_perso9 = DB::table('compassions')->where('nom', '=', $bath[4]->nodeValue)->first();
                    $req_perso10 = DB::table('introvertis')->where('nom', '=', $bath[5]->nodeValue)->first();
                    $req_perso11 = DB::table('meneurs')->where('nom', '=', $bath[6]->nodeValue)->first();
                    $req_perso12 = DB::table('nonstructures')->where('nom', '=', $bath[7]->nodeValue)->first();
                    //$user->personnalite()->attach($req_perso2->id);
                    $data1 = array('user_id'=>$user->id,'aventureux_id'=>$req_perso7->id,'conventionnel_id'=>$req_perso8->id,'compassion_id'=>$req_perso9->id,'introverti_id'=>$req_perso10->id,'meneur_id'=>$req_perso11->id,'nonstructure_id'=>$req_perso12->id);
                    DB::table('personnalite_user')->insert($data1);

                    echo "Success";
                  }
                  else{
                    echo "Impossible to insert data";
                  }
                }
              }
            }
          }
        }
      }
      if($bath[2]->nodeValue == "1. Aventureux(se)"){
        if($bath[3]->nodeValue == "2. Conventionnel(le)"){
          if($bath[4]->nodeValue == "3. Plein(e) de compassion"){
            if($bath[5]->nodeValue == "4. Extraverti(e)"){
              if($bath[6]->nodeValue == "5. Accomodant(e)"){
                if($bath[7]->nodeValue == "6. Non-structuré(e)"){
                  $req_perso1 = DB::table('aventureux')->where('nom', '=', $bath[2]->nodeValue)->first();
                  $req_perso2 = DB::table('conventionnels')->where('nom', '=', $bath[3]->nodeValue)->first();
                  $req_perso3 = DB::table('compassions')->where('nom', '=', $bath[4]->nodeValue)->first();
                  $req_perso4 = DB::table('extravertis')->where('nom', '=', $bath[5]->nodeValue)->first();
                  $req_perso5 = DB::table('accomodants')->where('nom', '=', $bath[6]->nodeValue)->first();
                  $req_perso6 = DB::table('nonstructures')->where('nom', '=', $bath[7]->nodeValue)->first();
                  if ((is_null($req_perso1)) && (is_null($req_perso2)) && (is_null($req_perso3)) && (is_null($req_perso4)) && (is_null($req_perso5)) && (is_null($req_perso6))) {
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[2]->nodeValue);
                    DB::table('aventureux')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[3]->nodeValue);
                    DB::table('conventionnels')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[4]->nodeValue);
                    DB::table('compassions')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[5]->nodeValue);
                    DB::table('extravertis')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[6]->nodeValue);
                    DB::table('accomodants')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[7]->nodeValue);
                    DB::table('nonstructures')->insert($data);

                    $req_perso7 = DB::table('aventureux')->where('nom', '=', $bath[2]->nodeValue)->first();
                    $req_perso8 = DB::table('conventionnels')->where('nom', '=', $bath[3]->nodeValue)->first();
                    $req_perso9 = DB::table('compassions')->where('nom', '=', $bath[4]->nodeValue)->first();
                    $req_perso10 = DB::table('extravertis')->where('nom', '=', $bath[5]->nodeValue)->first();
                    $req_perso11 = DB::table('accomodants')->where('nom', '=', $bath[6]->nodeValue)->first();
                    $req_perso12 = DB::table('nonstructures')->where('nom', '=', $bath[7]->nodeValue)->first();
                    //$user->personnalite()->attach($req_perso2->id);
                    $data1 = array('user_id'=>$user->id,'aventureux_id'=>$req_perso7->id,'conventionnel_id'=>$req_perso8->id,'compassion_id'=>$req_perso9->id,'extraverti_id'=>$req_perso10->id,'accomodant_id'=>$req_perso11->id,'nonstructure_id'=>$req_perso12->id);
                    DB::table('personnalite_user')->insert($data1);

                    echo "Success";
                  }
                  else{
                    echo "Impossible to insert data";
                  }
                }
              }
            }
          }
        }
      }
      if($bath[2]->nodeValue == "1. Aventureux(se)"){
        if($bath[3]->nodeValue == "2. Conventionnel(le)"){
          if($bath[4]->nodeValue == "3. Plein(e) de compassion"){
            if($bath[5]->nodeValue == "4. Extraverti(e)"){
              if($bath[6]->nodeValue == "5. Meneur(se)"){
                if($bath[7]->nodeValue == "6. Consciencieux(se)"){
                  $req_perso1 = DB::table('aventureux')->where('nom', '=', $bath[2]->nodeValue)->first();
                  $req_perso2 = DB::table('conventionnels')->where('nom', '=', $bath[3]->nodeValue)->first();
                  $req_perso3 = DB::table('compassions')->where('nom', '=', $bath[4]->nodeValue)->first();
                  $req_perso4 = DB::table('extravertis')->where('nom', '=', $bath[5]->nodeValue)->first();
                  $req_perso5 = DB::table('meneurs')->where('nom', '=', $bath[6]->nodeValue)->first();
                  $req_perso6 = DB::table('consciencieux')->where('nom', '=', $bath[7]->nodeValue)->first();
                  if ((is_null($req_perso1)) && (is_null($req_perso2)) && (is_null($req_perso3)) && (is_null($req_perso4)) && (is_null($req_perso5)) && (is_null($req_perso6))) {
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[2]->nodeValue);
                    DB::table('aventureux')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[3]->nodeValue);
                    DB::table('conventionnels')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[4]->nodeValue);
                    DB::table('compassions')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[5]->nodeValue);
                    DB::table('extravertis')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[6]->nodeValue);
                    DB::table('meneurs')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[7]->nodeValue);
                    DB::table('consciencieux')->insert($data);

                    $req_perso7 = DB::table('aventureux')->where('nom', '=', $bath[2]->nodeValue)->first();
                    $req_perso8 = DB::table('conventionnels')->where('nom', '=', $bath[3]->nodeValue)->first();
                    $req_perso9 = DB::table('compassions')->where('nom', '=', $bath[4]->nodeValue)->first();
                    $req_perso10 = DB::table('extravertis')->where('nom', '=', $bath[5]->nodeValue)->first();
                    $req_perso11 = DB::table('meneurs')->where('nom', '=', $bath[6]->nodeValue)->first();
                    $req_perso12 = DB::table('consciencieux')->where('nom', '=', $bath[7]->nodeValue)->first();
                    //$user->personnalite()->attach($req_perso2->id);
                    $data1 = array('user_id'=>$user->id,'aventureux_id'=>$req_perso7->id,'conventionnel_id'=>$req_perso8->id,'compassion_id'=>$req_perso9->id,'extraverti_id'=>$req_perso10->id,'meneur_id'=>$req_perso11->id,'consciencieux_id'=>$req_perso12->id);
                    DB::table('personnalite_user')->insert($data1);

                    echo "Success";
                  }
                  else{
                    echo "Impossible to insert data";
                  }
                }
              }
            }
          }
        }
      }
      if($bath[2]->nodeValue == "1. Aventureux(se)"){
        if($bath[3]->nodeValue == "2. Innovateur(trice)"){
          if($bath[4]->nodeValue == "3. Détaché(e)"){
            if($bath[5]->nodeValue == "4. Extraverti(e)"){
              if($bath[6]->nodeValue == "5. Meneur(se)"){
                if($bath[7]->nodeValue == "6. Non-structuré(e)"){
                  $req_perso1 = DB::table('aventureux')->where('nom', '=', $bath[2]->nodeValue)->first();
                  $req_perso2 = DB::table('innovateurs')->where('nom', '=', $bath[3]->nodeValue)->first();
                  $req_perso3 = DB::table('detaches')->where('nom', '=', $bath[4]->nodeValue)->first();
                  $req_perso4 = DB::table('extravertis')->where('nom', '=', $bath[5]->nodeValue)->first();
                  $req_perso5 = DB::table('meneurs')->where('nom', '=', $bath[6]->nodeValue)->first();
                  $req_perso6 = DB::table('nonstructures')->where('nom', '=', $bath[7]->nodeValue)->first();
                  if ((is_null($req_perso1)) && (is_null($req_perso2)) && (is_null($req_perso3)) && (is_null($req_perso4)) && (is_null($req_perso5)) && (is_null($req_perso6))) {
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[2]->nodeValue);
                    DB::table('aventureux')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[3]->nodeValue);
                    DB::table('innovateurs')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[4]->nodeValue);
                    DB::table('detaches')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[5]->nodeValue);
                    DB::table('extravertis')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[6]->nodeValue);
                    DB::table('meneurs')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[7]->nodeValue);
                    DB::table('nonstructures')->insert($data);

                    $req_perso7 = DB::table('aventureux')->where('nom', '=', $bath[2]->nodeValue)->first();
                    $req_perso8 = DB::table('innovateurs')->where('nom', '=', $bath[3]->nodeValue)->first();
                    $req_perso9 = DB::table('detaches')->where('nom', '=', $bath[4]->nodeValue)->first();
                    $req_perso10 = DB::table('extravertis')->where('nom', '=', $bath[5]->nodeValue)->first();
                    $req_perso11 = DB::table('meneurs')->where('nom', '=', $bath[6]->nodeValue)->first();
                    $req_perso12 = DB::table('nonstructures')->where('nom', '=', $bath[7]->nodeValue)->first();
                    //$user->personnalite()->attach($req_perso2->id);
                    $data1 = array('user_id'=>$user->id,'aventureux_id'=>$req_perso7->id,'innovateur_id'=>$req_perso8->id,'detache_id'=>$req_perso9->id,'extraverti_id'=>$req_perso10->id,'meneur_id'=>$req_perso11->id,'nonstructure_id'=>$req_perso12->id);
                    DB::table('personnalite_user')->insert($data1);

                    echo "Success";
                  }
                  else{
                    echo "Impossible to insert data";
                  }
                }
              }
            }
          }
        }
      }
      if($bath[2]->nodeValue == "1. Aventureux(se)"){
        if($bath[3]->nodeValue == "2. Innovateur(trice)"){
          if($bath[4]->nodeValue == "3. Plein(e) de compassion"){
            if($bath[5]->nodeValue == "4. Introverti(e)"){
              if($bath[6]->nodeValue == "5. Meneur(se)"){
                if($bath[7]->nodeValue == "6. Non-structuré(e)"){
                  $req_perso1 = DB::table('aventureux')->where('nom', '=', $bath[2]->nodeValue)->first();
                  $req_perso2 = DB::table('innovateurs')->where('nom', '=', $bath[3]->nodeValue)->first();
                  $req_perso3 = DB::table('compassions')->where('nom', '=', $bath[4]->nodeValue)->first();
                  $req_perso4 = DB::table('introvertis')->where('nom', '=', $bath[5]->nodeValue)->first();
                  $req_perso5 = DB::table('meneurs')->where('nom', '=', $bath[6]->nodeValue)->first();
                  $req_perso6 = DB::table('nonstructures')->where('nom', '=', $bath[7]->nodeValue)->first();
                  if ((is_null($req_perso1)) && (is_null($req_perso2)) && (is_null($req_perso3)) && (is_null($req_perso4)) && (is_null($req_perso5)) && (is_null($req_perso6))) {
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[2]->nodeValue);
                    DB::table('aventureux')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[3]->nodeValue);
                    DB::table('innovateurs')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[4]->nodeValue);
                    DB::table('compassions')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[5]->nodeValue);
                    DB::table('introvertis')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[6]->nodeValue);
                    DB::table('meneurs')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[7]->nodeValue);
                    DB::table('nonstructures')->insert($data);

                    $req_perso7 = DB::table('aventureux')->where('nom', '=', $bath[2]->nodeValue)->first();
                    $req_perso8 = DB::table('innovateurs')->where('nom', '=', $bath[3]->nodeValue)->first();
                    $req_perso9 = DB::table('compassions')->where('nom', '=', $bath[4]->nodeValue)->first();
                    $req_perso10 = DB::table('introvertis')->where('nom', '=', $bath[5]->nodeValue)->first();
                    $req_perso11 = DB::table('meneurs')->where('nom', '=', $bath[6]->nodeValue)->first();
                    $req_perso12 = DB::table('nonstructures')->where('nom', '=', $bath[7]->nodeValue)->first();
                    //$user->personnalite()->attach($req_perso2->id);
                    $data1 = array('user_id'=>$user->id,'aventureux_id'=>$req_perso7->id,'innovateur_id'=>$req_perso8->id,'compassion_id'=>$req_perso9->id,'introverti_id'=>$req_perso10->id,'meneur_id'=>$req_perso11->id,'nonstructure_id'=>$req_perso12->id);
                    DB::table('personnalite_user')->insert($data1);

                    echo "Success";
                  }
                  else{
                    echo "Impossible to insert data";
                  }
                }
              }
            }
          }
        }
      }
      if($bath[2]->nodeValue == "1. Aventureux(se)"){
        if($bath[3]->nodeValue == "2. Innovateur(trice)"){
          if($bath[4]->nodeValue == "3. Plein(e) de compassion"){
            if($bath[5]->nodeValue == "4. Extraverti(e)"){
              if($bath[6]->nodeValue == "5. Accomodant(e)"){
                if($bath[7]->nodeValue == "6. Non-structuré(e)"){
                  $req_perso1 = DB::table('aventureux')->where('nom', '=', $bath[2]->nodeValue)->first();
                  $req_perso2 = DB::table('innovateurs')->where('nom', '=', $bath[3]->nodeValue)->first();
                  $req_perso3 = DB::table('compassions')->where('nom', '=', $bath[4]->nodeValue)->first();
                  $req_perso4 = DB::table('extravertis')->where('nom', '=', $bath[5]->nodeValue)->first();
                  $req_perso5 = DB::table('accomodants')->where('nom', '=', $bath[6]->nodeValue)->first();
                  $req_perso6 = DB::table('nonstructures')->where('nom', '=', $bath[7]->nodeValue)->first();
                  if ((is_null($req_perso1)) && (is_null($req_perso2)) && (is_null($req_perso3)) && (is_null($req_perso4)) && (is_null($req_perso5)) && (is_null($req_perso6))) {
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[2]->nodeValue);
                    DB::table('aventureux')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[3]->nodeValue);
                    DB::table('innovateurs')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[4]->nodeValue);
                    DB::table('compassions')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[5]->nodeValue);
                    DB::table('extravertis')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[6]->nodeValue);
                    DB::table('accomodants')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[7]->nodeValue);
                    DB::table('nonstructures')->insert($data);

                    $req_perso7 = DB::table('aventureux')->where('nom', '=', $bath[2]->nodeValue)->first();
                    $req_perso8 = DB::table('innovateurs')->where('nom', '=', $bath[3]->nodeValue)->first();
                    $req_perso9 = DB::table('compassions')->where('nom', '=', $bath[4]->nodeValue)->first();
                    $req_perso10 = DB::table('extravertis')->where('nom', '=', $bath[5]->nodeValue)->first();
                    $req_perso11 = DB::table('accomodants')->where('nom', '=', $bath[6]->nodeValue)->first();
                    $req_perso12 = DB::table('nonstructures')->where('nom', '=', $bath[7]->nodeValue)->first();
                    //$user->personnalite()->attach($req_perso2->id);
                    $data1 = array('user_id'=>$user->id,'aventureux_id'=>$req_perso7->id,'innovateur_id'=>$req_perso8->id,'compassion_id'=>$req_perso9->id,'extraverti_id'=>$req_perso10->id,'accomodant_id'=>$req_perso11->id,'nonstructure_id'=>$req_perso12->id);
                    DB::table('personnalite_user')->insert($data1);

                    echo "Success";
                  }
                  else{
                    echo "Impossible to insert data";
                  }
                }
              }
            }
          }
        }
      }
      if($bath[2]->nodeValue == "1. Aventureux(se)"){
        if($bath[3]->nodeValue == "2. Innovateur(trice)"){
          if($bath[4]->nodeValue == "3. Plein(e) de compassion"){
            if($bath[5]->nodeValue == "4. Extraverti(e)"){
              if($bath[6]->nodeValue == "5. Meneur(se)"){
                if($bath[7]->nodeValue == "6. Consciencieux(se)"){
                  $req_perso1 = DB::table('aventureux')->where('nom', '=', $bath[2]->nodeValue)->first();
                  $req_perso2 = DB::table('innovateurs')->where('nom', '=', $bath[3]->nodeValue)->first();
                  $req_perso3 = DB::table('compassions')->where('nom', '=', $bath[4]->nodeValue)->first();
                  $req_perso4 = DB::table('extravertis')->where('nom', '=', $bath[5]->nodeValue)->first();
                  $req_perso5 = DB::table('meneurs')->where('nom', '=', $bath[6]->nodeValue)->first();
                  $req_perso6 = DB::table('consciencieux')->where('nom', '=', $bath[7]->nodeValue)->first();
                  if ((is_null($req_perso1)) && (is_null($req_perso2)) && (is_null($req_perso3)) && (is_null($req_perso4)) && (is_null($req_perso5)) && (is_null($req_perso6))) {
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[2]->nodeValue);
                    DB::table('aventureux')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[3]->nodeValue);
                    DB::table('innovateurs')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[4]->nodeValue);
                    DB::table('compassions')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[5]->nodeValue);
                    DB::table('extravertis')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[6]->nodeValue);
                    DB::table('meneurs')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[7]->nodeValue);
                    DB::table('consciencieux')->insert($data);

                    $req_perso7 = DB::table('aventureux')->where('nom', '=', $bath[2]->nodeValue)->first();
                    $req_perso8 = DB::table('innovateurs')->where('nom', '=', $bath[3]->nodeValue)->first();
                    $req_perso9 = DB::table('compassions')->where('nom', '=', $bath[4]->nodeValue)->first();
                    $req_perso10 = DB::table('extravertis')->where('nom', '=', $bath[5]->nodeValue)->first();
                    $req_perso11 = DB::table('meneurs')->where('nom', '=', $bath[6]->nodeValue)->first();
                    $req_perso12 = DB::table('consciencieux')->where('nom', '=', $bath[7]->nodeValue)->first();
                    //$user->personnalite()->attach($req_perso2->id);
                    $data1 = array('user_id'=>$user->id,'aventureux_id'=>$req_perso7->id,'innovateur_id'=>$req_perso8->id,'compassion_id'=>$req_perso9->id,'extraverti_id'=>$req_perso10->id,'meneur_id'=>$req_perso11->id,'consciencieux_id'=>$req_perso12->id);
                    DB::table('personnalite_user')->insert($data1);

                    echo "Success";
                  }
                  else{
                    echo "Impossible to insert data";
                  }
                }
              }
            }
          }
        }
      }
      if($bath[2]->nodeValue == "1. Prudent(e)"){
        if($bath[3]->nodeValue == "2. Innovateur(trice)"){
          if($bath[4]->nodeValue == "3. Plein(e) de compassion"){
            if($bath[5]->nodeValue == "4. Extraverti(e)"){
              if($bath[6]->nodeValue == "5. Meneur(se)"){
                if($bath[7]->nodeValue == "6. Non-structuré(e)"){
                  $req_perso1 = DB::table('prudents')->where('nom', '=', $bath[2]->nodeValue)->first();
                  $req_perso2 = DB::table('innovateurs')->where('nom', '=', $bath[3]->nodeValue)->first();
                  $req_perso3 = DB::table('compassions')->where('nom', '=', $bath[4]->nodeValue)->first();
                  $req_perso4 = DB::table('extravertis')->where('nom', '=', $bath[5]->nodeValue)->first();
                  $req_perso5 = DB::table('meneurs')->where('nom', '=', $bath[6]->nodeValue)->first();
                  $req_perso6 = DB::table('nonstructures')->where('nom', '=', $bath[7]->nodeValue)->first();
                  if ((is_null($req_perso1)) && (is_null($req_perso2)) && (is_null($req_perso3)) && (is_null($req_perso4)) && (is_null($req_perso5)) && (is_null($req_perso6))) {
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[2]->nodeValue);
                    DB::table('prudents')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[3]->nodeValue);
                    DB::table('innovateurs')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[4]->nodeValue);
                    DB::table('compassions')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[5]->nodeValue);
                    DB::table('extravertis')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[6]->nodeValue);
                    DB::table('meneurs')->insert($data);
                    $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[7]->nodeValue);
                    DB::table('nonstructures')->insert($data);

                    $req_perso7 = DB::table('prudents')->where('nom', '=', $bath[2]->nodeValue)->first();
                    $req_perso8 = DB::table('innovateurs')->where('nom', '=', $bath[3]->nodeValue)->first();
                    $req_perso9 = DB::table('compassions')->where('nom', '=', $bath[4]->nodeValue)->first();
                    $req_perso10 = DB::table('extravertis')->where('nom', '=', $bath[5]->nodeValue)->first();
                    $req_perso11 = DB::table('meneurs')->where('nom', '=', $bath[6]->nodeValue)->first();
                    $req_perso12 = DB::table('nonstructures')->where('nom', '=', $bath[7]->nodeValue)->first();
                    //$user->personnalite()->attach($req_perso2->id);
                    $data1 = array('user_id'=>$user->id,'prudent_id'=>$req_perso7->id,'innovateur_id'=>$req_perso8->id,'compassion_id'=>$req_perso9->id,'extraverti_id'=>$req_perso10->id,'meneur_id'=>$req_perso11->id,'nonstructure_id'=>$req_perso12->id);
                    DB::table('personnalite_user')->insert($data1);

                    echo "Success";
                  }
                  else{
                    echo "Impossible to insert data";
                  }
                }
              }
            }
          }
        }
      }*/
      /*else{
        echo "";
      }*/
      /*switch($bath[2]->nodeValue){
        case '1. Aventureux(se)':
          $req_perso1 = DB::table('personnalites')->where('nom', '=', $bath[2]->nodeValue)->first();
          if (is_null($req_perso1)) {
            $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[2]->nodeValue);
            DB::table('personnalites')->insert($data);
            $req_perso2 = DB::table('personnalites')->where('nom', '=', $bath[2]->nodeValue)->first();
            $user->personnalite()->attach($req_perso2->id);
            //$data1 = array('user_id'=>$user->id,'personnalite_id'=>$req_perso2->id);
            //DB::table('personnalite_user')->insert($data1);

            echo "Success";
            break;
          }
        case '1. Prudent(e)':
          $req_perso1 = DB::table('prudents')->where('nom', '=', $bath[2]->nodeValue)->first();
          if (is_null($req_perso1)) {
            $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[2]->nodeValue);
            DB::table('prudents')->insert($data);
            $req_perso2 = DB::table('prudents')->where('nom', '=', $bath[2]->nodeValue)->first();
            $user->prudent()->attach($req_perso2->id);
            //$data1 = array('user_id'=>$user->id,'prudent_id'=>$req_perso2->id);
            //DB::table('personnalite_user')->insert($data1);

            echo "Success";
            break;
          }
        default:
          echo "impossible to insert the data";
      }
      switch($bath[3]->nodeValue){
        case '2. Conventionnel(le)':
          $req_perso1 = DB::table('personnalites')->where('nom', '=', $bath[3]->nodeValue)->first();
          if (is_null($req_perso1)) {
            $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[3]->nodeValue);
            DB::table('personnalites')->insert($data);
            $req_perso2 = DB::table('personnalites')->where('nom', '=', $bath[3]->nodeValue)->first();
            $user->personnalite()->attach($req_perso2->id);
            //$data1 = array('user_id'=>$user->id,'personnalite_id'=>$req_perso2->id);
            //DB::table('personnalite_user')->insert($data1);

            echo "Success";
            break;
          }
        case '2. Innovateur(trice)':
          $req_perso1 = DB::table('prudents')->where('nom', '=', $bath[3]->nodeValue)->first();
          if (is_null($req_perso1)) {
            $data = array('contenu'=>$documents_span[93]->nodeValue,'score'=>$documents_span[103]->nodeValue,'nom'=>$bath[3]->nodeValue);
            DB::table('prudents')->insert($data);
            $req_perso2 = DB::table('prudents')->where('nom', '=', $bath[3]->nodeValue)->first();
            $user->prudent()->attach($req_perso2->id);
            //$data1 = array('user_id'=>$user->id,'prudent_id'=>$req_perso2->id);
            //DB::table('personnalite_user')->insert($data1);

            echo "Success";
            break;
          }
        default:
          echo "impossible to insert the data";
      }*/
      /*#$personnalites = Personnalite::where('email', '=', Input::get('email'))->first();
      $personnalites1 = DB::table('personnalites')->where('nom', '=', $bath[2]->nodeValue)->first();
      if ($personnalites1 === null) {
        $file = 'count.txt'; // the name of the text file (must be writeable by the server)
        $orderNumber = file_get_contents ($file); // read file data and store as variable
        $fdata = intval($orderNumber)+1; // increment the value
        file_put_contents($file, $fdata); // write the new value back to file

        $data = array('contenu'=>$documents_span[93]->nodeValue,'contenu1'=>$documents_span[96]->nodeValue,
        'contenu2'=>$documents_span[98]->nodeValue,'contenu3'=>$documents_span[100]->nodeValue,'contenu4'=>$documents_span[104]->nodeValue,
        'contenu5'=>$documents_span[107]->nodeValue,'contenu6'=>'','contenu7'=>'','contenu8'=>$documents[10]->nodeValue,'nom'=>$bath[2]->nodeValue);
        $data1 = array('user_id'=>$user->id,'personnalite_id'=>$orderNumber);
        $insert = DB::table('personnalites')->insert($data);
        DB::table('personnalite_user')->insert($data1);
        //$user->personnalite()->attach($personnalite->id);

        echo "Success1";
      }
      $personnalites2 = DB::table('personnalites')->where('nom', '=', $bath[3]->nodeValue)->first();
      if ($personnalites2 === null) {
        $file = 'count.txt'; // the name of the text file (must be writeable by the server)
        $orderNumber = file_get_contents ($file); // read file data and store as variable
        $fdata = intval($orderNumber)+1; // increment the value
        file_put_contents($file, $fdata); // write the new value back to file

        $data = array('contenu'=>$documents_span[126]->nodeValue,'contenu1'=>$documents_span[129]->nodeValue,
        'contenu2'=>$documents_span[131]->nodeValue,'contenu3'=>$documents_span[133]->nodeValue,'contenu4'=>$documents_span[137]->nodeValue,
        'contenu5'=>$documents_span[140]->nodeValue,'contenu6'=>'','contenu7'=>'','contenu8'=>$documents[10]->nodeValue,'nom'=>$bath[3]->nodeValue);
        $data1 = array('user_id'=>$user->id,'personnalite_id'=>$orderNumber);
        $insert = DB::table('personnalites')->insert($data);
        DB::table('personnalite_user')->insert($data1);
        //$user->personnalite()->attach($personnalite->id);

        echo "Success2";
      }
      $personnalites3 = DB::table('personnalites')->where('nom', '=', $bath[4]->nodeValue)->first();
      if ($personnalites3 === null) {
        $file = 'count.txt'; // the name of the text file (must be writeable by the server)
        $orderNumber = file_get_contents ($file); // read file data and store as variable
        $fdata = intval($orderNumber)+1; // increment the value
        file_put_contents($file, $fdata); // write the new value back to file

        $data = array('contenu'=>$documents_span[159]->nodeValue,'contenu1'=>$documents_span[162]->nodeValue,
        'contenu2'=>$documents_span[164]->nodeValue,'contenu3'=>$documents_span[166]->nodeValue,'contenu4'=>$documents_span[168]->nodeValue,
        'contenu5'=>$documents_span[172]->nodeValue,'contenu6'=>$documents_span[175]->nodeValue,'contenu7'=>$documents_span[178]->nodeValue,'contenu8'=>$documents[10]->nodeValue,'nom'=>$bath[4]->nodeValue);
        $data1 = array('user_id'=>$user->id,'personnalite_id'=>$orderNumber);
        $insert = DB::table('personnalites')->insert($data);
        DB::table('personnalite_user')->insert($data1);
        //$user->personnalite()->attach($personnalite->id);

        echo "Success3";
      }
      $personnalites4 = DB::table('personnalites')->where('nom', '=', $bath[5]->nodeValue)->first();
      if ($personnalites4 === null) {
        $file = 'count.txt'; // the name of the text file (must be writeable by the server)
        $orderNumber = file_get_contents ($file); // read file data and store as variable
        $fdata = intval($orderNumber)+1; // increment the value
        file_put_contents($file, $fdata); // write the new value back to file

        $data = array('contenu'=>$documents_span[197]->nodeValue,'contenu1'=>$documents_span[200]->nodeValue,
        'contenu2'=>$documents_span[202]->nodeValue,'contenu3'=>$documents_span[204]->nodeValue,'contenu4'=>$documents_span[206]->nodeValue,
        'contenu5'=>$documents_span[210]->nodeValue,'contenu6'=>$documents_span[213]->nodeValue,'contenu7'=>$documents_span[216]->nodeValue,'contenu8'=>$documents[10]->nodeValue,'nom'=>$bath[5]->nodeValue);
        $data1 = array('user_id'=>$user->id,'personnalite_id'=>$orderNumber);
        $insert = DB::table('personnalites')->insert($data);
        DB::table('personnalite_user')->insert($data1);
        //$user->personnalite()->attach($personnalite->id);

        echo "Success4";
      }
      $personnalites5 = DB::table('personnalites')->where('nom', '=', $bath[6]->nodeValue)->first();
      if ($personnalites5 === null) {
        $file = 'count.txt'; // the name of the text file (must be writeable by the server)
        $orderNumber = file_get_contents ($file); // read file data and store as variable
        $fdata = intval($orderNumber)+1; // increment the value
        file_put_contents($file, $fdata); // write the new value back to file

        $data = array('contenu'=>$documents_span[235]->nodeValue,'contenu1'=>$documents_span[237]->nodeValue,
        'contenu2'=>$documents_span[240]->nodeValue,'contenu3'=>$documents_span[243]->nodeValue,'contenu4'=>$documents_span[245]->nodeValue,
        'contenu5'=>$documents_span[249]->nodeValue,'contenu6'=>$documents_span[252]->nodeValue,'contenu7'=>$documents_span[254]->nodeValue,'contenu8'=>$documents[10]->nodeValue,'nom'=>$bath[6]->nodeValue);
        $data1 = array('user_id'=>$user->id,'personnalite_id'=>$orderNumber);
        $insert = DB::table('personnalites')->insert($data);
        DB::table('personnalite_user')->insert($data1);
        //$user->personnalite()->attach($personnalite->id);

        echo "Success5";
      }
      $personnalites6 = DB::table('personnalites')->where('nom', '=', $bath[7]->nodeValue)->first();
      if ($personnalites6 === null) {
        $file = 'count.txt'; // the name of the text file (must be writeable by the server)
        $orderNumber = file_get_contents ($file); // read file data and store as variable
        $fdata = intval($orderNumber)+1; // increment the value
        file_put_contents($file, $fdata); // write the new value back to file

        $data = array('contenu'=>$documents_span[273]->nodeValue,'contenu1'=>$documents_span[277]->nodeValue,
        'contenu2'=>$documents_span[280]->nodeValue,'contenu3'=>$documents_span[283]->nodeValue,'contenu4'=>$documents_span[286]->nodeValue,
        'contenu5'=>$documents_span[288]->nodeValue,'contenu6'=>$documents_span[290]->nodeValue,'contenu7'=>$documents_span[292]->nodeValue,'contenu8'=>$documents[10]->nodeValue,'nom'=>$bath[7]->nodeValue);
        $data1 = array('user_id'=>$user->id,'personnalite_id'=>$orderNumber);
        $insert = DB::table('personnalites')->insert($data);
        DB::table('personnalite_user')->insert($data1);
        //$user->personnalite()->attach($personnalite->id);

        echo "Success6";
      }*/
      /*if(!(in_array($documents[11]->nodeValue, $try))){
        $data = array('contenu'=>$documents[11]->nodeValue,'nom'=>$bath[0]->nodeValue);
        //$data1 = array('user_id'=>$user->id,'personnalite_id'=>$personnalite->id);
        DB::table('personnalites')->insert($data);
        //DB::table('personnalite_user')->insert($data1);
        $user->personnalite()->attach($personnalite->id);
        echo "Success";
      }*/
      //----------------
      return view('careerdirect.personnalite.careerdirectpersonnalite', compact('user','doc','documents','documents_span','data','xpath','bath'));
    }

    /**
     * Affiche les six facteurs de personnalite d'un utilisateur
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
     public function sixfacteurspersonnalite($id){
       $user = User::find($id);
       $rapportshtmls = DB::table('rapportshtmls')->get();

       // create curl resource
          $ch = curl_init();

          // set url
          curl_setopt($ch, CURLOPT_URL, route('career_direct_fiche', ['id' => Auth::id()]));

          //return the transfer as a string
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

          // $output contains the output string
          $output = curl_exec($ch);

          // close curl resource to free up system resources
          curl_close($ch);
       //print_r($output);

       $doc = new \DOMDocument();
       @$doc->loadHTML($output);
       libxml_use_internal_errors(true);
       //$doc->loadHTMLFile(route('career_direct_fiche', ['id' => Auth::id()]));
       $documents = $doc->getElementsByTagName('p');
       $documents_span = $doc->getElementsByTagName('span');
       $xpath = new \DOMXpath($doc);
       $bath = $xpath->query('//h4[contains(@class, "cdreport-header")]');
       libxml_clear_errors();

       $try = array();
       foreach($rapportshtmls as $rapporthtml){
         array_push($try, $rapporthtml->contenu);
       }
       if(!(in_array($documents[15]->nodeValue, $try))){
         $data = array('contenu'=>$documents[15]->nodeValue,'user_id'=>$user->id);
         DB::table('rapportshtmls')->insert($data);
         echo "Success";
       }
       else{
         echo "impossible to insert the data";
       }
       return view('careerdirect.personnalite.careerdirectsixfacteurspersonnalite', compact('user','doc','documents','documents_span','data','xpath','bath'));
     }

     /**
      * Affiche les facteurs et sous-facteurs d'un utilisateur
      *
      * @param int $id
      * @return \Illuminate\View\View
      */
      public function facteurssousfacteurspersonnalite($id){
        $user = User::find($id);
        $rapportshtmls = DB::table('rapportshtmls')->get();

        // create curl resource
           $ch = curl_init();

           // set url
           curl_setopt($ch, CURLOPT_URL, route('career_direct_fiche', ['id' => Auth::id()]));

           //return the transfer as a string
           curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

           // $output contains the output string
           $output = curl_exec($ch);

           // close curl resource to free up system resources
           curl_close($ch);
        //print_r($output);

        $doc = new \DOMDocument();
        @$doc->loadHTML($output);
        libxml_use_internal_errors(true);
        //$doc->loadHTMLFile(route('career_direct_fiche', ['id' => Auth::id()]));
        $documents = $doc->getElementsByTagName('p');
        $documents_span = $doc->getElementsByTagName('span');
        $xpath = new \DOMXpath($doc);
        $bath = $xpath->query('//h4[contains(@class, "cdreport-header")]');
        libxml_clear_errors();

        $try = array();
        foreach($rapportshtmls as $rapporthtml){
          array_push($try, $rapporthtml->contenu);
        }
        if(!(in_array($documents[20]->nodeValue, $try))){
          $data = array('contenu'=>$documents[20]->nodeValue,'user_id'=>$user->id);
          DB::table('rapportshtmls')->insert($data);
          echo "Success";
        }
        else{
          echo "impossible to insert the data";
        }
        return view('careerdirect.personnalite.careerdirectfacteurssousfacteurspersonnalite', compact('user','doc','documents','documents_span','data','xpath','bath'));
      }

      /**
       * Affiche les points forts d'un utilisateur
       *
       * @param int $id
       * @return \Illuminate\View\View
       */
       public function pointsfortspersonnalite($id){
         $user = User::find($id);
         $rapportshtmls = DB::table('rapportshtmls')->get();

         // create curl resource
            $ch = curl_init();

            // set url
            curl_setopt($ch, CURLOPT_URL, route('career_direct_fiche', ['id' => Auth::id()]));

            //return the transfer as a string
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            // $output contains the output string
            $output = curl_exec($ch);

            // close curl resource to free up system resources
            curl_close($ch);
         //print_r($output);

         $doc = new \DOMDocument();
         @$doc->loadHTML($output);
         libxml_use_internal_errors(true);
         //$doc->loadHTMLFile(route('career_direct_fiche', ['id' => Auth::id()]));
         $documents = $doc->getElementsByTagName('p');
         $documents_span = $doc->getElementsByTagName('span');
         $xpath = new \DOMXpath($doc);
         $bath = $xpath->query('//h4[contains(@class, "cdreport-header")]');
         libxml_clear_errors();

         $try = array();
         foreach($rapportshtmls as $rapporthtml){
           array_push($try, $rapporthtml->contenu);
         }
         if(!(in_array($documents[25]->nodeValue, $try))){
           $data = array('contenu'=>$documents[25]->nodeValue,'user_id'=>$user->id);
           DB::table('rapportshtmls')->insert($data);
           echo "Success";
         }
         else{
           echo "impossible to insert the data";
         }
         return view('careerdirect.personnalite.careerdirectpointsfortspersonnalite', compact('user','doc','documents','documents_span','data','xpath','bath'));
       }

       /**
        * Affiche les points faibles d'un utilisateur
        *
        * @param int $id
        * @return \Illuminate\View\View
        */
        public function pointsfaiblespersonnalite($id){
          $user = User::find($id);
          $rapportshtmls = DB::table('rapportshtmls')->get();

          // create curl resource
             $ch = curl_init();

             // set url
             curl_setopt($ch, CURLOPT_URL, route('career_direct_fiche', ['id' => Auth::id()]));

             //return the transfer as a string
             curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

             // $output contains the output string
             $output = curl_exec($ch);

             // close curl resource to free up system resources
             curl_close($ch);
          //print_r($output);

          $doc = new \DOMDocument();
          @$doc->loadHTML($output);
          libxml_use_internal_errors(true);
          //$doc->loadHTMLFile(route('career_direct_fiche', ['id' => Auth::id()]));
          $documents = $doc->getElementsByTagName('p');
          $documents_span = $doc->getElementsByTagName('span');
          $xpath = new \DOMXpath($doc);
          $bath = $xpath->query('//h4[contains(@class, "cdreport-header")]');
          libxml_clear_errors();

          $try = array();
          foreach($rapportshtmls as $rapporthtml){
            array_push($try, $rapporthtml->contenu);
          }
          if(!(in_array($documents[30]->nodeValue, $try))){
            $data = array('contenu'=>$documents[30]->nodeValue,'user_id'=>$user->id);
            DB::table('rapportshtmls')->insert($data);
            echo "Success";
          }
          else{
            echo "impossible to insert the data";
          }
          return view('careerdirect.personnalite.careerdirectpointsfaiblespersonnalite', compact('user','doc','documents','documents_span','data','xpath','bath'));
        }

        /**
         * Affiche les questions cruciales de personnalite d'un utilisateur
         *
         * @param int $id
         * @return \Illuminate\View\View
         */
         public function questionscrucialespersonnalite($id){
           $user = User::find($id);
           $rapportshtmls = DB::table('rapportshtmls')->get();

           // create curl resource
              $ch = curl_init();

              // set url
              curl_setopt($ch, CURLOPT_URL, route('career_direct_fiche', ['id' => Auth::id()]));

              //return the transfer as a string
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

              // $output contains the output string
              $output = curl_exec($ch);

              // close curl resource to free up system resources
              curl_close($ch);
           //print_r($output);

           $doc = new \DOMDocument();
           @$doc->loadHTML($output);
           libxml_use_internal_errors(true);
           //$doc->loadHTMLFile(route('career_direct_fiche', ['id' => Auth::id()]));
           $documents = $doc->getElementsByTagName('p');
           $documents_span = $doc->getElementsByTagName('span');
           $xpath = new \DOMXpath($doc);
           $bath = $xpath->query('//h4[contains(@class, "cdreport-header")]');
           libxml_clear_errors();

           $try = array();
           foreach($rapportshtmls as $rapporthtml){
             array_push($try, $rapporthtml->contenu);
           }
           if(!(in_array($documents[35]->nodeValue, $try))){
             $data = array('contenu'=>$documents[35]->nodeValue,'user_id'=>$user->id);
             DB::table('rapportshtmls')->insert($data);
             echo "Success";
           }
           else{
             echo "impossible to insert the data";
           }
           return view('careerdirect.personnalite.careerdirectquestionscrucialespersonnalite', compact('user','doc','documents','documents_span','data','xpath','bath'));
         }


         //------------ SECTION INTERET PROFESSIONNELLES ---------------------------------------------

    /**
     * Affiche les intérêts professionnelles d'un utilisateur
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
     public function interetpro($id){
       $user = User::find($id);
       $rapportshtmls = DB::table('rapportshtmls')->get();
       //Modified here
       $usertry = User::paginate(3);
       //
       // create curl resource
          $ch = curl_init();

          // set url
          curl_setopt($ch, CURLOPT_URL, route('career_direct_fiche', ['id' => Auth::id()]));

          //return the transfer as a string
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

          // $output contains the output string
          $output = curl_exec($ch);

          // close curl resource to free up system resources
          curl_close($ch);
       //print_r($output);
       $doc = new \DOMDocument();
       @$doc->loadHTML($output);
       libxml_use_internal_errors(true);
       //$doc->loadHTMLFile(route('career_direct_fiche', ['id' => Auth::id()]));
       $documents = $doc->getElementsByTagName('p');
       $documents_span = $doc->getElementsByTagName('span');
       $xpath = new \DOMXpath($doc);
       $bath = $xpath->query('//h4[contains(@class, "cdreport-header")]');
       libxml_clear_errors();

       $req_perso = DB::table('relligieuxes')->where('nom', '=', $documents_span[200]->nodeValue)->first();
       $req_persoa = DB::table('religions')->where('nom', '=', $documents_span[203]->nodeValue)->first();

       $req_persob = DB::table('conseills')->where('nom', '=', $documents_span[208]->nodeValue)->first();
       $req_persoc = DB::table('conseilles')->where('nom', '=', $documents_span[209]->nodeValue)->first();
       /*$req_perso1 = Religieux::where('nom', '=', $documents_span[405]->nodeValue)->first();
       $req_perso1a = App\Conseil::where('nom', '=', $documents_span[406]->nodeValue)->first();
       $req_perso1b = DB::table('enseignements')->where('nom', '=', $documents_span[407]->nodeValue)->first();
       $req_perso1c = DB::table('legislations')->where('nom', '=', $documents_span[408]->nodeValue)->first();
       $req_perso1d = DB::table('gestions')->where('nom', '=', $documents_span[409]->nodeValue)->first();
       $req_perso1e = DB::table('internationals')->where('nom', '=', $documents_span[410]->nodeValue)->first();
       if ((is_null($req_perso1)) && (is_null($req_perso1a)) && (is_null($req_perso1b)) && (is_null($req_perso1c)) && (is_null($req_perso1d)) && (is_null($req_perso1e))) { */
       if ((is_null($req_perso)) && (is_null($req_persoa))) {
         $data = array('score'=>$documents_span[202]->nodeValue,'nom'=>$documents_span[200]->nodeValue);
         DB::table('relligieuxes')->insert($data);
         $data = array('score'=>$documents_span[205]->nodeValue,'nom'=>$documents_span[203]->nodeValue);
         DB::table('religions')->insert($data);
         $data = array('score'=>$documents_span[206]->nodeValue,'nom'=>$documents_span[208]->nodeValue);
         DB::table('conseills')->insert($data);
         $data = array('score'=>$documents_span[207]->nodeValue,'nom'=>$documents_span[209]->nodeValue);
         DB::table('conseilles')->insert($data);
         $data = array('score'=>$documents_span[206]->nodeValue,'nom'=>$documents_span[210]->nodeValue);
         DB::table('enseignementes')->insert($data);
         $data = array('score'=>$documents_span[207]->nodeValue,'nom'=>$documents_span[211]->nodeValue);
         DB::table('ensseignements')->insert($data);
         $data = array('score'=>$documents_span[207]->nodeValue,'nom'=>$documents_span[212]->nodeValue);
         DB::table('enssseignements')->insert($data);
         $data = array('score'=>$documents_span[207]->nodeValue,'nom'=>$documents_span[213]->nodeValue);
         DB::table('autoentrepreneurs')->insert($data);
         $data = array('score'=>$documents_span[207]->nodeValue,'nom'=>$documents_span[214]->nodeValue);
         DB::table('communicationventes')->insert($data);
         $data = array('score'=>$documents_span[207]->nodeValue,'nom'=>$documents_span[215]->nodeValue);
         DB::table('gestiones')->insert($data);
         $data = array('score'=>$documents_span[207]->nodeValue,'nom'=>$documents_span[216]->nodeValue);
         DB::table('chefentreprises')->insert($data);
         $data = array('score'=>$documents_span[207]->nodeValue,'nom'=>$documents_span[217]->nodeValue);
         DB::table('gesstions')->insert($data);
         $data = array('score'=>$documents_span[207]->nodeValue,'nom'=>$documents_span[218]->nodeValue);
         DB::table('affaires')->insert($data);
         $data = array('score'=>$documents_span[207]->nodeValue,'nom'=>$documents_span[219]->nodeValue);
         DB::table('compolitiques')->insert($data);
         $data = array('score'=>$documents_span[207]->nodeValue,'nom'=>$documents_span[220]->nodeValue);
         DB::table('legisllations')->insert($data);

         $data = array('score'=>$documents_span[207]->nodeValue,'nom'=>$documents_span[221]->nodeValue);
         DB::table('internationalls')->insert($data);
         $data = array('score'=>$documents_span[207]->nodeValue,'nom'=>$documents_span[222]->nodeValue);
         DB::table('langues')->insert($data);
         $data = array('score'=>$documents_span[207]->nodeValue,'nom'=>$documents_span[223]->nodeValue);
         DB::table('languetrangeres')->insert($data);
         $data = array('score'=>$documents_span[207]->nodeValue,'nom'=>$documents_span[224]->nodeValue);
         DB::table('communicationecrites')->insert($data);
         $data = array('score'=>$documents_span[207]->nodeValue,'nom'=>$documents_span[225]->nodeValue);
         DB::table('journalistes')->insert($data);
         $data = array('score'=>$documents_span[207]->nodeValue,'nom'=>$documents_span[226]->nodeValue);
         DB::table('francais')->insert($data);
         $data = array('score'=>$documents_span[207]->nodeValue,'nom'=>$documents_span[227]->nodeValue);
         DB::table('communicationfoules')->insert($data);
         $data = array('score'=>$documents_span[207]->nodeValue,'nom'=>$documents_span[228]->nodeValue);
         DB::table('musicales')->insert($data);
         $data = array('score'=>$documents_span[207]->nodeValue,'nom'=>$documents_span[229]->nodeValue);
         DB::table('divertissements')->insert($data);
         $data = array('score'=>$documents_span[207]->nodeValue,'nom'=>$documents_span[230]->nodeValue);
         DB::table('artistes')->insert($data);
         $data = array('score'=>$documents_span[207]->nodeValue,'nom'=>$documents_span[231]->nodeValue);
         DB::table('perfpubliques')->insert($data);
         $data = array('score'=>$documents_span[207]->nodeValue,'nom'=>$documents_span[232]->nodeValue);
         DB::table('musiques')->insert($data);

         $req_perso1 = DB::table('relligieuxes')->where('nom', '=', $documents_span[200]->nodeValue)->first();
         $req_perso1a = DB::table('religions')->where('nom', '=', $documents_span[203]->nodeValue)->first();
         $req_perso1b = DB::table('conseills')->where('nom', '=', $documents_span[208]->nodeValue)->first();
         $req_perso1c = DB::table('conseilles')->where('nom', '=', $documents_span[209]->nodeValue)->first();
         $req_perso1d = DB::table('enseignementes')->where('nom', '=', $documents_span[210]->nodeValue)->first();
         $req_perso1e = DB::table('ensseignements')->where('nom', '=', $documents_span[211]->nodeValue)->first();
         $req_perso1f = DB::table('enssseignements')->where('nom', '=', $documents_span[212]->nodeValue)->first();

         $req_perso1g = DB::table('autoentrepreneurs')->where('nom', '=', $documents_span[213]->nodeValue)->first();
         $req_perso1h = DB::table('communicationventes')->where('nom', '=', $documents_span[214]->nodeValue)->first();
         $req_perso1i = DB::table('gestiones')->where('nom', '=', $documents_span[215]->nodeValue)->first();
         $req_perso1j = DB::table('chefentreprises')->where('nom', '=', $documents_span[216]->nodeValue)->first();
         $req_perso1k = DB::table('gesstions')->where('nom', '=', $documents_span[217]->nodeValue)->first();
         $req_perso1l = DB::table('affaires')->where('nom', '=', $documents_span[218]->nodeValue)->first();
         $req_perso1m = DB::table('compolitiques')->where('nom', '=', $documents_span[219]->nodeValue)->first();
         $req_perso1n = DB::table('legisllations')->where('nom', '=', $documents_span[220]->nodeValue)->first();

         $req_perso1o = DB::table('internationalls')->where('nom', '=', $documents_span[221]->nodeValue)->first();
         $req_perso1p = DB::table('langues')->where('nom', '=', $documents_span[222]->nodeValue)->first();
         $req_perso1q = DB::table('languetrangeres')->where('nom', '=', $documents_span[223]->nodeValue)->first();
         $req_perso1r = DB::table('communicationecrites')->where('nom', '=', $documents_span[224]->nodeValue)->first();
         $req_perso1s = DB::table('journalistes')->where('nom', '=', $documents_span[225]->nodeValue)->first();
         $req_perso1t = DB::table('francais')->where('nom', '=', $documents_span[226]->nodeValue)->first();
         $req_perso1u = DB::table('communicationfoules')->where('nom', '=', $documents_span[227]->nodeValue)->first();
         $req_perso1v = DB::table('musicales')->where('nom', '=', $documents_span[228]->nodeValue)->first();
         $req_perso1w = DB::table('divertissements')->where('nom', '=', $documents_span[229]->nodeValue)->first();
         $req_perso1x = DB::table('artistes')->where('nom', '=', $documents_span[230]->nodeValue)->first();
         $req_perso1y = DB::table('perfpubliques')->where('nom', '=', $documents_span[231]->nodeValue)->first();
         $req_perso1z = DB::table('musiques')->where('nom', '=', $documents_span[232]->nodeValue)->first();
         // professionactivites, professionsujets, professionmetiers
         $data = array('relligieux_id'=>$req_perso1->id,'conseill_id'=>$req_perso1b->id,'enseignemente_id'=>$req_perso1d->id,'autoentrepreneur_id'=>$req_perso1g->id,'communicationvente_id'=>$req_perso1h->id,'gestione_id'=>$req_perso1i->id,'compolitique_id'=>$req_perso1m->id,'internationall_id'=>$req_perso1o->id,'communicationecrite_id'=>$req_perso1r->id,
         'communicationfoule_id'=>$req_perso1u->id,'musical_id'=>$req_perso1v->id,'divertissement_id'=>$req_perso1w->id);
         DB::table('professionactivites')->insert($data);
         $data = array('religion_id'=>$req_perso1a->id,'ensseignement_id'=>$req_perso1e->id,'affaire_id'=>$req_perso1l->id,'languetrangere_id'=>$req_perso1q->id,'francais_id'=>$req_perso1t->id,'perfpublique_id'=>$req_perso1y->id,'musique_id'=>$req_perso1z->id);
         DB::table('professionsujets')->insert($data);
         $data = array('conseille_id'=>$req_perso1c->id,'enssseignement_id'=>$req_perso1f->id,'chefentreprise_id'=>$req_perso1j->id,'gesstion_id'=>$req_perso1k->id,'legisllation_id'=>$req_perso1n->id,'langue_id'=>$req_perso1p->id,'journaliste_id'=>$req_perso1s->id,'artiste_id'=>$req_perso1x->id);
         DB::table('professionmetiers')->insert($data);

         $req_perso2 = DB::table('professionactivites')->where('relligieux_id', '=', $req_perso1->id)->first();
         $req_perso2a = DB::table('professionsujets')->where('religion_id', '=', $req_perso1a->id)->first();
         $req_perso2b = DB::table('professionactivites')->where('conseill_id', '=', $req_perso1b->id)->first();
         $req_perso2c = DB::table('professionmetiers')->where('conseille_id', '=', $req_perso1c->id)->first();
         $req_perso2d = DB::table('professionactivites')->where('enseignemente_id', '=', $req_perso1d->id)->first();
         $req_perso2e = DB::table('professionsujets')->where('ensseignement_id', '=', $req_perso1e->id)->first();
         $req_perso2f = DB::table('professionmetiers')->where('enssseignement_id', '=', $req_perso1f->id)->first();

         $req_perso2g = DB::table('professionactivites')->where('autoentrepreneur_id', '=', $req_perso1g->id)->first();
         $req_perso2h = DB::table('professionactivites')->where('communicationvente_id', '=', $req_perso1h->id)->first();
         $req_perso2i = DB::table('professionactivites')->where('gestione_id', '=', $req_perso1i->id)->first();
         $req_perso2j = DB::table('professionmetiers')->where('chefentreprise_id', '=', $req_perso1j->id)->first();
         $req_perso2k = DB::table('professionmetiers')->where('gesstion_id', '=', $req_perso1k->id)->first();
         $req_perso2l = DB::table('professionsujets')->where('affaire_id', '=', $req_perso1l->id)->first();
         $req_perso2m = DB::table('professionactivites')->where('compolitique_id', '=', $req_perso1m->id)->first();
         $req_perso2n = DB::table('professionmetiers')->where('legisllation_id', '=', $req_perso1n->id)->first();
         $req_perso2o = DB::table('professionactivites')->where('internationall_id', '=', $req_perso1o->id)->first();
         $req_perso2p = DB::table('professionmetiers')->where('langue_id', '=', $req_perso1p->id)->first();
         $req_perso2q = DB::table('professionsujets')->where('languetrangere_id', '=', $req_perso1q->id)->first();
         $req_perso2r = DB::table('professionactivites')->where('communicationecrite_id', '=', $req_perso1r->id)->first();
         $req_perso2s = DB::table('professionmetiers')->where('journaliste_id', '=', $req_perso1s->id)->first();
         $req_perso2t = DB::table('professionsujets')->where('francais_id', '=', $req_perso1t->id)->first();
         $req_perso2u = DB::table('professionactivites')->where('communicationfoule_id', '=', $req_perso1u->id)->first();
         $req_perso2v = DB::table('professionactivites')->where('musical_id', '=', $req_perso1v->id)->first();
         $req_perso2w = DB::table('professionactivites')->where('divertissement_id', '=', $req_perso1w->id)->first();
         $req_perso2x = DB::table('professionmetiers')->where('artiste_id', '=', $req_perso1x->id)->first();
         $req_perso2y = DB::table('professionsujets')->where('perfpublique_id', '=', $req_perso1y->id)->first();
         $req_perso2z = DB::table('professionsujets')->where('musique_id', '=', $req_perso1z->id)->first();

         $data = array('score'=>substr($documents_span[412]->nodeValue,15,3),'nom'=>$documents_span[405]->nodeValue,'professionactivite_id'=>$req_perso2->id,'professionsujet_id'=>$req_perso2a->id);
         DB::table('religieuxes')->insert($data);
         $data = array('score'=>substr($documents_span[413]->nodeValue,15,2),'nom'=>$documents_span[406]->nodeValue,'professionactivite_id'=>$req_perso2b->id,'professionmetier_id'=>$req_perso2c->id);
         DB::table('conseils')->insert($data);
         $data = array('score'=>substr($documents_span[414]->nodeValue,8,2),'nom'=>$documents_span[407]->nodeValue,'professionactivite_id'=>$req_perso2d->id,'professionsujet_id'=>$req_perso2e->id,'professionmetier_id'=>$req_perso2f->id);
         DB::table('enseignements')->insert($data);
         $data = array('score'=>substr($documents_span[415]->nodeValue,8,2),'nom'=>$documents_span[408]->nodeValue,'professionactivite_id'=>$req_perso2m->id,'professionmetier_id'=>$req_perso2n->id);
         DB::table('legislations')->insert($data);
         $data = array('score'=>substr($documents_span[416]->nodeValue,8,2),'nom'=>$documents_span[409]->nodeValue,'professionactivite_id'=>$req_perso2g->id,'professionsujet_id'=>$req_perso2l->id,'professionmetier_id'=>$req_perso2j->id);
         DB::table('gestions')->insert($data);
         $data = array('score'=>substr($documents_span[417]->nodeValue,7,2),'nom'=>$documents_span[410]->nodeValue,'professionactivite_id'=>$req_perso2o->id,'professionsujet_id'=>$req_perso2q->id,'professionmetier_id'=>$req_perso2p->id);
         DB::table('internationals')->insert($data);
         $data = array('score'=>substr($documents_span[417]->nodeValue,7,2),'nom'=>$documents_span[411]->nodeValue,'professionactivite_id'=>$req_perso2r->id,'professionsujet_id'=>$req_perso2t->id,'professionmetier_id'=>$req_perso2s->id);
         DB::table('ecrits')->insert($data);
         $data = array('score'=>substr($documents_span[417]->nodeValue,7,2),'nom'=>$documents_span[412]->nodeValue,'professionactivite_id'=>$req_perso2u->id,'professionsujet_id'=>$req_perso2y->id,'professionmetier_id'=>$req_perso2x->id);
         DB::table('prestations')->insert($data);
         $data = array('score'=>substr($documents_span[417]->nodeValue,7,2),'nom'=>$documents_span[413]->nodeValue);
         DB::table('artistiques')->insert($data);
         //Nouvelle Modif à partir de la//
         $data = array('score'=>substr($documents_span[418]->nodeValue,7,2),'nom'=>$documents_span[414]->nodeValue);
         DB::table('infofinances')->insert($data);
         $data = array('score'=>substr($documents_span[419]->nodeValue,7,2),'nom'=>$documents_span[415]->nodeValue);
         DB::table('sciencetechnos')->insert($data);
         $data = array('score'=>substr($documents_span[420]->nodeValue,7,2),'nom'=>$documents_span[416]->nodeValue);
         DB::table('sciencesantes')->insert($data);
         $data = array('score'=>substr($documents_span[421]->nodeValue,7,2),'nom'=>$documents_span[417]->nodeValue);
         DB::table('mecaniques')->insert($data);
         $data = array('score'=>substr($documents_span[422]->nodeValue,7,2),'nom'=>$documents_span[418]->nodeValue);
         DB::table('sports')->insert($data);
         $data = array('score'=>substr($documents_span[423]->nodeValue,7,2),'nom'=>$documents_span[419]->nodeValue);
         DB::table('secuforceordres')->insert($data);
         $data = array('score'=>substr($documents_span[424]->nodeValue,7,2),'nom'=>$documents_span[420]->nodeValue);
         DB::table('avantures')->insert($data);
         $data = array('score'=>substr($documents_span[425]->nodeValue,7,2),'nom'=>$documents_span[421]->nodeValue);
         DB::table('extagricultures')->insert($data);

         $data = array('score'=>substr($documents_span[426]->nodeValue,7,2),'nom'=>$documents_span[422]->nodeValue);
         DB::table('serviices')->insert($data);
         $data = array('score'=>substr($documents_span[427]->nodeValue,7,2),'nom'=>$documents_span[423]->nodeValue);
         DB::table('scienceconsos')->insert($data);
         $data = array('score'=>substr($documents_span[428]->nodeValue,7,2),'nom'=>$documents_span[424]->nodeValue);
         DB::table('soinanimaliers')->insert($data);
         $data = array('score'=>substr($documents_span[429]->nodeValue,7,2),'nom'=>$documents_span[425]->nodeValue);
         DB::table('transsports')->insert($data);

         $req_perso3 = Religieux::where('nom', '=', $documents_span[405]->nodeValue)->first();
         $req_perso3a = App\Conseil::where('nom', '=', $documents_span[406]->nodeValue)->first();
         $req_perso3b = DB::table('enseignements')->where('nom', '=', $documents_span[407]->nodeValue)->first();
         $req_perso3c = DB::table('legislations')->where('nom', '=', $documents_span[408]->nodeValue)->first();
         $req_perso3d = DB::table('gestions')->where('nom', '=', $documents_span[409]->nodeValue)->first();
         $req_perso3e = DB::table('internationals')->where('nom', '=', $documents_span[410]->nodeValue)->first();
         $req_perso3f = DB::table('ecrits')->where('nom', '=', $documents_span[411]->nodeValue)->first();
         $req_perso3g = DB::table('prestations')->where('nom', '=', $documents_span[412]->nodeValue)->first();
         $req_perso3h = DB::table('artistiques')->where('nom', '=', $documents_span[413]->nodeValue)->first();
         $req_perso3i = DB::table('infofinances')->where('nom', '=', $documents_span[414]->nodeValue)->first();
         $req_perso3j = DB::table('sciencetechnos')->where('nom', '=', $documents_span[415]->nodeValue)->first();
         $req_perso3k = DB::table('sciencesantes')->where('nom', '=', $documents_span[416]->nodeValue)->first();
         $req_perso3l = DB::table('mecaniques')->where('nom', '=', $documents_span[417]->nodeValue)->first();
         $req_perso3m = DB::table('sports')->where('nom', '=', $documents_span[418]->nodeValue)->first();
         $req_perso3n = DB::table('secuforceordres')->where('nom', '=', $documents_span[419]->nodeValue)->first();
         $req_perso3o = DB::table('avantures')->where('nom', '=', $documents_span[420]->nodeValue)->first();
         $req_perso3p = DB::table('extagricultures')->where('nom', '=', $documents_span[421]->nodeValue)->first();
         $req_perso3q = DB::table('serviices')->where('nom', '=', $documents_span[422]->nodeValue)->first();
         $req_perso3r = DB::table('scienceconsos')->where('nom', '=', $documents_span[423]->nodeValue)->first();
         $req_perso3s = DB::table('soinanimaliers')->where('nom', '=', $documents_span[424]->nodeValue)->first();
         $req_perso3t = DB::table('transsports')->where('nom', '=', $documents_span[425]->nodeValue)->first();
         //$user->aventureux()->attach($req_perso2->id);
         $data1 = array('user_id'=>$user->id,'religieux_id'=>$req_perso3->id,'conseil_id'=>$req_perso3a->id,'enseignement_id'=>$req_perso3b->id,'legislation_id'=>$req_perso3c->id,'gestion_id'=>$req_perso3d->id,'international_id'=>$req_perso3e->id,'score'=>substr($documents_span[411]->nodeValue,8,2),'nom'=>$documents_span[403]->nodeValue);
         DB::table('influencers')->insert($data1);
         $data1 = array('user_id'=>$user->id,'ecrit_id'=>$req_perso3f->id,'prestation_id'=>$req_perso3g->id,'artistique_id'=>$req_perso3h->id,'score'=>substr($documents_span[411]->nodeValue,8,2),'nom'=>$documents_span[403]->nodeValue);
         DB::table('exprimers')->insert($data1);
         $data1 = array('user_id'=>$user->id,'infofinance_id'=>$req_perso3i->id,'sciencetechno_id'=>$req_perso3j->id,'sciencesante_id'=>$req_perso3k->id,'score'=>substr($documents_span[411]->nodeValue,8,2),'nom'=>$documents_span[403]->nodeValue);
         DB::table('analysers')->insert($data1);
         $data1 = array('user_id'=>$user->id,'mecanique_id'=>$req_perso3l->id,'sport_id'=>$req_perso3m->id,'secuforceordre_id'=>$req_perso3n->id,'avanture_id'=>$req_perso3o->id,'extagriculture_id'=>$req_perso3p->id,'score'=>substr($documents_span[411]->nodeValue,8,2),'nom'=>$documents_span[403]->nodeValue);
         DB::table('faires')->insert($data1);
         $data1 = array('user_id'=>$user->id,'serviice_id'=>$req_perso3q->id,'scienceconso_id'=>$req_perso3r->id,'soinanimalier_id'=>$req_perso3s->id,'transsport_id'=>$req_perso3t->id,'score'=>substr($documents_span[411]->nodeValue,8,2),'nom'=>$documents_span[403]->nodeValue);
         DB::table('aiders')->insert($data1);

         echo "added";
       }
       else{
         echo "Impossible to insert data";
       }
       //Fin de la nouvelle modif//
       $try = array();
       foreach($rapportshtmls as $rapporthtml){
         array_push($try, $rapporthtml->contenu);
       }
       if(!(in_array($documents[40]->nodeValue, $try))){
         $data = array('contenu'=>$documents[40]->nodeValue,'user_id'=>$user->id);
         DB::table('rapportshtmls')->insert($data);
         echo "Success";
       }
       else{
         echo "impossible to insert the data";
       }
       return view('careerdirect.interetpro.careerdirectinteretpro', compact('user','doc','documents','documents_span','data','xpath','bath','usertry'));
     }

     /**
      * Affiche les huit permiers groupes de professions d'un utilisateur
      *
      * @param int $id
      * @return \Illuminate\View\View
      */
      public function interetprohuit($id){
        $user = User::find($id);
        $rapportshtmls = DB::table('rapportshtmls')->get();

        // create curl resource
           $ch = curl_init();

           // set url
           curl_setopt($ch, CURLOPT_URL, route('career_direct_fiche', ['id' => Auth::id()]));

           //return the transfer as a string
           curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

           // $output contains the output string
           $output = curl_exec($ch);

           // close curl resource to free up system resources
           curl_close($ch);
        //print_r($output);

        $doc = new \DOMDocument();
        @$doc->loadHTML($output);
        libxml_use_internal_errors(true);
        //$doc->loadHTMLFile(route('career_direct_fiche', ['id' => Auth::id()]));
        $documents = $doc->getElementsByTagName('p');
        $documents_span = $doc->getElementsByTagName('span');
        $xpath = new \DOMXpath($doc);
        $bath = $xpath->query('//h4[contains(@class, "cdreport-header")]');
        libxml_clear_errors();

        $try = array();
        foreach($rapportshtmls as $rapporthtml){
          array_push($try, $rapporthtml->contenu);
        }
        if(!(in_array($documents[45]->nodeValue, $try))){
          $data = array('contenu'=>$documents[45]->nodeValue,'user_id'=>$user->id);
          DB::table('rapportshtmls')->insert($data);
          echo "Success";
        }
        else{
          echo "impossible to insert the data";
        }
        return view('careerdirect.interetpro.careerdirectinteretprohuit', compact('user','doc','documents','documents_span','data','xpath','bath'));
      }

      /**
       * Affiche les scores combines d'un utilisateur
       *
       * @param int $id
       * @return \Illuminate\View\View
       */
       public function scorescombines($id){
         $user = User::find($id);
         $rapportshtmls = DB::table('rapportshtmls')->get();

         // create curl resource
            $ch = curl_init();

            // set url
            curl_setopt($ch, CURLOPT_URL, route('career_direct_fiche', ['id' => Auth::id()]));

            //return the transfer as a string
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            // $output contains the output string
            $output = curl_exec($ch);

            // close curl resource to free up system resources
            curl_close($ch);
         //print_r($output);

         $doc = new \DOMDocument();
         @$doc->loadHTML($output);
         libxml_use_internal_errors(true);
         //$doc->loadHTMLFile(route('career_direct_fiche', ['id' => Auth::id()]));
         $documents = $doc->getElementsByTagName('p');
         $documents_span = $doc->getElementsByTagName('span');
         $xpath = new \DOMXpath($doc);
         $bath = $xpath->query('//h4[contains(@class, "cdreport-header")]');
         libxml_clear_errors();

         $try = array();
         foreach($rapportshtmls as $rapporthtml){
           array_push($try, $rapporthtml->contenu);
         }
         if(!(in_array($documents[50]->nodeValue, $try))){
           $data = array('contenu'=>$documents[50]->nodeValue,'user_id'=>$user->id);
           DB::table('rapportshtmls')->insert($data);
           echo "Success";
         }
         else{
           echo "impossible to insert the data";
         }
         return view('careerdirect.interetpro.careerdirectscorescombines', compact('user','doc','documents','documents_span','data','xpath','bath'));
       }

       /**
        * Affiche les metiers potentiels d'un utilisateur
        *
        * @param int $id
        * @return \Illuminate\View\View
        */
        public function metierspotentiels($id){
          $user = User::find($id);
          $rapportshtmls = DB::table('rapportshtmls')->get();

          // create curl resource
             $ch = curl_init();

             // set url
             curl_setopt($ch, CURLOPT_URL, route('career_direct_fiche', ['id' => Auth::id()]));

             //return the transfer as a string
             curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

             // $output contains the output string
             $output = curl_exec($ch);

             // close curl resource to free up system resources
             curl_close($ch);
          //print_r($output);

          $doc = new \DOMDocument();
          @$doc->loadHTML($output);
          libxml_use_internal_errors(true);
          //$doc->loadHTMLFile(route('career_direct_fiche', ['id' => Auth::id()]));
          $documents = $doc->getElementsByTagName('p');
          $documents_span = $doc->getElementsByTagName('span');
          $xpath = new \DOMXpath($doc);
          $bath = $xpath->query('//h4[contains(@class, "cdreport-header")]');
          libxml_clear_errors();

          $try = array();
          foreach($rapportshtmls as $rapporthtml){
            array_push($try, $rapporthtml->contenu);
          }
          if(!(in_array($documents[55]->nodeValue, $try))){
            $data = array('contenu'=>$documents[55]->nodeValue,'user_id'=>$user->id);
            DB::table('rapportshtmls')->insert($data);
            echo "Success";
          }
          else{
            echo "impossible to insert the data";
          }
          return view('careerdirect.interetpro.careerdirectmetierspotentiels', compact('user','doc','documents','documents_span','data','xpath','bath'));
        }
     //------------ SECTION COMPETENCES ET CAPACITES ---------------------------------------------

     /**
      * Affiche les compétences et capacités d'un utilisateur
      *
      * @param int $id
      * @return \Illuminate\View\View
      */
      public function compcap($id){
        $user = User::find($id);
        $rapportshtmls = DB::table('rapportshtmls')->get();

        // create curl resource
           $ch = curl_init();

           // set url
           curl_setopt($ch, CURLOPT_URL, route('career_direct_fiche', ['id' => Auth::id()]));

           //return the transfer as a string
           curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

           // $output contains the output string
           $output = curl_exec($ch);

           // close curl resource to free up system resources
           curl_close($ch);
        //print_r($output);

        $doc = new \DOMDocument();
        @$doc->loadHTML($output);
        libxml_use_internal_errors(true);
        //$doc->loadHTMLFile(route('career_direct_fiche', ['id' => Auth::id()]));
        $documents = $doc->getElementsByTagName('p');
        $documents_span = $doc->getElementsByTagName('span');
        $xpath = new \DOMXpath($doc);
        $bath = $xpath->query('//h4[contains(@class, "cdreport-header")]');
        libxml_clear_errors();

        $try = array();
        foreach($rapportshtmls as $rapporthtml){
          array_push($try, $rapporthtml->contenu);
        }
        if(!(in_array($documents[60]->nodeValue, $try))){
          $data = array('contenu'=>$documents[60]->nodeValue,'user_id'=>$user->id);
          DB::table('rapportshtmls')->insert($data);
          echo "Success";
        }
        else{
          echo "impossible to insert the data";
        }
        return view('careerdirect.compcap.careerdirectcompcap', compact('user','doc','documents','documents_span','data','xpath','bath'));
      }

      /**
       * Affiche les quatre domaines principaux d'un utilisateur
       *
       * @param int $id
       * @return \Illuminate\View\View
       */
       public function compcapquatredomaines($id){
         $user = User::find($id);
         $rapportshtmls = DB::table('rapportshtmls')->get();

         // create curl resource
            $ch = curl_init();

            // set url
            curl_setopt($ch, CURLOPT_URL, route('career_direct_fiche', ['id' => Auth::id()]));

            //return the transfer as a string
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            // $output contains the output string
            $output = curl_exec($ch);

            // close curl resource to free up system resources
            curl_close($ch);
         //print_r($output);

         $doc = new \DOMDocument();
         @$doc->loadHTML($output);
         libxml_use_internal_errors(true);
         //$doc->loadHTMLFile(route('career_direct_fiche', ['id' => Auth::id()]));
         $documents = $doc->getElementsByTagName('p');
         $documents_span = $doc->getElementsByTagName('span');
         $xpath = new \DOMXpath($doc);
         $bath = $xpath->query('//h4[contains(@class, "cdreport-header")]');
         libxml_clear_errors();

         $try = array();
         foreach($rapportshtmls as $rapporthtml){
           array_push($try, $rapporthtml->contenu);
         }
         if(!(in_array($documents[65]->nodeValue, $try))){
           $data = array('contenu'=>$documents[65]->nodeValue,'user_id'=>$user->id);
           DB::table('rapportshtmls')->insert($data);
           echo "Success";
         }
         else{
           echo "impossible to insert the data";
         }
         return view('careerdirect.compcap.careerdirectcompcapquatredomaines', compact('user','doc','documents','documents_span','data','xpath','bath'));
       }

       /**
        * Affiche les evaluations de compétences d'un utilisateur
        *
        * @param int $id
        * @return \Illuminate\View\View
        */
        public function compcapevaluez($id){
          $user = User::find($id);
          $rapportshtmls = DB::table('rapportshtmls')->get();

          // create curl resource
             $ch = curl_init();

             // set url
             curl_setopt($ch, CURLOPT_URL, route('career_direct_fiche', ['id' => Auth::id()]));

             //return the transfer as a string
             curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

             // $output contains the output string
             $output = curl_exec($ch);

             // close curl resource to free up system resources
             curl_close($ch);
          //print_r($output);

          $doc = new \DOMDocument();
          @$doc->loadHTML($output);
          libxml_use_internal_errors(true);
          //$doc->loadHTMLFile(route('career_direct_fiche', ['id' => Auth::id()]));
          $documents = $doc->getElementsByTagName('p');
          $documents_span = $doc->getElementsByTagName('span');
          $xpath = new \DOMXpath($doc);
          $bath = $xpath->query('//h4[contains(@class, "cdreport-header")]');
          libxml_clear_errors();

          $try = array();
          foreach($rapportshtmls as $rapporthtml){
            array_push($try, $rapporthtml->contenu);
          }
          if(!(in_array($documents[70]->nodeValue, $try))){
            $data = array('contenu'=>$documents[70]->nodeValue,'user_id'=>$user->id);
            DB::table('rapportshtmls')->insert($data);
            echo "Success";
          }
          else{
            echo "impossible to insert the data";
          }
          return view('careerdirect.compcap.careerdirectcompcapevaluez', compact('user','doc','documents','documents_span','data','xpath','bath'));
        }
      //------------ SECTION VALEURS ---------------------------------------------

      /**
       * Affiche les valeurs d'un utilisateur
       *
       * @param int $id
       * @return \Illuminate\View\View
       */
       public function valeurs($id){
         $user = User::find($id);
         $rapportshtmls = DB::table('rapportshtmls')->get();

         // create curl resource
            $ch = curl_init();

            // set url
            curl_setopt($ch, CURLOPT_URL, route('career_direct_fiche', ['id' => Auth::id()]));

            //return the transfer as a string
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            // $output contains the output string
            $output = curl_exec($ch);

            // close curl resource to free up system resources
            curl_close($ch);
         //print_r($output);

         $doc = new \DOMDocument();
         @$doc->loadHTML($output);
         libxml_use_internal_errors(true);
         //$doc->loadHTMLFile(route('career_direct_fiche', ['id' => Auth::id()]));
         $documents = $doc->getElementsByTagName('p');
         $documents_span = $doc->getElementsByTagName('span');
         $xpath = new \DOMXpath($doc);
         $bath = $xpath->query('//h4[contains(@class, "cdreport-header")]');
         libxml_clear_errors();

         $try = array();
         foreach($rapportshtmls as $rapporthtml){
           array_push($try, $rapporthtml->contenu);
         }
         if(!(in_array($documents[75]->nodeValue, $try))){
           $data = array('contenu'=>$documents[75]->nodeValue,'user_id'=>$user->id);
           DB::table('rapportshtmls')->insert($data);
           echo "Success";
         }
         else{
           echo "impossible to insert the data";
         }
         return view('careerdirect.valeurs.careerdirectvaleurs', compact('user','doc','documents','documents_span','data','xpath','bath'));
       }

       /**
        * Affiche les valeurs d'environnement de travail d'un utilisateur
        *
        * @param int $id
        * @return \Illuminate\View\View
        */
        public function valeursenvironnementtravail($id){
          $user = User::find($id);
          $rapportshtmls = DB::table('rapportshtmls')->get();

          // create curl resource
             $ch = curl_init();

             // set url
             curl_setopt($ch, CURLOPT_URL, route('career_direct_fiche', ['id' => Auth::id()]));

             //return the transfer as a string
             curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

             // $output contains the output string
             $output = curl_exec($ch);

             // close curl resource to free up system resources
             curl_close($ch);
          //print_r($output);

          $doc = new \DOMDocument();
          @$doc->loadHTML($output);
          libxml_use_internal_errors(true);
          //$doc->loadHTMLFile(route('career_direct_fiche', ['id' => Auth::id()]));
          $documents = $doc->getElementsByTagName('p');
          $documents_span = $doc->getElementsByTagName('span');
          $xpath = new \DOMXpath($doc);
          $bath = $xpath->query('//h4[contains(@class, "cdreport-header")]');
          libxml_clear_errors();

          $try = array();
          foreach($rapportshtmls as $rapporthtml){
            array_push($try, $rapporthtml->contenu);
          }
          if(!(in_array($documents[80]->nodeValue, $try))){
            $data = array('contenu'=>$documents[80]->nodeValue,'user_id'=>$user->id);
            DB::table('rapportshtmls')->insert($data);
            echo "Success";
          }
          else{
            echo "impossible to insert the data";
          }
          return view('careerdirect.valeurs.careerdirectvaleursenvironnementtravail', compact('user','doc','documents','documents_span','data','xpath','bath'));
        }

        /**
         * Affiche les valeurs d'attentes d'un utilisateur
         *
         * @param int $id
         * @return \Illuminate\View\View
         */
         public function valeursattentes($id){
           $user = User::find($id);
           $rapportshtmls = DB::table('rapportshtmls')->get();

           // create curl resource
              $ch = curl_init();

              // set url
              curl_setopt($ch, CURLOPT_URL, route('career_direct_fiche', ['id' => Auth::id()]));

              //return the transfer as a string
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

              // $output contains the output string
              $output = curl_exec($ch);

              // close curl resource to free up system resources
              curl_close($ch);
           //print_r($output);

           $doc = new \DOMDocument();
           @$doc->loadHTML($output);
           libxml_use_internal_errors(true);
           //$doc->loadHTMLFile(route('career_direct_fiche', ['id' => Auth::id()]));
           $documents = $doc->getElementsByTagName('p');
           $documents_span = $doc->getElementsByTagName('span');
           $xpath = new \DOMXpath($doc);
           $bath = $xpath->query('//h4[contains(@class, "cdreport-header")]');
           libxml_clear_errors();

           $try = array();
           foreach($rapportshtmls as $rapporthtml){
             array_push($try, $rapporthtml->contenu);
           }
           if(!(in_array($documents[85]->nodeValue, $try))){
             $data = array('contenu'=>$documents[85]->nodeValue,'user_id'=>$user->id);
             DB::table('rapportshtmls')->insert($data);
             echo "Success";
           }
           else{
             echo "impossible to insert the data";
           }
           return view('careerdirect.valeurs.careerdirectvaleursattentes', compact('user','doc','documents','documents_span','data','xpath','bath'));
         }

         /**
          * Affiche les valeurs de vie d'un utilisateur
          *
          * @param int $id
          * @return \Illuminate\View\View
          */
          public function valeursvie($id){
            $user = User::find($id);
            $rapportshtmls = DB::table('rapportshtmls')->get();

            // create curl resource
               $ch = curl_init();

               // set url
               curl_setopt($ch, CURLOPT_URL, route('career_direct_fiche', ['id' => Auth::id()]));

               //return the transfer as a string
               curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

               // $output contains the output string
               $output = curl_exec($ch);

               // close curl resource to free up system resources
               curl_close($ch);
            //print_r($output);

            $doc = new \DOMDocument();
            @$doc->loadHTML($output);
            libxml_use_internal_errors(true);
            //$doc->loadHTMLFile(route('career_direct_fiche', ['id' => Auth::id()]));
            $documents = $doc->getElementsByTagName('p');
            $documents_span = $doc->getElementsByTagName('span');
            $xpath = new \DOMXpath($doc);
            $bath = $xpath->query('//h4[contains(@class, "cdreport-header")]');
            libxml_clear_errors();

            $try = array();
            foreach($rapportshtmls as $rapporthtml){
              array_push($try, $rapporthtml->contenu);
            }
            if(!(in_array($documents[90]->nodeValue, $try))){
              $data = array('contenu'=>$documents[90]->nodeValue,'user_id'=>$user->id);
              DB::table('rapportshtmls')->insert($data);
              echo "Success";
            }
            else{
              echo "impossible to insert the data";
            }
            return view('careerdirect.valeurs.careerdirectvaleursvie', compact('user','doc','documents','documents_span','data','xpath','bath'));
          }

          /**
           * Affiche les valeurs de conclusion d'un utilisateur
           *
           * @param int $id
           * @return \Illuminate\View\View
           */
           public function valeursconclusion($id){
             $user = User::find($id);
             $rapportshtmls = DB::table('rapportshtmls')->get();

             // create curl resource
                $ch = curl_init();

                // set url
                curl_setopt($ch, CURLOPT_URL, route('career_direct_fiche', ['id' => Auth::id()]));

                //return the transfer as a string
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

                // $output contains the output string
                $output = curl_exec($ch);

                // close curl resource to free up system resources
                curl_close($ch);
             //print_r($output);

             $doc = new \DOMDocument();
             @$doc->loadHTML($output);
             libxml_use_internal_errors(true);
             //$doc->loadHTMLFile(route('career_direct_fiche', ['id' => Auth::id()]));
             $documents = $doc->getElementsByTagName('p');
             $documents_span = $doc->getElementsByTagName('span');
             $xpath = new \DOMXpath($doc);
             $bath = $xpath->query('//h4[contains(@class, "cdreport-header")]');
             libxml_clear_errors();

             $try = array();
             foreach($rapportshtmls as $rapporthtml){
               array_push($try, $rapporthtml->contenu);
             }
             if(!(in_array($documents[95]->nodeValue, $try))){
               $data = array('contenu'=>$documents[95]->nodeValue,'user_id'=>$user->id);
               DB::table('rapportshtmls')->insert($data);
               echo "Success";
             }
             else{
               echo "impossible to insert the data";
             }
             return view('careerdirect.valeurs.careerdirectvaleursconclusion', compact('user','doc','documents','documents_span','data','xpath','bath'));
           }

           /**
            * Affiche les valeurs de conclusion d'un utilisateur
            *
            * @param int $id
            * @return \Illuminate\View\View
            */
            public function valeurssommaire($id){
              $user = User::find($id);
              $rapportshtmls = DB::table('rapportshtmls')->get();

              // create curl resource
                 $ch = curl_init();

                 // set url
                 curl_setopt($ch, CURLOPT_URL, route('career_direct_fiche', ['id' => Auth::id()]));

                 //return the transfer as a string
                 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

                 // $output contains the output string
                 $output = curl_exec($ch);

                 // close curl resource to free up system resources
                 curl_close($ch);
              //print_r($output);

              $doc = new \DOMDocument();
              @$doc->loadHTML($output);
              libxml_use_internal_errors(true);
              //$doc->loadHTMLFile(route('career_direct_fiche', ['id' => Auth::id()]));
              $documents = $doc->getElementsByTagName('p');
              $documents_span = $doc->getElementsByTagName('span');
              $xpath = new \DOMXpath($doc);
              $bath = $xpath->query('//h4[contains(@class, "cdreport-header")]');
              libxml_clear_errors();

              $try = array();
              foreach($rapportshtmls as $rapporthtml){
                array_push($try, $rapporthtml->contenu);
              }
              if(!(in_array($documents[100]->nodeValue, $try))){
                $data = array('contenu'=>$documents[100]->nodeValue,'user_id'=>$user->id);
                DB::table('rapportshtmls')->insert($data);
                echo "Success";
              }
              else{
                echo "impossible to insert the data";
              }
              return view('careerdirect.valeurs.careerdirectvaleurssommaire', compact('user','doc','documents','documents_span','data','xpath','bath'));
            }

            /**
             * Affiche les valeurs de conclusion d'un utilisateur
             *
             * @param int $id
             * @return \Illuminate\View\View
             */
             public function etapessuivantes($id){
               $user = User::find($id);

               // create curl resource
                  $ch = curl_init();

                  // set url
                  curl_setopt($ch, CURLOPT_URL, route('career_direct_fiche', ['id' => Auth::id()]));

                  //return the transfer as a string
                  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

                  // $output contains the output string
                  $output = curl_exec($ch);

                  // close curl resource to free up system resources
                  curl_close($ch);
               //print_r($output);

               $doc = new \DOMDocument();
               @$doc->loadHTML($output);
               libxml_use_internal_errors(true);
               //$doc->loadHTMLFile(route('career_direct_fiche', ['id' => Auth::id()]));
               $documents = $doc->getElementsByTagName('p');
               $documents_span = $doc->getElementsByTagName('span');
               $xpath = new \DOMXpath($doc);
               $bath = $xpath->query('//h4[contains(@class, "cdreport-header")]');
               libxml_clear_errors();

               return view('careerdirect.careerdirectetapessuivantes', compact('user','doc','documents','documents_span','data','xpath','bath'));
             }

             /**
              * Affiche les valeurs de conclusion d'un utilisateur
              *
              * @param int $id
              * @return \Illuminate\View\View
              */
              public function ressources($id){
                $user = User::find($id);

                // create curl resource
                   $ch = curl_init();

                   // set url
                   curl_setopt($ch, CURLOPT_URL, route('career_direct_fiche', ['id' => Auth::id()]));

                   //return the transfer as a string
                   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

                   // $output contains the output string
                   $output = curl_exec($ch);

                   // close curl resource to free up system resources
                   curl_close($ch);
                //print_r($output);

                $doc = new \DOMDocument();
                @$doc->loadHTML($output);
                libxml_use_internal_errors(true);
                //$doc->loadHTMLFile(route('career_direct_fiche', ['id' => Auth::id()]));
                $documents = $doc->getElementsByTagName('p');
                $documents_span = $doc->getElementsByTagName('span');
                $xpath = new \DOMXpath($doc);
                $bath = $xpath->query('//h4[contains(@class, "cdreport-header")]');
                libxml_clear_errors();

                return view('careerdirect.careerdirectressources', compact('user','doc','documents','documents_span','data','xpath','bath'));
              }
}
