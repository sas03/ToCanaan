@extends('layouts.master') @section('title', 'Service ' . mb_strtoupper($service->nom ))

@section('main_title')
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <h4 class="text-uppercase">
          Service <strong>{{ $service->nom }}</strong>
          <a href="{{ route('edit_service', ['id' => $service->id]) }}" class="icon-edit-titre"><i class="icon ion-edit"></i></a>
        </h4>
      </div>

    </div>

  </div>

  <hr class="bg-violet trait-titre">
@endsection

@section('content')
<div class="row">

  <div class="col-lg-12">

    <div class="card mb-4 bg-light-vert custom-card">
      <div class="card-body">
        <h4 class="card-title bg-vert">Postes ({{ count($postes) }})</h4>

        @if ($postes)
          <table class="table table-bordered table-recherche text-center table-metiers">
            <tbody>
              @foreach ($postes as $poste)
                <tr  class="liste-recherche liste-vert">
                  <td><a href="{{ route('fiche_poste', ['id' => $poste->id])  }}"> {{ ucfirst($poste->nom) }} </a></td>
                  <td>
                    @if (count($poste->employes) == 0)
                      Poste à pourvoir
                    @elseif (count($poste->employes) == 1)
                      1 employé occupe ce poste
                    @else
                      {{ $poste->employes }} employés occupent ce poste
                    @endif
                  </td>
                  <td class="table-icon">
                    <a href="{{ route('edit_poste', ['id' => $poste->id]) }}"> <i class="icon ion-edit"></i> </a>
                  </td>
                  <td class="delete-poste table-icon" url-action="{{ route('delete_poste', ['id' => $poste->id]) }}">
                    <a href="{{ route('delete_poste', ['id' => $poste->id]) }}"> <i class="icon ion-close-round"></i> </a>
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

        <a href="{{ route('edit_poste_service', ['id' => $service->id]) }}" class="btn-form">+ AJOUTER UN POSTE +</a>

      </div>
    </div>

  </div>

</div>



<div class="row">

  <div class="col-lg-12">

    <div class="card mb-4 bg-light-jaune custom-card">
      <div class="card-body">
        <h4 class="card-title bg-jaune">Employés ({{ count($employes) }})</h4>

        @if ($employes)
          <table class="table table-bordered table-recherche text-center table-employes">
            <tbody>
              @foreach ($employes as $employe)
                <tr class="liste-recherche liste-jaune">
                  <td><a href="{{ route('fiche_employe', ['id' => $employe->id]) }}">{{ $employe->prenom }} {{ mb_strtoupper($employe->nom) }}</a></td>
                  <td class="table-icon">
                    <a href="{{ route('fiche_employe', ['id' => $employe->id]) }}"> <i class="icon ion-clipboard"></i> </a>
                  </td>
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

        <a href="{{ route('edit_employe_service', ['id' => $service->id]) }}" class="btn-form">+ AJOUTER UN EMPLOYÉ +</a>

      </div>
    </div>

  </div>

</div>

@endsection
