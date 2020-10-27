@if (count($employes) > 0)
  <option value="" poste="" service="">Veuillez choisir un employé</option>
  @foreach ($employes as $employe)
    <option value="{{ $employe->id }}" poste="{{ $employe->poste_id }}" service="{{ $employe->service_id }}">{{ $employe->prenom }}  {{ mb_strtoupper($employe->nom) }}</option>
  @endforeach
@else
  <option value="" poste="" service="">Il n'y a aucun employé disponible.</option>
@endif
