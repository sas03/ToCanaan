<?php
namespace App\Http\Repositories;

use App\SavoirEtreAdded;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Validator;

/**
 * Repository class to communicate with data sources of different kinds
 */
class SavoirEtreAddedRepository implements RepositoryInterface
{

  /**
   * Ajoute un nouveau savoir-être
   *
   * @param Request $request
   * @return App\SavoirEtreAdded|json
   */
  public function add($request)
  {
      $validator = Validator::make($request->all(), [
        'nom' => 'required|string'
      ]);

      if ($validator->passes()) {
        $savoirEtreAdded = new SavoirEtreAdded;
        $savoirEtreAdded->nom = $request->nom;
        $savoirEtreAdded->save();

        return $savoirEtreAdded;
      }

      return response()->json(['error' => $validator->errors()->all()]);
  }





  /**
   * Met à jour un savoir-être
   *
   * @param Request $request
   * @return App\SavoirEtreAdded|json
   */
  public function updateName($request)
  {
      $validator = Validator::make($request->all(), [
        'nom' => 'required|string'

      ]);

      if ($validator->passes()) {
        $savoirEtreAdded = SavoirEtreAdded::find($request->savoir_id);
        $savoirEtreAdded->nom = $request->nom;
        $savoirEtreAdded->save();

        return $savoirEtreAdded;
      }

      return response()->json(['error' => $validator->errors()->all()]);
  }





  /**
   * Sélectionne un savoir-être grâce à son intitulé
   *
   * @param string $name
   * @return App\SavoirEtreAdded
   */
  public function findByName($name)
  {
    $savoirEtreAdded = SavoirEtreAdded::where('nom', '=', $name)->first();

    return $savoirEtreAdded;
  }





  /**
   * Sélectionne un savoir-être grâce à son ID
   *
   * @param int $id
   * @return App\SavoirEtreAdded
   */
  public function findById($id)
  {
    $savoirEtreAdded = SavoirEtreAdded::where('id', '=', $id)->first();

    return $savoirEtreAdded;
  }
}
