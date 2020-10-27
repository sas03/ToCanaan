@extends('layouts.master') @section('title', ucfirst($niveau))

@section('main_title')

  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <h4 class="text-uppercase">Niveau {{ $niveau }}</h4>
      </div>

    </div>
  </div>

  <hr class="bg-rose trait-titre">

@endsection

@section('content')

<div class="row mb-4">

	<div class="col-lg-12 box-form-search box-form-search-formations">
		<form action="{{ route('fiche_niveau_etudes', ['niveau' => $niveau]) }}" method="get" class="form-inline">
			<input type="text" data-provide="typeahead" class="autocomplete-formations form-control typeahead col-lg-10 col-md-12 col-sm-12"
			 name="q" autocomplete="off" value="{{ $request->input('q') }}">
			<button type="submit" class="btn bg-rose col-lg-2 col-md-12">Rechercher</button>
		</form>
	</div>

</div>

<div class="row">

  <div class="col-lg-12 box-titres">
    <h4 class="text-uppercase">
      @if (($count == 0 || $count > 1) && empty(Request::get('q')))
        {{ $count }} formations trouvées pour "<em>{{ $niveau }}"</em>
      @elseif ($count == 1)
        1 formation trouvée pour "<em>{{ Request::get('q') }}"</em>
      @else
        {{ $count }} formations trouvées pour "<em>{{ Request::get('q') }}"</em>
      @endif
    </h4>
  </div>

</div>

<hr class="bg-rose trait-titre mb-4">

<div class="row">
  <div class="col-lg-12">

    <table class="table table-bordered table-recherche text-center">
      <tbody>

        @foreach ($formations as $formation)
        <tr class="liste-titre liste-rose-titre">
          <td colspan="2">
              <a href="{{ route('fiche_formation', ['id' => $formation->id ]) }}" class="lien-fiche">
                {{ ucfirst($formation->nom) }}
              </a>
            </td>
          </tr>
          <tr class="liste-recherche liste-rose">
            <td>
              <em><a href="{{ route('fiche_niveau_etudes', ['niveau' => $formation->niveau_sortie]) }}">{{ mb_strtoupper($formation->niveau_sortie) }}</a></em>
              <br>
              Cette formation  dure {{ $formation->duree }}. Elle est accessible à partir du niveau "{{ mb_strtoupper($formation->niveau_entree) }}".
              <br>
              Elle est proposée par <em><a href="{{ route('fiche_formation', ['id' => $formation->id ]) . '#formation-etablissements' }}">{{ count($formation->etablissements) }} établissement(s)</a></em>.
            </td>
            <td class="align-middle"><a href="{{ route('fiche_formation', ['id' => $formation->id ]) }}"><i class="icon ion-clipboard"></i></a></td>
          </tr>
          <tr class="liste-spacer"> </tr>
        @endforeach

      </tbody>
    </table>

  </div>
</div>

<br>
@if ($formations instanceof Illuminate\Pagination\LengthAwarePaginator)

  {{-- {{ $formations->appends($q)->links('vendor.pagination.bootstrap-4') }} --}}
  {!! $formations->appends(Input::except('page'))->render('vendor.pagination.bootstrap-4') !!}

  <br>
@endif

@endsection

@section('javascript')
<script type="text/javascript">
 $( function() {

   // Autocomplétion
   let target = $('.autocomplete-formations');
   let url = "{{ route('autocomplete_formations') }}";
   let niveau = "{{ $niveau }}";

   autocompleteWithExtraParam(target, url, niveau);

 })
</script>

@endsection
