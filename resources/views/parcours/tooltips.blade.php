{{-- Tooltip par défaut  --}}
<div id="tooltip-default" class='tooltip-card'>
  <div class='tooltip-bloc-text'>
    <a type='button' class='tooltip-link tooltip-link-formation' href=""></a>
  </div>
  <p class="tooltip-arrow-top">▲</p>
</div>

{{-- Tooltip bac pro  --}}
<div id="tooltip-bacPro" class='tooltip-card'>
  <div class='tooltip-bloc-text'>
    <a type='button' class='tooltip-link tooltip-link-formation' href=""></a>
  </div>
  <div class='tooltip-bloc-icons @if (!Auth::guard('web')->user() && !Auth::guard('web_societe')->user()) tooltip-bloc-icons-disabled @endif'>
      <i class="icon ion-arrow-left-b"></i>
      <i class="compteur"><span class="i"></span> / <span class="total"></span></i>
      <i class="icon ion-arrow-right-b"></i>
      <i class="icon ion-navicon" data-toggle="modal" data-target="#modal-parcours"></i>
      @if (!Auth::guard('web_societe')->user())
        <i class="icon ion-pin btn-pin-tooltip"></i>
      @endif

      @if (!Auth::guard('web')->user() && !Auth::guard('web_societe')->user() && !Auth::guard('web_societe')->user())
        <div class="tooltip-bloc-not-connected">
          <a href="{{ route('login') }}">CONNECTEZ-VOUS</a>
        </div>
      @endif
  </div>
  <p class="tooltip-arrow-top">▲</p>
</div>

{{-- Tooltip bac général  --}}
<div id="tooltip-bacGeneral" class='tooltip-card'>
  <div class='tooltip-bloc-text'>
    <a type='button' class='tooltip-link tooltip-link-formation' href=""></a>
  </div>
  <div class='tooltip-bloc-icons @if (!Auth::guard('web')->user() && !Auth::guard('web_societe')->user()) tooltip-bloc-icons-disabled @endif'>
      <i class="icon ion-arrow-left-b"></i>
      <i class="compteur"><span class="i"></span> / <span class="total"></span></i>
      <i class="icon ion-arrow-right-b"></i>
      <i class="icon ion-navicon" data-toggle="modal" data-target="#modal-parcours"></i>
      @if (!Auth::guard('web_societe')->user())
        <i class="icon ion-pin btn-pin-tooltip"></i>
      @endif

      @if (!Auth::guard('web')->user() && !Auth::guard('web_societe')->user())
        <div class="tooltip-bloc-not-connected">
          <a href="{{ route('login') }}">CONNECTEZ-VOUS</a>
        </div>
      @endif
  </div>

  <p class="tooltip-arrow-top">▲</p>
</div>

{{-- Tooltip cap  --}}
<div id="tooltip-cap" class='tooltip-card'>
  <div class='tooltip-bloc-text'>
    <a type='button' class='tooltip-link tooltip-link-formation' href=""></a>
  </div>
  <div class='tooltip-bloc-icons @if (!Auth::guard('web')->user() && !Auth::guard('web_societe')->user()) tooltip-bloc-icons-disabled @endif'>
      <i class="icon ion-arrow-left-b"></i>
      <i class="compteur"><span class="i"></span> / <span class="total"></span></i>
      <i class="icon ion-arrow-right-b"></i>
      <i class="icon ion-navicon" data-toggle="modal" data-target="#modal-parcours"></i>
      @if (!Auth::guard('web_societe')->user())
        <i class="icon ion-pin btn-pin-tooltip"></i>
      @endif

      @if (!Auth::guard('web')->user() && !Auth::guard('web_societe')->user())
        <div class="tooltip-bloc-not-connected">
          <a href="{{ route('login') }}">CONNECTEZ-VOUS</a>
        </div>
      @endif
  </div>
  <p class="tooltip-arrow-top">▲</p>
</div>

{{-- Tooltip brevet pro  --}}
<div id="tooltip-brevetPro" class='tooltip-card'>
  <div class='tooltip-bloc-text'>
    <a type='button' class='tooltip-link tooltip-link-formation' href=""></a>
  </div>
  <div class='tooltip-bloc-icons @if (!Auth::guard('web')->user() && !Auth::guard('web_societe')->user()) tooltip-bloc-icons-disabled @endif'>
      <i class="icon ion-arrow-left-b"></i>
      <i class="compteur"><span class="i"></span> / <span class="total"></span></i>
      <i class="icon ion-arrow-right-b"></i>
      <i class="icon ion-navicon" data-toggle="modal" data-target="#modal-parcours"></i>
      @if (!Auth::guard('web_societe')->user())
        <i class="icon ion-pin btn-pin-tooltip"></i>
      @endif

      @if (!Auth::guard('web')->user() && !Auth::guard('web_societe')->user())
        <div class="tooltip-bloc-not-connected">
          <a href="{{ route('login') }}">CONNECTEZ-VOUS</a>
        </div>
      @endif
  </div>
  <p class="tooltip-arrow-top">▲</p>
</div>

{{-- Tooltip bac + 2  --}}
<div id="tooltip-btsDut" class='tooltip-card'>
  <div class='tooltip-bloc-text'>
    <a type='button' class='tooltip-link tooltip-link-formation' href=""></a>
  </div>
  <div class='tooltip-bloc-icons @if (!Auth::guard('web')->user() && !Auth::guard('web_societe')->user()) tooltip-bloc-icons-disabled @endif'>
      <i class="icon ion-arrow-left-b"></i>
      <i class="compteur"><span class="i"></span> / <span class="total"></span></i>
      <i class="icon ion-arrow-right-b"></i>
      <i class="icon ion-navicon" data-toggle="modal" data-target="#modal-parcours"></i>
      @if (!Auth::guard('web_societe')->user())
        <i class="icon ion-pin btn-pin-tooltip"></i>
      @endif

      @if (!Auth::guard('web')->user() && !Auth::guard('web_societe')->user())
        <div class="tooltip-bloc-not-connected">
          <a href="{{ route('login') }}">CONNECTEZ-VOUS</a>
        </div>
      @endif
  </div>
  <p class="tooltip-arrow-top">▲</p>
</div>

{{-- Tooltip licencesPro --}}
<div id="tooltip-licencesPro" class='tooltip-card'>
  <div class='tooltip-bloc-text'>
    <a type='button' class='tooltip-link tooltip-link-formation' href=""></a>
  </div>
  <div class='tooltip-bloc-icons @if (!Auth::guard('web')->user() && !Auth::guard('web_societe')->user()) tooltip-bloc-icons-disabled @endif'>
      <i class="icon ion-arrow-left-b"></i>
      <i class="compteur"><span class="i"></span> / <span class="total"></span></i>
      <i class="icon ion-arrow-right-b"></i>
      <i class="icon ion-navicon" data-toggle="modal" data-target="#modal-parcours"></i>
      @if (!Auth::guard('web_societe')->user())
        <i class="icon ion-pin btn-pin-tooltip"></i>
      @endif

      @if (!Auth::guard('web')->user() && !Auth::guard('web_societe')->user())
        <div class="tooltip-bloc-not-connected">
          <a href="{{ route('login') }}">CONNECTEZ-VOUS</a>
        </div>
      @endif
  </div>
  <p class="tooltip-arrow-top">▲</p>
</div>

{{-- Tooltip licences --}}
<div id="tooltip-licences" class='tooltip-card'>
  <div class='tooltip-bloc-text'>
    <a type='button' class='tooltip-link tooltip-link-formation' href=""></a>
  </div>
  <div class='tooltip-bloc-icons @if (!Auth::guard('web')->user() && !Auth::guard('web_societe')->user()) tooltip-bloc-icons-disabled @endif'>
      <i class="icon ion-arrow-left-b"></i>
      <i class="compteur"><span class="i"></span> / <span class="total"></span></i>
      <i class="icon ion-arrow-right-b"></i>
      <i class="icon ion-navicon" data-toggle="modal" data-target="#modal-parcours"></i>
      @if (!Auth::guard('web_societe')->user())
        <i class="icon ion-pin btn-pin-tooltip"></i>
      @endif

      @if (!Auth::guard('web')->user() && !Auth::guard('web_societe')->user())
        <div class="tooltip-bloc-not-connected">
          <a href="{{ route('login') }}">CONNECTEZ-VOUS</a>
        </div>
      @endif
  </div>
  <p class="tooltip-arrow-top">▲</p>
</div>

{{-- Tooltip masters  --}}
<div id="tooltip-masters" class='tooltip-card'>
  <div class='tooltip-bloc-text'>
    <a type='button' class='tooltip-link tooltip-link-formation' href=""></a>
  </div>
  <div class='tooltip-bloc-icons @if (!Auth::guard('web')->user() && !Auth::guard('web_societe')->user()) tooltip-bloc-icons-disabled @endif'>
      <i class="icon ion-arrow-left-b"></i>
      <i class="compteur"><span class="i"></span> / <span class="total"></span></i>
      <i class="icon ion-arrow-right-b"></i>
      <i class="icon ion-navicon" data-toggle="modal" data-target="#modal-parcours"></i>
      @if (!Auth::guard('web_societe')->user())
        <i class="icon ion-pin btn-pin-tooltip"></i>
      @endif

      @if (!Auth::guard('web')->user() && !Auth::guard('web_societe')->user())
        <div class="tooltip-bloc-not-connected">
          <a href="{{ route('login') }}">CONNECTEZ-VOUS</a>
        </div>
      @endif
  </div>
  <p class="tooltip-arrow-top">▲</p>
</div>

{{-- Tooltip mastersPro  --}}
<div id="tooltip-mastersPro" class='tooltip-card'>
  <div class='tooltip-bloc-text'>
    <a type='button' class='tooltip-link tooltip-link-formation' href=""></a>
  </div>
  <div class='tooltip-bloc-icons @if (!Auth::guard('web')->user() && !Auth::guard('web_societe')->user()) tooltip-bloc-icons-disabled @endif'>
      <i class="icon ion-arrow-left-b"></i>
      <i class="compteur"><span class="i"></span> / <span class="total"></span></i>
      <i class="icon ion-arrow-right-b"></i>
      <i class="icon ion-navicon" data-toggle="modal" data-target="#modal-parcours"></i>
      @if (!Auth::guard('web_societe')->user())
        <i class="icon ion-pin btn-pin-tooltip"></i>
      @endif

      @if (!Auth::guard('web')->user() && !Auth::guard('web_societe')->user())
        <div class="tooltip-bloc-not-connected">
          <a href="{{ route('login') }}">CONNECTEZ-VOUS</a>
        </div>
      @endif
  </div>
  <p class="tooltip-arrow-top">▲</p>
</div>

{{-- Tooltip 5 ans  --}}
<div id="tooltip-diplomesEcole" class='tooltip-card'>
  <div class='tooltip-bloc-text'>
    <a type='button' class='tooltip-link tooltip-link-formation' href=""></a>
  </div>
  <div class='tooltip-bloc-icons @if (!Auth::guard('web')->user() && !Auth::guard('web_societe')->user()) tooltip-bloc-icons-disabled @endif'>
      <i class="icon ion-arrow-left-b"></i>
      <i class="compteur"><span class="i"></span> / <span class="total"></span></i>
      <i class="icon ion-arrow-right-b"></i>
      <i class="icon ion-navicon" data-toggle="modal" data-target="#modal-parcours"></i>
      @if (!Auth::guard('web_societe')->user())
        <i class="icon ion-pin btn-pin-tooltip"></i>
      @endif

      @if (!Auth::guard('web')->user() && !Auth::guard('web_societe')->user())
        <div class="tooltip-bloc-not-connected">
          <a href="{{ route('login') }}">CONNECTEZ-VOUS</a>
        </div>
      @endif
  </div>
  <p class="tooltip-arrow-top">▲</p>
</div>

{{-- Tooltip 3ème cycle  --}}
<div id="tooltip-3Cycle" class='tooltip-card'>
  <div class='tooltip-bloc-text'>
    <a type='button' class='tooltip-link tooltip-link-formation' href=""></a>
  </div>
  <div class='tooltip-bloc-icons @if (!Auth::guard('web')->user() && !Auth::guard('web_societe')->user()) tooltip-bloc-icons-disabled @endif'>
      <i class="icon ion-arrow-left-b"></i>
      <i class="compteur"><span class="i"></span> / <span class="total"></span></i>
      <i class="icon ion-arrow-right-b"></i>
      <i class="icon ion-navicon" data-toggle="modal" data-target="#modal-parcours"></i>
      @if (!Auth::guard('web_societe')->user())
        <i class="icon ion-pin btn-pin-tooltip"></i>
      @endif

      @if (!Auth::guard('web')->user() && !Auth::guard('web_societe')->user())
        <div class="tooltip-bloc-not-connected">
          <a href="{{ route('login') }}">CONNECTEZ-VOUS</a>
        </div>
      @endif
  </div>
  <p class="tooltip-arrow-top">▲</p>
</div>

{{-- Tooltip après bac + 4  --}}
<div id="tooltip-ApresBacPlus4" class='tooltip-card'>
  <div class='tooltip-bloc-text'>
    <a type='button' class='tooltip-link tooltip-link-formation' href=""></a>
  </div>
  <div class='tooltip-bloc-icons @if (!Auth::guard('web')->user() && !Auth::guard('web_societe')->user()) tooltip-bloc-icons-disabled @endif'>
      <i class="icon ion-arrow-left-b"></i>
      <i class="compteur"><span class="i"></span> / <span class="total"></span></i>
      <i class="icon ion-arrow-right-b"></i>
      <i class="icon ion-navicon" data-toggle="modal" data-target="#modal-parcours"></i>
      @if (!Auth::guard('web_societe')->user())
        <i class="icon ion-pin btn-pin-tooltip"></i>
      @endif

      @if (!Auth::guard('web')->user() && !Auth::guard('web_societe')->user())
        <div class="tooltip-bloc-not-connected">
          <a href="{{ route('login') }}">CONNECTEZ-VOUS</a>
        </div>
      @endif
  </div>
  <p class="tooltip-arrow-top">▲</p>
</div>

{{-- Tooltip bac + 6  --}}
<div id="tooltip-bacPlus6" class='tooltip-card'>
  <div class='tooltip-bloc-text'>
    <a type='button' class='tooltip-link tooltip-link-formation' href=""></a>
  </div>
  <div class='tooltip-bloc-icons @if (!Auth::guard('web')->user() && !Auth::guard('web_societe')->user()) tooltip-bloc-icons-disabled @endif'>
      <i class="icon ion-arrow-left-b"></i>
      <i class="compteur"><span class="i"></span> / <span class="total"></span></i>
      <i class="icon ion-arrow-right-b"></i>
      <i class="icon ion-navicon" data-toggle="modal" data-target="#modal-parcours"></i>
      @if (!Auth::guard('web_societe')->user())
        <i class="icon ion-pin btn-pin-tooltip"></i>
      @endif

      @if (!Auth::guard('web')->user() && !Auth::guard('web_societe')->user())
        <div class="tooltip-bloc-not-connected">
          <a href="{{ route('login') }}">CONNECTEZ-VOUS</a>
        </div>
      @endif
  </div>
  <p class="tooltip-arrow-top">▲</p>
</div>

{{-- Tooltip bac + 7  --}}
<div id="tooltip-bacPlus7" class='tooltip-card'>
  <div class='tooltip-bloc-text'>
    <a type='button' class='tooltip-link tooltip-link-formation' href=""></a>
  </div>
  <div class='tooltip-bloc-icons @if (!Auth::guard('web')->user() && !Auth::guard('web_societe')->user()) tooltip-bloc-icons-disabled @endif'>
      <i class="icon ion-arrow-left-b"></i>
      <i class="compteur"><span class="i"></span> / <span class="total"></span></i>
      <i class="icon ion-arrow-right-b"></i>
      <i class="icon ion-navicon" data-toggle="modal" data-target="#modal-parcours"></i>
      @if (!Auth::guard('web_societe')->user())
        <i class="icon ion-pin btn-pin-tooltip"></i>
      @endif

      @if (!Auth::guard('web')->user() && !Auth::guard('web_societe')->user())
        <div class="tooltip-bloc-not-connected">
          <a href="{{ route('login') }}">CONNECTEZ-VOUS</a>
        </div>
      @endif
  </div>
  <p class="tooltip-arrow-top">▲</p>
</div>

{{-- Tooltip bac + 8  --}}
<div id="tooltip-bacPlus8" class='tooltip-card'>
  <div class='tooltip-bloc-text'>
    <a type='button' class='tooltip-link tooltip-link-formation' href=""></a>
  </div>
  <div class='tooltip-bloc-icons @if (!Auth::guard('web')->user() && !Auth::guard('web_societe')->user()) tooltip-bloc-icons-disabled @endif'>
      <i class="icon ion-arrow-left-b"></i>
      <i class="compteur"><span class="i"></span> / <span class="total"></span></i>
      <i class="icon ion-arrow-right-b"></i>
      <i class="icon ion-navicon" data-toggle="modal" data-target="#modal-parcours"></i>
      @if (!Auth::guard('web_societe')->user())
        <i class="icon ion-pin btn-pin-tooltip"></i>
      @endif

      @if (!Auth::guard('web')->user() && !Auth::guard('web_societe')->user())
        <div class="tooltip-bloc-not-connected">
          <a href="{{ route('login') }}">CONNECTEZ-VOUS</a>
        </div>
      @endif
  </div>
  <p class="tooltip-arrow-top">▲</p>
</div>

{{-- Tooltip bac + 9  --}}
<div id="tooltip-bacPlus9" class='tooltip-card'>
  <div class='tooltip-bloc-text'>
    <a type='button' class='tooltip-link tooltip-link-formation' href=""></a>
  </div>
  <div class='tooltip-bloc-icons @if (!Auth::guard('web')->user() && !Auth::guard('web_societe')->user()) tooltip-bloc-icons-disabled @endif'>
      <i class="icon ion-arrow-left-b"></i>
      <i class="compteur"><span class="i"></span> / <span class="total"></span></i>
      <i class="icon ion-arrow-right-b"></i>
      <i class="icon ion-navicon" data-toggle="modal" data-target="#modal-parcours"></i>
      @if (!Auth::guard('web_societe')->user())
        <i class="icon ion-pin btn-pin-tooltip"></i>
      @endif

      @if (!Auth::guard('web')->user() && !Auth::guard('web_societe')->user())
        <div class="tooltip-bloc-not-connected">
          <a href="{{ route('login') }}">CONNECTEZ-VOUS</a>
        </div>
      @endif
  </div>
  <p class="tooltip-arrow-top">▲</p>
</div>
