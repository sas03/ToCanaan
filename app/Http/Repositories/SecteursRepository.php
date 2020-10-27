<?php
namespace App\Http\Repositories;

use App\Secteur;
use App\Metier;
use Illuminate\Validation\Rule;
use Validator;
use Illuminate\Support\Facades\DB;

/**
 * Repository class to communicate with data sources of different kinds
 */
class SecteursRepository implements RepositoryInterface
{
    /**
     * Selectionne tous les secteurs et renvoie une collection
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAll()
    {
        $secteurs = Secteur::all();

        return $secteurs;
    }





    /**
     * Selectionne un (ou plusieurs) secteur par libellé
     *
     * @param string $name
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findByName($name)
    {
        $secteurs = Secteur::where('nom', 'LIKE', "%$name%")->get();

        return $secteurs;
    }





    /**
     * Affiche le nombre total de secteurs enregistrés
     *
     * @return int
     */
    public function countAll()
    {
        $secteurs = count(Secteur::select('id')->get());

        return $secteurs;
    }





    /**
     * Trouve un secteur par son id ou jete une erreur
     *
     * @param int $id
     * @return \App\Secteur
     */
    public function findById($id)
    {
        //$secteur = Secteur::findOrFail($id);
        $secteur = Secteur::find($id);

        return $secteur;
    }





    /**
     * Trouve un secteur par son id ou créé un nouveau secteur si l'id ne renvoie rien
     *
     * @param int $id
     * @return \App\Secteur
     */
    public function findByIdOrInstantiate($id)
    {
        $secteur = Secteur::firstOrNew(['id' => $id]);

        return $secteur;
    }





    /**
     * Trouve un secteur par son id et renvoie une collection
     *
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findByIdAsCollection($id)
    {
        $secteur = Secteur::where('id', $id)->get();

        return $secteur;
    }





    /**
     * Supprime un secteur en fonction de son id
     *
     * @param int $id
     * @return \App\Secteur
     */
    public function deleteById($id)
    {
        $secteur = Secteur::find($id);

        $secteur->delete();

        return $secteur;
    }





    /**
     * Met à jour un secteur par le biais de l'espace Admin
     *
     * @param Request $request
     * @param Secteur $secteur
     * @return \App\Secteur
     */
    public function updateFromAdmin($request, Secteur $secteur)
    {
      // on valide les données rentrées par l'utilisateur dans le formulaire
        Validator::make($request->all(), [
            'nom' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'required'
        ])->validate();

      // on met à jour le secteur
        $secteur->nom = $request->nom;
        $secteur->description = $request->description;
        $secteur->image = $request->image;

        $secteur->save();

        return $secteur;
    }





    /**
     * Fonction pour l'autocompletion
     *
     * @param array $query
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findForAutocomplete($query)
    {
        $query = explode(' ', $query);

        $where = [];

        foreach ($query as $q) {
            $where[] = 'LOWER(nom) LIKE LOWER("%' . $q . '%")';
        }

        $implode = implode(" AND ", $where);

        $secteurs = Secteur::select('nom')
            ->whereRaw($implode)
            ->get();

        return $secteurs;
    }
}
