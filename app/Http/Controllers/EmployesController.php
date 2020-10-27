<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Employe;
use App\Service;

class EmployesController extends Controller
{

    /**
     * Ajouter un employé
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function add(Request $request)
    {
        $societe = Auth::guard('web_societe')->user();
        $services = $societe->services;
        $postes = $societe->postes;

        // lorsque l'utilisateur choisi un secteur, cela déclenche une requête AJAX
        if ($request->ajax()) {
          $service = $services->where('id', $request->input('service_id'))->first();
          $metiers = $service->postes;
          $view = view('societes.ajax.liste_metiers', compact('metiers'))->render();

          return response()->json(['view' => $view]);
        }

        return view('societes.employes.add', compact('services', 'postes'));
    }





    /**
     * Création d'un employé
     *
     * @param Request $request
     * @return App\Employe
     */
    public function create(Request $request)
    {
        $add = app('EmployesRepository')->create($request);

        return $add;
    }





    /**
     * Renvoie le formulaire pour éditer les informations d'un employé
     *
     * @param int $id
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function edit($id, Request $request)
    {
        $employe = app('EmployesRepository')->findById($id);

        // si l'id n'est pas valide on redirige vers l'accueil
        if (!$employe) {
          return redirect()->route('societe_index');
        }

        $societe = Auth::guard('web_societe')->user();
        $services = $societe->services;
        $postes = $societe->postes;

        $poste = $employe->poste;

        $savoirsPoste = ($poste) ? $poste->getSavoirs()->sortBy('nom') : [];
        $savoirFairePoste = ($poste) ? $poste->getSavoirFaire()->sortBy('nom') : [];
        $savoirEtrePoste = ($poste) ? $poste->getSavoirEtre()->sortBy('nom') : [];

        return view('societes.employes.edit', compact(
          'employe',
          'services',
          'postes',
          'savoirsPoste',
          'savoirFairePoste',
          'savoirEtrePoste',
          'users'
        ));
    }





    /**
     * Met à jour les informations d'un employé
     *
     * @param Request $request
     * @param int $id
     * @return App\Employe
     */
    public function updateEmploye(Request $request, $id)
    {
        $update = app('EmployesRepository')->update($request, $id);

        return $update;
    }





    /**
     * Met à jour le service de l'employé
     *
     * @param Request $request
     * @return App\Employe
     */
    public function updateService(Request $request)
    {
        $employe = app('EmployesRepository')->updateService($request);

        $poste = $employe->poste;

        if ($poste) {
          $employesWithPoste = $poste->employes->where('service_id', '!=', NULL);

          if (count($employesWithPoste) == 0) {
            $poste = app('PostesRepository')->updateService($request, $poste->id);
          }
        }

        return $employe;
    }





    /**
     * Met à jour le poste de l'employé
     *
     * @param Request $request
     * @return App\Employe
     */
    public function updatePoste(Request $request)
    {
        $employe = app('EmployesRepository')->updatePoste($request);

        return $employe;
    }





    /**
     * Renvoie la page pour ajouter les compétences d'un employé
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function editSavoirs($id)
    {
        $employe = app('EmployesRepository')->findById($id);

        // si l'id n'est pas valide on redirige vers l'accueil
        if (!$employe) {
          return redirect()->route('home');
        }

        $poste = $employe->poste;
        $savoirsBase = $poste->getSavoirs('base')->sortBy('nom');
        $savoirsSpe = $poste->getSavoirs('spe')->sortBy('nom');

        $savoirsEmploye = $employe->getSavoirs();
        $savoirsEmployeId = $savoirsEmploye->pluck('id')->toArray();

        return view('societes.employes.edit_savoirs', compact(
          'employe',
          'poste',
          'savoirsBase',
          'savoirsSpe',
          'savoirsEmploye',
          'savoirsEmployeId'
        ));
    }





    /**
     * Renvoie la page pour ajouter les savoir-faire d'un employé
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function editSavoirFaire($id)
    {
        $employe = app('EmployesRepository')->findById($id);

        // si l'id n'est pas valide on redirige vers le dashboard de la société
        if (!$employe) {
          return redirect()->route('societe_index');
        }

        $poste = $employe->poste;

        $savoirFaireBase = $poste->getSavoirFaire('base')->sortBy('nom');
        $savoirFaireSpe = $poste->getSavoirFaire('spe')->sortBy('nom');

        $savoirFaireEmploye = $employe->getSavoirFaire();
        $savoirFaireEmployeId = $savoirFaireEmploye->pluck('id')->toArray();


        return view('societes.employes.edit_savoir_faire', compact(
          'employe',
          'poste',
          'savoirFaireBase',
          'savoirFaireSpe',
          'savoirFaireEmploye',
          'savoirFaireEmployeId'
        ));
    }





    /**
     * Renvoie la page pour ajouter les savoir-être d'un employé
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function editSavoirEtre($id)
    {
        $employe = app('EmployesRepository')->findById($id);
        $societe = Auth::guard('web_societe')->user();

        // si l'id n'est pas valide on redirige vers l'accueil
        if (!$employe) {
          return redirect()->route('societe_index');
        }

        $poste = $employe->poste;
        $savoirEtre = $poste->getSavoirEtre()->sortBy('nom');

        $savoirEtreEmploye = $employe->getSavoirEtre();
        $savoirEtreEmployeId = $savoirEtreEmploye->pluck('id')->toArray();

        return view('societes.employes.edit_savoir_etre', compact(
          'employe',
          'savoirEtre',
          'savoirEtreEmploye',
          'savoirEtreEmployeId'
        ));
    }





    /**
     * Affiche la fiche d'un employé
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function fiche($id)
    {
      $employe = Employe::find($id);

      if (!$employe) {
        return redirect()->route('societe_index');
      }

      $poste = $employe->poste;

      $savoirsPoste = ($poste) ? $poste->getSavoirs(null, 'oui') : [];
      $savoirFairePoste = ($poste) ? $poste->getSavoirFaire(null, 'oui') : [];
      $savoirEtrePoste = ($poste) ? $poste->getSavoirEtre('oui') : [];

      $savoirsBase = $employe->getSavoirs('base')->sortBy('nom');
      $savoirsSpe = $employe->getSavoirs('spe')->sortBy('nom');

      $savoirFaireBase = $employe->getSavoirFaire('base')->sortBy('nom');
      $savoirFaireSpe = $employe->getSavoirFaire('spe')->sortBy('nom');

      $savoirEtre = $employe->getSavoirEtre()->sortBy('nom');


      $user = ($employe->user) ? $employe->user : NULL ;

      return view('societes.employes.fiche', compact(
        'employe',
        'poste',
        'savoirsBase',
        'savoirsSpe',
        'savoirFaireBase',
        'savoirFaireSpe',
        'savoirEtre',
        'savoirsPoste',
        'savoirFairePoste',
        'savoirEtrePoste',
        'user'
      ));
    }





    /**
     * Affiche la liste des employés
     *
     * @return \Illuminate\View\View
     */
    public function liste()
    {
      $societe = Auth::guard('web_societe')->user();
      $employes = $societe->employes->sortBy('nom');

      return view('societes.employes.liste', compact('employes'));
    }





    /**
     * Autocomplétion du champs de recherche des employés
     *
     * @param Request @request
     * @return json
     */
    public function autocomplete(Request $request)
    {
        $query = $request->get('term', '');

        $societeId = Auth::guard('web_societe')->user()->id;
        $employes = app('EmployesRepository')->findForAutocomplete($query, $societeId);

        return json_encode($employes); // On retourne le résultat en JSON.
    }





    /**
     * Supprime un employé
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function delete($id)
    {
        $delete = app('EmployesRepository')->delete($id);

        return redirect()->route('societe_index');
    }
}
