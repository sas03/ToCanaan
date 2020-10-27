<?php
namespace App\Http\Repositories;

use App\Etablissement;

/**
 * Repository class to communicate with data sources of different kinds
 */
class EtablissementsRepository implements RepositoryInterface
{
    /**
     * Recherche toutes les formations enregistrées dans la BDD et renvoie un tableau
     *
     * @return array
     */
    public function findAll()
    {
        $etablissements = Etablissement::all();

        return $etablissements->toArray();
    }





    /**
     * Recherche toutes les formations enregistrées dans la BDD et pagine les résultats
     *
     * @param int $number
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public function findAllWithPaginate($number)
    {
        $etablissements = Etablissement::paginate($number);

        return $etablissements;
    }





    /**
     * Recherche un (ou plusieurs) établissements par leur nom
     *
     * @param string $name
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function findByName($name)
    {
        $etablissements = Etablissement::where('nom', 'LIKE', "%$name%")->get();

        return $etablissements;
    }





    /**
     * Renvoie le nombre d'étalissements enregistrés en BDD
     *
     * @return int
     */
    public function countAll()
    {
        $etablissements = count(Etablissement::select('id')->get());

        return $etablissements;
    }





    /**
     * Sélectionne un établissement avec son id, ou jette une erreur 404
     *
     * @param int $id
     * @return App\Etablissement
     */
    public function findById($id)
    {
        $etablissement = Etablissement::findOrFail($id);

        return $etablissement;
    }





    /**
     * Sélectionne un établissement avec son id, ou en créé un nouveau
     *
     * @param int $id
     * @return App\Etablissement
     */
    public function findByIdOrInstantiate($id)
    {
        $etablissement = Etablissement::firstOrNew(['id' => $id]);

        return $etablissement;
    }





    /**
     * Sélectionne un établissement avec son id, et renvoie le résultat sous forme de collection
     *
     * @param int $id
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function findByIdAsCollection($id)
    {
        $etablissement = Etablissement::where('id', $id)->get();

        return $etablissement;
    }





    /**
     * Trouve des etablissements en fonction d'un tableau d'id et du statut
     *
     * @param array $id
     * @param string $statut
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findByStatutWithArrayId(array $id, $statut)
    {
      $where = [];

      // on stocke les id dans un tableau + ajout de 'id = ' avec chaque id
      foreach ($id as $value) {
        $where[] = 'id = ' . $value;
      }

      if (!empty($where)) {
        // on transforme le tableau en chaîne de caractère
        $implode = implode(" OR ", $where);

        if ($statut == 'public' || $statut == "privé") {
          $etablissements = Etablissement::select('id')->whereRaw('statut LIKE "%'. $statut . '%" AND (' . $implode . ')')->get();
        }
        else {
          $etablissements = Etablissement::select('id', 'statut')->whereRaw('statut NOT LIKE "%public%" AND statut NOT LIKE "%privé%" AND (' . $implode . ')')->get();
        }
      }
      else {
        $etablissements = [];
      }

      return $etablissements;
    }





    /**
     * Trouve des etablissements grâce à un tableau d'id
     *
     * @param array $id
     * @param string $statut
     * @param string $localisation
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findByArrayId(array $id, $statut, $localisation)
    {
      $where = [];

      // on stocke les id dans un tableau + ajout de 'id = ' avec chaque id
      foreach ($id as $value) {
        if ($value != "") {
          $where[] = 'id = ' . $value;
        }
      }

      if (!empty($where)) {
        // on transforme le tableau en chaîne de caractère
        $implode = implode(" OR ", $where);

        if ($statut != "") {
          if ($statut == 'autre') {
            $req_statut = 'statut NOT LIKE "%public%" AND statut NOT LIKE "%privé%"';
          }
          else {
            $req_statut = 'statut LIKE "%' . $statut . '%"';
          }
        }

        if ($localisation != "") {
          foreach ($localisation as $departement) {
            $departements[] = 'departement_num = ' . $departement;
          }
          $req_localisation = implode(" OR ", $departements);
        }

        if ($statut != "" && $localisation != "") {
          $implode = $req_statut . ' AND (' . $req_localisation . ') AND ('.$implode.')';
        }
        else {
          if ($statut != "") {
            $implode = $req_statut . ' AND ('.$implode.')';
          }
          if ($localisation != "") {
            $implode = '(' . $req_localisation . ') AND ('. $implode.')';
          }
        }

        $etablissements = Etablissement::whereRaw($implode)->paginate(5);
      }
      else {
        $etablissements = [];
      }

      return $etablissements;
    }





    public function findIdByArrayId(array $id, $statut, $localisation)
    {
      $where = [];

      // on stocke les id dans un tableau + ajout de 'id = ' avec chaque id
      foreach ($id as $value) {
        if ($value != "") {
          $where[] = 'id = ' . $value;
        }
      }

      if (!empty($where)) {
        // on transforme le tableau en chaîne de caractère
        $implode = implode(" OR ", $where);

        if ($statut != "") {
          if ($statut == 'autre') {
            $req_statut = 'statut NOT LIKE "%public%" AND statut NOT LIKE "%privé%"';
          }
          else {
            $req_statut = 'statut LIKE "%' . $statut . '%"';
          }
        }

        if ($localisation != "") {
          foreach ($localisation as $departement) {
            $departements[] = 'departement_num = ' . $departement;
          }
          $req_localisation = implode(" OR ", $departements);
        }

        if ($statut != "" && $localisation != "") {
          $implode = $req_statut . ' AND (' . $req_localisation . ') AND ('.$implode.')';
        }
        else {
          if ($statut != "") {
            $implode = $req_statut . ' AND ('.$implode.')';
          }
          if ($localisation != "") {
            $implode = '(' . $req_localisation . ') AND ('. $implode.')';
          }
        }

        $etablissements = Etablissement::select('id')->whereRaw($implode)->get();
      }
      else {
        $etablissements = [];
      }

      return $etablissements;
    }





    /**
     * Sélectionne un établissement grâce à des mots-clés
     *
     * @param string $keywords
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function findByKeyWords($keyWords)
    {
        // on met dans un array les mots clés de recherche
        $keyWords = explode(' ', $keyWords);

        // on créé un tableau vide dans lequel on va insérer la requête à chaque tour
        $where= [];

        foreach ($keyWords as $word) {
            $where[] = 'nom LIKE "%'. $word .'%"';
        }

        // on transforme en chaine de caractères l'array pour créer la reqûete
        $implode = implode(" AND ", $where);

        // on lance la requete avec l'ORM de Laravel
        $etablissements = Etablissement::whereRaw($implode)->get();

        // on retire les doublons
        $etablissements = $etablissements->unique('nom');

        return $etablissements;
    }





    /**
     * Sélectionne un établissement grâce à son adresse
     *
     * @param string $adresse
     * @return App\Etablissement
     */
    public function findByAdresse($adresse)
    {
        $etablissement = Etablissement::where('adresse', '=', $adresse)->get();

        return $etablissement;
    }





    /**
     * Supprime un établissement
     *
     * @param int $id
     * @return App\Etablissement
     */
    public function deleteById($id)
    {
        $etablissement = Etablissement::find($id);

        $etablissement->delete();

        return $etablissement;
    }





    /**
     * Traite les données du formulaire de modification d'établissement Admin,
     * met à jour l'établissement
     *
     * @param Request $request
     * @param Etablissement $etablissement
     * @return Etablissement
     */
    public function updateFromAdmin($request, Etablissement $etablissement)
    {
        // on valide les données rentrées par l'utilisateur dans le formulaire
        Validator::make($request->all(), [
        'code_uai' => 'required|string|max:255',
        'type' => 'max:255',
        'nom' => 'required|string|max:255',
        'sigle' => 'max:255',
        'statut' => 'required|string|max:255',
        'universite' => 'max:255',
        'adresse' => 'max:255',
        'code_postal' => 'required|string|max:255',
        'commune' => 'max:255',
        'telephone' => 'required|string|max:255',
        'departement' => 'max:255',
        'academie' => 'max:255',
        'region' => 'max:255',
        'lien_onisep' => 'max:255',
      ])->validate();

        // on met à jour la formation
        $etablissement->code_uai = $request->code_uai;
        $etablissement->nom = $request->nom;
        $etablissement->statut = $request->statut;
        $etablissement->code_postal = $request->code_postal;
        $etablissement->telephone = $request->telephone;
        $etablissement->type = $request->type;
        $etablissement->sigle = $request->sigle;
        $etablissement->universite = $request->universite;
        $etablissement->adresse = $request->adresse;
        $etablissement->commune = $request->commune;
        $etablissement->departement = $request->departement;
        $etablissement->academie = $request->academie;
        $etablissement->region = $request->region;
        $etablissement->lien_onisep = $request->lien_onisep;


        $etablissement->save();

        return $etablissement;
    }





    /**
     * Sélectionne tous les types d'établissements différents
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function selectTypesEtablissements()
    {
        $etablissements = Etablissement::selectRaw('count(nom) as nbr_etablissements, type')->groupBy('type')->get();

        return $etablissements;
    }





    /**
     * Sélectionne un ou plusieurs établissements en fonction du type
     *
     * @param string $type
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public function findByTypeWithPaginate($type, $q, $number)
    {
        $implode = 'type = "' . $type . '"';

        if (!is_null($q)) {
          // on met dans un array les mots clés de recherche
          $keyWords = explode(' ', $q);

          // on créé un tableau vide dans lequel on va insérer la requête à chaque tour
          $where= [];

          foreach ($keyWords as $word) {
              $where[] = 'LOWER(nom) LIKE LOWER("%'. $word .'%")';
          }

          // on transforme en chaine de caractères l'array pour créer la reqûete
          $implode .= " AND " . implode(" AND ", $where);
        }

        // on lance la requete avec l'ORM de Laravel
        $etablissements = Etablissement::whereRaw($implode)->paginate($number);

        return $etablissements;
    }





    /**
     * Fonction pour autocomplétion sur recherche d'établissement
     *
     * @param string $query
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findForAutocomplete($query, $type)
    {
        $query = explode(' ', $query);

        $where = [];

        foreach ($query as $q) {
            $where[] = 'nom LIKE "%'.$q.'%"';
        }

        $implode = implode(" AND ", $where);
        $implode = $implode . " AND type = '" . $type . "'";

        $etablissements = Etablissement::select('id', 'nom')
        ->distinct()
        ->whereRaw($implode)
        ->get();

        return $etablissements;
    }





    /**
     * Sélectionne un ou plusieurs établissements à partir d'un tableau d'id
     *
     * @param string $string
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findByStringOfId($string)
    {
      if (strlen($string) > 1) {
        $array = explode(' ', $string);

        foreach ($array as $value) {
          if($value != "") {
            $where[] = 'id = ' . $value;
          }
        }

        $query = implode(" OR ", $where);

        $etablissements = Etablissement::whereRaw($query)->get();
      }
      else {
        $etablissements = [];
      }

      return $etablissements;
    }
}
