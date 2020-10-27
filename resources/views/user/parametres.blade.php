@extends('layouts.master') @section('title', 'Paramètres')

@section('main_title')
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <h4 class="text-uppercase">Mes paramètres</h4>
      </div>

    </div>

  </div>

  <hr class="bg-jaune trait-titre">
@endsection

@section('content')

<div class="row">

  <div class="col-lg-12">

    <a class="btn btn-default" href="{{ route('edit_profil') }}" role="button">Modifier ou compléter mon profil</a>
    <a class="btn btn-default" href="{{ route('edit_password') }}" role="button">Modifier mon mot de passe</a>
    <a class="btn btn-default" href="{{ route('user_visibilite') }}" role="button">Modifier les options de visibilité de mon profil</a>

  </div>

</div>
@endsection
