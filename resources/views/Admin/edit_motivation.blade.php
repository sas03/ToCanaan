@extends('Admin.layout') @section('title', 'Édition d\'un motivation') @section('content')

  <a href="{{ route('admin_motivations') }}" class="btn-return-back bg-jaune">< Retourner aux motivations</a>

  <br>
  <h3 class="text-center">
    @if (!empty($motivation->id))
      Modification du motivation <strong>{{ $motivation->nom }}</strong>
    @else
      Ajout d'un nouveau motivation
    @endif
  </h3>
  <br> @if ($errors->any())
  <div class="row justify-content-md-center">
    <div class="col-md-6">
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
  <br> @endif
  <form method="POST">
    {{ csrf_field() }}

  <div class="row justify-content-lg-center">

    <div class="col-lg-6 col-sm-12">

      <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" class="form-control" id="nom" name="nom" value="{{ $motivation->nom }}">
      </div>

    </div>

  </div>

  <div class="row justify-content-sm-center">
    <button type="submit" class="btn btn-primary">
      @if (!empty($savoir->id))
        Modifier
      @else
        Ajouter
      @endif
    </button>
    <a class="btn btn-danger ml-2" href="{{ route('admin_motivations') }}" role="button">Annuler</a>
  </div>
</form>
<br>
@endsection
