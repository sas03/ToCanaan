@extends('layouts.master') @section('title', 'Modifier la visibilité du profil')

@section('main_title')
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <h4 class="text-uppercase">Modifier la visibilité de mon profil</h4>
      </div>

    </div>

  </div>

  <hr class="bg-jaune trait-titre">
@endsection

@section('content')
<div class="row">

  <div class="col-lg-12">
    <div class="custom-card">

      <div class="card-body">

        {{-- <h4 class="card-title bg-jaune">CV</h4> --}}

        <table class="table table-bordered table-visibilite text-center">
          <thead class="bg-jaune">
            <tr>
              <th></th>
              <th>Public</th>
              <th>Réservé aux pro</th>
              <th>Privé</th>
            </tr>
          </thead>
          <tbody>
            <tr class="liste-recherche">
              <td colspan="4"><strong>INFORMATIONS PERSONNELLES</strong> :</td>
            </tr>

            <tr class="liste-recherche">
              <td>Adresse mail</td>
              <td class="table-icon table-icon-big">
                <a href="#" class="table-visibilite-link @if($visibilite['email'] == 'public') table-visibilite-link-on @endif" visibilite="public" item-selected="email" title="Public"><i class="icon ion-ios-eye"></i>
                </a></td>
              <td class="table-icon table-icon-big">
                <a href="#" class="table-visibilite-link @if($visibilite['email'] == 'reserve') table-visibilite-link-on @endif" visibilite="reserve" item-selected="email" title="Visible par votre société"><i class="icon ion-unlocked"></i></a>
              </td>
              <td class="table-icon table-icon-big">
                <a href="#" class="table-visibilite-link @if($visibilite['email'] == 'prive') table-visibilite-link-on @endif" visibilite="prive" item-selected="email" title="Privé"><i class="icon ion-locked"></i></a>
              </td>
            </tr>


            <tr class="liste-recherche">
              <td colspan="4"><strong>CV</strong> :</td>
            </tr>

            <tr class="liste-recherche">
              <td>Expériences professionnelles</td>
              <td class="table-icon table-icon-big">
                <a href="#" class="table-visibilite-link @if($visibilite['experiences'] == 'public') table-visibilite-link-on @endif" visibilite="public" item-selected="experiences" title="Public"><i class="icon ion-ios-eye"></i>
                </a></td>
              <td class="table-icon table-icon-big">
                <a href="#" class="table-visibilite-link @if($visibilite['experiences'] == 'reserve') table-visibilite-link-on @endif" visibilite="reserve" item-selected="experiences" title="Visible par votre société"><i class="icon ion-unlocked"></i></a>
              </td>
              <td class="table-icon table-icon-big">
                <a href="#" class="table-visibilite-link @if($visibilite['experiences'] == 'prive') table-visibilite-link-on @endif" visibilite="prive" item-selected="experiences" title="Privé"><i class="icon ion-locked"></i></a>
              </td>
            </tr>

            <tr class="liste-recherche">
              <td>Formations</td>
              <td class="table-icon table-icon-big">
                <a href="#" class="table-visibilite-link @if($visibilite['formations'] == 'public') table-visibilite-link-on @endif" visibilite="public" item-selected="formations" title="Public"><i class="icon ion-ios-eye"></i></a>
              </td>
              <td class="table-icon table-icon-big">
                <a href="#" class="table-visibilite-link @if($visibilite['formations'] == 'reserve') table-visibilite-link-on @endif" visibilite="reserve" item-selected="formations" title="Visible par votre société"><i class="icon ion-unlocked"></i></a>
              </td>
              <td class="table-icon table-icon-big">
                <a href="#" class="table-visibilite-link @if($visibilite['formations'] == 'prive') table-visibilite-link-on @endif" visibilite="prive" item-selected="formations" title="Privé"><i class="icon ion-locked"></i></a>
              </td>
            </tr>

            <tr class="liste-recherche">
              <td>Centres d'intérêt</td>
              <td class="table-icon table-icon-big">
                <a href="#" class="table-visibilite-link @if($visibilite['centres'] == 'public') table-visibilite-link-on @endif" visibilite="public" item-selected="centres" title="Public"><i class="icon ion-ios-eye"></i></a>
              </td>
              <td class="table-icon table-icon-big">
                <a href="#" class="table-visibilite-link @if($visibilite['centres'] == 'reserve') table-visibilite-link-on @endif" visibilite="reserve" item-selected="centres" title="Visible par votre société"><i class="icon ion-unlocked"></i></a>
              </td>
              <td class="table-icon table-icon-big">
                <a href="#" class="table-visibilite-link @if($visibilite['centres'] == 'prive') table-visibilite-link-on @endif" visibilite="prive" item-selected="centres" title="Privé"><i class="icon ion-locked"></i></a>
              </td>
            </tr>

            <tr class="liste-recherche">
              <td colspan="4"><strong>COMPÉTENCES</strong> :</td>
            </tr>

            <tr class="liste-recherche">
              <td>Savoirs / Savoir-faire</td>
              <td class="table-icon table-icon-big">
                <a href="#" class="table-visibilite-link @if($visibilite['savoirs'] == 'public') table-visibilite-link-on @endif" visibilite="public" item-selected="savoirs" title="Public"><i class="icon ion-ios-eye"></i></a>
              </td>
              <td class="table-icon table-icon-big">
                <a href="#" class="table-visibilite-link @if($visibilite['savoirs'] == 'reserve') table-visibilite-link-on @endif" visibilite="reserve" item-selected="savoirs" title="Visible par votre société"><i class="icon ion-unlocked"></i></a>
              </td>
              <td class="table-icon table-icon-big">
                <a href="#" class="table-visibilite-link @if($visibilite['savoirs'] == 'prive') table-visibilite-link-on @endif" visibilite="prive" item-selected="savoirs" title="Privé"><i class="icon ion-locked"></i></a>
              </td>
            </tr>

            <tr class="liste-recherche">
              <td>Savoir-être</td>
              <td class="table-icon table-icon-big">
                <a href="#" class="table-visibilite-link @if($visibilite['savoir_etre'] == 'public') table-visibilite-link-on @endif" visibilite="public" item-selected="savoir_etre" title="Public"><i class="icon ion-ios-eye"></i></a>
              </td>
              <td class="table-icon table-icon-big">
                <a href="#" class="table-visibilite-link @if($visibilite['savoir_etre'] == 'reserve') table-visibilite-link-on @endif" visibilite="reserve" item-selected="savoir_etre" title="Visible par votre société"><i class="icon ion-unlocked"></i></a>
              </td>
              <td class="table-icon table-icon-big">
                <a href="#" class="table-visibilite-link @if($visibilite['savoir_etre'] == 'prive') table-visibilite-link-on @endif" visibilite="prive" item-selected="savoir_etre" title="Privé"><i class="icon ion-locked"></i></a>
              </td>
            </tr>

            <tr class="liste-recherche">
              <td>Battements de coeur</td>
              <td class="table-icon table-icon-big">
                <a href="#" class="table-visibilite-link @if($visibilite['motivations'] == 'public') table-visibilite-link-on @endif" visibilite="public" item-selected="motivations" title="Public"><i class="icon ion-ios-eye"></i></a>
              </td>
              <td class="table-icon table-icon-big">
                <a href="#" class="table-visibilite-link @if($visibilite['motivations'] == 'reserve') table-visibilite-link-on @endif" visibilite="reserve" item-selected="motivations" title="Visible par votre société"><i class="icon ion-unlocked"></i></a>
              </td>
              <td class="table-icon table-icon-big">
                <a href="#" class="table-visibilite-link @if($visibilite['motivations'] == 'prive') table-visibilite-link-on @endif" visibilite="prive" item-selected="motivations" title="Privé"><i class="icon ion-locked"></i></a>
              </td>
            </tr>
          </tbody>

        </table>
        <br>
        <button type="button" class="btn-form bg-jaune btn-save-visibilite">ENREGISTRER LES MODIFICATIONS</button>
      </div>
    </div>

  </div>

</div>
@endsection

@section('javascript')
  <script type="text/javascript">
      $( function() {
        let visibilite;
        let itemSelected;

        $('.table-visibilite-link').click(function(e){
          e.preventDefault();

          visibilite = $(this).attr('visibilite');
          type = $(this).attr('item-selected');

          //console.log($('.table-visibilite-link').attr('item-selected', 'public'));
          if (!$(this).hasClass('table-visibilite-link-on')) {

            if (visibilite == 'public') {
              $(this).addClass('table-visibilite-link-on');
              $(this).parent().next().children('.table-visibilite-link-on').removeClass('table-visibilite-link-on');
              $(this).parent().next().next().children('.table-visibilite-link-on').removeClass('table-visibilite-link-on');
            }

            if (visibilite == 'reserve') {
              $(this).addClass('table-visibilite-link-on');
              $(this).parent().prev().children('.table-visibilite-link-on').removeClass('table-visibilite-link-on');
              $(this).parent().next().children('.table-visibilite-link-on').removeClass('table-visibilite-link-on');
            }

            if (visibilite == 'prive') {
              $(this).addClass('table-visibilite-link-on');
              $(this).parent().prev().children('.table-visibilite-link-on').removeClass('table-visibilite-link-on');
              $(this).parent().prev().prev().children('.table-visibilite-link-on').removeClass('table-visibilite-link-on');
            }

          }


        });


        $('.btn-save-visibilite').click(function(e){
          e.preventDefault();

          let array = [];

          selectedAll = $('.table-visibilite-link-on');

          $.each(selectedAll, function(k, v){

            array.push({
              visibilite : $(v).attr('visibilite'),
              selected : $(v).attr('item-selected')
            });
          });

          $.ajax({
            url: "{{ route('edit_visibilite') }}",
            type: "post",
            data: {
            "_token": "{{ csrf_token() }}",
            "data": array
            }
          })
          .done(function(data) {
            window.location.href = "{{ route('user_visibilite') }}";
          })
          .fail(function(jqXHR, ajaxOptions, thrownError){
            console.log(thrownError);
          });

        });

      })

  </script>

@endsection
