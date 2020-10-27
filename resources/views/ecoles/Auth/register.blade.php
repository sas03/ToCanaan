@extends('layouts.master') @section('title', 'Inscription École')

@section('content')

<div class="row">

  <div class="col-lg-12 box-titres">
    <h4 class="text-uppercase">Inscription École</h4>
  </div>

</div>

<hr class="bg-jaune trait-titre">

<div class="row justify-content-center">

  <div class="col-md-6 box-form">
    <form class="form-horizontal" method="POST" action="{{ url('/ecole_register') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('nom') ? ' has-error' : '' }}">
          <label for="nom" class="control-label">Nom de l'école</label>
          <input id="nom" type="text" class="form-control" name="nom" value="{{ old('nom') }}" required autofocus>

          @if ($errors->has('nom'))
              <span class="help-block">
                  <strong>{{ $errors->first('nom') }}</strong>
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
