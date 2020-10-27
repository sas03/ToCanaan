{{-- Careerdirect --}}
@extends('layouts.master') @section('title', 'Fiche Careerdirect')

@section('main_title')
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <h4 class="text-uppercase">
        @if (Auth::user() && Auth::user()->id == $user->id)
          VOS FACTEURS ET SOUS-FACTEURS
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
    <?php
    echo $documents[18]->nodeValue.'<br><br>';
    ?>
  </div>
  <div class="row mb-4">
    <div class="col-lg-12 card-competences-metier mb-4">

      <div class="card mb-12 bg-light-vert custom-card">
        <div class="card-body">
          <h4 class="card-title bg-vert cdreport-header cdreport-header-alt"><?php echo $bath[2]->nodeValue, PHP_EOL; ?></h4>

          <ul class="card-text">
            <ul>
            <li><p class="margin-top-negative text-center"><?php
            echo $documents[19]->nodeValue.'<br><br>';
            ?></p>
            <div class="subfactor_split chart_adventurousness cdchart" style="padding: 10px;" data-highcharts-chart="3"><div class="highcharts-container" id="highcharts-6" style="position: relative; overflow: hidden; width: 918px; height: 129px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: Dosis, sans-serif;">
              <img src="{{ asset('img/svg/chart2.svg')}}">
              <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                <?php
                echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255,0,0); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 54.1667px;" transform="translate(0,0)" opacity="1"><span>'.$documents_span[93]->nodeValue, PHP_EOL.'</span></span>';
                echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255,255,255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 80.5px;" transform="translate(0,0)" opacity="1"><span>'.$documents_span[96]->nodeValue, PHP_EOL.'</span></span>';

                echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255,255,255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 106.833px;" transform="translate(0,0)" opacity="1"><span>'.$documents_span[98]->nodeValue, PHP_EOL.'</span></span>';
                ?>
                    </div>
                        <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                          <?php
                          echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255,0,0); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 608px; top: 54.1667px;" transform="translate(0,0)" opacity="1">
                            <span>'.$documents_span[100]->nodeValue, PHP_EOL.'</span></span>';
                            echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255,255,255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 608px; top: 80.5px;" transform="translate(0,0)" opacity="1">
                              <span>'.$documents_span[104]->nodeValue, PHP_EOL.'</span></span>';
                            echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255,255,255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 608px; top: 106.833px;" transform="translate(0,0)" opacity="1">
                              <span>'.$documents_span[107]->nodeValue, PHP_EOL.'</span></span>';
                          ?>
                        </div>
                        <div class="highcharts-axis-labels highcharts-yaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                          <?php
                          echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 316.5px; top: 20px;" opacity="1">'.$documents_span[110]->nodeValue, PHP_EOL.'</span>';
                          echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 361.167px; top: 20px;" opacity="1">'.$documents_span[111]->nodeValue, PHP_EOL.'</span>';
                          echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 405.833px; top: 20px;" opacity="1">'.$documents_span[112]->nodeValue, PHP_EOL.'</span>';
                          echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 432.667px; top: 20px;" opacity="1">'.$documents_span[113]->nodeValue, PHP_EOL.'</span>';
                          echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 447px; top: 20px;" opacity="1">'.$documents_span[114]->nodeValue, PHP_EOL.'</span>';
                          echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 477.333px; top: 20px;" opacity="1">'.$documents_span[115]->nodeValue, PHP_EOL.'</span>';
                          echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 495.167px; top: 20px;" opacity="1">'.$documents_span[116]->nodeValue, PHP_EOL.'</span>';
                          echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 539.833px; top: 20px;" opacity="1">'.$documents_span[117]->nodeValue, PHP_EOL.'</span>';
                          echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 584.5px; top: 20px;" opacity="1">'.$documents_span[118]->nodeValue, PHP_EOL.'</span>';
                          ?>
                        </div>
                      </div>
                    </div>
      			<script type="text/javascript">
      					$(document).ready(function() {
      						subfactor_splitbar_chart({"labels":{"left":["<span><span class='factor-label'>Prudent(e)<\/span><\/span>","<span>Conservateur(trice)<\/span>","<span>Satisfait(e) de sa situation<\/span>"],"right":["<span><span class='factor-label'>Aventureux(se)<\/span><\/span>&nbsp;<span>(20)<\/span>","<span>Audacieux(se)<\/span>&nbsp;<span>(18)<\/span>","<span>Ambitieux(se)<\/span>&nbsp;<span>(16)<\/span>"]},"data":[{"label":"Esprit d'aventure","score":20},{"label":"Audacieux(se)","score":18},{"label":"Ambitieux(se)","score":16}],"height":129}, "chart_adventurousness", true);
      					});
      			</script>
            {{-- Barre --}}
      			<div class="cdreport-container text-center">
      				<h4>Incidences sur la carrière</h4>
      				<div class="career-implications">
                <p><?php
                echo $documents[20]->nodeValue.'<br><br>';
                ?></p><span class="row cdreport-horizontal-list mb-4">
                  <span class="row cdreport-horizontal-list">
                    <span class="col-md-4 cdreport-horizontal-list-item">
                      <i class="fa fa-check"></i><?php echo $documents_span[120]->nodeValue, PHP_EOL ?></span>
                      <span class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i><?php echo $documents_span[121]->nodeValue, PHP_EOL ?></span>
                      <span class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i><?php echo $documents_span[122]->nodeValue, PHP_EOL ?></span>
                      <span class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i><?php echo $documents_span[123]->nodeValue, PHP_EOL ?></span>
                      <span class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i><?php echo $documents_span[124]->nodeValue, PHP_EOL ?></span>
                      <span class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i><?php echo $documents_span[125]->nodeValue, PHP_EOL ?></span>
                    </span></span>
      				</div>
      			</div>
            <div class="personalty-highlights-explanation">
        			<p class="text_b"> <?php
              echo $documents[21]->nodeValue;
              ?> </p><p class="text_b">        <?php
              echo $documents[22]->nodeValue;
              ?></p><p class="text_b">    <?php
              echo $documents[23]->nodeValue;
              ?></p>
        		</div>
            </li>
            </ul>
          </ul>
        </div>
      </div>
    </div>
  </div>

<div class="row mb-4">
  <div class="col-lg-12 card-competences-metier mb-4">

    <div class="card mb-12 bg-light-rose custom-card">
      <div class="card-body">
        <h4 class="card-title bg-rose cdreport-header cdreport-header-alt"><?php echo $bath[3]->nodeValue, PHP_EOL; ?></h4>

        <ul class="card-text">
          <ul>
          <li>
            <div style="page-break-inside: avoid">
        			<p class="margin-top-negative text-center"><?php echo $documents[24]->nodeValue, PHP_EOL ?></p>
        			<div class="subfactor_split chart_innovation cdchart" style="padding: 10px;" data-highcharts-chart="4">
                <div class="highcharts-container" id="highcharts-8" style="position: relative; overflow: hidden; width: 918px; height: 129px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: Dosis, sans-serif;">
                  <img src="{{ asset('img/svg/chart3.svg')}}">
                  <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                    <?php
                    echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255,0,0); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 54.1667px;" transform="translate(0,0)" opacity="1"><span>'.$documents_span[126]->nodeValue, PHP_EOL.'</span></span>';
                    echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255,255,255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 80.5px;" transform="translate(0,0)" opacity="1"><span>'.$documents_span[129]->nodeValue, PHP_EOL.'</span></span>';

                    echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255,255,255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 106.833px;" transform="translate(0,0)" opacity="1"><span>'.$documents_span[131]->nodeValue, PHP_EOL.'</span></span>';
                    ?>
                  </div>
                  <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                    <?php
                    echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255,0,0); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 608px; top: 54.1667px;" transform="translate(0,0)" opacity="1">
                      <span>'.$documents_span[133]->nodeValue, PHP_EOL.'</span></span>';
                      echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255,255,255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 608px; top: 80.5px;" transform="translate(0,0)" opacity="1">
                        <span>'.$documents_span[137]->nodeValue, PHP_EOL.'</span></span>';
                      echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255,255,255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 608px; top: 106.833px;" transform="translate(0,0)" opacity="1">
                        <span>'.$documents_span[140]->nodeValue, PHP_EOL.'</span></span>';
                    ?>
                  </div>
                  <div class="highcharts-axis-labels highcharts-yaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                    <?php
                    echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 316.5px; top: 20px;" opacity="1">'.$documents_span[143]->nodeValue, PHP_EOL.'</span>';
                    echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 361.167px; top: 20px;" opacity="1">'.$documents_span[144]->nodeValue, PHP_EOL.'</span>';
                    echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 405.833px; top: 20px;" opacity="1">'.$documents_span[145]->nodeValue, PHP_EOL.'</span>';
                    echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 432.667px; top: 20px;" opacity="1">'.$documents_span[146]->nodeValue, PHP_EOL.'</span>';
                    echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 447px; top: 20px;" opacity="1">'.$documents_span[147]->nodeValue, PHP_EOL.'</span>';
                    echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 477.333px; top: 20px;" opacity="1">'.$documents_span[148]->nodeValue, PHP_EOL.'</span>';
                    echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 495.167px; top: 20px;" opacity="1">'.$documents_span[149]->nodeValue, PHP_EOL.'</span>';
                    echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 539.833px; top: 20px;" opacity="1">'.$documents_span[150]->nodeValue, PHP_EOL.'</span>';
                    echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 584.5px; top: 20px;" opacity="1">'.$documents_span[151]->nodeValue, PHP_EOL.'</span>';
                    ?>
                  </div></div></div>
        			<script type="text/javascript">
        					$(document).ready(function() {
        						subfactor_splitbar_chart({"labels":{"left":["<span><span class='factor-label'>Conventionnel(le)<\/span><\/span>","<span>Prévisible<\/span>","<span>Traditionnel(le)<\/span>"],"right":["<span><span class='factor-label'>Innovateur(trice)<\/span><\/span>&nbsp;<span>(19)<\/span>","<span>Imaginatif(ve)<\/span>&nbsp;<span>(21)<\/span>","<span>Vif(ve) d'esprit<\/span>&nbsp;<span>(13)<\/span>"]},"data":[{"label":"Innovation","score":19},{"label":"Imaginatif(ve)","score":21},{"label":"Vif(ve) d'esprit","score":13}],"height":129}, "chart_innovation", true);
        					});
        			</script>
        			<div class="cdreport-container text-center">
        				<h4>Incidences sur la carrière</h4>
        				<div class="career-implications">
        					<p> <?php echo $documents[25]->nodeValue, PHP_EOL ?></p>
                  <span class="row cdreport-horizontal-list mb-4">
                    <span class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i><?php echo $documents_span[153]->nodeValue, PHP_EOL ?></span>
                    <span class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i><?php echo $documents_span[154]->nodeValue, PHP_EOL ?></span>
                    <span class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i><?php echo $documents_span[155]->nodeValue, PHP_EOL ?></span>
                    <span class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i><?php echo $documents_span[156]->nodeValue, PHP_EOL ?></span>
                    <span class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i><?php echo $documents_span[157]->nodeValue, PHP_EOL ?></span>
                    <span class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i><?php echo $documents_span[158]->nodeValue, PHP_EOL ?></span>
                  </span>
        				</div>
        			</div>
        		</div>
        		<div class="personalty-highlights-explanation">
        			<p class="text_b"><?php echo $documents[26]->nodeValue, PHP_EOL ?> <b></b> </p>
              <p class="text_b"><?php echo $documents[27]->nodeValue, PHP_EOL ?> </p>
              <p class="text_b"><?php echo $documents[28]->nodeValue, PHP_EOL ?></p>
        		</div>
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
        <h4 class="card-title bg-vert cdreport-header cdreport-header-alt"><?php echo $bath[4]->nodeValue, PHP_EOL; ?></h4>

        <ul class="card-text">
          <ul>
          <li>
            <div style="page-break-inside: avoid">
        			<p class="margin-top-negative text-center"><?php echo $documents[29]->nodeValue, PHP_EOL ?></p>
        			<div class="subfactor_split chart_compassion cdchart" style="padding: 10px;" data-highcharts-chart="5">
                <div class="highcharts-container" id="highcharts-10" style="position: relative; overflow: hidden; width: 918px; height: 172px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: Dosis, sans-serif;">
                  <img src="{{ asset('img/svg/chart4.svg') }}">
                  <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                    <?php
                    echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255,0,0); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 56.25px;" transform="translate(0,0)" opacity="1"><span>'.$documents_span[159]->nodeValue, PHP_EOL.'</span></span>';
                    echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255,255,255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 86.75px;" transform="translate(0,0)" opacity="1"><span>'.$documents_span[162]->nodeValue, PHP_EOL.'</span></span>';

                    echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255,255,255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 117.25px;" transform="translate(0,0)" opacity="1"><span>'.$documents_span[164]->nodeValue, PHP_EOL.'</span></span>';
                    echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255,255,255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 147.75px;" transform="translate(0,0)" opacity="1"><span>'.$documents_span[166]->nodeValue, PHP_EOL.'</span></span>';
                    ?></div>
                            <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                              <?php
                              echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255,0,0); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 283px; display: block; left: 608px; top: 56.25px;" transform="translate(0,0)" opacity="1">
                                <span>'.$documents_span[168]->nodeValue, PHP_EOL.'</span></span>';
                                echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255,255,255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 608px; top: 86.75px;" transform="translate(0,0)" opacity="1">
                                  <span>'.$documents_span[172]->nodeValue, PHP_EOL.'</span></span>';
                                echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255,255,255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 283px; display: block; left: 608px; top: 117.25px;" transform="translate(0,0)" opacity="1">
                                  <span>'.$documents_span[175]->nodeValue, PHP_EOL.'</span></span>';
                                  echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255,255,255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 608px; top: 147.75px;" transform="translate(0,0)" opacity="1">
                                    <span>'.$documents_span[178]->nodeValue, PHP_EOL.'</span></span>';
                              ?></div>
                                      <div class="highcharts-axis-labels highcharts-yaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                        <?php
                                        echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 316.5px; top: 20px;" opacity="1">'.$documents_span[181]->nodeValue, PHP_EOL.'</span>';
                                        echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 361.167px; top: 20px;" opacity="1">'.$documents_span[182]->nodeValue, PHP_EOL.'</span>';
                                        echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 405.833px; top: 20px;" opacity="1">'.$documents_span[183]->nodeValue, PHP_EOL.'</span>';
                                        echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 432.667px; top: 20px;" opacity="1">'.$documents_span[184]->nodeValue, PHP_EOL.'</span>';
                                        echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 447px; top: 20px;" opacity="1">'.$documents_span[185]->nodeValue, PHP_EOL.'</span>';
                                        echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 477.333px; top: 20px;" opacity="1">'.$documents_span[186]->nodeValue, PHP_EOL.'</span>';
                                        echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 495.167px; top: 20px;" opacity="1">'.$documents_span[187]->nodeValue, PHP_EOL.'</span>';
                                        echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 539.833px; top: 20px;" opacity="1">'.$documents_span[188]->nodeValue, PHP_EOL.'</span>';
                                        echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 584.5px; top: 20px;" opacity="1">'.$documents_span[189]->nodeValue, PHP_EOL.'</span>';
                                        ?>
                                      </div></div></div>
        			<script type="text/javascript">
        					$(document).ready(function() {
        						subfactor_splitbar_chart({"labels":{"left":["<span><span class='factor-label'>Détaché(e)<\/span><\/span>","<span>Neutre<\/span>","<span>Objectif(ve)<\/span>","<span>Interrogateur(trice)<\/span>"],"right":["<span><span class='factor-label'>Plein(e) de compassion<\/span><\/span>&nbsp;<span>(11)<\/span>","<span>Compréhensif(ve)<\/span>&nbsp;<span>(1)<\/span>","<span>Qui soutient, encourage<\/span>&nbsp;<span>(13)<\/span>","<span>Tolérant(e)<\/span>&nbsp;<span>(17)<\/span>"]},"data":[{"label":"Compassion","score":11},{"label":"Compréhensif(ve)","score":1},{"label":"Qui soutient, encourage","score":13},{"label":"Tolérant(e)","score":17}],"height":172}, "chart_compassion", true);
        					});
        			</script>
        			<div class="cdreport-container text-center">
        				<h4>Incidences sur la carrière</h4>
        				<div class="career-implications">
        					<p><?php echo $documents[30]->nodeValue, PHP_EOL ?></p>
                  <span class="row cdreport-horizontal-list mb-4">
                    <span class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i><?php echo $documents_span[191]->nodeValue, PHP_EOL ?></span>
                    <span class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i><?php echo $documents_span[192]->nodeValue, PHP_EOL ?></span>
                    <span class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i><?php echo $documents_span[193]->nodeValue, PHP_EOL ?></span>
                    <span class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i><?php echo $documents_span[194]->nodeValue, PHP_EOL ?></span>
                    <span class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i><?php echo $documents_span[195]->nodeValue, PHP_EOL ?></span>
                    <span class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i><?php echo $documents_span[196]->nodeValue, PHP_EOL ?></span>
                  </span>
        				</div>
        			</div>
              <div class="personalty-highlights-explanation">
          			<p class="text_b"><?php echo $documents[31]->nodeValue, PHP_EOL ?></p>
                <p class="text_b"><?php echo $documents[32]->nodeValue, PHP_EOL ?></p>
                <p class="text_b"><?php echo $documents[33]->nodeValue, PHP_EOL ?></p>
          		</div>
          </li>
          </ul>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="row mb-4">
  <div class="col-lg-12 card-competences-metier mb-4">

    <div class="card mb-12 bg-light-rose custom-card">
      <div class="card-body">
        <h4 class="card-title bg-rose cdreport-header cdreport-header-alt"><?php echo $bath[5]->nodeValue, PHP_EOL; ?></h4>

        <ul class="card-text">
          <ul>
          <li>
            <div style="page-break-inside: avoid">
        			<p class="margin-top-negative text-center"><?php echo $documents[34]->nodeValue, PHP_EOL ?></p>

        			<div class="subfactor_split chart_extroversion cdchart" style="padding: 10px;" data-highcharts-chart="6"><div class="highcharts-container" id="highcharts-12" style="position: relative; overflow: hidden; width: 918px; height: 172px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: Dosis, sans-serif;">
                <img src="{{ asset('img/svg/chart5.svg') }}">
                <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                  <?php
                  echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255,0,0); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 56.25px;" transform="translate(0,0)" opacity="1"><span>'.$documents_span[197]->nodeValue, PHP_EOL.'</span></span>';
                  echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255,255,255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 86.75px;" transform="translate(0,0)" opacity="1"><span>'.$documents_span[200]->nodeValue, PHP_EOL.'</span></span>';

                  echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255,255,255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 117.25px;" transform="translate(0,0)" opacity="1"><span>'.$documents_span[202]->nodeValue, PHP_EOL.'</span></span>';
                  echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255,255,255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 147.75px;" transform="translate(0,0)" opacity="1"><span>'.$documents_span[204]->nodeValue, PHP_EOL.'</span></span>';
                  ?></div>
                          <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                            <?php
                            echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255,0,0); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 283px; display: block; left: 608px; top: 56.25px;" transform="translate(0,0)" opacity="1">
                              <span>'.$documents_span[206]->nodeValue, PHP_EOL.'</span></span>';
                              echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255,255,255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 608px; top: 86.75px;" transform="translate(0,0)" opacity="1">
                                <span>'.$documents_span[210]->nodeValue, PHP_EOL.'</span></span>';
                              echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255,255,255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 283px; display: block; left: 608px; top: 117.25px;" transform="translate(0,0)" opacity="1">
                                <span>'.$documents_span[213]->nodeValue, PHP_EOL.'</span></span>';
                                echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255,255,255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 608px; top: 147.75px;" transform="translate(0,0)" opacity="1">
                                  <span>'.$documents_span[216]->nodeValue, PHP_EOL.'</span></span>';
                            ?></div>
                                    <div class="highcharts-axis-labels highcharts-yaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                      <?php
                                      echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 316.5px; top: 20px;" opacity="1">'.$documents_span[219]->nodeValue, PHP_EOL.'</span>';
                                      echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 361.167px; top: 20px;" opacity="1">'.$documents_span[220]->nodeValue, PHP_EOL.'</span>';
                                      echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 405.833px; top: 20px;" opacity="1">'.$documents_span[221]->nodeValue, PHP_EOL.'</span>';
                                      echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 432.667px; top: 20px;" opacity="1">'.$documents_span[222]->nodeValue, PHP_EOL.'</span>';
                                      echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 447px; top: 20px;" opacity="1">'.$documents_span[223]->nodeValue, PHP_EOL.'</span>';
                                      echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 477.333px; top: 20px;" opacity="1">'.$documents_span[224]->nodeValue, PHP_EOL.'</span>';
                                      echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 495.167px; top: 20px;" opacity="1">'.$documents_span[225]->nodeValue, PHP_EOL.'</span>';
                                      echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 539.833px; top: 20px;" opacity="1">'.$documents_span[226]->nodeValue, PHP_EOL.'</span>';
                                      echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 584.5px; top: 20px;" opacity="1">'.$documents_span[227]->nodeValue, PHP_EOL.'</span>';
                                      ?>
                                    </div></div></div>
        			<script type="text/javascript">
        					$(document).ready(function() {
        						subfactor_splitbar_chart({"labels":{"left":["<span><span class='factor-label'>Introverti(e)<\/span><\/span>","<span>Distant(e)<\/span>","<span>Réservé(e)<\/span>","<span>Posé<\/span>"],"right":["<span><span class='factor-label'>Extraverti(e)<\/span><\/span>&nbsp;<span>(9)<\/span>","<span>Enthousiaste<\/span>&nbsp;<span>(12)<\/span>","<span>Social(e)<\/span>&nbsp;<span>(8)<\/span>","<span>Verbal(e)<\/span>&nbsp;<span>(5)<\/span>"]},"data":[{"label":"Extraversion","score":9},{"label":"Enthousiaste","score":12},{"label":"Social(e)","score":8},{"label":"Verbal(e)","score":5}],"height":172}, "chart_extroversion", true);
        					});
        			</script>
        			<div class="cdreport-container text-center">
        				<h4>Incidences sur la carrière</h4>
        				<div class="career-implications">
        					<p><?php echo $documents[35]->nodeValue, PHP_EOL ?></p>
                  <span class="row cdreport-horizontal-list mb-4">
                    <span class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i><?php echo $documents_span[229]->nodeValue, PHP_EOL ?></span>
                    <span class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i><?php echo $documents_span[230]->nodeValue, PHP_EOL ?></span>
                    <span class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i><?php echo $documents_span[231]->nodeValue, PHP_EOL ?></span>
                    <span class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i><?php echo $documents_span[232]->nodeValue, PHP_EOL ?></span>
                    <span class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i><?php echo $documents_span[233]->nodeValue, PHP_EOL ?></span>
                    <span class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i><?php echo $documents_span[234]->nodeValue, PHP_EOL ?></span>
                  </span>
        				</div>
        			</div>
        		</div>
        		<div class="personalty-highlights-explanation">
        			<p class="text_b"><?php echo $documents[36]->nodeValue, PHP_EOL ?></p>
              <p class="text_b"><?php echo $documents[37]->nodeValue, PHP_EOL ?></p>
              <p class="text_b"><?php echo $documents[38]->nodeValue, PHP_EOL ?></p>
              <p class="text_b"><?php echo $documents[39]->nodeValue, PHP_EOL ?></p>
        		</div>
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
        <h4 class="card-title bg-vert cdreport-header cdreport-header-alt"><?php echo $bath[6]->nodeValue, PHP_EOL; ?></h4>

        <ul class="card-text">
          <ul>
          <li>
            <div style="page-break-inside: avoid">
        			<p class="margin-top-negative text-center"><?php echo $documents[40]->nodeValue, PHP_EOL ?></p>
        			<div class="subfactor_split chart_dominance cdchart" style="padding: 10px;" data-highcharts-chart="7">
                <div class="highcharts-container" id="highcharts-14" style="position: relative; overflow: hidden; width: 918px; height: 172px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: Dosis, sans-serif;">
                  <img src="{{ asset('img/svg/chart6.svg') }}">
                  <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                    <?php
                    echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255,0,0); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 56.25px;" transform="translate(0,0)" opacity="1"><span>'.$documents_span[235]->nodeValue, PHP_EOL.'</span></span>';
                    echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255,255,255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 86.75px;" transform="translate(0,0)" opacity="1"><span>'.$documents_span[237]->nodeValue, PHP_EOL.'</span></span>';

                    echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255,255,255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 117.25px;" transform="translate(0,0)" opacity="1"><span>'.$documents_span[240]->nodeValue, PHP_EOL.'</span></span>';
                    echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255,255,255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 147.75px;" transform="translate(0,0)" opacity="1"><span>'.$documents_span[243]->nodeValue, PHP_EOL.'</span></span>';
                    ?></div>
                            <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                              <?php
                              echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255,0,0); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 283px; display: block; left: 608px; top: 56.25px;" transform="translate(0,0)" opacity="1">
                                <span>'.$documents_span[245]->nodeValue, PHP_EOL.'</span></span>';
                                echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255,255,255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 608px; top: 86.75px;" transform="translate(0,0)" opacity="1">
                                  <span>'.$documents_span[249]->nodeValue, PHP_EOL.'</span></span>';
                                echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255,255,255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 283px; display: block; left: 608px; top: 117.25px;" transform="translate(0,0)" opacity="1">
                                  <span>'.$documents_span[252]->nodeValue, PHP_EOL.'</span></span>';
                                  echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255,255,255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 608px; top: 147.75px;" transform="translate(0,0)" opacity="1">
                                    <span>'.$documents_span[254]->nodeValue, PHP_EOL.'</span></span>';
                              ?></div>
                                      <div class="highcharts-axis-labels highcharts-yaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                        <?php
                                        echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 316.5px; top: 20px;" opacity="1">'.$documents_span[257]->nodeValue, PHP_EOL.'</span>';
                                        echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 361.167px; top: 20px;" opacity="1">'.$documents_span[258]->nodeValue, PHP_EOL.'</span>';
                                        echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 405.833px; top: 20px;" opacity="1">'.$documents_span[259]->nodeValue, PHP_EOL.'</span>';
                                        echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 432.667px; top: 20px;" opacity="1">'.$documents_span[260]->nodeValue, PHP_EOL.'</span>';
                                        echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 447px; top: 20px;" opacity="1">'.$documents_span[261]->nodeValue, PHP_EOL.'</span>';
                                        echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 477.333px; top: 20px;" opacity="1">'.$documents_span[262]->nodeValue, PHP_EOL.'</span>';
                                        echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 495.167px; top: 20px;" opacity="1">'.$documents_span[263]->nodeValue, PHP_EOL.'</span>';
                                        echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 539.833px; top: 20px;" opacity="1">'.$documents_span[264]->nodeValue, PHP_EOL.'</span>';
                                        echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 584.5px; top: 20px;" opacity="1">'.$documents_span[265]->nodeValue, PHP_EOL.'</span>';
                                        ?>
                                      </div></div></div>
        			<script type="text/javascript">
        					$(document).ready(function() {
        						subfactor_splitbar_chart({"labels":{"left":["<span><span class='factor-label'>Accomodant(e)<\/span><\/span>","<span>Accomodant(e)<\/span>","<span>(14)<\/span>&nbsp;<span>Conformiste<\/span>","<span>Plein(e) de tact<\/span>"],"right":["<span><span class='factor-label'>Meneur(se)<\/span><\/span>&nbsp;<span>(9)<\/span>","<span>Défend son point de vue<\/span>&nbsp;<span>(15)<\/span>","<span>Indépendant(e)<\/span>","<span>Direct(e)<\/span>&nbsp;<span>(17)<\/span>"]},"data":[{"label":"Domination","score":9},{"label":"Défend son point de vue","score":15},{"label":"Indépendant(e)","score":-14},{"label":"Direct(e)","score":17}],"height":172}, "chart_dominance", true);
        					});
        			</script>
        			<div class="cdreport-container text-center">
        				<h4>Incidences sur la carrière</h4>
        				<div class="career-implications">
        					<p><?php echo $documents[41]->nodeValue, PHP_EOL ?></p>
                  <span class="row cdreport-horizontal-list mb-4">
                    <span class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i><?php echo $documents_span[267]->nodeValue, PHP_EOL ?></span>
                    <span class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i><?php echo $documents_span[268]->nodeValue, PHP_EOL ?></span>
                    <span class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i><?php echo $documents_span[269]->nodeValue, PHP_EOL ?></span>
                    <span class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i><?php echo $documents_span[270]->nodeValue, PHP_EOL ?></span>
                    <span class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i><?php echo $documents_span[271]->nodeValue, PHP_EOL ?></span>
                    <span class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i><?php echo $documents_span[272]->nodeValue, PHP_EOL ?></span>
                  </span>
        				</div>
        			</div>
        		</div>
        		<div class="personalty-highlights-explanation">
        			<p class="text_b"><?php echo $documents[42]->nodeValue, PHP_EOL ?></p>
              <p class="text_b"><?php echo $documents[43]->nodeValue, PHP_EOL ?></p>
              <p class="text_b"><?php echo $documents[44]->nodeValue, PHP_EOL ?></p>
              <p class="text_b"><?php echo $documents[45]->nodeValue, PHP_EOL ?></p>
        		</div>
          </li>
          </ul>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="row mb-4">
  <div class="col-lg-12 card-competences-metier mb-4">

    <div class="card mb-12 bg-light-rose custom-card">
      <div class="card-body">
        <h4 class="card-title bg-rose cdreport-header cdreport-header-alt"><?php echo $bath[7]->nodeValue, PHP_EOL; ?></h4>

        <ul class="card-text">
          <ul>
          <li>
            <div style="page-break-inside: avoid">
        			<p class="margin-top-negative text-center"><?php echo $documents[46]->nodeValue, PHP_EOL ?></p>
        			<div class="subfactor_split chart_conscientiousness cdchart" style="padding: 10px;" data-highcharts-chart="8">
                <div class="highcharts-container" id="highcharts-16" style="position: relative; overflow: hidden; width: 918px; height: 172px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: Dosis, sans-serif;">
                  <img src="{{ asset('img/svg/chart7.svg') }}">
                  <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                    <?php
                    echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255,0,0); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 56.25px;" transform="translate(0,0)" opacity="1"><span>'.$documents_span[273]->nodeValue, PHP_EOL.'</span></span>';
                    echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255,255,255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 86.75px;" transform="translate(0,0)" opacity="1"><span>'.$documents_span[277]->nodeValue, PHP_EOL.'</span></span>';

                    echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255,255,255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 117.25px;" transform="translate(0,0)" opacity="1"><span>'.$documents_span[280]->nodeValue, PHP_EOL.'</span></span>';
                    echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255,255,255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 147.75px;" transform="translate(0,0)" opacity="1"><span>'.$documents_span[283]->nodeValue, PHP_EOL.'</span></span>';
                    ?></div>
                            <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                              <?php
                              echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255,0,0); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 283px; display: block; left: 608px; top: 56.25px;" transform="translate(0,0)" opacity="1">
                                <span>'.$documents_span[286]->nodeValue, PHP_EOL.'</span></span>';
                                echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255,255,255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 608px; top: 86.75px;" transform="translate(0,0)" opacity="1">
                                  <span>'.$documents_span[288]->nodeValue, PHP_EOL.'</span></span>';
                                echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255,255,255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 283px; display: block; left: 608px; top: 117.25px;" transform="translate(0,0)" opacity="1">
                                  <span>'.$documents_span[290]->nodeValue, PHP_EOL.'</span></span>';
                                  echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255,255,255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 608px; top: 147.75px;" transform="translate(0,0)" opacity="1">
                                    <span>'.$documents_span[292]->nodeValue, PHP_EOL.'</span></span>';
                              ?></div>
                                      <div class="highcharts-axis-labels highcharts-yaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                        <?php
                                        echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 316.5px; top: 20px;" opacity="1">'.$documents_span[295]->nodeValue, PHP_EOL.'</span>';
                                        echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 361.167px; top: 20px;" opacity="1">'.$documents_span[296]->nodeValue, PHP_EOL.'</span>';
                                        echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 405.833px; top: 20px;" opacity="1">'.$documents_span[297]->nodeValue, PHP_EOL.'</span>';
                                        echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 432.667px; top: 20px;" opacity="1">'.$documents_span[298]->nodeValue, PHP_EOL.'</span>';
                                        echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 447px; top: 20px;" opacity="1">'.$documents_span[299]->nodeValue, PHP_EOL.'</span>';
                                        echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 477.333px; top: 20px;" opacity="1">'.$documents_span[300]->nodeValue, PHP_EOL.'</span>';
                                        echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 495.167px; top: 20px;" opacity="1">'.$documents_span[301]->nodeValue, PHP_EOL.'</span>';
                                        echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 539.833px; top: 20px;" opacity="1">'.$documents_span[302]->nodeValue, PHP_EOL.'</span>';
                                        echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255,255,255); cursor: default; margin-left: 0px; margin-top: 0px; left: 584.5px; top: 20px;" opacity="1">'.$documents_span[303]->nodeValue, PHP_EOL.'</span>';
                                        ?>
                                      </div></div></div>
        			<script type="text/javascript">
        					$(document).ready(function() {
        						subfactor_splitbar_chart({"labels":{"left":["<span>(7)<\/span>&nbsp;<span><span class='factor-label'>Non-structuré(e)<\/span><\/span>","<span>(11)<\/span>&nbsp;<span>Improvisateur(trice)<\/span>","<span>(10)<\/span>&nbsp;<span>Spontané(e)<\/span>","<span>Nonchalant(e)<\/span>"],"right":["<span><span class='factor-label'>Consciencieux(se)<\/span><\/span>","<span>Précis(e)<\/span>","<span>Organisé(e)<\/span>","<span>Performant(e)<\/span>&nbsp;<span>(1)<\/span>"]},"data":[{"label":"Conscience professionnelle","score":-7},{"label":"Précis(e)","score":-11},{"label":"Organisé(e)","score":-10},{"label":"Performant(e)","score":1}],"height":172}, "chart_conscientiousness", true);
        					});
        			</script>
        			<div class="cdreport-container text-center">
        				<h4>Incidences sur la carrière</h4>
        				<div class="career-implications">
        					<p><?php echo $documents[47]->nodeValue, PHP_EOL ?></p>
                  <span class="row cdreport-horizontal-list mb-4">
                    <span class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i><?php echo $documents_span[305]->nodeValue, PHP_EOL ?></span>
                    <span class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i><?php echo $documents_span[306]->nodeValue, PHP_EOL ?></span>
                    <span class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i><?php echo $documents_span[307]->nodeValue, PHP_EOL ?></span>
                    <span class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i><?php echo $documents_span[308]->nodeValue, PHP_EOL ?></span>
                    <span class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i><?php echo $documents_span[309]->nodeValue, PHP_EOL ?></span>
                    <span class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i><?php echo $documents_span[310]->nodeValue, PHP_EOL ?></span>
                  </span>
        				</div>
        			</div>
        		</div>
        		<div class="personalty-highlights-explanation">
        			<p class="text_b"><?php echo $documents[48]->nodeValue, PHP_EOL ?></p>
              <p class="text_b"><?php echo $documents[49]->nodeValue, PHP_EOL ?></p>
              <p class="text_b"><?php echo $documents[50]->nodeValue, PHP_EOL ?></p>
              <p class="text_b"><?php echo $documents[51]->nodeValue, PHP_EOL ?></p>
        		</div>
          </li>
          </ul>
        </ul>
      </div>
    </div>
  </div>
</div>
{{---------------------------- PERSONNALITE ---------------------------------}}
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
