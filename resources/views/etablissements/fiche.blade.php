@extends('layouts.master') @section('title', $etablissement->nom)

@section('main_title')
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <h4 class="text-uppercase">{{ $etablissement->nom  }}</h4>
      </div>

    </div>

  </div>

  <hr class="bg-violet trait-titre">
@endsection

@section('main_sous_menu')
  <div class="container">
    <div class="row row-sous-menu-fiche">
      <div class="col-lg-12">
        <ul>
          <li><a href="#etablissement-informations" class="sous-menu-link text-uppercase">Informations générales</a></li>
          <li><a href="#etablissement-formations" class="sous-menu-link text-uppercase">Formations</a></li>
        </ul>
      </div>
    </div>
  </div>

@endsection

@section('content')

<div class="row" id="etablissement-informations">

  <div class="col-lg-4">

    <div class="card mb-4 bg-light-violet custom-card">
      <div class="card-body">
        <h4 class="card-title bg-violet">Informations utiles</h4>
        <ul class="card-text">
          <li><strong> Statut</strong> <br> {{ $etablissement->statut }}</li>
          <li><strong> Académie</strong> <br> {{ $etablissement->academie }}</li>
          <li><a href="http://{{ $etablissement->site }}" target="_blank" class="link-underlined">Site de l'établissement</a></li>
        </ul>
      </div>
    </div>

    <div class="card mb-4 bg-light-violet custom-card">
      <div class="card-body">
        <h4 class="card-title bg-violet">Coordonnées</h4>
        <ul class="card-text">
          <li><strong> Téléphone</strong> <br>{{ $etablissement->telephone }}</li>
          <li><strong> Adresse</strong><br> {{ $etablissement->adresse }}</li>
          <li>{{ $etablissement->code_postal }} - {{ mb_strtoupper($etablissement->commune) }}</li>
          <li><em>{{ $etablissement->departement }} - {{ $etablissement->region }}</em></li>
        </ul>
      </div>
    </div>

  </div>

  <div class="col-lg-8">

    <div class="card mb-4 bg-light-jaune custom-card">
      <div class="card-body">
        <h4 class="card-title bg-jaune">Carte</h4>
          <div id="map" style="width: 100%; height: 395px;"></div>
      </div>
    </div>

  </div>

</div>

<div class="row" id="etablissement-formations">
  <div class="col-lg-12">

    <div class="card mb-4 bg-light-rose custom-card">
      <div class="card-body">

        <h4 class="card-title bg-rose">Formations ({{ count($formations) }})</h4>

        <table class="table table-bordered table-recherche text-center table-formations">

          <tbody>
          @foreach ($formationsTri as $niveauSortie => $value)

            @if (is_array($value))
              <tr class="liste-ficheEtablissement-niveau">
                <th colspan="2">{{ mb_strtoupper($niveauSortie) }}</th>
              </tr>

              @foreach ($value as $formation)

                <tr class="liste-titre liste-ficheEtablissement-titre">
                  <td colspan="2">
                    <a href="{{ route('fiche_formation', ['id' => $formation['id'] ]) }}" class="lien-fiche">
                      {{ ucfirst($formation['nom']) }}
                    </a>
                  </td>
                </tr>
                <tr class="liste-recherche liste-formation-ficheEtablissement">
                  <td>
                    <em><a href="{{ route('fiche_niveau_etudes', ['niveau' => $formation['niveau_sortie']]) }}">{{ mb_strtoupper($formation['niveau_sortie']) }}</a></em>
                    <br>
                    Cette formation dure {{ $formation['duree'] }}. Elle est accessible à partir du niveau "{{ mb_strtoupper($formation['niveau_entree']) }}".
                    <br>
                    @foreach ($etablissements as $formationId => $nbrEtablissements)
                      @if ($formation['id'] == $formationId)
                        Elle est proposée par <em><a href="{{ route('fiche_formation', ['id' => $formation['id'] ]) . '#formation-etablissements' }}">{{ $nbrEtablissements }} établissement(s)</a></em>.
                      @endif
                    @endforeach
                  </td>
                  <td class="align-middle"><a href="{{ route('fiche_formation', ['id' => $formation['id'] ]) }}"><i class="icon ion-clipboard"></i></a></td>
                </tr>
              @endforeach

            @endif

          @endforeach
          </tbody>

        </table>

      </div>
    </div>

  </div>
</div>

{{-- INFO WINDOW GOOGLE MAP --}}
<div class="box-infowindow">
  <div class="infowindow">
    <h4 class="text-violet">{{ $etablissement->nom }}</h4>
    <p>{{ $etablissement->adresse }} <br> {{ $etablissement->code_postal }}, {{ mb_strtoupper($etablissement->commune) }}</p>
    <p>{{ $etablissement->telephone }}</p>
    <p><a href="http://{{ $etablissement->site }}" target="_blank">Site</a></p>
  </div>
</div>


@endsection

@section('javascript')
  <script src="https://maps.google.com/maps/api/js?key=AIzaSyB8gdG08EH5ZFWWYonPMIUTGQv2n_11deU" type="text/javascript"></script>

  <script type="text/javascript">

  $(function(){

    /**************************** SCRIPT GOOGLE MAP ****************************/

    var address = '{{ $etablissement->adresse }}, {{ $etablissement->commune }}';

    var map = new google.maps.Map(document.getElementById('map'), {
        mapTypeId: google.maps.MapTypeId.TERRAIN,
        zoom: 15
    });

    var geocoder = new google.maps.Geocoder();
    var infowindow = new google.maps.InfoWindow();
    var info = $('.box-infowindow').html();

    geocoder.geocode({
       'address': address
    },

    function(results, status) {
       if(status == google.maps.GeocoderStatus.OK) {

         map.setCenter(results[0].geometry.location);

          var marker = new google.maps.Marker({
             position: results[0].geometry.location,
             map: map
          });

          google.maps.event.addDomListener(window, 'load', function() {
              infowindow.setContent(info);
              infowindow.open(map, marker);
          });

          google.maps.event.addListener(marker, 'click', function() {
              infowindow.setContent(info);
              infowindow.open(map, this);
          });
       }
    });


  });

  </script>
@endsection
