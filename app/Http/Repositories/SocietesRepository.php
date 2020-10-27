<?php
namespace App\Http\Repositories;

use App\Societe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Validator;
use Image;

/**
 * Repository class to communicate with data sources of different kinds
 */
class SocietesRepository implements RepositoryInterface
{
  /**
   * Recherche un utilisateur par son id, et s'il la requête ne renvoie aucun résultat, créé un nouvel utilisateur
   *
   * @param int $id
   * @return \App\Societe
   */
  public function findByIdOrInstantiate($id)
  {
      $societe = Societe::firstOrNew(['id' => $id]);

      return $societe;
  }





  /**
   * Met à jour les informations de la société
   *
   * @param Request $request
   * @return \App\Societe
   */
  public function update($request)
  {
      $id = Auth::guard('web_societe')->user()->id;

      // on valide les champs grâce à la fonction "validator"
      $this->validator($request->all(), $id)->validate();

      // on met à jour l'utilisateur
      $societe = Societe::find($id);
      $societe->nom = $request->nom;
      $societe->siret = $request->siret;
      $societe->telephone = $request->telephone;
      $societe->email = $request->email;
      $societe->adresse = $request->adresse;
      $societe->code_postal = $request->code_postal;
      $societe->ville = $request->ville;
      $societe->nbr_employes = $request->nbr_employes;
      $societe->secteur_id = $request->secteur_id;

      if ($request->hasFile('logo')) {
        $societe = Auth::guard('web_societe')->user();
        $nomSociete = str_replace(' ', '_', $societe->nom);

        // $filename = $nomSociete . '_' . time() . '.' . $request->file('logo')->getClientOriginalExtension();
        $filename = $nomSociete . '.' . $request->file('logo')->getClientOriginalExtension();

        $logo = Image::make($request->file('logo'))->resize(null, 150, function ($constraint) {
            $constraint->aspectRatio();
        });
        $logo->save(public_path('img/logos/' . $filename));

        $societe->logo = $filename;
      }

      $societe->save();

      // on retourne sur la page du profil
      return $societe;
  }





  //Validates user's Input
  protected function validator(array $data, $id)
  {
      return Validator::make($data, [
        'nom' => 'required|max:255',
        'siret' => 'required|max:14',
        'telephone' => 'required|max:10',
        'email' => ['required', 'string', 'email', 'max:255', Rule::unique('societes')->ignore($id),],
        'secteur_id' => 'required',
      ]);
  }
}
