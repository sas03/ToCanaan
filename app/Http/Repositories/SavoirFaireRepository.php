<?php
namespace App\Http\Repositories;

use App\SavoirFaire;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Validator;

/**
 * Repository class to communicate with data sources of different kinds
 */
class SavoirFaireRepository implements RepositoryInterface
{

  /**
   * Sélectionne un savoir-faire grâce à un ID et renvoie un model
   *
   * @param int $id
   * @return App\SavoirFaire
   */
  public function findById($id)
  {
    $savoirFaire = SavoirFaire::find($id);

    return $savoirFaire;
  }





  /**
   * Sélectionne un savoir-faire grâce à un ID et renvoie une collection
   *
   * @param int $id
   * @return Illuminate\Database\Eloquent\Collection
   */
  public function findByIdAsCollection($id)
  {
    $savoirFaire = SavoirFaire::where('id', '=', $id)->get();

    return $savoirFaire;
  }





  /**
   * Sélectionne un savoir-faire grâce à un id, ou en créé un nouveau
   *
   * @param int $id
   * @return App\SavoirFaire
   */
  public function findByIdOrInstantiate($id)
  {
      $savoirFaire = SavoirFaire::firstOrNew(['id' => $id]);

      return $savoirFaire;
  }





  /**
   * Sélectionne un (ou plusieurs) savoir-faire grâce à un mot-clé
   *
   * @param string $name
   * @return Illuminate\Database\Eloquent\Collection
   */
  public function findByApproximativeName($name)
  {
    $savoirFaire = SavoirFaire::where('nom', 'like', '%'.$name.'%')->get();

    return $savoirFaire;
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

      $savoirFaire = SavoirFaire::select('nom')
          ->whereRaw($implode)
          ->get();

      return $savoirFaire;
  }





  /**
   * Selectionne tous les savoir-faire et renvoie une pagination
   *
   * @param int $number
   * @return Illuminate\Pagination\LengthAwarePaginator
   */
  public function findAllWithPaginate($number)
  {
      $savoirFaire = SavoirFaire::paginate($number);

      return $savoirFaire;
  }





  /**
   * Supprime un savoir-faire
   *
   * @param int $id
   * @return \App\Code
   */
  public function delete($id)
  {
      $savoirFaire = SavoirFaire::find($id);

      $savoirFaire->delete();

      return $savoirFaire;
  }





  /**
   * Met à jour un savoir-faire par le biais de l'espace Admin
   *
   * @param Request $request
   * @param SavoirFaire $savoirEtre
   * @return \App\SavoirFaire
   */
  public function updateFromAdmin($request, SavoirFaire $savoirFaire)
  {
      // on valide les données rentrées par l'utilisateur dans le formulaire
      Validator::make($request->all(), [
          'nom' => 'required|string|max:255'
      ])->validate();

      // on met à jour le métier
      $savoirFaire->nom = $request->nom;
      $savoirFaire->save();

      return $savoirFaire;
  }
  
}
