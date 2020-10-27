{{-- Careerdirect --}}
@extends('layouts.master') @section('title', 'Fiche Careerdirect')

@section('main_title')
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <h4 class="text-uppercase">
        @if (Auth::user() && Auth::user()->id == $user->id)
          EVALUEZ VOS COMPETENCES
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
<p><?php echo $documents[98]->nodeValue, PHP_EOL ?></p>
<div class="row mb-4">
  <div class="col-lg-6 card-competences-metier mb-4">

    <div class="card mb-6 bg-light-rose custom-card">
      <div class="card-body">
        <h4 class="card-title bg-rose cdreport-header cdreport-header-alt">DEVELOPPEZ VOS COMPÉTENCES</h4>

        <ul class="card-text">
          <ul>
          <li>
            <p><?php echo $documents[99]->nodeValue, PHP_EOL ?></p>
          </li>
          </ul>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-lg-6 card-competences-metier mb-4">

    <div class="card mb-6 bg-light-rose custom-card">
      <div class="card-body">
        <h4 class="card-title bg-rose cdreport-header cdreport-header-alt">OPTEZ LE MOINS POSSIBLE POUR DES METIERS POUR LESQUELS VOUS AVEZ OBTENU DE FAIBLES SCORES DE CAPACITES</h4>

        <ul class="card-text">
          <ul>
          <li>
            <p><?php echo $documents[100]->nodeValue, PHP_EOL ?></p>
          </li>
          </ul>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="row mb-4">
  <div class="col-lg-12 card-competences-metier mb-4">

    <div class="card mb-12 bg-light-vert custom-card">
      <div class="card-body">
        <h4 class="card-title bg-vert cdreport-header cdreport-header-alt">VOS QUATRE DOMAINES DE CAPACITES LES PLUS FAIBLES</h4>

        <ul class="card-text">
          <ul>
          <li>
            <div class="cdchart lowest_skills" style="height: 175px;" data-highcharts-chart="36">
              <div class="highcharts-container" id="highcharts-72" style="position: relative; overflow: hidden; width: 938px; height: 173px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: Dosis, sans-serif;">
                <img src="{{ asset('img/svg/chart34.svg') }}">
                <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                  <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 47.5px;" transform="translate(0,0)" opacity="1">
                  <?php echo $documents_span[897]->nodeValue, PHP_EOL ?></span>
                  <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 76.5px;" transform="translate(0,0)" opacity="1">
                  <?php echo $documents_span[898]->nodeValue, PHP_EOL ?></span>
                  <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 105.5px;" transform="translate(0,0)" opacity="1">
                  <?php echo $documents_span[899]->nodeValue, PHP_EOL ?></span>
                  <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 134.5px;" transform="translate(0,0)" opacity="1">
                  <?php echo $documents_span[900]->nodeValue, PHP_EOL ?></span></div>
                  <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                    <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 628px; top: 48.5px;" transform="translate(0,0)" opacity="1">
                    <?php echo $documents_span[901]->nodeValue, PHP_EOL ?></span>
                    <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 628px; top: 77.5px;" transform="translate(0,0)" opacity="1">
                    <?php echo $documents_span[902]->nodeValue, PHP_EOL ?></span>
                    <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 628px; top: 106.5px;" transform="translate(0,0)" opacity="1">
                    <?php echo $documents_span[903]->nodeValue, PHP_EOL ?></span>
                    <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 628px; top: 135.5px;" transform="translate(0,0)" opacity="1">
                    <?php echo $documents_span[904]->nodeValue, PHP_EOL ?></span></div>
                    <div class="highcharts-axis-labels highcharts-yaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                      <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 321px; top: 13px;" opacity="1">
                      <?php echo $documents_span[905]->nodeValue, PHP_EOL ?></span>
                      <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 460.5px; top: 13px;" opacity="1">
                      <?php echo $documents_span[906]->nodeValue, PHP_EOL ?></span>
                      <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 600.5px; top: 13px;" opacity="1">
                      <?php echo $documents_span[907]->nodeValue, PHP_EOL ?></span></div></div></div>
            <script type="text/javascript">
                    $(document).ready(function() {
                            bar_chart({"data":[{"label":"Mécanique","score":70},{"label":"Musical","score":50},{"label":"Artistique","score":32},{"label":"Sportif/ve","score":25}],"labels":{"left":["11. Mécanique","12. Musical","13. Artistique","14. Sportif/ve"],"right":["Elevé (70)","Moyen (50)","Faible (32)","Faible (25)"]}}, "lowest_skills", "right");
                    });
            </script>
          </li>
          </ul>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- <a name="Cinq"></a>
      <div class="card-body card-competences-metier" id="scroll-competence"></div> -->


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
