<?php
namespace App\Http\Repositories;

use App\Resume;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Validator;

/**
 * Repository class to communicate with data sources of different kinds
 */
class ResumesRepository implements RepositoryInterface
{
    public function create($request)
    {
      $validator = Validator::make($request->all(), [
        'nom' => 'required|string|max:255',
        'type' => 'required|string|max:255',
        'user_id' => 'required|integer'
      ]);

      if ($validator->passes()) {

        $resume = new Resume;

        $resume->nom = $request->nom;
        $resume->type = $request->type;
        $resume->description = $request->description;
        $resume->date_debut = $request->date_debut;
        $resume->date_fin = $request->date_fin;
        $resume->etablissement_nom = $request->etablissement_nom;
        $resume->ville = $request->ville;
        $resume->user_id = $request->user_id;

        if (isset($request->poste_actuel)) {
          $resume->poste_actuel = 'oui';
        }

        $resume->save();

        return $resume;
      }
      return response()->json(['error' => $validator->errors(), 'index' => $validator->errors()->keys()]);
    }





    public function update($request)
    {
      $validator = Validator::make($request->all(), [
        'nom' => 'required|string|max:255',
        'date_debut' => 'date',
        'date_fin' => 'date',
        'user_id' => 'required|integer'
      ]);

      if ($validator->passes()) {

        $resume = Resume::find($request->id);

        $resume->nom = $request->nom;
        $resume->description = $request->description;
        $resume->date_debut = $request->date_debut;
        $resume->date_fin = $request->date_fin;
        $resume->etablissement_nom = $request->etablissement_nom;
        $resume->ville = $request->ville;
        $resume->user_id = $request->user_id;

        if (isset($request->poste_actuel)) {
          $resume->poste_actuel = 'oui';
        }

        $resume->save();

        return $resume;
      }
      return response()->json(['error' => $validator->errors(), 'index' => $validator->errors()->keys()]);
    }





    public function delete($id)
    {
      $resume = Resume::find($id);

      $resume->delete();

      return $resume;
    }
}
