@extends('layouts.master') 

<style>
  #div_left {
	  display: inline-block;
	  padding-left:0px !important;
  }
</style>

@section('title', 'Connexion')

@section('main_title')

		{{-- ----------------- LOGO EN HAUT DE LA PAGE ----------------- --}}
  
    <div class="container">
      <div class="row">

        <div class="col-lg-12">
          <h4 class>ToCANAAN TV</h4>
        </div>

      </div>
    </div>
    <hr class="bg-jaune trait-titre mb-4">

@endsection

@section('content')
    <div class="row justify-content-center" allow="fullscreen">
      <div class="col-lg-12">
        <div class="card mb-4 bg-light-jaune custom-card card-description">
          <div class="card-body">
            <h4 class="card-title bg-jaune">ToCANAAN TV</h4>
            <div class="container"><p class="card-text"><iframe width="760" height="615" src="https://w2g.tv/a3esanr1twyrmqyw09" style="display: block; margin: 0 auto" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></p></div> 
            <!-- <div class="container"><p class="card-text"><script src="{{ asset('js/mycircletv.js') }}"></script></p></div> -->
            <!-- <div class="container" style="text-align: center"><p class="card-text"><script src="https://www.mycircle.tv/jslib/193-36218-86/8903-9747-41?tabs=no"></script></p></div> -->
          </div>
        </div>
      </div>
    </div>  
 

	@endsection 

@section('javascript')
  <script type="text/javascript">
    $(function () {
      $(".card-metiers-connexes").mCustomScrollbar();
      $(".card-competences-metier .card-text").mCustomScrollbar();
    });


    $(document).ready(function() {
      $('.w2g-chat-input').remove('w2g-chat-input');
    });

    .db_lib {
	display:inline-block;
	font-size:12px;
	color:#000000;
	position: relative;
	top: 1px;
}
#dashboard {
	padding:0px;
	background-image: url(frise.png);
	background-repeat:repeat-x;
	background-position:center center; 
}
#div_dashboard1 {
	margin:auto;
}
#video_title {
	padding-left: 25px;
	padding-top: 10px;
}

#div_right {
	display: inline-block;
}
#div_left {
	display: inline-block;
	padding-left:25px;
}

#onglets {
	display:inline-block;
	margin:auto;
	/* min-width:300px; */
	vertical-align: top;
}

#rs_tab_histo, #rs_tab_search, #rs_tab_chat, #rs_tab_playlist, #rs_tab_clouds, #rs_tab_users {
	height:100%;
}

  </script>
@endsection