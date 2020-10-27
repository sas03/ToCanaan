<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">

  {{-- Utile pour les notifications --}}
  <meta http-equiv="X-UA-Compatible" content="ie-edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title') | ToCanaan</title>

	@if(App::environment('production'))

		<!-- CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/ionicons.css') }}">
		<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.css') }}">
		<link rel="stylesheet" href="{{ asset('css/style.css') }}">

		<!-- SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert2@7.1.2/dist/sweetalert2.all.js"></script>
		<script src="{{ asset('js/main.js') }}"></script>
		<script src="{{ asset('js/fonctions.js') }}"></script>

	@else
    <!-- Dev -->
		<!-- CSS -->
		<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
		<link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
		<link rel="stylesheet" href="{{ asset('css/ionicons.css') }}">
		<link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.css') }}">
		<link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @if (strpos(Route::current()->getName(), 'social_network') !== FALSE)
      <link rel="stylesheet" href="{{ asset('css/style-network.css') }}">
    @endif

		<!-- SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
		<script src="{{ asset('js/jquery-ui.min.js')}}"></script>
		<script src="{{ asset('js/popper.min.js') }}"></script>
		<script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('js/sweetalert2.all.js') }}"></script>
		<script src="{{ asset('js/main.js') }}"></script>
		<script src="{{ asset('js/fonctions.js') }}"></script>

    <style>
      .w2g-chat-input{
        display: none !important;
        background-color: red;
      }
    </style>
	@endif

</head>

<body>

  @php
    /*list($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']) =
    explode(':', base64_decode(substr($_SERVER['HTTP_AUTHORIZATION'], 6)));*/
    $password = '45zHeyF7';
    $pwd = sha1(md5($password));
    if((!isset($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW'])) || ($_SERVER['PHP_AUTH_USER'] !== 'Demonstration2019' ||  sha1(md5($_SERVER['PHP_AUTH_PW'])) !== $pwd))
    {
       header("WWW-Authenticate: Basic realm=\"test\"");
       header("HTTP/1.0 401 Unauthorized");
       exit;
    }
    else
    {
      //La j'ai tout mis en comm...
    }
  @endphp

  @auth
      <!-- ACCES ADMIN -->
    @if(Auth::user()->role == "admin")
    <nav class="navbar-admin">
      <div class="container">
        <a class="nav-link nav-user" href="{{ route('admin_dashboard') }}"> <i class="icon ion-wrench"></i> Accéder à la zone Admin </a>
      </div>
    </nav>

    @endif

    {{-- Si on est dans le réseau social --}}
    @if(strpos(Route::current()->getName(), 'social_network') !== FALSE)
    <nav class="navbar-admin">
      <div class="container">
        <a class="nav-link nav-user" href="{{ route('home') }}"> <i class="icon ion-home"></i> Retourner au site principal </a>
      </div>
    </nav>

    @endif
  @endauth

  <!-- NAVBAR -->

  @if (strpos(Route::current()->getName(), 'social_network') !== FALSE)
  <nav class="navbar navbar-expand-lg navbar-light" id="navbar-social-network">
    @include('layouts.navbar_social_network')
  </nav>

  @else
  <nav class="navbar navbar-expand-lg navbar-light">
    @include('layouts.navbar')
  </nav>
  @endif

  <!-- ALERT -->

  @if (session('fail'))
  <div class="container mt-3">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      {{ session('fail') }}
    </div>

  </div>
  @endif @if (session('success'))
  <div class="container mt-3">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      {{ session('success') }}
    </div>

  </div>
  @endif

  <div class="container-fluid">
    @yield('homepage')
  </div>

  <!-- CONTAINER -->

  <div class="container-fluid main-title">
    @yield('main_title')
  </div>

  @if (strpos(Route::current()->getName(), 'social_network') === FALSE)
    <div class="container-fluid main-sous-menu">
      @yield('main_sous_menu')
    </div>
  @endif

  <div class="container main-container">
    @yield('content')
  </div>

  <div class="arrow-up">
    <i class="icon ion-chevron-up"></i>
  </div>

  <!-- FOOTER -->
  {{-- <div class="row row-footer">
    <div class="container">
      <ul>
        <li><a href="">CGV</a></li>
        <li><a href="">Mentions légales</a></li>
        <li><a href="">Plan du site</a></li>
      </ul>
    </div>
  </div> --}}

  @yield('javascript')

</body>

</html>
