@extends('layouts.master') @section('title', 'Ajout savoirs')

@section('main_title')
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <h4 class="text-uppercase">Savoirs de <strong>{{ $employe->prenom }} {{ $employe->nom }}</strong></h4>
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
          <li><a href="#employe-savoirs-base"class="sous-menu-link text-uppercase">Savoirs de base</a></li>
          <li><a href="#employe-savoirs-spe"class="sous-menu-link text-uppercase">Savoirs spécifiques</a></li>
          <li><a href="{{ route('fiche_employe', ['id' => $employe->id]) }}" title="Revenir à la fiche de l'employé"><i class="icon ion-person"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
@endsection

@section('content')
  @foreach ($savoirsBase as $savoir)
    @if ($savoir->pivot->valide == 'oui')
      @if ($loop->first)
        <div class="row" id="employe-savoirs-base">

          <div class="col-lg-12 box-titres">
            <h5 class="text-uppercase">Savoirs de base</h5>
          </div>

        </div>

        <hr class="bg-rose trait-titre">
      @endif

      <div class="row box-competences-employe @if (in_array($savoir->id, $savoirsEmployeId)) competence-saved @endif" >

        <div class="col-lg-7">
          <h5>{{ $savoir->nom }}</h5>
        </div>

        @foreach ($savoirsEmploye as $value)
          @if ($value->id == $savoir->id)
            <span class="niveau-hidden" niveau="{{ $value->pivot->niveau }}"></span>
          @endif
        @endforeach

        <div class="col-lg-1">
          <button type="button" class="btn-competence-niveau competence-niveau-1" niveau="1" savoir-type="base" savoir="{{ $savoir->id }}" savoir-model="{{ $savoir->pivot->savoir_type }}">1</button>
        </div>
        <div class="col-lg-1">
          <button type="button" class="btn-competence-niveau competence-niveau-2" niveau="2" savoir-type="base" savoir="{{ $savoir->id }}" savoir-model="{{ $savoir->pivot->savoir_type }}">2</button>
        </div>
        <div class="col-lg-1">
          <button type="button" class="btn-competence-niveau competence-niveau-3" niveau="3" savoir-type="base" savoir="{{ $savoir->id }}" savoir-model="{{ $savoir->pivot->savoir_type }}">3</button>
        </div>
        <div class="col-lg-1">
          <button type="button" class="btn-competence-niveau competence-niveau-4" niveau="4" savoir-type="base" savoir="{{ $savoir->id }}" savoir-model="{{ $savoir->pivot->savoir_type }}">4</button>
        </div>
        <div class="col-lg-1">
          <button type="button" class="btn-competence-niveau competence-niveau-5" niveau="5" savoir-type="base" savoir="{{ $savoir->id }}" savoir-model="{{ $savoir->pivot->savoir_type }}">5</button>
        </div>

      </div>

    @endif
  @endforeach

  @foreach ($savoirsSpe as $savoir)
    @if ($savoir->pivot->valide == 'oui')
      @if ($loop->first)
        <div class="row" id="employe-savoirs-spe">

          <div class="col-lg-12 box-titres">
            <h5 class="text-uppercase">Savoirs spécifiques</h5>
          </div>

        </div>

        <hr class="bg-rose trait-titre">

      @endif

      <div class="row box-competences-employe @if (in_array($savoir->id, $savoirsEmployeId)) competence-saved @endif">

        <div class="col-lg-7">
          <h5>{{ $savoir->nom }}</h5>
        </div>

        @foreach ($savoirsEmploye as $value)
          @if ($value->id == $savoir->id)
            <span class="niveau-hidden" niveau="{{ $value->pivot->niveau }}"></span>
          @endif
        @endforeach

        <div class="col-lg-1">
          <button type="button" class="btn-competence-niveau competence-niveau-1" niveau="1" savoir-type="spe" savoir="{{ $savoir->id }}" savoir-model="{{ $savoir->pivot->savoir_type }}">1</button>
        </div>
        <div class="col-lg-1">
          <button type="button" class="btn-competence-niveau competence-niveau-2" niveau="2" savoir-type="spe" savoir="{{ $savoir->id }}" savoir-model="{{ $savoir->pivot->savoir_type }}">2</button>
        </div>
        <div class="col-lg-1">
          <button type="button" class="btn-competence-niveau competence-niveau-3" niveau="3" savoir-type="spe" savoir="{{ $savoir->id }}" savoir-model="{{ $savoir->pivot->savoir_type }}">3</button>
        </div>
        <div class="col-lg-1">
          <button type="button" class="btn-competence-niveau competence-niveau-4" niveau="4" savoir-type="spe" savoir="{{ $savoir->id }}" savoir-model="{{ $savoir->pivot->savoir_type }}">4</button>
        </div>
        <div class="col-lg-1">
          <button type="button" class="btn-competence-niveau competence-niveau-5" niveau="5" savoir-type="spe" savoir="{{ $savoir->id }}" savoir-model="{{ $savoir->pivot->savoir_type }}">5</button>
        </div>
      </div>
    @endif
  @endforeach

<div class="spacer">

</div>

@endsection

@section('javascript')
  <script type="text/javascript">

    $(function () {

      /* lorsque l'utilisateur arrive sur la page, si des compétences on déjà
          été enregistrées, on sélectionne leur niveau respectifs */
      let box = $('.competence-saved');
      let niveau_hidden = $(box).children('.niveau-hidden');

      $.each(box, function(k, v){
        if ($(v).has('.niveau-hidden')) {
          niveau_hidden = $(v).children('.niveau-hidden').attr('niveau');
          let buttons = $(v).children().children('button');

          $.each(buttons, function(key, button){
            if ($(button).attr('niveau') == niveau_hidden) {
              $(button).removeClass('btn-competence-niveau');
              $(button).addClass('btn-competence-saved-niveau');
            }
          });
        }
      });


      // event lorsque l'utilisateur sélectionne un niveau
      $('.btn-competence-niveau').click(function(){
        let savoir = parseInt($(this).attr('savoir'));
        let savoir_model = $(this).attr('savoir-model');
        let employe = {{ $employe->id }};
        let niveau = parseInt($(this).attr('niveau'));
        let type = $(this).attr('savoir-type');

        let url = "{{ route('update_savoir_employe') }}";

        let box = $(this).parent().parent();
        let buttons = $(this).parent().parent().children().children('button');

        $(buttons).removeClass('btn-competence-saved-niveau');
        $(buttons).addClass('btn-competence-niveau');
        $(this).removeClass('btn-competence-niveau');
        $(this).addClass('btn-competence-saved-niveau');

        $(box).addClass('savoir-saved');

        updateSavoirs(url, savoir, savoir_model, employe, niveau, type);
      });

      function updateSavoirs(url, savoir, savoir_model, employe, niveau, type)
      {
        $.ajax({
          url: url,
          type: "post",
          data: {
          "_token": "{{ csrf_token() }}",
          "savoir": savoir,
          "savoir_model": savoir_model,
          'employe' : employe,
          'niveau' : niveau,
          'type' : type
          }
        })
        .done(function(data) {
          console.log(data);

          // window.setTimeout(function(){
          //   $('#edit-savoirs-acquises').text('+ VALIDER LES COMPÉTENCES ACQUISES +');
          // }, 2000);
        })

        .fail(function(jqXHR, ajaxOptions, thrownError){
          console.log('server not responding...');
        });
      }

    });

</script>
@endsection
