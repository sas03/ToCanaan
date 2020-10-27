<?php
namespace App\Http\Repositories;

use App\Keyword;

/**
 * Repository class to communicate with data sources of different kinds
 */
class KeywordsRepository implements RepositoryInterface
{
    /**
     * Selectionne tous les mots-clé et renvoie une collection
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAll()
    {
        $keywords = Keyword::all();

        return $keywords;
    }





    /**
     * Selectionne un mots-clé par son nom
     *
     * @param string $name
     * @return \App\Keyword
     */
    public function findByName($name)
    {
        $keyword = Keyword::where('nom', '=', "$name")->first();

        return $keyword;
    }





    /**
     * Affiche le nombre total de mots-clé enregistrés
     *
     * @return int
     */
    public function countAll()
    {
        $keywords = count(Keyword::select('id')->get());

        return $keywords;
    }





    /**
     * Trouve un mots-clé par son id
     *
     * @param int $id
     * @return \App\Keyword
     */
    public function findById($id)
    {
        $keyword = Keyword::find($id);

        return $keyword;
    }

}
