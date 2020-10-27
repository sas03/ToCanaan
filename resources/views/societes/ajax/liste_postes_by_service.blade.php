@if (count($servicePostes) > 0)
  @foreach ($servicePostes as $poste)
    <div class="row box-item-service">
      <div class="col-lg-11">
        <p><a href="{{ route('fiche_poste', ['id' => $poste->id]) }}">{{ mb_strtoupper($poste->nom) }}</a></p>
      </div>
      <div class="col-lg-1">
        <button type="button" id="btn-delete-poste-service" poste="{{ $poste->id }}">
          <i class="icon ion-close-round"></i>
        </button>
      </div>

    </div>
  @endforeach
@else
  <p>Vous n'avez lié aucun poste à ce service.</p>
@endif
