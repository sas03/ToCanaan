<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Validator;
use App\Employe;
use App\SavoirEtre;
use Image;


class SocietesController extends Controller
{
    public function __construct()
    {
        $this->middleware('societe_auth');
    }



    /**
     * Affiche le profil de l'utilisateur
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $societe = Auth::guard('web_societe')->user();
        $services = $societe->services->sortBy('nom');
        $postes = $societe->postes;
        $employes = $societe->employes;

        return view('societes.index', compact('societe', 'services', 'postes', 'employes', 'request'));
    }



    /**
     * Affiche la page de recherche
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function search(Request $request)
    {
        $societe = Auth::guard('web_societe')->user();
        $societe_id = $societe->id;

        // On récupère ce que l'utilisateur a entré dans l'input.
        $req = $request->input('q');

        $categorie = "";

        // Si le champ n'est pas vide (!= null)
        if (!is_null($req)) {
          $categorie = $request->input('categorie');

          if ($categorie == 'service') {
            $services = app('ServicesRepository')->findByApproximativeName($req, $societe_id);

            $services = $services->map(function ($item, $key) {
                $item['postes'] = $item->postes;
                $item['employes'] = $item->employes;
                return $item;
            });
          }

          if ($categorie == 'poste') {
            $postes = app('PostesRepository')->findByApproximativeName($req, $societe_id);

            $postes = $postes->map(function ($item, $key) {
                $item['employes'] = $item->employes;
                return $item;
            });
          }

          if ($categorie == 'employe') {
            $employes = app('EmployesRepository')->findByApproximativeName($req, $societe_id);
          }

          if ($categorie == 'competence_requise') {
            $competences_requises = $societe->getCompetences('requise');

            $competences_requises = $competences_requises->filter(function ($competence, $key) use($req) {
                if (preg_match("/$req/i", $competence->nom)) {
                    return $competence;
                }
            });
          }

          if ($categorie == 'competence_disponible') {
            $competences_disponibles = $societe->getCompetences('disponible');

            $competences_disponibles = $competences_disponibles->filter(function ($competence, $key) use($req) {
                if (preg_match("/$req/i", $competence->nom)) {
                    return $competence;
                }
            });
          }
        }

        $services = (!empty($services)) ? $services : null;
        $employes = (!empty($employes)) ? $employes : null;
        $postes = (!empty($postes)) ? $postes : null;
        $competences_requises = (!empty($competences_requises)) ? $competences_requises : null;
        $competences_disponibles = (!empty($competences_disponibles)) ? $competences_disponibles : null;

        return view('societes.search', compact('request', 'categorie', 'services', 'employes', 'postes', 'competences_requises', 'competences_disponibles'));
    }



    /**
     * Renvoie le formulaire et édite les informations d'une société
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function edit(Request $request)
    {
        if ($request->isMethod('post')) {
          $edit = app('SocietesRepository')->update($request);

          return redirect()->route('societe_index');
        }

        $secteurs = app('SecteursRepository')->findAll();
        $secteurs = $secteurs->sortBy('nom');

        return view('societes.edit_profil', compact('secteurs'));
    }



    /**
     * Traite le formulaire d'édition de mot de passe
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function editPassword(Request $request)
    {
        // on sélectionne notre utilisateur
        $user = Auth::guard('web_societe')->user();

        if ($request->isMethod('post')) {
          // on valide les informations rentrées par l'utilisateur dans le formulaire
          Validator::make($request->all(), [
            'old_password' => 'required|min:6',
            'new_password' => 'required|min:6|confirmed',
            'new_password_confirmation' => 'required|min:6',
          ])->validate();

          // on vérifie si l'ancien mot de passe est le bon
          if (Hash::check($request->old_password, $user->password)) {

              // on hash le nouveau mot de passe, et on sauvegarde
              $user->password = Hash::make($request->new_password);
              $user->save();

              // on retourne sur la page du profil avec un messagede succès
              return redirect()->route('societe_index')->with('success', 'Votre Mot de Passe a bien été mis à jour !');
          } else {

              // si l'ancien mot de passe saisi n'est pas le bon
              return redirect()->route('societe_edit_password')->with('fail', 'L\'ancien Mot de Passe saisi n\'est pas celui que nous connaissons !');
          }
        }

        return view('societes.edit_password');
    }



    /**
     * Met à jour le logo/avatar de la société
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function updateLogo(Request $request)
    {
      if ($request->hasFile('logo')) {
        $societe = Auth::guard('web_societe')->user();
        $nomSociete = str_replace(' ', '_', $societe->nom);

        // $filename = $nomSociete . '_' . time() . '.' . $request->file('logo')->getClientOriginalExtension();
        $filename = $nomSociete . '.' . $request->file('logo')->getClientOriginalExtension();

        $logo = Image::make($request->file('logo'))->fit(150);
        $logo->save(public_path('img/logos/' . $filename));

        $societe->logo = $filename;
        $societe->save();
      }

      return redirect()->route('societe_index');
    }

}
