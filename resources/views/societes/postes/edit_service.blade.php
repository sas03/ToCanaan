@extends('layouts.master') @section('title', 'Modifier le poste ' . $poste->nom)

@section('main_title')
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <h4 class="text-uppercase">Modifier le poste {{ $poste->nom }}</h4>
      </div>

    </div>

  </div>

  <hr class="bg-vert trait-titre">
@endsection

@section('content')

  <div class="row justify-content-between">
    <div class="col-md-4">
      <a class="btn btn-default" href="{{ route('add_poste') }}" role="button">Ajouter un autre poste</a>
      <a class="btn btn-default" href="{{ route('edit_service_poste', ['id' => $poste->id]) }}" role="button">Ajouter ce poste à un service</a>
      <a class="btn btn-default" href="{{ route('edit_employe_poste', ['id' => $poste->id]) }}" role="button">Attribuer ce poste à un employé</a>
      <a class="btn btn-default" href="{{ route('edit_competences_poste', ['id' => $poste->id]) }}" role="button">Définir les compétences</a>
      <a class="btn btn-default" href="{{ route('fiche_poste', ['id' => $poste->id]) }}" role="button">Voir la fiche de ce poste</a>
      <a class="btn btn-default" href="{{ route('societe_index') }}" role="button">Retourner au dashboard de l'entreprise</a>
    </div>

    <div class="col-md-7 box-form box-form-societe">

      <h5>SERVICE</h5>
      <hr class="bg-violet trait-sous-titre">
      <i class="icon ion-arrow-down-b text-violet"></i>

      @if ($poste->service)
        <p>Ce poste fait parti du service <strong><a href="{{ route('add_service') }}" class="text-violet">{{ $poste->service->nom }}</a></strong>. </p>
        <p>Changer de service :</p>
      @endif

      <p>Nouveau service : <a href="{{ route('add_service') }}" class="text-violet">Créer un service</a></p>

      <p>Service existant :</p>

      <form class="form-horizontal">
          {{ csrf_field() }}

          <input type="hidden" class="form-control" name="poste_id" value="{{ $poste->id }}" required>

          <div class="row row-add-item-service">
            <div class="form-group col-lg-11">
              <select class="form-control list-services" name="service">
                @if (count($services) > 0)
                  <option value="" poste="">Veuillez choisir un service</option>
                  @foreach ($services as $service)
                    @if ($service->id != $poste->service_id)
                      <option value="{{ $service->id }}" poste="{{ $poste->service_id }}">{{ ucfirst($service->nom) }}</option>
                    @endif
                  @endforeach
                @else
                  <option value="" poste="">Il n'y a aucun service disponible.</option>
                @endif
              </select>
            </div>
            <div class="col-lg-1">
              <button type="button" class="btn-add" id="btn-add-service-poste"><i class="icon ion-plus-round"></i></button>
            </div>
          </div>

          <span class="span-message"> <em></em> </span>
      </form>

  </div>
</div>


@endsection
