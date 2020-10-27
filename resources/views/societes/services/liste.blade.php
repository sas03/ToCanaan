@extends('layouts.master') @section('title', 'Listes des services')

@section('main_title')
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <h4 class="text-uppercase">Liste des services ({{ count($services) }})</h4>
      </div>

    </div>

  </div>

  <hr class="bg-violet trait-titre">
@endsection

@section('content')

<div class="row">

  <div class="col-lg-12">

    <div class="card mb-4 bg-light-violet custom-card">
      <div class="card-body">

        @if ($services)
          <table class="table table-bordered table-recherche text-center">
            <tbody>
              @foreach ($services as $service)
                <tr  class="liste-recherche liste-violet liste-service">
                  <td><a href="{{ route('fiche_service', ['id' => $service->id])  }}"> {{ ucfirst($service->nom) }} </a></td>
                  <td class="table-icon">
                    <a href="{{ route('edit_service', ['id' => $service->id]) }}"> <i class="icon ion-edit"></i> </a>
                  </td>
                  <td class="delete-poste table-icon" url-action="{{ route('delete_service', ['id' => $service->id]) }}">
                    <a href="{{ route('delete_service', ['id' => $service->id]) }}"> <i class="icon ion-close-round"></i> </a>
                  </td>
                </tr>
              @endforeach
            </tbody>

          </table>
        @else
          <p class="card-text">
            Vous n'avez enregistré aucuns services.
          </p>
        @endif

        <a href="{{ route('add_service') }}" class="btn-form">+ AJOUTER UN SERVICE +</a>

      </div>
    </div>

  </div>

</div>

@endsection
