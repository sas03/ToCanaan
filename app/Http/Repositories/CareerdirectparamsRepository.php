<?php
namespace App\Http\Repositories;

use App\User;
use App\Careerdirectparam;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Validator;

/**
 * Repository class to communicate with data sources of different kinds
 */
class CareerdirectparamsRepository implements RepositoryInterface
{
    /**
     * Recherche un utilisateur careerdirect par son id et renvoie une Collection
     *
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findByIdAsCollection($id)
    {
        $careerdirectparams = Careerdirectparam::where('id', $id)->get();

        return $careerdirectparams;
    }





    /**
     * Renvoie le total d'utilisateurs careerdirect enregistrés
     *
     * @return int
     */
    public function countAll()
    {
        $careerdirectparams = count(Careerdirectparam::select('id')->get());

        return $careerdirectparams;
    }





    /**
     * Recherche dans la table careerdirectparams en fonction d'un nom et renvoie une collection
     *
     * @param string $name
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findByLastname($name)
    {
        $careerdirectparams = Careerdirectparam::where('nom', 'LIKE', "%$name%")->get();

        return $careerdirectparams;
    }





    /**
     * Recherche un utilisateur careerdirect par son id, et s'il la requête ne renvoie aucun résultat, créé un nouvel utilisateur careerdirect
     *
     * @param int $id
     * @return \App\Careerdirectparam
     */
    public function findByIdOrInstantiate($id)
    {
        $careerdirectparams = Careerdirectparam::firstOrNew(['id' => $id]);

        return $careerdirectparams;
    }





    /**
     * Supprime un utilisateur careerdirect
     *
     * @param int $id
     * @return \App\Careerdirectparam
     */
    public function deleteById($id)
    {
        $careerdirectparams = Careerdirectparam::find($id);

        $careerdirectparams->delete();

        return $careerdirectparams;
    }





    /**
     * Selectionne tous les utilisateurs careerdirect enregistrés
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAll()
    {
        $careerdirectparams = Careerdirectparam::all();

        return $careerdirectparams;
    }





    /**
     * Met à jour les informations d'un utilisateur careerdirect par le biais de l'espace Admin
     *
     * @param Request $request
     * @param Careerdirectparam $careerdirectparams
     * @return \App\Careerdirectparam
     */
    public function updateCareerdirectparam($request, Careerdirectparam $careerdirectparams)
    {

        // on valide les données rentrées par l'utilisateur dans le formulaire
        Validator::make($request->all(), [
            'validate' => ['required', Rule::in(['wait', 'active']),],
            'lien' => 'required'
        ])->validate();

        // on met à jour l'utilisateur
        $careerdirectparams->validate = $request->validate;
        $careerdirectparams->lien = $request->lien;

        $careerdirectparams->save();

        return $careerdirectparams;
    }





    /**
     * Fonction pour l'autocompletion (avec email)
     *
     * @param array $query
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findForAutocompleteWithMail($query)
    {
        $query = explode(' ', $query);

        $where = [];

        foreach ($query as $q) {

          $where[] = '(LOWER(prenom) LIKE LOWER("%' . $q . '%") OR LOWER(nom) LIKE LOWER("%' . $q . '%") OR LOWER(adresse) LIKE LOWER("%' . $q . '%"))';
        }

        $query = implode(" AND ", $where);

        $careerdirectparams = Careerdirectparam::select('id', 'prenom', 'nom', 'adresse')
            ->whereRaw($query)
            ->get();

        return $careerdirectparams;
    }





    /**
     * Fonction pour l'autocompletion (sans email)
     *
     * @param array $query
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findForAutocompleteWithoutMail($query)
    {
        $query = explode(' ', $query);

        $where = [];

        foreach ($query as $q) {

          $where[] = '(LOWER(prenom) LIKE LOWER("%' . $q . '%") OR LOWER(nom) LIKE LOWER("%' . $q . '%"))';
        }

        $query = implode(" AND ", $where);

        $careerdirectparams = Careerdirectparam::select('id', 'prenom', 'nom')
            ->whereRaw($query)
            ->get();

        return $careerdirectparams;
    }





    /**
     * Selectionne tous les utilisateurs grâce à un mot-clé
     *
     * @param array $query
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findByName($query)
    {
        $query = explode(' ', $query);

        $where = [];

        foreach ($query as $q) {

          $where[] = '(LOWER(prenom) LIKE LOWER("%' . $q . '%") OR LOWER(nom) LIKE LOWER("%' . $q . '%"))';
        }

        $query = implode(" AND ", $where);

        $careerdirectparams = Careerdirectparam::whereRaw($query)->get();

        return $careerdirectparams;
    }
}
