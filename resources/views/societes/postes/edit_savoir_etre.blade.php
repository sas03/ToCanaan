@extends('layouts.master') @section('title', 'Ajout Savoir-être')

@section('main_title')
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <h4 class="text-uppercase">Savoir-être requis pour <strong>{{ $poste->nom }}</strong></h4>
      </div>

    </div>

  </div>

  <hr class="bg-vert trait-titre">
@endsection

@section('content')

  {{--------------- DIV CLONÉE (à laisser en haut de la page) ---------------}}
  <div class="row box-competences-poste competence-saved box-competence-cloned">
    <div class="col-lg-12">

      <button type="button" class="btn-update-competence" url-action="{{ route('update_savoir_etre_poste') }}" savoir-etre="" savoir-model="App\SavoirEtreAdded">
          <i class="icon ion-checkmark-round"></i>
      </button>

      <h5></h5>

      <button type="button" class="btn-edit-competence" savoir-etre="" title="Modifier le savoir-être">
        <i class="icon ion-edit"></i>
      </button>

      <button type="button" class="btn-delete-competence" url-action="{{ route('delete_savoir_etre_poste') }}" savoir-etre="" savoir-model="App\SavoirEtreAdded" title="Supprimer définitivement ce savoir-être du poste">
        <i class="icon ion-close-round"></i>
      </button>
    </div>
  </div>
  {{-- -------------------------------------------------------------------- --}}

  @foreach ($savoirEtre as $savoir)
    <div class="row box-competences-poste @if ($savoir->pivot->valide == 'oui') competence-saved @endif">
      <div class="col-lg-12">
        <button type="button" class="btn-update-competence" url-action="{{ route('update_savoir_etre_poste') }}"  savoir-etre="{{ $savoir->id }}" savoir-model="{{ $savoir->pivot->savoir_etre_type }}">
          @if ($savoir->pivot->valide == 'oui')
            <i class="icon ion-checkmark-round"></i>
          @else
            <i class="icon ion-plus-round"></i>
          @endif
        </button>
        <h5>{{ $savoir->nom }}</h5>

        @if ($savoir->pivot->savoir_etre_type == 'App\SavoirEtreAdded')
          <button type="button" class="btn-edit-competence" savoir-etre="{{ $savoir->id }}" title="Modifier le savoir-être">
            <i class="icon ion-edit"></i>
          </button>
        @endif

        <button type="button" class="btn-delete-competence" url-action="{{ route('delete_savoir_etre_poste') }}" savoir-etre="{{ $savoir->id }}" savoir-model="{{ $savoir->pivot->savoir_etre_type }}" title="Supprimer définitivement ce savoir-être du poste">
          <i class="icon ion-close-round"></i>
        </button>
      </div>
    </div>
  @endforeach

  <div class="append-savoir-etre"></div>

  <div class="row box-add-competences-poste">
    <div class="col-lg-12">
      <form class="form-add-savoir-etre" url-action='{{ route('add_savoir_etre_poste') }}'>
        {{ csrf_field() }}
        <input type="hidden" name="societe_id" value="{{ Auth::guard('web_societe')->user()->id }}">
        <input type="hidden" name="poste_id" value="{{ $poste->id }}">
        <input type="hidden" name="model" value="App\SavoirEtreAdded">
        <button type="button" class="btn-add-competence btn-add-competence-base"><i class="icon ion-plus-round"></i></button>
        <input type="text" name="nom" placeholder="Ajouter un savoir-faire de base" data-provide="typeahead" class="typeahead autocomplete-savoir-faire" autocomplete="off">
      </form>
    </div>
  </div>

@endsection

@section('javascript')
  <script type="text/javascript">

    $(function () {

      // MODIFIER LE NOM D'UN SAVOIR-FAIRE
      $('body').on('click', '.btn-edit-competence', function(){
        let icon = $(this).children();

        let icon_close = $(this).next().children();
        $(icon_close).addClass('ion-edit').removeClass('ion-close-round');

        let btn_close = $(this).next();
        $(btn_close).attr('url-action', '{{ route('update_savoir_etre_name_poste') }}');
        $(btn_close).attr('title', 'Modifier le savoir-faire');
        $(btn_close).addClass('btn-edit-competence-name').removeClass('btn-delete-competence');

        let titre = $(this).prev();
        let text = $.trim($(this).prev().text()); // trim retire les espaces en trop au début du texte

        $(titre).replaceWith('<input type="text" name="nom" class="input-edit-competence-name" value="'+ text +'">');

        $(this).hide();

      });

      $('body').on('click', '.btn-edit-competence-name', function(){
        let url = $(this).attr('url-action');
        let savoir_id = parseInt($(this).attr('savoir-etre'));
        let nom = $(this).prev().prev().val();

        updateSavoirName(url, savoir_id, nom);

        $(this).children().addClass('ion-close-round').removeClass('ion-edit');
        $(this).attr('url-action', '{{ route('delete_savoir_etre_poste') }}');
        $(this).attr('title', 'Supprimer définitivement ce savoir-faire du poste');
        $(this).addClass('btn-delete-competence').removeClass('btn-edit-competence-name');
        $(this).prev().prev().replaceWith('<h5>'+ nom +'</h5>');

        $('.btn-edit-competence').show();
      });


      function updateSavoirName(url, savoir_id, nom)
      {
        $.ajax({
          url: url,
          type: "post",
          data: {
          "_token": "{{ csrf_token() }}",
          "savoir_id": savoir_id,
          "nom": nom
          }
        })
        .done(function(data) { console.log(data); })
        .fail(function(jqXHR, ajaxOptions, thrownError){
          console.log(thrownError);
        });
      }




      let poste_id = {{ $poste->id }};

      $('.btn-add-competence-base').click(function(){
        let url = $('.form-add-savoir-etre').attr('url-action');
        let data = $('.form-add-savoir-etre').serialize();

        addSavoirEtre(url, data);
      });


      /* on utilise un sélecteur statique (ici body) pour que l'event "click"
         s'applique également sur les éléments ajoutés en ajax */
      $('body').on('click', '.btn-update-competence', function(){
        let icon = $(this).children();
        let box = $(this).parent().parent();
        let url = $(this).attr('url-action');

        let savoir_etre_id = parseInt($(this).attr('savoir-etre'));
        let savoir_etre_model = $(this).attr('savoir-model');

        if ($(box).hasClass('competence-saved')) {
          $(box).removeClass('competence-saved');
          $(icon).removeClass('ion-checkmark-round');
          $(icon).addClass('ion-plus-round');
        }
        else {
          $(box).addClass('competence-saved');
          $(icon).removeClass('ion-plus-round');
          $(icon).addClass('ion-checkmark-round');
        }

        updateSavoirEtre(url, savoir_etre_id, savoir_etre_model, poste_id);
      });


      $('body').on('click', '.btn-delete-competence', function(){
        let url = $(this).attr('url-action');
        let box = $(this).parent().parent();

        let savoir_etre_id = parseInt($(this).attr('savoir-etre'));
        let savoir_etre_model = $(this).attr('savoir-model');

        $(box).addClass('competence-deleted');
        console.log(savoir_etre_id);
        deleteSavoirEtre(url, savoir_etre_id, savoir_etre_model, poste_id);
      });


      function updateSavoirEtre(url, savoir_etre_id, savoir_etre_model, poste_id)
      {
        $.ajax({
          url: url,
          type: "post",
          data: {
          "_token": "{{ csrf_token() }}",
          "savoir_etre_id": savoir_etre_id,
          "savoir_etre_model": savoir_etre_model,
          'poste_id' : poste_id
          }
        })
        .done(function(data) {
          console.log(data);
        })

        .fail(function(jqXHR, ajaxOptions, thrownError){
          console.log(thrownError);
        });
      }

      function addSavoirEtre(url, data)
      {
        $.ajax({
          url: url,
          type: "post",
          data: data
        })
        .done(function(data) {
          console.log(data);
          let clone = $('.box-competence-cloned').clone();

          $(clone).children('.col-lg-11').children('h5').text(data.nom);
          $(clone).children('.col-lg-11').children('button').attr('savoir-etre', data.id);
          $(clone).children('.col-lg-1').children('button').attr('savoir-etre', data.id);

          $('.append-savoir-etre').append($(clone));
          $('.append-savoir-etre').children().removeClass('box-competence-cloned');

          $('input[name=nom]').val('');
        })

        .fail(function(jqXHR, ajaxOptions, thrownError){
          console.log(thrownError);
        });
      }

    });

    function deleteSavoirEtre(url, savoir_etre_id, savoir_etre_model, poste_id)
    {
      $.ajax({
        url: url,
        type: "post",
        data: {
        "_token": "{{ csrf_token() }}",
        "savoir_etre_id": savoir_etre_id,
        "savoir_etre_model": savoir_etre_model,
        'poste_id' : poste_id
        }
      })
      .done(function(data) { console.log(data); })
      .fail(function(jqXHR, ajaxOptions, thrownError){
        console.log(thrownError);
      });


    }

</script>
@endsection
