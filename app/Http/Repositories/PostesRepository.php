<?php
namespace App\Http\Repositories;

use App\Poste;
use Illuminate\Validation\Rule;
use Validator;

/**
 * Repository class to communicate with data sources of different kinds
 */
class PostesRepository implements RepositoryInterface
{

    /**
     * Sélectionne tous les postes du service
     *
     * @param int $id
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function findAllByService($serviceId)
    {
        $postes = Poste::where('service_id', $serviceId)->get();

        return $postes;
    }





    /**
     * Sélectionne un poste avec son id
     *
     * @param int $id
     * @return App\Poste
     */
    public function findById($id)
    {
        $poste = Poste::find($id);

        return $poste;
    }





    /**
     * Sélectionne un poste avec son id
     *
     * @param int $id
     * @return App\Poste
     */
    public function findByMetierId($metierId)
    {
        $poste = Poste::where('metier_id', $metierId)->first();

        return $poste;
    }





    public function create($request)
    {
        $validator = Validator::make($request->all(), [
          'nom' => 'required|string|unique:postes,nom',
          'societe_id' => 'required'

        ]);

        if ($validator->passes()) {
          $poste = new Poste;

          $poste->nom = $request->nom;
          $poste->description = $request->description;
          $poste->metier_id = ($request->metier_id) ? $request->metier_id : NULL;
          $poste->service_id = ($request->service_id) ? $request->service_id : NULL;
          $poste->societe_id = $request->societe_id;

          $poste->save();

  	      return $poste;
        }

      	return response()->json(['error' => $validator->errors()->all()]);
    }





    /**
     * Met à jour les informations du poste
     *
     * @param Request $request
     * @param int $int
     * @return \App\Poste
     */
    public function update($request, $id)
    {
        $validator = Validator::make($request->all(), [
          'nom' => 'required'
        ]);

        if ($validator->passes()) {
          $poste = Poste::find($id);
          $poste->nom = $request->nom;
          $poste->description = $request->description;
          $poste->service_id = ($request->service_id) ? $request->service_id : NULL;

          $poste->save();

  	      return $poste;
        }

      	return response()->json(['error' => $validator->errors()->all()]);
    }





    /**
     * Met à jour le service du poste
     *
     * @param Request $request
     * @param int $posteId
     * @return \App\Poste
     */
    public function updateService($request, $posteId = NULL)
    {

      if ($posteId != NULL) {
        $poste = Poste::find($posteId);
      }
      else {
        $poste = Poste::find($request->poste);
      }

      $poste->service_id = ($request->service) ? $request->service : NULL;

      $poste->save();

      return $poste;
    }





    public function delete($id)
    {
        $poste = Poste::find($id);

        $poste->delete();

        return $poste;
    }





    public function findForAutocomplete($query, $societeId)
    {
        $query = explode(' ', $query);

        $where = [];

        foreach ($query as $q) {
            $where[] = 'LOWER(nom) LIKE LOWER("%' . $q . '%")';
        }

        $implode = implode(" AND ", $where);

        $postes = Poste::select('id', 'nom')
            ->distinct()
            ->where('societe_id', '=', $societeId)
            ->whereRaw($implode)
            ->get();

        return $postes;
    }





    public function findByApproximativeName($name, $societeId)
    {
      $postes = Poste::whereRaw('LOWER(nom) LIKE LOWER("%'. $name .'%")')
      ->where('societe_id', '=', $societeId)
      ->get();

      return $postes;
    }
}
