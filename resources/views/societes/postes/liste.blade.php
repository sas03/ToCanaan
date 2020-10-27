@extends('layouts.master') @section('title', 'Listes des postes')

@section('main_title')
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <h4 class="text-uppercase">Liste des postes ({{ count($postes) }})</h4>
      </div>

    </div>

  </div>

  <hr class="bg-vert trait-titre">
@endsection

@section('content')

<div class="row">

  <div class="col-lg-12">

    <div class="card mb-4 bg-light-vert custom-card">
      <div class="card-body">

        @if ($postes)
          <table class="table table-bordered table-recherche text-center table-metiers">
            <tbody>
              @foreach ($postes as $poste)
                <tr  class="liste-recherche liste-vert">
                  <td><a href="{{ route('fiche_poste', ['id' => $poste->id])  }}"> {{ ucfirst($poste->nom) }} </a></td>
                  @if ($poste->service)
                    <td><a href="{{ route('fiche_service', ['id' => $poste->service_id]) }}"> {{ $poste->service->nom }}</a></td>
                  @else
                    <td>Pas de service</td>
                  @endif

                  @if (count($poste->employes) == 1)
                    <td>1 employé occupe ce poste</td>
                  @elseif(count($poste->employes) > 1)
                    <td>{{ count($poste->employes) }} employés occupent ce poste</td>
                  @else
                    <td>Poste à pourvoir</td>
                  @endif

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

        <a href="{{ route('add_poste') }}" class="btn-form">+ AJOUTER UN POSTE +</a>

      </div>
    </div>

  </div>

</div>

@endsection
