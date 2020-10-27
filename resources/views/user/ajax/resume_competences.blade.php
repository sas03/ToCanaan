@if (count($competences) > 0)
  @foreach ($competences as $competence)
    <button class="bg-jaune competence-added">{{ $competence->nom }} <i class="ion ion-close"></i></button>
  @endforeach
@endif
