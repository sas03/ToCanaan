@extends('layouts.master_network') @section('title', 'Réseau social')

@section('content')

@include('social_network.layouts.header')

<div class="row">


  {{---------------------------------- MENU ----------------------------------}}

  <div class="col-lg-3 side-menu">
    @include('social_network.layouts.navbar_left')
  </div>



  {{--------------------------------- RESUME ---------------------------------}}
  <div class="col-lg-7">

    {{----------------------- EXPERIENCES PROFESSIONNELLES -----------------------}}

      <div class="row">

        <div class="col-lg-12">

          <div class="card mb-4 bg-light-violet custom-card resume-card">
            <div class="card-body">
              <h4 class="card-title bg-vert">
                Experiences professionnelles
              </h4>

              <div class="card-text">
                @if (isset($experiences) && count($experiences) > 0)
                  @foreach ($experiences as $experience)

                    <div class="resume-data">
                      <div class="resume-logo">
                        <img src="{{ asset('img/experience_default.png') }}" alt="Logo {{ $experience->etablissement_nom }}">
                      </div>

                      <p><strong class="resume-nom text-uppercase">{{ $experience->nom }}</strong></p>
                      <p class="resume-etablissement text-uppercase">{{ $experience->etablissement_nom }}</p>
                      <p class="resume-ville"><em>{{ $experience->ville }} - FRANCE</em></p>
                      <p class="resume-date" date-debut="{{ $experience->date_debut }}" date-fin="{{ $experience->date_fin }}">
                        {{ date("M Y", strtotime($experience->date_debut)) }} -
                        @if ($experience->poste_actuel == 'oui')
                          Aujourd'hui
                        @else
                          {{ date("M Y", strtotime($experience->date_fin)) }}
                        @endif
                      </p>

                      <p class="resume-description"><?php echo nl2br("$experience->description"); ?></p>
                    </div>

                    @if (!$loop->last)
                      <hr class="bg-vert">
                    @endif

                  @endforeach

                @else
                  <p class="card-prive"><i class="icon ion-locked"></i> Privé</p>
                @endif
                {{-- Fin du if($experiences) --}}
              </div>

            </div>
          </div>

        </div>

      </div>


    {{-------------------------------- FORMATIONS --------------------------------}}

    <div class="row">

      <div class="col-lg-12">

        <div class="card mb-4 bg-light-violet custom-card resume-card">
          <div class="card-body">
            <h4 class="card-title bg-rose">
              Formations
            </h4>

            <div class="card-text">
            @if (isset($formations) && count($formations) > 0)
              @foreach ($formations as $formation)
                <div class="resume-data">
                  <div class="resume-logo">
                    <img src="{{ asset('img/formation_default.png') }}" alt="Logo {{ $formation->etablissement_nom }}">
                  </div>

                  <p><strong class="resume-etablissement text-uppercase">{{ $formation->etablissement_nom }}</strong></p>
                  <p class="resume-nom">{{ $formation->nom }}</p>
                  <p class="resume-date" date-debut="{{ $formation->date_debut }}" date-fin="{{ $formation->date_fin }}">
                    {{ date("M Y", strtotime($formation->date_debut)) }} - {{ date("M Y", strtotime($formation->date_fin)) }}
                  </p>
                  <p class="resume-description"><?php echo nl2br("$formation->description"); ?></p>
                </div>

                @if (!$loop->last)
                  <hr class="bg-rose">
                @endif

              @endforeach

            @else
              <p class="card-prive"><i class="icon ion-locked"></i> Privé</p>
            @endif
            {{-- Fin du if($formations) --}}
            </div>

          </div>
        </div>

      </div>
    </div>

    {{---------------------------- CENTRES D'INTERET ----------------------------}}

    <div class="row">

      <div class="col-lg-12">

        <div class="card mb-4 bg-light-violet custom-card resume-card">
          <div class="card-body">
            <h4 class="card-title bg-jaune">
              Centres d'intérêt
            </h4>

              <div class="card-text">

                @if (isset($centresInteret) && count($centresInteret) > 0)
                  @foreach ($centresInteret as $centre)
                    <div class="resume-data resume-data-centre">
                      <p><strong class="resume-nom text-uppercase">{{ $centre->nom }}</strong></p>

                      <p class="resume-description"><?php echo nl2br("$centre->description"); ?></p>
                    </div>

                    @if (!$loop->last)
                      <hr class="bg-jaune">
                    @endif

                  @endforeach

                @else
                  <p class="card-prive"><i class="icon ion-locked"></i> Privé</p>
                @endif
                {{-- Fin du if($centres) --}}
              </div>

          </div>
        </div>

      </div>

    </div>



    {{-------------------------- SAVOIRS / SAVOIR-FAIRE --------------------------}}

    <div class="row">

      <div class="col-lg-12">
        <div class="card mb-4 bg-light-violet custom-card resume-competences-card add-competences-card">
          <div class="card-body">
            <h4 class="card-title bg-jaune">
              Compétences - savoirs / savoir-faire
            </h4>

              <div class="card-text">

              @if ($savoirs)
                @foreach ($savoirs as $savoir)
                  <button class="bg-jaune competence-in-box link-add-item-resume" type="button">{{ $savoir->nom }}</button>
                @endforeach

              @else
                <p class="card-prive"><i class="icon ion-locked"></i> Privé</p>
              @endif
              {{-- Fin du if($savoirs) --}}
              </div>

          </div>
        </div>
      </div>

    </div>


    {{------------------------------- SAVOIR-ÊTRE -------------------------------}}

    <div class="row">

      <div class="col-lg-12">
        <div class="card mb-4 bg-light-violet custom-card resume-competences-card add-competences-card">
          <div class="card-body">
            <h4 class="card-title bg-jaune">
              Compétences - savoir-être
            </h4>

              <div class="card-text">
              @if ($savoirEtre)
                @foreach ($savoirEtre as $savoirE)
                  <button class="bg-jaune competence-in-box link-add-item-resume" type="button">{{ $savoirE->nom }}</button>
                @endforeach

              @else
                <p class="card-prive"><i class="icon ion-locked"></i> Privé</p>
              @endif
              {{-- Fin du if($savoirEtre) --}}
              </div>

          </div>
        </div>
      </div>

    </div>



    {{------------------------------- MOTIVATIONS -------------------------------}}

    <div class="row">

      <div class="col-lg-12">
        <div class="card mb-4 bg-light-violet custom-card resume-competences-card add-competences-card">
          <div class="card-body">
            <h4 class="card-title bg-jaune">
              BATTEMENTS DE COEUR
            </h4>

              <div class="card-text">
                @if ($motivations)
                  @foreach ($motivations as $motivation)
                    <button class="bg-jaune competence-in-box link-add-item-resume" type="button" name="button">{{ $motivation->nom }}</button>
                  @endforeach

                @else
                  <p class="card-prive"><i class="icon ion-locked"></i> Privé</p>
                @endif
                {{-- Fin du if($motivations) --}}
              </div>

          </div>
        </div>
      </div>

    </div>

  </div>
  {{------------------------------- Fin RESUME -------------------------------}}


  {{--------------------------------- STATS ---------------------------------}}
  <div class="col-lg-2">
    @include('social_network.layouts.stats')
  </div>

</div>

@endsection
