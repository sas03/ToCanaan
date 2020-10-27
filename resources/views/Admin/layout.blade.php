<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>@yield('title') | ToCanaan</title>

  <!-- CSS -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
  <link rel="stylesheet" href="{{ asset('css/ionicons.css') }}">
  <link rel="stylesheet" href="{{ asset('css/sweetalert2.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style-admin.css') }}">

  <!-- SCRIPTS -->
  <script src="{{ asset('js/jquery.js') }}"></script>
  <script src="{{ asset('js/jquery-ui.min.js')}}"></script>
  <script src="{{ asset('js/popper.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/sweetalert2.all.js') }}"></script>

</head>

<body>


  <div class="container-fluid">

  <div class="row row-container">
      <div class="col-nav">
        <nav class="navbar navbar-left">
          <ul class="navbar-nav">
            <li class="nav-item text-center">
              <a class="navbar-link" href="{{ route('admin_dashboard') }}"><img src="{{ asset('img/logo-nav.png') }}" alt="ToCanaan" width="150" height="30"></a>
            </li>
            <li><br></li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin_users') }}">Utilisateurs</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin_formations') }}">Formations</a>
            </li>
            <li class="nav-item">
            <a class="nav-link chevron" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
              <i class="icon ion-chevron-down"></i> Section métiers
            </a>
            </li>
            <div class="collapse text-center" id="collapseExample">
              <a class="nav-link" href="{{ route('admin_metiers') }}">Métiers</a>
              <a class="nav-link" href="{{ route('admin_secteurs') }}">Secteurs</a>
            </div>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin_etablissements') }}">Etablissements</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin_codes') }}">Codes ROME</a>
            </li>

            <li class="nav-item">
            <a class="nav-link chevron" data-toggle="collapse" href="#collapseCompetences" aria-expanded="false" aria-controls="collapseExample">
              <i class="icon ion-chevron-down"></i> Section compétences
            </a>
            </li>
            <div class="collapse text-center" id="collapseCompetences">
              <a class="nav-link" href="{{ route('admin_savoirs') }}">Savoirs</a>
              <a class="nav-link" href="{{ route('admin_savoir_faire') }}">Savoir-faire</a>
              <a class="nav-link" href="{{ route('admin_savoir_etre') }}">Savoir-être</a>
              <a class="nav-link" href="{{ route('admin_motivations') }}">Battements de coeur</a>
            </div>

            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin_careerdirectparam') }}">Careerdirect-params</a>
            </li>
          </ul>
        </nav>
      </div>

      <div class="col-content">

        <!-- NAVBAR -->
        <nav class="navbar navbar-top navbar-expand-lg">
          <div class="navbar-nav ml-auto mr-auto">
            <a class="nav-link nav-item" href="{{ route('admin_dashboard') }}">ESPACE ADMINISTRATION</a>
          </div>

          <div class="navbar-nav">
            <a class="nav-link nav-item" href="{{ route('home') }}">Retourner sur le site</a>
          </div>

          <div class="navbar-nav">
            <a class="nav-link nav-item ml-auto" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                Déconnexion
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
            </div>
          </nav>

        <!-- ALERT -->
        @if (session('fail'))
        <div class="container mt-3">
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button> {{ session('fail') }}
          </div>

        </div>
        @endif @if (session('success'))
        <div class="container mt-3">
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button> {{ session('success') }}
          </div>

        </div>
        @endif

        @yield('content')
      </div>

    </div>

  </div>

  @yield('javascript')

  <script>
    $(function() {
      $('.alert').fadeOut(3000);
      $('.chevron').click(function(){
        $(this).children('.icon').toggleClass('ion-chevron-down').toggleClass('ion-chevron-up');
      });


      $('#rstBtn').click(function(e) {
        e.preventDefault();
        $(this).closest('form').find("input[type=text]").val("");
      });
    })
  </script>

</body>

</html>
