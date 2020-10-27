@extends('layouts.master') @section('title', 'Modification du service')

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

    <h5>AJOUT D'EMPLOYÉS</h5>
    <hr class="bg-jaune trait-sous-titre">
    <i class="icon ion-arrow-down-b text-jaune"></i>

    <p>Nouvel employé : <a href="{{ route('add_employe') }}" class="text-jaune">Ajouter un employé</a></p>

    <p>Employé existant :</p>

    <form class="form-horizontal"url-action="">
        {{ csrf_field() }}

        <input type="hidden" class="form-control" name="service_id" value="{{ $service->id }}" required>

        <div class="row row-add-item-service">
          <div class="form-group col-lg-11">
            <select class="form-control list-employes" name="employe">

            </select>
          </div>
          <div class="col-lg-1">
            <button type="button" class="btn-add" id="btn-add-employe-service"><i class="icon ion-plus-round"></i></button>
          </div>
        </div>

        <span class="span-message"> <em></em> </span>
    </form>

    <div class="box-list-item-services box-list-employes-services">
      <span class="ajax-load text-center" style="display:none"><img src="http://demo.itsolutionstuff.com/plugin/loader.gif" style="display:inline; width:20px"></span>
    </div>
  </div>
</div>


@endsection

@section('javascript')
  <script type="text/javascript">

    $(function () {

      let token = "{{ csrf_token() }}";

      loadEmployes();

      $('body').on('change', '.list-employes', function(){
        let service_selected = $('.list-employes option:selected').attr('service');

        if (service_selected != '') {
          $('.span-message em').text('Attention cet employé est déjà lié à un service !');
        }
        else {
          $('.span-message em').text('');
        }
      });


      $('body').on('click', '#btn-add-employe-service', function(){
        let url = "{{ route('update_employe_service') }}";
        let service = "{{ $service->id }}";
        let employe = $(this).parent().prev().children().val();

        updateEmploye(url, token, service, employe);
      });

      $('body').on('click', '#btn-delete-employe-service', function(){
        let url = "{{ route('update_employe_service') }}";
        let service = "";
        let employe = $(this).attr('employe');

        updateEmploye(url, token, service, employe);
      });

    });

</script>
@endsection
