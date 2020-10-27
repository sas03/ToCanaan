@if (count($posteEmployes) > 0)
  @foreach ($posteEmployes as $employe)
    <div class="row box-item-service">
      <div class="col-lg-11">
        <p><a href="{{ route('fiche_employe', ['id' => $employe->id]) }}">{{ $employe->prenom }}  {{ mb_strtoupper($employe->nom) }}</a></p>
      </div>
      <div class="col-lg-1">
        <button type="button" id="btn-delete-employe-poste" employe="{{ $employe->id }}">
          <i class="icon ion-close-round"></i>
        </button>
      </div>

    </div>
  @endforeach
@else
  <p>Vous n'avez lié aucun employé à ce poste.</p>
@endif
