@extends('Admin.layout') @section('title', 'Édition d\'un savoir-faire') @section('content')

  <a href="{{ route('admin_savoir_faire') }}" class="btn-return-back bg-jaune">< Retourner aux savoir-faire</a>

  <br>
  <h3 class="text-center">
    @if (!empty($savoirFaire->id))
      Modification du savoir-faire <strong>{{ $savoirFaire->nom }}</strong>
    @else
      Ajout d'un nouveau savoir-faire
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
        <input type="text" class="form-control" id="nom" name="nom" value="{{ $savoirFaire->nom }}">
      </div>

    </div>

  </div>

  <div class="row justify-content-sm-center">
    <button type="submit" class="btn btn-primary">
      @if (!empty($savoirFaire->id))
        Modifier
      @else
        Ajouter
      @endif
    </button>
    <a class="btn btn-danger ml-2" href="{{ route('admin_savoir_faire') }}" role="button">Annuler</a>
  </div>
</form>
<br>
@endsection
