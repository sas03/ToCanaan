@extends('layouts.master') @section('title', 'Connexion')

@section('main_title')
  
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <h4 class="text-uppercase">Espace utilisateurs</h4>
      </div>

    </div>
  </div>

  <hr class="bg-jaune trait-titre">
  
@endsection

@section('content')

<div class="row justify-content-center">
    <p>Vous avez déjà un compte :</p>
</div>

<div class="row justify-content-center">

  <div class="col-md-6 box-form">
    <h5>CONNECTEZ-VOUS</h5>
    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="control-label">Adresse mail</label>

            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
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
            <button type="submit" class="btn bg-jaune">
                Se connecter
            </button>
        </div>

        <div class="form-group">
          <div class="checkbox">
              <label>
                  <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Se souvenir de moi
              </label>
               |
              <a class="text-jaune form-link" href="{{ route('password.request') }}">
                  Mot de passe oublié ?
              </a>
          </div>
        </div>
      </form>
  </div>

</div>

<br>

<div class="row justify-content-center">

  <div class="col-md-6">
    <hr class="bg-violet trait-titre mb-4">
    <p class="text-center">Vous n'avez pas encore de compte :</p>
  </div>

</div>

<div class="row justify-content-center">

  <div class="col-md-6 box-form">
    <h5>INSCRIVEZ-VOUS</h5>

    <a class="btn bg-jaune btn-inscription" href="{{ route('register') }}">
        S'inscrire
    </a>
  </div>
</div>

@endsection
