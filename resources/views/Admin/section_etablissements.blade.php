@extends('Admin.layout') @section('title', 'Section établissements') @section('content')
<br>

<h3 class="text-uppercase text-violet">Établissements ({{ $total }})</h3>
<hr>

<br> @if ($errors->any())
<div class="row justify-content-md-center">
  <div class="col-md-6">
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  </div>
</div>
<br> @endif
<div class="row">

  <div class="col-sm-12 col-lg-8 mb-1">

    <form class="form-inline">
      <div class="input-group mb-2 mr-sm-2 mb-sm-1">
        <div class="input-group-addon">Etablissement</div>
        <input type="text" class="form-control" name="nom" value="{{ $request->input('nom') }}">
      </div>
      <span class="mr-2">ou</span>
      <div class="input-group mb-2 mr-sm-2 mb-sm-1">
        <div class="input-group-addon">ID</div>
        <input type="text" class="form-control" name="id" value="{{ $request->input('id') }}">
      </div>
      <button type="submit" class="btn btn-outline-primary btn-sm mr-1">Rechercher</button>
      <button id="rstBtn" class="btn btn-outline-dark btn-sm">Remettre à Zéro</button>
    </form>
  </div>
  <div class="col-sm-12 col-lg-4 mt-1">
    <a class="btn bg-violet text-blanc" href="{{ route('admin_edit_etablissement') }}" role="button">Ajouter un établissement</a>
  </div>
</div>
<br> @if (!empty($etablissements))
<div class="row">
  <div class="col-sm-12">

    <table class="table table-hover">

      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nom</th>
          <th scope="col">Statut</th>
          <th scope="col">Code postal</th>
          <th scope="col">Téléphone</th>
          <th scope="col">Nombre de formations associées</th>
          <th scope="col">Actions</th>

        </tr>
      </thead>
      <tbody>
        @foreach($etablissements as $etablissement)
        <tr>
          <th scope="row">{{ $etablissement->id }}</th>
          <td style="max-width: 250px;">{{ $etablissement->nom }}</td>
          <td>{{ $etablissement->statut }}</td>
          <td>{{ $etablissement->code_postal }}</td>
          <td>{{ $etablissement->telephone }}</td>
          <td>
            @if (count($etablissement->formations) == 0)
              Pas de formations
            @else
              <a href="{{ route('admin_etablissement_formations', ['id' => $etablissement->id]) }}" class="text-rose">{{ count($etablissement->formations) }} formation(s)</a>
            @endif
          </td>

          <td style="min-width: 190px;">
            <a type="button" class="btn btn-info" title="Voir la fiche etablissement" href="{{ route('fiche_etablissement', ['id' => $etablissement->id]) }}" target="_blank"><i class="icon ion-eye"></i></a>
            <a type="button" class="btn btn-warning" title="Modification" href="{{ route('admin_edit_etablissement', ['id' => $etablissement->id]) }}"><i class="icon ion-edit"></i></a>
            <button type="button" class="btn btn-danger delete-etablissement" title="Suppression"><i class="icon ion-trash-b"></i></button>
          </td>
        </tr>
        @endforeach
      </tbody>

    </table>

  </div>
</div>
<br>
@if ($etablissements instanceof Illuminate\Pagination\LengthAwarePaginator)

  {{ $etablissements->links('vendor.pagination.bootstrap-4') }}

  <br>
@endif


@endif @endsection @section('javascript')
<script>
  $(function() {
    
    $('.delete-etablissement').click(function(e) {
      e.preventDefault();

      let tr = $(this).parent().parent();
      let libelle = tr.children().eq(2).text();
      let id = tr.children().eq(0).text();
      let url = "{{ url('admin/etablissement/delete') }}" + '/' + id;


      swal({
        title: 'Attention !',
        text: 'Etes-vous sûr de vouloir supprimer l\'établissement : "' + libelle + '" ?',
        type: "warning",
        showCancelButton: true,
        confirmButtonText: 'Oui',
        cancelButtonText: 'Annuler',
      }).then(function() {
        $.get(url)
          .done(function(data) {
            swal({
              text: 'Succès !',
              type: 'success'
            });
            tr.hide();
          })
          .fail(function(error) {
            swal("Oops", "Connexion impossible avec le serveur !", "error");
          });
      });

    });

  })
</script>

@endsection
