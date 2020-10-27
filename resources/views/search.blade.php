@extends('layouts.master') @section('title', 'Recherche par mots-clés') @section('content')

<div class="row">

  <div class="col-lg-8 col-md-6 box-titres">
    <h4 class="text-uppercase">Recherche</h4>
  </div>

  <div class="col-lg-4 col-md-6 box-titres">
    <a href="{{ route('user_index') }}">Revenir au dashboard</a>
  </div>

</div>

<hr class="bg-jaune trait-titre">


{{--------------------------- BARRE DE RECHERCHER ---------------------------}}
<div class="row mb-4">

	<div class="col-lg-12 box-form-search box-form-search-users">
		<form action="{{ route('search_global_process_form') }}" method="get" class="form-inline">
			<input type="text" data-provide="typeahead" id="autocomplete-global" class="form-control typeahead col-lg-10 col-md-12 col-sm-12"
			 name="q" autocomplete="off" value="" placeholder="Recherche par mots-clés">
			<button type="submit" class="btn bg-jaune col-lg-2 col-md-12">Rechercher</button>
		</form>
	</div>

</div>

{{-------------------------------- RÉSULTATS --------------------------------}}

<div class="row">

  <div class="col-lg-12 col-md-6 box-titres">
    <h4 class="text-uppercase">Résultats</h4>
  </div>

</div>

<hr class="bg-jaune trait-titre">


<div class="row">

  <div class="col-lg-6">

    <div class="mb-4 bg-rose custom-card keywords-card text-center">
      <img src="{{ asset('img/formations.png') }}" alt="" class="img-home img-fluid">
      <h2>
        @if (count($formations) == 1)
          1 formation trouvée
        @else
          {{ count($formations) }} formations trouvées
        @endif
      </h2>

      @if (count($formations) > 0)
        <div class="keywords-card-text">
          <p><a href="#" class="link-keywords-search" category="formations">Voir la liste des formations</a></p>
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

      // Autocomplétion
      $('#autocomplete-global').autocomplete({

        source: function( request, response ) {

          $.get( "{{ route('autocomplete_global') }}",{term: request.term}, function(data){
            console.log(data);
              data = $.parseJSON(data).slice(0, 10); // on affiche seulement les 10 premiers résultats

              response($.map(data, function(object){
                // on met la première lettre en majuscule
								let results = object.nom[0].toUpperCase() + object.nom.substring(1);
                return results;
              }));
            });

        },
        minLength: 3
      });

      $('.link-keywords-search').click(function(e){
        e.preventDefault();

        let category_nom = $(this).attr('category');

        showCategories(category_nom);
      });



      function showCategories(category_nom)
      {
        $.ajax({
          url: "?category=" + category_nom,
          type: "get"
        })
        .done(function(data) {

          console.log(data.request);

          $('.row-categories-keywords .col-lg-12').html(data.view);
          $('.row-listing-keywords .col-lg-12').html("");


          $('.link-keywords-search-by-category').click(function(e){
            e.preventDefault();

            console.log(data.request);

            let liste = $(this).attr('liste');
            let category = $(this).attr('category');

            showListing(liste, category);

          });

        })
        .fail(function(jqXHR, ajaxOptions, thrownError){
          console.log(thrownError);
        });
      }


      function showListing(liste, category)
      {
        $.ajax({
          url: "?liste=" + liste + '&category=' + category,
          type: "get"
        })
        .done(function(data) {
          console.log(data.request);

          $('.row-listing-keywords .col-lg-12').html(data.view);
        })
        .fail(function(jqXHR, ajaxOptions, thrownError){
          console.log(thrownError);
        });
      }

    });

  </script>
@endsection
