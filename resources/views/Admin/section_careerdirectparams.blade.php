@extends('Admin.layout') @section('title', 'Section careerdirectparam') @section('content')
<br>

<h3 class="text-uppercase text-jaune">Careerdirectparams ({{ count($careerdirectparams) }})</h3>
<hr>

<br>
<div class="row">

  <div class="col-sm-12 col-lg-8">
    <form class="form-inline">
      <div class="input-group mb-2 mr-sm-2 mb-sm-1">
        <div class="input-group-addon">Nom</div>
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
    <a class="btn bg-jaune" href="{{ route('admin_edit_careerdirectparam') }}" role="button">Ajouter un utilisateur careerdirect</a>
  </div>
</div>
<br>
@if (!empty($careerdirectparams))
<div class="row">
  <div class="col-sm-12">

    <table class="table table-hover text-center">

      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Id utilisateur</th>
          <th scope="col">Nom Careerdirect</th>
          <th scope="col">Prénom Careerdirect</th>
          <th scope="col">Validate</th>
          <th scope="col">Lien</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($careerdirectparams as $careerdirectparam)
        <tr>
          <th scope="row">{{ $careerdirectparam->id }}</th>
          <td>{{ $careerdirectparam->user_id }}</td>
          <td>{{ $careerdirectparam->nom }}</td>
          <td>{{ $careerdirectparam->prenom }}</td>
          <td>{{ $careerdirectparam->validate }}</td>
          <td>{{ $careerdirectparam->lien }}</td>

          <td style="min-width: 120px;">
            <a type="button" class="btn btn-warning" title="Modification" href="{{ route('admin_edit_careerdirectparam', ['id' => $careerdirectparam->id]) }}"><i class="icon ion-edit"></i></a>
            <button type="button" class="btn btn-danger delete-user" title="Suppression"><i class="icon ion-trash-b"></i></button>
          </td>
        </tr>
        @endforeach
      </tbody>

    </table>

  </div>
</div>
@endif
@endsection

@section('javascript')
  <script>
    $(function(){

      $('.delete-user').click(function(e){
        e.preventDefault();

        let tr = $(this).parent().parent();
        let id = tr.children().eq(0).text();
        let nom = tr.children().eq(1).text();
        let prenom = tr.children().eq(2).text();
        let url = "{{ url('admin/user/delete') }}" + '/' +  id;

         swal({
            title: 'Attention !',
            text: "Etes-vous sûr de vouloir supprimer le membre : " + nom + ' ' + prenom + ' ?',
            type: "warning",
            showCancelButton: true,
            confirmButtonText: 'Oui',
            cancelButtonText: 'Annuler',
          }).then (function() {
              $.get(url)
              .done(function(data) {
                swal({text:'Succès !', type:'success'});
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
