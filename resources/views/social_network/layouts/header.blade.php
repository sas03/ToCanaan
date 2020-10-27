<div class="header-user-outer-box">
  <div class="row row-header-dashboard-user">

    <img src="{{ asset('img/covers/' . $user->cover) }}" alt="Photo de couverture" class="photo-couverture-user">

    <div class="col-lg-12">
      <div class="box-avatar-user">
        <img src="{{ asset('img/avatars/' . $user->avatar) }}" alt="Avatar de l'utilisateur" class="avatar-user">
      </div>
      <div class="box-user-name">
        <h4>{{ ucfirst($user->prenom) }} {{mb_strtoupper($user->nom) }}</h4>
        <hr>
        <em>Inscrit(e) depuis le {{ $user->created_at->format('d/m/Y') }}</em>
      </div>

    </div>
  </div>

  {{-- Si l'utilisateur n'est pas sur son propre profil --}}
  @if ($user->id != Auth::id())
    <form class="form-follow" action="" method="post">
      {{ csrf_field() }}
      <input type="hidden" name="target_id" value="{{ $user->id }}">

      @if ($groupe == 'pere')
        <button type="button" name="button" class="btn-follow bg-vert" value="pere" title="S'abonner">Père</button>
      @endif
      @if ($groupe == 'fils')
        <button type="button" name="button" class="btn-follow bg-vert" value="fils" title="S'abonner">Fils</button>
      @endif
      @if ($groupe == 'ami')
        <button type="button" name="button" class="btn-follow bg-vert" value="ami" title="S'abonner">Ami</button>
      @endif
      @if ($groupe == 'concurrent')
        <button type="button" name="button" class="btn-follow bg-vert" value="concurrent" title="S'abonner">Concurrent</button>
      @endif
      @if ($groupe == 'connexion')
        <button type="button" name="button" class="btn-follow bg-vert" value="connexion" title="S'abonner">Connexion divine</button>
      @endif
      @if ($groupe == '')
        <button type="button" name="button" class="btn-follow bg-jaune" value="" title="S'abonner">Suivre</button>
      @endif

      <div class="box-follow-choose-groupe">
        <button type="button" name="groupe" class="btn-choose-groupe @if ($groupe == 'pere') btn-choose-groupe-selected @else bg-jaune @endif" groupe="pere" title="">
          Père
        </button>
        <button type="button" name="groupe" class="btn-choose-groupe @if ($groupe == 'fils') btn-choose-groupe-selected @else bg-jaune @endif" groupe="fils" title="">
          Fils
        </button>
        <button type="button" name="groupe" class="btn-choose-groupe @if ($groupe == 'ami') btn-choose-groupe-selected @else bg-jaune @endif" groupe="ami" title="">
          Ami
        </button>
        <button type="button" name="groupe" class="btn-choose-groupe @if ($groupe == 'concurrent') btn-choose-groupe-selected @else bg-jaune @endif" groupe="concurrent" title="">
          Concurrent
        </button>
        <button type="button" name="groupe" class="btn-choose-groupe @if ($groupe == 'connexion') btn-choose-groupe-selected @else bg-jaune @endif" groupe="connexion" title="">
          Connexion divine
        </button>
      </div>
    </form>
  @endif

</div>
