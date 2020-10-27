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
  <hr class="bg-rose trait-titre">

@endsection

@section('content')

  {{-- ----------------- CONTACT ----------------- --}}

  <div class="row row-contact justify-content-center">
    <div class="col-lg-12">
      <h3 class="text-center">Les différents tests pour votre orientation</h3>
    </div>
  </div>

  <!-- <div class="row text-center mb-5">
    <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">
      @if (Auth::guard('web')->user())
      <a href="{{ route('orientation_test', ['id' => Auth::id()]) }}" class="btn bg-rose pt-3 pb-3 pl-5 pr-5">
      @else
        <a href="{{ route('login') }}" class="btn bg-rose pt-3 pb-3 pl-5 pr-5">
      @endif
        Identifiez-vous</a>
        @if (Auth::guard('web')->user())
        <a href="{{ route('orientation_test', ['id' => Auth::id()]) }}" class="btn bg-rose pt-3 pb-3 pl-5 pr-5">
        @else
      <a href="{{ route('register') }}" class="btn bg-rose pt-3 pb-3 pl-5 pr-5 m-3">@endif Inscrivez-vous</a>
      <a href="{{ route('home') }}" class="btn bg-rose pt-3 pb-3 pl-5 pr-5">Revenir sur ToCanaan</a></div>
  </div> -->
  
  <div class="row mb-5">
    <div class="col-md-12 bg-light-rose border border-primary rounded custom-card">
      <h4 class="text-center">Information</h4>
      <p class="text-center">Le test est divisé en 3 tests indépendants: vous pouvez n'en passer qu'un ou deux mais il est nécessaire d'avoir validé les trois tests pour obtenir la liste des métiers "faits pour vous". </p>
    </div>
  </div>


{{-- <div class="bg-dark border border-primary rounded"> --}}
<div class="row text-center mb-5">
  <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">
      <a href="{{ route('orientation_test_interetpro', ['id' => Auth::id()]) }}" class="btn bg-rose pt-3 pb-3 mr-5">
      Intérêts professionnels</a>
      @if (Auth::guard('web')->user())
      <a href="{{ route('orientation_test_motivation', ['id' => Auth::id()]) }}" class="btn bg-rose pt-3 pb-3 pl-5 pr-5 mr-5">
      @else
    <a href="{{ route('register') }}" class="btn bg-rose pt-3 pb-3 pl-5 pr-5 m-3">@endif Motivations</a>
    <a href="{{ route('orientation_test_personalite', ['id' => Auth::id()]) }}" class="btn bg-rose pt-3 pb-3 pl-5 pr-5">Personalité</a></div>
</div>


@endsection


{{--
  <div class="row row-contact justify-content-center">
    <div class="col-lg-8 col-md-4"></div>
    <div class="col-lg-8 col-md-4">
      <table class="table border">
        <thead>
          <tr>
            <th style="border: 1px solid white">Test Name</th>
            <th style="border: 1px solid white">Time</th>
            <th style="border: 1px solid white">Notes</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="border: 1px solid white">Math</td>
            <td style="border: 1px solid white">2PM</td>
            <td style="border: 1px solid white">20</td>
          </tr>
          <tr>
            <td style="border: 1px solid white">Physic</td>
            <td style="border: 1px solid white">1PM</td>
            <td style="border: 1px solid white">13</td>
          </tr>
          <tr>
            <td style="border: 1px solid white">Chimie</td>
            <td style="border: 1px solid white">11AM</td>
            <td style="border: 1px solid white">15</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="col-lg-8 col-md-4"></div>
  </div>
@endsection --}}
