<?php
namespace App\Http\Repositories;

use App\SavoirFaireAdded;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Validator;

/**
 * Repository class to communicate with data sources of different kinds
 */
class SavoirFaireAddedRepository implements RepositoryInterface
{

    /**
     * Ajoute un nouveau savoir-faire
     *
     * @param Request $request
     * @return App\SavoirFaireAdded|json
     */
    public function add($request)
    {
        $validator = Validator::make($request->all(), [
          'nom' => 'required|string'

        ]);

        if ($validator->passes()) {
          $savoirFaireAdded = new SavoirFaireAdded;
          $savoirFaireAdded->nom = $request->nom;
          $savoirFaireAdded->save();

          return $savoirFaireAdded;
        }

        return response()->json(['error' => $validator->errors()->all()]);
    }






    /**
     * Met à jour un savoir-faire
     *
     * @param Request $request
     * @return App\SavoirFaireAdded|json
     */
    public function updateName($request)
    {
        $validator = Validator::make($request->all(), [
          'nom' => 'required|string'

        ]);

        if ($validator->passes()) {
          $savoirFaireAdded = SavoirFaireAdded::find($request->savoir_id);
          $savoirFaireAdded->nom = $request->nom;
          $savoirFaireAdded->save();

          return $savoirFaireAdded;
        }

        return response()->json(['error' => $validator->errors()->all()]);
    }





    /**
     * Sélectionne un savoir-faire grâce à son intitulé
     *
     * @param string $nom
     * @return App\SavoirFaireAdded
     */
    public function findByName($nom)
    {
      $savoirFaireAdded = SavoirFaireAdded::where('nom', '=', $nom)->first();

      return $savoirFaireAdded;
    }





    /**
     * Sélectionne un savoir-faire grâce à son ID
     *
     * @param int $id
     * @return App\SavoirFaireAdded
     */
    public function findById($id)
    {
      $savoirFaireAdded = SavoirFaireAdded::where('id', '=', $id)->first();

      return $savoirFaireAdded;
    }





    /**
     * Sélectionne un savoir-faire grâce au nom d'une colonne
     *
     * @param string $column
     * @param string $value
     * @return App\SavoirFaireAdded
     */
    public function findByValueofColumn($column, $value)
    {
      $savoirFaireAdded = SavoirFaireAdded::where($column, '=', $value)->first();

      return $savoirFaireAdded;
    }
}
