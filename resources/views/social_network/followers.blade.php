@extends('layouts.master_network') @section('title', 'Réseau social')

@section('content')

@include('social_network.layouts.header')

<div class="row">

  <div class="col-lg-3 side-menu">
    @include('social_network.layouts.navbar_left')
  </div>

  <div class="col-lg-7 box-user-find">
    @if (count($followers) > 0)
      @foreach ($followers as $follower)
        <a href="{{ route('social_network_profile', ['id' => $follower->id]) }}">
          <div class="user-find">
            <img src="{{ asset('img/avatars/' . $follower->avatar) }}" alt="Avatar de l'utilisateur" class="user-avatar"><h5>{{ ucfirst($follower->prenom) }} {{ mb_strtoupper($follower->nom) }} </h5>
          </div>
        </a>

      @endforeach
    @else
      <p>Aucune personne n'est abonné à votre compte.</p>
    @endif
  </div>

  {{--------------------------------- STATS ---------------------------------}}
  <div class="col-lg-2">
    @include('social_network.layouts.stats')
  </div>

</div>

@endsection
