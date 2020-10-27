<?php
namespace App\Http\Repositories;

use App\Service;
use Illuminate\Validation\Rule;
use Validator;

/**
 * Repository class to communicate with data sources of different kinds
 */
class ServicesRepository implements RepositoryInterface
{

    /**
     * Sélectionne un service avec son id
     *
     * @param int $id
     * @return App\Service
     */
    public function findById($id)
    {
        $service = Service::find($id);

        return $service;
    }





    /**
     * Sélectionne un service grâce à son intitulé
     *
     * @param string $name
     * @return App\Service
     */
    public function findByName($name)
    {
      $service = Service::where('nom', '=', $name)->first();

      return $service;
    }





    /**
     * Sélectionne un (ou plusieurs) service grâce à un mot-clé et l'id d'une société
     *
     * @param string $name
     * @param int $societeId
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function findByApproximativeName($name, $societeId)
    {
      $services = Service::whereRaw('LOWER(nom) LIKE LOWER("%'. $name .'%")')
      ->where('societe_id', '=', $societeId)
      ->get();

      return $services;
    }





    /**
     * Ajoute un nouveau service
     *
     * @param Request $request
     * @return App\Service|json
     */
    public function create($request)
    {
        $validator = Validator::make($request->all(), [
          'nom' => 'required|string|max:255|unique:services,nom',
          'societe_id' => 'required|integer'
        ]);


        if ($validator->passes()) {
          $service = new Service;

          $service->nom = $request->nom;
          $service->societe_id = $request->societe_id;

          $service->save();

  	      return $service;
        }

      	return response()->json(['error' => $validator->errors()->all()]);
    }





    /**
     * Met à jour le nom du service
     *
     * @param Request $request
     * @param int $int
     * @return \App\Service
     */
    public function update($request, $id)
    {
        $validator = Validator::make($request->all(), [
          'nom' => 'required|string|max:255|unique:services,nom',
          'societe_id' => 'required|integer'
        ]);

        if ($validator->passes()) {
          // on met à jour l'utilisateur
          $service = Service::find($id);
          $service->nom = $request->nom;
          $service->societe_id = $request->societe_id;

          $service->save();

  	      return $service;
        }

      	return response()->json(['error' => $validator->errors()->all()]);
    }





    /**
     * Supprime un service
     *
     * @param int $int
     * @return \App\Service
     */
    public function delete($id)
    {
        $service = Service::find($id);
        $service->delete();

        return $service;
    }





    /**
     * Fonction pour l'autocompletion
     *
     * @param array $query
     * @param int $societeId
     * @return \App\Service
     */
    public function findForAutocomplete($query, $societeId)
    {
        $query = explode(' ', $query);

        $where = [];

        foreach ($query as $q) {
            $where[] = 'LOWER(nom) LIKE LOWER("%' . $q . '%")';
        }

        $implode = implode(" AND ", $where);

        $services = Service::select('id', 'nom')
            ->distinct()
            ->where('societe_id', '=', $societeId)
            ->whereRaw($implode)
            ->get();

        return $services;
    }
}
