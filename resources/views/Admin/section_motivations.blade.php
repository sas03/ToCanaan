@extends('Admin.layout') @section('title', 'Section battements de coeur') @section('content')
<br>

<h3 class="text-uppercase text-jaune">Battements de coeur ({{ $total }})</h3>

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
    <a class="btn bg-jaune" href="{{ route('admin_edit_motivation') }}" role="button">Ajouter un battement de coeur</a>
  </div>
</div>
<br> @if (!empty($motivations))
<div class="row">
  <div class="col-sm-12">

    <table class="table table-hover">

      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Battements de coeur</th>
          <th scope="col">Nombre de métiers associés</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($motivations as $motivation)
        <tr>
          <th scope="row">{{ $motivation->id }}</th>
          <td style="max-width: 250px">{{ $motivation->nom }}</td>
          <td>
            @if (count($motivation->metiers) == 0)
              Pas de métiers associés
            @else
              <a href="{{ route('admin_motivation_metiers', ['id' => $motivation->id]) }}" class="text-vert"><strong>{{ count($motivation->metiers) }}</strong> metiers</a>
            @endif
          </td>
          <td style="min-width: 190px;">
            {{-- <a type="button" class="btn btn-info" title="Voir la fiche métier" href="" target="_blank"><i class="icon ion-eye"></i></a> --}}
            <a type="button" class="btn btn-warning" title="Modification" href="{{ route('admin_edit_motivation', [$motivation->id]) }}"><i class="icon ion-edit"></i></a>
            <button type="button" class="btn btn-danger delete-motivation" title="Suppression"><i class="icon ion-trash-b"></i></button>
          </td>
        </tr>
        @endforeach
      </tbody>

    </table>

  </div>
</div>
<br>
@if ($motivations instanceof Illuminate\Pagination\LengthAwarePaginator)

  {{ $motivations->links('vendor.pagination.bootstrap-4') }}

  <br>
@endif


@endif @endsection @section('javascript')
<script>
  $(function() {

    $('.delete-motivation').click(function(e) {
      e.preventDefault();

      let tr = $(this).parent().parent();
      let libelle = tr.children().eq(1).text();
      let id = tr.children().eq(0).text();
      let url = "{{ url('admin/motivation/delete') }}" + '/' + id;

      swal({
        title: 'Attention !',
        text: 'Etes-vous sûr de vouloir supprimer le battement de coeur "' + libelle + '" ?',
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
