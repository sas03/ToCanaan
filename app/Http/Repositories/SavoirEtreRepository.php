<?php
namespace App\Http\Repositories;

use App\SavoirEtre;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Validator;

/**
 * Repository class to communicate with data sources of different kinds
 */
class SavoirEtreRepository implements RepositoryInterface
{

  /**
   * Sélectionne un savoir-être grâce à un ID et renvoie un model
   *
   * @param int $id
   * @return App\SavoirEtre
   */
  public function findById($id)
  {
    $savoirEtre = SavoirEtre::find($id);

    return $savoirEtre;
  }





  /**
   * Sélectionne un savoir-être grâce à son ID et renvoie une collection
   *
   * @param int $id
   * @return Illuminate\Database\Eloquent\Collection
   */
  public function findByIdAsCollection($id)
  {
    $savoirEtre = SavoirEtre::where('id', '=', $id)->get();

    return $savoirEtre;
  }





  /**
   * Sélectionne un savoir-être avec son id, ou en créé un nouveau
   *
   * @param int $id
   * @return App\SavoirEtre
   */
  public function findByIdOrInstantiate($id)
  {
      $savoirEtre = SavoirEtre::firstOrNew(['id' => $id]);

      return $savoirEtre;
  }





  /**
   * Sélectionne un (ou plusieurs) savoir-être grâce à un mot-clé
   *
   * @param string $name
   * @return Illuminate\Database\Eloquent\Collection
   */
  public function findByApproximativeName($name)
  {
    $savoirEtre = SavoirEtre::where('nom', 'like', '%'.$name.'%')->get();

    return $savoirEtre;
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

      $savoirEtre = SavoirEtre::select('nom')
          ->whereRaw($implode)
          ->get();

      return $savoirEtre;
  }





  /**
   * Sélectionne tous les savoir-etre et renvoie une pagination
   *
   * @param int $number
   * @return Illuminate\Pagination\LengthAwarePaginator
   */
  public function findAllWithPaginate($number)
  {
      $savoirEtre = SavoirEtre::paginate($number);

      return $savoirEtre;
  }





  /**
   * Supprime un savoir-être
   *
   * @param int $id
   * @return \App\Code
   */
  public function delete($id)
  {
      $savoirEtre = SavoirEtre::find($id);

      $savoirEtre->delete();

      return $savoirEtre;
  }





  /**
   * Met à jour un savoir-être par le biais de l'espace Admin
   *
   * @param Request $request
   * @param SavoirEtre $savoirEtre
   * @return \App\SavoirEtre
   */
  public function updateFromAdmin($request, SavoirEtre $savoirEtre)
  {
      // on valide les données rentrées par l'utilisateur dans le formulaire
      Validator::make($request->all(), [
          'nom' => 'required|string|max:255'
      ])->validate();

      // on met à jour le métier
      $savoirEtre->nom = $request->nom;
      $savoirEtre->save();

      return $savoirEtre;
  }


}
