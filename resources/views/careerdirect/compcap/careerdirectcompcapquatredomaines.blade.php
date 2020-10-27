{{-- Careerdirect --}}
@extends('layouts.master') @section('title', 'Fiche Careerdirect')

@section('main_title')
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <h4 class="text-uppercase">
        @if (Auth::user() && Auth::user()->id == $user->id)
          LES QUATRE DOMAINES PRINCIPAUX
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

<a name="Cinq"></a>

<div class="row">

  <div class="col-lg-12">

    <div class="card mb-4 bg-light-violet custom-card">
      <div class="card-body card-competences-metier" id="scroll-competence">
        <h4 class="card-title bg-vert">
          QUATRE DOMAINES PRINCIPAUX
        </h4>
          <div class="container mt-4">

            <!--
  <a id="scroll-margin11"><p></p></a>
  <a href="#Domaines" id="Domaines"><p name="Domaines">Compétences et Capacités: Quatre domaines principaux</p></a>

  <div id="para1" style="display: none"> -->
  <div class="cdchart top4_skill_skl12" style="height: 90px;" data-highcharts-chart="32">
    <div class="highcharts-container" id="highcharts-64" style="position: relative; overflow: hidden; width: 938px; height: 88px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: Dosis, sans-serif;">
      <img src="{{ asset('img/svg/chart30.svg') }}">
      <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
        <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 48.5px;" transform="translate(0,0)" opacity="1"><strong>
        <?php echo $documents_span[876]->nodeValue, PHP_EOL ?></strong></span></div>
        <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
          <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 628px; top: 49.5px;" transform="translate(0,0)" opacity="1">
          <?php echo $documents_span[877]->nodeValue, PHP_EOL ?></span></div>
          <div class="highcharts-axis-labels highcharts-yaxis-labels" style="position: absolute; left: 0px; top: 0px;">
            <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 321px; top: 13px;" opacity="1">
            <?php echo $documents_span[878]->nodeValue, PHP_EOL ?></span>
            <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 460.5px; top: 13px;" opacity="1">
              <?php echo $documents_span[879]->nodeValue, PHP_EOL ?></span>
              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 600.5px; top: 13px;" opacity="1">
              <?php echo $documents_span[880]->nodeValue, PHP_EOL ?></span></div></div></div>
		<script type="text/javascript">
			$(document).ready(function() {
				bar_chart({"labels":{"left":["<strong>1. Administratif<\/strong>"],"right":["Très élevé (90)"]},"data":[{"label":"Administratif","score":90}]}, "top4_skill_skl12", "right");
			});
		</script>
		<p><?php echo $documents[94]->nodeValue, PHP_EOL ?></p>


    <div style="page-break-inside: avoid;">
		<div class="cdchart top4_skill_skl05" style="height: 90px;" data-highcharts-chart="33">
      <div class="highcharts-container" id="highcharts-66" style="position: relative; overflow: hidden; width: 938px; height: 88px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: Dosis, sans-serif;">
        <img src="{{ asset('img/svg/chart31.svg') }}">
        <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
          <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 48.5px;" transform="translate(0,0)" opacity="1"><strong>
          <?php echo $documents_span[881]->nodeValue, PHP_EOL ?></strong></span></div>
          <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
            <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 628px; top: 49.5px;" transform="translate(0,0)" opacity="1">
            <?php echo $documents_span[882]->nodeValue, PHP_EOL ?></span></div>
            <div class="highcharts-axis-labels highcharts-yaxis-labels" style="position: absolute; left: 0px; top: 0px;">
              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 321px; top: 13px;" opacity="1">
              <?php echo $documents_span[883]->nodeValue, PHP_EOL ?></span>
              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 460.5px; top: 13px;" opacity="1">
              <?php echo $documents_span[884]->nodeValue, PHP_EOL ?></span>
              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 600.5px; top: 13px;" opacity="1">
              <?php echo $documents_span[885]->nodeValue, PHP_EOL ?></span></div></div></div>
		<script type="text/javascript">
			$(document).ready(function() {
				bar_chart({"labels":{"left":["<strong>2. Analytique<\/strong>"],"right":["Très élevé (90)"]},"data":[{"label":"Analytique","score":90}]}, "top4_skill_skl05", "right");
			});
		</script>
		<p><?php echo $documents[95]->nodeValue, PHP_EOL ?></p>
		</div>

		<div style="page-break-inside: avoid;">
		<div class="cdchart top4_skill_skl01" style="height: 90px;" data-highcharts-chart="34">
      <div class="highcharts-container" id="highcharts-68" style="position: relative; overflow: hidden; width: 938px; height: 88px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: Dosis, sans-serif;">
        <img src="{{ asset('img/svg/chart32.svg') }}">
        <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
          <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 48.5px;" transform="translate(0,0)" opacity="1"><strong>
          <?php echo $documents_span[886]->nodeValue, PHP_EOL ?></strong></span></div>
          <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
            <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 628px; top: 49.5px;" transform="translate(0,0)" opacity="1">
            <?php echo $documents_span[887]->nodeValue, PHP_EOL ?></span></div>
            <div class="highcharts-axis-labels highcharts-yaxis-labels" style="position: absolute; left: 0px; top: 0px;">
              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 321px; top: 13px;" opacity="1">
              <?php echo $documents_span[888]->nodeValue, PHP_EOL ?></span>
              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 460.5px; top: 13px;" opacity="1">
              <?php echo $documents_span[889]->nodeValue, PHP_EOL ?></span>
              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 600.5px; top: 13px;" opacity="1">
              <?php echo $documents_span[890]->nodeValue, PHP_EOL ?></span></div>
        </div></div>
		<script type="text/javascript">
			$(document).ready(function() {
				bar_chart({"labels":{"left":["<strong>3. Gérer<\/strong>"],"right":["Très élevé (90)"]},"data":[{"label":"Gérer","score":90}]}, "top4_skill_skl01", "right");
			});
		</script>
		<p><?php echo $documents[96]->nodeValue, PHP_EOL ?></p>
		</div>

		<div style="page-break-inside: avoid;">
		<div class="cdchart top4_skill_skl14" style="height: 90px;" data-highcharts-chart="35">
      <div class="highcharts-container" id="highcharts-70" style="position: relative; overflow: hidden; width: 938px; height: 88px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: Dosis, sans-serif;">
        <img src="{{ asset('img/svg/chart33.svg') }}">
        <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
          <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 48.5px;" transform="translate(0,0)" opacity="1"><strong>
          <?php echo $documents_span[891]->nodeValue, PHP_EOL ?></strong></span></div>
          <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
            <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 628px; top: 49.5px;" transform="translate(0,0)" opacity="1">
            <?php echo $documents_span[892]->nodeValue, PHP_EOL ?></span></div>
            <div class="highcharts-axis-labels highcharts-yaxis-labels" style="position: absolute; left: 0px; top: 0px;">
              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 321px; top: 13px;" opacity="1">
              <?php echo $documents_span[893]->nodeValue, PHP_EOL ?></span>
              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 460.5px; top: 13px;" opacity="1">
              <?php echo $documents_span[894]->nodeValue, PHP_EOL ?></span>
              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 600.5px; top: 13px;" opacity="1">
              <?php echo $documents_span[895]->nodeValue, PHP_EOL ?></span></div>
        </div></div>
		<script type="text/javascript">
			$(document).ready(function() {
				bar_chart({"labels":{"left":["<strong>4. Maths<\/strong>"],"right":["Très élevé (88)"]},"data":[{"label":"Maths","score":88}]}, "top4_skill_skl14", "right");
			});
		</script>
		<p><?php echo $documents[97]->nodeValue, PHP_EOL ?></p>
		</div>

  </div>
	<!-- </div> -->

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
