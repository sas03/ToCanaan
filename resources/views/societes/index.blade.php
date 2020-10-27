@extends('layouts.master') @section('title', 'Société')

@section('main_title')
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <h4 class="text-uppercase">Dashboard</h4>
      </div>

    </div>

  </div>

  <hr class="bg-jaune trait-titre">
@endsection

@section('content')

  <div class="row row-header-dashboard-societe">

    <div class="col-lg-2">
      <div class="box-logo-societe">
        <img src="{{ asset('img/logos/' . $societe->logo .'?' . time() . '>') }}" class="logo-societe" alt="">

        <button type="button" name="button" data-toggle="modal" data-target="#modal-update-logo" class="btn-update-logo"><i class="icon ion-edit"></i></button>

        <!-- Template de la Modal -->
        <div class="modal modal-custom" id="modal-update-logo" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog" role="document">

            <div class="modal-header">
              <h5 class="modal-title">CHANGEZ VOTRE LOGO</h5>
              <button type="button" class="close modal-close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-content">
              <div class="modal-body box-form">
                <form action="{{ route('societe_update_logo') }}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <input type="file" class="form-control" name="logo">
                  </div>
                  <input type="submit" class="btn-form bg-jaune" value="Valider">
                </form>

              </div>
            </div>
          </div>
        </div>


      </div>
    </div>
    <div class="col-lg-6">

    {{-- <form action="{{ route('societe_update_logo') }}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      <input type="file" name="logo">
      <input type="submit" value="Envoyer">
    </form> --}}

      <h4>{{ mb_strtoupper($societe->nom) }}</h4>
      <p>
        {{ $societe->adresse }}
        <br>
        {{ $societe->code_postal }}  {{ mb_strtoupper($societe->ville) }}
      </p>
      <p>
        0{{ $societe->telephone }}
        <br>
        {{ $societe->email }}
      </p>
    </div>
    <div class="col-lg-4">
      <a href="{{ route('societe_edit') }}">Modifier les informations de l'entreprise</a>
      <br>
      <a href="{{ route('societe_edit_password') }}">Modifier le mot de passe</a>
    </div>
  </div>




  <div class="row">

    <div class="col-lg-12 box-titres">
      <h4 class="text-uppercase">Ajouts divers</h4>
    </div>

  </div>

  <hr class="bg-violet trait-titre mb-4">

  <div class="row mb-4">
    <div class="col-lg-4">
      <a href="{{ route('add_service') }}" class="btn-form bg-violet">+ AJOUTER UN SERVICE +</a>
    </div>
    <div class="col-lg-4">
      <a href="{{ route('add_poste') }}" class="btn-form bg-vert">+ AJOUTER UN POSTE +</a>
    </div>
    <div class="col-lg-4">
      <a href="{{ route('add_employe') }}" class="btn-form bg-jaune">+ AJOUTER UN EMPLOYÉ +</a>
    </div>
  </div>


  <div class="row">

    <div class="col-lg-12 box-titres">
      <h4 class="text-uppercase">Recherche</h4>
    </div>

  </div>

  <hr class="bg-violet trait-titre mb-4">

  <div class="row mb-4">

  	<div class="col-lg-12 box-form-search box-form-search-societe">
  		<form action="{{ route('societe_search') }}" method="get" class="form-inline">

        <select class="form-control col-lg-2 col-md-12 col-sm-12 liste-categories" name="categorie">
          <option value="" class="first-option">Choisir une catégorie</option>
          <option value="service">Service</option>
          <option value="poste">Poste</option>
          <option value="employe">Employé</option>
          <option value="competence_disponible">Compétence disponible</option>
          <option value="competence_requise">Compétence requise</option>
        </select>

  			<input type="text" data-provide="typeahead" class="form-control typeahead col-lg-8 col-md-12 col-sm-12 autocomplete-categories-societe"
  			 name="q" autocomplete="off" value="{{ $request->input('q') }}">

  			<button type="submit" class="btn bg-violet col-lg-2 col-md-12">Rechercher</button>
  		</form>

  	</div>

  </div>

  <div class="row">

    <div class="col-lg-12 box-titres">
      <h4 class="text-uppercase">Détails de l'entreprise</h4>
    </div>

  </div>

  <hr class="bg-violet trait-titre mb-4">

@if ($services)
  <div class="row">

    <div class="col-lg-12">
      <div class="card mb-5 bg-light-violet custom-card">
        <div class="card-body">
            <table class="table table-bordered table-recherche text-center table-etablissements">

              <tbody>
              <tr class="liste-titre liste-violet-titre">
                <td colspan="4"><a href="{{ route('liste_services') }}">Services</a></td>
                <td class="table-icon"><a href="{{ route('add_service') }}"><i class="icon ion-plus-round"></i></a></td>
              </tr>
                @foreach ($services as $service)
                <tr class="liste-recherche liste-violet liste-service">
                  <td><a href="{{ route('fiche_service', ['id' => $service->id]) }}">{{ $service->nom }}</a></td>
                  <td class="table-icon"><a href="{{ route('edit_service', ['id' => $service->id]) }}"><i class="icon ion-edit"></i> </a></td>
                  <td class="table-icon"><a href="{{ route('edit_poste_service', ['service_id' => $service->id]) }}"><i class="icon ion-briefcase"></i> </a></td>
                  <td class="table-icon"><a href="{{ route('edit_employe_service', ['service_id' => $service->id]) }}"><i class="icon ion-person-add"></i> </a></td>
                  <td class="table-icon"><a href="{{ route('delete_service', ['id' => $service->id]) }}"><i class="icon ion-trash-b"></i> </a></td>
                </tr>
                @endforeach
              </tbody>
            </table>

        </div>
      </div>
    </div>

  </div>

@endif

@if ($postes)
  <div class="row">

    <div class="col-lg-12">
      <div class="card mb-5 bg-light-violet custom-card">
        <div class="card-body">


            <table class="table table-bordered table-recherche text-center table-metiers">

              <tbody>
              <tr class="liste-titre liste-vert-titre">
                <td colspan="3"><a href="{{ route('liste_postes') }}">Postes</a></td>
                <td class="table-icon"><a href="{{ route('add_poste') }}"><i class="icon ion-plus-round"></i></a></td>
              </tr>
                @foreach ($postes as $poste)
                <tr class="liste-recherche liste-vert">
                  <td><a href="{{ route('fiche_poste', ['id' => $poste->id]) }}">{{ ucfirst($poste->nom) }}</a></td>
                  <td class="table-icon"><a href="{{ route('edit_poste', ['id' => $poste->id]) }}"><i class="icon ion-edit"></i> </a></td>
                  <td class="table-icon"><a href="{{ route('add_employe') }}"><i class="icon ion-person-add"></i> </a></td>
                  <td class="table-icon"><a href="{{ route('delete_poste', ['id' => $poste->id]) }}"><i class="icon ion-trash-b"></i> </a></td>
                </tr>
                @endforeach
              </tbody>
            </table>

        </div>
      </div>
    </div>

  </div>
@endif

@if ($employes)
  <div class="row">

    <div class="col-lg-12">
      <div class="card mb-5 bg-light-violet custom-card">
        <div class="card-body">
            <table class="table table-bordered table-recherche text-center table-employe">

              <tbody>
              <tr class="liste-titre liste-jaune-titre">
                <td colspan="2"><a href="{{ route('liste_employes') }}">Employés</a></td>
                <td class="table-icon"><a href="{{ route('add_employe') }}"><i class="icon ion-plus-round"></i></a></td>
              </tr>
                @foreach ($employes as $employe)
                <tr class="liste-recherche liste-jaune">
                  <td><a href="{{ route('fiche_employe', ['id' => $employe->id]) }}">{{ $employe->prenom }} {{ mb_strtoupper($employe->nom) }}</a></td>
                  <td class="table-icon"><a href="{{ route('edit_employe', ['id' => $employe->id]) }}"><i class="icon ion-edit"></i></a></td>
                  <td class="table-icon"><a href="{{ route('delete_employe', ['id' => $employe->id]) }}"><i class="icon ion-trash-b"></i></a></td>
                </tr>
                @endforeach
              </tbody>
            </table>

        </div>
      </div>
    </div>

  </div>
@endif

@endsection

@section('javascript')
  <script type="text/javascript">
    $(function () {


      $('body').on('change', '.liste-categories', function(){
        let categorie_selected = $('.liste-categories option:selected').val();
        let url = "";
        let proposition = "";

        if (categorie_selected == 'service') {
          url = "{{ route('autocomplete_services') }}";
        }
        else if (categorie_selected == 'poste') {
          url = "{{ route('autocomplete_postes') }}";
        }
        else if (categorie_selected == 'employe') {
          url = "{{ route('autocomplete_employes') }}";
        }
        else if (categorie_selected == 'competence_disponible') {
          url = "{{ route('autocomplete_competences_disponibles') }}";
        }
        else if (categorie_selected == 'competence_requise') {
          url = "{{ route('autocomplete_competences_requises') }}";
        }
        else {
          url = "";
        }

        if (url != "") {

          //Autocomplétion
          autocompleteSociete($('.autocomplete-categories-societe'), url);
          
        }

      });


      $('.delete-service').click(function(e){

        e.preventDefault();
        let ajaxUrl = $(this).attr('url-action');

        $.ajax({
          method: "GET",
          url: ajaxUrl
        })
        .done(function(response){
          console.log(response);

        })
        .fail(function(response){
          alert('ERREUR !');
        });

      });

    });

  </script>
@endsection
