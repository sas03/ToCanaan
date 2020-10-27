@extends('layouts.master') @section('title', $secteur->nom)

@section('main_title')

  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <h4 class="text-uppercase">{{ $secteur->nom }}</h4>
      </div>

    </div>
  </div>

  <hr class="bg-vert trait-titre">

@endsection

@section('content')

<p>{{ $secteur->description }}</p>

<div class="row">

	<div class="col-lg-12 box-titres">
		<h4 class="text-uppercase">Rechercher un métier</h4>
	</div>

</div>

<hr class="bg-vert trait-titre mb-4">

<div class="row mb-4">

	<div class="col-lg-12 box-form-search box-form-search-metiers">
		<form action="{{ route('fiche_secteur', ['id' => $secteur->id]) }}" method="get" class="form-inline">
			<input type="text" data-provide="typeahead" class="autocomplete-metiers form-control typeahead col-lg-10 col-md-12 col-sm-12"
			 name="q" autocomplete="off" value="{{ $request->input('q') }}">
			<button type="submit" class="btn bg-vert col-lg-2 col-md-12">Rechercher</button>
		</form>
	</div>

</div>

<div class="row">

  <div class="col-lg-12 box-titres">
    <h4 class="text-uppercase">

      @if (($count == 0 || $count > 1) && empty(Request::get('q')))
        {{ $count }} métiers trouvés pour "<em>{{ $secteur->nom }}"</em>
      @elseif ($count == 1)
        1 métier trouvé pour "<em>{{ Request::get('q') }}"</em>
      @else
        {{ $count }} métiers trouvés pour "<em>{{ Request::get('q') }}"</em>
      @endif
    </h4>
  </div>

</div>

<hr class="bg-vert trait-titre mb-4">

<div class="row">
  <div class="col-lg-12">

    <table class="table table-bordered table-recherche text-center">
      <tbody>

        @foreach($metiers as $metier)
        <tr class="liste-titre liste-vert-titre">
          <td colspan="2">
            <a href="{{ route('fiche_metier', ['id' => $metier->id]) }}" class="lien-fiche">{{ ucfirst($metier->nom) }}</a>
          </td>
        </tr>
        <tr class="liste-recherche liste-vert">
          <td>
            <em> <a href="{{ route('fiche_secteur', ['id' => $secteur->id]) }}">{{ mb_strtoupper($secteur->nom) }}</a> </em>
            <br>
            {{ $metier->description }}
          </td>
          <td class="align-middle"><a href="{{ route('fiche_metier', ['id' => $metier->id]) }}"><i class="icon ion-clipboard"></i></a></td>
        </tr>
        <tr class="liste-spacer"> </tr>
        @endforeach

      </tbody>
    </table>

  </div>
</div>

<br>
@if ($metiers instanceof Illuminate\Pagination\LengthAwarePaginator)
	{!! $metiers->appends(Input::except('page'))->render('vendor.pagination.bootstrap-4') !!}

	<br>
@endif

@endsection

@section('javascript')
<script type="text/javascript">

 $( function() {

   // Autocomplétion
   let target = $('.autocomplete-metiers');
   let url = "{{ route('autocomplete_metiers') }}";
   let secteur = {{ $secteur->id }};

   autocompleteWithExtraParam(target, url, secteur);

 })

</script>
@endsection
