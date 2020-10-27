@extends('layouts.master') @section('title', ucfirst($poste->nom))

@section('main_title')
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <h4 class="text-uppercase">
          {{ $poste->nom }}
          <a href="{{ route('edit_poste', ['id' => $poste->id]) }}" class="icon-edit-titre"><i class="icon ion-edit"></i></a>
        </h4>
      </div>

    </div>

  </div>

  <hr class="bg-vert trait-titre">
@endsection

@section('content')

<div class="row">

  <div class="col-lg-5">

    <div class="card mb-4 bg-light-vert custom-card card-description">
      <div class="card-body">
        <h4 class="card-title bg-vert">Descriptif du poste</h4>
        @if ($poste->description)
          <p class="card-text">
            {{ $poste->description }}
          </p>
        @endif

      </div>
    </div>

    @if ($metier)
      <div class="card mb-4 bg-light-vert custom-card card-description">
        <div class="card-body">
          <h4 class="card-title bg-vert">Descriptif du métier</h4>
          <p class="card-text">
            {{ $metier->description }}
            <br> <br>
            <a href="{{ route('fiche_metier', ['id' => $metier->id]) }}" class="link-underlined">Voir la fiche complète</a>
          </p>

        </div>
      </div>
    @endif

  </div>

  <div class="col-lg-7">

    <div class="card mb-4 bg-light-violet custom-card">
      <div class="card-body">
        <h4 class="card-title bg-violet">{{ $metier->secteur->nom }}</h4>
        <p class="card-text">
          {{ $metier->secteur->description }}
        </p>
      </div>
    </div>

    @if ($poste->service)
    <div class="card mb-4 bg-light-violet custom-card">
      <div class="card-body">
        <h4 class="card-title bg-violet">Service</h4>

        <table class="table table-bordered table-recherche text-center table-etablissement">
          <tbody>
            <tr class="liste-recherche liste-violet">
              <td><a href="{{ route('fiche_service', ['id' => $poste->service->id]) }}">{{ mb_strtoupper($poste->service->nom) }}</td></a>
              <td class="table-icon">
                <a href="{{ route('edit_service', ['id' => $poste->service->id]) }}"> <i class="icon ion-edit"></i> </a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    @endif

    @if (count($employes) > 0)
    <div class="card mb-4 bg-light-jaune custom-card">
      <div class="card-body">
        <h4 class="card-title bg-jaune">Employés</h4>

        <table class="table table-bordered table-recherche text-center table-employes">
          <tbody>
          @foreach ($employes as $employe)
            <tr class="liste-recherche liste-jaune">
              <td><a href="{{ route('fiche_employe', ['id' => $employe->id]) }}">{{ ucfirst($employe->prenom) }} {{ mb_strtoupper($employe->nom) }}</td></a>
              <td class="table-icon">
                <a href="{{ route('edit_employe', ['id' => $employe->id]) }}"> <i class="icon ion-edit"></i> </a>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
    @endif

  </div>

</div>

{{-- COMPETENCES --}}

<div class="row">

  <div class="col-lg-8 box-titres">
    <h4 class="text-uppercase">Compétences requises</h4>
  </div>

  <div class="col-lg-4 box-titres">
    <a href="{{ route('edit_competences_poste', ['id' => $poste->id]) }}">Modifier les competences</a>
  </div>

</div>

<hr class="bg-rose trait-titre mb-4">

<div class="row">
  <div class="col-lg-12">

    <div class="card mb-4 bg-light-rose custom-card card-competences">
      <div class="card-body">

        <table class="table table-bordered table-recherche text-center table-competences-employe">

          <tbody>
            <tr class="liste-titre liste-rose-titre">
              <td>Savoirs</td>
              <td class="table-icon"><a href="{{ route('edit_savoirs_poste', ['id' => $poste->id]) }}" title="Éditer les savoirs de ce poste"><i class="icon ion-edit"></i></a></td>
            </tr>

            @foreach ($savoirsBase as $savoir)

              @if ($savoir->pivot->valide == 'oui')
                @if ($loop->first)
                  <tr>
                    <th colspan="2">SAVOIRS DE BASE</th>
                  </tr>
                @endif
                <tr class="liste-recherche liste-competence">
                  <td class="table-border-left" style="vertical-align:top" colspan="2"><a href="{{ route('fiche_competence', ['id' => $savoir->id]) }}">{{ $savoir->nom }}</a></td>
                </tr>
              @endif

            @endforeach

            @foreach ($savoirsSpe as $savoir)

              @if ($savoir->pivot->valide == 'oui')
                @if ($loop->first)
                  <tr>
                    <th colspan="2">SAVOIRS SPÉCIFIQUES</th>
                  </tr>
                @endif
                <tr class="liste-recherche liste-competence">
                  <td class="table-border-right" style="vertical-align:top" colspan="2"><a href="{{ route('fiche_competence', ['id' => $savoir->id]) }}">{{ $savoir->nom }}</a></td>
                </tr>
              @endif

            @endforeach
          </tbody>

        </table>

      </div>
    </div>

  </div>
</div>


{{-- SAVOIR-FAIRE --}}
<div class="row">
  <div class="col-lg-12">

    <div class="card mb-4 bg-light-rose custom-card card-competences">
      <div class="card-body">

        <table class="table table-bordered table-recherche text-center table-competences-employe">

          <tbody>
            <tr class="liste-titre liste-rose-titre">
              <td>Savoir-faire</td>
              <td class="table-icon"><a href="{{ route('edit_savoir_faire_poste', ['id' => $poste->id]) }}" title="Éditer les savoir-faire de ce poste"><i class="icon ion-edit"></i></a></td>
            </tr>

            @foreach ($savoirFaireBase as $savoir)

              @if ($savoir->pivot->valide == 'oui')
                @if ($loop->first)
                  <tr>
                    <th colspan="2">SAVOIR-FAIRE DE BASE</th>
                  </tr>
                @endif

                <tr class="liste-recherche liste-competence">
                  <td class="table-border-left" style="vertical-align:top" colspan="2"><a href="{{ route('fiche_competence', ['id' => $savoir->id]) }}">{{ $savoir->nom }}</a></td>
                </tr>
              @endif

            @endforeach

            @foreach ($savoirFaireSpe as $savoir)

              @if ($savoir->pivot->valide == 'oui')
                @if ($loop->first)
                  <tr>
                    <th colspan="2">SAVOIR-FAIRE SPÉCIFIQUES</th>
                  </tr>
                @endif

                <tr class="liste-recherche liste-competence">
                  <td class="table-border-left" style="vertical-align:top" colspan="2"><a href="{{ route('fiche_competence', ['id' => $savoir->id]) }}">{{ $savoir->nom }}</a></td>
                </tr>
              @endif

            @endforeach
          </tbody>

        </table>
      </div>
    </div>

  </div>
</div>


{{-- SAVOIR-ETRE --}}
<div class="row">
  <div class="col-lg-12">

    <div class="card mb-4 bg-light-rose custom-card card-competences">
      <div class="card-body">

        <table class="table table-bordered table-recherche text-center table-competences-employe">

          <tbody>
            <tr class="liste-titre liste-rose-titre">
              <td>Savoir-être</td>
              <td class="table-icon"><a href="{{ route('edit_savoir_etre_poste', ['id' => $poste->id]) }}" title="Éditer les savoir-être de ce poste"><i class="icon ion-edit"></i></a></td>
            </tr>

            @foreach ($savoirEtre as $savoir)
              @if ($savoir->pivot->valide == 'oui')
                <tr class="liste-recherche liste-competence">
                  <td class="table-border-left" style="vertical-align:top" colspan="2"><a href="{{ route('fiche_competence', ['id' => $savoir->id]) }}">{{ $savoir->nom }}</a></td>
                </tr>
              @endif
            @endforeach
          </tbody>

        </table>

      </div>
    </div>

  </div>
</div>

@endsection
