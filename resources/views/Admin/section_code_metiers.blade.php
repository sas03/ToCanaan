@extends('Admin.layout') @section('title', 'Section métiers') @section('content')

  <a href="{{ route('admin_codes') }}" class="btn-return-back bg-jaune">< Retourner aux codes ROME</a>

<br>

<h3 class="text-uppercase text-vert">Métiers liés au code ROME <strong>{{ $code->code_rome }}</strong></h3>

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

    <form class="form-inline col-lg-12" action="{{ route('admin_code_metier_add') }}" method="POST">
      {{ csrf_field() }}

      <input type="hidden" name="code_id" value="{{ $code->id }}">
      <input type="hidden" name="metier_id" value="">

      <div class="input-group col-lg-12">
        <div class="input-group-addon">Lier un nouveau métier à ce code ROME</div>
        <input type="text" class="form-control col-lg-12 autocomplete" data-provide="typeahead" autocomplete="off" name="nom" placeholder="Chercher un métier existant">
        <button type="submit" class="btn bg-vert input-group-addon">Ajouter</button>
      </div>
    </form>
    <p class="informative-text"><em>Attention ! Chaque métier est lié à <strong>un seul</strong> code ROME. En ajoutant un nouveau métier vous remplacerez son code ROME actuel par le code ROME ci-dessus ({{ $code->code_rome }}).</em></p>
  </div>

</div>

<br>

@if (!empty($metiers))
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

    // Autocomplétion

    let results_autocompletion = [];

    $('.autocomplete').autocomplete({
      source: function( request, response ) {

        $.get( "{{ route('autocomplete_metiers') }}",{term: request.term}, function(data){
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
        $('input[name=metier_id]').val(ui.item.id);
      }
    });


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
