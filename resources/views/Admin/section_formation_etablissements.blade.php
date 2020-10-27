@extends('Admin.layout') @section('title', 'Section établissements') @section('content')

<a href="{{ route('admin_formations') }}" class="btn-return-back bg-jaune">< Retourner aux formations</a>

<br>

<h3 class="text-uppercase text-violet">Établissements liés à la formation <strong>{{ $formation->nom }}</strong></h3>
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

    <form class="form-inline col-lg-12" action="{{ route('admin_formation_etablissement_add') }}" method="POST">
      {{ csrf_field() }}

      <input type="hidden" name="formation_id" value="{{ $formation->id }}">
      <input type="hidden" name="etablissement_id" value="">

      <div class="input-group col-lg-12">
        <div class="input-group-addon">Lier un nouvel établissement à cette formation</div>
        <input type="text" class="form-control col-lg-12 autocomplete" data-provide="typeahead" autocomplete="off" name="nom" placeholder="Chercher un établissement existant">
        <button type="submit" class="btn bg-violet input-group-addon text-blanc">Ajouter</button>
      </div>
    </form>

  </div>

</div>

<br>

@if (!empty($etablissements))
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

    // Autocomplétion

    let results_autocompletion = [];

    $('.autocomplete').autocomplete({
      source: function( request, response ) {

        $.get( "{{ route('autocomplete_etablissements') }}",{term: request.term}, function(data){
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
        $('input[name=etablissement_id]').val(ui.item.id);
      }
    });


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
