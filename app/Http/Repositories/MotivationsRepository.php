<?php
namespace App\Http\Repositories;

use App\Motivation;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Validator;

/**
 * Repository class to communicate with data sources of different kinds
 */
class MotivationsRepository implements RepositoryInterface
{

  /**
   * Sélectionne une motivation par un id et retourne un model
   *
   * @param int $id
   * @return App\Motivation
   */
  public function findById($id)
  {
    $motivation = Motivation::find($id);

    return $motivation;
  }





  /**
   * Sélectionne une motivation par un id et retourne une collection
   *
   * @param int $id
   * @return \Illuminate\Database\Eloquent\Collection
   */
  public function findByIdAsCollection($id)
  {
    $motivation = Motivation::where('id', '=', $id)->get();

    return $motivation;
  }





  /**
   * Sélectionne une motivation avec son id, ou en créé un nouveau
   *
   * @param int $id
   * @return App\Motivation
   */
  public function findByIdOrInstantiate($id)
  {
      $motivation = Motivation::firstOrNew(['id' => $id]);

      return $motivation;
  }





  /**
   * Sélectionne une ou plusieurs motivation grâce à une chaîne de caractères
   *
   * @param string $name
   * @return \Illuminate\Database\Eloquent\Collection
   */
  public function findByApproximativeName($name)
  {
    $motivations = Motivation::where('nom', 'like', '%'.$name.'%')->get();

    return $motivations;
  }




  /**
   * Sélectionne une motivation avec son id, ou en créé un nouveau
   *
   * @param int $id
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

      $motivations = Motivation::select('nom')
          ->whereRaw($implode)
          ->get();

      return $motivations;
  }





  /**
   * Selectionne toutes les motivations et renvoie une pagination
   *
   * @param int $number
   * @return Illuminate\Pagination\LengthAwarePaginator
   */
  public function findAllWithPaginate($number)
  {
      $motivations = Motivation::paginate($number);

      return $motivations;
  }





  /**
   * Supprime une motivation en fonction de son id
   *
   * @param int $id
   * @return App\Motivation
   */
  public function delete($id)
  {
      $motivation = Motivation::find($id);

      $motivation->delete();

      return $motivation;
  }





  /**
   * Met à jour un code par le biais de l'espace Admin
   *
   * @param Request $request
   * @param Motivation $motivation
   * @return \App\Motivation
   */
  public function updateFromAdmin($request, Motivation $motivation)
  {
      // on valide les données rentrées par l'utilisateur dans le formulaire
      Validator::make($request->all(), [
          'nom' => 'required|string|max:255'
      ])->validate();

      // on met à jour le métier
      $motivation->nom = $request->nom;
      $motivation->save();

      return $motivation;
  }
}
