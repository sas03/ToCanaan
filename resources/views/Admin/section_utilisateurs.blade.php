@extends('Admin.layout') @section('title', 'Section utilisateurs') @section('content')
<br>

<h3 class="text-uppercase text-jaune">Utilisateurs ({{ count($users) }})</h3>
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
    <a class="btn bg-jaune" href="{{ route('admin_edit_user') }}" role="button">Ajouter un utilisateur</a>
  </div>
</div>
<br>
@if (!empty($users))
<div class="row">
  <div class="col-sm-12">

    <table class="table table-hover text-center">

      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nom</th>
          <th scope="col">Prénom</th>
          <th scope="col">Email</th>
          <th scope="col">Code Postal</th>
          <th scope="col">Rôle</th>
          <th scope="col">Actions</th>

        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
        <tr>
          <th scope="row">{{ $user->id }}</th>
          <td>{{ $user->nom }}</td>
          <td>{{ $user->prenom }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->code_postal }}</td>
          <td>{{ $user->role }}</td>

          <td style="min-width: 120px;">
            <a type="button" class="btn btn-warning" title="Modification" href="{{ route('admin_edit_user', ['id' => $user->id]) }}"><i class="icon ion-edit"></i></a>
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
