{{-- Careerdirect --}}
@extends('layouts.master') @section('title', 'Fiche Careerdirect')

@section('main_title')
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <h4 class="text-uppercase">
        @if (Auth::user() && Auth::user()->id == $user->id)
          CRITERES ESSENTIELS DU DOMAINE DES COMPETENCES POUR CHOISIR UN METIER
        @else
          Profil de {{ ucfirst($user->prenom) }} {{mb_strtoupper($user->nom) }}
        @endif
        </h4>
      </div>

    </div>

  </div>

  <hr class="bg-vert trait-titre">
@endsection
@section('main_sous_menu')
  <div class="container">
    <div class="row row-sous-menu-fiche">
      <div class="col-lg-12">
        <ul>
          <li><a href="{{ route('career_direct', ['id' => Auth::id()]) }}"><img src="{{ asset('img/back.png') }}" style="height: 25px; width: 25px"></a></li>
          <li><a href="#compcap" class="sous-menu-link text-uppercase">Compétences et Capacités</a></li>
          <li><a href="#quatredomaines" class="sous-menu-link text-uppercase">Quatre domaines principaux</a></li>
          <li><a href="#evaluez" class="sous-menu-link text-uppercase">Evaluez vos compétences</a></li>
        </ul>
      </div>
    </div>
  </div>
@endsection
@section('content')

<p><?php echo $documents[89]->nodeValue, PHP_EOL ?></p>
<p><?php echo $documents[90]->nodeValue, PHP_EOL ?></p>
<p><?php echo $documents[91]->nodeValue, PHP_EOL ?></p>
<p><?php echo $documents[92]->nodeValue, PHP_EOL ?></p>
<div class="row mb-4">
  <div class="col-lg-12 card-competences-metier mb-4" id="compcap">

    <div class="card mb-12 bg-light-rose custom-card">
      <div class="card-body">
        <h4 class="card-title bg-rose cdreport-header cdreport-header-alt">Compétences et Capacités</h4>

        <ul class="card-text">
          <ul>
          <li>
            <div class="cdchart skills_chart" data-highcharts-chart="31">
              <div class="highcharts-container" id="highcharts-62" style="position: relative; overflow: hidden; width: 938px; height: 490px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: Dosis, sans-serif;">
                <img src="{{ asset('img/svg/chart29.svg') }}">
                <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                  <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 48.4643px;" transform="translate(0,0)" opacity="1">
                    <?php echo $documents_span[845]->nodeValue, PHP_EOL ?></span>
                    <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 79.3929px;" transform="translate(0,0)" opacity="1">
                      <?php echo $documents_span[846]->nodeValue, PHP_EOL ?></span>
                      <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 110.321px;" transform="translate(0,0)" opacity="1">
                        <?php echo $documents_span[847]->nodeValue, PHP_EOL ?></span>
                        <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 141.25px;" transform="translate(0,0)" opacity="1">
                          <?php echo $documents_span[848]->nodeValue, PHP_EOL ?></span>
                          <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 172.179px;" transform="translate(0,0)" opacity="1">
                            <?php echo $documents_span[849]->nodeValue, PHP_EOL ?></span>
                            <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 203.107px;" transform="translate(0,0)" opacity="1">
                              <?php echo $documents_span[850]->nodeValue, PHP_EOL ?></span>
                              <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 234.036px;" transform="translate(0,0)" opacity="1">
                                <?php echo $documents_span[851]->nodeValue, PHP_EOL ?></span>
                                <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 264.964px;" transform="translate(0,0)" opacity="1">
                                  <?php echo $documents_span[852]->nodeValue, PHP_EOL ?></span>
                                  <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 295.893px;" transform="translate(0,0)" opacity="1">
                                    <?php echo $documents_span[853]->nodeValue, PHP_EOL ?></span>
                                    <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 326.821px;" transform="translate(0,0)" opacity="1">
                                      <?php echo $documents_span[854]->nodeValue, PHP_EOL ?></span>
                                      <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 357.75px;" transform="translate(0,0)" opacity="1">
                                      <?php echo $documents_span[855]->nodeValue, PHP_EOL ?></span>
                                      <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 388.679px;" transform="translate(0,0)" opacity="1">
                                      <?php echo $documents_span[856]->nodeValue, PHP_EOL ?></span>
                                      <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 419.607px;" transform="translate(0,0)" opacity="1">
                                      <?php echo $documents_span[857]->nodeValue, PHP_EOL ?></span>
                                      <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 450.536px;" transform="translate(0,0)" opacity="1">
                                      <?php echo $documents_span[858]->nodeValue, PHP_EOL ?></span></div>
                                      <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                        <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 628px; top: 49.4643px;" transform="translate(0,0)" opacity="1">
                                        <?php echo $documents_span[859]->nodeValue, PHP_EOL ?></span>
                                        <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 628px; top: 80.3929px;" transform="translate(0,0)" opacity="1">
                                        <?php echo $documents_span[860]->nodeValue, PHP_EOL ?></span>
                                        <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 628px; top: 111.321px;" transform="translate(0,0)" opacity="1">
                                        <?php echo $documents_span[861]->nodeValue, PHP_EOL ?></span>
                                        <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 628px; top: 142.25px;" transform="translate(0,0)" opacity="1">
                                        <?php echo $documents_span[862]->nodeValue, PHP_EOL ?></span>
                                        <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 628px; top: 173.179px;" transform="translate(0,0)" opacity="1">
                                        <?php echo $documents_span[863]->nodeValue, PHP_EOL ?></span>
                                        <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 628px; top: 204.107px;" transform="translate(0,0)" opacity="1">
                                        <?php echo $documents_span[864]->nodeValue, PHP_EOL ?></span>
                                        <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 628px; top: 235.036px;" transform="translate(0,0)" opacity="1">
                                        <?php echo $documents_span[865]->nodeValue, PHP_EOL ?></span>
                                        <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 628px; top: 265.964px;" transform="translate(0,0)" opacity="1">
                                        <?php echo $documents_span[866]->nodeValue, PHP_EOL ?></span>
                                        <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 628px; top: 296.893px;" transform="translate(0,0)" opacity="1">
                                        <?php echo $documents_span[867]->nodeValue, PHP_EOL ?></span>
                                        <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 628px; top: 327.821px;" transform="translate(0,0)" opacity="1">
                                        <?php echo $documents_span[868]->nodeValue, PHP_EOL ?></span>
                                        <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 628px; top: 358.75px;" transform="translate(0,0)" opacity="1">
                                        <?php echo $documents_span[869]->nodeValue, PHP_EOL ?></span>
                                        <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 628px; top: 389.679px;" transform="translate(0,0)" opacity="1">
                                        <?php echo $documents_span[870]->nodeValue, PHP_EOL ?></span>
                                        <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 628px; top: 420.607px;" transform="translate(0,0)" opacity="1">
                                        <?php echo $documents_span[871]->nodeValue, PHP_EOL ?></span>
                                        <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 628px; top: 451.536px;" transform="translate(0,0)" opacity="1">
                                        <?php echo $documents_span[872]->nodeValue, PHP_EOL ?></span></div>
                                        <div class="highcharts-axis-labels highcharts-yaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                          <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 321px; top: 13px;" opacity="1">
                                          <?php echo $documents_span[873]->nodeValue, PHP_EOL ?></span>
                                          <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 460.5px; top: 13px;" opacity="1">
                                          <?php echo $documents_span[874]->nodeValue, PHP_EOL ?></span>
                                          <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 600.5px; top: 13px;" opacity="1">
                                          <?php echo $documents_span[875]->nodeValue, PHP_EOL ?></span>
                                        </div></div></div>
            <script type="text/javascript">
              $(document).ready(function() {
                bar_chart({"labels":{"left":["<strong>1. Administratif<\/strong>","<strong>2. Analytique<\/strong>","<strong>3. Gérer<\/strong>","<strong>4. Maths<\/strong>","<strong>5. Relationnel(le)<\/strong>","<strong>6. Interculturel(le)<\/strong>","<strong>7. Marketing<\/strong>","<strong>8. Travailler avec les autres<\/strong>","9. Ecrit","10. Organiser","11. Mécanique","12. Musical","13. Artistique","14. Sportif/ve"],"right":["Très élevé (90)","Très élevé (90)","Très élevé (90)","Très élevé (88)","Elevé (83)","Elevé (82)","Elevé (82)","Elevé (80)","Elevé (75)","Elevé (72)","Elevé (70)","Moyen (50)","Faible (32)","Faible (25)"]},"data":[{"label":"Administratif","score":90},{"label":"Analytique","score":90},{"label":"Gérer","score":90},{"label":"Maths","score":88},{"label":"Relationnel(le)","score":83},{"label":"Interculturel(le)","score":82},{"label":"Marketing","score":82},{"label":"Travailler avec les autres","score":80},{"label":"Ecrit","score":75},{"label":"Organiser","score":72},{"label":"Mécanique","score":70},{"label":"Musical","score":50},{"label":"Artistique","score":32},{"label":"Sportif/ve","score":25}],"title":"Compétences et Capacités","height":490}, "skills_chart", "right");
              });
            </script>
            <p><?php echo $documents[93]->nodeValue, PHP_EOL ?></p>
          </li>
          </ul>
        </ul>
      </div>
    </div>
  </div>


<hr class="bg-vert trait-titre mt-4 mb-4">

<div class="row">
<div class="col-lg-12">

  <table class="table table-bordered table-recherche text-center">
    <tbody>

              <tr class="liste-titre liste-vert-titre" id="quatredomaines">
        <td colspan="2">
          <a href="{{ route('career_direct_compcapquatredomaines', ['id' => Auth::id()]) }}" class="lien-fiche">Compétences et capacités: Quatre domaines principaux</a>
        </td>
      </tr>
      <tr class="liste-recherche liste-vert">
        <td>
          <p><?php echo $documents[94]->nodeValue, PHP_EOL. ' ...' ?></p>
        </td>
        <td class="align-middle"><a href="{{ route('career_direct_compcapquatredomaines', ['id' => Auth::id()]) }}"><i class="icon ion-clipboard"></i></a></td>
      </tr>
      <tr class="liste-spacer"> </tr>

              <tr class="liste-titre liste-vert-titre" id="evaluez">
        <td colspan="2">
          <a href="{{ route('career_direct_compcapevaluez', ['id' => Auth::id()]) }}" class="lien-fiche">Compétences et capacités: Evaluez vos compétences</a>
        </td>
      </tr>
      <tr class="liste-recherche liste-vert">
        <td>
          <p><?php echo $documents[98]->nodeValue, PHP_EOL. ' ...' ?></p>
        </td>
        <td class="align-middle"><a href="{{ route('career_direct_compcapevaluez', ['id' => Auth::id()]) }}"><i class="icon ion-clipboard"></i></a></td>
      </tr>
      <tr class="liste-spacer"> </tr>
    </tbody>
  </table>

</div>
</div>


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

    $(function () {
      $(".card-competences-metier .card-text").mCustomScrollbar();
    });
  </script>
@endsection
