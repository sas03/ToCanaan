<?php
namespace App\Http\Repositories;

use App\Formation;
use Illuminate\Validation\Rule;
use Validator;

/**
 * Repository class to communicate with data sources of different kinds
 */
class FormationsRepository implements RepositoryInterface
{
    /**
     * Selectionne toutes les formations enregistrées et retourne le résultat dans un tableau
     *
     * @return array
     */
    public function findAll()
    {
        $formations = Formation::all();

        return $formations->toArray();
    }





    /**
     * Sélectionne toutes les formations enregistrées et pagine les résultats
     *
     * @param int $number
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function findAllWithPaginate($number)
    {
        $formations = Formation::paginate($number);

        return $formations;
    }




    public function findByArrayOfId($array)
    {
      foreach ($array as $key => $value) {
        $array[$key] = 'id = ' . $value;
      }
      $query = implode(' OR ', $array);

      $formations = Formation::whereRaw($query)->get();

      return $formations;
    }





    /**
     * Sélectionne les formations recherchées par l'utilisateur et pagine les résultats
     *
     * @param int $number
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function findByNameWithPaginate($q, $number)
    {
        $keyWords = explode(' ', $q);

        $where= [];

        foreach ($keyWords as $word) {
            $where[] = 'nom LIKE "%'. $word .'%"';
        }

        $implode = implode(" AND ", $where);

        $formations = Formation::whereRaw($implode)->paginate($number);

        return $formations;
    }





    /**
     * Sélectionne une ou plusieurs formations en fonction d'un intitulé
     *
     * @param string $nom
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function findByName($nom)
    {
        $formation = Formation::where('nom', '=', $nom)->get();

        return $formation;
    }





    /**
     * Sélectionne toutes les formations contenant les mots clés dans leur intitulé
     *
     * @param string $nom
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function findByApproximativeName($nom)
    {
        $formations = Formation::where('nom', 'LIKE', "%$nom%")->get();

        return $formations;
    }





    /**
     * Affiche le nombre de formations enregistrées en BDD
     *
     * @return int
     */
    public function countAll()
    {
        $formations = count(Formation::select('id')->get());

        return $formations;
    }





    /**
     * Sélectionne une formation en fonction de son id, ou jette une 404 si l'id n'existe pas
     *
     * @param int $id
     * @return void
     */
    public function findById($id)
    {
        $formation = Formation::findOrFail($id);

        return $formation;
    }





    /**
     * Sélectionne une formation en fonction de son id et ne jette pas d'erreur si l'id n'existe pas
     *
     * @param int $id
     * @return void
     */
    public function findByIdWithoutFail($id)
    {
        $formation = Formation::find($id);

        return $formation;
    }





    /**
     * Recherche une formation par son id, ou en créé une nouvelle
     *
     * @param int $id
     * @return Formation
     */
    public function findByIdOrInstantiate($id)
    {
        $formation = Formation::firstOrNew(['id' => $id]);

        return $formation;
    }





    /**
     * Sélectionne une formation en fonction de son id et renvoie une collection
     *
     * @param int $id
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function findByIdAsCollection($id)
    {
        $formation = Formation::where('id', $id)->get();

        return $formation;
    }





    /**
     * Sélectionne une ou plusieurs formation en fonction de leur intitulé, en supprimant les doublons
     *
     * @param string $keyWords
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
        $formations = Formation::whereRaw($implode)->get();

        // on retire les doublons
        $formations = $formations->unique('nom');

        return $formations;
    }





    /**
     * Recherche une ou plusieurs formations en fonction de leurs codes Rome
     *
     * @param string $codeRome
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function findByCodeRome($codeRome)
    {
        $formations = Formation::whereRaw('codes_rome LIKE "% '. $codeRome .' %"')->get();

        return $formations;
    }





    /**
     * Recherche une ou plusieurs formations en fonction de leurs codes Rome
     *
     * @param string $codeRome
     * @param string $rythme
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function findByCodeRomeAndRythme($codeRome, $rythmes)
    {
        $query = 'codes_rome LIKE "% '. $codeRome .' %"';

        if (is_array($rythmes)) {
          foreach ($rythmes as $rythme) {
            if ($rythme == 'pro') {
              $query .= ' AND alternance LIKE "%contrat de professionnalisation%"';
            }
            if ($rythme == 'alternance') {
              $query .= ' AND alternance LIKE "%apprentissage%"';
            }
            if ($rythme == 'continue') {
              $query .= ' AND alternance LIKE "%formation continue%"';
            }
          }
        }

        $formations = Formation::whereRaw($query)->get();

        return $formations;
    }





    /**
     * Fonction pour autocomplétion sur recherche de formation
     *
     * @param string $query
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findForAutocomplete($query, $niveau)
    {
        $query = explode(' ', $query);

        $where = [];

        foreach ($query as $q) {
            $where[] = 'LOWER(nom) LIKE LOWER("%'.$q.'%")';
        }

        $implode = implode(" AND ", $where);

        if ($niveau != '') {
          $implode = $implode . " AND niveau_sortie = '" . $niveau . "'";
        }

        $formations = Formation::select('id', 'nom')
        ->whereRaw($implode)
        ->get();

        return $formations;
    }





    /**
     * Trouve une ou plusieurs formation en fonction d'une adresse
     *
     * @param string $adresse
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function findByAdresse($adresse)
    {
        $formations = Formation::where('adresse', '=', $adresse)->get();

        return $formations;
    }





    /**
     * Trouve une ou plusieurs formation en fonction du niveau de sortie avec la pagination
     *
     * @param string $niveau
     * @param string $q
     * @param int $number
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function findByNiveauSortieWithPaginate($niveau, $q, $number)
    {
        $implode = 'niveau_sortie = "' . $niveau . '"';

        if (!is_null($q)) {
          $keyWords = explode(' ', $q);

          $where= [];

          foreach ($keyWords as $word) {
              $where[] = 'nom LIKE "%'. $word .'%"';
          }

          $implode .= ' AND ' . implode(" AND ", $where);
        }

        $formations = Formation::whereRaw($implode)->paginate($number);

        return $formations;
    }





    /**
     * Trouve la formation correspondant à l'id et la supprime
     *
     * @param int $id
     * @return Formation
     */
    public function deleteById($id)
    {
        $formation = Formation::find($id);

        $formation->delete();

        return $formation;
    }





    /**
     * Traite les informations du formulaire de modification de formation dans l'espace admin,
     * modifie la formation
     *
     * @param Request $request
     * @param Formation $formation
     * @return Formation
     */
    public function updateFromAdmin($request, Formation $formation)
    {
        // on valide les données rentrées par l'utilisateur dans le formulaire
        Validator::make($request->all(), [
        'nom' => 'required|string|max:255',
        'code_rome1' => 'required|max:5',
        'code_rome2' => 'max:5',
        'code_rome3' => 'max:5',
        'niveau_entree' => 'required|string|max:255',
        'niveau_sortie' => 'max:255',
        'duree' => 'required|string|max:255',
        'alternance' => 'max:255',
        'certifiante' => 'max:255',
        'lien_rncp' => 'max:255'
      ])->validate();

        // on met à jour la formation
        $formation->nom = $request->nom;
        $formation->description = $request->description;
        $formation->code_rome1 = $request->code_rome1;
        $formation->code_rome2 = $request->code_rome2;
        $formation->code_rome3 = $request->code_rome3;
        $formation->niveau_entree = $request->niveau_entree;
        $formation->niveau_sortie = $request->niveau_sortie;
        $formation->duree = $request->duree;
        $formation->alternance = $request->alternance;
        $formation->certifiante = $request->certifiante;
        $formation->lien_rncp = $request->lien_rncp;

        $formation->save();

        return $formation;
    }





    /**
     * Sélectionne tous les niveaux de sortie
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function selectFormationsNiveauxSortie()
    {
        $formations = Formation::selectRaw('COUNT(DISTINCT nom) AS nbr_formations, niveau_sortie')->where('niveau_sortie', '!=', '')->groupBy('niveau_sortie')->get();

        return $formations;
    }
}
