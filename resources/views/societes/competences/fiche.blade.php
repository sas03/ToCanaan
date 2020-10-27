@extends('layouts.master') @section('title', $competence->nom)

@section('main_title')
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <h4 class="text-uppercase">
          {{ $competence->nom }} -
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
        </h4>
      </div>

    </div>

  </div>

  <hr class="bg-rose trait-titre">
@endsection

@section('content')

<div class="row">

  <div class="col-lg-12">

    <div class="card mb-4 bg-light-vert custom-card">
      <div class="card-body">
        <h4 class="card-title bg-vert">Postes</h4>

        @if ($postes)
          <table class="table table-bordered table-recherche text-center table-metiers">
            <tbody>
              @foreach ($postes as $poste)
                <tr  class="liste-recherche liste-vert">
                  <td><a href="{{ route('fiche_poste', ['id' => $poste->id])  }}"> {{ ucfirst($poste->nom) }} </a></td>
                  <td class="table-icon">
                    <a href="{{ route('fiche_poste', ['id' => $poste->id]) }}"> <i class="icon ion-clipboard"></i> </a>
                  </td>
                </tr>
              @endforeach
            </tbody>

          </table>
        @else
          <p class="card-text">
            Vous n'avez enregistré aucuns postes.
          </p>
        @endif

      </div>
    </div>

  </div>

</div>



<div class="row">

  <div class="col-lg-12">

    <div class="card mb-4 bg-light-jaune custom-card">
      <div class="card-body">
        <h4 class="card-title bg-jaune">Employés</h4>

        @if ($employes)
          <table class="table table-bordered table-recherche text-center table-employes">
            <tbody>
              @foreach ($employes as $employe)
                <tr class="liste-recherche liste-jaune">
                  <td><a href="{{ route('fiche_employe', ['id' => $employe->id]) }}">{{ $employe->prenom }} {{ mb_strtoupper($employe->nom) }}</a></td>
                  <td class="table-icon">
                    <a href="{{ route('fiche_employe', ['id' => $employe->id]) }}"> <i class="icon ion-clipboard"></i> </a>
                  </td>
                </tr>
              @endforeach
            </tbody>

          </table>
        @else
          <p class="card-text">
            Vous n'avez enregistré aucuns employés.
          </p>
        @endif

      </div>
    </div>

  </div>

</div>

@endsection
