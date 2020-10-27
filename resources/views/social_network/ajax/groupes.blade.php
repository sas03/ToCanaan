@if (count($groupes) > 0)
  @foreach ($groupes as $follow)
    <a href="{{ route('social_network_profile', ['id' => $follow->id]) }}">
      <div class="user-find">
        <img src="{{ asset('img/avatars/' . $follow->avatar) }}" alt="Avatar de l'utilisateur" class="user-avatar"><h5>{{ ucfirst($follow->prenom) }} {{ mb_strtoupper($follow->nom) }} </h5>

        @if (Auth::id() == $user->id)
          <form class="form-follow" action="" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="target_id" value="{{ $follow->id }}">

            <button type="button" name="button" class="btn-follow bg-vert" title="Se désabonner">
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
  <p>Il n'y a personne dans ce groupe.</p>
@endif
