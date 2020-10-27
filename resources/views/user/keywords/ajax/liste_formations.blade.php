{{-------------------------------- FORMATIONS --------------------------------}}
@if(count($formations) > 0)

<div class="row" id="liste-formations-keywords">

	<div class="col-lg-12 box-titres">
		<h4 class="text-uppercase">Liste des formations</h4>
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
            Cette formation dure {{ $formation->duree }}. Elle est accessible à partir du niveau "{{ mb_strtoupper($formation->niveau_entree) }}".
            <br>
          </td>
          <td class="align-middle"><a href="{{ route('fiche_formation', ['id' => $formation->id ]) }}"><i class="icon ion-clipboard"></i></a></td>
        </tr>
        <tr class="liste-spacer"> </tr>
        @endforeach

      </tbody>
    </table>

  </div>

</div>

@endif
