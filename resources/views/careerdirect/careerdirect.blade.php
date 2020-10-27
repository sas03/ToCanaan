{{-- Careerdirect --}}
@extends('layouts.master') @section('title', 'Careerdirect')

@section('main_title')
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <h4 class="text-uppercase">
        @if (Auth::user() && Auth::user()->id == $user->id)
          Fiche Careerdirect
        @else
          Profil de {{ ucfirst($user->prenom) }} {{mb_strtoupper($user->nom) }}
        @endif
        </h4>
      </div>

    </div>

  </div>

  <hr class="bg-vert trait-titre">
@endsection

@section('content')

{{-- @if (Auth::user() && Auth::user()->id == 120) --}}
@if (Auth::user() && Auth::user()->id == 120)

<div class="row">


    <div class="col-md-3 mb-3">
      <div class=" card custom-card card-explore card-explore-secteurs">
        <div class="card-body">
          <a href="{{ route('career_direct_personnalite', ['id' => Auth::id()]) }}">
            <h4 class="card-title">
              PERSONNALITE
              <br><span>&nbsp;</span>                                                                                                                                                                                                                                                                                                                                                               </span>
            </h4>
            <img src="{{ asset('img/personnalite.jpg') }}" alt="Agriculture">
          </a>
        </div>
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <div class=" card custom-card card-explore card-explore-secteurs">
        <div class="card-body">
          <a href="{{ route('career_direct_interetpro', ['id' => Auth::id()]) }}">
            <h4 class="card-title">
              INTERET PROFESSIONNEL
              <br><span>&nbsp;</span></h4>
            <img src="{{ asset('img/interetpro.jpg') }}" alt="Agriculture">
          </a>
        </div>
      </div>
    </div>

    <div class="col-md-3 mb-3">
      <div class=" card custom-card card-explore card-explore-secteurs">
        <div class="card-body">
          <a href="{{ route('career_direct_compcap', ['id' => Auth::id()]) }}">
            <h4 class="card-title">
              COMPETENCES ET CAPACITES
              <br><span>&nbsp;</span></h4>
            <img src="{{ asset('img/compcap.jpg') }}" alt="Agriculture">
          </a>
        </div>
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <div class=" card custom-card card-explore card-explore-secteurs">
        <div class="card-body">
          <a href="{{ route('career_direct_valeurs', ['id' => Auth::id()]) }}">
            <h4 class="card-title">
              VALEURS
              <br><span>&nbsp;</span></h4>
            <img src="{{ asset('img/valeurs.jpg') }}" alt="Agriculture">
          </a>
        </div>
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <div class=" card custom-card card-explore card-explore-secteurs">
        <div class="card-body">
          <a href="{{ route('career_direct_valeurssommaire', ['id' => Auth::id()]) }}">
            <h4 class="card-title">
              Sommaire
              <br><span>&nbsp;</span></h4>
            <img src="{{ asset('img/summary.jpg') }}" alt="Agriculture">
          </a>
        </div>
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <div class=" card custom-card card-explore card-explore-secteurs">
        <div class="card-body">
          <a href="{{ route('career_direct_etapessuivantes', ['id' => Auth::id()]) }}">
            <h4 class="card-title">
              Career Direct® – Etapes suivantes
              <br><span>&nbsp;</span></h4>
            <img src="{{ asset('img/nextstep.png') }}" alt="Agriculture">
          </a>
        </div>
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <div class=" card custom-card card-explore card-explore-secteurs">
        <div class="card-body">
          <a href="#">
            <h4 class="card-title">
              PLAN D'ACTION
              <br><span>&nbsp;</span></h4>
            <img src="{{ asset('img/plan.jpg') }}" alt="Agriculture">
          </a>
        </div>
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <div class=" card custom-card card-explore card-explore-secteurs">
        <div class="card-body">
          <a href="{{ route('career_direct_ressources', ['id' => Auth::id()]) }}">
            <h4 class="card-title">
              Ressources
              <br><span>&nbsp;</span></h4>
            <img src="{{ asset('img/ressources.png') }}" alt="Agriculture">
          </a>
        </div>
      </div>
    </div>
  </div>



<svg version="1.1" style="font-family:Dosis, sans-serif;font-size:12px;" xmlns="http://www.w3.org/2000/svg" width="938" height="172"><desc></desc></svg>
{{-- Fin du if($motivations) --}}
@else paragraph

@endif

@endsection

@section('javascript')
  <script type="text/javascript">
      $('#personnalite').click(function(){
        $('#para-perso').toggle();
        $([document.documentElement, document.body]).animate({
          scrollTop: $("#scroll-margin").offset().top - 100
        }, 1000);
      }),
      $('#facteurs').click(function(){
        $('#para-facteurs').toggle();
        //$('#para-perso').toggle();
        $([document.documentElement, document.body]).animate({
          scrollTop: $("#scroll-margin1").offset().top - 100
        }, 1000);
      }),
      $('#facteurs_et_sousfacteurs').click(function(){
        $('#para-facteurs_et_sousfacteurs').toggle();
        $([document.documentElement, document.body]).animate({
          scrollTop: $("#scroll-margin2").offset().top - 100
        }, 1000);
      }),
      $('#pointsforts').click(function(){
        $('#para-pointsforts').toggle();
        $([document.documentElement, document.body]).animate({
          scrollTop: $("#scroll-margin3").offset().top - 100
        }, 1000);
      }),
      $('#pointsfaibles').click(function(){
        $('#para-pointsfaibles').toggle();
        $([document.documentElement, document.body]).animate({
          scrollTop: $("#scroll-margin4").offset().top - 100
        }, 1000);
      }),
      $('#crucial').click(function(){
        $('#para-crucial').toggle();
        $([document.documentElement, document.body]).animate({
          scrollTop: $("#scroll-margin5").offset().top - 100
        }, 1000);
      }),
      $(document).ready(function(){
        $('#Cinq').click(function(){
        $('#paragraph').toggle();
        $([document.documentElement, document.body]).animate({
          scrollTop: $("#scroll-margin6").offset().top - 100
        }, 1000);
      }),
      $('#Huit').click(function(){
        $('#paragraph1').toggle();
        $([document.documentElement, document.body]).animate({
          scrollTop: $("#scroll-margin7").offset().top - 100
        }, 1000);
      }),
      $('#Scores').click(function(){
        $('#paragraph2').toggle();
        $([document.documentElement, document.body]).animate({
          scrollTop: $("#scroll-margin8").offset().top - 100
        }, 1000);
      }),
      $('#PotentialOccupations').click(function(){
        $('#paragraph3').toggle();
        $([document.documentElement, document.body]).animate({
          scrollTop: $("#scroll-margin9").offset().top - 100
        }, 1000);
      }),
      $('#Critere').click(function(){
        $('#para').toggle();
        $([document.documentElement, document.body]).animate({
          scrollTop: $("#scroll-margin10").offset().top - 100
        }, 1000);
      }),
      $('#Domaines').click(function(){
        $('#para1').toggle();
        $([document.documentElement, document.body]).animate({
          scrollTop: $("#scroll-margin11").offset().top - 100
        }, 1000);
      }),
      $('#Eval').click(function(){
        $('#para2').toggle();
        $([document.documentElement, document.body]).animate({
          scrollTop: $("#scroll-margin12").offset().top - 100
        }, 1000);
      }),
      $('#Valeurs').click(function(){
        $('#para-val').toggle();
        $([document.documentElement, document.body]).animate({
          scrollTop: $("#scroll-margin13").offset().top - 100
        }, 1000);
      }),
      $('#Environnement').click(function(){
        $('#para-val1').toggle();
        $([document.documentElement, document.body]).animate({
          scrollTop: $("#scroll-margin14").offset().top - 100
        }, 1000);
      }),
      $('#Attentes').click(function(){
        $('#para-val2').toggle();
        $([document.documentElement, document.body]).animate({
          scrollTop: $("#scroll-margin15").offset().top - 100
        }, 1000);
      }),
      $('#Vie').click(function(){
        $('#para-val3').toggle();
        $([document.documentElement, document.body]).animate({
          scrollTop: $("#scroll-margin16").offset().top - 100
        }, 1000);
      }),
      $('#Conclusion').click(function(){
        $('#para-val4').toggle();
        $([document.documentElement, document.body]).animate({
          scrollTop: $("#scroll-margin17").offset().top - 100
        }, 1000);
      }),
      $('#ToCanaan').click(function(){
        $('#para-tocanaan').toggle();
        $([document.documentElement, document.body]).animate({
          scrollTop: $("#scroll-margin18").offset().top - 100
        }, 1000);
      }),
      $('#Ressources').click(function(){
        $('#para-ressources').toggle();
        $([document.documentElement, document.body]).animate({
          scrollTop: $("#scroll-margin19").offset().top - 100
        }, 1000);
      })
    })

  </script>
@endsection
