<div class="card-svg">

  {{-- On trace les différents parcours en svg --}}
  {{-- <svg width="1108" height="340"> --}}
  <svg width="100%" height="340" viewBox="0 0 1108 340" preserveAspectRatio="none">

    {{-- BAC + 9 --}}
    @if (count($bacPlus9) > 0)

      {{-- On trace des lignes différentes en fonction du niveau d'entrée --}}
      @foreach ($bacPlus9 as $value)

        @if ($loop->first && $value->niveau_entree == 'bac')
          <line x1="{{ $x['bac'] }}" y1="{{ $y['niveau_3'] }}" x2="{{ $x['bac + 9'] }}" y2="{{ $y['niveau_3'] }}" /> {{-- Bac => Bac + 9 --}}

        @elseif ($loop->first && $value->niveau_entree == 'bac + 5')
          <line x1="{{ $x['bac + 5'] }}" y1="{{ $y['niveau_3'] }}" x2="{{ $x['bac + 5'] }}" y2="{{ $y['niveau_5'] }}" />
          <line x1="{{ $x['bac + 5'] }}" y1="{{ $y['niveau_5'] }}" x2="{{ $x['bac + 9'] }}" y2="{{ $y['niveau_5'] }}" />
          <line x1="{{ $x['bac + 9'] }}" y1="{{ $y['niveau_3'] }}" x2="{{ $x['bac + 9'] }}" y2="{{ $y['niveau_5'] }}" />

          <circle cx="{{ $x['bac + 5'] }}" cy="{{ $y['niveau_3'] }}" r="5" />
        @endif

      @endforeach

      <circle cx="{{ $x['bac + 9'] }}" cy="{{ $y['niveau_3'] }}" r="16" stroke="black" niveau="bacPlus9" id="circle-bacPlus9"
      @if (in_array(91, $sousNiveauxInParcours) && $metier->id == $parcours->metier_id)
        class="circle-selected"
      @endif />

      <text x="{{ $x['bac + 9'] }}" y="{{ $y['niveau_3'] - 25 }}">Diplôme</text>
      <text x="{{ $x['bac + 9'] }}" y="{{ $y['niveau_3'] + 5 }}" cx="{{ $x['bac + 9'] }}" cy="{{ $y['niveau_3'] }}" niveau="bacPlus9" id="text-bacPlus9" class="svg-count
        @if (in_array(91, $sousNiveauxInParcours) && $metier->id == $parcours->metier_id)
          text-selected
        @endif ">
        {{ count($bacPlus9) }}
      </text>
    @endif

    {{-- BAC + 8 --}}
    @if (count($bacPlus8) > 0)

      {{-- On trace des lignes différentes en fonction du niveau d'entrée --}}
      @foreach ($bacPlus8 as $value)

        @if ($loop->first && $value->niveau_entree == 'bac + 5')
          <line x1="{{ $x['bac + 5'] }}" y1="{{ $y['niveau_5'] }}" x2="{{ $x['bac + 8'] }}" y2="{{ $y['niveau_3'] }}" />
          <line x1="{{ $x['bac + 5'] }}" y1="{{ $y['niveau_3'] }}" x2="{{ $x['bac + 8'] }}" y2="{{ $y['niveau_3'] }}" />
          <line x1="{{ $x['bac + 5'] }}" y1="{{ $y['niveau_1'] }}" x2="{{ $x['bac + 8'] }}" y2="{{ $y['niveau_3'] }}" />
          <text x="{{ $x['bac + 8'] }}" y="{{ $y['niveau_3'] - 25 }}">Diplôme 3e Cycle</text>

        @elseif ($loop->first && $value->niveau_entree == 'bac + 7')
          <line x1="{{ $x['bac + 7'] }}" y1="{{ $y['niveau_3'] }}" x2="{{ $x['bac + 8'] }}" y2="{{ $y['niveau_3'] }}" />
          <text x="{{ $x['bac + 8'] }}" y="{{ $y['niveau_3'] - 25 }}">CEAV</text>

          @if (count($bacPlus7) == 0)
            <line x1="{{ $x['bac'] }}" y1="{{ $y['niveau_3'] }}" x2="{{ $x['bac + 7'] }}" y2="{{ $y['niveau_3'] }}" />
            <circle cx="{{ $x['bac + 7'] }}" cy="{{ $y['niveau_3'] }}" r="5" />
            <circle cx="{{ $x['bac + 2'] }}" cy="{{ $y['niveau_3'] }}" r="5" />
          @endif
      @endif

      @endforeach

      <circle cx="{{ $x['bac + 8'] }}" cy="{{ $y['niveau_3'] }}" r="16" stroke="black" niveau="bacPlus8" id="circle-bacPlus8"
      @if (in_array(81, $sousNiveauxInParcours) && $metier->id == $parcours->metier_id)
        class="circle-selected"
      @endif />

      <text x="{{ $x['bac + 8'] }}" y="{{ $y['niveau_3'] + 5 }}" cx="{{ $x['bac + 8'] }}" cy="{{ $y['niveau_3'] }}" niveau="bacPlus8" id="text-bacPlus8" class="svg-count
        @if (in_array(81, $sousNiveauxInParcours) && $metier->id == $parcours->metier_id)
          text-selected
        @endif ">
        {{ count($bacPlus8) }}
      </text>
    @endif

    {{-- BAC + 7 --}}
    @if (count($bacPlus7) > 0)

      {{-- On trace des lignes différentes en fonction du niveau d'entrée --}}
      @foreach ($bacPlus7 as $value)

        {{-- Entrée Bac + 2 --}}
        @if ($loop->first && $value->niveau_entree == 'bac + 2')
          <line x1="{{ $x['bac + 2'] }}" y1="{{ $y['niveau_1'] }}" x2="{{ $x['bac + 2'] }}" y2="{{ $y['niveau_3'] }}" />
          <line x1="{{ $x['bac + 2'] }}" y1="{{ $y['niveau_3'] }}" x2="{{ $x['bac + 7'] }}" y2="{{ $y['niveau_3'] }}" />

        {{-- Entrée Bac + 4 --}}
        @elseif ($loop->first && $value->niveau_entree == 'bac + 4')
          <line x1="{{ $x['bac + 4'] }}" y1="{{ $y['niveau_6'] }}" x2="{{ $x['bac + 7'] }}" y2="{{ $y['niveau_6'] }}" />
          <line x1="{{ $x['bac + 7'] }}" y1="{{ $y['niveau_6'] }}" x2="{{ $x['bac + 7'] }}" y2="{{ $y['niveau_3'] }}" />
          <line x1="{{ $x['bac + 4'] }}" y1="{{ $y['niveau_5'] }}" x2="{{ $x['bac + 4'] }}" y2="{{ $y['niveau_6'] }}" />

        {{-- Entrée Bac + 5 --}}
        @elseif ($loop->first && $value->niveau_entree == 'bac + 5')

          @if (count($diplomesEcole) > 0)
            <polyline points="
              {{ $x['bac + 5'] }}, {{ $y['niveau_5'] }}
              {{ $x['bac + 7'] }}, {{ $y['niveau_5'] }}
              {{ $x['bac + 7'] }}, {{ $y['niveau_3'] }}
              " />

            <polyline points="
              {{ $x['bac + 5'] }}, {{ $y['niveau_1'] }}
              {{ $x['bac + 7'] }}, {{ $y['niveau_1'] }}
              {{ $x['bac + 7'] }}, {{ $y['niveau_3'] }}
              " />

            <line x1="{{ $x['bac + 5'] }}" y1="{{ $y['niveau_3'] }}" x2="{{ $x['bac + 7'] }}" y2="{{ $y['niveau_3'] }}" />

          @else

            @if (count($masters) > 0)
              <line x1="{{ $x['bac + 5'] }}" y1="{{ $y['niveau_5'] }}" x2="{{ $x['bac + 7'] }}" y2="{{ $y['niveau_3'] }}" />
            @endif

            @if (count($mastersPro) > 0)
              <line x1="{{ $x['bac + 5'] }}" y1="{{ $y['niveau_1'] }}" x2="{{ $x['bac + 7'] }}" y2="{{ $y['niveau_3'] }}" />
            @endif

          @endif


        {{-- Entrée Bac + 6 --}}
        @elseif ($loop->first && $value->niveau_entree == 'bac + 6')
          <line x1="{{ $x['bac'] }}" y1="{{ $y['niveau_3'] }}" x2="{{ $x['bac + 7'] }}" y2="{{ $y['niveau_3'] }}" />
        @endif

      @endforeach

      <circle cx="{{ $x['bac + 7'] }}" cy="{{ $y['niveau_3'] }}" r="16" stroke="black" niveau="bacPlus7" id="circle-bacPlus7"
      @if (in_array(71, $sousNiveauxInParcours) && $metier->id == $parcours->metier_id)
        class="circle-selected"
      @endif />

      <text x="{{ $x['bac + 7'] }}" y="{{ $y['niveau_3'] - 25 }}">Diplôme d'état</text>
      <text x="{{ $x['bac + 7'] }}" y="{{ $y['niveau_3'] + 5 }}" cx="{{ $x['bac + 7'] }}" cy="{{ $y['niveau_3'] }}" niveau="bacPlus7" id="text-bacPlus7" class="svg-count
        @if (in_array(71, $sousNiveauxInParcours) && $metier->id == $parcours->metier_id)
          text-selected
        @endif ">
        {{ count($bacPlus7) }}
      </text>
    @endif





    {{-- Entrée Bac + 5 / Sortie : Bac + 6 --}}
    @if (count($formations3Cycle) > 0)

      @if (count($masters) > 0)
        <line x1="{{ $x['bac + 5'] }}" y1="{{ $y['niveau_5'] }}" x2="{{ $x['bac + 6'] }}" y2="{{ $y['niveau_4'] }}" /> {{-- Master => Mastère --}}
      @endif

      @if ($diplomesEcole)
        <line x1="{{ $x['bac + 5'] }}" y1="{{ $y['niveau_3'] }}" x2="{{ $x['bac + 6'] }}" y2="{{ $y['niveau_4'] }}" /> {{-- Diplôme d'école => Mastère --}}
      @endif

      @if (count($mastersPro) > 0)
        <line x1="{{ $x['bac + 5'] }}" y1="{{ $y['niveau_1'] }}" x2="{{ $x['bac + 6'] }}" y2="{{ $y['niveau_4'] }}" /> {{-- Master Pro => Mastère --}}
      @endif

      <circle cx="{{ $x['bac + 6'] }}" cy="{{ $y['niveau_4'] }}" r="16" stroke="black" niveau="3Cycle" id="circle-3Cycle"
      @if (in_array(62, $sousNiveauxInParcours) && $metier->id == $parcours->metier_id)
        class="circle-selected"
      @endif />

      <text x="{{ $x['bac + 6'] }}" y="{{ $y['niveau_4'] - 25 }}">Mastère</text>
      <text x="{{ $x['bac + 6'] }}" y="{{ $y['niveau_4'] + 5 }}" cx="{{ $x['bac + 6'] }}" cy="{{ $y['niveau_4'] }}" niveau="3Cycle" id="text-3Cycle" class="svg-count
        @if (in_array(62, $sousNiveauxInParcours) && $metier->id == $parcours->metier_id)
          text-selected
        @endif ">
        {{ count($formations3Cycle) }}
      </text>

    @endif


    {{-- DIPLOMES D'ECOLE --}}
    @if (count($diplomesEcole) > 0)
      <line x1="{{ $x['bac'] }}" y1="{{ $y['niveau_3'] }}" x2="{{ $x['bac + 5'] }}" y2="{{ $y['niveau_3'] }}" /> {{-- Bac => Bac + 5 --}}

      <circle cx="{{ $x['bac + 5'] }}" cy="{{ $y['niveau_3'] }}" r="16" stroke="black" niveau="diplomesEcole" id="circle-diplomesEcole"
      @if (in_array(53, $sousNiveauxInParcours) && $metier->id == $parcours->metier_id)
        class="circle-selected"
      @endif />

      <text x="{{ $x['bac + 5'] }}" y="{{ $y['niveau_3'] - 25 }}">Diplôme d'école</text>
      <text x="{{ $x['bac + 5'] }}" y="{{ $y['niveau_3'] + 5 }}" cx="{{ $x['bac + 5'] }}" cy="{{ $y['niveau_3'] }}" niveau="diplomesEcole" id="text-diplomesEcole" class="svg-count
        @if (in_array(53, $sousNiveauxInParcours) && $metier->id == $parcours->metier_id)
          text-selected
        @endif ">
        {{ count($diplomesEcole) }}
      </text>

    @endif




    {{-- BTS/DUT/L2 + LICENCES PRO + MASTERS PRO --}}
    @if (count($btsDut) > 0 || count($licencesPro) > 0 || count($mastersPro) > 0)

      {{-- MASTER PRO --}}
      @if (count($mastersPro) > 0)
        <line x1="{{ $x['bac + 3'] }}" y1="{{ $y['niveau_1'] }}" x2="{{ $x['bac + 5'] }}" y2="{{ $y['niveau_1'] }}" /> {{-- Licences Pro => Masters Pro --}}

        <circle cx="{{ $x['bac + 5'] }}" cy="{{ $y['niveau_1'] }}" r="16" stroke="black" niveau="mastersPro" id="circle-mastersPro"
        @if (in_array(52, $sousNiveauxInParcours) && $metier->id == $parcours->metier_id)
          class="circle-selected"
        @endif />

        <text x="{{ $x['bac + 5'] }}" y="{{ $y['niveau_1'] - 25 }}">Master Pro</text>
        <text x="{{ $x['bac + 5'] }}" y="{{ $y['niveau_1'] + 5 }}" cx="{{ $x['bac + 5'] }}" cy="{{ $y['niveau_1'] }}" niveau="mastersPro" id="text-mastersPro" class="svg-count
          @if (in_array(52, $sousNiveauxInParcours) && $metier->id == $parcours->metier_id)
            text-selected
          @endif ">
          {{ count($mastersPro) }}
        </text>
      @endif

      {{-- LICENCES PRO --}}
      @if (count($mastersPro) > 0 || count($licencesPro) > 0)
        <line x1="{{ $x['bac + 2'] }}" y1="{{ $y['niveau_1'] }}" x2="{{ $x['bac + 3'] }}" y2="{{ $y['niveau_1'] }}" /> {{-- BTS/DUT => Licences Pro --}}
        <text x="{{ $x['bac + 3'] }}" y="{{ $y['niveau_1'] - 25 }}">Licence Pro</text>

        @if (count($licencesPro) == 0)

          <circle cx="{{ $x['bac + 3'] }}" cy="{{ $y['niveau_1'] }}" r="16" stroke="black" />
          <text x="{{ $x['bac + 3'] }}" y="{{ $y['niveau_1'] + 5 }}" class="svg-count">0</text>

        @else

          <circle cx="{{ $x['bac + 3'] }}" cy="{{ $y['niveau_1'] }}" r="16" stroke="black" niveau="licencesPro" id="circle-licencesPro"
          @if (in_array(32, $sousNiveauxInParcours) && $metier->id == $parcours->metier_id)
            class="circle-selected"
          @endif
           />

          <text x="{{ $x['bac + 3'] }}" y="{{ $y['niveau_1'] + 5 }}" cx="{{ $x['bac + 3'] }}" cy="{{ $y['niveau_1'] }}" niveau="licencesPro" id="text-licencesPro"
          class="svg-count
            @if (in_array(32, $sousNiveauxInParcours) && $metier->id == $parcours->metier_id)
              text-selected
            @endif ">
            {{ count($licencesPro) }}
          </text>

        @endif

      @endif

      {{-- BTS/DUT/L2 --}}
      @if (count($bacPro) > 0)
        <line x1="{{ $x['bac'] }}" y1="{{ $y['niveau_1'] }}" x2="{{ $x['bac + 2'] }}" y2="{{ $y['niveau_1'] }}" /> {{-- Bac Pro -> BTS/DUT --}}
      @endif

      <line x1="{{ $x['bac'] }}" y1="{{ $y['niveau_3'] }}" x2="{{ $x['bac + 2'] }}" y2="{{ $y['niveau_1'] }}" /> {{-- bac - > BTS/DUT --}}

      <circle cx="{{ $x['bac + 2'] }}" cy="{{ $y['niveau_1'] }}" r="16" stroke="black" niveau="btsDut" id="circle-btsDut"
      @if (in_array(21, $sousNiveauxInParcours) && $metier->id == $parcours->metier_id)
        class="circle-selected"
      @endif />

      <text x="{{ $x['bac + 2'] }}" y="{{ $y['niveau_1'] - 25 }}">BTS/DUT/L2</text>
      <text x="{{ $x['bac + 2'] }}" y="{{ $y['niveau_1'] + 5 }}" cx="{{ $x['bac + 2'] }}" cy="{{ $y['niveau_1'] }}" niveau="btsDut" id="text-btsDut" class="svg-count
        @if (in_array(21, $sousNiveauxInParcours) && $metier->id == $parcours->metier_id)
          text-selected
        @endif ">

        @if (count($licences) > 0 || count($licencesPro) > 0)
          {{ count($btsDut) + 1 }}
        @else
          {{ count($btsDut) }}
        @endif

      </text>


    @endif

    {{-- LICENCE + MASTER --}}
    @if (count($licences) > 0 || count($masters) > 0)

      {{-- MASTERS --}}
      @if (count($masters) > 0)
      <line x1="{{ $x['bac + 3'] }}" y1="{{ $y['niveau_5'] }}" x2="{{ $x['bac + 5'] }}" y2="{{ $y['niveau_5'] }}" /> {{-- Licence => Master--}}

      <circle cx="{{ $x['bac + 5'] }}" cy="{{ $y['niveau_5'] }}" r="16" stroke="black" niveau="masters" id="circle-masters"
      @if (in_array(51, $sousNiveauxInParcours) && $metier->id == $parcours->metier_id)
        class="circle-selected"
      @endif />

      <text x="{{ $x['bac + 5'] }}" y="{{ $y['niveau_5'] - 25 }}">Master</text>
      <text x="{{ $x['bac + 5'] }}" y="{{ $y['niveau_5'] + 5 }}" cx="{{ $x['bac + 5'] }}" cy="{{ $y['niveau_5'] }}" niveau="masters" id="text-masters" class="svg-count
        @if (in_array(51, $sousNiveauxInParcours) && $metier->id == $parcours->metier_id)
          text-selected
        @endif ">
        {{ count($masters) }}
      </text>
      @endif

      {{-- LICENCES --}}
      @if (count($bacPro) > 0)
        <line x1="{{ $x['bac'] }}" y1="{{ $y['niveau_1'] }}" x2="{{ $x['bac + 3'] }}" y2="{{ $y['niveau_5'] }}" /> {{-- Bac Pro => Licence --}}
      @endif

      <text x="{{ $x['bac + 3'] }}" y="{{ $y['niveau_5'] - 25 }}">Licence</text>
      <line x1="{{ $x['bac'] }}" y1="{{ $y['niveau_3'] }}" x2="{{ $x['bac + 3'] }}" y2="{{ $y['niveau_5'] }}" /> {{-- Bac Général => Licence --}}

      @if (count($licences) == 0)
        <circle cx="{{ $x['bac + 3'] }}" cy="{{ $y['niveau_5'] }}" r="16" stroke="black" />
        <text x="{{ $x['bac + 3'] }}" y="{{ $y['niveau_5'] + 5 }}" class="svg-count">0</text>
      @else
        <circle cx="{{ $x['bac + 3'] }}" cy="{{ $y['niveau_5'] }}" r="16" stroke="black" niveau="licences" id="circle-licences"
        @if (in_array(31, $sousNiveauxInParcours) && $metier->id == $parcours->metier_id)
          class="circle-selected"
        @endif />

        <text x="{{ $x['bac + 3'] }}" y="{{ $y['niveau_5'] + 5 }}" cx="{{ $x['bac + 3'] }}" cy="{{ $y['niveau_5'] }}" niveau="licences" id="text-licences" class="svg-count
          @if (in_array(31, $sousNiveauxInParcours) && $metier->id == $parcours->metier_id)
            text-selected
          @endif ">
          {{ count($licences) }}
        </text>
      @endif

    @endif

    {{-- Entrée Bac + 4 / Sortie : Bac + 6 --}}
    @if (count($formationsApresBacPlus4) > 0)

      @if ($diplomesEcole)
        <line x1="{{ $x['bac + 4'] }}" y1="{{ $y['niveau_3'] }}" x2="{{ $x['bac + 4'] }}" y2="{{ $y['niveau_2'] }}" />
        <circle cx="{{ $x['bac + 4'] }}" cy="{{ $y['niveau_3'] }}" />
      @endif

      @if ($licences && $masters)
        <line x1="{{ $x['bac + 4'] }}" y1="{{ $y['niveau_5'] }}" x2="{{ $x['bac + 4'] }}" y2="{{ $y['niveau_2'] }}" />
        <circle cx="{{ $x['bac + 4'] }}" cy="{{ $y['niveau_5'] }}" />
      @endif

      @if (count($mastersPro) > 0)
        <line x1="{{ $x['bac + 4'] }}" y1="{{ $y['niveau_1'] }}" x2="{{ $x['bac + 4'] }}" y2="{{ $y['niveau_2'] }}" />
        <circle cx="{{ $x['bac + 4'] }}" cy="{{ $y['niveau_1'] }}" />
      @endif

      <line x1="{{ $x['bac + 4'] }}" y1="{{ $y['niveau_2'] }}" x2="{{ $x['bac + 6'] }}" y2="{{ $y['niveau_2'] }}" />

      <circle cx="{{ $x['bac + 6'] }}" cy="{{ $y['niveau_2'] }}" r="16" stroke="black" niveau="ApresBacPlus4" id="circle-ApresBacPlus4"
      @if (in_array(63, $sousNiveauxInParcours) && $metier->id == $parcours->metier_id)
        class="circle-selected"
      @endif />

      <text x="{{ $x['bac + 6'] }}" y="{{ $y['niveau_2'] - 25 }}">
        @foreach ($formationsApresBacPlus4 as $value)
            @if ($loop->first && $value->intitule == "Certificat d'aptitude à la profession d'avocat")
              CAPA
            @elseif ($loop->first && strpos($value->intitule, 'mastère') !== false)
              Mastère
            @elseif ($loop->first && strpos($value->intitule, 'diplôme') !== false)
              Diplôme spécialisé
            @endif
        @endforeach
      </text>

      <text x="{{ $x['bac + 6'] }}" y="{{ $y['niveau_2'] + 5 }}" cx="{{ $x['bac + 6'] }}" cy="{{ $y['niveau_2'] }}" niveau="ApresBacPlus4" id="text-ApresBacPlus4" class="svg-count
        @if (in_array(63, $sousNiveauxInParcours) && $metier->id == $parcours->metier_id)
          text-selected
        @endif ">
        {{ count($formationsApresBacPlus4) }}
      </text>

    @endif

    {{-- BAC PRO --}}
    @if (count($bacPro) > 0)
      <line x1="{{ $x['bac - 3'] }}" y1="{{ $y['niveau_3'] }}" x2="{{ $x['bac'] }}" y2="{{ $y['niveau_1'] }}" /> {{-- Brevet => Bac Pro --}}

      <circle cx="{{ $x['bac'] }}" cy="{{ $y['niveau_1'] }}" r="16" stroke="black" niveau="bacPro" id="circle-bacPro"
      @if (in_array(102, $sousNiveauxInParcours) && $metier->id == $parcours->metier_id)
        class="circle-selected"
      @endif />

      <text x="{{ $x['bac'] }}" y="{{ $y['niveau_1'] - 25 }}">Bac Pro</text>
      <text x="{{ $x['bac'] }}" y="{{ $y['niveau_1'] + 5 }}" cx="{{ $x['bac'] }}" cy="{{ $y['niveau_1'] }}" niveau="bacPro" id="text-bacPro" class="svg-count
        @if (in_array(102, $sousNiveauxInParcours) && $metier->id == $parcours->metier_id)
          text-selected
        @endif ">
        {{ count($bacPro) }}
      </text>
    @endif

    {{-- BAC GENERAL --}}
    @if (count($bacGeneral) > 0)
      <line x1="{{ $x['bac - 3'] }}" y1="{{ $y['niveau_3'] }}" x2="{{ $x['bac - 1'] }}" y2="{{ $y['niveau_3'] }}" stroke-dasharray="5, 5" />
      <line x1="{{ $x['bac - 1'] }}" y1="{{ $y['niveau_3'] }}" x2="{{ $x['bac'] }}" y2="{{ $y['niveau_3'] }}" /> {{-- Brevet => Bac Général --}}

      <circle cx="{{ $x['bac'] }}" cy="{{ $y['niveau_3'] }}" r="16" stroke="black" niveau="bacGeneral" id="circle-bacGeneral"
      @if (in_array(101, $sousNiveauxInParcours) && $metier->id == $parcours->metier_id)
        class="circle-selected"
      @endif />

      <text x="{{ $x['bac'] }}" y="{{ $y['niveau_3'] - 25 }}">Bac Général / Techno</text>
      <text x="{{ $x['bac'] }}" y="{{ $y['niveau_3'] + 5 }}" cx="{{ $x['bac'] }}" cy="{{ $y['niveau_3'] }}" niveau="bacGeneral" id="text-bacGeneral" class="svg-count
      @if (in_array(101, $sousNiveauxInParcours) && $metier->id == $parcours->metier_id)
          text-selected
        @endif ">
        {{ count($bacGeneral) }}
      </text>
    @endif

    {{-- BREVET PRO --}}
    @if (count($brevetPro) > 0)
      <line x1="{{ $x['bac - 3'] }}" y1="{{ $y['niveau_3'] }}" x2="{{ $x['bac - 1'] }}" y2="{{ $y['niveau_1'] }}" stroke-dasharray="5, 5" />

      <circle cx="{{ $x['bac - 1'] }}" cy="{{ $y['niveau_1'] }}" r="16" stroke="black" niveau="brevetPro" id="circle-brevetPro"
      @if (in_array(112, $sousNiveauxInParcours) && $metier->id == $parcours->metier_id)
        class="circle-selected"
      @endif />

      <text x="{{ $x['bac - 1'] }}" y="{{ $y['niveau_1'] - 25 }}">BP</text>
      <text x="{{ $x['bac - 1'] }}" y="{{ $y['niveau_1'] + 5 }}" cx="{{ $x['bac - 1'] }}" cy="{{ $y['niveau_1'] }}" niveau="brevetPro" id="text-brevetPro" class="svg-count
        @if (in_array(112, $sousNiveauxInParcours) && $metier->id == $parcours->metier_id)
          text-selected
        @endif ">
        {{ count($brevetPro) }}
      </text>
    @endif

    {{-- CAP --}}
    @if (count($cap) > 0)
      <line x1="{{ $x['bac - 3'] }}" y1="{{ $y['niveau_3'] }}" x2="{{ $x['bac - 1'] }}" y2="{{ $y['niveau_5'] }}" stroke-dasharray="5, 5" /> {{-- Brevet => CAP --}}

      <circle cx="{{ $x['bac - 1'] }}" cy="{{ $y['niveau_5'] }}" r="16" stroke="black" niveau="cap" id="circle-cap"
      @if (in_array(111, $sousNiveauxInParcours) && $metier->id == $parcours->metier_id)
        class="circle-selected"
      @endif />

      <text x="{{ $x['bac - 1'] }}" y="{{ $y['niveau_5'] - 25 }}">CAP</text>
      <text x="{{ $x['bac - 1'] }}" y="{{ $y['niveau_5'] + 5 }}" cx="{{ $x['bac - 1'] }}" cy="{{ $y['niveau_5'] }}" niveau="cap" id="text-cap" class="svg-count
        @if (in_array(111, $sousNiveauxInParcours) && $metier->id == $parcours->metier_id)
          text-selected
        @endif ">
        {{ count($cap) }}
      </text>
    @endif

    {{-- BREVET --}}
    <line x1="0" y1="{{ $y['niveau_3'] }}" x2="{{ $x['bac - 3'] }}" y2="{{ $y['niveau_3'] }}" /> {{-- 0 => Brevet --}}
    <circle cx="{{ $x['bac - 3'] }}" cy="{{ $y['niveau_3'] }}" r="5" stroke="black" niveau="brevet" id="circle-brevet"
    @if (in_array(121, $sousNiveauxInParcours) && $metier->id == $parcours->metier_id)
      class="circle-selected"
    @endif />
    <text x="{{ $x['bac - 3'] }}" y="{{ $y['niveau_3'] - 15 }}">Brevet</text>

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

{{------------------------------ TOOLTIPS ------------------------------}}
@include('parcours.tooltips')

{{------------------------- LISTES FORMATIONS -------------------------}}
@include('parcours.listes_parcours')
