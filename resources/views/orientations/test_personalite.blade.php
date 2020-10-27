@extends('layouts.master')

@section('title', 'Orientation')

@section('main_title')

  {{-- ----------------- LOGO EN HAUT DE LA PAGE ----------------- --}}
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">
        <h4 class="text-uppercase">Test Orientation - Personnalité</h4>
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

<div class="bg-light-rose border border-primary rounded pl-5 pr-5 pb-5 pt-5"> 

<!-- A remplacer -->
<form method="post" name="formulaire" action="{{ route('orientation_test_personalite', ['id' => Auth::id()]) }}" enctype="multipart/form-data">
  {{ csrf_field() }}

  <div class="row">
    <div class="col-lg-4">
      <div>1 - Je pr&eacute;f&egrave;re :</div>
    </div>
    <div class="col-lg-4">
      <label><input type='radio' class="plus" name='item0'value='7'/><span>J'adore être le centre de l'attention.</span></label>
    </div>
    <div class="col-lg-4">
      <label><input type='radio' class="moins" name='item0'value='8'/><span>J'arrive à bien passer auprès de presque tout le monde.</span></label>
    </div>

    <div class="col-lg-4">
      <div>2 - Je pr&eacute;f&egrave;re :</div>
    </div>
    <div class="col-lg-4">
      <label><input type='radio' class="plus" name='item2'value='9'/><span>J'aime confronter mes points de vue à ceux des autres.</span></label>
    </div>
    <div class="col-lg-4">
      <label><input type='radio' class="moins" name='item2'value='10'/><span>J'aime prendre les décisions à l'unanimité.</span></label>
    </div>

    <div class="col-lg-4">
      <div>3 - Je pr&eacute;f&egrave;re :</div>
    </div>
    <div class="col-lg-4">
      <label><input type='radio' class="plus" name='item4'value='11'/><span>Lors d'une décision, je préfère m'appuyer sur ce que je sens être le meilleur pour moi.</span></label>
    </div>
    <div class="col-lg-4">
      <label><input type='radio' class="moins" name='item4'value='12'/><span>Il n'y a rien qui m'agace plus que l'immobilisme.</span></label>
    </div>

    <div class="col-lg-4">
      <div>4 - Je pr&eacute;f&egrave;re :</div>
    </div>
    <div class="col-lg-4">
      <label><input type='radio' class="plus" name='item6'value='13'/><span>Je fais en sorte que chaque chose soit à sa place.</span></label>
    </div>
    <div class="col-lg-4">
      <label><input type='radio' class="moins" name='item6'value='14'/><span>Je fais les choses de A à Z.</span></label>
    </div>

    <div class="col-lg-12">
      <button class="btn btn-lg btn-block bg-rose mt-5">Valider le Test </button>
    </div>
  </div>
</form>
</div>
<?php 
  if(isset($_POST['item0'])){
    $item0 = $_POST['item0'];
  } else {
    $item0 = NULL;
  }

  if($item0 != NULL){
    if($item0 != "7"){
      $value = "J'arrive à bien passer auprès de presque tout le monde.";
      echo $value."<br>";
    } else {
      $value = "J'adore être le centre de l'attention.";
      echo $value."<br>";
    }
  }

  //--
  if(isset($_POST['item2'])){
    $item2 = $_POST['item2'];
  } else {
    $item2 = NULL;
  }

  if($item2 != NULL){
    if($item2 != "9"){
      $value = "J'aime prendre les décisions à l'unanimité.";
      echo $value."<br>";
    } else {
      $value = "J'aime confronter mes points de vue à ceux des autres.";
      echo $value."<br>";
    }
  }
  //--
  if(isset($_POST['item4'])){
    $item4 = $_POST['item4'];
  } else {
    $item4 = NULL;
  }

  if($item4 != NULL){
    if($item4 != "11"){
      $value = "Il n'y a rien qui m'agace plus que l'immobilisme.";
      echo $value."<br>";
    } else {
      $value = "Lors d'une décision, je préfère m'appuyer sur ce que je sens être le meilleur pour moi.";
      echo $value."<br>";
    }
  }
  //--
  if(isset($_POST['item6'])){
    $item6 = $_POST['item6'];
  } else {
    $item6 = NULL;
  }

  if($item6 != NULL){
    if($item6 != "13"){
      $value = "Je fais les choses de A à Z.";
      echo $value."<br>";
    } else {
      $value = "Je fais en sorte que chaque chose soit à sa place.";
      echo $value."<br>";
    }
  }
  else {
    'You must check a case';
  }
?>

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
