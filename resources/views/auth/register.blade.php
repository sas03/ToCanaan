@extends('layouts.master') @section('title', 'Inscription')

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
    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('nom') ? ' has-error' : '' }}">
            <label for="nom" class="control-label">Nom</label>

            <input id="nom" type="text" class="form-control" name="nom" value="{{ old('nom') }}" required autofocus>

            @if ($errors->has('nom'))
                <span class="help-block">
                    <strong>{{ $errors->first('nom') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('prenom') ? ' has-error' : '' }}">
            <label for="prenom" class="control-label">Prénom</label>

            <input id="prenom" type="text" class="form-control" name="prenom" value="{{ old('prenom') }}" required autofocus>

            @if ($errors->has('prenom'))
                <span class="help-block">
                    <strong>{{ $errors->first('prenom') }}</strong>
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

        <div class="form-group{{ $errors->has('ville') ? ' has-error' : '' }}">
            <label for="ville" class="control-label">Ville</label>

            <input id="ville" type="text" class="form-control" name="ville" value="{{ old('ville') }}" required autofocus>

            @if ($errors->has('ville'))
                <span class="help-block">
                    <strong>{{ $errors->first('ville') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('code_postal') ? ' has-error' : '' }}">
            <label for="code_postal" class="control-label">Code postal</label>

            <input id="code_postal" type="text" class="form-control" name="code_postal" value="{{ old('code_postal') }}" required autofocus>

            @if ($errors->has('code_postal'))
                <span class="help-block">
                    <strong>{{ $errors->first('code_postal') }}</strong>
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
