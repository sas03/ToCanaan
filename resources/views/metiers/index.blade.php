@extends('layouts.master') @section('title', 'Métiers')

@section('main_title')
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <h4 class="text-uppercase">Rechercher un métier</h4>
      </div>

    </div>

  </div>

  <hr class="bg-vert trait-titre">
@endsection

@section('content')

<div class="row mb-4">

	<div class="col-lg-12 box-form-search box-form-search-metiers">
		<form action="{{ route('metiers_search') }}" method="get" class="form-inline">
			<input type="text" data-provide="typeahead" class="autocomplete-metiers form-control typeahead col-lg-10 col-md-12 col-sm-12"
			 name="q" autocomplete="off" value="">
			<button type="submit" class="btn bg-vert col-lg-2 col-md-12">Rechercher</button>
		</form>
	</div>

</div>

<div class="row">

	<div class="col-lg-12 box-titres">
		<h4 class="text-uppercase">Explorer les différents secteurs</h4>
	</div>

</div>

<hr class="bg-vert trait-titre mb-4">

<div class="row">

@foreach($secteurs as $secteur)
  @if(!empty($secteur->nom))

    <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
      <div class=" card custom-card card-explore card-explore-secteurs">
        <div class="card-body">
          <a href="{{ route('fiche_secteur', ['id' => $secteur->id]) }}">
            <h4 class="card-title">
              {{ mb_strtoupper($secteur->nom) }}
              <br>

              <span>
              @foreach($totalMetiers as $value)
                @if($value->secteur_id == $secteur->id)
                  {{ $value->count }} métiers
                @endif
              @endforeach
              </span>
            </h4>
            <img src="{{ asset('img/secteurs/' . $secteur->image) }}" alt="{{ $secteur->nom }}">
          </a>
        </div>
      </div>
    </div>

  @endif
@endforeach

</div>

@endsection
@section('javascript')
<script type="text/javascript">

	$( function() {

    // Autocomplétion
    let target = $('.autocomplete-metiers');
    let url = "{{ route('autocomplete_metiers') }}";

    autocomplete(target, url);

  })

</script>
@endsection
