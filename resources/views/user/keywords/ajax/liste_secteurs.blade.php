{{--------------------------------- SECTEURS ---------------------------------}}
<div class="row">

	<div class="col-lg-12 box-titres">
		<h4 class="text-uppercase">Explorer les métiers par secteurs</h4>
	</div>

</div>

<hr class="bg-vert trait-titre mb-4">

<div class="row inner-row-categories-keywords">

@foreach($secteurs as $secteur)
  @if(!empty($secteur->nom))

    <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
      <div class=" card custom-card card-explore card-explore-secteurs border-bottom-vert">
        <div class="card-body">
          <a href="" class="link-keywords-search-by-category" liste="metiers" category="{{ $secteur->id }}">
            <h4 class="card-title">
              {{ mb_strtoupper($secteur->nom) }}
              <br>

              <span>
								@foreach ($nbrOfMetiersBySecteurs as $secteur_id => $nbrOfMetiers)
									@if ($secteur_id == $secteur->id)

										@if ($nbrOfMetiers == 1)
		                	1 métier
										@else
			                {{ $nbrOfMetiers }} métiers
										@endif

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
