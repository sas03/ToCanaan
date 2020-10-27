{{-- Careerdirect --}}
@extends('layouts.master') @section('title', 'Fiche Careerdirect')

@section('main_title')
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <h4 class="text-uppercase">
        @if (Auth::user() && Auth::user()->id == $user->id)
          Cinq principaux domaines de centres d’intérêts
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
          <li><a href="#principaux" class="sous-menu-link text-uppercase">PRINCIPAUX DOMAINES</a></li>
          <li><a href="#cinqprincipaux" class="sous-menu-link text-uppercase">CINQ PRINCIPAUX DOMAINES</a></li>
          <li><a href="#huitpremiers" class="sous-menu-link text-uppercase">HUIT PREMIERS GROUPES</a></li>
          <li><a href="#scores" class="sous-menu-link text-uppercase">SCORES</a></li>
          <li><a href="#potentiels" class="sous-menu-link text-uppercase">MÉTIERS POTENTIELS</a></li>
        </ul>
      </div>
    </div>
  </div>
@endsection
@section('content')

<p><?php echo $documents[56]->nodeValue, PHP_EOL ?></p>
<p><?php echo $documents[57]->nodeValue, PHP_EOL ?></p>
<p><?php echo $documents[58]->nodeValue, PHP_EOL ?></p>
<p><?php echo $documents[69]->nodeValue, PHP_EOL ?></p>
<p><?php echo $documents[60]->nodeValue, PHP_EOL ?></p>
<!-- Modified here
<?php $array = array($documents_span[340]->nodeValue,$documents_span[342]->nodeValue)?>
{{ $usertry[0]->nom }}
{{ $usertry->links() }}
-->
<?php foreach($usertry as $u){
  echo $u->nom;
} ?>
{{ $usertry->links() }}



<div class="row mb-4" id="principaux">
  <div class="col-lg-12 box-titres">
    <h4 class="text-uppercase">Principaux Domaines d'Intérêt et Groupes de Carrière</h4>
    <hr class="bg-vert trait-titre mb-4">
  </div>
  <!-- <div class="col-lg-12 card-competences-metier"> -->
   <div class="col-lg-12">
    <div class="card mb-12 bg-light-vert custom-card">
      <div class="card-body">
        <h4 class="card-title bg-vert">Principaux Domaines d'Intérêt et Groupes de Carrière</h4>

        <ul class="card-text">
          <div class="cdchart donut_pie" style="height:720px;" data-highcharts-chart="10"><div class="highcharts-container" id="highcharts-20" style="position: relative; overflow: hidden; width: 938px; height: 718px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: Dosis, sans-serif;">
            <img src="{{ asset('img/svg/chart9.svg') }}">

            <div class="highcharts-legend" style="position: absolute; left: 603px; top: 31px;">
              <div class="null" style="position: absolute; left: 0px; top: 0px;">
                <div class="null" style="position: absolute; left: 0px; top: 0px;">
                  <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 3px;">
                    <?php
                    echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(255, 255, 255);" zindex="2"><span style="font-family:serif">'.$documents_span[338]->nodeValue, PHP_EOL.'</span></span>';
                    ?></div>
                      <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 21px;">
                        <?php
                        echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(255, 255, 255);" zindex="2"><span style="font-family:serif">'.$documents_span[340]->nodeValue, PHP_EOL.'</span></span>';
                        ?></div>
                          <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 39px;">
                            <?php
                            echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(255, 255, 255);" zindex="2"><span style="font-family:serif">'.$documents_span[342]->nodeValue, PHP_EOL.'</span></span>';
                            ?></div>
                              <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 57px;">
                                <?php
                                echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(255, 255, 255);" zindex="2"><span style="font-family:serif">'.$documents_span[344]->nodeValue, PHP_EOL.'</span></span>';
                                ?></div>
                                  <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 75px;">
                                    <?php
                                    echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(255, 255, 255);" zindex="2"><span style="font-family:serif">'.$documents_span[346]->nodeValue, PHP_EOL.'</span></span>';
                                    ?></div>
                                      <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 93px;">
                                        <?php
                                        echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(255, 255, 255);" zindex="2"><div style=" margin-top:20px; margin-bottom:10px; margin-left:-20px; font-weight : bold; font-family:serif; color:" #000"="" !important"="">'.$documents_span[348]->nodeValue, PHP_EOL.'</div></span>';
                                        ?></div>
                                          <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 130px;">
                                            <?php
                                            echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(255, 255, 255);" zindex="2">
                                              <span style="font-weight : normal; font-family:serif;">'.$documents_span[349]->nodeValue, PHP_EOL.'</span></span>';
                                            ?></div>
                                              <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 148px;">
                                                <?php
                                                echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(255, 255, 255);" zindex="2">
                                                  <span style="font-weight : normal; font-family:serif;">'.$documents_span[351]->nodeValue, PHP_EOL.'</span></span>';
                                                ?></div>
                                                <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 166px;">
                                                  <?php
                                                  echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(255, 255, 255);" zindex="2">
                                                    <span style="font-weight : normal; font-family:serif;">'.$documents_span[353]->nodeValue, PHP_EOL.'</span></span>';
                                                  ?></div>
                                                  <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 184px;">
                                                    <?php
                                                    echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(255, 255, 255);" zindex="2">
                                                      <span style="font-weight : normal; font-family:serif;">'.$documents_span[355]->nodeValue, PHP_EOL.'</span></span>';
                                                    ?></div>
                                                    <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 202px;">
                                                      <?php
                                                      echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(255, 255, 255);" zindex="2">
                                                        <span style="font-weight : normal; font-family:serif;">'.$documents_span[357]->nodeValue, PHP_EOL.'</span></span>';
                                                      ?></div>
                                                      <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 220px;">
                                                        <?php
                                                        echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(255, 255, 255);" zindex="2">
                                                          <div style=" margin-top:20px; margin-bottom:10px; margin-left:-20px; font-weight : bold; font-family:serif; color:" #000"="" !important"="">'.$documents_span[359]->nodeValue, PHP_EOL.'</div></span>';
                                                        ?></div>
                                                        <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 257px;">
                                                          <?php
                                                          echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(255, 255, 255);" zindex="2">
                                                            <span style="font-weight : normal; font-family:serif;">'.$documents_span[360]->nodeValue, PHP_EOL.'</span></span>';
                                                          ?></div>
                                                          <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 275px;">
                                                            <?php
                                                            echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(255, 255, 255);" zindex="2">
                                                              <span style="font-weight : normal; font-family:serif;">'.$documents_span[362]->nodeValue, PHP_EOL.'</span></span>';
                                                            ?></div>
                                                            <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 293px;">
                                                              <?php
                                                              echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(255, 255, 255);" zindex="2">
                                                                <span style="font-weight : normal; font-family:serif;">'.$documents_span[364]->nodeValue, PHP_EOL.'</span></span>';
                                                              ?></div>
                                                              <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 311px;">
                                                                <?php
                                                                echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(255, 255, 255);" zindex="2">
                                                                  <span style="font-weight : normal; font-family:serif;">'.$documents_span[366]->nodeValue, PHP_EOL.'</span></span>';
                                                                ?></div>
                                                                <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 329px;">
                                                                  <?php
                                                                  echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(255, 255, 255);" zindex="2">
                                                                    <div style=" margin-top:20px; margin-bottom:10px; margin-left:-20px; font-weight : bold; font-family:serif; color:" #000"="" !important"="">'.$documents_span[368]->nodeValue, PHP_EOL.'</div></span>';
                                                                  ?></div>
                                                                  <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 366px;">
                                                                    <?php
                                                                    echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(255, 255, 255);" zindex="2">
                                                                      <span style="font-weight : normal; font-family:serif;">'.$documents_span[369]->nodeValue, PHP_EOL.'</span></span>';
                                                                    ?></div>
                                                                    <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 384px;">
                                                                      <?php
                                                                      echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(255, 255, 255);" zindex="2">
                                                                        <span style="font-weight : normal; font-family:serif;">'.$documents_span[371]->nodeValue, PHP_EOL.'</span></span>';
                                                                      ?></div>
                                                                      <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 402px;">
                                                                        <?php
                                                                        echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(255, 255, 255);" zindex="2">
                                                                          <span style="font-weight : normal; font-family:serif;">'.$documents_span[373]->nodeValue, PHP_EOL.'</span></span>';
                                                                        ?></div>
                                                                        <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 420px;">
                                                                          <?php
                                                                          echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(255, 255, 255);" zindex="2">
                                                                            <div style=" margin-top:20px; margin-bottom:10px; margin-left:-20px; font-weight : bold; font-family:serif; color:" #000"="" !important"="">'.$documents_span[375]->nodeValue, PHP_EOL.'</div></span>';
                                                                          ?></div>
                                                                          <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 457px;">
                                                                            <?php
                                                                            echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(255, 255, 255);" zindex="2">
                                                                              <span style="font-weight : normal; font-family:serif;"><span class="top8_label">'.$documents_span[377]->nodeValue, PHP_EOL.'</span></span></span>';
                                                                            ?></div>
                                                                            <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 475px;">
                                                                              <?php
                                                                              echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(255, 255, 255);" zindex="2">
                                                                                <span style="font-weight : normal; font-family:serif;"><span class="top8_label">'.$documents_span[380]->nodeValue, PHP_EOL.'</span></span></span>';
                                                                              ?></div>
                                                                              <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 493px;">
                                                                                <?php
                                                                                echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(255, 255, 255);" zindex="2">
                                                                                  <span style="font-weight : normal; font-family:serif;"><span class="top8_label">'.$documents_span[383]->nodeValue, PHP_EOL.'</span></span></span>';
                                                                                ?></div>
                                                                                <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 511px;">
                                                                                  <?php
                                                                                  echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(255, 255, 255);" zindex="2">
                                                                                    <span style="font-weight : normal; font-family:serif;"><span class="top8_label">'.$documents_span[386]->nodeValue, PHP_EOL.'</span></span></span>';
                                                                                  ?></div>
                                                                                  <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 529px;">
                                                                                    <?php
                                                                                    echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(255, 255, 255);" zindex="2">
                                                                                      <span style="font-weight : normal; font-family:serif;"><span class="top8_label">'.$documents_span[389]->nodeValue, PHP_EOL.'</span></span></span>';
                                                                                    ?></div>
                                                                                    <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 547px;">
                                                                                      <?php
                                                                                      echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(255, 255, 255);" zindex="2">
                                                                                        <span style="font-weight : normal; font-family:serif;"><span class="top8_label">'.$documents_span[392]->nodeValue, PHP_EOL.'</span></span></span>';
                                                                                      ?></div>
                                                                                      <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 565px;">
                                                                                        <?php
                                                                                        echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(255, 255, 255);" zindex="2">
                                                                                          <div style=" margin-top:20px; margin-bottom:10px; margin-left:-20px; font-weight : bold; font-family:serif; color:" #000"="" !important"="">'.$documents_span[395]->nodeValue, PHP_EOL.'</div></span>';
                                                                                        ?></div>
                                                                                        <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 602px;">
                                                                                          <?php
                                                                                          echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(255, 255, 255);" zindex="2">
                                                                                            <span style="font-weight : normal; font-family:serif;"><span class="top8_label">'.$documents_span[396]->nodeValue, PHP_EOL.'</span></span></span>';
                                                                                          ?></div>
                                                                                          <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 620px;">
                                                                                            <?php
                                                                                            echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(255, 255, 255);" zindex="2">
                                                                                              <span style="font-weight : normal; font-family:serif;"><span class="top8_label">'.$documents_span[399]->nodeValue, PHP_EOL.'</span></span></span>';
                                                                                            ?></div>
                                                                                            <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 638px;">
                                                                                              <?php
                                                                                              echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(255, 255, 255);" zindex="2">
                                                                                                <span style="font-weight : normal; font-family:serif;">'.$documents_span[402]->nodeValue, PHP_EOL.'</span></span>';
                                                                                              ?>
                                                                                            </div>
                                                                                          </div>
                                                                                        </div>
                                            </div>
                                          </div>
                                            </div>
          <script type="text/javascript">
                  $(document).ready(function() {
                          donut_pie_chart_right({"showScores":true,"startAngle":0,"labels":{"donut":"Centres d'Intérêts","pie":""},"data":[{"grouplabel":"Faire (0%)","groupname":"Faire","groupdata":[{"label":"11. Mécanique","score":28,"number":11},{"label":"15. Sport","score":13,"number":15},{"label":"16. Sécurité/Forces de l'ordre","score":5,"number":16},{"label":"17. Aventure","score":3,"number":17},{"label":"19. Extérieur/Agriculture","score":2,"number":19}]},{"grouplabel":"Aider (0%)","groupname":"Aider","groupdata":[{"label":"13. Service","score":25,"number":13},{"label":"18. Sciences de la consommation","score":3,"number":18},{"label":"21. Soin animalier","score":0,"number":21},{"label":"20. Transport","score":0,"number":20}]},{"grouplabel":"Analyser (0%)","groupname":"Analyser","groupdata":[{"label":"9. Informatique/Finance","score":50,"number":9},{"label":"10. Sciences Technologiques","score":43,"number":10},{"label":"14. Sciences/Santé","score":23,"number":14}]},{"grouplabel":"Influencer (79%)","groupname":"Influencer","groupdata":[{"label":"<span class='top8_label'><strong>1. Religieux<\/strong><\/span>","score":100,"number":1},{"label":"<span class='top8_label'><strong>2. Conseil<\/strong><\/span>","score":92,"number":2},{"label":"<span class='top8_label'><strong>3. Enseignement<\/strong><\/span>","score":82,"number":3},{"label":"<span class='top8_label'><strong>5. Législation/Politique<\/strong><\/span>","score":73,"number":5},{"label":"<span class='top8_label'><strong>4. Gestion/Ventes<\/strong><\/span>","score":73,"number":4},{"label":"<span class='top8_label'><strong>8. International<\/strong><\/span>","score":58,"number":8}]},{"grouplabel":"Exprimer (21%)","groupname":"Exprimer","groupdata":[{"label":"<span class='top8_label'><strong>7. Ecrit<\/strong><\/span>","score":62,"number":7},{"label":"<span class='top8_label'><strong>6. Prestation publique/Communication<\/strong><\/span>","score":62,"number":6},{"label":"12. Artistique","score":27,"number":12}]}]}, "donut_pie");
                          //combined_category_bar_chart({"showScores":true,"startAngle":0,"labels":{"donut":"Centres d'Intérêts","pie":""},"data":[{"grouplabel":"Faire (0%)","groupname":"Faire","groupdata":[{"label":"11. Mécanique","score":28,"number":11},{"label":"15. Sport","score":13,"number":15},{"label":"16. Sécurité/Forces de l'ordre","score":5,"number":16},{"label":"17. Aventure","score":3,"number":17},{"label":"19. Extérieur/Agriculture","score":2,"number":19}]},{"grouplabel":"Aider (0%)","groupname":"Aider","groupdata":[{"label":"13. Service","score":25,"number":13},{"label":"18. Sciences de la consommation","score":3,"number":18},{"label":"21. Soin animalier","score":0,"number":21},{"label":"20. Transport","score":0,"number":20}]},{"grouplabel":"Analyser (0%)","groupname":"Analyser","groupdata":[{"label":"9. Informatique/Finance","score":50,"number":9},{"label":"10. Sciences Technologiques","score":43,"number":10},{"label":"14. Sciences/Santé","score":23,"number":14}]},{"grouplabel":"Influencer (79%)","groupname":"Influencer","groupdata":[{"label":"<span class='top8_label'><strong>1. Religieux<\/strong><\/span>","score":100,"number":1},{"label":"<span class='top8_label'><strong>2. Conseil<\/strong><\/span>","score":92,"number":2},{"label":"<span class='top8_label'><strong>3. Enseignement<\/strong><\/span>","score":82,"number":3},{"label":"<span class='top8_label'><strong>5. Législation/Politique<\/strong><\/span>","score":73,"number":5},{"label":"<span class='top8_label'><strong>4. Gestion/Ventes<\/strong><\/span>","score":73,"number":4},{"label":"<span class='top8_label'><strong>8. International<\/strong><\/span>","score":58,"number":8}]},{"grouplabel":"Exprimer (21%)","groupname":"Exprimer","groupdata":[{"label":"<span class='top8_label'><strong>7. Ecrit<\/strong><\/span>","score":62,"number":7},{"label":"<span class='top8_label'><strong>6. Prestation publique/Communication<\/strong><\/span>","score":62,"number":6},{"label":"12. Artistique","score":27,"number":12}]}]}, "donut_pie_summary");
                  });
          </script>
            </ul>
          <p></p>
        </ul>
      </div>
    </div>
</div>
</div>

<div class="row mb-4" id="cinqprincipaux" style="display: none">
  <div class="col-lg-12 box-titres">
    <h4 class="text-uppercase">Cinq principaux domaines de centres d’intérêts</h4>
    <hr class="bg-rose trait-titre mb-4">
  </div>
  <!-- <div class="col-lg-12 card-competences-metier"> -->
  <div class="col-lg-12">

    <div class="card mb-12 bg-light-rose custom-card">
      <div class="card-body">
        <h4 class="card-title bg-rose">Cinq principaux domaines de centres d’intérêts</h4>

        <ul class="card-text">
          <div class="cdchart subfactor_bar_chart general_interest_influencing" data-highcharts-chart="11">
            <div class="highcharts-container" id="highcharts-22" style="position: relative; overflow: hidden; width: 938px; height: 301px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: Dosis, sans-serif;">
              <img src="{{ asset('img/svg/chart10.svg') }}">
              <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                <?php
                echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 51.4286px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                  <span class="factor-label" style="color: red">'.$documents_span[403]->nodeValue, PHP_EOL.'</span></span>';
                echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 86.2857px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                  <strong>'.$documents_span[405]->nodeValue, PHP_EOL.'</strong></span>';

                echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 121.143px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                  <strong>'.$documents_span[406]->nodeValue, PHP_EOL.'</strong></span>';
                echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 156px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                  <strong>'.$documents_span[407]->nodeValue, PHP_EOL.'</strong></span>';
                echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 190.857px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                  <strong>'.$documents_span[408]->nodeValue, PHP_EOL.'</strong></span>';
                echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 225.714px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                  <strong>'.$documents_span[409]->nodeValue, PHP_EOL.'</strong></span>';
                echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 260.571px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                  <strong>'.$documents_span[410]->nodeValue, PHP_EOL.'</strong></span>';
                ?>
                </div>
                              <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                <?php
                                echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 51.4286px;" transform="translate(0,0)" opacity="1">
                                  <strong>'.$documents_span[411]->nodeValue, PHP_EOL.'</strong></span>';
                                  echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 86.2857px;" transform="translate(0,0)" opacity="1">'.$documents_span[412]->nodeValue, PHP_EOL.'</span>';
                                  echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 121.143px;" transform="translate(0,0)" opacity="1">'.$documents_span[413]->nodeValue, PHP_EOL.'</span>';

                                  echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 156px;" transform="translate(0,0)" opacity="1">'.$documents_span[414]->nodeValue, PHP_EOL.'</span>';
                                  echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 190.857px;" transform="translate(0,0)" opacity="1">'.$documents_span[415]->nodeValue, PHP_EOL.'</span>';
                                  echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 225.714px;" transform="translate(0,0)" opacity="1">'.$documents_span[416]->nodeValue, PHP_EOL.'</span>';
                                  echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 260.571px;" transform="translate(0,0)" opacity="1">'.$documents_span[417]->nodeValue, PHP_EOL.'</span>';
                                ?></div>
                                  <div class="highcharts-axis-labels highcharts-yaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                    <?php
                                    echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 321px; top: 13px;" opacity="1">'.$documents_span[418]->nodeValue, PHP_EOL.'</span>';
                                    echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 485.5px; top: 13px;" opacity="1">'.$documents_span[419]->nodeValue, PHP_EOL.'</span>';
                                    echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 650.5px; top: 13px;" opacity="1">'.$documents_span[420]->nodeValue, PHP_EOL.'</span>';
                                    ?>
                                  </div></div></div>
          <script type="text/javascript">
            $(document).ready(function() {
              subfactor_bar_chart({"labels":{"left":["<span class='factor-label'>Influencer (79%)<\/span>","<strong>1. Religieux<\/strong>","<strong>2. Conseil<\/strong>","<strong>3. Enseignement<\/strong>","<strong>5. Législation/Politique<\/strong>","<strong>4. Gestion/Ventes<\/strong>","<strong>8. International<\/strong>"],"right":["<strong>Elevé<\/strong> (80)","Très élevé (100)","Très élevé (92)","Elevé (82)","Elevé (73)","Elevé (73)","Moyen (58)"]},"data":[{"label":"Influencer","score":80},{"label":"Religieux","score":100},{"label":"Conseil","score":92},{"label":"Enseignement","score":82},{"label":"Législation/Politique","score":73},{"label":"Gestion/Ventes","score":73},{"label":"International","score":58}],"height":301}, "general_interest_influencing");
            });
          </script>

          <div class="cdchart subfactor_bar_chart general_interest_expressing" data-highcharts-chart="12">
            <div class="highcharts-container" id="highcharts-24" style="position: relative; overflow: hidden; width: 938px; height: 172px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: Dosis, sans-serif;">
              <img src="{{ asset('img/svg/chart11.svg') }}">
              <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                <?php
                echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 0, 0); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 48.375px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                  <span class="factor-label">'.$documents_span[421]->nodeValue, PHP_EOL.'</span></span>';
                echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 77.125px; width: 290px; display: block;" transform="translate(0,0)" opacity="1"><strong>'.$documents_span[423]->nodeValue, PHP_EOL.'</strong></span>';

                echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 105.875px; width: 290px; display: block;" transform="translate(0,0)" opacity="1"><strong>'.$documents_span[424]->nodeValue, PHP_EOL.'</strong></span>';
                echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 134.625px; width: 290px; display: block;" transform="translate(0,0)" opacity="1"><strong>'.$documents_span[425]->nodeValue, PHP_EOL.'</strong></span>';
                ?>
                </div>
                              <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                <?php
                                echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 48.375px;" transform="translate(0,0)" opacity="1"><strong>'.$documents_span[426]->nodeValue, PHP_EOL.'</strong></span>';
                                  echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 77.125px;" transform="translate(0,0)" opacity="1">'.$documents_span[427]->nodeValue, PHP_EOL.'</span>';
                                  echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 105.875px;" transform="translate(0,0)" opacity="1">'.$documents_span[428]->nodeValue, PHP_EOL.'</span>';

                                  echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 134.625px;" transform="translate(0,0)" opacity="1">'.$documents_span[429]->nodeValue, PHP_EOL.'</span>';
                                ?></div>
                                  <div class="highcharts-axis-labels highcharts-yaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                    <?php
                                    echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 321px; top: 13px;" opacity="1">'.$documents_span[430]->nodeValue, PHP_EOL.'</span>';
                                    echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 485.5px; top: 13px;" opacity="1">'.$documents_span[431]->nodeValue, PHP_EOL.'</span>';
                                    echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 650.5px; top: 13px;" opacity="1">'.$documents_span[432]->nodeValue, PHP_EOL.'</span>';
                                    ?>
                                  </div>
                                </div></div>
          <script type="text/javascript">
            $(document).ready(function() {
              subfactor_bar_chart({"labels":{"left":["<span class='factor-label'>Exprimer (21%)<\/span>","<strong>7. Ecrit<\/strong>","<strong>6. Prestation publique/Communication<\/strong>","12. Artistique"],"right":["<strong>Moyen<\/strong> (50)","Moyennement élevé (62)","Moyennement élevé (62)","Faible (27)"]},"data":[{"label":"Exprimer","score":50},{"label":"Ecrit","score":62},{"label":"Prestation publique/Communication","score":62},{"label":"Artistique","score":27}],"height":172}, "general_interest_expressing");
            });
          </script>

          <div class="cdchart subfactor_bar_chart general_interest_analyzing" data-highcharts-chart="13">
            <div class="highcharts-container" id="highcharts-26" style="position: relative; overflow: hidden; width: 938px; height: 172px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: Dosis, sans-serif;">
              <img src="{{ asset('img/svg/chart12.svg') }}">
              <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                <?php
                echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 0, 0); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 48.375px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                  <span class="factor-label">'.$documents_span[433]->nodeValue, PHP_EOL.'</span></span>';
                echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 77.125px; width: 290px; display: block;" transform="translate(0,0)" opacity="1"><strong>'.$documents_span[435]->nodeValue, PHP_EOL.'</strong></span>';

                echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 105.875px; width: 290px; display: block;" transform="translate(0,0)" opacity="1"><strong>'.$documents_span[436]->nodeValue, PHP_EOL.'</strong></span>';
                echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 134.625px; width: 290px; display: block;" transform="translate(0,0)" opacity="1"><strong>'.$documents_span[437]->nodeValue, PHP_EOL.'</strong></span>';
                ?>
                </div>
                              <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                <?php
                                echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 48.375px;" transform="translate(0,0)" opacity="1"><strong>'.$documents_span[438]->nodeValue, PHP_EOL.'</strong></span>';
                                  echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 77.125px;" transform="translate(0,0)" opacity="1">'.$documents_span[439]->nodeValue, PHP_EOL.'</span>';
                                  echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 105.875px;" transform="translate(0,0)" opacity="1">'.$documents_span[440]->nodeValue, PHP_EOL.'</span>';

                                  echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 134.625px;" transform="translate(0,0)" opacity="1">'.$documents_span[441]->nodeValue, PHP_EOL.'</span>';
                                ?></div>
                                  <div class="highcharts-axis-labels highcharts-yaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                    <?php
                                    echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 321px; top: 13px;" opacity="1">'.$documents_span[442]->nodeValue, PHP_EOL.'</span>';
                                    echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 485.5px; top: 13px;" opacity="1">'.$documents_span[443]->nodeValue, PHP_EOL.'</span>';
                                    echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 650.5px; top: 13px;" opacity="1">'.$documents_span[444]->nodeValue, PHP_EOL.'</span>';
                                    ?>
                                  </div>
                                </div></div>
          <script type="text/javascript">
            $(document).ready(function() {
              subfactor_bar_chart({"labels":{"left":["<span class='factor-label'>Analyser (0%)<\/span>","9. Informatique/Finance","10. Sciences Technologiques","14. Sciences/Santé"],"right":["<strong>Moyennement faible<\/strong> (39)","Moyen (50)","Moyen (43)","Faible (23)"]},"data":[{"label":"Analyser","score":39},{"label":"Informatique/Finance","score":50},{"label":"Sciences Technologiques","score":43},{"label":"Sciences/Santé","score":23}],"height":172}, "general_interest_analyzing");
            });
          </script>

          <div class="cdchart subfactor_bar_chart general_interest_doing" data-highcharts-chart="14">
            <div class="highcharts-container" id="highcharts-28" style="position: relative; overflow: hidden; width: 938px; height: 258px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: Dosis, sans-serif;">
              <img src="{{ asset('img/svg/chart13.svg') }}">
              <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                <?php
                echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 0, 0); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 50.75px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                  <span class="factor-label">'.$documents_span[445]->nodeValue, PHP_EOL.'</span></span>';
                echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 84.25px; width: 290px; display: block;" transform="translate(0,0)" opacity="1"><strong>'.$documents_span[447]->nodeValue, PHP_EOL.'</strong></span>';

                echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 117.75px; width: 290px; display: block;" transform="translate(0,0)" opacity="1"><strong>'.$documents_span[448]->nodeValue, PHP_EOL.'</strong></span>';
                echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 151.25px; width: 290px; display: block;" transform="translate(0,0)" opacity="1"><strong>'.$documents_span[449]->nodeValue, PHP_EOL.'</strong></span>';
                echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 184.75px; width: 290px; display: block;" transform="translate(0,0)" opacity="1"><strong>'.$documents_span[450]->nodeValue, PHP_EOL.'</strong></span>';
                echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 218.25px; width: 290px; display: block;" transform="translate(0,0)" opacity="1"><strong>'.$documents_span[451]->nodeValue, PHP_EOL.'</strong></span>';
                ?>
                </div>
                              <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                <?php
                                echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 50.75px;" transform="translate(0,0)" opacity="1"><strong>'.$documents_span[452]->nodeValue, PHP_EOL.'</strong></span>';
                                  echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 84.25px;" transform="translate(0,0)" opacity="1">'.$documents_span[453]->nodeValue, PHP_EOL.'</span>';
                                  echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 117.75px;" transform="translate(0,0)" opacity="1">'.$documents_span[454]->nodeValue, PHP_EOL.'</span>';

                                  echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 151.25px;" transform="translate(0,0)" opacity="1">'.$documents_span[455]->nodeValue, PHP_EOL.'</span>';
                                  echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 184.75px;" transform="translate(0,0)" opacity="1">'.$documents_span[456]->nodeValue, PHP_EOL.'</span>';
                                  echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 218.25px;" transform="translate(0,0)" opacity="1">'.$documents_span[457]->nodeValue, PHP_EOL.'</span>';
                                ?></div>
                                  <div class="highcharts-axis-labels highcharts-yaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                    <?php
                                    echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 321px; top: 13px;" opacity="1">'.$documents_span[458]->nodeValue, PHP_EOL.'</span>';
                                    echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 485.5px; top: 13px;" opacity="1">'.$documents_span[459]->nodeValue, PHP_EOL.'</span>';
                                    echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 650.5px; top: 13px;" opacity="1">'.$documents_span[460]->nodeValue, PHP_EOL.'</span>';
                                    ?>
                                  </div>
                                </div></div>
          <script type="text/javascript">
            $(document).ready(function() {
              subfactor_bar_chart({"labels":{"left":["<span class='factor-label'>Faire (0%)<\/span>","11. Mécanique","15. Sport","16. Sécurité/Forces de l'ordre","17. Aventure","19. Extérieur/Agriculture"],"right":["<strong>Très faible<\/strong> (10)","Faible (28)","Très faible (13)","Très faible (5)","Très faible (3)","Très faible (2)"]},"data":[{"label":"Faire","score":10},{"label":"Mécanique","score":28},{"label":"Sport","score":13},{"label":"Sécurité/Forces de l'ordre","score":5},{"label":"Aventure","score":3},{"label":"Extérieur/Agriculture","score":2}],"height":258}, "general_interest_doing");
            });
          </script>

          <div class="cdchart subfactor_bar_chart general_interest_helping" data-highcharts-chart="15">
            <div class="highcharts-container" id="highcharts-30" style="position: relative; overflow: hidden; width: 938px; height: 215px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: Dosis, sans-serif;">
              <img src="{{ asset('img/svg/chart14.svg') }}">
              <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                <?php
                echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 0, 0); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 50.75px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                  <span class="factor-label">'.$documents_span[461]->nodeValue, PHP_EOL.'</span></span>';
                echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 84.25px; width: 290px; display: block;" transform="translate(0,0)" opacity="1"><strong>'.$documents_span[463]->nodeValue, PHP_EOL.'</strong></span>';

                echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 117.75px; width: 290px; display: block;" transform="translate(0,0)" opacity="1"><strong>'.$documents_span[464]->nodeValue, PHP_EOL.'</strong></span>';
                echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 151.25px; width: 290px; display: block;" transform="translate(0,0)" opacity="1"><strong>'.$documents_span[465]->nodeValue, PHP_EOL.'</strong></span>';
                echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 184.75px; width: 290px; display: block;" transform="translate(0,0)" opacity="1"><strong>'.$documents_span[466]->nodeValue, PHP_EOL.'</strong></span>';
                ?>
                </div>
                              <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                <?php
                                echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 50.75px;" transform="translate(0,0)" opacity="1"><strong>'.$documents_span[467]->nodeValue, PHP_EOL.'</strong></span>';
                                  echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 84.25px;" transform="translate(0,0)" opacity="1">'.$documents_span[468]->nodeValue, PHP_EOL.'</span>';
                                  echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 117.75px;" transform="translate(0,0)" opacity="1">'.$documents_span[469]->nodeValue, PHP_EOL.'</span>';

                                  echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 151.25px;" transform="translate(0,0)" opacity="1">'.$documents_span[470]->nodeValue, PHP_EOL.'</span>';
                                  echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 184.75px;" transform="translate(0,0)" opacity="1">'.$documents_span[471]->nodeValue, PHP_EOL.'</span>';
                                ?></div>
                                  <div class="highcharts-axis-labels highcharts-yaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                    <?php
                                    echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 321px; top: 13px;" opacity="1">'.$documents_span[472]->nodeValue, PHP_EOL.'</span>';
                                    echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 485.5px; top: 13px;" opacity="1">'.$documents_span[473]->nodeValue, PHP_EOL.'</span>';
                                    echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 650.5px; top: 13px;" opacity="1">'.$documents_span[474]->nodeValue, PHP_EOL.'</span>';
                                    ?>
                                  </div>

              </div></div>
          <script type="text/javascript">
            $(document).ready(function() {
              subfactor_bar_chart({"labels":{"left":["<span class='factor-label'>Aider (0%)<\/span>","13. Service","18. Sciences de la consommation","21. Soin animalier","20. Transport"],"right":["<strong>Très faible<\/strong> (7)","Faible (25)","Très faible (3)","Très faible (0)","Très faible (0)"]},"data":[{"label":"Aider","score":7},{"label":"Service","score":25},{"label":"Sciences de la consommation","score":3},{"label":"Soin animalier","score":0},{"label":"Transport","score":0}],"height":215}, "general_interest_helping");
            });
          </script>
            </ul>
          <p></p>
        </ul>
      </div>
    </div>
</div>
</div>

<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item btn1"><a class="page-link" href="#principaux">1</a></li>
    <li class="page-item btn2"><a class="page-link" href="#cinqprincipaux">2</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav>

  <hr class="bg-vert trait-titre mt-4 mb-4">

<div class="row">
  <div class="col-lg-12">

    <table class="table table-bordered table-recherche text-center">
      <tbody>

                <tr class="liste-titre liste-vert-titre" id="huitpremiers">
          <td colspan="2">
            <a href="{{ route('career_direct_interetprohuit', ['id' => Auth::id()]) }}" class="lien-fiche">Huit premiers groupes de professions</a>
          </td>
        </tr>
        <tr class="liste-recherche liste-vert">
          <td>
            <p><?php echo $documents[61]->nodeValue, PHP_EOL.' ...' ?></p>
          </td>
          <td class="align-middle"><a href="{{ route('career_direct_interetprohuit', ['id' => Auth::id()]) }}"><i class="icon ion-clipboard"></i></a></td>
        </tr>
        <tr class="liste-spacer"> </tr>

                <tr class="liste-titre liste-vert-titre" id="scores">
          <td colspan="2">
            <a href="{{ route('career_direct_scorescombines', ['id' => Auth::id()]) }}" class="lien-fiche">Scores combinés</a>
          </td>
        </tr>
        <tr class="liste-recherche liste-vert">
          <td>
            <p><?php echo $documents[80]->nodeValue, PHP_EOL.' ...' ?></p>
          </td>
          <td class="align-middle"><a href="{{ route('career_direct_scorescombines', ['id' => Auth::id()]) }}"><i class="icon ion-clipboard"></i></a></td>
        </tr>
        <tr class="liste-spacer"> </tr>

                <tr class="liste-titre liste-vert-titre" id="potentiels">
          <td colspan="2">
            <a href="{{ route('career_direct_metierspotentiels', ['id' => Auth::id()]) }}" class="lien-fiche">Métiers potentiels</a>
          </td>
        </tr>
        <tr class="liste-recherche liste-vert">
          <td>
            <p><?php echo $documents[81]->nodeValue, PHP_EOL.' ...' ?></p>
          </td>
          <td class="align-middle"><a href="{{ route('career_direct_metierspotentiels', ['id' => Auth::id()]) }}"><i class="icon ion-clipboard"></i></a></td>
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

<a name="Cinq"></a>



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
<p>This is a paragraph.</p>


@endsection

@section('javascript')
  <script type="text/javascript">
      $(document).ready(function(){
        $(".btn1").click(function(){
          $("#cinqprincipaux").hide();
          $("#principaux").show();
          $([document.documentElement, document.body]).animate({
            scrollTop: $("#principaux").offset().top - 100
          }, 1000);
        });
        $(".btn2").click(function(){
          $("#cinqprincipaux").show();
          $("#principaux").hide();
          $([document.documentElement, document.body]).animate({
            scrollTop: $("#cinqprincipaux").offset().top - 100
          }, 1000);
        });
      });

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
