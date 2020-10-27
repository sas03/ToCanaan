<?php
namespace App\Http\Repositories;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Validator;

/**
 * Repository class to communicate with data sources of different kinds
 */
class UsersRepository implements RepositoryInterface
{
    /**
     * Recherche un utilisateur par son id et renvoie une Collection
     *
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findByIdAsCollection($id)
    {
        $user = User::where('id', $id)->get();

        return $user;
    }





    /**
     * Renvoie le total d'utilisateurs enregistrés
     *
     * @return int
     */
    public function countAll()
    {
        $users = count(User::select('id')->get());

        return $users;
    }





    /**
     * Recherche dans la table utilisateur en fonction d'un nom et renvoie une collection
     *
     * @param string $name
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findByLastname($name)
    {
        $users = User::where('nom', 'LIKE', "%$name%")->get();

        return $users;
    }





    /**
     * Recherche un utilisateur par son id, et s'il la requête ne renvoie aucun résultat, créé un nouvel utilisateur
     *
     * @param int $id
     * @return \App\User
     */
    public function findByIdOrInstantiate($id)
    {
        $user = User::firstOrNew(['id' => $id]);

        return $user;
    }





    /**
     * Supprime un utilisateur
     *
     * @param int $id
     * @return \App\User
     */
    public function deleteById($id)
    {
        $user = User::find($id);

        $user->delete();

        return $user;
    }





    /**
     * Selectionne tous les utilisateurs enregistrés
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAll()
    {
        $users = User::all();

        return $users;
    }





    /**
     * Met à jour les informations d'un utilisateurs par le biais de l'espace Admin
     *
     * @param Request $request
     * @param User $user
     * @return \App\User
     */
    public function updateUserFromAdmin($request, User $user)
    {

        // on valide les données rentrées par l'utilisateur dans le formulaire
        Validator::make($request->all(), [
            'role' => ['required', Rule::in(['user', 'admin']),]
        ])->validate();

        // on met à jour l'utilisateur
        $user->role = $request->role;

        $user->save();

        return $user;
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

          $where[] = '(LOWER(prenom) LIKE LOWER("%' . $q . '%") OR LOWER(nom) LIKE LOWER("%' . $q . '%") OR LOWER(email) LIKE LOWER("%' . $q . '%"))';
        }

        $query = implode(" AND ", $where);

        $users = User::select('id', 'prenom', 'nom', 'email')
            ->whereRaw($query)
            ->get();

        return $users;
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

        $users = User::select('id', 'prenom', 'nom')
            ->whereRaw($query)
            ->get();

        return $users;
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

        $users = User::whereRaw($query)->get();

        return $users;
    }
}
