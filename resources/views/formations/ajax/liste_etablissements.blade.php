@foreach ($etablissements as $etablissement)
  <tr class="liste-spacer"> </tr>

  <tr class="liste-titre liste-violet-titre">
    <td colspan="3"><a href="{{ route('fiche_etablissement', $etablissement->id) }}">{{ $etablissement->nom }}</a></td>
  </tr>
  
  <tr class="liste-recherche">
    <tr class="liste-recherche">
      <td colspan="2">
        <em>{{ mb_strtoupper($etablissement->statut) }}</em>
        <br>
        {{ $etablissement->adresse }} {{ $etablissement->code_postal }} {{ mb_strtoupper($etablissement->commune) }}
      </td>
      <td class="align-middle"><a href="{{ route('fiche_etablissement', ['id' => $etablissement->id ]) }}"><i class="icon ion-clipboard"></i></a></td>
  </tr>
@endforeach
