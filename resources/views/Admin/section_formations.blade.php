@extends('Admin.layout') @section('title', 'Section formations') @section('content')
<br>
<h3 class="text-uppercase text-rose">Formations ({{ $total }})</h3>

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
        <div class="input-group-addon">Intitulé</div>
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
    <a class="btn bg-rose" href="{{ route('admin_edit_formation') }}" role="button">Ajouter une formation</a>
  </div>
</div>
<br> @if (!empty($formations))
<div class="row">
  <div class="col-sm-12">

    <table class="table table-hover">

      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Intitulé</th>
          <th scope="col">Durée</th>
          <th scope="col">Niveau entrée</th>
          <th scope="col">Niveau sortie</th>
          <th scope="col">Établissements liés</th>
          <th scope="col">Actions</th>

        </tr>
      </thead>
      <tbody>
        @foreach($formations as $formation)
        <tr>
          <th scope="row">{{ $formation->id }}</th>
          <td style="max-width: 250px;">{{ ucfirst($formation->nom) }}</td>
          <td>{{ $formation->duree }}</td>
          <td>{{ $formation->niveau_entree }}</td>
          <td>{{ $formation->niveau_sortie }}</td>
          <td>
            @if (count($formation->etablissements) == 0)
              Pas de lien
            @else
              <a href="{{ route('admin_formation_etablissements', ['id' => $formation->id]) }}" class="text-violet">{{ count($formation->etablissements) }} établissement(s)</a>
            @endif
          </td>

          <td style="min-width: 150px;">
            <a type="button" class="btn btn-info" title="Voir la fiche formation" href="{{ route('fiche_formation', [$formation->id]) }}" target="_blank"><i class="icon ion-eye"></i></a>
            <a type="button" class="btn btn-warning" title="Modification" href="{{ route('admin_edit_formation', ['id' => $formation->id]) }}"><i class="icon ion-edit"></i></a>
            <button type="button" class="btn btn-danger delete-formation" title="Suppression"><i class="icon ion-trash-b"></i></button>
          </td>
        </tr>
        @endforeach
      </tbody>

    </table>

  </div>
</div>
<br>
@if ($formations instanceof Illuminate\Pagination\LengthAwarePaginator)

  {{ $formations->links('vendor.pagination.bootstrap-4') }}

  <br>
@endif


@endif @endsection @section('javascript')
<script>
  $(function() {

    $('.delete-formation').click(function(e) {
      e.preventDefault();

      let tr = $(this).parent().parent();
      let intitule = tr.children().eq(1).text();
      let id = tr.children().eq(0).text();
      let url = "{{ url('admin/formation/delete') }}" + '/' + id;

      swal({
        title: 'Attention !',
        text: 'Etes-vous sûr de vouloir supprimer la formation "' + intitule + '" ?',
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
            swal("Oops", "We couldn't connect to the server!", "error");
          });
      });
    });
  })
</script>

@endsection
