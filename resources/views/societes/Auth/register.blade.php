@extends('layouts.master') @section('title', 'Inscription Société')

@section('main_title')
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <h4 class="text-uppercase">Inscription</h4>
      </div>

    </div>

  </div>

  <hr class="bg-jaune trait-titre">
@endsection

@section('content')

<div class="row justify-content-center">

  <div class="col-md-6 box-form">
    <form class="form-horizontal" method="POST" action="{{ url('/societe_register') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('nom') ? ' has-error' : '' }}">
          <label for="nom" class="control-label">Nom de l'entreprise</label>
          <input id="nom" type="text" class="form-control" name="nom" value="{{ old('nom') }}" required autofocus>

          @if ($errors->has('nom'))
              <span class="help-block">
                  <strong>{{ $errors->first('nom') }}</strong>
              </span>
          @endif
        </div>

        <div class="form-group{{ $errors->has('siret') ? ' has-error' : '' }}">
          <label for="siret" class="control-label">N° de SIRET</label>
          <input id="siret" type="text" class="form-control" name="siret" value="{{ old('siret') }}" required>

          @if ($errors->has('siret'))
              <span class="help-block">
                  <strong>{{ $errors->first('siret') }}</strong>
              </span>
          @endif
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="control-label">Adresse mail</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
            <label for="telephone" class="control-label">Numéro de téléphone</label>
            <input id="telephone" type="text" class="form-control" name="telephone" value="{{ old('telephone') }}" required>

            @if ($errors->has('telephone'))
                <span class="help-block">
                    <strong>{{ $errors->first('telephone') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('adresse') ? ' has-error' : '' }}">
            <label for="adresse" class="control-label">Adresse postale</label>
            <input id="adresse" type="text" class="form-control" name="adresse" value="{{ old('adresse') }}" required>

            @if ($errors->has('adresse'))
                <span class="help-block">
                    <strong>{{ $errors->first('adresse') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('adresse') ? ' has-error' : '' }}">
            <label for="code_postal" class="control-label">Code postal</label>
            <input id="code_postal" type="text" class="form-control" name="code_postal" value="{{ old('code_postal') }}" required>

            @if ($errors->has('code_postal'))
                <span class="help-block">
                    <strong>{{ $errors->first('code_postal') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('adresse') ? ' has-error' : '' }}">
            <label for="ville" class="control-label">Ville</label>
            <input id="ville" type="text" class="form-control" name="ville" value="{{ old('ville') }}" required>

            @if ($errors->has('ville'))
                <span class="help-block">
                    <strong>{{ $errors->first('ville') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('adresse') ? ' has-error' : '' }}">
            <label for="nbr_employes" class="control-label">Nombre d'employés</label>
            <input id="nbr_employes" type="text" class="form-control" name="nbr_employes" value="{{ old('nbr_employes') }}" required>

            @if ($errors->has('nbr_employes'))
                <span class="help-block">
                    <strong>{{ $errors->first('nbr_employes') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('adresse') ? ' has-error' : '' }}">
            <label for="secteur_id" class="control-label">Secteur d'activité</label>
            <select class="form-control" name="secteur_id" id="exampleFormControlSelect1">
              <option value="0">Veuillez choisir un secteur</option>
              @foreach ($secteurs as $secteur)
                <option value="{{ $secteur->id }}">{{ $secteur->nom }}</option>
              @endforeach
            </select>

            @if ($errors->has('secteur_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('secteur_id') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="control-label">Mot de passe</label>
            <input id="password" type="password" class="form-control" name="password" required>

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="password-confirm" class="control-label">Confirmation du mot de passe</label>

            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary bg-jaune">
              S'inscrire
          </button>
        </div>
    </form>
</div>
</div>
@endsection
