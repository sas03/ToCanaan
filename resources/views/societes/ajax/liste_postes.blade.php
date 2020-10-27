@if (count($postes) > 0)
  <option value="" service="">Veuillez choisir un poste</option>
  @foreach ($postes as $poste)
    <option value="{{ $poste->id }}" service="{{ $poste->service_id }}">{{ ucfirst($poste->nom) }}</option>
  @endforeach
@else
  <option value="" service="">Il n'y a aucun poste disponible.</option>
@endif
