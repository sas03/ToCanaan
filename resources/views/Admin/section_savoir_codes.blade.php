@extends('Admin.layout') @section('title', 'Section codes ROME') @section('content')

  <a href="{{ route('admin_savoirs') }}" class="btn-return-back bg-jaune">< Retourner aux savoirs</a>

<br>

<h3 class="text-uppercase text-vert">Codes ROME liés au savoir <strong>{{ $savoir->nom }}</strong></h3>

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
      <label class="sr-only" for="code">ID</label>

      <div class="input-group mb-2 mr-sm-2 mb-sm-1">
        <div class="input-group-addon">Code</div>
        <input type="text" class="form-control" id="code" name="code" value="{{ $request->input('code') }}">
      </div>
      <span class="mr-2">ou</span>
      <label class="sr-only" for="id">ID</label>
      <div class="input-group mb-2 mr-sm-2 mb-sm-1">
        <div class="input-group-addon">ID</div>
        <input type="text" class="form-control" id="id" name="id" value="{{ $request->input('id') }}">
      </div>
      <button id="rstBtn" class="btn btn-outline-dark btn-sm mr-1">Remettre à Zéro</button>
      <button type="submit" class="btn btn-outline-primary btn-sm">Rechercher</button>
    </form>
  </div>
  <div class="col-sm-12 col-lg-4 mt-1">
    <a class="btn bg-vert" href="{{ route('admin_edit_code') }}" role="button">Ajouter un code ROME</a>
  </div>
</div>
<br> @if (!empty($codes))
<div class="row">
  <div class="col-sm-12">

    <table class="table table-hover">

      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Code ROME</th>
          <th scope="col">Nombre de métiers associés</th>
          <th scope="col">Nombre de formations associées</th>
          <th scope="col">Actions</th>

        </tr>
      </thead>
      <tbody>
        @foreach($codes as $code)
        <tr>
          <th scope="row">{{ $code->id }}</th>
          <td style="max-width: 250px">{{ $code->code_rome }}</td>
          <td>
            @if (count($code->metiers) == 0)
              Pas de métiers
            @else
              <a href="{{ route('admin_code_metiers', ['id' => $code->id]) }}" class="text-vert">{{ count($code->metiers) }} métier(s)</a>
            @endif
          </td>
          <td>
            @if (count($code->formations) == 0)
              Pas de formations
            @else
              <a href="{{ route('admin_code_formations', ['id' => $code->id]) }}" class="text-rose">{{ count($code->formations) }} formation(s)</a>
            @endif
          </td>

          <td style="min-width: 190px;">
            <a type="button" class="btn btn-warning" title="Modification" href="{{ route('admin_edit_code', ['id' => $code->id]) }}"><i class="icon ion-edit"></i></a>
            <button type="button" class="btn btn-danger delete-code" title="Suppression"><i class="icon ion-trash-b"></i></button>
          </td>
        </tr>
        @endforeach
      </tbody>

    </table>

  </div>
</div>
<br>
@if ($codes instanceof Illuminate\Pagination\LengthAwarePaginator)

  {{ $codes->links('vendor.pagination.bootstrap-4') }}

  <br>
@endif


@endif @endsection @section('javascript')
<script>
  $(function() {

    $('.delete-code').click(function(e) {
      e.preventDefault();

      let tr = $(this).parent().parent();
      let code = tr.children().eq(1).text();
      let id = tr.children().eq(0).text();
      let url = "{{ url('admin/code/delete') }}" + '/' + id;

      swal({
        title: 'Attention !',
        text: 'Etes-vous sûr de vouloir supprimer le code ROME "' + code + '" ?',
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
