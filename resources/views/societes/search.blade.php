@extends('layouts.master') @section('title', 'Société')

@section('main_title')
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <h4 class="text-uppercase">recherche</h4>
      </div>

    </div>

  </div>

  <hr class="bg-jaune trait-titre">
@endsection

@section('content')

  <div class="row mb-4">

  	<div class="col-lg-12 box-form-search box-form-search-societe">
  		<form action="{{ route('societe_search') }}" method="get" class="form-inline">

        <select class="form-control col-lg-2 col-md-12 col-sm-12 liste-categories" name="categorie">
          <option value="" class="first-option">Choisir une catégorie</option>
          <option value="service">Service</option>
          <option value="poste">Poste</option>
          <option value="employe">Employé</option>
          <option value="competence_disponible">Compétence disponible</option>
          <option value="competence_requise">Compétence requise</option>
        </select>

  			<input type="text" data-provide="typeahead" class="form-control typeahead col-lg-8 col-md-12 col-sm-12 autocomplete-categories-societe"
  			 name="q" autocomplete="off" value="">

  			<button type="submit" class="btn bg-violet col-lg-2 col-md-12">Rechercher</button>
  		</form>
  	</div>

  </div>

  @if ($competences_requises)
    <div class="row">

      <div class="col-lg-12 box-titres">
        <h4 class="text-uppercase">
          @if (count($competences_requises) == 1)
            1 compétence trouvée
          @else
            {{ count($competences_requises) }} compétences trouvées
          @endif
        </h4>
      </div>

    </div>

    <hr class="bg-rose trait-titre mb-4">

    <div class="row">
      <div class="col-lg-12">
        <table class="table table-bordered table-recherche text-center">
          <tbody>

            @foreach($competences_requises as $competence)
              <tr class="liste-titre liste-rose-titre">
                <td colspan="2">
                  <a href="{{ route('fiche_competence', ['id' => $competence->id]) }}">{{ $competence->nom }}</a> -
                  <em>
                    @if ($competence->pivot->competence_type == "App\Savoir" || $competence->pivot->competence_type == "App\SavoirAdded")
                      SAVOIR
                    @elseif ($competence->pivot->competence_type == "App\SavoirFaire" || $competence->pivot->competence_type == "App\SavoirFaireAdded")
                      SAVOIR-FAIRE
                    @elseif ($competence->pivot->competence_type == "App\SavoirEtre" || $competence->pivot->competence_type == "App\SavoirEtreAdded")
                      SAVOIR-ETRE
                    @else
                    @endif
                  </em>
                </td>
              </tr>

                @if (count($competence->postes) > 0)

                  @foreach ($competence->postes as $poste)
                    @if ($poste->pivot->valide == 'oui')
                      <tr class="liste-recherche liste-formation">
                        <td><a href="{{ route('fiche_poste', ['id' => $poste->id]) }}">{{ mb_strtoupper($poste->nom) }}</a></td>
                        <td class="align-middle"><a href="{{ route('fiche_poste', ['id' => $poste->id]) }}"><i class="icon ion-clipboard"></i></a></td>
                      </tr>
                    @endif
                  @endforeach

                @else
                  <tr class="liste-recherche liste-formation">
                    <td colspan="2">Compétence disponible dans aucuns postes.</td>
                  </tr>
                @endif

                @if (count($competence->employes) > 0)
                  <tr>
                    <th colspan="2">COMPETENCE ACQUISE PAR</th>
                  </tr>
                  @foreach ($competence->employes as $employe)
                  <tr class="liste-recherche liste-formation">
                    <td>{{ $employe->prenom }} {{ mb_strtoupper($employe->nom) }} - Niveau {{ $employe->pivot->niveau }}</td>
                    <td class="align-middle"><a href="{{ route('fiche_employe', ['id' => $employe->id]) }}"><i class="icon ion-clipboard"></i></a></td>
                  </tr>
                  @endforeach
                @endif

              <tr class="liste-spacer"> </tr>
            @endforeach

          </tbody>
        </table>
      </div>
    </div>
  @endif

  @if ($competences_disponibles)
    <div class="row">

      <div class="col-lg-12 box-titres">
        <h4 class="text-uppercase">
          @if (count($competences_disponibles) == 1)
            1 compétence trouvée
          @else
            {{ count($competences_disponibles) }} compétences trouvées
          @endif
        </h4>
      </div>

    </div>

    <hr class="bg-rose trait-titre mb-4">

    <div class="row">
      <div class="col-lg-12">
        <table class="table table-bordered table-recherche text-center">
          <tbody>

            @foreach($competences_disponibles as $competence)
              <tr class="liste-titre liste-rose-titre">
                <td colspan="2">
                  <a href="{{ route('fiche_competence', ['id' => $competence->id]) }}">{{ $competence->nom }}</a> -
                  <em>
                    @if ($competence->pivot->competence_type == "App\Savoir" || $competence->pivot->competence_type == "App\SavoirAdded")
                      SAVOIR
                    @elseif ($competence->pivot->competence_type == "App\SavoirFaire" || $competence->pivot->competence_type == "App\SavoirFaireAdded")
                      SAVOIR-FAIRE
                    @elseif ($competence->pivot->competence_type == "App\SavoirEtre" || $competence->pivot->competence_type == "App\SavoirEtreAdded")
                      SAVOIR-ETRE
                    @else
                    @endif
                  </em>
                </td>
              </tr>

                @if (count($competence->employes) > 0)

                  @foreach ($competence->employes as $employe)
                    <tr class="liste-recherche liste-formation">
                      <td>{{ $employe->prenom }} {{ mb_strtoupper($employe->nom) }} - Niveau {{ $employe->pivot->niveau }}</td>
                      <td class="align-middle"><a href="{{ route('fiche_employe', ['id' => $employe->id]) }}"><i class="icon ion-clipboard"></i></a></td>
                    </tr>
                  @endforeach

                @else
                  <tr class="liste-recherche liste-formation">
                    <td colspan="2">Compétence acquise par aucuns employés.</td>
                  </tr>
                @endif

              <tr class="liste-spacer"> </tr>
            @endforeach

          </tbody>
        </table>
      </div>
    </div>
  @endif


  @if ($services)
    <div class="row">

      <div class="col-lg-12 box-titres">
        <h4 class="text-uppercase">
          @if (count($services) == 1)
            1 service trouvé
          @else
            {{ count($services) }} services trouvés
          @endif
        </h4>
      </div>

    </div>

    <hr class="bg-violet trait-titre mb-4">

    <div class="row">
      <div class="col-lg-12">
        <table class="table table-bordered table-recherche text-center">
          <tbody>

            @foreach($services as $service)
              <tr class="liste-titre liste-violet-titre">
                <td colspan="2">{{ $service->nom }}</td>
              </tr>

              <tr>
                <th colspan="2">POSTES</th>
              </tr>
              @if (count($service->postes) > 0)
                @foreach ($service->postes as $poste)
                <tr class="liste-recherche liste-violet">
                  <td>{{ mb_strtoupper($poste->nom) }}</td>
                  <td class="align-middle"><a href="{{ route('fiche_poste', ['id' => $poste->id]) }}"><i class="icon ion-clipboard"></i></a></td>
                </tr>
                @endforeach
              @else
                <tr class="liste-recherche liste-violet">
                  <td>Il n'y a aucuns postes dans ce service.</td>
                  <td class="align-middle"><a href="{{ route('edit_poste_service', ['id' => $service->id]) }}"><i class="icon ion-plus-round"></i></a></td>
                </tr>
              @endif

              <tr>
                <th colspan="2">EMPLOYÉS</th>
              </tr>
              @if (count($service->employes) > 0)
                @foreach ($service->employes as $employe)
                <tr class="liste-recherche liste-violet">
                  <td>{{ $employe->prenom }} {{ mb_strtoupper($employe->nom) }}</td>
                  <td class="align-middle"><a href="{{ route('fiche_employe', ['id' => $employe->id]) }}"><i class="icon ion-clipboard"></i></a></td>
                </tr>
                @endforeach
              @else
                <tr class="liste-recherche liste-violet">
                  <td>Il n'y a aucuns employés dans ce service.</td>
                  <td class="align-middle"><a href="{{ route('edit_employe_service', ['id' => $service->id]) }}"><i class="icon ion-plus-round"></i></a></td>
                </tr>
              @endif

              <tr class="liste-spacer"> </tr>
            @endforeach

          </tbody>
        </table>
      </div>
    </div>

  @endif

  @if ($postes)
    <div class="row">

      <div class="col-lg-12 box-titres">
        <h4 class="text-uppercase">
          @if (count($postes) == 1)
            1 poste trouvé
          @else
            {{ count($postes) }} postes trouvés
          @endif
        </h4>
      </div>

    </div>

    <hr class="bg-vert trait-titre mb-4">

    <div class="row">
      <div class="col-lg-12">
        <table class="table table-bordered table-recherche text-center">
          <tbody>

            @foreach($postes as $poste)
              <tr class="liste-titre liste-vert-titre">
                <td colspan="2">{{ $poste->nom }}</td>
              </tr>

                @if (count($poste->employes) > 0)
                  @foreach ($poste->employes as $employe)
                  <tr class="liste-recherche liste-vert">
                    <td>{{ $employe->prenom }} {{ mb_strtoupper($employe->nom) }}</td>
                    <td class="align-middle"><a href="{{ route('fiche_employe', ['id' => $employe->id]) }}"><i class="icon ion-clipboard"></i></a></td>
                  </tr>
                  @endforeach
                @else
                  <tr class="liste-recherche liste-vert">
                    <td colspan="2">Poste occupé par aucuns employés.</td>
                  </tr>
                @endif

              <tr class="liste-spacer"> </tr>
            @endforeach

          </tbody>
        </table>
      </div>
    </div>

  @endif

  @if ($employes)
    <div class="row">

      <div class="col-lg-12 box-titres">
        <h4 class="text-uppercase">
          @if (count($employes) == 1)
            1 employé trouvé
          @else
            {{ count($employes) }} employés trouvés
          @endif
        </h4>
      </div>

    </div>

    <hr class="bg-jaune trait-titre mb-4">

    <div class="row">
      <div class="col-lg-12">
        <table class="table table-bordered table-recherche text-center">
          <tbody>

            @foreach($employes as $employe)
              <tr class="liste-titre liste-jaune-titre">
                <td>
                  <a href="{{ route('fiche_employe', ['id' => $employe->id]) }}">{{ $employe->prenom }} {{ mb_strtoupper($employe->nom) }}</a>
                </td>
                <td class="align-middle"><a href="{{ route('fiche_employe', ['id' => $employe->id]) }}"><i class="icon ion-clipboard"></i></a></td>
              </tr>

              <tr class="liste-recherche liste-jaune">
                <td>Service : {{ mb_strtoupper($employe->service->nom) }}</em></td>
                <td class="align-middle"><a href="{{ route('fiche_service', ['id' => $employe->service_id]) }}"><i class="icon ion-clipboard"></i></a></td>
              </tr>
              <tr class="liste-recherche liste-jaune">
                <td>Poste : {{ mb_strtoupper($employe->poste->nom) }}</em></td>
                <td class="align-middle"><a href="{{ route('fiche_poste', ['id' => $employe->poste_id]) }}"><i class="icon ion-clipboard"></i></a></td>
              </tr>

              <tr class="liste-spacer"> </tr>
            @endforeach

          </tbody>
        </table>
      </div>
    </div>
  @endif


@endsection

@section('javascript')
<script type="text/javascript">

  $(function () {

    $('body').on('change', '.liste-categories', function(){

      let categorie_selected = $('.liste-categories option:selected').val();
      let url = "";

      // en fonction du choix de la catégorie, on change l'url pour l'autocomplétion
      if (categorie_selected == 'service') {
        url = "{{ route('autocomplete_services') }}";
      }
      else if (categorie_selected == 'poste') {
        url = "{{ route('autocomplete_postes') }}";
      }
      else if (categorie_selected == 'employe') {
        url = "{{ route('autocomplete_employes') }}";
      }
      else if (categorie_selected == 'competence_disponible') {
        url = "{{ route('autocomplete_competences_disponibles') }}";
      }
      else if (categorie_selected == 'competence_requise') {
        url = "{{ route('autocomplete_competences_requises') }}";
      }
      else {
        url = "";
      }

      // si l'url n'est pas vide
      if (url != "") {

        //Autocomplétion
        autocompleteSociete($('.autocomplete-categories-societe'), url);

      }

    });

  });

</script>
@endsection
