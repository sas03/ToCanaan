{{-- Careerdirect --}}
@extends('layouts.master') @section('title', 'Fiche Careerdirect')

@section('main_title')
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <h4 class="text-uppercase">
        @if (Auth::user() && Auth::user()->id == $user->id)
          METIERS POTENTIELS DANS VOS PREMIERS GROUPES
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
    <p><?php echo $documents[81]->nodeValue, PHP_EOL ?></p>
    <p><?php echo $documents[82]->nodeValue, PHP_EOL ?></p>
  </div>
  <div class="row mb-4">
    <div class="col-lg-12 card-competences-metier mb-4">

      <div class="card mb-12 bg-light-vert custom-card">
        <div class="card-body">
          <h4 class="card-title bg-vert cdreport-header cdreport-header-alt">PRENEZ NOTE DE VOS CENTRES D’INTERETS LES PLUS FAIBLES</h4>

          <ul class="card-text">
            <ul>
            <li>
              <p><?php echo $documents[83]->nodeValue, PHP_EOL ?></p>

                <div class="cdchart lowest_g04" style="height: 90px;" data-highcharts-chart="27">
                  <div class="highcharts-container" id="highcharts-54" style="position: relative; overflow: hidden; width: 938px; height: 88px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: Dosis, sans-serif;">
                    <img src="{{ asset('img/svg/chart25.svg') }}">
                    <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                      <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 48.5px;" transform="translate(0,0)" opacity="1">
                        <?php echo $documents_span[823]->nodeValue, PHP_EOL ?></span></div>
                      <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                        <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 628px; top: 49.5px;" transform="translate(0,0)" opacity="1">
                          <?php echo $documents_span[824]->nodeValue, PHP_EOL ?></span></div>
                        <div class="highcharts-axis-labels highcharts-yaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                          <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 321px; top: 13px;" opacity="1">
                            <?php echo $documents_span[825]->nodeValue, PHP_EOL ?>
                          </span>
                          <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 460.5px; top: 13px;" opacity="1">
                            <?php echo $documents_span[826]->nodeValue, PHP_EOL ?>
                          </span>
                          <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 600.5px; top: 13px;" opacity="1">
                            <?php echo $documents_span[827]->nodeValue, PHP_EOL ?>
                          </span>
                        </div></div></div>
                <script type="text/javascript">
                  $(document).ready(function() {
                    bar_chart({"labels":{"left":[],"right":["Très faible (3)"]},"data":[{"label":"Sciences de la consommation","score":3}]}, "lowest_g04", "right");
                  });
                </script>

                <p><?php echo $documents[84]->nodeValue, PHP_EOL ?></p>

                <div class="cdchart lowest_g07" style="height: 90px;" data-highcharts-chart="28">
                  <div class="highcharts-container" id="highcharts-56" style="position: relative; overflow: hidden; width: 938px; height: 88px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: Dosis, sans-serif;">
                    <img src="{{ asset('img/svg/chart26.svg') }}">
                    <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                      <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 48.5px;" transform="translate(0,0)" opacity="1">
                        <?php echo $documents_span[828]->nodeValue, PHP_EOL ?>
                      </span></div>
                      <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                        <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 628px; top: 49.5px;" transform="translate(0,0)" opacity="1">
                          <?php echo $documents_span[829]->nodeValue, PHP_EOL ?>
                        </span></div>
                        <div class="highcharts-axis-labels highcharts-yaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                          <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 321px; top: 13px;" opacity="1">
                            <?php echo $documents_span[830]->nodeValue, PHP_EOL ?>
                          </span>
                          <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 460.5px; top: 13px;" opacity="1">
                            <?php echo $documents_span[831]->nodeValue, PHP_EOL ?>
                          </span>
                          <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 600.5px; top: 13px;" opacity="1">
                            <?php echo $documents_span[832]->nodeValue, PHP_EOL ?>
                          </span></div></div></div>
                <script type="text/javascript">
                  $(document).ready(function() {
                    bar_chart({"labels":{"left":[],"right":["Très faible (2)"]},"data":[{"label":"Extérieur/Agriculture","score":2}]}, "lowest_g07", "right");
                  });
                </script>

                <p><?php echo $documents[85]->nodeValue, PHP_EOL ?></p>

                <div class="cdchart lowest_g06" style="height: 90px;" data-highcharts-chart="29">
                  <div class="highcharts-container" id="highcharts-58" style="position: relative; overflow: hidden; width: 938px; height: 88px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: Dosis, sans-serif;">
                    <img src="{{ asset('img/svg/chart27.svg') }}">
                    <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                    <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 48.5px;" transform="translate(0,0)" opacity="1">
                      <?php echo $documents_span[833]->nodeValue, PHP_EOL ?>
                    </span></div>
                    <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                      <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 628px; top: 49.5px;" transform="translate(0,0)" opacity="1">
                        <?php echo $documents_span[834]->nodeValue, PHP_EOL ?>
                      </span></div>
                      <div class="highcharts-axis-labels highcharts-yaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                        <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 321px; top: 13px;" opacity="1">
                          <?php echo $documents_span[835]->nodeValue, PHP_EOL ?>
                        </span>
                        <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 460.5px; top: 13px;" opacity="1">
                          <?php echo $documents_span[836]->nodeValue, PHP_EOL ?>
                        </span>
                        <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 600.5px; top: 13px;" opacity="1">
                          <?php echo $documents_span[837]->nodeValue, PHP_EOL ?>
                        </span></div>
                    </div></div>
                <script type="text/javascript">
                  $(document).ready(function() {
                    bar_chart({"labels":{"left":[],"right":["Très faible (0)"]},"data":[{"label":"Transport","score":0}]}, "lowest_g06", "right");
                  });
                </script>

                <p><?php echo $documents[86]->nodeValue, PHP_EOL ?></p>

                <div class="cdchart lowest_g20" style="height: 90px;" data-highcharts-chart="30">
                  <div class="highcharts-container" id="highcharts-60" style="position: relative; overflow: hidden; width: 938px; height: 88px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: Dosis, sans-serif;">
                    <img src="{{ asset('img/svg/chart28.svg') }}">
                    <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                    <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 48.5px;" transform="translate(0,0)" opacity="1">
                      <?php echo $documents_span[838]->nodeValue, PHP_EOL ?>
                    </span></div>
                    <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                      <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 628px; top: 49.5px;" transform="translate(0,0)" opacity="1">
                        <?php echo $documents_span[839]->nodeValue, PHP_EOL ?>
                      </span></div>
                      <div class="highcharts-axis-labels highcharts-yaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                        <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 321px; top: 13px;" opacity="1">
                          <?php echo $documents_span[840]->nodeValue, PHP_EOL ?>
                        </span>
                        <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 460.5px; top: 13px;" opacity="1">
                          <?php echo $documents_span[841]->nodeValue, PHP_EOL ?>
                        </span>
                        <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 600.5px; top: 13px;" opacity="1">
                          <?php echo $documents_span[842]->nodeValue, PHP_EOL ?>
                        </span></div>
                    </div></div>
                <script type="text/javascript">
                  $(document).ready(function() {
                    bar_chart({"labels":{"left":[],"right":["Très faible (0)"]},"data":[{"label":"Soin animalier","score":0}]}, "lowest_g20", "right");
                  });
                </script>

                <p><?php echo $documents[87]->nodeValue, PHP_EOL ?></p>

              <p><?php echo $documents[88]->nodeValue, PHP_EOL ?></p>
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
      $(".card-competences-metier .card-text").mCustomScrollbar();
    });
  </script>
@endsection
