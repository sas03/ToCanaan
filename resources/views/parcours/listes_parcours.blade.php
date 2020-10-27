{{-- BAC PRO --}}
@php $i = 1; @endphp
<table id="liste-bacPro" class="table table-hover liste-formations">
  @foreach ($bacPro as $key => $value)
    <tr>
      <td class="colNum">{{ $i++ }}</td>
      <td>
        <a dbid="{{$value->id}}" niveau="102" href="{{ route('fiche_formation', $value->id) }}" class="lien-formation
          @if (in_array($value->id, $formationsInParcours))
           selected
          @endif ">
          {{ ucfirst($value->nom) }}
        </a>
      </td>

      @if (!Auth::guard('web_societe')->user())
        <td><button type="button" class="btn btn-pin"><i class="icon ion-pin"></i></button></td>
      @endif
    </tr>
  @endforeach
</table>

{{-- BAC GENERAL / TECHNO --}}
@php $i = 1; @endphp
<table id="liste-bacGeneral" class="table table-hover liste-formations">
  @foreach ($bacGeneral as $key => $value)
    <tr>
      <td class="colNum">{{ $i++ }}</td>
      <td>
        <a dbid="{{$value->id}}" niveau="101" href="{{ route('fiche_formation', $value->id) }}" class="lien-formation
          {{-- @if ($value->id == $parcours->bac_id) --}}
          @if (in_array($value->id, $formationsInParcours))
           selected
          @endif ">
          {{ ucfirst($value->nom) }}
        </a>
      </td>

      @if (!Auth::guard('web_societe')->user())
        <td><button type="button" class="btn btn-pin"><i class="icon ion-pin"></i></button></td>
      @endif
    </tr>
  @endforeach
</table>

{{-- CAP --}}
@php $i = 1; @endphp
<table id="liste-cap" class="table table-hover liste-formations">
  @foreach ($cap as $key => $value)
    <tr>
      <td class="colNum">{{ $i++ }}</td>
      <td>
        <a dbid="{{$value->id}}" niveau="111" href="{{ route('fiche_formation', $value->id) }}" class="lien-formation
          @if (in_array($value->id, $formationsInParcours))
           selected
          @endif ">
          {{ ucfirst($value->nom) }}
        </a>
      </td>

      @if (!Auth::guard('web_societe')->user())
        <td><button type="button" class="btn btn-pin"><i class="icon ion-pin"></i></button></td>
      @endif
    </tr>
  @endforeach
</table>

{{-- BREVET PRO --}}
@php $i = 1; @endphp
<table id="liste-brevetPro" class="table table-hover liste-formations">
  @foreach ($brevetPro as $key => $value)
    <tr>
      <td class="colNum">{{ $i++ }}</td>
      <td>
        <a dbid="{{$value->id}}" niveau="112" href="{{ route('fiche_formation', $value->id) }}" class="lien-formation
          @if (in_array($value->id, $formationsInParcours))
           selected
          @endif ">
          {{ ucfirst($value->nom) }}
        </a>
      </td>

      @if (!Auth::guard('web_societe')->user())
        <td><button type="button" class="btn btn-pin"><i class="icon ion-pin"></i></button></td>
      @endif
    </tr>
  @endforeach
</table>

{{-- BTS / DUT / L2 --}}
@php $i = 1; @endphp
<table id="liste-btsDut" class="table table-hover liste-formations">

  @foreach ($btsDut as $key => $value)
    <tr>
      <td class="colNum">{{ $i++ }}</td>
      <td>
        <a dbid="{{$value->id}}" niveau="21" href="{{ route('fiche_formation', $value->id) }}" class="lien-formation
          @if (in_array($value->id, $formationsInParcours))
           selected
          @endif ">
          {{ ucfirst($value->nom) }}
        </a>
      </td>

      @if (!Auth::guard('web_societe')->user())
        <td><button type="button" class="btn btn-pin"><i class="icon ion-pin"></i></button></td>
      @endif
    </tr>
  @endforeach

  @if (count($licences) > 0 || count($licencesPro) > 0)
    <tr>
      <td class="colNum">{{ $i }}</td>
      <td>
        <a dbid="" niveau="" href="#" class="lien-formation">L2 (2e année de licence validée/120 crédits ECTS - European Credits Transfer System)</a>
      </td>

      @if (!Auth::guard('web_societe')->user())
        <td><button type="button" class="btn btn-pin"><i class="icon ion-pin"></i></button></td>
      @endif
    </tr>
  @endif

</table>

{{-- LICENCES --}}
@php $i = 1; @endphp
<table id="liste-licences" class="table table-hover liste-formations">
  @foreach ($licences as $key => $value)
    <tr>
      <td class="colNum">{{ $i++ }}</td>
      <td>
        <a dbid="{{$value->id}}" niveau="31" href="{{ route('fiche_formation', $value->id) }}" class="lien-formation
          @if (in_array($value->id, $formationsInParcours))
           selected
          @endif ">
           {{ ucfirst($value->nom) }}
        </a>
      </td>

      @if (!Auth::guard('web_societe')->user())
        <td><button type="button" class="btn btn-pin"><i class="icon ion-pin"></i></button></td>
      @endif
    </tr>
  @endforeach
</table>

{{-- LICENCES PRO --}}
@php $i = 1; @endphp
<table id="liste-licencesPro" class="table table-hover liste-formations">
  @foreach ($licencesPro as $key => $value)
    <tr>
      <td class="colNum">{{ $i++ }}</td>
      <td>
        <a dbid="{{$value->id}}" niveau="32" href="{{ route('fiche_formation', $value->id) }}" class="lien-formation
          @if (in_array($value->id, $formationsInParcours))
           selected
          @endif ">
           {{ ucfirst($value->nom) }}
        </a>
      </td>

      @if (!Auth::guard('web_societe')->user())
        <td><button type="button" class="btn btn-pin"><i class="icon ion-pin"></i></button></td>
      @endif
    </tr>
  @endforeach
</table>

{{-- MASTERS --}}
@php $i = 1; @endphp
<table id="liste-masters" class="table table-hover liste-formations">
  @foreach ($masters as $key => $value)
    <tr>
      <td class="colNum">{{ $i++ }}</td>
      <td>
        <a dbid="{{$value->id}}" niveau="51" href="{{ route('fiche_formation', $value->id) }}" class="lien-formation
          @if (in_array($value->id, $formationsInParcours))
           selected
          @endif ">
          {{ ucfirst($value->nom) }}
        </a>
      </td>

      @if (!Auth::guard('web_societe')->user())
        <td><button type="button" class="btn btn-pin"><i class="icon ion-pin"></i></button></td>
      @endif
    </tr>
  @endforeach
</table>

{{-- MASTERS PRO --}}
@php $i = 1; @endphp
<table id="liste-mastersPro" class="table table-hover liste-formations">
  @foreach ($mastersPro as $key => $value)
    <tr>
      <td class="colNum">{{ $i++ }}</td>
      <td>
        <a dbid="{{$value->id}}" niveau="52" href="{{ route('fiche_formation', $value->id) }}" class="lien-formation
          @if (in_array($value->id, $formationsInParcours))
           selected
          @endif ">
          {{ ucfirst($value->nom) }}
        </a>
      </td>

      @if (!Auth::guard('web_societe')->user())
        <td><button type="button" class="btn btn-pin"><i class="icon ion-pin"></i></button></td>
      @endif
    </tr>
  @endforeach
</table>

{{-- DIPLOMES D'ECOLE --}}
@php $i = 1; @endphp
<table id="liste-diplomesEcole" class="table table-hover liste-formations">
  @foreach ($diplomesEcole as $key => $value)
    <tr>
      <td class="colNum">{{ $i++ }}</td>
      <td>
        <a dbid="{{$value->id}}" niveau="53" href="{{ route('fiche_formation', $value->id) }}" class="lien-formation
          @if (in_array($value->id, $formationsInParcours))
           selected
          @endif ">
          {{ ucfirst($value->nom) }}
        </a>
      </td>

      @if (!Auth::guard('web_societe')->user())
        <td><button type="button" class="btn btn-pin"><i class="icon ion-pin"></i></button></td>
      @endif
    </tr>
  @endforeach
</table>

{{-- MASTERES --}}
@php $i = 1; @endphp
<table id="liste-3Cycle" class="table table-hover liste-formations">
  @foreach ($formations3Cycle as $key => $value)
    <tr>
      <td class="colNum">{{ $i++ }}</td>
      <td>
        <a dbid="{{$value->id}}" niveau="62" href="{{ route('fiche_formation', $value->id) }}" class="lien-formation
          @if (in_array($value->id, $formationsInParcours))
           selected
          @endif ">
          {{ ucfirst($value->nom) }}
        </a>
      </td>

      @if (!Auth::guard('web_societe')->user())
        <td><button type="button" class="btn btn-pin"><i class="icon ion-pin"></i></button></td>
      @endif
    </tr>
  @endforeach
</table>

{{-- CAPA / DIPLOMES / MASTERES --}}
@php $i = 1; @endphp
<table id="liste-ApresBacPlus4" class="table table-hover liste-formations">
  @foreach ($formationsApresBacPlus4 as $key => $value)
    <tr>
      <td class="colNum">{{ $i++ }}</td>
      <td>
        <a dbid="{{$value->id}}" niveau="63" href="{{ route('fiche_formation', $value->id) }}" class="lien-formation
          @if (in_array($value->id, $formationsInParcours))
           selected
          @endif ">
          {{ ucfirst($value->nom) }}
        </a>
      </td>

      @if (!Auth::guard('web_societe')->user())
        <td><button type="button" class="btn btn-pin"><i class="icon ion-pin"></i></button></td>
      @endif
    </tr>
  @endforeach
</table>

{{-- BAC + 6 --}}
@php $i = 1; @endphp
<table id="liste-bacPlus6" class="table table-hover liste-formations">
  @foreach ($bacPlus6 as $key => $value)
    <tr>
      <td class="colNum">{{ $i++ }}</td>
      <td>
        <a dbid="{{$value->id}}" niveau="61" href="{{ route('fiche_formation', $value->id) }}" class="lien-formation
          @if (in_array($value->id, $formationsInParcours))
           selected
          @endif ">
          {{ ucfirst($value->nom) }}
        </a>
      </td>

      @if (!Auth::guard('web_societe')->user())
        <td><button type="button" class="btn btn-pin"><i class="icon ion-pin"></i></button></td>
      @endif
    </tr>
  @endforeach
</table>

{{-- BAC + 7 --}}
@php $i = 1; @endphp
<table id="liste-bacPlus7" class="table table-hover liste-formations">
  @foreach ($bacPlus7 as $key => $value)
    <tr>
      <td class="colNum">{{ $i++ }}</td>
      <td>
        <a dbid="{{$value->id}}" niveau="71" href="{{ route('fiche_formation', $value->id) }}" class="lien-formation
          @if (in_array($value->id, $formationsInParcours))
           selected
          @endif ">
          {{ ucfirst($value->nom) }}
        </a>
      </td>

      @if (!Auth::guard('web_societe')->user())
        <td><button type="button" class="btn btn-pin"><i class="icon ion-pin"></i></button></td>
      @endif
    </tr>
  @endforeach
</table>

{{-- BAC + 8 --}}
@php $i = 1; @endphp
<table id="liste-bacPlus8" class="table table-hover liste-formations">
  @foreach ($bacPlus8 as $key => $value)
    <tr>
      <td class="colNum">{{ $i++ }}</td>
      <td>
        <a dbid="{{$value->id}}" niveau="81" href="{{ route('fiche_formation', $value->id) }}" class="lien-formation
          @if (in_array($value->id, $formationsInParcours))
           selected
          @endif ">
          {{ ucfirst($value->nom) }}
        </a>
      </td>

      @if (!Auth::guard('web_societe')->user())
        <td><button type="button" class="btn btn-pin"><i class="icon ion-pin"></i></button></td>
      @endif
    </tr>
  @endforeach
</table>

{{-- BAC + 9 ET PLUS --}}
@php $i = 1; @endphp
<table id="liste-bacPlus9" class="table table-hover liste-formations">
  @foreach ($bacPlus9 as $key => $value)
    <tr>
      <td class="colNum">{{ $i++ }}</td>
      <td>
        <a dbid="{{$value->id}}" niveau="91" href="{{ route('fiche_formation', $value->id) }}" class="lien-formation
          @if (in_array($value->id, $formationsInParcours))
           selected
          @endif ">
          {{ ucfirst($value->nom) }}
        </a>
      </td>

      @if (!Auth::guard('web_societe')->user())
        <td><button type="button" class="btn btn-pin"><i class="icon ion-pin"></i></button></td>
      @endif
    </tr>
  @endforeach
</table>
