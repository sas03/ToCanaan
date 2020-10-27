@extends('layouts.master') @section('title', 'Ajouter un poste')

@section('main_title')
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <h4 class="text-uppercase">Ajouter un nouveau poste</h4>
      </div>

    </div>

  </div>

  <hr class="bg-vert trait-titre">
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

      {{-- DIV pour afficher les erreurs --}}
      <div class="form-errors"> <ul></ul></div>

      <form class="form-horizontal" id='form-add-poste' url-action="{{ route('create_poste') }}">
          {{ csrf_field() }}

          <input type="hidden" class="form-control" name="societe_id" value="{{ Auth::guard('web_societe')->user()->id }}" required>

          <div class="form-group form-group-nom">
            <label for="nom" class="control-label">Intitulé du poste *</label>
            <input type="text" class="form-control" name="nom" value="{{ old('nom') }}" required autofocus>
          </div>

          <div class="form-group form-group-description">
            <label for="description" class="control-label">Description du poste</label>
            <textarea class="form-control" rows="3" name="description"></textarea>
          </div>

          <div class="form-group">
            <label for="secteur_id" class="control-label">Secteur du poste *</label>
            <select class="form-control liste-secteurs" name="secteur_id">
              <option value="">Veuillez choisir un secteur</option>
              @foreach ($secteurs as $secteur)
                <option value="{{ $secteur->id }}" secteur="{{ $secteur->id }}">{{ ucfirst($secteur->nom) }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="metier_id" class="control-label">Sélectionner le métier correspondant dans notre base de données<span class="ajax-load text-center" style="display:none"><img src="http://demo.itsolutionstuff.com/plugin/loader.gif" style="display:inline; width:20px"></span></label>
            <select class="form-control list-metiers" name="metier_id" disabled>
              <option value="" class="first-option">Veuillez choisir un métier</option>
            </select>
          </div>
      </form>

      <a href="" class="btn-form bg-vert" id="add-poste">ENREGISTRER CE POSTE <span class="ajax-load-add-poste text-center" style="display:none"><img src="http://demo.itsolutionstuff.com/plugin/loader.gif" style="display:inline; width:20px"></span></a>

  </div>
</div>

@endsection

@section('javascript')
  <script type="text/javascript">

    $(function () {

      // lorsque l'utilisateur sélectionne un secteur
      $('.liste-secteurs').change(function() {
          let secteur = $('.liste-secteurs option:selected').attr('secteur');
          loadMetiers(secteur);
      });

      function loadMetiers(secteur)
      {
        $.ajax({
          url: '?secteur=' + secteur,
          type: "get",
          beforeSend: function()
          {
            $('.ajax-load').show();
          }
        })
        .done(function(data) {
          $('.list-metiers').css("opacity", 1);
          $('.list-metiers').prop("disabled", false);
          $('.ajax-load').hide();
          $(".list-metiers").html(data.view);
        })

        .fail(function(jqXHR, ajaxOptions, thrownError){
          alert('server not responding...');
        });
      }



      $('#add-poste').click(function(e){
        e.preventDefault();

        // si le poste n'a pas encore été sauvegardé
        if (!$(this).hasClass('saved')) {
          $('.form-errors ul').html('');

          let url = $('#form-add-poste').attr('url-action');
          let data = $('#form-add-poste').serialize();
          addPoste(url, data);
        }
      });

      function addPoste(url, data)
      {
        $.ajax({
          url: url,
          type: "post",
          data: data,
          beforeSend: function()
          {
            $('.ajax-load-add-poste').show();
          }
        })
        .done(function(data) {

          // s'il y a des erreurs dans les champs saisis
          if (data.error) {
            $.each(data.error, function(k, v){
              $('.form-errors').show();
              $('.form-errors ul').html('<li>• '+ v +'</li>')
            })
          }
          else {
            // on redirige vers la page du poste
            window.location.href = "{{ route('fiche_poste') }}" + '/' + data.id;
          }

          $('.ajax-load-add-poste').hide();
        })

        .fail(function(jqXHR, ajaxOptions, thrownError){
          console.log(thrownError);
        });
      }

    });

</script>
@endsection
