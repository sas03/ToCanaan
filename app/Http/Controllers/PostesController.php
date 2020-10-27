<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Poste;
use App\CompetencesSociete;

class PostesController extends Controller
{
    /**
     * Ajouter un poste
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function add(Request $request)
    {
      $societe = Auth::guard('web_societe')->user();
      $services = $societe->services;
      $employes = $societe->employes;

      // lorsque l'utilisateur choisi un secteur, cela déclenche une requête AJAX
      if ($request->ajax()) {

        $secteur= app('SecteursRepository')->findById($request->input('secteur'));
        $metiers = $secteur->metiers()->get();
        $metiers = $metiers->sortBy('nom');

        $view = view('societes.ajax.liste_metiers', compact('metiers'))->render();

        return response()->json(['view' => $view]);
      }

      $secteurs = app('SecteursRepository')->findAll();
      $secteurs = $secteurs->sortBy('nom');

      return view('societes.postes.add', compact('services', 'secteurs', 'employes', 'service'));
    }





    /**
     * Ajoute un nouveau poste dans la table "postes"
     *
     * @param Request $request
     * @return App\Poste
     */
    public function createPoste(Request $request)
    {
      $poste = app('PostesRepository')->create($request);

      if (isset($poste->id)) {
        $metier = app('MetiersRepository')->findById($request->metier_id);

        $code = $metier->code;

        $savoirs = $code->savoirs;
        foreach ($savoirs as $savoir) {
          $poste->savoirsDefault()->attach($savoir->id, ['type' => $savoir->pivot->type]);
        }

        $savoirFaire = $code->savoirFaire;
        foreach ($savoirFaire as $savoir) {
          $poste->savoirFaireDefault()->attach($savoir->id, ['type' => $savoir->pivot->type]);
        }

        $savoirEtreId = $metier->savoirEtre->pluck('id');
        $poste->savoirEtreDefault()->attach($savoirEtreId);

      }

      return $poste;
    }





    /**
     * Modifie un poste
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function edit(Request $request, $id)
    {
      $poste = app('PostesRepository')->findById($id);

      $societe = Auth::guard('web_societe')->user();
      $services = $societe->services;

      return view('societes.postes.edit', compact('poste', 'services'));
    }





    /**
     * Met à jour un poste
     *
     * @param Request $request
     * @return App\Poste
     */
    public function updatePoste(Request $request, $id)
    {
      $poste = app('PostesRepository')->update($request, $id);

      return $poste;
    }





    /**
     * Affiche la page de mise à jour du service d'un poste
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function editService($id)
    {
      $poste = app('PostesRepository')->findById($id);

      if (!$poste) {
        return redirect()->route('societe_index');
      }

      $societe = Auth::guard('web_societe')->user();
      $services = $societe->services;

      return view('societes.postes.edit_service', compact('poste', 'societe', 'services'));
    }





    /**
     * Met à jour le service d'un poste
     *
     * @param Request $request
     * @return App\Poste
     */
    public function updateService(Request $request)
    {
      $poste = app('PostesRepository')->updateService($request);

      $employes = $poste->employes;

      if (count($employes)) {
        foreach ($employes as $employe) {
          $employeId = $employe->id;
          $employe = app('EmployesRepository')->updateService($request, $employeId);
        }
      }

      return $poste;
    }





    /**
     * Affiche la page de mise à jour des employés occupant un poste
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function editEmploye(Request $request, $id)
    {
      $poste = app('PostesRepository')->findById($id);

      if (!$poste) {
        return redirect()->route('societe_index');
      }

      $societe = Auth::guard('web_societe')->user();
      $employes = $societe->employes;

      if ($request->ajax()) {
        $posteEmployes = $poste->employes->sortBy('nom');
        $employes = $societe->employes->where('service_id', '!=', $poste->id)->sortBy('nom');

        $viewListeEmployes = view('societes.ajax.liste_employes', compact('employes'))->render();
        $viewListeEmployesByPoste = view('societes.ajax.liste_employes_by_poste', compact('posteEmployes'))->render();

        return response()->json(['view_liste_employes' => $viewListeEmployesByPoste, 'view_liste_employes_global' => $viewListeEmployes]);
      }

      return view('societes.postes.edit_employe', compact('poste', 'societe', 'employes'));
    }






    /**
     * Affiche la page de mise à jour des compétences requises pour un poste
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function editSavoirs($id)
    {
      $poste = app('PostesRepository')->findById($id);

      $savoirs = $poste->getSavoirs()->sortBy('nom');

      $savoirsSociete = [];

      return view('societes.postes.edit_savoirs', compact('poste', 'savoirs', 'savoirsSociete'));
    }





    /**
     * Affiche la page de mise à jour des savoir-faire requis pour un poste
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function editSavoirFaire($id)
    {
      $poste = app('PostesRepository')->findById($id);

      $savoirFaire = $poste->getSavoirFaire()->sortBy('nom');

      return view('societes.postes.edit_savoir_faire', compact('poste', 'savoirFaire'));
    }





    /**
     * Affiche la page de mise à jour des savoir-$etre requis pour un poste
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function editSavoirEtre($id)
    {
      $poste = app('PostesRepository')->findById($id);

      $savoirEtre = $poste->getSavoirEtre()->sortBy('nom');

      return view('societes.postes.edit_savoir_etre', compact('poste', 'savoirEtre'));
    }





    /**
     * Renvoie la page pour ajouter les compétences d'un poste
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function editCompetences($id)
    {
        $societe = Auth::guard('web_societe')->user();
        $poste = app('PostesRepository')->findById($id);

        // si l'id n'est pas valide on redirige vers l'accueil
        if (!$poste) {
          return redirect()->route('societe_index');
        }

        $savoirsBase = $poste->getSavoirs('base')->sortBy('nom');
        $savoirsSpe = $poste->getSavoirs('spe')->sortBy('nom');

        $savoirFaireBase = $poste->getSavoirFaire('base')->sortBy('nom');
        $savoirFaireSpe = $poste->getSavoirFaire('spe')->sortBy('nom');

        $savoirEtre = $poste->getSavoirEtre()->sortBy('nom');

        return view('societes.postes.edit_competences', compact('poste', 'savoirsBase', 'savoirsSpe', 'savoirFaireBase', 'savoirFaireSpe', 'savoirEtre'));
    }





    /**
     * Affiche la fiche d'un poste
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function fiche($id)
    {
      $poste = app('PostesRepository')->findById($id);

      if (!$poste) {
        return redirect()->route('societe_index');
      }

      $employes = $poste->employes;

      $savoirsBase = $poste->getSavoirs('base')->sortBy('nom');
      $savoirsSpe = $poste->getSavoirs('spe')->sortBy('nom');

      $savoirFaireBase = $poste->getSavoirFaire('base')->sortBy('nom');
      $savoirFaireSpe = $poste->getSavoirFaire('spe')->sortBy('nom');

      $savoirEtre = $poste->getSavoirEtre()->sortBy('nom');

      $metier = $poste->metier;

      return view('societes.postes.fiche', compact('poste', 'employes', 'savoirsBase', 'savoirsSpe', 'savoirFaireBase', 'savoirFaireSpe', 'savoirEtre', 'metier'));
    }





    /**
     * Affiche la liste de tous les postes d'une société
     *
     * @return \Illuminate\View\View
     */
    public function liste()
    {
      $societe = Auth::guard('web_societe')->user();
      $postes = $societe->postes;

      return view('societes.postes.liste', compact('postes'));
    }





    /**
     * Autocomplétion des postes d'une société
     *
     * @param Request $request
     * @return string
     */
    public function autocomplete(Request $request)
    {
        $query = $request->get('term', '');

        $societeId = Auth::guard('web_societe')->user()->id;
        $postes = app('PostesRepository')->findForAutocomplete($query, $societeId);

        return json_encode($postes); // On retourne le résultat en JSON.
    }





    /**
     * Supprime un poste
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function delete($id)
    {
        $delete = app('PostesRepository')->delete($id);

        return redirect()->route('societe_index');
    }
}
