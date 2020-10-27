@extends('layouts.master') @section('title', 'Ajouter un employé')

@section('main_title')
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <h4 class="text-uppercase">Nouvel employé</h4>
      </div>

    </div>

  </div>

  <hr class="bg-jaune trait-titre">
@endsection

@section('main_sous_menu')
  <div class="container">
    <div class="row row-sous-menu-fiche">
      <div class="col-lg-12">
        <ul>
          <li><a href="{{ route('societe_index') }}" class="text-uppercase"><i class="icon ion-ios-home"></i></a></li>
          <li><a href="{{ route('liste_services') }}" class="text-uppercase">Liste des services</a></li>
          <li><a href="{{ route('liste_postes') }}" class="text-uppercase">Liste des postes</a></li>
          <li><a href="{{ route('liste_employes') }}" class="text-uppercase">Liste des employés</a></li>
        </ul>
      </div>
    </div>
  </div>
@endsection

@section('content')

  <div class="row justify-content-center">

    <div class="col-lg-7 box-form box-form-societe">

      {{-- DIV pour afficher les erreurs --}}
      <div class="form-errors"> <ul></ul></div>

      <form class="form-horizontal" id="form-add-employe" url-action="{{ route('create_employe') }}">
          {{ csrf_field() }}

          <input type="hidden" class="form-control" name="societe_id" value="{{ Auth::guard('web_societe')->user()->id }}" required>


          <div class="form-group form-group-user-id">
            <label for="user_id" class="control-label">Cet employé est déjà inscrit sur notre site ? <br> Trouvez-le grâce à son nom, son prénom ou son adresse mail :</label>
            <input type="text" data-provide="typeahead" class="form-control autocomplete-users-societe" name="q" autocomplete="off" value="">
            <input type="hidden" name="user_id" value="">
            <span class="test"></span>
          </div>

          <div class="form-group form-group-nom">
            <label for="nom" class="control-label">Nom * <span></span> </label>
            <input type="text" class="form-control" name="nom" value="{{ old('nom') }}" required autofocus>
          </div>

          <div class="form-group form-group-prenom">
            <label for="prenom" class="control-label">Prénom * <span></span> </label>
            <input type="text" class="form-control" name="prenom" value="{{ old('prenom') }}">
          </div>

          <div class="form-group form-group-niveau">
              <label for="niveau" class="control-label">Niveau d'études * <span></span> </label>
              <select class="form-control" name="niveau" id="exampleFormControlSelect1">
                <option value="">Veuillez choisir un niveau</option>
                <option value="brevet">Brevet</option>
                <option value="cap ou équivalent">CAP ou équivalent</option>
                <option value="bac ou équivalent">BAC ou équivalent</option>
                <option value="bac + 1">BAC + 1</option>
                <option value="bac + 2">BAC + 2</option>
                <option value="bac + 3">BAC + 3</option>
                <option value="bac + 4">BAC + 4</option>
                <option value="bac + 5">BAC + 5</option>
                <option value="bac + 6">BAC + 6</option>
                <option value="bac + 7">BAC + 7</option>
                <option value="bac + 8">BAC + 8</option>
                <option value="bac + 9 et plus">BAC + 9 et plus</option>
              </select>
          </div>

          <div class="form-group form-group-poste_id">
            <label for="poste_id" class="control-label">Poste occupé <span class="ajax-load text-center" style="display:none"><img src="http://demo.itsolutionstuff.com/plugin/loader.gif" style="display:inline; width:20px"></span> </label>
            <select class="form-control list-metiers" name="poste_id">
              <option value="" class="first-option">Veuillez choisir un poste</option>
              @foreach ($postes as $poste)
                <option value="{{ $poste->id }}">{{ ucfirst($poste->nom) }}</option>
              @endforeach
            </select>
          </div>
      </form>

      <a href="" class="btn-form bg-jaune" id="add-employe">ENREGISTRER CET EMPLOYÉ</a>

  </div>
</div>

@endsection

@section('javascript')
  <script type="text/javascript">

    $(function () {

      //Autocomplétion

      let results_autocompletion = [];
      let user_id;

      $('.autocomplete-users-societe').autocomplete({

        source: function(request, response) {

          $.get("{{ route('autocomplete_users_with_mail') }}" ,{term: request.term}, function(data){
              data = $.parseJSON(data);

              // On vide le tableau à chaque fois que l'utilisateur tape un nouveau caractère
              results_autocompletion = [];

              $.each(data, function(k, v){
                results_autocompletion.push({
                    id : v.id,
                    prenom : v.prenom,
                    nom : v.nom.toUpperCase(),
                    name : v.prenom + ' ' + v.nom.toUpperCase() + ' - '+ v.email,
                    value : v.prenom + ' ' + v.nom.toUpperCase() + ' - '+ v.email
                });
              });

              response(results_autocompletion);
            });
        },

        minLength: 3,

        select: function (e, ui) {
          $('input[name=prenom]').val(ui.item.prenom);
          $('input[name=nom]').val(ui.item.nom);

          // l'utilisateur ne peut pas modifier le nom et le prénom
          $('input[name=prenom]').attr('readonly', 'readonly');
          $('input[name=nom]').attr('readonly', 'readonly');

          $('input[name=user_id]').val(ui.item.id);
        }
      });

      // event sur l'input de recherche d'un user
      $('input[name=q]').on('input',function(e){
        // si l'input est vide, on réinitialise les champs nom et prénom
        if($(this).val() == '') {
          $('input[name=prenom]').val('');
          $('input[name=nom]').val('');
          $('input[name=prenom]').removeAttr('readonly');
          $('input[name=nom]').removeAttr('readonly');
        }
      });


      $('#add-employe').click(function(e){
        e.preventDefault();

        // si le service n'a pas encore été sauvegardé
        if (!$(this).hasClass('saved')) {
          /* on vide la div des erreurs à chaque fois que l'utilisateur clique
            sur le bouton */
          $('.form-errors ul').html('');

          let url = $('#form-add-employe').attr('url-action');
          let data = $('#form-add-employe').serialize();

          addEmploye(url, data);
        }
      });

      function addEmploye(url, data)
      {
        $.ajax({
          url: url,
          type: "post",
          data: data
        })
        .done(function(data) {
          // s'il y a des erreurs dans les champs saisis
          if (data.error) {

            $.each(data.error, function(k, v){
              $('.form-errors').show();
              $('.form-errors ul').append('<li>• '+ v +'</li>')
            })

          }
          else {
            window.location.href = '{{ route('fiche_employe') }}' + '/' + data.id;
          }
        })

        .fail(function(jqXHR, ajaxOptions, thrownError){
          console.log(thrownError);
        });
      }


    });

</script>
@endsection
