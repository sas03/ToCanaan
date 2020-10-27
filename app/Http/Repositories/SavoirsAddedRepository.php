<?php
namespace App\Http\Repositories;

use App\SavoirAdded;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Validator;

/**
 * Repository class to communicate with data sources of different kinds
 */
class SavoirsAddedRepository implements RepositoryInterface
{

    /**
     * Ajoute un nouveau savoir
     *
     * @param Request $request
     * @return App\SavoirAdded|json
     */
    public function add($request)
    {
        $validator = Validator::make($request->all(), [
          'nom' => 'required|string'

        ]);

        if ($validator->passes()) {
          $savoirAdded = new SavoirAdded;

          $savoirAdded->nom = $request->nom;

          $savoirAdded->save();

          return $savoirAdded;
        }

        return response()->json(['error' => $validator->errors()->all()]);
    }





    /**
     * Fonction pour l'autocompletion
     *
     * @param array $query
     * @param int $societeId
     * @return App\SavoirAdded|json
     */
    public function findForAutocomplete($query, $societeId)
    {
        $query = explode(' ', $query);

        $where = [];

        foreach ($query as $q) {
            $where[] = 'LOWER(nom) LIKE LOWER("%' . $q . '%")';
        }

        $implode = implode(" AND ", $where);

        $savoirAdded = SavoirAdded::select('nom')
            ->distinct()
            ->where('societe_id', '=', $societeId)
            ->whereRaw($implode)
            ->get();

        return $savoirAdded;
    }





    /**
     * Sélectionne un (ou plusieurs) savoir grâce à un mot-clé
     *
     * @param string $name
     * @param int $societeId
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function findByApproximativeName($name, $societeId)
    {
      $savoirAdded = SavoirAdded::whereRaw('LOWER(nom) LIKE LOWER("%'. $name .'%")')
      ->distinct()
      ->where('societe_id', '=', $societeId)
      ->get();

      return $savoirAdded;
    }





    /**
     * Met à jour un savoir
     *
     * @param Request $request
     * @return App\SavoirAdded|json
     */
    public function updateName($request)
    {
        $validator = Validator::make($request->all(), [
          'nom' => 'required|string'

        ]);

        if ($validator->passes()) {
          $savoirAdded = SavoirAdded::find($request->savoir_id);
          $savoirAdded->nom = $request->nom;
          $savoirAdded->save();

          return $savoirAdded;
        }

        return response()->json(['error' => $validator->errors()->all()]);
    }





    /**
     * Sélectionne un savoir grâce à son nom
     *
     * @param string $nom
     * @return App\SavoirAdded
     */
    public function findByName($nom)
    {
      $savoirAdded = SavoirAdded::where('nom', '=', $nom)->first();

      return $savoirAdded;
    }





    /**
     * Sélectionne un savoir grâce à son ID
     *
     * @param int $id
     * @return App\SavoirAdded
     */
    public function findById($id)
    {
      $savoirAdded = SavoirAdded::where('id', '=', $id)->first();

      return $savoirAdded;
    }





    /**
     * Sélectionne un savoir grâce au nom d'une colonne
     *
     * @param string $column
     * @param string $value
     * @return App\SavoirAdded
     */
    public function findByValueofColumn($column, $value)
    {
      $savoirAdded = SavoirAdded::where($column, '=', $value)->first();

      return $savoirAdded;
    }
}
