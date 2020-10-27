@extends('layouts.master')

@section('title', 'Orientation')

@section('main_title')

  {{-- ----------------- LOGO EN HAUT DE LA PAGE ----------------- --}}
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">
        <h4 class="text-uppercase">Test Orientation - Intérêts professionnels</h4>
      </div>
    </div>
  </div>
  <hr class="bg-rose trait-titre">

@endsection

@section('content')

  {{-- ----------------- CONTACT ----------------- --}}

  <!-- <div class="row row-contact justify-content-center">
    <div class="col-lg-12">
      <h3 class="text-center">Test d'orientation sur Intérêts professionnels</h3>
    </div>
  </div> 

  <div class="row text-center mb-5">
    <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">
      @if (Auth::guard('web')->user())
      <a href="{{ route('orientation_test_interetpro', ['id' => Auth::id()]) }}" class="btn bg-rose pt-3 pb-3 pl-5 pr-5">
      @else
        <a href="{{ route('login') }}" class="btn bg-rose pt-3 pb-3 pl-5 pr-5">
      @endif
        Identifiez-vous</a>
        @if (Auth::guard('web')->user())
        <a href="{{ route('orientation_test_interetpro', ['id' => Auth::id()]) }}" class="btn bg-rose pt-3 pb-3 pl-5 pr-5">
        @else
      <a href="{{ route('register') }}" class="btn bg-rose pt-3 pb-3 pl-5 pr-5 m-3">@endif Inscrivez-vous</a>
      <a href="{{ route('home') }}" class="btn bg-rose pt-3 pb-3 pl-5 pr-5">Revenir sur ToCanaan</a></div>
  </div> -->

  <div class="row mb-5">
    <div class="col-md-12">
    </div>
  </div>

<!-- <button class="btn btn-lg btn-block bg-rose mt-5" onclick="location.href='{{ route('orientation_checkformulaire', ['id' => Auth::id()]) }}'">Valider le Test</button> -->

<div class="bg-light-rose border border-primary rounded pl-5 pr-5 pb-5 pt-5"> 
<form method="post" name="formulaire" action="{{ route('orientation_test_interetpro', ['id' => Auth::id()]) }}" enctype="multipart/form-data">
  {{ csrf_field() }}

  <div class="row">
    <div class="col-lg-8"><label>1 - Ce qui m'attire le ...</label></div>
    <div class="col-lg-2"><label>Plus</label></div>
    <div class="col-lg-2"><label>Moins</label></div>
  </div>
  <div class="row">
    <div class="col-lg-8">Etre au contact de la nature.</div>
    <div class="col-lg-2"><label><input type="radio" class="plus" name="item0" value="7"></label></div>
    <div class="col-lg-2"><label><input type="radio" class="moins" name="item0" value="8"></label></div>
  </div>
  <div class="row">
    <div class="col-lg-8"><label>Résoudre des problèmes.</label></div>
    <div class="col-lg-2"><label><input type="radio" class="plus" name="item2" value="9"></label></div>
    <div class="col-lg-2"><label><input type="radio" class="moins" name="item2" value="10"></label></div>
  </div>
  <div class="row mb-4">
    <div class="col-lg-8"><label>Créer des choses originales.</label></div>
    <div class="col-lg-2"><label><input type="radio" class="plus" name="item4" value="11"></label></div>
    <div class="col-lg-2"><label><input type="radio" class="moins" name="item4" value="12"></label></div>
  </div>

  <div class="row">
    <div class="col-lg-8"><label>2 - Ce qui m'attire le ...</label></div>
    <div class="col-lg-2"><label>plus</label></div>
    <div class="col-lg-2"><label>moins</label></div>
  </div>
  <div class="row">
    <div class="col-lg-8">Répondre aux besoins des autres.</div>
    <div class="col-lg-2"><label><input type="radio" class="plus" name="item6" value="13"></label></div>
    <div class="col-lg-2"><label><input type="radio" class="moins" name="item6" value="14"></label></div>
  </div>
  <div class="row">
    <div class="col-lg-8"><label>Réaliser des projets.</label></div>
    <div class="col-lg-2"><label><input type="radio" class="plus" name="item8" value="15"></label></div>
    <div class="col-lg-2"><label><input type="radio" class="moins" name="item8" value="16"></label></div>
  </div>
  <div class="row">
    <div class="col-lg-8"><label>Faire les choses bien.</label></div>
    <div class="col-lg-2"><label><input type="radio" class="plus" name="item10" value="17"></label></div>
    <div class="col-lg-2"><label><input type="radio" class="moins" name="item10" value="18"></label></div>
  </div>
  <div class="col-lg-12">
    <button class="btn btn-lg btn-block bg-rose mt-5">Valider le Test</button>
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
      $value = "Moins";
      echo $value."<br>";
    } else {
      $value = "Plus";
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
      $value = "Moins";
      echo $value."<br>";
    } else {
      $value = "Plus";
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
      $value = "Moins";
      echo $value."<br>";
    } else {
      $value = "Plus";
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
      $value = "Moins";
      echo $value."<br>";
    } else {
      $value = "Plus";
      echo $value."<br>";
    }
  }
  else {
    'You must check a case';
  }
  //--
  if(isset($_POST['item8'])){
    $item8 = $_POST['item8'];
  } else {
    $item8 = NULL;
  }

  if($item8 != NULL){
    if($item8 != "15"){
      $value = "Moins";
      echo $value."<br>";
    } else {
      $value = "Plus";
      echo $value."<br>";
    }
  }
  else {
    'You must check a case';
  }
  //--
  if(isset($_POST['item10'])){
    $item10 = $_POST['item10'];
  } else {
    $item10 = NULL;
  }

  if($item10 != NULL){
    if($item10 != "17"){
      $value = "Moins";
      echo $value."<br>";
    } else {
      $value = "Plus";
      echo $value."<br>";
    }
  }
  else {
    'You must check a case';
  }
?>

<!-- Nombre de checks à continuer sur une autre page || Test javascript
<div class="row">
  <div class="col-lg-12"><h3>Nombre de checks</h3></div>
</div>
<div class="row">
  <div class="col-lg-12"><p><span class="plus_results">0</span> Plus &ndash; <span class="moins_results">0</span> Moins</p></div>
</div> -->
@endsection

@section('javascript')
  <script type="text/javascript">
    $(document).ready(function() {
      $('input').change(function(){
          var plus = $('.plus:checked').length
          var moins = $('.moins:checked').length
          $('.plus_results').text(plus)
          $('.moins_results').text(moins)
      });

      $('.firstrow').change(function () {
          $('.firstrow').not(this).prop('checked', false);
      });
      $('.secondrow').change(function () {
          $('.secondrow').not(this).prop('checked', false);
      });
      $('.thirdrow').change(function () {
          $('.thirdrow').not(this).prop('checked', false);
      });
      $('.fourthrow').change(function () {
          $('.fourthrow').not(this).prop('checked', false);
      });
      $('.fifthrow').change(function () {
          $('.fifthrow').not(this).prop('checked', false);
      });
      $('.sixthrow').change(function () {
          $('.sixthrow').not(this).prop('checked', false);
      });
    });

  </script>

@endsection
