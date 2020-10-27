<?php
namespace App\Http\Repositories;

use App\Metier;
use Illuminate\Validation\Rule;
use Validator;
use Illuminate\Support\Facades\DB;

/**
 * Repository class to communicate with data sources of different kinds
 */
class MetiersRepository implements RepositoryInterface
{
    /**
     * Selectionne tous les métiers et renvoie une collection
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAll()
    {
        $metiers = Metier::all();

        return $metiers;
    }





    /**
     * Selectionne tous les métiers et renvoie une pagination
     *
     * @param int $number
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public function findAllWithPaginate($number)
    {
        $metiers = Metier::paginate($number);

        return $metiers;
    }






    /**
     * Selectionne un (ou plusieurs) métier par libellé
     *
     * @param string $name
     * @return \App\Metier
     */
    public function findByLibelle($name)
    {
        $metier = Metier::where('nom', '=', "$name")->first();

        return $metier;
    }





    /**
     * Selectionne un (ou plusieurs) métier par libellé
     *
     * @param string $name
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findByApproximateLibelle($name)
    {
        $metiers = Metier::where('nom', 'LIKE', "%$name%")->get();

        return $metiers;
    }





    /**
     * Affiche le nombre total de métiers enregistrés
     *
     * @return int
     */
    public function countAll()
    {
        $metiers = count(Metier::select('id')->get());

        return $metiers;
    }





    /**
     * Trouve un métier par son id ou jete une erreur
     *
     * @param int $id
     * @return \App\Metier
     */
    public function findById($id)
    {
        $metier = Metier::findOrFail($id);

        return $metier;
    }





    /**
     * Trouve un métier par son id ou créé un nouveau métier si l'id ne renvoie rien
     *
     * @param int $id
     * @return \App\Metier
     */
    public function findByIdOrInstantiate($id)
    {
        $metier = Metier::firstOrNew(['id' => $id]);

        return $metier;
    }





    /**
     * Trouve un métier par son id et renvoie une collection
     *
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findByIdAsCollection($id)
    {
        $metier = Metier::where('id', $id)->get();

        return $metier;
    }





    /**
     * Undocumented function
     *
     * @param array $codesRome
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findByArrayCodeRome(array $codesRome)
    {
        if (!empty($codesRome[0])) {
            // on créé une collection
            $collect = collect();

            // on boucle sur le tableau pour trouver les métiers associés à chaque code rome
            foreach ($codesRome as $key => $value) {
                // on fait attention à bien sélectionner les valeurs qui ne sont pas vides
                if (!empty($value)) {
                    $codesRome[$key] = "code_rome = '$value'";
                } else {
                    unset($codesRome[$key]);
                }
            }

            $codesRome = implode(" OR ", $codesRome);
            $metiers = Metier::whereRaw($codesRome)->get();
        } else {
            $metiers = [];
        }

        // on retourne la collection
        return $metiers;
    }





    /**
     * Sélectionne un ou plusieurs métiers grâce à un tableau d'id
     *
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findByArrayOfId($id)
    {
        if ($id) {
          // on boucle sur le tableau pour trouver les métiers associés à chaque code rome
          foreach ($id as $i) {
            $where[] = 'id = ' . $i;
          }
          $where = implode(" OR ", $where);
          $metiers = Metier::whereRaw($where)->get();

        } else {
            $metiers = [];
        }

        // on retourne la collection
        return $metiers;
    }





    /**
     * Sélectionne les métiers par code ROME (sans la pagination)
     *
     * @param string $codeRome
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findByCodeRome($codeRome)
    {
        $metiers = Metier::where('code_rome', '=', $codeRome)->get();

        return $metiers;
    }





    /**
     * Sélectionne les métiers par code ROME (avec la pagination)
     *
     * @param string $codeRome
     * @param int $number
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public function findByCodeRomeWithPaginate($codeRome, $number)
    {
        $metiers = Metier::where('code_rome', '=', $codeRome)
        ->distinct()
        ->paginate($number);

        return $metiers;
    }





    /**
     * Sélectionne un (ou plusieurs) métiers grâce à des mots-clés (sans la pagination)
     *
     * @param string $keyWords
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findByKeywords($keyWords)
    {
        // on met dans un array les mots clés de recherche
        $keyWords = explode(' ', $keyWords);

        // on créé un tableau vide dans lequel on va insérer la requête à chaque tour
        $where = [];

        foreach ($keyWords as $word) {
            $where[] = 'LOWER(nom) LIKE LOWER("%' . $word . '%")';
        }

        // on transforme en chaine de caractères l'array pour créer la reqûete
        $implode = implode(" AND ", $where);

        // on lance la requete avec l'ORM de Laravel
        $metiers = Metier::whereRaw($implode)->get();

        return $metiers;
    }





    /**
     * Sélectionne un (ou plusieurs) métiers grâce à des mots-clés (avec la pagination)
     *
     * @param string $keyWords
     * @param int $number
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public function findByKeywordsWithPaginate($keyWords, $number)
    {
        // on met dans un array les mots clés de recherche
        $keyWords = explode(' ', $keyWords);

        // on créé un tableau vide dans lequel on va insérer la requête à chaque tour
        $where = [];

        foreach ($keyWords as $word) {
            $where[] = 'LOWER(nom) LIKE LOWER("%' . $word . '%")';
        }

        // on transforme en chaine de caractères l'array pour créer la reqûete
        $implode = implode(" AND ", $where);

        // on lance la requete avec l'ORM de Laravel
        $metiers = Metier::whereRaw($implode)->paginate($number);

        return $metiers;
    }





    public function findForAutocomplete($query, $secteur)
    {
        $query = explode(' ', $query);

        $where = [];

        foreach ($query as $q) {
            $where[] = 'LOWER(nom) LIKE LOWER("%' . $q . '%")';
        }

        $implode = implode(" AND ", $where);

        if($secteur != "") {
          $implode .= " AND secteur_id = " . $secteur;
        }

        $metiers = Metier::select('id', 'nom')
            ->distinct()
            ->whereRaw($implode)
            ->get();

        return $metiers;
    }





    /**
     * Supprime un métier en fonction de son id
     *
     * @param int $id
     * @return \App\Metier
     */
    public function deleteById($id)
    {
        $metier = Metier::find($id);

        $metier->delete();

        return $metier;
    }





    /**
     * Met à jour un métier par le biais de l'espace Admin
     *
     * @param Request $request
     * @param Metier $metier
     * @return App\Metier
     */
    public function updateMetierFromAdmin($request, Metier $metier)
    {
        // on valide les données rentrées par l'utilisateur dans le formulaire
        Validator::make($request->all(), [
            'nom' => 'required|string|max:255',
            'code_rome' => 'required|string|max:255',
            'codes_rome_proches' => 'max:255',
            'niveau_requis' => 'max:255'
        ])->validate();

        // on met à jour le métier
        $metier->nom = $request->nom;
        $metier->code_rome = $request->code_rome;
        $metier->niveau_requis = $request->niveau_requis;
        $metier->description = $request->description;
        $metier->pre_requis = $request->pre_requis;
        $metier->lien_rome = $request->lien_rome;
        $metier->codes_rome_proches = $request->codes_rome_proches;
        $metier->video = str_replace(["playlist?", "watch?"], "embed/videoseries?", $request->video);
        $metier->secteur_id = $request->secteur_id;

        $metier->save();

        return $metier;
    }





    /**
     * Sélectionne tous les niveaux requis
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function selectNiveauRequis()
    {
        $niveaux = DB::select('select niveau_requis from metiers group by niveau_requis');

        return $niveaux;
    }





    /**
     * Sélectionne une collection de métier en fonction de l'id du secteur
     *
     * @param int $secteur_id
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findBySecteurId($secteur_id)
    {
        $metiers = Metier::where('secteur_id', '=', $secteur_id)->get();

        return $metiers;
    }





    /**
     * Sélectionne une collection de métier en fonction de l'id du secteur
     *
     * @param int $id
     * @param string $q
     * @param int $number
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function findBySecteurIdWithPaginate($id, $q, $number)
    {
        $implode = 'secteur_id = ' . $id;

        if (!is_null($q)) {
          $keyWords = explode(' ', $q);

          $where = [];

          foreach ($keyWords as $word) {
              $where[] = 'LOWER(nom) LIKE LOWER("%' . $word . '%")';
          }

          $implode .= ' AND ' . implode(" AND ", $where);
        }

        $metiers = Metier::whereRaw($implode)->paginate($number);

        return $metiers;
    }





    /**
     * Séléctionne le nombre de métiers par secteur
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function countBySecteurs()
    {
        $metiers = DB::select('select secteur_id, count(*) as count from metiers group by secteur_id asc');

        return $metiers;
    }
}
