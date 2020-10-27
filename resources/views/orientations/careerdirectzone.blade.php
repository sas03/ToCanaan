@extends('layouts.master')

@section('title', 'Orientation')

@section('main_title')

  {{-- ----------------- LOGO EN HAUT DE LA PAGE ----------------- --}}
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">
        <h4 class="text-uppercase">Espace Careerdirect</h4>
      </div>
    </div>
  </div>
  <hr class="bg-rose trait-titre">

@endsection

@section('content')

  {{-- ----------------- CONTACT ----------------- --}}

  <!-- <div class="row row-contact justify-content-center">
    <div class="col-lg-12">
      <h3 class="text-center">Test d'orientation sur Personnalité</h3>
    </div>
  </div>

  <div class="row text-center mb-5">
    <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">
      @if (Auth::guard('web')->user())
      <a href="{{ route('orientation_test_personalite', ['id' => Auth::id()]) }}" class="btn bg-rose pt-3 pb-3 pl-5 pr-5">
      @else
        <a href="{{ route('login') }}" class="btn bg-rose pt-3 pb-3 pl-5 pr-5">
      @endif
        Identifiez-vous</a>
        @if (Auth::guard('web')->user())
        <a href="{{ route('orientation_test_personalite', ['id' => Auth::id()]) }}" class="btn bg-rose pt-3 pb-3 pl-5 pr-5">
        @else
      <a href="{{ route('register') }}" class="btn bg-rose pt-3 pb-3 pl-5 pr-5 m-3">@endif Inscrivez-vous</a>
      <a href="{{ route('home') }}" class="btn bg-rose pt-3 pb-3 pl-5 pr-5">Revenir sur ToCanaan</a></div>
  </div> -->

  <div class="row mb-5">
    <div class="col-md-12">
    </div>
  </div>

<div class="bg-light-rose border border-primary rounded pl-5 pr-5 pb-5 pt-5 mb-5"> 

    <object type="text/html" data="https://careerdirect.org/sign-in" width="1000" height="1000">
  			<a href="https://careerdirect.org/sign-in">un lien vers l'URL en question si la page n'est pas chargée</a>
		</object>
</div>

<!-- Test javascript 
<div class="row">
  <div class="col-lg-12"><h3>Nombre de checks</h3></div>
</div>
<div class="row">
  <div class="col-lg-12"><p><span class="plus_results">0</span> Plus &ndash; <span class="moins_results">0</span> Moins</p></div>
</div> -->

@endsection

@section('javascript')
  <!-- <script type="text/javascript">
    $(document).ready(function() {
      $('input').change(function(){
          var plus = $('.plus:checked').length
          var moins = $('.moins:checked').length
          $('.plus_results').text(plus)
          $('.moins_results').text(moins)
      });
    });

  </script> -->

@endsection
