@extends('Admin.layout')

@section('title', 'ADMIN')

@section('content')
<br>
<div class="row">

  <div class="col-sm-12 col-md-6 col-lg-3 mb-4">
    <div class="card text-center bg-jaune">
      <div class="card-body">
        <h4 class="card-title">Utilisateurs</h4>
        <p class="card-text">Il y a <strong>{{ $users }}</strong> utilisateurs enregistrés dans la base de données.</p>
        <a href="{{ route('admin_users') }}" class="btn btn-dark">Gérer</a>
      </div>
    </div>
  </div>

  <div class="col-sm-12 col-md-6 col-lg-3 mb-4">
    <div class="card text-center bg-rose">
      <div class="card-body">
        <h4 class="card-title">Formations</h4>
        <p class="card-text">Il y a <strong>{{ $formations }}</strong> formations enregistrées dans la base de données.</p>
        <a href="{{ route('admin_formations') }}" class="btn btn-dark">Gérer</a>
      </div>
    </div>
  </div>
  <div class="col-sm-12 col-md-6 col-lg-3 mb-4">
    <div class="card text-center bg-vert">
      <div class="card-body">
        <h4 class="card-title">Métiers</h4>
        <p class="card-text">Il existe <strong>{{ $metiers }}</strong> métiers enregistrés dans la base de données.</p>
        <a href="{{ route('admin_metiers') }}" class="btn btn-dark">Gérer</a>
      </div>
    </div>
  </div>
  <div class="col-sm-12 col-md-6 col-lg-3 mb-4">
    <div class="card text-center bg-vert">
      <div class="card-body">
        <h4 class="card-title">Secteurs</h4>
        <p class="card-text">Il y a <strong>{{ $secteurs }}</strong> secteurs enregistrés dans la base de données.</p>
        <a href="{{ route('admin_secteurs') }}" class="btn btn-dark">Gérer</a>
      </div>
    </div>
  </div>
  <div class="col-sm-12 col-md-6 col-lg-3 mb-4">
    <div class="card text-center bg-violet">
      <div class="card-body">
        <h4 class="card-title text-blanc">Etablissements</h4>
        <p class="card-text text-blanc">Il y a <strong>{{ $etablissements }}</strong> établissements enregistrés dans la base de données.</p>
        <a href="{{ route('admin_etablissements') }}" class="btn btn-dark text-blanc">Gérer</a>
      </div>
    </div>
  </div>

  <div class="col-sm-12 col-md-6 col-lg-3 mb-4">
    <div class="card text-center bg-jaune">
      <div class="card-body">
        <h4 class="card-title">Savoirs</h4>
        <p class="card-text">Il y a <strong>{{ $savoirs }}</strong> savoirs enregistrés dans la base de données.</p>
        <a href="{{ route('admin_savoirs') }}" class="btn btn-dark">Gérer</a>
      </div>
    </div>
  </div>

  <div class="col-sm-12 col-md-6 col-lg-3 mb-4">
    <div class="card text-center bg-jaune">
      <div class="card-body">
        <h4 class="card-title">Savoir-faire</h4>
        <p class="card-text">Il y a <strong>{{ $savoirFaire }}</strong> savoir-faire enregistrés dans la base de données.</p>
        <a href="{{ route('admin_savoir_faire') }}" class="btn btn-dark">Gérer</a>
      </div>
    </div>
  </div>

  <div class="col-sm-12 col-md-6 col-lg-3 mb-4">
    <div class="card text-center bg-jaune">
      <div class="card-body">
        <h4 class="card-title">Savoir-être</h4>
        <p class="card-text">Il y a <strong>{{ $savoirEtre }}</strong> savoir-être enregistrés dans la base de données.</p>
        <a href="{{ route('admin_savoir_etre') }}" class="btn btn-dark">Gérer</a>
      </div>
    </div>
  </div>

  <div class="col-sm-12 col-md-6 col-lg-3 mb-4">
    <div class="card text-center bg-jaune">
      <div class="card-body">
        <h4 class="card-title">Battements de coeur</h4>
        <p class="card-text">Il y a <strong>{{ $motivations }}</strong> battements de coeur enregistrés dans la base de données.</p>
        <a href="{{ route('admin_motivations') }}" class="btn btn-dark">Gérer</a>
      </div>
    </div>
  </div>

  <div class="col-sm-12 col-md-6 col-lg-3 mb-4">
    <div class="card text-center bg-vert">
      <div class="card-body">
        <h4 class="card-title">Codes ROME</h4>
        <p class="card-text">Il y a <strong>{{ $codes }}</strong> codes ROME enregistrés dans la base de données.</p>
        <a href="{{ route('admin_codes') }}" class="btn btn-dark">Gérer</a>
      </div>
    </div>
  </div>

  <div class="col-sm-12 col-md-6 col-lg-3 mb-4">
    <div class="card text-center bg-vert">
      <div class="card-body">
        <h4 class="card-title">Careerdirect-params</h4>
        <p class="card-text">Il y a <strong>{{ $careerdirectparams }}</strong> paramètres careerdirects enregistrés dans la base de données.</p>
        <a href="{{ route('admin_careerdirectparam') }}" class="btn btn-dark">Gérer</a> 
      </div>
    </div>
  </div>

</div>

@endsection
