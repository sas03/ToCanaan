@extends('layouts.master')

@section('title', 'Orientation')

@section('main_title')

  {{-- ----------------- LOGO EN HAUT DE LA PAGE ----------------- --}}
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">
        <h4 class="text-uppercase">Paramètres d'identification</h4>
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
  
        @if ($careerdirectparam != NULL)
          {{ $careerdirectparam }}
        @else
          {{ $careerdirectparam, 'is NULL' }}
        @endif


        <?php 
          echo "<br>";
          if(isset($_POST["email"]) && (!in_array($adresse, $param))){
            echo "User with the following email adresse: " . $_POST["email"] . " was inserted in careerdirectparams - table";
          } 
          if(isset($_POST["email"]) && (in_array($adresse, $param))){
            echo "User with the following email adresse: " . $_POST["email"] . " already exist in careerdirectparams - table";
          }
        ?>


  <div class="row mb-5">
    <div class="col-md-12">
    </div>
  </div>

<div class="row">
<div class="col-md-3"></div>

<div class="bg-light-rose border border-primary rounded pl-5 pr-5 pb-5 pt-5 col-md-6"> 

<!-- A remplacer orientation_insert -->
<form method="post" name="formulaire" action="{{ route('careerdirectparam') }}" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="prenom">Prénom</label>
    <input type="text" class="form-control" id="prenom" placeholder="prenom" name="prenom" required>
    <!-- <small class="form-text text-muted">Sensitive content</small> -->
  </div>
  <div class="form-group">
    <label for="nom">Nom de famille</label>
    <input type="text" class="form-control" id="nom" placeholder="Nom de famille" name="nom" required>
  </div>
  <div class="form-group">
    <label for="email">Adresse de courriel</label>
    <input type="text" class="form-control" id="email" placeholder="Adresse de courriel" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
  </div>
  <div class="form-group">
    <label for="confirmemail">Confirmer le courriel</label>
    <input type="text" class="form-control" id="confirmemail" placeholder="Confirmer le courriel" name="confirmemail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
  </div>
  <div class="form-group">
    <label for="language">Langue de l'invité</label>
    <select name="language" id="language" class="form-control">
        <option value="English">English</option>
        <option value="French">French</option>
    </select>
  </div> 
  <div class="form-group">
    <label for="language">Déjà identifié ? </label>
    <a href="{{ route('careerdirectzone', ['id' => Auth::id()]) }}" class="text-jaune">Log in</a>
  </div>  

  <!-- <div class="form-check">
    <input type="checkbox" class="form-check-input" id="checkbox">
    <label class="form-check-label" for="checkbox">Check me out</label>
  </div> -->
  <button type="submit" class="btn btn-primary">Continuer</button>
</form>
</div>

<div class="col-md-3"></div>
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
