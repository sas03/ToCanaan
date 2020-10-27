{{-- Careerdirect --}}
@extends('layouts.master') @section('title', 'Careerdirect')

@section('main_title')
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <h4 class="text-uppercase">
        @if (Auth::user() && Auth::user()->id == $user->id)
          Huits premiers groupes de professions
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
{{---------------------------- CENTRES D'INTERET ----------------------------}}
<div class="custom-card">
  <p><?php echo $documents[61]->nodeValue, PHP_EOL ?></p>
  <p><?php echo $documents[62]->nodeValue, PHP_EOL ?></p>
  <p><?php echo $documents[63]->nodeValue, PHP_EOL ?></p>
</div>

<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item btn"><a class="page-link" href="#previous">Previous</a></li>
    <li class="page-item btn1"><a class="page-link" href="#premiergroupepro">1</a></li>
    <li class="page-item btn2"><a class="page-link" href="#deuxiemegroupepro">2</a></li>
    <li class="page-item btn3"><a class="page-link" href="#troisiemegroupepro">3</a></li>
    <li class="page-item btn4"><a class="page-link" href="#quatriemegroupepro">4</a></li>
    <li class="page-item btn5"><a class="page-link" href="#cinquiemegroupepro">5</a></li>
    <li class="page-item btn6"><a class="page-link" href="#sixiemegroupepro">6</a></li>
    <li class="page-item btn7"><a class="page-link" href="#septiemegroupepro">7</a></li>
    <li class="page-item btn8"><a class="page-link" href="#huitiemegroupepro">8</a></li>
    <li class="page-item btnX"><a class="page-link" href="#next">Next</a></li>
  </ul>
</nav>

<div class="row mb-4" id="premiergroupepro">
  <div class="col-lg-12 card-competences-metier mb-4">

    <div class="card mb-12 bg-light-vert custom-card">
      <div class="card-body">
        <h4 class="card-title bg-vert cdreport-header cdreport-header-alt">PREMIER GROUPE DE PROFESSION</h4>

        <ul class="card-text">
          <ul>
          <li>
            <div class="cdchart subfactor_bar_chart top_eight_g14" data-highcharts-chart="16">
              <div class="highcharts-container" id="highcharts-32" style="position: relative; overflow: hidden; width: 938px; height: 129px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: Dosis, sans-serif;">
                <img src="{{ asset('img/svg/chart15.svg') }}">
                <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                  <?php
                  echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 46px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                    <span class="factor-label"><strong>'.$documents_span[476]->nodeValue, PHP_EOL.'</strong></span></span>';
                  echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 70px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                    <span class="factor_row"><span class="factor_group">'.$documents_span[478]->nodeValue, PHP_EOL.'</span></span></span>';

                  echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 94px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                    <span class="factor_row"><span class="factor_group">'.$documents_span[481]->nodeValue, PHP_EOL.'</span></span></span>';
                  ?>
                  </div>
                                <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                  <?php
                                  echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 46px;" transform="translate(0,0)" opacity="1"><strong>'.$documents_span[485]->nodeValue, PHP_EOL.'</strong></span>';
                                    echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 70px;" transform="translate(0,0)" opacity="1">'.$documents_span[486]->nodeValue, PHP_EOL.'</span>';
                                    echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 94px;" transform="translate(0,0)" opacity="1">'.$documents_span[487]->nodeValue, PHP_EOL.'</span>';
                                  ?></div>
                                    <div class="highcharts-axis-labels highcharts-yaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                      <?php
                                      echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 321px; top: 13px;" opacity="1">'.$documents_span[488]->nodeValue, PHP_EOL.'</span>';
                                      echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 485.5px; top: 13px;" opacity="1">'.$documents_span[489]->nodeValue, PHP_EOL.'</span>';
                                      echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 650.5px; top: 13px;" opacity="1">'.$documents_span[490]->nodeValue, PHP_EOL.'</span>';
                                      ?>
                                    </div>
                                  </div></div>
            <script type="text/javascript">
              $(document).ready(function() {
                subfactor_bar_chart({"labels":{"left":["<span class='factor-label'><strong>1. Religieux<\/strong><\/span>","<span class='factor_row'><span class='factor_group'>Activité<\/span> <span class='subfactor_label'>Religieux<\/span><\/span>","<span class='factor_row'><span class='factor_group'>Sujets<\/span> <span class='subfactor_label'>Religion<\/span><\/span>"],"right":["<strong>Très élevé<\/strong> (100)","Très élevé (100)","Très élevé (100)"]},"data":[{"label":"Religieux","score":100},{"label":"Religieux","score":100},{"label":"Religion","score":100}],"height":129}, "top_eight_g14");
              });
            </script>
            <p><?php echo $documents[64]->nodeValue, PHP_EOL ?></p>
            <div class="cdreport-container text-center mb-4" style="border: 5px solid black; border-radius: 5%; background-color: grey">
                <div class="row cdreport-horizontal-list">

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Educateur(trice) religieux(se)</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Pasteur(e)</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Conseiller(ère) pastoral(e)</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Missionnaire</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Rabbin</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Prêtre</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Evangéliste</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Pasteur(e) de jeunes</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Aumônier(ère)</div>

                </div>
            </div>
            <p><?php echo $documents[65]->nodeValue, PHP_EOL ?>&nbsp;</p>
          </div>
          </li>
          </ul>
        </ul>
      </div>
    </div>
  </div>
<div class="row mb-4" id="deuxiemegroupepro" style="display: none">
  <div class="col-lg-12 card-competences-metier mb-4">

    <div class="card mb-12 bg-light-rose custom-card">
      <div class="card-body">
        <h4 class="card-title bg-rose cdreport-header cdreport-header-alt">DEUXIEME GROUPE DE PROFESSION</h4>

        <ul class="card-text">
          <ul>
          <li>
            <div class="cdchart subfactor_bar_chart top_eight_g11" data-highcharts-chart="17">
              <div class="highcharts-container" id="highcharts-34" style="position: relative; overflow: hidden; width: 938px; height: 129px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: Dosis, sans-serif;">
                <img src="{{ asset('img/svg/chart.svg')}}">
                <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                  <?php
                  echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 46px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                    <span class="factor-label"><strong>'.$documents_span[491]->nodeValue, PHP_EOL.'</strong></span></span>';
                  echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 70px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                    <span class="factor_row"><span class="factor_group">'.$documents_span[494]->nodeValue, PHP_EOL.'</span></span></span>';

                  echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 94px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                    <span class="factor_row"><span class="factor_group">'.$documents_span[497]->nodeValue, PHP_EOL.'</span></span></span>';
                  ?>
                  </div>
                                <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                  <?php
                                  echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 46px;" transform="translate(0,0)" opacity="1"><strong>'.$documents_span[501]->nodeValue, PHP_EOL.'</strong></span>';
                                    echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 70px;" transform="translate(0,0)" opacity="1">'.$documents_span[502]->nodeValue, PHP_EOL.'</span>';
                                    echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 94px;" transform="translate(0,0)" opacity="1">'.$documents_span[503]->nodeValue, PHP_EOL.'</span>';
                                  ?></div>
                                    <div class="highcharts-axis-labels highcharts-yaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                      <?php
                                      echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 321px; top: 13px;" opacity="1">'.$documents_span[504]->nodeValue, PHP_EOL.'</span>';
                                      echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 485.5px; top: 13px;" opacity="1">'.$documents_span[505]->nodeValue, PHP_EOL.'</span>';
                                      echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 650.5px; top: 13px;" opacity="1">'.$documents_span[506]->nodeValue, PHP_EOL.'</span>';
                                      ?>
                                    </div></div></div>
            <script type="text/javascript">
              $(document).ready(function() {
                subfactor_bar_chart({"labels":{"left":["<span class='factor-label'><strong>2. Conseil<\/strong><\/span>","<span class='factor_row'><span class='factor_group'>Activité<\/span> <span class='subfactor_label'>Conseil<\/span><\/span>","<span class='factor_row'><span class='factor_group'>Métiers<\/span> <span class='subfactor_label'>Conseil<\/span><\/span>"],"right":["<strong>Très élevé<\/strong> (92)","Très élevé (100)","Elevé (83)"]},"data":[{"label":"Conseil","score":92},{"label":"Conseil","score":100},{"label":"Conseil","score":83}],"height":129}, "top_eight_g11");
              });
            </script>
            <p><?php echo $documents[66]->nodeValue, PHP_EOL ?></p>
            <div class="cdreport-container text-center mb-4" style="border: 5px solid black; border-radius: 5%; background-color: grey">
                <div class="row cdreport-horizontal-list">

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Ecole/conseiller(ère) d'éducation</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Conseiller(ère) conjugal(e)/familial(e)</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Psychologue</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Travailleur(se) social(e)</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Conseiller(ère) en réhabilitation</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Psychiatre</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Pasteur(e)/Prêtre/Rabbin</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Conseiller(ère) professionnel(le)</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Conseiller(ère) pastoral(e)</div>

                </div>
            </div>
            <p><?php echo $documents[67]->nodeValue, PHP_EOL ?>&nbsp;</p>
          </li>
          </ul>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="row mb-4" id="troisiemegroupepro" style="display: none">
  <div class="col-lg-12 card-competences-metier mb-4">

    <div class="card mb-12 bg-light-vert custom-card">
      <div class="card-body">
        <h4 class="card-title bg-vert cdreport-header cdreport-header-alt">TROISIEME GROUPE DE PROFESSION</h4>

        <ul class="card-text">
          <ul>
          <li>
            <div class="cdchart subfactor_bar_chart top_eight_g21" data-highcharts-chart="18">
              <div class="highcharts-container" id="highcharts-36" style="position: relative; overflow: hidden; width: 938px; height: 172px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: Dosis, sans-serif;">
                <img src="{{ asset('img/svg/chart16.svg') }}">
                <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                  <?php
                  echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 48.375px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                    <span class="factor-label"><strong>'.$documents_span[507]->nodeValue, PHP_EOL.'</strong></span></span>';
                  echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 77.125px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                    <span class="factor_row"><span class="factor_group">'.$documents_span[509]->nodeValue, PHP_EOL.'</span></span></span>';

                  echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 105.875px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                    <span class="factor_row"><span class="factor_group">'.$documents_span[513]->nodeValue, PHP_EOL.'</span></span></span>';
                    echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 134.625px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                      <span class="factor_row"><span class="factor_group">'.$documents_span[517]->nodeValue, PHP_EOL.'</span></span></span>';
                  ?>
                  </div>
                                <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                  <?php
                                  echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 48.375px;" transform="translate(0,0)" opacity="1"><strong>'.$documents_span[521]->nodeValue, PHP_EOL.'</strong></span>';
                                    echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 77.125px;" transform="translate(0,0)" opacity="1">'.$documents_span[522]->nodeValue, PHP_EOL.'</span>';
                                    echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 105.875px;" transform="translate(0,0)" opacity="1">'.$documents_span[523]->nodeValue, PHP_EOL.'</span>';
                                    echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 134.625px;" transform="translate(0,0)" opacity="1">'.$documents_span[524]->nodeValue, PHP_EOL.'</span>';
                                  ?></div>
                                    <div class="highcharts-axis-labels highcharts-yaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                      <?php
                                      echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 321px; top: 13px;" opacity="1">'.$documents_span[525]->nodeValue, PHP_EOL.'</span>';
                                      echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 485.5px; top: 13px;" opacity="1">'.$documents_span[526]->nodeValue, PHP_EOL.'</span>';
                                      echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 650.5px; top: 13px;" opacity="1">'.$documents_span[527]->nodeValue, PHP_EOL.'</span>';
                                      ?>
                                    </div>
                                  </div></div>
            <script type="text/javascript">
              $(document).ready(function() {
                subfactor_bar_chart({"labels":{"left":["<span class='factor-label'><strong>3. Enseignement<\/strong><\/span>","<span class='factor_row'><span class='factor_group'>Activité<\/span> <span class='subfactor_label'>Enseignement<\/span><\/span>","<span class='factor_row'><span class='factor_group'>Métiers<\/span> <span class='subfactor_label'>Enseignement<\/span><\/span>","<span class='factor_row'><span class='factor_group'>Sujets<\/span> <span class='subfactor_label'>Enseignement<\/span><\/span>"],"right":["<strong>Elevé<\/strong> (82)","Elevé (80)","Très élevé (92)","Elevé (75)"]},"data":[{"label":"Enseignement","score":82},{"label":"Enseignement","score":80},{"label":"Enseignement","score":92},{"label":"Enseignement","score":75}],"height":172}, "top_eight_g21");
              });
            </script>
            <p><?php echo $documents[68]->nodeValue, PHP_EOL ?></p>
            <div class="cdreport-container text-center mb-4" style="border: 5px solid black; border-radius: 5%; background-color: grey">
                <div class="row cdreport-horizontal-list">

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Enseignant(e)</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Coordinateur(trice) pédagogique</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Directeur(trice) d'école/administrateur(trice)</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Tuteur(trice)</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Enseignant(e) en école professionnelle</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Enseignant(e) pour les adultes</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Orthophoniste</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Professeur</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Professeur d'éducation spécialisée&nbsp;</div>

                </div>
            </div>
            <p><?php echo $documents[69]->nodeValue, PHP_EOL ?></p>
          </li>
          </ul>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="row mb-4" id="quatriemegroupepro" style="display: none">
  <div class="col-lg-12 card-competences-metier mb-4">

    <div class="card mb-12 bg-light-rose custom-card">
      <div class="card-body">
        <h4 class="card-title bg-rose cdreport-header cdreport-header-alt">QUATRIEME GROUPE DE PROFESSION</h4>

        <ul class="card-text">
          <ul>
          <li>
            <div class="cdchart subfactor_bar_chart top_eight_g02" data-highcharts-chart="19">
              <div class="highcharts-container" id="highcharts-38" style="position: relative; overflow: hidden; width: 938px; height: 301px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: Dosis, sans-serif;">
                <img src="{{ asset('img/svg/chart17.svg') }}">
                <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                  <?php
                  echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 51.4286px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                    <span class="factor-label"><strong>'.$documents_span[528]->nodeValue, PHP_EOL.'</strong></span></span>';
                  echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 86.2857px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                    <span class="factor_row"><span class="factor_group">'.$documents_span[530]->nodeValue, PHP_EOL.'</span></span></span>';
                  echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 121.143px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                    <span class="factor_row"><span class="factor_group">'.$documents_span[534]->nodeValue, PHP_EOL.'</span></span></span>';
                    echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 156px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                      <span class="factor_row"><span class="factor_group">'.$documents_span[538]->nodeValue, PHP_EOL.'</span></span></span>';
                      echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 190.857px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                        <span class="factor_row"><span class="factor_group">'.$documents_span[542]->nodeValue, PHP_EOL.'</span></span></span>';
                        echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 225.714px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                          <span class="factor_row"><span class="factor_group">'.$documents_span[546]->nodeValue, PHP_EOL.'</span></span></span>';
                          echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 260.571px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                            <span class="factor_row"><span class="factor_group">'.$documents_span[550]->nodeValue, PHP_EOL.'</span></span></span>';
                        ?>
                  </div>
                                <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                  <?php
                                  echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 51.4286px;" transform="translate(0,0)" opacity="1"><strong>'.$documents_span[554]->nodeValue, PHP_EOL.'</strong></span>';
                                    echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 86.2857px;" transform="translate(0,0)" opacity="1">'.$documents_span[555]->nodeValue, PHP_EOL.'</span>';
                                    echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 121.143px;" transform="translate(0,0)" opacity="1">'.$documents_span[556]->nodeValue, PHP_EOL.'</span>';
                                    echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 156px;" transform="translate(0,0)" opacity="1">'.$documents_span[557]->nodeValue, PHP_EOL.'</span>';
                                    echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 190.857px;" transform="translate(0,0)" opacity="1">'.$documents_span[558]->nodeValue, PHP_EOL.'</span>';
                                    echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 225.714px;" transform="translate(0,0)" opacity="1">'.$documents_span[559]->nodeValue, PHP_EOL.'</span>';
                                    echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 260.571px;" transform="translate(0,0)" opacity="1">'.$documents_span[560]->nodeValue, PHP_EOL.'</span>';
                                  ?></div>
                                    <div class="highcharts-axis-labels highcharts-yaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                      <?php
                                      echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 321px; top: 13px;" opacity="1">'.$documents_span[561]->nodeValue, PHP_EOL.'</span>';
                                      echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 485.5px; top: 13px;" opacity="1">'.$documents_span[562]->nodeValue, PHP_EOL.'</span>';
                                      echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 650.5px; top: 13px;" opacity="1">'.$documents_span[563]->nodeValue, PHP_EOL.'</span>';
                                      ?>
                                    </div></div></div>
            <script type="text/javascript">
              $(document).ready(function() {
                subfactor_bar_chart({"labels":{"left":["<span class='factor-label'><strong>4. Gestion/Ventes<\/strong><\/span>","<span class='factor_row'><span class='factor_group'>Activité<\/span> <span class='subfactor_label'>Auto-entrepreneur<\/span><\/span>","<span class='factor_row'><span class='factor_group'>Activité<\/span> <span class='subfactor_label'>Communication de vente<\/span><\/span>","<span class='factor_row'><span class='factor_group'>Activité<\/span> <span class='subfactor_label'>Gestion<\/span><\/span>","<span class='factor_row'><span class='factor_group'>Métiers<\/span> <span class='subfactor_label'>Chefs d'entreprise<\/span><\/span>","<span class='factor_row'><span class='factor_group'>Métiers<\/span> <span class='subfactor_label'>Gestion/Vente<\/span><\/span>","<span class='factor_row'><span class='factor_group'>Sujets<\/span> <span class='subfactor_label'>Affaires/Gestion<\/span><\/span>"],"right":["<strong>Elevé<\/strong> (73)","Très élevé (100)","Elevé (80)","Elevé (68)","Très élevé (100)","Moyen (43)","Moyen (50)"]},"data":[{"label":"Gestion/Ventes","score":73},{"label":"Auto-entrepreneur","score":100},{"label":"Communication de vente","score":80},{"label":"Gestion","score":68},{"label":"Chefs d'entreprise","score":100},{"label":"Gestion/Vente","score":43},{"label":"Affaires/Gestion","score":50}],"height":301}, "top_eight_g02");
              });
            </script>
            <p><?php echo $documents[70]->nodeValue, PHP_EOL ?></p>
            <div class="cdreport-container text-center mb-4" style="border: 5px solid black; border-radius: 5%; background-color: grey">
                <div class="row cdreport-horizontal-list">

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Représentant(e) en marketing</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Acheteur(se)</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Cadre commercial</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Agent immobilier</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Gérant(e) d'un magasin de détail</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Agent de voyage</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Agent de vente en assurances</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Agent de change/broker</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Manager</div>

                </div>
            </div>
            <p><?php echo $documents[71]->nodeValue, PHP_EOL ?>&nbsp;</p>
          </li>
          </ul>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="row mb-4" id="cinquiemegroupepro" style="display: none">
  <div class="col-lg-12 card-competences-metier mb-4">

    <div class="card mb-12 bg-light-vert custom-card">
      <div class="card-body">
        <h4 class="card-title bg-vert cdreport-header cdreport-header-alt">CINQUIEME GROUPE DE PROFESSION</h4>

        <ul class="card-text">
          <ul>
          <li>
            <div class="cdchart subfactor_bar_chart top_eight_g18" data-highcharts-chart="20">
              <div class="highcharts-container" id="highcharts-40" style="position: relative; overflow: hidden; width: 938px; height: 129px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: Dosis, sans-serif;">
                <img src="{{ asset('img/svg/chart18.svg') }}">
                <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                  <?php
                  echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 46px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                    <span class="factor-label"><strong>'.$documents_span[564]->nodeValue, PHP_EOL.'</strong></span></span>';
                  echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 70px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                    <span class="factor_row"><span class="factor_group">'.$documents_span[567]->nodeValue, PHP_EOL.'</span></span></span>';

                  echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 94px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                    <span class="factor_row"><span class="factor_group">'.$documents_span[571]->nodeValue, PHP_EOL.'</span></span></span>';
                  ?>
                  </div>
                                <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                  <?php
                                  echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 46px;" transform="translate(0,0)" opacity="1"><strong>'.$documents_span[574]->nodeValue, PHP_EOL.'</strong></span>';
                                    echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 70px;" transform="translate(0,0)" opacity="1">'.$documents_span[575]->nodeValue, PHP_EOL.'</span>';
                                    echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 94px;" transform="translate(0,0)" opacity="1">'.$documents_span[576]->nodeValue, PHP_EOL.'</span>';
                                  ?></div>
                                    <div class="highcharts-axis-labels highcharts-yaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                      <?php
                                      echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 321px; top: 13px;" opacity="1">'.$documents_span[577]->nodeValue, PHP_EOL.'</span>';
                                      echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 485.5px; top: 13px;" opacity="1">'.$documents_span[578]->nodeValue, PHP_EOL.'</span>';
                                      echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 650.5px; top: 13px;" opacity="1">'.$documents_span[579]->nodeValue, PHP_EOL.'</span>';
                                      ?>
                                    </div></div></div>
            <script type="text/javascript">
              $(document).ready(function() {
                subfactor_bar_chart({"labels":{"left":["<span class='factor-label'><strong>5. Législation/Politique<\/strong><\/span>","<span class='factor_row'><span class='factor_group'>Activité<\/span> <span class='subfactor_label'>Communication politique<\/span><\/span>","<span class='factor_row'><span class='factor_group'>Métiers<\/span> <span class='subfactor_label'>Législation/Politique<\/span><\/span>"],"right":["<strong>Elevé<\/strong> (73)","Elevé (70)","Elevé (75)"]},"data":[{"label":"Législation/Politique","score":73},{"label":"Communication politique","score":70},{"label":"Législation/Politique","score":75}],"height":129}, "top_eight_g18");
              });
            </script>
            <p><?php echo $documents[72]->nodeValue, PHP_EOL ?></p>
            <div class="cdreport-container text-center mb-4" style="border: 5px solid black; border-radius: 5%; background-color: grey">
                <div class="row cdreport-horizontal-list">

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Avocat(e)</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Assistant(e) d'avocat</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Politologue</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Médiateur(trice)</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Législateur(trice)</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Juge</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Sénateur(trice)</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Gérant(e) de campagne</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Enseignant(e) en sciences politiques</div>

                </div>
            </div>
            <p><?php echo $documents[73]->nodeValue, PHP_EOL ?>&nbsp;</p>
          </li>
          </ul>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="row mb-4" id="sixiemegroupepro" style="display: none">
  <div class="col-lg-12 card-competences-metier mb-4">

    <div class="card mb-12 bg-light-rose custom-card">
      <div class="card-body">
        <h4 class="card-title bg-rose cdreport-header cdreport-header-alt">SIXIEME GROUPE DE PROFESSION</h4>

        <ul class="card-text">
          <ul>
          <li>
            <div class="cdchart subfactor_bar_chart top_eight_g03" data-highcharts-chart="21">
              <div class="highcharts-container" id="highcharts-42" style="position: relative; overflow: hidden; width: 938px; height: 301px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: Dosis, sans-serif;">
                <img src="{{ asset('img/svg/chart19.svg') }}">
                <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                  <?php
                  echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 51.4286px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                    <span class="factor-label"><strong>'.$documents_span[580]->nodeValue, PHP_EOL.'</strong></span></span>';
                  echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 86.2857px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                    <span class="factor_row"><span class="factor_group">'.$documents_span[583]->nodeValue, PHP_EOL.'</span></span></span>';
                  echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 121.143px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                    <span class="factor_row"><span class="factor_group">'.$documents_span[587]->nodeValue, PHP_EOL.'</span></span></span>';
                    echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 156px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                      <span class="factor_row"><span class="factor_group">'.$documents_span[591]->nodeValue, PHP_EOL.'</span></span></span>';
                      echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 190.857px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                        <span class="factor_row"><span class="factor_group">'.$documents_span[595]->nodeValue, PHP_EOL.'</span></span></span>';
                        echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 225.714px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                          <span class="factor_row"><span class="factor_group">'.$documents_span[599]->nodeValue, PHP_EOL.'</span></span></span>';
                          echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 260.571px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                            <span class="factor_row"><span class="factor_group">'.$documents_span[603]->nodeValue, PHP_EOL.'</span></span></span>';
                        ?>
                  </div>
                                <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                  <?php
                                  echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 51.4286px;" transform="translate(0,0)" opacity="1"><strong>'.$documents_span[606]->nodeValue, PHP_EOL.'</strong></span>';
                                    echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 86.2857px;" transform="translate(0,0)" opacity="1">'.$documents_span[607]->nodeValue, PHP_EOL.'</span>';
                                    echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 121.143px;" transform="translate(0,0)" opacity="1">'.$documents_span[608]->nodeValue, PHP_EOL.'</span>';
                                    echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 156px;" transform="translate(0,0)" opacity="1">'.$documents_span[609]->nodeValue, PHP_EOL.'</span>';
                                    echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 190.857px;" transform="translate(0,0)" opacity="1">'.$documents_span[610]->nodeValue, PHP_EOL.'</span>';
                                    echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 225.714px;" transform="translate(0,0)" opacity="1">'.$documents_span[611]->nodeValue, PHP_EOL.'</span>';
                                    echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 260.571px;" transform="translate(0,0)" opacity="1">'.$documents_span[612]->nodeValue, PHP_EOL.'</span>';
                                  ?></div>
                                    <div class="highcharts-axis-labels highcharts-yaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                      <?php
                                      echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 321px; top: 13px;" opacity="1">'.$documents_span[613]->nodeValue, PHP_EOL.'</span>';
                                      echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 485.5px; top: 13px;" opacity="1">'.$documents_span[614]->nodeValue, PHP_EOL.'</span>';
                                      echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 650.5px; top: 13px;" opacity="1">'.$documents_span[615]->nodeValue, PHP_EOL.'</span>';
                                      ?>
                                    </div></div></div>
            <script type="text/javascript">
              $(document).ready(function() {
                subfactor_bar_chart({"labels":{"left":["<span class='factor-label'><strong>6. Prestation publique/Communication<\/strong><\/span>","<span class='factor_row'><span class='factor_group'>Activité<\/span> <span class='subfactor_label'>Communication aux foules<\/span><\/span>","<span class='factor_row'><span class='factor_group'>Activité<\/span> <span class='subfactor_label'>Musical<\/span><\/span>","<span class='factor_row'><span class='factor_group'>Activité<\/span> <span class='subfactor_label'>Divertissement<\/span><\/span>","<span class='factor_row'><span class='factor_group'>Métiers<\/span> <span class='subfactor_label'>Artistes (performance publique)<\/span><\/span>","<span class='factor_row'><span class='factor_group'>Sujets<\/span> <span class='subfactor_label'>Performance publique<\/span><\/span>","<span class='factor_row'><span class='factor_group'>Sujets<\/span> <span class='subfactor_label'>Musique<\/span><\/span>"],"right":["<strong>Moyennement élevé<\/strong> (62)","Elevé (72)","Moyennement faible (40)","Faible (32)","Moyen (47)","Très élevé (100)","Elevé (75)"]},"data":[{"label":"Prestation publique/Communication","score":62},{"label":"Communication aux foules","score":72},{"label":"Musical","score":40},{"label":"Divertissement","score":32},{"label":"Artistes (performance publique)","score":47},{"label":"Performance publique","score":100},{"label":"Musique","score":75}],"height":301}, "top_eight_g03");
              });
            </script>
            <p><?php echo $documents[74]->nodeValue, PHP_EOL ?></p>
            <div class="cdreport-container text-center mb-4" style="border: 5px solid black; border-radius: 5%; background-color: grey">
                <div class="row cdreport-horizontal-list">

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Chanteur(se) professionnel(le)</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Journaliste TV/Radio</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Producteur(trice) / directeur(trice) artistique</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Spécialiste de la formation</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Directeur(trice) artistique</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Reporter</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Annonceur(se)</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Acteur(trice)</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Chef d'orchestre</div>

                </div>
            </div>
            <p><?php echo $documents[75]->nodeValue, PHP_EOL ?>&nbsp;</p>
          </li>
          </ul>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="row mb-4" id="septiemegroupepro" style="display: none">
  <div class="col-lg-12 card-competences-metier mb-4">

    <div class="card mb-12 bg-light-vert custom-card">
      <div class="card-body">
        <h4 class="card-title bg-vert cdreport-header cdreport-header-alt">SEPTIEME GROUPE DE PROFESSION</h4>

        <ul class="card-text">
          <ul>
          <li>
            <div class="cdchart subfactor_bar_chart top_eight_g12" data-highcharts-chart="22">
              <div class="highcharts-container" id="highcharts-44" style="position: relative; overflow: hidden; width: 938px; height: 172px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: Dosis, sans-serif;">
                <img src="{{ asset('img/svg/chart20.svg') }}">
                <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                  <?php
                  echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 48.375px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                    <span class="factor-label"><strong>'.$documents_span[616]->nodeValue, PHP_EOL.'</strong></span></span>';
                  echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 77.125px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                    <span class="factor_row"><span class="factor_group">'.$documents_span[619]->nodeValue, PHP_EOL.'</span></span></span>';

                  echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 105.875px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                    <span class="factor_row"><span class="factor_group">'.$documents_span[623]->nodeValue, PHP_EOL.'</span></span></span>';
                    echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 134.625px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                      <span class="factor_row"><span class="factor_group">'.$documents_span[627]->nodeValue, PHP_EOL.'</span></span></span>';
                  ?>
                  </div>
                                <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                  <?php
                                  echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 48.375px;" transform="translate(0,0)" opacity="1"><strong>'.$documents_span[630]->nodeValue, PHP_EOL.'</strong></span>';
                                    echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 77.125px;" transform="translate(0,0)" opacity="1">'.$documents_span[631]->nodeValue, PHP_EOL.'</span>';
                                    echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 105.875px;" transform="translate(0,0)" opacity="1">'.$documents_span[632]->nodeValue, PHP_EOL.'</span>';
                                    echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 134.625px;" transform="translate(0,0)" opacity="1">'.$documents_span[633]->nodeValue, PHP_EOL.'</span>';
                                  ?></div>
                                    <div class="highcharts-axis-labels highcharts-yaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                      <?php
                                      echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 321px; top: 13px;" opacity="1">'.$documents_span[634]->nodeValue, PHP_EOL.'</span>';
                                      echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 485.5px; top: 13px;" opacity="1">'.$documents_span[635]->nodeValue, PHP_EOL.'</span>';
                                      echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 650.5px; top: 13px;" opacity="1">'.$documents_span[636]->nodeValue, PHP_EOL.'</span>';
                                      ?>
                                    </div></div></div>
            <script type="text/javascript">
              $(document).ready(function() {
                subfactor_bar_chart({"labels":{"left":["<span class='factor-label'><strong>7. Ecrit<\/strong><\/span>","<span class='factor_row'><span class='factor_group'>Activité<\/span> <span class='subfactor_label'>Communication écrite<\/span><\/span>","<span class='factor_row'><span class='factor_group'>Métiers<\/span> <span class='subfactor_label'>Journalistes/Ecrivains<\/span><\/span>","<span class='factor_row'><span class='factor_group'>Sujets<\/span> <span class='subfactor_label'>Français<\/span><\/span>"],"right":["<strong>Moyennement élevé<\/strong> (62)","Moyen (53)","Moyen (55)","Elevé (75)"]},"data":[{"label":"Ecrit","score":62},{"label":"Communication écrite","score":53},{"label":"Journalistes/Ecrivains","score":55},{"label":"Français","score":75}],"height":172}, "top_eight_g12");
              });
            </script>
            <p><?php echo $documents[76]->nodeValue, PHP_EOL ?></p>
            <div class="cdreport-container mb-4" style="border: 5px solid black; border-radius: 5%; background-color: grey">
                <div class="row cdreport-horizontal-list">

                  <div class="col-md-3 cdreport-horizontal-list-item mb-2 ml-1"><i class="fa fa-check"></i> Journaliste</div>

                  <div class="col-md-5 cdreport-horizontal-list-item mb-2"><i class="fa fa-check"></i> Editeur(trice) de contenu sur le web</div>

                  <div class="col-md-3 cdreport-horizontal-list-item mb-2"><i class="fa fa-check"></i> Rédacteur(trice) technique</div>

                  <div class="col-md-3 cdreport-horizontal-list-item mb-2 ml-1"><i class="fa fa-check"></i> Micro-éditeur(trice)</div>

                  <div class="col-md-5 cdreport-horizontal-list-item mb-2"><i class="fa fa-check"></i> Editeur(trice)</div>

                  <div class="col-md-3 cdreport-horizontal-list-item mb-2"><i class="fa fa-check"></i> Ecrivain(e)</div>

                  <div class="col-md-3 cdreport-horizontal-list-item ml-1"><i class="fa fa-check"></i> Auteur créatif</div>

                  <div class="col-md-5 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Concepteur-rédacteur publicitaire/conceptrice-rédactrice publicitaire</div>

                  <div class="col-md-3 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Reporter</div>

                </div>
            </div>
            <p><?php echo $documents[77]->nodeValue, PHP_EOL ?>&nbsp;</p>
          </li>
          </ul>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="row mb-4" id="huitiemegroupepro" style="display: none">
  <div class="col-lg-12 card-competences-metier mb-4">

    <div class="card mb-12 bg-light-rose custom-card">
      <div class="card-body">
        <h4 class="card-title bg-rose cdreport-header cdreport-header-alt">HUITIEME GROUPE DE PROFESSION</h4>

        <ul class="card-text">
          <ul>
          <li>
            <div class="cdchart subfactor_bar_chart top_eight_g13" data-highcharts-chart="23">
              <div class="highcharts-container" id="highcharts-46" style="position: relative; overflow: hidden; width: 938px; height: 172px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: Dosis, sans-serif;">
                <img src="{{ asset('img/svg/chart21.svg') }}">
                <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                  <?php
                  echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 48.375px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                    <span class="factor-label"><strong>'.$documents_span[637]->nodeValue, PHP_EOL.'</strong></span></span>';
                  echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 77.125px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                    <span class="factor_row"><span class="factor_group">'.$documents_span[640]->nodeValue, PHP_EOL.'</span></span></span>';

                  echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 105.875px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                    <span class="factor_row"><span class="factor_group">'.$documents_span[644]->nodeValue, PHP_EOL.'</span></span></span>';
                    echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; max-width: 325px; margin-left: 0px; margin-top: 0px; left: 20px; top: 134.625px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                      <span class="factor_row"><span class="factor_group">'.$documents_span[648]->nodeValue, PHP_EOL.'</span></span></span>';
                  ?>
                  </div>
                                <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                  <?php
                                  echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 48.375px;" transform="translate(0,0)" opacity="1"><strong>'.$documents_span[651]->nodeValue, PHP_EOL.'</strong></span>';
                                    echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 77.125px;" transform="translate(0,0)" opacity="1">'.$documents_span[652]->nodeValue, PHP_EOL.'</span>';
                                    echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 105.875px;" transform="translate(0,0)" opacity="1">'.$documents_span[653]->nodeValue, PHP_EOL.'</span>';
                                    echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 250px; text-align: left; margin-left: 0px; margin-top: 0px; left: 678px; top: 134.625px;" transform="translate(0,0)" opacity="1">'.$documents_span[654]->nodeValue, PHP_EOL.'</span>';
                                  ?></div>
                                    <div class="highcharts-axis-labels highcharts-yaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                      <?php
                                      echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 321px; top: 13px;" opacity="1">'.$documents_span[655]->nodeValue, PHP_EOL.'</span>';
                                      echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 485.5px; top: 13px;" opacity="1">'.$documents_span[656]->nodeValue, PHP_EOL.'</span>';
                                      echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 650.5px; top: 13px;" opacity="1">'.$documents_span[657]->nodeValue, PHP_EOL.'</span>';
                                      ?>
                                    </div></div></div>
            <script type="text/javascript">
              $(document).ready(function() {
                subfactor_bar_chart({"labels":{"left":["<span class='factor-label'><strong>8. International<\/strong><\/span>","<span class='factor_row'><span class='factor_group'>Activité<\/span> <span class='subfactor_label'>International<\/span><\/span>","<span class='factor_row'><span class='factor_group'>Métiers<\/span> <span class='subfactor_label'>Langues<\/span><\/span>","<span class='factor_row'><span class='factor_group'>Sujets<\/span> <span class='subfactor_label'>Langue étrangère<\/span><\/span>"],"right":["<strong>Moyen<\/strong> (58)","Moyennement élevé (60)","Moyennement élevé (63)","Moyen (50)"]},"data":[{"label":"International","score":58},{"label":"International","score":60},{"label":"Langues","score":63},{"label":"Langue étrangère","score":50}],"height":172}, "top_eight_g13");
              });
            </script>
            <p><?php echo $documents[78]->nodeValue, PHP_EOL ?></p>
            <div class="cdreport-container text-center mb-4" style="border: 5px solid black; border-radius: 5%; background-color: grey">
                <div class="row cdreport-horizontal-list">

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Correspondant(e) à l'étranger</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Professeur de langue étrangère</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Traducteur(trice)</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Missionnaire à l'étranger</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Diplomate</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Guide touristique à l'étranger</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Cadre commercial international</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Interprète</div>

                  <div class="col-md-4 cdreport-horizontal-list-item"><i class="fa fa-check"></i> Cadre dans un service diplomatique</div>

                </div>
            </div>
            <p><?php echo $documents[79]->nodeValue, PHP_EOL ?>&nbsp;</p>
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
      $(document).ready(function(){
        $(".btn1").click(function(){
          $("#deuxiemegroupepro").hide();
          $("#troisiemegroupepro").hide();
          $("#quatriemegroupepro").hide();
          $("#cinquiemegroupepro").hide();
          $("#premiergroupepro").show();
          $("#sixiemegroupepro").hide();
          $("#septiemegroupepro").hide();
          $("#huitiemegroupepro").hide();
          $([document.documentElement, document.body]).animate({
            scrollTop: $("#premiergroupepro").offset().top - 100
          }, 1000);
        });
        $(".btn2").click(function(){
          $("#deuxiemegroupepro").show();
          $("#premiergroupepro").hide();
          $("#troisiemegroupepro").hide();
          $("#quatriemegroupepro").hide();
          $("#cinquiemegroupepro").hide();
          $("#sixiemegroupepro").hide();
          $("#septiemegroupepro").hide();
          $("#huitiemegroupepro").hide();
          $([document.documentElement, document.body]).animate({
            scrollTop: $("#deuxiemegroupepro").offset().top - 100
          }, 1000);
        });
        $(".btn3").click(function(){
          $("#troisiemegroupepro").show();
          $("#premiergroupepro").hide();
          $("#deuxiemegroupepro").hide();
          $("#quatriemegroupepro").hide();
          $("#cinquiemegroupepro").hide();
          $("#sixiemegroupepro").hide();
          $("#septiemegroupepro").hide();
          $("#huitiemegroupepro").hide();
          $([document.documentElement, document.body]).animate({
            scrollTop: $("#troisiemegroupepro").offset().top - 100
          }, 1000);
        });
        $(".btn4").click(function(){
          $("#quatriemegroupepro").show();
          $("#premiergroupepro").hide();
          $("#deuxiemegroupepro").hide();
          $("#troisiemegroupepro").hide();
          $("#cinquiemegroupepro").hide();
          $("#sixiemegroupepro").hide();
          $("#septiemegroupepro").hide();
          $("#huitiemegroupepro").hide();
          $([document.documentElement, document.body]).animate({
            scrollTop: $("#quatriemegroupepro").offset().top - 100
          }, 1000);
        });
        $(".btn5").click(function(){
          $("#cinquiemegroupepro").show();
          $("#premiergroupepro").hide();
          $("#deuxiemegroupepro").hide();
          $("#troisiemegroupepro").hide();
          $("#quatriemegroupepro").hide();
          $("#sixiemegroupepro").hide();
          $("#septiemegroupepro").hide();
          $("#huitiemegroupepro").hide();
          $([document.documentElement, document.body]).animate({
            scrollTop: $("#cinquiemegroupepro").offset().top - 100
          }, 1000);
        });
        $(".btn6").click(function(){
          $("#sixiemegroupepro").show();
          $("#premiergroupepro").hide();
          $("#deuxiemegroupepro").hide();
          $("#troisiemegroupepro").hide();
          $("#quatriemegroupepro").hide();
          $("#cinquiemegroupepro").hide();
          $("#septiemegroupepro").hide();
          $("#huitiemegroupepro").hide();
          $([document.documentElement, document.body]).animate({
            scrollTop: $("#sixiemegroupepro").offset().top - 100
          }, 1000);
        });
        $(".btn7").click(function(){
          $("#septiemegroupepro").show();
          $("#premiergroupepro").hide();
          $("#deuxiemegroupepro").hide();
          $("#troisiemegroupepro").hide();
          $("#quatriemegroupepro").hide();
          $("#cinquiemegroupepro").hide();
          $("#sixiemegroupepro").hide();
          $("#huitiemegroupepro").hide();
          $([document.documentElement, document.body]).animate({
            scrollTop: $("#septiemegroupepro").offset().top - 100
          }, 1000);
        });
        $(".btn8").click(function(){
          $("#huitiemegroupepro").show();
          $("#premiergroupepro").hide();
          $("#deuxiemegroupepro").hide();
          $("#troisiemegroupepro").hide();
          $("#quatriemegroupepro").hide();
          $("#cinquiemegroupepro").hide();
          $("#sixiemegroupepro").hide();
          $("#septiemegroupepro").hide();
          $([document.documentElement, document.body]).animate({
            scrollTop: $("#huitiemegroupepro").offset().top - 100
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
