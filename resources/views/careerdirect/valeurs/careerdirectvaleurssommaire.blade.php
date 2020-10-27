{{-- Careerdirect --}}
@extends('layouts.master') @section('title', 'Fiche Careerdirect')

@section('main_title')
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <h4 class="text-uppercase">
        @if (Auth::user() && Auth::user()->id == $user->id)
          Tableaux résumés de Personnalité
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
        <a href="{{ route('career_direct', ['id' => Auth::id()]) }}"><img src="{{ asset('img/back.png') }}" style="height: 25px; width: 25px"></a>
        <ul>
          <li><a href="#sixfacteurs" class="sous-menu-link text-uppercase">Facteur</a></li>
          <li><a href="#facteurssousfacteurs" class="sous-menu-link text-uppercase">FACT-SS-FACT</a></li>
          <li><a href="#cruciales" class="sous-menu-link text-uppercase">Crucial</a></li>
          <li><a href="#resume" class="sous-menu-link text-uppercase">Resume</a></li>
          <li><a href="#centreinteret" class="sous-menu-link text-uppercase">INTÉRÊTS</a></li>
          <li><a href="#groupesprincipaux" class="sous-menu-link text-uppercase">PRINCIPAL</a></li>
          <li><a href="#compcap" class="sous-menu-link text-uppercase">COMP-CAP</a></li>
          <li><a href="#priorites" class="sous-menu-link text-uppercase">PRIORITE</a></li>
          <li><a href="#fondamentales" class="sous-menu-link text-uppercase">FONDAMENTAL</a></li>
        </ul>
      </div>
    </div>
  </div>
@endsection
@section('content')
  <ul class="pagination">
      <li><a href="#cruciales">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
      <li><a href="#">4</a></li>
      <li><a href="#">5</a></li>
    </ul>
<div class="row mb-4">
  <div class="col-lg-12 card-competences-metier mb-4" id="sixfacteurs">

    <div class="card mb-12 bg-light-vert custom-card">
      <div class="card-body">
        <h4 class="card-title bg-vert">Six facteurs de personnalité</h4>

        <ul class="card-text">
          <ul>
          <li>
            <div class="six_factors_summary cdchart" data-highcharts-chart="40">
              <div class="highcharts-container" id="highcharts-80" style="position: relative; overflow: hidden; width: 938px; height: 258px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: Dosis, sans-serif;">
                <img src="{{ asset('img/svg/chart38.svg') }}">
                <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                  <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 49.75px;" transform="translate(0,0)" opacity="1">
                    <span><?php echo $documents_span[939]->nodeValue, PHP_EOL ?></span></span>
                    <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 83.25px;" transform="translate(0,0)" opacity="1">
                      <span><?php echo $documents_span[941]->nodeValue, PHP_EOL ?></span></span>
                      <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 116.75px;" transform="translate(0,0)" opacity="1">
                        <span><?php echo $documents_span[943]->nodeValue, PHP_EOL ?></span></span>
                        <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 150.25px;" transform="translate(0,0)" opacity="1">
                          <span><?php echo $documents_span[945]->nodeValue, PHP_EOL ?></span>&nbsp;<span></span></span>
                          <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 183.75px;" transform="translate(0,0)" opacity="1">
                            <span><?php echo $documents_span[948]->nodeValue, PHP_EOL ?></span></span>
                            <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 217.25px;" transform="translate(0,0)" opacity="1">
                              <span><?php echo $documents_span[950]->nodeValue, PHP_EOL ?></span></span></div>
                              <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 50.75px;" transform="translate(0,0)" opacity="1">
                                  <span><?php echo $documents_span[952]->nodeValue, PHP_EOL ?></span>&nbsp;<span></span></span>
                                  <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 84.25px;" transform="translate(0,0)" opacity="1">
                                    <span><?php echo $documents_span[955]->nodeValue, PHP_EOL ?></span>&nbsp;<span></span></span>
                                    <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 628px; top: 117.75px;" transform="translate(0,0)" opacity="1">
                                      <span><?php echo $documents_span[958]->nodeValue, PHP_EOL ?></span>&nbsp;<span></span></span>
                                      <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 151.25px;" transform="translate(0,0)" opacity="1">
                                        <span><?php echo $documents_span[961]->nodeValue, PHP_EOL ?></span></span>
                                        <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 184.75px;" transform="translate(0,0)" opacity="1">
                                          <span><?php echo $documents_span[963]->nodeValue, PHP_EOL ?></span>&nbsp;<span></span></span>
                                          <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 218.25px;" transform="translate(0,0)" opacity="1">
                                            <span><?php echo $documents_span[966]->nodeValue, PHP_EOL ?></span>&nbsp;<span></span></span></div>
                                            <div class="highcharts-axis-labels highcharts-yaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 316.5px; top: 13px;" opacity="1">
                                              <?php echo $documents_span[969]->nodeValue, PHP_EOL ?></span>
                                              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 364.5px; top: 13px;" opacity="1">
                                              <?php echo $documents_span[970]->nodeValue, PHP_EOL ?></span>
                                              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 412.5px; top: 13px;" opacity="1">
                                              <?php echo $documents_span[971]->nodeValue, PHP_EOL ?></span>
                                              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 441px; top: 13px;" opacity="1">
                                              <?php echo $documents_span[972]->nodeValue, PHP_EOL ?></span>
                                              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 457px; top: 13px;" opacity="1">
                                              <?php echo $documents_span[973]->nodeValue, PHP_EOL ?></span>
                                              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 489px; top: 13px;" opacity="1">
                                              <?php echo $documents_span[974]->nodeValue, PHP_EOL ?></span>
                                              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 508.5px; top: 13px;" opacity="1">
                                              <?php echo $documents_span[975]->nodeValue, PHP_EOL ?></span>
                                              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 556.5px; top: 13px;" opacity="1">
                                              <?php echo $documents_span[976]->nodeValue, PHP_EOL ?></span>
                                              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 604.5px; top: 13px;" opacity="1">
                                              <?php echo $documents_span[977]->nodeValue, PHP_EOL ?></span></div></div></div>
            <script type="text/javascript">
              $(document).ready(function() {
                splitbar_chart({"labels":{"left":["<span>Accomodant(e)<\/span>","<span>Introverti(e)<\/span>","<span>Détaché(e)<\/span>","<span>(7)<\/span>&nbsp;<span>Non-structuré(e)<\/span>","<span>Prudent(e)<\/span>","<span>Conventionnel(le)<\/span>"],"right":["<span>Meneur(se)<\/span>&nbsp;<span>(9)<\/span>","<span>Extraverti(e)<\/span>&nbsp;<span>(9)<\/span>","<span>Plein(e) de compassion<\/span>&nbsp;<span>(11)<\/span>","<span>Consciencieux(se)<\/span>","<span>Aventureux(se)<\/span>&nbsp;<span>(20)<\/span>","<span>Innovateur(trice)<\/span>&nbsp;<span>(19)<\/span>"]},"data":[{"label":"Domination","score":9},{"label":"Extraversion","score":9},{"label":"Compassion","score":11},{"label":"Conscience professionnelle","score":-7},{"label":"Esprit d'aventure","score":20},{"label":"Innovation","score":19}],"height":258}, "six_factors_summary");
              });
            </script>
          </li>
          </ul>
        </ul>
      </div>
    </div>
  </div>
</div>

<div class="row mb-4">
  <div class="col-lg-12 card-competences-metier mb-4" id="facteurssousfacteurs">

    <div class="card mb-12 bg-light-rose custom-card">
      <div class="card-body">
        <h4 class="card-title bg-rose">VOS FACTEURS ET SOUS-FACTEURS DE PERSONNALITE</h4>

        <ul class="card-text">
          <ul>
          <li>
            <div class="combining-chart">

                    <div class="cdchart subfactor_split chart_adventurousness_summary" data-highcharts-chart="41">
                      <div class="highcharts-container" id="highcharts-82" style="position: relative; overflow: hidden; width: 938px; height: 129px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: Dosis, sans-serif;">
                        <img src="{{ asset('img/svg/chart39.svg') }}">

                        <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                          <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 0, 0); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 40px;" transform="translate(0,0)" opacity="1">
                            <span><span class="factor-label"><?php echo $documents_span[978]->nodeValue, PHP_EOL ?></span></span></span>
                            <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 72px;" transform="translate(0,0)" opacity="1">
                              <span><?php echo $documents_span[981]->nodeValue, PHP_EOL ?></span></span>
                              <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 104px;" transform="translate(0,0)" opacity="1">
                                <span><?php echo $documents_span[983]->nodeValue, PHP_EOL ?></span></span></div>
                                <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                  <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 0, 0); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 40px;" transform="translate(0,0)" opacity="1">
                                    <span><span class="factor-label"><?php echo $documents_span[985]->nodeValue, PHP_EOL ?></span></span>&nbsp;<span></span></span>
                                    <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 72px;" transform="translate(0,0)" opacity="1">
                                      <span><?php echo $documents_span[989]->nodeValue, PHP_EOL ?></span>&nbsp;<span></span></span>
                                      <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 104px;" transform="translate(0,0)" opacity="1">
                                        <span><?php echo $documents_span[992]->nodeValue, PHP_EOL ?></span>&nbsp;<span></span></span></div>
                                        <div class="highcharts-axis-labels highcharts-yaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                          <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 316.5px; top: 3px;" opacity="1"><?php echo $documents_span[995]->nodeValue, PHP_EOL ?></span>
                                          <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 364.5px; top: 3px;" opacity="1"><?php echo $documents_span[996]->nodeValue, PHP_EOL ?></span>
                                          <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 412.5px; top: 3px;" opacity="1"><?php echo $documents_span[997]->nodeValue, PHP_EOL ?></span>
                                          <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 441px; top: 3px;" opacity="1"><?php echo $documents_span[998]->nodeValue, PHP_EOL ?></span>
                                          <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 457px; top: 3px;" opacity="1"><?php echo $documents_span[999]->nodeValue, PHP_EOL ?></span>
                                          <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 489px; top: 3px;" opacity="1"><?php echo $documents_span[1000]->nodeValue, PHP_EOL ?></span>
                                          <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 508.5px; top: 3px;" opacity="1"><?php echo $documents_span[1001]->nodeValue, PHP_EOL ?></span>
                                          <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 556.5px; top: 3px;" opacity="1"><?php echo $documents_span[1002]->nodeValue, PHP_EOL ?></span>
                                          <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 604.5px; top: 3px;" opacity="1"><?php echo $documents_span[1003]->nodeValue, PHP_EOL ?></span>
                                        </div></div></div>
                    <script type="text/javascript">
                            $(document).ready(function() {
                                    subfactor_splitbar_chart({"labels":{"left":["<span><span class='factor-label'>Prudent(e)<\/span><\/span>","<span>Conservateur(trice)<\/span>","<span>Satisfait(e) de sa situation<\/span>"],"right":["<span><span class='factor-label'>Aventureux(se)<\/span><\/span>&nbsp;<span>(20)<\/span>","<span>Audacieux(se)<\/span>&nbsp;<span>(18)<\/span>","<span>Ambitieux(se)<\/span>&nbsp;<span>(16)<\/span>"]},"data":[{"label":"Esprit d'aventure","score":20},{"label":"Audacieux(se)","score":18},{"label":"Ambitieux(se)","score":16}],"height":129}, "chart_adventurousness_summary", true);
                            });
                    </script>

                    <div class="cdchart subfactor_split chart_innovation_summary" data-highcharts-chart="42">
                      <div class="highcharts-container" id="highcharts-84" style="position: relative; overflow: hidden; width: 938px; height: 129px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: Dosis, sans-serif;">
                        <img src="{{ asset('img/svg/chart40.svg') }}">
                        <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                          <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 0, 0); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 13.3333px;" transform="translate(0,0)" opacity="1">
                            <span><span class="factor-label"><?php echo $documents_span[1004]->nodeValue, PHP_EOL ?></span></span></span>
                            <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 56px;" transform="translate(0,0)" opacity="1">
                              <span><?php echo $documents_span[1007]->nodeValue, PHP_EOL ?></span></span>
                              <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 98.6667px;" transform="translate(0,0)" opacity="1">
                                <span><?php echo $documents_span[1009]->nodeValue, PHP_EOL ?></span></span></div>
                                <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                  <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 0, 0); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 13.3333px;" transform="translate(0,0)" opacity="1">
                                    <span><span class="factor-label"><?php echo $documents_span[1011]->nodeValue, PHP_EOL ?></span></span>&nbsp;<span></span></span>
                                    <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 56px;" transform="translate(0,0)" opacity="1">
                                      <span><?php echo $documents_span[1015]->nodeValue, PHP_EOL ?></span>&nbsp;<span></span></span>
                                      <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 628px; top: 98.6667px;" transform="translate(0,0)" opacity="1">
                                        <span><?php echo $documents_span[1018]->nodeValue, PHP_EOL ?></span>&nbsp;<span></span></span></div>
                                        <div class="highcharts-axis-labels highcharts-yaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                          <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 325px; top: -29px;" opacity="1"><?php echo $documents_span[1021]->nodeValue, PHP_EOL ?></span>
                                          <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 373px; top: -29px;" opacity="1"><?php echo $documents_span[1022]->nodeValue, PHP_EOL ?></span>
                                          <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 421px; top: -29px;" opacity="1"><?php echo $documents_span[1023]->nodeValue, PHP_EOL ?></span>
                                          <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 445px; top: -29px;" opacity="1"><?php echo $documents_span[1024]->nodeValue, PHP_EOL ?></span>
                                          <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 469px; top: -29px;" opacity="1"><?php echo $documents_span[1025]->nodeValue, PHP_EOL ?></span>
                                          <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 493px; top: -29px;" opacity="1"><?php echo $documents_span[1026]->nodeValue, PHP_EOL ?></span>
                                          <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 517px; top: -29px;" opacity="1"><?php echo $documents_span[1027]->nodeValue, PHP_EOL ?></span>
                                          <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 565px; top: -29px;" opacity="1"><?php echo $documents_span[1028]->nodeValue, PHP_EOL ?></span>
                                          <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 613px; top: -29px;" opacity="1"><?php echo $documents_span[1029]->nodeValue, PHP_EOL ?></span>
                                        </div></div></div>
                    <script type="text/javascript">
                            $(document).ready(function() {
                                    subfactor_splitbar_chart({"labels":{"left":["<span><span class='factor-label'>Conventionnel(le)<\/span><\/span>","<span>Prévisible<\/span>","<span>Traditionnel(le)<\/span>"],"right":["<span><span class='factor-label'>Innovateur(trice)<\/span><\/span>&nbsp;<span>(19)<\/span>","<span>Imaginatif(ve)<\/span>&nbsp;<span>(21)<\/span>","<span>Vif(ve) d'esprit<\/span>&nbsp;<span>(13)<\/span>"]},"data":[{"label":"Innovation","score":19},{"label":"Imaginatif(ve)","score":21},{"label":"Vif(ve) d'esprit","score":13}],"height":129}, "chart_innovation_summary", true);
                            });
                    </script>

                    <div class="cdchart subfactor_split chart_compassion_summary" data-highcharts-chart="43">
                      <div class="highcharts-container" id="highcharts-86" style="position: relative; overflow: hidden; width: 938px; height: 172px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: Dosis, sans-serif;">
                        <img src="{{ asset('img/svg/chart41.svg') }}">
                        <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                          <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 0, 0); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 13.375px;" transform="translate(0,0)" opacity="1">
                            <span><span class="factor-label"><?php echo $documents_span[1030]->nodeValue, PHP_EOL ?></span></span></span>
                            <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 56.125px;" transform="translate(0,0)" opacity="1">
                              <span><?php echo $documents_span[1033]->nodeValue, PHP_EOL ?></span></span>
                              <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 98.875px;" transform="translate(0,0)" opacity="1">
                                <span><?php echo $documents_span[1035]->nodeValue, PHP_EOL ?></span></span>
                                <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 141.625px;" transform="translate(0,0)" opacity="1">
                                  <span><?php echo $documents_span[1037]->nodeValue, PHP_EOL ?></span></span></div>
                                  <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                    <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 0, 0); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 628px; top: 13.375px;" transform="translate(0,0)" opacity="1">
                                      <span><span class="factor-label"><?php echo $documents_span[1039]->nodeValue, PHP_EOL ?></span></span>&nbsp;<span></span></span>
                                      <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 56.125px;" transform="translate(0,0)" opacity="1">
                                        <span><?php echo $documents_span[1043]->nodeValue, PHP_EOL ?></span>&nbsp;<span></span></span>
                                        <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 628px; top: 98.875px;" transform="translate(0,0)" opacity="1">
                                          <span><?php echo $documents_span[1046]->nodeValue, PHP_EOL ?></span>&nbsp;<span></span></span>
                                          <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 141.625px;" transform="translate(0,0)" opacity="1">
                                            <span><?php echo $documents_span[1049]->nodeValue, PHP_EOL ?></span>&nbsp;<span></span></span></div>
                                            <div class="highcharts-axis-labels highcharts-yaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 325px; top: -29px;" opacity="1"><?php echo $documents_span[1054]->nodeValue, PHP_EOL ?></span>
                                              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 373px; top: -29px;" opacity="1"><?php echo $documents_span[1055]->nodeValue, PHP_EOL ?></span>
                                              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 421px; top: -29px;" opacity="1"><?php echo $documents_span[1056]->nodeValue, PHP_EOL ?></span>
                                              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 445px; top: -29px;" opacity="1"><?php echo $documents_span[1057]->nodeValue, PHP_EOL ?></span>
                                              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 469px; top: -29px;" opacity="1"><?php echo $documents_span[1058]->nodeValue, PHP_EOL ?></span>
                                              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 493px; top: -29px;" opacity="1"><?php echo $documents_span[1059]->nodeValue, PHP_EOL ?></span>
                                              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 517px; top: -29px;" opacity="1"><?php echo $documents_span[1060]->nodeValue, PHP_EOL ?></span>
                                              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 565px; top: -29px;" opacity="1"><?php echo $documents_span[1061]->nodeValue, PHP_EOL ?></span>
                                              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 613px; top: -29px;" opacity="1"><?php echo $documents_span[1060]->nodeValue, PHP_EOL ?></span>
                                            </div></div></div>
                    <script type="text/javascript">
                            $(document).ready(function() {
                                    subfactor_splitbar_chart({"labels":{"left":["<span><span class='factor-label'>Détaché(e)<\/span><\/span>","<span>Neutre<\/span>","<span>Objectif(ve)<\/span>","<span>Interrogateur(trice)<\/span>"],"right":["<span><span class='factor-label'>Plein(e) de compassion<\/span><\/span>&nbsp;<span>(11)<\/span>","<span>Compréhensif(ve)<\/span>&nbsp;<span>(1)<\/span>","<span>Qui soutient, encourage<\/span>&nbsp;<span>(13)<\/span>","<span>Tolérant(e)<\/span>&nbsp;<span>(17)<\/span>"]},"data":[{"label":"Compassion","score":11},{"label":"Compréhensif(ve)","score":1},{"label":"Qui soutient, encourage","score":13},{"label":"Tolérant(e)","score":17}],"height":172}, "chart_compassion_summary", true);
                            });
                    </script>

                    <div class="cdchart subfactor_split chart_extroversion_summary" data-highcharts-chart="44">
                      <div class="highcharts-container" id="highcharts-88" style="position: relative; overflow: hidden; width: 938px; height: 172px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: Dosis, sans-serif;">
                        <img src="{{ asset('img/svg/chart42.svg') }}">
                        <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                          <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 0, 0); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 13.375px;" transform="translate(0,0)" opacity="1">
                            <span><span class="factor-label"><?php echo $documents_span[1061]->nodeValue, PHP_EOL ?></span></span></span>
                            <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 56.125px;" transform="translate(0,0)" opacity="1">
                              <span><?php echo $documents_span[1064]->nodeValue, PHP_EOL ?></span></span>
                              <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 98.875px;" transform="translate(0,0)" opacity="1">
                                <span><?php echo $documents_span[1066]->nodeValue, PHP_EOL ?></span></span>
                                <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 141.625px;" transform="translate(0,0)" opacity="1">
                                  <span><?php echo $documents_span[1068]->nodeValue, PHP_EOL ?></span></span></div>
                                  <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                    <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 0, 0); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 628px; top: 13.375px;" transform="translate(0,0)" opacity="1">
                                      <span><span class="factor-label"><?php echo $documents_span[1070]->nodeValue, PHP_EOL ?></span></span>&nbsp;<span></span></span>
                                      <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 56.125px;" transform="translate(0,0)" opacity="1">
                                        <span><?php echo $documents_span[1074]->nodeValue, PHP_EOL ?></span>&nbsp;<span></span></span>
                                        <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 628px; top: 98.875px;" transform="translate(0,0)" opacity="1">
                                          <span><?php echo $documents_span[1077]->nodeValue, PHP_EOL ?></span>&nbsp;<span></span></span>
                                          <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 141.625px;" transform="translate(0,0)" opacity="1">
                                            <span><?php echo $documents_span[1080]->nodeValue, PHP_EOL ?></span>&nbsp;<span></span></span></div>
                                            <div class="highcharts-axis-labels highcharts-yaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 325px; top: -29px;" opacity="1"><?php echo $documents_span[1083]->nodeValue, PHP_EOL ?></span>
                                              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 373px; top: -29px;" opacity="1"><?php echo $documents_span[1084]->nodeValue, PHP_EOL ?></span>
                                              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 421px; top: -29px;" opacity="1"><?php echo $documents_span[1085]->nodeValue, PHP_EOL ?></span>
                                              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 445px; top: -29px;" opacity="1"><?php echo $documents_span[1086]->nodeValue, PHP_EOL ?></span>
                                              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 469px; top: -29px;" opacity="1"><?php echo $documents_span[1087]->nodeValue, PHP_EOL ?></span>
                                              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 493px; top: -29px;" opacity="1"><?php echo $documents_span[1088]->nodeValue, PHP_EOL ?></span>
                                              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 517px; top: -29px;" opacity="1"><?php echo $documents_span[1089]->nodeValue, PHP_EOL ?></span>
                                              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 565px; top: -29px;" opacity="1"><?php echo $documents_span[1090]->nodeValue, PHP_EOL ?></span>
                                              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 613px; top: -29px;" opacity="1"><?php echo $documents_span[1091]->nodeValue, PHP_EOL ?></span>
                                            </div>
                        </div></div>
                    <script type="text/javascript">
                            $(document).ready(function() {
                                    subfactor_splitbar_chart({"labels":{"left":["<span><span class='factor-label'>Introverti(e)<\/span><\/span>","<span>Distant(e)<\/span>","<span>Réservé(e)<\/span>","<span>Posé<\/span>"],"right":["<span><span class='factor-label'>Extraverti(e)<\/span><\/span>&nbsp;<span>(9)<\/span>","<span>Enthousiaste<\/span>&nbsp;<span>(12)<\/span>","<span>Social(e)<\/span>&nbsp;<span>(8)<\/span>","<span>Verbal(e)<\/span>&nbsp;<span>(5)<\/span>"]},"data":[{"label":"Extraversion","score":9},{"label":"Enthousiaste","score":12},{"label":"Social(e)","score":8},{"label":"Verbal(e)","score":5}],"height":172}, "chart_extroversion_summary", true);
                            });
                    </script>

                    <div class="cdchart subfactor_split chart_dominance_summary" data-highcharts-chart="45">
                      <div class="highcharts-container" id="highcharts-90" style="position: relative; overflow: hidden; width: 938px; height: 172px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: Dosis, sans-serif;">
                        <img src="{{ asset('img/svg/chart43.svg') }}">
                        <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                          <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 0, 0); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 13.375px;" transform="translate(0,0)" opacity="1">
                            <span><span class="factor-label"><?php echo $documents_span[1092]->nodeValue, PHP_EOL ?></span></span></span>
                            <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 56.125px;" transform="translate(0,0)" opacity="1">
                              <span><?php echo $documents_span[1095]->nodeValue, PHP_EOL ?></span></span>
                              <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 98.875px;" transform="translate(0,0)" opacity="1">
                                <span><?php echo $documents_span[1097]->nodeValue, PHP_EOL ?></span></span>
                                <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 141.625px;" transform="translate(0,0)" opacity="1">
                                  <span><?php echo $documents_span[1100]->nodeValue, PHP_EOL ?></span></span></div>
                                  <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                    <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 0, 0); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 628px; top: 13.375px;" transform="translate(0,0)" opacity="1">
                                      <span><span class="factor-label"><?php echo $documents_span[1102]->nodeValue, PHP_EOL ?></span></span>&nbsp;<span></span></span>
                                      <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 56.125px;" transform="translate(0,0)" opacity="1">
                                        <span><?php echo $documents_span[1106]->nodeValue, PHP_EOL ?></span>&nbsp;<span></span></span>
                                        <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 628px; top: 98.875px;" transform="translate(0,0)" opacity="1">
                                          <span><?php echo $documents_span[1109]->nodeValue, PHP_EOL ?></span>&nbsp;<span></span></span>
                                          <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 141.625px;" transform="translate(0,0)" opacity="1">
                                            <span><?php echo $documents_span[1111]->nodeValue, PHP_EOL ?></span>&nbsp;<span></span></span></div>
                                            <div class="highcharts-axis-labels highcharts-yaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 325px; top: -29px;" opacity="1"><?php echo $documents_span[1114]->nodeValue, PHP_EOL ?></span>
                                              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 373px; top: -29px;" opacity="1"><?php echo $documents_span[1115]->nodeValue, PHP_EOL ?></span>
                                              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 421px; top: -29px;" opacity="1"><?php echo $documents_span[1116]->nodeValue, PHP_EOL ?></span>
                                              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 445px; top: -29px;" opacity="1"><?php echo $documents_span[1117]->nodeValue, PHP_EOL ?></span>
                                              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 469px; top: -29px;" opacity="1"><?php echo $documents_span[1118]->nodeValue, PHP_EOL ?></span>
                                              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 493px; top: -29px;" opacity="1"><?php echo $documents_span[1119]->nodeValue, PHP_EOL ?></span>
                                              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 517px; top: -29px;" opacity="1"><?php echo $documents_span[1120]->nodeValue, PHP_EOL ?></span>
                                              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 565px; top: -29px;" opacity="1"><?php echo $documents_span[1121]->nodeValue, PHP_EOL ?></span>
                                              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 613px; top: -29px;" opacity="1"><?php echo $documents_span[1122]->nodeValue, PHP_EOL ?></span>
                                            </div>

                        </div></div>
                    <script type="text/javascript">
                            $(document).ready(function() {
                                    subfactor_splitbar_chart({"labels":{"left":["<span><span class='factor-label'>Accomodant(e)<\/span><\/span>","<span>Accomodant(e)<\/span>","<span>(14)<\/span>&nbsp;<span>Conformiste<\/span>","<span>Plein(e) de tact<\/span>"],"right":["<span><span class='factor-label'>Meneur(se)<\/span><\/span>&nbsp;<span>(9)<\/span>","<span>Défend son point de vue<\/span>&nbsp;<span>(15)<\/span>","<span>Indépendant(e)<\/span>","<span>Direct(e)<\/span>&nbsp;<span>(17)<\/span>"]},"data":[{"label":"Domination","score":9},{"label":"Défend son point de vue","score":15},{"label":"Indépendant(e)","score":-14},{"label":"Direct(e)","score":17}],"height":172}, "chart_dominance_summary", true);
                            });
                    </script>

                    <div class="cdchart subfactor_split chart_conscientiousness_summary" data-highcharts-chart="46">
                      <div class="highcharts-container" id="highcharts-92" style="position: relative; overflow: hidden; width: 938px; height: 172px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: Dosis, sans-serif;">
                        <img src="{{ asset('img/svg/chart44.svg') }}">
                        <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                          <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 0, 0); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 13.375px;" transform="translate(0,0)" opacity="1">
                            <span><?php echo $documents_span[1123]->nodeValue, PHP_EOL ?></span>&nbsp;<span><span class="factor-label"></span></span></span>
                            <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 56.125px;" transform="translate(0,0)" opacity="1">
                              <span><?php echo $documents_span[1127]->nodeValue, PHP_EOL ?></span>&nbsp;<span></span></span>
                              <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 98.875px;" transform="translate(0,0)" opacity="1">
                                <span><?php echo $documents_span[1130]->nodeValue, PHP_EOL ?></span>&nbsp;<span></span></span>
                                <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 10px; top: 141.625px;" transform="translate(0,0)" opacity="1">
                                  <span><?php echo $documents_span[1133]->nodeValue, PHP_EOL ?></span></span></div>
                                  <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                    <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 0, 0); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 13.375px;" transform="translate(0,0)" opacity="1">
                                      <span><span class="factor-label"><?php echo $documents_span[1136]->nodeValue, PHP_EOL ?></span></span></span>
                                      <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 56.125px;" transform="translate(0,0)" opacity="1">
                                        <span><?php echo $documents_span[1138]->nodeValue, PHP_EOL ?></span></span>
                                        <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color:rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 98.875px;" transform="translate(0,0)" opacity="1">
                                          <span><?php echo $documents_span[1140]->nodeValue, PHP_EOL ?></span></span>
                                          <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 141.625px;" transform="translate(0,0)" opacity="1">
                                            <span><?php echo $documents_span[1142]->nodeValue, PHP_EOL ?></span>&nbsp;<span></span></span></div>
                                            <div class="highcharts-axis-labels highcharts-yaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 325px; top: -29px;" opacity="1">
                                              <?php echo $documents_span[1144]->nodeValue, PHP_EOL ?></span>
                                              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 373px; top: -29px;" opacity="1">
                                                <?php echo $documents_span[1145]->nodeValue, PHP_EOL ?></span>
                                                <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 421px; top: -29px;" opacity="1">
                                                <?php echo $documents_span[1146]->nodeValue, PHP_EOL ?></span>
                                                <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 445px; top: -29px;" opacity="1">
                                                <?php echo $documents_span[1147]->nodeValue, PHP_EOL ?></span>
                                                <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 469px; top: -29px;" opacity="1">
                                                <?php echo $documents_span[1148]->nodeValue, PHP_EOL ?></span>
                                                <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 493px; top: -29px;" opacity="1">
                                                  <?php echo $documents_span[1149]->nodeValue, PHP_EOL ?></span>
                                                  <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 517px; top: -29px;" opacity="1">
                                                  <?php echo $documents_span[1150]->nodeValue, PHP_EOL ?></span>
                                                  <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 565px; top: -29px;" opacity="1">
                                                  <?php echo $documents_span[1151]->nodeValue, PHP_EOL ?></span>
                                                  <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 613px; top: -29px;" opacity="1">
                                                  <?php echo $documents_span[1152]->nodeValue, PHP_EOL ?></span></div></div></div>
                    <script type="text/javascript">
                            $(document).ready(function() {
                                    subfactor_splitbar_chart({"labels":{"left":["<span>(7)<\/span>&nbsp;<span><span class='factor-label'>Non-structuré(e)<\/span><\/span>","<span>(11)<\/span>&nbsp;<span>Improvisateur(trice)<\/span>","<span>(10)<\/span>&nbsp;<span>Spontané(e)<\/span>","<span>Nonchalant(e)<\/span>"],"right":["<span><span class='factor-label'>Consciencieux(se)<\/span><\/span>","<span>Précis(e)<\/span>","<span>Organisé(e)<\/span>","<span>Performant(e)<\/span>&nbsp;<span>(1)<\/span>"]},"data":[{"label":"Conscience professionnelle","score":-7},{"label":"Précis(e)","score":-11},{"label":"Organisé(e)","score":-10},{"label":"Performant(e)","score":1}],"height":172}, "chart_conscientiousness_summary", true);
                            });
                    </script>

            </div>
          </li>
          </ul>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-lg-12 card-competences-metier mb-4" id="cruciales">

    <div class="card mb-12 bg-light-rose custom-card">
      <div class="card-body">
        <h4 class="card-title bg-rose">Questions cruciales de vie</h4>

        <ul class="card-text">
          <ul>
          <li>
            <div class="cdchart life_issues_summary" data-highcharts-chart="47">
              <div class="highcharts-container" id="highcharts-94" style="position: relative; overflow: hidden; width: 938px; height: 129px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: Dosis, sans-serif;">
                <img src="{{ asset('img/svg/chart45.svg') }}">
                <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                  <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 45px;" transform="translate(0,0)" opacity="1">
                    <strong><?php echo $documents_span[1160]->nodeValue, PHP_EOL ?></strong> <span></span>&nbsp;<span></span></span>
                    <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 69px;" transform="translate(0,0)" opacity="1">
                      <strong><?php echo $documents_span[1163]->nodeValue, PHP_EOL ?></strong> <span></span>&nbsp;<span></span></span>
                      <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 93px;" transform="translate(0,0)" opacity="1">
                        <strong><?php echo $documents_span[1166]->nodeValue, PHP_EOL ?></strong> &nbsp;<span></span></span></div>
                        <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                          <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 46px;" transform="translate(0,0)" opacity="1">
                            <span><?php echo $documents_span[1168]->nodeValue, PHP_EOL ?></span></span>
                            <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 628px; top: 70px;" transform="translate(0,0)" opacity="1">
                              <span><?php echo $documents_span[1170]->nodeValue, PHP_EOL ?></span></span>
                              <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 628px; top: 94px;" transform="translate(0,0)" opacity="1">
                                <span><?php echo $documents_span[1172]->nodeValue, PHP_EOL ?></span>&nbsp;</span></div>
                                <div class="highcharts-axis-labels highcharts-yaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                  <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 316.5px; top: 13px;" opacity="1">
                                  <?php echo $documents_span[1174]->nodeValue, PHP_EOL ?></span>
                                  <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 364.5px; top: 13px;" opacity="1">
                                  <?php echo $documents_span[1175]->nodeValue, PHP_EOL ?></span>
                                  <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 412.5px; top: 13px;" opacity="1">
                                  <?php echo $documents_span[1176]->nodeValue, PHP_EOL ?></span>
                                  <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 441px; top: 13px;" opacity="1">
                                  <?php echo $documents_span[1177]->nodeValue, PHP_EOL ?></span>
                                  <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 457px; top: 13px;" opacity="1">
                                  <?php echo $documents_span[1178]->nodeValue, PHP_EOL ?></span>
                                  <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 489px; top: 13px;" opacity="1">
                                  <?php echo $documents_span[1179]->nodeValue, PHP_EOL ?></span>
                                  <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 508.5px; top: 13px;" opacity="1">
                                  <?php echo $documents_span[1180]->nodeValue, PHP_EOL ?></span>
                                  <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 556.5px; top: 13px;" opacity="1">
                                  <?php echo $documents_span[1181]->nodeValue, PHP_EOL ?></span>
                                  <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 604.5px; top: 13px;" opacity="1">
                                  <?php echo $documents_span[1182]->nodeValue, PHP_EOL ?></span></div></div></div>
            <script type="text/javascript">
              $(document).ready(function() {
                splitbar_chart({"labels":{"left":["<strong>Stress<\/strong> <span>(14)<\/span>&nbsp;<span>Détendu(e)<\/span>","<strong>Endettement<\/strong> <span>(13)<\/span>&nbsp;<span>Peu/pas endetté(e)<\/span>","<strong>Gestion Financière<\/strong> mid&nbsp;<span>Sage<\/span>"],"right":["<span>Tendu(e)<\/span>","<span>Fortement endetté(e)<\/span>","<span>Pas sage<\/span>&nbsp;mid"]},"data":[{"label":"Stress","score":-14},{"label":"Endettement","score":-13},{"label":"Gestion Financière","score":0}],"height":129}, "life_issues_summary","right");
              });
            </script>
          </li>
          </ul>
        </ul>
      </div>
    </div>
  </div>
</div>

<div class="row mb-4">
  <div class="col-lg-12 card-competences-metier mb-4" id="resume">

    <div class="card mb-12 bg-light-vert custom-card">
      <div class="card-body">
        <h4 class="card-title bg-vert">RESUME DE PERSONNALITE</h4>

        <ul class="card-text">
          <ul>
          <li>
            <label>• Aventureux(se)</label> - <span>Aventureux(se), ambitieux(se) et compétitif(ve); vous êtes attiré(e) par les défis.</span><br>

            <label>• Innovateur(trice)</label> - <span>Vous êtes très créatif(ve). Vous aimez spécialement générer et exprimer de nouvelles idées et recherchez des défis intellectuels.</span><br>

            <label>• Plein(e) de compassion</label> - <span>Plein(e) de compassion, sensible, à l'écoute; patient(e), loyal(e), doué(e) pour soutenir et encourager les autres.</span><br>

            <label>• Extraverti(e)</label> - <span>Ouvert(e), naturellement à l'aise avec les gens, aime rencontrer des inconnus, enthousiaste et doué(e) pour mettre des personnes en relation.</span><br>

            <label>• Meneur(se)</label> - <span>Vous êtes courageux(se), vous avez confiance en vous, vous voulez des résultats et vous prenez naturellement le leadership.</span><br>

            <label>• Non-structuré(e)</label> - <span>Spontané(e) et préfère opérer sans trop de détails ni de restrictions.</span><br>
          </li>
          </ul>
        </ul>
      </div>
    </div>
  </div>
</div>

<div class="row mb-4">
  <div class="col-lg-12 card-competences-metier mb-4" id="centreinteret">

    <div class="card mb-12 bg-light-rose custom-card">
      <div class="card-body">
        <h4 class="card-title bg-rose">CENTRES D'INTÉRÊTS</h4>
        <ul class="card-text">
          <ul>
          <li>
            <div class="cdchart donut_pie_summary" style="height:600px;" data-highcharts-chart="48">
              <div class="highcharts-container" id="highcharts-96" style="position: relative; overflow: hidden; width: 938px; height: 598px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: Dosis, sans-serif;">
                <img src="{{ asset('img/svg/chart46.svg') }}">
                <div class="highcharts-legend" style="position: absolute; left: 25%; top: 563px;">
                  <div class="highcharts-legend-item" style="float: left; margin-right: 20px;">
                    <span style="float: left; font-family:serif; margin-right: 10px;width: 20px;height: 20px;display: block; float: left;background-color:#7cb5ec !important;"></span>
                    <span style="font-family:serif;"><?php echo $documents_span[1184]->nodeValue, PHP_EOL ?></span></div>
                    <div class="highcharts-legend-item" style="float: left; margin-right: 20px;">
                      <span style="float: left; font-family:serif; margin-right: 10px;width: 20px;height: 20px;display: block; float: left;background-color:#f7a35c !important;"></span>
                      <span style="font-family:serif;"><?php echo $documents_span[1186]->nodeValue, PHP_EOL ?></span></div>
                      <div class="highcharts-legend-item" style="float: left; margin-right: 20px;">
                        <span style="float: left; font-family:serif; margin-right: 10px;width: 20px;height: 20px;display: block; float: left;background-color:#90ee7e !important;"></span>
                        <span style="font-family:serif;"><?php echo $documents_span[1188]->nodeValue, PHP_EOL ?></span></div>
                        <div class="highcharts-legend-item" style="float: left; margin-right: 20px;">
                          <span style="float: left; font-family:serif; margin-right: 10px;width: 20px;height: 20px;display: block; float: left;background-color:#7798BF !important;"></span>
                          <span style="font-family:serif;"><?php echo $documents_span[1190]->nodeValue, PHP_EOL ?></span></div>
                          <div class="highcharts-legend-item" style="float: left; margin-right: 20px;">
                            <span style="float: left; font-family:serif; margin-right: 10px;width: 20px;height: 20px;display: block; float: left;background-color:#aaeeee !important;"></span>
                            <span style="font-family:serif;"><?php echo $documents_span[1192]->nodeValue, PHP_EOL ?></span></div></div>
                            <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                              <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 20px; top: 44.4286px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                                <span style="font-weight : bold; font-family:serif;">
                                  <span class="top8_label"><strong><?php echo $documents_span[1204]->nodeValue, PHP_EOL ?></strong></span></span></span>
                                  <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 20px; top: 68.2857px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                                    <span style="font-weight : bold; font-family:serif;">
                                      <span class="top8_label"><strong><?php echo $documents_span[1207]->nodeValue, PHP_EOL ?></strong></span></span></span>
                                      <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 20px; top: 92.1429px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                                        <span style="font-weight : bold; font-family:serif;">
                                          <span class="top8_label"><strong><?php echo $documents_span[1210]->nodeValue, PHP_EOL ?></strong></span></span></span>
                                          <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 20px; top: 116px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                                            <span style="font-weight : bold; font-family:serif;">
                                              <span class="top8_label"><strong><?php echo $documents_span[1213]->nodeValue, PHP_EOL ?></strong></span></span></span>
                                              <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 20px; top: 139.857px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                                                <span style="font-weight : bold; font-family:serif;">
                                                  <span class="top8_label"><strong><?php echo $documents_span[1216]->nodeValue, PHP_EOL ?></strong></span></span></span>
                                                  <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 20px; top: 163.714px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                                                    <span style="font-weight : bold; font-family:serif;">
                                                      <span class="top8_label"><strong><?php echo $documents_span[1219]->nodeValue, PHP_EOL ?></strong></span></span></span>
                                                      <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 20px; top: 187.571px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                                                        <span style="font-weight : bold; font-family:serif;">
                                                          <span class="top8_label"><strong><?php echo $documents_span[1222]->nodeValue, PHP_EOL ?></strong></span></span></span>
                                                          <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 20px; top: 211.429px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                                                            <span style="font-weight : bold; font-family:serif;">
                                                              <span class="top8_label"><strong><?php echo $documents_span[1225]->nodeValue, PHP_EOL ?></strong></span></span></span>
                                                              <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 20px; top: 235.286px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                                                                <span style="font-weight : normal; font-family:serif;"><?php echo $documents_span[1228]->nodeValue, PHP_EOL ?></span></span>
                                                                <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 20px; top: 259.143px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                                                                  <span style="font-weight : normal; font-family:serif;"><?php echo $documents_span[1229]->nodeValue, PHP_EOL ?></span></span>
                                                                  <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 20px; top: 283px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                                                                    <span style="font-weight : normal; font-family:serif;"><?php echo $documents_span[1231]->nodeValue, PHP_EOL ?></span></span>
                                                                    <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 20px; top: 306.857px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                                                                      <span style="font-weight : normal; font-family:serif;"><?php echo $documents_span[1233]->nodeValue, PHP_EOL ?></span></span>
                                                                      <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 20px; top: 330.714px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                                                                        <span style="font-weight : normal; font-family:serif;"><?php echo $documents_span[1235]->nodeValue, PHP_EOL ?></span></span>
                                                                        <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 20px; top: 354.571px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                                                                          <span style="font-weight : normal; font-family:serif;"><?php echo $documents_span[1237]->nodeValue, PHP_EOL ?></span></span>
                                                                          <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 20px; top: 378.429px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                                                                            <span style="font-weight : normal; font-family:serif;"><?php echo $documents_span[1239]->nodeValue, PHP_EOL ?></span></span>
                                                                            <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 20px; top: 402.286px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                                                                              <span style="font-weight : normal; font-family:serif;"><?php echo $documents_span[1241]->nodeValue, PHP_EOL ?></span></span>
                                                                              <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 20px; top: 426.143px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                                                                                <span style="font-weight : normal; font-family:serif;"><?php echo $documents_span[1243]->nodeValue, PHP_EOL ?></span></span>
                                                                                <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 20px; top: 450px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                                                                                  <span style="font-weight : normal; font-family:serif;"><?php echo $documents_span[1245]->nodeValue, PHP_EOL ?></span></span>
                                                                                  <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 20px; top: 473.857px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                                                                                    <span style="font-weight : normal; font-family:serif;"><?php echo $documents_span[1247]->nodeValue, PHP_EOL ?></span></span>
                                                                                    <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 20px; top: 497.714px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                                                                                      <span style="font-weight : normal; font-family:serif;"><?php echo $documents_span[1249]->nodeValue, PHP_EOL ?></span></span>
                                                                                      <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; left: 20px; top: 521.571px; width: 290px; display: block;" transform="translate(0,0)" opacity="1">
                                                                                        <span style="font-weight : normal; font-family:serif;"><?php echo $documents_span[1251]->nodeValue, PHP_EOL ?></span></span></div>
                                                                                        <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                                                                          <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 200px; margin-left: 0px; margin-top: 0px; left: 728px; top: 44.4286px;" transform="translate(0,0)" opacity="1">
                                                                                            <span style="font-weight : bold; font-family:serif;"><?php echo $documents_span[1253]->nodeValue, PHP_EOL ?></span></span>
                                                                                            <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 200px; margin-left: 0px; margin-top: 0px; left: 728px; top: 68.2857px;" transform="translate(0,0)" opacity="1">
                                                                                              <span style="font-weight : bold; font-family:serif;"><?php echo $documents_span[1255]->nodeValue, PHP_EOL ?></span></span>
                                                                                              <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 200px; margin-left: 0px; margin-top: 0px; left: 728px; top: 92.1429px;" transform="translate(0,0)" opacity="1">
                                                                                                <span style="font-weight : bold; font-family:serif;"><?php echo $documents_span[1257]->nodeValue, PHP_EOL ?></span></span>
                                                                                                <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 200px; margin-left: 0px; margin-top: 0px; left: 728px; top: 116px;" transform="translate(0,0)" opacity="1">
                                                                                                  <span style="font-weight : bold; font-family:serif;"><?php echo $documents_span[1259]->nodeValue, PHP_EOL ?></span></span>
                                                                                                  <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 200px; margin-left: 0px; margin-top: 0px; left: 728px; top: 139.857px;" transform="translate(0,0)" opacity="1">
                                                                                                    <span style="font-weight : bold; font-family:serif;"><?php echo $documents_span[1261]->nodeValue, PHP_EOL ?></span></span>
                                                                                                    <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 200px; margin-left: 0px; margin-top: 0px; left: 728px; top: 163.714px;" transform="translate(0,0)" opacity="1">
                                                                                                      <span style="font-weight : bold; font-family:serif;"><?php echo $documents_span[1263]->nodeValue, PHP_EOL ?></span></span>
                                                                                                      <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 200px; margin-left: 0px; margin-top: 0px; left: 728px; top: 187.571px;" transform="translate(0,0)" opacity="1">
                                                                                                        <span style="font-weight : bold; font-family:serif;"><?php echo $documents_span[1265]->nodeValue, PHP_EOL ?></span></span>
                                                                                                        <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 200px; margin-left: 0px; margin-top: 0px; left: 728px; top: 211.429px;" transform="translate(0,0)" opacity="1">
                                                                                                          <span style="font-weight : bold; font-family:serif;"><?php echo $documents_span[1267]->nodeValue, PHP_EOL ?></span></span>
                                                                                                          <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 200px; margin-left: 0px; margin-top: 0px; left: 728px; top: 235.286px;" transform="translate(0,0)" opacity="1">
                                                                                                            <?php echo $documents_span[1269]->nodeValue, PHP_EOL ?></span>
                                                                                                            <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 200px; margin-left: 0px; margin-top: 0px; left: 728px; top: 259.143px;" transform="translate(0,0)" opacity="1">
                                                                                                            <?php echo $documents_span[1270]->nodeValue, PHP_EOL ?></span>
                                                                                                            <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 200px; margin-left: 0px; margin-top: 0px; left: 728px; top: 283px;" transform="translate(0,0)" opacity="1">
                                                                                                            <?php echo $documents_span[1271]->nodeValue, PHP_EOL ?></span>
                                                                                                            <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 200px; margin-left: 0px; margin-top: 0px; left: 728px; top: 306.857px;" transform="translate(0,0)" opacity="1">
                                                                                                            <?php echo $documents_span[1272]->nodeValue, PHP_EOL ?></span>
                                                                                                            <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 200px; margin-left: 0px; margin-top: 0px; left: 728px; top: 330.714px;" transform="translate(0,0)" opacity="1">
                                                                                                            <?php echo $documents_span[1273]->nodeValue, PHP_EOL ?></span>
                                                                                                            <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 200px; margin-left: 0px; margin-top: 0px; left: 728px; top: 354.571px;" transform="translate(0,0)" opacity="1">
                                                                                                            <?php echo $documents_span[1274]->nodeValue, PHP_EOL ?></span>
                                                                                                            <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 200px; margin-left: 0px; margin-top: 0px; left: 728px; top: 378.429px;" transform="translate(0,0)" opacity="1">
                                                                                                            <?php echo $documents_span[1275]->nodeValue, PHP_EOL ?></span>
                                                                                                            <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 200px; margin-left: 0px; margin-top: 0px; left: 728px; top: 402.286px;" transform="translate(0,0)" opacity="1">
                                                                                                            <?php echo $documents_span[1276]->nodeValue, PHP_EOL ?></span>
                                                                                                            <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 200px; margin-left: 0px; margin-top: 0px; left: 728px; top: 426.143px;" transform="translate(0,0)" opacity="1">
                                                                                                            <?php echo $documents_span[1277]->nodeValue, PHP_EOL ?></span>
                                                                                                            <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 200px; margin-left: 0px; margin-top: 0px; left: 728px; top: 450px;" transform="translate(0,0)" opacity="1">
                                                                                                            <?php echo $documents_span[1278]->nodeValue, PHP_EOL ?></span>
                                                                                                            <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 200px; margin-left: 0px; margin-top: 0px; left: 728px; top: 473.857px;" transform="translate(0,0)" opacity="1">
                                                                                                            <?php echo $documents_span[1279]->nodeValue, PHP_EOL ?></span>
                                                                                                            <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 200px; margin-left: 0px; margin-top: 0px; left: 728px; top: 497.714px;" transform="translate(0,0)" opacity="1">
                                                                                                            <?php echo $documents_span[1280]->nodeValue, PHP_EOL ?></span>
                                                                                                            <span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 200px; margin-left: 0px; margin-top: 0px; left: 728px; top: 521.571px;" transform="translate(0,0)" opacity="1">
                                                                                                            <?php echo $documents_span[1281]->nodeValue, PHP_EOL ?></span></div>
                                                                                                            <div class="highcharts-axis-labels highcharts-yaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                                                                                              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 321px; top: 13px;" opacity="1">
                                                                                                              <?php echo $documents_span[1282]->nodeValue, PHP_EOL ?></span>
                                                                                                              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 510.5px; top: 13px;" opacity="1">
                                                                                                              <?php echo $documents_span[1283]->nodeValue, PHP_EOL ?></span>
                                                                                                              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 700.5px; top: 13px;" opacity="1">
                                                                                                              <?php echo $documents_span[1284]->nodeValue, PHP_EOL ?></span></div></div></div>
                        <script type="text/javascript">
                        $(document).ready(function() {
                                combined_category_bar_chart({"showScores":true,"startAngle":0,"labels":{"donut":"Centres d'Intérêts","pie":""},"data":[{"grouplabel":"Faire (0%)","groupname":"Faire","groupdata":[{"label":"11. Mécanique","score":28,"number":11},{"label":"15. Sport","score":13,"number":15},{"label":"16. Sécurité/Forces de l'ordre","score":5,"number":16},{"label":"17. Aventure","score":3,"number":17},{"label":"19. Extérieur/Agriculture","score":2,"number":19}]},{"grouplabel":"Aider (0%)","groupname":"Aider","groupdata":[{"label":"13. Service","score":25,"number":13},{"label":"18. Sciences de la consommation","score":3,"number":18},{"label":"21. Soin animalier","score":0,"number":21},{"label":"20. Transport","score":0,"number":20}]},{"grouplabel":"Analyser (0%)","groupname":"Analyser","groupdata":[{"label":"9. Informatique/Finance","score":50,"number":9},{"label":"10. Sciences Technologiques","score":43,"number":10},{"label":"14. Sciences/Santé","score":23,"number":14}]},{"grouplabel":"Influencer (79%)","groupname":"Influencer","groupdata":[{"label":"<span class='top8_label'><strong>1. Religieux<\/strong><\/span>","score":100,"number":1},{"label":"<span class='top8_label'><strong>2. Conseil<\/strong><\/span>","score":92,"number":2},{"label":"<span class='top8_label'><strong>3. Enseignement<\/strong><\/span>","score":82,"number":3},{"label":"<span class='top8_label'><strong>5. Législation/Politique<\/strong><\/span>","score":73,"number":5},{"label":"<span class='top8_label'><strong>4. Gestion/Ventes<\/strong><\/span>","score":73,"number":4},{"label":"<span class='top8_label'><strong>8. International<\/strong><\/span>","score":58,"number":8}]},{"grouplabel":"Exprimer (21%)","groupname":"Exprimer","groupdata":[{"label":"<span class='top8_label'><strong>7. Ecrit<\/strong><\/span>","score":62,"number":7},{"label":"<span class='top8_label'><strong>6. Prestation publique/Communication<\/strong><\/span>","score":62,"number":6},{"label":"12. Artistique","score":27,"number":12}]}]}, "donut_pie_summary");
                        });
                        </script>
          </li>
          </ul>
        </ul>
      </div>
    </div>
  </div>
</div>

<div class="row mb-4">
  <div class="col-lg-12 card-competences-metier mb-4" id="groupesprincipaux">

    <div class="card mb-12 bg-light-vert custom-card">
      <div class="card-body">
        <h4 class="card-title bg-vert">Groupes Principaux de Carrière par domaine d'Intérêts</h4>
        <ul class="card-text">
          <ul>
          <li>
            <div class="cdchart top8_polar_summary" style="height:600px;" data-highcharts-chart="49">
              <div class="highcharts-container" id="highcharts-98" style="position: relative; overflow: hidden; width: 938px; height: 598px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: Dosis, sans-serif;">
                <img src="{{ asset('img/svg/chart47.svg') }}">
                <div class="highcharts-legend" style="position: absolute; left: 628px; top: 227px;">
                  <div class="null" style="position: absolute; left: 0px; top: 0px;">
                    <div class="null" style="position: absolute; left: 0px; top: 0px;">
                      <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 3px;">
                        <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(51, 51, 51);" zindex="2">
                          <div style="text-align: left; width:300px;float:left; font-family:serif;">
                            <span style="font-family:serif;"><strong><?php echo $documents_span[1285]->nodeValue, PHP_EOL ?></strong></span></div></span></div>
                            <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 20px;">
                              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(51, 51, 51);" zindex="2">
                                <div style="text-align: left; width:300px;float:left; font-family:serif;">
                                  <span style="font-family:serif;"><strong><?php echo $documents_span[1287]->nodeValue, PHP_EOL ?></strong></span></div></span></div>
                                  <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 37px;">
                                    <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(51, 51, 51);" zindex="2">
                                      <div style="text-align: left; width:300px;float:left; font-family:serif;">
                                        <span style="font-family:serif;"><strong><?php echo $documents_span[1289]->nodeValue, PHP_EOL ?></strong></span></div></span></div>
                                        <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 54px;">
                                          <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(51, 51, 51);" zindex="2">
                                            <div style="text-align: left; width:300px;float:left; font-family:serif;">
                                              <span style="font-family:serif;"><strong><?php echo $documents_span[1291]->nodeValue, PHP_EOL ?></strong></span></div></span></div>
                                              <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 71px;">
                                                <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(51, 51, 51);" zindex="2">
                                                  <div style="text-align: left; width:300px;float:left; font-family:serif;">
                                                    <span style="font-family:serif;"><strong><?php echo $documents_span[1293]->nodeValue, PHP_EOL ?></strong></span></div></span></div>
                                                    <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 88px;">
                                                      <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(51, 51, 51);" zindex="2">
                                                        <div style="text-align: left; width:300px;float:left; font-family:serif;">
                                                          <span style="font-family:serif;"><strong><?php echo $documents_span[1295]->nodeValue, PHP_EOL ?></strong></span></div></span></div>
                                                          <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 105px;">
                                                            <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(51, 51, 51);" zindex="2">
                                                              <div style="text-align: left; width:300px;float:left; font-family:serif;">
                                                                <span style="font-family:serif;"><strong><?php echo $documents_span[1297]->nodeValue, PHP_EOL ?></strong></span></div></span></div>
                                                                <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 122px;">
                                                                  <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(51, 51, 51);" zindex="2">
                                                                    <div style="text-align: left; width:300px;float:left; font-family:serif;">
                                                                      <span style="font-family:serif;"><strong><?php echo $documents_span[1299]->nodeValue, PHP_EOL ?></strong></span></div></span></div></div></div></div>
                                                                      <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                                                        <span style="position: absolute; white-space: normal; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 200px; margin-left: 0px; margin-top: 0px; left: 460.957px; top: 78.3489px; width: 80px; display: block;" transform="translate(0,0)" opacity="1">
                                                                          <span style="font-family:serif;"><?php echo $documents_span[1301]->nodeValue, PHP_EOL ?></span></span>
                                                                          <span style="position: absolute; white-space: normal; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 200px; margin-left: 0px; margin-top: 0px; left: 554.872px; top: 367.389px; width: 80px; display: block;" transform="translate(0,0)" opacity="1">
                                                                            <span style="font-family:serif;"><?php echo $documents_span[1303]->nodeValue, PHP_EOL ?></span></span>
                                                                            <span style="position: absolute; white-space: normal; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 200px; margin-left: 0px; margin-top: 0px; left: 269px; top: 546.025px; width: 80px; display: block;" transform="translate(0,0)" opacity="1">
                                                                              <span style="font-family:serif;"><?php echo $documents_span[1305]->nodeValue, PHP_EOL ?></span></span>
                                                                              <span style="position: absolute; white-space: normal; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 200px; margin-left: 0px; margin-top: 0px; left: 0px; top: 367.389px; width: 80px; display: block;" transform="translate(0,0)" opacity="1">
                                                                                <span style="font-family:serif;"><?php echo $documents_span[1307]->nodeValue, PHP_EOL ?></span></span>
                                                                                <span style="position: absolute; white-space: normal; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 200px; margin-left: 0px; margin-top: 0px; left: 77.0428px; top: 78.3489px; width: 80px; display: block;" transform="translate(0,0)" opacity="1">
                                                                                  <span style="font-family:serif;"><?php echo $documents_span[1309]->nodeValue, PHP_EOL ?></span></span>
                                                                                  <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 200px; margin-left: 0px; margin-top: 0px; left: 0px; top: -10015px;" transform="translate(0,0)">
                                                                                  <?php echo $documents_span[1311]->nodeValue, PHP_EOL ?></span></div>
                                                                                  <div class="highcharts-axis-labels highcharts-yaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                                                                    <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 298px; top: 258.361px;" transform="translate(0,0)" opacity="1">
                                                                                    <?php echo $documents_span[1312]->nodeValue, PHP_EOL ?></span>
                                                                                    <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 289px; top: 147.668px;" transform="translate(0,0)" opacity="1">
                                                                                    <?php echo $documents_span[1313]->nodeValue, PHP_EOL ?></span>
                                                                                    <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 281px; top: 36.975px;" transform="translate(0,0)" opacity="1">
                                                                                    <?php echo $documents_span[1314]->nodeValue, PHP_EOL ?></span></div></div></div>
<script type="text/javascript">
  $(document).ready(function() {
    top8_interest_polar_chart({"data":[{"grouplabel":"Faire (0%)","groupname":"Faire","groupdata":[]},{"grouplabel":"Aider (0%)","groupname":"Aider","groupdata":[]},{"grouplabel":"Analyser (0%)","groupname":"Analyser","groupdata":[]},{"grouplabel":"Influencer (79%)","groupname":"Influencer","groupdata":[{"label":"<strong>1. Religieux<\/strong>","score":100},{"label":"<strong>2. Conseil<\/strong>","score":92},{"label":"<strong>3. Enseignement<\/strong>","score":82},{"label":"<strong>5. Législation/Politique<\/strong>","score":73},{"label":"<strong>4. Gestion/Ventes<\/strong>","score":73},{"label":"<strong>8. International<\/strong>","score":58}]},{"grouplabel":"Exprimer (21%)","groupname":"Exprimer","groupdata":[{"label":"<strong>7. Ecrit<\/strong>","score":62},{"label":"<strong>6. Prestation publique/Communication<\/strong>","score":62}]}]}, "top8_polar_summary");
  });
</script>
          </li>
          </ul>
        </ul>
      </div>
    </div>
  </div>
</div>

<div class="row mb-4">
  <div class="col-lg-12 card-competences-metier mb-4" id="compcap">

    <div class="card mb-12 bg-light-rose custom-card">
      <div class="card-body">
        <h4 class="card-title bg-rose">Compétences et Capacités</h4>

        <ul class="card-text">
          <ul>
          <li>
            <div class="cdchart skills_chart_summary" data-highcharts-chart="50">
              <div class="highcharts-container" id="highcharts-100" style="position: relative; overflow: hidden; width: 938px; height: 490px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: Dosis, sans-serif;">
                <img src="{{ asset('img/svg/chart48.svg') }}">
                <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                  <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 48.4643px;" transform="translate(0,0)" opacity="1">
                    <strong><?php echo $documents_span[1315]->nodeValue, PHP_EOL ?></strong></span>
                    <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 79.3929px;" transform="translate(0,0)" opacity="1">
                      <strong><?php echo $documents_span[1316]->nodeValue, PHP_EOL ?></strong></span>
                      <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 110.321px;" transform="translate(0,0)" opacity="1">
                        <strong><?php echo $documents_span[1317]->nodeValue, PHP_EOL ?></strong></span>
                        <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 141.25px;" transform="translate(0,0)" opacity="1">
                          <strong><?php echo $documents_span[1318]->nodeValue, PHP_EOL ?></strong></span>
                          <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 172.179px;" transform="translate(0,0)" opacity="1">
                            <strong><?php echo $documents_span[1319]->nodeValue, PHP_EOL ?></strong></span>
                            <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 203.107px;" transform="translate(0,0)" opacity="1">
                              <strong><?php echo $documents_span[1320]->nodeValue, PHP_EOL ?></strong></span>
                              <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 234.036px;" transform="translate(0,0)" opacity="1">
                                <strong><?php echo $documents_span[1321]->nodeValue, PHP_EOL ?></strong></span>
                                <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 264.964px;" transform="translate(0,0)" opacity="1">
                                  <strong><?php echo $documents_span[1322]->nodeValue, PHP_EOL ?></strong></span>
                                  <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 295.893px;" transform="translate(0,0)" opacity="1">
                                  <?php echo $documents_span[1323]->nodeValue, PHP_EOL ?></span>
                                  <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 326.821px;" transform="translate(0,0)" opacity="1">
                                  <?php echo $documents_span[1324]->nodeValue, PHP_EOL ?></span>
                                  <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 357.75px;" transform="translate(0,0)" opacity="1">
                                  <?php echo $documents_span[1325]->nodeValue, PHP_EOL ?></span>
                                  <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 388.679px;" transform="translate(0,0)" opacity="1">
                                  <?php echo $documents_span[1326]->nodeValue, PHP_EOL ?></span>
                                  <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 419.607px;" transform="translate(0,0)" opacity="1">
                                  <?php echo $documents_span[1327]->nodeValue, PHP_EOL ?></span>
                                  <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 450.536px;" transform="translate(0,0)" opacity="1">
                                  <?php echo $documents_span[1328]->nodeValue, PHP_EOL ?></span></div>
                                  <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                    <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 628px; top: 49.4643px;" transform="translate(0,0)" opacity="1">
                                    <?php echo $documents_span[1329]->nodeValue, PHP_EOL ?></span>
                                    <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 628px; top: 80.3929px;" transform="translate(0,0)" opacity="1">
                                    <?php echo $documents_span[1330]->nodeValue, PHP_EOL ?></span>
                                    <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 628px; top: 111.321px;" transform="translate(0,0)" opacity="1">
                                    <?php echo $documents_span[1331]->nodeValue, PHP_EOL ?></span>
                                    <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 628px; top: 142.25px;" transform="translate(0,0)" opacity="1">
                                    <?php echo $documents_span[1332]->nodeValue, PHP_EOL ?></span>
                                    <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 628px; top: 173.179px;" transform="translate(0,0)" opacity="1">
                                    <?php echo $documents_span[1333]->nodeValue, PHP_EOL ?></span>
                                    <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 628px; top: 204.107px;" transform="translate(0,0)" opacity="1">
                                    <?php echo $documents_span[1334]->nodeValue, PHP_EOL ?></span>
                                    <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 628px; top: 235.036px;" transform="translate(0,0)" opacity="1">
                                    <?php echo $documents_span[1335]->nodeValue, PHP_EOL ?></span>
                                    <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 628px; top: 265.964px;" transform="translate(0,0)" opacity="1">
                                    <?php echo $documents_span[1336]->nodeValue, PHP_EOL ?></span>
                                    <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 628px; top: 296.893px;" transform="translate(0,0)" opacity="1">
                                    <?php echo $documents_span[1337]->nodeValue, PHP_EOL ?></span>
                                    <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 628px; top: 327.821px;" transform="translate(0,0)" opacity="1">
                                    <?php echo $documents_span[1338]->nodeValue, PHP_EOL ?></span>
                                    <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 628px; top: 358.75px;" transform="translate(0,0)" opacity="1">
                                    <?php echo $documents_span[1339]->nodeValue, PHP_EOL ?></span>
                                    <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 628px; top: 389.679px;" transform="translate(0,0)" opacity="1">
                                    <?php echo $documents_span[1340]->nodeValue, PHP_EOL ?></span>
                                    <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 628px; top: 420.607px;" transform="translate(0,0)" opacity="1">
                                    <?php echo $documents_span[1341]->nodeValue, PHP_EOL ?></span>
                                    <span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 628px; top: 451.536px;" transform="translate(0,0)" opacity="1">
                                    <?php echo $documents_span[1342]->nodeValue, PHP_EOL ?></span></div>
                                    <div class="highcharts-axis-labels highcharts-yaxis-labels" style="position: absolute; left: 0px; top: 0px;"><span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 321px; top: 13px;" opacity="1">
                                    <?php echo $documents_span[1343]->nodeValue, PHP_EOL ?></span>
                                    <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 460.5px; top: 13px;" opacity="1">
                                    <?php echo $documents_span[1344]->nodeValue, PHP_EOL ?></span>
                                    <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 600.5px; top: 13px;" opacity="1">
                                    <?php echo $documents_span[1345]->nodeValue, PHP_EOL ?></span></div></div></div>
                                <script type="text/javascript">
                              $(document).ready(function() {
                                      bar_chart({"labels":{"left":["<strong>1. Administratif<\/strong>","<strong>2. Analytique<\/strong>","<strong>3. Gérer<\/strong>","<strong>4. Maths<\/strong>","<strong>5. Relationnel(le)<\/strong>","<strong>6. Interculturel(le)<\/strong>","<strong>7. Marketing<\/strong>","<strong>8. Travailler avec les autres<\/strong>","9. Ecrit","10. Organiser","11. Mécanique","12. Musical","13. Artistique","14. Sportif/ve"],"right":["Très élevé (90)","Très élevé (90)","Très élevé (90)","Très élevé (88)","Elevé (83)","Elevé (82)","Elevé (82)","Elevé (80)","Elevé (75)","Elevé (72)","Elevé (70)","Moyen (50)","Faible (32)","Faible (25)"]},"data":[{"label":"Administratif","score":90},{"label":"Analytique","score":90},{"label":"Gérer","score":90},{"label":"Maths","score":88},{"label":"Relationnel(le)","score":83},{"label":"Interculturel(le)","score":82},{"label":"Marketing","score":82},{"label":"Travailler avec les autres","score":80},{"label":"Ecrit","score":75},{"label":"Organiser","score":72},{"label":"Mécanique","score":70},{"label":"Musical","score":50},{"label":"Artistique","score":32},{"label":"Sportif/ve","score":25}],"title":"Compétences et Capacités","height":490}, "skills_chart_summary", "right");
                              });
                                  </script>
          </li>
          </ul>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="row mb-4">
  <div class="col-lg-12 card-competences-metier mb-4" id="priorites">

    <div class="card mb-12 bg-light-vert custom-card">
      <div class="card-body">
        <h4 class="card-title bg-vert">4 Priorités Intégrées des Valeurs</h4>

        <ul class="card-text">
          <ul>
          <li>
            <div class="cdchart values_donut_summary" style="height: 500px;" data-highcharts-chart="51">
              <div class="highcharts-container" id="highcharts-102" style="position: relative; overflow: hidden; width: 938px; height: 498px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: Dosis, sans-serif;">
                <img src="{{ asset('img/svg/chart49.svg') }}">
                <div class="highcharts-legend" style="position: absolute; left: 603px; top: 57px;">
                  <div class="null" style="position: absolute; left: 0px; top: 0px;">
                    <div class="null" style="position: absolute; left: 0px; top: 0px;">
                      <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 3px;">
                        <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(51, 51, 51);" zindex="2">
                          <span style="font-family:serif"><?php echo $documents_span[1346]->nodeValue, PHP_EOL ?></span></span></div>
                          <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 21px;">
                            <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(51, 51, 51);" zindex="2">
                            <span style="font-family:serif"><?php echo $documents_span[1348]->nodeValue, PHP_EOL ?></span></span></div>
                            <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 39px;">
                              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(51, 51, 51);" zindex="2">
                                <span style="font-family:serif"><?php echo $documents_span[1350]->nodeValue, PHP_EOL ?></span></span></div>
                                <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 57px;">
                                  <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(51, 51, 51);" zindex="2">
                                    <div style=" margin-top:10px; margin-bottom:10px; margin-left:-20px; font-weight : bold; font-family:serif; color:" #000"="" !important"=""><?php echo $documents_span[1352]->nodeValue, PHP_EOL ?></div></span></div>
                                    <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 94px;">
                                      <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(51, 51, 51);" zindex="2">
                                        <span style="font-weight : normal; font-family:serif;"><?php echo $documents_span[1353]->nodeValue, PHP_EOL ?></span></span></div>
                                        <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 112px;">
                                          <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(51, 51, 51);" zindex="2">
                                            <span style="font-weight : normal; font-family:serif;"><?php echo $documents_span[1355]->nodeValue, PHP_EOL ?></span></span></div>
                                            <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 130px;">
                                              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(51, 51, 51);" zindex="2">
                                                <span style="font-weight : normal; font-family:serif;"><?php echo $documents_span[1357]->nodeValue, PHP_EOL ?></span></span></div>
                                                <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 148px;">
                                                  <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(51, 51, 51);" zindex="2">
                                                    <span style="font-weight : normal; font-family:serif;"><?php echo $documents_span[1359]->nodeValue, PHP_EOL ?></span></span></div>
                                                    <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 166px;">
                                                      <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(51, 51, 51);" zindex="2">
                                                        <div style=" margin-top:10px; margin-bottom:10px; margin-left:-20px; font-weight : bold; font-family:serif; color:" #000"="" !important"=""><?php echo $documents_span[1361]->nodeValue, PHP_EOL ?></div></span></div>
                                                        <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 203px;">
                                                          <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(51, 51, 51);" zindex="2">
                                                            <span style="font-weight : normal; font-family:serif;"><?php echo $documents_span[1362]->nodeValue, PHP_EOL ?></span></span></div>
                                                            <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 221px;">
                                                              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(51, 51, 51);" zindex="2">
                                                                <span style="font-weight : normal; font-family:serif;"><?php echo $documents_span[1364]->nodeValue, PHP_EOL ?></span></span></div>
                                                                <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 239px;">
                                                                  <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(51, 51, 51);" zindex="2">
                                                                    <span style="font-weight : normal; font-family:serif;"><?php echo $documents_span[1366]->nodeValue, PHP_EOL ?></span></span></div>
                                                                    <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 257px;">
                                                                      <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(51, 51, 51);" zindex="2">
                                                                        <span style="font-weight : normal; font-family:serif;"><?php echo $documents_span[1368]->nodeValue, PHP_EOL ?></span></span></div>
                                                                        <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 275px;">
                                                                          <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(51, 51, 51);" zindex="2">
                                                                            <div style=" margin-top:10px; margin-bottom:10px; margin-left:-20px; font-weight : bold; font-family:serif; color:" #000"="" !important"=""><?php echo $documents_span[1370]->nodeValue, PHP_EOL ?></div></span></div>
                                                                            <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 312px;">
                                                                              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(51, 51, 51);" zindex="2">
                                                                                <span style="font-weight : normal; font-family:serif;"><?php echo $documents_span[1371]->nodeValue, PHP_EOL ?></span></span></div>
                                                                                <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 330px;">
                                                                                  <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(51, 51, 51);" zindex="2">
                                                                                    <span style="font-weight : normal; font-family:serif;"><?php echo $documents_span[1373]->nodeValue, PHP_EOL ?></span></span></div>
                                                                                    <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 348px;">
                                                                                      <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(51, 51, 51);" zindex="2">
                                                                                        <span style="font-weight : normal; font-family:serif;"><?php echo $documents_span[1375]->nodeValue, PHP_EOL ?></span></span></div>
                                                                                        <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 366px;">
                                                                                          <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 0px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(51, 51, 51);" zindex="2">
                                                                                            <span style="font-weight : normal; font-family:serif;"><?php echo $documents_span[1377]->nodeValue, PHP_EOL ?></span></span></div></div></div></div></div></div>
            <script type="text/javascript">
                    $(document).ready(function() {
                            donut_pie_chart_right({"labels":{"donut":"Valeurs","pie":"Valeurs"},"data":[{"grouplabel":"Valeurs de Vie","groupname":"Valeurs de Vie","groupdata":[{"label":"1. Servir Dieu","score":33},{"label":"2. Intégrité","score":28},{"label":"3. Famille","score":23},{"label":"4. Servir les autres","score":18}]},{"grouplabel":"Environnement de Travail","groupname":"Environnement de Travail","groupdata":[{"label":"1. Harmonie","score":22},{"label":"2. Equité","score":17},{"label":"3. Défi","score":12},{"label":"4. Un environnement propre","score":7}]},{"grouplabel":"Résultats du Travail","groupname":"Résultats du Travail","groupdata":[{"label":"1. Leadership","score":25},{"label":"2. Stimulation intellectuelle","score":20},{"label":"3. Aider les autres","score":15},{"label":"4. Formation continue","score":10}]}],"title":"4 Priorités Intégrées des Valeurs"}, "values_donut_summary");
                    });
            </script>
          </li>
          </ul>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="row mb-4">
  <div class="col-lg-12 card-competences-metier mb-4" id="fondamentales">

    <div class="card mb-12 bg-light-rose custom-card">
      <div class="card-body">
        <h4 class="card-title bg-rose">Valeurs fondamentales de planification de vie</h4>

        <ul class="card-text">
          <ul>
          <li>
            <div class="cdchart rainbow_summary" style="height: 500px;" data-highcharts-chart="52">
              <div class="highcharts-container" id="highcharts-104" style="position: relative; overflow: hidden; width: 938px; height: 498px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: Dosis, sans-serif;">
                <img src="{{ asset('img/svg/chart50.svg') }}">
                <div class="highcharts-legend" style="position: absolute; left: 603px; top: 82px;">
                  <div class="null" style="position: absolute; left: 0px; top: 0px;">
                    <div class="null" style="position: absolute; left: 0px; top: 0px;">
                      <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 3px;">
                        <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 113px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(255, 255, 255);" zindex="2">
                          <div style=" margin-top:10px; margin-bottom:10px; margin-left:-20px; font-weight : bold; font-family:serif; color:" #000"="" !important"=""><?php echo $documents_span[1379]->nodeValue, PHP_EOL ?></div></span></div>
                          <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 40px;">
                            <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 113px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(51, 51, 51);" zindex="2">
                              <span style="font-family:serif;"><?php echo $documents_span[1380]->nodeValue, PHP_EOL ?></span></span></div>
                              <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 58px;">
                                <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 113px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(51, 51, 51);" zindex="2">
                                <span style="font-family:serif;"><?php echo $documents_span[1382]->nodeValue, PHP_EOL ?></span></span></div>
                                <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 76px;">
                                  <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 113px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(51, 51, 51);" zindex="2">
                                    <span style="font-family:serif;"><?php echo $documents_span[1384]->nodeValue, PHP_EOL ?></span></span></div>
                                    <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 94px;">
                                      <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 113px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(51, 51, 51);" zindex="2">
                                        <span style="font-family:serif;"><?php echo $documents_span[1386]->nodeValue, PHP_EOL ?></span></span></div>
                                        <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 112px;">
                                          <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 113px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(51, 51, 51);" zindex="2">
                                            <div style=" margin-top:10px; margin-bottom:10px; margin-left:-20px; font-weight : bold; font-family:serif; color:" #000"="" !important"="">
                                            <?php echo $documents_span[1388]->nodeValue, PHP_EOL ?></div></span></div>
                                            <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 149px;">
                                              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 113px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(51, 51, 51);" zindex="2">
                                                <span style="font-family:serif;"><?php echo $documents_span[1389]->nodeValue, PHP_EOL ?></span></span></div>
                                                <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 167px;">
                                                  <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 113px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(51, 51, 51);" zindex="2">
                                                    <span style="font-family:serif;"><?php echo $documents_span[1391]->nodeValue, PHP_EOL ?></span></span></div>
                                                    <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 185px;">
                                                      <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 113px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(51, 51, 51);" zindex="2">
                                                        <span style="font-family:serif;"><?php echo $documents_span[1393]->nodeValue, PHP_EOL ?></span></span></div>
                                                        <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 203px;">
                                                          <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 113px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(51, 51, 51);" zindex="2">
                                                            <span style="font-family:serif;"><?php echo $documents_span[1395]->nodeValue, PHP_EOL ?></span></span></div>
                                                            <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 221px;">
                                                              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 113px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(51, 51, 51);" zindex="2">
                                                                <div style=" margin-top:10px; margin-bottom:10px; margin-left:-20px; font-weight : bold; font-family:serif; color:" #000"="" !important"="">
                                                                <?php echo $documents_span[1397]->nodeValue, PHP_EOL ?></div></span></div>
                                                                <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 258px;">
                                                                  <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 113px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(51, 51, 51);" zindex="2">
                                                                    <span style="font-family:serif;"><?php echo $documents_span[1398]->nodeValue, PHP_EOL ?></span></span></div>
                                                                    <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 276px;">
                                                                      <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 113px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(51, 51, 51);" zindex="2">
                                                                        <span style="font-family:serif;"><?php echo $documents_span[1400]->nodeValue, PHP_EOL ?></span></span></div>
                                                                        <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 294px;">
                                                                          <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 113px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(51, 51, 51);" zindex="2">
                                                                            <span style="font-family:serif;"><?php echo $documents_span[1402]->nodeValue, PHP_EOL ?></span></span></div>
                                                                            <div class="highcharts-legend-item" style="position: absolute; left: 8px; top: 312px;">
                                                                              <span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 16px; color: rgb(255, 255, 255); font-weight: bold; cursor: pointer; margin-left: 113px; margin-top: 0px; left: 21px; top: 2px; fill: rgb(51, 51, 51);" zindex="2">
                                                                                <span style="font-family:serif;"><?php echo $documents_span[1404]->nodeValue, PHP_EOL ?></span></span></div></div></div></div></div></div>
            <script type="text/javascript">
                    $(document).ready(function() {
                            combined_values_rainbow({"labels":{"donut":"Valeurs","pie":"Valeurs"},"data":[{"grouplabel":"Valeurs de Vie","groupname":"Valeurs de Vie","groupdata":[{"label":"1. Servir Dieu","score":25},{"label":"2. Intégrité","score":20},{"label":"3. Famille","score":15},{"label":"4. Servir les autres","score":10}]},{"grouplabel":"Résultats du Travail","groupname":"Résultats du Travail","groupdata":[{"label":"1. Leadership","score":25},{"label":"2. Stimulation intellectuelle","score":20},{"label":"3. Aider les autres","score":15},{"label":"4. Formation continue","score":10}]},{"grouplabel":"Environnement de Travail","groupname":"Environnement de Travail","groupdata":[{"label":"1. Harmonie","score":25},{"label":"2. Equité","score":20},{"label":"3. Défi","score":15},{"label":"4. Un environnement propre","score":10}]}],"title":"Valeurs fondamentales de planification de vie","showScores":false,"startAngle":300}, "rainbow_summary");
                    });
            </script>
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
