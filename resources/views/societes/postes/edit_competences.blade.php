@extends('layouts.master') @section('title', 'Compétences pour ' . $poste->nom)

@section('main_title')
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <h4 class="text-uppercase">Compétences requises pour <strong>{{ $poste->nom }}</strong></h4>
      </div>

    </div>

  </div>

  <hr class="bg-rose trait-titre">
@endsection

@section('main_sous_menu')
  <div class="container">
    <div class="row row-sous-menu-fiche">
      <div class="col-lg-12">
        <ul>
          <li><a href="#poste-competences-savoirs"class="sous-menu-link text-uppercase">Savoirs</a></li>
          <li><a href="#poste-competences-savoir-faire"class="sous-menu-link text-uppercase">Savoir-faire</a></li>
          <li><a href="#poste-competences-savoir-etre"class="sous-menu-link text-uppercase">Savoir-être</a></li>
          <li><a href="{{ route('fiche_poste', ['id' => $poste->id]) }}" title="Revenir à la fiche du poste"><i class="icon ion-ios-home"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
@endsection

@section('content')

  {{-- SAVOIRS --}}
  <div class="row" id="poste-competences-savoirs">
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
                  <tr class="liste-recherche liste-competence">
                    <td class="table-border-left" style="vertical-align:top" colspan="2"><a href="{{ route('fiche_competence', ['id' => $savoir->id]) }}" title="Voir la fiche de ce savoir">{{ $savoir->nom }}</a></td>
                  </tr>
                @endif

              @endforeach

              @foreach ($savoirsSpe as $savoir)

                @if ($savoir->pivot->valide == 'oui')
                  <tr class="liste-recherche liste-competence">
                    <td class="table-border-right" style="vertical-align:top" colspan="2"><a href="{{ route('fiche_competence', ['id' => $savoir->id]) }}" title="Voir la fiche de ce savoir">{{ $savoir->nom }}</a></td>
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
  <div class="row" id="poste-competences-savoir-faire">
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

                  <tr class="liste-recherche liste-competence">
                    <td class="table-border-left" style="vertical-align:top" colspan="2"><a href="{{ route('fiche_competence', ['id' => $savoir->id]) }}" title="Voir la fiche de ce savoir-faire">{{ $savoir->nom }}</a></td>
                  </tr>
                @endif

              @endforeach

              @foreach ($savoirFaireSpe as $savoir)

                @if ($savoir->pivot->valide == 'oui')

                  <tr class="liste-recherche liste-competence">
                    <td class="table-border-left" style="vertical-align:top" colspan="2"><a href="{{ route('fiche_competence', ['id' => $savoir->id]) }}" title="Voir la fiche de ce savoir-faire">{{ $savoir->nom }}</a></td>
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
  <div class="row" id="poste-competences-savoir-etre">
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
                    <td class="table-border-left" style="vertical-align:top" colspan="2"><a href="{{ route('fiche_competence', ['id' => $savoir->id]) }}" title="Voir la fiche de ce savoir-être">{{ $savoir->nom }}</a></td>
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
