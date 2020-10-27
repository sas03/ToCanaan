<?php
namespace App\Http\Repositories;

use App\Savoir;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Validator;

/**
 * Repository class to communicate with data sources of different kinds
 */
class SavoirsRepository implements RepositoryInterface
{

  /**
   * Sélectionne un savoir-faire grâce à un ID et renvoie un model
   *
   * @param int $id
   * @return App\Savoir
   */
  public function findById($id)
  {
    $savoir = Savoir::find($id)->first();

    return $savoir;
  }





  /**
   * Sélectionne un savoir-faire grâce à un ID et renvoie une collection
   *
   * @param int $id
   * @return Illuminate\Database\Eloquent\Collection
   */
  public function findByIdAsCollection($id)
  {
    $savoir = Savoir::where('id', '=', $id)->get();

    return $savoir;
  }





  /**
   * Sélectionne un savoir avec son id, ou en créé un nouveau
   *
   * @param int $id
   * @return App\Savoir
   */
  public function findByIdOrInstantiate($id)
  {
      $savoir = Savoir::firstOrNew(['id' => $id]);

      return $savoir;
  }





  /**
   * Sélectionne un (ou plusieurs) savoir grâce à un mot-clé
   *
   * @param string $name
   * @return Illuminate\Database\Eloquent\Collection
   */
  public function findByApproximativeName($name)
  {
    $savoirs = Savoir::where('nom', 'like', '%'.$name.'%')->get();

    return $savoirs;
  }





  /**
   * Fonction pour l'autocompletion
   *
   * @param array $query
   * @return Illuminate\Database\Eloquent\Collection
   */
  public function findForAutocomplete($query)
  {
      $query = explode(' ', $query);

      $where = [];

      foreach ($query as $q) {
          $where[] = 'LOWER(nom) LIKE LOWER("%' . $q . '%")';
      }

      $implode = implode(" AND ", $where);

      $savoirs = Savoir::select('nom')
          ->whereRaw($implode)
          ->get();

      return $savoirs;
  }





  /**
   * Selectionne tous les savoirs et renvoie une pagination
   *
   * @param int $number
   * @return Illuminate\Pagination\LengthAwarePaginator
   */
  public function findAllWithPaginate($number)
  {
      $savoirs = Savoir::paginate($number);

      return $savoirs;
  }





  /**
   * Supprime un savoir en fonction de son id
   *
   * @param int $id
   * @return \App\Code
   */
  public function delete($id)
  {
      $savoir = Savoir::find($id);

      $savoir->delete();

      return $savoir;
  }





  /**
   * Met à jour un savoir par le biais de l'espace Admin
   *
   * @param Request $request
   * @param Savoir $savoir
   * @return \App\Savoir
   */
  public function updateFromAdmin($request, Savoir $savoir)
  {
      // on valide les données rentrées par l'utilisateur dans le formulaire
      Validator::make($request->all(), [
          'nom' => 'required|string|max:255'
      ])->validate();

      // on met à jour le métier
      $savoir->nom = $request->nom;
      $savoir->save();

      return $savoir;
  }
}
