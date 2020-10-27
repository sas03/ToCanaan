@extends('layouts.master') @section('title', 'Modifier le service ' . $service->nom)

@section('main_title')
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <h4 class="text-uppercase">Modification du service <strong>{{ $service->nom }}</strong> </h4>
      </div>

    </div>

  </div>

  <hr class="bg-violet trait-titre">
@endsection

@section('content')

  <div class="row justify-content-between">
    <div class="col-md-4">
      <a class="btn btn-default" href="{{ route('add_service') }}" role="button">Ajouter un autre service</a>
      <a class="btn btn-default" href="{{ route('edit_service', ['id' => $service->id]) }}" role="button">Modifier ce service</a>
      <a class="btn btn-default" href="{{ route('edit_poste_service', ['id' => $service->id]) }}" role="button">Ajouter un poste à ce service</a>
      <a class="btn btn-default" href="{{ route('edit_employe_service', ['id' => $service->id]) }}" role="button">Ajouter un employé à ce service</a>
      <a class="btn btn-default" href="{{ route('fiche_service', ['id' => $service->id]) }}" role="button">Voir la fiche de ce service</a>

      <a class="btn btn-default" href="{{ route('liste_services') }}" role="button">Voir la liste de tous les services</a>
      <a class="btn btn-default" href="{{ route('societe_index') }}" role="button">Retourner au dashboard de l'entreprise</a>
    </div>

    <div class="col-md-7 box-form box-form-societe">

      <h5>MODIFICATION DU SERVICE</h5>
      <hr class="bg-jaune trait-sous-titre">
      <i class="icon ion-arrow-down-b text-jaune"></i>

      {{-- DIV pour afficher les erreurs --}}
      <div class="form-errors"> <ul></ul></div>

      <form class="form-horizontal" id='form-add-service' url-action="{{ route('edit_service', ['id' => $service->id]) }}">
          {{ csrf_field() }}

          <input type="hidden" class="form-control" name="societe_id" value="{{ Auth::guard('web_societe')->user()->id }}" required>

          <div class="form-group">
            <label for="nom" class="control-label">Nom du service *</label>
            <input type="text" class="form-control" name="nom" value="{{ $service->nom }}" required autofocus>
          </div>
      </form>

      <a href="" class="btn-form bg-jaune" id="add-service">ENREGISTRER LES MODIFICATIONS</a>

  </div>
</div>


@endsection

@section('javascript')
  <script type="text/javascript">

    $(function () {

      $('#add-service').click(function(e){
        e.preventDefault();

        // si le service n'a pas encore été sauvegardé
        if (!$(this).hasClass('saved')) {
          $('.form-errors ul').html('');

          let url = $('#form-add-service').attr('url-action');
          let data = $('#form-add-service').serialize();
          addService(url, data);
        }
      });

    });

</script>
@endsection
