{{-- Careerdirect --}}
@extends('layouts.master') @section('title', 'Fiche Careerdirect')

@section('main_title')
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <h4 class="text-uppercase">
        @if (Auth::user() && Auth::user()->id == $user->id)
          VALEURS
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
        <ul>
          <li><a href="{{ route('career_direct', ['id' => Auth::id()]) }}"><img src="{{ asset('img/back.png') }}" style="height: 25px; width: 25px"></a></li>
          <li><a href="#environnement" class="sous-menu-link text-uppercase">Environnement de Travail</a></li>
          <li><a href="#attentes" class="sous-menu-link text-uppercase">Attentes</a></li>
          <li><a href="#vie" class="sous-menu-link text-uppercase">Valeurs de Vie</a></li>
          <li><a href="#conclusion" class="sous-menu-link text-uppercase">Conclusion</a></li>
        </ul>
      </div>
    </div>
  </div>
@endsection
@section('content')

<h4 class="cdreport-header"><?php echo $bath[27]->nodeValue, PHP_EOL; ?></h4>
<p><?php echo $documents[101]->nodeValue, PHP_EOL ?></p>
<p><?php echo $documents[102]->nodeValue, PHP_EOL ?></p>
<p><?php echo $documents[103]->nodeValue, PHP_EOL ?></p>

<hr class="bg-vert trait-titre mb-4">

<div class="row">
<div class="col-lg-12">

  <table class="table table-bordered table-recherche text-center">
    <tbody>

              <tr class="liste-titre liste-vert-titre" id="environnement">
        <td colspan="2">
          <a href="{{ route('career_direct_valeursenvironnementtravail', ['id' => Auth::id()]) }}" class="lien-fiche">VALEURS: Environnement de Travail</a>
        </td>
      </tr>
      <tr class="liste-recherche liste-vert">
        <td>
          <p><?php echo $documents[104]->nodeValue, PHP_EOL. '...' ?></p>
        </td>
        <td class="align-middle"><a href="{{ route('career_direct_valeursenvironnementtravail', ['id' => Auth::id()]) }}"><i class="icon ion-clipboard"></i></a></td>
      </tr>
      <tr class="liste-spacer"> </tr>

              <tr class="liste-titre liste-vert-titre" id="attentes">
        <td colspan="2">
          <a href="{{ route('career_direct_valeursattentes', ['id' => Auth::id()]) }}" class="lien-fiche">VALEURS: Vos attentes vis-à-vis de votre travail</a>
        </td>
      </tr>
      <tr class="liste-recherche liste-vert">
        <td>
          <p><?php echo $documents[110]->nodeValue, PHP_EOL. '...' ?></p>
        </td>
        <td class="align-middle"><a href="{{ route('career_direct_valeursattentes', ['id' => Auth::id()]) }}"><i class="icon ion-clipboard"></i></a></td>
      </tr>
      <tr class="liste-spacer"> </tr>

              <tr class="liste-titre liste-vert-titre" id="vie">
        <td colspan="2">
          <a href="{{ route('career_direct_valeursvie', ['id' => Auth::id()]) }}" class="lien-fiche">VALEURS: Valeurs de Vie</a>
        </td>
        </tr>
        <tr class="liste-recherche liste-vert">
        <td>
          <p><?php echo $documents[116]->nodeValue, PHP_EOL. '...' ?></p>
        </td>
        <td class="align-middle"><a href="{{ route('career_direct_valeursvie', ['id' => Auth::id()]) }}"><i class="icon ion-clipboard"></i></a></td>
        </tr>
        <tr class="liste-spacer"> </tr>

              <tr class="liste-titre liste-vert-titre" id="conclusion">
        <td colspan="2">
          <a href="{{ route('career_direct_valeursconclusion', ['id' => Auth::id()]) }}" class="lien-fiche">VALEURS: Conclusion</a>
        </td>
      </tr>
      <tr class="liste-recherche liste-vert">
        <td>
          <p><?php echo $documents[120]->nodeValue, PHP_EOL. '...' ?></p>
        </td>
        <td class="align-middle"><a href="{{ route('career_direct_valeursconclusion', ['id' => Auth::id()]) }}"><i class="icon ion-clipboard"></i></a></td>
      </tr>
      <tr class="liste-spacer"> </tr>
    </tbody>
  </table>

</div>
</div>

        </div>
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

  </script>
@endsection
