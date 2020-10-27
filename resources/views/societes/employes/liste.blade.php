@extends('layouts.master') @section('title', 'Listes des employés')

@section('main_title')
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <h4 class="text-uppercase">Liste des employés</h4>
      </div>

    </div>

  </div>

  <hr class="bg-jaune trait-titre">
@endsection

@section('content')

<div class="row">

  <div class="col-lg-12">

    <div class="card mb-4 bg-light-jaune custom-card">
      <div class="card-body">

        @if ($employes)
          <table class="table table-bordered table-recherche text-center table-employes">
            <tbody>
              @foreach ($employes as $employe)
                <tr  class="liste-recherche liste-jaune">
                  <td><a href="{{ route('fiche_employe', ['id' => $employe->id])  }}">{{ $employe->prenom }} {{ mb_strtoupper($employe->nom) }} </a></td>
                  @if ($employe->service)
                    <td><a href="{{ route('fiche_service', ['id' => $employe->service_id]) }}"> {{ $employe->service->nom }}</a></td>
                  @else
                    <td>Pas de service</td>
                  @endif

                  @if ($employe->poste)
                    <td>Occupe le poste <strong><a href="{{ route('fiche_poste', ['id' => $employe->poste_id]) }}">{{ $employe->poste->nom }}</strong></a></td>
                  @else
                    <td>N'occupe aucun poste</td>
                  @endif

                  <td class="table-icon">
                    <a href="{{ route('edit_employe', ['id' => $employe->id]) }}"> <i class="icon ion-edit"></i> </a>
                  </td>
                  <td class="delete-employe table-icon" url-action="{{ route('delete_employe', ['id' => $employe->id]) }}">
                    <a href="{{ route('delete_employe', ['id' => $employe->id]) }}"> <i class="icon ion-close-round"></i> </a>
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

        <a href="{{ route('add_employe') }}" class="btn-form">+ AJOUTER UN EMPLOYÉ +</a>

      </div>
    </div>

  </div>

</div>

@endsection
