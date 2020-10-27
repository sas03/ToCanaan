<option value="" class="first-option">Veuillez choisir un métier</option>
@foreach ($metiers as $value)
  <option value="{{ $value->id }}" @if (isset($metier) && ($metier->id == $value->id)) selected @endif>{{ ucfirst($value->nom) }}</option>
@endforeach
