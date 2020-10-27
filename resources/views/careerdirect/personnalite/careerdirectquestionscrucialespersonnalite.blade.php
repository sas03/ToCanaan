{{-- Careerdirect --}}
@extends('layouts.master') @section('title', 'Fiche Careerdirect')

@section('main_title')
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <h4 class="text-uppercase">
        @if (Auth::user() && Auth::user()->id == $user->id)
          Questions cruciales
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
          Questions cruciales
        </h4>
          <div class="container mt-4">
              <p><?php echo $documents[54]->nodeValue, PHP_EOL ?></p>
		<div class="cdchart life_issues" data-highcharts-chart="9">
      <div class="highcharts-container" id="highcharts-18" style="position: relative; overflow: hidden; width: 938px; height: 129px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: Dosis, sans-serif;">
        <img src="{{ asset('img/svg/chart8.svg') }}">
        <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
          <?php
          echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255,255,255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 45px;" transform="translate(0,0)" opacity="1"><span>'.$documents_span[312]->nodeValue, PHP_EOL.'</span></span>';
          echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255,255,255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 69px;" transform="translate(0,0)" opacity="1"><span>'.$documents_span[315]->nodeValue, PHP_EOL.'</span></span>';

          echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255,255,255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 93px;" transform="translate(0,0)" opacity="1"><span>'.$documents_span[318]->nodeValue, PHP_EOL.'</span></span>';
          ?></div>
                  <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                    <?php
                    echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255,255,255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 46px;" transform="translate(0,0)" opacity="1">
                      <span>'.$documents_span[320]->nodeValue, PHP_EOL.'</span></span>';
                      echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255,255,255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 628px; top: 70px;" transform="translate(0,0)" opacity="1">
                        <span>'.$documents_span[322]->nodeValue, PHP_EOL.'</span></span>';
                      echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255,255,255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 628px; top: 94px;" transform="translate(0,0)" opacity="1">
                        <span>'.$documents_span[324]->nodeValue, PHP_EOL.'</span></span>';
                    ?></div>
                            <div class="highcharts-axis-labels highcharts-yaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                              <?php
                              echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 316.5px; top: 13px;" opacity="1">'.$documents_span[326]->nodeValue, PHP_EOL.'</span>';
                              echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 364.5px; top: 13px;" opacity="1">'.$documents_span[327]->nodeValue, PHP_EOL.'</span>';
                              echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 412.5px; top: 13px;" opacity="1">'.$documents_span[328]->nodeValue, PHP_EOL.'</span>';
                              echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 441px; top: 13px;" opacity="1">'.$documents_span[329]->nodeValue, PHP_EOL.'</span>';
                              echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 457px; top: 13px;" opacity="1">'.$documents_span[330]->nodeValue, PHP_EOL.'</span>';
                              echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 489px; top: 13px;" opacity="1">'.$documents_span[331]->nodeValue, PHP_EOL.'</span>';
                              echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 508.5px; top: 13px;" opacity="1">'.$documents_span[332]->nodeValue, PHP_EOL.'</span>';
                              echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 556.5px; top: 13px;" opacity="1">'.$documents_span[333]->nodeValue, PHP_EOL.'</span>';
                              echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 604.5px; top: 13px;" opacity="1">'.$documents_span[334]->nodeValue, PHP_EOL.'</span>';
                              ?>
                            </div></div></div>
		<script type="text/javascript">
			$(document).ready(function() {
				splitbar_chart({"labels":{"left":["<strong>Stress<\/strong> <span>(14)<\/span>&nbsp;<span>Détendu(e)<\/span>","<strong>Endettement<\/strong> <span>(13)<\/span>&nbsp;<span>Peu/pas endetté(e)<\/span>","<strong>Gestion Financière<\/strong> mid&nbsp;<span>Sage<\/span>"],"right":["<span>Tendu(e)<\/span>","<span>Fortement endetté(e)<\/span>","<span>Pas sage<\/span>&nbsp;mid"]},"data":[{"label":"Stress","score":-14},{"label":"Endettement","score":-13},{"label":"Gestion Financière","score":0}],"height":129}, "life_issues", "right");
			});
		</script>

    {{-- Ajouter des paragraphes? A y penser --}}

		<h5 class="cdreport-header">Stress</h5>
		<p class="text_b"><?php echo $documents[55]->nodeValue, PHP_EOL ?></p>
		<h5 class="cdreport-header">Endettement</h5>
		Votre score indique que pour vous l'endettement n'est pas un problème. Nous vous félicitons de réussir à vivre à la hauteur de vos revenus.
		<h5 class="cdreport-header">Gestion Financière</h5>
		Votre score dans le domaine de la gestion financière indique que vous avez les habitudes de la moyenne de la société dans le domaine des dépenses, des économies et de l'investissement. Nous vous encourageons à vous libérer de toute dette en faisant un budget et en planifiant vos économies.
		</div>
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

  </script>
@endsection
