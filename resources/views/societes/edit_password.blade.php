@extends('layouts.master') @section('title', 'Modifier mon mot de passe')

@section('main_title')
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <h4 class="text-uppercase">Modifier le mot de passe</h4>
      </div>

    </div>

  </div>

  <hr class="bg-jaune trait-titre">
@endsection

@section('content')

<div class="row justify-content-center">

  <div class="col-md-6 box-form">

    <form class="form-horizontal" method="POST" action="{{ route('societe_edit_password') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('old_password') ? ' has-error' : '' }}">
            <label for="old_password" class="control-label">Ancien Mot de Passe</label>

            <input id="old_password" type="password" class="form-control" name="old_password" required>

            @if ($errors->has('old_password'))
                <span class="help-block">
                    <strong>{{ $errors->first('old_password') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
            <label for="new_password" class="control-label">Nouveau Mot de Passe</label>

            <input id="new_password" type="password" class="form-control" name="new_password" required >

            @if ($errors->has('new_password'))
                <span class="help-block">
                    <strong>{{ $errors->first('new_password') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('new_password_confirmation') ? ' has-error' : '' }}">
            <label for="new_password_confirmation" class="control-label">Confirmation Nouveau Mot de Passe</label>

            <input id="new_password_confirmation" type="password" class="form-control" name="new_password_confirmation" required >

            @if ($errors->has('new_password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('new_password_confirmation') }}</strong>
                </span>
            @endif
        </div>


        <div class="form-group">
          <button type="submit" class="btn btn-primary bg-jaune">
              Enregistrer
          </button>
          <a class="btn btn-danger btn-annuler" href="{{ route('societe_index') }}" role="button">Annuler</a>
        </div>
    </form>
  </div>
</div>

@endsection
