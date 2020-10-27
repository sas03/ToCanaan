{{--------------------------------- METIERS ---------------------------------}}

<div class="row" id="liste-metiers-keywords">

	<div class="col-lg-12 box-titres">
		<h4 class="text-uppercase">Liste des métiers</h4>
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
            <em>
              @foreach ($secteurs as $secteur)
                @if ($secteur->id == $metier->secteur_id)
                  <a href="{{ route('fiche_secteur', ['id' => $secteur->id]) }}">{{ mb_strtoupper($secteur->nom) }}</a>
                @endif
              @endforeach
            </em>
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
