@extends('layouts.master')

@section('title', 'Orientation')

@section('main_title')

  {{-- ----------------- LOGO EN HAUT DE LA PAGE ----------------- --}}
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">
        <h4 class="text-uppercase">Test Orientation</h4>
      </div>
    </div>
  </div>
  <hr class="bg-jaune trait-titre">

@endsection

<!-- affichage de résultats -->
@section('content')
<div class="row">
  <div class="col-lg-12">
    <h3 class="text-center">Résultats</h3>
    <p class="text-center">{{$nom}} plus et {{$nom1}} moins</p>
  </div>
</div>

@if((empty($_POST['plus'])) && (empty($_POST['moins']))){
  <p>Data does not exist</p>
} @else

@endif
  {{-- ----------------- CONTACT ----------------- --}}

  <div class="row row-contact justify-content-center">
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
  </div>

  <div class="row mb-5">
    <div class="col-md-12">
    </div>
  </div>

<hr class="bg-rose trait-titre mb-3">
{{-- <div class="bg-dark border border-primary rounded"> --}}

@endsection
