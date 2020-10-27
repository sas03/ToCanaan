<div class="card mb-4 bg-light-vert custom-card">
  <div class="card-body">

    <h4 class="card-title bg-vert">Métier enregistré</h4>

    <div class="card-text">

      <p><a href="{{ route('fiche_metier', ['id' => $metier->id]) }}"><strong>{{ mb_strtoupper($metier->nom) }}</strong></a></p>

      <hr class="bg-vert">

      <p>{{ $metier->description }}</p>

    </div>

  </div>
</div>
