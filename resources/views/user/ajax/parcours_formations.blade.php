<div class="card mb-4 bg-light-rose custom-card">
  <div class="card-body">
    <h4 class="card-title bg-rose">Formations enregistrées</h4>

    <ul class="card-text">

      @foreach ($formationsSelected as $formationSelected)

        <li><a href="{{ route('fiche_formation', ['id' => $formationSelected->id]) }}">{{ ucfirst($formationSelected->nom) }}</a></li>

        @if (!$loop->last)
          <hr class="bg-rose">
        @endif

      @endforeach

    </ul>

  </div>
</div>
