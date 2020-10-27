@extends('Admin.layout') @section('title', 'Modification d\un secteur') @section('content')

  <a href="{{ route('admin_secteurs') }}" class="btn-return-back bg-jaune">< Retourner aux secteurs</a>

  <br>
  <h3 class="text-center">
    @if (!empty($secteur->id))
      Modification du secteur <strong>{{ $secteur->nom }}</strong>
    @else
      Ajout d'un nouveau secteur
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
        <input type="text" class="form-control" id="nom" name="nom" value="{{ $secteur->nom }}">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description" rows="5">{{ $secteur->description }}</textarea>
      </div>
      <div class="form-group">
        <label for="image">Image</label>
        <input type="text" class="form-control" id="image" name="image" value="{{ $secteur->image }}">
      </div>

    </div>

  </div>

  <div class="row justify-content-sm-center">
    <button type="submit" class="btn btn-primary">
      @if (!empty($secteur->id))
        Modifier
      @else
        Ajouter
      @endif
    </button>
    <a class="btn btn-danger ml-2" href="{{ route('admin_secteurs') }}" role="button">Annuler</a>
  </div>
</form>
<br>
@endsection
