@extends('layouts.master') @section('title', 'Ajout Savoir')

@section('main_title')
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <h4 class="text-uppercase">Savoirs requis pour <strong>{{ $poste->nom }}</strong></h4>
      </div>

    </div>

  </div>

  <hr class="bg-vert trait-titre">
@endsection

@section('content')

  <div class="row">

    <div class="col-md-12 box-form-societe">
      <h5 class="text-uppercase">Savoirs de base</h5>
      <hr class="bg-rose trait-sous-titre">
      <i class="icon ion-arrow-down-b text-rose"></i>
    </div>

  </div>


  {{--------------- DIV CLONÉE (à laisser en haut de la page) ---------------}}
  <div class="row box-competences-poste competence-saved box-competence-cloned">
    <div class="col-lg-12">

      <button type="button" class="btn-update-competence" url-action="{{ route('update_savoir_poste') }}" savoir="" savoir-model="App\SavoirAdded" savoir-type="">
          <i class="icon ion-checkmark-round"></i>
      </button>

      <h5></h5>

      <button type="button" class="btn-edit-competence" savoir="" title="Modifier le savoir">
        <i class="icon ion-edit"></i>
      </button>

      <button type="button" class="btn-delete-competence" url-action="{{ route('delete_savoir_poste') }}" savoir="" savoir-model="App\SavoirAdded" savoir-type="" title="Supprimer définitivement ce savoir du poste">
        <i class="icon ion-close-round"></i>
      </button>
    </div>
  </div>
  {{-- -------------------------------------------------------------------- --}}

  @foreach ($savoirs as $savoirBase)
    @if ($savoirBase->pivot->type == 'base')
      <div class="row box-competences-poste @if ($savoirBase->pivot->valide == 'oui') competence-saved @endif">
        <div class="col-lg-12">
          <button type="button" class="btn-update-competence" url-action="{{ route('update_savoir_poste') }}"  savoir="{{ $savoirBase->id }}" savoir-model="{{ $savoirBase->pivot->savoir_type }}" savoir-type="base" >
            @if ($savoirBase->pivot->valide == 'oui')
              <i class="icon ion-checkmark-round"></i>
            @else
              <i class="icon ion-plus-round"></i>
            @endif
          </button>

          <h5>{{ $savoirBase->nom }}</h5>

          @if ($savoirBase->pivot->savoir_type == 'App\SavoirAdded')
            <button type="button" class="btn-edit-competence" savoir="{{ $savoirBase->id }}" title="Modifier le savoir">
              <i class="icon ion-edit"></i>
            </button>
          @endif

          <button type="button" class="btn-delete-competence" url-action="{{ route('delete_savoir_poste') }}" savoir="{{ $savoirBase->id }}" savoir-model="{{ $savoirBase->pivot->savoir_type }}" savoir-type="base" title="Supprimer définitivement ce savoir du poste">
            <i class="icon ion-close-round"></i>
          </button>

        </div>
      </div>
    @endif
  @endforeach

  <div class="append-competence-base"></div>

  <div class="row box-add-competences-poste">
    <div class="col-lg-12">
      <form class="form-add-competence-base" url-action='{{ route('add_savoir_poste') }}'>
        {{ csrf_field() }}
        <input type="hidden" name="societe_id" value="{{ Auth::guard('web_societe')->user()->id }}">
        <input type="hidden" name="poste_id" value="{{ $poste->id }}">
        <input type="hidden" name="model" value="App\SavoirAdded">
        <input type="hidden" name="type" value="base">
        <button type="button" class="btn-add-competence btn-add-competence-base"><i class="icon ion-plus-round"></i></button>
        <input type="text" name="nom" placeholder="Ajouter un savoir de base" data-provide="typeahead" class="typeahead autocomplete-savoirs" autocomplete="off">
      </form>
    </div>
  </div>


  <div class="row">

    <div class="col-md-12 box-form-societe">
      <h5 class="text-uppercase">Savoir spécifiques</h5>
      <hr class="bg-rose trait-sous-titre">
      <i class="icon ion-arrow-down-b text-rose"></i>
    </div>

  </div>

  @foreach ($savoirs as $savoirSpe)
    @if ($savoirSpe->pivot->type == 'spe')
      <div class="row box-competences-poste @if ($savoirSpe->pivot->valide == 'oui') competence-saved @endif">

        <div class="col-lg-12">
          <button type="button" class="btn-update-competence" url-action="{{ route('update_savoir_poste') }}" savoir="{{ $savoirSpe->id }}" savoir-model="{{ $savoirSpe->pivot->savoir_type }}" savoir-type="spe">
            @if ($savoirSpe->pivot->valide == 'oui')
              <i class="icon ion-checkmark-round"></i>
            @else
              <i class="icon ion-plus-round"></i>
            @endif
          </button>

          <h5>{{ $savoirSpe->nom }}</h5>

          @if ($savoirSpe->pivot->savoir_type == 'App\SavoirAdded')
            <button type="button" class="btn-edit-competence" savoir="{{ $savoirSpe->id }}" title="Modifier le savoir">
              <i class="icon ion-edit"></i>
            </button>
          @endif

          <button type="button" class="btn-delete-competence" url-action="{{ route('delete_savoir_poste') }}" savoir="{{ $savoirSpe->id }}" savoir-model="{{ $savoirSpe->pivot->savoir_type }}" savoir-type="spe" title="Supprimer définitivement ce savoir du poste">
            <i class="icon ion-close-round"></i>
          </button>
        </div>

      </div>
    @endif
  @endforeach

  <div class="append-competence-spe"></div>

  <div class="row box-add-competences-poste">
    <div class="col-lg-12">
      <form class="form-add-competence-spe" url-action='{{ route('add_savoir_poste') }}'>
        {{ csrf_field() }}
        <input type="hidden" name="societe_id" value="{{ Auth::guard('web_societe')->user()->id }}">
        <input type="hidden" name="poste_id" value="{{ $poste->id }}">
        <input type="hidden" name="model" value="App\SavoirAdded">
        <input type="hidden" name="type" value="spe">
        <button type="button" class="btn-add-competence btn-add-competence-spe"><i class="icon ion-plus-round"></i></button>
        <input type="text" name="nom" placeholder="Ajouter un savoir spécifique" data-provide="typeahead" class="typeahead autocomplete-savoirs" autocomplete="off">
      </form>
    </div>
  </div>

<div class="row">
  <div class="col-md-12">

    <a href="" class="btn-form bg-rose validate-savoirs">VALIDER LES SAVOIRS <span class="ajax-load-add-poste text-center" style="display:none"><img src="http://demo.itsolutionstuff.com/plugin/loader.gif" style="display:inline; width:20px"></span></a>

  </div>
</div>


@endsection

@section('javascript')
  <script type="text/javascript">

    $(function () {

      // MODIFIER LE NOM D'UN SAVOIR
      $('body').on('click', '.btn-edit-competence', function(){
        let icon = $(this).children();

        let icon_close = $(this).next().children();
        $(icon_close).addClass('ion-edit').removeClass('ion-close-round');

        let btn_close = $(this).next();
        $(btn_close).attr('url-action', '{{ route('update_savoir_name_poste') }}');
        $(btn_close).attr('title', 'Modifier le savoir');
        $(btn_close).addClass('btn-edit-competence-name').removeClass('btn-delete-competence');

        let titre = $(this).prev();
        let text = $.trim($(this).prev().text()); // trim retire les espaces en trop au début du texte

        $(titre).replaceWith('<input type="text" name="nom" class="input-edit-competence-name" value="'+ text +'">');

        $(this).hide();

      });

      $('body').on('click', '.btn-edit-competence-name', function(){
        let url = $(this).attr('url-action');
        let savoir_id = parseInt($(this).attr('savoir'));
        let nom = $(this).prev().prev().val();

        updateSavoirName(url, savoir_id, nom);

        $(this).children().addClass('ion-close-round').removeClass('ion-edit');
        $(this).attr('url-action', '{{ route('delete_savoir_poste') }}');
        $(this).attr('title', 'Supprimer définitivement ce savoir du poste');
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

      $('.validate-savoirs').click(function(e){
        e.preventDefault();

        $(this).text('SAVOIRS VALIDÉS !')
      });

      $('.btn-add-competence-base').click(function(){
        let url = $('.form-add-competence-base').attr('url-action');
        let data = $('.form-add-competence-base').serialize();

        addSavoir(url, data);
      });

      $('.btn-add-competence-spe').click(function(){
        let url = $('.form-add-competence-spe').attr('url-action');
        let data = $('.form-add-competence-spe').serialize();

        addSavoir(url, data);
      });


      /* on utilise un sélecteur statique (ici body) pour que l'event "click"
         s'applique également sur les éléments ajoutés en ajax */
      $('body').on('click', '.btn-update-competence', function(){
        let icon = $(this).children();
        let box = $(this).parent().parent();
        let url = $(this).attr('url-action');

        let savoir_id = parseInt($(this).attr('savoir'));
        let savoir_model = $(this).attr('savoir-model');
        let type = $(this).attr('savoir-type');

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

        updateSavoir(url, savoir_id, savoir_model, type, poste_id);
      });

      $('body').on('click', '.btn-delete-competence', function(){
        let url = $(this).attr('url-action');
        let box = $(this).parent().parent();

        let savoir_id = parseInt($(this).attr('savoir'));
        let savoir_model = $(this).attr('savoir-model');
        let type = $(this).attr('savoir-type');

        $(box).addClass('competence-deleted');

        deleteSavoir(url, savoir_id, savoir_model, type, poste_id);
      });


      function updateSavoir(url, savoir_id, savoir_model, type, poste_id)
      {
        $.ajax({
          url: url,
          type: "post",
          data: {
          "_token": "{{ csrf_token() }}",
          "savoir_id": savoir_id,
          "savoir_model": savoir_model,
          'type' : type,
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

      function addSavoir(url, data)
      {
        $.ajax({
          url: url,
          type: "post",
          data: data
        })
        .done(function(data) {
          console.log(data);
          let clone = $('.box-competence-cloned').clone();

          $(clone).children('.col-lg-12').children('h5').text(data.nom);

          $(clone).children('.col-lg-12').children('button').attr('savoir', data.savoir_id);
          $(clone).children('.col-lg-12').children('button').attr('savoir-type', data.type);

          $('.append-competence-' + data.type).append($(clone));
          $('.append-competence-' + data.type).children().removeClass('box-competence-cloned');

          $('input[name=nom]').val('');
        })

        .fail(function(jqXHR, ajaxOptions, thrownError){
          console.log(thrownError);
        });
      }

    });

    function deleteSavoir(url, savoir_id, savoir_model, type, poste_id)
    {
      $.ajax({
        url: url,
        type: "post",
        data: {
        "_token": "{{ csrf_token() }}",
        "savoir_id": savoir_id,
        "savoir_model": savoir_model,
        'type' : type,
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
