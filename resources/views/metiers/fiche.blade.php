@extends('layouts.master') @section('title', ucfirst($metier->nom))

@section('main_title')
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <h4 class="text-uppercase">{{ $metier->nom }}</h4>
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
          <li><a href="#metier-informations" class="sous-menu-link text-uppercase">Informations générales</a></li>
          <li><a href="#metier-parcours" class="sous-menu-link text-uppercase">Parcours</a></li>
          @if ($metier->video)<li><a href="#metier-temoignages" class="sous-menu-link text-uppercase">Témoignages</a></li>@endif
          <li><a href="#metier-competences" class="sous-menu-link text-uppercase">Compétences</a></li>
          <li><a href="#metier-etablissements" class="sous-menu-link text-uppercase">Etablissements</a></li>
        </ul>
      </div>
    </div>
  </div>
@endsection


@section('content')
<div class="row" id="metier-informations">

  <div class="col-lg-5">

    <div class="card mb-4 bg-light-vert custom-card card-description">
      <div class="card-body">
        <h4 class="card-title bg-vert">Descriptif du métier</h4>
        <p class="card-text">{{ $metier->description }}</p>
      </div>
    </div>

    <div class="card mb-4 bg-light-vert custom-card">
      <div class="card-body">
        <h4 class="card-title bg-vert">Métiers connexes</h4>
        <ul class="card-metiers-connexes">
            @foreach ($metiersProches as $metierProche)
              @if($metierProche->id != $metier->id)
                <li><a href="{{ route('fiche_metier', ['id' => $metierProche->id]) }}">{{ ucfirst($metierProche->nom) }}</a></li>
              @endif
          @endforeach
        </ul>
      </div>
    </div>

  </div>

  <div class="col-lg-7">

    @if ($secteur)
      <div class="card mb-4 bg-light-violet custom-card">
        <div class="card-body">
          <h4 class="card-title bg-violet">{{ $secteur->nom }}</h4>
          <p class="card-text">
            {{ $secteur->description }}
            <br><br>
            <a href="{{ route('fiche_secteur', ['id' => $secteur->id]) }}" class="link-underlined">Voir les métiers liés à ce secteur</a>
          </p>
        </div>
      </div>
    @endif

    <div class="card mb-4 bg-light-rose custom-card">
      <div class="card-body">
        <h4 class="card-title bg-rose">Pré-requis </h4>
        <p class="card-text">{{ $metier->pre_requis }}</p>
      </div>
    </div>

  </div>

</div>
<div class="row" id="metier-parcours">

  <div class="col-lg-12">

    <div class="card mb-4 bg-light-jaune custom-card parcours-card">
      <div class="card-header bg-jaune">
        <h4 class="card-title">
          Parcours possibles <span class="ajax-load text-center" style="display:none"><img src="http://demo.itsolutionstuff.com/plugin/loader.gif" style="display:inline; width:20px"></span>


          @if (Auth::guard('web')->user())
            <a href="#" class="save-parcours">Enregistrer le parcours <span class="ajax-load-save text-center" style="display:none"><img src="http://demo.itsolutionstuff.com/plugin/loader.gif" style="display:inline; width:20px"></span></a>
          @endif
        </h4>


      </div>

      <div class="card-body" id="formations-data">
        {{------------------------------ PARCOURS ------------------------------}}
        {{-- @include('parcours.parcours') --}}
      </div>
    </div>
  </div>

</div>

{{-- FILTRES --}}
<div class="row">

  <div class="col-lg-12">
    <div class="card mb-4 bg-light-rose custom-card filtres-card">
      <div class="card-body">
        <h4 class="card-title bg-rose">Types de formations</h4>

        <div class="card-text">

          <form method="post" class="box-form-search" id="box-filtres">
            {{ csrf_field() }}

            <div class="row row-filtres">

              <div class="col-lg-4">

                <h5>Par statut :</h5>
                <hr class="bg-rose">

                <div class="form-check form-check-inline">
                  <label class="c-input c-radio">
                    <input type="radio" name="statut" value="tout" checked>
                    <span class="c-indicator"></span>
                    Tous les statuts
                  </label>
                </div>
                <br>
                <div class="form-check form-check-inline">
                  <label class="c-input c-radio">
                    <input type="radio" name="statut" value="prive">
                    <span class="c-indicator"></span>
                    Privée
                  </label>
                </div>
                <br>
                <div class="form-check form-check-inline">
                  <label class="c-input c-radio">
                    <input type="radio" name="statut" value="public">
                    <span class="c-indicator"></span>
                    Publique
                  </label>
                </div>
                <br>
                <div class="form-check form-check-inline">
                  <label class="c-input c-radio">
                    <input type="radio" name="statut" value="autre">
                    <span class="c-indicator"></span>
                    Autre
                  </label>
                </div>

              </div>

              <div class="col-lg-4">

                <h5>Par rythme :</h5>
                <hr class="bg-rose">

                <div class="form-check form-check-inline">
                  <label class="form-check-label">
                    <input class="form-check-input position-static" type="checkbox" id="blankCheckbox3" value="pro" name="rythme"> Professionnelle
                  </label>
                </div>
                <br>
                <div class="form-check form-check-inline">
                  <label class="form-check-label">
                    <input class="form-check-input position-static" type="checkbox" id="blankCheckbox4" value="alternance" name="rythme"> Alternance
                  </label>
                </div>
                <br>
                <div class="form-check form-check-inline">
                  <label class="form-check-label">
                    <input class="form-check-input position-static" type="checkbox" id="blankCheckbox5" value="continue" name="rythme"> Formation Continue
                  </label>
                </div>
              </div>

              <div class="col-lg-4">

                <h5>Par localisation :</h5>
                <hr class="bg-rose">

                <div class="form-check form-check-inline">
                  <label class="c-input c-radio">
                    <input id="radio3" type="radio" name="localisation" value="france" checked>
                    <span class="c-indicator"></span>
                    Dans toute la France
                  </label>
                </div>
                <br>
                <div class="form-check form-check-inline">
                  <label class="c-input c-radio">
                    <input id="radio2" type="radio" name="localisation" value="region">
                    <span class="c-indicator"></span>
                    Dans ma région
                  </label>
                </div>
                <br>
                <div class="form-check form-check-inline">
                  <label class="c-input c-radio">
                    <input id="radio3" type="radio" name="localisation" value="departement">
                    <span class="c-indicator"></span>
                    Dans mon département
                  </label>
                </div>

              </div>

            </div> {{-- Fin du row des filtres--}}


            <button type="submit" class="btn bg-rose" id="filtrer">Filtrer</button>
          </form>

        </div> {{-- Fin card-text  --}}

        <a href="#etablissements" class="voir-etablissements">
            Voir les <span class="total"></span> établissements liés à ces formations <i class="icon ion-arrow-down-b"></i>
        </a>

        {{-- Cette section apparaît seulement si l'utilisateur est connecté --}}
        @if(!Auth::guard('web_societe')->user() && !Auth::guard('web')->user())
          <div class="box-filtres-not-connected">
            <a href="{{ route('login') }}" class="">CONNECTEZ-VOUS</a>
          </div>
        @endguest
      </div>
    </div>
  </div>
</div>


@if (Auth::guard('web_societe')->user() || Auth::guard('web')->user())

  {{-- TEMOIGNAGE --}}
  @if ($metier->video)
  <div class="row" id="metier-temoignages">
    <div class="col-lg-12">
      <div class="card mb-4 bg-light-vert custom-card card-temoignages">
        <div class="card-body">
          <h4 class="card-title bg-vert">Témoignages</h4>
          <p class="card-text">
            <iframe width="720" height="405" src="{{ $metier->video }}" frameborder="0" allowfullscreen></iframe>
          </p>
        </div>
      </div>
    </div>
  </div>
  @endif



  {{-- SAVOIRS --}}
  <div class="row" id="metier-competences">
    <div class="col-lg-6 card-competences-metier">

      <div class="card mb-4 bg-light-rose custom-card">
        <div class="card-body">
          <h4 class="card-title bg-rose">Savoir-faire de base</h4>

          <ul class="card-text">
            @foreach ($savoirFaire as $savoir)
              @if ($savoir->pivot->type == 'base')
                <li>• {{ $savoir->nom }}</li>
              @endif
            @endforeach
          </ul>
        </div>
      </div>
    </div>

    <div class="col-lg-6 card-competences-metier">

      <div class="card mb-4 bg-light-rose custom-card">
        <div class="card-body">
          <h4 class="card-title bg-rose">Savoirs de base</h4>

          <ul class="card-text">
            @foreach ($savoirs as $savoir)
              @if ($savoir->pivot->type == 'base')
                <li>• {{ $savoir->nom }}</li>
              @endif
            @endforeach
          </ul>
        </div>
      </div>

    </div>

  </div>


    <div class="row">
      <div class="col-lg-6 card-competences-metier">

        <div class="card mb-4 bg-light-rose custom-card">
          <div class="card-body">
            <h4 class="card-title bg-rose">Savoir-faire spécifiques</h4>

            <ul class="card-text">
              @foreach ($savoirFaire as $savoir)
                @if ($savoir->pivot->type == 'spe')
                  <li>• {{ $savoir->nom }}</li>
                @endif
              @endforeach
            </ul>
          </div>
        </div>

      </div>

      <div class="col-lg-6 card-competences-metier">

        <div class="card mb-4 bg-light-rose custom-card">
          <div class="card-body">
            <h4 class="card-title bg-rose">Savoirs spécifiques</h4>

            <ul class="card-text">
              @foreach ($savoirs as $savoir)
                @if ($savoir->pivot->type == 'spe')
                  <li>• {{ $savoir->nom }}</li>
                @endif
              @endforeach
            </ul>
          </div>
        </div>

      </div>

    </div>


  <div class="row">

    @if (count($savoirEtre) > 0)
      <div class="col-lg-6 card-competences-plus-metier">

        <div class="card mb-4 bg-light-rose custom-card card-description">
          <div class="card-body">
            <h4 class="card-title bg-rose">Savoir-être</h4>
            <ul class="card-text">
              @foreach ($savoirEtre as $savoir)
                <li>• {{ $savoir->nom }}</li>
              @endforeach
            </ul>
          </div>
        </div>

      </div>
    @endif

    @if (count($motivations) > 0)
      <div class="col-lg-6 card-competences-plus-metier">

        <div class="card mb-4 bg-light-vert custom-card">
          <div class="card-body">
            <h4 class="card-title bg-vert">Battements de coeur</h4>
            <ul class="card-text">
              @foreach ($motivations as $motivation)
                <li>• {{ $motivation->nom }}</li>
              @endforeach
            </ul>
          </div>
        </div>

      </div>
    @endif

  </div>

  <div class="row last-row" id="metier-etablissements">

    <div class="col-lg-12">
      <div class="card mb-5 bg-light-violet custom-card etablissements-card" id="etablissements">
        <div class="card-body">
          <h4 class="card-title bg-violet">Etablissements (<span class="total"></span>) <span class="ajax-load text-center" style="display:none"><img src="http://demo.itsolutionstuff.com/plugin/loader.gif" style="display:inline; width:20px"></span></h4>

          <table class="table table-bordered table-recherche text-center table-etablissements">

            <tbody id="etablissement-data">

            </tbody>
            <tr>
              <td colspan="3">
                <ul class="pagination justify-content-center">
                  <li class="page-arrow" id="page-first"><<</li>
                  <li class="page-arrow" id="page-prev"><</li>
                  <li class="page-compteur"><span class="i"></span> / <span class="last-page"></span></li>
                  <li class="page-arrow" id="page-next">></li>
                  <li class="page-arrow" id="page-last">>></li>
                </ul>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>

  </div>

  @else

  <div class="row">
    <div class="col-lg-12">
      <div class="box-not-connected">
        <ul>
          <li>• Compétences requises</li>
          <li>• Témoignages</li>
          <li>• Établissements</li>
          <li>...</li>
        </ul>
        <p>Connectez-vous pour voir la fiche complète de ce métier :</p>
        <br>
        <a href="{{ route('login') }}" class="">CONNEXION</a>
      </div>
    </div>
  </div>

  @endif


@endsection

@section('javascript')
  <script type="text/javascript">

    $(function () {

      /*********************** ENREGISTRER UN PARCOURS ***********************/

      let token = "{{ csrf_token() }}";
      let url = "{{ route('add_parcours') }}";
      let metier_id = {{ $metier->id }};

      $('.save-parcours').click(function(e){
        e.preventDefault();

        let selectedGlobal = $('.liste-formations').find('.selected');
        let selected = [];
        let id;
        let niveau;

        $(selectedGlobal).each(function(k, v){
          id = parseInt($(v).attr('dbId'));
          niveau = $(v).attr('niveau');

          selected[niveau] = id;
        });

        addParcours(url, token, selected, metier_id);
      });


      // SMOOTH SCROLL sur le lien vers les établissements
      $('.voir-etablissements').on('click', function(evt){
        evt.preventDefault();
        var target = $(this).attr('href');
        /* le sélecteur $(html, body) permet de corriger un bug sur chrome et safari (webkit) */
        $('html, body')
        .stop() // on arrête toutes les animations en cours
        /* on fait maintenant l'animation vers notre ancre target */
        .animate({scrollTop: $(target).offset().top -50}, 1000);
      });



      $(".card-metiers-connexes").mCustomScrollbar();
      $(".card-competences-metier .card-text").mCustomScrollbar();
      $(".card-competences-plus-metier .card-text").mCustomScrollbar();
      $(".parcours-card .card-svg").mCustomScrollbar({
          axis:"x" // horizontal scrollbar
      });


    /******** CHARGEMENT DES FORMATIONS ET DES ETABLISSEMENTS EN AJAX  ********/
      let script_tooltip = "{{ asset('js/tooltip.js') }}";

      var page = 1;
      let lastPage = $('.pagination .last-page').text();

      loadMoreData(script_tooltip, page);

      // lorsque l'on clique sur un des boutons
      $('#filtrer, #page-prev, #page-first, #page-next, #page-last').click(function(e){
        e.preventDefault();

        let id = $(this).attr('id');
        lastPage = $('.pagination .last-page').text();

        if (id == 'filtrer') {
          page = 1;
        }

        if (id == 'page-prev') {
          page--;
        }
        if (id == 'page-first' && page > 1) {
          page = 1;
        }

        if (id == 'page-next' && page < lastPage) {
          page++;
        }

        if (id == 'page-last' && page < lastPage) {
          page = lastPage;
        }

        let statut = $('#box-filtres input[name="statut"]:checked').val();
        let localisation = $('#box-filtres input[name="localisation"]:checked').val();
        let rythmesChecked = $('#box-filtres input[name="rythme"]:checked');
        let rythmes = "";

        $.each(rythmesChecked, function(k, v){
          rythmes += '+' + $(v).val();
        });

        loadMoreData(script_tooltip, page, statut, localisation, rythmes);
      });

    });

  </script>
@endsection
