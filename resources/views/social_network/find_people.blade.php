@extends('layouts.master_network') @section('title', 'Réseau social')

@section('content')

<div class="row">
  <div class="col-lg-12">
    <p>Vous avez cherché : "{{ Request::input('q') }}"</p>
  </div>
</div>

<div class="row">

  <div class="col-lg-12 box-titres">
    <h4 class="text-uppercase">
      @if (count($users) == 1)
        1 personne trouvée
      @else
        {{ count($users) }} personnes trouvées
      @endif
    </h4>
  </div>

</div>

<hr class="bg-jaune trait-titre mb-4">

<div class="row">
  <div class="col-lg-7 box-user-find">
    @if (count($users) >0)
      @foreach ($users as $user)
        <a href="{{ route('social_network_profile', ['id' => $user->id]) }}">
          <div class="user-find">
            <img src="{{ asset('img/avatars/' . $user->avatar) }}" alt="Avatar de l'utilisateur" class="user-avatar"><h5>{{ ucfirst($user->prenom) }} {{ mb_strtoupper($user->nom) }} </h5>
          </div>
        </a>
      @endforeach
    @else
      <p>Nous n'avons pas trouvé d'utilisateurs correspondant à votre recherche.</p>
    @endif
  </div>

  <div class="col-lg-5">

  </div>

</div>

@endsection
