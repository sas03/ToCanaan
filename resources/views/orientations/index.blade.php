@extends('layouts.master')

@section('title', 'Orientation')

@section('main_title')

  {{-- ----------------- LOGO EN HAUT DE LA PAGE ----------------- --}}
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">
        <h4 class="text-uppercase">Espace Orientation</h4>
      </div>
    </div>
  </div>
  <hr class="bg-rose trait-titre">

@endsection

@section('content')

  {{-- Color Test
  <div class="row">
    <div class="col-lg-1" style="background-color: white"></div>
    <div class="col-lg-1" style="background-color: orange"></div>
    <div class="col-lg-1" style="background-color: purple"></div>
    <div class="col-lg-1" style="background-color: blue"></div>
    <div class="col-lg-1" style="background-color: green"></div>
    <div class="col-lg-1" style="background-color: grey"></div>
    <div class="col-lg-1" style="background-color: yellow"></div>
    <div class="col-lg-1" style="background-color: pink"></div>
    <div class="col-lg-1" style="background-color: red"></div>
    <div class="col-lg-1" style="background-color: skyblue"></div>
    <div class="col-lg-1" style="background-color: violet"></div>
    <div class="col-lg-1" style="background-color: brown"></div>
  </div>
   --}}

  {{-- ----------------- CONTACT ----------------- --}}

  <div class="container-fluid row row-contact justify-content-center mb-5">
    <!-- <div class="col-lg-12">
      <h4 class="text-center">Pour mieux s'orienter, pour quelles études et métiers êtes vous fait ?</h4>
    </div> -->
    
    <div class="row mb-5">
    <div class="col-md-12 bg-light-rose border border-primary rounded px-4">
      <h3 class="text-center">Bienvenue sur le test d'orientation de ToCanaan </h3>
      <hr class="bg-rose trait-titre mb-3">
      <p>Ce test est gratuit et conçu pour ToCanaan à partir des modèles d'évaluation les plus largement éprouvés. 
      Il comporte 3 parties indépendantes évaluant, les intérêts professionnels, les motivations et la personnalité. 
      A partir des résultats combinés de ces trois tests, une liste de 20 métiers vous est proposée en fonction des probabilités de réussite dans chacun d'entre eux. 
      Ce test constitue un outil d'aide à l'orientation et n'a pas l'ambition de décider d'un chemin tout tracé.</p>
    </div>
  </div>
  </div>

  <!--  
  <div class="row text-center mb-5">
    <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">
      @if (Auth::guard('web')->user())
      <a href="{{ route('orientation_index', ['id' => Auth::id()]) }}" class="btn bg-rose pt-3 pb-3 pl-5 pr-5">
      @else
        <a href="{{ route('login') }}" class="btn bg-rose pt-3 pb-3 pl-5 pr-5">
      @endif
        Identifiez-vous</a>
        @if (Auth::guard('web')->user())
        <a href="{{ route('orientation_index', ['id' => Auth::id()]) }}" class="btn bg-rose pt-3 pb-3 pl-5 pr-5">
        @else
      <a href="{{ route('register') }}" class="btn bg-rose pt-3 pb-3 pl-5 pr-5 m-3">@endif Inscrivez-vous</a>
      <a href="{{ route('home') }}" class="btn bg-rose pt-3 pb-3 pl-5 pr-5">Revenir sur ToCanaan</a></div>
  </div> -->



<hr class="bg-rose trait-titre mb-3">
{{-- <div class="bg-dark border border-primary rounded"> --}}
<div class="mb-5">

  <div class="row">
    <div class="col-lg-6 card-competences-metier"> 
    <!-- <div class="col-lg-6 card-temoignages"> -->

      <div class="card mb-4 bg-light-rose custom-card">
        <div class="card-body">
          <h4 class="card-title bg-rose">Pourquoi faire un test d'orientation ?</h4>

          <ul class="card-text">
            <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">
              <p class="mb-5">Le test d’orientation est l’un des outils de base sur lequel vous pouvez appuyer votre réflexion concernant vos études et votre projet professionnel. C’est un premier pas dans la maturation de votre projet et il a pour avantage de souvent ouvrir votre esprit vers de nouvelles perspectives, jusque là inconnues ou ignorées. C’est aussi l’occasion de mieux se connaître et de révéler des aspects de votre personnalité que vous aviez peut-être sous-estimée.</p>
            </div>



            <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12 mb-5">@if (Auth::guard('web')->user() && $careerdirectuserid == NULL)
            <a href="{{ route('careerdirectsignin', ['id' => Auth::id()]) }}" class="btn bg-rose btn-lg btn-block">
            @elseif (Auth::guard('web')->user() && $careerdirectuserid != NULL)
            <a href="{{ route('careerdirectzone', ['id' => Auth::id()]) }}" class="btn bg-rose btn-lg btn-block">
            @else
              <a href="{{ route('login') }}" class="btn bg-rose btn-lg btn-block">
            @endif Commencer le test</a></div>
          </ul>
        </div>
      </div>
    </div>

    <div class="col-lg-6 card-competences-metier mCustomScrollbar">

      <div class="card mb-4 bg-light-rose custom-card">
        <div class="card-body">
          <h4 class="card-title bg-rose">Test d’orientation ou conseiller d’orientation ?</h4>

          <ul class="card-text">
            <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">
              <p class="mb-5">Le test d'orientation est un complément au conseiller d’orientation. En effet, il ne vous donnera pas de solution d’orientation prémâchée, mais vous aidera plutôt à mieux organiser votre réflexion autour de votre orientation et votre projet professionnel. Le conseiller en orientation, lui, fera une véritable analyse, plus poussée, de votre profil, de vos capacités scolaires et de vos envies afin de déterminer, après entretien avec vous et peut-être vos parents, quelle serait la meilleure voie d’études à suivre pour atteindre votre projet professionnel. Et si ce dernier est encore flou, là encore le rôle du conseiller d’orientation est de vous éclairer pour mieux le définir. Ces deux « outils » vont donc de pair !</p>
            </div>

            <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">@if (Auth::guard('web')->user())
            <a href="{{ route('orientation_test', ['id' => Auth::id()]) }}" class="btn bg-rose btn-lg btn-block">
            @else
              <a href="{{ route('login') }}" class="btn bg-rose btn-lg btn-block">
            @endif Commencer le test</a></div>
          </ul>
        </div>
      </div>

    </div>

  </div>

  <div class="row" id="metier-informations">
    <div class="col-lg-12 card-competences-metier">
      <div class="card mb-4 bg-light-vert custom-card">
        <div class="card-body">

          <h4 class="card-title bg-vert">Un test d’orientation peut-il déterminer mon futur ?</h4>

          <ul class="card-text">
            <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">
              <p class="mb-5">Objectivement : non, bien sûr ! Un test d’orientation, de 10 ou même 25 minutes, ne pourra pas, vous vous en doutez bien, être assez représentatif de vos goûts, votre personnalité, vos traits de caractère….et vous donner la solution miracle. Cependant, quel que soit le test, il pose des questions auxquelles vous n’avez peut-être jamais pensé, et dont les réponses vous permettront de mûrir votre réflexion sur vous-même, surtout si vous ne savez pas quelles études envisager pour la suite... Il vous donnera des pistes à explorer, et qui, peut-être, vous donneront de nouvelles envies et de nouveaux objectifs. Et c’est justement le but recherché d’un test d’orientation : vous orienter, vous conforter dans un choix ou vous ouvrir à de nouveaux horizons !</p>
            </div>


            <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">@if (Auth::guard('web')->user())
            <a href="{{ route('orientation_test', ['id' => Auth::id()]) }}" class="btn bg-vert">
            @else
              <a href="{{ route('login') }}" class="btn bg-vert">
            @endif Commencer le test</a></div>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-lg-12">

      <div class="card mb-4 bg-light-rose custom-card card-temoignages">
        <div class="card-body">
          <h4 class="card-title bg-rose">Explication d'expert !</h4>

          <p class="card-text">
            <iframe width="720" height="405" src="{{ $orientation[1]->video }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
          </p>
        </div>
      </div>

    </div>

  </div>
  </div>
</div>

@endsection

@section('javascript')
  <script type="text/javascript">
    $(function () {
      $(".card-metiers-connexes").mCustomScrollbar();
      $(".card-competences-metier .card-text").mCustomScrollbar();
    });

  </script>
@endsection
