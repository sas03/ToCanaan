<div class="row">

	<div class="col-lg-12 box-titres">
		<h4 class="text-uppercase">Explorer les différentes formations</h4>
	</div>

</div>

<hr class="bg-rose trait-titre mb-4">

<div class="row inner-row-categories-keywords">

	@foreach($niveaux as $niveau)

	<div class="col-sm-12 col-md-6 col-lg-3 mb-3">
		<div class="card custom-card card-explore card-explore-niveaux-etudes">
			<div class="card-body">
				<a href="#liste-formations-keywords" class="link-keywords-search-by-category" liste="formations" category="{{ $niveau }}">
					<h4 class="card-title">
						{{ mb_strtoupper($niveau) }}
						<br>

						<span>
              @foreach ($nbrOfFormationsByNiveaux as $niveau_nom => $nbrOfFormations)
                @if ($niveau_nom == $niveau)

                  @if ($nbrOfFormations == 1)
                    1 formation
                  @else
                    {{ $nbrOfFormations }} formations
                  @endif

                @endif
              @endforeach
						</span>
					</h4>
					<img src="{{ asset("img/niveaux/ecole.jpeg") }}" alt="">
				</a>
			</div>
		</div>
	</div>
	@endforeach
</div>
