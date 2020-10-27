@extends('layouts.master') @section('title', 'Ajout Savoir-être')

@section('main_title')
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <h4 class="text-uppercase">Savoir-être de <strong>{{ $employe->prenom }} {{ mb_strtoupper($employe->nom) }}</strong></h4>
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
          <li><a href="{{ route('fiche_employe', ['id' => $employe->id]) }}" class="" title="Revenir à la fiche de l'employé"><i class="icon ion-person"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
@endsection

@section('content')
  {{-- -------------------------------------------------------------------- --}}

  @foreach ($savoirEtre as $savoir)
    @if ($savoir->pivot->valide == 'oui')
      @if ($loop->first)

        <div class="row">

          <div class="col-lg-12 box-titres">
            <h5 class="text-uppercase">Savoir-être</h5>
          </div>

        </div>

        <hr class="bg-rose trait-titre">

      @endif
      <div class="row box-competences-employe @if (in_array($savoir->id, $savoirEtreEmployeId)) competence-saved @endif" >

        <div class="col-lg-7">
          <h5>{{ $savoir->nom }}</h5>
        </div>

        @foreach ($savoirEtreEmploye as $value)
          @if ($value->id == $savoir->id)
            <span class="niveau-hidden" niveau="{{ $value->pivot->niveau }}"></span>
          @endif
        @endforeach

        <div class="col-lg-1">
          <button type="button" class="btn-competence-niveau competence-niveau-1" niveau="1" savoir="{{ $savoir->id }}" savoir-model="{{ $savoir->pivot->savoir_etre_type }}">1</button>
        </div>
        <div class="col-lg-1">
          <button type="button" class="btn-competence-niveau competence-niveau-2" niveau="2" savoir="{{ $savoir->id }}" savoir-model="{{ $savoir->pivot->savoir_etre_type }}">2</button>
        </div>
        <div class="col-lg-1">
          <button type="button" class="btn-competence-niveau competence-niveau-3" niveau="3" savoir="{{ $savoir->id }}" savoir-model="{{ $savoir->pivot->savoir_etre_type }}">3</button>
        </div>
        <div class="col-lg-1">
          <button type="button" class="btn-competence-niveau competence-niveau-4" niveau="4" savoir="{{ $savoir->id }}" savoir-model="{{ $savoir->pivot->savoir_etre_type }}">4</button>
        </div>
        <div class="col-lg-1">
          <button type="button" class="btn-competence-niveau competence-niveau-5" niveau="5" savoir="{{ $savoir->id }}" savoir-model="{{ $savoir->pivot->savoir_etre_type }}">5</button>
        </div>

      </div>
    @endif
  @endforeach

@endsection

@section('javascript')
  <script type="text/javascript">

    $(function () {

      let employe_id = {{ $employe->id }};

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

      $('body').on('click', '.btn-competence-niveau', function(){
        let icon = $(this).children();
        let box = $(this).parent().parent();
        let url = "{{ route('update_savoir_etre_employe') }}";

        let savoir_etre_id = parseInt($(this).attr('savoir'));
        let savoir_etre_model = $(this).attr('savoir-model');
        let niveau = parseInt($(this).attr('niveau'));

        box = $(this).parent().parent();
        let buttons = $(this).parent().parent().children().children('button');

        $(buttons).removeClass('btn-competence-saved-niveau');
        $(buttons).addClass('btn-competence-niveau');
        $(this).removeClass('btn-competence-niveau');
        $(this).addClass('btn-competence-saved-niveau');

        $(box).addClass('competence-saved');

        updateSavoirEtre(url, savoir_etre_id, savoir_etre_model, niveau, employe_id);
      });

      function updateSavoirEtre(url, savoir_etre_id, savoir_etre_model, niveau, employe_id)
      {
        $.ajax({
          url: url,
          type: "post",
          data: {
          "_token": "{{ csrf_token() }}",
          "savoir_id": savoir_etre_id,
          "savoir_model": savoir_etre_model,
          "niveau": niveau,
          'employe_id' : employe_id
          }
        })
        .done(function(data) {
          console.log(data);
        })

        .fail(function(jqXHR, ajaxOptions, thrownError){
          console.log(thrownError);
        });
      }
    });

</script>
@endsection
