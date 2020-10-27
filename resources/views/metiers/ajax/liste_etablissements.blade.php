@foreach ($etablissements as $etablissement)
  @foreach ($formationsByEtablissements as $key => $formations)
    @if ($key == $etablissement->id)
      @php
        $nbr_formations = count($formations);
      @endphp
    @endif
  @endforeach

  @if ($nbr_formations > 0)

    <tr class="liste-spacer"> </tr>
      <tr class="liste-titre liste-violet-titre">
        <td colspan="2"><i class="icon ion-home"></i> <a href="{{ route('fiche_etablissement', $etablissement->id) }}">{{ $etablissement->nom }}</a> -  <em style="font-weight:100">{{ mb_strtoupper($etablissement->statut) }}</em></td>
        <td>
          <i class="icon ion-university"></i> Formations
        </td>
      </tr>

      <tr class="liste-recherche">
        <td class="align-middle"><a href="{{ route('fiche_etablissement', ['id' => $etablissement->id ]) }}"><i class="icon ion-clipboard"></i></a></td>
        <td>
          {{ ucfirst($etablissement->adresse) }} <br>
          {{ $etablissement->code_postal }} {{ mb_strtoupper($etablissement->commune) }}
        </td>
        <td class="liste-etablissements-afficher" count="{{ $nbr_formations }}" style="width: 250px">
           @if ($nbr_formations == 1)
             Voir la formation <i class="icon ion-arrow-down-b"></i>
           @else
             Voir les {{ $nbr_formations }} formations <i class="icon ion-arrow-down-b"></i>
           @endif

        </td>
      </tr>

    @foreach ($formationsByEtablissements as $key => $formations)
      @if ($key == $etablissement->id)
        @foreach ($formations as $formation)
          <tr class="liste-recherche liste-formations-ficheMetier">
            <td colspan="3"><a href="{{ route('fiche_formation', $formation->id) }}">{{ ucfirst($formation->nom) }}</a></td>
          </tr>
        @endforeach
      @endif
    @endforeach

  @endif

@endforeach
