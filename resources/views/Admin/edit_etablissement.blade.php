@extends('Admin.layout') @section('title', 'Modification établissement') @section('content')

  <a href="{{ route('admin_etablissements') }}" class="btn-return-back bg-jaune">< Retourner aux établissements</a>

  <br>
  <h3 class="text-center">
    @if (!empty($etablissement->id))
      Modification de l'établissement <strong>{{ $etablissement->nom }}</strong>
    @else
      Ajout d'un nouvel établissement
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

    <div class="col-lg-6">

      <div class="form-group">
        <label for="code_uai">Code UAI</label>
        <input type="text" class="form-control" id="code_uai" name="code_uai" value="{{ $etablissement->code_uai }}">
      </div>
      <div class="form-group">
        <label for="type">Type</label>
        <input type="text" class="form-control" id="type" name="type" value="{{ $etablissement->type }}">
      </div>
      <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" class="form-control" id="nom" name="nom" value="{{ $etablissement->nom }}">
      </div>
      <div class="form-group">
        <label for="sigle">Sigle</label>
        <input type="text" class="form-control" id="sigle" name="sigle" value="{{ $etablissement->sigle }}">
      </div>
      <div class="form-group">
        <label for="statut">Statut</label>
        <input type="text" class="form-control" id="statut" name="statut" value="{{ $etablissement->statut }}">
      </div>
      <div class="form-group">
        <label for="universite">Université</label>
        <input type="text" class="form-control" id="universite" name="universite" value="{{ $etablissement->universite }}">
      </div>
      <div class="form-group">
        <label for="adresse">Adresse</label>
        <input type="text" class="form-control" id="adresse" name="adresse" value="{{ $etablissement->adresse }}">
      </div>

      <div class="form-group">
        <label for="code_postal">Code postal</label>
        <input type="text" class="form-control" id="code_postal" name="code_postal" value="{{ $etablissement->code_postal }}">
      </div>
      <div class="form-group">
        <label for="commune">Commune</label>
        <input type="text" class="form-control" id="commune" name="commune" value="{{ $etablissement->commune }}">
      </div>
      <div class="form-group">
        <label for="telephone">Téléphone</label>
        <input type="text" class="form-control" id="telephone" name="telephone" value="{{ $etablissement->telephone }}">
      </div>

      <div class="form-group">
        <label for="departement">Département</label>
        <input type="text" class="form-control" id="departement" name="departement" value="{{ $etablissement->departement }}">
      </div>
      <div class="form-group">
        <label for="academie">Académie</label>
        <input type="text" class="form-control" id="academie" name="academie" value="{{ $etablissement->academie }}">
      </div>
      <div class="form-group">
        <label for="region">Région</label>
        <input type="text" class="form-control" id="region" name="region" value="{{ $etablissement->region }}">
      </div>

    </div>

  </div>

  <div class="row justify-content-sm-center">
    <button type="submit" class="btn btn-primary">
      @if (!empty($etablissement->id))
        Modifier
      @else
        Ajouter
      @endif
    </button>
    <a class="btn btn-danger ml-2" href="{{ route('admin_etablissements') }}" role="button">Annuler</a>
  </div>
</form>
<br>
@endsection
