@extends('layouts.master') @section('title', 'Profil')

@section('main_title')
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <h4 class="text-uppercase">Mon dashboard</h4>
      </div>

    </div>

  </div>

  <hr class="bg-jaune trait-titre">
@endsection

@section('content')

<div class="row row-header-dashboard-user">

  <img src="{{ asset('img/covers/' . Auth::user()->cover .'?' . time() . '>') }}" alt="Photo de couverture" class="photo-couverture-user">

  <div class="col-lg-12">

    <button type="button" name="button" data-toggle="modal" data-target="#modal-update-cover" class="btn-update-cover"><i class="icon ion-edit"></i> Modifier la photo de couverture</button>

    <!-- Template de la Modal pour éditer la cover -->
    <div class="modal modal-custom" id="modal-update-cover" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog" role="document">

        <div class="modal-header">
          <h5 class="modal-title">CHANGEZ VOTRE COVER</h5>
          <button type="button" class="close modal-close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-content">
          <div class="modal-body box-form">
            <form action="{{ route('user_update_cover') }}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="form-group">
                <input type="file" class="form-control" name="cover">
              </div>
              <input type="submit" class="btn-form bg-jaune" value="Valider">
            </form>

          </div>
        </div>
      </div>
    </div>

    <div class="box-avatar-user">
      <img src="{{ asset('img/avatars/' . Auth::user()->avatar .'?' . time() . '>') }}" alt="Avatar de l'utilisateur" class="avatar-user">

      <button type="button" class="btn-update-avatar" name="button" data-toggle="modal" data-target="#modal-update-avatar"><i class="icon ion-edit"></i></button>

      <!-- Template de la Modal pour éditer l'avatar -->
      <div class="modal modal-custom" id="modal-update-avatar" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">

          <div class="modal-header">
            <h5 class="modal-title">CHANGEZ VOTRE AVATAR</h5>
            <button type="button" class="close modal-close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-content">
            <div class="modal-body box-form">

              <form action="{{ route('user_update_avatar') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="cropped_value" id="cropped_value" value="">
                <div class="form-group">
                  <input type="file" class="form-control" name="avatar">
                </div>
                <input type="submit" class="btn-form bg-jaune" value="Valider">
              </form>

            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="box-user-name">
      <h4>{{ ucfirst(Auth::user()->prenom) }} {{mb_strtoupper(Auth::user()->nom) }}</h4>
      <hr>
      <em>Inscrit(e) depuis le {{ Auth::user()->created_at->format('d/m/Y') }}</em>
    </div>

  </div>
</div>

<div class="row">

  <div class="col-lg-7">

    <div class="card mb-4 bg-light-jaune custom-card">
      <div class="card-body">
        <h4 class="card-title bg-jaune">Votre FORME</h4>
          @if (count($resume) > 0)

            <ul class="liste-recently-viewed">
              <li>{{ $resume->where('type', 'experience professionnelle')->count() }} expérience(s) professionnelle(s)</li>
              <li>{{ $resume->where('type', 'formation')->count() }} formation(s)</li>
              <li>{{ $resume->where('type', 'centre interet')->count() }} centre(s) d'intérêt</li>
              <li>{{ count($savoirs) }} savoir(s)</li>
              <li>{{ count($savoirEtre) }} savoir-être</li>
              <li>{{ count($motivations) }} battement(s) de coeur</li>
            </ul>
          @else
            <p class="card-text">
              Vous n'avez pas encore enregistré votre FORME
            </p>
          @endif

        <a href="{{ route('user_resume') }}" class="btn-form bg-jaune">Complétez votre FORME</a>
      </div>
    </div>

  </div>

  <div class="col-lg-5">

    <div class="card mb-4 bg-light-vert custom-card">
      <div class="card-body">
        <h4 class="card-title bg-vert">Derniers métiers consultés</h4>

        @if ($metiersViewed)
          <ul class="liste-recently-viewed">
            @foreach ($metiersViewed as $metierV)
              @if ($loop->iteration <= 3)
              <li>
                <a href="{{ route('fiche_metier', ['id' => $metierV->id]) }}">{{ ucfirst($metierV->nom) }}</a>
              </li>
              @endif
            @endforeach
          </ul>
        @endif

        <p class="card-text">
          <a href="{{ route('metiers_index') }}" class="link-underlined">Rechercher un métier</a>
        </p>
      </div>
    </div>


    <div class="card mb-4 bg-light-rose custom-card">
      <div class="card-body">
        <h4 class="card-title bg-rose">Dernières formations consultées</h4>

        @if ($formationsViewed)
          <ul class="liste-recently-viewed">
            @foreach ($formationsViewed as $formation)
              @if ($loop->iteration <= 3)
              <li>
                <a href="{{ route('fiche_formation', ['id' => $formation->id]) }}">{{ ucfirst($formation->nom) }}</a>
              </li>
              @endif
            @endforeach
          </ul>
        @endif

        <p class="card-text">
          <a href="{{ route('formations_index') }}" class="link-underlined">Rechercher une formation</a>
        </p>
      </div>
    </div>

  </div>

</div>

{{--------------------------------- PARCOURS ---------------------------------}}

<div class="row">

  <div class="col-lg-12">

    <div class="card mb-4 bg-light-jaune custom-card">

      <div class="card-body">

        <h4 class="card-title bg-jaune">Parcours <span class="ajax-load text-center" style="display:none"><img src="http://demo.itsolutionstuff.com/plugin/loader.gif" style="display:inline; width:20px"></span></h4>

        @if (count($parcoursSaved) > 0)
          <table class="table table-bordered table-recherche text-center">
            <tbody>
              @foreach ($parcoursSaved as $parcours)
                <tr class="liste-recherche liste-jaune show-parcours-link" parcours="{{ $parcours->id }}" metier="{{ $parcours->metier_id }}">
                  <td class="liste-parcours-metier">{{ ucfirst($parcours->metier->nom) }}</td>
                  <td class="liste-parcours-formations">
                    <span>{{ count($parcours->formations) }}</span> formation(s) enregistrée(s)
                  </td>
                  <td class="table-icon table-icon-loupe"><i class="icon ion-search"></i></td>
                </tr>
              @endforeach
            </tbody>

          </table>

          <div class="parcours-card parcours-card-user">
            <div class="card-body" id="parcours-user-load">
              {{------------------ CHARGEMENT DES PARCOURS ------------------}}
            </div>

            <div class="row parcours-card-footer">
              <div class="col-lg-6 parcours-buttons-edit">
                <a href="#" class="parcours-update-link" title="Enregistrer les modifications" metier="">ENREGISTRER LES MODIFICATIONS</a>
              </div>
              <div class="col-lg-6 parcours-buttons-edit">
                <a href="#" class="parcours-delete-link" title="Supprimer le parcours">SUPPRIMER LE PARCOURS</a>
              </div>
            </div>
          </div>
        @else
          <p class="card-text">
            Vous n'avez enregistré aucuns parcours.
          </p>
        @endif

      </div>
    </div>

  </div>

</div>


<div class="row">
  <div class="col-lg-6 box-parcours-metier">
    {{--  --}}
  </div>
  <div class="col-lg-6 box-parcours-formations">
    {{--  --}}
  </div>
</div>


{{--------------------------------- FILTRES ---------------------------------}}

<div class="row">

  <div class="col-lg-12 box-titres">
    <h4 class="text-uppercase">Recherche</h4>
  </div>

</div>

<hr class="bg-jaune trait-titre mb-4">

{{-- On importe les filtres --}}
@include('user.ajax.filtres')

<div class="spacer"></div>

@endsection

@section('javascript')

  {{-- Script du tooltip --}}
  <script src="{{ asset('js/tooltip.js') }}"></script>

  <script src="{{ asset('js/filtres_user.js') }}"></script>

  <script type="text/javascript">

    $(function () {

      /******************************* PARCOURS *******************************/

      let token = "{{ csrf_token() }}";

      let metierId = "";
      let script_tooltip = "{{ asset('js/tooltip.js') }}";

      $('.show-parcours-link').click(function(e){
        e.preventDefault();

        let parcours_id = $(this).attr('parcours');
        let url = "{{ route('delete_parcours') }}" + '/' + parcours_id;
        metierId = $(this).attr('metier');

        $('.liste-parcours-metier').css({
          'font-weight': 'normal',
          'opacity': '0.7'
        });

        $(this).children('.liste-parcours-metier').css({
          'font-weight': 'bold',
          'opacity': '1'
        });

        $('.liste-parcours-formations').css({
          'font-weight': 'normal',
          'opacity': '0.7'
        });
        $(this).children('.liste-parcours-formations').css({
          'font-weight': 'bold',
          'opacity': '1'
        });

        // si le parcours est ouvert
        if ($(this).hasClass('parcours-visible')) {

          $('.card-svg').slideUp();

          $('.box-parcours-metier').slideUp();
          $('.box-parcours-formations').slideUp();

          $('.parcours-card-user').slideUp();

          $('.liste-parcours-metier').css({
            'font-weight': 'normal',
            'opacity': '1'
          });

          $('.liste-parcours-formations').css({
            'font-weight': 'normal',
            'opacity': '1'
          });

          $(this).removeClass('parcours-visible');
          $(this).children('.table-icon-loupe').css('color', 'white');

          $('.parcours-delete-link').attr('href', '');
          $('.parcours-update-link').attr('metier', '');

        }

        else {

          $('.parcours-card-user').slideDown();

          $('.box-parcours-metier').slideDown();
          $('.box-parcours-formations').slideDown();

          $('.show-parcours-link').removeClass('parcours-visible');
          $('.table-icon-loupe').css('color', 'white');

          $(this).addClass('parcours-visible');
          $(this).children('.table-icon-loupe').css('color', 'green');

          $('.parcours-delete-link').attr('href', url);
          $('.parcours-update-link').attr('metier', metierId);

          loadParcours(parcours_id, script_tooltip);
        }
      });


      /*********************** ENREGISTRER UN PARCOURS ***********************/

      let urlUpdate = "{{ route('add_parcours') }}";

      $('.parcours-update-link').click(function(e){
        e.preventDefault();

        let selectedGlobal = $('.liste-formations').find('.selected');
        let selected = [];
        let id;
        let niveau;

        // on récupère l'ID et le niveau des formations sélectionnées
        $(selectedGlobal).each(function(k, v){
          id = parseInt($(v).attr('dbId'));
          niveau = $(v).attr('niveau');

          selected[niveau] = id;
        });

        // on récupère l'ID du métier
        metierId = $(this).attr('metier');

        editParcours(urlUpdate, token, selected, metierId);
      });


      /***************************** AVATAR/COVER *****************************/
      let image = $('.modal-image-uploaded img');

      $("input:file").change(function() {
        readURL(this);
      });

      function readURL(input) {

        if (input.files && input.files[0]) {
          let reader = new FileReader();

          reader.onload = function(e) {

            $(image).css("height", "auto");
            $(image).css("width", "auto");

            $(image).attr('src', e.target.result);

            resizeImage(image);

          }

          reader.readAsDataURL(input.files[0]);
        }
      }

      function resizeImage(image) {
        var maxWidth = 150; // Max width for the image
        var maxHeight = 150;    // Max height for the image
        var ratio = 0;  // Used for aspect ratio
        var width = image.width();    // Current image width
        var height = image.height();  // Current image height

        if (width > height) {
          ratio = maxHeight / height;
          image.css("height", maxHeight); // Set new height
          image.css("width", width * ratio);  // Scale width based on ratio
        }

        if (width < height) {
          ratio = maxWidth / width;
          image.css("width", maxWidth); // Set new width
          image.css("height", height * ratio);  // Scale height based on ratio
        }
      }

      // scroll parcours
      $(".parcours-card .card-svg").mCustomScrollbar({
          axis:"x" // horizontal scrollbar
      });



/*********************************** FILTRES ***********************************/

      /**************************** SCROLL FILTRES ****************************/

      $(".box-filtres-checkbox").mCustomScrollbar({
          axis:"y" // vertical scrollbar
      });


      /******* AUTOCOMPLETE CHAMPS SAVOIRS / SAVOIR-ETRE / MOTIVATIONS *******/

      $('#autocomplete-savoirs-filtres').focus(function(){
        autocomplete($(this), "{{ route('autocomplete_savoirs_and_savoir_faire') }}");
      });
      $('#autocomplete-savoir-etre-filtres').focus(function(){
        autocomplete($(this), "{{ route('autocomplete_savoir_etre') }}");
      });
      $('#autocomplete-motivations-filtres').focus(function(){
        autocomplete($(this), "{{ route('autocomplete_motivations') }}");
      });

      /************************** AJOUTER UN FILTRE  **************************/


      // on met toutes les box "temporaires" à la même hauteur
      setBoxHeight($('.box-filtres-checkbox-added'));

      let urlAddToSession = "{{route('put_in_session')}}";

      // ajouter un filtre temporaire
      $('.btn-add-filtre').click(function(e){
        e.preventDefault();

        let appendTo = $(this).parent().prev();
        let input = $(this).prev().val();
        let type = $(this).attr('filtre-type');
        let filtres = $('.form-check-label');
        let valide = 'non';

        // on vérifie si le filtre existe déjà
        $(filtres).each(function(k, v){
          if (input == $.trim($(v).text())) {
            valide = 'oui';
          }
        });

        if (valide == 'non' && input != '') {
          appendTo.append('<div class="form-check form-check-inline"><label class="form-check-label"><input class="form-check-input form-check-input-added position-static" type="checkbox" value="'+ input +'" name="'+type+'_added[]" checked> '+ input +' <a href="#" class="btn-add-to-resume" title="Ajouter à votre FORME" filtre-type="'+type+'"><i class="icon ion-arrow-up-a"></i></a> <a href="#" class="btn-delete-filtre-added" title="Supprimer"><i class="icon ion-close"></i></a></label></div><br>');

          valide = 'non';

          // on stocke le nouveau filtre en session
          addToSession(urlAddToSession, token, type, input);

          let highestBox = $(appendTo).height();
          $('.box-filtres-checkbox-added').css('min-height', highestBox);
        }

        // on vide l'input
        $(this).prev().val('');
      });


      // Suppression du filtre temporaire si on le décoche
      let urlDeleteFromSession = "{{route('delete_from_session')}}";

      $('body').on('click', '.btn-delete-filtre-added', function(e){
        e.preventDefault();

        let input = $(this).prev().prev().val();
        let type = $(this).prev().attr('filtre-type');

        deleteFromSession(urlDeleteFromSession, token, type, input);

        let parent = $(this).parent().parent();
        let br = parent.next();

        // on supprime le filtre temporaire
        parent.remove();
        br.remove();

        // on ajuste la hauteur des box temporaires
        setBoxHeight($('.box-filtres-checkbox-added'));
      });


      let urlAddToForme = "{{ route('user_add_competences_from_filtres') }}";

      // Click sur la flèche pour ajouter le filtre à la FORME
      $('body').on('click', '.btn-add-to-resume', function(e){
        e.preventDefault();

        // on sélectionne la box des filtres déjà enregistrés
        let appendTo = $(this).parent().parent().parent().parent().children('.box-filtres-checkbox').children().children().eq(0);

        let input = $(this).prev().val();
        let type = $(this).attr('filtre-type');

        let parent = $(this).parent().parent();
        let br = parent.next();

        // on ajoute la compétence à la forme
        addCompetenceToForme(urlAddToForme, urlDeleteFromSession, token, type, input, appendTo, parent, br)
      });




    });

  </script>
@endsection
