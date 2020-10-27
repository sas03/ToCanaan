@extends('layouts.master') @section('title', 'Formations')

@section('main_title')
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <h4 class="text-uppercase">Rechercher une formation</h4>
      </div>

    </div>

  </div>

  <hr class="bg-rose trait-titre">
@endsection

@section('content')

<div class="row mb-4">

	<div class="col-lg-12 box-form-search box-form-search-formations">
		<form action="{{ route('formations_search') }}" method="get" class="form-inline">
			<input type="text" data-provide="typeahead" class="autocomplete-formations form-control typeahead col-lg-10 col-md-12 col-sm-12"
			 name="q" autocomplete="off" value="">
			<button type="submit" class="btn bg-rose col-lg-2 col-md-12">Rechercher</button>
		</form>
	</div>

</div>

<div class="row">

	<div class="col-lg-12 box-titres">
		<h4 class="text-uppercase">Explorer les différentes formations</h4>
	</div>

</div>

<hr class="bg-rose trait-titre mb-4">

<div class="row">
	<div class="col-lg-12">
		<h5><i class="icon ion-university"></i> Par niveaux d'études :</h5>
		<br>
	</div>

	@foreach($diplomes as $diplome)

	<div class="col-sm-12 col-md-6 col-lg-3 mb-3">
		<div class=" card custom-card card-explore card-explore-niveaux-etudes">
			<div class="card-body">
				<a href="{{ route('fiche_niveau_etudes', ['niveau' => $diplome->niveau_sortie]) }}">
					<h4 class="card-title">
						{{ mb_strtoupper($diplome->niveau_sortie) }}
						<br>

						<span>
							{{ $diplome->nbr_formations }} formations
						</span>
					</h4>
					<img src="{{ asset("img/niveaux/ecole.jpeg") }}" alt="">
				</a>
			</div>
		</div>
	</div>
	@endforeach
</div>
<br>

<div class="row">
	<div class="col-lg-12">
		<h5><i class="icon ion-university"></i> Par types d'établissements :</h5>
		<br>
	</div>

	@foreach($types as $type)
		<div class="col-sm-12 col-md-6 col-lg-3 mb-3">
			<div class=" card custom-card card-explore card-explore-types-etablissements">
				<div class="card-body">
					<a href="{{ route('fiche_types_etablissements', ['type' => $type->type]) }}">
						<h4 class="card-title">
							{{ mb_strtoupper($type->type) }}
              <br>

              <span>
								{{ $type->nbr_etablissements }} établissements
              </span>
						</h4>
						<img src="{{ asset("img/etablissements/lycee.jpeg") }}" alt="">
					</a>
				</div>
			</div>
		</div>
	@endforeach
</div>

@endsection

@section('javascript')
<script type="text/javascript">
	$( function() {

    // Autocomplétion
    let target = $('.autocomplete-formations');
    let url = "{{ route('autocomplete_formations') }}";

    autocomplete(target, url);

  })
</script>
@endsection
