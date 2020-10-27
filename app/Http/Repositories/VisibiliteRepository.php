<?php
namespace App\Http\Repositories;

use App\Visibilite;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Validator;

/**
 * Repository class to communicate with data sources of different kinds
 */
class VisibiliteRepository implements RepositoryInterface
{
    /**
     * Met à jour la visibilité
     *
     * @param Request $request
     * @return \App\Visibilite
     */
    public function create($array)
    {
        $create = new Visibilite;

        $user_id = Auth::user()->id;

        $create->user_id = $request->user_id;

        $create->save();

        return $create;
    }





    /**
     * Met à jour la visibilité
     *
     * @param array $array
     * @return \App\Visibilite
     */
    public function update($array)
    {

      $user_id = Auth::user()->id;

      $update = Visibilite::where('user_id', $user_id)->first();

      $update->email = $array['email'];
      $update->experiences = $array['experiences'];
      $update->formations = $array['formations'];
      $update->centres = $array['centres'];
      $update->savoirs = $array['savoirs'];
      $update->savoir_etre = $array['savoir_etre'];
      $update->motivations = $array['motivations'];

      $update->save();

      return $update;
    }
}
