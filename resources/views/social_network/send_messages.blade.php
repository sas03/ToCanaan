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
    <div class="box-form box-form-societe">

      <form class="form-add-post" action="{{ route('social_network_send_message') }}" method="post">
        {{ csrf_field() }}

        <input type="hidden" name="receiver_id" value="{{ $user->id }}">

        <div class="form-group form-group-description">
          <textarea class="form-control" rows="3" name="message" placeholder="Envoyer un message à {{ ucfirst($user->prenom) }} {{mb_strtoupper($user->nom) }}"></textarea>
        </div>
        <input type="submit" name="btn-add-post" class="btn-add-post bg-jaune" value="Envoyer">
      </form>

    </div>

    <hr class="bg-jaune">

    @if ($messages)

      @foreach ($messages as $message)

      <div class="box-posts-user">

        <div class="title-section @if ($message->sender->id == $user->id) title-section-interlocuteur @endif">
          <a href="{{ route('social_network_profile', ['id' => $message->sender->id]) }}">
            <img src="{{ asset('img/avatars/' . $message->sender->avatar) }}" alt="Avatar de l'utilisateur" class="avatar-user">
            <h5>{{ ucfirst($message->sender->prenom) }} {{mb_strtoupper($message->sender->nom) }} - <em>{{ $message->created_at->diffForHumans() }}</em></h5>
          </a>
        </div>

        <div class="content-section">
          <p><?php echo nl2br("$message->message"); ?></p>
          <br>
        </div>
      </div>

      @endforeach

    @endif

  </div>


  {{--------------------------------- STATS ---------------------------------}}
  <div class="col-lg-2">
    @include('social_network.layouts.stats')
  </div>

</div>

@endsection
