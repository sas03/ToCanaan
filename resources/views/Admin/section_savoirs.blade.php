@extends('Admin.layout') @section('title', 'Section savoirs')

@section('content')
  <br>

  <h3 class="text-uppercase text-jaune">Savoirs ({{ $total }})</h3>

  <hr>

  <br>

  @if ($errors->any())
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

  <br>
  @endif

  <div class="row">

    <div class="col-sm-12 col-lg-8 mb-1">

      <form class="form-inline">
        <div class="input-group mb-2 mr-sm-2 mb-sm-1">
          <div class="input-group-addon">Libellé</div>
          <input type="text" class="form-control" name="nom" value="{{ $request->input('nom') }}">
        </div>
        <span class="mr-2">ou</span>
        <label class="sr-only" for="id">ID</label>
        <div class="input-group mb-2 mr-sm-2 mb-sm-1">
          <div class="input-group-addon">ID</div>
          <input type="text" class="form-control" name="id" value="{{ $request->input('id') }}">
        </div>
        <button type="submit" class="btn btn-outline-primary btn-sm mr-1">Rechercher</button>
        <button id="rstBtn" class="btn btn-outline-dark btn-sm">Remettre à Zéro</button>
      </form>
    </div>
    <div class="col-sm-12 col-lg-4 mt-1">
      <a class="btn bg-jaune" href="{{ route('admin_edit_savoir') }}" role="button">Ajouter un savoir</a>
    </div>
  </div>
  <br>

  @if (!empty($savoirs))
  <div class="row">
    <div class="col-sm-12">

      <table class="table table-hover">

        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Savoir</th>
            <th scope="col">Nombre de Codes ROME associés</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($savoirs as $savoir)
          <tr>
            <th scope="row">{{ $savoir->id }}</th>
            <td style="max-width: 250px">{{ $savoir->nom }}</td>
            <td>
              @if (count($savoir->codes) == 0)
                Pas de code ROME associés
              @else
                <a href="{{ route('admin_savoir_codes', ['id' => $savoir->id]) }}" class="text-vert"><strong>{{ count($savoir->codes) }}</strong> code(s) ROME</a>
              @endif
            </td>
            <td style="min-width: 190px;">
              {{-- <a type="button" class="btn btn-info" title="Voir la fiche métier" href="" target="_blank"><i class="icon ion-eye"></i></a> --}}
              <a type="button" class="btn btn-warning" title="Modification" href="{{ route('admin_edit_savoir', [$savoir->id]) }}"><i class="icon ion-edit"></i></a>
              <button type="button" class="btn btn-danger delete-savoir" title="Suppression"><i class="icon ion-trash-b"></i></button>
            </td>
          </tr>
          @endforeach
        </tbody>

      </table>

    </div>
  </div>
  <br>
  @if ($savoirs instanceof Illuminate\Pagination\LengthAwarePaginator)

    {{ $savoirs->links('vendor.pagination.bootstrap-4') }}

    <br>
  @endif


  @endif
@endsection

@section('javascript')
<script>
  $(function() {

    $('.delete-savoir').click(function(e) {
      e.preventDefault();

      let tr = $(this).parent().parent();
      let libelle = tr.children().eq(1).text();
      let id = tr.children().eq(0).text();
      let url = "{{ url('admin/savoir/delete') }}" + '/' + id;

      swal({
        title: 'Attention !',
        text: 'Etes-vous sûr de vouloir supprimer le savoir "' + libelle + '" ?',
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
