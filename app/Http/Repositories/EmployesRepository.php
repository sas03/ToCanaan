<?php
namespace App\Http\Repositories;

use App\Employe;
use Illuminate\Validation\Rule;
use Validator;

/**
 * Repository class to communicate with data sources of different kinds
 */
class EmployesRepository implements RepositoryInterface
{
    /**
     * Recherche tous les employés liés à une société
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function findAllBySocieteId($societeId)
    {
        $employes = Employe::where('societe_id', '=', $societeId)->get();

        return $employes;
    }





    /**
     * Recherche un ou plusieurs employés par leur nom
     *
     * @param string $name
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function findByName($name)
    {
        $employe = Employe::where('nom', 'LIKE', "%$name%")->get();

        return $employe;
    }





    /**
     * Recherche un ou plusieurs employés par leur nom
     *
     * @param string $name
     * @param int $societe_id
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function findByApproximativeName($name, $societe_id)
    {
      $explode = explode(' ', $name);

      $where = [];
      foreach ($explode as $value) {
        $where[] = 'LOWER(nom) LIKE LOWER("%'. $value .'%")';
      }

      $implode = implode(' OR ', $where);

      $employes = Employe::whereRaw($implode)
      ->where('societe_id', '=', $societe_id)
      ->get();

      return $employes;
    }





    /**
     * Renvoie le nombre d'employés enregistrés en BDD
     *
     * @return int
     */
    public function countAll()
    {
        $employe = count(Employe::select('id')->get());

        return $employe;
    }





    /**
     * Sélectionne un employé par son id
     *
     * @param int $id
     * @return App\Employe
     */
    public function findById($id)
    {
        $employe = Employe::find($id);

        return $employe;
    }





    /**
     * Sélectionne un employé avec son id, ou en créé un nouveau
     *
     * @param int $id
     * @return App\Employe
     */
    public function findByIdOrInstantiate($id)
    {
        $employe = Employe::firstOrNew(['id' => $id]);

        return $employe;
    }





    /**
     * Ajoute un nouvel employé dans la BDD
     *
     * @param Request $request
     * @return App\Employe|json
     */
    public function create($request)
    {
        $validator = Validator::make($request->all(), [
          'nom' => 'required|string|max:255',
          'prenom' => 'required|string|max:255',
          'niveau' => 'required|string|max:255'
        ]);

        if ($validator->passes()) {

          $employe = new Employe;

          $employe->nom = $request->nom;
          $employe->prenom = $request->prenom;
          $employe->niveau = $request->niveau;
          $employe->poste_id = $request->poste_id;
          $employe->societe_id = $request->societe_id;
          $employe->user_id = $request->user_id;

          $employe->save();

          return $employe;
        }
        return response()->json(['error' => $validator->errors(), 'index' => $validator->errors()->keys()]);
    }





    /**
     * Met à jour les informations de l'employé
     *
     * @param Request $request
     * @param int $int
     * @return \App\Employe
     */
    public function update($request, $id)
    {
        $validator = Validator::make($request->all(), [
          'nom' => 'required|string|max:255',
          'prenom' => 'required|string|max:255',
          'niveau' => 'required|string|max:255'
        ]);

        if ($validator->passes()) {
          // on met à jour l'utilisateur
          $employe = Employe::find($id);

          $employe->nom = $request->nom;
          $employe->prenom = $request->prenom;
          $employe->niveau = $request->niveau;
          $employe->poste_id = $request->poste_id;
          $employe->user_id = $request->user_id;

          $employe->save();

          return $employe;
        }

      return response()->json(['error' => $validator->errors(), 'index' => $validator->errors()->keys()]);
    }





    /**
     * Met à jour le service de l'employé
     *
     * @param Request $request
     * @param int $employe_id
     * @return \App\Employe
     */
    public function updateService($request, $employe_id = NULL)
    {
        if ($employe_id != NULL) {
          $employe = Employe::find($employe_id);
        }
        else {
          $employe = Employe::find($request->employe);
        }

        $service = $request->type;

        $employe->service_id = ($service) ? $service : NULL;

        $employe->save();

        return $employe;
    }





    /**
     * Met à jour le poste de l'employé
     *
     * @param Request $request
     * @return \App\Employe
     */
    public function updatePoste($request)
    {
        $employe = Employe::find($request->employe);

        $poste = $request->type;

        $employe->poste_id = ($poste) ? $poste : NULL;

        $employe->save();

        return $employe;
    }





    /**
     * Supprime un employé
     *
     * @param int $id
     * @return \App\Employe
     */
    public function delete($id)
    {
        $employe = Employe::find($id);

        $employe->delete();

        return $employe;
    }





    /**
     * Fonction pour l'autocomplétion
     *
     * @param Request $query
     * @param int $societe_id
     * @return \App\Employe
     */
    public function findForAutocomplete($query, $societe_id)
    {
        $query = explode(' ', $query);

        $where = [];

        $wherePrenom = [];
        $whereNom = [];

        foreach ($query as $q) {
          $wherePrenom[] = 'LOWER(prenom) LIKE LOWER("%' . $q . '%")';
          $whereNom[] = 'LOWER(nom) LIKE LOWER("%' . $q . '%")';
        }

        $implodePrenom = implode(" AND ", $wherePrenom);
        $implodeNom = implode(" AND ", $whereNom);

        $query = "(".$implodePrenom.") OR (".$implodeNom.")";

        $employe = Employe::select('id', 'prenom', 'nom')
            ->distinct()
            ->where('societe_id', '=', $societe_id)
            ->whereRaw($query)
            ->get();

        return $employe;
    }
}
