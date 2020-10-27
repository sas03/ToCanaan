@extends('Admin.layout') @section('title', 'Section codes ROME') @section('content')

<a href="{{ route('admin_savoir_faire') }}" class="btn-return-back bg-jaune">< Retourner aux savoir-faire</a>

<br>

<h3 class="text-uppercase text-vert">Codes ROME liés au savoir-faire <strong>{{ $savoirFaire->nom }}</strong></h3>

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

<br>
@endif

<div class="row">

  <div class="col-sm-12 col-lg-12 mb-1">

    <form class="form-inline col-lg-12" action="{{ route('admin_savoir_faire_code_add') }}" method="POST">
      {{ csrf_field() }}

      <input type="hidden" name="savoir_faire_id" value="{{ $savoirFaire->id }}">
      <input type="hidden" name="code_id" value="">

      <div class="input-group col-lg-12">
        <div class="input-group-addon">Lier un nouveau code ROME à ce savoir-faire</div>
        <input type="text" class="form-control col-lg-12 autocomplete" data-provide="typeahead" autocomplete="off" name="nom" placeholder="Chercher un code ROME existant">
        <button type="submit" class="btn bg-vert input-group-addon">Ajouter</button>
      </div>
    </form>
  </div>

</div>

<br>

@if (!empty($codes))
<div class="row">
  <div class="col-sm-12">

    <table class="table table-hover">

      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Code ROME</th>
          <th scope="col">Nombre de métiers</th>
          <th scope="col">Nombre de formations</th>
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

    // Autocomplétion

    let results_autocompletion = [];

    $('.autocomplete').autocomplete({
      source: function( request, response ) {

        $.get( "{{ route('autocomplete_codes') }}",{term: request.term}, function(data){
            data = $.parseJSON(data).slice(0, 10); // on affiche seulement les 10 premiers résultats

            // On vide le tableau à chaque fois que l'utilisateur tape un nouveau caractère
            results_autocompletion = [];

            $.each(data, function(k, v){
              results_autocompletion.push({
                  id : v.id,
                  value : v.code_rome
              });
            });

            response(results_autocompletion);
          });

      },
      minLength: 3,
      select: function (e, ui) {
        $('input[name=code_id]').val(ui.item.id);
      }
    });



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
