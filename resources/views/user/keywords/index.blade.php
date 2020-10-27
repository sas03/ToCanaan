@extends('layouts.master') @section('title', 'Recherche par mots-clés')

@section('main_title')
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <h4 class="text-uppercase">Recherche</h4>
      </div>

    </div>

  </div>

  <hr class="bg-jaune trait-titre">
@endsection

@section('content')

{{--------------------------- BARRE DE RECHERCHER ---------------------------}}
<div class="row mb-4">

	<div class="col-lg-12 box-form-search box-form-search-users">
		<form action="{{ route('search_competences_process_form') }}" method="get" class="form-inline">
			<input type="text" data-provide="typeahead" id="" class="autocomplete-user-competences form-control typeahead col-lg-10 col-md-12 col-sm-12"
			 name="q" autocomplete="off" value="" placeholder="Recherche par mots-clés">
			<button type="submit" class="btn bg-jaune col-lg-2 col-md-12">Rechercher</button>
		</form>
	</div>

</div>

<div class="row">
  <div class="col-lg-12">
    <p>Filtres avancés :
      <br>
      <a href="#" class="masquer-filtres">Masquer les filtres</a> </p>
  </div>
</div>

{{--------------------------------- FILTRES ---------------------------------}}
@include('user.ajax.filtres')


{{-------------------------------- RÉSULTATS --------------------------------}}

<div class="row">

  <div class="col-lg-12 col-md-6 box-titres">
    <h4 class="text-uppercase">Résultats</h4>
  </div>

</div>

<hr class="bg-jaune trait-titre mb-4">


<div class="row">

  <div class="col-lg-6">

    <div class="mb-4 bg-rose custom-card keywords-card text-center">
      <img src="{{ asset('img/formations.png') }}" alt="" class="img-home img-fluid">
      <h2>
        @if (count($formations) == 1)
          1 formation
        @else
          {{ count($formations) }} formations
        @endif
      </h2>

      @if (count($formations) > 0)
        <div class="keywords-card-text">
          <p><a href="#liste-formations-keywords" class="link-keywords-search" category="formations">Voir la liste des formations</a></p>
          <p><a href="#" class="link-keywords-search" category="niveaux">Chercher par niveaux d'études</a></p>
        </div>
      @endif
    </div>

  </div>

  <div class="col-lg-6">

    <div class="mb-4 bg-vert custom-card keywords-card text-center">
      <img src="{{ asset('img/metiers.png') }}" alt="" class="img-home img-fluid">
      <h2>
        @if (count($metiers) == 1)
          1 métier trouvé
        @else
          {{ count($metiers) }} métiers trouvés
        @endif
      </h2>

      @if (count($metiers) > 0)
        <div class="keywords-card-text">
          <p><a href="#" class="link-keywords-search" category="metiers">Voir la liste des métiers</a></p>
          <p><a href="#" class="link-keywords-search" category="secteurs">Chercher par secteurs</a></p>
        </div>
      @endif
    </div>

  </div>

</div>

<div class="row row-categories-keywords">
  <div class="col-lg-12">

  </div>
</div>


<div class="row row-listing-keywords">
  <div class="col-lg-12">

  </div>
</div>

<div class="spacer"></div>

@endsection

@section('javascript')

  <script type="text/javascript">

    $(function () {


      let token = "{{ csrf_token() }}";

      $('.masquer-filtres').click(function(e){
        e.preventDefault();

        if ($('.row-filtres-keywords').is(':visible')) {
          $('.row-filtres-keywords').slideUp();
          $(this).text('Afficher les filtres')
        }
        else {
          $('.row-filtres-keywords').slideDown();
          $(this).text('Masquer les filtres')
        }

      });


      /************************* AUTOCOMPLETE GLOBAL *************************/

      let target = $('.autocomplete-user-competences');
      let url = "{{ route('autocomplete_competences') }}";

      autocomplete(target, url);


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


      // ajouter un filtre temporaire
      $('.btn-add-filtre').click(function(e){
        e.preventDefault();

        // let appendTo = $(this).parent().prev().children().children().eq(0);
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
          appendTo.append('<div class="form-check form-check-inline"><label class="form-check-label"><input class="form-check-input form-check-input-added position-static" type="checkbox" value="'+ input +'" name="'+type+'_added[]" checked> '+ input +' <a href="#" class="btn-add-to-resume" title="Ajouter à votre CV" filtre-type="'+type+'"><i class="icon ion-arrow-up-a"></i></a> <a href="#" class="btn-delete-filtre-added" title="Supprimer"><i class="icon ion-close"></i></a></label></div><br>');

          valide = 'non';

          // on stocke le nouveau filtre en session
          $.ajax({
             url: "{{route('put_in_session')}}",
             type: 'post',
             data: {
             "_token": token,
               type: type,
               value: input
             }
          });

          let highestBox = $(appendTo).height();
          $('.box-filtres-checkbox-added').css('min-height', highestBox);
        }

        // on vide l'input
        $(this).prev().val('');
      });


      // Suppression du filtre temporaire si on le décoche

      let urlDelete = "{{route('delete_from_session')}}";

      $('body').on('click', '.btn-delete-filtre-added', function(e){
        e.preventDefault();

        let input = $(this).prev().prev().val();
        let type = $(this).prev().attr('filtre-type');

        deleteFromSession(urlDelete, token, type, input);

        let parent = $(this).parent().parent();
        let br = parent.next();

        // on supprime le filtre temporaire
        parent.remove();
        br.remove();

        // on ajuste la hauteur des box temporaires
        setBoxHeight($('.box-filtres-checkbox-added'));
      });

      // Click sur la flèche pour ajouter le filtre au CV
      $('body').on('click', '.btn-add-to-resume', function(e){
        e.preventDefault();

        // on sélectionne la box des filtres déjà enregistrés
        // let appendTo = $(this).parent().parent().parent().parent().parent().parent().children('.box-filtres-checkbox').children().children().eq(0);
        let appendTo = $(this).parent().parent().parent().parent().children('.box-filtres-checkbox').children().children().eq(0);

        // console.log(appendTo);

        let input = $(this).prev().val();
        let type = $(this).attr('filtre-type');

        let parent = $(this).parent().parent();
        let br = parent.next();

        $.ajax({
          url: "{{ route('user_add_competences_from_filtres') }}",
          type: "post",
          data: {
          "_token": "{{ csrf_token() }}",
          "type": type,
          "nom": input
          }
        })
        .done(function(data) {

          // on ajoute le filtre à la suite des filtres déjà enregistrées dans le CV
          appendTo.append('<div class="form-check form-check-inline"><label class="form-check-label"><input class="form-check-input position-static" type="checkbox" value="'+ data.id +'" name="'+type+'[]" checked> '+ input +'</label></div><br>');

          // on supprime le filtre temporaire
          parent.remove();
          br.remove();

          // on ajuste la hauteur des box temporaires
          setBoxHeight($('.box-filtres-checkbox-added'));

          // on supprime le filtre temporaire de la session
          deleteFromSession(urlDelete, token, type, input);
        })
        .fail(function(jqXHR, ajaxOptions, thrownError){
          console.log(thrownError);
        });

      });


      /* AFFICHER LES RÉSULTATS */

      $('.link-keywords-search').click(function(e){
        e.preventDefault();

        let category_nom = $(this).attr('category');

        // on charge le "premier niveau" des résultats
        showFirstLevelResults(category_nom);
      });

    });

  </script>
@endsection
