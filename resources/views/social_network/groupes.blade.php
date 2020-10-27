@extends('layouts.master_network') @section('title', 'Réseau social')

@section('content')

@include('social_network.layouts.header')

<div class="row">

  {{---------------------------------- MENU ----------------------------------}}

  <div class="col-lg-3 side-menu">
    @include('social_network.layouts.navbar_left')
  </div>


  {{-------------------------------- CONTENU --------------------------------}}

  <div class="col-lg-7">

    <div class="row row-choose-groupe">

      <div class="col-lg-2">
        <a href="#" class="btn-show-group" groupe="pere">{{ count($peres) }}<br> Pères</a>
      </div>

      <div class="col-lg-2">
        <a href="#" class="btn-show-group" groupe="fils">{{ count($fils) }}<br> Fils</a>
      </div>

      <div class="col-lg-2">
        <a href="#" class="btn-show-group" groupe="ami">{{ count($amis) }}<br> Amis</a>
      </div>

      <div class="col-lg-3">
        <a href="#" class="btn-show-group" groupe="concurrent">{{ count($concurrents) }}<br> Concurrents</a>
      </div>

      <div class="col-lg-3">
        <a href="#" class="btn-show-group" groupe="connexion">{{ count($connexions) }}<br> Connexions divines</a>
      </div>

    </div>

    <hr class="bg-jaune">

    <div class="box-groupes">

    </div>

  </div>


  {{--------------------------------- STATS ---------------------------------}}
  <div class="col-lg-2">
    @include('social_network.layouts.stats')
  </div>

</div>

@endsection

@section('javascript')
  <script type="text/javascript">

    $(function () {

      // EVENT SHOW GROUPE
      $('.btn-show-group').click(function(e){
        e.preventDefault();

        let groupe = $(this).attr('groupe');

        $.ajax({
          url: "?groupe=" + groupe,
          type: "get"
        })
        .done(function(data) {
          $('.box-groupes').html(data.view);
        })

        .fail(function(jqXHR, ajaxOptions, thrownError){
          console.log('server not responding...');
        });

      });


    });

</script>
@endsection
