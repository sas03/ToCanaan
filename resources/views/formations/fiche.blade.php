@extends('layouts.master') @section('title', ucfirst($formation->nom))

@section('main_title')
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <h4 class="text-uppercase">{{ $formation->nom }}</h4>
      </div>

    </div>
  </div>

  <hr class="bg-rose trait-titre">
@endsection

@section('main_sous_menu')
  <div class="container">
    <div class="row row-sous-menu-fiche">
      <div class="col-lg-12">
        <ul>
          <li><a href="#formation-informations" class="sous-menu-link text-uppercase">Informations générales</a></li>
          <li><a href="#formation-parcours" class="sous-menu-link text-uppercase">Parcours</a></li>
          <li><a href="#formation-etablissements" class="sous-menu-link text-uppercase">Etablissements</a></li>
        </ul>
      </div>
    </div>
  </div>
@endsection

@section('content')

<div class="row" id="formation-informations">

  <div class="col-lg-7">

    <div class="card mb-4 bg-light-rose custom-card">
      <div class="card-body">
        <h4 class="card-title bg-rose">Descriptif de la formation</h4>
        <div class="card-formation-description">
        <p class="card-text">
        @foreach ($description as $value)
          {{ $value }} <br>
        @endforeach
        </p>

        </div>
      </div>
    </div>

  </div>

  <div class="col-lg-5">

  <div class="card mb-4 bg-light-rose custom-card">
    <div class="card-body">
      <h4 class="card-title bg-rose">Informations complémentaires</h4>
      <ul class="card-text">
        <li>Niveau requis  : {{ mb_strtoupper($formation->niveau_entree) }}</li>
        <br>
        <li>Niveau de sortie  : {{ mb_strtoupper($formation->niveau_sortie) }}</li>
        <br>
        <li>Durée  : {{ $formation->duree }}</li>
      </ul>
    </div>
  </div>


    <div class="card mb-4 bg-light-vert custom-card">
      <div class="card-body">
        <h4 class="card-title bg-vert">Métiers associés</h4>

        @if($metiers)
          <ul class="card-metiers-connexes">
            @foreach ($metiers as $metier)

              @if ($loop->iteration < 5)
                <li><a href="{{ route('fiche_metier', ['id' => $metier->id]) }}">{{ ucfirst($metier->nom) }}</a></li>
              @endif

            @endforeach
          </ul>
        @else
          <p class="card-text card-metiers-connexes">Pas de métiers associés à cette formation.</p>
        @endif

      </div>
    </div>

  </div>

</div>

<div class="row" id="formation-parcours">

  <div class="col-lg-12">
    <div class="card mb-4 bg-light-jaune custom-card parcours-card parcours-card-formation">
      <div class="card-body">
        <h4 class="card-title bg-jaune">Parcours possibles</h4>

        <div class="card-svg">

          {{-- On trace les différents parcours en svg --}}
          <svg width="100%" height="340" viewBox="0 0 1108 340" preserveAspectRatio="none">

            @switch($formation->niveau_sortie)
              @case('sans diplôme')
                @break
              @case('autre formation')
                @break
              @case('non renseigné')
                @break
              @case('3e')
                @break
              @case('brevet')
                @break
              @case('seconde')
                @break
              @case('1ere')
                @break
              @case('CAP ou équivalent')
                <line x1="{{ $x['bac - 3'] }}" y1="{{ $y['niveau_3'] }}" x2="{{ $x['bac - 1'] }}" y2="{{ $y['niveau_3'] }}" stroke-dasharray="5, 5" />
                @break
              @case('bac ou équivalent')
                <line x1="{{ $x['bac - 3'] }}" y1="{{ $y['niveau_3'] }}" x2="{{ $x['bac - 1'] }}" y2="{{ $y['niveau_3'] }}" stroke-dasharray="5, 5" />
                <line x1="{{ $x['bac - 1'] }}" y1="{{ $y['niveau_3'] }}" x2="{{ $x['bac'] }}" y2="{{ $y['niveau_3'] }}" />
                @break

              @case('bac + 9 et plus')
                <line x1="{{ $x['bac'] }}" y1="{{ $y['niveau_3'] }}" x2="{{ $x['bac + 9'] }}" y2="{{ $y['niveau_3'] }}" />
                @break

              @default
              <line x1="{{ $x['bac'] }}" y1="{{ $y['niveau_3'] }}" x2="{{ $x[$formation->niveau_sortie] }}" y2="{{ $y['niveau_3'] }}" />
            @endswitch

            @if ($formation->niveau_sortie == 'bac + 4' || $formation->niveau_sortie == 'bac + 7' || $formation->niveau_sortie == 'bac + 8' || $formation->niveau_sortie == 'bac + 9 et plus')
              {{-- <circle cx="{{ $x[$formation->niveau_entree] }}" cy="{{ $y['niveau_3'] }}" r="5"  stroke="green" /> --}}
            @endif


            {{--------------------------- BAC + 9 ---------------------------}}
            @if ($formation->niveau_sortie == 'bac + 9 et plus' && $formation->niveau_entree != 'bac')

              @if($formation->niveau_entree == 'bac + 5')

                <line x1="{{ $x['bac + 3'] }}" y1="{{ $y['niveau_5'] }}" x2="{{ $x['bac + 5'] }}" y2="{{ $y['niveau_5'] }}" />
                <line x1="{{ $x['bac + 5'] }}" y1="{{ $y['niveau_5'] }}" x2="{{ $x['bac + 9'] }}" y2="{{ $y['niveau_3'] }}" />

                <text x="{{ $x['bac + 5'] }}" y="{{ $y['niveau_5'] - 25 }}">Master</text>
                <circle cx="{{ $x['bac + 5'] }}" cy="{{ $y['niveau_5'] }}" r="16" stroke="green" niveau="masters" id="circle-masters" />
                <text x="{{ $x['bac + 5'] }}" y="{{ $y['niveau_5'] + 5 }}" cx="{{ $x['bac + 5'] }}" cy="{{ $y['niveau_5'] }}" niveau="masters" id="text-masters" class="svg-count">{{ count($masters) }}</text>

                <text x="{{ $x['bac + 5'] }}" y="{{ $y['niveau_3'] - 25 }}">Diplôme école</text>
                <circle cx="{{ $x['bac + 5'] }}" cy="{{ $y['niveau_3'] }}" r="16" stroke="green" niveau="diplomesEcole" id="circle-diplomesEcole" />
                <text x="{{ $x['bac + 5'] }}" y="{{ $y['niveau_3'] + 5 }}" cx="{{ $x['bac + 5'] }}" cy="{{ $y['niveau_3'] }}" niveau="diplomesEcole" id="text-diplomesEcole" class="svg-count">{{ count($diplomesEcole) }}</text>

                <line x1="{{ $x['bac + 3'] }}" y1="{{ $y['niveau_1'] }}" x2="{{ $x['bac + 5'] }}" y2="{{ $y['niveau_1'] }}" />
                <line x1="{{ $x['bac + 5'] }}" y1="{{ $y['niveau_1'] }}" x2="{{ $x['bac + 9'] }}" y2="{{ $y['niveau_3'] }}" />

                <text x="{{ $x['bac + 5'] }}" y="{{ $y['niveau_1'] - 25 }}">Master Pro</text>
                <circle cx="{{ $x['bac + 5'] }}" cy="{{ $y['niveau_1'] }}" r="16" stroke="green" niveau="mastersPro" id="circle-mastersPro" />
                <text x="{{ $x['bac + 5'] }}" y="{{ $y['niveau_1'] + 5 }}" cx="{{ $x['bac + 5'] }}" cy="{{ $y['niveau_1'] }}" niveau="mastersPro" id="text-mastersPro" class="svg-count">{{ count($mastersPro) }}</text>

              @else
                <circle cx="{{ $x[$formation->niveau_entree] }}" cy="{{ $y['niveau_3'] }}" r="6" stroke="green" />
              @endif

              <line x1="{{ $x['bac'] }}" y1="{{ $y['niveau_3'] }}" x2="{{ $x['bac + 3'] }}" y2="{{ $y['niveau_5'] }}" />
              <text x="{{ $x['bac + 3'] }}" y="{{ $y['niveau_5'] - 25 }}">Licence</text>
              <circle cx="{{ $x['bac + 3'] }}" cy="{{ $y['niveau_5'] }}" r="16" stroke="black" niveau="licences" id="circle-licences" />
              <text x="{{ $x['bac + 3'] }}" y="{{ $y['niveau_5'] + 5 }}" cx="{{ $x['bac + 3'] }}" cy="{{ $y['niveau_5'] }}" niveau="licences" id="text-licences" class="svg-count">{{ count($licences) }}</text>

              <polyline points="
              {{ $x['bac'] }}, {{ $y['niveau_3'] }}
              {{ $x['bac + 2'] }}, {{ $y['niveau_1'] }}
              {{ $x['bac + 3'] }}, {{ $y['niveau_1'] }}
              " />

              <text x="{{ $x['bac + 2'] }}" y="{{ $y['niveau_1'] - 25 }}">BTS/DUT/L2</text>
              <circle cx="{{ $x['bac + 2'] }}" cy="{{ $y['niveau_1'] }}" r="16" stroke="black" niveau="btsDut" id="circle-btsDut" />
              <text x="{{ $x['bac + 2'] }}" y="{{ $y['niveau_1'] + 5 }}" cx="{{ $x['bac + 2'] }}" cy="{{ $y['niveau_1'] }}" niveau="btsDut" id="text-btsDut" class="svg-count">{{ count($btsDut) }}</text>

              <text x="{{ $x['bac + 3'] }}" y="{{ $y['niveau_1'] - 25 }}">Licence Pro</text>
              <circle cx="{{ $x['bac + 3'] }}" cy="{{ $y['niveau_1'] }}" r="16" stroke="black" niveau="licencesPro" id="circle-licencesPro" />
              <text x="{{ $x['bac + 3'] }}" y="{{ $y['niveau_1'] + 5 }}" cx="{{ $x['bac + 3'] }}" cy="{{ $y['niveau_1'] }}" niveau="licencesPro" id="text-licencesPro" class="svg-count">{{ count($licencesPro) }}</text>


            @endif
            {{------------------------- FIN BAC + 9 -------------------------}}

            {{--------------------------- BAC + 8 ---------------------------}}
            @if ($formation->niveau_sortie == 'bac + 8' && $formation->niveau_entree != 'bac')

              @if($formation->niveau_entree == 'bac + 5')
                <line x1="{{ $x['bac + 3'] }}" y1="{{ $y['niveau_5'] }}" x2="{{ $x['bac + 5'] }}" y2="{{ $y['niveau_5'] }}" />
                <line x1="{{ $x['bac + 5'] }}" y1="{{ $y['niveau_5'] }}" x2="{{ $x['bac + 8'] }}" y2="{{ $y['niveau_3'] }}" />

                <text x="{{ $x['bac + 5'] }}" y="{{ $y['niveau_5'] - 25 }}">Master</text>
                <circle cx="{{ $x['bac + 5'] }}" cy="{{ $y['niveau_5'] }}" r="16" stroke="green" niveau="masters" id="circle-masters" />
                <text x="{{ $x['bac + 5'] }}" y="{{ $y['niveau_5'] + 5 }}" cx="{{ $x['bac + 5'] }}" cy="{{ $y['niveau_5'] }}" niveau="masters" id="text-masters" class="svg-count">{{ count($masters) }}</text>

                <text x="{{ $x['bac + 5'] }}" y="{{ $y['niveau_3'] - 25 }}">Diplôme école</text>
                <circle cx="{{ $x['bac + 5'] }}" cy="{{ $y['niveau_3'] }}" r="16" stroke="green" niveau="diplomesEcole" id="circle-diplomesEcole" />
                <text x="{{ $x['bac + 5'] }}" y="{{ $y['niveau_3'] + 5 }}" cx="{{ $x['bac + 5'] }}" cy="{{ $y['niveau_3'] }}" niveau="diplomesEcole" id="text-diplomesEcole" class="svg-count">{{ count($diplomesEcole) }}</text>

                <line x1="{{ $x['bac + 3'] }}" y1="{{ $y['niveau_1'] }}" x2="{{ $x['bac + 5'] }}" y2="{{ $y['niveau_1'] }}" />
                <line x1="{{ $x['bac + 5'] }}" y1="{{ $y['niveau_1'] }}" x2="{{ $x['bac + 8'] }}" y2="{{ $y['niveau_3'] }}" />

                <text x="{{ $x['bac + 5'] }}" y="{{ $y['niveau_1'] - 25 }}">Master Pro</text>
                <circle cx="{{ $x['bac + 5'] }}" cy="{{ $y['niveau_1'] }}" r="16" stroke="green" niveau="mastersPro" id="circle-mastersPro" />
                <text x="{{ $x['bac + 5'] }}" y="{{ $y['niveau_1'] + 5 }}" cx="{{ $x['bac + 5'] }}" cy="{{ $y['niveau_1'] }}" niveau="mastersPro" id="text-mastersPro" class="svg-count">{{ count($mastersPro) }}</text>

                <line x1="{{ $x['bac'] }}" y1="{{ $y['niveau_3'] }}" x2="{{ $x['bac + 3'] }}" y2="{{ $y['niveau_5'] }}" />
                <text x="{{ $x['bac + 3'] }}" y="{{ $y['niveau_5'] - 25 }}">Licence</text>
                <circle cx="{{ $x['bac + 3'] }}" cy="{{ $y['niveau_5'] }}" r="16" stroke="black" niveau="licences" id="circle-licences" />
                <text x="{{ $x['bac + 3'] }}" y="{{ $y['niveau_5'] + 5 }}" cx="{{ $x['bac + 3'] }}" cy="{{ $y['niveau_5'] }}" niveau="licences" id="text-licences" class="svg-count">{{ count($licences) }}</text>

                <polyline points="
                {{ $x['bac'] }}, {{ $y['niveau_3'] }}
                {{ $x['bac + 2'] }}, {{ $y['niveau_1'] }}
                {{ $x['bac + 3'] }}, {{ $y['niveau_1'] }}
                " />

                <text x="{{ $x['bac + 2'] }}" y="{{ $y['niveau_1'] - 25 }}">BTS/DUT/L2</text>
                <circle cx="{{ $x['bac + 2'] }}" cy="{{ $y['niveau_1'] }}" r="16" stroke="black" niveau="btsDut" id="circle-btsDut" />
                <text x="{{ $x['bac + 2'] }}" y="{{ $y['niveau_1'] + 5 }}" cx="{{ $x['bac + 2'] }}" cy="{{ $y['niveau_1'] }}" niveau="btsDut" id="text-btsDut" class="svg-count">{{ count($btsDut) }}</text>

                <text x="{{ $x['bac + 3'] }}" y="{{ $y['niveau_1'] - 25 }}">Licence Pro</text>
                <circle cx="{{ $x['bac + 3'] }}" cy="{{ $y['niveau_1'] }}" r="16" stroke="black" niveau="licencesPro" id="circle-licencesPro" />
                <text x="{{ $x['bac + 3'] }}" y="{{ $y['niveau_1'] + 5 }}" cx="{{ $x['bac + 3'] }}" cy="{{ $y['niveau_1'] }}" niveau="licencesPro" id="text-licencesPro" class="svg-count">{{ count($licencesPro) }}</text>

              @elseif ($formation->niveau_entree == 'bac + 7')

                <text x="{{ $x['bac + 7'] }}" y="{{ $y['niveau_3'] - 25 }}">Diplôme d'état</text>
                <circle cx="{{ $x['bac + 7'] }}" cy="{{ $y['niveau_3'] }}" r="16" stroke="green" niveau="bacPlus7" id="circle-bacPlus7" />
                <text x="{{ $x['bac + 7'] }}" y="{{ $y['niveau_3'] + 5 }}" cx="{{ $x['bac + 7'] }}" cy="{{ $y['niveau_3'] }}" niveau="bacPlus7" id="text-bacPlus7" class="svg-count">{{ count($bacPlus7) }}</text>

                <text x="{{ $x['bac + 2'] }}" y="{{ $y['niveau_3'] - 25 }}">BTS/DUT/L2</text>
                <circle cx="{{ $x['bac + 2'] }}" cy="{{ $y['niveau_3'] }}" r="16" stroke="black" niveau="btsDut" id="circle-btsDut" />
                <text x="{{ $x['bac + 2'] }}" y="{{ $y['niveau_3'] + 5 }}" cx="{{ $x['bac + 2'] }}" cy="{{ $y['niveau_3'] }}" niveau="btsDut" id="text-btsDut" class="svg-count">{{ count($btsDut) }}</text>

              @else
                <circle cx="{{ $x[$formation->niveau_entree] }}" cy="{{ $y['niveau_3'] }}" r="6" stroke="green" />
              @endif

            @endif
            {{------------------------- FIN BAC + 8 -------------------------}}


            {{--------------------------- BAC + 6 ---------------------------}}
            @if ($formation->niveau_sortie == 'bac + 7' && $formation->niveau_entree != 'bac')

              @if ($formation->niveau_entree == 'bac + 2')

                <text x="{{ $x['bac + 2'] }}" y="{{ $y['niveau_3'] - 25 }}">BTS/DUT/L2</text>
                <circle cx="{{ $x['bac + 2'] }}" cy="{{ $y['niveau_3'] }}" r="16" stroke="green" niveau="btsDut" id="circle-btsDut" />
                <text x="{{ $x['bac + 2'] }}" y="{{ $y['niveau_3'] + 5 }}" cx="{{ $x['bac + 2'] }}" cy="{{ $y['niveau_3'] }}" niveau="btsDut" id="text-btsDut" class="svg-count">{{ count($btsDut) }}</text>

              @elseif ($formation->niveau_entree == 'bac + 4')

                <polyline points="
                {{ $x['bac + 3'] }}, {{ $y['niveau_1'] }}
                {{ $x['bac + 4'] }}, {{ $y['niveau_1'] }}
                {{ $x['bac + 4'] }}, {{ $y['niveau_3'] }}
                " />

                <polyline points="
                {{ $x['bac + 3'] }}, {{ $y['niveau_5'] }}
                {{ $x['bac + 4'] }}, {{ $y['niveau_5'] }}
                {{ $x['bac + 4'] }}, {{ $y['niveau_3'] }}
                " />

                <circle cx="{{ $x['bac + 4'] }}" cy="{{ $y['niveau_3'] }}" r="6" stroke="green" />

              @elseif($formation->niveau_entree == 'bac + 5')

                <line x1="{{ $x['bac + 3'] }}" y1="{{ $y['niveau_5'] }}" x2="{{ $x['bac + 5'] }}" y2="{{ $y['niveau_5'] }}" />
                <line x1="{{ $x['bac + 5'] }}" y1="{{ $y['niveau_5'] }}" x2="{{ $x['bac + 7'] }}" y2="{{ $y['niveau_3'] }}" />

                <text x="{{ $x['bac + 5'] }}" y="{{ $y['niveau_5'] - 25 }}">Master</text>
                <circle cx="{{ $x['bac + 5'] }}" cy="{{ $y['niveau_5'] }}" r="16" stroke="green" niveau="masters" id="circle-masters" />
                <text x="{{ $x['bac + 5'] }}" y="{{ $y['niveau_5'] + 5 }}" cx="{{ $x['bac + 5'] }}" cy="{{ $y['niveau_5'] }}" niveau="masters" id="text-masters" class="svg-count">{{ count($masters) }}</text>

                <text x="{{ $x['bac + 5'] }}" y="{{ $y['niveau_3'] - 25 }}">Diplôme école</text>
                <circle cx="{{ $x['bac + 5'] }}" cy="{{ $y['niveau_3'] }}" r="16" stroke="green" niveau="diplomesEcole" id="circle-diplomesEcole" />
                <text x="{{ $x['bac + 5'] }}" y="{{ $y['niveau_3'] + 5 }}" cx="{{ $x['bac + 5'] }}" cy="{{ $y['niveau_3'] }}" niveau="diplomesEcole" id="text-diplomesEcole" class="svg-count">{{ count($diplomesEcole) }}</text>

                <line x1="{{ $x['bac + 3'] }}" y1="{{ $y['niveau_1'] }}" x2="{{ $x['bac + 5'] }}" y2="{{ $y['niveau_1'] }}" />
                <line x1="{{ $x['bac + 5'] }}" y1="{{ $y['niveau_1'] }}" x2="{{ $x['bac + 7'] }}" y2="{{ $y['niveau_3'] }}" />

                <text x="{{ $x['bac + 5'] }}" y="{{ $y['niveau_1'] - 25 }}">Master Pro</text>
                <circle cx="{{ $x['bac + 5'] }}" cy="{{ $y['niveau_1'] }}" r="16" stroke="green" niveau="mastersPro" id="circle-mastersPro" />
                <text x="{{ $x['bac + 5'] }}" y="{{ $y['niveau_1'] + 5 }}" cx="{{ $x['bac + 5'] }}" cy="{{ $y['niveau_1'] }}" niveau="mastersPro" id="text-mastersPro" class="svg-count">{{ count($mastersPro) }}</text>

              @elseif($formation->niveau_entree == 'bac + 6')

                <text x="{{ $x['bac + 6'] }}" y="{{ $y['niveau_3'] - 25 }}">Diplome d'état</text>
                <circle cx="{{ $x['bac + 6'] }}" cy="{{ $y['niveau_3'] }}" r="16" stroke="green" niveau="bacPlus6" id="circle-bacPlus6" />
                <text x="{{ $x['bac + 6'] }}" y="{{ $y['niveau_3'] + 5 }}" cx="{{ $x['bac + 6'] }}" cy="{{ $y['niveau_3'] }}" niveau="bacPlus6" id="text-bacPlus6" class="svg-count">{{ count($bacPlus6) }}</text>


              @else
                <circle cx="{{ $x[$formation->niveau_entree] }}" cy="{{ $y['niveau_3'] }}" r="6" stroke="green" />
              @endif

              @if ($formation->niveau_entree != 'bac + 2' && $formation->niveau_entree != 'bac + 6')
                <line x1="{{ $x['bac'] }}" y1="{{ $y['niveau_3'] }}" x2="{{ $x['bac + 3'] }}" y2="{{ $y['niveau_5'] }}" />
                <text x="{{ $x['bac + 3'] }}" y="{{ $y['niveau_5'] - 25 }}">Licence</text>
                <circle cx="{{ $x['bac + 3'] }}" cy="{{ $y['niveau_5'] }}" r="16" stroke="black" niveau="licences" id="circle-licences" />
                <text x="{{ $x['bac + 3'] }}" y="{{ $y['niveau_5'] + 5 }}" cx="{{ $x['bac + 3'] }}" cy="{{ $y['niveau_5'] }}" niveau="licences" id="text-licences" class="svg-count">{{ count($licences) }}</text>

                <polyline points="
                {{ $x['bac'] }}, {{ $y['niveau_3'] }}
                {{ $x['bac + 2'] }}, {{ $y['niveau_1'] }}
                {{ $x['bac + 3'] }}, {{ $y['niveau_1'] }}
                " />

                <text x="{{ $x['bac + 2'] }}" y="{{ $y['niveau_1'] - 25 }}">BTS/DUT/L2</text>
                <circle cx="{{ $x['bac + 2'] }}" cy="{{ $y['niveau_1'] }}" r="16" stroke="black" niveau="btsDut" id="circle-btsDut" />
                <text x="{{ $x['bac + 2'] }}" y="{{ $y['niveau_1'] + 5 }}" cx="{{ $x['bac + 2'] }}" cy="{{ $y['niveau_1'] }}" niveau="btsDut" id="text-btsDut" class="svg-count">{{ count($btsDut) }}</text>

                <text x="{{ $x['bac + 3'] }}" y="{{ $y['niveau_1'] - 25 }}">Licence Pro</text>
                <circle cx="{{ $x['bac + 3'] }}" cy="{{ $y['niveau_1'] }}" r="16" stroke="black" niveau="licencesPro" id="circle-licencesPro" />
                <text x="{{ $x['bac + 3'] }}" y="{{ $y['niveau_1'] + 5 }}" cx="{{ $x['bac + 3'] }}" cy="{{ $y['niveau_1'] }}" niveau="licencesPro" id="text-licencesPro" class="svg-count">{{ count($licencesPro) }}</text>
              @endif

            @endif
            {{------------------------- FIN BAC + 7 -------------------------}}


            {{--------------------------- BAC + 6 ---------------------------}}
            @if ($formation->niveau_sortie == 'bac + 6' && $formation->niveau_entree != 'bac')

              @if ($formation->niveau_entree == 'bac + 4')

                <polyline points="
                {{ $x['bac + 3'] }}, {{ $y['niveau_1'] }}
                {{ $x['bac + 4'] }}, {{ $y['niveau_1'] }}
                {{ $x['bac + 4'] }}, {{ $y['niveau_3'] }}
                " />

                <polyline points="
                {{ $x['bac + 3'] }}, {{ $y['niveau_5'] }}
                {{ $x['bac + 4'] }}, {{ $y['niveau_5'] }}
                {{ $x['bac + 4'] }}, {{ $y['niveau_3'] }}
                " />

                <circle cx="{{ $x['bac + 4'] }}" cy="{{ $y['niveau_3'] }}" r="6" stroke="green" />

              @elseif($formation->niveau_entree == 'bac + 5')

                <line x1="{{ $x['bac + 3'] }}" y1="{{ $y['niveau_5'] }}" x2="{{ $x['bac + 5'] }}" y2="{{ $y['niveau_5'] }}" />
                <line x1="{{ $x['bac + 5'] }}" y1="{{ $y['niveau_5'] }}" x2="{{ $x['bac + 6'] }}" y2="{{ $y['niveau_3'] }}" />

                <text x="{{ $x['bac + 5'] }}" y="{{ $y['niveau_5'] - 25 }}">Master</text>
                <circle cx="{{ $x['bac + 5'] }}" cy="{{ $y['niveau_5'] }}" r="16" stroke="green" niveau="masters" id="circle-masters" />
                <text x="{{ $x['bac + 5'] }}" y="{{ $y['niveau_5'] + 5 }}" cx="{{ $x['bac + 5'] }}" cy="{{ $y['niveau_5'] }}" niveau="masters" id="text-masters" class="svg-count">{{ count($masters) }}</text>

                <text x="{{ $x['bac + 5'] }}" y="{{ $y['niveau_3'] - 25 }}">Diplôme école</text>
                <circle cx="{{ $x['bac + 5'] }}" cy="{{ $y['niveau_3'] }}" r="16" stroke="green" niveau="diplomesEcole" id="circle-diplomesEcole" />
                <text x="{{ $x['bac + 5'] }}" y="{{ $y['niveau_3'] + 5 }}" cx="{{ $x['bac + 5'] }}" cy="{{ $y['niveau_3'] }}" niveau="diplomesEcole" id="text-diplomesEcole" class="svg-count">{{ count($diplomesEcole) }}</text>

                <line x1="{{ $x['bac + 3'] }}" y1="{{ $y['niveau_1'] }}" x2="{{ $x['bac + 5'] }}" y2="{{ $y['niveau_1'] }}" />
                <line x1="{{ $x['bac + 5'] }}" y1="{{ $y['niveau_1'] }}" x2="{{ $x['bac + 6'] }}" y2="{{ $y['niveau_3'] }}" />

                <text x="{{ $x['bac + 5'] }}" y="{{ $y['niveau_1'] - 25 }}">Master Pro</text>
                <circle cx="{{ $x['bac + 5'] }}" cy="{{ $y['niveau_1'] }}" r="16" stroke="green" niveau="mastersPro" id="circle-mastersPro" />
                <text x="{{ $x['bac + 5'] }}" y="{{ $y['niveau_1'] + 5 }}" cx="{{ $x['bac + 5'] }}" cy="{{ $y['niveau_1'] }}" niveau="mastersPro" id="text-mastersPro" class="svg-count">{{ count($mastersPro) }}</text>

              @else
                <circle cx="{{ $x[$formation->niveau_entree] }}" cy="{{ $y['niveau_3'] }}" r="6" stroke="green" />
              @endif

              <line x1="{{ $x['bac'] }}" y1="{{ $y['niveau_3'] }}" x2="{{ $x['bac + 3'] }}" y2="{{ $y['niveau_5'] }}" />
              <text x="{{ $x['bac + 3'] }}" y="{{ $y['niveau_5'] - 25 }}">Licence</text>
              <circle cx="{{ $x['bac + 3'] }}" cy="{{ $y['niveau_5'] }}" r="16" stroke="black" niveau="licences" id="circle-licences" />
              <text x="{{ $x['bac + 3'] }}" y="{{ $y['niveau_5'] + 5 }}" cx="{{ $x['bac + 3'] }}" cy="{{ $y['niveau_5'] }}" niveau="licences" id="text-licences" class="svg-count">{{ count($licences) }}</text>

              <polyline points="
              {{ $x['bac'] }}, {{ $y['niveau_3'] }}
              {{ $x['bac + 2'] }}, {{ $y['niveau_1'] }}
              {{ $x['bac + 3'] }}, {{ $y['niveau_1'] }}
              " />

              <text x="{{ $x['bac + 2'] }}" y="{{ $y['niveau_1'] - 25 }}">BTS/DUT/L2</text>
              <circle cx="{{ $x['bac + 2'] }}" cy="{{ $y['niveau_1'] }}" r="16" stroke="black" niveau="btsDut" id="circle-btsDut" />
              <text x="{{ $x['bac + 2'] }}" y="{{ $y['niveau_1'] + 5 }}" cx="{{ $x['bac + 2'] }}" cy="{{ $y['niveau_1'] }}" niveau="btsDut" id="text-btsDut" class="svg-count">{{ count($btsDut) }}</text>

              <text x="{{ $x['bac + 3'] }}" y="{{ $y['niveau_1'] - 25 }}">Licence Pro</text>
              <circle cx="{{ $x['bac + 3'] }}" cy="{{ $y['niveau_1'] }}" r="16" stroke="black" niveau="licencesPro" id="circle-licencesPro" />
              <text x="{{ $x['bac + 3'] }}" y="{{ $y['niveau_1'] + 5 }}" cx="{{ $x['bac + 3'] }}" cy="{{ $y['niveau_1'] }}" niveau="licencesPro" id="text-licencesPro" class="svg-count">{{ count($licencesPro) }}</text>


            @endif
            {{------------------------- FIN BAC + 6 -------------------------}}


            {{--------------------------- BAC + 5 ---------------------------}}
            @if ($formation->niveau_sortie == 'bac + 5' && $formation->niveau_entree != 'bac')

              @if ($formation->niveau_entree == 'bac + 2')
                <text x="{{ $x['bac + 2'] }}" y="{{ $y['niveau_3'] - 25 }}">BTS/DUT/L2</text>
                <circle cx="{{ $x['bac + 2'] }}" cy="{{ $y['niveau_3'] }}" r="16" stroke="black" niveau="btsDut" id="circle-btsDut" />
                <text x="{{ $x['bac + 2'] }}" y="{{ $y['niveau_3'] + 5 }}" cx="{{ $x['bac + 2'] }}" cy="{{ $y['niveau_3'] }}" niveau="btsDut" id="text-btsDut" class="svg-count">{{ count($btsDut) }}</text>

              @elseif ($formation->niveau_entree == 'bac + 3')

                <text x="{{ $x['bac + 3'] }}" y="{{ $y['niveau_3'] - 25 }}">Licence</text>
                <circle cx="{{ $x['bac + 3'] }}" cy="{{ $y['niveau_3'] }}" r="16" stroke="black" niveau="licences" id="circle-licences" />
                <text x="{{ $x['bac + 3'] }}" y="{{ $y['niveau_3'] + 5 }}" cx="{{ $x['bac + 3'] }}" cy="{{ $y['niveau_3'] }}" niveau="licences" id="text-licences" class="svg-count">{{ count($licences) }}</text>

                <polyline points="
                {{ $x['bac'] }}, {{ $y['niveau_3'] }}
                {{ $x['bac + 2'] }}, {{ $y['niveau_1'] }}
                {{ $x['bac + 3'] }}, {{ $y['niveau_1'] }}
                {{ $x['bac + 5'] }}, {{ $y['niveau_3'] }}
                " />

                <text x="{{ $x['bac + 2'] }}" y="{{ $y['niveau_1'] - 25 }}">BTS/DUT/L2</text>
                <circle cx="{{ $x['bac + 2'] }}" cy="{{ $y['niveau_1'] }}" r="16" stroke="black" niveau="btsDut" id="circle-btsDut" />
                <text x="{{ $x['bac + 2'] }}" y="{{ $y['niveau_1'] + 5 }}" cx="{{ $x['bac + 2'] }}" cy="{{ $y['niveau_1'] }}" niveau="btsDut" id="text-btsDut" class="svg-count">{{ count($btsDut) }}</text>

                <text x="{{ $x['bac + 3'] }}" y="{{ $y['niveau_1'] - 25 }}">Licence Pro</text>
                <circle cx="{{ $x['bac + 3'] }}" cy="{{ $y['niveau_1'] }}" r="16" stroke="black" niveau="licencesPro" id="circle-licencesPro" />
                <text x="{{ $x['bac + 3'] }}" y="{{ $y['niveau_1'] + 5 }}" cx="{{ $x['bac + 3'] }}" cy="{{ $y['niveau_1'] }}" niveau="licencesPro" id="text-licencesPro" class="svg-count">{{ count($licencesPro) }}</text>

              @else
                @if ($formation->niveau_entree == 'brevet')

                @else
                  <circle cx="{{ $x[$formation->niveau_entree] }}" cy="{{ $y['niveau_3'] }}" r="5" stroke="green" />
                @endif
              @endif

            @endif
            {{------------------------- FIN BAC + 5 -------------------------}}

            @if($formation->niveau_sortie == 'bac + 3' && $formation->niveau_entree == 'bac + 2')
              <circle cx="{{ $x['bac + 2'] }}" cy="{{ $y['niveau_3'] }}" r="16" stroke="black" niveau="btsDut" id="circle-btsDut" />
              <text x="{{ $x['bac + 2'] }}" y="{{ $y['niveau_3'] - 25 }}">BTS/DUT/L2</text>
              <text x="{{ $x['bac + 2'] }}" y="{{ $y['niveau_3'] + 5 }}" cx="{{ $x['bac + 2'] }}" cy="{{ $y['niveau_3'] }}" niveau="btsDut" id="text-btsDut" class="svg-count">{{ count($btsDut) }}</text>
            @endif


            {{-- BAC --}}
            @if (count($bacGeneral) > 0)
              {{-- Ligne : Brevet => Bac Général --}}
              <line x1="{{ $x['bac - 3'] }}" y1="{{ $y['niveau_3'] }}" x2="{{ $x['bac - 1'] }}" y2="{{ $y['niveau_3'] }}" style="stroke:white;stroke-width:2" stroke-dasharray="5, 5" />
              <line x1="{{ $x['bac - 1'] }}" y1="{{ $y['niveau_3'] }}" x2="{{ $x['bac'] }}" y2="{{ $y['niveau_3'] }}" style="stroke:white;stroke-width:2" />
              <text x="{{ $x['bac'] }}" y="{{ $y['niveau_3'] - 25 }}">Bac Général / Techno</text>

              <circle cx="{{ $x['bac'] }}" cy="{{ $y['niveau_3'] }}" r="16" stroke="black" niveau="bacGeneral" id="circle-bacGeneral" />
              <text x="{{ $x['bac'] }}" y="{{ $y['niveau_3'] + 5 }}" cx="{{ $x['bac'] }}" cy="{{ $y['niveau_3'] }}" niveau="bacGeneral" id="text-bacGeneral" class="svg-count">{{ count($bacGeneral) }}</text>
            @endif

            {{-- BREVET --}}
            {{-- Ligne : 0 => Brevet --}}
            <line x1="0" y1="{{ $y['niveau_3'] }}" x2="{{ $x['bac - 3'] }}" y2="{{ $y['niveau_3'] }}" />
            <circle cx="{{ $x['bac - 3'] }}" cy="{{ $y['niveau_3'] }}" r="5" stroke="black" niveau="brevet" id="circle-brevet" />
            <text x="{{ $x['bac - 3'] }}" y="{{ $y['niveau_3'] - 15 }}">Brevet</text>


            {{-- Rond final (= formation sélectionnée) --}}
            @switch($formation->niveau_sortie)
              @case('sans diplôme')
                <circle cx="{{ $x['bac - 3'] }}" cy="{{ $y['niveau_3'] }}" r="16" niveau="default" id="circle-default" />
                <line x1="{{ $x['bac - 3'] }}" y1="165" x2="{{ $x['bac - 3'] }}" y2="130" />
                <polygon points="
                {{ $x['bac - 3'] }}, 130
                {{ $x['bac - 3'] }},  140
                {{ $x['bac - 3'] + 15 }}, 135"
                style="fill:#E16789;stroke:#E16789;stroke-width:1" />
                @break
              @case('autre formation')
                <circle cx="{{ $x['bac - 3'] }}" cy="{{ $y['niveau_3'] }}" r="16" niveau="default" id="circle-default" />
                <line x1="{{ $x['bac - 3'] }}" y1="165" x2="{{ $x['bac - 3'] }}" y2="130" />
                <polygon points="
                {{ $x['bac - 3'] }}, 130
                {{ $x['bac - 3'] }},  140
                {{ $x['bac - 3'] + 15 }}, 135"
                style="fill:#E16789;stroke:#E16789;stroke-width:1" />
                @break
              @case('non renseigné')
                <circle cx="{{ $x['bac - 3'] }}" cy="{{ $y['niveau_3'] }}" r="16" niveau="default" id="circle-default" />
                <line x1="{{ $x['bac - 3'] }}" y1="165" x2="{{ $x['bac - 3'] }}" y2="130" />
                <polygon points="
                {{ $x['bac - 3'] }}, 130
                {{ $x['bac - 3'] }},  140
                {{ $x['bac - 3'] + 15 }}, 135"
                style="fill:#E16789;stroke:#E16789;stroke-width:1" />
                @break
              @case('3e')
                <circle cx="{{ $x['bac - 3'] }}" cy="{{ $y['niveau_3'] }}" r="16" niveau="default" id="circle-default" />
                <line x1="{{ $x['bac - 3'] }}" y1="165" x2="{{ $x['bac - 3'] }}" y2="130" />
                <polygon points="
                {{ $x['bac - 3'] }}, 130
                {{ $x['bac - 3'] }},  140
                {{ $x['bac - 3'] + 15 }}, 135"
                style="fill:#E16789;stroke:#E16789;stroke-width:1" />
                @break
              @case('brevet')
                <circle cx="{{ $x['bac - 3'] }}" cy="{{ $y['niveau_3'] }}" r="16" niveau="default" id="circle-default" />
                <line x1="{{ $x['bac - 3'] }}" y1="165" x2="{{ $x['bac - 3'] }}" y2="130" />
                <polygon points="
                {{ $x['bac - 3'] }}, 130
                {{ $x['bac - 3'] }},  140
                {{ $x['bac - 3'] + 15 }}, 135"
                style="fill:#E16789;stroke:#E16789;stroke-width:1" />
                @break
              @case('seconde')
                <circle cx="{{ $x['bac - 3'] }}" cy="{{ $y['niveau_3'] }}" r="16" niveau="default" id="circle-default" />
                <line x1="{{ $x['bac - 3'] }}" y1="165" x2="{{ $x['bac - 3'] }}" y2="130" />
                <polygon points="
                {{ $x['bac - 3'] }}, 130
                {{ $x['bac - 3'] }},  140
                {{ $x['bac - 3'] + 15 }}, 135"
                style="fill:#E16789;stroke:#E16789;stroke-width:1" />
                @break
              @case('1ere')
                <circle cx="{{ $x['bac - 3'] }}" cy="{{ $y['niveau_3'] }}" r="16" niveau="default" id="circle-default" />
                <line x1="{{ $x['bac - 3'] }}" y1="165" x2="{{ $x['bac - 3'] }}" y2="130" />
                <polygon points="
                {{ $x['bac - 3'] }}, 130
                {{ $x['bac - 3'] }},  140
                {{ $x['bac - 3'] + 15 }}, 135"
                style="fill:#E16789;stroke:#E16789;stroke-width:1" />
                @break
              @case('CAP ou équivalent')
                <circle cx="{{ $x['bac - 1'] }}" cy="{{ $y['niveau_3'] }}" r="16" niveau="default" id="circle-default" />
                <line x1="{{ $x['bac - 1'] }}" y1="165" x2="{{ $x['bac - 1'] }}" y2="130" />
                <polygon points="
                {{ $x['bac - 1'] }}, 130
                {{ $x['bac - 1'] }},  140
                {{ $x['bac - 1'] + 15 }}, 135"
                style="fill:#E16789;stroke:#E16789;stroke-width:1" />
                @break
              @case('bac ou équivalent')
                <circle cx="{{ $x['bac'] }}" cy="{{ $y['niveau_3'] }}" r="16" niveau="default" id="circle-default" />
                <line x1="{{ $x['bac'] }}" y1="165" x2="{{ $x['bac'] }}" y2="130" />
                <polygon points="
                {{ $x['bac'] }}, 130
                {{ $x['bac'] }},  140
                {{ $x['bac'] + 15 }}, 135"
                style="fill:#E16789;stroke:#E16789;stroke-width:1" />
                @break
              @case('bac + 9 et plus')
                <circle cx="{{ $x['bac + 9'] }}" cy="{{ $y['niveau_3'] }}" r="16" niveau="default" id="circle-default" />
                <line x1="{{ $x['bac + 9'] }}" y1="165" x2="{{ $x['bac + 9'] }}" y2="130" />
                <polygon points="
                {{ $x['bac + 9'] }}, 130
                {{ $x['bac + 9'] }}, 140
                {{ $x['bac + 9'] + 15 }}, 135"
                style="fill:#E16789;stroke:#E16789;stroke-width:1" />
                @break
              @default
                <circle cx="{{ $x[$formation->niveau_sortie] }}" cy="{{ $y['niveau_3'] }}" r="16" niveau="default" id="circle-default" />
                <line x1="{{ $x[$formation->niveau_sortie] }}" y1="165" x2="{{ $x[$formation->niveau_sortie] }}" y2="130" />
                <polygon points="
                {{ $x[$formation->niveau_sortie] }}, 130
                {{ $x[$formation->niveau_sortie] }}, 140
                {{ $x[$formation->niveau_sortie] + 15 }}, 135"
                style="fill:#E16789;stroke:#E16789;stroke-width:1" />
            @endswitch


            {{-- Abscisse --}}
            @foreach ($x as $niveau => $abscisse)
              <text x="{{ $abscisse }}" y="{{ $y['niveau_0'] }}" class="abscisse">{{ $niveau }}</text>
            @endforeach

            Désolé, votre navigateur n'est pas compatible avec le format SVG.

          </svg>

        </div>

        <!-- Template de la Modal -->
        <div class="modal" id="modal-parcours" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-body">

              </div>
            </div>
          </div>
        </div>

        {{----------------------------- TOOLTIPS -----------------------------}}
        @include('parcours.tooltips')

        {{------------------------ LISTES FORMATIONS ------------------------}}
        @include('parcours.listes_parcours')

        <table id="liste-default" class="table table-hover liste-formations">
          <tr>
            <td><a dbid="{{$formation->id}}" href="{{ route('fiche_formation', $formation->id) }}" class="lien-formation">{{ ucfirst($formation->nom) }}</a></td>
          </tr>
        </table>

      </div>
    </div>
  </div>

</div>

<div class="row">

  <div class="col-lg-12">
    <div class="card mb-4 bg-light-rose custom-card filtres-card">
      <div class="card-body">
        <h4 class="card-title bg-rose">Types de formations</h4>

        <div class="card-text">

          <form method="post" class="box-form-search" id="box-filtres">
            {{ csrf_field() }}

            <div class="row row-filtres">

              <div class="col-lg-4">

                <h5>Par statut :</h5>
                <hr class="bg-rose">

                <div class="form-check form-check-inline">
                  <label class="c-input c-radio">
                    <input type="radio" name="statut" value="tout" checked>
                    <span class="c-indicator"></span>
                    Tous les statuts
                  </label>
                </div>
                <br>
                <div class="form-check form-check-inline">
                  <label class="c-input c-radio">
                    <input type="radio" name="statut" value="prive">
                    <span class="c-indicator"></span>
                    Privée
                  </label>
                </div>
                <br>
                <div class="form-check form-check-inline">
                  <label class="c-input c-radio">
                    <input type="radio" name="statut" value="public">
                    <span class="c-indicator"></span>
                    Publique
                  </label>
                </div>
                <br>
                <div class="form-check form-check-inline">
                  <label class="c-input c-radio">
                    <input type="radio" name="statut" value="autre">
                    <span class="c-indicator"></span>
                    Autre
                  </label>
                </div>

              </div>

              <div class="col-lg-4">

                <h5>Par rythme :</h5>
                <hr class="bg-rose">

                <div class="form-check form-check-inline">
                  <label class="form-check-label @if (!$filtresRythme['pro']) disabled @endif" >
                    <input class="form-check-input position-static" type="checkbox" @if ($filtresRythme['pro']) checked @endif disabled> Professionnelle
                  </label>
                </div>
                <br>
                <div class="form-check form-check-inline">
                  <label class="form-check-label  @if (!$filtresRythme['alternance']) disabled @endif">
                    <input class="form-check-input position-static" type="checkbox" @if ($filtresRythme['alternance']) checked @endif disabled> Alternance
                  </label>
                </div>
                <br>
                <div class="form-check form-check-inline">
                  <label class="form-check-label @if (!$filtresRythme['continue']) disabled @endif">
                    <input class="form-check-input position-static" type="checkbox" @if ($filtresRythme['continue']) checked @endif disabled> Formation Continue
                  </label>
                </div>
              </div>

              <div class="col-lg-4">

                <h5>Par localisation :</h5>
                <hr class="bg-rose">

                <div class="form-check form-check-inline">
                  <label class="c-input c-radio">
                    <input id="radio3" type="radio" name="localisation" value="france" checked>
                    <span class="c-indicator"></span>
                    Dans toute la France
                  </label>
                </div>
                <br>
                <div class="form-check form-check-inline">
                  <label class="c-input c-radio">
                    <input id="radio2" type="radio" name="localisation" value="region">
                    <span class="c-indicator"></span>
                    Dans ma région
                  </label>
                </div>
                <br>
                <div class="form-check form-check-inline">
                  <label class="c-input c-radio">
                    <input id="radio3" type="radio" name="localisation" value="departement">
                    <span class="c-indicator"></span>
                    Dans mon département
                  </label>
                </div>

              </div>

            </div> {{-- Fin du row des filtres--}}

            <button type="submit" class="btn bg-rose" id="filtrer">Filtrer</button>
          </form>
        </div>

        {{-- Cette section apparaît seulement si l'utilisateur est connecté --}}
        @if(!Auth::guard('web_societe')->user() && !Auth::guard('web')->user())
          <div class="box-filtres-not-connected">
            <a href="{{ route('login') }}" class="">CONNECTEZ-VOUS</a>
          </div>
        @endguest
      </div>
    </div>

  </div>
</div>

{{-- Si l'utilisateur est connecté --}}
@if (Auth::guard('web_societe')->user() || Auth::guard('web')->user())
  <div class="row" id="formation-etablissements">

    <div class="col-lg-12">
      <div class="card mb-5 bg-light-violet custom-card">
        <div class="card-body">
          <h4 class="card-title bg-violet">Etablissements (<span class="total"></span>) <span class="ajax-load text-center" style="display:none"><img src="http://demo.itsolutionstuff.com/plugin/loader.gif" style="display:inline; width:20px"></span></h4>

          <table class="table table-bordered table-recherche text-center table-etablissements">

            <tbody id="etablissements">
              {{-- La liste des établissements est chargée ici en AJAX --}}
            </tbody>

            <tr>
              <td colspan="3">
                <ul class="pagination justify-content-center">
                  <li class="page-arrow" id="page-first"><<</li>
                  <li class="page-arrow" id="page-prev"><</li>
                  <li class="page-compteur"><span class="i"></span> / <span class="last-page"></span></li>
                  <li class="page-arrow" id="page-next">></li>
                  <li class="page-arrow" id="page-last">>></li>
                </ul>
              </td>
            </tr>
          </table>

        </div>
      </div>
    </div>

  </div>

{{-- Si l'utilisateur n'est pas connecté --}}
@else

  <div class="row">
    <div class="col-lg-12">
      <div class="box-not-connected">
        <ul>
          <li>• Filtres</li>
          <li>• Établissements</li>
          <li>...</li>
        </ul>
        <p>Connectez-vous pour voir la fiche complète de cette formation :</p>
        <br>
        <a href="{{ route('login') }}" class="">CONNEXION</a>
      </div>
    </div>
  </div>

@endif


@endsection

@section('javascript')
  {{-- Script du tooltip --}}
  <script src="{{ asset('js/tooltip.js') }}"></script>

  <script type="text/javascript">

    $(function () {

      // scroll parcours
      $(".card-formation-description").mCustomScrollbar();
      $(".card-metiers-connexes").mCustomScrollbar();
      $(".parcours-card .card-svg").mCustomScrollbar({
          axis:"x" // horizontal scrollbar
      });


      /* CHARGEMENT DE + D'ETABLISSEMENTS EN AJAX  */
        var page = 1;
        let lastPage = $('.pagination .last-page').text();

        loadEtablissements(page);

        // lorsque l'on clique sur un des boutons
        $('#filtrer, #page-prev, #page-first, #page-next, #page-last').click(function(e){
          e.preventDefault();

          let id = $(this).attr('id');
          lastPage = $('.pagination .last-page').text();

          if (id == 'filtrer') {
            page = 1;
          }

          if (id == 'page-prev') {
            page--;
          }
          if (id == 'page-first' && page > 1) {
            page = 1;
          }

          if (id == 'page-next' && page < lastPage) {
            page++;
          }
          if (id == 'page-last' && page < lastPage) {
            page = lastPage;
          }

          let statut = $('#box-filtres input[name="statut"]:checked').val();
          let localisation = $('#box-filtres input[name="localisation"]:checked').val();

          loadEtablissements(page, statut, localisation);
        });


    });

  </script>
@endsection
