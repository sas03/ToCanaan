@extends('Admin.layout') @section('title', 'Modification formation') @section('content')

  <a href="{{ route('admin_formations') }}" class="btn-return-back bg-jaune">< Retourner aux formations</a>

  <br>
  <h3 class="text-center">
    @if (!empty($formation->id))
      Modification de la formation <strong>{{ $formation->nom }}</strong>
    @else
      Création d'une nouvelle formation
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
        <label for="nom">Intitulé</label>
        <input type="text" class="form-control" id="nom" name="nom" value="{{ $formation->nom }}">
      </div>

      <div class="form-group">
        <label for="contenu">Description</label>
        <textarea class="form-control" id="description" name="description" rows="5">{{ $formation->description }}</textarea>
      </div>

      <div class="form-group">
        <label for="code_rome1">Code ROME 1</label>
        <select class="form-control" id="code_rome1" name="code_rome1">
          <option value="">Choisir un code ROME</option>
          @foreach($codes as $code)
            <option value="{{ $code->code_rome }}" @if ($code->code_rome == $formation->code_rome1) selected="true" @endif>{{ $code->code_rome }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="code_rome2">Code ROME 2</label>
        <select class="form-control" id="code_rome2" name="code_rome2">
          <option value="">Choisir un code ROME</option>
          @foreach($codes as $code)
            <option value="{{ $code->code_rome }}" @if ($code->code_rome == $formation->code_rome2) selected="true" @endif>{{ $code->code_rome }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="code_rome3">Code ROME 3</label>
        <select class="form-control" id="code_rome3" name="code_rome3">
          <option value="">Choisir un code ROME</option>
          @foreach($codes as $code)
            <option value="{{ $code->code_rome }}" @if ($code->code_rome == $formation->code_rome3) selected="true" @endif>{{ $code->code_rome }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="duree">Durée</label>
        <input class="form-control" id="duree" name="duree" value="{{ $formation->duree }}">
      </div>

      <div class="form-group">
        <label for="niveau_entree">Niveau entrée</label>
        <input class="form-control" id="niveau_entree" name="niveau_entree" value="{{ $formation->niveau_entree }}">
      </div>

      <div class="form-group">
        <label for="niveau_sortie">Niveau sortie</label>
        <input class="form-control" id="niveau_sortie" name="niveau_sortie" value="{{ $formation->niveau_sortie }}">
      </div>

      <div class="form-group">
        <label for="alternance">Alternance</label>
        <input type="text" class="form-control" id="alternance" name="alternance" value="{{ $formation->alternance }}">
      </div>

      <div class="form-group">
        <label for="certifiante">Certifiante</label>
        <input type="text" class="form-control" id="certifiante" name="certifiante" value="{{ $formation->certifiante }}">
      </div>

      <div class="form-group">
        <label for="lien_rncp">Lien RNCP</label>
        <input type="text" class="form-control" id="lien_rncp" name="lien_rncp" value="{{ $formation->lien_rncp }}">
      </div>

    </div>

  </div>

  <div class="row justify-content-sm-center">
    <button type="submit" class="btn btn-primary">
      @if (!empty($formation->id))
        Modifier
      @else
        Ajouter
      @endif
    </button>
    <a class="btn btn-danger ml-2" href="{{ route('admin_formations') }}" role="button">Annuler</a>
  </div>
</form>
<br>
@endsection
