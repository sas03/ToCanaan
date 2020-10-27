@extends('layouts.master_network') @section('title', 'Réseau social')

@section('content')

@include('social_network.layouts.header')

<div class="row">

  <div class="col-lg-3 side-menu">
    @include('social_network.layouts.navbar_left')
  </div>

  <div class="col-lg-7 box-user-find">
    @if (count($following) > 0)
      @foreach ($following as $follow)
        <a href="{{ route('social_network_profile', ['id' => $follow->id]) }}">
          <div class="user-find">
            <img src="{{ asset('img/avatars/' . $follow->avatar) }}" alt="Avatar de l'utilisateur" class="user-avatar"><h5>{{ ucfirst($follow->prenom) }} {{ mb_strtoupper($follow->nom) }} </h5>

            @if (Auth::id() == $user->id)
              <form class="form-follow" action="" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="target_id" value="{{ $follow->id }}">

                <button type="submit" name="button" class="btn-follow bg-vert" title="Se désabonner">
                  @if ($follow->pivot->groupe == 'pere')
                    Père
                  @elseif ($follow->pivot->groupe == 'fils')
                    Fils
                  @elseif ($follow->pivot->groupe == 'ami')
                    Ami
                  @elseif ($follow->pivot->groupe == 'concurrent')
                    Concurrent
                  @elseif ($follow->pivot->groupe == 'connexion')
                    Connexion divine
                  @else
                  @endif
                </button>

                <div class="box-follow-choose-groupe">
                  <button type="button" name="groupe" class="btn-choose-groupe @if ($follow->pivot->groupe == 'pere') btn-choose-groupe-selected @else bg-jaune @endif" groupe="pere" title="">
                    Père
                  </button>
                  <button type="button" name="groupe" class="btn-choose-groupe @if ($follow->pivot->groupe == 'fils') btn-choose-groupe-selected @else bg-jaune @endif" groupe="fils" title="">
                    Fils
                  </button>
                  <button type="button" name="groupe" class="btn-choose-groupe @if ($follow->pivot->groupe == 'ami') btn-choose-groupe-selected @else bg-jaune @endif" groupe="ami" title="">
                    Ami
                  </button>
                  <button type="button" name="groupe" class="btn-choose-groupe @if ($follow->pivot->groupe == 'concurrent') btn-choose-groupe-selected @else bg-jaune @endif" groupe="concurrent" title="">
                    Concurrent
                  </button>
                  <button type="button" name="groupe" class="btn-choose-groupe @if ($follow->pivot->groupe == 'connexion') btn-choose-groupe-selected @else bg-jaune @endif" groupe="connexion" title="">
                    Connexion divine
                  </button>
                </div>
              </form>

            @endif

          </div>
        </a>

      @endforeach
    @else
      <p>Vous n'êtes abonnés à aucune personne.</p>
    @endif
  </div>

  {{--------------------------------- STATS ---------------------------------}}
  <div class="col-lg-2">
    @include('social_network.layouts.stats')
  </div>

</div>

@endsection
