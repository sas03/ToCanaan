@extends('layouts.master') @section('title', 'Ajouter un service')

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

    <h5>AJOUT DE POSTES</h5>
    <hr class="bg-vert trait-sous-titre">
    <i class="icon ion-arrow-down-b text-vert"></i>

    <p>Nouveau poste : <a href="{{ route('add_poste') }}" class="text-vert">Créer un poste</a></p>

    <p>Poste existant :</p>
    <form class="form-horizontal">
        {{ csrf_field() }}

        <input type="hidden" class="form-control" name="service_id" value="{{ $service->id }}" required>

        <div class="row row-add-item-service">
          <div class="form-group col-lg-11">
            <select class="form-control list-postes" name="poste">

            </select>
          </div>
          <div class="col-lg-1">
            <button type="button" class="btn-add" id="btn-add-poste-service"><i class="icon ion-plus-round"></i></button>
          </div>
        </div>

        <span class="span-message"> <em></em> </span>
    </form>

    <div class="box-list-item-services box-list-postes-services">
      <span class="ajax-load text-center" style="display:none"><img src="http://demo.itsolutionstuff.com/plugin/loader.gif" style="display:inline; width:20px"></span>
    </div>
  </div>
</div>


@endsection

@section('javascript')
  <script type="text/javascript">

    $(function () {

      let token = "{{ csrf_token() }}";

      loadPostesInService();

      $('body').on('change', '.list-postes', function(){
        let service_selected = $('.list-postes option:selected').attr('service');

        if (service_selected != '') {
          $('.span-message em').text('Attention ce poste est déjà lié à un service !');
        }
        else {
          $('.span-message em').text('');
        }
      });


      $('body').on('click', '#btn-add-poste-service', function(){
        let url = "{{ route('update_poste_service') }}";
        let service = "{{ $service->id }}";
        let poste = $(this).parent().prev().children().val();

        updateServiceOfPoste(url, token, service, poste);
      });

      $('body').on('click', '#btn-delete-poste-service', function(){
        let url = "{{ route('update_poste_service') }}";
        let service = "";
        let poste = $(this).attr('poste');

        updateServiceOfPoste(url, token, service, poste);
      });

    });

</script>
@endsection
