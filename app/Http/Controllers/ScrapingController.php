<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Http\Request;
use Weidner\Goutte\GoutteFacade;
use App\Formation;
use App\Metier;
use App\Etablissement;
use App\Secteur;
use App\Code;
use App\Competence;
use App\Appellation;
use App\SavoirFaire;
use App\SavoirEtre;
use App\Motivation;
use App\Resume;
use App\Keyword;
use App\User;

class ScrapingController extends Controller
{
  public function junctionCodes()
  {
    $codes = Code::all();

    $codesNonTrouves = [];

    foreach ($codes as $code) {
      $codesProches = array_unique(explode(' ', $code->codes_rome_envisageables));
      unset($codesProches[0]);

      if (!empty($codesProches)) {

        foreach ($codesProches as $value) {
          $codeProche = Code::where('code_rome', '=', $value)->first();

          if ($codeProche) {
            $code->codes()->attach($codeProche->id, ['type' => 'envisageable']);
          }
          else {
            $codesNonTrouves[] = $value;
          }
        }

      }
    }
    sort($codesNonTrouves);
    dd(array_unique($codesNonTrouves));

    return redirect()->route('admin_dashboard')->with('success', 'OK !');
  }


  public function scrapingUsers()
  {
    $resumes = Resume::all();
    $resumes = $resumes->groupBy('user_id');

    $array = [];

    foreach ($resumes as $user_id => $resume) {
      $id = [];

      $descriptions = $resume->pluck('description')->toArray();

      $keywords = mb_strtolower(implode(' ', $descriptions));
      $keywords = explode("\r\n", $keywords);
      $keywords = implode(' ', $keywords);
      $keywords = explode(' ', $keywords);

      foreach ($keywords as $key => $value) {

        if (strlen($value) < 3) {
          unset($keywords[$key]);
        }
        else {
          $value = str_replace(',', '', $value);

          $keyword = app('KeywordsRepository')->findByName($value);

          if (!$keyword) {
            $keyword = new Keyword;
            $keyword->nom = $value;
            $keyword->save();
          }

          $id[] = $keyword->id;

        }

      }
      // FIN foreach ($keywords as $key => $value)

      $user = User::find($user_id);
      $user->keywords()->sync($id);
    }


    $keywordsInDatabase = Keyword::all();

    return redirect()->route('admin_dashboard')->with('success', 'Mots-clés mis à jour !');
  }

  public function scrapingFicheRNCPviaGoogle()
  {

    // $formations = Formation::select('id', 'nom')
    // ->where('id', '>=', 8410)
    // ->get();
    //
    // foreach ($formations as $formation) {
    //   $nom = str_replace(' ', '+', mb_strtolower($formation->nom));
    //   $url = 'http://www.google.fr/search?q=rncp+' . $nom;
    //
    //   $crawler = GoutteFacade::request('GET', $url);
    //
    //   $crawl = $crawler->filter('.g .r a')->link();
    //   $uri = $crawl->getUri();
    //
    //   $uri = str_replace('http://www.google.fr/url?q=', '', $uri);
    //   $uri = str_replace('%3F', '?', $uri);
    //   $uri = str_replace('%3D', '=', $uri);
    //   $uri = str_replace('%26', '&', $uri);
    //   $lienRNCP = strstr($uri, '&sa=U&ved=', true);
    //
    //   $update = Formation::find($formation->id);
    //   $update->lien_rncp = $lienRNCP;
    //   $update->save();
    // }

    $formations = Formation::select('id', 'lien_rncp')
    ->where('lien_rncp', 'like', 'http://www.rncp.cncp.gouv.fr/grand-public/visualisationFiche%')
    ->where('id', '>=', 7000)
    ->get();

    foreach ($formations as $formation) {
      $crawler = GoutteFacade::request('GET', $formation->lien_rncp);

      $description = $crawler->filter('.sectionFiche .sectionContent .richTextareaConsultation')->extract(array('_text'));

      $description = str_replace("\n", '\n', $description[0]);

      $update = Formation::find($formation->id);
      $update->description_rncp = $description;
      $update->save();
    }
    dd($formations);

    return redirect()->route('home')->with('success', 'Scraping OK !');
  }

  public function scrapingSavoirEtre()
  {

    /* SCRIPT 1 : scraping des savoir-être (= qualités) et des motivations (= passions) */
    // $liens_onisep = Metier::select('id', 'lien_site_onisepfr')
    // ->get();
    //
    // foreach ($liens_onisep as $lien) {
    //   // on "crawl" la fiche métier ONISEP
    //   $crawler = GoutteFacade::request('GET', $lien->lien_site_onisepfr);
    //
    //   $qualites = $crawler->filter('#un-metier-qui-correspond .ideo-tab-content .ezxmltext-field p:nth-child(2)')->extract(array('_text'));
    //
    //   $array = [];
    //   foreach ($qualites as $qualite) {
    //     $array[] = explode(', ', str_replace('Mes qualités : ', '', $qualite));
    //
    //   }
    //
    //   $qualitesArray = [];
    //   foreach ($array as $value) {
    //     $value = array_unique($value);
    //     foreach ($value as $v) {
    //       $qualitesArray[] = $v;
    //       $qualitesArray = array_unique($qualitesArray);
    //     }
    //   }
    //
    //   foreach ($qualitesArray as $value) {
    //     $savoirEtre = new SavoirEtre;
    //
    //     $savoirEtre->nom = $value;
    //     $savoirEtre->metier_id = $lien->id;
    //
    //     $savoirEtre->save();
    //   }
    // }
    // dd($qualitesArray);

    /* SCRIPT 2 : on retire les doublons et on regroupe les id des métiers */
    // $doublons = DB::table('savoir_etre')
    // ->selectRaw(DB::raw('count(nom) as nbr_doublon, nom'))
    // ->groupBy('nom')
    // ->havingRaw('COUNT(nom) > 1')
    // ->get();
    //
    // foreach ($doublons as $doublon) {
    //   $savoirs = SavoirEtre::where('nom', '=', $doublon->nom)->get();
    //
    //   $string = " ";
    //   foreach ($savoirs as $value) {
    //     $string .= $value->metier_id . ' ';
    //   }
    //
    //   foreach ($savoirs as $savoir) {
    //     $savoir->metiers_id = $string;
    //     $savoir->save();
    //   }
    // }
    //
    // dd($doublons);

    /* SCRIPT 3 : on remplit la table de jonctions */
    $savoirs = SavoirEtre::select('id', 'metiers_id')->get();

    foreach ($savoirs as $savoir) {
      $metiers = array_unique(explode(' ', $savoir->metiers_id));
      unset($metiers[0]);

      foreach ($metiers as $metier) {
        //$savoir->metiers()->attach($metier);
      }
    }
    dd($savoirs);

    return redirect()->route('home')->with('success', 'Scraping OK !');
  }



    public function junctionTables()
    {
        $savoirs = SavoirFaire::select('id', 'nom')
        ->get();

        foreach ($savoirs as $savoir) {
          $codes = Code::select('id', 'code_rome', 'savoir_faire_spe')
          ->whereRaw('savoir_faire_spe LIKE "% I '. $savoir->nom .' I %"')
          ->get();

          $codes = $codes->pluck('id')->toArray();

          if (count($codes) > 0) {

            foreach ($codes as $code) {
              $c = SavoirFaire::find($savoir->id);
              $c->codes()->attach($code, ['type' => 'spe']);
            }

          }
        }



        // $codes = Code::select('id', 'code_rome', 'competences_base_savoir_faire')
        //
        // ->get();
        //
        // foreach ($codes as $code) {
        //   $competences = explode('\n', $code->competences_base_savoir_faire);
        //
        //   $implode = ' I ' . implode(' I ', $competences) . ' I ';
        //
        //   $update = Code::find($code->id);
        //   $update->savoir_faire_base = $implode;
        //   $update->save();
        // }
        // dd($implode);

      dd($savoirs);
      return redirect()->route('admin_dashboard')->with('success', 'Mise à jour OK !');
    }

    /**
     * Mise à jour des champs "codes_rome_proches" et "codes_rome_envisageables"
     * de la table "codes" grâce au scraping des fiches Pôle emploi
     *
     * @return \Illuminate\View\View
     */
    public function scrapingCodesRomeProches()
    {
      $codes_rome = Code::select('id', 'code_rome', 'codes_rome_proches', 'codes_rome_envisageables')
      ->where('id', '>', 440)
      ->get();

      foreach ($codes_rome as $code) {

        $lien_rome = 'http://candidat.pole-emploi.fr/marche-du-travail/fichemetierrome?codeRome=' . $code->code_rome;

        // on "crawl" la fiche ROME du métier grâce à son code ROME
        $crawler = GoutteFacade::request('GET', $lien_rome);

        // on récupère (sous la forme d'un tableau) la liste des codes ROME proches
        $liste_codes_proches = $crawler->filter('#js-tabs-unit3-body td[headers="head-fiche-pro-versus"] a')->extract(array('_text'));
        $liste_codes_proches = array_unique($liste_codes_proches); // on supprime les doublons

        // on récupère (sous la forme d'un tableau) la liste des codes ROME envisageables
        // $liste_codes_envisageables = $crawler->filter('#js-tabs-unit3-body td[headers="head-fiche-env-versus"] a')->extract(array('_text'));
        // $liste_codes_envisageables = array_unique($liste_codes_envisageables); // on supprime les doublons

        // on instancie une variable vide dans lequel seront stocké les différents codes ROME récupérés
        $codes_rome_proches = ' ';

        foreach ($liste_codes_proches as $liste_code) {
          // on "coupe" les chaînes de caractères récupérées sur la page pour ne garder que le code ROME (= les 5 premières lettres)
          $codes_rome_proches .= substr($liste_code, 0, 5) . ' ';
        }

        // on met à jour la table "metiers" en ajoutant les codes ROME similaires
        $update = Code::find($code->id);
        $update->codes_rome_proches = $codes_rome_proches;
        $update->save();
      }
      dd($update);

      return redirect()->route('home')->with('success', 'OK !');
    }


    /**
     * Mise à jour de la table "metiers" grâce au scraping des fiches ONISEP
     *
     * @return \Illuminate\View\View
     */
    public function scrapingFicheMetier()
    {
      $liens_onisep = Metier::select('id', 'lien_site_onisepfr')->get();

      foreach ($liens_onisep as $lien) {

        // on "crawl" la fiche métier ONISEP
        $crawler = GoutteFacade::request('GET', $lien->lien_site_onisepfr);

        // on récupère (sous la forme d'un tableau) la description, le pré-requis, le nom et la description du secteur
        $description = $crawler->filter('#carte-d-identite .ezxmltext-field p')->extract(array('_text'));
        $pre_requis = $crawler->filter('#les-formations-et-les-diplomes .ezxmltext-field p')->extract(array('_text'));
        $secteur_nom = $crawler->filter('#emploi .ezstring-field')->extract(array('_text'));
        $secteur_description = $crawler->filter('#emploi paragraph')->extract(array('_text'));

        // si une valeur n'est pas trouvé, on instancie l'indice 0 du tableau à NULL
        $description = (!empty($description)) ? $description : $description[0] = NULL;
        $pre_requis = (!empty($pre_requis)) ? $pre_requis : $pre_requis[0] = NULL;
        $secteur_nom = (!empty($secteur_nom)) ? $secteur_nom : $secteur_nom[0] = NULL;
        $secteur_description = (!empty($secteur_description)) ? $secteur_description : $secteur_description[0] = NULL;

        // on met à jour la table 'métiers' avec les nouvelles données
        $update = Metier::find($lien->id);
        $update->description = $description[0];
        $update->pre_requis = $pre_requis[0];
        $update->secteur_nom = $secteur_nom[0];
        $update->secteur_description = $secteur_description[0];
        $update->save();
      }

      return redirect()->route('home')->with('success', 'Scraping fiches métiers OK !');
    }

    /**
     * Ajout des ID des établissements dans la table "formations"
     *
     * @return \Illuminate\View\View
     */
    public function insertEtablissementsId()
    {
      // Script V1 :
        // $etablissements = DB::table('etablissements')
        // ->where('id', '<', 20)
        // ->get();
        //
        // $etablissements = $etablissements->groupBy('telephone');
        //
        // foreach ($etablissements as $key => $etablissement) {
        //   foreach ($etablissement as $value) {
        //       if (count($etablissement) == 1) {
      //           DB::table('formations')
        //           ->where('id', '>', 80000)
        //           ->where('telephone', $value->telephone)
        //           ->update(['etablissement_id' => $value->id]);
        //       }
        //       else {
        //           DB::table('formations')
        //           ->where('id', '>', 80000)
        //           ->where('telephone', $value->telephone)
        //           ->update(['etablissement_id' => NULL]);
        //       }
        //     }
        //   }

      // Script V2 : pour compléter les champs etablissement_id qui étaient NULL
        // $formations = DB::table('formations')
        // ->select('id', 'telephone', 'etablissement_id')
        // ->where('etablissement_id', '=', NULL)
        // ->get();
        //
        // foreach ($formations as $key => $formation) {
        //   $etablissements[$formation->id] = DB::table('etablissements')
        //   ->select('id')
        //   ->where('telephone', '=', $formation->telephone)
        //   ->first();
        // }
        //
        // foreach ($etablissements as $key => $value) {
        //   if ($value != null) {
        //     DB::table('formations')
        //     ->where('id', $key)
        //     ->where('etablissement_id', '=', NULL)
        //     ->update(['etablissement_id' => $value->id]);
        //   }
        // }

      // Script V3 : regrouper tous les id des établissements sur une seule formation (lorsqu'une formations à des doublons)
        // $doublons = DB::table('formations')
        // ->selectRaw(DB::raw('count(intitule) as nbr_doublon, intitule'))
        // ->groupBy('intitule')
        // ->havingRaw('COUNT(intitule) > 1')
        // ->skip(100)
        // ->take(2846)
        // ->get();
        //
        // foreach ($doublons as $formation) {
        //   $formations[] = Formation::where('intitule', '=', $formation->intitule)->get();
        // }
        //
        // $array_intitule_ids = [];
        // foreach ($formations as $formation) {
        //   foreach ($formation as $value) {
        //     if ($value->etablissement_id_bis != NULL) {
        //       $array_intitule_ids[$value->intitule][$value->id] = $value->etablissement_id_bis;
        //     }
        //   }
        // }
        //
        // foreach ($array_intitule_ids as $key => $value) {
        //   $value = implode(' ', $value);
        //   $explode = explode(' ', $value);
        //   sort($explode);
        //   $explode = array_unique($explode);
        //   $string = implode(' ', $explode) . ' ';
        //
        //   $update = Formation::where('intitule', $key)->first();
        //   $update->etablissements = $string;
        //   $update->save();
        // }


        // Script V3 (bis) :
        // $doublons = DB::table('formations')
        // ->selectRaw(DB::raw('count(intitule) as nbr_doublon, intitule'))
        // ->groupBy('intitule')
        // ->havingRaw('COUNT(intitule) > 1')
        // ->get();
        //
        // foreach ($doublons as $formation) {
        //   $formations[] = Formation::select('intitule', 'etablissements')->where('intitule', '=', $formation->intitule)->first();
        // }
        //
        // foreach ($formations as $formation) {
        //   if ($formation->etablissements != NULL) {
        //       $update = Formation::where('nom', '=', $formation->intitule)->first();
        //       $update->etablissements_id = $formation->etablissements;
        //       $update->save();
        //   }
        // }
        //
        // dd($update);

      // Script V4 :
        // $doublons = DB::table('formations')
        // ->select('intitule')
        // ->groupBy('intitule')
        // ->havingRaw('COUNT(intitule) > 1')
        // ->get();
        //
        // foreach ($doublons as $value) {
        //   $intitules[] = $value->intitule;
        // }
        // foreach ($intitules as $intitule) {
        //   $where[] = 'intitule != "' . $intitule . '"';
        // }
        // $where = implode(' AND ', $where);

        // $formations = Formation::select('intitule', 'etablissements')->whereRaw($where)->get();

        // foreach ($formations as $formation) {
        //   $update = Formation::find($formation->id);
        //   $update->etablissements = $formation->etablissement_id;
        //   $update->save();
        // }

      // Script V5 :
        // $doublons = DB::table('formations')
        // ->select('intitule')
        // ->groupBy('intitule')
        // ->havingRaw('COUNT(intitule) > 1')
        // ->get();
        //
        // foreach ($doublons as $value) {
        //   $intitules[] = $value->intitule;
        // }
        // foreach ($intitules as $intitule) {
        //   $where[] = 'intitule != "' . $intitule . '"';
        // }
        // $where = implode(' AND ', $where);
        //
        // // Séléctionne les formations qui n'ont pas de doublons et qui ne sont pas associées à un établissements
        // $formations = Formation::select('intitule', 'etablissements')->whereRaw($where)->where('etablissements', '!=', NULL)->get();
        //
        // foreach ($formations as $formation) {
        //   $formationbis = Formation::where('nom', '=', $formation->intitule)->first();
        //
        //   $formationbis->etablissements_id = ' ' . $formation->etablissements . ' ';
        //   $formationbis->save();
        // }

        //Sélectionne toutes les formations
        //$formations = Formation::where('etablissements', '!=', NULL)->get();

        // foreach ($formations as $formation) {
        //   $formationbis = new Formation;
        //
        //   $formationbis->nom = $formation->intitule;
        //   $formationbis->description = $formation->description;
        //   $formationbis->code_rome1 = $formation->code_rome1;
        //   $formationbis->code_rome2 = $formation->code_rome2;
        //   $formationbis->code_rome3 = $formation->code_rome3;
        //   $formationbis->niveau_entree = $formation->niveau_entree;
        //   $formationbis->niveau_sortie = $formation->niveau_sortie;
        //   $formationbis->duree = $formation->duree;
        //   $formationbis->alternance = $formation->alternance;
        //   $formationbis->certifiante = $formation->certifiante;
        //   $formationbis->etablissements_id = $formation->etablissements;
        //
        //   $formationbis->save();
        // }

      // Script V6 : Trier les id des établissements par ordre croissant
        // $formations = Formation::select('id', 'etablissements_id')
        // ->where('etablissements_id', '!=', NULL)
        // ->get();
        //
        // foreach ($formations as $key => $value) {
        //   $ids[$value->id] = array_unique(explode(' ', $value->etablissements_id));
        // }
        //
        // foreach ($ids as $formation_id => $etablissements_ids) {
        //   unset($etablissements_ids[0]);
        //   sort($etablissements_ids);
        //   $etablissements_ids = ' ' . implode(' ', $etablissements_ids);
        //
        //   $update = Formation::find($formation_id);
        //   $update->etablissements_id = $etablissements_ids;
        //   $update->save();
        // }

      // Script V7 :
        // $formations = Formation::select('id', 'etablissements_id')
        // ->where('etablissements_id', '!=', NULL)
        // ->whereRaw('etablissements_id NOT LIKE "% "')
        // ->get();
        //
        // foreach ($formations as $formation) {
        //   $update = Formation::find($formation->id);
        //   $update->etablissements_id = $formation->etablissements_id . ' ';
        //   $update->save();
        // }
        //
        // dd($formations);

      return redirect()->route('admin_dashboard')->with('success', 'Mise à jour des etablissement_id OK !');
    }

    public function scrapingLiensEtablissements()
    {
        $liensOnisep = DB::table('etablissements')
        ->select('id', 'lien_onisep')
        ->where('id', '>', 13782)
        ->get();

        $liensOnisep->toArray();

        foreach ($liensOnisep as $lien) {
          $crawler = GoutteFacade::request('GET', 'http://' . $lien->lien_onisep);

          $url = $crawler->filter('.oni_fiche-info-1 .vcard .url')->extract(array('_text'));

          foreach ($url as $key => $value) {

            if (!empty($value)) {
              DB::table('etablissements')
              ->where('id', $lien->id)
              ->update(['site' => $value]);
            }
          }
        }

        return redirect()->route('admin_dashboard')->with('success', 'Scraping liens établissements ok !');
    }
}
