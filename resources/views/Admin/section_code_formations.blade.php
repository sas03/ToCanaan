@extends('Admin.layout') @section('title', 'Section code formations') @section('content')

  <a href="{{ route('admin_codes') }}" class="btn-return-back bg-jaune">< Retourner aux codes ROME</a>

<br>

<h3 class="text-uppercase text-rose">Formations liées au code ROME <strong>{{ $code->code_rome }}</strong></h3>

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

    <form class="form-inline col-lg-12" action="{{ route('admin_code_formation_add') }}" method="POST">
      {{ csrf_field() }}

      <input type="hidden" name="code_id" value="{{ $code->id }}">
      <input type="hidden" name="formation_id" value="">

      <div class="input-group col-lg-12">
        <div class="input-group-addon">Lier une nouvelle formation à ce code ROME</div>
        <input type="text" class="form-control col-lg-12 autocomplete" data-provide="typeahead" autocomplete="off" name="nom" placeholder="Chercher une formation existante">
        <button type="submit" class="btn bg-rose input-group-addon">Ajouter</button>
      </div>
    </form>

  </div>
</div>

<br>

@if (!empty($formations))

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
              Pas d'établissements
            @else
              <a href="{{ route('admin_formation_etablissement', ['id' => $formation->id]) }}" class="text-violet">{{ count($formation->etablissements) }} établissement(s)</a>
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


    // Autocomplétion
    let results_autocompletion = [];
    let formation_id;

    $('.autocomplete').autocomplete({
      source: function( request, response ) {

        $.get( "{{ route('autocomplete_formations') }}",{term: request.term}, function(data){
            data = $.parseJSON(data).slice(0, 10); // on affiche seulement les 10 premiers résultats

            // On vide le tableau à chaque fois que l'utilisateur tape un nouveau caractère
            results_autocompletion = [];

            $.each(data, function(k, v){
              results_autocompletion.push({
                  id : v.id,
                  value : v.nom
              });
            });

            response(results_autocompletion);
          });

      },
      minLength: 3,
      select: function (e, ui) {
        $('input[name=formation_id]').val(ui.item.id);
      }
    });




    $('#rstBtn').click(function(e) {
      e.preventDefault();
      $(this).closest('form').find("input[type=text]").val("");
    });

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
