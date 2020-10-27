@extends('layouts.master_network') @section('title', 'Réseau social')

@section('content')

@include('social_network.layouts.header')

<div class="row">

  {{---------------------------------- MENU ----------------------------------}}

  <div class="col-lg-3 side-menu">
    @include('social_network.layouts.navbar_left')
  </div>


  {{-------------------------------- CONTENU --------------------------------}}

  <div class="col-lg-7">
    @if (count($messages) > 0)

      @foreach ($messages as $number)
        @foreach ($number as $message)
          @if ($loop->first)

            <a href="{{ route('social_network_messages', ['id' => $message->id]) }}">
              <div class="user-find">
                <img src="{{ asset('img/avatars/' . $message->avatar) }}" alt="Avatar de l'utilisateur" class="user-avatar"><h5>{{ ucfirst($message->prenom) }} {{ mb_strtoupper($message->nom) }} - <em>{{ count($number) }} message(s)</em></h5>
              </div>
            </a>

          @endif
        @endforeach
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
