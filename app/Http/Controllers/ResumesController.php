<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Keyword;

class ResumesController extends Controller
{

    /**
     * Ajoute une "ligne" (= expérience pro, formation ou centre d'intérêt) au CV
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function add(Request $request)
    {

      $resume = app('ResumesRepository')->create($request);

      return redirect()->route('user_resume');
    }





    /**
     * Editer une ligne du CV
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function edit(Request $request)
    {
      $resume = app('ResumesRepository')->update($request);

      // on retourne sur la page du profil avec un message
      return redirect()->route('user_resume');
    }





    /**
     * Supprimer une ligne du CV
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function delete($id)
    {
      $resume = app('ResumesRepository')->delete($id);

      // on retourne sur la page du profil avec un message
      return redirect()->route('user_resume');
    }

}
