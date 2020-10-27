{{-- Careerdirect --}}
@extends('layouts.master') @section('title', 'Fiche Careerdirect')

@section('main_title')
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <h4 class="text-uppercase">
        @if (Auth::user() && Auth::user()->id == $user->id)
          VALEUR: ENVIRONNEMENT DE TRAVAIL
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
  <div class="custom-card">
    <h4 class="cdreport-header cdreport-header-alt">VOS PRIORITES RELATIVES AUX 12 ELEMENTS QUI CONCERNENT VOTRE ENVIRONNEMENT DE TRAVAIL</h4>
                <div class="highcharts-container" id="highcharts-74" style="position: relative; overflow: hidden; width: 938px; height: 400px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: Dosis, sans-serif;">
                  <img src="{{ asset('img/svg/chart35.svg') }}">
                  <div class="highcharts-legend" style="position: absolute; left: 628px; top: 94px;"><div class="null" style="position: absolute; left: 0px; top: 0px;"><div class="null" style="position: absolute; left: 0px; top: 0px;">
                    <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 3px;">
                      <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(51, 51, 51);" zindex="2">
                        <div style="text-align: left; font-family:serif; width:300px;float:left;"><b><?php echo $documents_span[910]->nodeValue, PHP_EOL ?></b></div></span></div>
                        <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 20px;">
                          <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(51, 51, 51);" zindex="2">
                            <div style="text-align: left; font-family:serif; width:300px;float:left;"><b><?php echo $documents_span[911]->nodeValue, PHP_EOL ?></b></div></span></div>
                            <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 37px;">
                              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(51, 51, 51);" zindex="2">
                                <div style="text-align: left; font-family:serif; width:300px;float:left;"><b><?php echo $documents_span[912]->nodeValue, PHP_EOL ?></b></div></span></div>
                                <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 54px;">
                                  <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(51, 51, 51);" zindex="2">
                                    <div style="text-align: left; font-family:serif; width:300px;float:left;"><b><?php echo $documents_span[913]->nodeValue, PHP_EOL ?></b></div></span></div>
                                    <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 71px;">
                                      <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(51, 51, 51);" zindex="2">
                                        <div style="text-align: left; font-family:serif; width:300px;float:left;"><?php echo $documents_span[914]->nodeValue, PHP_EOL ?></div></span></div>
                                        <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 88px;">
                                          <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(51, 51, 51);" zindex="2">
                                            <div style="text-align: left; font-family:serif; width:300px;float:left;"><?php echo $documents_span[915]->nodeValue, PHP_EOL ?></div></span></div>
                                            <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 105px;">
                                              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(51, 51, 51);" zindex="2">
                                                <div style="text-align: left; font-family:serif; width:300px;float:left;"><?php echo $documents_span[916]->nodeValue, PHP_EOL ?></div></span></div>
                                                <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 122px;">
                                                  <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(51, 51, 51);" zindex="2">
                                                    <div style="text-align: left; font-family:serif; width:300px;float:left;"><?php echo $documents_span[917]->nodeValue, PHP_EOL ?></div></span></div>
                                                    <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 139px;">
                                                      <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(51, 51, 51);" zindex="2">
                                                        <div style="text-align: left; font-family:serif; width:300px;float:left;"><?php echo $documents_span[918]->nodeValue, PHP_EOL ?></div></span></div>
                                                        <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 156px;">
                                                          <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(51, 51, 51);" zindex="2">
                                                            <div style="text-align: left; font-family:serif; width:300px;float:left;"><?php echo $documents_span[919]->nodeValue, PHP_EOL ?></div></span></div>
                                                            <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 173px;">
                                                              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(51, 51, 51);" zindex="2">
                                                                <div style="text-align: left; font-family:serif; width:300px;float:left;"><?php echo $documents_span[920]->nodeValue, PHP_EOL ?></div></span></div>
                                                                <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 190px;">
                                                                  <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(51, 51, 51);" zindex="2">
                                                                    <div style="text-align: left; font-family:serif; width:300px;float:left;"><?php echo $documents_span[921]->nodeValue, PHP_EOL ?></div></span></div></div></div></div></div>
          	<script type="text/javascript">
          		$(document).ready(function() {
          			donut_right_text_chart({"labels":{"left":[],"right":[]},"data":[{"order":1,"label":"<b>1. Harmonie<\/b>","score":12},{"order":2,"label":"<b>2. Equité<\/b>","score":11},{"order":3,"label":"<b>3. Défi<\/b>","score":10},{"order":4,"label":"<b>4. Un environnement propre<\/b>","score":9},{"order":5,"label":"5. Emploi du temps flexible","score":8},{"order":6,"label":"6. Indépendance","score":7},{"order":7,"label":"7. Bien organisé","score":6},{"order":8,"label":"8. Voyage","score":5},{"order":9,"label":"9. Variété","score":4},{"order":10,"label":"10. Aventure/Risque","score":3},{"order":11,"label":"11. Stabilité","score":2},{"order":12,"label":"12. Extérieur","score":1}],"title":"Environnement de Travail"}, "environment_chart");
          		});
          	</script>
            <h4 class="cdreport-header cdreport-header-alt">CONSIDEREZ LES QUATRE PREMIERES COMME UN CRITERE IMPORTANT DANS L’EVALUATION DE METIERS ET DE POSTES POTENTIELS</h4>
          </div>

<div class="row mb-4">
  <div class="col-lg-6 card-competences-metier mb-4">

    <div class="card mb-6 bg-light-vert custom-card">
      <div class="card-body">
        <h4 class="card-title bg-vert">1. Harmonie</h4>

        <ul class="card-text">
          <ul>
          <li>
            <p><?php echo $documents[104]->nodeValue, PHP_EOL ?></p>
          </li>
          </ul>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-lg-6 card-competences-metier mb-4">

    <div class="card mb-6 bg-light-rose custom-card">
      <div class="card-body">
        <h4 class="card-title bg-rose">2. Equité</h4>

        <ul class="card-text">
          <ul>
          <li>
            <p><?php echo $documents[105]->nodeValue, PHP_EOL ?></p>
          </li>
          </ul>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-lg-6 card-competences-metier mb-4">

    <div class="card mb-6 bg-light-rose custom-card">
      <div class="card-body">
        <h4 class="card-title bg-rose">3. Défi</h4>

        <ul class="card-text">
          <ul>
          <li>
            <p><?php echo $documents[106]->nodeValue, PHP_EOL ?></p>
          </li>
          </ul>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-lg-6 card-competences-metier mb-4">

    <div class="card mb-6 bg-light-vert custom-card">
      <div class="card-body">
        <h4 class="card-title bg-vert">4. Un environnement propre</h4>

        <ul class="card-text">
          <ul>
          <li>
            <p><?php echo $documents[107]->nodeValue, PHP_EOL ?></p>
          </li>
          </ul>
        </ul>
      </div>
    </div>
  </div>
</div>

                <?php
                //loader un document html et ressortir un element(paragraph ici) du document
                /*
                $doc = new DOMDocument();
                libxml_use_internal_errors(true);
                $doc->loadHTMLFile(route('career_direct_fiche'));// loads html file
                libxml_clear_errors();
                $documents = $doc->getElementById('para-perso');
                $documents_svg = $doc->getElementsByTagName('svg');
                $documents_parafac = $doc->getElementById('para-facteurs');

                $imagepaths = array();
                $documents_image = $doc->getElementsByTagName('img');
                foreach($documents_image as $tag) {
                    // pour regrouper toutes les sources d'images dans une liste
                    $imagepaths[]=$tag->getAttribute('src');
                }
                echo '<img src='.$imagepaths[1].'/>';

                echo $documents->nodeValue, PHP_EOL;//PHP_EOL garantit le correct retour de ligne
                echo $documents_image[0]->nodeValue, PHP_EOL;
                /*foreach($documents_svg as $document){
                  echo $document->nodeValue, PHP_EOL;//PHP_EOL garantit le correct retour de ligne
                }
                echo $documents_parafac->nodeValue, PHP_EOL;

                $xpath = new DOMXpath($doc);
                $bath = $xpath->query('//div[contains(@class, "highcharts-axis-labels highcharts-xaxis-labels")]'); //instance of DOMNodeList
                //echo $bath[0]->nodeValue, PHP_EOL;
                foreach($bath as $document){
                  echo $document->nodeValue, PHP_EOL;//PHP_EOL garantit le correct retour de ligne
                }*/
                ?>

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

    $(function () {
      $(".card-competences-metier .card-text").mCustomScrollbar({axis:'yx'});
    });
  </script>
@endsection
