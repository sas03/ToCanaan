@extends('Admin.layout') @section('title', 'Section métiers') @section('content')
<br>

<h3 class="text-uppercase text-vert">Métiers ({{ $total }})</h3>

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
        <div class="input-group-addon">Libellé</div>
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
    <a class="btn bg-vert" href="{{ route('admin_edit_metier') }}" role="button">Ajouter un métier</a>
  </div>
</div>
<br> @if (!empty($metiers))
<div class="row">
  <div class="col-sm-12">

    <table class="table table-hover">

      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Libellé</th>
          <th scope="col">Code Rome</th>
          <th scope="col">Niveau requis</th>
          <th scope="col">Secteur</th>
          <th scope="col">Vidéo</th>
          <th scope="col">Actions</th>

        </tr>
      </thead>
      <tbody>
        @foreach($metiers as $metier)
        <tr>
          <th scope="row">{{ $metier->id }}</th>
          <td style="max-width: 250px">{{ ucfirst($metier->nom) }}</td>
          <td>{{ $metier->code_rome }}</td>
          <td>{{ $metier->niveau_requis }}</td>
          <td>{{ $metier->secteur->nom }}</td>
          <td >@if ($metier->video)
            Oui
          @else
            Non
          @endif</td>

          <td style="min-width: 190px;">
            <a type="button" class="btn btn-info" title="Voir la fiche métier" href="{{ route('fiche_metier', [$metier->id]) }}" target="_blank"><i class="icon ion-eye"></i></a>
            <a type="button" class="btn btn-warning" title="Modification" href="{{ route('admin_edit_metier', ['id' => $metier->id]) }}"><i class="icon ion-edit"></i></a>
            <button type="button" class="btn btn-danger delete-metier" title="Suppression"><i class="icon ion-trash-b"></i></button>
          </td>
        </tr>
        @endforeach
      </tbody>

    </table>

  </div>
</div>
<br>
@if ($metiers instanceof Illuminate\Pagination\LengthAwarePaginator)

  {{ $metiers->links('vendor.pagination.bootstrap-4') }}

  <br>
@endif


@endif @endsection @section('javascript')
<script>
  $(function() {

    $('.delete-metier').click(function(e) {
      e.preventDefault();

      let tr = $(this).parent().parent();
      let libelle = tr.children().eq(1).text();
      let id = tr.children().eq(0).text();
      let url = "{{ url('admin/metier/delete') }}" + '/' + id;

      swal({
        title: 'Attention !',
        text: 'Etes-vous sûr de vouloir supprimer le métier "' + libelle + '" ?',
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
