<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">

  {{-- Utile pour les notifications --}}
  <meta http-equiv="X-UA-Compatible" content="ie-edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title') | ToCanaan Social Network</title>

	@if(App::environment('production'))

		<!-- CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/ionicons.css') }}">
		<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.css') }}">
		<link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-network.css') }}">

		<!-- SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert2@7.1.2/dist/sweetalert2.all.js"></script>
		<script src="{{ asset('js/fonctions-social-network.js') }}"></script>

	@else
    <!-- Dev -->
		<!-- CSS -->
		<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
		<link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
		<link rel="stylesheet" href="{{ asset('css/ionicons.css') }}">
		<link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.css') }}">
		<link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-network.css') }}">

		<!-- SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
		<script src="{{ asset('js/jquery-ui.min.js')}}"></script>
		<script src="{{ asset('js/popper.min.js') }}"></script>
		<script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('js/sweetalert2.all.js') }}"></script>
		<script src="{{ asset('js/fonctions-social-network.js') }}"></script>
	@endif
</head>

<body>

  <div id="app">
    <nav class="navbar-admin">
      <div class="container">
        <a class="nav-link nav-user" href="{{ route('home') }}"> <i class="icon ion-home"></i> Retourner au site principal </a>
      </div>
    </nav>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light" id="navbar-social-network">
      @include('layouts.navbar_social_network')
    </nav>

    <div class="sub-nav">
      <div class="container">

        <ul>
          <a href="{{ route('social_network_index', ['id' => Auth::id()]) }}">
            <li @if (\Route::current()->getName() == 'social_network_index') class="active" @endif><i class="icon ion-home"></i></li>
          </a>

          <a href="{{ route('social_network_wall', ['id' => Auth::id()]) }}">
            <li @if (\Route::current()->getName() == 'social_network_wall') class="active" @endif>Mon mur</li>
          </a>

          <a href="{{ route('social_network_resume', ['id' => Auth::id()]) }}">
          <li @if (\Route::current()->getName() == 'social_network_resume') class="active" @endif>Ma FORME</li>
          </a>

          <a href="{{ route('social_network_groupes', ['id' => Auth::id()]) }}">
          <li @if (\Route::current()->getName() == 'social_network_groupes') class="active" @endif>Mes groupes</li>
          </a>

          <a href="{{ route('social_network_messages_auth', ['id' => Auth::id()]) }}">
            <li @if (\Route::current()->getName() == 'social_network_messages') class="active" @endif>Mes messages</li>
          </a>
        </ul>

      </div>
    </div>

    <div class="container-fluid main-title">
      @yield('main_title')
    </div>

    <!-- CONTAINER -->
    <div class="container main-container">
      @yield('content')
    </div>

    <div class="arrow-up">
      <i class="icon ion-chevron-up"></i>
    </div>

    @yield('javascript')

    <script>

    $(function(){

      // Marquer les notifications comme lues
      $('#markasread').click(function(){
        $.get('{{ route('mark_as_read') }}');
      });


      //Autocomplétion navbar

      let results_autocompletion = [];
      let user_id;

      $('.autocomplete-users').autocomplete({

        source: function(request, response) {

          $.get("{{ route('autocomplete_users_without_mail') }}" ,{term: request.term}, function(data){
              //data = $.parseJSON(data).slice(0, 10); // on affiche seulement les 10 premiers résultats

              data = $.parseJSON(data);

              // On vide le tableau à chaque fois que l'utilisateur tape un nouveau caractère
              results_autocompletion = [];

              $.each(data, function(k, v){
                results_autocompletion.push({
                    id : v.id,
                    name : v.prenom + ' ' + v.nom.toUpperCase(),
                    value : v.prenom + ' ' + v.nom.toUpperCase()
                });
              });

              response(results_autocompletion);
            });
        },

        minLength: 3,

        select: function (e, ui) {
          $('input[name=user_id]').val(ui.item.id);
        }
      });


      // SMOOTH SCROLL vers le haut
      $(window).scroll(function(){
    		if ($(this).scrollTop() > 100) {
    			$('.arrow-up').fadeIn();
    		} else {
    			$('.arrow-up').fadeOut();
    		}
    	});

    	//Click event to scroll to top
    	$('.arrow-up').click(function(){
    		$('html, body').animate({scrollTop : 0}, 1000);
    		return false;
    	});



      /************************ EVENT FOLLOW / SUIVRE ************************/

      /* lorsque l'utilisteur clique sur le bouton "suivre" on affiche la
         liste des différents groupes */
      $('body').on('click', '.btn-follow', function(e){
        e.preventDefault();

        // on affiche/masque le sous-menu
        if ($(this).next().is(':visible')) {
          $(this).next().hide();
        }
        else {
          $('.box-follow-choose-groupe').hide();
          $(this).next().show();
        }

      });

      let token = "{{ csrf_token() }}";
      let urlFollow = "{{ route('social_network_follow') }}";

      /* Lorsque l'utilisateur clique sur un groupe */
      $('body').on('click', '.btn-choose-groupe', function(e){
        e.preventDefault();

        let topButton = $(this).parent().prev();
        let buttonSelected = $(this);
        let parent = $(this).parent();
        let groupe = $(this).attr('groupe');
        let targetId = $(this).parent().parent().children('input[type=hidden]').eq(1).val();

        followUser(urlFollow, token, targetId, groupe, topButton, buttonSelected, parent);
      });


      /********************** CHARGER LES NOTIFICATIONS **********************/
      loadNotifications();

      // On rafraîchit les notifications à intervals réguliés
      setInterval(function(){

        if (!$('.dropdown-menu-notifications').is(':visible')) {
          loadNotifications();
        }
      }, 2000);

    })
    </script>
  </div>
</body>

</html>
