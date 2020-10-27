{{-- Careerdirect --}}
@extends('layouts.master') @section('title', 'Fiche Careerdirect')

@section('main_title')
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <h4 class="text-uppercase">
        @if (Auth::user() && Auth::user()->id == $user->id)
          SCORES COMBINES
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
  <p><?php echo $documents[80]->nodeValue, PHP_EOL ?></p>
</div>
<div class="row mb-4">
  <div class="col-lg-12 card-competences-metier mb-4">

    <div class="card mb-12 bg-light-vert custom-card">
      <div class="card-body">
        <h4 class="card-title bg-vert cdreport-header cdreport-header-alt">Groupes d'Activités</h4>

        <ul class="card-text">
          <ul>
          <li>
            <div class="cdchart all_activity" data-highcharts-chart="24">
              <div class="highcharts-container" id="highcharts-48" style="position: relative; overflow: hidden; width: 938px; height: 1224px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: Dosis, sans-serif;">
                <img src="{{ asset('img/svg/chart22.svg') }}">
                <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                  <?php
                  echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 49.2083px;" transform="translate(0,0)" opacity="1">'.$documents_span[658]->nodeValue, PHP_EOL.'</span>';
                  echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 81.625px;" transform="translate(0,0)" opacity="1">'.$documents_span[659]->nodeValue, PHP_EOL.'</span>';

                  echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 114.042px;" transform="translate(0,0)" opacity="1">'.$documents_span[660]->nodeValue, PHP_EOL.'</span>';
                    echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 146.458px;" transform="translate(0,0)" opacity="1">'.$documents_span[661]->nodeValue, PHP_EOL.'</span>';
                      echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 178.875px;" transform="translate(0,0)" opacity="1">'.$documents_span[662]->nodeValue, PHP_EOL.'</span>';
                        echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 211.292px;" transform="translate(0,0)" opacity="1">'.$documents_span[663]->nodeValue, PHP_EOL.'</span>';
                          echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 243.708px;" transform="translate(0,0)" opacity="1">'.$documents_span[664]->nodeValue, PHP_EOL.'</span>';
                            echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 276.125px;" transform="translate(0,0)" opacity="1">'.$documents_span[665]->nodeValue, PHP_EOL.'</span>';
                              echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 308.542px;" transform="translate(0,0)" opacity="1">'.$documents_span[666]->nodeValue, PHP_EOL.'</span>';
                                echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 340.958px;" transform="translate(0,0)" opacity="1">'.$documents_span[667]->nodeValue, PHP_EOL.'</span>';
                                  echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 373.375px;" transform="translate(0,0)" opacity="1">'.$documents_span[668]->nodeValue, PHP_EOL.'</span>';
                                    echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 405.792px;" transform="translate(0,0)" opacity="1">'.$documents_span[669]->nodeValue, PHP_EOL.'</span>';
                                      echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 438.208px;" transform="translate(0,0)" opacity="1">'.$documents_span[670]->nodeValue, PHP_EOL.'</span>';
                                        echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 470.625px;" transform="translate(0,0)" opacity="1">'.$documents_span[671]->nodeValue, PHP_EOL.'</span>';
                                          echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 503.042px;" transform="translate(0,0)" opacity="1">'.$documents_span[672]->nodeValue, PHP_EOL.'</span>';
                                            echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 535.458px;" transform="translate(0,0)" opacity="1">'.$documents_span[673]->nodeValue, PHP_EOL.'</span>';
                                              echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 567.875px;" transform="translate(0,0)" opacity="1">'.$documents_span[674]->nodeValue, PHP_EOL.'</span>';
                                                echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 600.292px;" transform="translate(0,0)" opacity="1">'.$documents_span[675]->nodeValue, PHP_EOL.'</span>';
                                                  echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 632.708px;" transform="translate(0,0)" opacity="1">'.$documents_span[676]->nodeValue, PHP_EOL.'</span>';
                                                    echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 665.125px;" transform="translate(0,0)" opacity="1">'.$documents_span[677]->nodeValue, PHP_EOL.'</span>';
                                                      echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 697.542px;" transform="translate(0,0)" opacity="1">'.$documents_span[678]->nodeValue, PHP_EOL.'</span>';
                                                        echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 729.958px;" transform="translate(0,0)" opacity="1">'.$documents_span[679]->nodeValue, PHP_EOL.'</span>';
                                                          echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 762.375px;" transform="translate(0,0)" opacity="1">'.$documents_span[680]->nodeValue, PHP_EOL.'</span>';
                                                            echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 794.792px;" transform="translate(0,0)" opacity="1">'.$documents_span[681]->nodeValue, PHP_EOL.'</span>';
                                                              echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 827.208px;" transform="translate(0,0)" opacity="1">'.$documents_span[682]->nodeValue, PHP_EOL.'</span>';
                                                                echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 859.625px;" transform="translate(0,0)" opacity="1">'.$documents_span[683]->nodeValue, PHP_EOL.'</span>';
                                                                  echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 892.042px;" transform="translate(0,0)" opacity="1">'.$documents_span[684]->nodeValue, PHP_EOL.'</span>';
                                                                    echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 924.458px;" transform="translate(0,0)" opacity="1">'.$documents_span[685]->nodeValue, PHP_EOL.'</span>';
                                                                    echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 956.875px;" transform="translate(0,0)" opacity="1">'.$documents_span[686]->nodeValue, PHP_EOL.'</span>';
                                                                      echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 989.292px;" transform="translate(0,0)" opacity="1">'.$documents_span[687]->nodeValue, PHP_EOL.'</span>';
                                                                        echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 1021.71px;" transform="translate(0,0)" opacity="1">'.$documents_span[688]->nodeValue, PHP_EOL.'</span>';
                                                                          echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 1054.13px;" transform="translate(0,0)" opacity="1">'.$documents_span[689]->nodeValue, PHP_EOL.'</span>';
                                                                            echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 1086.54px;" transform="translate(0,0)" opacity="1">'.$documents_span[690]->nodeValue, PHP_EOL.'</span>';
                                                                            echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 1118.96px;" transform="translate(0,0)" opacity="1">'.$documents_span[691]->nodeValue, PHP_EOL.'</span>';
                                                                            echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 1151.38px;" transform="translate(0,0)" opacity="1">'.$documents_span[692]->nodeValue, PHP_EOL.'</span>';
                                                                            echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 1183.79px;" transform="translate(0,0)" opacity="1">'.$documents_span[693]->nodeValue, PHP_EOL.'</span>';
                                                                    ?>
                  </div>
                                <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                  <?php
                                  echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 50.2083px;" transform="translate(0,0)" opacity="1">'.$documents_span[694]->nodeValue, PHP_EOL.'</span>';
                                  echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 81.625px;" transform="translate(0,0)" opacity="1">'.$documents_span[695]->nodeValue, PHP_EOL.'</span>';

                                  echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; left: 628px; top: 114.042px;" transform="translate(0,0)" opacity="1">'.$documents_span[696]->nodeValue, PHP_EOL.'</span>';
                                    echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; left: 628px; top: 146.458px;" transform="translate(0,0)" opacity="1">'.$documents_span[697]->nodeValue, PHP_EOL.'</span>';
                                      echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; left: 628px; top: 178.875px;" transform="translate(0,0)" opacity="1">'.$documents_span[698]->nodeValue, PHP_EOL.'</span>';
                                        echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; left: 628px; top: 211.292px;" transform="translate(0,0)" opacity="1">'.$documents_span[699]->nodeValue, PHP_EOL.'</span>';
                                          echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; left: 628px; top: 243.708px;" transform="translate(0,0)" opacity="1">'.$documents_span[700]->nodeValue, PHP_EOL.'</span>';
                                            echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; left: 628px; top: 276.125px;" transform="translate(0,0)" opacity="1">'.$documents_span[701]->nodeValue, PHP_EOL.'</span>';
                                              echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; left: 628px; top: 308.542px;" transform="translate(0,0)" opacity="1">'.$documents_span[702]->nodeValue, PHP_EOL.'</span>';
                                                echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; left: 628px; top: 340.958px;" transform="translate(0,0)" opacity="1">'.$documents_span[703]->nodeValue, PHP_EOL.'</span>';
                                                  echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; left: 628px; top: 373.375px;" transform="translate(0,0)" opacity="1">'.$documents_span[704]->nodeValue, PHP_EOL.'</span>';
                                                    echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; left: 628px; top: 405.792px;" transform="translate(0,0)" opacity="1">'.$documents_span[705]->nodeValue, PHP_EOL.'</span>';
                                                      echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; left: 628px; top: 438.208px;" transform="translate(0,0)" opacity="1">'.$documents_span[706]->nodeValue, PHP_EOL.'</span>';
                                                        echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; left: 628px; top: 470.625px;" transform="translate(0,0)" opacity="1">'.$documents_span[707]->nodeValue, PHP_EOL.'</span>';
                                                          echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; left: 628px; top: 503.042px;" transform="translate(0,0)" opacity="1">'.$documents_span[708]->nodeValue, PHP_EOL.'</span>';
                                                            echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; left: 628px; top: 535.458px;" transform="translate(0,0)" opacity="1">'.$documents_span[709]->nodeValue, PHP_EOL.'</span>';
                                                              echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; left: 628px; top: 567.875px;" transform="translate(0,0)" opacity="1">'.$documents_span[710]->nodeValue, PHP_EOL.'</span>';
                                                                echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; left: 628px; top: 600.292px;" transform="translate(0,0)" opacity="1">'.$documents_span[711]->nodeValue, PHP_EOL.'</span>';
                                                                  echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; left: 628px; top: 632.708px;" transform="translate(0,0)" opacity="1">'.$documents_span[712]->nodeValue, PHP_EOL.'</span>';
                                                                    echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; left: 628px; top: 665.125px;" transform="translate(0,0)" opacity="1">'.$documents_span[713]->nodeValue, PHP_EOL.'</span>';
                                                                      echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; left: 628px; top: 697.542px;" transform="translate(0,0)" opacity="1">'.$documents_span[714]->nodeValue, PHP_EOL.'</span>';
                                                                        echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; left: 628px; top: 729.958px;" transform="translate(0,0)" opacity="1">'.$documents_span[715]->nodeValue, PHP_EOL.'</span>';
                                                                          echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; left: 628px; top: 762.375px;" transform="translate(0,0)" opacity="1">'.$documents_span[716]->nodeValue, PHP_EOL.'</span>';
                                                                            echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; left: 628px; top: 794.792px;" transform="translate(0,0)" opacity="1">'.$documents_span[717]->nodeValue, PHP_EOL.'</span>';
                                                                              echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; left: 628px; top: 827.208px;" transform="translate(0,0)" opacity="1">'.$documents_span[718]->nodeValue, PHP_EOL.'</span>';
                                                                                echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; left: 628px; top: 859.625px;" transform="translate(0,0)" opacity="1">'.$documents_span[719]->nodeValue, PHP_EOL.'</span>';
                                                                                  echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; left: 628px; top: 892.042px;" transform="translate(0,0)" opacity="1">'.$documents_span[720]->nodeValue, PHP_EOL.'</span>';
                                                                                    echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; left: 628px; top: 924.458px;" transform="translate(0,0)" opacity="1">'.$documents_span[721]->nodeValue, PHP_EOL.'</span>';
                                                                                    echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; left: 628px; top: 956.875px;" transform="translate(0,0)" opacity="1">'.$documents_span[722]->nodeValue, PHP_EOL.'</span>';
                                                                                      echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; left: 628px; top: 989.292px;" transform="translate(0,0)" opacity="1">'.$documents_span[723]->nodeValue, PHP_EOL.'</span>';
                                                                                        echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; left: 628px; top: 1021.71px;" transform="translate(0,0)" opacity="1">'.$documents_span[724]->nodeValue, PHP_EOL.'</span>';
                                                                                          echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; left: 628px; top: 1054.13px;" transform="translate(0,0)" opacity="1">'.$documents_span[725]->nodeValue, PHP_EOL.'</span>';
                                                                                            echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; left: 628px; top: 1086.54px;" transform="translate(0,0)" opacity="1">'.$documents_span[726]->nodeValue, PHP_EOL.'</span>';
                                                                                            echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; left: 628px; top: 1118.96px;" transform="translate(0,0)" opacity="1">'.$documents_span[727]->nodeValue, PHP_EOL.'</span>';
                                                                                            echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; left: 628px; top: 1151.38px;" transform="translate(0,0)" opacity="1">'.$documents_span[728]->nodeValue, PHP_EOL.'</span>';
                                                                                            echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; width: 290px; left: 628px; top: 1183.79px;" transform="translate(0,0)" opacity="1">'.$documents_span[729]->nodeValue, PHP_EOL.'</span>';
                                  ?></div>
                                    <div class="highcharts-axis-labels highcharts-yaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                      <?php
                                      echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 321px; top: 13px;" opacity="1">'.$documents_span[730]->nodeValue, PHP_EOL.'</span>';
                                      echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 460.5px; top: 13px;" opacity="1">'.$documents_span[731]->nodeValue, PHP_EOL.'</span>';
                                      echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 600.5px; top: 13px;" opacity="1">'.$documents_span[732]->nodeValue, PHP_EOL.'</span>';
                                      ?>
                                    </div></div></div>
            <script type="text/javascript">
              $(document).ready(function() {
                bar_chart({"labels":{"left":["1. Conseil","2. Auto-entrepreneur","3. Religieux","4. Communication de vente","5. Enseignement","6. Communication aux foules","7. Communication politique","8. Gestion","9. Recherche scientifique","10. Maths","11. International","12. Communication écrite","13. Administratif","14. Musical","15. Electronique/Machines","16. Divertissement","17. Service à la clientèle","18. Artistique","19. Sportif/ve","20. Finance","21. Recherche en Sciences Naturelles","22. Sécurité","23. Aménagement paysager","24. Alimentation","25. Apporter des soins médicaux","26. Transport","27. Travaux manuels","28. Activités à risque","29. Usine/Assemblage","30. Génie civil","31. Hôtellerie/Restauration","32. Animaux","33. Service de santé/soin","34. Recherche médicale","35. Coiffure stylisme","36. Agriculture"],"right":["(100)","(100)","(100)","(80)","(80)","(72)","(70)","(68)","(68)","(67)","(60)","(53)","(50)","(40)","(35)","(32)","(25)","(18)","(15)","(10)","(7)","(0)","(0)","(0)","(0)","(0)","(0)","(0)","(0)","(0)","(0)","(0)","(0)","(0)","(0)","(0)"]},"data":[{"label":"Conseil","score":100},{"label":"Auto-entrepreneur","score":100},{"label":"Religieux","score":100},{"label":"Communication de vente","score":80},{"label":"Enseignement","score":80},{"label":"Communication aux foules","score":72},{"label":"Communication politique","score":70},{"label":"Gestion","score":68},{"label":"Recherche scientifique","score":68},{"label":"Maths","score":67},{"label":"International","score":60},{"label":"Communication écrite","score":53},{"label":"Administratif","score":50},{"label":"Musical","score":40},{"label":"Electronique/Machines","score":35},{"label":"Divertissement","score":32},{"label":"Service à la clientèle","score":25},{"label":"Artistique","score":18},{"label":"Sportif/ve","score":15},{"label":"Finance","score":10},{"label":"Recherche en Sciences Naturelles","score":7},{"label":"Sécurité","score":0},{"label":"Aménagement paysager","score":0},{"label":"Alimentation","score":0},{"label":"Apporter des soins médicaux","score":0},{"label":"Transport","score":0},{"label":"Travaux manuels","score":0},{"label":"Activités à risque","score":0},{"label":"Usine/Assemblage","score":0},{"label":"Génie civil","score":0},{"label":"Hôtellerie/Restauration","score":0},{"label":"Animaux","score":0},{"label":"Service de santé/soin","score":0},{"label":"Recherche médicale","score":0},{"label":"Coiffure stylisme","score":0},{"label":"Agriculture","score":0}],"title":"Groupes d'Activités","height":1224}, "all_activity", "right");
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
  <div class="col-lg-12 card-competences-metier mb-4">

    <div class="card mb-12 bg-light-rose custom-card">
      <div class="card-body">
        <h4 class="card-title bg-rose cdreport-header cdreport-header-alt">Groupes de Professions</h4>

        <ul class="card-text">
          <ul>
          <li>
            <div class="cdchart all_occupations" data-highcharts-chart="25">
              <div class="highcharts-container" id="highcharts-50" style="position: relative; overflow: hidden; width: 938px; height: 704px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: Dosis, sans-serif;">
                <img src="{{ asset('img/svg/chart23.svg') }}">
                <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                  <?php
                  echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 47.7045px;" transform="translate(0,0)" opacity="1">'.$documents_span[733]->nodeValue, PHP_EOL.'</span>';
                  echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 77.1136px;" transform="translate(0,0)" opacity="1">'.$documents_span[734]->nodeValue, PHP_EOL.'</span>';

                  echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 106.523px;" transform="translate(0,0)" opacity="1">'.$documents_span[735]->nodeValue, PHP_EOL.'</span>';
                    echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 135.932px;" transform="translate(0,0)" opacity="1">'.$documents_span[736]->nodeValue, PHP_EOL.'</span>';
                      echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 165.341px;" transform="translate(0,0)" opacity="1">'.$documents_span[737]->nodeValue, PHP_EOL.'</span>';
                        echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 194.75px;" transform="translate(0,0)" opacity="1">'.$documents_span[738]->nodeValue, PHP_EOL.'</span>';
                          echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 224.159px;" transform="translate(0,0)" opacity="1">'.$documents_span[739]->nodeValue, PHP_EOL.'</span>';
                            echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 253.568px;" transform="translate(0,0)" opacity="1">'.$documents_span[740]->nodeValue, PHP_EOL.'</span>';
                              echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 282.977px;" transform="translate(0,0)" opacity="1">'.$documents_span[741]->nodeValue, PHP_EOL.'</span>';
                                echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 312.958px;" transform="translate(0,0)" opacity="1">'.$documents_span[742]->nodeValue, PHP_EOL.'</span>';
                                  echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 342.375px;" transform="translate(0,0)" opacity="1">'.$documents_span[743]->nodeValue, PHP_EOL.'</span>';
                                    echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 372.792px;" transform="translate(0,0)" opacity="1">'.$documents_span[744]->nodeValue, PHP_EOL.'</span>';
                                      echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 402.208px;" transform="translate(0,0)" opacity="1">'.$documents_span[745]->nodeValue, PHP_EOL.'</span>';
                                        echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 432.625px;" transform="translate(0,0)" opacity="1">'.$documents_span[746]->nodeValue, PHP_EOL.'</span>';
                                          echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 462.042px;" transform="translate(0,0)" opacity="1">'.$documents_span[747]->nodeValue, PHP_EOL.'</span>';
                                            echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 492.458px;" transform="translate(0,0)" opacity="1">'.$documents_span[748]->nodeValue, PHP_EOL.'</span>';
                                              echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 522.875px;" transform="translate(0,0)" opacity="1">'.$documents_span[749]->nodeValue, PHP_EOL.'</span>';
                                                echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 552.292px;" transform="translate(0,0)" opacity="1">'.$documents_span[750]->nodeValue, PHP_EOL.'</span>';
                                                  echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 582.708px;" transform="translate(0,0)" opacity="1">'.$documents_span[751]->nodeValue, PHP_EOL.'</span>';
                                                    echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 612.125px;" transform="translate(0,0)" opacity="1">'.$documents_span[752]->nodeValue, PHP_EOL.'</span>';
                                                      echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 642.542px;" transform="translate(0,0)" opacity="1">'.$documents_span[753]->nodeValue, PHP_EOL.'</span>';
                                                        echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 672.958px;" transform="translate(0,0)" opacity="1">'.$documents_span[754]->nodeValue, PHP_EOL.'</span>';
                                                          ?>
                  </div>
                                <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                  <?php
                                  echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 48.7045px;" transform="translate(0,0)" opacity="1">'.$documents_span[755]->nodeValue, PHP_EOL.'</span>';
                                  echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 78.1136px;" transform="translate(0,0)" opacity="1">'.$documents_span[756]->nodeValue, PHP_EOL.'</span>';
                                  echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 107.523px;" transform="translate(0,0)" opacity="1">'.$documents_span[757]->nodeValue, PHP_EOL.'</span>';
                                    echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 136.932px;" transform="translate(0,0)" opacity="1">'.$documents_span[758]->nodeValue, PHP_EOL.'</span>';
                                      echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 166.341px;" transform="translate(0,0)" opacity="1">'.$documents_span[759]->nodeValue, PHP_EOL.'</span>';
                                        echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 195.75px;" transform="translate(0,0)" opacity="1">'.$documents_span[760]->nodeValue, PHP_EOL.'</span>';
                                          echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 225.159px;" transform="translate(0,0)" opacity="1">'.$documents_span[761]->nodeValue, PHP_EOL.'</span>';

                                            echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 254.568px;" transform="translate(0,0)" opacity="1">'.$documents_span[762]->nodeValue, PHP_EOL.'</span>';
                                              echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 283.977px;" transform="translate(0,0)" opacity="1">'.$documents_span[763]->nodeValue, PHP_EOL.'</span>';

                                              echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 313.386px;" transform="translate(0,0)" opacity="1">'.$documents_span[764]->nodeValue, PHP_EOL.'</span>';
                                                echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 342.795px;" transform="translate(0,0)" opacity="1">'.$documents_span[765]->nodeValue, PHP_EOL.'</span>';
                                                  echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 372.205px;" transform="translate(0,0)" opacity="1">'.$documents_span[766]->nodeValue, PHP_EOL.'</span>';
                                                    echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 401.614px;" transform="translate(0,0)" opacity="1">'.$documents_span[767]->nodeValue, PHP_EOL.'</span>';
                                                      echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 431.023px;" transform="translate(0,0)" opacity="1">'.$documents_span[768]->nodeValue, PHP_EOL.'</span>';
                                                        echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 460.432px;" transform="translate(0,0)" opacity="1">'.$documents_span[769]->nodeValue, PHP_EOL.'</span>';
                                                          echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 489.841px;" transform="translate(0,0)" opacity="1">'.$documents_span[770]->nodeValue, PHP_EOL.'</span>';
                                                            echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 519.25px;" transform="translate(0,0)" opacity="1">'.$documents_span[771]->nodeValue, PHP_EOL.'</span>';
                                                              echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 548.659px;" transform="translate(0,0)" opacity="1">'.$documents_span[772]->nodeValue, PHP_EOL.'</span>';
                                                                echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 578.068px;" transform="translate(0,0)" opacity="1">'.$documents_span[773]->nodeValue, PHP_EOL.'</span>';
                                                                  echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 607.477px;" transform="translate(0,0)" opacity="1">'.$documents_span[774]->nodeValue, PHP_EOL.'</span>';
                                                                    echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 636.886px;" transform="translate(0,0)" opacity="1">'.$documents_span[775]->nodeValue, PHP_EOL.'</span>';
                                                                      echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 666.886px;" transform="translate(0,0)" opacity="1">'.$documents_span[776]->nodeValue, PHP_EOL.'</span>';
                                                                          ?></div>
                                    <div class="highcharts-axis-labels highcharts-yaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                      <?php
                                      echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 321px; top: 13px;" opacity="1">'.$documents_span[777]->nodeValue, PHP_EOL.'</span>';
                                      echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 460.5px; top: 13px;" opacity="1">'.$documents_span[778]->nodeValue, PHP_EOL.'</span>';
                                      echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 600.5px; top: 13px;" opacity="1">'.$documents_span[779]->nodeValue, PHP_EOL.'</span>';
                                      ?>
                                    </div></div></div>
            <script type="text/javascript">
              $(document).ready(function() {
                bar_chart({"labels":{"left":["1. Chefs d'entreprise","2. Enseignement","3. Conseil","4. Législation/Politique","5. Langues","6. Journalistes/Ecrivains","7. Artistes (performance publique)","8. Finance/Mathématiques","9. Gestion/Vente","10. Artiste","11. Technicien qualifié","12. Science","13. Service à la clientèle","14. Economie familiale","15. Sécurité","16. Mode","17. Aventure","18. Professionnel travaillant en extérieur","19. Sportif/ve","20. M&eacute;dical","21. Animaux","22. Chauffeurs"],"right":["(100)","(92)","(83)","(75)","(63)","(55)","(47)","(47)","(43)","(35)","(28)","(25)","(22)","(10)","(10)","(7)","(5)","(5)","(0)","(0)","(0)","(0)"]},"data":[{"label":"Chefs d'entreprise","score":100},{"label":"Enseignement","score":92},{"label":"Conseil","score":83},{"label":"Législation/Politique","score":75},{"label":"Langues","score":63},{"label":"Journalistes/Ecrivains","score":55},{"label":"Artistes (performance publique)","score":47},{"label":"Finance/Mathématiques","score":47},{"label":"Gestion/Vente","score":43},{"label":"Artiste","score":35},{"label":"Technicien qualifié","score":28},{"label":"Science","score":25},{"label":"Service à la clientèle","score":22},{"label":"Economie familiale","score":10},{"label":"Sécurité","score":10},{"label":"Mode","score":7},{"label":"Aventure","score":5},{"label":"Professionnel travaillant en extérieur","score":5},{"label":"Sportif/ve","score":0},{"label":"M&eacute;dical","score":0},{"label":"Animaux","score":0},{"label":"Chauffeurs","score":0}],"title":"Groupes de Professions","height":704}, "all_occupations", "right");
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
  <div class="col-lg-12 card-competences-metier mb-4">

    <div class="card mb-12 bg-light-vert custom-card">
      <div class="card-body">
        <h4 class="card-title bg-vert cdreport-header cdreport-header-alt">Groupes de Sujets</h4>

        <ul class="card-text">
          <ul>
          <li>
            <div class="cdchart all_subject" data-highcharts-chart="26">
              <div class="highcharts-container" id="highcharts-52" style="position: relative; overflow: hidden; width: 938px; height: 576px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: Dosis, sans-serif;">
                <img src="{{ asset('img/svg/chart24.svg') }}">
                <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                  <?php
                  echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 47.7045px;" transform="translate(0,0)" opacity="1">'.$documents_span[780]->nodeValue, PHP_EOL.'</span>';
                  echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 77.1136px;" transform="translate(0,0)" opacity="1">'.$documents_span[781]->nodeValue, PHP_EOL.'</span>';

                  echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 106.523px;" transform="translate(0,0)" opacity="1">'.$documents_span[782]->nodeValue, PHP_EOL.'</span>';
                    echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 135.232px;" transform="translate(0,0)" opacity="1">'.$documents_span[783]->nodeValue, PHP_EOL.'</span>';
                      echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 165.041px;" transform="translate(0,0)" opacity="1">'.$documents_span[784]->nodeValue, PHP_EOL.'</span>';
                        echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 194.25px;" transform="translate(0,0)" opacity="1">'.$documents_span[785]->nodeValue, PHP_EOL.'</span>';
                          echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 224.159px;" transform="translate(0,0)" opacity="1">'.$documents_span[786]->nodeValue, PHP_EOL.'</span>';
                            echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 253.268px;" transform="translate(0,0)" opacity="1">'.$documents_span[787]->nodeValue, PHP_EOL.'</span>';
                              echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 282.277px;" transform="translate(0,0)" opacity="1">'.$documents_span[788]->nodeValue, PHP_EOL.'</span>';
                                echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 312.258px;" transform="translate(0,0)" opacity="1">'.$documents_span[789]->nodeValue, PHP_EOL.'</span>';
                                  echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 338.075px;" transform="translate(0,0)" opacity="1">'.$documents_span[790]->nodeValue, PHP_EOL.'</span>';
                                    echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 362.292px;" transform="translate(0,0)" opacity="1">'.$documents_span[791]->nodeValue, PHP_EOL.'</span>';
                                      echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 390.008px;" transform="translate(0,0)" opacity="1">'.$documents_span[792]->nodeValue, PHP_EOL.'</span>';
                                        echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 420.825px;" transform="translate(0,0)" opacity="1">'.$documents_span[793]->nodeValue, PHP_EOL.'</span>';
                                          echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 450.742px;" transform="translate(0,0)" opacity="1">'.$documents_span[794]->nodeValue, PHP_EOL.'</span>';
                                            echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 477.058px;" transform="translate(0,0)" opacity="1">'.$documents_span[795]->nodeValue, PHP_EOL.'</span>';
                                              echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 507.275px;" transform="translate(0,0)" opacity="1">'.$documents_span[796]->nodeValue, PHP_EOL.'</span>';
                                                echo '<span style="position: absolute; white-space: normal; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; text-align: right; margin-left: 0px; margin-top: 0px; width: 290px; display: block; left: 20px; top: 537.792px;" transform="translate(0,0)" opacity="1">'.$documents_span[797]->nodeValue, PHP_EOL.'</span>';
                                                  ?>
                  </div>
                                <div class="highcharts-axis-labels highcharts-xaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                  <?php
                                  echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 48.7045px;" transform="translate(0,0)" opacity="1">'.$documents_span[798]->nodeValue, PHP_EOL.'</span>';
                                  echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 78.1136px;" transform="translate(0,0)" opacity="1">'.$documents_span[799]->nodeValue, PHP_EOL.'</span>';
                                  echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 107.523px;" transform="translate(0,0)" opacity="1">'.$documents_span[800]->nodeValue, PHP_EOL.'</span>';
                                    echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 136.932px;" transform="translate(0,0)" opacity="1">'.$documents_span[801]->nodeValue, PHP_EOL.'</span>';
                                      echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 166.341px;" transform="translate(0,0)" opacity="1">'.$documents_span[802]->nodeValue, PHP_EOL.'</span>';
                                        echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 195.75px;" transform="translate(0,0)" opacity="1">'.$documents_span[803]->nodeValue, PHP_EOL.'</span>';
                                          echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 225.159px;" transform="translate(0,0)" opacity="1">'.$documents_span[804]->nodeValue, PHP_EOL.'</span>';

                                            echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 244.568px;" transform="translate(0,0)" opacity="1">'.$documents_span[805]->nodeValue, PHP_EOL.'</span>';
                                              echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 273.977px;" transform="translate(0,0)" opacity="1">'.$documents_span[806]->nodeValue, PHP_EOL.'</span>';

                                              echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 303.386px;" transform="translate(0,0)" opacity="1">'.$documents_span[807]->nodeValue, PHP_EOL.'</span>';
                                                echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 332.795px;" transform="translate(0,0)" opacity="1">'.$documents_span[808]->nodeValue, PHP_EOL.'</span>';
                                                  echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 362.205px;" transform="translate(0,0)" opacity="1">'.$documents_span[809]->nodeValue, PHP_EOL.'</span>';
                                                    echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 390.614px;" transform="translate(0,0)" opacity="1">'.$documents_span[810]->nodeValue, PHP_EOL.'</span>';
                                                      echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 420.023px;" transform="translate(0,0)" opacity="1">'.$documents_span[811]->nodeValue, PHP_EOL.'</span>';
                                                        echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 449.432px;" transform="translate(0,0)" opacity="1">'.$documents_span[812]->nodeValue, PHP_EOL.'</span>';
                                                          echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 479.841px;" transform="translate(0,0)" opacity="1">'.$documents_span[813]->nodeValue, PHP_EOL.'</span>';
                                                            echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 509.25px;" transform="translate(0,0)" opacity="1">'.$documents_span[814]->nodeValue, PHP_EOL.'</span>';
                                                              echo '<span style="position: absolute; white-space: nowrap; font-family: serif; font-size: 16px; color: rgb(255, 255, 255); cursor: default; min-width: 300px; margin-left: 0px; margin-top: 0px; left: 628px; top: 538.659px;" transform="translate(0,0)" opacity="1">'.$documents_span[815]->nodeValue, PHP_EOL.'</span>';
                                                                ?></div>
                                    <div class="highcharts-axis-labels highcharts-yaxis-labels" style="position: absolute; left: 0px; top: 0px;">
                                      <?php
                                      echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 321px; top: 13px;" opacity="1">'.$documents_span[816]->nodeValue, PHP_EOL.'</span>';
                                      echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 460.5px; top: 13px;" opacity="1">'.$documents_span[817]->nodeValue, PHP_EOL.'</span>';
                                      echo '<span style="position: absolute; white-space: nowrap; font-family: Dosis, sans-serif; font-size: 14px; color: rgb(255, 255, 255); cursor: default; margin-left: 0px; margin-top: 0px; left: 600.5px; top: 13px;" opacity="1">'.$documents_span[818]->nodeValue, PHP_EOL.'</span>';
                                      ?>
                                    </div></div></div>
            <script type="text/javascript">
              $(document).ready(function() {
                bar_chart({"labels":{"left":["1. Mathématiques","2. Religion","3. Etudes technologiques","4. Performance publique","5. Musique","6. Enseignement","7. Etudes sociales","8. Science","9. Français","10. Langue étrangère","11. Atelier","12. Affaires/Gestion","13. Administratif","14. Art","15. Finance","16. Educ. physique et sportive","17. Economie domestique/ménagère","18. Agriculture"],"right":["(100)","(100)","(100)","(100)","(75)","(75)","(75)","(75)","(75)","(50)","(50)","(50)","(50)","(25)","(25)","(25)","(0)","(0)"]},"data":[{"label":"Mathématiques","score":100},{"label":"Religion","score":100},{"label":"Etudes technologiques","score":100},{"label":"Performance publique","score":100},{"label":"Musique","score":75},{"label":"Enseignement","score":75},{"label":"Etudes sociales","score":75},{"label":"Science","score":75},{"label":"Français","score":75},{"label":"Langue étrangère","score":50},{"label":"Atelier","score":50},{"label":"Affaires/Gestion","score":50},{"label":"Administratif","score":50},{"label":"Art","score":25},{"label":"Finance","score":25},{"label":"Educ. physique et sportive","score":25},{"label":"Economie domestique/ménagère","score":0},{"label":"Agriculture","score":0}],"title":"Groupes de Sujets","height":576}, "all_subject", "right");
              });
            </script>
          </li>
          </ul>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- <div class="row">
      <div class="card-body card-competences-metier" id="scroll-perso">
                        <a name="CombinedScores"></a><h4 class="cdreport-header">Scores combinés</h4>
<a name="Cinq"></a> -->



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
