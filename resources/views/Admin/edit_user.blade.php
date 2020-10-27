@extends('Admin.layout') @section('title', 'Modification d\'un utilisateur') @section('content')

<a href="{{ route('admin_users') }}" class="btn-return-back bg-jaune">< Retourner aux utilisateurs</a>

<br>
<h3 class="text-center">
@if (!empty($user->id))
  Modification du statut de {{ $user->prenom . ' ' . $user->nom }}
@else
  Création d'un nouvel utilisateur
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
          <input class="form-check-input" type="radio" name="role" value="user" @if ($user->role == 'user') checked @endif>
          Utilisateur
        </label>
      </div>
      <div class="form-check">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="role" value="admin" @if ($user->role == 'admin') checked @endif>
          Admin
        </label>
      </div>

      <button type="submit" class="btn btn-primary">Envoyer</button>
      <a class="btn btn-danger ml-2" href="{{ route('admin_users') }}" role="button">Annuler</a>
    </div>
  </div>
</form>
<br> @endsection
