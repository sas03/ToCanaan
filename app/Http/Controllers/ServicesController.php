<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Service;
use Illuminate\Validation\Rule;
use Validator;

class ServicesController extends Controller
{
    /**
     * Affiche la page pour créer un service
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function add(Request $request)
    {
      $societe = Auth::guard('web_societe')->user();

      $employes = $societe->employes->sortBy('nom');
      $postes = $societe->postes->sortBy('nom');

      return view('societes.services.add', compact('societe', 'employes', 'postes'));
    }





    /**
     * Ajoute un nouveau service
     *
     * @param Request $request
     * @return App\Service
     */
    public function create(Request $request)
    {
      $add = app('ServicesRepository')->create($request);

      return $add;
    }





    /**
     * Met à jour un service
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function edit(Request $request, $id)
    {
      $service = app('ServicesRepository')->findById($id);

      if ($request->ajax()) {
        $edit = app('ServicesRepository')->update($request, $id);
        return $edit;
      }

      return view('societes.services.edit', compact('service'));
    }





    /**
     * Ajoute un poste au service
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function editPoste(Request $request, $id)
    {
      $service = app('ServicesRepository')->findById($id);
      $societe = Auth::guard('web_societe')->user();

      if ($request->ajax()) {
        $servicePostes = $service->postes->sortBy('nom');
        $postes = $societe->postes->where('service_id', '!=', $service->id)->sortBy('nom');

        $viewListePostes = view('societes.ajax.liste_postes', compact('postes'))->render();
        $viewListePostesByService = view('societes.ajax.liste_postes_by_service', compact('servicePostes'))->render();

        return response()->json(['view_liste_postes_service' => $viewListePostesByService, 'view_liste_postes' => $viewListePostes]);
      }

      return view('societes.services.edit_poste', compact('service', 'societe'));
    }





    /**
     * Ajoute un employé au service
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function editEmploye(Request $request, $id)
    {
      $service = app('ServicesRepository')->findById($id);
      $societe = Auth::guard('web_societe')->user();

      if ($request->ajax()) {
        $serviceEmployes = $service->employes->sortBy('nom');
        $employes = $societe->employes->where('service_id', '!=', $service->id)->sortBy('nom');

        $viewListeEmployes = view('societes.ajax.liste_employes', compact('employes'))->render();
        $viewListeEmployesByService = view('societes.ajax.liste_employes_by_service', compact('serviceEmployes'))->render();

        return response()->json(['view_liste_employes' => $viewListeEmployesByService, 'view_liste_employes_global' => $viewListeEmployes]);
      }

      return view('societes.services.edit_employe', compact('service', 'societe'));
    }





    /**
     * Affiche la fiche du service
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function fiche($id)
    {
        $service = app('ServicesRepository')->findById($id);
        $postes = $service->postes;

        $employes = $service->employes->sortBy('nom');


        return view('societes.services.fiche', compact('service', 'postes', 'employes'));
    }





    /**
     * Supprime un service
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function delete($id)
    {
        $delete = app('ServicesRepository')->delete($id);

        return redirect()->route('societe_index');
    }





    /**
     * Affiche la liste de tous les services de la société
     *
     * @return \Illuminate\View\View
     */
    public function liste()
    {
      $societe = Auth::guard('web_societe')->user();
      $services = $societe->services;

      return view('societes.services.liste', compact('services'));
    }





    /**
     * Autocomplétion des services
     *
     * @param Request $request
     * @return json $encode
     */
    public function autocomplete(Request $request)
    {
        $query = $request->get('term', '');

        $societeId = Auth::guard('web_societe')->user()->id;
        $services = app('ServicesRepository')->findForAutocomplete($query, $societeId);

        return json_encode($services); // On retourne le résultat en JSON.
    }
}
