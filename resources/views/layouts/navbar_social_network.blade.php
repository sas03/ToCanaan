<div class="container">
  <a class="navbar-brand" href="{{ route('social_network_index', ['id' => Auth::id()]) }}">
    <img src="{{ asset('img/logo-nav.png') }}" alt="ToCanaan">
    Social Network
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav navbar-nav-form mr-auto">
      <li class="nav-item">
        <form class="form-search-user" action="{{ route('social_network_find_people') }}" method="POST">
          {{ csrf_field() }}
          <input type="text" name="q" value="" class="autocomplete-users" data-provide="typeahead" autocomplete="off" placeholder="Rechercher un utilisateur">
          <button type="submit" name="button" class="bg-orange"> <i class="icon ion-search"></i></button>
        </form>
      </li>
    </ul>

    <ul class="navbar-nav">

      {{-- NOTIFICATIONS --}}

      {{-- <notification :userid="{{ Auth::id() }}" :unreads="{{ Auth::user()->unreadNotifications }}" id="notifications-box"></notification> --}}

      <li class="dropdown dropdown-notifications" id="markasread">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            <i class="icon ion-ios-bell"></i><span class="badge">{{ count(Auth::user()->unreadNotifications) }}</span>
          </a>

          <ul class="dropdown-menu dropdown-menu-notifications" role="menu">

          </ul>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link nav-user dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          <div class="box-navbar-network-avatar-user">
            <img src="{{ asset('img/avatars/' . Auth::user()->avatar .'?' . time() . '>') }}" alt="Photo de profil" class="navbar-avatar-user">
          </div>

          {{-- {{ ucfirst(Auth::user()->prenom) }} {{ mb_strtoupper(Auth::user()->nom) }} --}}
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="{{ route('social_network_index', ['id' => Auth::id()]) }}">Mon dashboard</a>
          <a class="dropdown-item" href="#">Mes paramètres</a>
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
    </ul>
  </div>
</div>
