@extends('Admin.layout') @section('title', 'Modification d\'un utilisateur careerdirect') @section('content')

<a href="{{ route('admin_careerdirectparam') }}" class="btn-return-back bg-jaune">< Retourner aux utilisateurs careerdirect</a>

<br>
<h3 class="text-center">
@if (!empty($careerdirectparams->id))
  Modification du statut de {{ $careerdirectparams->prenom . ' ' . $careerdirectparams->nom }}
@else
  Création d'un nouvel utilisateur careerdirect
@endif</h3>
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
      <div class="form-check">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="validate" value="wait" @if ($careerdirectparams->validate == 'wait') checked @endif>
          Utilisateur careerdirect en attente
        </label>
      </div>
      <div class="form-check">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="validate" value="active" @if ($careerdirectparams->validate == 'active') checked @endif>
          Utilisateur careerdirect activé
        </label>
      </div>

      <div class="form-group">
				<label for="lien">Lien careerdirect</label>
				<input type="text" class="form-control" id="lien" name="lien" value="{{ $careerdirectparams->lien }}">
			</div>

      <button type="submit" class="btn btn-primary">Envoyer</button>
      <a class="btn btn-danger ml-2" href="{{ route('admin_careerdirectparam') }}" role="button">Annuler</a>
    </div>
  </div>
</form>
<br> @endsection
