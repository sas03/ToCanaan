@extends('layouts.master') @section('title', ucfirst($type))

@section('main_title')
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <h4 class="text-uppercase">{{ $type }}</h4>
      </div>

    </div>

  </div>

  <hr class="bg-violet trait-titre">
@endsection

@section('content')

<div class="row mb-4">

	<div class="col-lg-12 box-form-search box-form-search-etablissements">
		<form action="{{ route('fiche_types_etablissements', ['type' => $type]) }}" method="get" class="form-inline">
			<input type="text" data-provide="typeahead" class="autocomplete-etablissements form-control typeahead col-lg-10 col-md-12 col-sm-12"
			 name="q" autocomplete="off" value="{{ $request->input('q') }}" placeholder="Rechercher un établissement">
			<button type="submit" class="btn bg-violet col-lg-2 col-md-12">Rechercher</button>
		</form>
	</div>

</div>

<div class="row">
  <div class="col-lg-12 box-titres">
    <h4 class="text-uppercase">
      @if (($count == 0 || $count > 1) && empty(Request::get('q')))
        {{ $count }} établissements trouvés pour "<em>{{ $type }}</em>"
      @elseif ($count == 1)
        1 établissement trouvé pour "<em>{{ $type }}</em>"
      @else
        {{ $count }} établissements trouvés pour "<em>{{ Request::get('q') }}</em>"
      @endif
    </h4>
  </div>
</div>

<hr class="bg-violet trait-titre mb-4">

<div class="row">
  <div class="col-lg-12">

    <table class="table table-bordered table-recherche text-center table-types-etablissements">
			<tbody>
        @foreach($etablissements as $etablissement)
        <tr class="liste-titre liste-violet-titre">
          <td colspan="2">
              <a href="{{ route('fiche_etablissement', ['id' => $etablissement->id ]) }}" class="lien-fiche">{{ ucfirst($etablissement->nom) }}</a>
            </td>
          </tr>
          <tr class="liste-recherche liste-violet">
            <td>
              <em>{{ mb_strtoupper($etablissement->statut) }}</em>
              <br>
              {{ ucfirst($etablissement->adresse) }} {{ mb_strtoupper($etablissement->commune) }} {{ $etablissement->code_postal }}
              <br>
              Cet établissement propose <em>{{ count($etablissement->formations) }} formation(s)</em>.
            </td>
            <td class="align-middle"><a href="{{ route('fiche_etablissement', ['id' => $etablissement->id ]) }}"><i class="icon ion-clipboard"></i></a></td>
          </tr>
          <tr class="liste-spacer"> </tr>
        @endforeach
			</tbody>
    </table>

  </div>
</div>

<br>
@if ($etablissements instanceof Illuminate\Pagination\LengthAwarePaginator)
	{!! $etablissements->appends(Input::except('page'))->render('vendor.pagination.bootstrap-4') !!}

	<br>
@endif

@endsection

@section('javascript')
<script type="text/javascript">

	$( function() {

    // Autocomplétion
    let target = $('.autocomplete-etablissements');
    let url = "{{ route('autocomplete_etablissements') }}";
    let type = "{{ $type }}";

    autocompleteWithExtraParam(target, url, type);

  })
  
</script>
@endsection
