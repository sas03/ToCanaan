@extends('layouts.master') @section('title', 'Modifier mes informations personnelles')

@section('main_title')
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <h4 class="text-uppercase">Modifier mes informations personnelles</h4>
      </div>

    </div>

  </div>

  <hr class="bg-jaune trait-titre">
@endsection

@section('content')

<div class="row justify-content-center">

  <div class="col-md-6 mb-4 box-form">

    <form class="form-horizontal" method="POST" action="{{ route('update_profil') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('nom') ? ' has-error' : '' }}">
            <label for="nom" class="control-label">Nom</label>

            <input id="nom" type="text" class="form-control" name="nom" value="{{ Auth::user()->nom }}" required>

            @if ($errors->has('nom'))
                <span class="help-block">
                    <strong>{{ $errors->first('nom') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('prenom') ? ' has-error' : '' }}">
            <label for="prenom" class="control-label">Prénom</label>

            <input id="prenom" type="text" class="form-control" name="prenom" value="{{ Auth::user()->prenom }}" required >

            @if ($errors->has('prenom'))
                <span class="help-block">
                    <strong>{{ $errors->first('prenom') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="control-label">Adresse mail</label>

            <input id="email" type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" required>

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('ville') ? ' has-error' : '' }}">
            <label for="ville" class="control-label">Ville</label>

            <input id="ville" type="text" class="form-control" name="ville" value="{{ Auth::user()->ville }}" required >

            @if ($errors->has('ville'))
                <span class="help-block">
                    <strong>{{ $errors->first('ville') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('code_postal') ? ' has-error' : '' }}">
            <label for="code_postal" class="control-label">Code postal</label>

            <input id="code_postal" type="text" class="form-control" name="code_postal" value="{{ Auth::user()->code_postal }}" required >

            @if ($errors->has('code_postal'))
                <span class="help-block">
                    <strong>{{ $errors->first('code_postal') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('date_de_naissance') ? ' has-error' : '' }}">
            <label for="date_de_naissance" class="control-label">Date de naissance</label>

            <input id="date_de_naissance" type="date" class="form-control" name="date_de_naissance" value="@if(Auth::user()->date_de_naissance != null) {{ Auth::user()->date_de_naissance->format('d-m-Y') }} @endif">

            @if ($errors->has('date_de_naissance'))
                <span class="help-block">
                    <strong>{{ $errors->first('date_de_naissance') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
            <label for="telephone" class="control-label">Téléphone</label>

            <input id="telephone" type="telephone" class="form-control" name="telephone" value="{{ Auth::user()->telephone }}">

            @if ($errors->has('telephone'))
                <span class="help-block">
                    <strong>{{ $errors->first('telephone') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('niveau_admission') ? ' has-error' : '' }}">
            <label for="niveau_admission" class="control-label">Niveau d'admission</label>

            <select name="niveau_admission" id="niveau_admission" class="form-control">
              <option value="brevet" @if(Auth::user()->niveau_admission == 'brevet') selected @endif >Brevet</option>
              <option value="bac" @if(Auth::user()->niveau_admission == 'bac' ) selected @endif >Bac</option>
              <option value="bac + 1" @if(Auth::user()->niveau_admission == 'bac + 1' ) selected @endif >Bac + 1</option>
              <option value="bac + 2" @if(Auth::user()->niveau_admission == 'bac + 2' ) selected @endif >Bac + 2</option>
              <option value="bac + 3" @if(Auth::user()->niveau_admission == 'bac + 3' ) selected @endif >Bac + 3</option>
              <option value="bac + 4" @if(Auth::user()->niveau_admission == 'bac + 4' ) selected @endif >Bac + 4</option>
              <option value="bac + 5" @if(Auth::user()->niveau_admission == 'bac + 5' ) selected @endif >Bac + 5</option>
              <option value="bac + 6" @if(Auth::user()->niveau_admission == 'bac + 6' ) selected @endif >Bac + 6</option>
              <option value="bac + 7" @if(Auth::user()->niveau_admission == 'bac + 7' ) selected @endif >Bac + 7</option>
              <option value="bac + 8" @if(Auth::user()->niveau_admission == 'bac + 8' ) selected @endif >Bac + 8</option>
            </select>

            @if ($errors->has('niveau_admission'))
                <span class="help-block">
                    <strong>{{ $errors->first('niveau_admission') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('metiers') ? ' has-error' : '' }}">
          <label for="metier" class="control-label">Métier envisagé</label>
          <input type="text" data-provide="typeahead" id="autocomplete" class="form-control typeahead" name="metier" autocomplete="off" value="{{ Auth::user()->metier }}">
        </div>



        <div class="form-group">
          <button type="submit" class="btn btn-primary bg-jaune">
              Enregistrer
          </button>
          <a class="btn btn-danger btn-annuler" href="{{ route('user_index') }}" role="button">Annuler</a>
        </div>
    </form>
  </div>
</div>

@endsection

@section('javascript')
  <script type="text/javascript">
      $( function() {

        // Autocomplétion
        $('#autocomplete').autocomplete({

          source: function( request, response ) {

            $.get( "{{ route('autocomplete_metiers') }}",{term: request.term}, function(data){
                data = $.parseJSON(data).slice(0, 10); // on affiche seulement les 10 premiers résultats

                response($.map(data, function(object){
                    return object.nom;
                }));
              });

          },
          minLength: 3
        });

      })

  </script>

@endsection
