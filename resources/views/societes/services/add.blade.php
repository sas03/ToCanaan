@extends('layouts.master') @section('title', 'Ajouter un service')

@section('main_title')
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <h4 class="text-uppercase">Ajouter un nouveau service</h4>
      </div>

    </div>

  </div>

  <hr class="bg-jaune trait-titre">
@endsection

@section('main_sous_menu')
  <div class="container">
    <div class="row row-sous-menu-fiche">
      <div class="col-lg-12">
        <ul>
          <li><a href="{{ route('societe_index') }}" class="text-uppercase"><i class="icon ion-ios-home"></i></a></li>
          <li><a href="{{ route('liste_services') }}" class="text-uppercase">Liste des services</a></li>
          <li><a href="{{ route('liste_postes') }}" class="text-uppercase">Liste des postes</a></li>
          <li><a href="{{ route('liste_employes') }}" class="text-uppercase">Liste des employés</a></li>
        </ul>
      </div>
    </div>
  </div>
@endsection

@section('content')

<div class="row justify-content-center">

  <div class="col-md-7 box-form box-form-societe">

    {{-- <h5>AJOUT DU SERVICE</h5>
    <hr class="bg-jaune trait-sous-titre">
    <i class="icon ion-arrow-down-b text-jaune"></i> --}}

    {{-- DIV pour afficher les erreurs --}}
    <div class="form-errors"> <ul></ul></div>

    <form class="form-horizontal" id='form-add-service' url-action="{{ route('create_service') }}">
        {{ csrf_field() }}

        <input type="hidden" class="form-control" name="societe_id" value="{{ $societe->id }}" required>

        <div class="form-group">
          <label for="nom" class="control-label">NOM DU SERVICE :</label>
          <input type="text" class="form-control" name="nom" value="{{ old('nom') }}" required autofocus>
        </div>
    </form>

    <a href="" class="btn-form bg-jaune" id="add-service">ENREGISTRER CE SERVICE</a>

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

      function addService(url, data)
      {
        $.ajax({
          url: url,
          type: "post",
          data: data
        })
        .done(function(data) {

          // s'il y a des erreurs dans les champs saisis
          if (data.error) {
            $.each(data.error, function(k, v){
              $('.form-errors').show();
              $('.form-errors ul').html('<li>• '+ v +'</li>');
            })
          }
          else {
            // on redirige vers la page du service
            window.location.href = "{{ route('fiche_service') }}" + '/' + data.id;
          }
        })

        .fail(function(jqXHR, ajaxOptions, thrownError){
          console.log(thrownError);
        });
      }


    });

</script>
@endsection
