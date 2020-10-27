<div class="container">
  <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('img/logo-nav.png') }}" alt="ToCanaan"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link nav-formations" href="{{ route('formations_index') }}">Formations</a>
      </li>
      <li class="nav-item">
        <a class="nav-link nav-metiers" href="{{ route('metiers_index') }}">Métiers</a>
      </li>
      {{-- <li class="nav-item nav-item-search">
        <form id="nav-form-search" class="" action="" method="post">
          {{ csrf_field() }}
          <input type="text" name="q" value="" class="nav-search-input" placeholder="Rechercher par mots-clés">
          <button type="submit" name="button" class="nav-search"> <i class="icon ion-search"></i></button>
          <button type="button" name="button" class="form-search-close"> <i class="icon ion-close"></i></button>
        </form>
      </li> --}}
    </ul>

    <ul class="navbar-nav">
      @if (!Auth::guard('web_societe')->user() && !Auth::guard('web')->user())
        <li class="nav-item">
          <a class="nav-link nav-user" href="{{ route('login') }}">Connexion</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-user" href="{{ route('register') }}">Inscription</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-user" href="{{ route('societe_login') }}">Espace professionnels</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-user" href="{{ route('tocanaantv') }}">ToCANAAN TV</a>
        </li>
      @endif

      @if (Auth::guard('web_societe')->user())
          <li class="nav-item">
            <a class="nav-link nav-user mr-4" href="{{ route('tocanaantv') }}">ToCANAAN TV</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link nav-user dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              <div class="box-navbar-avatar-user">
                <img src="{{ asset('img/logos/' . Auth::guard('web_societe')->user()->logo .'?' . time() . '>') }}" alt="Photo de profil" class="navbar-avatar-user">
              </div>
              {{ mb_strtoupper(Auth::guard('web_societe')->user()->nom) }}</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="{{ route('societe_index') }}">Dashboard</a>
              <a class="dropdown-item" href="{{ route('liste_services') }}">Services</a>
              <a class="dropdown-item" href="{{ route('liste_postes') }}">Postes</a>
              <a class="dropdown-item" href="{{ route('liste_employes') }}">Employés</a>
              <a class="dropdown-item" href="">Paramètres</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ route('societe_logout') }}"
                  onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                  Déconnexion
              </a>

              <form id="logout-form" action="{{ route('societe_logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
            </div>
          </li>

      @endif

      @if (Auth::guard('web')->user())
        <li class="nav-item">
          <a class="nav-link nav-user mr-4" href="{{ route('tocanaantv') }}">ToCANAAN TV</a>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link nav-user" href="#"><i class="icon ion-ios-bell"></i></a>
        </li> --}}

        <li class="nav-item dropdown">
          <a class="nav-link nav-user dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <div class="box-navbar-avatar-user">
              <img src="{{ asset('img/avatars/' . Auth::user()->avatar .'?' . time() . '>') }}" alt="Photo de profil" class="navbar-avatar-user">
            </div>

            {{ ucfirst(Auth::user()->prenom) }} {{ mb_strtoupper(Auth::user()->nom) }}</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="{{ route('user_index') }}">Mon dashboard</a>
            <a class="dropdown-item" href="{{ route('fiche_user', ['id' => Auth::user()->id]) }}">Ma FORME</a>
            <a class="dropdown-item" href="{{ route('user_parametres') }}">Mes paramètres</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                Déconnexion
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
          </div>
        </li>
        <!-- <notification :userid="{{ Auth::id() }}" :unreads="{{ Auth::user()->unreadNotifications }}" id="notifications-box"></notification> 

      <li class="dropdown dropdown-notifications" id="markasread">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            <i class="icon ion-ios-bell"></i><span class="badge">{{ count(Auth::user()->unreadNotifications) }}</span>
          </a>

          <ul class="dropdown-menu dropdown-menu-notifications" role="menu">

          </ul>
      </li> -->
        @unless(auth()->user()->unreadNotifications->isEmpty())
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="true">
                <i class="icon ion-ios-bell"></i>
                <span class="badge badge-danger ml-2">{{ Auth::user()->unreadNotifications->count() }}</span>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                @foreach(auth()->user()->unreadNotifications as $notification)
                  <a href="{{ route('showFromNotification', ['notification' => $notification->id]) }}" class="dropdown-item">{{ $notification->data['userNom'] }} vient d'ajouter ses identifiants careerdirect </strong></a>    
                @endforeach
              </div>
          </li>
        @endunless

            <!--<a class="dropdown-item" href="#">Another action <span class="badge badge-danger ml-2">1</span></a>
            <a class="dropdown-item" href="#">Something else here <span class="badge badge-danger ml-2">4</span></a>-->
          </div>
        </li>

      @endif
    </ul>
  </div>
</div>

