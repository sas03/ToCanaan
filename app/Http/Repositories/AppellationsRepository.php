<?php
namespace App\Http\Repositories;

use App\Appellation;
use Illuminate\Validation\Rule;
use Validator;

/**
 * Repository class to communicate with data sources of different kinds
 */
class AppellationsRepository implements RepositoryInterface
{

    /**
     * Recherche une ou plusieurs appellations par leur nom
     *
     * @param string $keyWords
     * @return App\Appellation
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

        $appellation = Appellation::whereRaw($implode)
        ->distinct()
        ->first();

        return $appellation;
    }





    /**
     * Recherche une ou plusieurs appellations par leur nom
     *
     * @param string $query
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function findForAutocomplete($query)
    {
        $query = explode(' ', $query);

        $where = [];

        foreach ($query as $q) {
            $where[] = 'LOWER(nom) LIKE LOWER("%' . $q . '%")';
        }

        $implode = implode(" AND ", $where);

        $appellations = Appellation::select('nom', 'code_id')
            ->distinct()
            ->whereRaw($implode)
            ->get();

        return $appellations;
    }
}
