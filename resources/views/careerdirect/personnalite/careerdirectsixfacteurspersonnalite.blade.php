{{-- Careerdirect --}}
@extends('layouts.master') @section('title', 'Fiche Careerdirect')

@section('main_title')
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <h4 class="text-uppercase">
        @if (Auth::user() && Auth::user()->id == $user->id)
          SIX FACTEURS DE PERSONNALITE
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

{{---------------------------- PERSONNALITE ---------------------------------}}
<div class="row">

  <div class="col-lg-12">
    <div class="card mb-4 bg-light-violet custom-card">
      <div class="card-body card-competences-metier" id="scroll-perso">
        <h4 class="card-title bg-vert">
          SIX FACTEURS DE PERSONNALITE
        </h4>
        <div class="container mt-4">
              <p>Ce test couvre six facteurs majeurs de votre personnalité unique:</p>
              <div class="six_factors cdchart" data-highcharts-chart="2"><div class="highcharts-container" id="highcharts-4" style="position: relative; overflow: hidden; width: 938px; height: 258px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: Dosis, sans-serif;">

                <img src="{{ asset('img/svg/chart1.svg') }}">
    <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">

      <?php
      $documents_span = $doc->getElementsByTagName('span');
      echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255,255,255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 49.75px;" transform="translate(0,0)" opacity="1"><span>'.$documents_span[53]->nodeValue, PHP_EOL.'</span></span>';
      echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255,255,255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 83.25px;" transform="translate(0,0)" opacity="1"><span>'.$documents_span[55]->nodeValue, PHP_EOL.'</span></span>';

      echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255,255,255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 116.75px;" transform="translate(0,0)" opacity="1"><span>'.$documents_span[57]->nodeValue, PHP_EOL.'</span></span>';
      echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255,255,255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 150.25px;" transform="translate(0,0)" opacity="1"><span>'.$documents_span[60]->nodeValue, PHP_EOL.'</span>&nbsp';
      echo '<span>'.$documents_span[61]->nodeValue, PHP_EOL.'</span></span>';

      echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255,255,255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 183.75px;" transform="translate(0,0)" opacity="1"><span>'.$documents_span[62]->nodeValue, PHP_EOL.'</span></span>';
      echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255,255,255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 217.25px;" transform="translate(0,0)" opacity="1"><span>'.$documents_span[64]->nodeValue, PHP_EOL.'</span></span>';
      ?></div>
    <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
      <?php
      echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255,255,255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 50.75px;" transform="translate(0,0)" opacity="1">
        <span>'.$documents_span[67]->nodeValue, PHP_EOL.'</span>&nbsp;<span>'.$documents_span[68]->nodeValue, PHP_EOL.'</span></span>';
      echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255,255,255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 84.25px;" transform="translate(0,0)" opacity="1">
        <span>'.$documents_span[70]->nodeValue, PHP_EOL.'</span>&nbsp;<span>'.$documents_span[71]->nodeValue, PHP_EOL.'</span></span>';
      echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255,255,255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 628px; top: 117.75px;" transform="translate(0,0)" opacity="1">
        <span>'.$documents_span[73]->nodeValue, PHP_EOL.'</span>&nbsp;<span>'.$documents_span[74]->nodeValue, PHP_EOL.'</span></span>';
      echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255,255,255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 151.25px;" transform="translate(0,0)" opacity="1">
        <span>'.$documents_span[75]->nodeValue, PHP_EOL.'</span></span>';
      echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255,255,255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 184.75px;" transform="translate(0,0)" opacity="1">
        <span>'.$documents_span[78]->nodeValue, PHP_EOL.'</span>&nbsp;<span>'.$documents_span[79]->nodeValue, PHP_EOL.'</span></span>';
      echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255,255,255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 218.25px;" transform="translate(0,0)" opacity="1">
        <span>'.$documents_span[81]->nodeValue, PHP_EOL.'</span>&nbsp;<span>'.$documents_span[82]->nodeValue, PHP_EOL.'</span></span>';
      ?></div>
    <div class="highcharts-axis-labels highcharts-yaxis-labels" style="position: absolute; left: 0px; top: 0px;">
      <?php
      echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 316.5px; top: 13px;" opacity="1">'.$documents_span[83]->nodeValue, PHP_EOL.'</span>';
      echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 364.5px; top: 13px;" opacity="1">'.$documents_span[84]->nodeValue, PHP_EOL.'</span>';
      echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 412.5px; top: 13px;" opacity="1">'.$documents_span[85]->nodeValue, PHP_EOL.'</span>';
      echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 441px; top: 13px;" opacity="1">'.$documents_span[86]->nodeValue, PHP_EOL.'</span>';
      echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 457px; top: 13px;" opacity="1">'.$documents_span[87]->nodeValue, PHP_EOL.'</span>';
      echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 489px; top: 13px;" opacity="1">'.$documents_span[88]->nodeValue, PHP_EOL.'</span>';
      echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 508.5px; top: 13px;" opacity="1">'.$documents_span[89]->nodeValue, PHP_EOL.'</span>';
      echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 556.5px; top: 13px;" opacity="1">'.$documents_span[90]->nodeValue, PHP_EOL.'</span>';
      echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 604.5px; top: 13px;" opacity="1">'.$documents_span[91]->nodeValue, PHP_EOL.'</span>';
      ?>
    </div></div></div>
		<script type="text/javascript">
			$(document).ready(function() {
				splitbar_chart({"labels":{"left":["<span>Accomodant(e)<\/span>","<span>Introverti(e)<\/span>","<span>Détaché(e)<\/span>","<span>(7)<\/span>&nbsp;<span>Non-structuré(e)<\/span>","<span>Prudent(e)<\/span>","<span>Conventionnel(le)<\/span>"],"right":["<span>Meneur(se)<\/span>&nbsp;<span>(9)<\/span>","<span>Extraverti(e)<\/span>&nbsp;<span>(9)<\/span>","<span>Plein(e) de compassion<\/span>&nbsp;<span>(11)<\/span>","<span>Consciencieux(se)<\/span>","<span>Aventureux(se)<\/span>&nbsp;<span>(20)<\/span>","<span>Innovateur(trice)<\/span>&nbsp;<span>(19)<\/span>"]},"data":[{"label":"Domination","score":9},{"label":"Extraversion","score":9},{"label":"Compassion","score":11},{"label":"Conscience professionnelle","score":-7},{"label":"Esprit d'aventure","score":20},{"label":"Innovation","score":19}],"height":258}, "six_factors");
			});
		</script>
    <?php
    for($p = 14; $p < 17; $p++){
      echo $documents[$p]->nodeValue.'<br><br>';
    }
    ?>
		<h3>CONFIRMER LE BILAN DE VOTRE PERSONNALITE</h3>
    <?php
    echo $documents[17]->nodeValue.'<br><br>';
    ?>
  </div></div></div></div></div>

<svg version="1.1" style="font-family:Dosis, sans-serif;font-size:12px;" xmlns="http://www.w3.org/2000/svg" width="938" height="172"><desc></desc></svg>
{{-- Fin du if($motivations) --}}

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
